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
<li><a href="sub-category-sub-location.html"><span class="title">Electronics</span><span class="count">&nbsp;8626</span></a>
</li>
<li><a href="sub-category-sub-location.html"><span class="title">Automobiles </span><span class="count">&nbsp;123</span></a></li>
<li><a href="sub-category-sub-location.html"><span class="title">Property </span><span class="count">&nbsp;742</span></a></li>
<li><a href="sub-category-sub-location.html"><span class="title">Services </span><span class="count">&nbsp;8525</span></a></li>
<li><a href="sub-category-sub-location.html"><span class="title">For Sale </span><span class="count">&nbsp;357</span></a></li>
<li><a href="sub-category-sub-location.html"><span class="title">Learning </span><span class="count">&nbsp;3576</span></a></li>
<li><a href="sub-category-sub-location.html"><span class="title">Jobs </span><span class="count">&nbsp;453</span></a></li>
<li><a href="sub-category-sub-location.html"><span class="title">Cars &amp; Vehicles</span><span class="count">&nbsp;801</span></a>
</li>
<li><a href="sub-category-sub-location.html"><span class="title">Other</span><span class="count">&nbsp;9803</span></a></li>
</ul>
</div>
 
<div class="locations-list  list-filter">
<h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
<ul class="browse-list list-unstyled long-list">
<li><a href="sub-category-sub-location.html"> Atlanta </a></li>
<li><a href="sub-category-sub-location.html"> Wichita </a></li>
<li><a href="sub-category-sub-location.html"> Anchorage </a></li>
<li><a href="sub-category-sub-location.html"> Dallas </a></li>
<li><a href="sub-category-sub-location.html">New York </a></li>
<li><a href="sub-category-sub-location.html"> Santa Ana/Anaheim </a></li>
<li><a href="sub-category-sub-location.html"> Miami </a></li>
<li><a href="sub-category-sub-location.html"> Virginia Beach </a></li>
<li class="maxlist-hidden" style="display: none;"><a href="sub-category-sub-location.html"> San Diego </a></li>
<li class="maxlist-hidden" style="display: none;"><a href="sub-category-sub-location.html"> Boston </a></li>
<li class="maxlist-hidden" style="display: none;"><a href="sub-category-sub-location.html"> Houston </a></li>
<li class="maxlist-hidden" style="display: none;"><a href="sub-category-sub-location.html">Salt Lake City </a></li>
<li class="maxlist-hidden" style="display: none;"><a href="sub-category-sub-location.html"> Other Locations </a></li>
</ul><p class="maxlist-more"><a href="#">View More (5)</a></p>
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
<li class=""><a href="ajax/1.html" data-url="ajax/1.html" role="tab" data-toggle="tab">All Ads <span class="badge">228,705</span></a>
</li>
<li class=""><a href="ajax/2.html" data-url="ajax/2.html" role="tab" data-toggle="tab">Business
<span class="badge">22,805</span></a></li>
<li class="active"><a href="ajax/3.html" data-url="ajax/3.html" role="tab" data-toggle="tab">Personal
<span class="badge">18,705</span></a></li>
</ul>
<div class="tab-filter">
<div class="selecter select-short-by closed" tabindex="0"><select class="selectpicker selecter-element" data-style="btn-select" data-width="auto" tabindex="-1">
<option value="Short by">Short by</option>
<option value="Price: Low to High">Price: Low to High</option>
<option value="Price: High to Low">Price: High to Low</option>
</select><span class="selecter-selected">Short by</span><div class="selecter-options scroller"><div class="scroller-bar" style="height: 100px;"><div class="scroller-track" style="height: 100px; margin-bottom: 0px; margin-top: 0px;"><div class="scroller-handle"></div></div></div><div class="scroller-content"><span class="selecter-item selected" data-value="Short by">Short by</span><span class="selecter-item" data-value="Price: Low to High">Price: Low to High</span><span class="selecter-item" data-value="Price: High to Low">Price: High to Low</span></div></div></div>
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
<div class="tab-pane active" id="allAds">
<div class="item-list">
<div class="cornerRibbons topAds">
<a href="#"> Top Ads</a>
</div>
<div class="col-sm-2 no-padding photobox">
<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00015.jpg" alt="img"></a> </div>
</div>
 
