@extends('layouts.webfront.webfront')
@section('page-content')

<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-8 page-content">
				<div class="inner-box category-content">
					<h2 class="title-2"><i class="icon-user-add"></i> Create your account, Its free </h2>
					<div class="row">
						<div class="col-sm-12">
							@if(Session::has('success'))
							<div class="alert alert-success">
								{{Session::get('success') }}
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							</div>
							@endif
							<form class="form-horizontal" method="post" action="/signup">
								{{csrf_field()}}
								<fieldset>
									<div class="form-group required">
										<label class="col-md-4 control-label">You are a <sup>*</sup></label>
										<div class="col-md-6">
											<div class="radio">
												<label>
													<input type="radio" name="account_type" id="optionsRadios1" value="Professional" checked="">
													Professional </label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="account_type" id="optionsRadios2" value="Individual">
														Individual </label>
													</div>
												</div>
												@if($errors->first('gender')) 
												<p class="label label-danger" >
													{{ $errors->first('gender') }} 

												</p>
												@endif
											</div>

											<div class="form-group required">
												<label class="col-md-4 control-label">First Name <sup>*</sup></label>
												<div class="col-md-6">
													<input name="fname" placeholder="First Name" class="form-control input-md"  type="text" value="{{Request::old('fname')}}">
													@if($errors->first('fname')) 
													<p class="label label-danger" >
														{{ $errors->first('fname') }} 

													</p>
													@endif
												</div>
											</div>

											<div class="form-group required">
												<label class="col-md-4 control-label">Last Name <sup>*</sup></label>
												<div class="col-md-6">
													<input name="lname" placeholder="Last Name" class="form-control input-md" type="text" value="{{Request::old('lname')}}">
													@if($errors->first('lname')) 
													<p class="label label-danger" >
														{{ $errors->first('lname') }} 

													</p>
													@endif
												</div>
											</div>

											<div class="form-group required">
												<label class="col-md-4 control-label">Phone Number <sup>*</sup></label>
												<div class="col-md-6">
													<input name="phone" placeholder="Phone Number" class="form-control input-md" type="text" value="{{Request::old('phone')}}">
													@if($errors->first('phone')) 
													<p class="label label-danger" >
														{{ $errors->first('phone') }} 

													</p>
													@endif
													<div class="checkbox">
														<label>
															<input type="checkbox" name ="hide_phone" value="">
															<small> Hide the phone number on the published ads.</small>
														</label>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Gender</label>
												<div class="col-md-6">
													<div class="radio">
														<label for="Gender-0">
															<input name="gender" id="Gender-0" value="Male" checked="checked" type="radio">
															Male </label>
														</div>
														<div class="radio">
															<label for="Gender-1">
																<input name="Gender" id="Gender-1" value="Female" type="radio">
																Female </label>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label" for="about">About Yourself</label>
														<div class="col-md-6">
															<textarea class="form-control" id="about" name="about" >{{Request::old('about')}}</textarea>
														</div>
													</div>
													<div class="form-group required">
														<label for="email" class="col-md-4 control-label">Email
															<sup>*</sup></label>
															<div class="col-md-6">
																<input type="email" name="email"  class="form-control" id="email" value="{{Request::old('email')}}" placeholder="Email">
																@if($errors->first('email')) 
																<p class="label label-danger" >
																	{{ $errors->first('email') }} 

																</p>
																@endif
															</div>
														</div>
														<div class="form-group required">
															<label for="password" class="col-md-4 control-label">Password </label>
															<div class="col-md-6">
																<input type="password" class="form-control" id="password" name="password" placeholder="Password">
																@if($errors->first('password')) 
																<p class="label label-danger" >
																	{{ $errors->first('password') }} 

																</p>
																@endif
																<p class="help-block">At least 5 characters
																</p>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label"></label>
															<div class="col-md-8">
																<div class="termbox mb10">
																	<label class="checkbox-inline" for="checkboxes-1">
																		<input name="Terms" id="checkboxes-1" value="1" type="checkbox">
																		I have read and agree to the <a href="/terms-and-conditions">Terms
																		&amp; Conditions</a> </label>
																		@if($errors->first('Terms')) 
																		<p class="label label-danger" >
																			{{ $errors->first('Terms') }} 

																		</p>
																		@endif
																	</div>
																	<div style="clear:both"></div>
																	<input type="submit" class="btn btn-primary" value="Register"></div>
																</div>
															</fieldset>
														</form>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-4 reg-sidebar">
											<div class="reg-sidebar-inner text-center">
												<div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>
													<h3><strong>Post a Free Classified</strong></h3>
													<p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
														adipiscing elit. </p>
													</div>
													<div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>
														<h3><strong>Create and Manage Items</strong></h3>
														<p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
															Praesent tristique elit pharetra magna efficitur laoreet.</p>
														</div>
														<div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>
															<h3><strong>Create your Favorite ads list.</strong></h3>
															<p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
																Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
															</div>
														</div>
													</div>
												</div>

											</div>

										</div>

										@endsection							}
									}
