<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Admin QLGAME</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="assets/vendor/Atlantis-Lite-Admin/img/icon.ico" type="image/x-icon" />
  <script src="assets/vendor/Atlantis-Lite-Admin/js/core/jquery.3.2.1.min.js"></script>
  <!-- Fonts and icons -->
  <script src="assets/vendor/Atlantis-Lite-Admin/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['assets/vendor/Atlantis-Lite-Admin/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>
  <link rel="stylesheet" href="assets/vendor/fontawesome-free-6.2.0-web/css/all.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/vendor/Atlantis-Lite-Admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/Atlantis-Lite-Admin/css/atlantis.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/vendor/Atlantis-Lite-Admin/css/demo.css">

  <!-- Modal -->
  <link rel="stylesheet" href="css/_user.css">
</head>

<body>
  <div class="wrapper">
    <div class="main-header">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="blue">

        <div class="logo">
          <img src="assets/vendor/Atlantis-Lite-Admin/img/logo.svg" alt="navbar brand" class="navbar-brand">
        </div>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="icon-menu"></i>
          </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
          </button>
        </div>
      </div>
      <!-- End Logo Header -->

      <!-- Navbar Header -->
      <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

        <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="avatar-sm">
                  <img src="assets/vendor/Atlantis-Lite-Admin/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg"><img src="assets/vendor/Atlantis-Lite-Admin/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
                      <div class="u-text">
                        <h4><?php echo $_SESSION['TEN_DN'] ?></h4>
                        <p class="text-muted"><?php echo $_SESSION['EMAIL'] ?></p>
                      </div>
                    </div>
                  </li>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-primary">
            <li class="nav-item active submenu">
              <a data-toggle="collapse" href="#tables">
                <i class="fas fa-table"></i>
                <p>Tables</p>
                <span class="caret"></span>
              </a>
              <form method="get">
                <div class="collapse show" id="tables">
                  <ul class="nav nav-collapse">
                    <?php
                    foreach ($arrTable as $key => $value) {
                      echo "<button name='$key' type='submit' style='background-color: transparent; border: none; width: 100%;'>
                        <li class='" . activeClasses($tag, $key) . "'>
                          <a>
                            <span class='sub-item'>$value</span>
                          </a>
                        </li>
                      </button>";
                    }
                    ?>
                  </ul>
                </div>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title"><?= $tagName ?></h4>
          </div>
          <div class="page-category">
