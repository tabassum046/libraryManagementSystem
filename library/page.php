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
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO addbooks(name, author, edition, genre, quantity) VALUES ('$name','$author','$edition','$genre' , '$quantity')";
    mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM addbooks";
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
        background-image: url(book.webp);
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
        color:black
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background-color: white;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color:#45a049;
        color: #fff;
    }
</style>

</head>
<body>
  <p class="share">Add Books</p>
    <form action="page.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="author">Author:</label>
        <input type="author" id="author" name="author" required>
        
        <label for="edition">Edition:</label>
        <input type="number" id="edition" name="edition" required>
        
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
        
        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity" required>

        <input type="submit" name="submit" value="Add Book">
        <div class="text-center mt-3">
        <a href="admin_new.html" class="btn btn-secondary">Return To The Home Page</a>
    </div>
    </form>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo '<p class="data">New Book:</p>';
        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Author</th><th>Edition</th><th>Genre</th><th>Quantity</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['author'] . '</td>';
            echo '<td>' . $row['edition'] . '</td>';
            echo '<td>' . $row['genre'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No data available.</p>';
    }
    ?>
</body>
</html>
