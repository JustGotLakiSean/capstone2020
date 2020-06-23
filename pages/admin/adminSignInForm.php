<?php

namespace loan950;

use \loan950\db_access;
use mysqli;

include('../../dbaccess/db_access.php');
$db = new db_access();

if (isset($_POST["btn_submit_login"])) {
  if (isset($_POST['txt_admin_username']) && isset($_POST['txt_admin_password'])) {

    // $checkRates = $db->check_rates();

    // if ($checkRates) {
    //   $ro = mysqli_num_rows($checkRates);
    //   if ($ro > 1) {
    // printf($ro);
    require_once("../../dbaccess/db_access.php");
    $dbaccess = new db_access();

    // Data from login form
    $USERNAME = filter_var($_POST['txt_admin_username'], FILTER_SANITIZE_STRING);
    $PASSWORD = filter_var($_POST['txt_admin_password'], FILTER_SANITIZE_STRING);
    $hashed_password = md5($PASSWORD);
    $login_user = $dbaccess->login_admin($USERNAME, $PASSWORD);

    // Data from Database
    $UNAME = '';
    $PASS = '';
    $ID = '';
    $FNAME = '';

    // while ($row = $login_user->fetch(PDO::FETCH_ASSOC)) {
    while ($row = $login_user->fetch_assoc()) {
      $ID = $row['admin_ID'];
      $UNAME = $row['admin_username'];
      $PASS = $row['admin_password'];
      $FNAME = $row['admin_firstname'];
    }


    if ($USERNAME === $UNAME && $hashed_password === $PASS) {
      $checkRates = $db->check_rates();
      if ($checkRates) {
        $ro = mysqli_num_rows($checkRates);
        if ($ro > 1) {
          printf($ro);
          session_start();
          $_SESSION['admin_username'] = $UNAME;
          $_SESSION['admin_id'] = $ID;
          $_SESSION['fname'] = $FNAME;
          header('location: ../loanmonitoring/adminOverview.php');
        } else {
          echo <<<SCRIPT
        <div id="setup_lr_container">
          <form action="" method="POST" id="setup_lr_inner">

            <div id="setup_header">
              <div id="setup_title">
                <p class="s_title">SETUP LOAN RATES</p>
              </div>
              <div id="setup_btn_cancel">
                <button type="button" id="setup_btn_close" onclick="document.getElementById('setup_lr_container').style.display='none'">CANCEL</button>
              </div>
            </div>

            <div id="setup_loan_rates_frm">

              <div id="first_box">
                <h2>5K rates</h2>
                <hr>
                <div id="rates5k_box">
                  <div class="inner_5k">
                    <label>Loan amount</label>
                    <input type="hidden" name="typeOfLoan_5k" value="5k" />
                    <input type="number" name="la_5k_rates" required />
                  </div>
                  <div class="inner_5k">
                    <label>Monthly payment</label>
                    <input type="number" name="mp_5k_rates" required />
                  </div>
                  <div class="inner_5k">
                    <label>Credit rate</label>
                    <input type="number" name="cr_5k_rates" required />
                  </div>
                  <div class="inner_5k">
                    <label>Balance</label>
                    <input type="number" name="bal_5k_rates" required />
                  </div>
                  <div class="inner_5k">
                    <label for="int_5k_rates">Interest</label>
                    <input type="number" name="int_5k_rates" id="int_5k_rates" required />
                  </div>
                  <div class="inner_5k">
                    <label>Penalty %</label>
                    <input type="number" name="pp_5k_rates" required step="0.001" />
                  </div>
                  <div class="inner_5k">
                    <label>Penalty per month</label>
                    <input type="number" name="pm_5k_rates" required />
                  </div>
                </div>
              </div>

              <div id="second_box">
                <h2>10K rates</h2>
                <hr>
                <div id="rates10k_box">
                  <div class="inner_10k">
                    <label>Loan amount</label>
                    <input type="hidden" name="typeOfLoan_10k" value="10k" />
                    <input type="number" name="la_10k_rates" required />
                  </div>
                  <div class="inner_10k">
                    <label>Monthly payment</label>
                    <input type="number" name="mp_10k_rates" required />
                  </div>
                  <div class="inner_10k">
                    <label>Credit rate</label>
                    <input type="number" name="cr_10k_rates" required />
                  </div>
                  <div class="inner_10k">
                    <label>Balance</label>
                    <input type="number" name="bal_10k_rates" required />
                  </div>
                  <div class="inner_10k">
                    <label>Interest</label>
                    <input type="number" name="int_10k_rates" required />
                  </div>
                  <div class="inner_10k">
                    <label>Penalty %</label>
                    <input type="number" name="pp_10k_rates" required step="0.001" />
                  </div>
                  <div class="inner_10k">
                    <label>Penalty per month</label>
                    <input type="number" name="pm_10k_rates" required />
                  </div>
                </div>
              </div>
            </div>
            <div id="btn_save_rate" align="center">
              <input type="submit" name="add_rates" id="add_rates" value="SAVE" />
            </div>
          </form>
        </div>
SCRIPT;
        }
      } else {
      }
    } else {
      echo '<script>
      alert("Wrong credentials. Try again.")
      </script>';
      // header('location: ../admin/adminSignInForm.php');
    }
  } else {
  }
} else {
}

