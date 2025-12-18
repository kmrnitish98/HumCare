<?php

  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$meta_title = 'Find Doctors | HumCare';
$meta_description = 'Search and book verified doctors across specialties on HumCare — fast, reliable and secure.';
$meta_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
include_once __DIR__ . '/../includes/seo.php';
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
/* Find Doctor Hero */
.find-hero{
    margin-top:80px;
    height: 460px;
    background: url('https://www.rfhospital.org/sites/default/files/2025-07/home--banner3.webp') center/cover no-repeat;
    position: relative;
}

/* Transparent overlay */
.hero-overlay{
    height: 100%;
    width: 100%;
     background: rgba(47,191,113,0.5); /*green overlay */
    /* background: linear-gradient(90deg,#2FBF71,#4DA8DA); */
    display: flex;
    align-items: center;
}
/* Doctor listing card */
/* .doctor-list-card{
    background:#fff;
    border-radius:16px;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    transition:0.3s;
}

.doctor-list-card:hover{
    transform:translateY(-6px);
    box-shadow:0 12px 28px rgba(0,0,0,0.15);
}

/* Doctor image */
/* .doctor-thumb{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
} */

/* Icons spacing */
/* .doctor-list-card i{
    color:#2FBF71;
}  */
.doctor-thumb{
  width:90px;
  height:90px;
  border-radius:50%;
  object-fit:cover;
}

.doctor-result-card{
  transition:0.3s;
}

.doctor-result-card:hover{
  box-shadow:0 8px 20px rgba(0,0,0,0.15);
}
/* Skeleton base */
.skeleton-card{
  overflow:hidden;
}

.skeleton-img{
  width:90px;
  height:90px;
  border-radius:50%;
  background:#e0e0e0;
  animation:pulse 1.5s infinite;
}

.skeleton-line{
  height:14px;
  border-radius:8px;
  background:#e0e0e0;
  animation:pulse 1.5s infinite;
}

.skeleton-btn{
  width:90px;
  height:30px;
  border-radius:20px;
  background:#e0e0e0;
  animation:pulse 1.5s infinite;
}

