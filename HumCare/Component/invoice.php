<?php
session_start();
$conn = new mysqli("localhost", "root", "", "humcare");
if ($conn->connect_error) die('DB Connection error');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$id) { echo 'Invalid invoice ID'; exit; }

// Using JOIN if you have a separate doctors table, otherwise select from invoices
$stmt = $conn->prepare("SELECT * FROM invoices WHERE id = ? LIMIT 1");
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$invoice = $res->fetch_assoc();
$stmt->close();

if (!$invoice) { echo 'Invoice not found'; exit; }

// Auth Check
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $invoice['doctor_id']) {
    echo 'Unauthorized access.'; exit;
}

// Safe variables to avoid PHP notices for missing fields
$invoiceAmount = $invoice['amount'] ?? $invoice['fee'] ?? 0.00;
$invoiceNumber = htmlspecialchars($invoice['invoice_number'] ?? '');
$invoiceName = htmlspecialchars($invoice['name'] ?? '');
$invoiceClinic = htmlspecialchars($invoice['clinic'] ?? '');
$invoiceEmail = htmlspecialchars($invoice['email'] ?? '');
$invoicePlan = htmlspecialchars($invoice['plan'] ?? '');
$paymentMethod = htmlspecialchars($invoice['payment_method'] ?? '');
$paymentStatus = strtoupper(htmlspecialchars($invoice['payment_status'] ?? ''));
$invoiceDate = date('d M, Y', strtotime($invoice['created_at'] ?? date('Y-m-d H:i:s')));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice_<?= $invoice['invoice_number'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --primary: #2FBF71; --dark: #1e293b; }
        body { background-color: #f1f5f9; font-family: 'Inter', sans-serif; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        
        .invoice-wrapper {
            max-width: 850px;
            margin: 40px auto;
            background: #fff;
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            overflow: hidden;
            position: relative;
        }

        /* Diagonal "PAID" Watermark */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 120px;
            font-weight: 900;
            color: rgba(47, 191, 113, 0.08);
            z-index: 0;
            pointer-events: none;
            text-transform: uppercase;
        }

        .invoice-header { background: var(--dark); color: white; padding: 40px; }
        .invoice-body { padding: 40px; position: relative; z-index: 1; }
        
        .brand-logo { font-size: 28px; font-weight: 800; color: var(--primary); display: flex; align-items: center; gap: 8px; }
        .invoice-label { text-transform: uppercase; letter-spacing: 2px; font-weight: 700; color: #94a3b8; font-size: 12px; }
        
        .table thead { background: #f8fafc; border-bottom: 2px solid #e2e8f0; }
        .table th { text-transform: uppercase; font-size: 11px; letter-spacing: 1px; padding: 15px; }
        .table td { padding: 15px; vertical-align: middle; }

        .summary-box { background: #f8fafc; border-radius: 8px; padding: 20px; }
        .status-badge {
            background: #dcfce7; color: #15803d;
            padding: 6px 16px; border-radius: 50px;
            font-size: 12px; font-weight: 700; display: inline-block;
        }

        @media print {
            body { background: white; padding: 0; }
            .invoice-wrapper { margin: 0; box-shadow: none; max-width: 100%; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>

<div class="invoice-wrapper">
    <div class="watermark">PAID</div>

    <div class="invoice-header d-flex justify-content-between align-items-center">
        <div>
            <div class="brand-logo"><i class="bi bi-h-circle-fill"></i> HumCare</div>
            <p class="mb-0 text-white-50">Empowering Modern Healthcare</p>
        </div>
        <div class="text-end">
            <h2 class="mb-0 fw-bold">INVOICE</h2>
            <p class="mb-0 text-white-50">#<?= $invoiceNumber ?></p>
        </div>
    </div>

    <div class="invoice-body">
        <div class="row mb-5">
            <div class="col-6">
                <div class="invoice-label mb-2">Billed To:</div>
                <h5 class="fw-bold mb-1">Dr. <?= $invoiceName ?></h5>
                <p class="text-muted mb-0"><?= $invoiceClinic ?></p>
                <p class="text-muted mb-0"><?= $invoiceEmail ?></p>
            </div>
            <div class="col-6 text-end">
                <div class="invoice-label mb-2">Invoice Details:</div>
                <p class="mb-1"><strong>Date:</strong> <?= $invoiceDate ?></p>
                <p class="mb-1"><strong>Method:</strong> <?= $paymentMethod ?></p>
                <div class="status-badge mt-2">
                    <i class="bi bi-check-circle-fill me-1"></i> STATUS: <?= $paymentStatus ?>
                </div>
            </div>
        </div>

        <table class="table mb-4">
            <thead>
                <tr>
                    <th>Item Description</th>
                    <th class="text-center">Duration</th>
                    <th class="text-end">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h6 class="fw-bold mb-1">HumCare Subscription Upgrade</h6>
                        <span class="text-muted small">Plan: <?= $invoicePlan ?></span>
                    </td>
                    <td class="text-center">1 Month</td>
                    <td class="text-end fw-bold">₹<?= number_format($invoiceAmount, 2) ?></td>
                </tr>
            </tbody>
        </table>

        <div class="row justify-content-end">
            <div class="col-md-5">
                <div class="summary-box">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal:</span>
                        <span>₹<?= number_format($invoiceAmount, 2) ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Taxes (0%):</span>
                        <span>₹0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Total Paid:</span>
                        <span class="fs-4 fw-bold text-success">₹<?= number_format($invoiceAmount, 2) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 pt-4 border-top">
            <div class="row align-items-center">
                <div class="col-8">
                    <p class="small text-muted mb-0"><strong>Note:</strong> This is a digital receipt for your subscription. Access to premium features like "Priority Search" and "Verified Badge" is now active on your dashboard.</p>
                </div>
                <div class="col-4 text-end">
                    <p class="fw-bold mb-0" style="color: var(--primary);">HumCare Support Team</p>
                    <small class="text-muted">support@humcare.com</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center pb-5 no-print">
    <button class="btn btn-dark rounded-pill px-4 me-2" onclick="window.print()">
        <i class="bi bi-printer me-2"></i> Print Invoice
    </button>
    <a href="../DB/dashboard.php" class="btn btn-outline-secondary rounded-pill px-4">
        Go to Dashboard
    </a>
</div>

<script>
    window.onload = function() {
        // Uncomment the line below to auto-trigger print on load
        // window.print();
    }
</script>
</body>
</html>