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
   <div class="col-md-10 col-md-offset-1">

     <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Category Id</th>
            <th>Category Name</th>
            <th>Category Icon</th>
            <th>Show/Hide</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->category_id}}</td>
            <td>{{ $category->category_name}}</td>
            <td>{{ $category->category_name}}</td>
            <td>
              @if ($category->is_active == "0")
              <a href="{{URL('admin/enable_category/'.$category->category_id)}}">Enable</a> 
              @else
              <a href="{{URL('admin/disable_category/'.$category->category_id)}}">Disable</a>
              @endif
            </td>
            <td><a href="{{URL('admin/get_edit_category/'.$category->category_id)}}">Edit</a> / <a href="{{URL('admin/delete_category/'.$category->category_id)}}">Delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

</div>
@endsection