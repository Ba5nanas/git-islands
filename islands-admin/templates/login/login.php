<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Error</title>

    <!-- Bootstrap -->
    <link href="<?php echo $islands['admin']['view']['assets']; ?>css/reset.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="<?php echo $islands['admin']['view']['assets']; ?>css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">

      <div class="login-form" >
        <h1 class=""><span class="color big-size"> I </span>SLANDS</h1>
        <form class="form-submit" action="?state=loggin" method="POST" autocomplete="off">
          <label>Username</label>
          <p><input type="text" name="username" autocomplete="off"></p>
          <label>Password</label>
          <p><input type="password" name="password" autocomplete="off"></p>
          <p><input type="submit" value="LOGIN"></p>
        </form>
      </div>
    </div>

  </body>
</html>
