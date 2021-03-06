<?php
session_start();
if (isset($_SESSION['err'])) {
  echo "$_SESSION[err]";
  if ($_SESSION['err']) {
    session_destroy();
  }
} else {
}

// if(isset($_SESSION['retain_firstname'])){
//   echo '<script>
//   document.getElementById("txt_admin_firstname").value = '.$_SESSION['retain_firstname'].';
//   </script>';

//   echo "$_SESSION[retain_firstname]";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/registeradmin-style.php" type="text/css"> -->
  <title>Admin Registration</title>
  <?php
  require_once "css/registeradmin-style.php";
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
  </script>
</head>
<script type="text/javascript">
  function validateRegister() {
    var isValid = true;

    var fName = document.getElementById('txt_admin_firstname').value;
    var mName = document.getElementById('txt_admin_middlename').value;
    var lName = document.getElementById('txt_admin_lastname').value;
    var email = document.getElementById('txt_admin_email').value;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    var Username = document.getElementById("txt_admin_username").value;
    var Password = document.getElementById("txt_admin_password").value;
    var ConfirmPassword = document.getElementById("txt_admin_confirmPassword").value;

    if (fName == "") {
      isValid = false;
    }

    if (mName == "") {

      isValid = false;
    }

    if (lName == "") {

      isValid = false;
    }

    if (email == "") {

      isValid = false;
    } else if (!emailRegex.test(email)) {
      document.getElementById('email_error').innerHTML = 'Invalid Email.';
      isValid = false;
    }

    if (Username == "") {

      isValid = false;
    }

    if (Password == "") {

      isValid = false;
    }

    if (ConfirmPassword == "") {

      isValid = false;
    }

    if (Password != ConfirmPassword) {
      document.getElementById('cpassword_error').innerHTML = 'Password Does Not Match.';
      isValid = false;
    }

    return isValid;
  }
</script>

