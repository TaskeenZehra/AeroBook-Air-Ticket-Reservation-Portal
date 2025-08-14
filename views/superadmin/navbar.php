<?php
require '../../controllers/superadmin/navbarController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();}
?>
<html>
  <body>
       
    <section id="navbar" style="background-color: #4caf50;
  color: #fff;">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-sm  navbar-dark">
          <!-- Brand -->
          <a class="navbar-brand" href="/Mid-Project/index.php"
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
                <form action="" method="post">
                <a class="dropdown-item" href="changePassword.php"
                    >Change Password</a
                  >
                    <input
                      class="dropdown-item"
                      type="submit"
                      name="logout"
                      value="Logout"
                    />
                   
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
