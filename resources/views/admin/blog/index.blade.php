@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post List</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post List
          <a href="{{ route('posts.create') }}" class="btn btn-sm btn-warning" style="float:right;">Add New Post</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Post Title</th>
                  <th class="wd-15p">Post Category</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->post_title_eng }}</td>
                  <td>{{ $post->category->category_name_eng }}</td>
                  <td><img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="{{ $post->post_title_eng }} image" height="70em" max-width="100%"></td>
                  <td>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-info">Edit</a>
                    {{ Form::model($post, ['route' => ['posts.destroy', $post], 'method' => 'DELETE', 'style' => 'display:inline-block;']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger', 'id' => 'delete']) }}
                    {{ Form::close() }}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection