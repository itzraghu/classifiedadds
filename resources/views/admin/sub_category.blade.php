@extends('layouts.admin.adminlayouts')

@section('title', 'Category')

@section('page-title')

<div class="page-title">

	<h3>Sub Category</h3>

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
		<div class="col-md-10 col-md-offset-1">

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th> Id</th>
							<th>Category</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($sub_categories as $sub_category)
						<tr>
							<td>{{ $sub_category->id}}</td>
							<td>{{ $sub_category->category_name}}</td>
							<td>{{ $sub_category->name}}</td>
							<td><a href="{{URL('admin/get_edit_sub_category/'.$sub_category->category_id)}}">Edit</a> / <a href="{{URL('admin/delete_sub_category/'.$sub_category->id)}}">Delete</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>
@endsection