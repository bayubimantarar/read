<?php

namespace App\Http\Controllers\Dashboard;

use DataTables;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    private $postRepo;

    public function __construct(PostRepository $postRepository){
        $this->postRepo = $postRepository;
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
                return '<center><a href="/penjualan/form-ubah/'.$post->id.'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> <a href="#" onclick="destroy('.$post->id.')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a></center>';
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
        $data = [
            'title' => $postReq->title,
            'slug' => $postReq->slug,
            'body' => $postReq->body
        ];

        $store = $this
            ->postRepo
            ->storePostData($data);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
