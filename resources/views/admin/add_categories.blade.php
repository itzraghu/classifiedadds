@extends('layouts.admin.adminlayouts')

@section('title', 'Category')

@section('page-title')

<div class="page-title">

	<h3>Category</h3>

	<div class="page-breadcrumb">

		<ol class="breadcrumb">

			<li><a href="{{URL('admin/dashboard')}}">Home</a></li>

			<li class="active">Category</li>

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
		
		<form action="add_category" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="col-md-3">
				<label for="category_name">Category Name</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" name="category_name" value="{{Request::old('category_name')}}" id="category_name" class="form-control" >
					@if($errors->first('category_name')) 
					<p class="label label-danger" >
						{{ $errors->first('category_name') }} 
					</p>
					@endif
				</div>   
			</div>
			<div class="col-md-3">
				<label for="category_icon">Category Icon</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<input type="file" name="category_icon" id="category_icon" class="form-control" >
					@if($errors->first('category_icon')) 
					<p class="label label-danger" >
						{{ $errors->first('category_icon') }} 
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