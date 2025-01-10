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

// Handle form submission for "Create Tournament"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-tournament'])) {
    // Sanitize input
    $tournamentName = htmlspecialchars(trim($_POST['tournament-name']));
    $sport = htmlspecialchars(trim($_POST['sport']));
    $tournamentType = htmlspecialchars(trim($_POST['tournament-type']));
    $venue = htmlspecialchars(trim($_POST['venue']));

    try {
        // Insert data into the database
        $sql = "INSERT INTO tournament_info (tournament_name, category_short_name, type, venue) 
                VALUES (:tournamentName, :sport, :tournamentType, :venue)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':tournamentName' => $tournamentName,
            ':sport' => $sport,
            ':tournamentType' => $tournamentType,
            ':venue' => $venue
        ]);

        // Success message
        $successMessage = "Tournament created successfully!";
    } catch (PDOException $e) {
        // Error message
        $errorMessage = "Error creating tournament: " . $e->getMessage();
        error_log("Error creating tournament: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="main-nav">
            <div class="logo">
                <img src="logo.jpg" alt="Sports Club Logo" class="logo-img">
            </div>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php" class="active">Profile</a></li>
                <li><a href="tournaments.php">Tournaments</a></li>
                <li><a href="Live_Score.php">Live Scores</a></li>
                <li><a href="index.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section class="user-profile">
        <div class="profile-container">
            <div class="profile-header">
                <img src="user-avatar.jpg" alt="User Avatar" class="profile-avatar">
                <h1>John Doe</h1>
                <p>Sports Enthusiast | Member since 2023</p>
            </div>

            <div class="profile-info">
                <h2>Profile Information</h2>
                <ul>
                    <li><strong>Email:</strong> john.doe@example.com</li>
                    <li><strong>Phone:</strong> +123 456 789</li>
                    <li><strong>Favorite Sport:</strong> Football</li>
                </ul>
                <a href="edit-profile.php" class="edit-button">Edit Profile</a>
            </div>

            <!-- Success/Error Message -->
            <?php if (isset($successMessage)): ?>
                <div class="success-message"><?php echo htmlspecialchars($successMessage); ?></div>
            <?php endif; ?>
            <?php if (isset($errorMessage)): ?>
                <div class="error-message"><?php echo htmlspecialchars($errorMessage); ?></div>
            <?php endif; ?>

            <!-- Create Tournament Section -->
            <div class="create-tournament" style="margin-top: 2rem; padding: 2rem; background-color: #f5f5f5; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h2>Create Tournament</h2>
                <form method="post" action="profile.php">
                    <input type="hidden" name="create-tournament" value="1">
                    <div class="form-group">
                        <label for="tournament-name">Tournament Name:</label>
                        <input type="text" id="tournament-name" name="tournament-name" required>
                    </div>
                    <div class="form-group">
                        <label for="sport">Sport:</label>
                        <select id="sport" name="sport" required>
                            <option value="">Select a sport</option>
                            <option value="cricket">Cricket</option>
                            <option value="football">Football</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tournament-type">Tournament Type:</label>
                        <select id="tournament-type" name="tournament-type" required>
                            <option value="">Select tournament type</option>
                            <option value="regional">Regional</option>
                            <option value="inter-institute">Inter-Institute</option>
                            <option value="intra-institute">Intra-Institute</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="venue">Venue:</label>
                        <input type="text" id="venue" name="venue" required>
                    </div>
                    <button type="submit" class="create-button">Create Tournament</button>
                </form>
            </div>

            <!-- Other Sections -->
            <div class="ongoing-tournaments" style="margin-top: 2rem; padding: 2rem; background-color: #f5f5f5; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h2>Ongoing Tournaments</h2>
                <ul>
                    <!-- Ongoing tournaments will be displayed here -->
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="logo.jpg" alt="Sports Club Logo" class="logo-img">
            </div>
            <div class="footer-info">
                <p>&copy; 2024 Sports Club. All Rights Reserved.</p>
                <p>Contact: info@sportsclub.com | Phone: +123 456 789</p>
            </div>
        </div>
    </footer>
</body>

</html>
