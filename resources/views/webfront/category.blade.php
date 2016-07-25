@extends('layouts.webfront.webfront')
@section('page-content')
<div class="main-container">
	<div class="container">
		<div class="row">

			<div class="col-sm-3 page-sidebar mobile-filter-sidebar">
				<aside>
					<div class="inner-box">
						<div class="categories-list  list-filter">
							<h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
							<ul class=" list-unstyled">
								@foreach ($all_category as $category)
								<li><a href="{{URL('category/'.$category->category_name)}}"><span class="title">{{$category->category_name}}</span><span class="count">&nbsp;8626</span></a>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="locations-list  list-filter">
							<h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
							<ul class="browse-list list-unstyled long-list">
								@foreach ($all_cities as $city)
								<li><a href="javascript:void(0)"><span class="title">{{$city->city_name}}</span></a>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="locations-list  list-filter">
							<h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>
							<form role="form" class="form-inline ">
								<div class="form-group col-sm-4 no-padding">
									<input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
								</div>
								<div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
								<div class="form-group col-sm-4 no-padding">
									<input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
								</div>
								<div class="form-group col-sm-3 no-padding">
									<button class="btn btn-default pull-right btn-block-xs" type="submit">GO
									</button>
								</div>
							</form>
							<div style="clear:both"></div>
						</div>

						<div class="locations-list  list-filter">
							<h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
							<ul class="browse-list list-unstyled long-list">
								<li><a href="sub-category-sub-location.html"><strong>All Ads</strong> <span class="count">228,705</span></a></li>
								<li><a href="sub-category-sub-location.html">Business <span class="count">28,705</span></a></li>
								<li><a href="sub-category-sub-location.html">Personal <span class="count">18,705</span></a></li>
							</ul>
						</div>

						<div class="locations-list  list-filter">
							<h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
							<ul class="browse-list list-unstyled long-list">
								<li><a href="sub-category-sub-location.html">New <span class="count">228,705</span></a>
								</li>
								<li><a href="sub-category-sub-location.html">Used <span class="count">28,705</span></a>
								</li>
								<li><a href="sub-category-sub-location.html">None </a></li>
							</ul>
						</div>

						<div style="clear:both"></div>
					</div>

				</aside>
			</div>

			<div class="col-sm-9 page-content col-thin-left">
				<div class="category-list">
					<div class="tab-box ">

						<ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
							<li class="active"><a href="{{URL('ajax/1.html')}}" data-url="{{URL('ajax/1.html')}}" role="tab" data-toggle="tab">All Ads <span class="badge">228,705</span></a>
							</li>
							<li class=""><a href="ajax/2.html" data-url="ajax/2.html" role="tab" data-toggle="tab">Business
								<span class="badge">22,805</span></a>
							</li>
							<li ><a href="ajax/3.html" data-url="ajax/3.html" role="tab" data-toggle="tab">Personal
								<span class="badge">18,705</span></a>
							</li>
						</ul>
						<div class="tab-filter">
							<div class="selecter select-short-by closed" tabindex="0">
								<select class="selectpicker selecter-element" data-style="btn-select" data-width="auto" tabindex="-1">
									<option value="Short by">Short by</option>
									<option value="Price: Low to High">Price: Low to High</option>
									<option value="Price: High to Low">Price: High to Low</option>
								</select>
								<span class="selecter-selected">Short by</span><div class="selecter-options scroller">
								<div class="scroller-bar" style="height: 100px;">
									<div class="scroller-track" style="height: 100px; margin-bottom: 0px; margin-top: 0px;">
										<div class="scroller-handle"></div>
									</div>
								</div>
								<div class="scroller-content"><span class="selecter-item selected" data-value="Short by">Short by</span><span class="selecter-item" data-value="Price: Low to High">Price: Low to High</span><span class="selecter-item" data-value="Price: High to Low">Price: High to Low</span></div>
							</div>
						</div>
					</div>
				</div>

				<div class="listing-filter">
					<div class="pull-left col-xs-6">
						<div class="breadcrumb-list"><a href="#" class="current"> <span>All ads</span></a> in
							New York <a href="#selectRegion" id="dropdownMenu1" data-toggle="modal"> <span class="caret"></span> </a></div>
						</div>
						<div class="pull-right col-xs-6 text-right listing-view-action"><span class="list-view active"><i class="  icon-th"></i></span> <span class="compact-view"><i class=" icon-th-list  "></i></span> <span class="grid-view"><i class=" icon-th-large "></i></span></div>
						<div style="clear:both"></div>
					</div>


					<div class="mobile-filter-bar col-lg-12  ">
						<ul class="list-unstyled list-inline no-margin no-padding">
							<li class="filter-toggle">
								<a class="">
									<i class="  icon-th-list"></i>
									Filters
								</a>
							</li>
							<li>
								<div class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i> Short
										by </a>
										<ul class="dropdown-menu">
											<li><a href="" rel="nofollow">Relevance</a></li>
											<li><a href="" rel="nofollow">Date</a></li>
											<li><a href="" rel="nofollow">Company</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
						<div class="menu-overly-mask"></div>

						<div class="adds-wrapper">
							<div class="tab-content">
								<div class="tab-pane active">

									@foreach ($adds as $add)
									<div class="item-list">
										<div class="cornerRibbons topAds">
											<a href="#"> Top Ads</a>
										</div>
										<div class="col-sm-2 no-padding photobox">
											<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="/{{$add->img_path}}" alt="img"></a> </div>
										</div>

										<div class="col-sm-7 add-desc-box">
											<div class="add-details">
												<h5 class="add-title"> <a href="{{URL('single-adds/'.$add->slug)}}">
													{{$add->adds_title}} </a> </h5>
													<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">{{$add->adds_type}} </span> <span class="date"><i class=" icon-clock"> </i> 
{{--*/ $time = strtotime($add->created_at);

$newformat = date('d M Y',$time);

$created_at =  $newformat; 
/*--}}
{{$created_at}} </span> - <span class="item-location"><i class="fa fa-map-marker"></i> {{$add->city_name}} </span> </span> </div>
</div>

<div class="col-sm-3 text-right  price-box">
	<h2 class="item-price"> Rs {{$add->price}} </h2>
	<a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>

</div>							
@endforeach



</div>
</div>
</div>

<div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
	Save Search </a></div>
</div>
<div class="pagination-bar text-center">
	{!! $adds->render() !!}
</div>

<div class="post-promo text-center">
	<h2> Do you get anything for sell ? </h2>
	<h5>Sell your products online FOR FREE. It's easier than you think !</h5>
	<a href="{{URL('post-free-add')}}" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
</div>

</div>

</div>
</div>
</div>
@endsection