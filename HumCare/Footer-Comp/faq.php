<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'FAQs | How can we help you? - HumCare';
    $meta_description = 'Frequently asked questions about using HumCare — appointments, payments, and more.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2FBF71;
            --soft-green: #e9fff4;
            --dark-blue: #1e293b;
        }
        :root {
        --primary-green: #2FBF71;
        --light-green: #f0fff7;
        --dark-text: #1e293b;
    }
    :root{
    --main-nav-height: 70px;
    --sub-nav-height: 55px;
}
:root{
   
    --secondary: #4DA8DA;
}
nav{
  background-color:rgba(163, 253, 211, 0.6);
}
/* Navbar Brand */
.navbar-brand{
    font-size: 26px;
    font-weight: bold;
    color: var(--primary) !important;
}

/* Search bar */
.search-box{
    width: 300px;
}

/* Hero Section */


/* Buttons */
.btn-main{
    background: var(--primary);
    color: #fff;
}
.btn-main:hover{
    background: #239d5d;
    color: #fff;
}
    .hero-section {
        background-color: var(--light-green);
        padding: 80px 0;
        overflow: hidden;
        position: relative;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--dark-text);
        line-height: 1.2;
    }

    .hero-title span {
        color: var(--primary-green);
    }

    .hero-subtitle {
        font-size: 1.1rem;
        color: #64748b;
        margin: 25px 0 40px;
    }

    /* Floating Image Container */
    .hero-image-wrapper {
        position: relative;
        z-index: 1;
    }

    .main-hero-img {
        width: 100%;
        border-radius: 30px;
        box-shadow: 0 30px 60px rgba(0,0,0,0.1);
        transform: rotate(-2deg);
        transition: 0.5s;
    }

    .main-hero-img:hover {
        transform: rotate(0deg) scale(1.02);
    }

    /* Floating Trust Badges */
    .floating-badge {
        position: absolute;
        background: white;
        padding: 15px 20px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 2;
        animation: float 3s ease-in-out infinite;
    }

    .badge-1 { top: 10%; left: -10%; }
    .badge-2 { bottom: 15%; right: -5%; animation-delay: 1.5s; }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    .btn-hero-primary {
        background-color: var(--primary-green);
        color: white;
        padding: 15px 35px;
        border-radius: 50px;
        font-weight: 600;
        box-shadow: 0 10px 20px rgba(47, 191, 113, 0.2);
        transition: 0.3s;
    }

    .btn-hero-primary:hover {
        background-color: #239d5d;
        color: white;
        transform: translateY(-3px);
    }

    @media (max-width: 991px) {
        .hero-title { font-size: 2.5rem; }
        .hero-section { text-align: center; padding: 40px 0; }
        .floating-badge { display: none; }
    }
        body {
            background-color: #f8fafc;
            color: var(--dark-blue);
        }

        /* Hero & Search Section */
        

        /* Category Icons */
        .category-box {
            background: white;
            padding: 25px;
            border-radius: 20px;
            border: 1px solid #edf2f7;
            text-align: center;
            transition: 0.3s;
            cursor: pointer;
            height: 100%;
        }

        .category-box:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(47, 191, 113, 0.1);
        }

        .category-box i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        /* Accordion Custom Styling */
        .accordion-item {
            border: none;
            margin-bottom: 15px;
            border-radius: 15px !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            overflow: hidden;
        }

        .accordion-button {
            padding: 20px;
            font-weight: 600;
            color: var(--dark-blue);
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--soft-green);
            color: var(--primary);
            box-shadow: none;
        }

        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%231e293b'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .cta-box {
            background: var(--dark-blue);
            color: white;
            border-radius: 25px;
            padding: 40px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top">
  <div class="container-fluid px-4">

    <!-- Brand -->
    <a class="navbar-brand fw-bold" href="#">
      <i class="bi bi-h-circle"></i> HumCare
      <i class="bi bi-activity text-danger"></i>
    </a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desktop Search (ONLY desktop) -->
    <div class="d-none d-lg-block mx-auto">
      <input type="text" class="form-control rounded-pill search-box"
       placeholder="Search doctor, symptom, clinic...">
    </div>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- LOGIN (TOP on mobile) -->
      <div class="d-lg-none mb-3">
        <a class="btn btn-main w-100 rounded-pill" href="#">Login</a>
      </div>

      <!-- NAV LINKS -->
      <ul class="navbar-nav mx-lg-auto gap-lg-3">
        <!-- <li class="nav-item"><a class="nav-link" href="#">Home</a></li> -->
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/Doctors.php"><i class="bi bi-search"></i> Find Doctor</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/appointment.php"><i class="bi bi-bookmark-plus-fill"></i> Book Appointment</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/Health-Article.php"><i class="bi bi-heart-pulse-fill"></i> Health Articles</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Component/ContactUs.php"><i class="bi bi-telephone-fill"></i> Contact Us</a></li>
      </ul>

      <!-- Bell (desktop only) -->
      <div class="d-none d-lg-flex align-items-center ms-3">

      <?php if(isset($_SESSION['user_id'])): ?>

        <!-- Logged in -->
        <div class="dropdown">
          <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button"
            data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i>
            <?= htmlspecialchars($_SESSION['user_name']) ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li>
              <a class="dropdown-item" href="./DB/dashboard.php">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger" href="./auth/logout.php">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
              </a>
            </li>
          </ul>
        </div>

      <?php else: ?>

        <!-- Not logged in -->
        <a class="btn btn-success rounded-pill px-4" href="./auth/login.php">Login</a>

      <?php endif; ?>

      </div>

      <!-- Mobile Search (BOTTOM) -->
      <div class="d-lg-none mt-3">
        <input type="text" class="form-control rounded-pill"
         placeholder="Search doctor, symptom, clinic...">
      </div>

    </div>
  </div>
