<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    public function getAllData()
    {
        $getPost = Post::orderBy('created_at', 'DESC')
            ->get();
        
        return $getPost;
    }

    public function getAllDataWithPagination()
    {
        $getPost = Post::orderBy('created_at', 'DESC')
            ->simplePaginate(5);
        
        return $getPost;
    }

    public function getSingleData($id)
    {
        $getPost = Post::where('id', '=', $id)
            ->firstOrFail();

        return $getPost;
    }

    public function getSingleDataForBlogDetail($slug)
    {
        $getPost = Post::where('slug', '=', $slug)
            ->firstOrFail();

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
