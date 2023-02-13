<?php

namespace App\Traits;

// this trait to save images in folder
trait SaveImages
{

    public function saveImage($image, $path)
    {
        $file = $image;
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path($path), $filename);
        return $filename;
    }
}
