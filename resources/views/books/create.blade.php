@extends('layouts.app')

@section('content')

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">

            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Add New Book</h2>

                <div class="box-icon">
            
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                   <!--  <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a> -->
                </div>
            </div>
            <div class="box-content">
                @if ( $errors->count() > 0 )
                    @foreach( $errors->all() as $message )
            
                       <div class="alert alert-danger">
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                               {{ $message }}.
                       </div>
                    @endforeach
                
                @endif
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
                <form role="form" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                	{{ csrf_field() }}
                	<input type="hidden" name="author_id" value="{{ Auth::id() }}" />
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" required>
                    </div>

                    <div class="form-group">
                    <label class="control-label" for="selectError">Categories</label>

                    <div class="form-group">
                    	<div class="control-group">
                    	    <div class="controls">
                    	        <select data-placeholder="--Select--" id="selectError2" data-rel="chosen">
                    	            <option value=""></option>
         
                    	                <option>Dallas Cowboys</option>
                    	                <option>New York Giants</option>
                    	                <option>Philadelphia Eagles</option>
                    	                <option>Washington Redskins</option>
                    	   
                    	        </select>
                    	    </div>
                    	</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Book Cover</label>
                    <input type="file" id="cover" name="cover" class="image">
                </div>
                  
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

@endsection