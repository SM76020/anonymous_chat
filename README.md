# Anonymous Chat Website

This is an anonymous chat website where users can send secret messages without revealing their identity, inspired by platforms like NGL. The project is built using **PHP**, **MySQL**, and **AJAX**, with a responsive design for mobile devices. The website allows users to send messages on one page and read the messages on another, all in real-time without refreshing the page.

🔗 **Live Demo**: [https://sent-me-message.talk4fun.net/](https://sent-me-message.talk4fun.net/)

## Features
- **Anonymous Message Sending**: Users can send messages without the sender being identified.
- **Real-time Message Retrieval**: Messages appear instantly on the reading page without the need for manual refresh.
- **Mobile-Friendly Design**: The website is fully responsive, ensuring a smooth experience on all devices.
- **Delete Messages**: Ability to delete individual messages.

---

## Getting Started

### Prerequisites

- **XAMPP** (or any local server with PHP and MySQL)
- Basic knowledge of PHP, MySQL, and HTML/CSS

### Installation and Setup

Follow the steps below to run the project locally:

### 1. Install XAMPP

- Download and install [XAMPP](https://www.apachefriends.org/index.html) if you don't have it installed.
- Start **Apache** and **MySQL** services from the XAMPP Control Panel.

### 2. Clone the Repository

```bash
git clone https://github.com/SM76020/anonymous_chat.git
```

Move the cloned project folder to your XAMPP's `htdocs` directory, typically located at:
```
C:\xampp\htdocs\
```

### 3. Create the Database

1. Open your browser and navigate to `http://localhost/phpmyadmin/`.
2. Create a new database called `anonymous_chat`.
3. Import the provided `anonymous_chat.sql` file into the database:
   - Click on the **Import** tab in phpMyAdmin.
   - Select the `anonymous_chat.sql` file from the project folder.
   - Click **Go** to import the table and data.

### 4. Update Database Configuration (If Needed)

If you are using different database credentials, update the `index.php` and `messages.php` files with your database username and password in the following sections:

```php
$servername = "localhost";
$username = "root";  // Default for XAMPP
$password = "";      // Default for XAMPP
$dbname = "anonymous_chat";
```

### 5. Run the Application

1. Open your browser and go to `http://localhost/anonymous-chat/` to access the project.
2. You will see two pages:
   - `index.php` for **sending messages**.
   - `messages.php` for **reading messages** in real-time.

### 6. Project Structure

- **index.php**: The page where users can send anonymous messages.
- **messages.php**: The page where messages are displayed in real-time.
- **index.css**: Styles for the `index.php` page.
- **messages.css**: Styles for the `messages.php` page.
- **anonymous_chat.sql**: The database file for setting up the `messages` table.

---

## Usage

1. **Send a Message**: 
   - Go to `index.php`, enter a message, and submit it.
2. **Read Messages**:
   - Go to `messages.php` to see the messages, which load instantly without refreshing the page.
   - You can delete any message by clicking the **Delete** button next to it.

---

## Built With

- **PHP**: Server-side scripting language.
- **MySQL**: For database management.
- **AJAX**: For real-time message retrieval without page reloads.
- **HTML5/CSS3**: For structuring and styling the pages.

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Contributing

Feel free to submit issues or pull requests if you'd like to contribute to this project.

---
