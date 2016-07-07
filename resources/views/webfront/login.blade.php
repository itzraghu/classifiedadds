@extends('layouts.webfront.webfront')
@section('page-content')

<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 login-box">
				<div class="panel panel-default">
					<div class="panel-intro text-center">
						<h2 class="logo-title">

							<span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span>
						</h2>
					</div>
					<div class="panel-body">
						@if(Session::has('login_error'))
						<div class="alert alert-warning">
							{{Session::get('login_error') }}
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
						@endif
						<form role="form" method="post" action="/login">
							{{csrf_field()}}
							<div class="form-group">
								<label for="sender-email" class="control-label">Username:</label>
								<div class="input-icon"><i class="icon-user fa"></i>
									<input id="sender-email" name="email" type="text" placeholder="Username" class="form-control email" value="{{Request::old('email')}}">
									@if($errors->first('email')) 
									<p class="label label-danger" >
										{{ $errors->first('email') }} 

									</p>
									@endif
								</div>
							</div>
							<div class="form-group">
								<label for="user-pass" class="control-label">Password:</label>
								<div class="input-icon"><i class="icon-lock fa"></i>
									<input type="password" name="password" class="form-control" placeholder="Password" id="user-pass">
									@if($errors->first('password')) 
									<p class="label label-danger" >
										{{ $errors->first('password') }} 

									</p>
									@endif
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary  btn-block" value="Submit">
							</div>
						</form>
					</div>
					<div class="panel-footer">
						<div class="checkbox pull-left">
							<label> <input type="checkbox" value="1" name="remember" id="remember"> Keep me logged
								in</label>
							</div>
							<p class="text-center pull-right"><a href="/forgot-password"> Lost your password? </a>
							</p>
							<div style=" clear:both"></div>
						</div>
					</div>
					<div class="login-box-btm text-center">
						<p> Don't have an account? <br>
							<a href="/signup"><strong>Sign Up !</strong> </a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection