<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Child Care | HumCare';
    $meta_description = 'Pediatric care guidance, vaccination and child health resources.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* DENTAL HERO */
        .child-hero{
  height: 60vh;
  margin-top:5px;
  background:
    linear-gradient(rgba(255,193,7,.55), rgba(111, 221, 8, 0.55)),
    url("https://images.pexels.com/photos/3259628/pexels-photo-3259628.jpeg")
    center/cover no-repeat;
}

.child-title{
  font-size: 64px;
  font-weight: 800;
  letter-spacing: 3px;
}
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

<!-- ================= CHILD HERO ================= -->
<section class="child-hero d-flex align-items-center">
  <div class="container text-center text-white">
    <h1 class="child-title">CHILD CARE</h1>
    <p class="mt-3">Compassionate healthcare for infants, children & teens</p>
  </div>
</section>

<!-- ================= ABOUT CHILD CARE ================= -->
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">About Child Health</h2>
      <p class="text-muted col-md-8 mx-auto">
        Child care focuses on growth, development, immunity, and overall
        well-being from infancy through adolescence. Regular checkups and
        timely care ensure healthy development.
      </p>
    </div>

    <div class="row g-4">

      <!-- Symptoms / Concerns -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-person-arms-up text-success me-2"></i>
            Common Concerns
          </h5>
          <ul class="about-list">
            <li>Frequent infections or fever</li>
            <li>Poor appetite or weight gain</li>
            <li>Developmental delays</li>
            <li>Cough, cold, or allergies</li>
            <li>Digestive issues</li>
          </ul>
        </div>
      </div>

      <!-- Causes -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-bug text-success me-2"></i>
            Common Causes
          </h5>
          <div class="cause-tags">
            <span>Infections</span>
            <span>Low Immunity</span>
            <span>Nutritional Deficiency</span>
            <span>Seasonal Illness</span>
            <span>Environmental Factors</span>
          </div>
        </div>
      </div>

      <!-- When to see doctor -->
      <div class="col-md-4">
        <div class="about-box warning h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            When to See a Pediatrician
          </h5>
          <ul class="about-list">
            <li>High fever lasting more than 2 days</li>
            <li>Breathing difficulty</li>
            <li>Delayed milestones</li>
            <li>Persistent vomiting or diarrhea</li>
          </ul>
        </div>
      </div>

    </div>

    <p class="text-muted small text-center mt-4">
      ⚠️ This information is for awareness only and does not replace professional medical advice.
    </p>

  </div>
</section>

<!-- ================= CHILD DOCTORS ================= -->
<section class="py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Pediatricians & Child Specialists</h2>
      <p class="text-muted">Trusted care for your child’s health</p>
    </div>

    <div class="row g-4 justify-content-center">

      <!-- Doctor Card 1 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1681967035389-84aabd80cb1e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjV8fGRvY3RvcnN8ZW58MHx8MHx8fDA%3D"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Ritu Sharma</h6>
            <p class="text-muted mb-1">Pediatrician</p>
            <small>12+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">Book Appointment</a>
          </div>
        </div>
      </div>

      <!-- Doctor Card 2 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Ankit Verma</h6>
            <p class="text-muted mb-1">Child Specialist</p>
            <small>10+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">Book Appointment</a>
          </div>
        </div>
      </div>

      <!-- Doctor Card 3 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1673865641073-4479f93a7776?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzJ8fGRvY3RvcnN8ZW58MHx8MHx8fDA%3D"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Pooja Singh</h6>
            <p class="text-muted mb-1">Neonatologist</p>
            <small>15+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">Book Appointment</a>
          </div>
        </div>
      </div>

      <!-- Doctor Card 4 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1658506671316-0b293df7c72b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nzd8fGRvY3RvcnN8ZW58MHx8MHx8fDA%3D"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Suresh Patel</h6>
            <p class="text-muted mb-1">Adolescent Health Specialist</p>
            <small>9+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">Book Appointment</a>
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