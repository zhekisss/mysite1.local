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

    <nav class="">
      <?php if (isset($this->request->session['auth_authorized'])): ?>
      <div class="container  red lighten-2">
        
        <a class="" href="#">Admin CMS</a>
        <div class="" id="">
          <ul class="menu">
            <li class="menu-item">
              <a class="" href="/admin">
                <i class=""></i> Home
              </a>
            </li>
            <li class="menu-item">
              <a class="" href="/admin/pages/">
                <i class=""></i> Pages
              </a>
            </li>
            <li class="menu-item">
              <a class="" href="#">
                <i class=""></i> Posts
              </a>
            </li>
            <li class="menu-item">
              <a class="">
                <i class=""></i> Settings
              </a>
            </li>
          </ul>
        </div>

        <div class="">
          <a href="/admin/logout/">
            <i class=""></i> Logout
          </a>
        </div>
      </div>
      <?php endif; ?>
    </nav>
  </header>