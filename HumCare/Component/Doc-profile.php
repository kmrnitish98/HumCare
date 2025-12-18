<?php
  include_once "../DB/docProfile.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    $meta_title = $doctor['name'] . ' | HumCare Profile';
    $meta_description = 'Profile of Dr. ' . ($doctor['name'] ?? '') . ' — specialties, experience and available slots.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; padding-top: 100px; }
        .profile-header { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .doc-main-img { width: 150px; height: 150px; border-radius: 15px; object-fit: cover; border: 4px solid #e9ecef; }
        .stat-box { background: #f0fff4; padding: 15px; border-radius: 10px; text-align: center; border: 1px solid #d1e7dd; }
        .sticky-booking { position: sticky; top: 100px; }
        .nav-pills .nav-link.active { background-color: #2FBF71; }
    </style>
</head>
<body>
<?php include_once "../Foot-HEAD/header.php" ?>
<div class="container mb-5">
    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="profile-header mb-4">
                <div class="d-md-flex align-items-center gap-4">
                    <img src="<?php echo $doctor['image']; ?>" class="doc-main-img" onerror="this.src='https://via.placeholder.com/150'">
                    <div>
                        <span class="badge bg-success mb-2">Verified Professional</span>
                        <h2 class="fw-bold"><?php echo $doctor['name']; ?></h2>
                        <p class="text-muted fs-5 mb-2"><?php echo $doctor['specialization']; ?></p>
                        <div class="d-flex gap-3 align-items-center">
                            <span class="text-warning fw-bold"><i class="bi bi-star-fill"></i> <?php echo $doctor['rating']; ?> Rating</span>
                            <span class="text-secondary">|</span>
                            <span class="fw-medium"><i class="bi bi-briefcase"></i> <?php echo $doctor['experience']; ?>+ Years Exp.</span>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <div class="stat-box">
                            <small class="text-muted d-block">Consultation</small>
                            <span class="fw-bold">₹<?php echo $doctor['fee']; ?></span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-box">
                            <small class="text-muted d-block">Availability</small>
                            <span class="fw-bold text-success"><?php echo ucfirst($doctor['availability']); ?></span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-box">
                            <small class="text-muted d-block">Type</small>
                            <span class="fw-bold"><?php echo ucfirst($doctor['consultation_type']); ?></span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-box">
                            <small class="text-muted d-block">Location</small>
                            <span class="fw-bold"><?php echo $doctor['city']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#about">About</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#clinic">Clinic Info</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="about">
                            <h5>Professional Summary</h5>
                            <p class="text-muted"> <?php echo $doctor['name']; ?> is a highly skilled <?php echo $doctor['specialization']; ?> based in <?php echo $doctor['city']; ?>, dedicated to providing exceptional healthcare services with over <?php echo $doctor['experience']; ?> years of experience.</p>
                        </div>
                        <div class="tab-pane fade" id="clinic">
                            <h5><i class="bi bi-hospital text-success"></i> <?php echo $doctor['clinic']; ?></h5>
                            <p class="text-muted">Full Address details would go here based on your database expansion. Currently serving in <strong><?php echo $doctor['city']; ?></strong>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 sticky-booking">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Book Appointment</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Consultation Fee</span>
                        <span class="fw-bold text-dark">₹<?php echo $doctor['fee']; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <span>Service Charge</span>
                        <span class="text-success fw-semibold">FREE</span>
                    </div>
                    
                    <a href="../Component/appointment.php?doctor_id=<?php echo $doctor['id']; ?>" class="btn btn-success w-100 py-2 rounded-pill fw-bold mb-3">
                        Proceed to Booking
                    </a>
                    
                    <p class="text-center text-muted small">
                        <i class="bi bi-shield-check"></i> 100% Secure & Private
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include_once "../Foot-HEAD/footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>