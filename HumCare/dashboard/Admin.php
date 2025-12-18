<?php
require_once __DIR__ . '/../auth/admin-auth.php';
require_once __DIR__ . '/../includes/db.php';

/* Stats */
$doctors = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE role='doctor'"))[0];
$patients = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE role='patient'"))[0];
$appointments = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM appointments"))[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$meta_title = 'Admin Dashboard | HumCare';
$meta_description = 'Administrative dashboard to manage the HumCare platform.';
include_once __DIR__ . '/../includes/seo.php';
?>

<meta name="description" content="Admin dashboard to manage doctors, patients and appointments on HumCare">
<meta name="robots" content="noindex, nofollow">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-success px-4">
  <span class="navbar-brand fw-bold">HumCare Admin</span>
  <a href="../auth/logout.php" class="btn btn-light btn-sm">Logout</a>
</nav>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-2 bg-white vh-100 p-3 shadow-sm">
      <ul class="nav flex-column gap-2">
        <li class="nav-item"><a class="nav-link fw-semibold active" href="#"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="manage-doctors.php"><i class="bi bi-person-check"></i> Doctors</a></li>
        <li class="nav-item"><a class="nav-link" href="manage-patients.php"><i class="bi bi-people"></i> Patients</a></li>
        <li class="nav-item"><a class="nav-link" href="manage-appointments.php"><i class="bi bi-calendar-check"></i> Appointments</a></li>
      </ul>
    </div>

    <!-- MAIN -->
    <div class="col-md-10 p-4">

      <!-- STATS -->
      <div class="row g-3 mb-4">
        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body">
              <h6>Total Doctors</h6>
              <h3 class="fw-bold text-success"><?= $doctors ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body">
              <h6>Total Patients</h6>
              <h3 class="fw-bold text-primary"><?= $patients ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body">
              <h6>Total Appointments</h6>
              <h3 class="fw-bold text-warning"><?= $appointments ?></h3>
            </div>
          </div>
        </div>
      </div>

      <!-- PENDING DOCTORS -->
      <div class="card">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Pending Doctor Approvals</h5>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Specialization</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php
            $res = mysqli_query($conn,"SELECT * FROM users WHERE role='doctor' AND status='Pending'");
            while($row=mysqli_fetch_assoc($res)){
            ?>
              <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['specialization'] ?></td>
                <td>
                  <a href="approve-doctor.php?id=<?= $row['id'] ?>&status=Approved" class="btn btn-success btn-sm">Approve</a>
                  <a href="approve-doctor.php?id=<?= $row['id'] ?>&status=Rejected" class="btn btn-danger btn-sm">Reject</a>
                </td>
              </tr>
            <?php } ?>

            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>