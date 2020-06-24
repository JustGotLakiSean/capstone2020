<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
$off_list = $db->select_off_account();
session_start();
if(isset($_SESSION['err_oaep'])){
  echo $_SESSION['err_oaep'];
  if($_SESSION['err_oaep']){
    session_destroy();
  }
} else {
}

if(isset($_SESSION['err_log_oaep'])){
  echo "$_SESSION[err_log_oaep]";
  if($_SESSION['err_log_oaep']){
    session_destroy();
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
  <!-- <link rel="stylesheet" href="css/oep-login.css"> -->
  <?php include('css/oep-login.php'); ?>
  <title>Officers and EP Sign In</title>
</head>
<body>

  <header id="oep-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php">Home</a>
        </li>
      </ul>
    </nav>
  </header>

  <section id = "oep-signin-container">
    <div id = "oep-signin-label-container">
      <h1>Officers Sign In Form</h1>
    </div>
    <form action = "../../gateway/validateUser.php" method = "POST" id = "oep-signin-form">
      <div id = "oep-credentials-container">
        <input type="text" name = "txt_oep_username" id = "txt_oep_username" required placeholder="Username"/>
        <input type="password" name = "txt_oep_password" id = "txt_oep_password" required placeholder="Password" />
        <input type="submit" name = "btn_oepsubmit_login" id = "btn_oepsubmit_login" value="Login" />
      </div>
      <hr class="hr-or">
      <div id = "oep-signin-as-options">
        <label>Sign In As</label>
        <div class="oep-btn-option">
          <input type="button" name="btn-al-link" id="btn-al-link" onclick="window.location.href='../admin/adminSignInForm.php'" style="cursor: pointer;" value="Admin" />
          <input type="button" name="btn-ce-link" id="btn-ce-link" onclick="window.location.href='../civilian/civilian-login.php'" style="cursor: pointer;" value="Civilian Employee" />
        </div>
      </div>
      <hr>
      <div id = "oep-options">
        <!-- <a href = "adminForgotPassword.php" id = "oepforgotpasslink">Forgot Password</a> -->
        <a onclick="document.getElementById('officer_info_container').style.display='block'" id = "new_oep_acclink">Don't have an account?</a>
      </div>
    </form>
  </section>

  <section id="officer_info_container">
    <div id="officer_info_panel">
      <div id="officer_info_panel_title_box">
        <h3 id="officer_info_panel_title">Select Your Name</h3>
        <a id="newoffaccclose" align="center" onclick="document.getElementById('officer_info_container').style.display='none'">Close</a>
      </div>
      <div id="off_list_container" align="center">
        <div id="off_list_box">
          <div id="off_list" align="center">
          <?php
            while($res = $off_list->fetch_array(MYSQLI_ASSOC)){
              $officer_ID = $res['officer_ID'];
              $type_of_employee = $res['type_of_employee'];
              $officer_fName = $res['officer_fName'];
              $officer_lName = $res['officer_lName'];
              $officer_mName = $res['officer_mName'];
              $officer_headquarter = $res['officer_headquarter'];
              $officer_email = $res['officer_email'];
              $officer_contactNumber = $res['officer_contactNumber'];
              $officer_birthdate = $res['officer_birthdate'];
              $officer_address = $res['officer_address'];
              $officer_rank = $res['officer_rank'];
              $has_account = $res['has_account'];
              $downpayment_count = $res['downpayment_count'];
              $dp_5k_count = $res['dp_5k_count'];
              $dp_10k_count = $res['dp_10k_count'];
              $fullpayment_count = $res['fullpayment_count'];
              $fp_5k_count = $res['fp_5k_count'];
              $fp_10k_count = $res['fp_10k_count'];
              $penalty_count = $res['penalty_count'];
              $penalty_5k_count = $res['penalty_5k_count'];
              $penalty_10k_count = $res['penalty_10k_count'];
              $la_5k_count = $res['la_5k_count'];
              $la_10k_count = $res['la_10k_count'];

              $officer_fullname = "$officer_fName $officer_mName $officer_lName";

              echo '
              <form action="registerOfficersAndEPAccount.php" method="POST">
                <div id="off_info">
                  <input type="hidden" name="officer_ID" value="'.$officer_ID.'" />
                  <input type="hidden" name="type_of_employee" value="'.$type_of_employee.'" />
                  <input type="hidden" name="officer_fName" value="'.$officer_fName.'" />
                  <input type="hidden" name="officer_lName" value="'.$officer_lName.'" />
                  <input type="hidden" name="officer_mName" value="'.$officer_mName.'" />
                  <input type="hidden" name="officer_headquarter" value="'.$officer_headquarter.'" />
                  <input type="hidden" name="officer_email" value="'.$officer_email.'" />
                  <input type="hidden" name="officer_contactNumber" value="'.$officer_contactNumber.'" />
                  <input type="hidden" name="officer_birthdate" value="'.$officer_birthdate.'" />
                  <input type="hidden" name="officer_address" value="'.$officer_address.'" />
                  <input type="hidden" name="officer_rank" value="'.$officer_rank.'" />
                  <input type="hidden" name="has_account" value="'.$has_account.'" />
                  <input type="hidden" name="downpayment_count" value="'.$downpayment_count.'" />
                  <input type="hidden" name="dp_5k_count" value="'.$dp_5k_count.'" />
                  <input type="hidden" name="dp_10k_count" value="'.$dp_10k_count.'" />
                  <input type="hidden" name="fullpayment_count" value="'.$fullpayment_count.'" />
                  <input type="hidden" name="fp_5k_count" value="'.$fp_5k_count.'" />
                  <input type="hidden" name="fp_10k_count" value="'.$fp_10k_count.'" />
                  <input type="hidden" name="penalty_count" value="'.$penalty_count.'" />
                  <input type="hidden" name="penalty_5k_count" value="'.$penalty_5k_count.'" />
                  <input type="hidden" name="penalty_10k_count" value="'.$penalty_10k_count.'" />
                  <input type="hidden" name="la_5k_count" value="'.$la_5k_count.'" />
                  <input type="hidden" name="la_10k_count" value="'.$la_10k_count.'" />
                  <input type="text" disabled name="officer_fullname" class="off_fullname" value="'.$officer_fullname.'" />
                  <input type="submit" name="btn_reg_off_info" class="btn_reg_off_info" value="Select" />
                </div>
              </form>';
            }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>