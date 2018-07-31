<?php

namespace App\Services;

use App\Post;

class PostService
{
    public function handleUploadImage($imageFile, $imageName)
    {
        $uploadImageFile = $imageFile
            ->move(public_path('uploads/images/'), $imageName);
    }

    public function handleDeleteImage($imageName)
    {
        $deleteImageFile = unlink(public_path('uploads/images/'.$imageName));
    }
}
