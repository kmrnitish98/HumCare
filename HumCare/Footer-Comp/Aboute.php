<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'About Us | HumCare Healthcare';
    $meta_description = 'Learn about HumCare mission, vision and the team behind our platform.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2FBF71;
            --secondary: #4DA8DA;
            --dark-bg: #1f2937;
        }

        .about-hero {
            background: linear-gradient(rgba(47, 191, 113, 0.9), rgba(47, 191, 113, 0.8)), 
                        url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            text-align: center;
        }

        .section-title {
            color: var(--dark-bg);
            font-weight: 700;
            position: relative;
            margin-bottom: 40px;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background: var(--primary);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .mission-card {
            border: none;
            border-radius: 20px;
            transition: 0.3s;
            background: #f8fffb;
        }

        .mission-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .stat-circle {
            padding: 40px;
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
        }
    </style>
</head>
<body>

<?php include_once "../Foot-HEAD/header.php"; ?>

<section class="about-hero">
    <div class="container">
        <h1 class="display-4 fw-bold">Connecting You to Better Health</h1>
        <p class="lead">HumCare is on a mission to make healthcare accessible, affordable, and transparent for everyone.</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80" class="img-fluid rounded-4 shadow" alt="Doctor Consultation">
            </div>
            <div class="col-md-6 px-lg-5">
                <h2 class="section-title text-start ms-0">Our Journey</h2>
                <p class="text-muted">HumCare was founded with a simple idea: <strong>Healthcare should be just a click away.</strong> We noticed that finding the right doctor and booking an appointment was often a stressful experience.</p>
                <p class="text-muted">Today, we are building a bridge between patients and top-tier medical professionals. From fever consultations to complex heart surgeries, we help you find the best care based on real ratings, verified experience, and transparent fees.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="section-title">Why Choose HumCare?</h2>
        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="card mission-card h-100 p-4">
                    <div class="icon-box mx-auto"><i class="bi bi-shield-check"></i></div>
                    <h4>Verified Doctors</h4>
                    <p class="text-muted">Every doctor on our platform goes through a strict verification process to ensure your safety.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mission-card h-100 p-4">
                    <div class="icon-box mx-auto"><i class="bi bi-clock-history"></i></div>
                    <h4>Instant Booking</h4>
                    <p class="text-muted">No more waiting in long queues. Book your slot online and get seen at your chosen time.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mission-card h-100 p-4">
                    <div class="icon-box mx-auto"><i class="bi bi-chat-heart"></i></div>
                    <h4>Patient-Centric</h4>
                    <p class="text-muted">We prioritize your health records and privacy, making medical history easy to manage.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-0 rounded-4 shadow-sm bg-white overflow-hidden">
            <div class="col-md-3 stat-circle border-end">
                <div class="stat-number">10k+</div>
                <div class="text-muted">Happy Patients</div>
            </div>
            <div class="col-md-3 stat-circle border-end">
                <div class="stat-number">500+</div>
                <div class="text-muted">Verified Doctors</div>
            </div>
            <div class="col-md-3 stat-circle border-end">
                <div class="stat-number">25+</div>
                <div class="text-muted">Cities Covered</div>
            </div>
            <div class="col-md-3 stat-circle">
                <div class="stat-number">4.8</div>
                <div class="text-muted">Average Rating</div>
            </div>
        </div>
    </div>
</section>

<?php include_once "../Foot-HEAD/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>