// Step 1: Create a "forgot password" form

<form action="forgot_password.php" method="post">
  <label for="email">Enter your email address:</label>
  <input type="email" name="email" required>
  <button type="submit">Reset Password</button>
</form>

// Step 2: Validate the email address

$email = $_POST['email'];

// Ensure that the email address is in the correct format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email address.");
}

// Check if the email corresponds to a valid user account
// (You'll need to implement this part yourself, depending on how your user accounts are stored.)

// Step 3: Generate a unique token

$token = bin2hex(random_bytes(32));
// Save the token to the database or session, associated with the user account

// Step 4: Send a password reset email

$reset_url = "https://example.com/reset_password.php?token=$token";
$subject = "Password reset for Example.com";
$message = "Click the following link to reset your password: $reset_url";
$headers = "From: webmaster@example.com";
mail($email, $subject, $message, $headers);

// Step 5: Reset the password

// In the reset_password.php script, verify the token and allow the user to reset their password.