</nav>
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background: rgba(47, 191, 113, 0.1); color: var(--primary-green);">
                    <i class="bi bi-shield-check me-2"></i>Trusted by 10,000+ Patients
                </span>
                <h1 class="hero-title">
                    Your Health is Our <span>Top Priority</span>
                </h1>
                <p class="hero-subtitle">
                    Connect with India's best doctors for online consultations or in-person visits. Experience healthcare that is simple, fast, and reliable.
                </p>
                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                    <a href="Doctors.php" class="btn btn-hero-primary">Book Appointment</a>
                    <a href="OurServices.php" class="btn btn-outline-dark px-4 py-3 rounded-pill fw-bold">Learn More</a>
                </div>
                
                <div class="mt-5 d-flex gap-4 align-items-center justify-content-center justify-content-lg-start">
                    <div class="text-center">
                        <h4 class="fw-bold mb-0">500+</h4>
                        <small class="text-muted">Doctors</small>
                    </div>
                    <div class="vr"></div>
                    <div class="text-center">
                        <h4 class="fw-bold mb-0">15+</h4>
                        <small class="text-muted">Specialists</small>
                    </div>
                    <div class="vr"></div>
                    <div class="text-center">
                        <h4 class="fw-bold mb-0">24/7</h4>
                        <small class="text-muted">Support</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image-wrapper ps-lg-5">
                    <div class="floating-badge badge-1 d-none d-md-flex">
                        <div class="bg-success text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                            <i class="bi bi-check-lg"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold small">Verified Specialists</p>
                            <small class="text-muted">MCI Approved</small>
                        </div>
                    </div>

                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=1000" 
                         alt="Doctor Consultation" 
                         class="main-hero-img">

                    <div class="floating-badge badge-2 d-none d-md-flex">
                        <div class="bg-warning text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold small">4.8/5 Rating</p>
                            <small class="text-muted">Patient Reviews</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="container search-wrapper mb-5">
    <div class="position-relative">
        <input type="text" class="form-control search-input" id="faqSearch" placeholder="Type your question here (e.g. 'How to book')">
        <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-4 text-muted fs-5"></i>
    </div>
</div>

<section class="container mb-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="category-box">
                <i class="bi bi-calendar-check"></i>
                <h6 class="fw-bold">Booking</h6>
            </div>
        </div>
        <div class="col-md-3">
            <div class="category-box">
                <i class="bi bi-wallet2"></i>
                <h6 class="fw-bold">Payments</h6>
            </div>
        </div>
        <div class="col-md-3">
            <div class="category-box">
                <i class="bi bi-person-badge"></i>
                <h6 class="fw-bold">For Doctors</h6>
            </div>
        </div>
        <div class="col-md-3">
            <div class="category-box">
                <i class="bi bi-shield-check"></i>
                <h6 class="fw-bold">Security</h6>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h3 class="fw-bold mb-4">Popular Questions</h3>
            <div class="accordion" id="faqAccordion">
                
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1">
                            How do I book an appointment on HumCare?
                        </button>
                    </h2>
                    <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Booking is simple! Just search for your doctor or specialization, choose a preferred slot, and click "Proceed to Book". You'll receive an instant confirmation via SMS and Email.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">
                            Can I consult with a doctor online?
                        </button>
                    </h2>
                    <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Yes, many doctors on our platform offer Video Consultation. Look for the "Online" badge on the doctor's profile to book a virtual session.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q3">
                            Are the doctors on your platform verified?
                        </button>
                    </h2>
                    <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Absolutely. Every doctor goes through a 3-step verification process where we check their medical license, experience certificates, and clinic details.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q4">
                            How can I cancel or reschedule my appointment?
                        </button>
                    </h2>
                    <div id="q4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            You can manage all your bookings from the "My Appointments" section in your user dashboard. Rescheduling is allowed up to 2 hours before the appointment.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="container mb-5 pb-5">
    <div class="cta-box text-center">
        <h2 class="fw-bold mb-3">Still have questions?</h2>
        <p class="opacity-75 mb-4">If you can't find your answer, our support team is available 24/7 to help you.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="contact.php" class="btn btn-success px-4 py-2 rounded-pill fw-bold">Contact Support</a>
            <a href="mailto:support@humcare.com" class="btn btn-outline-light px-4 py-2 rounded-pill fw-bold">Email Us</a>
        </div>
    </div>
</section>

<?php include_once "../Foot-HEAD/footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('faqSearch').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let items = document.querySelectorAll('.accordion-item');
        
        items.forEach(item => {
            let text = item.innerText.toLowerCase();
            item.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
</body>
</html>