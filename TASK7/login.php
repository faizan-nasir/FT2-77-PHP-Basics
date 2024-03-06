<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP Basic Task 7</title>
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <div class="login">
      <form class="login-form" action="validate_session.php" method="post">
        <label for="username">Username: </label>
        <input
          type="text"
          placeholder="Enter Username"
          name="username"
          id="uname"
          required
        />
        <label for="password">Password: </label>
        <input
          type="password"
          placeholder="Enter Password"
          name="password"
          id="pwd"
          required
        />
        <input
          class="submit"
          name="submit"
          class="btn"
          type="submit"
          value="Submit"
        />
      </form>
    </div>
  </body>
</html>
