<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        form {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 350px;
        }

        form h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-size: 22px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
            outline: none;
        }

        button[name="login"] {
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

        button[name="login"]:hover {
            background: #6a11cb;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }


    </style>
</head>
<body>
    <form method="POST">
        <h3>Login</h3>
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <button name="login">Login</button>
        <p style="text-align:center; margin-top:15px; font-size:14px;">
    Don't have an account? 
    <a href="../auth/ragister.php" style="color:#2575fc; text-decoration:none;">Register here</a>
</p>

        <?php
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $conn->query("SELECT * FROM users WHERE email='$email'");
            $user = $result->fetch_assoc();

            if($user && password_verify($password, $user['password_hash'])){
                $_SESSION['user_id'] = $user['id'];
                header("Location: ../employee/dashboard.php");
            } else {
                echo "<div class='error'>Invalid login</div>";
            }
        }
        ?>
    </form>
</body>
</html>