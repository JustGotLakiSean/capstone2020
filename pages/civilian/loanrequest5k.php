<?php
namespace loan950;
use \loan950\db_access;

if(isset($_POST['lrf_btn_submit_5k'])){
  echo "HEL";
  $lrf_txt_borrowerid = '';
  $formatted_string = '';
  $type_of_account = '';
  $lrf_txt_borrowerfname = '';
  $lrf_txt_borrowermname = '';
  $lrf_txt_borrowerlname = '';
  $lrf_txt_borrowertype = '';
  $lrf_txt_borroweroffice = '';
  $lrf_txt_borrowerrank = '';
  $is_granted = '';
  $is_declined = '';
  $is_pending = '';

  if(isset($_POST['lrf-txt-borrowerid']) && isset($_POST['formatted_string']) && isset($_POST['type_of_account']) && isset($_POST['lrf-txt-borrowerfname']) && isset($_POST['lrf-txt-borrowermname']) && isset($_POST['lrf-txt-borrowerlname']) && isset($_POST['lrf-txt-borrowertype']) && isset($_POST['lrf-txt-borroweroffice']) && isset($_POST['lrf-txt-borrowerrank'])){
    include('../../dbaccess/db_access.php');
    $db = new db_access();
    $con = $db->getConnection();
    $lrf_txt_borrowerid = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerid']);
    $formatted_string = mysqli_real_escape_string($con, $_POST['formatted_string']);
    $type_of_account = mysqli_real_escape_string($con, $_POST['type_of_account']);
    $lrf_txt_borrowerfname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerfname']);
    $lrf_txt_borrowermname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowermname']);
    $lrf_txt_borrowerlname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerlname']);
    $lrf_txt_borrowertype = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowertype']);
    $lrf_txt_borroweroffice = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweroffice']);
    $lrf_txt_borrowerrank = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerrank']);
    $is_granted = 0;
    $is_declined = 0;
    $is_pending = 1;

    echo "$lrf_txt_borrowerid<br>";
    echo "$formatted_string<br>";
    echo "$type_of_account<br>";
    echo "$lrf_txt_borrowerfname<br>";
    echo "$lrf_txt_borrowermname<br>";
    echo "$lrf_txt_borrowerlname<br>";
    echo "$lrf_txt_borrowertype<br>";
    echo "$lrf_txt_borroweroffice<br>";
    echo "$lrf_txt_borrowerrank<br>";
    echo "$is_granted<br>";
    echo "$is_declined<br>";
    echo "$is_pending<br>";

    $insert_request = $db->add_loan_request_5k($lrf_txt_borrowerid, $formatted_string, $type_of_account, $lrf_txt_borrowerfname, $lrf_txt_borrowermname, $lrf_txt_borrowerlname, $lrf_txt_borrowertype, $lrf_txt_borroweroffice, $lrf_txt_borrowerrank, $is_granted, $is_declined, $is_pending);
    if($insert_request){
      header('location: civilian-homepage.php');
    } else {
      printf("%s\n", $con->error);
    }

  } else {
    // do nothing...
  }

} else {
  // do nothing...
}
?>