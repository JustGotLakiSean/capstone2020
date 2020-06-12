<?php

namespace loan950;

use \loan950\db_access;

include("../../dbaccess/db_access.php");
echo "TEST";

if (isset($_POST['pb10k_btn_submit'])) {
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
  $increment_penalty_count = '';
  $increment_penalty10k_count = '';
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
  $fifth_pay_current_interest_10k = '';

  $sixth_pay_current_balance_10k = '';
  $sixth_pay_current_interest_10k = '';

  $full_balance_10k = '';
  $full_interest_10k = '';

  $prev_fp_bal = '';
  $prev_sec_pay = '';
  $prev_third_pay = '';
  $prev_fourth_pay = '';
  $prev_fifth_pay = '';

  $new_current_balance_10k = '';
  $new_current_interest_10k = '';

  if (isset($_POST['b_loanID_10k']) && isset($_POST['b_empID_10k']) && isset($_POST['b_ctrl_10k']) && isset($_POST['b_fname_10k']) && isset($_POST['b_mname_10k']) && isset($_POST['b_lname_10k']) && isset($_POST['b_type_10k']) && isset($_POST['b_rank_10k']) && isset($_POST['b_loanType_10k']) && isset($_POST['txt_loan10k_amount_rate']) && isset($_POST['txt_monthlyPayment_10k_rate']) && isset($_POST['b_office_10k']) && isset($_POST['b_dp5k']) && isset($_POST['b_dp10k']) && isset($_POST['b_dp']) && isset($_POST['b_fp']) && isset($_POST['b_fp5k']) && isset($_POST['b_fp10k']) && isset($_POST['b_penalty_count']) && isset($_POST['b_penalty_10k_count']) && isset($_POST['b_penalty_5k_count']) && isset($_POST['paymentoption_10k']) && isset($_POST['txt_ctrl_number_10k']) && isset($_POST['txt_accounttype_10k']) && isset($_POST['balance_10k']) && isset($_POST['txt_currentstatus_10k']) && isset($_POST['date_of_payment_10k']) && isset($_POST['txt_amount_payment_10k']) && isset($_POST['txt_interestamount_10k']) && isset($_POST['txt_currentbalance_10k'])) {
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
    // if (isset($_POST['penaltyrate_10k'])) {
    //   $penalty_10k_amount = 160;
    //   $has_penalty_10k = 1;
    //   $is_penalty_10k_paid = 1;
    //   $increment_penalty_count = (int)$penalty_count + 1;
    //   $increment_penalty10k_count = (int)$penalty_10k_count + 1;
    // } else {
    //   $penalty_10k_amount = 0;
    //   $has_penalty_10k = 0;
    //   $is_penalty_10k_paid = 0;
    // }
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

    if ($payment_option === '1st_payment_10k') {
      echo "FIRST PAYMENT<br>";
      $new_current_balance_10k = (int) $credit_rate - (int) $amount_paid;
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

      if (isset($_POST['penaltyrate_10k'])) {
        $penalty_10k_amount = 160;
        $has_penalty_10k = 1;
        $is_penalty_10k_paid = 1;
        $increment_penalty_count = (int) $penalty_count + 1;
        $increment_penalty10k_count = (int) $penalty_10k_count + 1;

        if ($type_of_employee === 'civilian') {
          $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
          $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
        } else if ($type_of_employee === 'officer') {
          $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
          $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
        }
      } else {
        $penalty_10k_amount = 0;
        $has_penalty_10k = 0;
        $is_penalty_10k_paid = 0;
      }

      $add_new_payment_10k = $db->first_payment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $new_current_interest_10k, $new_current_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
      if ($add_new_payment_10k) {
        $db->update_first_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
        $db->update_is_new_loan_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);

        if ($type_of_employee === 'civilian') {
          $increment_dp = (int) $dp + 1;
          $increment_dp10k = (int) $dp10k + 1;
          $db->increment_downpayment_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp);
          $db->update_dp10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp10k);
        } else if ($type_of_employee === 'officer') {
          $increment_dp = (int) $dp + 1;
          $increment_dp10k = (int) $dp10k + 1;
          $db->increment_downpayment_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp);
          $db->increment_dp10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_dp10k);
        }

        header("Location: loanMonitoring.php");
      } else {
        printf("%s\n", $con->error);
      }
    } else if ($payment_option === '2nd_payment_10k') {
      $remarks = "$borrowerFullname10k New Loan Payment";
      echo '2nd_payment_option<br>';
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

      if (isset($_POST['prev_fp_pay']) && isset($_POST['prev_fp_bal']) && isset($_POST['prev_fp_interest'])) {
        $prev_fp_bal = mysqli_real_escape_string($con, $_POST['prev_fp_bal']);
        $prev_fp_interest = mysqli_real_escape_string($con, $_POST['prev_fp_interest']);
        $prev_fp_pay = mysqli_real_escape_string($con, $_POST['prev_fp_pay']);

        $second_pay_current_balance_10k = (int) $prev_fp_bal - (int) $amount_paid;
        $second_pay_current_interest_10k = $prev_fp_interest;

        echo "AMOU PAID: $amount_paid<br>";

        echo "PREV BAL: $prev_fp_bal<br>";
        echo "PREV INT: $prev_fp_interest<br>";
        echo "PREV PAY: $prev_fp_pay<br>";
        echo "NEW BAL: $second_pay_current_balance_10k<br>";
        echo "NEW INT: $second_pay_current_interest_10k<br>";

        if (isset($_POST['penaltyrate_10k'])) {
          $penalty_10k_amount = 160;
          $has_penalty_10k = 1;
          $is_penalty_10k_paid = 1;
          $increment_penalty_count = (int) $penalty_count + 1;
          $increment_penalty10k_count = (int) $penalty_10k_count + 1;

          if ($type_of_employee === 'civilian') {
            $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          } else if ($type_of_employee === 'officer') {
            $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          }
        } else {
          $penalty_10k_amount = 0;
          $has_penalty_10k = 0;
          $is_penalty_10k_paid = 0;
        }

        $add_second_payment_10k = $db->add_to_2ndpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $second_pay_current_interest_10k, $second_pay_current_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
        if ($add_second_payment_10k) {
          $db->update_second_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
          echo "Second Payment Done!";
          header("Location: loanMonitoring.php");
        } else {
          printf("%s\n", $con->error);
        }
      } else {
        // do nothing...
      }
    } else if ($payment_option === '3rd_payment_10k') {
      echo "3RD PAY<br>";
      $remarks = "$borrowerFullname10k New Loan Payment";
      echo '2nd_payment_option<br>';
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

      if (isset($_POST['prev_second_pay']) && isset($_POST['prev_second_bal']) && isset($_POST['prev_second_interest'])) {
        $prev_second_pay = mysqli_real_escape_string($con, $_POST['prev_second_pay']);
        $prev_second_bal = mysqli_real_escape_string($con, $_POST['prev_second_bal']);
        $prev_second_interest = mysqli_real_escape_string($con, $_POST['prev_second_interest']);

        $third_pay_current_balance_10k = (int) $prev_second_bal - (int) $amount_paid;
        $third_pay_current_interest_10k = $prev_second_interest;

        echo "AMOUNT PAID 3RD: $amount_paid<br>";

        echo "PREV BAL: $prev_second_bal<br>";
        echo "PREV INT: $prev_second_interest<br>";
        echo "PREV PAY: $prev_second_pay<br>";
        echo "NEW BAL: $third_pay_current_balance_10k<br>";
        echo "NEW INIT: $third_pay_current_interest_10k<br>";

        if (isset($_POST['penaltyrate_10k'])) {
          $penalty_10k_amount = 160;
          $has_penalty_10k = 1;
          $is_penalty_10k_paid = 1;
          $increment_penalty_count = (int) $penalty_count + 1;
          $increment_penalty10k_count = (int) $penalty_10k_count + 1;

          if ($type_of_employee === 'civilian') {
            $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          } else if ($type_of_employee === 'officer') {
            $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          }
        } else {
          $penalty_10k_amount = 0;
          $has_penalty_10k = 0;
          $is_penalty_10k_paid = 0;
        }

        $add_third_payment_10k = $db->add_to_3rdpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $third_pay_current_interest_10k, $third_pay_current_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
        if ($add_third_payment_10k) {
          $db->update_third_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
          echo "Third Payment<br>";
          header("Location: loanMonitoring.php");
        } else {
          printf("%s\n", $con->error);
        }
      } else {
        // do nothing...
      }
    } else if ($payment_option === '4th_payment_10k') {
      echo "4th PAY<br>";
      $remarks = "$borrowerFullname10k New Loan Payment";
      echo '4th_payment_option<br>';
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

      if (isset($_POST['prev_third_pay']) && isset($_POST['prev_third_bal']) && isset($_POST['prev_third_interest'])) {
        $prev_third_pay = mysqli_real_escape_string($con, $_POST['prev_third_pay']);
        $prev_third_bal = mysqli_real_escape_string($con, $_POST['prev_third_bal']);
        $prev_third_interest = mysqli_real_escape_string($con, $_POST['prev_third_interest']);

        $fourth_pay_current_balance_10k = (int) $prev_third_bal - (int) $amount_paid;
        $fourth_pay_current_interest_10k = $prev_third_interest;

        echo "AMOUNT PAID 4TH: $amount_paid<br>";
        echo "PREV BAL: $prev_third_bal<br>";
        echo "PREV INT: $prev_third_interest<br>";
        echo "PREV PAY: $prev_third_pay<br>";
        echo "NEW BAL: $fourth_pay_current_balance_10k<br>";
        echo "NEW INT: $fourth_pay_current_interest_10k<br>";

        if (isset($_POST['penaltyrate_10k'])) {
          $penalty_10k_amount = 160;
          $has_penalty_10k = 1;
          $is_penalty_10k_paid = 1;
          $increment_penalty_count = (int) $penalty_count + 1;
          $increment_penalty10k_count = (int) $penalty_10k_count + 1;

          if ($type_of_employee === 'civilian') {
            $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          } else if ($type_of_employee === 'officer') {
            $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          }
        } else {
          $penalty_10k_amount = 0;
          $has_penalty_10k = 0;
          $is_penalty_10k_paid = 0;
        }

        $add_fourth_payment_10k = $db->add_to_4thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $fourth_pay_current_interest_10k, $fourth_pay_current_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
        if ($add_fourth_payment_10k) {
          $db->update_fourth_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
          echo "FOURTH PAYMENT<br>";
          header("Location: loanMonitoring.php");
        } else {
          printf("%s\n", $con->error);
        }
      } else {
        // do nothing...
      }
    } else if ($payment_option === '5th_payment_10k') {
      echo "5TH PAYMENT<br>";
      $remarks = "$borrowerFullname10k New Loan Payment";
      echo '4th_payment_option<br>';
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

      if (isset($_POST['prev_fourth_pay']) && isset($_POST['prev_fourth_bal']) && isset($_POST['prev_fourth_interest'])) {
        $prev_fourth_pay = mysqli_real_escape_string($con, $_POST['prev_fourth_pay']);
        $prev_fourth_bal = mysqli_real_escape_string($con, $_POST['prev_fourth_bal']);
        $prev_fourth_interest = mysqli_real_escape_string($con, $_POST['prev_fourth_interest']);

        $fifth_pay_current_balance_10k = (int) $prev_fourth_bal - (int) $amount_paid;
        $fifth_pay_current_interest_10k = (int) $prev_fourth_interest;

        echo "AMOUNT PAID 5TH: $amount_paid<br>";
        echo "PREV BAL: $prev_fourth_bal<br>";
        echo "PREV INT: $prev_fourth_interest<br>";
        echo "PREV PAY: $prev_fourth_pay<br>";
        echo "NEW BAL: $fifth_pay_current_balance_10k<br>";
        echo "NEW INT: $fifth_pay_current_interest_10k<br>";

        if (isset($_POST['penaltyrate_10k'])) {
          $penalty_10k_amount = 160;
          $has_penalty_10k = 1;
          $is_penalty_10k_paid = 1;
          $increment_penalty_count = (int) $penalty_count + 1;
          $increment_penalty10k_count = (int) $penalty_10k_count + 1;

          if ($type_of_employee === 'civilian') {
            $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          } else if ($type_of_employee === 'officer') {
            $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          }
        } else {
          $penalty_10k_amount = 0;
          $has_penalty_10k = 0;
          $is_penalty_10k_paid = 0;
        }

        $add_fifth_payment_10k = $db->add_to_5thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $fifth_pay_current_interest_10k, $fifth_pay_current_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
        if ($add_fifth_payment_10k) {
          $db->update_fifth_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
          echo "FIFTH PAYMENT<br>";
          header("Location: loanMonitoring.php");
        } else {
          printf("%s\n", $con->error);
        }
      } else {
        // do nothing...
      }
    } else if ($payment_option === '6th_payment_10k') {
      echo "6TH<br>";
      $remarks = "$borrowerFullname10k New Loan Payment";
      echo '6th_payment_option<br>';
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

      if (isset($_POST['prev_fifth_pay']) && isset($_POST['prev_fifth_bal']) && isset($_POST['prev_fifth_interest'])) {
        $prev_fifth_pay = mysqli_real_escape_string($con, $_POST['prev_fifth_pay']);
        $prev_fifth_bal = mysqli_real_escape_string($con, $_POST['prev_fifth_bal']);
        $prev_fifth_interest = mysqli_real_escape_string($con, $_POST['prev_fifth_interest']);

        $sixth_pay_current_balance_10k = (int) $prev_fifth_bal - (int) $amount_paid;
        $sixth_pay_current_interest_10k = (int) $prev_fifth_interest;

        echo "AMOUNT PAID 6TH: $amount_paid<br>";
        echo "PREV BAL: $prev_fifth_bal<br>";
        echo "PREV INT: $prev_fifth_interest<br>";
        echo "PREV PAY: $prev_fifth_pay<br>";
        echo "NEW BAL: $sixth_pay_current_balance_10k<br>";
        echo "NEW INT: $sixth_pay_current_interest_10k<br>";

        if (isset($_POST['penaltyrate_10k'])) {
          $penalty_10k_amount = 160;
          $has_penalty_10k = 1;
          $is_penalty_10k_paid = 1;
          $increment_penalty_count = (int) $penalty_count + 1;
          $increment_penalty10k_count = (int) $penalty_10k_count + 1;

          if ($type_of_employee === 'civilian') {
            $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          } else if ($type_of_employee === 'officer') {
            $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
            $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
          }
        } else {
          $penalty_10k_amount = 0;
          $has_penalty_10k = 0;
          $is_penalty_10k_paid = 0;
        }

        $add_sixth_payment_10k = $db->add_to_6thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $sixth_pay_current_interest_10k, $sixth_pay_current_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
        if ($add_sixth_payment_10k) {
          $db->update_sixth_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
          echo "SIXTH PAYMENT<br>";
          header("LOCATION: loanMonitoring.php");
        } else {
          printf("%s\n", $con->error);
        }
      } else {
        // do nothing...
      }
    } else if ($payment_option === 'full_payment_10k') {
      // $_POST['is_new_loan_10k']) && isset($_POST['first_payment_col_10k']) && isset($_POST['second_payment_col_10k']) && isset($_POST['third_payment_col_10k']) && isset($_POST['fourth_payment_col_10k']) && isset($_POST['fifth_payment_col_10k']) && isset($_POST['sixth_payment_col_10k']) && isset($_POST['full_payment_col_10k'])
      if (isset($_POST['is_new_loan_10k']) && isset($_POST['first_payment_col_10k']) && isset($_POST['second_payment_col_10k']) && isset($_POST['third_payment_col_10k']) && isset($_POST['fourth_payment_col_10k']) && isset($_POST['fifth_payment_col_10k']) && isset($_POST['sixth_payment_col_10k']) && isset($_POST['fullpayment_col_10k'])) {
        $is_new_loan_10k = mysqli_real_escape_string($db->getConnection(), $_POST['is_new_loan_10k']);
        $first_payment_col_10k = mysqli_real_escape_string($db->getConnection(), $_POST['first_payment_col_10k']);
        $second_payment_col_10k = mysqli_real_escape_string($db->getConnection(), $_POST['second_payment_col_10k']);
        $third_payment_col_10k = mysqli_real_escape_string($db->getConnection(), $_POST['third_payment_col_10k']);
        $fourth_payment_col_10k = mysqli_real_escape_string($db->getConnection(), $_POST['fourth_payment_col_10k']);
        $fifth_payment_col_10k = mysqli_real_escape_string($db->getConnection(), $_POST['fifth_payment_col_10k']);
        $sixth_payment_col_10k = mysqli_real_escape_string($db->getConnection(), $_POST['sixth_payment_col_10k']);
        $full_payment_col_10k = mysqli_real_escape_string($db->getConnection(), $_POST['fullpayment_col_10k']);

        echo "$is_new_loan_10k<br>";
        echo "$first_payment_col_10k<br>";
        echo "$second_payment_col_10k<br>";
        echo "$third_payment_col_10k<br>";
        echo "$fourth_payment_col_10k<br>";
        echo "$fifth_payment_col_10k<br>";
        echo "$sixth_payment_col_10k<br>";
        echo "$full_payment_col_10k<br>";

        if ($is_new_loan_10k == 1 && $first_payment_col_10k == 0 && $second_payment_col_10k == 0 && $third_payment_col_10k == 0 && $fourth_payment_col_10k == 0 && $fifth_payment_col_10k == 0 && $sixth_payment_col_10k == 0 && $full_payment_col_10k == 0) {
          $remarks = "$borrowerFullname10k Full Payment";
          $full_balance_10k = (int) $credit_rate - (int) $amount_paid;
          $full_interest_10k = $current_interest;

          echo "$current_interest<br>";
          echo "$amount_paid<br>";
          echo "$credit_rate<br>";
          echo "$full_balance_10k<br>";
          echo "$full_interest_10k<br>";

          echo "FIRST PAYMENT: Fully Paid<br>";

          if (isset($_POST['penaltyrate_10k'])) {
            $penalty_10k_amount = 160;
            $has_penalty_10k = 1;
            $is_penalty_10k_paid = 1;
            $increment_penalty_count = (int) $penalty_count + 1;
            $increment_penalty10k_count = (int) $penalty_10k_count + 1;

            if ($type_of_employee === 'civilian') {
              $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
              $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
            } else if ($type_of_employee === 'officer') {
              $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
              $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
            }
          } else {
            $penalty_10k_amount = 0;
            $has_penalty_10k = 0;
            $is_penalty_10k_paid = 0;
          }

          $full_payment_10k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_10k, $full_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
          if ($full_payment_10k) {
            $db->update_full_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
            $db->update_loan_status_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
            $db->update_is_new_loan_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
            if ($type_of_employee === 'civilian') {
              $increment_fp = (int) $fp + 1;
              $increment_fp10k = (int) $fp10k + 1;
              $db->increment_fullpayment_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
              $db->increment_fp_10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
              echo "FULLY PAID!";
              header("Location: loanMonitoring.php");
            } else {
              printf("%s\n", $con->error);
            }
          } else if ($is_new_loan_10k == 0 && $first_payment_col_10k == 1 && $second_payment_col_10k == 0 && $third_payment_col_10k == 0 && $fourth_payment_col_10k == 0 && $fifth_payment_col_10k == 0 && $sixth_payment_col_10k == 0 && $full_payment_col_10k == 0) {
            echo "SECOND PAYMENT: Fully Paid<br>";
            if (isset($_POST['prev_fp_pay']) && isset($_POST['prev_fp_bal']) && isset($_POST['prev_fp_interest'])) {
              $prev_fp_pay = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fp_pay']);
              $prev_fp_bal = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fp_bal']);
              $prev_fp_interest = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fp_interest']);
              $full_balance_10k = (int) $prev_fp_bal - (int) $amount_paid;
              $full_interest_10k = $prev_fp_interest;
              $remarks = "$borrowerFullname10k Full Payment";

              echo "PREV BAL: $prev_fp_bal<br>";
              echo "PREV PAY: $prev_fp_pay<br>";
              echo "PREV INT: $prev_fp_interest<br>";
              echo "PAID: $amount_paid<br>";
              echo "NEW FULL BAL: $full_balance_10k<br>";
              echo "NEW FULL INT: $full_interest_10k<br>";

              if (isset($_POST['penaltyrate_10k'])) {
                $penalty_10k_amount = 160;
                $has_penalty_10k = 1;
                $is_penalty_10k_paid = 1;
                $increment_penalty_count = (int) $penalty_count + 1;
                $increment_penalty10k_count = (int) $penalty_10k_count + 1;

                if ($type_of_employee === 'civilian') {
                  $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                } else if ($type_of_employee === 'officer') {
                  $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                }
              } else {
                $penalty_10k_amount = 0;
                $has_penalty_10k = 0;
                $is_penalty_10k_paid = 0;
              }

              $full_payment_10k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_10k, $full_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
              if ($full_payment_10k) {
                $db->update_full_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                $db->update_loan_status_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                echo "FULLY PAID<br>";
                header("Location: loanMonitoring.php");
              } else {
                printf("%s\n", $con->error);
              }
            } else {
            }
          } else if ($is_new_loan_10k == 0 && $first_payment_col_10k == 1 && $second_payment_col_10k == 1 && $third_payment_col_10k == 0 && $fourth_payment_col_10k == 0 && $fifth_payment_col_10k == 0 && $sixth_payment_col_10k == 0 && $full_payment_col_10k == 0) {
            echo "THIRD PAY: FULL PAYMENT<br>";
            if (isset($_POST['prev_second_pay']) && isset($_POST['prev_second_bal']) && isset($_POST['prev_second_interest'])) {
              $prev_second_pay = mysqli_real_escape_string($db->getConnection(), $_POST['prev_second_pay']);
              $prev_second_bal = mysqli_real_escape_string($db->getConnection(), $_POST['prev_second_bal']);
              $prev_second_interest = mysqli_real_escape_string($db->getConnection(), $_POST['prev_second_interest']);
              $remarks = "$borrowerFullname10k Full Payment";

              $full_balance_10k = (int) $prev_second_bal - (int) $amount_paid;
              $full_interest_10k = $prev_second_interest;

              echo "PREV BAL: $prev_second_bal<br>";
              echo "PREV PAY: $prev_second_pay<br>";
              echo "PREV INT: $prev_second_interest<br>";
              echo "PAID: $amount_paid<br>";
              echo "NEW FULL BAL: $full_balance_10k<br>";
              echo "NEW FULL INT: $full_interest_10k<br>";

              if (isset($_POST['penaltyrate_10k'])) {
                $penalty_10k_amount = 160;
                $has_penalty_10k = 1;
                $is_penalty_10k_paid = 1;
                $increment_penalty_count = (int) $penalty_count + 1;
                $increment_penalty10k_count = (int) $penalty_10k_count + 1;

                if ($type_of_employee === 'civilian') {
                  $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                } else if ($type_of_employee === 'officer') {
                  $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                }
              } else {
                $penalty_10k_amount = 0;
                $has_penalty_10k = 0;
                $is_penalty_10k_paid = 0;
              }

              $full_payment_10k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_10k, $full_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
              if ($full_payment_10k) {
                $db->update_full_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                $db->update_loan_status_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                echo "FULLY PAID<br>";
                header("Location: loanMonitoring.php");
              } else {
                printf("%s\n", $con->error);
              }
            } else {
            }
          } else if ($is_new_loan_10k == 0 && $first_payment_col_10k == 1 && $second_payment_col_10k == 1 && $third_payment_col_10k == 1 && $fourth_payment_col_10k == 0 && $fifth_payment_col_10k == 0 && $sixth_payment_col_10k == 0 && $full_payment_col_10k == 0) {
            echo "FOURTH PAY: FULL PAYMENT<br>";
            if (isset($_POST['prev_third_pay']) && isset($_POST['prev_third_bal']) && isset($_POST['prev_third_interest'])) {
              $prev_third_pay = mysqli_real_escape_string($db->getConnection(), $_POST['prev_third_pay']);
              $prev_third_bal = mysqli_real_escape_string($db->getConnection(), $_POST['prev_third_bal']);
              $prev_third_interest = mysqli_real_escape_string($db->getConnection(), $_POST['prev_third_interest']);
              $remarks = "$borrowerFullname10k Full Payment";

              $full_balance_10k = (int) $prev_third_bal - (int) $amount_paid;
              $full_interest_10k = $prev_third_interest;

              echo "PREV BAL: $prev_third_bal<br>";
              echo "PREV PAY: $prev_third_pay<br>";
              echo "PREV INT: $prev_third_interest<br>";
              echo "PAID: $amount_paid<br>";
              echo "NEW FULL BAL: $full_balance_10k<br>";
              echo "NEW FULL INT: $full_interest_10k<br>";

              if (isset($_POST['penaltyrate_10k'])) {
                $penalty_10k_amount = 160;
                $has_penalty_10k = 1;
                $is_penalty_10k_paid = 1;
                $increment_penalty_count = (int) $penalty_count + 1;
                $increment_penalty10k_count = (int) $penalty_10k_count + 1;

                if ($type_of_employee === 'civilian') {
                  $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                } else if ($type_of_employee === 'officer') {
                  $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                }
              } else {
                $penalty_10k_amount = 0;
                $has_penalty_10k = 0;
                $is_penalty_10k_paid = 0;
              }

              $full_payment_10k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_10k, $full_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
              if ($full_payment_10k) {
                $db->update_full_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                $db->update_loan_status_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                echo "FULLY PAID<br>";
                header("Location: loanMonitoring.php");
              } else {
                printf("%s\n", $con->error);
              }
            } else {
            }
          } else if ($is_new_loan_10k == 0 && $first_payment_col_10k == 1 && $second_payment_col_10k == 1 && $third_payment_col_10k == 1 && $fourth_payment_col_10k == 1 && $fifth_payment_col_10k == 0 && $sixth_payment_col_10k == 0 && $full_payment_col_10k == 0) {
            if (isset($_POST['prev_fourth_pay']) && isset($_POST['prev_fourth_bal']) && isset($_POST['prev_fourth_interest'])) {
              echo "FIFTH PAY: FULL PAYMENT<br>";
              $prev_fourth_pay = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fourth_pay']);
              $prev_fourth_bal = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fourth_bal']);
              $prev_fourth_interest = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fourth_interest']);
              $remarks = "$borrowerFullname10k Full Payment";

              $full_balance_10k = (int) $prev_fourth_bal - (int) $amount_paid;
              $full_interest_10k = $prev_fourth_interest;

              echo "PREV BAL: $prev_fourth_bal<br>";
              echo "PREV PAY: $prev_fourth_pay<br>";
              echo "PREV INT: $prev_fourth_interest<br>";
              echo "PAID: $amount_paid<br>";
              echo "NEW FULL BAL: $full_balance_10k<br>";
              echo "NEW FULL INT: $full_interest_10k<br>";

              if (isset($_POST['penaltyrate_10k'])) {
                $penalty_10k_amount = 160;
                $has_penalty_10k = 1;
                $is_penalty_10k_paid = 1;
                $increment_penalty_count = (int) $penalty_count + 1;
                $increment_penalty10k_count = (int) $penalty_10k_count + 1;

                if ($type_of_employee === 'civilian') {
                  $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                } else if ($type_of_employee === 'officer') {
                  $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                }
              } else {
                $penalty_10k_amount = 0;
                $has_penalty_10k = 0;
                $is_penalty_10k_paid = 0;
              }

              $full_payment_10k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_10k, $full_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
              if ($full_payment_10k) {
                $db->update_full_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                $db->update_loan_status_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                echo "FULLY PAID<br>";
                header("Location: loanMonitoring.php");
              } else {
                printf("%s\n", $con->error);
              }
            } else {
            }
          } else if ($is_new_loan_10k == 0 && $first_payment_col_10k == 1 && $second_payment_col_10k == 1 && $third_payment_col_10k == 1 && $fourth_payment_col_10k == 1 && $fifth_payment_col_10k == 1 && $sixth_payment_col_10k == 0 && $full_payment_col_10k == 0) {
            echo "SIXTH PAY: FULL PAYMENT<br>";
            if (isset($_POST['prev_fifth_pay']) && isset($_POST['prev_fifth_bal']) && isset($_POST['prev_fifth_interest'])) {
              $prev_fifth_pay = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fifth_pay']);
              $prev_fifth_bal = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fifth_bal']);
              $prev_fifth_interest = mysqli_real_escape_string($db->getConnection(), $_POST['prev_fifth_interest']);
              $remarks = "$borrowerFullname10k Full Payment";

              $full_balance_10k = (int) $prev_fifth_bal - (int) $amount_paid;
              $full_interest_10k = $prev_fifth_interest;

              echo "PREV BAL: $prev_fifth_bal<br>";
              echo "PREV PAY: $prev_fifth_pay<br>";
              echo "PREV INT: $prev_fifth_interest<br>";
              echo "PAID: $amount_paid<br>";
              echo "NEW FULL BAL: $full_balance_10k<br>";
              echo "NEW FULL INTEREST: $full_interest_10k<br>";

              if (isset($_POST['penaltyrate_10k'])) {
                $penalty_10k_amount = 160;
                $has_penalty_10k = 1;
                $is_penalty_10k_paid = 1;
                $increment_penalty_count = (int) $penalty_count + 1;
                $increment_penalty10k_count = (int) $penalty_10k_count + 1;

                if ($type_of_employee === 'civilian') {
                  $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                } else if ($type_of_employee === 'officer') {
                  $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                }
              } else {
                $penalty_10k_amount = 0;
                $has_penalty_10k = 0;
                $is_penalty_10k_paid = 0;
              }

              $full_payment_10k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_10k, $full_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
              if ($full_payment_10k) {
                $db->update_full_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                $db->update_loan_status_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                echo "FULLY PAID<br>";
                header("Location: loanMonitoring.php");
              } else {
                printf("%s\n", $con->error);
              }
            } else {
            }
          } else if ($is_new_loan_10k == 0 && $first_payment_col_10k == 1 && $second_payment_col_10k == 1 && $third_payment_col_10k == 1 && $fourth_payment_col_10k == 1 && $fifth_payment_col_10k == 1 && $sixth_payment_col_10k == 1 && $full_payment_col_10k == 0) {
            echo "FULL<br>";
            $remarks = "$borrowerFullname10k New Loan Payment";
            echo '4th_payment_option<br>';
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

            if (isset($_POST['prev_sixth_pay']) && isset($_POST['prev_sixth_bal']) && isset($_POST['prev_sixth_interest'])) {
              $prev_sixth_pay = mysqli_real_escape_string($con, $_POST['prev_sixth_pay']);
              $prev_sixth_bal = mysqli_real_escape_string($con, $_POST['prev_sixth_bal']);
              $prev_sixth_interest = mysqli_real_escape_string($con, $_POST['prev_sixth_interest']);

              $full_balance_10k = (int) $prev_sixth_bal - (int) $amount_paid;
              $full_interest_10k = $prev_sixth_interest;

              echo "AMOUNT PAID FULL: $amount_paid<br>";
              echo "PREV BAL: $prev_sixth_bal<br>";
              echo "PREV INT: $prev_sixth_interest<br>";
              echo "PREV PAY: $prev_sixth_pay<br>";
              echo "NEW BAL: $full_balance_10k<br>";
              echo "NEW INT: $full_interest_10k<br>";

              if (isset($_POST['penaltyrate_10k'])) {
                $penalty_10k_amount = 160;
                $has_penalty_10k = 1;
                $is_penalty_10k_paid = 1;
                $increment_penalty_count = (int) $penalty_count + 1;
                $increment_penalty10k_count = (int) $penalty_10k_count + 1;

                if ($type_of_employee === 'civilian') {
                  $db->increment_penalty_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_civilian($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                } else if ($type_of_employee === 'officer') {
                  $db->increment_penalty_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty_count);
                  $db->increment_penalty10k_count_officer($borrower_id, $fname, $mname, $lname, $type_of_employee, $increment_penalty10k_count);
                }
              } else {
                $penalty_10k_amount = 0;
                $has_penalty_10k = 0;
                $is_penalty_10k_paid = 0;
              }

              $add_full_payment_10k = $db->add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_rate, $amount_paid, $is_paid, $full_interest_10k, $full_balance_10k, $payment_option, $date_of_payment, $has_penalty_10k, $is_penalty_10k_paid, $penalty_10k_amount, $remarks);
              if ($add_full_payment_10k) {
                $db->update_full_payment_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                $db->update_loan_status_10k($loan_id, $borrower_id, $fname, $mname, $lname, $type_of_employee, $borrower_rank);
                echo "FULLY PAID<br>";
                header("Location: loanMonitoring.php");
              } else {
                printf("%s\n", $con->error);
              }
            } else {
              // do nothing...
            }
          } else {
          }
        } else {
          // do nothing...
        }
      } else {
        // do nothing...
      }
    } else {
      // do nothing...
    }
  }
} else {
  echo "Forbidden Access!";
  header("Location: loanMonitoring.php");
}
?>