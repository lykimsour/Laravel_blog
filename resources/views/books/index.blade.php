@extends('layouts.app')

@section('content')


{{-- Check if current user is logged-in or a guest --}}
@if (Auth::guest())

<p class="mt-5">Cheatn?, please <a href="/login/">login</a> to continue.</p>

@else

<ul class="breadcrumb">
	<li>
		<a href="{{ route('home') }}">Dashboard</a>
	</li>
	<li>
		<a href="#">Books</a>
	</li>
</ul>

<div class="blog-header">
	<h1 class="blog-title">Books 
		<a class="btn btn-sm btn-primary pull-right inline" href="{{ route('books.create') }}">
			Add New
		</a>
	</h1>
</div>

<div class="row">
	<div class="col-md-12">
		@if(session()->has('error'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ session()->get('error') }}.
		</div>
		@endif

		@if(session()->has('success'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ session()->get('success') }}.
		</div>
		@endif
		<table class="table table-striped table-bordered bootstrap-datatable responsive">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Category</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			<tr>
				{{-- Blade if and else --}}
				@if( $books->count() )
				{{-- Blade foreach --}}
				@foreach( $books as $book )
				<tr>
					<td>
						<strong>
							<a href="{{ route('books.edit', $book->id) }}">
								{{ $book->title }}
							</a>
						</strong>
					</td>
					<td>{{ $book->author_id }}</td>

					<td>
						<a href="#">
							{{ $book->category_id }}
						</a>
					</td>
					<td>{{ date( 'j-M-Y', strtotime( $book->created_at ) ) }}</td>
					<td>

						<form class="d-inline" action="{{ route('books.destroy', $book->id) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<a class="btn btn-sm btn-info" href="{{ route('books.edit', $book->id) }}">Edit</a>
							<!-- <input type="submit" value="Delete" class="btn btn-sm btn-danger" /> -->

						</form>


					</td>
				</tr>
				@endforeach
				@else

				<tr>
					<td colspan="5">No post has been added yet!</td>
				</tr>

				@endif
			</tr>

		</table>

		{{ $books->links() }}

	</div>
</div>

@endif

@endsection
