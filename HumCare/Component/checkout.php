<?php
session_start();

$plan = isset($_GET['plan']) ? htmlspecialchars($_GET['plan']) : 'Standard';
$price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : '299';


$doc_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$doc_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

// --- UPI QR Logic ---
$upi_id = "nitish-bob@ybl"; 
$upi_url = "upi://pay?pa=" . $upi_id . "&pn=HumCare&am=" . $price . "&cu=INR";
$qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($upi_url);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Checkout | HumCare';
    $meta_description = 'Complete your payment and confirm your booking on HumCare.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --primary: #2FBF71; }
        body { background: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .checkout-card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .qr-box { background: #fff; border: 2px dashed var(--primary); border-radius: 15px; padding: 15px; }
        .btn-confirm { background: var(--primary); color: white; padding: 12px; border-radius: 10px; border: none; width: 100%; font-weight: 600; }
        .btn-confirm:hover { background: #239d5d; transform: translateY(-2px); transition: 0.3s; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="text-center fw-bold mb-4">Complete Your Subscription</h2>
            
            <div class="row g-4">
                <div class="col-md-7">
                    <div class="card checkout-card p-4">
                        <h5 class="fw-bold mb-4 text-success"><i class="bi bi-patch-check"></i> Doctor Information</h5>
                        <form id="payForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Doctor Name</label>
                                    <input type="text" id="dName" class="form-control" value="Dr. <?= $doc_name ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Specialization</label>
                                    <input type="text" id="spec" class="form-control" placeholder="e.g. Cardiologist" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Experience (Years)</label>
                                    <input type="number" id="exp" class="form-control" placeholder="e.g. 10" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Consultation Fee (₹)</label>
                                    <input type="number" id="fee" class="form-control" placeholder="e.g. 500" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">City</label>
                                    <input type="text" id="city" class="form-control" placeholder="City" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Clinic Name</label>
                                    <input type="text" id="hName" class="form-control" placeholder="Enter Clinic Name" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Profile Image</label>
                                    <input type="file" id="clinicLogo" accept="image/*" class="form-control">
                                    <small class="text-muted">PNG/JPG/GIF — max 2MB</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Email Address</label>
                                    <input type="email" id="dEmail" class="form-control" value="<?= $doc_email ?>" required placeholder="Email Address">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Consultation Type</label>
                                <select id="cType" class="form-select">
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                    <option value="both">Both</option>
                                </select>
                            </div>
                        </form>
                        <div class="alert alert-success mt-2">
                            <strong>Selected:</strong> <?= $plan ?> Plan (₹<?= $price ?> / month)
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card checkout-card p-4 text-center">
                        <h5 class="fw-bold mb-3">Scan with UPI App</h5>
                        <div class="qr-box mb-3">
                            <!-- Log QR URL for debugging and provide a small SVG fallback on error -->
                            <script>console.log('QR URL:', '<?= $qr_code_url ?>');</script>
                            <img id="qrImg" src="<?= $qr_code_url ?>" alt="Payment QR" class="img-fluid" onerror="this.onerror=null; console.error('QR image failed to load:', this.src); this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'200\' height=\'200\'><rect width=\'100%\' height=\'100%\' fill=\'%23fff\' /><text x=\'50%\' y=\'50%\' font-size=\'14\' text-anchor=\'middle\' fill=\'%23999\' dy=\'.3em\'>QR Unavailable</text></svg>';">
                            <h4 class="mt-3 fw-bold text-dark">₹<?= $price ?></h4>
                        </div>
                        <button type="button" onclick="processPayment()" class="btn-confirm">
                            <i class="bi bi-printer me-2"></i> Confirm Payment & Print
                        </button>
                        <p class="small text-muted mt-3">Your dashboard will be upgraded instantly after printing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load jQuery (required for the inline AJAX below) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
// Detect whether server session indicates logged-in doctor
const isLoggedIn = <?= isset($_SESSION['user_id']) ? 'true' : 'false' ?>;
if (!isLoggedIn) {
    document.addEventListener('DOMContentLoaded', function(){
        var btn = document.querySelector('.btn-confirm');
        if (btn) {
            btn.disabled = true;
            btn.innerText = 'Login to Continue';
        }
        alert('You must be logged in as a doctor to complete this checkout. Please log in and try again.');
    });
}

$(document).ready(function() {
    window.processPayment = function() {
        let formData = new FormData();
        
        // Form inputs se value uthayein
        formData.append('name', $('#dName').val().replace('Dr. ', '')); // Prefix hatane ke liye
        formData.append('specialization', $('#spec').val());
        formData.append('experience', $('#exp').val());
        formData.append('fee', $('#fee').val()); // Consultation fee
        formData.append('city', $('#city').val());
        formData.append('clinic', $('#hName').val());
        formData.append('email', $('#dEmail').val());
        formData.append('consultation_type', $('#cType').val());
        
        // Subscription values
        formData.append('plan', '<?= $plan ?>');
        formData.append('amount', '<?= $price ?>'); // Subscription price

        // File handling
        let imageFile = $('#clinicLogo')[0].files[0];
        if (imageFile) {
            formData.append('image', imageFile);
        }

        // Button Loading State
        let btn = $('.btn-confirm');
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Processing...');

        $.ajax({
            url: '../DB/update_payment.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    if (response.invoice_url) window.open(response.invoice_url, '_blank');
                    alert("Profile Activated Successfully!");
                    window.location.href = '../DB/dashboard.php';
                } else {
                    alert("Error: " + response.message);
                    btn.prop('disabled', false).text('Confirm Payment & Print');
                }
            },
            error: function() {
                alert("Server Connection Error!");
                btn.prop('disabled', false).text('Confirm Payment & Print');
            }
        });
    };
});

</script>

</body>
</html>