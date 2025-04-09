<?php
// Database connection
$servername = "mymysqlserver2025.mysql.database.azure.com";
$username = "mysqlbenbrahim"; // Database username
$password = "asAS@#123"; // Database password
$dbname = "clients_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from clients table
$sql = "SELECT id, name, email, phone FROM clients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
</head>
<body>

    <div class="container">
        <h1>Client List</h1>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Display data from the database
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"]. "</td>
                                <td>" . $row["name"]. "</td>
                                <td>" . $row["email"]. "</td>
                                <td>" . $row["phone"]. "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Close the connection
    $conn->close();
    ?>

</body>
</html>