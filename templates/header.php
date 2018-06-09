<?php
    global $assetPath;
    if ($_SERVER['SERVER_NAME'] === 'blogg.robertahaggstrom.chas.academy') {
        $assetPath = 'http://' . $_SERVER['HTTP_HOST'] . '/web/';
    } else {
        $assetPath = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Blog Lynn Dylan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $assetPath . "assets/css/style.css " ?>">
</head>

<body>
<header class="header">

  <form class="login" action="/login" method="post">
      <input type="text" name="username" placeholder="Admin username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" value="Login">
      <br>
  </form>

  <div class="register">
      <a href="/register"><button>Register new user</button></a>
</div>

  <p class="errorMessageStyle">
      <?php
      $errorLogin = $params['ErrorMessage'];
      echo $errorLogin;
      ?>
  </p>

</header>

<main>
  <!-- Page content here -->