/* Animation */
@keyframes pulse{
  0%{ background-color:#e0e0e0; }
  50%{ background-color:#f0f0f0; }
  100%{ background-color:#e0e0e0; }
}
</style>
</head>
<body>

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
        <a class="btn btn-main w-100 rounded-pill" href="../auth/login.php">Login</a>
      </div>

      <!-- NAV LINKS -->
      <ul class="navbar-nav mx-lg-auto gap-lg-3">
        <!-- <li class="nav-item"><a class="nav-link" href="#">Home</a></li> -->
        <li class="nav-item fw-bold"><a class="nav-link" href="./Doctors.php"><i class="bi bi-search"></i> Find Doctor</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="appointment.php"><i class="bi bi-bookmark-plus-fill"></i> Book Appointment</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Health-Article.php"><i class="bi bi-heart-pulse-fill"></i> Health Articles</a></li>
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
              <a class="dropdown-item" href="../DB/dashboard.php">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger" href="../auth/logout.php">
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

      <a href="../Sub-Cate/Fever.php" class="health-link">
        <i class="bi bi-thermometer-half"></i> Fever
      </a>

      <a href="../Sub-Cate/Skin.php" class="health-link">
        <i class="bi bi-droplet"></i> Skin
      </a>

      <a href="../Sub-Cate/Hair.php" class="health-link">
        <i class="bi bi-scissors"></i> Hair
      </a>

      <a href="../Sub-Cate/Dental.php" class="health-link">
        <i class="bi bi-tooth"></i> Dental
      </a>

      <a href="../Sub-Cate/Heart.php" class="health-link">
        <i class="bi bi-heart-pulse"></i> Heart
      </a>

      <a href="../Sub-Cate/Eye.php" class="health-link">
        <i class="bi bi-eye"></i> Eye
      </a>

      <a href="../Sub-Cate/Mental.php" class="health-link">
        <i class="bi bi-emoji-smile"></i> Mental
      </a>

      <a href="../Sub-Cate/Diabetes.php" class="health-link">
        <i class="bi bi-activity"></i> Diabetes
      </a>

      <a href="../Sub-Cate/WomenCare.php" class="health-link">
        <i class="bi bi-person-heart"></i> Women Care
      </a>
      
      <a href="../Sub-Cate/childCare.php" class="health-link">
        <i class="bi bi-person-arms-up"></i> Child Care
      </a>
    </div>

  </div>
</div>

<!-- ================= HERO SECTION START ================= -->
<section class="find-hero">
  <div class="hero-overlay">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-7 text-white">
          <h1 class="fw-bold">Find the Right Doctor</h1>
          <p class="mt-3">
            Search doctors by specialization, location, experience and ratings.
            Book appointments instantly with trusted professionals.
          </p>

          <a href="#doctor-list" class="btn btn-light rounded-pill px-4 mt-3">
            Search Doctors
          </a>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="py-5 bg-light">
  <div class="container">
    <div class="row">

      <!-- ================= LEFT FILTER SIDEBAR ================= -->
<div class="col-md-3">

  <div class="card mb-4">
    <div class="card-body">

      <h6 class="fw-bold mb-3">Filters</h6>

      <!-- FILTER FORM -->
      <form id="filterForm">

        <!-- Location -->
        <label class="fw-semibold">Location</label>
        <select class="form-select mb-3" name="city">
          <option value="">Select City</option>
          <option value="Delhi">Delhi</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Bangalore">Bangalore</option>
          <option value="Bangalore">Hyderabad</option>
          <option value="Bangalore">NewYork</option>
        </select>

        <!-- Specialization -->
        <label class="fw-semibold">Specialization</label>
        <select class="form-select mb-3" name="specialization">
          <option value="">Select</option>
          <option value="Dermatologist">Dermatologist</option>
          <option value="Cardiologist">Cardiologist</option>
          <option value="Gynecologist">Gynecologist</option>
          <option value="Pediatrician">Pediatrician</option>
        </select>

        <!-- Experience -->
        <label class="fw-semibold">Experience</label>
        <select class="form-select mb-3" name="experience">
          <option value="">Any</option>
          <option value="5">0–5 Years</option>
          <option value="10">5–10 Years</option>
          <option value="15">10+ Years</option>
        </select>

        <!-- Ratings -->
        <label class="fw-semibold">Ratings</label>
        <select class="form-select mb-3" name="rating">
          <option value="">Any</option>
          <option value="4">4★ & above</option>
          <option value="3">3★ & above</option>
        </select>

        <!-- Consultation Fee -->
        <label class="fw-semibold">Consultation Fee</label>
        <select class="form-select mb-3" name="fee">
          <option value="">Any</option>
          <option value="500">₹300 – ₹500</option>
          <option value="1000">₹500 – ₹1000</option>
          <option value="2000">₹1000+</option>
        </select>

        <!-- Availability -->
        <label class="fw-semibold">Availability</label>
        <select class="form-select mb-3" name="availability">
          <option value="">Any</option>
          <option value="today">Today</option>
          <option value="week">This Week</option>
        </select>

        <!-- Consultation Type -->
        <label class="fw-semibold">Consultation Type</label>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="consultation_type[]" value="online" id="online">
          <label class="form-check-label" for="online">Online</label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="consultation_type[]" value="offline" id="offline">
          <label class="form-check-label" for="offline">Offline</label>
        </div>

        <!-- Reset -->
        <button type="reset" class="btn btn-outline-secondary w-100 rounded-pill mt-2">
          Reset Filters
        </button>

      </form>
      <!-- END FORM -->

    </div>
  </div>

</div>
      <!-- ================= RIGHT RESULTS ================= -->
      <div class="col-md-9">

        <!-- SORT BAR -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h6 class="mb-0">Showing Doctors</h6>
          <select class="form-select w-auto" id="sortBy">
            <option value="">Sort by Relevance</option>
            <option value="rating">Rating</option>
            <option value="nearby">Nearby</option>
            <option value="availability">Availability</option>
          </select>
        </div>

        <!-- ================= DOCTOR CARD (LIST VIEW) ================= -->
        <div id="doctorResults">
              
        </div>
        
       


        <!-- ================= PAGINATION ================= -->
        <nav class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>

      </div>
    </div>
  </div>
</section>

<!-- ================= SKELETON TEMPLATE ================= -->
<div id="skeletonTemplate" style="display:none;">
  <div class="card mb-3 skeleton-card">
    <div class="card-body d-flex gap-3">
      <div class="skeleton-img"></div>

      <div class="flex-grow-1">
        <div class="skeleton-line w-50 mb-2"></div>
        <div class="skeleton-line w-75 mb-2"></div>
        <div class="skeleton-line w-40 mb-2"></div>
        <div class="skeleton-line w-60"></div>
      </div>

      <div class="text-end">
        <div class="skeleton-btn mb-2"></div>
        <div class="skeleton-btn"></div>
      </div>
    </div>
  </div>
</div>
<!-- ================= END FIND DOCTORS PAGE ================= -->

<!-- ================= END DOCTOR LISTING ================= -->

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
<!-- ================= END FOOTER ================= -->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  $(document).ready(function(){

  function fetchDoctors(){
    let filterData = $("#filterForm").serialize();
    let sortBy = $("#sortBy").val();

    $.ajax({
      url: "../DB/find-doctors.php",
      type: "GET",
      data: filterData + "&sort=" + sortBy,
      beforeSend: function(){
        let skeleton = "";
        for(let i=0; i<5; i++){
          skeleton += $("#skeletonTemplate").html();
        }
        $("#doctorResults").html(skeleton);
      },
      beforeSend: function(){
        $("#doctorResults").html(
          "<p class='text-center text-muted'>Loading doctors...</p>"
        );
      },
      success: function(data){
        $("#doctorResults").html(data);
      }
    });
  }

  // Initial load
  fetchDoctors();

  // Filters change
  $("#filterForm").on("change", "select, input[type='checkbox']", function(){
    fetchDoctors();
  });

  // Sorting change
  $("#sortBy").on("change", function(){
    fetchDoctors();
  });
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
});
</script>
</body>
</html>