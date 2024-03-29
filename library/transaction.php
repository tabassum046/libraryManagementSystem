<?php 
include 'connect.php'; // Assuming this file connects to your database

$message = ''; // Initialize the variable


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanID = isset($_POST['loan_id']) ? $_POST['loan_id'] : '';
    $userID = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $bookID = isset($_POST['book_id']) ? $_POST['book_id'] : '';
    $loanDate = isset($_POST['loan_date']) ? $_POST['loan_date'] : '';
    $returnDate = isset($_POST['return_date']) ? $_POST['return_date'] : '';

    // Modify the column names to match your 'loan table'
    $sql = "INSERT INTO `transactions table` (`Loan ID`, `User ID`, `Book ID`, `Loan Date`, `Return Date`) VALUES ('$loanID', '$userID', '$bookID', '$loanDate', '$returnDate')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Congratulations! You are now set to borrow a book.";
    } else {
        $message = 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}
?>

<!-- Remaining HTML code for form and display message -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Loan Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
          
        body {
    
    background-image: url('image.jpeg');
    
    background-size: cover;
    background-position: center center;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    color: #333;
    height: 100vh; /* Ensure the body takes the full viewport height */
    display: flex;
    justify-content: center;
    align-items: center;
    
    
    
    
}
.marquee-container {
    width: 100%;
    height: 100%;
    overflow: hidden; /* Ensures the marquee is within the container */
    position: absolute;
    top: 0;
    left: 0;
    z-index: 777; /* Adjust if needed to position the marquee over other content */
}

marquee {
    width: 100%;
    
    height: 100%;
    font-family: Arial, sans-serif;
    font-weight: 100;
    font-size: 3rem;
    color: #F39C12 ;
}

  
.container {
    max-width: 500px;
    
    margin: 50px auto;
    
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
     /* Background design using an image */
    position: absolute;
    right: 50px; 
    top: 50px; 
   
    z-index: 999;
    background-color: rgba(213, 219, 219, 0); /* Transparent background */
 transition: background-color 0.3s ease;
 
}
.container:hover{
   background-color:#EBDEF0 ;
}
 
.btn-primary {
    width: 100%;
    color:white;
    background-color:dimgray;
    transition: background-color 0.3s ease;
    
}
 
.btn-primary:hover {
   background-color: #8E44AD ;
}
    </style>
</head>
<body>
    
<div class="marquee-container">
        <marquee behavior="scroll" direction="down" scrollamount="3">
        Enter the Loan Details for Book Borrowing <br>
        <p>For further details,<br> please navigate to the home page</p>
        </marquee>
    </div>

    <div class="container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Loan Information -->
    
    
    
            <div class="form-group">
                <label for="loan_id">Loan ID:</label>
                <input type="text" class="form-control" id="loan_id" name="loan_id" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="book_id">Book ID:</label>
                <input type="text" class="form-control" id="book_id" name="book_id" required>
            </div>
            <div class="form-group">
                <label for="loan_date">Loan Date:</label>
                <input type="text" class="form-control" id="loan_date" name="loan_date" required>
            </div>
            <div class="form-group">
                <label for="return_date">Return Date:</label>
                <input type="text" class="form-control" id="return_date" name="return_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Info</button>
        </form>
        
        <div class="mt-3 text-center">
            <?php echo isset($message) ? $message : ''; ?> <!-- Display the confirmation message if set -->
        </div>

        <!-- Go to homepage button -->
        <div class="text-center mt-3">
            <a href="user_home.html" class="btn btn-secondary">Return To The Home Page</a>
        </div>
        <style>       
         .btn-secondary:hover {
   background-color: #8E44AD ;
}
.footer {
    color: #fff;
    text-align: center;
}
</style>
    </div>
 
 
 
</body>
</html>
