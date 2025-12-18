<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$base = '/HumCare';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // Allow per-page overrides for SEO meta variables before including defaults
    $meta_title = $meta_title ?? 'HumCare - Healthcare';
    $meta_description = $meta_description ?? null;
    $meta_keywords = $meta_keywords ?? null;
    $meta_image = $meta_image ?? null;
    $meta_type = $meta_type ?? null;
    $meta_robots = $meta_robots ?? null;
    $meta_url = $meta_url ?? null;
    include_once __DIR__ . '/../includes/seo.php';
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <style>
        :root{
    --main-nav-height: 70px;
    --sub-nav-height: 55px;
      }
      :root{
          --primary: #2FBF71;
          --secondary: #4DA8DA;
      }
       nav{
        background-color:rgba(163, 253, 211, 0.6);
       }
        /* Navbar Styling */
        .navbar-brand{
            font-size: 26px;
            font-weight: bold;
            color: var(--primary) !important;
        }

        /* Search bar */
        .search-box{
            width: 300px;
        }
        /* Specific header search to enforce width across pages */
        .search-box.header-search{
            width: 300px;
            max-width: 100%;
        }

        /* Hero Section */
        
        /* Buttons */
        .btn-main{
            background: var(--primary);
            color: #fff;
        }
        .btn-main:hover{
            background: #036131ff;
            color: #fff;
        }

        /* Fixed Sub-Nav */
        .fixed-sub-nav {
            /* margin-top:8px; */
            position: fixed;
            top: var(--main-nav-height);
            left: 0;
            width: 100%;
            height: var(--sub-nav-height);
            background: #f8fffc;
            z-index: 998;
            border-bottom: 1px solid #e5f3ec;
        }

        /* Slider Specific CSS - IMPORTANT */
        .health-slider {
            display: flex; 
            overflow: hidden;
            align-items: center;
            height: 100%;
        }

        .health-link {
            display: inline-block;
            padding: 12px 20px;
            font-weight: 600;
            color: #444;
            text-decoration: none;
            transition: 0.3s;
            border-bottom: 3px solid transparent;
            white-space: nowrap;
        }

        .health-link i { color: var(--primary); margin-right: 8px; font-size: 18px; }
        .health-link:hover { color: var(--primary); background: #eafff4; border-bottom: 3px solid var(--primary); }

        /* Slick Default Overrides */
        .slick-track { display: flex !important; align-items: center; }
        .slick-slide { height: inherit !important; }

        body { padding-top: calc(var(--main-nav-height) + var(--sub-nav-height)); }
        /* Ensure dropdowns are positioned above fixed elements */
        .dropdown-menu { position: absolute; z-index: 1050; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light  shadow-sm fixed-top">
  <div class="container-fluid px-4">

    <!-- Brand -->
    <a class="navbar-brand fw-bold fs-4" href="../HumCare.php">
      <i class="bi bi-h-circle"></i> HumCare
      <i class="bi bi-activity text-danger"></i>
    </a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desktop Search (ONLY desktop) -->
    <div class="d-none d-lg-block mx-auto">
      <input type="text" class="form-control rounded-pill search-box header-search"
       placeholder="Search doctor, symptom, clinic...">
    </div>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- LOGIN (TOP on mobile) -->
      <div class="d-lg-none mb-3">
        <a class="btn btn-main w-100 rounded-pill" href="../auth/login.php">Login</a>
      </div>

      <!-- NAV LINKS -->
      <ul class="navbar-nav mx-lg-auto gap-lg-3">
        <!-- <li class="nav-item"><a class="nav-link" href="#">Home</a></li> -->
        <li class="nav-item fw-bold"><a class="nav-link" href="../Component/Doctors.php"><i class="bi bi-search"></i> Find Doctor</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="../Component/appointment.php"><i class="bi bi-bookmark-plus-fill"></i> Book Appointment</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="../Component/Health-Article.php"><i class="bi bi-heart-pulse-fill"></i> Health Articles</a></li>
        <li class="nav-item fw-bold"><a class="nav-link" href="../Component/ContactUs.php"><i class="bi bi-telephone-fill"></i> Contact Us</a></li>
      </ul>

      <!-- Bell (desktop only) -->
      <div class="d-none d-lg-flex align-items-center ms-3">

      <?php if(isset($_SESSION['user_id'])): ?>

        <!-- Logged in -->
        <div class="dropdown">
          <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button"
            data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i>
            <?= htmlspecialchars($_SESSION['user_name']) ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li>
              <a class="dropdown-item" href="../DB/dashboard.php">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger" href="../auth/logout.php">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
              </a>
            </li>
          </ul>
        </div>

      <?php else: ?>

        <!-- Not logged in -->
        <a class="btn btn-success rounded-pill px-4" href="../auth/login.php">Login</a>

      <?php endif; ?>

      </div>

      <!-- Mobile Search (BOTTOM) -->
      <div class="d-lg-none mt-3">
        <input type="text" class="form-control rounded-pill"
         placeholder="Search doctor, symptom, clinic...">
      </div>

    </div>
  </div>
</nav>

<div class="sub-nav fixed-sub-nav shadow-sm">
  <div class="container-fluid px-4 h-100">
    <div id="healthSlider" class="health-slider">
      <a href="<?= $base ?>/Sub-Cate/Fever.php" class="health-link"><i class="bi bi-thermometer-half"></i> Fever</a>
      <a href="<?= $base ?>/Sub-Cate/Skin.php" class="health-link"><i class="bi bi-droplet"></i> Skin</a>
      <a href="<?= $base ?>/Sub-Cate/Hair.php" class="health-link"><i class="bi bi-scissors"></i> Hair</a>
      <a href="<?= $base ?>/Sub-Cate/Dental.php" class="health-link"><i class="bi bi-tooth"></i> Dental</a>
      <a href="<?= $base ?>/Sub-Cate/Heart.php" class="health-link"><i class="bi bi-heart-pulse"></i> Heart</a>
      <a href="<?= $base ?>/Sub-Cate/Eye.php" class="health-link"><i class="bi bi-eye"></i> Eye</a>
      <a href="<?= $base ?>/Sub-Cate/Mental.php" class="health-link"><i class="bi bi-emoji-smile"></i> Mental</a>
      <a href="<?= $base ?>/Sub-Cate/Diabetes.php" class="health-link"><i class="bi bi-activity"></i> Diabetes</a>
      <a href="<?= $base ?>/Sub-Cate/WomenCare.php" class="health-link"><i class="bi bi-person-heart"></i> Women Care</a>
      <a href="<?= $base ?>/Sub-Cate/ChildCare.php" class="health-link"><i class="bi bi-person-arms-up"></i> Child Care</a>
      
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
$(document).ready(function(){
  $('#healthSlider').slick({
    infinite: true,
    slidesToShow: 9,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    pauseOnHover: true,
    arrows: false,
    dots: false,
       
    responsive: [
      {
        breakpoint: 1024,
        settings: { slidesToShow: 4 }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2 }
      }
    ]
  });

  // Improved dropdown toggle: robust, accessible, and avoids clipping issues
  $('.nav-link.dropdown-toggle').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $link = $(this);
    var $dropdown = $link.closest('.dropdown');
    var $menu = $dropdown.find('.dropdown-menu').first();

    // Close other open dropdowns
    $('.dropdown-menu.show').not($menu).removeClass('show').closest('.dropdown').find('.nav-link.dropdown-toggle').attr('aria-expanded','false');

    var isOpen = $menu.hasClass('show');
    if (isOpen) {
      $menu.removeClass('show');
      $link.attr('aria-expanded','false');
      $menu.css({top: '', left: '', position: ''});
    } else {
      $menu.addClass('show');
      $link.attr('aria-expanded','true');

      // Position menu absolutely to avoid being clipped by fixed parents
      try {
        var offset = $link.offset();
        var top = offset.top + $link.outerHeight();
        $menu.css({position: 'absolute', top: top + 'px', left: offset.left + 'px'});
      } catch (err) {
        // ignore positioning errors
        console.warn('Dropdown positioning failed', err);
      }
    }
  });

  // Close dropdowns when clicking outside
  $(document).on('click', function(e){
    if(!$(e.target).closest('.dropdown').length){
      $('.dropdown-menu.show').removeClass('show').closest('.dropdown').find('.nav-link.dropdown-toggle').attr('aria-expanded','false');
    }
  });

  // Close on Escape key
  $(document).on('keydown', function(e){
    if (e.key === 'Escape') {
      $('.dropdown-menu.show').removeClass('show').closest('.dropdown').find('.nav-link.dropdown-toggle').attr('aria-expanded','false');
    }
  });

});
</script>

</body>
</html>