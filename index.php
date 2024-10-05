<?php
// Start session
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anonymous_chat";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the message was sent successfully
if (isset($_SESSION['success']) && $_SESSION['success'] == 1) {
    echo "<script>
            alert('Message sent successfully!');
          </script>";
    // Unset the success session variable
    unset($_SESSION['success']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $message = trim($_POST['message']);
    
    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (message) VALUES (?)");
        $stmt->bind_param("s", $message);
        $stmt->execute();
        $stmt->close();

        // Set session variable to indicate success and redirect
        $_SESSION['success'] = 1;
        header("Location: index.php");
        exit();
    } else {
        echo "Please enter a message!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent me a secret message</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Send a Secret Message</h1>
    <form action="index.php" method="POST">
        <textarea name="message" rows="4" cols="50" placeholder="Enter your secret message here..." required></textarea><br><br>
        <input type="submit" value="Send Message">
    </form>
</body>
</html>
