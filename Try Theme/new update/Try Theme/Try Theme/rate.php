<?php
            // Connect to the database
            $conn = new mysqli('localhost', 'username', 'password', 'database_name');
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Fetch the created tournaments and their ratings
            $sql = "SELECT tournament_name, rating, tournament_type, sport FROM tournaments WHERE user_id = 'john_doe'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<li><strong>Tournament Name:</strong> " . $row["tournament_name"]. "</li>";
                echo "<li><strong>Rating:</strong> " . $row["rating"]. "/5</li>";
                echo "<li><strong>Tournament Type:</strong> " . $row["tournament_type"]. "</li>";
                echo "<li><strong>Sport:</strong> " . $row["sport"]. "</li>";
              }
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>