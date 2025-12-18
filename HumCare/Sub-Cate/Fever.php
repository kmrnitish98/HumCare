
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Fever Care | HumCare';
    $meta_description = 'Practical advice and care tips for treating fever safely.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* ================= FEVER HERO ================= */
        /* FEVER HERO */
.fever-hero{
  height: 60vh;
  margin-top:5px; /* navbar + subnav fix */
  background:
    linear-gradient(rgba(47,191,113,.55), rgba(47,191,113,.75)),
    url("https://plus.unsplash.com/premium_photo-1663100572408-a99da055f394?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTJ8fGZldmVyfGVufDB8fDB8fHww")
    center/cover no-repeat;
}

.fever-title{
  font-size: 64px;
  font-weight: 800;
  letter-spacing: 3px;
}

/* Doctor Cards */
.doctor-card{
  background:#fff;
  border-radius:16px;
  overflow:hidden;
  box-shadow:0 6px 18px rgba(0,0,0,.08);
  transition:.3s;
}

.doctor-card:hover{
  transform: translateY(-8px);
  box-shadow:0 12px 28px rgba(0,0,0,.15);
}

.doctor-img{
  height:220px;
  width:100%;
  object-fit:cover;
}
.about-box{
  background:#fff;
  padding:25px;
  border-radius:16px;
  box-shadow:0 6px 18px rgba(0,0,0,.08);
}

.about-box h5{
  color:#1f2937;
}

.about-list{
  padding-left:18px;
  color:#555;
}

.about-list li{
  margin-bottom:8px;
}

.cause-tags{
  display:flex;
  flex-wrap:wrap;
  gap:10px;
}

.cause-tags span{
  background:#eafff4;
  color:#2FBF71;
  padding:6px 14px;
  border-radius:20px;
  font-size:13px;
  font-weight:600;
}

.about-box.warning{
  background:#fff6f6;
  border-left:5px solid #dc3545;
}

.about-box.warning h5{
  color:#dc3545;
}
    </style>
</head>
<body>
    <?php
require_once($_SERVER['DOCUMENT_ROOT'].'/HumCare/Foot-HEAD/header.php');
?>

<!-- ================= FEVER HERO SECTION ================= -->
<section class="fever-hero d-flex align-items-center">
  <div class="container text-center text-white">
    <h1 class="fever-title">FEVER</h1>
    <p class="mt-3">Find trusted doctors & treatment for fever</p>
  </div>
</section>

<!-- ================= ABOUT FEVER ================= -->
<section class="py-5">
  <div class="container">

    <!-- Heading -->
    <div class="text-center mb-5">
      <h2 class="fw-bold">About Fever</h2>
      <p class="text-muted col-md-8 mx-auto">
        Fever is a temporary rise in body temperature, usually caused by an
        infection or inflammation. It is a natural response of the body’s
        immune system.
      </p>
    </div>

    <div class="row g-4 align-items-stretch">

      <!-- LEFT : Symptoms -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-thermometer-half text-success me-2"></i>
            Common Symptoms
          </h5>
          <ul class="about-list">
            <li>High body temperature</li>
            <li>Chills & sweating</li>
            <li>Headache</li>
            <li>Body pain & weakness</li>
            <li>Loss of appetite</li>
          </ul>
        </div>
      </div>

      <!-- CENTER : Causes -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-bug text-success me-2"></i>
            Common Causes
          </h5>
          <div class="cause-tags">
            <span>Viral Infection</span>
            <span>Bacterial Infection</span>
            <span>Seasonal Flu</span>
            <span>Food Poisoning</span>
            <span>Dehydration</span>
          </div>
        </div>
      </div>

      <!-- RIGHT : When to see doctor -->
      <div class="col-md-4">
        <div class="about-box warning h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            When to See a Doctor
          </h5>
          <ul class="about-list">
            <li>Fever above 102°F (39°C)</li>
            <li>Fever lasting more than 3 days</li>
            <li>Severe headache or chest pain</li>
            <li>Breathing difficulty</li>
          </ul>
        </div>
      </div>

    </div>

    <!-- Disclaimer -->
    <p class="text-muted small text-center mt-4">
      ⚠️ This information is for educational purposes only and does not
      replace professional medical advice.
    </p>

  </div>
</section>
<!-- ================= FEVER DOCTORS ================= -->
<section class="py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Doctors for Fever Treatment</h2>
      <p class="text-muted">Consult experienced doctors for fever-related issues</p>
    </div>

    <div class="row g-4 justify-content-center">

      <!-- Doctor Card -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1618498082410-b4aa22193b38?w=500"
               class="doctor-img" alt="Doctor">

          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Ankit Sharma</h6>
            <p class="text-muted mb-1">General Physician</p>
            <small>8+ Years Experience</small>

            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ★</span>
              <small>(120)</small>
            </div>

            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <!-- Doctor Card -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1658506671316-0b293df7c72b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nzd8fGRvY3RvcnN8ZW58MHx8MHx8fDA%3D"
               class="doctor-img" alt="Doctor">

          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. DeCock </h6>
            <p class="text-muted mb-1">Internal Medicine</p>
            <small>10+ Years Experience</small>

            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ☆</span>
              <small>(95)</small>
            </div>

            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <!-- Doctor Card -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500"
               class="doctor-img" alt="Doctor">

          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Rajiv Mehta</h6>
            <p class="text-muted mb-1">Family Physician</p>
            <small>15+ Years Experience</small>

            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ★</span>
              <small>(210)</small>
            </div>

            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>
       
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1661766718556-13c2efac1388?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8ZG9jdG9yc3xlbnwwfHwwfHx8MA%3D%3D"
               class="doctor-img" alt="Doctor">

          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Rani Mehta</h6>
            <p class="text-muted mb-1">Family Physician</p>
            <small>15+ Years Experience</small>

            <div class="d-flex align-items-center mt-2">
              <span class="text-warning me-1">★ ★ ★ ★ ★</span>
              <small>(210)</small>
            </div>

            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/HumCare/Foot-HEAD/footer.php');
?>

</body>
</html>