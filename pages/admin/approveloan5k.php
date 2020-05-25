<?php
namespace loan950;
use \loan950\db_access;
// add to tbl_new_5k_loan
// Approve Loan
if(isset($_POST['btn_approve_loan_request_5k'])){
  $loan_request_id_5k = '';
  $borrower_account_id = '';
  $borrower_id = '';
  $ctrl_no_prefix = '';
  $borrower_fname = '';
  $borrower_mname = '';
  $borrower_lname = '';
  $borrower_email = '';
  $type_of_employee = '';
  $type_of_loan = '';
  $loan_amount_5k_rate = '';
  $monthly_payment_5k_rate = '';
  $credit_5k_rate = '';
  $debit_pay_5k = '';
  $interest_rate_5k = '';
  $balance_rate_5k = '';
  $date_today = '';
  $comment = '';
  $penalty_5k = '';
  $office = '';
  $rank = '';
  $first_payment_5k = '';
  $second_payment_5k = '';
  $third_payment_5k = '';
  $fourth_payment_5k = '';
  $fifth_payment_5k = '';
  $full_payment_5k = '';
  $loan_status_5k = '';
  $is_new_loan_5k = '';
  $is_loan_requested_5k = '';
  $con = '';
  $increment = '';

  if(isset($_POST['loan_request_id_5k']) && isset($_POST['borrower_account_id']) && isset($_POST['borrower_id']) && isset($_POST['ctrl_no_prefix']) && isset($_POST['borrower_fname']) && isset($_POST['borrower_mname']) && isset($_POST['borrower_lname']) && isset($_POST['borrower_email']) && isset($_POST['type_of_employee']) && isset($_POST['type_of_loan']) && isset($_POST['loan_amount_5k_rate']) &&
    isset($_POST['monthly_payment_5k_rate']) && isset($_POST['credit_5k_rate']) && isset($_POST['debit_pay_5k']) && isset($_POST['interest_rate_5k']) && isset($_POST['balance_rate_5k']) && isset($_POST['date_today']) && isset($_POST['comment']) && isset($_POST['penalty_5k']) && isset($_POST['office']) &&
    isset($_POST['rank']) && isset($_POST['first_payment_5k']) && isset($_POST['second_payment_5k']) && isset($_POST['third_payment_5k']) && isset($_POST['fourth_payment_5k']) && isset($_POST['fifth_payment_5k']) && isset($_POST['full_payment_5k']) && isset($_POST['loan_status_5k']) && isset($_POST['is_new_loan_5k']) && isset($_POST['is_loan_requested_5k'])){
    include('../../dbaccess/db_access.php');
    $db = new db_access();
    $con = $db->getConnection();
    $loan_request_id_5k = mysqli_real_escape_string($con, $_POST['loan_request_id_5k']);
    $borrower_account_id = mysqli_real_escape_string($con, $_POST['borrower_account_id']);
    $borrower_id = mysqli_real_escape_string($con, $_POST['borrower_id']);
    $ctrl_no_prefix = mysqli_real_escape_string($con, $_POST['ctrl_no_prefix']);
    $borrower_fname = mysqli_real_escape_string($con, $_POST['borrower_fname']);
    $borrower_mname = mysqli_real_escape_string($con, $_POST['borrower_mname']);
    $borrower_lname = mysqli_real_escape_string($con, $_POST['borrower_lname']);
    $borrower_email = mysqli_real_escape_string($con, $_POST['borrower_email']);
    $type_of_employee = mysqli_real_escape_string($con, $_POST['type_of_employee']);
    $type_of_loan = mysqli_real_escape_string($con, $_POST['type_of_loan']);
    $loan_amount_5k_rate = mysqli_real_escape_string($con, $_POST['loan_amount_5k_rate']);
    $monthly_payment_5k_rate = mysqli_real_escape_string($con, $_POST['monthly_payment_5k_rate']);
    $credit_5k_rate = mysqli_real_escape_string($con, $_POST['credit_5k_rate']);
    $debit_pay_5k = mysqli_real_escape_string($con, $_POST['debit_pay_5k']);
    $interest_rate_5k = mysqli_real_escape_string($con, $_POST['interest_rate_5k']);
    $balance_rate_5k = mysqli_real_escape_string($con, $_POST['balance_rate_5k']);
    $date_today = mysqli_real_escape_string($con, $_POST['date_today']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $penalty_5k = mysqli_real_escape_string($con, $_POST['penalty_5k']);
    $office = mysqli_real_escape_string($con, $_POST['office']);
    $rank = mysqli_real_escape_string($con, $_POST['rank']);
    $first_payment_5k = mysqli_real_escape_string($con, $_POST['first_payment_5k']);
    $second_payment_5k = mysqli_real_escape_string($con, $_POST['second_payment_5k']);
    $third_payment_5k = mysqli_real_escape_string($con, $_POST['third_payment_5k']);
    $fourth_payment_5k = mysqli_real_escape_string($con, $_POST['fourth_payment_5k']);
    $fifth_payment_5k = mysqli_real_escape_string($con, $_POST['fifth_payment_5k']);
    $full_payment_5k = mysqli_real_escape_string($con, $_POST['full_payment_5k']);
    $loan_status_5k = mysqli_real_escape_string($con, $_POST['loan_status_5k']);
    $is_new_loan_5k = mysqli_real_escape_string($con, $_POST['is_new_loan_5k']);
    $is_loan_requested_5k = mysqli_real_escape_string($con, $_POST['is_loan_requested_5k']);

    echo "$loan_request_id_5k<br>";
    echo "$borrower_account_id<br>";
    echo "$borrower_id<br>";
    echo "$ctrl_no_prefix<br>";
    echo "$borrower_fname<br>";
    echo "$borrower_mname<br>";
    echo "$borrower_lname<br>";
    echo "$borrower_email<br>";
    echo "$type_of_employee<br>";
    echo "$type_of_loan<br>";
    echo "$loan_amount_5k_rate<br>";
    echo "$monthly_payment_5k_rate<br>";
    echo "$credit_5k_rate<br>";
    echo "$debit_pay_5k<br>";
    echo "$interest_rate_5k<br>";
    echo "$balance_rate_5k<br>";
    echo "$date_today<br>";
    echo "$comment<br>";
    echo "$penalty_5k<br>";
    echo "$office<br>";
    echo "$rank<br>";
    echo "$first_payment_5k<br>";
    echo "$second_payment_5k<br>";
    echo "$third_payment_5k<br>";
    echo "$fourth_payment_5k<br>";
    echo "$fifth_payment_5k<br>";
    echo "$full_payment_5k<br>";
    echo "$loan_status_5k<br>";
    echo "$is_new_loan_5k<br>";
    echo "$is_loan_requested_5k<br>";

    $getData = $db->get_civilian_la5kcount($borrower_id, $type_of_employee, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email);
    while($r = $getData->fetch_array(MYSQLI_ASSOC)){
      $la5k_count = $r['la_5k_count'];
      echo "LA 5k COUNT: $la5k_count<br>";
    }

    $increment = (int)$la5k_count + 1;
    echo $increment;

    $add_new_5kloan = $db->add_new_5k_record($borrower_id, $ctrl_no_prefix, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $type_of_loan, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_5k_rate, $debit_pay_5k, $interest_rate_5k, $balance_rate_5k, $date_today, $comment, $penalty_5k, $office, $rank, $first_payment_5k, $second_payment_5k, $third_payment_5k, $fourth_payment_5k, $fifth_payment_5k, $full_payment_5k, $loan_status_5k, $is_new_loan_5k, $is_loan_requested_5k);
    if($add_new_5kloan){
      $db->update_is_pending_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $rank);
      $db->update_is_granted_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $rank);
      if($type_of_employee === 'civilian'){
        // echo "CIVILIAN<br>";
        $db->update_civilian_la5k_count($borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $increment);
      } else if($type_of_employee === 'officer'){
        // echo "OFFICER<br>";
        $db->update_officer_la5k_count($borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $increment);
      }
      header('location: adminloanrequest.php');
    } else {
      printf("%s\n", $con->error);
    }

  }

} else if(isset($_POST['btn_decline_loan_request_5k'])){
  echo 'DECLINE';
} else {

}
?>