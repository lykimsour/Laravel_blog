@extends('layouts.app')

@section('content')

<div class="container">
		
		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())
			<p class="mt-5">Cheatn?, please <a href="/login/">login</a> to continue.</p>
		@else

			<div class="blog-header">
		        <h1 class="blog-title">{{ $post->post_title }}</h1>
		        <p>{{ $post->category_ID }} / {{ date('M j, Y', strtotime( $post->created_at )) }} <a href="{{ route('posts.edit', $post->id) }}">{Edit}</a></p>
		    </div>
			
			<div class="row">
				<div class="col-sm-12 blog-main">

					<div class="blog-content">
						{{-- Inserts HTML line breaks before all newlines in a string --}}
						{!! nl2br( $post->post_content ) !!}
					</div>

				</div>
			</div>
			
		@endif

	</div>
@endsection