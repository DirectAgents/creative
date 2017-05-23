<?php
// ADD NEW ADMIN USER TO WORDPRESS
// ----------------------------------
// Put this file in your Wordpress root directory and run it from your browser.
// Delete it when you're done.

if ($_POST){

require_once('wp-blog-header.php');
require_once('wp-includes/registration.php');

// CONFIG
$newusername = $_POST['user_id'];
$newpassword = $_POST['user_password'];
$newemail = $_POST['user_email'];

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];

// Make sure you set CONFIG variables
if ( $newpassword != 'YOURPASSWORD' && $newemail != 'YOUREMAIL@TEST.com' && $newusername !='YOURUSERNAME'  ) 
{
	// Check that user doesn't already exist
	if ( !username_exists($newusername) && !email_exists($newemail) ) 
	{
		// Create user and set role to administrator
		$user_id = wp_create_user( $newusername, $newpassword, $newemail);

		wp_update_user( array( 'ID' => $user_id, 'first_name' => $first_name ) );
        wp_update_user( array( 'ID' => $user_id, 'last_name' => $last_name ) );

		if ( is_int($user_id) )
		{
			$wp_user_object = new WP_User($user_id);
			$wp_user_object->set_role('contributor');
			echo 'Successfully created new admin user. Now delete this file!';
		} 
		else {
			echo 'Error with wp_insert_user. No users were created.';
		}
	} 
	else {
		echo 'This user or email already exists. Nothing was done.';
	}
} 
else {
	echo "Whoops, looks like you didn't set a password, username, or email before running the script. Set these variables and try again.";
}

}

?>




<div class="login-from">
    <form autocomplete="off" method="post" id="signupForm" role="signupForm" novalidate="novalidate">
        <h3>SIGN UP FORM</h3>
        <div class="form-group">
            <label>Your Firstname</label>
            <input type="text" name="firstname" class="form-control">
        </div>
         <div class="form-group">
            <label>Your Lastname</label>
            <input type="text" name="lastname" class="form-control">
        </div>
        <div class="form-group">
            <label>Your ID</label>
            <input type="text" name="user_id" class="form-control">
        </div>
        <div class="form-group">
            <label>Your Email</label>
            <input type="text" name="user_email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="user_repassword" name="user_repassword">
        </div>
        <div class="checkbox form-group">
            <label><input type="checkbox" name="user_terms"><i>I agree to <a href="#">Terms of Service</a> and  <a href="#">Privacy Policy</a></i></label>
        </div>
        <div class="form-group">
            <button class="btn" type="submit">REGISTER</button>
            <label class="error-msg"></label>
        </div>
    </form>
</div>