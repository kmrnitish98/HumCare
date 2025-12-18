<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Terms & Conditions | HumCare';
    $meta_description = 'Terms and conditions for using HumCare services.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2FBF71;
            --primary-dark: #239d5d;
            --bg-light: #f4fbf7;
            --text-main: #2c3e50;
        }

        body {
            background-color: #f8fafc;
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        /* Hero Styling */
        .terms-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 100px 0 140px;
            color: white;
            text-align: center;
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        /* Container & Sidebar */
        .terms-container {
            background: white;
            padding: 40px;
            border-radius: 24px;
            z-index: 999;
            box-shadow: 0 20px 50px rgba(0,0,0,0.04);
            margin-top: -80px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .sticky-sidebar {
            position: sticky;
            top: 100px;
            padding: 20px;
            background: white;
            border-radius: 20px;
            border: 1px solid #edf2f7;
        }
        .container{
            
            z-index: 999;
        }

        .nav-link-custom {
            color: #64748b;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 10px;
            transition: 0.3s;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            background-color: var(--bg-light);
            color: var(--primary);
        }

        /* Typography */
        h4 {
            color: var(--text-main);
            font-weight: 800;
            margin-top: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        h4 i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        .content-section {
            border-bottom: 1px dashed #e2e8f0;
            padding-bottom: 30px;
        }

        .alert-disclaimer {
            background-color: #fffbeb;
            border: 1px solid #fef3c7;
            border-left: 6px solid #fbbf24;
            color: #92400e;
            padding: 25px;
            border-radius: 16px;
        }
        .upper{
            z-index:999;
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 10px; }
    </style>
</head>
<body>

<?php include_once "../Foot-HEAD/header.php" ?>

<section class="terms-header">
    <div class="container">
        <h1 class="fw-bold display-4">Terms & Conditions</h1>
        <p class="opacity-75 fs-5">Everything you need to know about using the HumCare platform.</p>
    </div>
</section>

<section class="container mb-5">
    <div class="row g-4">
        
        <div class="col-lg-3 d-none d-lg-block">
            <div class="sticky-sidebar shadow-sm">
                <h6 class="fw-bold text-uppercase mb-3 small tracking-widest text-secondary">Quick Links</h6>
                <nav class="nav flex-column">
                    <a class="nav-link-custom" href="#eligibility">1. Eligibility</a>
                    <a class="nav-link-custom" href="#disclaimer">2. Medical Disclaimer</a>
                    <a class="nav-link-custom" href="#booking">3. Appointment Booking</a>
                    <a class="nav-link-custom" href="#user-resp">4. User Responsibilities</a>
                    <a class="nav-link-custom" href="#doc-resp">5. Doctor's Duty</a>
                    <a class="nav-link-custom" href="#payments">6. Payments & Fees</a>
                </nav>
            </div>
        </div>

        <div class="col-lg-9 upper">
            <div class="terms-container mb-5">
                
                <div class="alert-disclaimer mb-5">
                    <div class="d-flex gap-3">
                        <i class="bi bi-shield-exclamation fs-2"></i>
                        <div>
                            <h5 class="fw-bold mb-1">Legal Notice</h5>
                            <p class="mb-0">HumCare acts as a bridge between patients and healthcare providers. We are <strong>not</strong> a medical provider. For life-threatening emergencies, please call your local emergency number immediately.</p>
                        </div>
                    </div>
                </div>

                <div class="content-section" id="eligibility">
                    <h4><i class="bi bi-person-check"></i> 1. Eligibility</h4>
                    <p>To use our services, you must be at least 18 years of age. Users under 18 must use the platform under the supervision of a parent or legal guardian who agrees to be bound by these terms.</p>
                </div>

                <div class="content-section" id="disclaimer">
                    <h4><i class="bi bi-heart-pulse"></i> 2. Medical Disclaimer</h4>
                    <p>Information provided on this platform is for general awareness only. It does not constitute medical advice, diagnosis, or treatment. Always consult a certified professional before making health decisions.</p>
                </div>

                <div class="content-section" id="booking">
                    <h4><i class="bi bi-calendar-event"></i> 3. Appointment Booking & Cancellation</h4>
                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 h-100">
                                <h6 class="fw-bold">Cancellation Window</h6>
                                <p class="small mb-0 text-muted">Cancel up to 2 hours before your slot for a smoother experience.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 h-100">
                                <h6 class="fw-bold">No-Show Policy</h6>
                                <p class="small mb-0 text-muted">Repeated no-shows might lead to temporary suspension of booking privileges.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-section" id="user-resp">
                    <h4><i class="bi bi-shield-lock"></i> 4. User Responsibilities</h4>
                    <ul class="mt-2">
                        <li>Maintain the confidentiality of your account credentials.</li>
                        <li>Provide truthful and accurate medical history for better diagnosis.</li>
                        <li>Use the platform respectfully without violating any laws.</li>
                    </ul>
                </div>

                <div class="content-section" id="doc-resp">
                    <h4><i class="bi bi-hospital"></i> 5. Doctor’s Responsibility</h4>
                    <p>Doctors on HumCare are independent practitioners. While we verify their credentials, the clinical responsibility and quality of care lie solely with the healthcare professional providing the service.</p>
                </div>

                <div class="content-section border-0" id="payments">
                    <h4><i class="bi bi-credit-card-2-front"></i> 6. Payments & Fees</h4>
                    <p>Payment for consultations is processed securely. HumCare may include a platform service fee which will be clearly itemized on your final billing screen before payment.</p>
                </div>

                <div class="mt-5 p-5 bg-light rounded-4 text-center border">
                    <h5 class="fw-bold">Need Further Clarity?</h5>
                    <p class="text-muted">Our legal team is here to help you understand our policies better.</p>
                    <a href="mailto:legal@humcare.com" class="btn btn-success px-5 py-2 rounded-pill fw-bold shadow-sm mt-2">
                        Contact Support
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include_once "../Foot-HEAD/footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>