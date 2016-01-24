<?php global $islands; ?>
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
    <link href="<?php echo $islands['admin']['view']['assets']; ?>css/style.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
      <div class="display-error">
        <h1>Error Connect Server : </h1>
        <p><?php echo $islands['state']['message'] ?></p>
      </div>
    </div>

  </body>
</html>
