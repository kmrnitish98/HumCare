<?php
$conn = new mysqli("localhost", "root", "", "humcare");

if(isset($_POST['keyword'])) {
    $search = $conn->real_escape_string($_POST['keyword']);
    
    // Search across Name, Specialization, Clinic, and City
    $sql = "SELECT * FROM doctors 
            WHERE name LIKE '%$search%' 
            OR specialization LIKE '%$search%' 
            OR clinic LIKE '%$search%' 
            OR city LIKE '%$search%'";
            
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Doctor Image" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2"><?php echo $row['specialization']; ?></span>
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="text-muted mb-1 small"><i class="bi bi-hospital"></i> <?php echo $row['clinic']; ?> (<?php echo $row['city']; ?>)</p>
                        <p class="mb-1"><strong>Exp:</strong> <?php echo $row['experience']; ?> Years</p>
                        <p class="mb-0 text-success fw-bold">Fee: ₹<?php echo $row['fee']; ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0 d-grid">
                        <button class="btn btn-outline-primary btn-sm">Book Appointment</button>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<div class='col-12'><div class='alert alert-info'>No doctors found matching '$search'.</div></div>";
    }
}
?>