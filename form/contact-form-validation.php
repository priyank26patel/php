<?php

if(isset($_POST['submitted'])) {

//validation starts

$errors = array();

$required_fields['name'] = 'You are required to enter your Name.';

$required_fields['email'] = 'You are required to enter your E-mail Address.';

$required_fields['subject'] = 'You are required to enter a Subject.';

//validation ends

foreach($_POST as $key => $value) {

if(array_key_exists($key, $required_fields)) {

//trims all whitespaces

if(trim($_POST[$key]) === '') {

$errors[$key] = $required_fields[$key];

}

}

}

//if no errors then submit the form

if(empty($errors)) {
	$name = $_POST['name'];

$email = $_POST['email'];

//who should we send this form contents to?

$to  = "your@email.co.uk";

// subject of the e-mail.

$subject = $_POST['subject'];

// e-mail message

$body = $_POST['message'];

// To send HTML mail, the Content-type header must be set so it won't be classed as spam

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers

$headers .= "From: " . $email . "\r\n";

// Mail it!

$success = mail($to, $subject, $body, $headers);

if($success) {

echo "<div id='success'>Your responce has been sent.</div>";

}

else

echo "<div id='problem'>Error sending e-mail!</div>";

}

}
//if there are validation errors, lets let the user know!

if(!empty($errors)) {

?>

<div class='errors'>

<p><strong>Please check the following errors:</strong></p>

<?php

//each error is displayed

foreach($errors as $value) {

echo "<span>$value</span><br />";

}

?>

</div>

<?php

} //end while

?>
<div>
 <form action="" target="" id="contactForm" method="post">
 <fieldset>
 <ol>
 <p><strong>Contact us</strong></p>
 <li>
 <label for="name"><em>*</em> Your Name:</label>
 <input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
 </li>
 <li>
 <label for="email"><em>*</em> E-mail:</label>
 <input type="text"  name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
 </li>
 <li>
 <label for="subject"><em>*</em> Subject:</label>
 <input type="text" name="subject" id="subject" value="<?php if(isset($_POST['subject'])) echo $_POST['subject'];?>">
 </li>
 <li>
 <label for="message">Message:</label>
 <textarea rows="2" cols="20" name="message" id="message"></textarea>
 </li>

<input type="submit" value="Submit!" name="submitted"/>
</li>
 </ol>

 </fieldset>
 </form>
 </div>