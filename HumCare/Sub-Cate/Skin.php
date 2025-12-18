<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Skin Care | HumCare';
    $meta_description = 'Skin health articles, treatments and dermatologist advice on HumCare.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* SKIN HERO */
        .skin-hero{
        height: 60vh;
        margin-top:5px;
        background:
            linear-gradient(rgba(79,172,254,.65), rgba(0,242,254,.6)),
            url("https://images.unsplash.com/photo-1607746882042-944635dfe10e?w=1200")
            center/cover no-repeat;
        }

        .skin-title{
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

<!-- ================= SKIN HERO ================= -->
<section class="skin-hero d-flex align-items-center">
  <div class="container text-center text-white">
    <h1 class="skin-title">SKIN CARE</h1>
    <p class="mt-3">Expert treatment for common skin problems</p>
  </div>
</section>

<!-- ================= ABOUT SKIN ================= -->
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">About Skin Problems</h2>
      <p class="text-muted col-md-8 mx-auto">
        Skin problems can affect people of all ages and may be caused by
        infections, allergies, hormonal changes, or environmental factors.
        Early diagnosis helps prevent complications.
      </p>
    </div>

    <div class="row g-4">

      <!-- Symptoms -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-droplet text-success me-2"></i>
            Common Symptoms
          </h5>
          <ul class="about-list">
            <li>Rashes & redness</li>
            <li>Itching or irritation</li>
            <li>Acne & pimples</li>
            <li>Dry or flaky skin</li>
            <li>Dark spots or pigmentation</li>
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
            <span>Allergy</span>
            <span>Hormonal Changes</span>
            <span>Fungal Infection</span>
            <span>Pollution</span>
            <span>Poor Hygiene</span>
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
            <li>Severe itching or pain</li>
            <li>Skin infection spreading rapidly</li>
            <li>Bleeding or pus formation</li>
            <li>Skin problems lasting weeks</li>
          </ul>
        </div>
      </div>

    </div>

    <p class="text-muted small text-center mt-4">
      ⚠️ Information provided is for awareness only and does not replace
      professional medical advice.
    </p>

  </div>
</section>

<!-- ================= SKIN DOCTORS ================= -->
<section class="py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Dermatologists & Skin Specialists</h2>
      <p class="text-muted">Consult experienced doctors for skin care</p>
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
            <p class="text-muted mb-1">Skin Specialist</p>
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
            <p class="text-muted mb-1">Cosmetologist</p>
            <small>15+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGRvY3RvcnN8ZW58MHx8MHx8fDA%3D"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Charlie Dean</h6>
            <p class="text-muted mb-1">Cosmetologist</p>
            <small>10+ Years Experience</small>
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