<body style="background-color: rgb(242, 242, 242);">
  <header id="raa-header">
    <nav>
      <ul>
        <li>
          <a href="adminSignInForm.php">Back</a>
        </li>
      </ul>
    </nav>
  </header>
  <section id="register-admin-container">
    <h4>Create New Admin Account</h4>
    <div id="register-admin-credentials-container">
      <form action="../../gateway/validateUser.php" method="POST" id="admin_register_form" onsubmit="return validateRegister()">
        <div id="register-admin-personaldetails">
          <div class="raaform-header">
            <label style="top: 4px;">Personal Details</label>
          </div>
          <?php
          if (isset($_SESSION['retain_firstname']) && isset($_SESSION['retain_middlename']) && isset($_SESSION['retain_lastname']) && isset($_SESSION['retain_email']) && isset($_SESSION['retain_username'])) {
            echo '<div class="raaform-input-inner">
              <input type="text" pattern="[a-zA-Z]+[a-zA-Z ]+" minlength="2" maxlength="26" name = "txt_admin_firstname" id = "txt_admin_firstname" required placeholder = "Firstname" class="input-inner" value="'.$_SESSION['retain_firstname'].'"/><span class="error-field" id="fname_error"></span>
              <input type="text" pattern="[a-zA-Z]+[a-zA-Z ]+" minlength="2" maxlength="26" name = "txt_admin_middlename" id = "txt_admin_middlename" required placeholder = "Middle Name" class="input-inner" value="'.$_SESSION['retain_middlename'].'"/><span class="error-field" id="mname_error"></span>
              <input type="text" pattern="[a-zA-Z]+[a-zA-Z ]+" minlength="2" maxlength="26" name = "txt_admin_lastname" id = "txt_admin_lastname" required placeholder = "Lastname" class="input-inner" value="'.$_SESSION['retain_lastname'].'"/><span class="error-field" id="lname_error"></span>
              <input type="email" name = "txt_admin_email" id = "txt_admin_email" required placeholder = "Email" class="input-inner" value="'.$_SESSION['retain_email'].'"/><span class="error-field" id="email_error"></span>
            </div>
          </div>
          <hr>
          <div id = "register-admin-accountdetails">
            <div class="raaform-header">
              <label for="txt_admin_username">Account Details</label>
            </div>
            <div class="raaform-input-inner">
              <input type="text" pattern="[a-zA-Z]+[a-zA-Z0-9_]+" minlength="5" maxlength="15" name = "txt_admin_username" id = "txt_admin_username" required placeholder = "Username" value="'.$_SESSION['retain_username'].'"/><span class="error-field" id="uname_error"></span>
              <input type="password" pattern="^[a-zA-Z0-9@#&_]+" minlength="8" maxlength="32" name = "txt_admin_password" id = "txt_admin_password" required placeholder="Password"/><span class="error-field" id="password_error"></span>
              <input type="password" pattern="^[a-zA-Z0-9@#&_]+" minlength="8" maxlength="32" name = "txt_admin_confirmPassword" id = "txt_admin_confirmPassword" required placeholder="Confirm Password"/><span class="error-field" id="cpassword_error"></span>
            </div>
          </div>
          <div id = "register-action">
            <input type="submit" name = "btn-submit-new-admin" id = "btn-submit-new-admin" value="Submit" />
            <!-- <input type="button" name = "btn-clear" id = "btn-clear" value="Clear" /> -->
          </div>';
          } else {
            echo '<div class="raaform-input-inner">
            <input type="text" pattern="[a-zA-Z]+[a-zA-Z ]+" minlength="2" maxlength="26" name = "txt_admin_firstname" id = "txt_admin_firstname" required placeholder = "Firstname" class="input-inner"/><span class="error-field" id="fname_error"></span>
            <input type="text" pattern="[a-zA-Z]+[a-zA-Z ]+" minlength="2" maxlength="26" name = "txt_admin_middlename" id = "txt_admin_middlename" required placeholder = "Middle Name" class="input-inner"/><span class="error-field" id="mname_error"></span>
            <input type="text" pattern="[a-zA-Z]+[a-zA-Z ]+" minlength="2" maxlength="26" name = "txt_admin_lastname" id = "txt_admin_lastname" required placeholder = "Lastname" class="input-inner"/><span class="error-field" id="lname_error"></span>
            <input type="email" name = "txt_admin_email" id = "txt_admin_email" required placeholder = "Email" class="input-inner"/><span class="error-field" id="email_error"></span>
          </div>
        </div>
        <hr>
        <div id = "register-admin-accountdetails">
          <div class="raaform-header">
            <label for="txt_admin_username">Account Details</label>
          </div>
          <div class="raaform-input-inner">
            <input type="text" pattern="[a-zA-Z]+[a-zA-Z0-9_]+" minlength="5" maxlength="15" name = "txt_admin_username" id = "txt_admin_username" required placeholder = "Username" /><span class="error-field" id="uname_error"></span>
            <input type="password" pattern="^[a-zA-Z0-9@#&_]+" minlength="8" maxlength="32" name = "txt_admin_password" id = "txt_admin_password" required placeholder="Password"/><span class="error-field" id="password_error"></span>
            <input type="password" pattern="^[a-zA-Z0-9@#&_]+" minlength="8" maxlength="32" name = "txt_admin_confirmPassword" id = "txt_admin_confirmPassword" required placeholder="Confirm Password"/><span class="error-field" id="cpassword_error"></span>
          </div>
        </div>
        <div id = "register-action">
          <input type="submit" name = "btn-submit-new-admin" id = "btn-submit-new-admin" value="Submit" />
          <!-- <input type="button" name = "btn-clear" id = "btn-clear" value="Clear" /> -->
        </div>';
          }
          ?>
          <p>* Double check your inputted data before saving it</p>
      </form>
    </div>
  </section>
</body>

</html>