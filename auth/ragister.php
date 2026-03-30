<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Body and background */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        /* Form container */
        form {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 350px;
            display: flex;
            flex-direction: column;
        }

        /* Input fields */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
            outline: none;
        }

        /* Register button */
        button[name="register"] {
            width: 100%;
            padding: 12px;
            background: #2575fc;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button[name="register"]:hover {
            background: #6a11cb;
        }

        /* Message styling */
        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
            color: green;
        }

        /* Link to login page */
        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h3 style="text-align:center; margin-bottom:20px;">Register</h3>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="number" name="mobile" placeholder="Mobile" required>
        <button name="register">Register</button>

        <?php
        if(isset($_POST['register'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Add mobile field to SQL
            $sql = "INSERT INTO users (name,email,password_hash,mobile) VALUES ('$name','$email','$pass','$mobile')";
            if($conn->query($sql) === TRUE){
                echo "<div class='message'>Registered Successfully! <a href='../login/login.php'>Login Now</a></div>";
            } else {
                echo "<div class='message' style='color:red;'>Error: " . $conn->error . "</div>";
            }
        }
        ?>

        <div class="login-link">
            Already have an account? <a href="../auth/login.php">Login here</a>
        </div>
    </form>
</body>
</html>