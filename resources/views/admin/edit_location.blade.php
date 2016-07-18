@extends('layouts.admin.adminlayouts')

@section('title', 'Locations')

@section('page-title')

<div class="page-title">

	<h3>Category</h3>

	<div class="page-breadcrumb">

		<ol class="breadcrumb">

			<li><a href="{{URL('admin/dashboard')}}">Home</a></li>

			<li class="active">Locations</li>

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
		
		<form action="/admin/edit_location" method="POST" class="form-horizontal" role="form">
			{{csrf_field()}}
			<input type="hidden" name ="location_id" value="{{$location->id}}">
			<div class="col-md-3">
				<label for="location_name">Location Name</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" name="location_name" value="{{$location->location_name}}" id="location_name" class="form-control" >
					@if($errors->first('location_name')) 
					<p class="label label-danger" >
						{{ $errors->first('location_name') }} 
					</p>
					@endif
				</div>   
			</div>
			
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Submit</button> <a href="{{URL('admin/locations')}}" class="btn btn-primary">Back</a>
				</div>


			</div>
		</form>

	</div>

</div>
@endsection