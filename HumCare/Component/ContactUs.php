<?php
session_start();
$conn=mysqli_connect("localhost","root","","humcare");
if(!$conn){
    die("Connection Failed..".mysqli_connect_error());
}

$q = mysqli_query($conn, "SELECT * FROM contactus LIMIT 1");
$contact = mysqli_fetch_assoc($q) ?? [
  'address'=>'Not Available',
  'phone'=>'Not Available',
  'email'=>'Not Available',
  'map_location'=>'India'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
$meta_title = 'Contact Us | HumCare';
$meta_description = "Contact HumCare for appointments, support and general inquiries. We're here to help.";
$meta_image = 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto=format&fit=crop';
$meta_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
include_once __DIR__ . '/../includes/seo.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>
.map iframe
   {width:100%;height:350px;border:0;border-radius:12px;}
   :root{
    --main-nav-height: 70px;
    --sub-nav-height: 55px;
}
:root{
    --primary: #2FBF71;
    --secondary: #4DA8DA;
}
nav{
  background-color:rgba(179, 228, 205, 1);
}
/* Navbar Brand */
.navbar-brand{
    font-size: 26px;
    font-weight: bold;
    color: var(--primary) !important;
}
.contact-hero{
  margin-top:80px;
  height: 500px;
  background: url('https://plus.unsplash.com/premium_photo-1661645672144-de1e08be7473?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDF8fGNvbnRhY3QlMjB1c3xlbnwwfHwwfHx8MA%3D%3D')
              center/cover no-repeat;
  position: relative;
}

.contact-overlay{
  height: 100%;
  width: 100%;
  background: rgba(0,0,0,0.55);
  display: flex;
  align-items: center;
}
/* Search bar */
.search-box{
    width: 300px;
}
.btn-main{
    background: var(--primary);
    color: #fff;
}
.btn-main:hover{
    background: #239d5d;
    color: #fff;
}
.contact-hero {
    height: 450px;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto=format&fit=crop') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    border-radius: 0 0 40px 40px;
}

.info-card-wrapper {
    margin-top: -80px;
    position: relative;
    z-index: 10;
}

.contact-info-card {
    background: #fff;
    border: none;
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    transition: 0.3s ease;
    box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    height: 100%;
}

.contact-info-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(47, 191, 113, 0.15);
}

.icon-circle {
    width: 65px;
    height: 65px;
    background: rgba(47, 191, 113, 0.1);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    border-radius: 50%;
    margin: 0 auto 20px;
}

.contact-form-container {
    background: #fff;
    border-radius: 30px;
    padding: 40px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.04);
}

.form-label {
    font-weight: 600;
    color: #4b5563;
    font-size: 0.9rem;
}

.form-control {
    padding: 12px 18px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
}

.form-control:focus {
    background: #fff;
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(47, 191, 113, 0.1);
}

.map-rounded {
    border-radius: 30px;
    overflow: hidden;
    height: 100%;
    min-height: 450px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}
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
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light  shadow-sm fixed-top">
  <div class="container-fluid px-4">

    <!-- Brand -->
    <a class="navbar-brand fw-bold" href="../HumCare.php">
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
        <li class="nav-item fw-bold"><a class="nav-link" href="./Doctors.php"><i class="bi bi-search"></i> Find Doctor</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./appointment.php"><i class="bi bi-bookmark-plus-fill"></i> Book Appointment</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./Health-Article.php"><i class="bi bi-heart-pulse-fill"></i> Health Articles</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="./ContactUs.php"><i class="bi bi-telephone-fill"></i> Contact Us</a></li>
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
              <a class="dropdown-item text-danger" href="../auth/logout.php">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
              </a>
            </li>
          </ul>
        </div>

      <?php else: ?>

        <!-- Not logged in -->
        <a class="btn btn-main rounded-pill px-4" href="../auth/login.php">Login</a>

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
<section class="contact-hero">
    <div class="container">
        <span class="badge bg-success mb-3 px-3 py-2 rounded-pill">CONTACT CENTER</span>
        <h1 class="display-4 fw-bold">Let's Start a <span class="text-success">Conversation</span></h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">
            Have questions about our doctors or services? Our team is here to help you every step of the way.
        </p>
    </div>
</section>

<section class="container info-card-wrapper mb-5">
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="contact-info-card">
                <div class="icon-circle"><i class="bi bi-geo-alt-fill"></i></div>
                <h5 class="fw-bold">Visit Us</h5>
                <p class="text-muted small mb-0"><?= $contact['address'] ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-info-card">
                <div class="icon-circle"><i class="bi bi-telephone-outbound-fill"></i></div>
                <h5 class="fw-bold">Call Anytime</h5>
                <p class="text-muted small mb-0"><?= $contact['phone'] ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-info-card">
                <div class="icon-circle"><i class="bi bi-envelope-paper-heart-fill"></i></div>
                <h5 class="fw-bold">Email Support</h5>
                <p class="text-muted small mb-0"><?= $contact['email'] ?></p>
            </div>
        </div>
    </div>
</section>



<section class="container py-5">
    <div class="row g-5 align-items-stretch">
        
        <div class="col-lg-6">
            <div class="contact-form-container">
                <div class="mb-4">
                    <h3 class="fw-bold">Send us a Message</h3>
                    <p class="text-muted">Fill out the form and we'll get back to you within 24 hours.</p>
                </div>
                
                <div id="msgAlert"></div>
                
                <form id="contactForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="john@example.com" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <select class="form-select form-control" name="subject">
                            <option>Appointment Inquiry</option>
                            <option>Doctor Registration</option>
                            <option>Technical Issue</option>
                            <option>Feedback</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">How can we help?</label>
                        <textarea class="form-control" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-main btn-lg w-100 rounded-pill shadow-sm">
                        <i class="bi bi-send-fill me-2"></i> Send Message
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="map-rounded">
                <iframe 
                    src="https://maps.google.com/maps?q=<?= urlencode($contact['map_location']) ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                    frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen>
                </iframe>
            </div>
        </div>

    </div>
</section>
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
<!-- AJAX SCRIPT -->
<script>
$("#contactForm").on("submit", function(e){
  e.preventDefault();

  var $form = $(this);
  var $btn = $form.find('button[type=submit]');
  $btn.prop('disabled', true).text('Sending...');

  $.ajax({
    url: "../DB/Contact-UsDb.php",
    type: "POST",
    data: $form.serialize(),
    dataType: "json",
    timeout: 10000,
    beforeSend: function(){
      $("#msgAlert").html(
        "<div class='alert alert-info'>Sending message...</div>"
      );
    },
    success: function(res){
      if(res.status === "success"){
        $("#msgAlert").html(
          "<div class='alert alert-success'>Message sent successfully!</div>"
        );
        $form[0].reset();
      }else{
        $("#msgAlert").html(
          "<div class='alert alert-danger'>"+res.msg+"</div>"
        );
      }
    },
    error: function(xhr, status, err){
      var msg = 'An error occurred while sending your message.';
      if(xhr && xhr.responseText){
        try{ var data = JSON.parse(xhr.responseText); if(data.msg) msg = data.msg; }catch(e){ /* ignore */ }
      }
      $("#msgAlert").html("<div class='alert alert-danger'>"+msg+"</div>");
    },
    complete: function(){
      $btn.prop('disabled', false).text('Send Message');
    }
  });
});
</script>

</body>
</html>