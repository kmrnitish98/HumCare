<?php
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient'){
    header("Location: ../auth/login.php");
    exit;
}

require_once __DIR__ . '/../includes/db.php';

$user_id = $_SESSION['user_id'];

/* Stats for dashboard */
$totalAppointments = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM appointments WHERE patient_id='$user_id'"))[0];
$completedAppointments = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM appointments WHERE patient_id='$user_id' AND status='Completed'"))[0];
$upcomingAppointments = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM appointments WHERE patient_id='$user_id' AND status!='Cancelled' AND status!='Completed' AND appointment_date >= CURDATE()"))[0];

/* Fetch appointment list */
$appointments = mysqli_query($conn,
    "SELECT a.*, d.name AS doctor_name FROM appointments a JOIN doctors d ON d.id = a.doctor_id WHERE a.patient_id='$user_id' ORDER BY appointment_date DESC, appointment_time DESC"
);

// also retrieve raw rows for debug display when needed
$rawAppointments = mysqli_query($conn, "SELECT * FROM appointments WHERE patient_id='$user_id' ORDER BY appointment_date DESC, appointment_time DESC");

/* Booked alert */
$showBooked = isset($_GET['booked']) && $_GET['booked']==1;
$insert_id = isset($_GET['insert_id']) ? (int)$_GET['insert_id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$meta_title = 'Patient Dashboard | HumCare';
$meta_description = 'Patient dashboard to manage appointments, history and settings.';
include_once __DIR__ . '/../includes/seo.php';
?>

<meta name="description" content="Patient dashboard on HumCare to manage appointments, view doctors, and track healthcare records.">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<style>
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
<nav class="navbar bg-success-subtle shadow-sm px-4">
  <a href="../HumCare.php" class="navbar-brand fw-bold text-success fs-3">
    <i class="bi bi-h-circle"></i> HumCare<i class="bi bi-activity text-danger"></i>
</a>

  <div class="ms-auto d-flex gap-3 align-items-center">
    <span class="fw-bold fs-5">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmnMLevA4qC1IEaUUNrVF9dhr7x0BfAhjrtQ&s" class="rounded-pill" width="30px" height="30px" alt=""></i> <?= $_SESSION['user_name']; ?>
    </span>
    <a href="../auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-2 bg-white vh-100 shadow-sm p-3">
      <ul class="nav flex-column gap-2">
        <li class="nav-item">
          <a class="nav-link text-success fw-bold active fw-semibold">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success fw-bold" href="#">
            <i class="bi bi-calendar-check"></i> My Appointments
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success fw-bold" href="../Component/Doctors.php">
            <i class="bi bi-search"></i> Find Doctors
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success fw-bold" href="#">
            <i class="bi bi-person"></i> Profile
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
          <div class="card text-center">
            <div class="card-body">
              <h6>Total Appointments</h6>
              <h3 class="fw-bold text-success"><?= $totalAppointments ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h6>Upcoming</h6>
              <h3 class="fw-bold text-primary"><?= $upcomingAppointments ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h6>Completed</h6>
              <h3 class="fw-bold text-warning"><?= $completedAppointments ?></h3>
            </div>
          </div>
        </div>
      </div>

      <!-- APPOINTMENTS TABLE -->
      <div class="card">
        <div class="card-body">

          <h5 class="fw-bold mb-3">My Appointments</h5>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>

              <?php if($showBooked): ?>
              <tr>
                <td colspan="5">
                  <div class="alert alert-success mb-3">Appointment booked successfully. <?php if($insert_id) echo "(id: " . $insert_id . ")"; ?></div>
                </td>
              </tr>
              <?php endif; ?>

              <?php if(isset($_GET['debug']) && $_GET['debug']==1): ?>
              <tr>
                <td colspan="5">
                  <pre><?php print_r(mysqli_fetch_all($rawAppointments, MYSQLI_ASSOC)); ?></pre>
                </td>
              </tr>
              <?php endif; ?>

              <?php while($row = mysqli_fetch_assoc($appointments)): ?>
              <?php
                $status = $row['status'] ?? 'Pending';
                $map = ['Pending'=>'warning','Confirmed'=>'primary','Completed'=>'success','Cancelled'=>'danger'];
                $class = $map[$status] ?? 'secondary';
              ?>
              <tr data-id="<?= $row['id'] ?>" data-status="<?= htmlspecialchars($status) ?>">
                <td><?= htmlspecialchars($row['doctor_name']) ?></td>
                <td><?= date('d M Y', strtotime($row['appointment_date'])) ?></td>
                <td><?= htmlspecialchars($row['appointment_time']) ?></td>
                <td>
                  <span class="badge bg-<?= $class ?>"><?= htmlspecialchars($status) ?></span>
                </td>
                <td>
                  <?php if(in_array($status, ['Pending','Confirmed']) && $row['appointment_date'] >= date('Y-m-d')): ?>
                    <button class="btn btn-danger btn-sm cancel-btn">Cancel</button>
                  <?php else: ?>
                    <button class="btn btn-secondary btn-sm" disabled>No Action</button>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endwhile; ?>

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
<!-- ACTION LOGIC -->
<script>
$(document).ready(function(){

  $("tr[data-status]").each(function(){

    let status = $(this).data("status");

    if(status === "Completed" || status === "Cancelled"){
      $(this).find(".cancel-btn")
        .prop("disabled", true)
        .addClass("opacity-50")
        .css("cursor", "not-allowed");
    }

  });

  // Cancel Appointment
  $(".cancel-btn").click(function(){

    if(!confirm("Are you sure you want to cancel this appointment?")){
      return;
    }

    let row = $(this).closest('tr');
    let id = row.data('id');

    $.post('../DB/patient-appointment-action.php', { id: id, action: 'cancel' }, function(resp){
      if(resp && resp.status === 'success'){
        // refresh to update counts and status
        location.reload();
      } else {
        alert(resp.message || 'Failed to cancel');
      }
    }, 'json');

  });

});
</script>

</body>
</html>