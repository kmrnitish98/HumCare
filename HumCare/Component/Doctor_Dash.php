<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $meta_title = 'Doctor Dashboard | HumCare – Manage Appointments & Patients';
  $meta_description = 'Manage appointments, patients and schedules in the HumCare doctor dashboard.';
  include_once __DIR__ . '/../includes/seo.php';
  ?>

<meta name="description" content="Doctor dashboard on HumCare to manage appointments, view patients, update availability, and grow your medical practice online.">
<meta name="keywords" content="doctor dashboard, manage appointments, online healthcare platform">
<meta name="robots" content="index, follow">

<!-- Open Graph -->
<meta property="og:title" content="Doctor Dashboard | HumCare">
<meta property="og:description" content="Manage appointments, patients, and availability on HumCare doctor dashboard.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://humcare.com/doctor/dashboard">
<meta property="og:image" content="https://humcare.com/assets/og-doctor-dashboard.jpg">

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- TOP NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold text-success" href="#">
      <i class="bi bi-h-circle"></i> HumCare
    </a>

    <div class="ms-auto d-flex align-items-center gap-3">
      <span class="fw-semibold">Dr. Ankit Sharma</span>
      <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-2 bg-white vh-100 shadow-sm p-3">
      <ul class="nav flex-column gap-2">
        <li class="nav-item">
          <a class="nav-link active fw-semibold" href="#">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-calendar-check"></i> Appointments
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-people"></i> Patients
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-person-badge"></i> Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php">
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
              <h3 class="fw-bold text-success">124</h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h6>Today’s Appointments</h6>
              <h3 class="fw-bold text-primary">8</h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h6>Total Patients</h6>
              <h3 class="fw-bold text-warning">86</h3>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h6>Rating</h6>
              <h3 class="fw-bold text-danger">4.8 ★</h3>
            </div>
          </div>
        </div>
      </div>

      <!-- APPOINTMENTS TABLE -->
      <div class="card">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Recent Appointments</h5>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Rahul Kumar</td>
                <td>2025-02-10</td>
                <td>10:30 AM</td>
                <td><span class="badge bg-success">Confirmed</span></td>
              </tr>
              <tr>
                <td>Neha Singh</td>
                <td>2025-02-10</td>
                <td>12:00 PM</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>