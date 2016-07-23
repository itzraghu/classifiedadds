@extends('layouts.webfront.webfront')

@section('page-content')
@include('common.webfront.search')
<div class="main-container">
	<div class="container">
		<div class="col-lg-12 content-box ">
			<div class="row row-featured row-featured-category">
				<div class="col-lg-12  box-title no-border">
					<div class="inner"><h2><span>Browse by</span>
						Category <a href="javascript:void(0)"  class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>
					</div>
				</div>
				@foreach ($categories as $category)
				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category" style="height: 162px;">
					<a href="{{URL('category/'.$category->category_name)}}" ><img src="/{{$category->category_icon}}" class="img-responsive" alt="img">
						<h6> {{$category->category_name}} </h6></a>
					</div>
					@endforeach			
				</div>
			</div>
			<div style="clear: both"></div>
			<div class="col-lg-12 content-box ">
				<div class="row row-featured">
					<div class="col-lg-12  box-title ">
						<div class="inner"><h2><span>Sponsored </span>Products <a href="/category"  class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>
						</div>
					</div>
					<div style="clear: both"></div>
					<div class=" relative  content featured-list-row clearfix">
						<nav class="slider-nav has-white-bg nav-narrow-svg">
							<a class="prev">
								<span class="nav-icon-wrap"></span>
							</a>
							<a class="next">
								<span class="nav-icon-wrap"></span>
							</a>
						</nav>
						<div class="no-margin featured-list-slider  owl-carousel owl-theme" style="opacity: 1; display: block;">
							<div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2864px; left: 0px; display: block;"><div class="owl-item" style="width: 179px;"><div class="item"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details-automobile.html">
								<span class="item-carousel-thumb">
									<img class="img-responsive" src="images/2012-mercedes-benz-sls-amg.jpg" alt="img">
								</span>
								<span class="item-name"> 2011 Mercedes-Benz SLS AMG </span>
								<span class="price"> $204,990 </span>
							</a>
						</div></div><div class="owl-item" style="width: 179px;"><div class="item">
						<a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details.html">
							<span class="item-carousel-thumb">
								<img class="img-responsive" src="images/Image00011.jpg" alt="img">
							</span>
							<span class="item-name"> Lorem ipsum dolor sit amet </span>
							<span class="price"> $ 260 </span>
						</a>
					</div></div><div class="owl-item" style="width: 179px;"><div class="item"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details.html">
					<span class="item-carousel-thumb"> <img class="item-img" src="images/Image00006.jpg" alt="img"> </span>
					<span class="item-name"> consectetuer adipiscing elit </span>
					<span class="price"> $ 240 </span></a></div></div><div class="owl-item" style="width: 179px;"><div class="item"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details.html">
					<span class="item-carousel-thumb"> <img class="item-img" src="images/Image00022.jpg" alt="img"> </span>
					<span class="item-name"> sed diam nonummy </span> <span class="price"> $ 140</span></a>
				</div></div><div class="owl-item" style="width: 179px;"><div class="item"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details.html">
				<span class="item-carousel-thumb"> <img class="item-img" src="images/Image00013.jpg" alt="img"> </span><span class="item-name"> feugiat nulla facilisis </span> <span class="price"> $ 140 </span></a></div></div><div class="owl-item" style="width: 179px;"><div class="item"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details.html">
				<span class="item-carousel-thumb"> <img class="item-img" src="images/3.jpg" alt="img"> </span> <span class="item-name"> praesent luptatum zzril </span>
				<span class="price"> $ 220 </span></a></div></div><div class="owl-item" style="width: 179px;"><div class="item"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details.html">
				<span class="item-carousel-thumb"> <img class="item-img" src="images/4.jpg" alt="img"> </span> <span class="item-name"> delenit augue duis dolore </span>
				<span class="price"> $ 120 </span></a></div></div><div class="owl-item" style="width: 179px;"><div class="item"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ads-details.html">
				<span class="item-carousel-thumb"> <img class="item-img" src="images/6.jpg" alt="img"> </span> <span class="item-name"> te feugait nulla facilisi </span>
				<span class="price"> $ 251 </span></a></div></div></div></div>







			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 content-box ">
	<div class="row row-featured">
		<div style="clear: both"></div>
		<div class=" relative  content  clearfix">
			<div class="">
				<div class="tab-lite">

					<ul class="nav nav-tabs " role="tablist">
						<li role="presentation" class="active"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/index-v-2.html#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><i class="icon-location-2"></i> Top Locations</a></li>
						<li role="presentation"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/index-v-2.html#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><i class="icon-search"></i> Top Search</a>
						</li>
						<li role="presentation"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/index-v-2.html#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><i class="icon-th-list"></i> Top Makes</a>
						</li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="tab1">
							<div class="col-lg-12 tab-inner">
								<div class="row">
									<ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Atlanta</a></li>
										<li><a href="/category" > Dallas </a></li>
										<li><a href="/category" > New York </a></li>
										<li><a href="/category" >Santa Ana/Anaheim </a></li>
										<li><a href="/category" >Wichita </a></li>
										<li><a href="/category" > Anchorage </a></li>
										<li><a href="/category" > Miami </a></li>
										<li><a href="/category" >Los Angeles</a></li>
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="tab2">
							<div class="col-lg-12 tab-inner">
								<div class="row">
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
									</ul>
									<ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Atlanta</a></li>
										<li><a href="/category" >Wichita </a></li>
										<li><a href="/category" > Anchorage </a></li>
										<li><a href="/category" > Dallas </a></li>
										<li><a href="/category" > New York </a></li>
										<li><a href="/category" >Santa Ana/Anaheim </a></li>
										<li><a href="/category" > Miami </a></li>
										<li><a href="/category" >Los Angeles</a></li>
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
									</ul>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="tab3">
							<div class="col-lg-12 tab-inner">
								<div class="row">
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
									</ul>
									<ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Atlanta</a></li>
										<li><a href="/category" >Wichita </a></li>
										<li><a href="/category" > Anchorage </a></li>
										<li><a href="/category" > Dallas </a></li>
										<li><a href="/category" > New York </a></li>
										<li><a href="/category" >Santa Ana/Anaheim </a></li>
										<li><a href="/category" > Miami </a></li>
										<li><a href="/category" >Los Angeles</a></li>
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li><a href="/category" >Virginia Beach </a></li>
										<li><a href="/category" > San Diego </a></li>
										<li><a href="/category" >Boston </a></li>
										<li><a href="/category" >Houston</a></li>
										<li><a href="/category" >Salt Lake City </a></li>
										<li><a href="/category" >San Francisco </a></li>
										<li><a href="/category" >Tampa </a></li>
										<li><a href="/category" > Washington DC </a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-9 page-content col-thin-right">
		<div class="inner-box category-content">
			<h2 class="title-2">Find Classified Ads World Wide </h2>
			<div class="row">
				<div class="col-md-4 col-sm-4 ">
					<div class="cat-list">
						<h3 class="cat-title"><a href="/category" ><i class="fa fa-car ln-shadow"></i>
							Automobiles <span class="count">277,959</span> </a>
							<span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
						</h3>
						<ul class="cat-collapse collapse in cat-id-1" style="height: auto;">
							<li><a href="/category" >Car Parts &amp; Accessories</a></li>
							<li><a href="/category" >Campervans &amp; Caravans</a></li>
							<li><a href="/category" >Motorbikes &amp; Scooters</a></li>
							<li><a href="/category" >Motorbike Parts &amp; Accessories</a></li>
							<li><a href="/category" >Vans, Trucks &amp; Plant</a></li>
							<li><a href="/category" >Wanted</a></li>
						</ul>
					</div>
					<div class="cat-list">
						<h3 class="cat-title"><a href="/category" ><i class="icon-home ln-shadow"></i>
							Property <span class="count">228,705</span></a> <span data-target=".cat-id-2" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span></h3>
							<ul class="cat-collapse collapse in cat-id-2" style="height: auto;">
								<li><a href="/category" >House for Rent</a></li>
								<li><a href="/category" >House for Sale </a></li>
								<li><a href="/category" > Apartments For Sale </a></li>
								<li><a href="/category" >Apartments for Rent </a></li>
								<li><a href="/category" >Farms-Ranches </a></li>
								<li><a href="/category" >Land </a></li>
								<li><a href="/category" >Vacation Rentals </a></li>
								<li><a href="/category" >Commercial Building</a></li>
							</ul>
						</div>
						<div class="cat-list">
							<h3 class="cat-title"><a href="/category" ><i class="icon-home ln-shadow"></i>
								Jobs <span class="count">6375</span></a>
								<span data-target=".cat-id-3" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
							</h3>
							<ul class="cat-collapse collapse in cat-id-3" style="height: auto;">
								<li><a href="/category" >Full Time Jobs</a></li>
								<li><a href="/category" >Internet Jobs </a></li>
								<li><a href="/category" >Learn &amp; Earn jobs </a></li>
								<li><a href="/category" > Manual Labor Jobs </a></li>
								<li><a href="/category" >Other Jobs </a></li>
								<li><a href="/category" >OwnBusiness </a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="cat-list">
							<h3 class="cat-title"><a href="/category" ><i class="fa fa-briefcase ln-shadow"></i> Services <span class="count">45,526</span></a>
								<span data-target=".cat-id-4" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
							</h3>
							<ul class="cat-collapse collapse in cat-id-4" style="height: auto;">
								<li><a href="/category" >Building, Home &amp; Removals</a></li>
								<li><a href="/category" >Entertainment</a></li>
								<li><a href="/category" >Health &amp; Beauty</a></li>
								<li><a href="/category" >Miscellaneous</a></li>
								<li><a href="/category" >Property &amp; Shipping</a></li>
								<li><a href="/category" >Tax, Money &amp; Visas</a></li>
								<li><a href="/category" >Telecoms &amp; Computers</a></li>
								<li><a href="/category" >Travel Services &amp; Tours</a></li>
								<li><a href="/category" >Tuition &amp; Lessons</a></li>
							</ul>
						</div>
						<div class="cat-list">
							<h3 class="cat-title"><a href="/category" ><i class="icon-book-open ln-shadow"></i> Learning <span class="count">26,529</span></a> <span data-target=".cat-id-5" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
							</h3>
							<ul class="cat-collapse collapse in cat-id-5" style="height: auto;">
								<li><a href="/category" > Automotive Classes </a></li>
								<li><a href="/category" > Computer Multimedia Classes </a></li>
								<li><a href="/category" > Sports Classes </a></li>
								<li><a href="/category" > Home Improvement Classes </a></li>
								<li><a href="/category" > Language Classes </a></li>
								<li><a href="/category" > Music Classes </a></li>
								<li><a href="/category" > Personal Fitness </a></li>
								<li><a href="/category" > Other Classes </a></li>
							</ul>
						</div>
						<div class="cat-list">
							<h3 class="cat-title"><a href="/category" ><i class="icon-guidedog ln-shadow"></i> Pets <span class="count">42,111</span></a>
								<span data-target=".cat-id-6" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
							</h3>
							<ul class="cat-collapse collapse in cat-id-6" style="height: auto;">
								<li><a href="/category" >Pets for Sale</a></li>
								<li><a href="/category" >Petsitters &amp; Dogwalkers</a></li>
								<li><a href="/category" >Equipment &amp; Accessories</a></li>
								<li><a href="/category" >Missing, Lost &amp; Found</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4   last-column">
						<div class="cat-list">
							<h3 class="cat-title"><a href="/category" ><i class=" icon-basket-1 ln-shadow"></i> For Sale <span class="count">64,526</span></a> <span data-target=".cat-id-7" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
							</h3>
							<ul class="cat-collapse collapse in cat-id-7" style="height: auto;">
								<li><a href="/category" >Audio &amp; Stereo</a></li>
								<li><a href="/category" >Baby &amp; Kids Stuff</a></li>
								<li><a href="/category" >CDs, DVDs, Games &amp; Books</a></li>
								<li><a href="/category" >Clothes, Footwear &amp; Accessories</a></li>
								<li><a href="/category" >Computers &amp; Software</a></li>
								<li><a href="/category" >Home &amp; Garden</a></li>
								<li><a href="/category" >Music &amp; Instruments</a></li>
								<li><a href="/category" >Office Furniture &amp; Equipment</a></li>
								<li><a href="/category" >Phones, Mobile Phones &amp; Telecoms</a></li>
								<li><a href="/category" >Sports, Leisure &amp; Travel</a></li>
								<li><a href="/category" >Tickets</a></li>
								<li><a href="/category" >TV, DVD &amp; Cameras</a></li>
								<li><a href="/category" >Video Games &amp; Consoles</a></li>
								<li><a href="/category" >Freebies</a></li>
								<li><a href="/category" >Miscellaneous Goods</a></li>
								<li><a href="/category" >Stuff Wanted</a></li>
								<li><a href="/category" >Swap Shop</a></li>
							</ul>
						</div>
						<div class="cat-list ">
							<h3 class="cat-title"><a href="/category" ><i class=" icon-theatre ln-shadow"></i> Community <span class="count">5,30</span> </a> <span data-target=".cat-id-8" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
							</h3>
							<ul class="cat-collapse collapse in cat-id-8" style="height: auto;">
								<li><a href="/category" >Announcements </a></li>
								<li><a href="/category" >Car Pool - Bike Ride </a></li>
								<li><a href="/category" >Charity - Donate - NGO </a></li>
								<li><a href="/category" >Lost - Found </a></li>
								<li><a href="/category" >Tender Notices </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="inner-box has-aff relative">
				<a class="dummy-aff-img" href="/category" ><img src="images/aff2.jpg" class="img-responsive" alt=" aff"> </a>
			</div>
		</div>
		<div class="col-sm-3 page-sidebar col-thin-left">
			<aside>
				<div class="inner-box no-padding">
					<div class="inner-box-content"><a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/index-v-2.html#"><img class="img-responsive" src="images/app.jpg" alt="tv"></a>
					</div>
				</div>
				<div class="inner-box">
					<h2 class="title-2">Popular Categories </h2>
					<div class="inner-box-content">
						<ul class="cat-list arrow">
							@foreach ($categories as $category)
							<li><a href="{{URL('category/'.$category->category_name)}}"> {{$category->category_name}} </a></li>
							@endforeach
							
						</ul>
					</div>
				</div>
				<div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
				</div>
			</aside>
		</div>
	</div>
</div>
</div>

@include('common.webfront.footer-top')
@endsection