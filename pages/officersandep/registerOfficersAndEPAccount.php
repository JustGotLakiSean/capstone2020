<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/registerOEPAccount.css">
  <title>Officers and EP Sign Up Form</title>
</head>
<body>
<script src="src/validate_off_account.js"></script>
  <main>

    <header id="oep-header">
      <nav>
        <ul>
          <li>
            <a href="../index.php">Home</a>
          </li>
        </ul>
      </nav>
    </header>
    <?php
    if(isset($_POST['btn_reg_off_info'])){
      $officer_ID = '';
      $type_of_employee = '';
      $officer_fName = '';
      $officer_mName = '';
      $officer_lName = '';
      $officer_email = '';
      $officer_contactNumber = '';
      $officer_birthdate = '';
      $officer_address = '';
      $officer_headquarter = '';
      $officer_rank = '';
      
      if(isset($_POST['officer_ID']) && isset($_POST['type_of_employee']) && isset($_POST['officer_fName']) && isset($_POST['officer_mName']) && isset($_POST['officer_lName']) && isset($_POST['officer_email']) && isset($_POST['officer_contactNumber']) && isset($_POST['officer_birthdate']) && isset($_POST['officer_address']) && isset($_POST['officer_headquarter']) && isset($_POST['officer_rank'])){
        $con = $db->getConnection();
        $officer_ID = mysqli_real_escape_string($con, $_POST['officer_ID']);
        $type_of_employee = mysqli_real_escape_string($con, $_POST['type_of_employee']);
        $officer_fName = mysqli_real_escape_string($con, $_POST['officer_fName']);
        $officer_mName = mysqli_real_escape_string($con, $_POST['officer_mName']);
        $officer_lName = mysqli_real_escape_string($con, $_POST['officer_lName']);
        $officer_email = mysqli_real_escape_string($con, $_POST['officer_email']);
        $officer_contactNumber = mysqli_real_escape_string($con, $_POST['officer_contactNumber']);
        $officer_birthdate = mysqli_real_escape_string($con, $_POST['officer_birthdate']);
        $officer_address = mysqli_real_escape_string($con, $_POST['officer_address']);
        $officer_headquarter = mysqli_real_escape_string($con, $_POST['officer_headquarter']);
        $officer_rank = mysqli_real_escape_string($con, $_POST['officer_rank']);

        echo '
        <section id = "roep-container">
          <h3>Create New Officers and EP Account</h3>
          <div id = "roep-credentials-container">
            <form action = "validate_off_account.php" method = "POST" id = "officersandep_register_form" onsubmit="return validate_input()">
              <div id="roep-personaldetails">
                <div class="roep-header">
                  <label>Personal Details</label>
                </div>
                <div id = "roep-input-inner">
                  <input type="hidden" name="txt_officersandep_id" value="'.$officer_ID.'" />
                  <input type="hidden" name="txt_officersandep_typeofemployee" value="'.$type_of_employee.'" />
                  <input type="hidden" name="txt_officersandep_firstname" value="'.$officer_fName.'" />
                  <input type="hidden" name="txt_officersandep_middlename" value="'.$officer_mName.'" />
                  <input type="hidden" name="txt_officersandep_lastname" value="'.$officer_lName.'" />
                  <input type="hidden" name="txt_officersandep_email" value="'.$officer_email.'" />
                  <input type="hidden" name="txt_officersandep_contactnumber" value="'.$officer_contactNumber.'" />
                  <input type="hidden" name="txt_officersandep_birthdate" value="'.$officer_birthdate.'" />
                  <input type="hidden" name="txt_officer_address" value="'.$officer_address.'" />
                  <input type="hidden" name="txt_officer_headquarter" value="'.$officer_headquarter.'" />
                  <input type="hidden" name="txt_officer_rank" value="'.$officer_rank.'" />
                  <input type="text" id = "txt_officersandep_firstname" disabled value="'.$officer_fName.'" />
                  <input type="text" id = "txt_officersandep_middlename" disabled value="'.$officer_mName.'" />
                  <input type="text" id = "txt_officersandep_lastname" disabled value="'.$officer_lName.'" />
                  <input type="text" id = "txt_officersandep_email" disabled value="'.$officer_email.'" />
                  <input type="text" id = "txt_officersandep_birthdate" disabled value="'.$officer_birthdate.'" />
                  <input type="text" id = "txt_officersandep_contactnumber" disabled value="'.$officer_contactNumber.'" />
                </div>
              </div>
              <hr>
              <div id="roep-accountdetails">
                <div class="roep-header">
                  <label>Account Details</label>
                </div>
                <div id = "roep-input-inner">
                  <input type="text" name = "txt_officersandep_username" id = "txt_officersandep_username" placeholder = "Username" required />
                  <input type="password" name = "txt_officersandep_password" id = "txt_officersandep_password" placeholder="Password" required />
                  <input type="password" name = "txt_officersandep_confirmPassword" id = "txt_officersandep_confirmPassword" placeholder="Confirm Password" required />
                </div>
              </div>
              <div id = "register-action">
                <input type="submit" name="btn-submit-new-oep" id="btn-submit-new-oep" value="Register" />
              </div>
            </form>
          </div>
        </section>';

      } else {

      }

    } else {

    }
    ?>


  </main>
</body>
</html>