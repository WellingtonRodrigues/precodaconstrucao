<html>
<head>
<link  href="http://localhost/precodaconstrucao/public/css/cropper.min.css" rel="stylesheet">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><!-- jQuery is required -->

<script src="http://localhost/precodaconstrucao/public/js/cropper.min.js"></script>

<div class="container">
  <img src="http://localhost/precodaconstrucao/public/img/temp/loja1.jpg">
</div>

<script type="text/javascript">
$('.container > img').cropper({
	  aspectRatio: 16 / 9,
	  crop: function(data) {
	    //alert(data);
		    alert($().cropper('getData').height);
	  }
	});
</script>

</body>
</html>

