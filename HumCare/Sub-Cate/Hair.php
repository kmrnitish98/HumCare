<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Hair Care | HumCare';
    $meta_description = 'Hair care best practices, treatments and expert tips.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* HAIR HERO */
        .hair-hero{
        height: 60vh;
        margin-top:5px;
        background:
            linear-gradient(rgba(138,90,68,.75), rgba(94,58,39,.75)),
            url("https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=1200")
            center/cover no-repeat;
        }

        .hair-title{
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

<!-- ================= HAIR HERO ================= -->
<section class="hair-hero d-flex align-items-center">
  <div class="container text-center text-white">
    <h1 class="hair-title">HAIR CARE</h1>
    <p class="mt-3">Expert solutions for hair fall & scalp problems</p>
  </div>
</section>

<!-- ================= ABOUT HAIR ================= -->
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">About Hair Problems</h2>
      <p class="text-muted col-md-8 mx-auto">
        Hair problems such as hair fall, dandruff, and scalp infections are
        common and can affect confidence and well-being. Proper diagnosis
        helps restore healthy hair and scalp.
      </p>
    </div>

    <div class="row g-4">

      <!-- Symptoms -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-scissors text-success me-2"></i>
            Common Symptoms
          </h5>
          <ul class="about-list">
            <li>Excessive hair fall</li>
            <li>Dandruff & itchy scalp</li>
            <li>Hair thinning or bald patches</li>
            <li>Dry or oily scalp</li>
            <li>Premature greying</li>
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
            <span>Hormonal Imbalance</span>
            <span>Stress</span>
            <span>Nutritional Deficiency</span>
            <span>Genetics</span>
            <span>Scalp Infection</span>
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
            <li>Sudden or severe hair loss</li>
            <li>Patchy hair loss</li>
            <li>Scalp pain or redness</li>
            <li>No improvement with home care</li>
          </ul>
        </div>
      </div>

    </div>

    <p class="text-muted small text-center mt-4">
      ⚠️ This content is for awareness only and does not replace medical advice.
    </p>

  </div>
</section>

<!-- ================= HAIR DOCTORS ================= -->
<section class="py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Hair Specialists & Dermatologists</h2>
      <p class="text-muted">Consult experts for hair and scalp treatment</p>
    </div>

    <div class="row g-4 justify-content-center">

      <!-- Doctor Card -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1618498082410-b4aa22193b38?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Ankit Sharma</h6>
            <p class="text-muted mb-1">Dermatologist</p>
            <small>8+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1659353888906-adb3e0041693?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Neha Verma</h6>
            <p class="text-muted mb-1">Hair Specialist</p>
            <small>10+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Rajiv Mehta</h6>
            <p class="text-muted mb-1">Trichologist</p>
            <small>15+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Rajiv Mehta</h6>
            <p class="text-muted mb-1">Trichologist</p>
            <small>15+ Years Experience</small>
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