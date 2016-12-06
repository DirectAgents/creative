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
	
	public function register($firstname,$lastname,$email,$upass,$code)
	{
		try
		{		
			$the_date = date('Y-m-d');  
			date_default_timezone_set('America/New_York');

			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_startup(FirstName,LastName,userEmail,userPass,tokenCode, Date_Created) 
			                                             VALUES(:first_name, :last_name, :user_mail, :user_pass, :active_code, '".$the_date."')");
			$stmt->bindparam(":first_name",$firstname);
			$stmt->bindparam(":last_name",$lastname);
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
	
	public function login($email,$upass)
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