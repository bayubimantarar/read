@extends('layouts.app')

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
            </section>
        </div>
    </div>
</div>
@endsection
