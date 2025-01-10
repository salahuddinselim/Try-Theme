<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sports Club - Home</title>
  <link rel="stylesheet" href="contact.css">
</head>

<body>
  <header>
    <nav class="main-nav">
      <div class="logo">
        <img src="logo.png" alt="Sports Club Logo">
      </div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="register.html">Register</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="tournaments.html">Tournaments</a></li>
        <li><a href="contact.html" class="active">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="contact">
    <h2>Contact Us</h2>
    <div class="contact-container">
      <!-- Contact Information -->
      <div class="contact-info">
        <h3>Get in Touch</h3>
        <p>If you have any questions or need assistance, feel free to reach out to us!</p>
        <ul>
          <li><strong>Address:</strong> 123 Sports Club Street, Dhaka, Bangladesh</li>
          <li><strong>Email:</strong> <a href="mailto:info@sportsclub.com">info@sportsclub.com</a></li>
          <li><strong>Phone:</strong> +123 456 789</li>
        </ul>
      </div>

      <!-- Contact Form -->
      <div class="contact-form">
        <h3>Send Us a Message</h3>
        <form action="process_contact.php" method="POST">
          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Write your message" required></textarea>
          </div>
          <button type="submit" class="submit-button">Send Message</button>
        </form>
      </div>

      <!-- Map Placeholder -->
      <div class="contact-map">
        <h3>Find Us</h3>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1358251873383!2d90.40437921538564!3d23.810332992566228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70f63a3b39b%3A0x4a784cbe83e85b9f!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1630072738024!5m2!1sen!2sbd"
          width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2024 Sports Club. All Rights Reserved.</p>
  </footer>
</body>

</html>