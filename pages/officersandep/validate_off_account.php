<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
if(isset($_POST['btn-submit-new-oep'])){
  echo "YOW<br>";
  $txt_officersandep_id = '';
  $txt_officersandep_typeofemployee = '';
  $txt_officersandep_firstname = '';
  $txt_officersandep_middlename = '';
  $txt_officersandep_lastname = '';
  $txt_officersandep_email = '';
  $txt_officersandep_contactnumber = '';
  $txt_officersandep_birthdate = '';
  $txt_officer_address = '';
  $txt_officer_headquarter = '';
  $txt_officer_rank = '';

  $txt_officersandep_username = '';
  $txt_officersandep_password = '';
  $txt_officersandep_confirmPassword = '';

  if(isset($_POST['txt_officersandep_id']) && isset($_POST['txt_officersandep_typeofemployee']) && isset($_POST['txt_officersandep_firstname']) && isset($_POST['txt_officersandep_middlename']) && isset($_POST['txt_officersandep_lastname']) && isset($_POST['txt_officersandep_email']) && isset($_POST['txt_officersandep_contactnumber']) && isset($_POST['txt_officersandep_birthdate']) && isset($_POST['txt_officer_address']) && isset($_POST['txt_officer_headquarter']) && isset($_POST['txt_officer_rank'])){
    $con = $db->getConnection();
    $txt_officersandep_id = mysqli_real_escape_string($con, $_POST['txt_officersandep_id']);
    $txt_officersandep_typeofemployee = mysqli_real_escape_string($con, $_POST['txt_officersandep_typeofemployee']);
    $txt_officersandep_firstname = mysqli_real_escape_string($con, $_POST['txt_officersandep_firstname']);
    $txt_officersandep_middlename = mysqli_real_escape_string($con, $_POST['txt_officersandep_middlename']);
    $txt_officersandep_lastname = mysqli_real_escape_string($con, $_POST['txt_officersandep_lastname']);
    $txt_officersandep_email = mysqli_real_escape_string($con, $_POST['txt_officersandep_email']);
    $txt_officersandep_contactnumber = mysqli_real_escape_string($con, $_POST['txt_officersandep_contactnumber']);
    $txt_officersandep_birthdate = mysqli_real_escape_string($con, $_POST['txt_officersandep_birthdate']);
    $txt_officer_address = mysqli_real_escape_string($con, $_POST['txt_officer_address']);
    $txt_officer_headquarter = mysqli_real_escape_string($con, $_POST['txt_officer_headquarter']);
    $txt_officer_rank = mysqli_real_escape_string($con, $_POST['txt_officer_rank']);

    $txt_officersandep_username = mysqli_real_escape_string($con, $_POST['txt_officersandep_username']);
    $txt_officersandep_password = mysqli_real_escape_string($con, $_POST['txt_officersandep_password']);
    $txt_officersandep_confirmPassword = mysqli_real_escape_string($con, $_POST['txt_officersandep_confirmPassword']);

    if($txt_officersandep_password === $txt_officersandep_confirmPassword){
      $check_username = $db->if_off_exist($txt_officersandep_username);
      if(mysqli_num_rows($check_username) > 0){
        echo "EXIST<br>";
        printf("%s\n", $con->error);
      } else {
        echo "NO<br>";
        $new_account = new db_access();
        $insert_account = $new_account->register_officer_account($txt_officersandep_id, $txt_officersandep_firstname, $txt_officersandep_lastname, $txt_officersandep_middlename, $txt_officersandep_typeofemployee, $txt_officer_rank, $txt_officer_headquarter, $txt_officersandep_email, $txt_officersandep_contactnumber, $txt_officersandep_birthdate, $txt_officer_address, $txt_officersandep_username, $txt_officersandep_password, $txt_officersandep_confirmPassword);
        if($insert_account){
          $db->update_has_account_officer($txt_officersandep_id, $txt_officersandep_firstname, $txt_officersandep_lastname, $txt_officersandep_middlename, $txt_officersandep_email, $txt_officer_rank);
          header('location: officer-ep-login.php');
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

  }

} else {
  
}

?>