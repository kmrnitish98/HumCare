<?php
   session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$meta_title = 'Health Articles | HumCare';
$meta_description = 'Read expert-written health articles and practical advice to help you live healthier.';
$meta_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
include_once __DIR__ . '/../includes/seo.php';
?>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
:root{
    --main-nav-height: 70px;
    --sub-nav-height: 55px;
}
:root{
    --primary: #2FBF71;
    --secondary: #4DA8DA;
}
nav{
  background-color:rgba(163, 253, 211, 0.6);
}
/* Navbar Brand */
.navbar-brand{
    font-size: 26px;
    font-weight: bold;
    color: var(--primary) !important;
}

/* Search bar */
.search-box{
    width: 300px;
}

/* Hero Section */
.hero{
    margin-top: 80px;
    padding: 80px 0;
    background: linear-gradient(90deg,#e9fff5,#eef8ff);
}

.hero h1{
    font-weight: 700;
    color: #1f2937;
}

.hero p{
    color: #555;
}

/* Buttons */
.btn-main{
    background: var(--primary);
    color: #fff;
}
.btn-main:hover{
    background: #239d5d;
    color: #fff;
}
/* Healthcare category cards */
.fixed-sub-nav{
    position: fixed;
    top: var(--main-nav-height);
    left: 0;
    width: 100%;
    height: var(--sub-nav-height);
    background: #f8fffc;
    z-index: 998;
}

/* Sub Navbar */
.sub-nav{
    background:#f8fffc;
    border-top:1px solid #e5f3ec;
    position: relative;
    z-index: 99;
}

/* Scroll for mobile */
.health-scroll{
    white-space: nowrap;
    scrollbar-width: none;
}
.health-scroll::-webkit-scrollbar{
    display:none;
}

/* Health links */
.health-link{
    display:flex;
    align-items:center;
    gap:6px;
    padding:12px 16px;
    font-weight:600;
    color:#444;
    text-decoration:none;
    border-bottom:3px solid transparent;
    transition:0.3s;
}

.health-link i{
    color:#2FBF71;
    font-size:18px;
}

/* Hover & Active */
.health-link:hover,
.health-link.active{
    color:#2FBF71;
    border-bottom:3px solid #2FBF71;
    background:#eafff4;
}
.footer{
    background:#f0fff8;
    border-top:1px solid #d7f3e6;
}

.footer-brand{
    font-weight:800;
    color:#2FBF71;
}

.footer-title{
    font-weight:700;
    margin-bottom:10px;
}

.footer-text{
    color:#555;
    font-size:14px;
}

.footer-list{
    list-style:none;
    padding:0;
}

.footer-list li{
    margin-bottom:6px;
}

.footer-list a{
    text-decoration:none;
    color:#555;
    font-size:14px;
}

.footer-list a:hover{
    color:#2FBF71;
}

.footer-bottom{
    border-top:1px solid #d7f3e6;
    padding:15px 0;
    font-size:14px;
    color:#666;
}
.footer-social a{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:38px;
    height:38px;
    margin-right:10px;
    border-radius:50%;
    background:#eafff4;
    color:#2FBF71;
    font-size:18px;
    transition:0.3s;
    text-decoration:none;
}

.footer-social a:hover{
    background:#2FBF71;
    color:#fff;
    transform:translateY(-3px);
}
</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light  shadow-sm fixed-top">
  <div class="container-fluid px-4">

    <!-- Brand -->
    <a class="navbar-brand fw-bold" href="../HumCare.php">
      <i class="bi bi-h-circle"></i> HumCare
      <i class="bi bi-activity text-danger"></i>
    </a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desktop Search (ONLY desktop) -->
    <div class="d-none d-lg-block mx-auto">
      <input type="text" class="form-control rounded-pill search-box"
       placeholder="Search doctor, symptom, clinic...">
    </div>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- LOGIN (TOP on mobile) -->
      <div class="d-lg-none mb-3">
        <a class="btn btn-main w-100 rounded-pill" href="#">Login</a>
      </div>

      <!-- NAV LINKS -->
      <ul class="navbar-nav mx-lg-auto gap-lg-3">
        <!-- <li class="nav-item"><a class="nav-link" href="#">Home</a></li> -->
        <li class="nav-item fw-bold"><a class="nav-link" href="./Doctors.php"><i class="bi bi-search"></i> Find Doctor</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/appointment.php"><i class="bi bi-bookmark-plus-fill"></i> Book Appointment</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="/"><i class="bi bi-heart-pulse-fill"></i> Health Articles</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./ContactUs.php"><i class="bi bi-telephone-fill"></i> Contact Us</a></li>
      </ul>

      <!-- Bell (desktop only) -->
      <div class="d-none d-lg-flex align-items-center ms-3">

      <?php if(isset($_SESSION['user_id'])): ?>

        <!-- Logged in -->
        <div class="dropdown">
          <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button"
            data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i>
            <?= htmlspecialchars($_SESSION['user_name']) ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li>
              <a class="dropdown-item" href="./DB/dashboard.php">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger" href="./auth/logout.php">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
              </a>
            </li>
          </ul>
        </div>

      <?php else: ?>

        <!-- Not logged in -->
        <a class="btn btn-main rounded-pill px-4" href="./auth/login.php">Login</a>

      <?php endif; ?>

      </div>

      <!-- Mobile Search (BOTTOM) -->
      <div class="d-lg-none mt-3">
        <input type="text" class="form-control rounded-pill"
         placeholder="Search doctor, symptom, clinic...">
      </div>

    </div>
  </div>
</nav>
<!-- ================= NAVBAR END ================= -->
<!-- ================= HEALTHCARE CATEGORY CAROUSEL ================= -->
<div class="sub-nav fixed-sub-nav shadow-sm">
  <div class="container-fluid px-4">

    <div id="healthSlider" class="d-flex align-items-center gap-4 overflow-auto health-scroll">

      <a href="#" class="health-link">
        <i class="bi bi-thermometer-half"></i> Fever
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-droplet"></i> Skin
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-scissors"></i> Hair
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-tooth"></i> Dental
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-heart-pulse"></i> Heart
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-eye"></i> Eye
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-emoji-smile"></i> Mental
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-activity"></i> Diabetes
      </a>

      <a href="#" class="health-link">
        <i class="bi bi-person-heart"></i> Women Care
      </a>
      
      <a href="#" class="health-link">
        <i class="bi bi-person-arms-up"></i> Child Care
      </a>
    </div>

  </div>
</div>


<!-- ================= HERO ================= -->
<section class="pt-5 mt-5">
  <div class="container text-center">
    <h1 class="fw-bold">Health Articles & Tips</h1>
    <p class="text-muted mt-2">
      Expert-written health articles to help you live better and healthier.
    </p>
  </div>
</section>

<!-- ================= SEARCH + FILTER ================= -->
<section class="py-4">
  <div class="container">
    <div class="row g-3">
      <div class="col-md-4">
        <select class="form-select">
          <option>All Categories</option>
          <option>Heart Health</option>
          <option>Mental Health</option>
          <option>Nutrition</option>
          <option>Fitness</option>
        </select>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Search health articles...">
      </div>
      <div class="col-md-2">
        <button class="btn btn-success w-100">Search</button>
      </div>
    </div>
  </div>
</section>

<!-- ================= ARTICLES ================= -->
<section class="pb-5">
  <div class="container">
    <div class="row g-4">

      <!-- Article Card -->
      <div class="col-md-4">
        <div class="card article-card h-100">
          <img src="https://images.unsplash.com/photo-1559757175-5700dde675bc"
               class="card-img-top article-img">
          <div class="card-body">
            <span class="badge badge-category mb-2">Heart Health</span>
            <h6 class="fw-bold mt-2">
              10 Tips to Keep Your Heart Healthy
            </h6>
            <p class="text-muted small">
              Learn simple lifestyle changes that can significantly
              improve your heart health.
            </p>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              <i class="bi bi-person"></i> Dr. Rajiv Mehta
              · <i class="bi bi-calendar"></i> Jul 10, 2025
            </small>
          </div>
        </div>
      </div>

      <!-- Article Card -->
      <div class="col-md-4">
        <div class="card article-card h-100">
          <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528"
               class="card-img-top article-img">
          <div class="card-body">
            <span class="badge badge-category mb-2">Mental Health</span>
            <h6 class="fw-bold mt-2">
              How to Reduce Stress in Daily Life
            </h6>
            <p class="text-muted small">
              Practical mental health tips to manage stress and anxiety
              in a busy lifestyle.
            </p>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              <i class="bi bi-person"></i> Dr. Neha Verma
              · <i class="bi bi-calendar"></i> Jul 5, 2025
            </small>
          </div>
        </div>
      </div>

      <!-- Article Card -->
      <div class="col-md-4">
        <div class="card article-card h-100">
          <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352"
               class="card-img-top article-img">
          <div class="card-body">
            <span class="badge badge-category mb-2">Nutrition</span>
            <h6 class="fw-bold mt-2">
              Balanced Diet for a Healthy Body
            </h6>
            <p class="text-muted small">
              Understand what a balanced diet really means and
              how to follow it.
            </p>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              <i class="bi bi-person"></i> HumCare Editorial
              · <i class="bi bi-calendar"></i> Jun 28, 2025
            </small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card article-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1723618898312-54269787cbe0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzJ8fGhlYWx0aCUyMGFydGljbGV8ZW58MHx8MHx8fDA%3D"
               class="card-img-top article-img">
          <div class="card-body">
            <span class="badge badge-category mb-2">Heart Health</span>
            <h6 class="fw-bold mt-2">
              10 Tips to Keep Your Heart Healthy
            </h6>
            <p class="text-muted small">
              Learn simple lifestyle changes that can significantly
              improve your heart health.
            </p>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              <i class="bi bi-person"></i> Dr. Rajiv Mehta
              · <i class="bi bi-calendar"></i> Jul 10, 2025
            </small>
          </div>
        </div>
      </div>

      <!-- Article Card -->
      <div class="col-md-4">
        <div class="card article-card h-100">
          <img src="https://images.unsplash.com/photo-1587061853304-13dbe42cfba4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGhlYWx0aCUyMGFydGljbGV8ZW58MHx8MHx8fDA%3D"
               class="card-img-top article-img">
          <div class="card-body">
            <span class="badge badge-category mb-2">Mental Health</span>
            <h6 class="fw-bold mt-2">
              How to Reduce Stress in Daily Life
            </h6>
            <p class="text-muted small">
              Practical mental health tips to manage stress and anxiety
              in a busy lifestyle.
            </p>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              <i class="bi bi-person"></i> Dr. Neha Verma
              · <i class="bi bi-calendar"></i> Jul 5, 2025
            </small>
          </div>
        </div>
      </div>

      <!-- Article Card -->
      <div class="col-md-4">
        <div class="card article-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1664910003783-43edbeb8163b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aGVhbHRoJTIwYXJ0aWNsZXxlbnwwfHwwfHx8MA%3D%3D"
               class="card-img-top article-img">
          <div class="card-body">
            <span class="badge badge-category mb-2">Nutrition</span>
            <h6 class="fw-bold mt-2">
              Balanced Diet for a Healthy Body
            </h6>
            <p class="text-muted small">
              Understand what a balanced diet really means and
              how to follow it.
            </p>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              <i class="bi bi-person"></i> HumCare Editorial
              · <i class="bi bi-calendar"></i> Jun 28, 2025
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="footer pt-5">
  <div class="container">

    <div class="row">

      <!-- LEFT : BRAND -->
      <div class="col-md-4 mb-4">
            <h4 class="footer-brand">HumCare</h4>
            <p class="footer-text">
                HumCare is a trusted healthcare platform helping patients
                find verified doctors, book appointments, and access
                reliable medical information easily.
            </p>

            <!-- Social Media Icons -->
            <div class="footer-social mt-3">
                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

      <!-- CENTER : COMPANY + CONTACT -->
      <div class="col-md-4 mb-4">
        <h6 class="footer-title">Company</h6>
        <ul class="footer-list">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Our Services</a></li>
          <li><a href="#">Doctors</a></li>
          <li><a href="#">Careers</a></li>
        </ul>

        <h6 class="footer-title mt-3">Contact</h6>
        <p class="footer-text mb-1">📧 support@humcare.com</p>
        <p class="footer-text mb-0">📞 +91 98765 43210</p>
      </div>

      <!-- RIGHT : QUICK LINKS -->
      <div class="col-md-4 mb-4">
        <h6 class="footer-title">Quick Links</h6>
        <ul class="footer-list">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Support</a></li>
        </ul>
      </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="footer-bottom text-center mt-4">
      © 2025 <strong>HumCare</strong>. All Rights Reserved.
    </div>

  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
  $('#healthSlider').slick({
    infinite: true,
    slidesToShow: 9,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    pauseOnHover: true,
    arrows: false,
    dots: false,
       
    responsive: [
      {
        breakpoint: 1024,
        settings: { slidesToShow: 4 }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2 }
      }
    ]
  });
});
</script>
</body>
</html>