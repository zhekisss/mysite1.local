<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="/admin/Assets/lib/materialize.min.css">
  <link rel="stylesheet" href="/admin/Assets/css/style.min.css">

  <title>Админ-панель</title>

</head>

<body>
  <header>

    <nav class="container blue lighten-2 row center-align">
    <a class="col s2 xl2 l2" href="#"><?= $this->authuser->name; ?></a>
      <?php if (isset($this->request->session['auth_authorized'])): ?>
        
          <ul class="menu">
            <li class="menu-item">
              <a class="" href="/admin">
                 Home
              </a>
            </li>
            <li class="menu-item">
              <a class="" href="/admin/pages/">
                 Pages
              </a>
            </li>
            <li class="menu-item">
              <a class="" href="#">
                 Posts
              </a>
            </li>
            <li class="menu-item">
              <a class="">
                 Settings
              </a>
            </li>
            <li class="menu-item">
              <a href="/admin/logout/">
              Logout
            </a>

            </li>
          </ul>
        

        
        
      </div>
      <?php endif; ?>
    </nav>
  </header>