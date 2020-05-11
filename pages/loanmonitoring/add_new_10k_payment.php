<?php
namespace loan950;

use \loan950\db_access;
include("../../dbaccess/db_access.php");
echo "TEST";

if(isset($_POST['pb10k_btn_submit'])){
  echo "Hello<br>";
  $loan_id = '';
  $type_of_loanAccount = '';
  $borrower_id = '';
  $ctrl_no_prefix = '';
  $fname = '';
  $mname = '';
  $lname = '';
  $type_of_employee = '';
  $borrower_office = '';
  $borrower_rank = '';
  $loan_amount_10k_rate = '';
  $monthly_payment_10k_rate = '';
  $credit_rate = '';
  $amount_paid = '';
  $is_paid = '';
  $current_interest = '';
  $balance_rate_10k = '';
  $payment_option = '';
  $date_of_payment = '';
  $has_penalty_10k = '';
  $is_penalty_10k_paid = '';
  $penalty_10k_amount = '';
  $remarks = '';
  $penalty_count = '';
  $penalty_5k_count = '';
  $penalty_10k_count = '';
  $increment = '';
  $increment_dp = '';
  $increment_dp10k = '';
  $increment_fp = '';
  $increment_fp10k = '';
  $dp = '';
  $dp10k = '';
  $fp = '';
  $fp10k = '';
  $borrowerFullname10k = '';
  $is_new_loan = '';

  $first_payment_col_10k = '';
  $second_payment_col_10k = '';
  $third_payment_col_10k = '';
  $fourth_payment_col_10k = '';
  $fifth_payment_col_10k = '';
  $full_payment_col_10k = '';

  $first_pay_current_balance_10k = '';
  $first_pay_current_interest_10k = '';

  $second_pay_current_balance_10k = '';
  $second_pay_current_interest_10k = '';

  $third_pay_current_balance_10k = '';
  $third_pay_current_interest_10k = '';

  $fourth_pay_current_balance_10k = '';
  $fourth_pay_current_interest_10k = '';

  $fifth_pay_current_balance_10k = '';
  $fifth_pay_current_balance_10k = '';

  $full_balance_10k = '';
  $full_interest_10k = '';

  $prev_first_pay_bal = '';
  $prev_sec_pay_bal = '';
  $prev_third_pay_bal = '';
  $prev_fourth_pay_bal = '';
  $prev_fifth_pay_bal = '';

  $new_current_balance_10k = '';
  $new_current_interest_10k = '';

  if(isset($_POST['b_loanID_10k']) && isset($_POST['b_empID_10k']) && isset($_POST['b_ctrl_10k']) && isset($_POST['b_fname_10k']) && isset($_POST['b_mname_10k']) && isset($_POST['b_lname_10k']) && isset($_POST['b_type_10k']) && isset($_POST['b_rank_10k']) && isset($_POST['b_loanType_10k']) && isset($_POST['txt_loan10k_amount_rate']) && isset($_POST['txt_monthlyPayment_10k_rate']) && isset($_POST['b_office_10k']) && isset($_POST['b_dp5k']) && isset($_POST['b_dp10k']) && isset($_POST['b_dp']) && isset($_POST['b_fp']) && isset($_POST['b_fp5k']) && isset($_POST['b_fp10k']) && isset($_POST['b_penalty_count']) && isset($_POST['b_penalty_10k_count']) && isset($_POST['b_penalty_5k_count']) && isset($_POST['is_new_loan_10k']) && isset($_POST['paymentoption_10k']) && isset($_POST['txt_ctrl_number_10k']) && isset($_POST['txt_accounttype_10k']) && isset($_POST['balance_10k']) && isset($_POST['txt_currentstatus_10k']) && isset($_POST['date_of_payment_10k']) && isset($_POST['txt_amount_payment_10k']) && isset($_POST['txt_interestamount_10k']) && isset($_POST['txt_currentbalance_10k'])){
    $db = new db_access();
    $con = $db->getConnection();
    $loan_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_loanID_10k']);
    $type_of_loanAccount = mysqli_real_escape_string($db->getConnection(), $_POST['txt_accounttype_10k']);
    $borrower_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_empID_10k']);
    $ctrl_no_prefix = mysqli_real_escape_string($db->getConnection(), $_POST['b_ctrl_10k']);
    $fname = mysqli_real_escape_string($db->getConnection(), $_POST['b_fname_10k']);
    $mname = mysqli_real_escape_string($db->getConnection(), $_POST['b_mname_10k']);
    $lname = mysqli_real_escape_string($db->getConnection(), $_POST['b_lname_10k']);
    $type_of_employee = mysqli_real_escape_string($db->getConnection(), $_POST['b_type_10k']);
    $borrower_office = mysqli_real_escape_string($db->getConnection(), $_POST['b_office_10k']);
    $borrower_rank = mysqli_real_escape_string($db->getConnection(), $_POST['b_rank_10k']);
    $loan_amount_10k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_loan10k_amount_rate']);
    $monthly_payment_10k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_monthlyPayment_10k_rate']);
    $control_number_10k = mysqli_real_escape_string($db->getConnection(), $_POST['txt_ctrl_number_10k']);
    $credit_rate = mysqli_real_escape_string($db->getConnection(), $_POST['balance_10k']);
    $amount_paid = mysqli_real_escape_string($db->getConnection(), $_POST['txt_amount_payment_10k']);
    $is_paid = 1;
    $current_interest = mysqli_real_escape_string($db->getConnection(), $_POST['txt_interestamount_10k']);
    $balance_rate_10k = mysqli_real_escape_string($db->getConnection(), $_POST['txt_currentbalance_10k']);
    $payment_option = mysqli_real_escape_string($db->getConnection(), $_POST['paymentoption_10k']);
    $date_of_payment = mysqli_real_escape_string($db->getConnection(), $_POST['date_of_payment_10k']);
    if(isset($_POST['penaltyrate_10k'])){
      $penalty_10k_amount = 160;
      $has_penalty_10k = 1;
      $is_penalty_10k_paid = 1;
    } else {
      $penalty_10k_amount = 0;
      $has_penalty_10k = 0;
      $is_penalty_10k_paid = 0;
    }
    $dp5k = mysqli_real_escape_string($db->getConnection(), $_POST['b_dp5k']);
    $dp10k = mysqli_real_escape_string($db->getConnection(), $_POST['b_dp10k']);
    $dp = mysqli_real_escape_string($db->getConnection(), $_POST['b_dp']);
    $fp = mysqli_real_escape_string($db->getConnection(), $_POST['b_fp']);
    $fp5k = mysqli_real_escape_string($db->getConnection(), $_POST['b_fp5k']);
    $fp10k = mysqli_real_escape_string($db->getConnection(), $_POST['b_fp10k']);
    $penalty_count = mysqli_real_escape_string($db->getConnection(), $_POST['b_penalty_count']);
    $penalty_5k_count = mysqli_real_escape_string($db->getConnection(), $_POST['b_penalty_5k_count']);
    $penalty_10k_count = mysqli_real_escape_string($db->getConnection(), $_POST['b_penalty_10k_count']);
    $borrowerFullname10k = "$fname $mname $lname";

    echo "AYE</br>";

    if($payment_option === '1st_payment_10k'){
      echo "FIRST PAYMENT<br>";
      $new_current_balance_10k = (int)$credit_rate - (int)$amount_paid;
      $new_current_interest_10k = $current_interest;
      $remarks = "$borrowerFullname10k New Loan Payment";
      echo '1st_payment_option<br>';
      echo "<strong>2 Load ID 10k</strong>: $loan_id<br>";
      echo "<strong>3 Type Of Loan Account</strong>: $type_of_loanAccount<br>";
      echo "<strong>4 Borrower ID</strong>: $borrower_id<br>";
      echo "<strong>5 PREFIX</strong>: $ctrl_no_prefix<br>";
      echo "<strong>6 Firstname</strong>: $fname<br>";
      echo "<strong>7 Middlename</strong>: $mname<br>";
      echo "<strong>8 Lastname</strong>: $lname<br>";
      echo "<strong>9 Type Of Employee</strong>: $type_of_employee<br>";
      echo "<strong>10 Office</strong>: $borrower_office<br>";
      echo "<strong>11 Rank</strong>: $borrower_rank<br>";
      echo "<strong>11.5 Loan Amount Rate</strong>: $loan_amount_10k_rate<br>"; // 11
      echo "<strong>12 Monthly Payment</strong>: $monthly_payment_10k_rate<br>";
      echo "<strong>13 Credit</strong>: $credit_rate<br>";
      echo "<strong>14 Amount Paid</strong>: $amount_paid<br>";
      echo "<strong>15 Is Paid</strong>? $is_paid<br>";
      echo "<strong>16 Total Current Interest</strong>: $new_current_interest_10k<br>";
      echo "<strong>17 Total Current Balance</strong>: $new_current_balance_10k<br>";
      echo "<strong>18 Payment Option</strong>: $payment_option<br>";
      echo "<strong>19 Date Of Payment</strong>: $date_of_payment<br>";
      echo "<strong>20 Has Penalty</strong>? $has_penalty_10k<br>";
      echo "<strong>21 Penalty Paid</strong>: $is_penalty_10k_paid<br>";
      echo "<strong>22 Penalty Amount</strong>: $penalty_10k_amount<br>";
      echo "<strong>23 Remarks</strong>: $remarks<br>";

      echo "$dp5k<br>";
      echo "$dp10k<br>";
      echo "$dp<br>";
      echo "$fp<br>";
      echo "$fp5k<br>";
      echo "$fp10k<br>";
      echo "$penalty_count<br>";
      echo "$penalty_5k_count<br>";
      echo "$penalty_10k_count<br>";
      echo "$control_number_10k<br>";
      echo "$borrowerFullname10k<br>";
    }
  }
}
?>