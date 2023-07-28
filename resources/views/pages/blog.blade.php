@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_responsive.css') }}">
@endpush

<!-- Blog -->

<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						@forelse($posts as $item)
						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url({{ $item->getFirstMediaUrl('posts') }})"></div>
							<div class="blog_text">{{ $item->title }}</div>
                            
							<div class="blog_button"><a href="{{ route('blog.post.show', $item) }}">{{ __('Continue Reading') }}</a></div>
						</div>
						@empty
						<h3>No Articles Found.</h3>
						@endforelse
					</div>
				</div>
					
			</div>
		</div>
	</div>

@endsection