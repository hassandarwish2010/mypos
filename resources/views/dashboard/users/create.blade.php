@extends('dashboard.index')

@section('content')
<h4>@lang('site.users')</h4>
<div class="container">
	<div class="row justify-content-center">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-body">

	                                <form class="form-horizontal" method="post" action="{{ route('dashbord.users.store') }}" enctype="multipart/form-data"
>
	                                	{{ csrf_field() }}

	                                    <div class="form-group">
	                                        <label for="name" class="cols-sm-2 control-label">@lang('site.first_name')</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
	                                                <input type="text" class="form-control" name="first_name" id="name" placeholder="@lang('site.first_name')" />
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="username" class="cols-sm-2 control-label">@lang('site.last_name')</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
	                                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="@lang('site.last_name')" />
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="image" class="cols-sm-2 control-label">@lang('site.image')</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-image fa" aria-hidden="true"></i></span>
	                                                <input type="file" class="form-control image" name="image" id="image"  />
	                                            </div>
	                                        </div>

	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <img src="{{ asset('uploads/users_images/default.png') }}" class="img-thumbnail image-preview" style="width: 70px;height: 50px">
	                                            </div>
	                                        </div>

	                                    </div>	                                    
	                                    <div class="form-group">
	                                        <label for="email" class="cols-sm-2 control-label">@lang('site.email')</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
	                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" />
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label for="password" class="cols-sm-2 control-label">Password</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
	                                                <input type="password" class="form-control" name="password" id="password" placeholder="@lang('site.password')" />
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
	                                        <div class="cols-sm-10">
	                                            <div class="input-group">
	                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
	                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="@lang('site.confirm_password')" />
	                                            </div>
	                                        </div>
	                                    </div>
	                                   
                                    <?php
                                     $models=['users','categories','products'];
                                     $maps=['create','delete','update','read'];
                                    ?>

								       <div class="form-group">
								       	    <label >@lang('site.permissions')</label>
								       	     <div class="nav-tabs-custom">
								            <ul class="nav nav-tabs">
								              @foreach($models as $index=>$model)
								              <li class="{{ $index==0?'active':'' }}"><a href="#{{ $model }}" data-toggle="tab">{{ $model }}</a></li>
								              @endforeach
								              
								            </ul>
								            <div class="tab-content">
								           @foreach($models as $index=>$model)
                                             
									              <div class="tab-pane {{ $index==0?'active':'' }}" id="{{ $model }}">
									              	@foreach($maps as $map)
									              	  <label><input type="checkbox" name="permissions[]" value="{{ $map }}-{{ $model }}">@lang('site.'.$map)</label>
									              	  @endforeach
									                   
									              <!-- /.tab-pane -->
									                </div>
								            <!-- /.tab-content -->
								           
                                            
								           @endforeach
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