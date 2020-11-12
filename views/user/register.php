<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="assets/css/simplebar.css">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="assets/css/feather.css">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="assets/css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="assets/css/app-light.css" id="lightTheme" disabled>
  <link rel="stylesheet" href="assets/css/app-dark.css" id="darkTheme">
  <style>
    .valid{
      color: green;
    }
  </style>
</head>

<body class="dark ">
  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <form class="col-lg-6 col-md-8 col-10 mx-auto" method="POST" id="myForm" action="account.php?action=toRegister" onsubmit="submitForm(event)">
        <div class="mx-auto text-center my-4">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
          </a>
          <h2 class="my-3">Register</h2>
        </div>
        <div class="form-group">
          <label for="inputEmail4">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <hr class="my-4">
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="inputPassword5">New Password</label>
              <input type="password" class="form-control" id="psw" name="password">
            </div>
            <div class="form-group">
              <label for="inputPassword6">Confirm Password</label>
              <input type="password" class="form-control"  id="cf-psw" name="confirm-password">
            </div>

          </div>
          <div class="col-md-6">
            <p class="mb-2">Password requirements</p>
            <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
            <ul class="small text-muted pl-4 mb-0">
              <li id="length" class="invalid"> Minimum 8 character </li>
              <li id="capital" class="invalid">At least one special character</li>
              <li id="number" class="invalid">At least one number</li>
              <li id="confirm">Confirm password must be similar to password</li>
            </ul>
          </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block"  type="submit" >Sign up</button>
        <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
      </form>
    </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/simplebar.min.js"></script>
  <script src='assets/js/daterangepicker.js'></script>
  <script src='assets/js/jquery.stickOnScroll.js'></script>
  <script src="assets/js/tinycolor-min.js"></script>
  <script src="assets/js/config.js"></script>
  <script src="assets/js/apps.js"></script>
  <script>
    var myInput = document.getElementById("psw");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var confirm = document.getElementById("confirm");
    var cfpsw = document.getElementById("cf-psw");
    var flag = false;
    
    cfpsw.onkeyup = function() {
      if (myInput.value == cfpsw.value) {
        confirm.classList.remove("invalid");
        confirm.classList.add("valid");
        flag = true;
      } else {
        confirm.classList.remove("valid");
        confirm.classList.add("invalid");
        flag = false;
      }
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
        flag = true;
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
        flag = false;
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
        flag = true;
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
        flag = false;
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        flag = false;
      }
    }
    function submitForm(event) {
      var upperCaseLetters = /[A-Z]/g;
      var numbers = /[0-9]/g;
      if (myInput.value == cfpsw.value && myInput.value.match(upperCaseLetters) && myInput.value.match(numbers) && myInput.value.length >= 8) {
         
      }
      else{
          event.preventDefault();
          console.log('error');
      }
    }
  </script>
</body>

</html>
</body>

</html>