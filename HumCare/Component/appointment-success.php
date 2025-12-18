<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Appointment Booked | HumCare';
    $meta_description = 'Your appointment is confirmed — details and next steps.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <section class="py-5">
        <div class="container text-center">
            <h3 class="text-success fw-bold">Appointment Booked Successfully 🎉</h3>
            <p class="mt-3">
            Your appointment request has been sent to the doctor.
            </p>

            <a href="./Doctors.php" class="btn btn-outline-success rounded-pill mt-3">
            Book Another Appointment
            </a>
        </div>
    </section>
</body>
</html>