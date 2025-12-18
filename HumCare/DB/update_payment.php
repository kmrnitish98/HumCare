<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "humcare"); 

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection Failed']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $doctor_id = $_SESSION['user_id'];
    
    // 1. Capture All Form Fields
    $payer_name       = $conn->real_escape_string($_POST['name'] ?? '');
    $payer_email      = $conn->real_escape_string($_POST['email'] ?? '');
    $specialization   = $conn->real_escape_string($_POST['specialization'] ?? '');
    $experience       = (int)($_POST['experience'] ?? 0);
    $city             = $conn->real_escape_string($_POST['city'] ?? '');
    $clinic           = $conn->real_escape_string($_POST['clinic'] ?? '');
    $fee              = (int)($_POST['fee'] ?? 0);
    $consultation_type= $conn->real_escape_string($_POST['consultation_type'] ?? 'both');
    $plan             = $conn->real_escape_string($_POST['plan'] ?? 'Standard');
    $amount           = (float)($_POST['amount'] ?? 0.00);

    // Transaction Start
    $conn->begin_transaction();
    try {
        // 2. Handle Profile Image Upload (First, to get path)
        $logoPath = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../public/uploads/doctors';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'doc_' . $doctor_id . '_' . time() . '.' . $ext;
            $dest = $uploadDir . '/' . $filename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
                $logoPath = '/HumCare/public/uploads/doctors/' . $filename;
            }
        }

        // 3. Update Doctors Table (Saare fields ek sath)
        // Note: Agar image upload nahi hui, to purani image hi rehne denge
        $imgQuery = $logoPath ? ", image = '$logoPath'" : "";

        $sql = "UPDATE doctors SET 
                name = ?, 
                specialization = ?, 
                experience = ?, 
                city = ?, 
                clinic = ?, 
                fee = ?, 
                consultation_type = ?, 
                subscription_plan = ?, 
                payment_status = 'Paid',
                rating = 4.5,
                availability = 'today' 
                $imgQuery
                WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        // Types: s=string, i=int. (s, s, i, s, s, i, s, s, i)
        $stmt->bind_param('ssississi', 
            $payer_name, $specialization, $experience, $city, 
            $clinic, $fee, $consultation_type, $plan, $doctor_id
        );
        
        if (!$stmt->execute()) throw new Exception("Profile Update Failed");
        $stmt->close();

        // 4. Create Invoice Entry
        $createTable = "CREATE TABLE IF NOT EXISTS invoices (
            id INT AUTO_INCREMENT PRIMARY KEY,
            invoice_number VARCHAR(50) NOT NULL,
            doctor_id INT NOT NULL,
            name VARCHAR(255),
            email VARCHAR(255),
            clinic VARCHAR(255),
            plan VARCHAR(100),
            amount DECIMAL(10,2),
            logo VARCHAR(255),
            payment_status VARCHAR(50),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        $conn->query($createTable);

        $invNum = 'INV-' . mt_rand(10000, 99999);
        $ins = $conn->prepare("INSERT INTO invoices (invoice_number, doctor_id, name, email, clinic, plan, amount, logo, payment_status) VALUES (?,?,?,?,?,?,?,?,?)");
        $status = 'Paid';
        $ins->bind_param('sissssdss', $invNum, $doctor_id, $payer_name, $payer_email, $clinic, $plan, $amount, $logoPath, $status);
        $ins->execute();
        $invoice_id = $ins->insert_id;

        $conn->commit();

        $invoice_url = '/HumCare/Component/invoice.php?id=' . $invoice_id;
        echo json_encode(['status' => 'success', 'invoice_url' => $invoice_url]);

    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
$conn->close();
?>