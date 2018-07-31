<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    public function getAllData()
    {
        $getPost = Post::all();

        return $getPost;
    }

    public function getSingleData($id)
    {
        $getPost = Post::where('id', '=', $id)
            ->first();

        return $getPost;
    }

    public function getSingleDataForBlogDetail($slug)
    {
        $getPost = Post::where('slug', '=', $slug)
            ->first();

        return $getPost;
    }

    public function storePostData($data)
    {
        $storePost = Post::create($data);

        return $storePost;
    }

    public function updatePostData($data, $id)
    {
        $updatePost = Post::where('id', $id)
            ->update($data);

        return $updatePost;
    }

    public function destroyPostData($id)
    {
        $destroyPost = Post::destroy($id);

        return $destroyPost;
    }
}
