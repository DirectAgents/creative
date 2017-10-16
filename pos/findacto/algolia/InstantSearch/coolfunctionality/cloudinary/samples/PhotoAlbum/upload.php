<?php
header("Access-Control-Allow-Origin: *");
require 'main.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>PhotoAlbum - Upload page2</title>

	<link href="style.css" media="all" rel="stylesheet" />

    <link rel="shortcut icon"
     href="<?php echo cloudinary_url("http://cloudinary.com/favicon.png",
           array("type" => "fetch")); ?>" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/vendor/jquery.ui.widget.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.iframe-transport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.fileupload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-jquery-file-upload/2.1.2/cloudinary-jquery-file-upload.js"></script>
    <?php echo cloudinary_js_config(); ?>
  </head>
  
  <body>
  	
    <div id="logo">
      <!-- This will render the image fetched from a remote HTTP URL using Cloudinary -->
      <?php echo fetch_image_tag("http://cloudinary.com/images/logo.png") ?>
    </div>
    
    <div id="posterframe">
      <!-- This will render the fetched Facebook profile picture using Cloudinary according to the
           requested transformations -->
      <?php echo facebook_profile_image_tag("officialchucknorrispage", array(
        "format" => "png",
        "transformation" => array(
          array("height" => 95, "width" => 95, "crop" => "thumb", "gravity" => "face",
            "effect" => "sepia", "radius" => 20
          ), array("angle" => 10)
        ))); 
      ?>
    </div>

    

    
    <!-- A form for direct uploading using a jQuery plug-in. 
          The cl_image_upload_tag PHP function generates the required HTML and JavaScript to
          allow uploading directly from the browser to your Cloudinary account -->
    <?php
      $unsigned = "1";
    ?>


    <div id='direct_upload'>
      <h1>Direct <?php if ($unsigned) echo "unsigned "; ?>upload from the browser</h1>

      
<div class="main_upload_holder">
<div class="drag_area main_drag_area">
<div class="drag_inner">
<span>
Drop files here
<span class="small">or</span>
</span>
<div class="upload_button_holder">
<div class="upload_button_inner_holder">


      <form>
      <?php
        if ($unsigned) {
          # For the sake of simplicity of the sample site, we generate the preset on the fly. It only needs to be created once, in advance.
          $api = new \Cloudinary\Api();
          //$upload_preset = "sample_" . substr(sha1(Cloudinary::config_get("api_key") . Cloudinary::config_get("api_secret")), 0, 10);
          $upload_preset = "scnk5xom";
          try {
              $api->upload_preset($upload_preset);
          } catch (\Cloudinary\Api\NotFound $e) {
              $api->create_upload_preset(array("name"=>$upload_preset, "unsigned"=>TRUE, "folder"=>"preset_folder"));
          }
          # The callback URL is set to point to an HTML file on the local server which works-around restrictions 
          # in older browsers (e.g., IE) which don't full support CORS.
          echo cl_unsigned_image_upload_tag('test', $upload_preset, array("tags" => "direct_photo_album", "callback" => $cors_location, "html" => array("multiple" => true)));          
        } else {
          # The callback URL is set to point to an HTML file on the local server which works-around restrictions 
          # in older browsers (e.g., IE) which don't full support CORS.
          echo cl_image_upload_tag('test', array("tags" => "direct_photo_album", "callback" => $cors_location, "html" => array("multiple" => true)));
        }
      ?>
      
      </form>


</div>

</div>
</div>
</div>
</div>



    <!-- status box -->
    <div class="status">
      <h2>Status</h2>
      <span class="status_value">Idle</span>
    </div>
  
      <div class="uploaded_info_holder">
      </div>
    </div>

    <a href="list.php" class="back_link">Back to list...</a>
    
    <script>
      function prettydump(obj) {
        ret = "";
        $.each(obj, function(key, value) {
          ret += "<tr><td>" + key + "</td><td>" + value + "</td></tr>";
        });
        return ret;
      }
      
      $(function() {
        $('.cloudinary-fileupload')
        .cloudinary_fileupload({
          dropZone: '#direct_upload',
          start: function () {
            $('.status_value').text('Starting direct upload...');
          },
          progress: function () {
            $('.status_value').text('Uploading...');
          }
        })
        .on('cloudinarydone', function (e, data) {
            $('.status_value').text('Idle');
            $.post('upload_complete.php', data.result);
            var info = $('<div class="uploaded_info"/>');
            //$(info).append($('<div class="data"/>').append(prettydump(data.result)));
            $(info).append($('<div class="image"/>').append(
          	  $.cloudinary.image(data.result.public_id, {
            	  format: data.result.format, width: 150, height: 150, crop: "fill"
          	  })
            ));
            $('.uploaded_info_holder').append(info);
        });
      });
    </script>
  </body> 
</html>

