<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include("./urldomain.php");
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
  <title><?php echo $toptitle; ?></title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="./assets/front-end/css/styles.css" rel="stylesheet" />

  <script src="./assets/js/jquery-3.5.1.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Petemoss&display=swap" rel="stylesheet">
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar" data-offset="50">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top" style="font-family: 'Finger Paint', cursive; font-size: 20px;">Luxury by Fon</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <?php
          if (!isset($_SESSION['username_badminton'])) {
            echo "<li class='nav-item'><a class='nav-link' data-bs-toggle='modal' data-bs-target='#myModalRegis' href='#register'>สมัครสมาชิก</a></li>";
            echo "<li class='nav-item'><a class='nav-link' data-bs-toggle='modal' data-bs-target='#myModalLogin' href='#login'>เข้าสู่ระบบ</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link' href='#services'>Services</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#product'>สินค้า</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#about'>About</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#team'>Team</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#contact'>ติดต่อเรา</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='#' id='user_detail'>" . strtoupper($_SESSION["member_user"]) . "</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='logout.php'>ออกจากระบบ</a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead" style="background-image: url('./assets/img/120147340_174353087560378_7822624992769419733_n.jpg');">
    <div class="container">
      <div class="masthead-subheading" style="color: black;">Welcome Luxury by Fon</div>
      <div class="masthead-heading text-uppercase" style="color: black;">It's Nice To Meet You</div>
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
          if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
          } else {
            $page_no = 1;
          }

          $total_records_per_page = 6;
          $offset = ($page_no - 1) * $total_records_per_page;
          $previous_page = $page_no - 1;
          $next_page = $page_no + 1;
          $adjacents = "2";

          $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `product`");
          $total_records = mysqli_fetch_array($result_count);
          $total_records = $total_records['total_records'];
          $total_no_of_pages = ceil($total_records / $total_records_per_page);
          $second_last = $total_no_of_pages - 1; // total page minus 1

          $sql = "SELECT * FROM product WHERE product_id LIKE '%" . $strKeyword . "%' OR Name LIKE '%" . $strKeyword . "%'
            LIMIT $offset, $total_records_per_page
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
                    <div class="portfolio-caption-heading"><?php echo $row["name"]; ?></div>
                    <div class="portfolio-caption-subheading text-muted"><?php echo $row["price"]; ?></div>
                  </div>
                </div>
              </div>
          <?php
            } //while condition closing bracket
          }  //if condition closing bracket
          ?>
        </div>
        <div class="pagination justify-content-center" style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
          <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
        </div>

        <ul class="pagination justify-content-center">
          <?php if ($page_no > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>";
          }
          ?>

          <li <?php if ($page_no <= 1) {
            echo "class='page-item disabled'";
          } ?>>
            <a class="page-link" <?php if ($page_no > 1) {
              echo "href='?page_no=$previous_page'";
            } ?>>Previous</a>
          </li>

          <?php
          if ($total_no_of_pages <= 10) {
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
              if ($counter == $page_no) {
                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
              } else {
                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
              }
            }
          } elseif ($total_no_of_pages > 10) {

            if ($page_no <= 4) {
              for ($counter = 1; $counter < 8; $counter++) {
                if ($counter == $page_no) {
                  echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                  echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }
              }
              echo "<li class='page-item'><a class='page-link'>...</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
            } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
              echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
              echo "<li class='page-item'><a class='page-link'>...</a></li>";
              for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                if ($counter == $page_no) {
                  echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                  echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }
              }
              echo "<li class='page-item'><a class='page-link'>...</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
              echo "<li class='page-item'><a class='page-link'>...</a></li>";

              for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                  echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                  echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }
              }
            }
          }
          ?>

          <li <?php if ($page_no >= $total_no_of_pages) {
            echo "class='page-item disabled'";
          } ?>>
            <a class="page-link" <?php if ($page_no < $total_no_of_pages) {
              echo "href='?page_no=$next_page'";
            } ?>>Next</a>
          </li>
          <?php if ($page_no < $total_no_of_pages) {
            echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
          } ?>
        </ul>
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
              <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
              <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <div class="form-group">
              <!-- Email address input-->
              <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required" />
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
              <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
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
        <!-- Submit Button-->
        <?php
        if (isset($_SESSION['username_badminton'])) {
          echo "<div class='text-center'><button class='btn btn-primary btn-xl text-uppercase' id='btn_contact' type='button'>ส่ง</button></div>";
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
        <div class="col-lg-4 text-lg-start"><?php echo $footer; ?></div>
        <div class="col-lg-4 my-3 my-lg-0">
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
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
      <div class="modal-content" style="text-align: left;">
        <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/front-end/assets/img/close-icon.svg" alt="Close modal" /></div>
        <div class="container">
          <div class="row justify-content-center">
       
              <div class="modal-body">
                <div class="py-5">
                  <div class="container px-4 px-lg-5 my-5">
                      <div class="row gx-4 gx-lg-5 align-items-center">
                          <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                          <div class="col-md-6">
                              <div class="small mb-1"><?php echo $row['product_id']; ?></div>
                              <h1 class="display-5 fw-bolder"><?php echo $row['name']; ?></h1>
                              <div class="fs-5 mb-5">
                                  <span class="text-decoration-line-through">$45.00</span>
                                  <span>$<?php echo $row['price']; ?></span>
                              </div>
                              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                              <div class="d-flex">
                                  <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                  <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                      <i class="bi-cart-fill me-1"></i>
                                      Add to cart
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <hr>
                <div class="d-grid gap-2 col-6 mx-auto">
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
  <div class="portfolio-modal modal fade" id="myModalRegis" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="text-align: left;">
        <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/front-end/assets/img/close-icon.svg" alt="Close modal" /></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="modal-body">
                <!-- Project details-->
                <form class="needs-validation" role="form" novalidate>
                  <div class="row g-3">

                    <div class="col-12">
                      <label for="firstname_regis" class="form-label"><span class="glyphicon glyphicon-shopping-cart"></span>Firstname</label>
                      <input type="text" class="form-control" id="firstname_regis" placeholder="Enter Firstname">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="lastname_regis" class="form-label"><span class="glyphicon glyphicon-shopping-cart"></span>Lastname</label>
                      <input type="text" class="form-control" id="lastname_regis" placeholder="Enter Lastname">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <label for="username_regis" class="form-label"><span class="glyphicon glyphicon-shopping-cart"></span>Username</label>
                      <input type="text" class="form-control" id="username_regis" placeholder="Enter Username">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="pwd_regis" class="form-label"><span class="glyphicon glyphicon-user"></span>Password</label></label>
                      <input type="password" class="form-control" id="pwd_regis" placeholder="Enter Password" required>
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="confirm_pwd" class="form-label"><span class="glyphicon glyphicon-shopping-cart"></span>Confirm Password</label>
                      <input type="password" class="form-control" id="confirm_pwd" placeholder="Enter Confirm Password">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="idcard_regis" class="form-label"><span class="glyphicon glyphicon-shopping-cart"></span>IDCard</label>
                      <input type="text" class="form-control" id="idcard_regis" placeholder="Enter IDCard">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <label for="optradio" class="form-label"><span class="glyphicon glyphicon-shopping-cart"></span>Username</label>
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="1" checked>Male</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="0">Female</label>
                      </div>
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="tel_regis" class="form-label"><span class="glyphicon glyphicon-user"></span>Telephone number</label></label>
                      <input type="number" class="form-control" id="tel_regis" placeholder="Enter Telephone number" required>
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>
                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="button" id="btn_regis">Register<span class="glyphicon glyphicon-ok"></span></button>
                  </div>


                </form>
                <hr>
                <div class="d-grid gap-2 col-6 mx-auto">
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
  </div>

  <div class="portfolio-modal modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="text-align: left;">
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
                <div class="d-grid gap-2 col-6 mx-auto">
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
      $(".navbar a, footer a[href='#page-top']").on('click', function(event) {

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