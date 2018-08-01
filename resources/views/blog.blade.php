@extends('layouts.app')

@section('title')
Read. &raquo; Blogs
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">    
        <section class="post-list row">
            @if($post->count() == 0)
                <div class="col-xs-12 col-sm-12 col-lg-12 post-line">
                    <h1>No content yet sorry, we will be back soon ...</h1>
                </div>
            @else
                @foreach($post as $item)
                    <div class="col-xs-12 col-sm-12 col-lg-12 post-line">
                        <span class="post-titles">
                            <a href="/blogs/{{ $item->slug }}">
                                <h1>{{ $item->title }}</h1>
                            </a>
                        </span>
                        <time class="dates"><br/>{{ $item->published }}</time>
                    </div>
                @endforeach
            @endif
        </section>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="col-md-6 paddd">
            <ul class="pager">
                @if ($post->onFirstPage())
                    <li class="disabled"><span>&laquo; Newest</span></li>
                @else
                    <li><a href="{!! $post->previousPageUrl() !!}">&laquo; Newest</a></li>
                @endif
            </ul>
        </div>
        <div class="col-md-6 paddd righted">
            <ul class="pager">
                @if($post->hasMorePages())
                    <li><a href="{!! $post->nextPageUrl() !!}">Oldest &raquo;</a></li>
                @else
                    <li class="disabled"><span>Oldest &raquo;</span></li>
                @endif
            </ul>
        </div>      
    </div>
</div>
@endsection