<div class="col-sm-7 add-desc-box">
<div class="add-details">
<h5 class="add-title"> <a href="ads-details.html">
Brand New Samsung Phones </a> </h5>
<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
</div>
 
<div class="col-sm-3 text-right  price-box">
<h2 class="item-price"> $ 320 </h2>
<a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
 
</div>
 
<div class="item-list">
<div class="cornerRibbons featuredAds">
<a href="#"> Featured Ads</a>
</div>
<div class="col-sm-2 no-padding photobox">
<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00008.jpg" alt="img"></a> </div>
</div>
 
<div class="col-sm-7 add-desc-box">
<div class="add-details">
<h5 class="add-title"> <a href="ads-details.html">
Sony Xperia dual sim 100% brand new </a> </h5>
<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
</div>
 
<div class="col-sm-3 text-right  price-box">
<h2 class="item-price"> $ 250 </h2>
<a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
 
</div>
<div class="item-list">
<div class="cornerRibbons urgentAds">
<a href="#"> Urgent</a>
</div>
<div class="col-sm-2 no-padding photobox">
<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/FreeGreatPicture.com-46404-google-drops-nexus-4-by-100-offers-15-day-price-protection-refund.jpg" alt="img"></a> </div>
</div>
 
<div class="col-sm-7 add-desc-box">
<div class="add-details">
<h5 class="add-title"> <a href="ads-details.html"> Google drops Nexus 4 </a> </h5>
<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
</div>
 
<div class="col-sm-3 text-right  price-box">
<h2 class="item-price"> $ 150 </h2>
<a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Urgent</span> </a>
<a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
 
</div>
 
 
<div class="item-list">
<div class="col-sm-2 no-padding photobox">
<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00014.jpg" alt="img"></a> </div>
</div>
 
<div class="col-sm-7 add-desc-box">
<div class="add-details">
<h5 class="add-title"> <a href="ads-details.html"> Samsung Galaxy S Dous (Brand New/ Intact Box) With 1year Warranty </a> </h5>
<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
</div>
 
<div class="col-sm-3 text-right  price-box">
<h2 class="item-price"> $ 230</h2>
<a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
 
</div>
 
<div class="item-list">
<div class="col-sm-2 no-padding photobox">
<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00003.jpg" alt="img"></a> </div>
</div>
 
<div class="col-sm-7 add-desc-box">
<div class="add-details">
<h5 class="add-title"> <a href="ads-details.html"> MSI GE70 Apache Pro-061 17.3" Core i5-4200H/8GB DDR3/NV GTX860M Gaming Laptop </a> </h5>
<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
</div>
 
<div class="col-sm-3 text-right  price-box">
<h2 class="item-price"> $ 400 </h2>
<a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
 
</div>
 
<div class="item-list">
<div class="col-sm-2 no-padding photobox">
<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00022.jpg" alt="img"></a> </div>
</div>
 
<div class="col-sm-7 add-desc-box">
<div class="add-details">
<h5 class="add-title"> <a href="ads-details.html"> Apple iPod touch 16 GB 3rd Generation </a> </h5>
<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
</div>
 
<div class="col-sm-3 text-right  price-box">
<h2 class="item-price"> $ 150 </h2>
<a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
 
</div>
 
<div class="item-list">
<div class="col-sm-2 no-padding photobox">
<div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/FreeGreatPicture.com-46405-google-drops-price-of-nexus-4-smartphone.jpg" alt="img"></a> </div>
</div>
 
<div class="col-sm-7 add-desc-box">
<div class="add-details">
<h5 class="add-title"> <a href="ads-details.html"> Google drops Nexus 4 by $100, offers 15 day price protection refund </a> </h5>
<span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
</div>
 
<div class="col-sm-3 text-right  price-box">
<h2 class="item-price"> $ 150 </h2>
<a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
 
</div>
 
</div>
</div>
</div>
 
<div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
Save Search </a></div>
</div>
<div class="pagination-bar text-center">
<ul class="pagination">
<li class="active"><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li><a href="#"> ...</a></li>
<li><a class="pagination-btn" href="#">Next »</a></li>
</ul>
</div>
 
<div class="post-promo text-center">
<h2> Do you get anything for sell ? </h2>
<h5>Sell your products online FOR FREE. It's easier than you think !</h5>
<a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
</div>
 
</div>
 
</div>
</div>
</div>
@endsection