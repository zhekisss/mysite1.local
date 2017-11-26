<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  
</head>

<body>
<?php $this->header(); ?>

  <div id="login-form" class="container">

    <form role="form" method="POST" action="/admin/auth/">
      <h4>Login:</h4>
      <input name="email" type="email" class="form-control" placeholder="Email" required autofocus>
      <input name="password" type="password" class="form-control" placeholder="Password" required>
      <p>
      <input type="checkbox" class="filled-in" id="filled-in-box right" checked="checked" />
      <label for="filled-in-box">Remember me</label>
      <button type="submit" class="btn z-depth-2 teal lighten-2 right">Login</button>
    </p>
    </form>
<div class="error-message">

  <h2>
    <?= $this->request->session('badPassword'); ?>
</h2>

</div>
  </div>

  <?php $this->footer(); ?>
</body>

</html>