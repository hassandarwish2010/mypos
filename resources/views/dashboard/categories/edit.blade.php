@extends('dashboard.index')

@section('content')
<h4>@lang('site.categories')</h4>
<div class="container">
	<div class="row justify-content-center">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-body">

	                                <form class="form-horizontal" method="post" action="{{ route('dashbord.categories.update',$category->id) }}" enctype="multipart/form-data">
	                                	{{ csrf_field() }}
	                                	{{ method_field('put') }}

	                                    <div class="form-group">
	                                        <label for="name" class="cols-sm-2 control-label">@lang('site.name')</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
	                                                <input type="text" class="form-control" name="name" value='{{ $category->name }}' id="name" placeholder="@lang('site.name')" />
	                                            </div>
	                                        </div>
	                                    </div>
	                                    




	                                    <div class="form-group ">
	                                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">@lang('site.add')</button>
	                                    </div>

	                                </form>
	                            </div>

	                        </div>
	                    </div>
	</div>
</div>

@endsection