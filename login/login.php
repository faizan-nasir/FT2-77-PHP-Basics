<?php

require './action.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login_styles.css?<?=time()?>" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>
    <div class="container">
      <h2 class="t-center">Login</h2>
      <form action="./login.php" method="post">
        <div class="inputDiv">
          <label for="name" class="username">Email</label>
          <div class="userArea">
            <i class="fa-solid fa-user"></i
            ><input
              type="email"
              name="email"
              id="name"
              placeholder="Type your email"
            />
          </div>
          <hr />
        </div>
        <div class="inputDiv">
          <label for="password" class="username">Password</label>
          <div class="userArea">
            <i class="fa-solid fa-key"></i
            ><input
              type="password"
              name="password"
              id="password"
              placeholder="Type your password"
            />
          </div>
          <?php

          if ($message != ''):
          ?>
          <p class="red"><?=$message?></p>
          <?php
          endif;
          ?>
          <hr />
        </div>
        <!-- <p><a class="forgotPassword">Forgot password?</a></p> -->
        <input class="btn" type="submit" name="submit" value="Login">
        <div class="signup ">
          <p class="signUp">Or Sign Up using</p>
          <a href="../signup/signup.php" id="signUp">SIGN UP</a>
        </div>
        </div>
      </form>
    </div>
  </body>
</html>
