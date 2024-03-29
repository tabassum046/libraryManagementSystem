
<?php 
include 'connect.php'; // Assuming this file connects to your database

$message = ''; // Initialize the variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';


     // Email validation using filter_var
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format';
    } else {
        // Check MX record of the domain (optional)
        list($user, $domain) = explode('@', $email);
        if (!checkdnsrr($domain, 'MX')) {
            $message = 'Domain does not have valid MX records';
        } else {
            // Insert data into the database if email is valid


    

    // Modify the column names to match your 'users table'
    $sql = "INSERT INTO `users table` (`User ID`, `Name`, `Email`, `Contact no.`, `Address`) VALUES ('$userID', '$name', '$email', '$contact', '$address')";
    
    if (mysqli_query($conn, $sql)) {
        $message = 'Data stored successfully!';
    } else {
        $message = 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}

    }

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
        }

        .left {
            flex: 1;
            background-image: url('8.jpg');
            background-size: cover;
            background-position: 30% center;
            height: 100vh;
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
    max-width: 500px;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: rgba(213, 219, 219, 0.5); /* Transparent background */
    transition: background-color 0.3s ease;
   
}
    .marquee-container {
     width: 40%;
     height: 300%;
     overflow: hidden;
     position: absolute;
     white-space: nowrap;
     animation: bounce 5s linear infinite; /* Adjust duration or animation as needed */
     display: flex;
            justify-content: right;
            align-items: center;
 }
 .marquee {
     font-family: "Lucida Console", "Courier New", monospace;
   font-weight: 300;
     font-size:x-large;
     color: white;
     
     width: 600%;
 }
 @keyframes bounce {
     0% {
         transform: translateX(100%);
     }
     100% {
         transform: translateX(-70%); /* Bounce to the end */
     }
 }
 @keyframes marquee-slide {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .right {
            
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('0.jpg');
            background-color: rgba(213, 219, 219, 0.5); /* Transparent background */
            transition: background-color 0.3s ease;
           
            font-family: 4rem;
            font-size: larger;
            color: whitesmoke;
            
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-repeat: no-repeat;
        background-size:auto; /* Adjust the size of the background image */
        background-position: center;
     
      /* Background design using an image */
 
        }




 
 .btn-primary {
     width: 100%;
     color:white;
     background-color:black;
     transition: background-color 0.3s ease;
     
 }
 
 .btn-primary:hover {
    background-color:blueviolet;
}

input[type="text"]
{
    width: 50%; /* Adjust this value to set the width */
    padding: 10px; /* Add padding for better appearance */
    box-sizing:border-box; /* Include padding and border in the width */
    justify-content: center;
}
input[type="email"]{
    width: 60%; /* Adjust this value to set the width */
    padding: 10px; /* Add padding for better appearance */
    box-sizing: border-box; /* Include padding and border in the width */

}


        /* Media query for smaller screens */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .left,
            .right {
                flex: 1;
                height: 50vh;
            }
        }

 



    </style>
</head>
<body>
    <!-- HTML Marquee Bouncing Text-->

    <div class="left">
         <div class="marquee-container">
     <div class="marquee">
     Add Your <br> Information <br> For Further <br> Procedure
     </div>
     </div>
     </div>

    <div class="right">
        <div class="container">
            
            
            

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!-- User Information -->
                <div class="form-group">
                    <label for="user_id" >User ID:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" required >
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required >
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required >
                </div>
                <div class="form-group">
                    <label for="contact">Contact No.:</label>
                    <input type="text" class="form-control" id="contact" name="contact" required >
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required >
                </div>
                <button type="submit" class="btn btn-primary">Save Info</button>
            </form>


            <div class="mt-3 text-center">
    <?php echo isset($message) ? $message : ''; 

    
    ?>
</div>

            <!-- Go to user button -->
            <div class="text-center mt-3">
                <a href="transaction.php" class="btn btn-secondary">Go to the next page</a>
            </div>

            
        <!-- Go to homepage button -->
       
        <div class="text-center mt-3">
            <a href="user_home.html" class="btn btn-secondary">Return To The Home Page</a>
        </div>
        </div>
    </div>
</body>
</html>
