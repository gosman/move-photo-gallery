<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{

    protected $fillable = [
        'id',
        'name',
        'email',
        'instagram',
        'make',
        'model',
        'year',
        'engine_type',
        'bumper_position',
        'bumper_type',
        'updated_at',
        'created_at',
    ];


    public function images()
    {

        return $this->hasMany(SubmissionImage::class, 'submission_id', 'id');
    }

}
