<?php
namespace loan950;

use \loan950\db_access;
include("../../dbaccess/db_access.php");
echo "TOW<br>";

if(isset($_POST['pb5k_btn_submit'])){
  $loan_id = '';//
  $type_of_loanAccount = '';//
  $borrower_id = '';//
  $ctrl_no_prefix = '';//
  $fname = '';//
  $mname = '';//
  $lname = '';//
  $type_of_employee = '';//
  $office = '';//
  $borrower_rank = '';//
  $loan_amount_5k_rate = '';//
  $monthly_payment_5k_rate = '';//
  $credit_rate = '';//
  $amount_paid = '';//
  $is_paid = ''; // 1 = 'yes'; 0 = 'no'
  $current_interest = '';
  $balance_rate_5k_5k = ''; // current_balance
  $payment_option = '';//
  $date_of_payment = '';//
  $has_penalty = '';// 1 = 'yes'; 0 = 'no'
  $is_penalty_paid = ''; // 1 = 'yes'; 0 = 'no'
  $penalty_amount = '';// 1 = 'yes'; 0 = 'no'
  $increment = '';
  $increment_dp = '';
  $increment_dp5k = '';
  $increment_dp10k = '';
  $increment_fp = '';
  $increment_fp5k = '';
  $increment_fp10k = '';
  $dp5k = '';
  $dp10k = '';
  $dp = '';
  $fp5k = '';
  $fp10k = '';
  $fp = '';
  $penalty_count = '';
  $penalty_5k_count = '';
  $penalty_10k_count = '';
  $remarks = '';
  $borrowerFullname = '';

  // calculations
  $new_current_balance_5k = '';
  $new_current_interest_5k = '';
//if(isset($_POST['b_loanID']) && isset($_POST['b_empID']) && isset($_POST['b_ctrl']) && isset($_POST['b_fname']) && isset($_POST['b_mname']) && isset($_POST['b_lname']) && isset($_POST['b_type']) && isset($_POST['b_rank']) && isset($_POST['b_loanType']) && isset($_POST['b_office']) && isset($_POST['txt_loan5k_amount_rate']) && isset($_POST['txt_monthlyPayment_5k_rate']) && isset($_POST['paymentoption_5k']) && isset($_POST['b_dp5k']) && isset($_POST['b_dp10k']) && isset($_POST['b_dp']) && isset($_POST['b_fp']) && isset($_POST['b_fp5k']) && isset($_POST['b_fp10k']) && isset($_POST['b_penalty_count']) && isset($_POST['b_penalty_5k_count']) && isset($_POST['b_penalty_10k_count']) && isset($_POST['txt_ctrl_number_5k']) && isset($_POST['txt_accounttype_5k']) && isset($_POST['balance_5k']) && isset($_POST['txt_currentstatus_5k']) && isset($_POST['date_of_payment_5k']) && isset($_POST['txt_amount_payment_5k']) && isset($_POST['penaltyrate_5k']) && isset($_POST['txt_interestamount_5k']) && isset($_POST['txt_currentbalance_5k'])){
  if(isset($_POST['b_loanID']) && isset($_POST['b_empID']) && isset($_POST['b_ctrl']) && isset($_POST['b_fname']) && isset($_POST['b_mname']) && isset($_POST['b_lname']) && isset($_POST['b_type']) && isset($_POST['b_rank']) && isset($_POST['b_loanType']) && isset($_POST['b_office']) && isset($_POST['txt_loan5k_amount_rate']) && isset($_POST['txt_monthlyPayment_5k_rate']) && isset($_POST['paymentoption_5k']) && isset($_POST['b_dp5k']) && isset($_POST['b_dp10k']) && isset($_POST['b_dp']) && isset($_POST['b_fp']) && isset($_POST['b_fp5k']) && isset($_POST['b_fp10k']) && isset($_POST['b_penalty_count']) && isset($_POST['b_penalty_5k_count']) && isset($_POST['b_penalty_10k_count']) && isset($_POST['txt_ctrl_number_5k']) && isset($_POST['balance_5k']) && isset($_POST['date_of_payment_5k']) && isset($_POST['txt_amount_payment_5k'])){
    $db = new db_access();
    $con = $db->getConnection();
    $loan_id = mysqli_real_escape_string($con, $_POST['b_loanID']);
    $type_of_loanAccount = mysqli_real_escape_string($con, $_POST['b_loanType']);
    $borrower_id = mysqli_real_escape_string($con, $_POST['b_empID']);
    $ctrl_no_prefix = mysqli_real_escape_string($con, $_POST['b_ctrl']);
    $fname = mysqli_real_escape_string($con, $_POST['b_fname']);
    $mname = mysqli_real_escape_string($con, $_POST['b_mname']);
    $lname = mysqli_real_escape_string($con, $_POST['b_lname']);
    $type_of_employee = mysqli_real_escape_string($con, $_POST['b_type']);
    $office = mysqli_real_escape_string($con, $_POST['b_office']);
    $borrower_rank = mysqli_real_escape_string($con, $_POST['b_rank']);
    $loan_amount_5k_rate = mysqli_real_escape_string($con, $_POST['txt_loan5k_amount_rate']);
    $monthly_payment_5k_rate = mysqli_real_escape_string($con, $_POST['txt_monthlyPayment_5k_rate']);
    $control_number = mysqli_real_escape_string($con, $_POST['txt_ctrl_number_5k']);
    $credit_rate = mysqli_real_escape_string($con, $_POST['balance_5k']);
    $amount_paid = mysqli_real_escape_string($con, $_POST['txt_amount_payment_5k']);
    // $is_paid = 1;
    // $current_interest = mysqli_real_escape_string($con, $_POST['txt_interestamount_5k']);
    // $balance_rate_5k = mysqli_real_escape_string($con, $_POST['txt_currentbalance_5k']);
    $payment_option = mysqli_real_escape_string($con, $_POST['paymentoption_5k']);
    $date_of_payment = mysqli_real_escape_string($con, $_POST['date_of_payment_5k']);
    // if(isset($_POST['penaltyrate_5k'])){
    //   $penalty_amount = 80;
    //   $has_penalty = 1;
    //   $is_penalty_paid = 1;
    // } else {
    //   $penalty_amount = 0;
    //   $has_penalty = 0;
    //   $is_penalty_paid = 0;
    // }
    $dp5k = mysqli_real_escape_string($con, $_POST['b_dp5k']);
    $dp10k = mysqli_real_escape_string($con, $_POST['b_dp10k']);
    $dp = mysqli_real_escape_string($con, $_POST['b_dp']);
    $fp = mysqli_real_escape_string($con, $_POST['b_fp']);
    $fp5k = mysqli_real_escape_string($con, $_POST['b_fp5k']);
    $fp10k = mysqli_real_escape_string($con, $_POST['b_fp10k']);
    $penalty_count = mysqli_real_escape_string($con, $_POST['b_penalty_count']);
    $penalty_5k_count = mysqli_real_escape_string($con, $_POST['b_penalty_5k_count']);
    $penalty_10k_count = mysqli_real_escape_string($con, $_POST['b_penalty_10k_count']);
    // $borrowerFullname = "$fname $mname $lname";
    // $remarks = "$borrowerFullname's New Loan Payment";

    // if($payment_option === '1st_payment_option'){
    //   echo '1st_payment_option';
    // } else {
    //   echo 'Not First';
    // }

    echo "$loan_id<br>";
    echo "$borrower_id<br>";
    echo "$ctrl_no_prefix<br>";
    echo "$fname<br>";
    echo "$mname<br>";
    echo "$lname<br>";
    echo "$type_of_employee<br>"; 
    echo "$office<br>";
    echo "$borrower_rank<br>";
    echo "$loan_amount_5k_rate<br>";
    echo "$monthly_payment_5k_rate<br>";
    echo "$payment_option<br>";
    echo "$dp5k<br>";
    echo "$dp10k<br>";
    echo "$dp<br>";
    echo "$fp<br>";
    echo "$fp5k<br>";
    echo "$fp10k<br>";
    echo "$penalty_count<br>";
    echo "$penalty_5k_count<br>";
    echo "$penalty_10k_count<br>";
    echo "$control_number<br>";
    echo "$credit_rate<br>";
    echo "$amount_paid<br>";
    echo "$date_of_payment<br>";
  }
}
?>