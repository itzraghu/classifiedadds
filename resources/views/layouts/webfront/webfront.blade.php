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

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script>
	paceOptions = {
		elements: true
	};
</script>
<script src="js/pace.min.js"></script>
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



	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>

	<script src="js/jquery.matchHeight-min.js"></script>

	<script src="js/hideMaxListItem.js"></script>

	<script src="plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
	<script src="plugins/jquery.fs.scroller/jquery.fs.selecter.js"></script>

	<script src="js/script.js"></script>
	<script>


	</script>

	<script type="text/javascript" src="js/jquery.mockjax.js"></script>
	<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
	<script type="text/javascript" src="js/usastates.js"></script>
	<script type="text/javascript" src="js/autocomplete-demo.js"></script>


	<div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>



</body>	
</html>