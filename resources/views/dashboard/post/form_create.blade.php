@extends('dashboard.layouts.back-end')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">Form create new posts</div>
                <div class="card-body">
                    <form action="/dashboard/posts/store" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <label for="">Title *</label>
                                    <input type="text" name="title" class="form-control" id="title" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <label for="">URL *</label>
                                    <input type="text" name="url" class="form-control" id="url" readonly />
                                    <input type="hidden" name="slug" class="form-control" id="slug" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <label for="">Content *</label>
                                    <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
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

    $("#url").val('read.com/posts/');

    $('#title').keyup(function(){
        $('#url').val('read.com/posts/'+slug($('#title').val()));
        $('#slug').val(slug($('#title').val()));
    });
</script>
@endpush
