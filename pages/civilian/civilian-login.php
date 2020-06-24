<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
$civ_list = $db->select_civ_account();
$lr5k = $db->loan_rates_5K();
$lr10k = $db->loan_rates_10K();

session_start();
if(isset($_SESSION['err_civ'])){
  echo "$_SESSION[err_civ]";
  if($_SESSION['err_civ']){
    session_destroy();
  }
}

if(isset($_SESSION['err_civ_reg'])){
  echo "$_SESSION[err_civ_reg]";
  if($_SESSION['err_civ_reg']){
    session_destroy();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/civilian-login.css" />
  <?php include("css/civilian-login-style.php"); ?>
  <title>Civilian Sign In</title>
</head>
<body>
  <script src="src/validate_ce_account.js"></script>

  <header id="cl-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php">Home</a>
        </li>
      </ul>
    </nav>
  </header>

  <section id = "civilian-signin-container">
    <div id = "civilian-signin-label-container">
      <h1>Civilian Sign In Form</h1>
    </div>
    <form action = "../../gateway/validateUser.php" method = "POST" id = "civilian-signin-form" onsubmit="return validate_ce_login()">
      <div id = "civilian-credentials-container">
        <input type="text" name = "civ_username" id = "civ_username" required placeholder="Username"/>
        <input type="password" name = "civ_password" id = "civ_password" required placeholder="Password"/>
        <input type="submit" name="btn-cl-submit" id="btn-cl-submit" value="Log In" />
      </div>
      <hr class="hr-or">
      <div id = "civ-signin-as-options">
        <label>Sign In As</label>
        <div id="cl-btn-option">
          <input type="button" name="btn-al-link" id="btn-al-link" onclick="window.location.href='../admin/adminSignInForm.php'" style="cursor: pointer;" value="Admin" />
          <input type="button" name="btn-oaep-link" id="btn-oaep-link" onclick="window.location.href='../officersandep/officer-ep-login.php'" style="cursor: pointer;" value="Officers And EP" />
        </div>
      </div>
      <hr>
      <div id = "civilian-options">
        <a id = "newcivacclink" onclick="document.getElementById('civilian_info_container').style.display='block'">Don't have an account?</a>
      </div>
    </form>
  </section>
  <section id="civilian_info_container">
    <div id="civilian_info_panel">
      <div id="civilian_info_panel_title_box">
        <h3 id="civilian_info_panel_title">Select Your Name</h3>
        <a id = "newcivaccclose" align="center" onclick="document.getElementById('civilian_info_container').style.display='none'">Cancel</a>
      </div>
      <div id="civ_list_container" align="center">
        <div id="civ_list_box">
          <div id="civ_list" align="center">
          <?php
            while($res = $civ_list->fetch_array(MYSQLI_ASSOC)){
              $civilian_ID = $res['civilian_ID'];
              $type_of_employee = $res['type_of_employee'];
              $civilian_fName = $res['civilian_fName'];
              $civilian_mName = $res['civilian_mName'];
              $civilian_lName = $res['civilian_lName'];
              $civilian_email = $res['civilian_email'];
              $civilian_contactNumber = $res['civilian_contactNumber'];
              $civilian_birthdate = $res['civilian_birthdate'];
              $civilian_address = $res['civilian_address'];
              $civilian_office = $res['civilian_office'];
              $civilian_rank = $res['civilian_rank'];
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

              $civilian_fullname = "$civilian_fName $civilian_mName $civilian_lName";

              echo '
              <form action = "registerCivilianEmployeeAccount.php" method="POST">
                <div id="civ_info">
                  <input type="hidden" name="civilian_ID" value="'.$civilian_ID.'" />
                  <input type="hidden" name="type_of_employee" value="'.$type_of_employee.'" />
                  <input type="hidden" name="civilian_fName" value="'.$civilian_fName.'" />
                  <input type="hidden" name="civilian_mName" value="'.$civilian_mName.'" />
                  <input type="hidden" name="civilian_lName" value="'.$civilian_lName.'" />
                  <input type="hidden" name="civilian_email" value="'.$civilian_email.'" />
                  <input type="hidden" name="civilian_contactNumber" value="'.$civilian_contactNumber.'" />
                  <input type="hidden" name="civilian_birthdate" value="'.$civilian_birthdate.'" />
                  <input type="hidden" name="civilian_address" value="'.$civilian_address.'" />
                  <input type="hidden" name="civilian_office" value="'.$civilian_office.'" />
                  <input type="hidden" name="civilian_rank" value="'.$civilian_rank.'" />
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
                  <input type="text" disabled name="civilian_fullname" class="civ_fullname" value="'.$civilian_fullname.'" />
                  <input type="submit" name="btn_reg_civ_info" class="btn_reg_civ_info" value="Select" />
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