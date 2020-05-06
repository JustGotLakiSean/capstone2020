<?php
namespace loan950;

use \loan950\db_access;
include("../../dbaccess/db_access.php");
echo "Tow";

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
  $balance_rate_5k = ''; // current_balance
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
  // && isset($_POST['txt_interestamount_5k']) && isset($_POST['txt_currentbalance_5k'])
  if(isset($_POST['b_loanID']) && isset($_POST['b_empID']) && isset($_POST['b_ctrl']) && isset($_POST['b_fname']) && isset($_POST['b_mname']) && isset($_POST['b_lname']) && isset($_POST['b_type']) && isset($_POST['b_office']) && isset($_POST['b_loanType']) && isset($_POST['b_rank']) && isset($_POST['txt_loan5k_amount_rate']) && isset($_POST['txt_monthlyPayment_5k_rate']) && isset($_POST['txt_accounttype_5k']) && isset($_POST['balance_5k']) && isset($_POST['paymentoption_5k']) && isset($_POST['date_of_payment_5k']) && isset($_POST['txt_amount_payment_5k'])&& isset($_POST['txt_interestamount_5k']) && isset($_POST['txt_currentbalance_5k']) && isset($_POST['b_dp5k']) && isset($_POST['b_dp10k']) && isset($_POST['b_dp']) && isset($_POST['b_fp5k']) && isset($_POST['b_fp10k']) && isset($_POST['b_fp']) && isset($_POST['b_penalty_count']) && isset($_POST['b_penalty_5k_count']) && isset($_POST['b_penalty_10k_count'])){
    $db = new db_access();
    $loan_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_loanID']);
    $borrower_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_empID']);
    $ctrl_no_prefix = mysqli_real_escape_string($db->getConnection(), $_POST['b_ctrl']);
    $fname = mysqli_real_escape_string($db->getConnection(), $_POST['b_fname']);
    $mname = mysqli_real_escape_string($db->getConnection(), $_POST['b_mname']);
    $lname = mysqli_real_escape_string($db->getConnection(), $_POST['b_lname']);
    $type_of_loanAccount = mysqli_real_escape_string($db->getConnection(), $_POST['b_loanType']);
    $type_of_employee = mysqli_real_escape_string($db->getConnection(), $_POST['b_type']);
    $office = mysqli_real_escape_string($db->getConnection(), $_POST['b_office']);
    $borrower_rank = mysqli_real_escape_string($db->getConnection(), $_POST['b_rank']);
    $loan_amount_5k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_loan5k_amount_rate']);
    $monthly_payment_5k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_monthlyPayment_5k_rate']);
    $credit_rate = mysqli_real_escape_string($db->getConnection(), $_POST['balance_5k']);
    $amount_paid = mysqli_real_escape_string($db->getConnection(), $_POST['txt_amount_payment_5k']);
    $is_paid = 1;
    $current_interest = mysqli_real_escape_string($db->getConnection(), $_POST['txt_interestamount_5k']);
    $balance_rate_5k = mysqli_real_escape_string($db->getConnection(), $_POST['txt_currentbalance_5k']);
    $payment_option = mysqli_real_escape_string($db->getConnection(), $_POST['paymentoption_5k']);
    $date_of_payment = mysqli_real_escape_string($db->getConnection(), $_POST['date_of_payment_5k']);
    if(isset($_POST['penaltyrate_5k'])){ // if the borrower has penalty
      $penalty_amount = mysqli_real_escape_string($db->getConnection(), $_POST['penaltyrate_5k']);
      $has_penalty = 1;
      $is_penalty_paid = 1;
    } else {
      $penalty_amount = 0;
      $has_penalty = 0;
      $is_penalty_paid = 0;
    }
    $dp5k = mysqli_real_escape_string($db->getConnection(), $_POST['b_dp5k']);
    $dp10k = mysqli_real_escape_string($db->getConnection(), $_POST['b_dp10k']); // for 10k
    $dp = mysqli_real_escape_string($db->getConnection(), $_POST['b_dp']);
    $fp5k = mysqli_real_escape_string($db->getConnection(), $_POST['b_fp5k']);
    $fp10k = mysqli_real_escape_string($db->getConnection(), $_POST['b_fp10k']); // for 10k
    $fp = mysqli_real_escape_string($db->getConnection(), $_POST['b_fp']);
    $penalty_count = mysqli_real_escape_string($db->getConnection(), $_POST['b_penalty_count']);
    $penalty_5k_count = mysqli_real_escape_string($db->getConnection(), $_POST['b_penalty_count']);
    $penalty_10k_count = mysqli_real_escape_string($db->getConnection(), $_POST['b_penalty_10k_count']); // for 10k
    $borrowerFullname = "$fname $mname $lname";
    $remarks = "$borrowerFullname's New Loan Payment";

    if($payment_option === '1st_payment_option'){
      $new_current_balance_5k = (int)$credit_rate - (int)$amount_paid;
      $new_current_interest_5k = (int)$loan_amount_5k_rate - (int)$amount_paid;
      $add_new_payment = $db->add_to_1stpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_rate, $amount_paid, $is_paid, $new_current_interest_5k, $new_current_balance_5k, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks);
      if($add_new_payment){
        $db->update_first_payment($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
        $db->update_is_new_loan($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
        echo "New Payment";
        if($type_of_employee === 'civilian'){
          $increment = (int)$dp5k + 1;
          $increment_dp5k = (int)$dp + 1;
          $db->update_dp5k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment);
          $db->update_downpayment_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment);
        } else if($type_of_employee === 'officer'){
          $increment = (int)$dp5k + 1;
          $increment_dp5k = (int)$dp + 1;
          $db->update_dp5k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment);
          $db->update_downpayment_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment);
        }
      } else {
        echo "ERR";
      }
    } else if($payment_option === '2nd_payment_option'){
      echo "Second Payment";
    } else if($payment_option === '3rd_payment_option'){
      echo "Third Payment";
    } else if($payment_option === 'full_payment_option'){
      echo "Full Payment";
    }
  }
}
?>