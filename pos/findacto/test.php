<html>
	
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




</head>

<body>

<script>

$( document ).ready(function() {

$('.tags').html($('.tags').html().split(', ').map(function(el) {return '<div class="test">' + el + '</div>'}))

});

</script>

    <div class="tags">Asia, Africa, Australia, Europe</div>


</body>

</html>