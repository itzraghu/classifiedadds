@extends('layouts.admin.adminlayouts')

@section('title', 'Sub Category')

@section('page-title')

<div class="page-title">

	<h3>Category</h3>

	<div class="page-breadcrumb">

		<ol class="breadcrumb">

			<li><a href="{{URL('admin/dashboard')}}">Home</a></li>

			<li class="active">Sub Category</li>

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
		
		<form action="add_sub_category" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
			{{csrf_field()}}

			<div class="col-md-3">
				<label for="category"> Category</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<select name="category" id="category" class="form-control">
						<option value="">Please Select Category</option>
						@foreach ($categories as $category)
						<option value="{{$category->category_id}}">{{ $category->category_name}}</option>
						@endforeach
					</select>
					@if($errors->first('category')) 
					<p class="label label-danger" >
						{{ $errors->first('category') }} 
					</p>
					@endif
				</div>   
			</div>
			<div class="col-md-3">
				<label for="sub_category_name"> Sub Category Name</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" name="sub_category_name" value="{{Request::old('sub_category_name')}}" id="sub_category_name" class="form-control" >
					@if($errors->first('sub_category_name')) 
					<p class="label label-danger" >
						{{ $errors->first('sub_category_name') }} 
					</p>
					@endif
				</div>   
			</div>
			
			

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>

	</div>

</div>
@endsection