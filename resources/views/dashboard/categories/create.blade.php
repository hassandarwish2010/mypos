@extends('dashboard.index')

@section('content')
<h4>@lang('site.categories')</h4>
<div class="container">
	<div class="row justify-content-center">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-body">

	                                <form class="form-horizontal" method="post" action="{{ route('dashbord.categories.store') }}" 
>
	                                	{{ csrf_field() }}

	                                	@foreach(config('translatable.locales') as $locale)

	                                    <div class="form-group">
	                                        <label for="name" class="cols-sm-2 control-label">@lang('site.' .$locale. '.name')</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
	                                                <input type="text" class="form-control" name="{{ $locale }}[name]" value="{{ old($locale.'.name') }} " placeholder="@lang('site.first_name')" />
	                                            </div>
	                                        </div>
	                                    </div>
                                        @endforeach
	                                   
                                   {{--  --}}


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