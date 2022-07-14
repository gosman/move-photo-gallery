<?php


function cdnPath($file)
{

    return config('filesystems.disks.images.cdn').$file;
}
