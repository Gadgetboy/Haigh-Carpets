<?php
/* Set e-mail recipient */
$myemail = "haighscarpets@outlook.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['inputName'], "Your Name");
$email = check_input($_POST['inputEmail'], "Your E-mail Address");
$Subject = check_input($_POST['inputSubject'], "Subject");
$Telephone = check_input($_POST['inputTelephone'], "Telephone");
$message = check_input($_POST['inputMessage'], "Your Message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Invalid e-mail address");
}
/* Let's prepare the message for the e-mail */

$Subject = "Someone has sent you a message - via Haighs Carpets Website";

$message = "

Someone has sent you a message using Haighs Carpets Website contact form:

Name: $name
Email: $email
Telephone: $Telephone
Subject: $Subject

Message:
$message

";

/* Send the message using mail() function */
mail($myemail, $Subject, $message);

/* Redirect visitor to the thank you page */
header('Location: http://www.haighscarpets.com/thankyou.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>
