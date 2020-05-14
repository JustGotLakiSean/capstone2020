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
  <link rel="stylesheet" href="css/registerCEAccount.css">
  <title>Civilian Employee Sign Up Form</title>
</head>
<body>
<script src="src/validate_ce_account.js"></script>
  <main>

    <header id="cl-header">
      <nav>
        <ul>
          <li>
            <a href="../index.php">Home</a>
          </li>
        </ul>
      </nav>
    </header>
    <?php
    if(isset($_POST['btn_reg_civ_info'])){
      $civilian_ID = '';
      $type_of_employee = '';
      $civilian_fName = '';
      $civilian_mName = '';
      $civilian_lName = '';
      $civilian_email = '';
      $civilian_contactNumber = '';
      $civilian_birthdate = '';
      $civilian_address = '';
      $civilian_office = '';
      $civilian_rank = '';

      if(isset($_POST['civilian_ID']) && isset($_POST['type_of_employee']) && isset($_POST['civilian_fName']) && isset($_POST['civilian_mName']) && isset($_POST['civilian_lName']) && isset($_POST['civilian_email']) && isset($_POST['civilian_contactNumber']) && isset($_POST['civilian_birthdate']) && isset($_POST['civilian_address']) && isset($_POST['civilian_office']) && isset($_POST['civilian_rank'])){
        $con = $db->getConnection();
        $civilian_ID = mysqli_real_escape_string($con, $_POST['civilian_ID']);
        $type_of_employee = mysqli_real_escape_string($con, $_POST['type_of_employee']);
        $civilian_fName = mysqli_real_escape_string($con, $_POST['civilian_fName']);
        $civilian_mName = mysqli_real_escape_string($con, $_POST['civilian_mName']);
        $civilian_lName = mysqli_real_escape_string($con, $_POST['civilian_lName']);
        $civilian_email = mysqli_real_escape_string($con, $_POST['civilian_email']);
        $civilian_contactNumber = mysqli_real_escape_string($con, $_POST['civilian_contactNumber']);
        $civilian_birthdate = mysqli_real_escape_string($con, $_POST['civilian_birthdate']);
        $civilian_address = mysqli_real_escape_string($con, $_POST['civilian_address']);
        $civilian_office = mysqli_real_escape_string($con, $_POST['civilian_office']);
        $civilian_rank = mysqli_real_escape_string($con, $_POST['civilian_rank']);

        echo '
        <section id = "rc-container">
        <h3>Create New Civilian Account</h3>
        <div id = "rc-credentials-container">
          <form action = "validate_ce_account.php" method = "POST" id = "civilian_register_form" onsubmit="return validate_input()">
            <div id="rc-personaldetails">
              <div class="rc-header">
                <label>Personal Details</label>
              </div>
              <div id = "rc-input-inner">
                <input type="hidden" name = "txt_civilian_id" id = "txt_civilian_id" value = "'.$civilian_ID.'" />
                <input type="hidden" name = "txt_type_of_employee" id = "txt_type_of_employee" value = "'.$type_of_employee.'" />
                <input type="hidden" name = "txt_Civilian_birthdate" id = "txt_Civilian_birthdate" value = "'.$civilian_birthdate.'" />
                <input type="hidden" name = "txt_civilian_address" id = "txt_civilian_address" value = "'.$civilian_address.'" />
                <input type="hidden" name = "txt_civilian_office" id = "txt_civilian_office" value = "'.$civilian_office.'" />
                <input type="hidden" name = "txt_civilian_rank" id = "txt_civilian_rank" value = "'.$civilian_rank.'" />
                <input type="hidden" name = "txt_Civilian_firstname" id = "txt_Civilian_firstname" value = "'.$civilian_fName.'" />
                <input type="hidden" name = "txt_Civilian_middlename" id = "txt_Civilian_middlename" value = "'.$civilian_mName.'" />
                <input type="hidden" name = "txt_Civilian_lastname" id = "txt_Civilian_lastname" value = "'.$civilian_lName.'" />
                <input type="hidden" name = "txt_Civilian_email" id = "txt_Civilian_email" value = "'.$civilian_email.'" />
                <input type="hidden" name = "txt_Civilian_contactnumber" id = "txt_Civilian_contactnumber" value = "'.$civilian_contactNumber.'" />
                <input type="text" id = "txt_Civilian_firstname" disabled value = "'.$civilian_fName.'" />
                <input type="text" id = "txt_Civilian_middlename" disabled value = "'.$civilian_mName.'" />
                <input type="text" id = "txt_Civilian_lastname" disabled value = "'.$civilian_lName.'" />
                <input type="text" id = "txt_Civilian_email" disabled value = "'.$civilian_email.'" />
                <input type="text" id = "txt_Civilian_contactnumber" disabled value = "'.$civilian_contactNumber.'" />
              </div>
            </div>
            <hr>
            <div id="rc-accountdetails">
              <div class="rc-header">
                <label>Account Details</label>
              </div>
              <div id = "rc-input-inner">
                <input type="text" name = "txt_Civilian_username" id = "txt_Civilian_username" required placeholder = "Username" />
                <input type="password" name = "txt_Civilian_password" id = "txt_Civilian_password" required placeholder="Password" />
                <input type="password" name = "txt_Civilian_confirmPassword" id = "txt_Civilian_confirmPassword" required placeholder="Confirm Password"/>
              </div>
            </div>
            <div id = "register-action">
              <input type="submit" name = "btn-submit-new-Civilian" id = "btn-submit-new-Civilian" value="Register"/>
            </div>
          </form>
        </div>
      </section>';

      } else {
        // do nothing...
      }

    } else {
      // do nothing...
    }

    ?>

  </main>
</body>
</html>