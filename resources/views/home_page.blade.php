@extends('layouts.welcome')

@section('content')
    <div class="container-fluid">
        <div class="row fh5co-post-entry">
               @include('sub_views._article', ['books' => $books])
            <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>
            <div class="clearfix visible-xs-block"></div>
        </div>
    </div>
  
@endsection