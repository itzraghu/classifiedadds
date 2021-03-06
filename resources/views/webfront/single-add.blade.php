@extends('layouts.webfront.webfront')
@section('page-content')

<div class="main-container">
	<div class="container">
		<ol class="breadcrumb pull-left">
			<li><a href="#"><i class="icon-home fa"></i></a></li>
			<li><a href="{{URL('/')}}">All Ads</a></li>
			<li><a href="{{URL('category/'.$adds->category_name)}}">{{ $adds->category_name }}</a></li>
			{{-- <li class="active">Mobile Phones</li> --}}
		</ol>
		<div class="pull-right backtolist"><a href="{{URL('category/'.$adds->category_name)}}"> <i class="fa fa-angle-double-left"></i> Back to Results</a></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 page-content col-thin-right">
				<div class="inner inner-box ads-details-wrapper">
					<h2> {{ $adds->adds_title }}
						<small class="label label-default adlistingtype">Company ad</small>
					</h2>
					{{--*/ $time = strtotime($adds->created_at);

$newformat = date('d M Y',$time);

$joined =  $newformat; 
/*--}}
<span class="info-row"> <span class="date"><i class=" icon-clock"> </i> {{ $joined }} </span> - <span class="category">{{ $adds->category_name }} </span>- <span class="item-location"><i class="fa fa-map-marker"></i> {{ $adds->city_name }}</span> </span>
<div class="ads-image">
	<h1 class="pricetag"> Rs{{ $adds->price }}</h1>
	<div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 402px;"><ul class="bxslider" style="width: 515%; position: relative; transition-duration: 0s; transform: translate3d(-713px, 0px, 0px);"><li style="float: left; list-style: none; position: relative; width: 713px;" class="bx-clone"><img src="images/item/tp-big/Image00013.jpg" alt="img"></li>
		@if(count($images) > 0)
		@foreach ($images as $image)
		<li style="float: left; list-style: none; position: relative; width: 713px;"><img src="/{{$image->img_path}}" alt="img"></li>
		@endforeach

		@else
		<li style="float: left; list-style: none; position: relative; width: 713px;"><img src="/images/no-img.jpg" alt="img"></li>

		@endif	

	</ul>
</div>
<div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev" href="">Prev</a><a class="bx-next" href="">Next</a></div></div>
</div>
<div id="bx-pager">
	@foreach ($images as $image)
	<a class="thumb-item-link active" data-slide-index="0" href=""><img src="/{{$image->img_path}}" alt="img"></a>
	@endforeach
</div>
</div>

<div class="Ads-Details">
	<h5 class="list-title"><strong>Ads Detsils</strong></h5>
	<div class="row">
		<div class="ads-details-info col-md-8">
			<p>

				{{ $adds->adds_description }}
			</p>
		</div>
		<div class="col-md-4">
			<aside class="panel panel-body panel-details">
				<ul>
					<li>
						<p class=" no-margin "><strong>Price:</strong> Rs {{ $adds->price }}</p>
					</li>
					<li>
						<p class="no-margin"><strong>Type:</strong> {{ $adds->adds_type }}</p>
					</li>
					<li>
						<p class="no-margin"><strong>Location:</strong> {{ $adds->city_name }} </p>
					</li>
								{{-- <li>
									<p class=" no-margin "><strong>Condition:</strong> New</p>
								</li>
								<li>
									<p class="no-margin"><strong>Brand:</strong> Sony</p>
								</li> --}}
							</ul>
						</aside>
						{{-- <div class="ads-action">
							<ul class="list-border">
								<li><a href="#"> <i class=" fa fa-user"></i> More ads by User </a></li>
								<li><a href="#"> <i class=" fa fa-heart"></i> Save ad </a></li>
								<li><a href="#"> <i class="fa fa-share-alt"></i> Share ad </a></li>
								<li><a href="#reportAdvertiser" data-toggle="modal"> <i class="fa icon-info-circled-alt"></i> Report abuse </a></li>
							</ul>
						</div> --}}
					</div>
				</div>
				<div class="content-footer text-left"><a class="btn  btn-default" data-toggle="modal" href="#contactAdvertiser"><i class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info"><i class=" icon-phone-1"></i> {{ $adds->seller_phone }} </a></div>
			</div>
		</div>

	</div>

	<div class="col-sm-3  page-sidebar-right">
		<aside>
			<div class="panel sidebar-panel panel-contact-seller">
				<div class="panel-heading">Contact Seller</div>
				<div class="panel-content user-info">
					<div class="panel-body text-center">
						<div class="seller-info">
							<h3 class="no-margin">{{ $adds->seller_name }}</h3>
							<p>Location: <strong>{{ $adds->city_name }}</strong></p>
							
							<p> Joined: <strong>{{ $joined }}</strong></p>
						</div>
						<div class="user-ads-action"><a href="#contactAdvertiser" data-toggle="modal" class="btn   btn-default btn-block"><i class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info btn-block"><i class=" icon-phone-1"></i> {{ $adds->seller_phone }}
						</a></div>
					</div>
				</div>
			</div>
			<div class="panel sidebar-panel">
				<div class="panel-heading">Safety Tips for Buyers</div>
				<div class="panel-content">
					<div class="panel-body text-left">
						<ul class="list-check">
							<li> Meet seller at a public place</li>
							<li> Check the item before you buy</li>
							<li> Pay only after collecting the item</li>
						</ul>
						<p><a class="pull-right" href="#"> Know more <i class="fa fa-angle-double-right"></i> </a></p>
					</div>
				</div>
			</div>

		</aside>
	</div>

</div>
</div>
</div>

@endsection