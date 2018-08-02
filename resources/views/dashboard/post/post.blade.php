@extends('dashboard.layouts.app')

@section('title')
Read. | Dashboard &raquo; Posts
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12-col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
            @if(session('notification'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('notification') }}
                </div>
            @endif
            <p><a href="/dashboard/posts/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create new posts</a></p>
            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <table id="post-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Published</th>
                                <th width="100">Options</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
  var post_table = $('#post-table').DataTable({
    serverSide: true,
    processing: true,
    ajax: '/dashboard/posts/data',
    "order": [[ 1, 'desc' ]],
    columns: [
        {data: 'title'},
        {data: 'created_at'},
        {data: 'action', orderable: false, searchable: false}
    ]
  });
  
  function destroy(id)
  {
    var confirmation = confirm("Are you want delete this data?");

    if (confirmation) {
        $.ajax({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/dashboard/posts/destroy/'+id,
            type: 'delete',
            dataType: 'json',
            success: function(result){
                alert('Data has been delete ...');
                post_table.ajax.reload();
            }
        });
    }
  }
</script>
@endpush
