<?php

namespace loan950;

use \loan950\db_access;

// if(session_status() === PHP_SESSION_ACTIVE){
//   header('location: ../pages/index.php');
// }

// if(session_status() === PHP_SESSION_NONE){
//   header('location: ../pages/index.php');
// }

echo "TEST";

if(isset($_POST["btn-submit-new-admin"])) {
  if(isset($_POST['txt_admin_firstname']) && isset($_POST['txt_admin_middlename']) && isset($_POST['txt_admin_lastname']) && isset($_POST['txt_admin_email']) && isset($_POST['txt_admin_username']) && isset($_POST['txt_admin_password']) && isset($_POST['txt_admin_confirmPassword'])){
    $firstname = filter_var($_POST['txt_admin_firstname'], FILTER_SANITIZE_STRING);
    $middlename = filter_var($_POST['txt_admin_middlename'], FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST['txt_admin_lastname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['txt_admin_email'], FILTER_SANITIZE_EMAIL);

    $username = filter_var($_POST['txt_admin_username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['txt_admin_password'], FILTER_SANITIZE_STRING);
    $cpassword = filter_var($_POST['txt_admin_confirmPassword'], FILTER_SANITIZE_STRING);

    if($password === $cpassword){
      require_once ("../dbaccess/db_access.php");
      $new_admin = new db_access();
      $insert_admin = $new_admin->registerAdmin($firstname, $lastname, $middlename, $username, $password, $email);
      if($insert_admin){
        header('Location: ../pages/admin/adminSignInForm.php');
      } else {
        echo 'ERROR.';
      }
    } else {
      echo <<<ALERT
      <script type="text/javascript">alert("Password did not match.")</script>
ALERT;
      header('Location: ../pages/admin/registerAdminAccount.php');
    }
  }
}

if(isset($_POST["btn_submit_login"])){
  if(isset($_POST['txt_admin_username']) && isset($_POST['txt_admin_password'])){
    require_once ("../dbaccess/db_access.php");
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
    while($row = $login_user->fetch_assoc()) {
      $ID = $row['admin_ID'];
      $UNAME = $row['admin_username'];
      $PASS = $row['admin_password'];
      $FNAME = $row['admin_firstname'];
    }


    if($USERNAME === $UNAME && $hashed_password === $PASS){
      session_start();
      $_SESSION['admin_username'] = $UNAME;
      $_SESSION['admin_id'] = $ID;
      $_SESSION['fname'] = $FNAME;
      header('location: ../pages/loanmonitoring/adminOverview.php');
    } else {
      header('location: ../pages/admin/adminSignInForm.php');
    }
  }
}

if(isset($_POST['btn-cl-submit'])){
  $civilian_username = '';
  $civilian_password = '';
  $username = '';
  $password = '';
  $ce_acc_id = '';
  $log = '';
  $ce_id = '';
  $ce_firstname = '';
  $ce_middlename = '';
  $ce_lastname = '';
  $ce_office = '';
  $ce_rank = '';
  $type_of_employee = '';
  $ce_email = '';
  $ce_contactnumber = '';
  $ce_birthday = '';
  $ce_address = '';
  $ce_fullname = '';

  if(isset($_POST['civ_username']) && isset($_POST['civ_password'])){
    include("../dbaccess/db_access.php");
    $dbaccess = new db_access();
    $con = $dbaccess->getConnection();
    $civilian_username = mysqli_real_escape_string($con, $_POST['civ_username']);
    $civilian_password = mysqli_real_escape_string($con, $_POST['civ_password']);

    $log = $dbaccess->login_civ($civilian_username, $civilian_password);

    while($row = $log->fetch_array(MYSQLI_ASSOC)){
      $ce_acc_id = $row['civilian_account_id'];
      $username = $row['civilian_username'];
      $password = $row['civilian_password'];
      $ce_id = $row['civilian_id'];
      $ce_firstname = $row['civilian_account_fName'];
      $ce_middlename = $row['civilian_account_mName'];
      $ce_lastname = $row['civilian_account_lName'];
      $type_of_employee = $row['type_of_employee'];
      $ce_rank = $row['civilian_account_rank'];
      $ce_office = $row['civilian_account_office'];
      $ce_email = $row['civilian_account_email'];
      $ce_contactnumber = $row['civilian_account_contactNumber'];
      $ce_birthday = $row['civilian_account_birthdate'];
      $ce_address = $row['civilian_account_address'];
      $ce_fullname = "$ce_firstname $ce_middlename $ce_lastname";
    }

    if($civilian_username === $username && $civilian_password === $password){
      session_start();
      $_SESSION['cuname'] = $username;
      $_SESSION['cuid'] = $ce_acc_id;
      $_SESSION['fname'] = $ce_firstname;
      $_SESSION['mname'] = $ce_middlename;
      $_SESSION['lname'] = $ce_lastname;
      $_SESSION['type_of_employee'] = $type_of_employee;
      $_SESSION['ce_rank'] = $ce_rank;
      $_SESSION['ce_office'] = $ce_office;
      $_SESSION['ce_email'] = $ce_email;
      $_SESSION['ce_contactnumber'] = $ce_contactnumber;
      $_SESSION['ce_birthday'] = $ce_birthday;
      $_SESSION['ce_address'] = $ce_address;
      $_SESSION['ce_fullname'] = $ce_fullname;
      header('location: ../pages/civilian/civilian-homepage.php');
    } else {
      header('location: ../pages/civilian/civilian-login.php');
    }

  } else {
    // do nothing..
  }

}
?>