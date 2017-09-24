<?php 
session_start(); 
require_once '../../../base_path.php';
?>
<html>
 <head>
 <link href="<?php echo BASE_PATH; ?>/assets/styles.css" rel="stylesheet" media="screen"> 
 </head>
 <body>

<div class="video-loading"><img src="<?php echo BASE_PATH; ?>/img/loading.gif"/></div>

 <!--Max recording is set to 5 minutes -->

<!-- begin video recorder code -->
<script type="text/javascript">
var size = {width:400,height:330};
var flashvars = {qualityurl: "avq/300p.xml",accountHash:"806aaf1fee6d34f6268b141febc7cba3", eid:1, showMenu:"true", mrt:300,sis:0,asv:1,mv:0, payload:"{\"userID\":\"<?php echo $_SESSION['participantSession']; ?>\",\"Answer\":\"PossibleAnswer4_Question2\",\"ProjectID\":\"<?php echo $_GET['id']; ?>\"}"};
(function() {var pipe = document.createElement('script'); pipe.type = 'text/javascript'; pipe.async = true;pipe.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 's1.addpipe.com/1.3/pipe.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pipe, s);})();
</script>
<div id="hdfvr-content" ></div>
<!-- end video recorder code -->

 </body>

</html>