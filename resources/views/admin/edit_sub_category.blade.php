@extends('layouts.admin.adminlayouts')

@section('title', 'Category')

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
		
		<form action="/admin/edit_sub_category" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name ="sub_category_id"  value="{{$sub_category->category_id}}">
			<div class="col-md-3">
				<label for="category">Category</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<select name="category" id="category" class="form-control">
						<option value="">Please Select Category</option>
						@foreach ($category as $categori)
						<option value="{{$categori->category_id}}" {{ $categori->category_id ==$sub_category->category_id ? 'selected':''  }}>{{$categori->category_name}}</option>
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
				<label for="sub_category_name">Sub Category Name</label>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" name="sub_category_name" value="{{$sub_category->name}}" id="sub_category_name" class="form-control" >
					@if($errors->first('sub_category_name')) 
					<p class="label label-danger" >
						{{ $errors->first('sub_category_name') }} 
					</p>
					@endif
				</div>   
			</div>

			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Submit</button> <a href="{{URL('admin/get_categories')}}" class="btn btn-primary">Back</a>
				</div>


			</div>
		</form>

	</div>

</div>
@endsection