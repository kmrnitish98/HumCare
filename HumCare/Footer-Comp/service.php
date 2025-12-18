<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Our Services | HumCare';
    $meta_description = 'Overview of HumCare services and offerings for patients and doctors.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2FBF71;
            --soft-bg: #f0fff7;
        }

        .service-header {
            background: linear-gradient(135deg, #2FBF71 0%, #1a9453 100%);
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .service-card {
            border: none;
            border-radius: 20px;
            padding: 40px 30px;
            background: #fff;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(47, 191, 113, 0.15);
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: var(--soft-bg);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            margin: 0 auto 25px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .feature-list li {
            margin-bottom: 10px;
            color: #555;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-list li i {
            color: var(--primary);
        }

        .cta-section {
            background: var(--soft-bg);
            border-radius: 30px;
            padding: 60px;
        }
    </style>
</head>
<body>
<?php include_once "../Foot-HEAD/header.php" ?>
<section class="service-header mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Our Medical Services</h1>
        <p class="lead">We provide a wide range of digital healthcare solutions tailored for your needs.</p>
    </div>
</section>

<section class="container mb-5 pb-5">
    <div class="row g-4 justify-content-center">
        
        <div class="col-md-4">
            <div class="service-card text-center">
                <div class="icon-circle"><i class="bi bi-search"></i></div>
                <h4 class="fw-bold">Doctor Discovery</h4>
                <p class="text-muted">Find the best specialists near you based on experience and real patient feedback.</p>
                <ul class="feature-list mt-3">
                    <li><i class="bi bi-check-circle-fill"></i> 15+ Specializations</li>
                    <li><i class="bi bi-check-circle-fill"></i> Verified Profiles</li>
                    <li><i class="bi bi-check-circle-fill"></i> Rating System</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card text-center">
                <div class="icon-circle"><i class="bi bi-calendar-check"></i></div>
                <h4 class="fw-bold">Easy Booking</h4>
                <p class="text-muted">Book instant appointments without the hassle of long phone calls or waiting lines.</p>
                <ul class="feature-list mt-3">
                    <li><i class="bi bi-check-circle-fill"></i> Real-time Slots</li>
                    <li><i class="bi bi-check-circle-fill"></i> Today/Week Filters</li>
                    <li><i class="bi bi-check-circle-fill"></i> Instant E-Receipts</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card text-center">
                <div class="icon-circle"><i class="bi bi-video"></i></div>
                <h4 class="fw-bold">Tele-Consultation</h4>
                <p class="text-muted">Consult with top doctors from the comfort of your home via secure video calls.</p>
                <ul class="feature-list mt-3">
                    <li><i class="bi bi-check-circle-fill"></i> Secure 1-on-1 Calls</li>
                    <li><i class="bi bi-check-circle-fill"></i> Digital Prescriptions</li>
                    <li><i class="bi bi-check-circle-fill"></i> Time-Saving</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card text-center">
                <div class="icon-circle"><i class="bi bi-journal-medical"></i></div>
                <h4 class="fw-bold">Health Records</h4>
                <p class="text-muted">Keep your medical history and prescriptions organized in one secure dashboard.</p>
                <ul class="feature-list mt-3">
                    <li><i class="bi bi-check-circle-fill"></i> Paperless History</li>
                    <li><i class="bi bi-check-circle-fill"></i> Secure Storage</li>
                    <li><i class="bi bi-check-circle-fill"></i> Easy Sharing</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card text-center">
                <div class="icon-circle"><i class="bi bi-newspaper"></i></div>
                <h4 class="fw-bold">Health Articles</h4>
                <p class="text-muted">Stay informed with expert-backed health tips and medical news daily.</p>
                <ul class="feature-list mt-3">
                    <li><i class="bi bi-check-circle-fill"></i> Lifestyle Tips</li>
                    <li><i class="bi bi-check-circle-fill"></i> Disease Awareness</li>
                    <li><i class="bi bi-check-circle-fill"></i> Expert Advice</li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="container mb-5">
    <div class="cta-section text-center">
        <h2 class="fw-bold mb-3">Ready to find your specialist?</h2>
        <p class="mb-4 text-muted">Join thousands of users who trust HumCare for their daily healthcare needs.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="Doctors.php" class="btn btn-success btn-lg px-5 rounded-pill">Find a Doctor</a>
            <a href="ContactUs.php" class="btn btn-outline-success btn-lg px-5 rounded-pill">Contact Us</a>
        </div>
    </div>
</section>
<?php include_once "../Foot-HEAD/footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>