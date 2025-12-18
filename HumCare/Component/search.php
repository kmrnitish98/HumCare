<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results - Doctors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .results-container { margin-top: 40px; }
    </style>
</head>
<body>
<?php include_once "../Foot-HEAD/header.php" ?>
<div class="container results-container">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Search Results for: <span id="keywordLabel" class="text-primary">...</span></h2>
            <a href="../HumCare.php" class="btn btn-link p-0">← Back to Search</a>
        </div>
    </div>

    <div class="row" id="doctorResults">
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status"></div>
            <p>Finding the best doctors for you...</p>
        </div>
    </div>
</div>
<?php include_once "../Foot-HEAD/footer.php" ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // 1. Get the keyword from the URL (e.g., ?query=Cardiologist)
    const urlParams = new URLSearchParams(window.location.search);
    const query = urlParams.get('query');

    if(query) {
        $('#keywordLabel').text(query);

        // 2. AJAX call to PHP
        $.ajax({
            url: '../DB/search-db.php',
            method: 'POST',
            data: { keyword: query },
            success: function(data) {
                $('#doctorResults').html(data);
            },
            error: function() {
                $('#doctorResults').html("<p class='text-danger'>Error loading data.</p>");
            }
        });
    } else {
        window.location.href = "../HumCare.php"; // Redirect back if no query
    }
});
</script>

</body>
</html>