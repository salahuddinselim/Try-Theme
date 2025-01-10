<?php
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $user = htmlspecialchars(trim($_POST['username'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));

    if (!$user || !$email || !$password || !$name || !$phone) {
        die("All fields are required and must be valid.");
    }

    try {
        // Hash the password securely
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the insert statement
        $sql = "INSERT INTO userinfo (username, email, password_key, name, phone) VALUES (:username, :email, :password_key, :name, :phone)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':username' => $user,
            ':email' => $email,
            ':password_key' => $hashedPassword,
            ':name' => $name,
            ':phone' => $phone
        ]);

        // Redirect to the index page upon successful registration
        header("Location: index.html");
        exit();
    } catch (PDOException $e) {
        die("Error saving data: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
