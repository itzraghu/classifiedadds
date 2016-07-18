@extends('layouts.admin.adminlayouts')

@section('title', 'Category')

@section('page-title')

<div class="page-title">

	<h3>Category</h3>

	<div class="page-breadcrumb">

		<ol class="breadcrumb">

			<li><a href="{{URL('admin/dashboard')}}">Home</a></li>

			<li class="active">Location</li>

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
							<th>Location Id</th>
							<th>Location Name</th>
							<th>Show/Hide</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ($locations as $location)
						<tr>
							<td>{{ $location->id}}</td>
							<td>{{ $location->location_name}}</td>
							<td>
								@if ($location->is_active == "0")
								<a href="{{URL('admin/enable_location/'.$location->id)}}">Enable</a> 
								@else
								<a href="{{URL('admin/disable_location/'.$location->id)}}">Disable</a>
								@endif
							</td>
							<td><a href="{{URL('admin/get_edit_location/'.$location->id)}}">Edit</a> / <a href="{{URL('admin/delete_location/'.$location->id)}}">Delete</a></td>
						</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>
@endsection