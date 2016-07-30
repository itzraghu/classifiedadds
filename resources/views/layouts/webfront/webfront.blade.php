<!DOCTYPE html>
<!-- saved from url=(0069)http://templatecycle.com/demo/bootclassified-v1.4/dist/index-v-2.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://templatecycle.com/demo/bootclassified-v1.4/dist/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://templatecycle.com/demo/bootclassified-v1.4/dist/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://templatecycle.com/demo/bootclassified-v1.4/dist/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="http://templatecycle.com/demo/bootclassified-v1.4/dist/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="http://templatecycle.com/demo/bootclassified-v1.4/dist/assets/ico/favicon.png">
<title>Classified Adds</title>

{!! Html::style("css/bootstrap.min.css") !!}
{!! Html::style("css/fileinput.css") !!}
{!! Html::style("css/style.css") !!}

{!! Html::style("css/owl.carousel.css") !!}
{!! Html::style("css/owl.theme.css") !!}


{!! Html::style("css/owl.theme.css") !!}
{!! Html::style("css/sweetalert.css") !!}


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script>
	paceOptions = {
		elements: true
	};
</script>
{!! Html::script("js/pace.min.js") !!}
</head>
<body class=" pace-done">
	<div class="pace  pace-inactive">
		<div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
			<div class="pace-progress-inner"></div>
		</div>
		<div class="pace-activity"></div>
	</div>
	<div id="wrapper">
		<!-- header -->
		@include('common.webfront.header')
		<!-- search area -->

		@yield('page-content')

		<!-- footer area -->

		@include('common.webfront.footer')

	</div>


	{!! Html::script("js/pace.min.js") !!}
	{!! Html::script("js/jquery.min.js") !!}
	{!! Html::script("js/bootstrap.min.js") !!}

	{!! Html::script("js/owl.carousel.min.js") !!}

	{!! Html::script("js/jquery.matchHeight-min.js") !!}

	{!! Html::script("js/hideMaxListItem.js") !!}

	{!! Html::script("plugins/jquery.fs.scroller/jquery.fs.scroller.js") !!}
	{!! Html::script("plugins/jquery.fs.selecter/jquery.fs.selecter.js") !!}

	{!! Html::script("js/script.js") !!}
	<script>


	</script>

	{{-- {!! Html::script("js/jquery.mockjax.js") !!} --}}
	{{-- {!! Html::script("js/jquery.autocomplete.js") !!} --}}
	{!! Html::script("js/usastates.js") !!}
	{{-- {!! Html::script("js/autocomplete-demo.js") !!} --}}
	{!! Html::script("js/sweetalert.min.js") !!}
	<script>
		$(document).ready(function() {
			$( "#searchBtn" ).click(function(event) {
				var city = $("#city option:selected").val();
				var ads = $("#ads").val();

				if(city =="" || ads == ""){
					if(city == ""){
						swal(" Website Says", "Please select city!", "error");
						$("#city").focus();
						return false;
					}
					else {
						swal(" Website Says", "What are you Looking for ?", "error");
						$("#ads").focus();
						return false;
					}
				}

			});
			$( "#category_id").on('change',function(e){
				var cat_id = e.target.value;

				$.get('/ajax_subcat/'+cat_id, function(data) {
					$( "#sub_category_id").empty();
					$.each(data, function(index, subcat) {
						$( "#sub_category_id").append('<option value="'+subcat.name+'">'+subcat.name+'</option>');
					});
				});
			});

		});
	</script>


	<div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>



</body>
</html>