<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $meta_title = 'Careers | Join the HumCare Team';
    $meta_description = 'Explore career opportunities and join HumCare to make healthcare accessible.';
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2FBF71;
            --soft-green: #e9fff4;
            --dark: #1f2937;
        }

        .career-hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            color: white;
            text-align: center;
        }

        .benefit-card {
            border: none;
            border-radius: 15px;
            padding: 30px;
            background: var(--soft-green);
            transition: 0.3s;
            height: 100%;
        }

        .benefit-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
            display: block;
        }

        .job-card {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            transition: 0.3s;
            background: white;
        }

        .job-card:hover {
            border-color: var(--primary);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .badge-type {
            background: #eef2ff;
            color: #4f46e5;
            font-weight: 600;
        }
    </style>
</head>
<body>
<?php include_once "../Foot-HEAD/header.php" ?>
<section class="career-hero">
    <div class="container">
        <h1 class="display-3 fw-bold">Build the Future of Healthcare</h1>
        <p class="lead fs-4">Join HumCare and help us make quality healthcare accessible to millions.</p>
        <a href="#open-roles" class="btn btn-success btn-lg px-5 rounded-pill mt-3">View Openings</a>
    </div>
</section>

<section class="py-5 mt-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="fw-bold mb-4">Why Work at <span class="text-success">HumCare?</span></h2>
                <p class="text-muted fs-5">HumCare is more than just a healthcare platform; it's a mission. We are looking for dreamers, doers, and innovators who want to solve real-world problems in medical accessibility.</p>
                <div class="row g-4 mt-2">
                    <div class="col-6">
                        <h5 class="fw-bold"><i class="bi bi-rocket-takeoff text-success me-2"></i> Fast Growth</h5>
                        <p class="small text-muted">Grow your career in a fast-paced health-tech environment.</p>
                    </div>
                    <div class="col-6">
                        <h5 class="fw-bold"><i class="bi bi-heart-pulse text-success me-2"></i> Impactful Work</h5>
                        <p class="small text-muted">Your code or strategy directly helps patients get better care.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&q=80" class="img-fluid rounded-4 shadow" alt="Our Team">
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Benefits & Perks</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="benefit-card">
                    <i class="bi bi-laptop"></i>
                    <h4>Remote Friendly</h4>
                    <p class="text-muted">Work from anywhere or join us in our vibrant offices. Flexibility is key.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-card">
                    <i class="bi bi-shield-plus"></i>
                    <h4>Health Insurance</h4>
                    <p class="text-muted">Top-tier health coverage for you and your family members.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-card">
                    <i class="bi bi-lightbulb"></i>
                    <h4>Learning Budget</h4>
                    <p class="text-muted">Annual budget for courses, conferences, and skill development.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="open-roles">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Current Openings</h2>
            <p class="text-muted">Find a role that matches your passion.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="job-card d-md-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-1">Frontend Developer (React.js)</h5>
                        <p class="text-muted mb-0"><i class="bi bi-geo-alt"></i> Remote / Delhi • <span class="badge badge-type">Full-time</span></p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <button class="btn btn-outline-success rounded-pill px-4">Apply Now</button>
                    </div>
                </div>

                <div class="job-card d-md-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-1">Healthcare Relationship Manager</h5>
                        <p class="text-muted mb-0"><i class="bi bi-geo-alt"></i> Mumbai • <span class="badge badge-type">On-site</span></p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <button class="btn btn-outline-success rounded-pill px-4">Apply Now</button>
                    </div>
                </div>

                <div class="job-card d-md-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-1">UI/UX Designer</h5>
                        <p class="text-muted mb-0"><i class="bi bi-geo-alt"></i> Bangalore • <span class="badge badge-type">Hybrid</span></p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <button class="btn btn-outline-success rounded-pill px-4">Apply Now</button>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="text-center mt-5">
            <p class="text-muted">Don't see a fit? Send your CV to <strong>careers@humcare.com</strong></p>
        </div>
    </div>
</section>
<?php include_once "../Foot-HEAD/footer.php"  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>