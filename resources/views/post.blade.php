@extends('layouts.app')

@section('title')
Read. &raquo; Blogs &raquo; {{ $post->title }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <section class="post-list post-content">
                <div class="post-data">
                    @if($post->image == null)
                        <h1 class="post-page-title">{{ $post->title }}</h1>
                        <p class="post-meta-data">{{ $post->published }}</p>
                        {!! $post->body !!}
                    @else
                        <img src="/uploads/images/{{ $post->image }}" />
                        <h1 class="post-page-title">{{ $post->title }}</h1>
                        <p class="post-meta-data">{{ $post->published }}</p>
                        {!! $post->body !!}
                    @endif
                </div>
                <div class="author-box">
                    <img src="/assets/img/author-avatar.png" />
                    <p>{{ $post->user->name }}</p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
