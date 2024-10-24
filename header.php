<!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="">
        <img src="assets/img/lg.jpg" width="80" height="80">
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active text-dark" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto text-dark" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto text-dark" href="product.php">products</a></li>
          <?php 
            if(isset($_SESSION['username'])){
              echo"<a href='logout.php' class='text-dark' style='text-decoration:none;'>logout</a>";
            }
            else{
              echo "<a href='login.php' class='text-dark' style='text-decoration:none;'>login</a>";
              echo "<a href='sigin.php' class='text-dark' style='text-decoration:none;'>signup</a>";
            }
           ?>
          <li><a class="nav-link scrollto text-dark" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
             <li class="nav-item dropdown ">
                     <a class="nav-link scrollto mb-3"> <i class="fa-solid fa-bars" style="color: black;"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a  href="logout.php">logout<i class="fa-solid fa-user"></i></a></li>
                    </ul>
              </li>
</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->