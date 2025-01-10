<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Battle Base</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <header>
    <nav class="main-nav">
      <div class="logo">
        <img src="photos/logo.jpg" alt="Sports Club Logo" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
      </div>
      <ul>
        <li><a href="home.php" class="active">Home</a></li>
        <li>
          <a href="#">Tournaments</a>
          <ul class="dropdown-menu">
            <li><a href="local-tournaments.php">Institute</a></li>
            <li><a href="regional-tournaments.php">Regional</a></li>
          </ul>
        </li>
        <li><a href="Live_Score.php">Live Scores</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
<section class="hero">
  <div class="hero-content">
    <h1>Welcome to the Sports Club</h1>
    <p>Experience the thrill of sports. Manage tournaments, track scores, and celebrate achievements.</p>
    <div class="hero-actions">
      <!-- Explore Button -->
      <a href="login.php" class="cta-button explore-button">Explore Tournaments</a>
      <!-- Search Bar -->
      <div class="search-bar-container">
        <input type="text" class="search-bar" placeholder="Search tournaments, scores..." aria-label="Search">
        <span class="search-icon">
          <!-- Star Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2.25l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2.25z" />
          </svg>
        </span>
      </div>
    </div>
  </div>
  <div class="hero-image">
    <img src="cric.gif" alt="Sports Club Hero Image">
  </div>
</section>

  <!-- Upcoming Tournaments Section -->
  <section class="upcoming-tournaments">
    <h2>Upcoming Tournaments</h2>
    <div class="tournament-container">
      <div class="tournament-card">
        <h3>Local Championship</h3>
        <p><strong>Date:</strong> 15th Mar 2024</p>
        <p><strong>Venue:</strong> City Sports Complex</p>
      </div>
      <div class="tournament-card">
        <h3>Regional Cup</h3>
        <p><strong>Date:</strong> 22nd Mar 2024</p>
        <p><strong>Venue:</strong> National Stadium</p>
      </div>
      <div class="tournament-card">
        <h3>Youth Tournament</h3>
        <p><strong>Date:</strong> 29th Mar 2024</p>
        <p><strong>Venue:</strong> Community Center</p>
      </div>
    </div>
  </section>

  <!-- Scores, Players, and News Section -->
  <section class="main-content">
    <h2>Main Content</h2>
    <div class="card-container">
      <!-- Live Scores Section -->
      <div class="card live-scores">
        <h2>Live Match Scores</h2>
        <div class="score-card">
          <p><strong>Match:</strong> Team A vs Team B</p>
          <p><strong>Score:</strong> 2 - 1</p>
          <p><strong>Status:</strong> In Progress</p>
        </div>
        <div class="score-card">
          <p><strong>Match:</strong> Team C vs Team D</p>
          <p><strong>Score:</strong> 0 - 0</p>
          <p><strong>Status:</strong> First Half</p>
        </div>
        <a href="login.php" class="view-all">View All Live Scores</a>
      </div>

      <!-- Top Players Section -->
      <div class="card top-players">
        <h2>Top Players</h2>
        <div class="player-card">
          <img src="player1.jpg" alt="Player 1">
          <p><strong>Name:</strong> John Doe</p>
          <p><strong>Sport:</strong> Football</p>
        </div>
        <div class="player-card">
          <img src="player2.jpg" alt="Player 2">
          <p><strong>Name:</strong> Jane Smith</p>
          <p><strong>Sport:</strong> Basketball</p>
        </div>
        <a href="login.php" class="view-all">View All Players</a>
      </div>

      <!-- News Section -->
      <div class="card news-section">
        <h2>Sports News</h2>
        <div class="news-item">
          <h3>Local Team Wins Championship</h3>
          <p>Our local team secured a historic victory in the regional championship...</p>
        </div>
        <div class="news-item">
          <h3>New Sports Facility Opening</h3>
          <p>A state-of-the-art sports facility is set to open next month...</p>
        </div>
        <a href="login.php" class="view-all">Read More News</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-logo">
        <img src="photos/logo.jpg" alt="Sports Club Logo">
      </div>
      <div class="footer-info">
        <p>&copy; 2024 Sports Club. All Rights Reserved.</p>
        <p>Contact: info@sportsclub.com | Phone: +123 456 789</p>
      </div>
    </div>
  </footer>

  <script>
    function toggleTournamentOptions() {
      const options = document.querySelector('.tournament-options');
      options.style.display = options.style.display === 'block' ? 'none' : 'block';
    }
  </script>
</body>

</html>
