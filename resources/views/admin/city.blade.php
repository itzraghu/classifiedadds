@extends('layouts.admin.adminlayouts')

@section('title', 'City')

@section('page-title')

<div class="page-title">

	<h3>Category</h3>

	<div class="page-breadcrumb">

		<ol class="breadcrumb">

			<li><a href="{{URL('admin/dashboard')}}">Home</a></li>

			<li class="active">City</li>

		</ol>

	</div>

</div>

@endsection

@section('page-content')

<div id="main-wrapper">
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success') }}
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	</div>
	@endif
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>City Id</th>
							<th>City Name</th>
							<th>Show/Hide</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ($cities as $city)
						<tr>
							<td>{{ $city->id}}</td>
							<td>{{ $city->city_name}}</td>
							<td>
								@if ($city->is_active == "0")
								<a href="{{URL('admin/enable_city/'.$city->id)}}">Enable</a> 
								@else
								<a href="{{URL('admin/disable_city/'.$city->id)}}">Disable</a>
								@endif
							</td>
							<td><a href="{{URL('admin/get_edit_city/'.$city->id)}}">Edit</a> / <a href="{{URL('admin/delete_city/'.$city->id)}}">Delete</a></td>
						</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>
@endsection