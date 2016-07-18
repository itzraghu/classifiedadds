@extends('layouts.user.user')
@section('user-content')

<div class="col-sm-9 page-content">
	<div class="inner-box">
		<h2 class="title-2"><i class="icon-docs"></i> My Ads </h2>
		<div class="table-responsive">
			<div class="table-action">
				<label for="checkAll">
					<input type="checkbox" onclick="checkAll(this)" id="checkAll">
					Select: All | <a href="#" class="btn btn-xs btn-danger">Delete <i class="glyphicon glyphicon-remove "></i></a> </label>
					<div class="table-search pull-right col-xs-7">
						<div class="form-group">
							<label class="col-xs-5 control-label text-right">Search <br>
								<a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
							</label>
							<div class="col-xs-7 searchpan">
								<input type="text" class="form-control" id="filter">
							</div>
						</div>
					</div>
				</div>
				<table id="addManageTable" class="table table-striped table-bordered add-manage-table table demo footable-loaded footable" data-filter="#filter" data-filter-text-only="true">
					<thead>
						<tr>
							<th data-type="numeric" data-sort-initial="true"></th>
							<th> Photo</th>
							<th data-sort-ignore="true"> Adds Details</th>
							<th data-type="numeric"> Price</th>
							<th> Status</th>
							<th> Option</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($adds as $add)
						<tr>
							<td style="width:2%" class="add-img-selector">
								<div class="checkbox">
									<label>
										<input type="checkbox">
									</label>
								</div>
							</td>
							<td style="width:14%" class="add-img-td"><a href="ads-details.html"><img class="thumbnail  img-responsive" src="images/item/FreeGreatPicture.com-46407-nexus-4-starts-at-199.jpg" alt="img"></a></td>
							<td style="width:58%" class="ads-details-td">
								<div>
									<p><strong> <a href="ads-details.html" title="Brend New Nexus 4">{{$add->adds_title}}
									</a> </strong></p>
									<p><strong> Posted On </strong>:
										{{$add->created_at}} </p>
										<p><strong>Visitors </strong>: 221 <strong>Located In:</strong> {{$add->location}}
										</p>
									</div>
								</td>
								<td style="width:16%" class="price-td">
									<div><strong> Rs.{{$add->price}}</strong></div>
								</td>

								<td style="width:16%" class="price-td">
									@if ($add->is_approved == "0")
									<span class="btn btn-danger">Pending</span>
									@else
									<span class="btn btn-primary">Approved</span>
									@endif
								</td>


								<td style="width:10%" class="action-td">
									<div>
										<p><a class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Edit </a>
										</p>
										<p><a class="btn btn-info btn-xs"> <i class="fa fa-mail-forward"></i> Share
										</a></p>
										<p><a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete
										</a></p>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>

		@endsection