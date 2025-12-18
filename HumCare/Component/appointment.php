<?php
   
   session_start();
   
   include_once "../DB/appointment-db.php";
?>
<!DOCTYPE html>
<html>
<head>
<?php
$meta_title = 'Book Appointment | HumCare';
$meta_description = 'Book a verified doctor appointment quickly and securely with HumCare.';
include_once __DIR__ . '/../includes/seo.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<style>

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
    width: 360px;
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
<body class="">
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
        <li class="nav-item"><a class="nav-link" href="./Doctors.php">Find Doctor</a></li>
        <li class="nav-item"><a class="nav-link" href="./appointment.php">Book Appointment</a></li>
        <li class="nav-item"><a class="nav-link" href="./Health-Article.php">Health Articles</a></li>
        <li class="nav-item"><a class="nav-link" href="./ContactUs.php">Contact Us</a></li>
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

    <div class="d-flex align-items-center gap-4 overflow-auto health-scroll">

      <a href="#" class="health-link active">
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
  <div class="container py-5 my-5">
      <div class="row justify-content-center">

        <div class="col-md-6">
          <div class="card shadow-sm p-4">

            <h5 class="fw-bold mb-3 text-center">
            Book Appointment
            </h5>

            <p class="text-center">
              <strong><?= htmlspecialchars($doctor['name']) ?></strong><br>
              <?= htmlspecialchars($doctor['specialization']) ?> |
              <?= htmlspecialchars($doctor['city']) ?>
            </p>

                  <form method="POST" action="../DB/save-appointment.php">

                        <input type="hidden" name="doctor_id" value="<?= $doctor_id ?>">

                        <label class="fw-semibold">Select Date</label>
                        <input type="date" name="appointment_date" class="form-control mb-3" required>

                        <label class="fw-semibold">Select Time</label>
                        <select name="appointment_time" class="form-control mb-3" required>
                          <option value="">Choose Time</option>
                          <option>10:00 AM</option>
                          <option>11:00 AM</option>
                          <option>12:00 PM</option>
                          <option>4:00 PM</option>
                          <option>5:00 PM</option>
                        </select>

                        <a href="./appointment-success.php" class="btn btn-success w-100 rounded-pill">
                          Confirm Appointment
                        </a>

                  </form>

          </div>
        </div>

      </div>
  </div>
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