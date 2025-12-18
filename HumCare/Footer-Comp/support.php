<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Support & Help Center | HumCare';
    $meta_description = 'Contact HumCare support for any issues or help using our platform.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2FBF71;
            --primary-dark: #1f8a50;
            --soft-bg: #f8fafc;
        }

        body { background-color: var(--soft-bg); font-family: 'Inter', sans-serif; }

        /* Hero Section with Image Overlay */
        .support-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80&w=1500');
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            color: white;
            text-align: center;
        }

        .contact-card {
            background: white;
            border: none;
            border-radius: 20px;
            padding: 35px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            height: 100%;
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(47, 191, 113, 0.15);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: rgba(47, 191, 113, 0.1);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin: 0 auto 20px;
        }

        .form-container {
            background: white;
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.05);
        }

        .form-control {
            padding: 12px 20px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            margin-bottom: 5px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(47, 191, 113, 0.1);
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 700;
            border: none;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            box-shadow: 0 10px 20px rgba(47, 191, 113, 0.2);
        }
    </style>
</head>
<body>

<?php include_once "../Foot-HEAD/header.php" ?>

<section class="support-hero">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3">We're Here to Help</h1>
        <p class="lead fs-4 opacity-90">Experience seamless healthcare support with our dedicated team.</p>
    </div>
</section>

<section class="container" style="margin-top: -60px;">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="contact-card text-center">
                <div class="icon-box"><i class="bi bi-chat-dots-fill"></i></div>
                <h5 class="fw-bold">24/7 Chat Support</h5>
                <p class="text-muted">Need instant help? Chat with our experts for booking or technical issues.</p>
                <a href="#" class="btn btn-link text-success fw-bold text-decoration-none">Start Chat <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-card text-center">
                <div class="icon-box"><i class="bi bi-telephone-fill"></i></div>
                <h5 class="fw-bold">Call Assistance</h5>
                <p class="text-muted">Speak directly with our support executives for emergency appointment help.</p>
                <p class="fw-bold mb-0 text-success">+91 98765 43210</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-card text-center">
                <div class="icon-box"><i class="bi bi-envelope-heart-fill"></i></div>
                <h5 class="fw-bold">Email Support</h5>
                <p class="text-muted">Prefer writing to us? Drop a mail and we will respond within 4 business hours.</p>
                <p class="fw-bold mb-0 text-success">help@humcare.com</p>
            </div>
        </div>
    </div>
</section>



<section class="container py-5 my-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <h2 class="fw-bold display-5 mb-4">Send us a <span class="text-success">Message</span></h2>
            <p class="text-muted fs-5 mb-4">Whether you are a patient looking for a doctor or a doctor wanting to join our platform, our team is ready to assist you.</p>
            
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-circle bg-success text-white p-2 d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <span>123, Healthcare Tower, IT Park, Delhi - 110001</span>
            </div>
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-circle bg-success text-white p-2 d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                    <i class="bi bi-clock"></i>
                </div>
                <span>Monday - Sunday, 24/7 Available</span>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-container">
                <form action="process-support.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Your Name</label>
                            <input type="text" class="form-control" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold small">Issue Category</label>
                            <select class="form-select form-control" name="category">
                                <option>Appointment Booking</option>
                                <option>Doctor Verification</option>
                                <option>Payment Issue</option>
                                <option>General Inquiry</option>
                            </select>
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label fw-bold small">How can we help?</label>
                            <textarea class="form-control" name="message" rows="4" placeholder="Describe your issue here..." required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-submit w-100">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once "../Foot-HEAD/footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>