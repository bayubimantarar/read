<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use DataTables;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Services\PostService;

class PostController extends Controller
{
    private $postRepo;
    private $postServ;

    public function __construct(
        PostRepository $postRepository,
        PostService $postService
    ) {
        $this->postRepo = $postRepository;
        $this->postServ = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postDataTables()
    {
        $post = $this
            ->postRepo
            ->getAllData();

        return DataTables::of($post)
            ->addColumn('action', function($post){
                return '<center><a href="/dashboard/posts/edit/'.$post->id.'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> <a href="#" onclick="destroy('.$post->id.')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a></center>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this
            ->postRepo
            ->getAllData();

        return view('dashboard.post.post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $postReq)
    {
        $user_id    = Auth::user()->id;
        $title      = $postReq->title;
        $slug       = $postReq->slug;
        $body       = $postReq->body;
        $imageFile  = $postReq->file('image');

        if($imageFile == null){
            $data = [
                'user_id'   => $user_id,
                'title'     => $title,
                'slug'      => $slug,
                'body'      => $body,
                'image'     => null
            ];

            $store = $this
                ->postRepo
                ->storePostData($data);
        }else{
            $imageName = $imageFile->getClientOriginalName();

            $data = [
                'user_id'   => $user_id,
                'title'     => $title,
                'slug'      => $slug,
                'body'      => $body,
                'image'     => $imageName
            ];

            $handleUpload = $this
                ->postServ
                ->handleUploadImage($imageFile, $imageName);

            $store = $this
                ->postRepo
                ->storePostData($data);
        }

        return redirect('/dashboard/posts')
            ->with([
                'notification' => 'Data has been save ...'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this
            ->postRepo
            ->getSingleData($id);

        return view('dashboard.post.form_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $postReq, $id)
    {
        $user_id    = Auth::user()->id;
        $title      = $postReq->title;
        $slug       = $postReq->slug;
        $body       = $postReq->body;
        $imageFile  = $postReq->file('image');

        if($imageFile == null){
            $data = [
                'user_id'   => $user_id,
                'title'     => $title,
                'slug'      => $slug,
                'body'      => $body,
                'image'     => null
            ];
            
            $store = $this
                ->postRepo
                ->updatePostData($data, $id);
        }else{
            $post = $this
                ->postRepo
                ->getSingleData($id);

            $oldImage = $post->image;

            $imageName = $imageFile->getClientOriginalName();

            if($oldImage == null){
                $data = [
                    'user_id'   => $user_id,
                    'title'     => $title,
                    'slug'      => $slug,
                    'body'      => $body,
                    'image'     => $imageName
                ];

                $handleUpload = $this
                    ->postServ
                    ->handleUploadImage($imageFile, $imageName);

                $update = $this
                    ->postRepo
                    ->updatePostData($data, $id);  
            }else{
                $data = [
                    'user_id'   => $user_id,
                    'title'     => $title,
                    'slug'      => $slug,
                    'body'      => $body,
                    'image'     => $imageName
                ];

                $deleteImageFile = $this
                    ->postServ
                    ->handleDeleteImage($oldImage);

                $handleUpload = $this
                    ->postServ
                    ->handleUploadImage($imageFile, $imageName);

                $update = $this
                    ->postRepo
                    ->updatePostData($data, $id);
            }
        }

        return redirect('/dashboard/posts')
            ->with([
                'notification' => 'Data has been update ...'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this
                ->postRepo
                ->getSingleData($id);

        $oldImage = $post->image;

        if($oldImage == null){
            $destroy = $this
                ->postRepo
                ->destroyPostData($id);
        }else{
            $deleteImageFile = $this
                ->postServ
                ->handleDeleteImage($oldImage);

            $destroy = $this
                ->postRepo
                ->destroyPostData($id);
        }

        return response()
            ->json([
                'destroyed' => true
            ], 200);
    }
}
