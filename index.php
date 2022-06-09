<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Login quản lý nhân viên</title>
</head>

<body>
    <?php
      require_once './assets/php/conn.php';
    ?>

    <div class="login-signup l-attop" id="login">
        <div class="login-signup-title">
          LOG IN
        </div>
        <form method="post" action="<?php
            $errorSI = []; 
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                if($username == "" && $password == ""){
                  $errorSI['username']['require'] = "<p style = 'color: red;'>You need filed username</p>";
                  $errorSI['password']['require'] = "<p style = 'color: green;'>You need filed password</p>";
                }
                if($username == ""){
                  $errorSI['username']['require'] = "<p style = 'color: red;'>You need filed username</p>";
                }
                else if( $password == ""){
                  $errorSI['password']['require'] = "<p style = 'color: green;'>You need filed password</p>";
                }

            }
            if(!empty($username) && !empty($password)){
                $sqlcmd = " SELECT * FROM `account`";
                $qr = mysqli_query($conn,$sqlcmd);
                while($row = mysqli_fetch_assoc($qr)){
                  $usernameDB = $row['username'] ;
                  $passwordDB = $row['password'] ;
                  if($usernameDB == $username && $password == $passwordDB){
                    header("location: admin.php");
                  }
                  else if($usernameDB != $username && $passwordDB != $password){
                     if($usernameDB != $username  ){
                      $errorSI['username']['is_username'] = "<p style = 'color: red;'>You enter error username </p>";
                    }
                    else if($passwordDB != $password){
                      $errorSI['password']['is_password'] = "<p style = 'color: green;'>You enter error password</p>";
                    }
  
                  }


                }
            }
        ?>">
          <div class="login-signup-content">
            <div class="input-name">
              <h2>Username</h2>
            </div>
            <input type="text" name="username" value="" class="field-input" />
            <?php 
                if(!empty($errorSI['username']['require'])){
                    echo $errorSI['username']['require'];
                }else if(!empty($errorSI['username']['is_username'])){
                  echo $errorSI['username']['is_username'];
                }
            ?>

            <div class="input-name input-margin">
              <h2>Password</h2>
            </div>
            <input type="password" name="password" value="" class="field-input" />
            <?php 
              if(!empty($errorSI['password']['require'])){
                  echo $errorSI['password']['require'];
              }else if(!empty($errorSI['password']['is_password'])){
                echo $errorSI['password']['is_password'];
              }
            ?>
            <div class="input-r">
              <div class="check-input">
                <input type="checkbox" id="remember-me-2" name="rememberme" value="" class="checkme">
                <label class="remmeberme-blue" for="remember-me-2"></label>
              </div>
              <div class="rememberme"><label for="remember-me-2">Remember Me</label></div>
            </div>
            <input type="submit" class="submit-btn" name="submit" value="Enter" />
        
            <div class="forgot-pass">
              <a href="#">Forgot Password?</a>
            </div>
        
          </div>
        </form>

      </div>
      
      
      <div class="login-signup s-atbottom" id="signup">
        <div class="login-signup-title">
          SIGN UP
        </div>
        <form method="post" action = "
        <?php
          $errorSU = []; 
          if(isset($_POST['submit-SU'])){
              $username = $_POST['username'];
              $email = $_POST['email'];
              $password = $_POST['password'];

              if($username == "" && $password == "" && $email == ""){
                $errorSU['username']['require'] = "<p style = 'color: red;'>You need filed username</p>";
                $errorSU['password']['require'] = "<p style = 'color: green;'>You need filed password</p>";
                $errorSU['email']['require'] = "<p style = 'color: yellow;'>You need filed email</p>";
              }
              else if($username == ""){
                $errorSU['username']['require'] = "<p style = 'color: red;'>You need filed username</p>";

              }
              else if($password == ""){
                $errorSU['password']['require'] = "<p style = 'color: green;'>You need filed password</p>";

              }
              else if($email == ""){
                $errorSU['email']['require'] = "<p style = 'color: yellow;'>You need filed email</p>";
              }

          }

          if(!empty($username) && !empty($password)){
            $sqlcmd = " SELECT * FROM `account` ";
            $qr = mysqli_query($conn,$sqlcmd);
            while($row = mysqli_fetch_assoc($qr)){
              $usernameDB = $row['username'] ;
              $emailDB = $row['email'] ;
              $passwordDB = $row['password'] ;
              if($username == $usernameDB && $password == $passwordDB && $email == $emailDB){
                $errorSU['repeated'] = "<p style = 'color: red;'>You information is exists already</p>"; 
              }
              else if($usernameDB == $username && $passwordDB == $passwordDB){
                $errorSU['account']= "<p style = 'color: red;'>You account is exists already</p>";
              }
              else if($emailDB == $email){
                $errorSU['email']['is_email'] = "<p style = 'color: red;'>You email is exists already</p>";
              }
              else{
                $errorSU['exception'] = "<p style = 'color: green;'>Success</p>";
              }



            }
            
            $sql_add = "INSERT INTO `account`( `username`, `password`, `email`) VALUES ('$username','$password','$email')";
            $qr = mysqli_query($conn,$sql_add);
        }

        ?>
        ">
          <div class="login-signup-content">
            <div class="input-name">
              <h2>Username</h2>
        
            </div>
            <input type="text" name="username" value="" class="field-input" />

            <?php 
                if(!empty($errorSU['username']['require'])){
                    echo $errorSU['username']['require'];}


            ?>

            <div class="input-name input-margin">
              <h2>E-Mail</h2>
        
            </div>
            <input type="text" name="email" value="" class="field-input" />

            <?php 
                if(!empty($errorSU['email']['require'])){
                    echo $errorSU['email']['require'];}

                else if(!empty($errorSU['email']['is_email'])){
                    echo $errorSU['email']['is_email'];
                  }
            ?>

            <div class="input-name input-margin">
              <h2>Password</h2>
        
            </div>
            <input type="text" name="password" value="" class="field-input" />
            <?php 
                if(!empty($errorSU['password']['require'])){
                    echo $errorSU['password']['require'];}
            ?>
        
            <input type="submit"  id = "registersubmit"  class="submit-btn" name="submit-SU" value="Enter" />
            <?php 
                if(!empty($errorSU['account'])){
                    echo $errorSU['account'];
                  }
                else if(!empty($errorSU['repeated'])){
                    echo $errorSU['repeated'];
                  }
                  else if(!empty($errorSU['exception'])){
                    echo $errorSU['exception'];
                  }
            ?>
        
          </div>
        </form>

      </div>
    <!-- Query -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <script src = "./assets/js/login.js"></script>
</body>

</html>