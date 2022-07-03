<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\SubmissionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ClientGalleryController extends Controller
{

    private $submission;


    public function index($make = null, $model = null, $year = null)
    {

        $images = SubmissionImage::where('approved', 1)
            ->with('details')
            ->whereHas('details', function ($query) use ($make, $model, $year) {

                if ($make && $model && $year) {
                    $query->where('make', $make)->where('model', $model)->where('year', $year);
                } elseif ($make && $model) {
                    $query->where('make', $make)->where('model', $model);
                } elseif ($make) {
                    $query->where('make', $make);
                }
            })
            ->paginate(9);
        $images->withPath('/community/client-gallery');

        $data = [
            'images' => $images,
            'make' => $make,
            'model' => $model,
            'year' => $year,
        ];

        $gallery = view('shopify.client-gallery.index')->with($data)->render();

        return response($gallery)->header('Content-Type', 'application/liquid');
    }


    private function makeImagestemp($data)
    {

        foreach ($data['images'] as $image) {

            $make = $image[0];
            $model = $image[1];
            $year = $image[2];
            $engineType = $image[3];
            $imageFile = $image[4];

            $s = Submission::create([
                'name' => 'John Doe',
                'email' => 'graham@edm.ie',
                'make' => $make,
                'model' => $model,
                'year' => $year,
                'bumper_type' => 'Standard',
                'bumper_position' => 'Front',
                'engine_type' => $engineType,
            ]);

            $fileName = Str::lower($s->id.'-'.$make.'-'.$model.'-'.$year.'-'.$engineType).'-0.jpg';
            $path = Storage::disk('images')->path($fileName);

            $image = Image::make($imageFile);
            $image->save($path, 100);

            $s->images()->create([
                'image_name' => $fileName,
                'approved' => 0,
            ]);
        }
    }


    public function store(Request $request)
    {

        $submission = $request->except([
            'timestamp',
            'signature',
            'shop',
            'path_prefix',
            'images',
        ]);
        $submission['instagram'] = ltrim($submission['instagram'], '@');

        $this->submission = Submission::create($submission);
        $this->makeImages();


        if (Submission::find($this->submission->id)->images->count()) {

            return response()->json(['success' => true]);
        }

        return response()->json(['fail' => true]);
    }


    private function makeImages()
    {

        $fileName = Str::lower($this->submission->id.'-'.request()->make.'-'.request()->model.'-'.request()->year.'-'.request()->engine_type);

        foreach (request()->images as $key => $imageDataUrl) {

            $imageName = $fileName.'-'.$key.'.jpg';

            $options = [
                'visibility' => 'public',
                'CacheControl' => 'max-age=31536000',
            ];

            try {
                $image = Image::make($imageDataUrl)->encode('jpg', 100)->stream()->detach();
                Storage::disk('images')->put($imageName, $image, $options);


            } catch (\Exception $e) {
                unset($e);
            }

            if (isset($image)) {

                $this->submission->images()->create([
                    'image_name' => $imageName,
                    'approved' => 0,
                ]);
            }
        }
    }

}
