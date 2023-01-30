<?php
include "../config.php";

if(isset($_POST['register']))
{
    $email = $_POST['txtemail'];
    $username = $_POST['txtusername'];
    $password = $_POST['txtpassword'];
    $confirm = $_POST['txtconfirm'];

    if($password == $confirm){
        $sql = "INSERT INTO tbl_users (email,username,password)
                VALUES('$email','$username','$password')";
        mysqli_query($connect,$sql);
        echo "

        <script>
        alert('Register Success');
        </script>
        
        ";
    }else{
        echo "

        <script>
        alert('Password does not match');
        </script>
        
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Book</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" href="Photo/favicon.ico">
</head>
<body>
    <div class="Topbar">
        <div class="Tleft">
            <div class="logo"> <i class="fas fa-link"></i>WEB SERVICE</div>
            <div class="welcome">
                <h2>Create Your Account</h2>
                <p>To Start Using Our WebSite</p>
            </div>
        </div>
        <div class="Tright">

            <form action="" method="Post"> 
                <section class="copy">
                    <h2>Sign Up</h2>
                    <div class="login-sontainer">
                        <p>Already have an account? <a href="../index.php">
                            <strong>Log In</strong></a></p>
                    </div>
                </section> <br>
               
                <div class="input-container email">
                    <label for="email">Email address</label> 
                    <input type="text" name="txtemail" id="email" placeholder="Email">
                </div>
                <br>
                <div class="input-container email">
                    <label for="email">Username</label> 
                    <input type="text" name="txtusername" id="email" placeholder="Username">
                </div>
                <br>
                <div class="input-container name">
                    <label for="fname">Password</label>
                    <input type="password" name="txtpassword" id="fname" placeholder="Password">
                </div> 
                <br>
                <div class="input-container password">
                    <label for="password">Repeat Password</label> 
                    <input type="password" name="txtconfirm" id="password"placeholder="Repeat Password">
                </div>
                <!-- <div class="input-container cta">
                    <label class="checkbox-container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        I accept that rule.
                    </label>
                </div> -->
                <button class="signup-btn" type="submit" name="register"> Creat Account</button>
            </form>
        </div>
    </div>

</body>
</html>