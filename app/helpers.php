<?php


use Illuminate\Support\Str;

function cdnPath($file)
{

    return config('filesystems.disks.images.cdn').$file;
}


function originalImage($image)
{

    $originalImage = Str::replace('.jpg', '-original.jpg', $image);

    return config('filesystems.disks.images.cdn').$originalImage;
}
