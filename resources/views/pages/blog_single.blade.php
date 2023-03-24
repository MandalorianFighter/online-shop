@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_responsive.css') }}">

<!-- Single Blog Post -->

<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">{{ $post->title }}</div>

					<div class="single_post_text">
						<p>{!! $post->full_text !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection