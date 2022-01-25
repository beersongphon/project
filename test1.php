<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<li class="<?= ($activePage == 'about') ? 'active':''; ?>"><a href="/about/"><strong>About Us</strong></a></li>
<li class="<?= ($activePage == 'contact') ? 'active':''; ?>"><a href="/contact/"><strong>Contact Us</strong></a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
<?php
if($activePage == 'Link1'){
    echo "Link1";
}elseif($activePage == 'Link2'){
    echo "Link2";
}
?>
<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
    <li class="<?= ($activePage == 'Link1') ? 'active':''; ?>"><a href="/Link1/">Link1</a></li>
    <li class="<?= ($activePage == 'Link2') ? 'active':''; ?>"><a href="/Link2/">Link2</a></li>
    <li class="<?= ($activePage == 'Link3') ? 'active':''; ?>"><a href="/Link3/">Link3</a></li>
</ul>
</li>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= ($activePage == 'test2') ? 'active':''; ?>" aria-current="" href="./test2.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($activePage == 'test3') ? 'active':''; ?>" href="./test3.php">Link</a>
        </li>
        <li class="nav-item dropdown <?= ($activePage == ' test4') ? 'active':''; ?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
            <?php
            if($activePage == 'test4'){
                echo "test4";
            }elseif($activePage == 'Link2'){
                echo "Link2";
            }
            ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item <?= ($activePage == 'test4') ? 'active':''; ?>" href="./test4.php">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>