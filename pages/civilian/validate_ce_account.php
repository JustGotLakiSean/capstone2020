<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
if(isset($_POST['btn-submit-new-Civilian'])){
  $txt_civilian_id = '';
  $txt_type_of_employee = '';
  $txt_Civilian_firstname = '';
  $txt_Civilian_middlename = '';
  $txt_Civilian_lastname = '';
  $txt_Civilian_email = '';
  $txt_Civilian_contactnumber = '';
  $txt_Civilian_birthdate = '';
  $txt_civilian_address = '';
  $txt_civilian_office = '';
  $txt_civilian_rank = '';

  $txt_Civilian_username = '';
  $txt_Civilian_password = '';
  $txt_Civilian_confirmPassword = '';

  if(isset($_POST['txt_civilian_id']) && isset($_POST['txt_type_of_employee']) && isset($_POST['txt_Civilian_firstname']) && isset($_POST['txt_Civilian_middlename']) && isset($_POST['txt_Civilian_lastname']) && isset($_POST['txt_Civilian_email']) && isset($_POST['txt_Civilian_contactnumber']) && isset($_POST['txt_Civilian_birthdate']) && isset($_POST['txt_civilian_address']) && isset($_POST['txt_civilian_office']) && isset($_POST['txt_civilian_rank']) && isset($_POST['txt_Civilian_username']) && isset($_POST['txt_Civilian_password']) && isset($_POST['txt_Civilian_confirmPassword'])){
    $con = $db->getConnection();
    $txt_civilian_id = mysqli_real_escape_string($con, $_POST['txt_civilian_id']);
    $txt_type_of_employee = mysqli_real_escape_string($con, $_POST['txt_type_of_employee']);
    $txt_Civilian_firstname = mysqli_real_escape_string($con, $_POST['txt_Civilian_firstname']);
    $txt_Civilian_middlename = mysqli_real_escape_string($con, $_POST['txt_Civilian_middlename']);
    $txt_Civilian_lastname = mysqli_real_escape_string($con, $_POST['txt_Civilian_lastname']);
    $txt_Civilian_email = mysqli_real_escape_string($con, $_POST['txt_Civilian_email']);
    $txt_Civilian_contactnumber = mysqli_real_escape_string($con, $_POST['txt_Civilian_contactnumber']);
    $txt_Civilian_birthdate = mysqli_real_escape_string($con, $_POST['txt_Civilian_birthdate']);
    $txt_civilian_address = mysqli_real_escape_string($con, $_POST['txt_civilian_address']);
    $txt_civilian_office = mysqli_real_escape_string($con, $_POST['txt_civilian_office']);
    $txt_civilian_rank = mysqli_real_escape_string($con, $_POST['txt_civilian_rank']);

    $txt_Civilian_username = mysqli_real_escape_string($con, $_POST['txt_Civilian_username']);
    $txt_Civilian_password = mysqli_real_escape_string($con, $_POST['txt_Civilian_password']);
    $txt_Civilian_confirmPassword = mysqli_real_escape_string($con, $_POST['txt_Civilian_confirmPassword']);

    if($txt_Civilian_password === $txt_Civilian_confirmPassword){
      $check_username = $db->if_civ_exist($txt_Civilian_username);
      if(mysqli_num_rows($check_username) > 0){
        echo "EXIST";
        printf("%s\n", $con->error);
      } else {
        $new_ce_account = new db_access();
        $insert_ce_account = $new_ce_account->register_civilian_account($txt_civilian_id, $txt_Civilian_firstname, $txt_Civilian_lastname, $txt_Civilian_middlename, $txt_type_of_employee, $txt_civilian_rank, $txt_civilian_office, $txt_Civilian_email, $txt_Civilian_contactnumber, $txt_Civilian_birthdate, $txt_civilian_address, $txt_Civilian_username, $txt_Civilian_password, $txt_Civilian_confirmPassword);
        if($insert_ce_account){
          echo "UPDATED";
          $db->update_has_account_civilian($txt_civilian_id, $txt_Civilian_firstname, $txt_Civilian_middlename, $txt_Civilian_lastname, $txt_Civilian_email, $txt_civilian_rank);
          header('Location: civilian-login.php');
        } else {
          printf("%s\n", $con->error);
        }
      }

    } else {
      echo '
      <script type="text/javascript">alert("Password did not match.")</script>';
      header('Location: registerCivilianEmployeeAccount.php');
    }

  } else {
    echo "LOL";
  }


} else {
  echo "WHAT";
}
?>