@extends('layouts.front-end')

@section('content')
<section class="post-list row">
  @foreach($post as $item)
    <div class="col-xs-12 col-sm-12 col-lg-12 post-line">
      <span class="post-titles"><a href="/blogs/{{ $item->slug }}"><h1>{{ $item->title }}</h1></a></span>
      <time class="dates"><br/>{{ $item->published }}</time>
    </div>
  @endforeach
</section>
@endsection
