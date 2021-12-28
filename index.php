<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include("urldomain.php");
include('./connect.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}

if (isset($_SESSION["username_badminton"])) {
  if ((time() - $_SESSION["login_timestamp"]) > $sessiontime) {
    header("location: logout.php");
  } else {
    if ($_SESSION["permission_badminton"] == "S" || $_SESSION["permission_badminton"] == "A") {
      header("Location: /" . $url . "/" . "staff.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Agency - Start Bootstrap Theme</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="./assets/front-end/css/styles.css" rel="stylesheet" />
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top"><img src="./assets/front-end/assets/img/navbar-logo.svg" alt="..." /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <?php
          if (!isset($_SESSION['username_badminton'])) {
            echo "<li class='nav-item'><a class='nav-link' data-bs-toggle='modal' data-target='#myModalRegis' href='#register'>สมัครสมาชิก</a></li>";
            echo "<li class='nav-item'><a class='nav-link' data-bs-toggle='modal' data-target='#myModalLogin' href='#login'>เข้าสู่ระบบ</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link' href='#services'>Services</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#product'>สินค้า</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#about'>About</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#team'>Team</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#contact'>ติดต่อเรา</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#' id='user_detail'>" . strtoupper($_SESSION["firstname_badminton"]) . "</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='logout.php'>ออกจากระบบ</a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container">
      <div class="masthead-subheading">Welcome To Our Studio!</div>
      <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
      <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
    </div>
  </header>
  <!-- Services-->
  <section class="page-section" id="services">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Services</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="my-3">E-Commerce</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto
            quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="my-3">Responsive Design</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto
            quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="my-3">Web Security</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto
            quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Portfolio Grid-->
  <div id="product">
    <section class="page-section bg-light" id="portfolio">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">สินค้า</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
          <?php
          $perpage = 6;
          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          } else {
            $page = 1;
          }
          $start = ($page - 1) * $perpage;

          $sql = "SELECT * FROM product WHERE product_id LIKE '%" . $strKeyword . "%' OR Name LIKE '%" . $strKeyword . "%'
            limit {$start} , {$perpage} 
            ";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">

                  <?php
                  if (isset($_SESSION['username_badminton'])) {
                    echo "<a class='portfolio-link' data-bs-toggle='modal' href='#cart$row[product_id]'>";
                    echo "<div class='portfolio-hover'>";
                    echo "<div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>";
                    echo "</div>";
                    echo "<img class='img-fluid' src='./assets/img/$row[img]' alt='...' />";
                    echo "</a>";
                  } else {
                    echo "<a class='portfolio-link' data-bs-toggle='modal' href='#cart'>";
                    echo "<div class='portfolio-hover'>";
                    echo "<div class='portfolio-hover-content'><label for='email'>&nbsp&nbspกรุณา Login ก่อนทำรายการ</label></div>";
                    echo "</div>";
                    echo "<img class='img-fluid' src='./assets/img/$row[img]' alt='...' />";
                    echo "</a>";
                  }
                  ?>

                  <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Threads</div>
                    <div class="portfolio-caption-subheading text-muted">Illustration</div>
                  </div>
                </div>
              </div>
          <?php
            } //while condition closing bracket
          }  //if condition closing bracket
          ?>
        </div>
        <?php
        $sql2 = "SELECT * FROM product";
        $query2 = mysqli_query($conn, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="index.php?page=1#product" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php
            for ($i = 1; $i <= $total_page; $i++) {
            ?>
              <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $i; ?>#product">
                  <?php echo $i; ?>
                </a>
              </li>
            <?php
            }
            ?>
            <li class="page-item">
              <a class="page-link" href="index.php?&page=<?php echo $total_page; ?>#product">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </section>
  </div>
  <!-- About-->
  <section class="page-section" id="about">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">About</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
      <ul class="timeline">
        <li>
          <div class="timeline-image"><img class="rounded-circle img-fluid" src="./assets/front-end/assets/img/about/1.jpg" alt="..." />
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>2009-2011</h4>
              <h4 class="subheading">Our Humble Beginnings</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius
                sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                dolore laudantium consectetur!</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image"><img class="rounded-circle img-fluid" src="./assets/front-end/assets/img/about/2.jpg" alt="..." />
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>March 2011</h4>
              <h4 class="subheading">An Agency is Born</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius
                sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                dolore laudantium consectetur!</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-image"><img class="rounded-circle img-fluid" src="./assets/front-end/assets/img/about/3.jpg" alt="..." />
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>December 2015</h4>
              <h4 class="subheading">Transition to Full Service</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius
                sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                dolore laudantium consectetur!</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image"><img class="rounded-circle img-fluid" src="./assets/front-end/assets/img/about/4.jpg" alt="..." />
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>July 2020</h4>
              <h4 class="subheading">Phase Two Expansion</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius
                sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                dolore laudantium consectetur!</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            <h4>
              Be Part
              <br />
              Of Our
              <br />
              Story!
            </h4>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <!-- Team-->
  <section class="page-section bg-light" id="team">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="./assets/front-end/assets/img/team/1.jpg" alt="..." />
            <h4>Parveen Anand</h4>
            <p class="text-muted">Lead Designer</p>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="./assets/front-end/assets/img/team/2.jpg" alt="..." />
            <h4>Diana Petersen</h4>
            <p class="text-muted">Lead Marketer</p>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="./assets/front-end/assets/img/team/3.jpg" alt="..." />
            <h4>Larry Parker</h4>
            <p class="text-muted">Lead Developer</p>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam
            veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Clients-->
  <div class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3 col-sm-6 my-3">
          <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="./assets/front-end/assets/img/logos/microsoft.svg" alt="..." /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
          <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="./assets/front-end/assets/img/logos/google.svg" alt="..." /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
          <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="./assets/front-end/assets/img/logos/facebook.svg" alt="..." /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
          <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="./assets/front-end/assets/img/logos/ibm.svg" alt="..." /></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact-->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Contact Us</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
      <!-- * * * * * * * * * * * * * * *-->
      <!-- * * SB Forms Contact Form * *-->
      <!-- * * * * * * * * * * * * * * *-->
      <!-- This form is pre-integrated with SB Forms.-->
      <!-- To make this form functional, sign up at-->
      <!-- https://startbootstrap.com/solution/contact-forms-->
      <!-- to get an API token!-->
      <form id="contactForm" data-sb-form-api-token="API_TOKEN">
        <div class="row align-items-stretch mb-5">
          <div class="col-md-6">
            <div class="form-group">
              <!-- Name input-->
              <input class="form-control" id="name_contact" type="text" placeholder="ชื่อ *" data-sb-validations="required" />
              <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <div class="form-group">
              <!-- Email address input-->
              <input class="form-control" id="email_contact" type="email" placeholder="อีเมล *" data-sb-validations="required,email" />
              <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
              <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>
            <div class="form-group mb-md-0">
              <!-- Phone number input-->
              <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
              <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group form-group-textarea mb-md-0">
              <!-- Message input-->
              <textarea class="form-control" id="comments_contact" placeholder="ความคิดเห็น *" data-sb-validations="required"></textarea>
              <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
            </div>
          </div>
        </div>
        <!-- Submit success message-->
        <!---->
        <!-- This is what your users will see when the form-->
        <!-- has successfully submitted-->
        <div class="d-none" id="submitSuccessMessage">
          <div class="text-center text-white mb-3">
            <div class="fw-bolder">Form submission successful!</div>
            To activate this form, sign up at
            <br />
            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
          </div>
        </div>
        <!-- Submit error message-->
        <!---->
        <!-- This is what your users will see when there is-->
        <!-- an error submitting the form-->
        <div class="d-none" id="submitErrorMessage">
          <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <?php
        if (isset($_SESSION['username_badminton'])) {
          echo "<div class='text-center'><button class='btn btn-primary btn-xl text-uppercase' id='btn_contact' type='submit'>ส่ง</button></div>";
          echo "<button class='btn pull-right' id='btn_contact' type='button'>ส่ง</button>";
        } else {
          echo "<div class='text-center'><label class='section-heading text-uppercase' for='email'>&nbsp&nbspกรุณา Login ก่อนทำรายการ</label></div>";      
        }
        ?>
       
      </form>
    </div>
  </section>
  <!-- Footer-->
  <footer class="footer py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2021</div>
        <div class="col-lg-4 my-3 my-lg-0">
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/Biriya-Badminton-%E0%B8%AA%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B9%81%E0%B8%9A%E0%B8%94%E0%B8%A1%E0%B8%B4%E0%B8%99%E0%B8%95%E0%B8%B1%E0%B8%99%E0%B8%9E%E0%B8%B4%E0%B8%A3%E0%B8%B4%E0%B8%A2%E0%B8%B0-252610451461385/?ref=page_internal"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
          <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
        <p>Page Facebook : <a href="https://www.facebook.com/Biriya-Badminton-%E0%B8%AA%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B9%81%E0%B8%9A%E0%B8%94%E0%B8%A1%E0%B8%B4%E0%B8%99%E0%B8%95%E0%B8%B1%E0%B8%99%E0%B8%9E%E0%B8%B4%E0%B8%A3%E0%B8%B4%E0%B8%A2%E0%B8%B0-252610451461385/?ref=page_internal" data-toggle="tooltip" title="Biriya Badminton">Biriya Badminton - สนามแบดมินตันพิริยะ</a></p>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
          <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
        </div>
      </div>
    </div>
  </footer>
  <?php
  $i = 1;
  $sql = "SELECT * FROM product WHERE product_id LIKE '%" . $strKeyword . "%' OR Name LIKE '%" . $strKeyword . "%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
  ?>
      <!-- Portfolio Modals-->
      <!-- Portfolio item 1 modal popup-->
      <div class="portfolio-modal modal fade" id="cart<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/front-end/assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="modal-body">
                    <!-- Project details-->
                    <h2 class="text-uppercase"><?php echo $row['name']; ?></h2>
                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                    <img class="img-fluid d-block mx-auto" src="./assets/img/<?php echo $row['img']; ?>" alt="..." />
                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                      blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia
                      expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                    <ul class="list-inline">
                      <li>
                        <strong>Client:</strong>
                        Threads
                      </li>
                      <li>
                        <strong>Category:</strong>
                        Illustration
                      </li>
                    </ul>
                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                      <i class="fas fa-times me-1"></i>
                      Close Project
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php
      $i++;
    } //while condition closing bracket
  }  //if condition closing bracket
  ?>
  <!-- Portfolio Modals-->
  <!-- Portfolio item 1 modal popup-->
  <div class="portfolio-modal modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/front-end/assets/img/close-icon.svg" alt="Close modal" /></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="modal-body">
                <!-- Project details-->
                <form class="needs-validation" novalidate>
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <label for="firstName" class="form-label">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="lastName" class="form-label">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                        <div class="invalid-feedback">
                          Your username is required.
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                      <input type="email" class="form-control" id="email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="col-md-5">
                      <label for="country" class="form-label">Country</label>
                      <select class="form-select" id="country" required>
                        <option value="">Choose...</option>
                        <option>United States</option>
                      </select>
                      <div class="invalid-feedback">
                        Please select a valid country.
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label for="state" class="form-label">State</label>
                      <select class="form-select" id="state" required>
                        <option value="">Choose...</option>
                        <option>California</option>
                      </select>
                      <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="zip" class="form-label">Zip</label>
                      <input type="text" class="form-control" id="zip" placeholder="" required>
                      <div class="invalid-feedback">
                        Zip code required.
                      </div>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-address">
                    <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="save-info">
                    <label class="form-check-label" for="save-info">Save this information for next time</label>
                  </div>

                  <hr class="my-4">

                  <h4 class="mb-3">Payment</h4>

                  <div class="my-3">
                    <div class="form-check">
                      <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                      <label class="form-check-label" for="credit">Credit card</label>
                    </div>
                    <div class="form-check">
                      <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                      <label class="form-check-label" for="debit">Debit card</label>
                    </div>
                    <div class="form-check">
                      <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                      <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                  </div>

                  <div class="row gy-3">
                    <div class="col-md-6">
                      <label for="cc-name" class="form-label">Name on card</label>
                      <input type="text" class="form-control" id="cc-name" placeholder="" required>
                      <small class="text-muted">Full name as displayed on card</small>
                      <div class="invalid-feedback">
                        Name on card is required
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label for="cc-number" class="form-label">Credit card number</label>
                      <input type="text" class="form-control" id="cc-number" placeholder="" required>
                      <div class="invalid-feedback">
                        Credit card number is required
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="cc-expiration" class="form-label">Expiration</label>
                      <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                      <div class="invalid-feedback">
                        Expiration date required
                      </div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                    </div>
                    <div class="col-md-3">
                      <label for="cc-cvv" class="form-label">CVV</label>
                      <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                      <div class="invalid-feedback">
                        Security code required
                      </div>
                    </div>
                    <div class="form-group">
                            <label for="idcard_regis"><span class="glyphicon glyphicon-book"></span> IDCard</label>
                            <input type="number" class="form-control" id="idcard_regis" placeholder="Enter IDCard">
                        </div>
                        <div class="form-group">
                            <label for="optradio"><span class="glyphicon glyphicon-heart"></span> Sex</label>
                            <div class="radio">
                                <label><input type="radio" name="optradio" value="1" checked>Male</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio" value="0">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel_regis"><span class="glyphicon glyphicon-earphone"></span> Telephone number</label>
                            <input type="number" class="form-control" id="tel_regis" placeholder="Enter Telephone number">
                        </div>
                  </div>

                  <hr class="my-4">

                  <button class="w-100 btn btn-primary btn-lg" type="button" id="btn_regis" >Continue to checkout</button>
                </form>
                <hr>
                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                  <i class="fas fa-times me-1"></i>
                  Close Project
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="portfolio-modal modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/front-end/assets/img/close-icon.svg" alt="Close modal" /></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="modal-body">
                <!-- Project details-->
                <form class="needs-validation" role="form" novalidate>
                  <div class="row g-3">
                    
                 

                    <div class="col-12">
                      <label for="user_name" class="form-label"><span class="glyphicon glyphicon-shopping-cart"></span> Username</label>
                      <input type="text" class="form-control" id="user_name" placeholder="Enter username">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="pwd_login" class="form-label"><span class="glyphicon glyphicon-user"></span> Password</label></label>
                      <input type="password" class="form-control" id="pwd_login" placeholder="Enter password" required>
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>
                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="button" id="login">Login<span class="glyphicon glyphicon-ok"></span></button>
                  </div>

                  
                </form>
                <hr>
                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                  <i class="fas fa-times me-1"></i>
                  Close Project
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Action jQuery -->
  <script>
        const price_per_hour = 150;
        // $(function() {
        //     $('#datetimepicker1').datetimepicker();
        // });

        $(document).ready(function() {
            // Footer - Initialize Tooltip - Link
            $('[data-toggle="tooltip"]').tooltip();

            // scrolling to all links in navbar + footer link [ ^ ]
            $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {

                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Action เลื่อนหน้าจอ jQuery
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;

                    });
                } // End if
            });

            $("#login").click(function() {
                // alert("login");
                var usr = $("#user_name").val();
                var pwd_login = $("#pwd_login").val();
                $.post("login.php", {
                    usr: usr,
                    pwd_login: pwd_login
                }, function(datacallback) {
                    if (datacallback == "login_success") {
                        location.reload();
                    } else {
                        alert("เกิดข้อผิดพลาด กรุณาตรวจสอบ Username หรือ Password");
                    }
                });
            });


            $("#btn_contact").click(function() {
                // alert("success");
                var name_con = $("#name_contact").val();
                var email_con = $("#email_contact").val();
                var comments_con = $("#comments_contact").val();
                if (name_con == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (email_con == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (comments_con == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else {
                    $.post("contact.php", {
                        name_con: name_con,
                        email_con: email_con,
                        comments_con: comments_con
                    }, function(datacallback) {
                        if (datacallback == "ส่งข้อมูลสำเร็จ") {
                            alert(datacallback);
                            location.reload();
                        } else {
                            alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
                            // alert(datacallback);
                        }
                    });
                }
            });


            $("#btn_regis").click(function() {
                var firstname_regis = $("#firstname_regis").val();
                var lastname_regis = $("#lastname_regis").val();
                var username_regis = $("#username_regis").val();
                var pwd_regis = $("#pwd_regis").val();
                var confirm_pwd = $("#confirm_pwd").val();
                var idcard_regis = $("#idcard_regis").val();
                var tel_regis = $("#tel_regis").val();
                var sex_regis = $("input[name=optradio]:checked").val();

                // console.log(firstname_regis + lastname_regis + username_regis + pwd_regis + confirm_pwd + idcard_regis + tel_regis);

                if (firstname_regis == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (lastname_regis == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (username_regis == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (pwd_regis == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (confirm_pwd == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (idcard_regis == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (tel_regis == "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                } else if (pwd_regis != confirm_pwd) {
                    alert("กรุณาตรวจสอบรหัสผ่านของคุณอีกครั้ง");
                    $("#pwd_regis").val("");
                    $("#confirm_pwd").val("");
                } else {
                    $.post("register.php", {
                        firstname_regis: firstname_regis,
                        lastname_regis: lastname_regis,
                        username_regis: username_regis,
                        pwd_regis: pwd_regis,
                        confirm_pwd: confirm_pwd,
                        idcard_regis: idcard_regis,
                        sex_regis: sex_regis,
                        tel_regis: tel_regis
                    }, function(datacallback) {
                        if (datacallback == "success") {
                            alert("ลงทะเบียนสำเร็จ");
                            $("#firstname_regis").val("");
                            $("#lastname_regis").val("");
                            $("#username_regis").val("");
                            $("#pwd_regis").val("");
                            $("#confirm_pwd").val("");
                            $("#idcard_regis").val("");
                            $("#tel_regis").val("");
                        } else if (datacallback == "already") {
                            alert("มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว");
                            $("#username_regis").val("");
                            $("#pwd_regis").val("");
                            $("#confirm_pwd").val("");
                        } else {
                            alert("เกิดขึ้นผิดพลาด: " + datacallback);
                        }
                    });
                }
            });

            // ปุ่มจองพื้นมาสติกถูกกด
            $("#stadium_mastic").click(function() {
                var d = new Date();
                // ไม่ให้เลือกวันที่ที่เป็นอดีต https://stackoverflow.com/questions/43274559/how-do-i-restrict-past-dates-in-html5-input-type-date
                // https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_max_min
                // ค่าเดือนจะได้ค่า 0-11 : 0หมายถึงมกราคม, 11หมายถึงเดือนธันวาคม
                var month = d.getMonth();
                month = month + 1; // เพิ่ม month บวก 1 เข้าไปเพื่อให้อ่านเดือนได้แบบปกติ คือเดือน 1-12
                if (month < 10) {
                    // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
                    $('#date_reserve_mastic').attr('min', d.getFullYear() + "-0" + month + "-" + d.getDate());
                } else {
                    // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
                    $('#date_reserve_mastic').attr('min', d.getFullYear() + "-" + month + "-" + d.getDate());
                }
                $("#myModalReserveMastic").modal("show"); // สั่งให้ modal แสดง
            });

            // ปุ่มจองพื้นยางถูกกด
            $("#stadium_rubber").click(function() {
                var d = new Date();
                var month = d.getMonth();
                month = month + 1; // เพิ่ม month บวก 1 เข้าไปเพื่อให้อ่านเดือนได้แบบปกติ คือเดือน 1-12
                if (month < 10) {
                    // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
                    $('#date_reserve_mastic').attr('min', d.getFullYear() + "-0" + month + "-" + d.getDate());
                } else {
                    // <input type="date" id="datemin" name="datemin" min="2021-03-17"> แอตทิบิ้ว min="" คือการกำหนดให้วันสุดท้ายสุดที่เลือกได้
                    $('#date_reserve_mastic').attr('min', d.getFullYear() + "-" + month + "-" + d.getDate());
                }
                $("#myModalReserveRubber").modal("show");
            });


            // ปุ่มยืมไม้แบตมินตัน
            $("#btlend_bad").click(function() {
                $("#myModalbad").modal("show"); // สั่งให้ modal แสดง
            });
            $("#bt_lend_modal_bad").click(function() {
                var lend_modal_bad = $("#lend_modal_bad").val();
                $.post("lend_racket.php", {
                    lend_modal_bad: lend_modal_bad
                }, function(datacallback) {
                    if (datacallback == "success") {
                        alert("ยืมสำเร็จ");
                        $("#myModalbad").modal("hide"); // สั่งให้ modal ปิด
                    } else {
                        alert("ยืมไม่สำเร็จ");
                        alert(datacallback);
                    }
                });
            });


            // ปุ่มยืมรองเท้า
            $("#btlend_shoes").click(function() {
                $("#myModalshoes").modal("show"); // สั่งให้ modal แสดง
            });
            $("#bt_lend_modal_shoes").click(function() {
                var lend_modal_shoes = $("#lend_modal_shoes").val();
                $.post("lend_shoes.php", {
                    lend_modal_shoes: lend_modal_shoes
                }, function(datacallback) {
                    if (datacallback == "success") {
                        alert("ยืมสำเร็จ");
                        $("#myModalshoes").modal("hide"); // สั่งให้ modal ปิด
                    } else {
                        alert("ยืมไม่สำเร็จ");
                        alert(datacallback);
                    }
                });
            });

            $("#btn_submit_stadium_mastic").click(function() {
                var date_reserve_mastic = $("#date_reserve_mastic").val();
                var time_reserve_mastic = $("#time_reserve_mastic").val();
                var stadium_reserve_mastic = $("#stadium_reserve_mastic").val();
                // Debug
                // alert(date_reserve_mastic + " " + time_reserve_mastic); // แสดงวัน/เวลาที่ได้

                // ตรวจสอบค่าว่าง
                if (date_reserve_mastic == "") {
                    alert("กรุณากรอกวันที่จอง");
                } else if (time_reserve_mastic == "") {
                    alert("กรุณากรอกเวลาจอง");
                } else {
                    $.post("stadium_mastic.php", {
                        date_reserve_mastic: date_reserve_mastic,
                        time_reserve_mastic: time_reserve_mastic,
                        stadium_reserve_mastic: stadium_reserve_mastic
                    }, function(datacallback) {
                        if (datacallback == "success") {
                            alert("การจองเสร็จสิ้น");
                            $("#date_reserve_mastic").val("");
                            $("#time_reserve_mastic").val("13");
                            $("#stadium_reserve_mastic").val("1"); // เช็ตค่าเริ่มต้นที่ <option value='1'></option>
                            $("#myModalReserveMastic").modal("hide");
                        } else if (datacallback == "timealready") {
                            alert("กรุณาเลือกวัน/เวลาใหม่เนื่องจากสนามไม่ว่าง");
                        } else if (datacallback == "timeout") {
                            alert("จำนวนชั่วโมงไม่พอในการจอง");
                        } else {
                            alert("ERROR Please check #btn_submit_stadium_mastic.click : " + datacallback);
                        }
                    });
                }
            });

            $("#btn_submit_stadium_rubber").click(function() {
                var date_reserve_rubber = $("#date_reserve_rubber").val();
                var time_reserve_rubber = $("#time_reserve_rubber").val();
                var stadium_reserve_rubber = $("#stadium_reserve_rubber").val();
                // Debug
                // alert(date_reserve_rubber + " " + time_reserve_rubber); // แสดงวัน/เวลาที่ได้

                // ตรวจสอบค่าว่าง
                if (date_reserve_rubber == "") {
                    alert("กรุณากรอกวันที่จอง");
                } else if (time_reserve_rubber == "") {
                    alert("กรุณากรอกเวลาจอง");
                } else {
                    $.post("stadium_rubber.php", {
                        date_reserve_rubber: date_reserve_rubber,
                        time_reserve_rubber: time_reserve_rubber,
                        stadium_reserve_rubber: stadium_reserve_rubber
                    }, function(datacallback) {
                        if (datacallback == "success") {
                            alert("การจองเสร็จสิ้น");
                            $("#date_reserve_rubber").val("");
                            $("#time_reserve_rubber").val("13");
                            $("#stadium_reserve_rubber").val("1"); // เช็ตค่าเริ่มต้นที่ <option value='1'></option>
                            $("#myModalReserveRubber").modal("hide");
                        } else if (datacallback == "timealready") {
                            alert("กรุณาเลือกวัน/เวลาใหม่เนื่องจากสนามไม่ว่าง");
                        } else if (datacallback == "timeout") {
                            alert("จำนวนชั่วโมงไม่พอในการจอง");
                        } else {
                            alert("ERROR Please check #btn_submit_stadium_rubber.click : " + datacallback);
                        }
                    });
                }
            });

            $("#time_add").change(function() {
                var hr = $("#time_add").val();
                var cost = hr * price_per_hour;
                $("#cost_add").text(cost);
                $("#addtime_cost").val(cost);
            });


            $("#form_addtime").submit(function(e) {
                // alert("N");
                e.preventDefault();
                var formData = new FormData(this);
                // ส่งค่าไปแค่ราคา 1ชั่วโมง:170บาท  ไปที่ payment.php
                $.ajax({
                    type: "POST",
                    url: "payment.php",
                    data: formData,
                    success: function(data) {
                        if (data == "imageonly") {
                            alert("อนุญาติเฉพาะรูปภาพเท่านั้น");
                        } else if (data == "exists") {
                            alert("ชื่อไฟล์นี้มีในระบบแล้ว");
                        } else if (data == "success") {
                            alert("ดำเนินการเสร็จสิ้น");
                            $("#addtime_cost").val(price_per_hour);
                            $("#time_add").val("1");
                            $("#cost_add").text(price_per_hour);
                            $("#fileToUpload").val("");
                            $("#myModalAddtime").modal("hide");
                        } else if (data == "error") {
                            alert("เกิดปัญหาการ insert db ผิดพลาด");
                        } else if (data == "movefilefail") {
                            alert("เกิดปัญหาการการย้านไฟล์ หรือตำแหน่งไดเรกทอรี่ผิดพลาด");
                        } else {
                            alert("ERROR: " + data);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });


            $(".btn_package").click(function() {
                var pck_time = $(this).data("package");
                var pck_cost = $(this).data("packagecost");
                // alert(pck_cost+" "+pck_time);
                $("#addtime_cost_package").val(pck_cost);
                $("#addtime_package").val(pck_time);
                $("#alertcost_add_package").text(pck_time);
                $("#myModalAddtimePackage").modal("show");
            });


            $("#form_addtime_package").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "payment_package.php",
                    data: formData,
                    success: function(data) {
                        if (data == "imageonly") {
                            alert("อนุญาติเฉพาะรูปภาพเท่านั้น");
                        } else if (data == "exists") {
                            alert("ชื่อไฟล์นี้มีในระบบแล้ว");
                        } else if (data == "success") {
                            alert("ดำเนินการเสร็จสิ้น");
                            $("#addtime_cost_package").val("");
                            $("#addtime_package").val("");
                            $("#fileToUploadPackage").val("");
                            $("#myModalAddtimePackage").modal("hide");
                        } else if (data == "error") {
                            alert("เกิดปัญหาการ insert db ผิดพลาด");
                        } else if (data == "movefilefail") {
                            alert("เกิดปัญหาการการย้านไฟล์ หรือตำแหน่งไดเรกทอรี่ผิดพลาด");
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

            $("#user_detail").click(function() {
                $.get("user_detail.php", function(datacallback) {
                    $("#user_modal_body").html(datacallback);
                });
                $("#myModalUser").modal("show");
            });
        });
    </script>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="./assets/front-end/js/scripts.js"></script>
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <!-- * *                               SB Forms JS                               * *-->
  <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
</body>
</html>