<?php
require_once __DIR__ . '/../includes/db.php';

$sql = "SELECT * FROM doctors WHERE 1=1";

/* Location */
if (!empty($_GET['city'])) {
    $city = mysqli_real_escape_string($conn, $_GET['city']);
    $sql .= " AND city='$city'";
}

/* Specialization */
if (!empty($_GET['specialization'])) {
    $spec = mysqli_real_escape_string($conn, $_GET['specialization']);
    $sql .= " AND specialization='$spec'";
}

/* Experience */
if (!empty($_GET['experience'])) {
    $exp = (int) $_GET['experience'];
    if (!empty($_GET['experience'])) {
    $exp = (int) $_GET['experience'];

    if ($exp == 5) {
        $sql .= " AND experience BETWEEN 0 AND 5";
    } elseif ($exp == 10) {
        $sql .= " AND experience BETWEEN 5 AND 10";
    } elseif ($exp == 15) {
        $sql .= " AND experience >= 10";
    }
}
}

/* Rating */
if (!empty($_GET['rating'])) {
    $rating = (float) $_GET['rating'];
    $sql .= " AND rating >= $rating";
}

/* Consultation Fee */
if (!empty($_GET['fee'])) {
    $fee = (int) $_GET['fee'];
    $sql .= " AND fee <= $fee";
}

/* Availability */
if (!empty($_GET['availability'])) {
    $availability = mysqli_real_escape_string($conn, $_GET['availability']);
    $sql .= " AND availability='$availability'";
}

/* Consultation Type (Online / Offline) */
if (!empty($_GET['consultation_type'])) {

    $types = $_GET['consultation_type']; // array
    $safeTypes = [];

    foreach ($types as $type) {
        $safeTypes[] = "'" . mysqli_real_escape_string($conn, $type) . "'";
    }

    $typeList = implode(",", $safeTypes);

    /* both = doctor supports both modes */
    $sql .= " AND (consultation_type IN ($typeList) OR consultation_type='both')";
}

/*sorting*/
if (!empty($_GET['sort'])) {

    switch ($_GET['sort']) {

        case 'rating':
            $sql .= " ORDER BY rating DESC";
            break;

        case 'availability':
            // today doctors first
            $sql .= " ORDER BY 
                      CASE WHEN availability='today' THEN 1 ELSE 2 END";
            break;

        case 'nearby':
            // simple nearby logic (same city first)
            if (!empty($_GET['city'])) {
                $city = mysqli_real_escape_string($conn, $_GET['city']);
                $sql .= " ORDER BY 
                          CASE WHEN city='$city' THEN 1 ELSE 2 END";
            } else {
                $sql .= " ORDER BY id DESC";
            }
            break;

        default:
            $sql .= " ORDER BY id DESC"; // relevance
    }

} else {
    $sql .= " ORDER BY id DESC"; // default relevance
}
/* Execute */
$result = mysqli_query($conn, $sql);

/* No result */
if (mysqli_num_rows($result) == 0) {
    echo "<p class='text-center text-danger fw-semibold'>
            No doctors found for selected filters
          </p>";
    exit;
}

/* Output doctor cards */
while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="card mb-3 doctor-result-card">
  <div class="card-body d-flex gap-3">

    <img src="<?php echo $row['image']; ?>"
     class="doctor-thumb"
     onerror="this.src='https://via.placeholder.com/90'">

    <div class="flex-grow-1">
      <h6 class="fw-bold"><?php echo $row['name']; ?></h6>
      <p class="text-muted mb-1">
        <?php echo $row['specialization']; ?> • 
        <?php echo $row['experience']; ?>+ Years
      </p>

      <p class="mb-1">⭐ <?php echo $row['rating']; ?> Rating</p>
      <p class="mb-1">
        <i class="bi bi-hospital"></i> <?php echo $row['clinic']; ?>
      </p>
      <p class="mb-0">
        <strong>₹<?php echo $row['fee']; ?></strong> Consultation Fee
      </p>
    </div>

    <div class="text-end">
        <span class="badge bg-<?php echo ($row['availability']=='today')?'success':'secondary'; ?>">
          <?php echo ucfirst($row['availability']); ?>
        </span>

      <a href="Doc-profile.php?id=<?php echo $row['id']; ?>"
         class="btn btn-outline-success btn-sm mb-2">
        View Profile
      </a><br>

      <a href="../Component/appointment.php?doctor_id=<?php echo $row['id']; ?>"
         class="btn btn-success btn-sm">
        Book Appointment
      </a>
    </div>

  </div>
</div>
<?php } ?>