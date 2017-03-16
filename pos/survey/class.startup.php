<?php

require_once 'dbconfig.php';

date_default_timezone_set('America/New_York');

class STARTUP
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($firstname,$lastname,$zip,$email,$upass,$code)
	{
		try
		{		
			$the_date = date('Y-m-d');  
			date_default_timezone_set('America/New_York');

			$password = md5($upass);

			$stmt = $this->conn->prepare("SELECT * FROM zip_state WHERE zip=:user_zip");
			$stmt->execute(array(":user_zip"=>$zip));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


			$stmt = $this->conn->prepare("INSERT INTO tbl_startup(FirstName,LastName,Zip,City,State,userEmail,userPass,tokenCode, Date_Created) 
			                                             VALUES(:first_name, :last_name,:user_zip,'".$userRow['city']."','".$userRow['state']."',:user_mail, :user_pass, :active_code, '".$the_date."')");
			$stmt->bindparam(":first_name",$firstname);
			$stmt->bindparam(":last_name",$lastname);
			$stmt->bindparam(":user_zip",$zip);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($email,$upass,$rememberme)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_startup WHERE userEmail=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']=="Y")
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['startupSession'] = $userRow['userID'];
						
						//Remember me
						
						if($rememberme == 'Yes'){

						unset($_SESSION['cookie_deleted']);
						
						//setcookie("uname",$cookiehash,time()+3600*24*365,'/','.http://localhost/creative/pos/survey/startup/login/');
						$cookiehash = md5(sha1(username . user_ip));
						$expire=time()+3600*24*365;

						setcookie('RememberMe', $cookiehash, $expire);


						
						$stmt = $this->conn->prepare("UPDATE tbl_startup SET login_session='".$cookiehash."' WHERE userID='".$userRow['userID']."'");
			
						$stmt->execute();	
						return $stmt;
					  
					  }else{

					  	$stmt = $this->conn->prepare("UPDATE tbl_startup SET login_session='' WHERE userID='".$userRow['userID']."'");
					  	$stmt->execute();	
						return $stmt;
					  }

						
						return true;
					}
					else
					{
						header("Location: ?error");
						exit;
					}
				}
				else
				{
					header("Location: ?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: ?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['startupSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['startupSession'] = false;
	}
	
	function send_mail($email,$message,$subject)
	{						
		/*require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username="your_gmail_id_here@gmail.com";  
		$mail->Password="your_gmail_password_here";            
		$mail->SetFrom('your_gmail_id_here@gmail.com','Coding Cage');
		$mail->AddReplyTo("your_gmail_id_here@gmail.com","Coding Cage");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();*/

$to      = $email;
$subject = $subject;
$message = $message;

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From: info@circl.com' . "\r\n" .
    'Reply-To: info@circl.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

	}	
}