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
    die("<script>alert('Database connection failed: " . $e->getMessage() . "');</script>");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $tournamentName = htmlspecialchars(trim($_POST['tournament-name']));
    $sport = htmlspecialchars(trim($_POST['sport']));
    $tournamentType = htmlspecialchars(trim($_POST['tournament-type']));
    $venue = htmlspecialchars(trim($_POST['venue']));

    try {
        // Insert data into the database
        $sql = "INSERT INTO tournaments (tournament_name, category_short_name, type, venue) 
                VALUES (:tournamentName, :sport, :tournamentType, :venue)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':tournamentName' => $tournamentName,
            ':sport' => $sport,
            ':tournamentType' => $tournamentType,
            ':venue' => $venue
        ]);

        // Show success alert and redirect back to the profile page
        echo "<script>
                alert('Tournament created successfully!');
                window.location.href = 'profile.php';
              </script>";
        exit();
    } catch (PDOException $e) {
        // Show error alert and redirect back to the profile page
        echo "<script>
                alert('Error creating tournament: " . $e->getMessage() . "');
                window.location.href = 'profile.php';
              </script>";
        exit();
    }
}
?>