// SETUP LOAN RATES UPON THE FIRST LOGIN MADE //
if (isset($_POST['add_rates'])) {
  // 5k
  $type_of_loan_5k = '';
  $la_5k_rates = '';
  $mp_5k_rates = '';
  $cr_5k_rates = '';
  $bal_5k_rates = '';
  $int_5k_rates = '';
  $pp_5k_rates = '';
  $pm_5k_rates = '';

  // 10k
  $type_of_loan_10k = '';
  $la_10k_rates = '';
  $mp_10k_rates = '';
  $cr_10k_rates = '';
  $bal_10k_rates = '';
  $int_10k_rates = '';
  $pp_10k_rates = '';
  $pm_10k_rates = '';

  $connectToDb = '';

  if (
    isset($_POST['typeOfLoan_5k']) && isset($_POST['la_5k_rates']) && isset($_POST['mp_5k_rates']) && isset($_POST['cr_5k_rates']) && isset($_POST['bal_5k_rates']) && isset($_POST['int_5k_rates']) && isset($_POST['pp_5k_rates']) && isset($_POST['pm_5k_rates'])
    && isset($_POST['typeOfLoan_10k']) && isset($_POST['la_10k_rates']) && isset($_POST['mp_10k_rates']) && isset($_POST['cr_10k_rates']) && isset($_POST['bal_10k_rates']) && isset($_POST['int_10k_rates']) && isset($_POST['pp_10k_rates']) && isset($_POST['pm_10k_rates'])
  ) {
    $connectToDb = $db->getConnection();

    $type_of_loan_5k = mysqli_real_escape_string($connectToDb, $_POST['typeOfLoan_5k']);
    $la_5k_rates = mysqli_real_escape_string($connectToDb, $_POST['la_5k_rates']);
    $mp_5k_rates = mysqli_real_escape_string($connectToDb, $_POST['mp_5k_rates']);
    $cr_5k_rates = mysqli_real_escape_string($connectToDb, $_POST['cr_5k_rates']);
    $bal_5k_rates = mysqli_real_escape_string($connectToDb, $_POST['bal_5k_rates']);
    $int_5k_rates = mysqli_real_escape_string($connectToDb, $_POST['int_5k_rates']);
    $pp_5k_rates = mysqli_real_escape_string($connectToDb, $_POST['pp_5k_rates']);
    $pm_5k_rates = mysqli_real_escape_string($connectToDb, $_POST['pm_5k_rates']);

    $type_of_loan_10k = mysqli_real_escape_string($connectToDb, $_POST['typeOfLoan_10k']);
    $la_10k_rates = mysqli_real_escape_string($connectToDb, $_POST['la_10k_rates']);
    $mp_10k_rates = mysqli_real_escape_string($connectToDb, $_POST['mp_10k_rates']);
    $cr_10k_rates = mysqli_real_escape_string($connectToDb, $_POST['cr_10k_rates']);
    $bal_10k_rates = mysqli_real_escape_string($connectToDb, $_POST['bal_10k_rates']);
    $int_10k_rates = mysqli_real_escape_string($connectToDb, $_POST['int_10k_rates']);
    $pp_10k_rates = mysqli_real_escape_string($connectToDb, $_POST['pp_10k_rates']);
    $pm_10k_rates = mysqli_real_escape_string($connectToDb, $_POST['pm_10k_rates']);

    $insert_rates_5k = $db->add_5k_rates($type_of_loan_5k, $la_5k_rates, $mp_5k_rates, $cr_5k_rates, $bal_5k_rates, $int_5k_rates, $pp_5k_rates, $pm_5k_rates);
    $insert_rates_10k = $db->add_10k_rates($type_of_loan_10k, $la_10k_rates, $mp_10k_rates, $cr_10k_rates, $bal_10k_rates, $int_10k_rates, $pp_10k_rates, $pm_10k_rates);

    if ($insert_rates_5k) {
      if ($insert_rates_10k) {
        header('location: adminSignInForm.php');
      } else {
        printf("%s\n", $connectToDb->error);
      }
    } else {
      printf("%s\n", $connectToDb->error);
    }

    // echo "$type_of_loan_5k";
    // echo "$la_5k_rates";
    // echo "$mp_5k_rates";
    // echo "$cr_5k_rates";
    // echo "$bal_5k_rates";
    // echo "$int_5k_rates";
    // echo "$pp_5k_rates";
    // echo "$pm_5k_rates";

    // // 10k
    // echo "$type_of_loan_10k";
    // echo "$la_10k_rates";
    // echo "$mp_10k_rates";
    // echo "$cr_10k_rates";
    // echo "$bal_10k_rates";
    // echo "$int_10k_rates";
    // echo "$pp_10k_rates";
    // echo "$pm_10k_rates";

  } else {
  }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/adminsigninform-styles.css"> -->
  <?php include('css/adminsigninform-styles.php'); ?>
  <title>Admin Sign In</title>
</head>
<script type="text/javascript">
  function validateLogin() {
    var valid = true;

    var username = document.getElementById('txt_admin_username').value;
    var password = document.getElementById('txt_admin_password').value;

    // var username_error = document.getElementById('username_error');
    // var password_error = document.getElementById('password_error');

    if (username == "") {
      document.getElementById('username_error').innerHTML = '*';
      valid = false;
    }

    if (password == "") {
      document.getElementById('password_error').innerHTML = '*';
      valid = false;
    }

    return valid;
  }
</script>

<body>

  <header id="asf-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php">Home</a>
        </li>
      </ul>
    </nav>
  </header>

  <!-- setup loan rates form -->
  

  <section id="admin-signin-container">
    <!-- <form action = "../../gateway/validateUser.php" method = "POST" id = "admin-signin-form" onsubmit="return validateLogin()"> -->
    <form action="" method="POST" id="admin-signin-form" onsubmit="return validateLogin()">
      <div class="asf-section-header">
        <h1>Admin Sign in Form</h1>
      </div>
      <hr>
      <div id="asf-inputbox">
        <input type="text" name="txt_admin_username" id="txt_admin_username" required placeholder="Enter Username" /><span id="username_error"></span>
        <input type="password" name="txt_admin_password" id="txt_admin_password" required placeholder="Enter Password" /><span id="password_error"></span>
        <input type="submit" name="btn_submit_login" id="btn_submit_login" value="Sign In" />
      </div>
      <hr class="hr-or">
      <div id="admin-signin-as-options">
        <label>Sign In As</label>
        <div id="asf-btn-option">
          <button type="button" class="btn-ce" onclick="window.location.href='../civilian/civilian-login.php'" style="cursor: pointer;">Civilian Employee</button>
          <button type="button" class="btn-oaep" onclick="window.location.href='../officersandep/officer-ep-login.php'" style="cursor: pointer;">Officers and EP</button>
        </div>
      </div>
      <hr>
      <div id="admin-options">
        <!-- <a href = "adminForgotPassword.php">Forgot Password</a> -->
        <a href="registerAdminAccount.php">Create New Account</a>
      </div>
    </form>
  </section>
</body>

</html>