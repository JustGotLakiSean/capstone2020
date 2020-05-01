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

  // calculations
  $new_current_balance_5k = '';
  $new_current_interest_5k = '';
  echo "HEllo";
  // && isset($_POST['txt_interestamount_5k']) && isset($_POST['txt_currentbalance_5k'])
  if(isset($_POST['b_loanID']) && isset($_POST['b_empID']) && isset($_POST['b_ctrl']) && isset($_POST['b_fname']) && isset($_POST['b_mname']) && isset($_POST['b_lname']) && isset($_POST['b_office']) && isset($_POST['b_type']) && isset($_POST['b_rank']) && isset($_POST['txt_loan5k_amount_rate']) && isset($_POST['txt_monthlyPayment_5k_rate']) && isset($_POST['txt_accounttype_5k']) && isset($_POST['balance_5k']) && isset($_POST['paymentoption_5k']) && isset($_POST['date_of_payment_5k']) && isset($_POST['txt_amount_payment_5k']) && isset($_POST['penaltyrate_5k'])){
    echo "HEY";
    echo $_POST['b_loanID'];
    echo $_POST['b_empID'];
    echo $_POST['b_ctrl'];
    echo $_POST['b_fname'];
    echo $_POST['b_mname'];
    echo $_POST['b_lname'];
    echo $_POST['b_office'];
    echo $_POST['b_type'];
    echo $_POST['b_rank'];
    echo $_POST['txt_loan5k_amount_rate'];
    echo $_POST['txt_monthlyPayment_5k_rate'];
    echo $_POST['txt_accounttype_5k'];
    echo $_POST['balance_5k'];
    echo $_POST['paymentoption_5k'];
    echo $_POST['date_of_payment_5k'];
    echo $_POST['txt_amount_payment_5k'];
    echo $_POST['penaltyrate_5k'];
    // $db = new db_access();
    // $loan_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_loanID']);
    // $borrower_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_empID']);
    // $ctrl_no_prefix = mysqli_real_escape_string($db->getConnection(), $_POST['b_ctrl']);
    // $fname = mysqli_real_escape_string($db->getConnection(), $_POST['b_fname']);
    // $mname = mysqli_real_escape_string($db->getConnection(), $_POST['b_mname']);
    // $lname = mysqli_real_escape_string($db->getConnection(), $_POST['b_lname']);
    // $type_of_employee = mysqli_real_escape_string($db->getConnection(), $_POST['b_type']);
    // $office = mysqli_real_escape_string($db->getConnection(), $_POST['b_office']);
    // $borrower_rank = mysqli_real_escape_string($db->getConnection(), $_POST['b_rank']);
    // $loan_amount_5k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_loan5k_amount_rate']);
    // $monthly_payment_5k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_monthlyPayment_5k_rate']);
    // $credit_rate = mysqli_real_escape_string($db->getConnection(), $_POST['balance_5k']);
    // $amount_paid = mysqli_real_escape_string($db->getConnection(), $_POST['txt_amount_payment_5k']);
    // $is_paid = 1;
    // $current_interest = mysqli_real_escape_string($db->getConnection(), $_POST['txt_interestamount_5k']);
    // $balance_rate_5k = mysqli_real_escape_string($db->getConnection(), $_POST['txt_currentbalance_5k']);
    // $payment_option = mysqli_real_escape_string($db->getConnection(), $_POST['paymentoption_5k']);
    // $date_of_payment = mysqli_real_escape_string($db->getConnection(), $_POST['date_of_payment_5k']);
    // if(isset($_POST['penaltyrate_5k'])){
    //   $has_penalty = 1;
    // } else if(!isset($_POST['penaltyrate_5k'])){
    //   $has_penalty = 0;
    // }
    // $is_penalty_paid = 0;
    // $penalty_amount = mysqli_real_escape_string($db->getConnection(), $_POST['penaltyrate_5k']);
    // $new_current_balance_5k = $monthly_payment_5k_rate - $amount_paid;


    // echo "$loan_id";
    // echo $type_of_loanAccount;
    // echo $borrower_id;
    // echo $ctrl_no_prefix;
    // echo $fname;
    // echo $mname;
    // echo $lname;
    // echo $type_of_employee;
    // echo $office;
    // echo $borrower_rank;
    // echo $loan_amount_5k_rate;
    // echo $monthly_payment_5k_rate;
    // echo $credit_rate;
    // echo $amount_paid;
  }
}
?>