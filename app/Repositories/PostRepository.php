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

    public function getSingleBlog($slug)
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
}
