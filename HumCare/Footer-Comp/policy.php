<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Privacy Policy | HumCare';
    $meta_description = 'HumCare privacy policy describing data handling and patient privacy commitments.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2FBF71;
            --primary-dark: #249d5d;
            --bg-glass: rgba(255, 255, 255, 0.9);
        }

        body {
            background-color: #f8fafc;
            color: #334155;
            font-family: 'Inter', system-ui, sans-serif;
            scroll-behavior: smooth;
        }

        /* --- Dynamic Hero Section --- */
        .hero-privacy {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 100px 0 140px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-privacy::after {
            content: "";
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: #f8fafc;
            transform: skewY(-2deg);
        }

        .hero-privacy .badge {
            background: rgba(47, 191, 113, 0.2);
            color: var(--primary);
            border: 1px solid rgba(47, 191, 113, 0.3);
            padding: 8px 16px;
            border-radius: 50px;
        }

        /* --- Policy Navigation --- */
        .sticky-nav {
            position: sticky;
            top: 100px;
        }

        .nav-link-policy {
            display: block;
            padding: 10px 15px;
            color: #64748b;
            text-decoration: none;
            border-left: 2px solid #e2e8f0;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-link-policy:hover, .nav-link-policy.active {
            color: var(--primary);
            border-left-color: var(--primary);
            background: rgba(47, 191, 113, 0.05);
        }

        /* --- Content Styling --- */
        .policy-card {
            background: white;
            border-radius: 24px;
            padding: 50px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
        }

        section[id] {
            scroll-margin-top: 100px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            color: #0f172a;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: var(--bg-glass);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: var(--primary);
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .privacy-highlight {
            background: #f0fdf4;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #dcfce7;
            display: flex;
            gap: 20px;
            margin: 30px 0;
        }

        .contact-box {
            background: var(--primary);
            color: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php include_once "../Foot-HEAD/header.php" ?>

<section class="hero-privacy text-center">
    <div class="container position-relative z-index-1">
        <span class="badge mb-3">Transparency Matters</span>
        <h1 class="display-4 fw-bold mb-3">Your Privacy is Our Priority</h1>
        <p class="lead opacity-75 mx-auto mb-4" style="max-width: 600px;">
            At HumCare, we believe in radical transparency. Learn how we handle your data with medical-grade security.
        </p>
        <p class="small opacity-50"><i class="bi bi-clock me-1"></i> Last Updated: December 17, 2025</p>
    </div>
</section>

<section class="container" style="margin-top: -60px; margin-bottom: 80px;">
    <div class="row g-5">
        
        <div class="col-lg-3 d-none d-lg-block">
            <div class="sticky-nav">
                <h6 class="fw-bold mb-4 text-uppercase small tracking-wider">On this page</h6>
                <a href="#intro" class="nav-link-policy active">Introduction</a>
                <a href="#collect" class="nav-link-policy">1. Data Collection</a>
                <a href="#usage" class="nav-link-policy">2. How We Use Data</a>
                <a href="#sharing" class="nav-link-policy">3. Data Sharing</a>
                <a href="#rights" class="nav-link-policy">4. Your Privacy Rights</a>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="policy-card">
                
                <div id="intro" class="mb-5">
                    <p class="fs-5 text-muted mb-4">
                        Welcome to <strong>HumCare</strong>. This policy explains how we collect, use, and protect your personal and medical information when you use our platform.
                    </p>
                    
                    <div class="privacy-highlight">
                        <div class="fs-1"><i class="bi bi-shield-check text-success"></i></div>
                        <div>
                            <h5 class="fw-bold mb-1">AES-256 Encryption</h5>
                            <p class="mb-0 text-muted small">All medical records and consultation chats are encrypted using banking-grade security protocols. No unauthorized person can access your health files.</p>
                        </div>
                    </div>
                </div>

                <hr class="my-5 opacity-50">

                <section id="collect" class="mb-5">
                    <div class="section-title">
                        <div class="section-icon"><i class="bi bi-database-add"></i></div>
                        <h3 class="h4 fw-bold mb-0">1. Information We Collect</h3>
                    </div>
                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 h-100">
                                <h6 class="fw-bold"><i class="bi bi-person me-2"></i>Personal Data</h6>
                                <p class="small text-muted mb-0">Full name, age, contact details, and identity verification for doctors.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 h-100">
                                <h6 class="fw-bold"><i class="bi bi-heart-pulse me-2"></i>Medical Data</h6>
                                <p class="small text-muted mb-0">Symptoms, prescriptions, medical history, and consultation recordings.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="usage" class="mb-5">
                    <div class="section-title">
                        <div class="section-icon"><i class="bi bi-gear"></i></div>
                        <h3 class="h4 fw-bold mb-0">2. How We Use Your Data</h3>
                    </div>
                    <p>HumCare processes your information to fulfill our healthcare commitment:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>To connect you with verified healthcare professionals.</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>To automate appointment reminders via SMS/WhatsApp.</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>To maintain legal digital health records (Electronic Health Records).</li>
                    </ul>
                </section>

                <section id="sharing" class="mb-5">
                    <div class="section-title">
                        <div class="section-icon"><i class="bi bi-share"></i></div>
                        <h3 class="h4 fw-bold mb-0">3. Information Sharing</h3>
                    </div>
                    <div class="alert alert-warning border-0 bg-warning-subtle py-3 px-4 rounded-4">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Strict Policy:</strong> We do not sell your data to pharmaceutical or insurance companies.
                    </div>
                    <p class="mt-3">Your data is only visible to the <strong>Doctor</strong> you have booked with and our secure <strong>Payment Partners</strong> (e.g., UPI providers).</p>
                </section>

                <section id="rights" class="mb-5">
                    <div class="section-title">
                        <div class="section-icon"><i class="bi bi-hand-index-thumb"></i></div>
                        <h3 class="h4 fw-bold mb-0">4. Your Rights</h3>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-4 text-center">
                            <i class="bi bi-eye d-block fs-3 mb-2 text-primary"></i>
                            <span class="small fw-semibold">View Records</span>
                        </div>
                        <div class="col-sm-4 text-center">
                            <i class="bi bi-pencil-square d-block fs-3 mb-2 text-primary"></i>
                            <span class="small fw-semibold">Modify Data</span>
                        </div>
                        <div class="col-sm-4 text-center">
                            <i class="bi bi-trash d-block fs-3 mb-2 text-danger"></i>
                            <span class="small fw-semibold">Request Erasure</span>
                        </div>
                    </div>
                </section>

                <div class="contact-box mt-5 shadow">
                    <h4 class="fw-bold mb-3">Privacy Questions?</h4>
                    <p class="opacity-75 mb-4">Our dedicated privacy officer is here to help you understand your data security.</p>
                    <a href="mailto:privacy@humcare.com" class="btn btn-light rounded-pill px-4 fw-bold text-success">
                        <i class="bi bi-envelope-fill me-2"></i> Contact Privacy Officer
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include_once "../Foot-HEAD/footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    window.addEventListener('scroll', () => {
        let current = "";
        document.querySelectorAll("section[id]").forEach((section) => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 150) {
                current = section.getAttribute("id");
            }
        });

        document.querySelectorAll(".nav-link-policy").forEach((a) => {
            a.classList.remove("active");
            if (a.getAttribute("href") === `#${current}`) {
                a.classList.add("active");
            }
        });
    });
</script>

</body>
</html>