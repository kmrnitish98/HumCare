<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php
$meta_title = 'Subscription Plans | HumCare';
$meta_description = 'Compare subscription plans and pricing for HumCare services.';
include_once __DIR__ . '/../includes/seo.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<style>
:root{
  --primary:#2FBF71;
}
.pricing-header{
  background:linear-gradient(90deg,#e9fff5,#eef8ff);
  padding:70px 0;
}
.plan-card{
  border-radius:16px;
  transition:.3s;
}
.plan-card:hover{
  transform:translateY(-8px);
  box-shadow:0 10px 25px rgba(0,0,0,.12);
}
.plan-title{
  font-size:22px;
  font-weight:700;
}
.price{
  font-size:38px;
  font-weight:800;
}

:root{
    --main-nav-height: 70px;
    --sub-nav-height: 55px;
}
:root{
    --primary: #2FBF71;
    --secondary: #4DA8DA;
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

.badge-top{
  position:absolute;
  top:-14px;
  left:50%;
  transform:translateX(-50%);
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
.pricing-hero{
  margin-top: 70px;
  min-height: 440px;
  display: flex;
  align-items: center;
  background:
    linear-gradient(120deg,
      #01f386ff,
      #8db6d3ff,
      #64ccb7ff,
      #3d98d8ff
    );
  background-size: 300% 300%;
  animation: gradientMove 10s ease infinite;
}

@keyframes gradientMove{
  0%{ background-position: 0% 50%; }
  50%{ background-position: 100% 50%; }
  100%{ background-position: 0% 50%; }
}
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
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
        <li class="nav-item fw-bold"><a class="nav-link" href="./appointment.php"><i class="bi bi-bookmark-plus-fill"></i> Book Appointment</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Health-Article.php"> <i class="bi bi-heart-pulse-fill"></i> Health Articles</a></li>
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
<!-- HERO -->
<section class="pricing-hero">
  <div class="container">
    <div class="row align-items-center">

      <!-- LEFT CONTENT -->
      <div class="col-md-6 text-center text-md-start">
        <h1 class="fw-bold">
          Grow Your Practice with
          <span class="text-success">HumCare</span>
        </h1>

        <p class="text-muted mt-3">
          Upgrade your subscription to get higher visibility,
          more patient bookings, and premium branding.
        </p>

        <div class="mt-4">
          <a href="#plans" class="btn btn-success rounded-pill px-4 me-3">
            View Plans
          </a>
          <a href="./Component/Doctors.php" class="btn btn-outline-success rounded-pill px-4">
            Explore Doctors
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <img src="../public/assests/money-removebg-preview.png" alt="">
      </div>
    </div>
  </div>
</section>


<!-- PRICING -->
<section class="py-5">
<div class="container">
<div class="row g-4 justify-content-center">

<!-- FREE PLAN -->
<div class="col-md-4">
  <div class="card plan-card h-100 text-center border-4 border-warning p-4">
    <h4 class="plan-title">Free Plan</h4>
    <p class="text-muted">Basic Listing</p>
    <div class="price text-warning">₹0</div>
    <hr>
    <ul class="list-unstyled text-start">
      <li>✔ Basic doctor profile</li>
      <li>✔ Listed in search (low rank)</li>
      <li>✔ Appointment booking</li>
      <li>✔ Basic clinic info</li>
      <li class="text-muted">✖ Analytics</li>
      <li class="text-muted">✖ Priority support</li>
    </ul>
    <a href="checkout.php?plan=Free&price=0" class="btn btn-outline-warning w-100 mt-3">Get Started</a>
      
  </div>
</div>

<!-- STANDARD PLAN -->
<div class="col-md-4 position-relative">
  <span class="badge bg-success badge-top ">Recommended</span>
  <div class="card plan-card h-100 text-center p-4 border-4 border-success mt-2">
    <h4 class="plan-title">Standard Plan</h4>
    <p class="text-muted">Better Visibility</p>
    <div class="price text-success">₹299<span class="fs-6">/month</span></div>
    <hr>
    <ul class="list-unstyled text-start">
      <li>✔ Higher search ranking</li>
      <li>✔ Recommended Doctor badge</li>
      <li>✔ SMS / Email reminders</li>
      <li>✔ Multiple clinic locations</li>
      <li>✔ Basic analytics</li>
    </ul>
    <a href="checkout.php?plan=Standard&price=299" class="btn btn-success w-100 mt-3">Upgrade Now</a>
  </div>
</div>

<!-- PREMIUM PLAN -->
<div class="col-md-4">
  <div class="card plan-card h-100 text-center p-4 border-4 border-dark">
    <h4 class="plan-title">Premium Plan</h4>
    <p class="text-muted">Top Ranking + Advanced Tools</p>
    <div class="price">₹499<span class="fs-6">/month</span></div>
    <hr>
    <ul class="list-unstyled text-start">
      <li>✔ Top position in search</li>
      <li>✔ Featured Doctor badge</li>
      <li>✔ Advanced analytics dashboard</li>
      <li>✔ Publish health articles</li>
      <li>✔ Priority admin support</li>
    </ul>
    <a href="checkout.php?plan=Premium&price=499" class="btn btn-dark w-100 mt-3">Go Premium</a>
  </div>
</div>

</div>
</div>
</section>

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

</body>
</html>