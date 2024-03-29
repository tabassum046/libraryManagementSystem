<?php 
include 'connect.php'; 

$message = ''; // Initialize the variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookID = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];

    $sql = "INSERT INTO `books table` (`Book ID`, `Title`, `Author`, `Genre`) VALUES ('$bookID', '$title', '$author', '$genre')";
    
    if (mysqli_query($conn, $sql)) {
        $message = 'Data stored successfully!';
    } else {
        $message = 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book Information</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    
    
    
    <style>
   
   body {
    background-image: url('flowers and leaves.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
 
   
        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
             /* Background design using an image */
            
            
            
              
    
        
        
        
        }
        
        .btn-primary {
            width: 100%;
            color:black;
            background-color: chocolate;
            transition: background-color 0.3s ease;
            
        }
        
        .btn-primary:hover {
    background-color: darkred; 
}
.marquee{
    font-size:xx-large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color:darkgrey;
}
        
    </style>
</head>
<body>
    <div class="container">
    <marquee behavior="scroll" direction="left" scrollamount="5" class="marquee">
    Add All Your Books Information Below.
</marquee>
       
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="book_id">Book ID:</label>
                <input type="text" class="form-control" id="book_id" name="book_id" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select class="form-control" id="genre" name="genre" required>
                    <option value="">Select Genre</option>
                    <option value="Romantic">Romantic</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Scientific">Scientific</option>
                    <option value="Horror">Horror</option>
                    <option value="Religion">Religion</option>
                    <option value="History">History</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Info</button>
        </form>
        <div class="mt-3 text-center">
            <?php echo isset($message) ? $message : ''; ?> <!-- Display the confirmation message if set -->
        </div>

        <!-- Go to user button -->
        <div class="text-center mt-3">
            <a href="user.php" class="btn btn-secondary">Go to the next page</a>
        </div>
          <!-- Go to homepage button -->
 
  <div class="text-center mt-3">
      <a href=" " class="btn btn-secondary">Return To The Home Page</a>
  </div>
        <style>
            .text-center .btn {
                color: black;
                background:burlywood;
                transition: background-color 0.3s ease;

            }
                    
                    .btn-secondary:hover {
                background-color: darkred; 
                color: aliceblue;
            }
        
        
    

        </style>
    </div>

 

</body>
</html>
