<div class="intro" style="background-image: url(images/bg3.jpg);">
	<div class="dtable hw100">
		<div class="dtable-cell hw100">
			<div class="container text-center">
				<h1 class="intro-title animated fadeInDown"> Find Classified Ads </h1>
				<p class="sub animateme fittext3 animated fadeIn"> Find local classified ads on bootclassified in
					Minutes </p>
					<form action="search" method="get" id="search_form">
						<div class="row search-row animated fadeInUp">
							<div class="col-lg-4 col-sm-4 search-col relative locationicon">
								<i class="icon-location-2 icon-append"></i>


								{{--

								 <input type="text" name="country" id="autocomplete-ajax" class="form-control locinput input-rel searchtag-input has-icon" placeholder="City/Zipcode..." value="" autocomplete="off"> 
								 
								 --}}

								 <select id="city" name="city" class="form-control locinput input-rel searchtag-input has-icon">
								 	<option value="">Select City</option>
								 	@foreach ($cities as $city)
								 	<option value="{{$city->id}}">{{$city->city_name}}</option>
								 	@endforeach
								 </select>

								</div>
								<div class="col-lg-4 col-sm-4 search-col relative"><i class="icon-docs icon-append"></i>
									<input type="text" name="ads" id="ads" class="form-control has-icon" placeholder="I&#39;m looking for a ..." value="">
								</div>
								<div class="col-lg-4 col-sm-4 search-col">
									<button class="btn btn-primary btn-search btn-block" type="submit" id="searchBtn"><i class="icon-search"></i><strong>Find</strong></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
