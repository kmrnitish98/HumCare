<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = $meta_title ?? 'HumCare';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
/* ===== GLOBAL COLORS ===== */
:root{
    --main-nav-height: 70px;
    --sub-nav-height: 55px;
}
:root{
    --primary: #2FBF71;
    --secondary: #4DA8DA;
}

/* Navbar Brand */

/* Footer */
.footer{
    background:#f0fff8;
    border-top:1px solid #d7f3e6;
}

.footer-brand{
    font-weight:800;
    color:#2FBF71;
}

.footer-title{
    font-weight:700;
    margin-bottom:10px;
}

.footer-text{
    color:#555;
    font-size:14px;
}

.footer-list{
    list-style:none;
    padding:0;
}

.footer-list li{
    margin-bottom:6px;
}

.footer-list a{
    text-decoration:none;
    color:#555;
    font-size:14px;
}

.footer-list a:hover{
    color:#2FBF71;
}

.footer-bottom{
    border-top:1px solid #d7f3e6;
    padding:15px 0;
    font-size:14px;
    color:#666;
}
.footer-social a{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:38px;
    height:38px;
    margin-right:10px;
    border-radius:50%;
    background:#eafff4;
    color:#2FBF71;
    font-size:18px;
    transition:0.3s;
    text-decoration:none;
}

.footer-social a:hover{
    background:#2FBF71;
    color:#fff;
    transform:translateY(-3px);
}

</style>

    </style>
</head>
<body>
    <footer class="footer pt-5">
  <div class="container">

    <div class="row">

      <!-- LEFT : BRAND -->
      <div class="col-md-4 mb-4">
            <h4 class="footer-brand">HumCare</h4>
            <p class="footer-text">
                HumCare is a trusted healthcare platform helping patients
                find verified doctors, book appointments, and access
                reliable medical information easily.
            </p>

            <!-- Social Media Icons -->
            <div class="footer-social mt-3">
                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

      <!-- CENTER : COMPANY + CONTACT -->
      <div class="col-md-4 mb-4">
        <h6 class="footer-title">Company</h6>
        <ul class="footer-list">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Our Services</a></li>
          <li><a href="#">Doctors</a></li>
          <li><a href="#">Careers</a></li>
        </ul>

        <h6 class="footer-title mt-3">Contact</h6>
        <p class="footer-text mb-1">📧 support@humcare.com</p>
        <p class="footer-text mb-0">📞 +91 98765 43210</p>
      </div>

      <!-- RIGHT : QUICK LINKS -->
      <div class="col-md-4 mb-4">
        <h6 class="footer-title">Quick Links</h6>
        <ul class="footer-list">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Support</a></li>
        </ul>
      </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="footer-bottom text-center mt-4">
      © 2025 <strong>HumCare</strong>. All Rights Reserved.
    </div>

  </div>
</footer>
</body>
</html>