<?php
$title = 'The Healthy Kids Project | Contact Us';
$description = 'Contact the Healthy Kids Project, which teaches successful actions and successful strategies.';
?>

<?php  
//for the $to variable, fill in the email address to send to 
$name = $last_name = $email = $email_verify = $message = '';
$errors = '';
$error_message = '';
$to = '';
$subject = 'Message posted at ZuberTubers.com';
$sent = false; 

function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (isset($_GET['result'])) {
	$sent = true;
	if ($_GET['result'] == 'success') {
		$response = '<p class="result first">Thank You! We will be in touch.</p><p class="result last">If you don\'t hear from us within 24 hours, please call (310) 936-0825 to be sure we received your message.</p>';
	}
	if ($_GET['result'] == 'error') {
		$response = '<p class="result first last">Sorry, there was an error. Please try again, or call (310) 936-0825</p>';;
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = clean_input($_POST['first_name']);
	$last_name = clean_input($_POST['last_name']);
	$email = clean_input($_POST['email']);
	$email_verify = clean_input($_POST['email_verification']);
	$message = clean_input($_POST['message']);
	
	if (empty($name)) $errors .= '<li>Please enter your name</li>';
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors .= '<li>Please enter valid email address</li>';
	if (!filter_var($email_verify, FILTER_VALIDATE_EMAIL) || $email != $email_verify) {
		$errors .= '<li>Please verify email address</li>';
	}
	if (empty($message)) $errors .= '<li>Please enter a message</li>';
	
	if (!empty($errors)) {
		$error_message .= '<ul id="error_message">' . $errors . '</ul>';
	}
		
	if (empty($errors) && empty($last_name) && $sent == false) {
		$body = "From: $name\nEmail: $email\n\nMessage posted at ZuberTubers.com:\n\n$message"; 
		
		if (mail($to, $subject, $body)) {
			$result = 'success';
		} else {
			$result = 'error';
		}
		
		header('Location:' . $_SERVER['PHP_SELF'] . '?result=' . $result);
		die;
	}	
}
?>

<?php include '../includes/header.php'; ?>   
	    
	    <!--CONTENT--------------------------------------------------------------------------------------->
		<div class="content container contact">			  
		
			<div class="col-xs-12">
			
				<?php if ($sent) echo $response; ?>
			
				<?php if (!$sent) : ?>
				<form id="contact_us" method="post" action="<?php echo 'http://' . htmlspecialchars($_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']); ?>">
				    
				    <?php echo $error_message; ?>
				    
				    <label for="first_name">Name:</label>
				    <input type="text" class="input" name="first_name" value="<?php echo $name;?>">

				    <label for="last_name" class="last_name">Last Name:</label>
				    <input type="text" class="input last_name" name="last_name">

				    <label for="email">Email Address:</label>
				    <input type="email" class="input" name="email" value="<?php echo $email;?>">

				    <label for="email_verification">Verify Email:</label>
				    <input type="email" class="input" name="email_verification" value="<?php echo $email_verify;?>">

					<label for="message">Message:</label>
					<textarea class="" rows="5" name="message"><?php echo $message;?></textarea>

				  	<input type="submit" name="submit" value="Send &raquo;" id="submit">
				  
				</form>					
				<?php endif; ?>
						
			</div><!-- #healthykidstext -->
		          
		</div><!-- .container -->
        
<?php include '../includes/footer.php'; ?>