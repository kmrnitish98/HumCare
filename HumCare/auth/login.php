<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php
$meta_title = 'Login | HumCare';
$meta_description = 'Login to access your HumCare account to manage appointments and profile.';
include_once __DIR__ . '/../includes/seo.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>
body{
  background: linear-gradient(135deg,#E8F9F0,#F0FDF4);
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  font-family: "Segoe UI", sans-serif;
}

/* Main Card */
.auth-wrapper{
  width:100%;
  max-width:900px;
  background:#fff;
  border-radius:20px;
  overflow:hidden;
  box-shadow:0 25px 50px rgba(0,0,0,.12);
}

/* LEFT PANEL */
.auth-left{
  background: linear-gradient(135deg,#2FBF71,#4DA8DA);
  color:#fff;
  padding:60px 40px;
  position:relative;
}

.auth-left h2{
  font-weight:700;
}

.auth-left p{
  opacity:.95;
}

/* Decorative medical shapes */
.auth-left::after{
  content:'';
  position:absolute;
  bottom:-60px;
  right:-60px;
  width:220px;
  height:220px;
  background:rgba(255,255,255,.18);
  border-radius:50%;
}

/* RIGHT PANEL */
.auth-right{
  padding:50px 40px;
}

/* Inputs */
.form-control,
.form-select{
  border-radius:30px;
  padding:12px 18px;
  border:1px solid #d1fae5;
}

.form-control:focus,
.form-select:focus{
  border-color:#2FBF71;
  box-shadow:0 0 0 0.2rem rgba(47,191,113,.25);
}

/* Buttons */
.btn-main{
  background: linear-gradient(135deg,#2FBF71,#A3E635);
  border:none;
  color:#fff;
  border-radius:30px;
  padding:12px;
  font-weight:600;
}

.btn-main:hover{
  background: linear-gradient(135deg,#22c55e,#84cc16);
}

/* TOGGLE */
.auth-toggle{
  display:flex;
  border-radius:30px;
  border:1px solid #2FBF71;
  overflow:hidden;
  margin-bottom:20px;
}

.auth-tab{
  flex:1;
  text-align:center;
  padding:10px;
  cursor:pointer;
  font-weight:600;
  background:#E8F9F0;
  color:#1F2937;
  transition:.3s;
}

.auth-tab.active{
  background:#2FBF71;
  color:#fff;
}

/* FORM ANIMATION */
.auth-form{
  animation:fadeUp .4s ease;
}

@keyframes fadeUp{
  from{opacity:0; transform:translateY(12px);}
  to{opacity:1; transform:translateY(0);}
}
.auth-tab-main,
.auth-tab-sub{
  flex:1;
  text-align:center;
  padding:10px;
  cursor:pointer;
  font-weight:600;
  background:#E8F9F0;
  color:#1F2937;
  transition:.3s;
}

.auth-tab-main.active,
.auth-tab-sub.active{
  background:#2FBF71;
  color:#fff;
}
</style>
</head>

<body>

<div class="auth-wrapper row g-0">

  <!-- LEFT PANEL -->
  <div class="col-12 col-md-6 auth-left d-none d-md-block">
    <h2>Welcome to HumCare</h2>
    <p class="mt-3">
      Your trusted healthcare partner to find verified doctors,
      book appointments, and consult online with confidence.
    </p>

    <ul class="mt-4">
      <li>✔ Verified Doctors</li>
      <li>✔ Secure Appointments</li>
      <li>✔ Online & Offline Consultation</li>
    </ul>
  </div>

  <!-- RIGHT PANEL -->
  <div class="col-12 col-md-6 auth-right">

    <!-- Toggle -->
    <div class="auth-toggle mb-4">
        <div class="auth-tab-main active" data-target="loginBox">Login</div>
        <div class="auth-tab-main" data-target="registerBox">Register</div>
    </div>

    <!-- LOGIN FORM -->
    <div id="loginBox">

        <form id="loginForm" class="auth-form">

            <input type="email" name="email" class="form-control mb-3"
                placeholder="Enter Email Address" required>

            <input type="password" name="password" class="form-control mb-3"
                placeholder="Enter Password" required>

            <select name="role" class="form-select mb-3">
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="Admin">Admin</option>
            </select>

            <button class="btn btn-main w-100">Login</button>
            <div id="loginMsg" class="text-center mt-3"></div>

        </form>

    </div>

    <!-- REGISTER FORM -->
     <div id="registerBox" class="d-none">

        <!-- Patient / Doctor toggle -->
        <div class="auth-toggle mb-3">
            <div class="auth-tab-sub active" data-target="patientForm">👤 Patient</div>
            <div class="auth-tab-sub" data-target="doctorForm">👨‍⚕️ Doctor</div>
        </div>

        <p class="text-center text-muted mb-3" id="helperText">
            Are you a doctor? Click above 👆
        </p>

        <!-- Patient Form -->
        <form id="patientForm" class="auth-form">

            <input type="hidden" name="role" value="patient">

            <input type="text" name="name" class="form-control mb-2"
            placeholder="Full Name"
            pattern="^[A-Za-z ]{3,50}$"
            title="Name must contain only letters and spaces (min 3 characters)"
            required>

            <input type="email"
              name="email"
              class="form-control mb-2"
              placeholder="Email"
              title="Enter a valid email address"
              required>

            <input type="password" name="password" class="form-control mb-2"
            placeholder="Password"
            pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$"
            title="Min 8 chars, 1 uppercase, 1 lowercase, 1 number, 1 special character"
            required>

            <input type="password" name="cpassword" class="form-control mb-3"
            placeholder="Confirm Password"
            required>

            <button type="submit" class="btn btn-success w-100 rounded-pill">
            Register as Patient
            </button>
        </form>

        <!-- Doctor Form -->
        <form id="doctorForm" class="auth-form d-none">

            <input type="hidden" name="role" value="doctor">

            <input type="text" name="name" class="form-control mb-2"
            placeholder="Doctor Name"
            pattern="^[A-Za-z .]{3,50}$"
            title="Only letters, space and dot allowed"
            required>

            <input type="email"
              name="email"
              class="form-control mb-2"
              placeholder="Email"
              
              title="Enter a valid email address"
              required>

            <input type="password" name="password" class="form-control mb-2"
            pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$" placeholder="Enter Password"
            required>

            <input type="text" name="specialization" class="form-control mb-3"
            placeholder="Specialization"
            pattern="^[A-Za-z ]{3,50}$"
            title="Only letters allowed"
            required>

            <button type="submit" class="btn btn-success w-100 rounded-pill">
            Register as Doctor
            </button>

        </form>

    <div id="msg" class="text-center mt-3"></div>

    </div>
  </div>
</div>
<script>
$(".auth-tab-sub").on("click", function(){

  $(".auth-tab-sub").removeClass("active");
  $(this).addClass("active");

  const target = $(this).data("target");

  $("#patientForm, #doctorForm").addClass("d-none");
  $("#" + target).removeClass("d-none");

  $("#helperText").text(
    target === "doctorForm"
      ? "Are you a patient? Click above 👆"
      : "Are you a doctor? Click above 👆"
  );
});
$(".auth-tab-main").on("click", function(){

  $(".auth-tab-main").removeClass("active");
  $(this).addClass("active");

  const target = $(this).data("target");

  $("#loginBox, #registerBox").addClass("d-none");
  $("#" + target).removeClass("d-none");

});
$("#loginForm").on("submit", function(e){
  e.preventDefault();

  $.ajax({
    url: "../DB/login-db.php",
    type: "POST",
    data: $(this).serialize(),
    success:function(res){
      if(res === "success"){
        window.location.href = "../HumCare.php";
      }else{
        $("#loginMsg").html("<span class='text-danger'>"+res+"</span>");
      }
    }
  });
});
$("#patientForm, #doctorForm").on("submit", function(e){
  e.preventDefault();

  let form = $(this);
  let valid = true;
  $(".error").text("");

  // REGEX RULES
  const nameRegex  = /^[A-Za-z ]{3,50}$/;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  const passRegex  = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

  let name  = form.find("input[name='name']").val().trim();
  let email = form.find("input[name='email']").val().trim();
  let pass  = form.find("input[name='password']").val();
  let cpass = form.find("input[name='cpassword']").val();
  let spec  = form.find("input[name='specialization']").val();

  // Name
  if(!nameRegex.test(name)){
    form.find(".error:first").text("Invalid name format");
    valid = false;
  }

  // Email
  if(!emailRegex.test(email)){
    form.find(".error").eq(1).text("Invalid email address");
    valid = false;
  }

  // Password
  if(!passRegex.test(pass)){
    form.find(".error").eq(2).text(
      "Password must be strong (8+ chars, uppercase, lowercase, number & symbol)"
    );
    valid = false;
  }

  // Confirm password (patient)
  if(form.attr("id") === "patientForm"){
  if(pass !== cpass){
    alert("Passwords do not match");
    valid = false;
  }
}

  // Specialization (doctor)
  if(spec !== undefined && spec.trim() !== ""){
    if(!nameRegex.test(spec)){
      $("#dspecErr").text("Invalid specialization");
      valid = false;
    }
  }

  if(!valid) return;

  // AJAX SUBMIT
  $.ajax({
    url: "../DB/register-db.php",
    type: "POST",
    data: form.serialize(),
    success:function(res){
    console.log("Hello");
       alert(res);      // 👈 ADD THIS
  console.log(res);
      if(res === "success"){
            $("#msg").html("<span class='text-success'>Registration successful ✔</span>");

            setTimeout(() => {
                $(".auth-tab-main[data-target='loginBox']").click();
            }, 1200);
            
        form[0].reset();
      }else{
        $("#msg").html(
          "<span class='text-danger'>"+res+"</span>"
        );
      }
    }
  });
});
</script>

</body>
</html>