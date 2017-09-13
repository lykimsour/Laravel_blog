
@foreach ($books as $book)
<article class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-xxs-12 animate-box">

	<figure>
		<a href="#"><img src="/covers/{{ $book->cover }}" alt="Image" class="img-responsive"></a>
	</figure> 

	<span class="fh5co-meta fh5co-date">{{ date( 'j-M-Y', strtotime( $book->created_at ) ) }}</span>

</article>
@endforeach