<?php  require_once 'base_path.php'; ?>
<html>
<script src="<?php echo BASE_PATH; ?>/js/jquery.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>



<!--alerts CSS -->
<link href="<?php echo BASE_PATH; ?>/css/sweetalert.css" rel="stylesheet" type="text/css">

<style>

.sweet-alert button.ok_bookmark{display:none;}
.sweet-alert button.cancel_bookmark{background-color: #C1C1C1;}


</style>

<head>
	<body>


<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="false" style="display: block;">
 
  <div class="modal-body">

<div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="true" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="true" data-animation="pop" data-timer="null" style="display: block; margin-top: -154px;"><div class="sa-icon sa-error" style="display: none;">
      <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
    </div><div class="sa-icon sa-warning pulseWarning" style="display: block;">
      <span class="sa-body pulseWarningIns"></span>
      <span class="sa-dot pulseWarningIns"></span>
    </div><div class="sa-icon sa-info" style="display: none;"></div>
    
    <div class="sa-icon sa-success animate" style="display: none;">
      <span class="sa-line sa-tip animateSuccessTip"></span>
      <span class="sa-line sa-long animateSuccessLong"></span>

      <div class="sa-placeholder"></div>
      <div class="sa-fix"></div>
    </div>

    <div class="sa-icon sa-custom" style="display: none;"></div><div class="h2"><h2>Are you sure?</h2></div>
    <fieldset>
      <input type="text" tabindex="3" placeholder="">
      <div class="sa-input-error"></div>
    </fieldset><div class="sa-error-container">
      <div class="icon">!</div>
      <p>Not valid!</p>
    </div><div class="sa-button-container">
      <button class="ok_bookmark close full-height close-video" data-dismiss="modal" tabindex="1" style="background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">OK</button>
      <button class="cancel_bookmark" tabindex="2" style="display: inline-block;">Cancel</button>
      <div class="sa-confirm-button-container">
        <button class="confirm_bookmark" data-id="<?php echo $_GET['id']; ?>" tabindex="1" style="display: inline-block; background-color: rgb(221, 107, 85); box-shadow: rgba(221, 107, 85, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Yes, bookmark it!</button><div class="la-ball-fall">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div></div>


   </div>
 
</div>

	
	</body>

</html>



