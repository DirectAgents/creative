<?php
/*
	Plugin Name: RS Sliding Contact Form
	Author: Roman Sharf
	Description: Creates a sliding contact form. Needs the contact form 7 plugin
*/ 

add_action('wp_enqueue_scripts', 'rs_enqueue_scripts');
function rs_enqueue_scripts()
{
	wp_enqueue_script( 'slide_script', plugins_url( 'scripts/slide-script.js', __FILE__),array('jquery'));
	wp_enqueue_style( 'slide_styles', plugins_url( 'css/slide-styles.css', __FILE__));
	
	$ajax_url = array( 'ajax_url' => admin_url('admin-ajax.php'));
	wp_localize_script('slide_script', 'ajax_url', $ajax_url);
}

add_action('rs_slide_contact_form', 'rs_contact_form');
function rs_contact_form ()
{ ?>
	 <div class="rs-contact" id="rs-contact">
		
		<form action="" method="POST" class="rs-form" id="rs-form">

			<h3 class="form-title">Get Started ▼</h3>
			
			<p>
				<span class="rs-form-wrap your-name">
					<input type="text" name="name" value="Name" size="40" class="rs-text rs-form-field required" aria-required="true" aria-invalid="false">
				</span> 
			</p>

			<p>
				<span class="rs-form-wrap your-email">
					<input type="email" name="email" value="Email Address" size="40" class="rs-text rs-form-field required" aria-required="true" aria-invalid="false">
				</span>
			</p>

			<p>
				<span class="rs-form-wrap your-company">
					<input type="text" name="company" value="Company" size="40" class="rs-text rs-form-field" aria-invalid="false">
				</span>
			</p>

			<p>
				<span class="rs-form-wrap your-tel">
					<input type="tel" name="tel" value="Phone Number" size="40" maxlength="100" class="rs-text rs-form-field" aria-invalid="false">
				</span>
			</p>

			<p>
				<span class="rs-form-wrap your-message">
					<textarea name="message" cols="40" rows="10" class="rs-textarea rs-form-field required" aria-required="true" aria-invalid="false">Message</textarea>
				</span>
			</p>

			<p>
				<input type="submit" value="Submit" class="rs-form-wrap rs-submit">
				
				<div class='img-ajax-cont'>
					<img class="ajax-loader" src="<?php echo plugins_url('images/ajax-loader.gif', __FILE__); ?>" alt="Sending ...">
				</div>
			
			</p>

			<div class="sliding-contact-btn-cont">
				<a href='#' class="sliding-contact-btn">blah</a>
			</div>

	</form>
</div>

<?php }

add_filter( 'wp_mail_content_type', 'set_html_content_type' );
function set_html_content_type() {

	return 'text/html';
}

add_action( 'wp_ajax_rs_submit_slide_form', 'rs_process_slide_form' );
function rs_process_slide_form() 
{	
	$data = $_POST['data'];
	$text = '';

    // Handle request then generate response using WP_Ajax_Response'
    $name = $data['name'];
    $email = $data['email'];
    $company = $data['company'];
    $tel = $data['tel'];
    $message = $data['message'];

    $text = '<p>' . $name . '</p><p>' . $email . '</p><p>' . $company . '</p><p>' . $tel . '</p><p>' . $message . '</p>';

    try 
    {
    	wp_mail('roman@directagents.com', 'New Contact Request', $text);
    }
    catch (Exception $e)
    {
    	die($e);
    }
   	echo "Responce:";
   	
   	var_dump($_POST['data']);
   	//var_dump($_POST['data']);
    //die( $data);

}

