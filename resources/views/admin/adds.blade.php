@extends('layouts.admin.adminlayouts')

@section('title', 'Adds')

@section('page-title')

<div class="page-title">

	<h3>Adds</h3>

	<div class="page-breadcrumb">

		<ol class="breadcrumb">

			<li><a href="{{URL('admin/dashboard')}}">Home</a></li>

			<li class="active">Adds</li>

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
							<th>Add Title</th>
							<th>Add Descripton</th>
							<th>Add Type</th>
							<th>Price</th>
							<th>Post By</th>
							<th>Show/Hide</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ($adds as $add)
						<tr>
							<td>{{ $add->adds_title}}</td>
							<td>{{ $add->adds_description}}</td>
							<td>{{ $add->adds_type}}</td>
							<td>{{ $add->adds_price}}</td>
							<td>{{ $add->seller_name}}</td>
							<td>
								@if ($add->is_approved == "0")
								<a href="{{URL('admin/enable_add/'.$add->adds_id)}}">Approve</a> 
								@else
								<a href="{{URL('admin/disable_add/'.$add->adds_id)}}">Disapprove</a>
								@endif
							</td>
							<td>
								<a href="{{URL('admin/delete_add/'.$add->category_id)}}">Delete</a></td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>
	@endsection