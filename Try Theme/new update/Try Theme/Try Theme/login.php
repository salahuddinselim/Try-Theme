<?php
// Start the session
session_start();

// Enable error reporting for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$host = "localhost";
$dbname = "sportsclub";
$username = "root";
$password = "";

try {
    // Create a database connection using PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Initialize variables
$email = $password = "";
$emailErr = $passwordErr = $loginErr = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$email) {
        $emailErr = "Valid email is required.";
    }
    if (empty($password)) {
        $passwordErr = "Password is required.";
    }

    if (empty($emailErr) && empty($passwordErr)) {
        try {
            // Prepare and execute the SQL statement to fetch user details
            $sql = "SELECT email, password_key, username FROM userinfo WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':email' => $email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
              $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Verify password
                if ($hashedPassword = $user['password_key']) {
                    // Password is correct, set session
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];

                    // Regenerate session ID for security
                    session_regenerate_id(true);

                    // Redirect to dashboard or index
                    header("Location: home.php");
                    exit();
                } else {
                    // Password doesn't match
                    $loginErr .= "Invalid email or password.";
                }
            } else {
                // User not found
                $loginErr = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $loginErr = "An error occurred. Please try again later. " . $e->getMessage();
            error_log("Database error: " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sports Club</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <nav class="main-nav">
            <div class="logo">
                <img src="logo.jpg" alt="Sports Club Logo">
            </div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="login.php" class="active">Login</a></li>
                <li><a href="tournaments.html">Tournaments</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="login-page">
        <div class="login-container">
            <h1>Login to Your Account</h1>
            <?php if (!empty($loginErr)): ?>
                <div class="error-message"><?php echo htmlspecialchars($loginErr); ?></div>
            <?php endif; ?>
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required
                        value="<?php echo htmlspecialchars($email); ?>">
                    <?php if (!empty($emailErr)): ?>
                        <span class="error"><?php echo htmlspecialchars($emailErr); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" placeholder="Enter your password" required>
                    <?php if (!empty($passwordErr)): ?>
                        <span class="error"><?php echo htmlspecialchars($passwordErr); ?></span>
                    <?php endif; ?>
                </div>
                <button type="submit" class="login-button">Login</button>
                <p class="register-link">Don't have an account? <a href="register.html">Register Here</a></p>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-logo">
            <img src="logo.jpg" alt="Sports Club Logo">
        </div>
        <div class="footer-info">
            <p>&copy; 2024 Sports Club. All Rights Reserved.</p>
            <p>Address: 123 Sports Club Street, Dhaka, Bangladesh</p>
            <p>Email: <a href="mailto:info@sportsclub.com">info@sportsclub.com</a></p>
            <p>Phone: +123 456 789</p>
        </div>
    </footer>
</body>

</html>
