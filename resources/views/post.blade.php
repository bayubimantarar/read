@extends('layouts.front-end')

@section('content')
<section class="post-list post-content"><div class="post-data">
  <img src="/assets/img/post-image.jpg"></img>
  <h1 class="post-page-title">{{ $post->title }}</h1>
  <p class="post-meta-data">{{ $post->published }}</p>
  {!! $post->body !!}

  <div class="author-box"><img src="/assets/img/author-avatar.png"></img></div>

<div class="row">
  <div class="col-md-6 paddd">
<p><b>Prev</b>&nbsp;
<a href="#">Beautiful</a></p>
</div>
<div class="col-md-6 paddd righted">

  <p>
  <a href="#">Webpage</a>&nbsp;<b>Next</b></p>
</div>
</div>

</section>
@endsection
