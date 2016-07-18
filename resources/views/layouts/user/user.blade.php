@extends('layouts.webfront.webfront')
@section('page-content')

<div class="main-container">
<div class="container">
<div class="row">

	@include('common.user.sidebar')
	
 	@yield('user-content')
 
</div>
 
</div>
 
</div>

@endsection