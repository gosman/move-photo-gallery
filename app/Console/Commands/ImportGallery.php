<?php

namespace App\Console\Commands;

use App\Models\Submission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImportGallery extends Command
{

    protected $signature = 'import:gallery';

    protected $description = 'Import previous gallery data';


    public function __construct()
    {

        parent::__construct();
    }


    public function handle()
    {

        $makes = fopen(storage_path()."/app//makes.csv", "r");
        $models = fopen(storage_path()."/app//models.csv", "r");
        $years = fopen(storage_path()."/app//years.csv", "r");
        $images = fopen(storage_path()."/app//gallery.csv", "r");

        $makeRows = [];
        $modelRows = [];
        $yearRows = [];
        $imageRows = [];

        while (($data = fgetcsv($makes, 1000, ",")) !== false) {
            $makeRows[] = $data;
        }

        while (($data = fgetcsv($models, 1000, ",")) !== false) {
            $modelRows[] = $data;
        }

        while (($data = fgetcsv($years, 1000, ",")) !== false) {
            $yearRows[] = $data;
        }

        while (($data = fgetcsv($images, 1000, ",")) !== false) {
            $imageRows[] = $data;
        }

        fclose($makes);
        fclose($models);
        fclose($years);
        fclose($images);


        foreach ($makeRows as $make) {

            $makeData[$make[0]] = $make[1];
        }

        foreach ($modelRows as $model) {

            $modelData[$model[0]] = $model[1];
        }

        foreach ($yearRows as $year) {

            $yearData[$year[0]] = $year[1];
        }

        foreach ($imageRows as $image) {

            if ($image[6] === 'TRUE') {
                $imageData[] = [
                    'id' => $image[0],
                    'email' => $image[1] ?? null,
                    'instagram' => $image[2],
                    'name' => $image[3],
                    'url' => $image[4],
                    'created_at' => $image[7],
                    'updated_at' => $image[8],
                    'updated_at' => $image[8],
                    'make' => $makeData[$image[9]],
                    'model' => $modelData[$image[10]],
                    'year' => $yearData[$image[11]],
                    'position' => $image[13],
                    'type' => $image[14],
                ];
            }
        }

        $imageCollection = collect($imageData);

        $options = [
            'visibility' => 'public',
            'CacheControl' => 'max-age=31536000',
        ];

        foreach ($imageData as $img) {
            
            $data = [
                'id' => $img['id'],
                'name' => $img['name'] ? $img['name'] : 'Anonymous',
                'email' => $img['email'] ?? '',
                'make' => $img['make'],
                'model' => $img['model'],
                'year' => $img['year'],
                'engine_type' => '',
                'created_at' => $img['created_at'],
                'updated_at' => $img['updated_at'],
            ];

            $submission = Submission::create($data);

            if ($submission) {

                $file = str_replace([
                    '.',
                    ' ',
                ], '-', Str::lower($img['id'].'-'.$img['make'].'-'.$img['model'].'-'.$img['year']));

                $originalImageName = $file.'-'.$key.'-original.jpg';
                $imageName = $file.'-'.$key.'.jpg';

                $imageLocation = 'https://move-gallery.s3.us-east-2.amazonaws.com/'.trim(urlencode($img['url']));

                $image = Image::make($imageLocation)->encode('jpg', 100);
                Storage::disk('images')->put($originalImageName, $image, $options);

                $optimised = Image::make($imageLocation)->resize(1000, null, function ($constraint) {

                    $constraint->aspectRatio();
                })->encode('jpg', 70);
                Storage::disk('images')->put($imageName, $optimised, $options);


                if (isset($image) && isset($optimised)) {

                    $submission->images()->create([
                        'image_name' => $imageName,
                        'bumper_position' => $img['position'],
                        'bumper_type' => $img['type'],
                        'approved' => 1,
                    ]);
                }
                echo $img['id']."\n";

            }
        }

    }

}
