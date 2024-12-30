<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Retrieve form data
	$name = htmlspecialchars(strip_tags(trim($_POST['name'])));
	$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
	$subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
	$message = htmlspecialchars(strip_tags(trim($_POST['message'])));

	// Validate inputs
	if (empty($name) || empty($email) || empty($subject) || empty($message)) {
		echo "All fields are required.";
		exit;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format.";
		exit;
	}

	// Send email
	$to = "bouzidioussema16@gmail.com"; // Replace with your email address
	$email_subject = "Contact Form: $subject";
	$email_body = "Name: $name\nEmail: $email\n\n$message";
	$headers = "From: $email";

	if (mail($to, $email_subject, $email_body, $headers)) {
		echo "Message sent successfully!";
	} else {
		echo "Failed to send the message. Please try again later.";
	}
} else {
	echo "Invalid request.";
}
