<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$meta_title = 'HumCare | Healthcare Platform';
$meta_description = 'Welcome to HumCare — find doctors, book appointments and read trusted health articles.';
$meta_image = 'https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?q=80&w=1200&auto=format&fit=crop';
$meta_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
include_once __DIR__ . '/includes/seo.php';
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
/* ===== GLOBAL COLORS ===== */
:root{
    --main-nav-height: 70px;
    --sub-nav-height: 55px;
}
:root{
    --primary: #2FBF71;
    --secondary: #4DA8DA;
}
/* nav{
  background-color:rgba(163, 253, 211, 0.6);
} */

  nav{
  /* margin-top: 70px; */
  min-height: 40px;
  display: flex;
  align-items: center;
  background:
    linear-gradient(120deg,
      #ecf1efff,
      #83e9c2ff,
      #4dda7cff,
      #36ee54ff
    );
  background-size: 300% 300%;
  animation: gradientMove 10s ease infinite;
}

@keyframes gradientMove{
  0%{ background-position: 0% 50%; }
  50%{ background-position: 100% 50%; }
  100%{ background-position: 0% 50%; }
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
.facility-card{
    background:#fff;
    padding:35px 25px;
    border-radius:16px;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    transition:0.3s;
}

.facility-card i{
    font-size:42px;
    color:#2FBF71;
    margin-bottom:15px;
}

.facility-card h5{
    font-weight:700;
    margin-bottom:10px;
}

.facility-card p{
    color:#666;
    font-size:15px;
}

.facility-card:hover{
    transform:translateY(-10px);
    box-shadow:0 12px 28px rgba(0,0,0,0.15);
}
/* Doctor card */
.doctor-card{
    background:#fff;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    transition:0.3s;
    position:relative;
}

.doctor-card:hover{
    transform:translateY(-8px);
    box-shadow:0 12px 30px rgba(0,0,0,0.15);
}

/* Doctor image */
.doctor-img{
    height:220px;
    width:100%;
    object-fit:cover;
}

/* Premium badge */
.premium-badge{
    position:absolute;
    top:12px;
    left:12px;
    background:#2FBF71;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
}
/* How it works card */
.work-card{
    background:#fff;
    padding:35px 20px;
    border-radius:16px;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    transition:0.3s;
    position:relative;
}

.work-card:hover{
    transform:translateY(-8px);
    box-shadow:0 12px 28px rgba(0,0,0,0.15);
}

/* Step number */
.step-circle{
    width:40px;
    height:40px;
    background:#2FBF71;
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    margin:0 auto 15px;
}

/* Icon */
.work-card i{
    font-size:38px;
    color:#4DA8DA;
    margin-bottom:12px;
}

.work-card h6{
    font-weight:700;
    margin-bottom:8px;
}

.work-card p{
    font-size:14px;
    color:#666;
}
/* Article card */
.article-card{
    background:#fff;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    transition:0.3s;
}

.article-card:hover{
    transform:translateY(-8px);
    box-shadow:0 12px 28px rgba(0,0,0,0.15);
}

/* Article image */
.article-img{
    height:200px;
    width:100%;
    object-fit:cover;
}

/* Read more */
.read-more{
    text-decoration:none;
    font-weight:600;
    color:#2FBF71;
}

.read-more:hover{
    text-decoration:underline;
}
/* Footer */
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
.doctor-subscribe-btn{
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  box-shadow: 0 10px 25px rgba(0,0,0,.25);
  animation: floatPulse 2s infinite;
}

.doctor-subscribe-btn img{
  width: 70px;
  height: 70px;
}

.doctor-subscribe-btn:hover{
  transform: scale(1.08);
}

/* Pulse Effect */
@keyframes floatPulse {
  0% { box-shadow: 0 0 0 0 rgba(230, 15, 122, 0.6); }
  70% { box-shadow: 0 0 0 18px rgba(47,191,113,0); }
  100% { box-shadow: 0 0 0 0 rgba(47,191,113,0); }
}

.prime-badge{
  position: absolute;
  top: -6px;
  right: -6px;
  background: linear-gradient(135deg, #ff9800, #ff5722);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  padding: 4px 7px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,.25);
  letter-spacing: .5px;
}
.dropdown-menu {
    z-index: 9999 !important;
}

/* Dropdown click area improve karne ke liye */
.dropdown-toggle::after {
    vertical-align: middle;
    margin-left: 5px;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top">
  <div class="container-fluid px-4">

    <!-- Brand -->
    <a class="navbar-brand fw-bold" href="#">
      <i class="bi bi-h-circle"></i> HumCare
      <i class="bi bi-activity text-danger"></i>
    </a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desktop Search (ONLY desktop) -->
    <form id="desktopSearchForm" action="/HumCare/Component/search.php" method="GET" class="d-none d-lg-block mx-auto">
        <input type="text" id="desktopSearchInput" name="query" class="form-control rounded-pill search-box" 
              placeholder="Search doctor, symptom, clinic..." required>
    </form>
    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- LOGIN (TOP on mobile) -->
      <div class="d-lg-none mb-3">
        <a class="btn btn-main w-100 rounded-pill" href="#">Login</a>
      </div>

      <!-- NAV LINKS -->
      <ul class="navbar-nav mx-lg-auto gap-lg-3">
        <!-- <li class="nav-item"><a class="nav-link" href="#">Home</a></li> -->
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/Doctors.php"><i class="bi bi-search"></i> Find Doctor</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/appointment.php"><i class="bi bi-bookmark-plus-fill"></i> Book Appointment</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/Health-Article.php"><i class="bi bi-heart-pulse-fill"></i> Health Articles</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/ContactUs.php"><i class="bi bi-telephone-fill"></i> Contact Us</a></li>
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
      <form id="mobileSearchForm" action="/HumCare/Component/search.php" method="GET" class="d-lg-none mt-3">
        <input type="text" name="query" class="form-control rounded-pill"
         placeholder="Search doctor, symptom, clinic..." required>
      </form>

    </div>
  </div>
</nav>
<!-- ================= NAVBAR END ================= -->
<!-- ================= HEALTHCARE CATEGORY CAROUSEL ================= -->
<div class="sub-nav fixed-sub-nav shadow-sm">
  <div class="container-fluid px-4">

    <div id="healthSlider" class="d-flex align-items-center gap-4 overflow-auto health-scroll">

      <a href="./Sub-Cate/Fever.php" class="health-link">
        <i class="bi bi-thermometer-half"></i> Fever
      </a>

      <a href="./Sub-Cate/Skin.php" class="health-link">
        <i class="bi bi-droplet"></i> Skin
      </a>

      <a href="./Sub-Cate/Hair.php" class="health-link">
        <i class="bi bi-scissors"></i> Hair
      </a>

      <a href="./Sub-Cate/Dental.php" class="health-link">
        <i class="bi bi-tooth"></i> Dental
      </a>

      <a href="./Sub-Cate/Heart.php" class="health-link">
        <i class="bi bi-heart-pulse"></i> Heart
      </a>

      <a href="./Sub-Cate/Eye.php" class="health-link">
        <i class="bi bi-eye"></i> Eye
      </a>

      <a href="./Sub-Cate/Mental.php" class="health-link">
        <i class="bi bi-emoji-smile"></i> Mental
      </a>

      <a href="./Sub-Cate/Diabetes.php" class="health-link">
        <i class="bi bi-activity"></i> Diabetes
      </a>

      <a href="./Sub-Cate/WomenCare.php" class="health-link">
        <i class="bi bi-person-heart"></i> Women Care
      </a>
      
      <a href="./Sub-Cate/childCare.php" class="health-link">
        <i class="bi bi-person-arms-up"></i> Child Care
      </a>
    </div>

  </div>
</div>

<!-- ================= HERO SECTION START ================= -->
<section class="hero">
  <div class="container">
    <div class="row align-items-center">

      <!-- Left Content -->
      <div class="col-md-6">
        <h1>Your Health, Our Priority</h1>
        <p class="mt-3">
          Find trusted doctors, book appointments instantly, and get reliable
          healthcare information — all in one place.
        </p>

        <div class="mt-4 g-4 ">
          <a href="./Component/Doctors.php" class="btn btn-main px-4 py-2 rounded-pill me-3">
            Find Doctor
          </a>
          <a href="./Component/appointment.php" class="btn btn-outline-success px-4 py-2 my-3 rounded-pill">
            Book Appointment
          </a>
        </div>
      </div>

      <!-- Right Image -->
      <div class="col-md-6 text-center">
        <img src="./public/assests/herofirst.png" alt="Healthcare"
         class="img-fluid" style="max-height:380px;">
      </div>

    </div>
  </div>
</section>
<!-- ================= HERO SECTION END ================= -->
<!-- ================= FACILITIES SECTION ================= -->
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Our Healthcare Facilities</h2>
      <p class="text-muted">
        Trusted medical services designed for your comfort and care
      </p>
    </div>

    <div class="row g-4">

      <div class="col-md-4">
        <div class="facility-card text-center h-100">
          <i class="bi bi-camera-video"></i>
          <h5>Online Consultation</h5>
          <p>Consult certified doctors from the comfort of your home.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="facility-card text-center h-100">
          <i class="bi bi-patch-check"></i>
          <h5>Verified Doctors</h5>
          <p>All doctors are verified to ensure quality and trust.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="facility-card text-center h-100">
          <i class="bi bi-calendar-check"></i>
          <h5>Easy Appointments</h5>
          <p>Book and manage appointments in just a few clicks.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="facility-card text-center h-100">
          <i class="bi bi-shield-lock"></i>
          <h5>Secure Records</h5>
          <p>Your medical data is encrypted and fully secure.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="facility-card text-center h-100">
          <i class="bi bi-headset"></i>
          <h5>24/7 Support</h5>
          <p>Dedicated support team to help you anytime.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="facility-card text-center h-100">
          <i class="bi bi-journal-medical"></i>
          <h5>Health Articles</h5>
          <p>Expert-written health articles for awareness and prevention.</p>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- ================= END FACILITIES ================= -->
 <!-- ================= PREMIUM DOCTORS SECTION ================= -->
<section class="py-5 bg-light">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold">Premium Doctors</h2>
        <p class="text-muted mb-0">Top-rated & trusted healthcare professionals</p>
      </div>
      <a href="./Component/Doctors.php" class="btn btn-outline-success rounded-pill">
        View All
      </a>
    </div>

    <div class="row g-4">

      <!-- Doctor Card -->
      <div class="col-md-3">
        <div class="doctor-card h-100">

          <span class="badge premium-badge">Premium</span>

          <img src="https://images.unsplash.com/photo-1618498082410-b4aa22193b38?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTB8fGRvY3RvcnN8ZW58MHx8MHx8fDA%3D" class="img-fluid doctor-img" alt="Doctor">

          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Ankit Sharma</h6>
            <p class="text-muted mb-1">Dermatologist</p>
            <small>8+ Years Experience</small>

            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ★</span>
              <small>(120)</small>
            </div>

            <div class="mt-3">
              <a href="#" class="btn btn-success w-100 rounded-pill">
                Book Appointment
              </a>
            </div>
          </div>

        </div>
      </div>

      <!-- Copy Card -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <span class="badge premium-badge">Premium</span>
          <img src="https://images.unsplash.com/photo-1659353888906-adb3e0041693?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZG9jdG9ycyUyMG1hbGUlMjBmZW1hbGUlMjBwcm9maWxlfGVufDB8fDB8fHww" class="img-fluid doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Neha Verma</h6>
            <p class="text-muted mb-1">Gynecologist</p>
            <small>10+ Years Experience</small>
            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ☆</span>
              <small>(98)</small>
            </div>
            <div class="mt-3">
              <a href="#" class="btn btn-success w-100 rounded-pill">
                Book Appointment
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="doctor-card h-100">
          <span class="badge premium-badge">Premium</span>
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGRvY3RvcnMlMjBtYWxlJTIwZmVtYWxlJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D" class="img-fluid doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Rajiv Mehta</h6>
            <p class="text-muted mb-1">Cardiologist</p>
            <small>15+ Years Experience</small>
            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ★</span>
              <small>(210)</small>
            </div>
            <div class="mt-3">
              <a href="#" class="btn btn-success w-100 rounded-pill">
                Book Appointment
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="doctor-card h-100">
          <span class="badge premium-badge">Premium</span>
          <img src="https://plus.unsplash.com/premium_photo-1682089874677-3eee554feb19?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDF8fGRvY3RvcnMlMjBmZW1hbGUlMjBwcm9maWxlfGVufDB8fDB8fHww" class="img-fluid doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Pooja Singh</h6>
            <p class="text-muted mb-1">Pediatrician</p>
            <small>7+ Years Experience</small>
            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ☆</span>
              <small>(76)</small>
            </div>
            <div class="mt-3">
              <a href="#" class="btn btn-success w-100 rounded-pill">
                Book Appointment
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ================= END PREMIUM DOCTORS ================= -->
 <!-- ================= HOW IT WORKS SECTION ================= -->
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">How HumCare Works</h2>
      <p class="text-muted">
        Get medical help in 4 simple steps
      </p>
    </div>

    <div class="row g-4 text-center">

      <div class="col-md-3">
        <div class="work-card h-100">
          <div class=""><i class="bi bi-arrow-right text-dark"></i></div>
          <i class="bi bi-search"></i>
          <h6>Search Doctor</h6>
          <p>Find doctors by specialization, location or symptoms.</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="work-card h-100">
          <div class=""><i class="bi bi-arrow-right text-dark"></i></div>
          <i class="bi bi-person-lines-fill"></i>
          <h6>View Profile</h6>
          <p>Check doctor experience, ratings and availability.</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="work-card h-100">
          <div class=""><i class="bi bi-arrow-right text-dark"></i></div>
          <i class="bi bi-calendar-check"></i>
          <h6>Book Appointment</h6>
          <p>Select date and time and book instantly.</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="work-card h-100">
          <div class=""><i class="bi bi-arrow-down text-dark"></i></div>
          <i class="bi bi-heart-pulse"></i>
          <h6>Get Treatment</h6>
          <p>Visit clinic or consult online and get treatment.</p>
        </div>
      </div>

    </div>

  </div>
</section>


  <a href="./Component/Pricing.php" class="doctor-subscribe-btn" title="View Subscription Plans">
     <span class="prime-badge">PRIME</span>
  <img src="https://plus.unsplash.com/premium_photo-1673953510197-0950d951c6d9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8ZG9jdG9yfGVufDB8fDB8fHww" alt="Doctor Subscribe" class="rounded-circle">
</a>

<!-- ================= END HOW IT WORKS ================= -->
 <section class="py-5 bg-light">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold">Latest Health Articles</h2>
        <p class="text-muted mb-0">
          Expert advice for better health and wellness
        </p>
      </div>
      <a href="./Component/Health-Article.php" class="btn btn-outline-success rounded-pill">
        View All
      </a>
    </div>

    <div class="row g-4">

      <!-- Article Card -->
      <div class="col-md-4">
        <div class="article-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1661755379176-41fea22d773b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjV8fGltbXVuaXR5fGVufDB8fDB8fHww" class="img-fluid article-img" alt="Health Article">
          <div class="p-3">
            <h6 class="fw-bold">
              10 Tips to Boost Your Immunity Naturally
            </h6>
            <p class="text-muted small">
              Learn simple lifestyle habits to strengthen your immune system.
            </p>
            <a href="#" class="read-more">
              Read More →
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="article-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1706543161914-547c86d03e6e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Njl8fHNraW4lMjBwcm9ibGVtfGVufDB8fDB8fHww" class="img-fluid article-img" alt="Health Article">
          <div class="p-3">
            <h6 class="fw-bold">
              Common Skin Problems & Their Solutions
            </h6>
            <p class="text-muted small">
              Understand causes, symptoms, and treatments for skin issues.
            </p>
            <a href="#" class="read-more">
              Read More →
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="article-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1718349373623-6615241d1d2c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aGVhcnQlMjBwcm9ibGVtfGVufDB8fDB8fHww" class="img-fluid article-img" alt="Health Article">
          <div class="p-3">
            <h6 class="fw-bold">
              When Should You Consult a Heart Specialist?
            </h6>
            <p class="text-muted small">
              Know the warning signs that require immediate attention.
            </p>
            <a href="#" class="read-more">
              Read More →
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- ================= END HEALTHCARE ARTICLES ================= -->
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
          <li><a href="./Footer-Comp/Aboute.php">About Us</a></li>
          <li><a href="./Footer-Comp/service.php">Our Services</a></li>
          <li><a href="./Component/Doctors.php">Doctors</a></li>
          <li><a href="./Footer-Comp/careers.php">Careers</a></li>
        </ul>

        <h6 class="footer-title mt-3">Contact</h6>
        <p class="footer-text mb-1">📧 support@humcare.com</p>
        <p class="footer-text mb-0">📞 +91 98765 43210</p>
      </div>

      <!-- RIGHT : QUICK LINKS -->
      <div class="col-md-4 mb-4">
        <h6 class="footer-title">Quick Links</h6>
        <ul class="footer-list">
          <li><a href="./Footer-Comp/policy.php">Privacy Policy</a></li>
          <li><a href="./Footer-Comp/term.php">Terms & Conditions</a></li>
          <li><a href="./Footer-Comp/faq.php">FAQ</a></li>
          <li><a href="./Footer-Comp/support.php">Support</a></li>
        </ul>
      </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="footer-bottom text-center mt-4">
      © 2025 <strong>HumCare</strong>. All Rights Reserved.
    </div>

  </div>
</footer>
<!-- ================= END FOOTER ================= -->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

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
    // variableWidth: true, 
    // cssEase: 'linear',   
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
  $('#desktopSearchForm, #mobileSearchForm').on('submit', function(e) {
    e.preventDefault();
    let $form = $(this);
    let val = $form.find('input[name="query"]').val();
    if(val && val.trim() !== "") {
        // Use the form action so it works from any page
        const action = $form.attr('action') || 'Component/search.php';
        window.location.href = action + '?query=' + encodeURIComponent(val.trim());
    }
});
});
</script>
</body>
</html>