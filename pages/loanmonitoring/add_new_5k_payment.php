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
  $is_new_loan = '';

  $sp_current_balance_5k = '';
  $sp_current_interest_5k = '';
  $new_balance_fp = '';
  $current_interest_fp = '';
  $amount_paid_fp = '';

  $full_balance_5k = '';
  $full_interest_5k = '';
  $sp_prev_amount_payment_5k = '';
  $sp_prev_balance_5k = '';
  $sp_prev_interest_5k = '';

  // calculations
  $new_current_balance_5k = '';
  $new_current_interest_5k = '';
//if(isset($_POST['b_loanID']) && isset($_POST['b_empID']) && isset($_POST['b_ctrl']) && isset($_POST['b_fname']) && isset($_POST['b_mname']) && isset($_POST['b_lname']) && isset($_POST['b_type']) && isset($_POST['b_rank']) && isset($_POST['b_loanType']) && isset($_POST['b_office']) && isset($_POST['txt_loan5k_amount_rate']) && isset($_POST['txt_monthlyPayment_5k_rate']) && isset($_POST['paymentoption_5k']) && isset($_POST['b_dp5k']) && isset($_POST['b_dp10k']) && isset($_POST['b_dp']) && isset($_POST['b_fp']) && isset($_POST['b_fp5k']) && isset($_POST['b_fp10k']) && isset($_POST['b_penalty_count']) && isset($_POST['b_penalty_5k_count']) && isset($_POST['b_penalty_10k_count']) && isset($_POST['txt_ctrl_number_5k']) && isset($_POST['txt_accounttype_5k']) && isset($_POST['balance_5k']) && isset($_POST['txt_currentstatus_5k']) && isset($_POST['date_of_payment_5k']) && isset($_POST['txt_amount_payment_5k']) && isset($_POST['penaltyrate_5k']) && isset($_POST['txt_interestamount_5k']) && isset($_POST['txt_currentbalance_5k'])){
  if(isset($_POST['b_loanID']) && isset($_POST['b_empID']) && isset($_POST['b_ctrl']) && isset($_POST['b_fname']) && isset($_POST['b_mname']) && isset($_POST['b_lname']) && isset($_POST['txt_accounttype_5k']) && isset($_POST['b_rank']) && isset($_POST['b_loanType']) && isset($_POST['b_office']) && isset($_POST['txt_loan5k_amount_rate']) && isset($_POST['txt_monthlyPayment_5k_rate']) && isset($_POST['paymentoption_5k']) && isset($_POST['b_dp5k']) && isset($_POST['b_dp10k']) && isset($_POST['b_dp']) && isset($_POST['b_fp']) && isset($_POST['b_fp5k']) && isset($_POST['b_fp10k']) && isset($_POST['b_penalty_count']) && isset($_POST['b_penalty_5k_count']) && isset($_POST['b_penalty_10k_count']) && isset($_POST['txt_ctrl_number_5k']) && isset($_POST['balance_5k']) && isset($_POST['date_of_payment_5k']) && isset($_POST['txt_amount_payment_5k']) && isset($_POST['txt_interestamount_5k']) && isset($_POST['txt_currentbalance_5k'])){
    $db = new db_access();
    $con = $db->getConnection();
    $loan_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_loanID']);
    $type_of_loanAccount = mysqli_real_escape_string($db->getConnection(), $_POST['txt_accounttype_5k']);
    $borrower_id = mysqli_real_escape_string($db->getConnection(), $_POST['b_empID']);
    $ctrl_no_prefix = mysqli_real_escape_string($db->getConnection(), $_POST['b_ctrl']);
    $fname = mysqli_real_escape_string($db->getConnection(), $_POST['b_fname']);
    $mname = mysqli_real_escape_string($db->getConnection(), $_POST['b_mname']);
    $lname = mysqli_real_escape_string($db->getConnection(), $_POST['b_lname']);
    $type_of_employee = mysqli_real_escape_string($db->getConnection(), $_POST['b_type']);
    $office = mysqli_real_escape_string($db->getConnection(), $_POST['b_office']);
    $borrower_rank = mysqli_real_escape_string($db->getConnection(), $_POST['b_rank']);
    $loan_amount_5k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_loan5k_amount_rate']);
    $monthly_payment_5k_rate = mysqli_real_escape_string($db->getConnection(), $_POST['txt_monthlyPayment_5k_rate']);
    $control_number = mysqli_real_escape_string($db->getConnection(), $_POST['txt_ctrl_number_5k']);
    $credit_rate = mysqli_real_escape_string($db->getConnection(), $_POST['balance_5k']);
    $amount_paid = mysqli_real_escape_string($db->getConnection(), $_POST['txt_amount_payment_5k']);
    $is_paid = 1;
    $current_interest = mysqli_real_escape_string($db->getConnection(), $_POST['txt_interestamount_5k']);
    $balance_rate_5k = mysqli_real_escape_string($db->getConnection(), $_POST['txt_currentbalance_5k']);
    $payment_option = mysqli_real_escape_string($db->getConnection(), $_POST['paymentoption_5k']);
    $date_of_payment = mysqli_real_escape_string($db->getConnection(), $_POST['date_of_payment_5k']);
    if(isset($_POST['penaltyrate_5k'])){
      $penalty_amount = 80;
      $has_penalty = 1;
      $is_penalty_paid = 1;
    } else {
      $penalty_amount = 0;
      $has_penalty = 0;
      $is_penalty_paid = 0;
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
    $borrowerFullname = "$fname $mname $lname";

    if($payment_option === '1st_payment_option'){
      $new_current_balance_5k = (int)$credit_rate - (int)$amount_paid;
      $new_current_interest_5k = (int)$loan_amount_5k_rate - (int)$amount_paid;
      $remarks = "$borrowerFullname New Loan Payment"; // apostrophe
      echo '1st_payment_option<br>';
      echo "<strong>2 Loan ID</strong>: $loan_id<br>"; // 1
      echo "<strong>3 Type of Loan Account</strong>: $type_of_loanAccount<br>"; // 2
      echo "<strong>4 Borrower ID</strong>: $borrower_id<br>"; // 3
      echo "<strong>5 PREFIX</strong>: $ctrl_no_prefix<br>"; // 4
      echo "<strong>6 Firstname</strong>: $fname<br>"; // 5
      echo "<strong>7 MiddleName</strong>: $mname<br>"; // 6
      echo "<strong>8 Lastname</strong>: $lname<br>"; // 7
      echo "<strong>9 Type Of Employee</strong>: $type_of_employee<br>"; // 8
      echo "<strong>10 Office</strong>: $office<br>"; // 9
      echo "<strong>11 Rank</strong>: $borrower_rank<br>"; // 10
      echo "<strong>11.5 Loan Amount Rate</strong>: $loan_amount_5k_rate<br>"; // 11
      echo "<strong>12 Monthly Payment</strong>: $monthly_payment_5k_rate<br>"; // 12
      echo "<strong>13 Credit</strong>: $credit_rate<br>"; // 13
      echo "<strong>14 Amount Paid</strong>: $amount_paid<br>"; // 14
      echo "<strong>15 Is paid</strong>? $is_paid<br>"; // 15
      echo "<strong>16 Total Current Interest</strong>: $new_current_interest_5k<br>"; // 16
      echo "<strong>17 Total Current Balance</strong>: $new_current_balance_5k<br>"; // 17
      echo "<strong>18 Payment Option</strong>: $payment_option<br>"; // 18
      echo "<strong>19 Date of Payment</strong>: $date_of_payment<br>"; // 19
      echo "<strong>20 Has Penalty</strong>? $has_penalty<br>"; // 20
      echo "<strong>21 Penalty Paid</strong>: $is_penalty_paid<br>"; // 21
      echo "<strong>22 Penalty Amount</strong>: $penalty_amount<br>"; // 22
      echo "<strong>23 Remarks</strong>: $remarks<br>"; // 23
      
      echo "$dp5k<br>";
      // echo "$dp10k<br>";
      echo "$dp<br>";
      echo "$fp<br>";
      echo "$fp5k<br>";
      // echo "$fp10k<br>";
      echo "$penalty_count<br>";
      echo "$penalty_5k_count<br>";
      // echo "$penalty_10k_count<br>";
      echo "$control_number<br>";
      echo "$borrowerFullname<br>";
      $add_new_payment = $db->first_payment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_rate, $amount_paid, $is_paid, $new_current_interest_5k, $new_current_balance_5k, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks);
      if($add_new_payment){
        $db->update_first_payment($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
        $db->update_is_new_loan($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
        if($type_of_employee === 'civilian'){
          $increment_dp = (int)$dp + 1;
          $increment_dp5k = (int)$dp5k + 1;
          
          $db->increment_downpayment_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp);
          $db->increment_dp5k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp5k);
        } else if($type_of_employee === 'officer'){
          $increment_dp = (int)$dp + 1;
          $increment_dp5k = (int)$dp5k + 1;

          $db->increment_downpayment_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp);
          $db->increment_dp5k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp5k);
        }
        header("Location: loanMonitoring.php");
      } else {
        printf("%s\n", $con->error);
      }
    } else if($payment_option === '2nd_payment_option'){
      echo '2st_payment_option<br>';
      $remarks = "$borrowerFullname Second Payment"; // apostrophe
      echo "<strong>2 Loan ID</strong>: $loan_id<br>"; // 1
      echo "<strong>3 Type of Loan Account</strong>: $type_of_loanAccount<br>"; // 2
      echo "<strong>4 Borrower ID</strong>: $borrower_id<br>"; // 3
      echo "<strong>5 PREFIX</strong>: $ctrl_no_prefix<br>"; // 4
      echo "<strong>6 Firstname</strong>: $fname<br>"; // 5
      echo "<strong>7 MiddleName</strong>: $mname<br>"; // 6
      echo "<strong>8 Lastname</strong>: $lname<br>"; // 7
      echo "<strong>9 Type Of Employee</strong>: $type_of_employee<br>"; // 8
      echo "<strong>10 Office</strong>: $office<br>"; // 9
      echo "<strong>11 Rank</strong>: $borrower_rank<br>"; // 10
      echo "<strong>11.5 Loan Amount Rate</strong>: $loan_amount_5k_rate<br>"; // 11
      echo "<strong>12 Monthly Payment</strong>: $monthly_payment_5k_rate<br>"; // 12
      echo "<strong>13 Credit</strong>: $credit_rate<br>"; // 13
      echo "<strong>14 Amount Paid</strong>: $amount_paid<br>"; // 14
      echo "<strong>15 Is paid</strong>? $is_paid<br>"; // 15
      echo "<strong>16 Total Current Interest</strong>: $new_current_interest_5k<br>"; // 16
      echo "<strong>17 Total Current Balance</strong>: $new_current_balance_5k<br>"; // 17
      echo "<strong>18 Payment Option</strong>: $payment_option<br>"; // 18
      echo "<strong>19 Date of Payment</strong>: $date_of_payment<br>"; // 19
      echo "<strong>20 Has Penalty</strong>? $has_penalty<br>"; // 20
      echo "<strong>21 Penalty Paid</strong>: $is_penalty_paid<br>"; // 21
      echo "<strong>22 Penalty Amount</strong>: $penalty_amount<br>"; // 22
      echo "<strong>23 Remarks</strong>: $remarks<br>"; // 23

      if(isset($_POST['new_balance_fp']) && isset($_POST['current_interest_fp']) && isset($_POST['amount_paid_fp'])){
        $new_balance_fp = mysqli_real_escape_string($con, $_POST['new_balance_fp']);
        $current_interest_fp = mysqli_real_escape_string($con, $_POST['current_interest_fp']);
        $amount_paid_fp = mysqli_real_escape_string($con, $_POST['amount_paid_fp']);
        $sp_current_balance_5k = (int)$new_balance_fp - (int)$amount_paid; // 17
        $sp_current_interest_5k = (int)$loan_amount_5k_rate - ((int)$amount_paid_fp + (int)$amount_paid); // 16

        $add_second_payment = $db->add_to_2ndpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_rate, $amount_paid, $is_paid, $sp_current_interest_5k, $sp_current_balance_5k, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks);
        if($add_second_payment){
          $db->update_second_payment($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
          echo "Second Payment Done!";
          header("Location: loanMonitoring.php");
        } else {
          printf("%s\n", $con->error);
        }
      } else {
        // do nothing...
      }
    } else if($payment_option === 'full_payment_option'){
      // if(isset($_POST['is_new_loan'])){
      //   $is_new_loan = mysqli_real_escape_string($db->getConnection(), $_POST['is_new_loan']);

      //   if($is_new_loan == 1){
      //     $full_balance_5k = (int)$credit_rate - (int)$amount_paid;
      //     $full_interest_5k = (int)$amount_paid - (int)$loan_amount_5k_rate;

      //     echo "$credit_rate<br>";
      //     echo "$amount_paid<br>";
      //     echo "$loan_amount_5k_rate<br>";
      //     echo "$full_balance_5k<br>";
      //     echo "$full_interest_5k<br>";

      //     $full_payment_5k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_5k, $full_balance_5k, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks);
      //     if($full_payment_5k){
      //       $db->update_full_payment($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
      //       $db->update_loan_status($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
      //       $db->update_is_new_loan($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
      //       if($type_of_employee === 'civilian'){
      //         $increment_fp = (int)$fp + 1;
      //         $increment_fp5k = (int)$fp5k + 1;
      //         $db->increment_fullpayment_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_fp);
      //         $db->increment_fp_5k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_fp5k);
      //       } else if($type_of_employee === 'officer'){
      //         $increment_fp = (int)$fp + 1;
      //         $increment_fp5k = (int)$fp5k + 1;
      //         $db->increment_fp_5k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_fp);
      //         $db->increment_fullpayment_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_fp5k);
      //       }
      //       echo "Fully paid!";
      //       header("Location: loanMonitoring.php");
      //     } else {
      //       printf("%s\n", $con->error);
      //     }
        } else { // if not new loan
          echo "Full Payment<br>";
          $remarks = "$borrowerFullname Full Payment";
          echo "<strong>2 Loan ID</strong>: $loan_id<br>"; // 1
          echo "<strong>3 Type of Loan Account</strong>: $type_of_loanAccount<br>"; // 2
          echo "<strong>4 Borrower ID</strong>: $borrower_id<br>"; // 3
          echo "<strong>5 PREFIX</strong>: $ctrl_no_prefix<br>"; // 4
          echo "<strong>6 Firstname</strong>: $fname<br>"; // 5
          echo "<strong>7 MiddleName</strong>: $mname<br>"; // 6
          echo "<strong>8 Lastname</strong>: $lname<br>"; // 7
          echo "<strong>9 Type Of Employee</strong>: $type_of_employee<br>"; // 8
          echo "<strong>10 Office</strong>: $office<br>"; // 9
          echo "<strong>11 Rank</strong>: $borrower_rank<br>"; // 10
          echo "<strong>11.5 Loan Amount Rate</strong>: $loan_amount_5k_rate<br>"; // 11
          echo "<strong>12 Monthly Payment</strong>: $monthly_payment_5k_rate<br>"; // 12
          echo "<strong>13 Credit</strong>: $credit_rate<br>"; // 13
          echo "<strong>14 Amount Paid</strong>: $amount_paid<br>"; // 14
          echo "<strong>15 Is paid</strong>? $is_paid<br>"; // 15
          echo "<strong>16 Total Current Interest</strong>: $new_current_interest_5k<br>"; // 16
          echo "<strong>17 Total Current Balance</strong>: $new_current_balance_5k<br>"; // 17
          echo "<strong>18 Payment Option</strong>: $payment_option<br>"; // 18
          echo "<strong>19 Date of Payment</strong>: $date_of_payment<br>"; // 19
          echo "<strong>20 Has Penalty</strong>? $has_penalty<br>"; // 20
          echo "<strong>21 Penalty Paid</strong>: $is_penalty_paid<br>"; // 21
          echo "<strong>22 Penalty Amount</strong>: $penalty_amount<br>"; // 22
          echo "<strong>23 Remarks</strong>: $remarks<br>"; // 23
          echo "<strong>ISNEWLOAN </strong>: $is_new_loan<br>";
  
          if(isset($_POST['amount_paid_fp']) && isset($_POST['amount_paid_sp']) && isset($_POST['new_balance_sp']) && isset($_POST['current_interest_sp'])){
            $sp_prev_balance_5k = mysqli_real_escape_string($con, $_POST['new_balance_sp']);
            $sp_prev_interest_5k = mysqli_real_escape_string($con, $_POST['current_interest_sp']);
            $sp_prev_amount_payment_5k = mysqli_real_escape_string($con, $_POST['amount_paid_sp']);
            $fp_prev_amount_payment_5k = mysqli_real_escape_string($con, $_POST['amount_paid_fp']);
            $full_balance_5k = (int)$sp_prev_balance_5k - (int)$amount_paid;
            $full_interest_5k = ((int)$fp_prev_amount_payment_5k + (int)$sp_prev_amount_payment_5k + (int)$amount_paid) - $loan_amount_5k_rate;
  
            echo "Previous Balance: $sp_prev_balance_5k<br>";	
            echo "Previous Interest: $sp_prev_interest_5k<br>";	
            echo "2nd Payment: $sp_prev_amount_payment_5k<br>";	
            echo "First Payment: $fp_prev_amount_payment_5k<br>";	
            echo "Amount Paid: $amount_paid<br>";	
            echo "Full Balance: $full_balance_5k<br>";	
            echo "Full Interest: $full_interest_5k<br>";
  
            $full_payment_5k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_5k, $full_balance_5k, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks);
            if($full_payment_5k){
              $db->update_full_payment($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
              $db->update_loan_status($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
              echo "Fully paid!";
              header("Location: loanMonitoring.php");
            } else {
              printf("%s\n", $con->error);
            }
          } else {
            // do nothing...
          }
        } 
      } else {
        // do nothing if is_new_loan isn't set
      }
    } else {
      // do nothing...
    }
  } else {
    // do nothing...
  }
} else {
  echo "Forbidden Access!";
  header("Location: loanMonitoring.php");
}
?>