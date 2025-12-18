<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Mental Health | HumCare';
    $meta_description = 'Support and articles for mental health awareness and resources.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* MENTAL HEALTH HERO */
        .mental-hero{
        height: 60vh;
        margin-top:5px;
        background:
            linear-gradient(rgba(102,16,242,.65), rgba(111,66,193,.65)),
            url("https://images.pexels.com/photos/5699452/pexels-photo-5699452.jpeg")
            center/cover no-repeat;
        }

        .mental-title{
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

<!-- ================= MENTAL HERO ================= -->
<section class="mental-hero d-flex align-items-center">
  <div class="container text-center text-white">
    <h1 class="mental-title">MENTAL HEALTH</h1>
    <p class="mt-3">Professional care for emotional and mental well-being</p>
  </div>
</section>

<!-- ================= ABOUT MENTAL HEALTH ================= -->
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">About Mental Health</h2>
      <p class="text-muted col-md-8 mx-auto">
        Mental health includes emotional, psychological, and social well-being.
        It affects how we think, feel, and act. Seeking help early can greatly
        improve quality of life and overall health.
      </p>
    </div>

    <div class="row g-4">

      <!-- Symptoms -->
      <div class="col-md-4">
        <div class="about-box h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-emoji-frown text-success me-2"></i>
            Common Symptoms
          </h5>
          <ul class="about-list">
            <li>Persistent sadness or anxiety</li>
            <li>Mood swings or irritability</li>
            <li>Sleep disturbances</li>
            <li>Lack of focus or motivation</li>
            <li>Social withdrawal</li>
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
            <span>Stress</span>
            <span>Trauma</span>
            <span>Work Pressure</span>
            <span>Genetics</span>
            <span>Substance Abuse</span>
          </div>
        </div>
      </div>

      <!-- When to see doctor -->
      <div class="col-md-4">
        <div class="about-box warning h-100">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            When to Seek Help
          </h5>
          <ul class="about-list">
            <li>Symptoms lasting weeks</li>
            <li>Thoughts of self-harm</li>
            <li>Difficulty managing daily life</li>
            <li>Sudden personality changes</li>
          </ul>
        </div>
      </div>

    </div>

    <p class="text-muted small text-center mt-4">
      ⚠️ If you or someone you know is in immediate danger, seek emergency help.
      This information does not replace professional mental health care.
    </p>

  </div>
</section>

<!-- ================= MENTAL HEALTH DOCTORS ================= -->
<section class="py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Psychiatrists & Mental Health Specialists</h2>
      <p class="text-muted">Confidential and professional mental health support</p>
    </div>

    <div class="row g-4 justify-content-center">

      <!-- Doctor Card 1 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1618498082410-b4aa22193b38?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Anjali Kapoor</h6>
            <p class="text-muted mb-1">Psychiatrist</p>
            <small>14+ Years Experience</small>
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
            <h6 class="fw-bold mb-1">Dr. Rohan Mehta</h6>
            <p class="text-muted mb-1">Clinical Psychologist</p>
            <small>10+ Years Experience</small>
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
            <h6 class="fw-bold mb-1">Dr. Neha Sharma</h6>
            <p class="text-muted mb-1">Counseling Psychologist</p>
            <small>12+ Years Experience</small>
            <a href="#" class="btn btn-success w-100 rounded-pill mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <!-- Doctor Card 4 -->
      <div class="col-md-3">
        <div class="doctor-card h-100">
          <img src="https://images.unsplash.com/photo-1682308646193-03b5c3525e4b?w=500"
               class="doctor-img" alt="Doctor">
          <div class="p-3">
            <h6 class="fw-bold mb-1">Dr. Pooja Singh</h6>
            <p class="text-muted mb-1">Mental Wellness Specialist</p>
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