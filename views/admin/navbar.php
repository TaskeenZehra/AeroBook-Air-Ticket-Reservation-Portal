<?php
require_once '../../controllers/admin/navbarController.php';
?>
<html>
<body>
        
<section id="navbar" style="background-color: #4caf50;
  color: #fff;">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-sm  navbar-dark">
          <!-- Brand -->
          <span></span>
          <a class="navbar-brand" href="../index.php"
            >GYT Airlines</a
          >

         
          <!-- Dropdown -->
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbardrop"
                  data-toggle="dropdown"
                >
                <span style="color: #fff">Hi, <?php echo $name." ".$name1; ?> </span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="changePassword.php"
                    >Change Password</a
                  >
                  <form action="" method="post">
                  <input type="submit" class="dropdown-item" name="logout" value="Logout">
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
</body>
</html>