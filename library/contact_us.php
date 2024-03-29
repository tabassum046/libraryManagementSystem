<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'user_db';

$conn = mysqli_connect($host, $user, $pass, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    $sql = "INSERT INTO us(name, email, mobile, message) VALUES ('$name','$email','$mobile','$message')";
    mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM us";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
         display: flex;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url(contact.jpg);
        background-size: cover;
    background-position: center;
    }

    p.share {
        text-align: center;
        font-weight: bold;
        font-size: 50px;
        margin-bottom: 20px;
        color:white 
    }
   
    form {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        width: 100%;
        margin-bottom: 20px;
        
    }

    

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    p.data {
        text-align: center;
        font-weight: bold;
        font-size: 40px;
        color:white
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4caf50;
        color: #fff;
    }
</style>

</head>
<body>
  <p class="share">Contact Us</p>
    <form action="contact_us.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="mobile">Mobile:</label>
        <input type="number" id="mobile" name="mobile" required>
        
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" required>
        <input type="submit" name="submit" value="Send Data">
        <div class="text-center mt-3">
        <a href="user_home.html" class="btn btn-secondary">Return To The Home Page</a>
    </div>
    </form>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo '<p class="data">Contact Data:</p>';
        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Message</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['mobile'] . '</td>';
            echo '<td>' . $row['message'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No data available.</p>';
    }
    ?>
</body>
</html>