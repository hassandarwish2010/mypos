@extends('dashboard.index')

@section('content')
<h4>@lang('site.categories')<small>{{ $categories->total() }}</small></h4>


<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<form method='get' action="{{ route('dashbord.categories.index') }}" style='display: inline-block;'>
			<input type='search' name="search" value="{{ request()->search }}">
			<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>@lang('site.search')</button>
		   </form>
			@if(auth()->user()->hasPermission('create-categories'))
		   <a href="{{ route('dashbord.categories.create') }}"> <button class="btn btn-success"><i class="fa fa-plus"></i>@lang('site.add_new')</button>
		   </a>
           @else
		   <a href="#"> <button class="btn btn-success disabled"><i class="fa fa-plus"></i>@lang('site.add_new')</button>
		   </a>
		   @endif
		</div>
		<div class="col-sm-4">
		</div>
		@if(count($categories)>0)
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                   
                    <thead>
                   
		                <th><input type="checkbox" id="checkall" /></th>
		                <th>#</th>
		                <th>Name</th>

		                <th>Edit</th>
		                      
		                <th>Delete</th>
                    </thead>
				    <tbody>
				       @foreach($categories as $index=>$category)
					    <tr>
						    <td><input type="checkbox" class="checkthis" /></td>
						    <td>{{ $index +1 }}</td>
						    <td>{{ $category->name }}</td>

						   @if(auth()->user()->hasPermission('update-categories')) <td><a href="{{ route('dashbord.categories.edit',$category->id) }}" method='post'><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
						   @else
						  <td> <button class="btn btn-primary disabled">Edit</button><td>
						   @endif
						    @if(auth()->user()->hasPermission('delete-categories'))
						    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            @else
						  <td> <button class="btn btn-danger disabled">delete</button><td>
						   @endif
					    </tr>
					    @endforeach
				 
				    </tbody>
                </table>
            </div>
             {{ $categories->appends(request()->query())->links() }}
        </div>

        @else
        <br>
         <p class="btn btn-success col-md-12">@lang('site.sorry')</p>
         @endif
    </div>
</div>




@if(count($categories)>0)
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
	          <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	        <h4 class="modal-title custom_align" id="Heading">@lang('site.are you sure to delete?')</h4>
	      </div>
	          <div class="modal-body">
	       
	       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> @lang('site.Are you sure you want to delete this Record?')</div>
	       
	      </div>
	        <div class="modal-footer ">
	        	<form action="{{ route('dashbord.categories.destroy',$category->id) }}" method='post'style='display: inline-block;'>
	        		{{ csrf_field() }}
	        		{{ method_field('delete') }}
	                 <button type="submit" class="btn btn-success" >
	                 	<span class="glyphicon glyphicon-ok-sign"></span>@lang('site.yes')</button>
	           </form>
	        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>@lang('site.no')</button>
	      </div>
        </div>
    <!-- /.modal-content --> 
    </div>
      <!-- /.modal-dialog --> 
</div>
 @endif
@endsection

@section('js')



@endsection

