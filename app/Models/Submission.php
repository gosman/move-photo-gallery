<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{

    protected $fillable = [
        'name',
        'email',
        'instagram',
        'make',
        'model',
        'year',
        'engine_type',
        'bumper_position',
        'bumper_type',
    ];


    public function images()
    {

        return $this->hasMany(SubmissionImage::class, 'submission_id', 'id');
    }

}
