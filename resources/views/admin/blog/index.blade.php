@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Post List') }}</h5>
        </div><!-- sl-page-title -->

        <livewire:post-table />

        <!-- <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('Post List') }}
          <a href="{{ route('posts.create') }}" class="btn btn-sm btn-warning" style="float:right;">{{ __('Add New Post') }}</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">{{ __('Post Title') }}</th>
                  <th class="wd-15p">{{ __('Post Category') }}</th>
                  <th class="wd-15p">{{ __('Image') }}</th>
                  <th class="wd-20p">{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->category->category_name }}</td>
                  <td><img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="{{ $post->title }} image" height="70em" max-width="100%"></td>
                  <td>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                    {{ Form::model($post, ['route' => ['posts.destroy', $post], 'method' => 'DELETE', 'style' => 'display:inline-block;']) }}
                    {{ Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger', 'id' => 'delete']) }}
                    {{ Form::close() }}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>card -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection