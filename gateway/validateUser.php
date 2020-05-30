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

// Civilian Login
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
      $_SESSION['ce_id'] = $ce_id;
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

if(isset($_POST['btn_oepsubmit_login'])){
  $txt_officer_username = '';
  $txt_officer_password = '';
  $officer_username = '';
  $officer_password = '';
  $officer_account_id = '';
  $log = '';
  $officer_id = '';
  $officer_fName = '';
  $officer_mName = '';
  $officer_lName = '';
  $officer_headquarter = '';
  $officer_rank = '';
  $type_of_employee = '';
  $officer_email = '';
  $officer_contactNumber = '';
  $officer_birthday = '';
  $officer_address = '';
  $officer_fullname = '';

  if(isset($_POST['txt_oep_username']) && isset($_POST['txt_oep_password'])){
    // echo "YW<br>";
    // echo "$_POST[txt_oep_username]<br>";
    // echo "$_POST[txt_oep_password]<br>";
    include("../dbaccess/db_access.php");
    $dbaccess = new db_access();
    $con = $dbaccess->getConnection();
    $txt_officer_username = mysqli_real_escape_string($con, $_POST['txt_oep_username']);
    $txt_officer_password = mysqli_real_escape_string($con, $_POST['txt_oep_password']);

    $log = $dbaccess->login_officer($txt_officer_username, $txt_officer_password);
    while($row = $log->fetch_array(MYSQLI_ASSOC)){
      $officer_account_id = $row['officer_account_id'];
      $officer_username = $row['officer_account_username'];
      $officer_password = $row['officer_account_password'];
      $officer_id = $row['officer_id'];
      $officer_fName = $row['officer_account_fName'];
      $officer_mName = $row['officer_account_mName'];
      $officer_lName = $row['officer_account_lName'];
      $type_of_employee = $row['type_of_employee'];
      $officer_rank = $row['officer_account_rank'];
      $officer_headquarter = $row['officer_account_headquarter'];
      $officer_email = $row['officer_account_email'];
      $officer_contactNumber = $row['officer_account_contactNumber'];
      $officer_birthday = $row['officer_account_birthdate'];
      $officer_address = $row['officer_account_address'];
      $officer_fullname = "$officer_fName $officer_mName $officer_lName";
    }

    // echo "$officer_account_id<br>";
    // echo "$officer_username<br>";
    // echo "$officer_password<br>";
    // echo "$officer_id<br>";
    // echo "$officer_fName<br>";
    // echo "$officer_mName<br>";
    // echo "$officer_lName<br>";
    // echo "$type_of_employee<br>";
    // echo "$officer_rank<br>";
    // echo "$officer_headquarter<br>";
    // echo "$officer_email<br>";
    // echo "$officer_contactNumber<br>";
    // echo "$officer_birthday<br>";
    // echo "$officer_address<br>";

    if($txt_officer_username === $officer_username && $txt_officer_password === $officer_password){
      session_start();
      $_SESSION['officer_username'] = $officer_username;
      $_SESSION['officer_account_id'] = $officer_account_id;
      $_SESSION['officer_id'] = $officer_id;
      $_SESSION['officer_fName'] = $officer_fName;
      $_SESSION['officer_mName'] = $officer_mName;
      $_SESSION['officer_lName'] = $officer_lName;
      $_SESSION['type_of_employee'] = $type_of_employee;
      $_SESSION['officer_rank'] = $officer_rank;
      $_SESSION['officer_headquarter'] = $officer_headquarter;
      $_SESSION['officer_email'] = $officer_email;
      $_SESSION['officer_contactNumber'] = $officer_contactNumber;
      $_SESSION['officer_birthdate'] = $officer_birthday;
      $_SESSION['officer_address'] = $officer_address;
      $_SESSION['officer_fullname'] = $officer_fullname;
      header('location: ../pages/officersandep/officer-homepage.php');

    } else {
      header('location: ../pages/officersandep/officer-ep-login.php');
    }


  } else {

  }

}
?>