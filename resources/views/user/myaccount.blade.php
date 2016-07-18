@extends('layouts.user.user')
@section('user-content')

<div class="col-sm-9 page-content">
	<div class="inner-box">
		<div class="row">
			<div class="col-md-5 col-xs-4 col-xxs-12">
				<h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg" src="images/user.jpg" alt="user"> {{$user->first_name ." ".$user->last_name}}
				</a></h3>
			</div>
			<div class="col-md-7 col-xs-8 col-xxs-12">
				<div class="header-data text-center-xs">

					<div class="hdata">
						<div class="mcol-left">

							<i class="fa fa-eye ln-shadow"></i></div>
							<div class="mcol-right">

								<p><a href="#">7000</a> <em>visits</em></p>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="hdata">
							<div class="mcol-left">

								<i class="icon-th-thumb ln-shadow"></i></div>
								<div class="mcol-right">

									<p><a href="#">12</a><em>Ads</em></p>
								</div>
								<div class="clearfix"></div>
							</div>

							<div class="hdata">
								<div class="mcol-left">

									<i class="fa fa-user ln-shadow"></i></div>
									<div class="mcol-right">

										<p><a href="#">18</a> <em>Favorites </em></p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="inner-box">
					<div class="welcome-msg">
						<h3 class="page-sub-header2 clearfix no-padding">Hello {{$user->first_name ." ".$user->last_name}}  </h3>
						<span class="page-sub-header-sub small">You last logged in at: 01-01-2014 12:40 AM [UK time (GMT + 6:00hrs)]</span>
					</div>
					@if(Session::has('success'))
					<div class="alert alert-success">
						{{Session::get('success') }}
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>
					@endif
					@if(Session::has('error'))
					<div class="alert alert-warning">
						{{Session::get('error') }}
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>
					@endif
					@if($errors->first('new_password')) 
					<p class="label label-danger" >
						{{ $errors->first('new_password') }} 
					</p>
					@endif
					@if($errors->first('confirm_password')) 
					<p class="label label-danger" >
						{{ $errors->first('confirm_password') }} 
					</p>
					@endif
					<div id="accordion" class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#collapseB1" data-toggle="collapse"> My
									details </a></h4>
								</div>
								<div class="panel-collapse collapse in" id="collapseB1">
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="post" action="/update_profile">
											{{csrf_field()}}
											<div class="form-group">
												<label class="col-sm-3 control-label">First Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
													@if($errors->first('first_name')) 
													<p class="label label-danger" >
														{{ $errors->first('first_name') }} 
													</p>
													@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Last name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
													@if($errors->first('last_name')) 
													<p class="label label-danger" >
														{{ $errors->first('last_name') }} 
													</p>
													@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<input type="email" class="form-control" value="{{$user->email}}" disabled="disabled" >
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Address</label>
												<div class="col-sm-9">
													<input type="text" name="address" class="form-control" value="{{$user->address}}">
												</div>
											</div>
											<div class="form-group">
												<label for="Phone" class="col-sm-3 control-label">Phone</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="Phone" name="seller_phone" value="{{$user->mobile_no}}">
													@if($errors->first('seller_phone')) 
													<p class="label label-danger" >
														{{ $errors->first('seller_phone') }} 
													</p>
													@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Postcode</label>
												<div class="col-sm-9">
													<input type="text" name="zip_code" value="{{$user->zip_code}}" class="form-control" >
												</div>
											</div>
											<div class="form-group hide">  
												<label class="col-sm-3 control-label">Facebook account map</label>
												<div class="col-sm-9">
													<div class="form-control"><a class="link" href="fb.com">Jhone.doe</a> <a class=""> <i class="fa fa-minus-circle"></i></a></div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-9"></div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-9">
													<button type="submit" class="btn btn-default">Update</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#collapseB2" data-toggle="collapse"> Settings </a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseB2">
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="post" action="/change_password">
											{{csrf_field()}}
											<div class="form-group">
												<div class="col-sm-12">
													<div class="checkbox">
														<label>
															<input type="checkbox">
															Comments are enabled on my ads </label>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">New Password</label>
													<div class="col-sm-9">
														<input type="password" name="new_password" class="form-control" value="{{Request::old('new_password')}}">
														@if($errors->first('new_password')) 
														<p class="label label-danger" >
															{{ $errors->first('new_password') }} 
														</p>
														@endif
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Confirm Password</label>
													<div class="col-sm-9">
														<input type="password" name="confirm_password" class="form-control" value="{{Request::old('confirm_password')}}">
														@if($errors->first('confirm_password')) 
														<p class="label label-danger" >
															{{ $errors->first('confirm_password') }} 
														</p>
														@endif
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-offset-3 col-sm-9">
														<button type="submit" class="btn btn-default">Update</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#collapseB3" data-toggle="collapse">
											Preferences </a></h4>
										</div>
										<div class="panel-collapse collapse" id="collapseB3">
											<div class="panel-body">
												<div class="form-group">
													<div class="col-sm-12">
														<div class="checkbox">
															<label>
																<input type="checkbox">
																I want to receive newsletter. </label>
															</div>
															<div class="checkbox">
																<label>
																	<input type="checkbox">
																	I want to receive advice on buying and selling. </label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>


								@endsection