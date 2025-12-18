<?php
require_once __DIR__ . '/../auth/auth-doctor.php';
require_once __DIR__ . '/../includes/db.php';
$doctorName = $_SESSION['user_name'];

// Real data for the logged-in doctor
$doctor_id = (int) $_SESSION['user_id'];

$totalAppointments = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM appointments WHERE doctor_id='$doctor_id'"))[0];
$todayAppointments = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM appointments WHERE doctor_id='$doctor_id' AND appointment_date = CURDATE()"))[0];
$totalPatients = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(DISTINCT patient_id) FROM appointments WHERE doctor_id='$doctor_id'"))[0];
$rating = (float) mysqli_fetch_row(mysqli_query($conn, "SELECT IFNULL(rating,0) FROM doctors WHERE id='$doctor_id'"))[0];

// Fetch recent appointments for this doctor
$appointmentsRes = mysqli_query($conn, "SELECT a.*, u.name as patient_name FROM appointments a JOIN users u ON u.id=a.patient_id WHERE a.doctor_id='$doctor_id' ORDER BY appointment_date DESC, appointment_time DESC LIMIT 25");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$meta_title = 'Doctor Dashboard | HumCare – Manage Appointments & Patients';
$meta_description = 'Manage appointments, patients and schedules in the HumCare doctor dashboard.';
include_once __DIR__ . '/../includes/seo.php';
?>

<meta name="description" content="Doctor dashboard on HumCare to manage appointments, patients, and availability.">
<meta name="keywords" content="doctor dashboard, healthcare management">
<meta name="robots" content="index, follow">

<!-- Open Graph -->
<meta property="og:title" content="Doctor Dashboard | HumCare">
<meta property="og:description" content="Manage appointments and patients on HumCare.">
<meta property="og:type" content="website">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<style>
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
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-success-subtle shadow-sm">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold text-success fs-2" href="../HumCare.php">
      <i class="bi bi-h-circle"></i> HumCare<i class="bi bi-activity text-danger"></i>
    </a>

    <div class="ms-auto d-flex align-items-center gap-3">
      <span class="fw-bold fs-4">👨‍⚕️ Dr. <?= htmlspecialchars($doctorName); ?></span>
      <i class="bi bi-bell fw-bold fs-3"></i>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-2 bg-white vh-100 shadow-sm p-3">
      <ul class="nav flex-column gap-2">
        <li class="nav-item ">
          <a class="nav-link text-success fw-bold active fw-semibold" href="#">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-success fw-bold" href="#">
            <i class="bi bi-calendar-check"></i> Appointments
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-success fw-bold" href="#">
            <i class="bi bi-people"></i> Patients
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-success fw-bold" href="../Component/Doc-profile.php">
            <i class="bi bi-person-badge"></i> Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="../auth/logout.php">
            <i class="bi bi-box-arrow-right"></i> Logout
          </a>
        </li>
      </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="col-md-10 p-4">

      <!-- STATS -->
      <div class="row g-3 mb-4">

        <div class="col-md-3">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <h6>Total Appointments</h6>
              <h3 class="fw-bold text-success"><?= $totalAppointments ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <h6>Today’s Appointments</h6>
              <h3 class="fw-bold text-primary"><?= $todayAppointments ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <h6>Total Patients</h6>
              <h3 class="fw-bold text-warning"><?= $totalPatients ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <h6>Rating</h6>
              <h3 class="fw-bold text-danger"><?= $rating ?> ★</h3>
            </div>
          </div>
        </div>

      </div>

      <!-- APPOINTMENTS -->
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Recent Appointments</h5>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if($appointmentsRes && mysqli_num_rows($appointmentsRes) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($appointmentsRes)): ?>
                  <tr>
                    <td><?= htmlspecialchars($row['patient_name']) ?></td>
                    <td><?= date('d M Y', strtotime($row['appointment_date'])) ?></td>
                    <td><?= htmlspecialchars($row['appointment_time']) ?></td>
                    <td>
                      <?php $status = $row['status'] ?? 'Pending'; ?>
                      <?php if($status === 'Confirmed'): ?>
                        <span class="badge bg-success">Confirmed</span>
                      <?php elseif($status === 'Completed'): ?>
                        <span class="badge bg-secondary">Completed</span>
                      <?php elseif($status === 'Cancelled'): ?>
                        <span class="badge bg-danger">Cancelled</span>
                      <?php else: ?>
                        <span class="badge bg-warning">Pending</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if(in_array($status, ['Pending','Confirmed'])): ?>
                        <?php if($status !== 'Confirmed'): ?>
                          <button class="btn btn-success btn-sm action-btn" data-id="<?= $row['id'] ?>" data-status="Confirmed">Confirm</button>
                        <?php endif; ?>
                        <?php if($status !== 'Completed'): ?>
                          <button class="btn btn-primary btn-sm action-btn" data-id="<?= $row['id'] ?>" data-status="Completed">Complete</button>
                        <?php endif; ?>
                        <button class="btn btn-danger btn-sm action-btn" data-id="<?= $row['id'] ?>" data-status="Cancelled">Cancel</button>
                      <?php else: ?>
                        <small class="text-muted">No actions</small>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr><td colspan="5" class="text-center text-muted">No recent appointments</td></tr>
              <?php endif; ?>
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</div>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(".action-btn").on("click", function(){

  let appointmentId = $(this).data("id");
  let newStatus     = $(this).data("status");

  if(!confirm("Are you sure?")) return;

  $.ajax({
    url: "../DB/doc-dash-db.php",
    type: "POST",
    data: {
      id: appointmentId,
      status: newStatus
    },
    success: function(res){
      if(res.trim() === "success"){
        alert("Appointment updated successfully");
        location.reload();
      }else{
        alert(res);
      }
    },
    error: function(){
      alert('Unable to update appointment.');
    }
  });

});
</script>
</body>
</html>