<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionImage extends Model
{

    protected $fillable = [
        'submission_id',
        'image_name',
        'bumper_position',
        'bumper_type',
        'approved',
    ];


    public function details()
    {

        return $this->hasOne(Submission::class, 'id', 'submission_id');
    }

}
