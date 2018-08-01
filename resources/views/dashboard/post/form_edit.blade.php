@extends('dashboard.layouts.app')

@section('title')
Read. | Dashboard &raquo; Posts &raquo; Edit
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/dashboard/posts">Posts</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
            <div class="card">
                <div class="card-header">Form create new posts</div>
                <div class="card-body">
                    <form action="/dashboard/posts/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="slug" id="slug" value="{{ $post->slug }}" />
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    @if($post->image == null)
                                        <img src="http://placehold.it/100x100" id="show-image" style="max-width:200px;max-height:200px;float:left;" />
                                    @else
                                        <img src="/uploads/images/{{ $post->image }}" id="show-image" style="max-width:200px;max-height:200px;float:left;" />
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <label for="">Image *</label>
                                    <input type="file" name="image" id="image" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}" />
                                    <small id="fileHelp" class="form-text text-muted">File only jpg|jpeg|png|gif</small>
                                    @if($errors->has('image'))
                                        <div class="invalid-feedback">
                                            <b>{{ $errors->first('image') }}</b>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <label for="">Title *</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" value="{{ $post->title }}" />
                                    @if($errors->has('title'))
                                        <div class="invalid-feedback">
                                            <b>{{ $errors->first('title') }}</b>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <label for="">Content *</label>
                                    <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" cols="30" rows="10">{!! $post->body !!}</textarea>
                                    @if($errors->has('body'))
                                        <div class="invalid-feedback">
                                            <b>{{ $errors->first('body') }}</b>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p>PS: Label has (<b>*</b>) symbol must be fill.</p>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                        <a href="/dashboard/posts" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#body').ckeditor({
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
    });

    var slug = function(str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function(e){
                $("#show-image").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
    });

    $("#url").val('read.com/blogs/');

    $('#title').keyup(function(){
        $('#url').val('read.com/blogs/'+slug($('#title').val()));
        $('#slug').val(slug($('#title').val()));
    });
</script>
@endpush
