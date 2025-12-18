<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Diabetes Care | HumCare';
    $meta_description = 'Diabetes management tips, diet advice and treatment information.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* DIABETES HERO */
.diabetes-hero{
  height: 60vh;
  margin-top: 5px;
  background:
    linear-gradient(rgba(5, 211, 53, 0.65), rgba(2, 219, 190, 0.65)),
    url("https://images.unsplash.com/photo-1559757175-5700dde675bc?w=1200")
    center/cover no-repeat;
}

.diabetes-title{
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

<!-- ================= DIABETES HERO ================= -->
<section class="diabetes-hero d-flex align-items-center">
  <div class="container text-center text-white">
    <h1 class="diabetes-title">DIABETES CARE</h1>
    <p class="mt-3">Comprehensive management for a healthy life</p>
  </div>
</section>

<!-- ================= ABOUT DIABETES ================= -->
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">About Diabetes</h2>
      <p class="text-muted col-md-8 mx-auto">
        Diabetes is a chronic condition that affects how the body processes
        blood sugar (glucose). Proper management through medication, lifestyle
        changes, and regular monitoring helps prevent serious complications.
      </p>
    </div>

    <div class="row g-4">

      <!-- Symptoms -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-activity text-success me-2"></i>
            Common Symptoms
          </h5>
          <ul class="about-list">
            <li>Frequent urination</li>
            <li>Increased thirst</li>
            <li>Unexplained weight loss</li>
            <li>Fatigue or weakness</li>
            <li>Slow wound healing</li>
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
            <span>Insulin Resistance</span>
            <span>Genetics</span>
            <span>Obesity</span>
            <span>Poor Diet</span>
            <span>Lack of Exercise</span>
          </div>
        </div>
      </div>

      <!-- When to see doctor -->
      <div class="col-md-4">
        <div class="about-box warning h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            When to See a Doctor
          </h5>
          <ul class="about-list">
            <li>Consistently high blood sugar levels</li>
            <li>Blurred vision</li>
            <li>Numbness in hands or feet</li>
            <li>Recurrent infections</li>
          </ul>
        </div>
      </div>

    </div>

    <p class="text-muted small text-center mt-4">
      ⚠️ This information is for awareness only and does not replace medical advice.
    </p>

  </div>
</section>

<!-- ================= DIABETES DOCTORS ================= -->
<section class="py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Diabetologists & Endocrinologists</h2>
      <p class="text-muted">Consult specialists for diabetes care</p>
    </div>

    <div class="row g-4 justify-content-center">

      <!-- Doctor Card 1 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1618498082410-b4aa22193b38?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Suresh Patel</h6>
            <p class="text-muted mb-1">Diabetologist</p>
            <small>16+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <!-- Doctor Card 2 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1659353888906-adb3e0041693?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Neha Verma</h6>
            <p class="text-muted mb-1">Endocrinologist</p>
            <small>11+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <!-- Doctor Card 3 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Amit Khanna</h6>
            <p class="text-muted mb-1">Internal Medicine</p>
            <small>18+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <!-- Doctor Card 4 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://plus.unsplash.com/premium_photo-1681967035389-84aabd80cb1e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjV8fGRvY3RvcnN8ZW58MHx8MHx8fDA%3D"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Pooja Singh</h6>
            <p class="text-muted mb-1">Lifestyle Medicine Specialist</p>
            <small>9+ Years Experience</small>
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