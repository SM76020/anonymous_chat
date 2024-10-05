<?php
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

// This script will be called by AJAX to fetch new messages
if (isset($_GET['fetch_messages'])) {
    $sql = "SELECT id, message, created_at FROM messages ORDER BY created_at DESC";
    $result = $conn->query($sql);

    $messages = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }

    // Return messages in JSON format
    echo json_encode($messages);
    exit();
}

// This script will be called by AJAX to delete a message
if (isset($_GET['delete_message'])) {
    $messageId = $_GET['delete_message'];
    $sql = "DELETE FROM messages WHERE id = $messageId";
    $conn->query($sql);
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Secret Messages</title>
    <link rel="stylesheet" href="messages.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Your Secret Messages</h1>
    
    <div id="message-container">
        <!-- Messages will be dynamically loaded here -->
    </div>

    <script>
        // Function to fetch messages from the server
        function fetchMessages() {
            $.ajax({
                url: 'messages.php',
                type: 'GET',
                data: { fetch_messages: 1 },
                success: function(response) {
                    const messages = JSON.parse(response);
                    let messageHtml = '';

                    messages.forEach(function(msg) {
                        messageHtml += `
                            <div>
                                <p><strong>Message:</strong> ${msg.message}</p>
                                <p><em>Received on: ${msg.created_at}</em></p>
                                <button class="delete-btn" onclick="deleteMessage(${msg.id})">Delete</button>
                                <hr>
                            </div>
                        `;
                    });

                    $('#message-container').html(messageHtml);
                }
            });
        }

        // Function to delete a message
        function deleteMessage(id) {
            $.ajax({
                url: 'messages.php',
                type: 'GET',
                data: { delete_message: id },
                success: function() {
                    fetchMessages();
                }
            });
        }

        // Fetch messages when the page loads
        $(document).ready(function() {
            fetchMessages();

            // Poll the server for new messages every 3 seconds
            setInterval(fetchMessages, 3000);
        });
    </script>
</body>
</html>
