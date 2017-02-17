<?php
require_once '../../base_path.php';
require_once '../../class.startup.php';
$user = new STARTUP();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('../login');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_startup WHERE userID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['userStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_startup SET userStatus=:status WHERE userID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	
			
			$msg = "
		           <div class='alert alert-success'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>WoW !</strong>  Your Account is Now Activated : <a href='../login/'>Login here</a>
			       </div>
			       ";	
		}
		else
		{
			$msg = "
		           <div class='alert alert-error'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>Sorry !</strong>  Your Account is allready Activated : <a href='../login/'>Login here</a>
			       </div>
			       ";
		}
	}
	else
	{
		$msg = "
		       <div class='alert alert-error'>
			   <button class='close' data-dismiss='alert'>&times;</button>
			   <strong>Sorry !</strong>  No Account Found : <a href='../signup/'>Signup here</a>
			   </div>
			   ";
	}	
}

?>



<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Circl</title>
    
    
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/style.css">


<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">



<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><!-- jQuery Library-->
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/passwordscheck.css" /><!-- Include Your CSS file here-->   



<script src="<?php echo BASE_PATH; ?>/startup/js/password.js"></script>

<style href>a {text-decoration: none} </style>


  </head>

  <body>

    
<div class="container">

<?php if(isset($msg)) echo $msg;  ?>
  <div class="logo">
    <h1>CIRCL</h1>
  </div>
</div>








<div class="form">

<div class="info">
  <h1>SIGNUP AS A STARTUP</h1>
</div>

<div class="loginas">
  <h3>Are you a <span class="role">Participant</span>? <a href="<?php echo BASE_PATH; ?>/participant/signup/">Click here</a></h3>
</div>

<!--  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>-->




  
<form class="form-signup" method="post">

  <input type="hidden" name="passwordpass" id="passwordpass"/>

    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtfirstname" id="txtfirstname" class="txtfirstname" placeholder="First Name *" required/>
    </div>
  </div>
    
    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtlastname" id="txtlastname" class="txtlastname" placeholder="Last Name *" required/>
    </div>
   </div>
    
    <input type="email" name="txtemail" id="txtemail" placeholder="Email Address *" required/>
    <input type="password" name="txtpass" id="txtpass" placeholder="Password *" required/><span id="result"></span>
    <button type="submit" name="btn-signup" id="btn-signup">SIGN UP</button>
    <p class="message">Already registered? <a href="../login">Log in</a></p>
</form>
    

</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

       <script src="<?php echo BASE_PATH; ?>/js/index.js"></script>

       <script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    
    
  </body>
</html>




