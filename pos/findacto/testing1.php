<html>
	
	<!DOCTYPE html>
	<html>
 <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

	<script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>  
<script type="text/javascript">  
  $('#upload_widget_opener').cloudinary_upload_widget(
    { cloud_name: 'demo', upload_preset: 'a5vxnzbp', 
      cropping: 'server', folder: 'user_photos' },
    function(error, result) { console.log(error, result) });
</script>

	<head>
		<title></title>
	</head>
	<body>

	<a href="#" class="cloudinary-button" id="upload_widget_opener">Upload Screenshots</a>

	
	</body>
	</html>
</html>