<?php
namespace loan950;
use \loan950\db_access;

if(isset($_POST['lrf_btn_submit_5k'])){
  echo "HEL";
  $lrf_txt_borrowerid = '';
  $lrf_txt_borroweraccoundid = '';
  $formatted_string = '';
  $type_of_account = '';
  $lrf_txt_borrowerfname = '';
  $lrf_txt_borrowermname = '';
  $lrf_txt_borrowerlname = '';
  $lrf_txt_borrowertype = '';
  $lrf_txt_borroweroffice = '';
  $lrf_txt_borrowerrank = '';
  $loan_amount_rates_5k = '';
  $monthly_payment_rates_5k = '';
  $credit_rates_5k = '';
  $beginning_balance_5k = '';
  $interest_rates_5k = '';
  $penalty_permonth_rates_5k = '';
  $debit_pay_5k = '';
  $loan_status_5k = '';
  $first_payment_5k = '';
  $second_payment_5k = '';
  $third_payment_5k = '';
  $fourth_payment_5k = '';
  $fifth_payment_5k = '';
  $full_payment_5k = '';
  $is_granted = '';
  $is_declined = '';
  $is_pending = '';
  $is_loan_requested_5k = '';
  $is_new_loan_5k = '';
  $comment = '';

  if(isset($_POST['lrf-txt-borrowerid']) && isset($_POST['lrf-txt-borroweraccoundid']) && isset($_POST['formatted_string']) && isset($_POST['type_of_account']) && isset($_POST['lrf-txt-borrowerfname']) && isset($_POST['lrf-txt-borrowermname']) && isset($_POST['lrf-txt-borrowerlname']) && isset($_POST['lrf-txt-borrowertype']) && isset($_POST['lrf-txt-borroweroffice']) && isset($_POST['lrf-txt-borrowerrank']) && isset($_POST['loan_amount_rates_5k']) && isset($_POST['monthly_payment_rates_5k']) && isset($_POST['credit_rates_5k']) && isset($_POST['beginning_balance_5k']) && isset($_POST['interest_rates_5k']) && isset($_POST['penalty_permonth_rates_5k']) && isset($_POST['debit_pay_5k']) && isset($_POST['loan_status_5k']) && isset($_POST['first_payment_5k']) && isset($_POST['first_payment_5k']) && isset($_POST['second_payment_5k']) && isset($_POST['third_payment_5k']) && isset($_POST['fourth_payment_5k']) && isset($_POST['fifth_payment_5k']) && isset($_POST['full_payment_5k'])){
    include('../../dbaccess/db_access.php');
    $db = new db_access();
    $con = $db->getConnection();
    $lrf_txt_borrowerid = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerid']);
    $lrf_txt_borroweraccoundid = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweraccoundid']);
    $formatted_string = mysqli_real_escape_string($con, $_POST['formatted_string']);
    $type_of_account = mysqli_real_escape_string($con, $_POST['type_of_account']);
    $lrf_txt_borrowerfname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerfname']);
    $lrf_txt_borrowermname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowermname']);
    $lrf_txt_borrowerlname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerlname']);
    $lrf_txt_borrowertype = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowertype']);
    $lrf_txt_borroweroffice = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweroffice']);
    $lrf_txt_borrowerrank = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerrank']);
    $loan_amount_rates_5k = mysqli_real_escape_string($con, $_POST['loan_amount_rates_5k']);
    $monthly_payment_rates_5k = mysqli_real_escape_string($con, $_POST['monthly_payment_rates_5k']);
    $credit_rates_5k = mysqli_real_escape_string($con, $_POST['credit_rates_5k']);
    $beginning_balance_5k = mysqli_real_escape_string($con, $_POST['beginning_balance_5k']);
    $interest_rates_5k = mysqli_real_escape_string($con, $_POST['interest_rates_5k']);
    $penalty_permonth_rates_5k = mysqli_real_escape_string($con, $_POST['penalty_permonth_rates_5k']);
    $debit_pay_5k = mysqli_real_escape_string($con, $_POST['debit_pay_5k']);
    $loan_status_5k = mysqli_real_escape_string($con, $_POST['loan_status_5k']);
    $first_payment_5k = mysqli_real_escape_string($con, $_POST['first_payment_5k']);
    $second_payment_5k = mysqli_real_escape_string($con, $_POST['second_payment_5k']);
    $third_payment_5k = mysqli_real_escape_string($con, $_POST['third_payment_5k']);
    $fourth_payment_5k = mysqli_real_escape_string($con, $_POST['fourth_payment_5k']);
    $fifth_payment_5k = mysqli_real_escape_string($con, $_POST['fifth_payment_5k']);
    $full_payment_5k = mysqli_real_escape_string($con, $_POST['full_payment_5k']);
    $is_loan_requested_5k = 1;
    $is_granted = 0;
    $is_declined = 0;
    $is_pending = 1;
    $comment = "New 5K Loan for $lrf_txt_borrowerfname $lrf_txt_borrowermname $lrf_txt_borrowerlname";

    echo "$lrf_txt_borrowerid<br>";
    echo "$lrf_txt_borroweraccoundid<br>";
    echo "$formatted_string<br>";
    echo "$type_of_account<br>";
    echo "$lrf_txt_borrowerfname<br>";
    echo "$lrf_txt_borrowermname<br>";
    echo "$lrf_txt_borrowerlname<br>";
    echo "$lrf_txt_borrowertype<br>";
    echo "$lrf_txt_borroweroffice<br>";
    echo "$lrf_txt_borrowerrank<br>";
    echo "$loan_amount_rates_5k<br>";
    echo "$monthly_payment_rates_5k<br>";
    echo "$credit_rates_5k<br>";
    echo "$beginning_balance_5k<br>";
    echo "$interest_rates_5k<br>";
    echo "$penalty_permonth_rates_5k<br>";
    echo "$debit_pay_5k<br>";
    echo "$loan_status_5k<br>";
    echo "$first_payment_5k<br>";
    echo "$second_payment_5k<br>";
    echo "$third_payment_5k<br>";
    echo "$fourth_payment_5k<br>";
    echo "$fifth_payment_5k<br>";
    echo "$full_payment_5k<br>";
    echo "$is_loan_requested_5k<br>";
    echo "$comment<br>";

    echo "$is_granted<br>";
    echo "$is_declined<br>";
    echo "$is_pending<br>";

    $insert_request = $db->add_loan_request_5k($lrf_txt_borrowerid, $lrf_txt_borroweraccoundid, $formatted_string, $type_of_account, $lrf_txt_borrowerfname, $lrf_txt_borrowermname, $lrf_txt_borrowerlname, $lrf_txt_borrowertype, $lrf_txt_borroweroffice, $lrf_txt_borrowerrank, $loan_amount_rates_5k, $monthly_payment_rates_5k, $credit_rates_5k, $debit_pay_5k, $interest_rates_5k, $beginning_balance_5k, $comment, $penalty_permonth_rates_5k, $first_payment_5k, $second_payment_5k, $third_payment_5k, $fourth_payment_5k, $fifth_payment_5k, $full_payment_5k, $loan_status_5k, $is_new_loan_5k, $is_granted, $is_declined, $is_pending, $is_loan_requested_5k);
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