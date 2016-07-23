@extends('layouts.admin.adminlayouts')

@section('title', 'Edit City')

@section('page-title')

<div class="page-title">

	<h3>Category</h3>

	<div class="page-breadcrumb">

		<ol class="breadcrumb">

			<li><a href="{{URL('admin/dashboard')}}">Home</a></li>

			<li class="active">Edit City</li>

		</ol>

	</div>

</div>

@endsection

@section('page-content')

<div id="main-wrapper">

	<div class="row">
		@if(Session::has('success'))
		<div class="alert alert-success">
			{{Session::get('success') }}
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>
		@endif
		
		<form action="/admin/edit_city" method="POST" class="form-horizontal" role="form">
			{{csrf_field()}}
			<input type="hidden" name ="city_id" value="{{$city->id}}">
			<div class="col-md-3">
				<label for="city_name">City Name</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" name="city_name" value="{{$city->city_name}}" id="city_name" class="form-control" >
					@if($errors->first('city_name')) 
					<p class="label label-danger" >
						{{ $errors->first('city_name') }} 
					</p>
					@endif
				</div>   
			</div>
			
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Submit</button> <a href="{{URL('admin/city')}}" class="btn btn-primary">Back</a>
				</div>


			</div>
		</form>

	</div>

</div>
@endsection