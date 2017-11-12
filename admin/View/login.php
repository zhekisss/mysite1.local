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

  <div class="container">

    <form role="form" method="POST" action="/admin/auth/">
      <h2>Login to CMS</h2>
      <input name="email" type="email" class="form-control" placeholder="Email" required autofocus>
      <input name="password" type="password" class="form-control" placeholder="Password" required>
      <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
      <button type="submit">Login</button>
    </form>
<div class="error-message">
  <h2>
    
</h2>
</div>
  </div>
  
</body>

</html>