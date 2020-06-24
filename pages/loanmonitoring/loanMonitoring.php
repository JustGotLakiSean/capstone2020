<?PHP

namespace loan950;

use \loan950\db_access;

include('../../dbaccess/db_access.php');
session_start();

if(isset($_SESSION['mess_10k'])){
  echo "$_SESSION[mess_10k]";
  if($_SESSION['mess_10k']){
    unset($_SESSION['mess_10k']);
  }
} else {
}

if(isset($_SESSION['mess_5k'])){
  echo "$_SESSION[mess_5k]";
  if($_SESSION['mess_5k']){
    unset($_SESSION['mess_5k']);
  } else {
  }
} else {
}
$db = new db_access();
$dt = $db->view_all_employee();
$dt2 = $db->view_all_employee_10k();
$lr5k = $db->loan_rates_5K();
$lr10k = $db->loan_rates_10K();

$total_interest_1st_payment = $db->total_interest_1st_payment();
$total_interest_2nd_payment = $db->total_interest_2nd_payment();
$total_interest_3rd_payment = $db->total_interest_3rd_payment();
$total_interest_4th_payment = $db->total_interest_4th_payment();
$total_interest_5th_payment = $db->total_interest_5th_payment();
$total_interest_6th_payment = $db->total_interest_6th_payment();
$total_interest_full_payment = $db->total_interest_full_payment();

$current_balance_1 = $db->current_balance_1();
$current_balance_2 = $db->current_balance_2();
$current_balance_3 = $db->current_balance_3();
$current_balance_4 = $db->current_balance_4();
$current_balance_5 = $db->current_balance_5();
$current_balance_6 = $db->current_balance_6();
$current_balance_full = $db->current_balance_full();

$total_penalty_1 = $db->total_penalty_1();
$total_penalty_2 = $db->total_penalty_2();
$total_penalty_3 = $db->total_penalty_3();
$total_penalty_4 = $db->total_penalty_4();
$total_penalty_5 = $db->total_penalty_5();
$total_penalty_6 = $db->total_penalty_6();
$total_penalty_full = $db->total_penalty_full();

$getFirstPaymentAmountPaid = $db->getFirstPaymentAmountPaid();
$getSecondPaymentAmountPaid = $db->getSecondPaymentAmountPaid();
$getThirdPaymentAmountPaid = $db->getThirdPaymentAmountPaid();
$getFourthPaymentAmountPaid = $db->getFourthPaymentAmountPaid();
$getFifthPaymentAmountPaid = $db->getFifthPaymentAmountPaid();
$getSixthPaymentAmountPaid = $db->getSixthPaymentAmountPaid();
$getFullPaymentAmountPaid = $db->getFullPaymentAmountPaid();

$get5kActiveLoan = $db->get5kActiveLoan();
$get10kActiveLoan = $db->get10kActiveLoan();

$getTotalActiveLoan = $db->getTotalActiveLoan();

function transaction_table_5k()
{
  $con = new db_access();
  $list5K = $con->new_5k_list();
  echo '
      <div id="transaction_table_5k">
        <table border="1">
          <thead>
            <tr>
              <th>Control Number</th>
              <th>Name</th>
              <th>Status</th>
              <th>View</th>
            </tr>          
          </thead>
  ';

  while ($row = $list5K->fetch_assoc()) {
    if (isset($row)) {
      if ($row > 0) {
        $transaction_number = $row['loan_id_5k'];
        $_SESSION['transaction_number'] = $row['loan_id_5k'];
        $transaction_prefix = $row['ctrl_no_prefix'];
        $borrower_id = $row['borrower_id'];
        $_SESSION['borrower_id'] = $row['borrower_id'];
        $borrower_fname = $row['fname'];
        $borrower_mname = $row['mname'];
        $borrower_lname = $row['lname'];
        $type_of_employee = $row['type_of_employee'];
        $type_of_loan_account = $row['type_of_loan'];
        $loan_amount_5k_rate = $row['loan_amount_5k_rate'];
        $monthly_payment_5k_rate = $row['monthly_payment_5k_rate'];
        $credit_5k_rate = $row['credit_5k_rate'];
        $debit_pay_5k = $row['debit_pay_5k'];
        $interest_rate_5k = $row['interest_rate_5k'];
        $balance_rate_5k = $row['balance_rate_5k'];
        $date_of_loan = $row['date_of_loan'];
        $comment = $row['comment'];
        $penalty = $row['penalty'];
        $office = $row['office'];
        $emp_rank = $row['emp_rank'];
        $first_payment = $row['first_payment'];
        $second_payment = $row['second_payment'];
        $third_payment = $row['third_payment'];
        $fourth_payment = $row['fourth_payment'];
        $fifth_payment = $row['fifth_payment'];
        $full_payment = $row['full_payment'];
        $loan_status = (($row['loan_status'] == 0) ? 'Active' : 'Not Active');
        // $loan_status = $row['loan_status'];
        $isNewLoan = $row['isNewLoan'];

        $borrower_fullname = "$borrower_fname $borrower_mname $borrower_lname";
        $formatted_control_number = "$transaction_prefix$transaction_number";

        echo '
    <tbody>
      <tr>
        <input type="hidden" name="control_number" value="' . $formatted_control_number . '" />
        <input type="hidden" name="transaction_number" value="' . $transaction_number . '" />
        <input type="hidden" name="transaction_prefix" value="' . $transaction_prefix . '" />
        <input type="hidden" name="borrower_id" value="' . $borrower_id . '" />
        <input type="hidden" name="borrower_fname" value="' . $borrower_fname . '" />
        <input type="hidden" name="borrower_mname" value="' . $borrower_mname . '" />
        <input type="hidden" name="borrower_lname" value="' . $borrower_lname . '" />
        <input type="hidden" name="type_of_employee" value="' . $type_of_employee . '" />
        <input type="hidden" name="type_of_loan_account" value="' . $type_of_loan_account . '" />
        <input type="hidden" name="loan_amount_5k_rate" value="' . $loan_amount_5k_rate . '" />
        <input type="hidden" name="monthly_payment_5k_rate" value="' . $monthly_payment_5k_rate . '" />
        <input type="hidden" name="credit_5k_rate" value="' . $credit_5k_rate . '" />
        <input type="hidden" name="debit_pay_5k" value="' . $debit_pay_5k . '" />
        <input type="hidden" name="interest_rate_5k" value="' . $interest_rate_5k . '" />
        <input type="hidden" name="date_of_loan" value="' . $date_of_loan . '" />
        <input type="hidden" name="comment_remarks" value="' . $comment . '" />
        <input type="hidden" name="penalty" value="' . $penalty . '" />
        <input type="hidden" name="office" value="' . $office . '" />
        <input type="hidden" name="emp_rank" value="' . $emp_rank . '" />
        <input type="hidden" name="first_payment" value="' . $first_payment . '" />
        <input type="hidden" name="second_payment" value="' . $second_payment . '" />
        <input type="hidden" name="third_payment" value="' . $third_payment . '" />
        <input type="hidden" name="fourth_payment" value="' . $fourth_payment . '" />
        <input type="hidden" name="fifth_payment" value="' . $fifth_payment . '" />
        <input type="hidden" name="full_payment" value="' . $full_payment . '" />
        <input type="hidden" name="loan_status" value="' . $loan_status . '" />
        <td>' . $formatted_control_number . '</td>
        <td>' . ucwords(strtolower($borrower_fullname)) . '</td>
        <td>' . $loan_status . '</td>';
        echo <<<BUT
        <td><a type="button" class="view_loan_5k" href="loanMonitoring.php?transaction_number={$_SESSION['transaction_number']}">VIEW</a></td>
BUT;
        echo '</tr>
    </tbody>';
      } else {
      }
    } else {
    }
  }
  echo '</table>';
  echo '</div>';
}

function transaction_table_10k()
{
  $con = new db_access();
  $list10k = $con->new_10k_list();
  echo '
  <div id="trasaction_table_10k">
    <table border="1">
      <thead>
        <tr>
          <th>Control Number</th>
          <th>Name</th>
          <th>Type Of Loan Account</th>
          <th>View</th>
        </tr>
      </thead>
      ';

  while ($row = $list10k->fetch_array(MYSQLI_ASSOC)) {
    if (isset($row)) {
      if ($row > 0) {
        $loan_id_10k = $row['loan_id_10k'];
        $_SESSION['loan_id_10k'] = $row['loan_id_10k'];
        $ctrl_no_prefix = $row['ctrl_no_prefix'];
        $borrower_id_10k = $row['borrower_id'];
        $_SESSION['borrower_id'] = $row['borrower_id'];
        $borrower_fname_10k = $row['fname'];
        $borrower_mname_10k = $row['mname'];
        $borrower_lname_10k = $row['lname'];
        $type_of_employee_10k = $row['type_of_employee'];
        $type_of_loan_account_10k = $row['type_of_loan'];
        $loan_amount_10k_rate = $row['loan_amount_10k_rate'];
        $monthly_payment_10k_rate = $row['monthly_payment_10k_rate'];
        $credit_10k_rate = $row['credit_10k_rate'];
        $debit_pay_10k = $row['debit_pay_10k'];
        $interest_rate_10k = $row['interest_rate_10k'];
        $balance_rate_10k = $row['balance_rate_10k'];
        $date_of_loan_10k = $row['date_of_loan'];
        $comment_10k = $row['comment'];
        $penalty_10k = $row['penalty_10k'];
        $office_10k = $row['office_10k'];
        $emp_rank_10k = $row['emp_rank_10k'];
        $first_payment_10k = $row['first_payment_10k'];
        $second_payment_10k = $row['second_payment_10k'];
        $third_payment_10k = $row['third_payment_10k'];
        $fourth_payment_10k = $row['fourth_payment_10k'];
        $fifth_payment_10k = $row['fifth_payment_10k'];
        $full_payment_10k = $row['full_payment_10k'];
        $loan_status_10k = (($row['loan_status_10k'] == 0) ? 'Active' : 'Not Active');
        $is_new_loan_10k = $row['isNewLoan'];

        $borrower_fullname_10k = "$borrower_fname_10k $borrower_mname_10k $borrower_lname_10k";
        $formatted_control_number_10k = "$ctrl_no_prefix$loan_id_10k";

        echo '
        <tbody>
          <tr>
            <input type="hidden" name="formatted_control_number_10k" value="' . $formatted_control_number_10k . '" />
            <input type="hidden" name="loan_id_10k" value="' . $loan_id_10k . '" />
            <input type="hidden" name="ctrl_no_prefix" value="' . $ctrl_no_prefix . '" />
            <input type="hidden" name="borrower_id_10k" value="' . $borrower_id_10k . '" />
            <input type="hidden" name="borrower_fname_10k" value="' . $borrower_fname_10k . '" />
            <input type="hidden" name="borrower_mname_10k" value="' . $borrower_mname_10k . '" />
            <input type="hidden" name="borrower_lname_10k" value="' . $borrower_lname_10k . '" />
            <input type="hidden" name="type_of_employee_10k" value="' . $type_of_employee_10k . '" />
            <input type="hidden" name="type_of_loan_account_10k" value="' . $type_of_loan_account_10k . '" />
            <input type="hidden" name="loan_amount_10k_rate" value="' . $loan_amount_10k_rate . '" />
            <input type="hidden" name="monthly_payment_10k_rate" value="' . $monthly_payment_10k_rate . '" />
            <input type="hidden" name="credit_10k_rate" value="' . $credit_10k_rate . '" />
            <input type="hidden" name="debit_pay_10k" value="' . $debit_pay_10k . '" />
            <input type="hidden" name="interest_rate_10k" value="' . $interest_rate_10k . '" />
            <input type="hidden" name="balance_rate_10k" value="' . $balance_rate_10k . '" />
            <input type="hidden" name="date_of_loan_10k" value="' . $date_of_loan_10k . '" />
            <input type="hidden" name="comment_10k" value="' . $comment_10k . '" />
            <input type="hidden" name="penalty_10k" value="' . $penalty_10k . '" />
            <input type="hidden" name="office_10k" value="' . $office_10k . '" />
            <input type="hidden" name="emp_rank_10k" value="' . $emp_rank_10k . '" />
            <input type="hidden" name="first_payment_10k" value="' . $first_payment_10k . '" />
            <input type="hidden" name="second_payment_10k" value="' . $second_payment_10k . '" />
            <input type="hidden" name="third_payment_10k" value="' . $third_payment_10k . '" />
            <input type="hidden" name="fourth_payment_10k" value="' . $fourth_payment_10k . '" />
            <input type="hidden" name="fifth_payment_10k" value="' . $fifth_payment_10k . '" />
            <input type="hidden" name="full_payment_10k" value="' . $full_payment_10k . '" />
            <input type="hidden" name="loan_status_10k" value="' . $loan_status_10k . '" />
            <td>' . $formatted_control_number_10k . '</td>
            <td>' . ucwords(strtolower($borrower_fullname_10k)) . '</td>
            <td>' . $loan_status_10k . '</td>';
        echo <<<BUTTON
            <td><a class="view_loan_10k" href="loanMonitoring.php?transaction_number_10k={$_SESSION['loan_id_10k']}">VIEW</a></td>
BUTTON;
        echo '</tr>
        </tbody>';
      }
    }
  }
  echo '</table>
  </div>';
}
?>

<?php
if (isset($_GET['emp_search_id']) && isset($_GET['emp_search_fname']) && isset($_GET['emp_search_mname']) && isset($_GET['emp_search_lname']) && isset($_GET['emp_search_empType'])) {
  $emp_search_id = '';
  $emp_search_empType = '';
  $emp_search_fname = '';
  $emp_search_mname = '';
  $emp_search_lname = '';
  $emp_office = '';
  $emp_email = '';
  $emp_conNumber = '';
  $emp_birthDate = '';
  $emp_address = '';
  $emp_rank = '';
  $hasAccount = '';

  $con = $db->getConnection();
  $fetchResult = $db->search_emp_panel($_GET['emp_search_id'], $_GET['emp_search_fname'], $_GET['emp_search_mname'], $_GET['emp_search_lname'], $_GET['emp_search_empType']);
  // echo '
  // <script type="text/javascript">
  // document.querySelector(".search_box_container").style.display="none";
  // document.getElementById("result_container").style.display="block";
  // </script>';

  echo '<div id="result_container">';
  echo '<div id="search_emp_result">';

  echo <<<BUTTON
  <button type='button' id='search_close' onclick="window.location.href='loanMonitoring.php'">X</button>
BUTTON;

  echo '<div id="search_header">';
  echo '<p style="font-size: 18px; margin: 0; padding-bottom: 8px; text-align: center;">Employee Profile</p>';
  echo '</div>';

  echo '<div id="result_con">';


  while ($ress = $fetchResult->fetch_array(MYSQLI_ASSOC)) {
    $emp_search_id = $ress['s_emp_id'];
    $emp_search_empType = $ress['emp_type'];
    $emp_search_fname = $ress['s_emp_fname'];
    $emp_search_mname = $ress['s_emp_mname'];
    $emp_search_lname = $ress['s_emp_lname'];
    $emp_office = $ress['s_emp_office'];
    $emp_email = $ress['s_emp_email'];
    $emp_conNumber = $ress['emp_no'];
    $emp_birthDate = $ress['emp_bdate'];
    $emp_address = $ress['emp_address'];
    $emp_rank = $ress['emp_rank'];
    $hasAccount = $ress['hasAccount'];
    $empFull = "$emp_search_fname $emp_search_mname $emp_search_lname";

    echo '<h2 style="margin: 15px 0 15px 8px;">' . $emp_search_fname . '\'s profile</h2>';
    echo '<hr style="background: #ccc;">';

    echo '<div id="pd_result">'; // 'pd' = 'personal details';
    echo '<h3 style="margin: 1px;">Personal details</h3>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Name:</span>";
    echo "<p style='margin: 0; width: 300px'>$empFull</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Email: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_email</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Contact: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_conNumber</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Birthdate: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_birthDate</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Address:</span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_address</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Office: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_office</p>";
    echo '</div>';
    echo '</div>';

    echo '<hr style="background: #ccc;">';
  }

  $fetchLoanDetailCiv = $db->get_loan_counts_civ($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchLoanDetailOff = $db->get_loan_counts_off($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchAccountCiv = $db->check_civ_account($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchAccountOff = $db->check_off_account($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  echo '<div id="ld_result">'; // 'ld' = loan details

  echo '<div id="result_5k">';
  echo '<h3 style="margin: 1px;">Loan details</h3>';

  if ($emp_search_empType === 'civilian') {
    while ($ress22 = $fetchLoanDetailCiv->fetch_array(MYSQLI_ASSOC)) {
      $borrower_civ_id = $ress22['civilian_ID'];
      $la5kcount_civ = $ress22['la_5k_count'];
      $la10kcount_civ = $ress22['la_10k_count'];
      $penalty_count_civ = $ress22['penalty_count'];
      $downpayment_count_civ = $ress22['downpayment_count'];
      $fullpayment_count_civ = $ress22['fullpayment_count'];

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 5K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la5kcount_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la5kcount_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 10K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la10kcount_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la10kcount_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Fullpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $fullpayment_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $fullpayment_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Downpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $downpayment_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $downpayment_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Penalty count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $penalty_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $penalty_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';
    }
  } else if ($emp_search_empType === 'officer') {
    while ($ress2 = $fetchLoanDetailOff->fetch_array(MYSQLI_ASSOC)) {
      $borrowerID = $ress2['officer_ID'];
      $la5kcount = $ress2['la_5k_count'];
      $la10kcount = $ress2['la_10k_count'];
      $penalty_count = $ress2['penalty_count'];
      $downpayment_count = $ress2['downpayment_count'];
      $fullpayment_count = $ress2['fullpayment_count'];

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 5K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la5kcount . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la5kcount . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 10K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la10kcount . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la10kcount . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Fullpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $fullpayment_count . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $fullpayment_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Downpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $downpayment_count . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $downpayment_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Penalty count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $penalty_count . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $penalty_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';
    }
  }

  echo '</div>'; // end result_5k

  echo '</div>'; // end ld_result

  echo '<hr style="background: #ccc;">';

  echo '<div id="account_result">';
  echo '<h3 style="margin: 1px;">Account details</h3>';

  if ($emp_search_empType === 'civilian') {
    // echo "CIVILAN";
    if ($hasAccount == 1) {
      while ($ress4 = $fetchAccountCiv->fetch_array(MYSQLI_ASSOC)) {
        $civ_username = $ress4['civilian_username'];

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Username:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $civ_username . '</p>';
        echo '</div>';
      }
    } else {
      echo '<p>No account</p>';
    }
  } else if ($emp_search_empType === 'officer') {
    // echo "OFFICER";
    if ($hasAccount == 1) {
      while ($ress4 = $fetchAccountOff->fetch_array(MYSQLI_ASSOC)) {
        $off_username = $ress4['officer_account_username'];

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Username:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $off_username . '</p>';
        echo '</div>';
      }
    } else {
      echo '<p>No account</p>';
    }
  }
  echo '</div>'; // close account_result;

  echo '</div>'; // end result_con;
  echo '</div>'; // close search_emp_result;
  echo '</div>'; // close result_container;
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/loanMonitoring.php"> -->
  <?php include("css/loanMonitoringStyle.php"); ?>
  <title>Loan Monitoring</title>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<script src="src/searchempprofile.js">

</script>

<body>
  <!-- <script src="src/newloan.js"></script> -->
  <!-- <script src="src/n.js"></script> -->
  <script src="src/n10k2.js"></script>
  <script src="src/n2.js"></script>
  <!-- <script src="src/new_loan_10k.js"></script> -->
  <header id="loan-navigation-container">
    <nav id="loan-global-navigation">
      <ul>
        <li class="nav-links"><a href="adminOverview.php">Overview</a></li>
        <li class="nav-links"><a href="loanMonitoring.php" style="border-bottom: 4px solid #005086;">Loan Monitoring</a></li>
        <li class="nav-links"><a href="950th-employee.php">Employee</a></li>
        <li class="nav-links"><a href="../../pages/admin/adminloanrequest.php">Loan request<span id="countNotif" style='display: none; height: 18px; width: 18px; border-radius: 5px; background: rgba(24, 24, 24, 1); position: absolute; top: 11px; right: -22px; font-size: 12px; font-weight: bold; padding-top: 2px;'></span></a></li>
        <li class="nav-links"><a type="button" onclick="document.querySelector('.search_box_container').style.display='block'" style="cursor: pointer;">Search</a></li>
        <li>
          <div>
            <input type="button" id="admin-button" value="Admin Button" onclick="document.getElementById('admin_menu_box').style.display='flex'" />
            <div id="admin_menu_box">
              <a href="../../pages/admin/adminSettings.php">Setting</a>
              <!-- <a href="../../pages/admin/adminloanrequest.php">View Loan Request</a> -->
              <a href="logout.php">Sign Out</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <script>
    function loadDoc() {
      setInterval(function() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("countNotif").innerHTML = this.responseText;
            if(this.responseText == 0){
              document.getElementById("countNotif").style.display='none';
            } else if(this.responseText >= 1) {
              document.getElementById("countNotif").style.display='block';
            }
          }
        };
        xhttp.open("GET", "../../gateway/notif.php", true);
        xhttp.send();
      }, 1000);
    }

    loadDoc();
  </script>

  <main onclick="document.getElementById('admin_menu_box').style.display='none'">

    <div class="search_box_container">
      <div id="search_container_m">
        <div class="search_box">
          <!-- <form action="search_employee.php" method="POST"> -->
          <form method="get" action="">
            <div id="search_control">
              <div>
                <input type="text" name="txt_emp_search" id="txt_emp_search" oninput="search_employee(this.value)" placeholder="Search" />
              </div>
              <div>
                <button type="button" class="btn_search_close" onclick="document.querySelector('.search_box_container').style.display='none'">Close</button>
              </div>
            </div>
            <div id="search_result_container">
              <div id="search_result_box">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <section id="loanmonitoring-container">
      <?php
      if (isset($_SESSION['admin_username'])) {
        echo '<div class="account_box">';
        echo '<h3>Hello, ' . $_SESSION['fname'] . '</h3>';
        echo '</div>';
      } else if (!isset($_SESSION['admin_username'])) {
        // header('location: ../../pages/admin/adminSignInForm.php');
        echo '<script>
    window.location.href="../../pages/admin/adminSignInForm.php"
    </script>';
      }
      ?>
      <div id="loan-summary-content">

        <div id="totalborrowers" class="summarycard">
          <div id="totalborrowerslabel">
            <h6 style="margin: 0; color: #666666;">ACTIVE LOAN</h6>
          </div>
          <div id="totalborrowercount">
            <?php
            while ($get_total_active_loan = $getTotalActiveLoan->fetch_array(MYSQLI_ASSOC)) {
              if (isset($get_total_active_loan)) {
                $totalActiveLoan = $get_total_active_loan['allActiveLoan'];
                echo '<p style="font-size: 32px;">' . $totalActiveLoan . '</p>';
              } else {
              }
            }
            ?>
          </div>
        </div>

        <div id="collectibles" class="summarycard">
          <div id="collectibleslabel">
            <h6 style="margin: 0; color: #666666;">CURRENT INTEREST</h6>
          </div>
          <div id="collectiblescount">
            <?php
            while ($getCurrInt1 = $total_interest_1st_payment->fetch_array(MYSQLI_ASSOC)) {
              if ($getCurrInt1 > 0) {
                $currFirstInterest = $getCurrInt1['curr_first_interest'];
                if ($currFirstInterest > 0) {
                  $curr_first_interest = $currFirstInterest;
                } else {
                  $curr_first_interest = 0;
                }
              } else {
              }
            }

            // echo "$curr_first_interest<br>";

            while ($getCurrInt2 = $total_interest_2nd_payment->fetch_array(MYSQLI_ASSOC)) {
              if ($getCurrInt2 > 0) {
                $currSecondInterest = $getCurrInt2['curr_second_interest'];
                if ($currSecondInterest > 0) {
                  $curr_second_interest = $currSecondInterest;
                } else {
                  $curr_second_interest = 0;
                }
              } else {
              }
            }

            // echo "$curr_second_interest<br>";

            while ($getCurrInt3 = $total_interest_3rd_payment->fetch_array(MYSQLI_ASSOC)) {
              if ($getCurrInt3 > 0) {
                $currThirdInterest = $getCurrInt3['curr_third_interest'];
                if ($currThirdInterest > 0) {
                  $curr_third_interest = $currThirdInterest;
                } else {
                  $curr_third_interest = 0;
                }
              } else {
              }
            }

            // echo "$curr_third_interest<br>";

            while ($getCurrInt4 = $total_interest_4th_payment->fetch_array(MYSQLI_ASSOC)) {
              if ($getCurrInt4 > 0) {
                $currFourthInterest = $getCurrInt4['curr_fourth_interest'];
                if ($currFourthInterest > 0) {
                  $curr_fourth_interest = $currFourthInterest;
                } else {
                  $curr_fourth_interest = 0;
                }
              } else {
              }
            }

            // echo "$curr_fourth_interest<br>";

            while ($getCurrInt5 = $total_interest_5th_payment->fetch_array(MYSQLI_ASSOC)) {
              if ($getCurrInt5 > 0) {
                $currFifthInterest = $getCurrInt5['curr_fifth_interest'];
                if ($currFifthInterest > 0) {
                  $curr_fifth_interest = $currFifthInterest;
                } else {
                  $curr_fifth_interest = 0;
                }
              } else {
              }
            }

            // echo "$curr_fifth_interest<br>";

            while ($getCurrInt6 = $total_interest_6th_payment->fetch_array(MYSQLI_ASSOC)) {
              if ($getCurrInt6 > 0) {
                $currSixthInterest = $getCurrInt6['curr_sixth_interest'];
                if ($currSixthInterest > 0) {
                  $curr_sixth_interest = $currSixthInterest;
                } else {
                  $curr_sixth_interest = 0;
                }
              } else {
              }
            }

            // echo "$curr_sixth_interest<br>";

            while ($getCurrIntFull = $total_interest_full_payment->fetch_array(MYSQLI_ASSOC)) {
              if ($getCurrIntFull > 0) {
                $currFullInterest = $getCurrIntFull['curr_full_interest'];
                if ($currFullInterest > 0) {
                  $curr_full_interest = $currFullInterest;
                } else {
                  $curr_full_interest = 0;
                }
              } else {
              }
            }

            echo "<p style='font-size: 32px;'>$curr_full_interest</p>"; // get the interest only if paid full

            // $currentInterest = $curr_first_interest + $curr_second_interest + $curr_third_interest + $curr_fourth_interest + $curr_fifth_interest + $curr_sixth_interest + $curr_full_interest;
            // echo "<p style='font-size: 32px;'>$currentInterest</p>";

            ?>
          </div>
        </div>

        <div id="totalinterest" class="summarycard">
          <div id="totalinterest">
            <h6 style="margin: 0; color: #666666;">TOTAL PAYMENT</h6>
          </div>
          <div id="totalinterest">
            <?php
            while ($getData = $getFirstPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
              if ($getData > 0) {
                $overall_first_amount_paid = $getData['overallFirstAmountPaid'];
                if ($overall_first_amount_paid > 0) {
                  $overallFirstAmountPaid = $overall_first_amount_paid;
                } else {
                  $overallFirstAmountPaid = 0;
                }
              } else {
              }
            }

            // echo "$overallFirstAmountPaid<br>";

            while ($getData = $getSecondPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
              if ($getData > 0) {
                $overall_second_amount_paid = $getData['overallSecondAmountPaid'];
                if ($overall_second_amount_paid > 0) {
                  $overallSecondAmountPaid = $overall_second_amount_paid;
                } else {
                  $overallSecondAmountPaid = 0;
                }
              } else {
              }
            }

            // echo "$overallSecondAmountPaid<br>";

            while ($getData = $getThirdPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
              if ($getData > 0) {
                $overall_third_amount_paid = $getData['overallThirdAmountPaid'];
                if ($overall_third_amount_paid > 0) {
                  $overallThirdAmountPaid = $getData['overallThirdAmountPaid'];
                } else {
                  $overallThirdAmountPaid = 0;
                }
              } else {
              }
            }

            // echo "$overallThirdAmountPaid<br>";

            while ($getData = $getFourthPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
              if ($getData > 0) {
                $overall_fourth_amount_paid = $getData['overallFourthAmountPaid'];
                if ($overall_fourth_amount_paid > 0) {
                  $overallFourthAmountPaid = $getData['overallFourthAmountPaid'];
                } else {
                  $overallFourthAmountPaid = 0;
                }
              } else {
              }
            }

            // echo "$overallFourthAmountPaid<br>";

            while ($getData = $getFifthPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
              if ($getData > 0) {
                $overall_fifth_amount_paid = $getData['overallFifthAmountPaid'];
                if ($overall_fifth_amount_paid > 0) {
                  $overallFifthAmountPaid = $getData['overallFifthAmountPaid'];
                } else {
                  $overallFifthAmountPaid = 0;
                }
              } else {
              }
            }

            // echo "$overallFifthAmountPaid<br>";

            while ($getData = $getSixthPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
              if ($getData > 0) {
                $overall_sixth_amount_paid = $getData['overallSixthAmountPaid'];
                if ($overall_sixth_amount_paid > 0) {
                  $overallSixthAmountPaid = $getData['overallSixthAmountPaid'];
                } else {
                  $overallSixthAmountPaid = 0;
                }
              } else {
              }
            }

            // echo "$overallSixthAmountPaid<br>";

            while ($getData = $getFullPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
              if ($getData > 0) {
                $overall_full_amount_paid = $getData['overallFullAmountPaid'];
                if ($overall_full_amount_paid > 0) {
                  $overallFullAmountPaid = $getData['overallFullAmountPaid'];
                } else {
                  $overallFullAmountPaid = 0;
                }
              } else {
              }
            }

            // echo "$overallFullAmountPaid<br>";

            $overallTotalPaymentReceived = $overallFirstAmountPaid + $overallSecondAmountPaid + $overallThirdAmountPaid + $overallFourthAmountPaid + $overallFifthAmountPaid + $overallSixthAmountPaid + $overallFullAmountPaid;

            echo "<p style='font-size: 32px;'>$overallTotalPaymentReceived</p>";

            ?>
          </div>
        </div>

        <div id="totalpayment" class="summarycard">
          <div id="totalpaymentlabel">
            <h6 style="margin: 0; color: #666666;">PENALTY COLLECTED</h6>
          </div>
          <div id="totalpaymentcount">
            <?php
            while ($getPenalty1 = $total_penalty_1->fetch_array(MYSQLI_ASSOC)) {
              if ($getPenalty1 > 0) {
                $totalPenalty1 = $getPenalty1['penalty_1'];
                if ($totalPenalty1 > 0) {
                  $penalty_1 = $totalPenalty1;
                } else {
                  $penalty_1 = 0;
                }
              } else {
              }
            }

            // echo "$penalty_1<br>";

            while ($getPenalty2 = $total_penalty_2->fetch_array(MYSQLI_ASSOC)) {
              if ($getPenalty2 > 0) {
                $totalPenalty2 = $getPenalty2['penalty_2'];
                if ($totalPenalty2 > 0) {
                  $penalty_2 = $totalPenalty2;
                } else {
                  $penalty_2 = 0;
                }
              } else {
              }
            }

            // echo "$penalty_2<br>";

            while ($getPenalty3 = $total_penalty_3->fetch_array(MYSQLI_ASSOC)) {
              if ($getPenalty3 > 0) {
                $totalPenalty3 = $getPenalty3['penalty_3'];
                if ($totalPenalty3 > 0) {
                  $penalty_3 = $totalPenalty3;
                } else {
                  $penalty_3 = 0;
                }
              } else {
              }
            }

            // echo "$penalty_3<br>";

            while ($getPenalty4 = $total_penalty_4->fetch_array(MYSQLI_ASSOC)) {
              if ($getPenalty4 > 0) {
                $totalPenalty4 = $getPenalty4['penalty_4'];
                if ($totalPenalty4 > 0) {
                  $penalty_4 = $totalPenalty4;
                } else {
                  $penalty_4 = 0;
                }
              } else {
              }
            }

            // echo "$penalty_4<br>";

            while ($getPenalty5 = $total_penalty_5->fetch_array(MYSQLI_ASSOC)) {
              if ($getPenalty5 > 0) {
                $totalPenalty5 = $getPenalty5['penalty_5'];
                if ($totalPenalty5 > 0) {
                  $penalty_5 = $totalPenalty5;
                } else {
                  $penalty_5 = 0;
                }
              } else {
              }
            }

            // echo "$penalty_5<br>";

            while ($getPenalty6 = $total_penalty_6->fetch_array(MYSQLI_ASSOC)) {
              if ($getPenalty6 > 0) {
                $totalPenalty6 = $getPenalty6['penalty_6'];
                if ($totalPenalty6 > 0) {
                  $penalty_6 = $totalPenalty6;
                } else {
                  $penalty_6 = 0;
                }
              } else {
              }
            }

            // echo "$penalty_6<br>";

            while ($getPenaltyfull = $total_penalty_full->fetch_array(MYSQLI_ASSOC)) {
              if ($getPenaltyfull > 0) {
                $totalPenaltyfull = $getPenaltyfull['penalty_full'];
                if ($totalPenaltyfull > 0) {
                  $penalty_full = $totalPenaltyfull;
                } else {
                  $penalty_full = 0;
                }
              } else {
              }
            }

            // echo "$penalty_full<br>";

            $overallPenalty = $penalty_1 + $penalty_2 + $penalty_3 + $penalty_4 + $penalty_5 + $penalty_6 + $penalty_full;
            echo "<p style='font-size: 32px;'>$overallPenalty</p>";

            ?>
          </div>
        </div>

      </div>

      <div id="loantransactionform">
        <div id="loantabs">
          <button class="tablinks 5ktablinks" onclick="openTab(event, '5K')">5K<span class="5kline"></span></button>
          <button class="tablinks" onclick="openTab(event, '10K')">10K<span class="10kline"></span></button>
        </div>

        <div id="5K" class="tabcontent">
          <div id="5kadd-button-container">
            <button type="button" id="btn-addnew5k" onclick="document.getElementById('fiveKaddnewloan-container').style.display='block'">Add New 5K Loan</button>
          </div>
          <div id="5ktransationtablename" style="margin-bottom: 5px;">
            <?php
            while ($get5K = $get5kActiveLoan->fetch_array(MYSQLI_ASSOC)) {
              $loanStatusCount = $get5K['loanStatusCount'];;
            }

            echo "<h4 style='margin: 20px 0 0 0;'><span style='font-size: 32px; font-weight: lighter;'>$loanStatusCount</span> <span style='font-size: 12px; font-weight: lighter;'>active loan</span></h4>";
            ?>
          </div>
          <div id="5ktransactiontable">
            <form action="" method="POST" id="showLoanPanel">
              <?php
              transaction_table_5k();
              ?>
            </form>
          </div>
        </div>

        <!-- ADD NEW 5K LOAN-->
        <section id="fiveKaddnewloan-container" class="modal">
          <div class="fiveKaddnewloanpanel" id="fiveKaddnewloan">
            <div class="fiveKnewloantitleholder">
              <h3 id="fiveKnewloantitle">New Loan Record</h3>
              <button type="button" id="btn_close" onclick="document.getElementById('fiveKaddnewloan-container').style.display='none'">Close</button>
            </div>
            <span id="alert" style="display: none; text-align: center;">New Record Added.</span>
            <div class="fiveKnewloanfirstbox">
              <div class="fiveKborrowerdetails">

                <!-- All Employee List -->
                <div id="search_container" align="center">
                  <?php
                  while ($row5k = $lr5k->fetch_array(MYSQLI_ASSOC)) {
                    if (isset($row5k)) {
                      if ($row5k > 0) {
                        $id = $row5k['5k_rates_id'];
                        $loan_type_5k = $row5k['type_of_loan'];
                        $la_amount = $row5k['5k_loan_amount_rates'];
                        $mp_rates = $row5k['5k_monthly_payment_rates'];
                        $cr_rates = $row5k['5k_credit_rates'];
                        $beg_bal = $row5k['5k_beginning_balance_rates'];
                        $interest = $row5k['5k_interest_rate'];
                        $pen_permonth = $row5k['5k_penalty_permonth_rates'];
                        $date_today = date("j-M-y");
                        $formattedString = "950CEISG-000";
                      } else {
                      }
                    } else {
                    }
                  }
                  while ($res5k = $dt->fetch_array(MYSQLI_ASSOC)) {
                    if (isset($res5k)) {
                      if ($res5k > 0) {
                        $empid = $res5k["emp_id"];
                        $empfname = $res5k["emp_fName"];
                        $empmname = $res5k["emp_mName"];
                        $emplname = $res5k["emp_lName"];
                        $empoffice = $res5k["emp_office"];
                        $empType = $res5k["emptype"];
                        $empRank = $res5k["empRank"];
                        $la5k_count = $res5k['la5k'];
                        $emp_fullname = "$res5k[emp_fName] $res5k[emp_mName] $res5k[emp_lName]";
                        $empFullname = ucwords(strtolower($emp_fullname));
                        $emp_info_5k = "$res5k[emp_fName] $res5k[emp_mName] $res5k[emp_lName] | $res5k[emp_office]";
                        $comment = "New Loan form $emp_fullname.";
                        $debit_pay = 0;
                        $status = 0;
                        $first_payment = 0;
                        $second_payment = 0;
                        $third_payment = 0;
                        $fourth_payment = 0;
                        $fifth_payment = 0;
                        $sixth_payment = 0;
                        $full_payment = 0;
                        $is_loan_requested_5k = 0;
                        echo <<<EMP_LIST
                    <form action="add_new_5k_loan.php" method="POST" class="search_result_box" >
                      <div id="emp_list">
                        <input type="hidden" name="empid" class="hidden_5k_info hidden_id" value="$empid" />
                        <input type="hidden" name="empfname" class="hidden_5k_info hidden_fname" value="$empfname" />
                        <input type="hidden" name="empmname" class="hidden_5k_info hidden_mname" value="$empmname" />
                        <input type="hidden" name="emplname" class="hidden_5k_info hidden_lname" value="$emplname" />
                        <input type="hidden" name="empoffice" class="hidden_5k_info hidden_office" value="$empoffice" />
                        <input type="hidden" name="empType" class="hidden_5k_info hidden_type" value="$empType" />
                        <input type="hidden" name="empRank" class="hidden_5k_info hidden_rank" value="$empRank" />
                        <input type="hidden" name="la5kcount" class="hidden_5k_info" value="$la5k_count" />
                        <input type="hidden" name="loan_status" class="hidden_5k_info" value="$status" />
                        <input type="hidden" name="first_payment" class="hidden_5k_info" value="$first_payment" />
                        <input type="hidden" name="second_payment" class="hidden_5k_info" value="$second_payment" />
                        <input type="hidden" name="third_payment" class="hidden_5k_info" value="$third_payment" />
                        <input type="hidden" name="fourth_payment" class="hidden_5k_info" value="$fourth_payment" />
                        <input type="hidden" name="five_payment" class="hidden_5k_info" value="$fifth_payment" />
                        <input type="hidden" name="sixth_payment" class="hidden_5k_info" value="$sixth_payment" />
                        <input type="hidden" name="full_payment" class="hidden_5k_info" value="$full_payment" />
                        <input type="hidden" name="amount_of_payment" class="hidden_5k_info" value="$debit_pay" />
                        <input type="hidden" name="comment_remarks" class="hidden_5k_info" value="$comment" />
                        <input type="text" disabled name="empfullname" class="emp_info_5k" value="$empFullname" />
EMP_LIST;
                        echo "<input type='button' name = 'btn_add_5k_loan' value='Add New Loan' class='btn_add_5k_loan' onclick='addnewloan5k(\"" . $empid . "\", \"" . $formattedString . "\", \"" . $empfname . "\", \"" . $empmname . "\", \"" . $emplname . "\", \"" . $empType . "\", \"" . $loan_type_5k . "\", \"" . $la_amount . "\", \"" . $emp_fullname . "\", \"" . $mp_rates . "\", \"" . $cr_rates . "\", \"" . $debit_pay . "\", \"" . $interest . "\", \"" . $beg_bal . "\", \"" . $date_today . "\", \"" . $comment . "\", \"" . $pen_permonth . "\", \"" . $empoffice . "\", \"" . $empRank . "\", \"" . $la5k_count . "\", \"" . $first_payment . "\", \"" . $second_payment . "\", \"" . $third_payment . "\", \"" . $fourth_payment . "\", \"" . $fifth_payment . "\", \"" . $full_payment . "\", \"" . $status . "\");' />";
                        echo '</div>';
                        echo '</form>';
                      } else {
                      }
                    } else {
                    }
                  }
                  ?>
                </div>
                <!-- END OF SEARCH BOX -->

                <!-- <input type="text" disabled name="txt_5K_newloan_office" id = "txt_5K_newloan_office" /> -->
              </div>
            </div>
            <hr>
            <form action="" method="POST" id="fiveKnewloanform">
              <div class="fiveKnewloansecondbox">
                <div class="fiveKlistboxtitleholder">

                </div>
                <div class="fiveKborrowernewloandetails">
                  <div class="fiveKnewloandetailstitleholder">
                    <h4>Loan Details (5K Account)</h4>
                    <hr>
                    <div class="fiveKloanaccountdetailscontainer">
                      <div class="loanaccountdetails-box">

                        <?php
                        echo '<div class="firstbox">';
                        echo '<label for="loan_type_5k">Type of Loan account</label>';
                        echo '<label for="la_rate">Loan Amount Rate</label>';
                        echo '<label for="mp_rate">Monthly Payment Rate</label>';
                        echo '<label for="interest_rate">Interest Rate</label>';
                        echo '<label for="cr_rate">Credit rate</label>';
                        echo '<label for="beg_bal">Beginning Balance</label>';
                        echo '<label for="pen_permonth">Penalty per month</label>';
                        echo '<label for="date_today">Date</label>';
                        echo '</div>';

                        echo '<div class="secondbox">';
                        echo '<input type="hidden" disabled id="ctrlno_prefix" name="ctrlno_prefix" class="lk_rate" value="' . $formattedString . '" /> ';
                        echo '<input type="text" disabled id="loan_type_5k" name="loan_type_5k" class="lk_rate" value="' . $loan_type_5k . '" />';
                        echo '<input type="text" disabled id="la_rate" name="la_rate" class="lk_rate" value="' . $la_amount . '" />';
                        echo '<input type="text" disabled id="mp_rate" name="mp_rate" class="lk_rate" value="' . $mp_rates . '" />';
                        echo '<input type="text" disabled id="interest_rate" name="interest_rate" class="lk_rate" value="' . $interest . '" />';
                        echo '<input type="text" disabled id="cr_rate" name="cr_rate" class="lk_rate" value="' . $cr_rates . '" />';
                        echo '<input type="text" disabled id="beg_bal" name="beg_bal" class="lk_rate" value="' . $beg_bal . '" />';
                        echo '<input type="text" disabled id="pen_permonth" name="pen_permonth" class="lk_rate" value="' . $pen_permonth . '" />';
                        echo '<input type="text" disabled id="date_today" name="date_today" class="lk_rate" value="' . $date_today . '" />';
                        echo '</div>';
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>

        <!-- ADD NEW 10K LOAN-->
        <section id="tenKaddnewloan-container">
          <div class="tenKaddnewloanpanel" id="tenKaddnewloan">
            <div class="tenKnewloantitleholder">
              <h3 id="tenKnewloantitle">New Loan Record</h3>
              <button type="button" id="btn_close_10k" onclick="document.getElementById('tenKaddnewloan-container').style.display='none'">Close</button>
            </div>
            <span id="alert_10k" style="display: none; text-align: center;">New Record Added.</span>
            <div class="tenKnewloanfirstbox">
              <div class="tenKborrowerdetails">

                <!-- All Employee List -->
                <div id="search_container_10k" align="center">
                  <?php
                  while ($row = $lr10k->fetch_array(MYSQLI_ASSOC)) {
                    if (isset($row)) {
                      if ($row > 0) {
                        $id = $row['10k_rates_id'];
                        $loan_type_10k = $row['type_of_loan'];
                        $la_amount_10k = $row['10k_loan_amount_rates'];
                        $mp_rates_10k = $row['10k_monthly_payment_rates'];
                        $cr_rates_10k = $row['10k_credit_rates'];
                        $beg_bal_10k = $row['10k_beginning_balance_rates'];
                        $interest_10k = $row['10k_interest_rate'];
                        $pen_permonth_10k = $row['10k_penalty_permonth_rates'];
                        $date_today_10k = date("j-M-y");
                        $formattedString10K = "950CEISG-000";
                      } else {
                      }
                    } else {
                    }
                  }
                  foreach ($dt2 as $res) {
                    if (isset($res)) {
                      if ($res > 0) {
                        $empid = $res["emp_id"];
                        $empfname = $res["emp_fName"];
                        $empmname = $res["emp_mName"];
                        $emplname = $res["emp_lName"];
                        $empoffice = $res["emp_office"];
                        $empType = $res["emptype"];
                        $empRank = $res["empRank"];
                        $la10k_count = $res['la10k'];
                        $emp_fullname_10k = "$res[emp_fName] $res[emp_mName] $res[emp_lName]";
                        $empFulname_10k = ucwords(strtolower($emp_fullname_10k));
                        $emp_info_10k = "$res[emp_fName] $res[emp_mName] $res[emp_lName] | $res[emp_office]";
                        $comment_10k = "New Loan form $emp_fullname_10k.";
                        $debit_pay_10k = 0;
                        $status_10k = 0;
                        $first_payment_10k = 0;
                        $second_payment_10k = 0;
                        $third_payment_10k = 0;
                        $fourth_payment_10k = 0;
                        $fifth_payment_10k = 0;
                        $sixth_payment_col_10k = 0;
                        $full_payment_10k = 0;
                        echo <<<EMP_LIST
                    <form action="add_new_10k_loan.php" method="POST" class="search_result_box_10k" >
                      <div id="emp_list">
                        <input type="hidden" name="empid_10k" class="hidden_10k_info hidden_id" value="$empid" />
                        <input type="hidden" name="empfname_10k" class="hidden_10k_info hidden_fname" value="$empfname" />
                        <input type="hidden" name="empmname_10k" class="hidden_10k_info hidden_mname" value="$empmname" />
                        <input type="hidden" name="emplname_10k" class="hidden_10k_info hidden_lname" value="$emplname" />
                        <input type="hidden" name="empoffice_10k" class="hidden_10k_info hidden_office" value="$empoffice" />
                        <input type="hidden" name="empType_10k" class="hidden_10k_info hidden_type" value="$empType" />
                        <input type="hidden" name="empRank_10k" class="hidden_10k_info hidden_rank" value="$empRank" />
                        <input type="hidden" name="la10kcount" class="hidden_10k_info" value="$la10k_count" />
                        <input type="hidden" name="loan_status_10k" class="hidden_10k_info" value="$status_10k" />
                        <input type="hidden" name="first_payment_10k" class="hidden_10k_info" value="$first_payment_10k" />
                        <input type="hidden" name="second_payment_10k" class="hidden_10k_info" value="$second_payment_10k" />
                        <input type="hidden" name="third_payment_10k" class="hidden_10k_info" value="$third_payment_10k" />
                        <input type="hidden" name="fourth_payment_10k" class="hidden_10k_info" value="$fourth_payment_10k" />
                        <input type="hidden" name="five_payment_10k" class="hidden_10k_info" value="$fifth_payment_10k" />
                        <input type="hidden" name="sixth_payment_10k" class="hidden_10k_info" value="$sixth_payment_col_10k" />
                        <input type="hidden" name="full_payment_10k" class="hidden_10k_info" value="$full_payment_10k" />
                        <input type="hidden" name="amount_of_payment_10k" class="hidden_10k_info" value="$debit_pay_10k" />
                        <input type="hidden" name="comment_remarks_10k" class="hidden_10k_info" value="$comment_10k" />
                        <input type="text" disabled name="empfullname_10k" class="emp_info_10k" value="$empFulname_10k" />
EMP_LIST;
                        echo "<input type='button' name = 'btn_add_10k_loan' value='Add New Loan' class='btn_add_10k_loan' onclick='addnewloan10k(\"" . $empid . "\", \"" . $formattedString10K . "\", \"" . $empfname . "\", \"" . $empmname . "\", \"" . $emplname . "\", \"" . $empType . "\", \"" . $loan_type_10k . "\", \"" . $la_amount_10k . "\", \"" . $emp_fullname_10k . "\", \"" . $mp_rates_10k . "\", \"" . $cr_rates_10k . "\", \"" . $debit_pay_10k . "\", \"" . $interest_10k . "\", \"" . $beg_bal_10k . "\", \"" . $date_today_10k . "\", \"" . $comment_10k . "\", \"" . $pen_permonth_10k . "\", \"" . $empoffice . "\", \"" . $empRank . "\", \"" . $la10k_count . "\", \"" . $first_payment_10k . "\", \"" . $second_payment_10k . "\", \"" . $third_payment_10k . "\", \"" . $fourth_payment_10k . "\", \"" . $fifth_payment_10k . "\", \"" . $sixth_payment_col_10k . "\", \"" . $full_payment_10k . "\", \"" . $status_10k . "\");' />";
                        echo '</div>';
                        echo '</form>';
                      } else {
                      }
                    } else {
                    }
                  }
                  ?>
                </div>
                <!-- END OF SEARCH BOX -->

                <!-- <input type="text" disabled name="txt_5K_newloan_office" id = "txt_5K_newloan_office" /> -->
              </div>
            </div>
            <hr>
            <form action="" method="POST" id="tenKnewloanform">
              <div class="tenKnewloansecondbox">
                <div class="tenKlistboxtitleholder">

                </div>
                <div class="tenKborrowernewloandetails">
                  <div class="tenKnewloandetailstitleholder">
                    <h4>Loan Details (10K Account)</h4>
                    <hr>
                    <div class="tenKloanaccountdetailscontainer">
                      <div class="loanaccountdetails-box">

                        <?php
                        echo '<div class="firstbox_10k">';
                        echo '<label for="loan_type_10k">Type of Loan account</label>';
                        echo '<label for="la_rate_10k">Loan Amount Rate</label>';
                        echo '<label for="mp_rate_10k">Monthly Payment Rate</label>';
                        echo '<label for="interest_rate_10k">Interest Rate</label>';
                        echo '<label for="cr_rate_10k">Credit rate</label>';
                        echo '<label for="beg_bal_10k">Beginning Balance</label>';
                        echo '<label for="pen_permonth_10k">Penalty per month</label>';
                        echo '<label for="date_today_10k">Date</label>';
                        echo '</div>';

                        echo '<div class="secondbox_10k">';
                        echo '<input type="hidden" disabled id="ctrlno_prefix_10k" name="ctrlno_prefix_10k" class="lk_rate_10k" value="' . $formattedString10K . '" /> ';
                        echo '<input type="text" disabled id="loan_type_10k" name="loan_type_10k" class="lk_rate_10k" value="' . $loan_type_10k . '" />';
                        echo '<input type="text" disabled id="la_rate_10k" name="la_rate_10k" class="lk_rate_10k" value="' . $la_amount_10k . '" />';
                        echo '<input type="text" disabled id="mp_rate_10k" name="mp_rate_10k" class="lk_rate_10k" value="' . $mp_rates_10k . '" />';
                        echo '<input type="text" disabled id="interest_rate_10k" name="interest_rate_10k" class="lk_rate_10k" value="' . $interest_10k . '" />';
                        echo '<input type="text" disabled id="cr_rate_10k" name="cr_rate_10k" class="lk_rate_10k" value="' . $cr_rates_10k . '" />';
                        echo '<input type="text" disabled id="beg_bal_10k" name="beg_bal_10k" class="lk_rate_10k" value="' . $beg_bal_10k . '" />';
                        echo '<input type="text" disabled id="pen_permonth_10k" name="pen_permonth_10k" class="lk_rate_10k" value="' . $pen_permonth_10k . '" />';
                        echo '<input type="text" disabled id="date_today_10k" name="date_today_10k" class="lk_rate_10k" value="' . $date_today_10k . '" />';
                        echo '</div>';
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>

        <div id="10K" class="tabcontent">
          <div id="10kadd-button-container">
            <button type="button" id="btn-addnew10k" onclick="document.getElementById('tenKaddnewloan-container').style.display='block'">Add New 10K Loan</button>
          </div>
          <div id="10ktransactiontablename" style="margin-bottom: 5px;">
            <?php
            while ($get10K = $get10kActiveLoan->fetch_array(MYSQLI_ASSOC)) {
              $loanStatusCount10k = $get10K['loanStatusCount10k'];
            }

            echo "<h4 style='margin: 20px 0 0 0;'><span style='font-size: 32px; font-weight: lighter;'>$loanStatusCount10k</span> <span style='font-size: 12px; font-weight: lighter;'>active loan</span></h4>";
            ?>
          </div>
          <div id="10ktransactiontable">
            <form action="" method="POST" id="showLoanPanel">
              <?PHP
              transaction_table_10k();
              ?>
            </form>
          </div>
        </div>
      </div>

    </section>
    <?php
    if (isset($_GET['transaction_number'])) {
      $LoanID5k = '';
      $borrowerID5k = '';
      $ctrlPrefix5k = '';
      $borrowerFname5k = '';
      $borrowerMname5k = '';
      $borrowerLname5k = '';
      $borrowerOffice5k = '';
      $borrowerType5k = '';
      $borrowerRank5k = '';
      $LoanType5k = '';
      $LoanAmountRate5k = '';
      $MonthlyPaymentRate5k = '';
      $currentBalance5k = '';
      $interestRate5k = '';
      $creditRate5k = '';
      $LoanStatus5k = '';
      $is_new_loan = '';
      if (isset($_SESSION['transaction_number'])) {
        echo '<section id="newpayment_5k_modal">';
        $new_loan5k_access = new db_access();
        $display_loan5k_panel = $new_loan5k_access->select_new_loan_5k($_GET['transaction_number']);

        while ($r = $display_loan5k_panel->fetch_array(MYSQLI_ASSOC)) {
          $LoanID5K = $r['loan_id_5k'];
          $borrowerID5K = $r['borrower_id'];
          $ctrlPrefix5k = $r['ctrl_no_prefix'];
          $borrowerFname5k = $r['fname'];
          $borrowerMname5k = $r['mname'];
          $borrowerLname5k = $r['lname'];
          $borrowerOffice5k = $r['office'];
          $borrowerType5k = $r['type_of_employee'];
          $borrowerRank5k = $r['emp_rank'];
          $LoanType5k = $r['type_of_loan'];
          $LoanAmountRate5k = $r['loan_amount_5k_rate'];
          $MonthlyPaymentRate5k = $r['monthly_payment_5k_rate'];
          $currentBalance5k = $r['balance_rate_5k'];
          $interestRate5k = $r['interest_rate_5k'];
          $creditRate5k = $r['credit_5k_rate'];
          $LoanStatus5k = (($r['loan_status'] == 0) ? 'Active' : 'Not Active');
          $is_new_loan = $r['isNewLoan'];

          $first_payment_col = $r['first_payment'];
          $second_payment_col = $r['second_payment'];
          $full_payment_col = $r['full_payment'];

          function payment_options($isNewLoan, $firstPaymentCol, $secondPaymentCol, $fullPaymentCol)
          {
            // '1' means new... '0' means not new... //
            if ($isNewLoan == 1) { // if no payment
              echo '<select name="paymentoption_5k">
              <option value="1st_payment_option">1ST Payment</option>
              <option value="2nd_payment_option" disabled>2ND Payment</option>
              <option value="full_payment_option">FULL PAYMENT</option>
            </select>';
            } else if ($isNewLoan == 0 && $firstPaymentCol == 1 && $secondPaymentCol == 0) { // paid the first
              echo '<select name="paymentoption_5k">
              <option value="1st_payment_option" disabled>1ST Payment</option>
              <option value="2nd_payment_option">2ND Payment</option>
              <option value="full_payment_option">FULL PAYMENT</option>
            </select>';
            } else if ($isNewLoan == 0 && $fullPaymentCol == 0 && $secondPaymentCol == 1) {
              echo '<select name="paymentoption_5k">
              <option value="1st_payment_option" disabled>1ST Payment</option>
              <option value="2nd_payment_option" disabled>2ND Payment</option>
              <option value="full_payment_option">FULL PAYMENT</option>
            </select>';
            }
          }

          $borrowerFullname5k = "$borrowerFname5k $borrowerMname5k $borrowerLname5k";
          $control_number5k = "$ctrlPrefix5k$LoanID5K";
        }

        $get_dp_and_fp = new db_access();
        $get_data = $get_dp_and_fp->get_dp_and_fp($borrowerID5K, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerOffice5k, $borrowerType5k, $borrowerRank5k);
        while ($result = $get_data->fetch_assoc()) {
          $dp5k = $result['dp5k'];
          $dp10k = $result['dp10k'];
          $dp = $result['dpCount'];
          $fp5k = $result['fp5k'];
          $fp10k = $result['fp10k'];
          $fp = $result['fp_count'];
          $penalty_count = $result['penaltyCount'];
          $penalty_5k_count = $result['penalty5k'];
          $penalty_10k_count = $result['penalty10k'];
        }
        echo '
    <form id="newpayment_5k_container" method="POST" action="add_new_5k_payment.php">
      <div class="newpayment_5k_titlecontainer">
        <h3 id="new_payment_title_5k"align="center">Loan details</h3>
      </div>
      <div class="bdb-content">
        <div class="bdb-inner-content">
          <div class="bdb_container">
            <div class="borrowers_detailbox">
              <input type="hidden" name="b_loanID" id="b_loanID" value="' . $LoanID5K . '" />
              <input type="hidden" name="b_empID" id="b_empID" value="' . $borrowerID5K . '" />
              <input type="hidden" name="b_ctrl" id="b_ctrl" value="' . $ctrlPrefix5k . '" /> 
              <input type="hidden" name="b_fname" id="b_fname" value="' . $borrowerFname5k . '" />
              <input type="hidden" name="b_mname" id="b_mname" value="' . $borrowerMname5k . '" />
              <input type="hidden" name="b_lname" id="b_lname" value="' . $borrowerLname5k . '" />
              <input type="hidden" name="b_type" id="b_type" value="' . $borrowerType5k . '" />
              <input type="hidden" name="b_rank" id="b_rank" value="' . $borrowerRank5k . '" />
              <input type="hidden" name="b_loanType" id="b_loanType" value="' . $LoanType5k . '" />
              <input type="hidden" name="txt_loan5k_amount_rate" value="' . $LoanAmountRate5k . '" />
              <input type="hidden" name="txt_monthlyPayment_5k_rate" value="' . $MonthlyPaymentRate5k . '" />
              <input type="hidden" name="b_office" id="b_office" value="' . $borrowerOffice5k . '" />
              <input type="hidden" name="b_dp5k" value="' . $dp5k . '" />
              <input type="hidden" name="b_dp10k" value="' . $dp10k . '" />
              <input type="hidden" name="b_dp" value="' . $dp . '" />
              <input type="hidden" name="b_fp" value="' . $fp . '" />
              <input type="hidden" name="b_fp5k" value="' . $fp5k . '" />
              <input type="hidden" name="b_fp10k" value="' . $fp10k . '" />
              <input type="hidden" name="b_penalty_count" value="' . $penalty_count . '" />
              <input type="hidden" name="b_penalty_5k_count" value="' . $penalty_5k_count . '" />
              <input type="hidden" name="b_penalty_10k_count" value="' . $penalty_10k_count . '" />
              <input type="hidden" name="is_new_loan" value="' . $is_new_loan . '" />
              <input type="hidden" name="first_payment_col" value="' . $first_payment_col . '" />
              <input type="hidden" name="second_payment_col" value="' . $second_payment_col . '" />
              <input type="hidden" name="full_payment_col" value="' . $full_payment_col . '" />
              <input type="text" name="b_fullname" disabled id="b_fullname" value="' . $borrowerFullname5k . '"/>
              <input type="text" disabled value="' . $borrowerOffice5k . '" />
            </div>
          </div>
          <div class="current_loantransaction_container">

            <hr style="margin: 5px 0 5px 0;">
            <div class="clt_container">
              <div class="cltbox">
                <div class="ctrl_number_box clt">
                  <label>Control Number:</label>
                  <input type="hidden" name="txt_ctrl_number_5k" id="txt_ctrl_number_5k" value="' . $control_number5k . '" />
                  <input type="text" disabled value="' . $control_number5k . '" />
                </div>
                <div class="account_type_5k clt">
                  <label>Account Type:</label>
                  <input type="hidden" name="txt_accounttype_5k" id="txt_accounttype_5k" value="' . $LoanType5k . '" />
                  <input type="text" disabled value="' . $LoanType5k . '" />
                </div>
                <div class="balance_5k_box clt">
                  <label>Balance Rate:</label>
                  <input type="hidden" name="balance_5k" id="balance_5k" value="' . $currentBalance5k . '" />
                  <input type="text" disabled value="' . $currentBalance5k . '" />
                </div>
                <div class="currentstatus_5k_box clt">
                  <label>Status:</label>
                  <input type="hidden" name="txt_currentstatus_5k" id="txt_currentstatus_5k" value="' . $LoanStatus5k . '" /> 
                  <input type="text" disabled value="' . $LoanStatus5k . '" /> 
                </div>
              </div>
            </div>
          </div>';

        function display_1st_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          // display borrower's first payment
          // 'fp' - first payment
          $display_1st_payment_details = $db->display_1stpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($res = $display_1st_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $amount_paid_fp = $res['amount_paid'];
            $current_interest_fp = $res['current_interest'];
            $remarks_fp = $res['remarks'];
            $date_of_payment_fp = $res['date_of_payment'];
            $new_balance_fp = $res['current_balance'];
            // $penalty_first = $res['penalty_amount'];

            if ($res > 0) {
              echo '
                <input type="hidden" name="amount_paid_fp" value="' . $amount_paid_fp . '" />
                <input type="hidden" name="new_balance_fp" value="' . $new_balance_fp . '" />
                <input type="hidden" name="current_interest_fp" value="' . $current_interest_fp . '" />
                <input type="hidden" name="remarks_fp" value="' . $remarks_fp . '" />
                <input type="hidden" name="date_of_payment_fp" value="' . $date_of_payment_fp . '" />
                <td>' . $amount_paid_fp . '</td>
                <td>' . $current_interest_fp . '</td>
                <td>' . $new_balance_fp . '</td>
                <td>' . $remarks_fp . '</td>
                <td>' . $date_of_payment_fp . '</td>
                ';
            } else {
              // do nothing...
            }
          }
        }

        // display borrower's second payment function
        function display_2nd_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $diplay_2nd_payment_details = $db->display_2ndpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $diplay_2nd_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $amount_paid_sp = $row['amount_paid'];
            $current_interest_sp = $row['current_interest'];
            $remarks_sp = $row['remarks'];
            $date_of_payment_sp = $row['date_of_payment'];
            $new_balance_sp = $row['current_balance'];

            if ($row > 0) {
              echo '
                <input type="hidden" name="amount_paid_sp" value="' . $amount_paid_sp . '" />
                <input type="hidden" name="new_balance_sp" value="' . $new_balance_sp . '" />
                <input type="hidden" name="current_interest_sp" value="' . $current_interest_sp . '" />
                <input type="hidden" name="remarks_sp" value="' . $remarks_sp . '" />
                <input type="hidden" name="date_of_payment_sp" value="' . $date_of_payment_sp . '" />
                <td>' . $amount_paid_sp . '</td>
                <td>' . $current_interest_sp . '</td>
                <td>' . $new_balance_sp . '</td>
                <td>' . $remarks_sp . '</td>
                <td>' . $date_of_payment_sp . '</td>';
            } else {
              // do nothing...
            }
          }
        }

        function display_fullpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $display_fullpayment_details = $db->display_fullpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $display_fullpayment_details->fetch_array(MYSQLI_ASSOC)) {
            $amount_paid_full_5k = $row['amount_paid'];
            $current_interest_full_5k = $row['current_interest'];
            $remarks_full_5k = $row['remarks'];
            $date_of_payment_full_5k = $row['date_of_payment'];
            $new_balance_full_5k = $row['current_balance'];

            if ($row > 0) {
              echo '<input type="hidden" name="amount_paid_full_5k" value="' . $amount_paid_full_5k . '" />
                <input type="hidden" name="new_balance_full_5k" value="' . $new_balance_full_5k . '" />
                <input type="hidden" name="current_interest_full_5k" value="' . $current_interest_full_5k . '" />
                <input type="hidden" name="remarks_full_5k" value="' . $remarks_full_5k . '" />
                <input type="hidden" name="date_of_payment_full_5k" value="' . $date_of_payment_full_5k . '" />
                <td>' . $amount_paid_full_5k . '</td>
                <td>' . $current_interest_full_5k . '</td>
                <td>' . $new_balance_full_5k . '</td>
                <td>' . $remarks_full_5k . '</td>
                <td>' . $date_of_payment_full_5k . '</td> ';
            } else {
              // do nothing...
            }
          }
        }

        $get_5k_info = new db_access();
        $display_5k_table = $get_5k_info->display_borrower_new_5k_list($LoanID5K, $borrowerID5K, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
        while ($data = $display_5k_table->fetch_array(MYSQLI_ASSOC)) {
          $la_5k = $data['loan_amount_5k_rate'];
          $mp_5k = $data['monthly_payment_5k_rate'];
          $dp_5k = $data['debit_pay_5k'];
          $int_5k = $data['interest_rate_5k'];
          $com_5k = $data['comment'];
          $dop_5k = $data['date_of_loan'];
          $bal_5k = $data['balance_rate_5k'];
        }
        echo '
            <div id="transaction_box_5kcontainer">
              <table border="1" id="transaction_box_5k">
                <thead>
                  <tr>
                    <th>Debit</th>
                    <th>Interest</th>
                    <th>Balance</th>
                    <th>Remarks</th>
                    <th>Date of Payment</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>' . $dp_5k . '</td>
                    <td>' . $int_5k . '</td>
                    <td>' . $bal_5k . '</td>
                    <td>' . $com_5k . '</td>
                    <td>' . $dop_5k . '</td>
                  </tr>';
        echo '<tr>';
        echo display_1st_payment($LoanID5K, $LoanType5k, $borrowerID5K, $ctrlPrefix5k, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
        echo '</tr>';
        echo '<tr>';
        echo display_2nd_payment($LoanID5K, $LoanType5k, $borrowerID5K, $ctrlPrefix5k, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
        echo '</tr>';
        echo '<tr>';
        echo display_fullpayment($LoanID5K, $LoanType5k, $borrowerID5K, $ctrlPrefix5k, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
        echo '</tr>';
        echo '</tbody>
              </table>
            </div>';
        if ($LoanStatus5k === 'Active') {
          echo '  
          <div class="paymentbox_5k_container">
            <div class="paymentbox_5k_list">
              <div class="paymentbox5k_title">
                <h5 align="center" style="background: #0071BC; color: white">Payment Box</h5>
              </div>
              <div class="paymentbox_5k_content">
                <div class="paymentbox_5k">
                  <div class="paymentoption_box np5kbox">
                    <label>Payment Option</label>
            ';
          echo payment_options($is_new_loan, $first_payment_col, $second_payment_col, $full_payment_col);
          echo '
                  </div>
                  <div class="date_of_payment_5k_box np5kbox">
                    <label for="date_of_payment_5k">Date of Payment</label>
                    <input type="date" name="date_of_payment_5k" id="datepicker"/>
                  </div>
                  <div class="amount_payment_5k_box np5kbox">
                    <label for="txt_amount_payment_5k">Amount Payment</label>
                    <input type="number" name="txt_amount_payment_5k" id="txt_amount_payment_5k"/>
                  </div>
                  <div class="penaltyrate_5k_box np5kbox">
                    <label>Penalty:</label>
                    <div>
                      <label for="penaltyrate_5k" style="font-size: 13px;">80 PHP</label>
                      <input type="radio" name="penaltyrate_5k" id="penaltyrate_5k" value="80"/>
                    </div>
                  </div>
                  <div class="interest_5k_box np5kbox">
                    <label for="txt_interestamount_5k">Interest</label>
                    <input type="hidden" name="txt_interestamount_5k" value="' . $interestRate5k . '" />
                    <input type="text" disabled id="txt_interestamount_5k" value="' . $interestRate5k . '" />
                  </div>
                  <div class="current_balance_5k_box np5kbox">
                    <label for="txt_currentbalance_5k">Credit</label>
                    <input type="hidden" name="txt_currentbalance_5k" value="' . $creditRate5k . '" />
                    <input type="text" disabled id="txt_currentbalance_5k" value="' . $creditRate5k . '" />
                  </div>
                  <div class="pb5k_btnaction">
                    <input type="submit" name="pb5k_btn_submit" id="pb5k_btn_submit" value="Pay" />
                    <input type="button" name="pb5k_btn_cancel" id="pb5k_btn_cancel" onclick="window.location.href=\'loanMonitoring.php\'" value="Cancel" />
                  </div>
                </div>
              </div>
            </div>
          </div>';
        } else if ($LoanStatus5k === 'Not Active') {
          echo '<div class="not_active_container" align="center">
            <h4>Fully Paid</h4>
          </div>
          <div class="pb5k_btnaction" align="center">
            <input type="button" name="pb5k_btn_cancel" id="pb5k_btn_cancel" onclick="window.location.href=\'loanMonitoring.php\'" value="Cancel" />
          </div>';
        }
        echo '
        </div>
      </div>
    </form>
  </section>
';
      }
    } else if (isset($_GET['transaction_number_10k'])) {
      $LoanID10k = '';
      $borrowerID10k = '';
      $ctrlPrefix10k = '';
      $borrowerFname10k = '';
      $borrowerMname10k = '';
      $borrowerLname10k = '';
      $borrowerOffice10k = '';
      $borrowerType10k = '';
      $borrowerRank10k = '';
      $LoanType10k = '';
      $LoanAmountRate10k = '';
      $MonthlyPaymentRate10k = '';
      $currentBalance10k = '';
      $interestRate10k = '';
      $creditRate10k = '';
      $LoanStatus10k = '';
      $is_new_loan_10k = '';

      $first_payment_col_10k = '';
      $second_payment_col_10k = '';
      $third_payment_col_10k = '';
      $fourth_payment_col_10k = '';
      $fifth_payment_col_10k = '';
      $sixth_payment_col_10k = '';
      $full_payment_col_10k = '';
      if (isset($_SESSION['loan_id_10k'])) {
        echo '<section id="newpayment_10k_modal">';
        $new_loan10k_access = new db_access();
        $display_loan10k_panel = $new_loan10k_access->select_new_loan_10k($_GET['transaction_number_10k']);

        while ($rs = $display_loan10k_panel->fetch_array(MYSQLI_ASSOC)) {
          $LoanID10k = $rs['loan_id_10k'];
          $borrowerID10k = $rs['borrower_id'];
          $ctrlPrefix10k = $rs['ctrl_no_prefix'];
          $borrowerFname10k = $rs['fname'];
          $borrowerMname10k = $rs['mname'];
          $borrowerLname10k = $rs['lname'];
          $borrowerOffice10k = $rs['office_10k'];
          $borrowerType10k = $rs['type_of_employee'];
          $borrowerRank10k = $rs['emp_rank_10k'];
          $LoanType10k = $rs['type_of_loan'];
          $LoanAmountRate10k = $rs['loan_amount_10k_rate'];
          $MonthlyPaymentRate10k = $rs['monthly_payment_10k_rate'];
          $currentBalance10k = $rs['balance_rate_10k'];
          $interestRate10k = $rs['interest_rate_10k'];
          $creditRate10k = $rs['credit_10k_rate'];
          $LoanStatus10k = (($rs['loan_status_10k'] == 0) ? 'Active' : 'Not Active');
          $is_new_loan_10k = $rs['isNewLoan'];

          $first_payment_col_10k = $rs['first_payment_10k'];
          $second_payment_col_10k = $rs['second_payment_10k'];
          $third_payment_col_10k = $rs['third_payment_10k'];
          $fourth_payment_col_10k = $rs['fourth_payment_10k'];
          $fifth_payment_col_10k = $rs['fifth_payment_10k'];
          $sixth_payment_col_10k = $rs['sixth_payment_10k'];
          $fullpayment_col_10k = $rs['full_payment_10k'];

          function payment_options_10k($isNewLoan_10k, $firstPaymentCol_10k, $secondPaymentCol_10k, $thirdPaymentCol_10k, $fourthPaymentCol_10k, $fifthPaymentCol_10k, $sixthPaymentCol_10k, $fullPaymentCol_10k)
          {
            if ($isNewLoan_10k == 1) {
              echo '<select name="paymentoption_10k">
          <option value="1st_payment_10k">1ST Payment</option>
          <option value="2nd_payment_10k" disabled>2ND Payment</option>
          <option value="3rd_payment_10k" disabled>3RD Payment</option>
          <option value="4th_payment_10k" disabled>4TH Payment</option>
          <option value="5th_payment_10k" disabled>5TH Payment</option>
          <option value="6th_payment_10k" disabled>6TH Payment</option>
          <option value="full_payment_10k">FULL PAYMENT</option>
        </select>';
            } else if ($isNewLoan_10k == 0 && $firstPaymentCol_10k == 1 && $secondPaymentCol_10k == 0 && $thirdPaymentCol_10k == 0 && $fourthPaymentCol_10k == 0 && $fifthPaymentCol_10k == 0 && $sixthPaymentCol_10k == 0 && $fullPaymentCol_10k == 0) {
              echo '<select name="paymentoption_10k">
          <option value="1st_payment_10k" disabled>1ST Payment</option>
          <option value="2nd_payment_10k">2ND Payment</option>
          <option value="3rd_payment_10k" disabled>3RD Payment</option>
          <option value="4th_payment_10k" disabled>4TH Payment</option>
          <option value="5th_payment_10k" disabled>5TH Payment</option>
          <option value="6th_payment_10k" disabled>6TH Payment</option>
          <option value="full_payment_10k">FULL PAYMENT</option>
        </select>';
            } else if ($isNewLoan_10k == 0 && $firstPaymentCol_10k == 1 && $secondPaymentCol_10k == 1 && $thirdPaymentCol_10k == 0 && $fourthPaymentCol_10k == 0 && $fifthPaymentCol_10k == 0 && $sixthPaymentCol_10k == 0 && $fullPaymentCol_10k == 0) {
              echo '<select name="paymentoption_10k">
          <option value="1st_payment_10k" disabled>1ST Payment</option>
          <option value="2nd_payment_10k" disabled>2ND Payment</option>
          <option value="3rd_payment_10k">3RD Payment</option>
          <option value="4th_payment_10k" disabled>4TH Payment</option>
          <option value="5th_payment_10k" disabled>5TH Payment</option>
          <option value="6th_payment_10k" disabled>6TH Payment</option>
          <option value="full_payment_10k">FULL PAYMENT</option>
        </select>';
            } else if ($isNewLoan_10k == 0 && $firstPaymentCol_10k == 1 && $secondPaymentCol_10k == 1 && $thirdPaymentCol_10k == 1 && $fourthPaymentCol_10k == 0 && $fifthPaymentCol_10k == 0 && $sixthPaymentCol_10k == 0 && $fullPaymentCol_10k == 0) {
              echo '<select name="paymentoption_10k">
          <option value="1st_payment_10k" disabled>1ST Payment</option>
          <option value="2nd_payment_10k" disabled>2ND Payment</option>
          <option value="3rd_payment_10k" disabled>3RD Payment</option>
          <option value="4th_payment_10k">4TH Payment</option>
          <option value="5th_payment_10k" disabled>5TH Payment</option>
          <option value="6th_payment_10k" disabled>6TH Payment</option>
          <option value="full_payment_10k">FULL PAYMENT</option>
        </select>';
            } else if ($isNewLoan_10k == 0 && $firstPaymentCol_10k == 1 && $secondPaymentCol_10k == 1 && $thirdPaymentCol_10k == 1 && $fourthPaymentCol_10k == 1 && $fifthPaymentCol_10k == 0 && $sixthPaymentCol_10k == 0 && $fullPaymentCol_10k == 0) {
              echo '<select name="paymentoption_10k">
          <option value="1st_payment_10k" disabled>1ST Payment</option>
          <option value="2nd_payment_10k" disabled>2ND Payment</option>
          <option value="3rd_payment_10k" disabled>3RD Payment</option>
          <option value="4th_payment_10k" disabled>4TH Payment</option>
          <option value="5th_payment_10k">5TH Payment</option>
          <option value="6th_payment_10k" disabled>6TH Payment</option>
          <option value="full_payment_10k">FULL PAYMENT</option>
        </select>';
            } else if ($isNewLoan_10k == 0 && $firstPaymentCol_10k == 1 && $secondPaymentCol_10k == 1 && $thirdPaymentCol_10k == 1 && $fourthPaymentCol_10k == 1 && $fifthPaymentCol_10k == 1 && $sixthPaymentCol_10k == 0 && $fullPaymentCol_10k == 0) {
              echo '<select name="paymentoption_10k">
          <option value="1st_payment_10k" disabled>1ST Payment</option>
          <option value="2nd_payment_10k" disabled>2ND Payment</option>
          <option value="3rd_payment_10k" disabled>3RD Payment</option>
          <option value="4th_payment_10k" disabled>4TH Payment</option>
          <option value="5th_payment_10k" disabled>5TH Payment</option>
          <option value="6th_payment_10k">6TH Payment</option>
          <option value="full_payment_10k">FULL PAYMENT</option>
        </select>';
            } else if ($isNewLoan_10k == 0 && $firstPaymentCol_10k == 1 && $secondPaymentCol_10k == 1 && $thirdPaymentCol_10k == 1 && $fourthPaymentCol_10k == 1 && $fifthPaymentCol_10k == 1 && $sixthPaymentCol_10k == 1 && $fullPaymentCol_10k == 0) {
              echo '<select name="paymentoption_10k">
          <option value="1st_payment_10k" disabled>1ST Payment</option>
          <option value="2nd_payment_10k" disabled>2ND Payment</option>
          <option value="3rd_payment_10k" disabled>3RD Payment</option>
          <option value="4th_payment_10k" disabled>4TH Payment</option>
          <option value="5th_payment_10k" disabled>5TH Payment</option>
          <option value="6th_payment_10k" disabled>6TH Payment</option>
          <option value="full_payment_10k">FULL PAYMENT</option>
        </select>';
            }
          }

          $borrowerFullname10k = "$borrowerFname10k $borrowerMname10k $borrowerLname10k";
          $control_number10k = "$ctrlPrefix10k$LoanID10k";
        }

        $get_dp_and_fp_10k = new db_access();
        $get_data = $get_dp_and_fp_10k->get_dp_and_fp($borrowerID10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerOffice10k, $borrowerType10k, $borrowerRank10k);
        while ($rs = $get_data->fetch_array(MYSQLI_ASSOC)) {
          $dp5k = $rs['dp5k'];
          $dp10k = $rs['dp10k'];
          $dp = $rs['dpCount'];
          $fp5k = $rs['fp5k'];
          $fp10k = $rs['fp10k'];
          $fp = $rs['fp_count'];
          $penalty_count = $rs['penaltyCount'];
          $penalty_5k_count = $rs['penalty5k'];
          $penalty_10k_count = $rs['penalty10k'];
        }
        echo '
  <form class="newpayment_10k_container" method="post" action="add_new_10k_payment.php">
    <div class="newpayment_10k_titlecontainer">
      <h3 align="center">Loan details</h3>
    </div>
    <div class="bdb-10k-content">
      <div class="bdb-10k-inner-content">
        <div class="bdb-10k_container">
          <div class="borrowers_detailbox_10k">
            <input type="hidden" name="b_loanID_10k" id="b_loanID_10k" value="' . $LoanID10k . '" />
            <input type="hidden" name="b_empID_10k" id="b_empID_10k" value="' . $borrowerID10k . '" />
            <input type="hidden" name="b_ctrl_10k" id="b_ctrl_10k" value="' . $ctrlPrefix10k . '" />
            <input type="hidden" name="b_fname_10k" id="b_fname_10k" value="' . $borrowerFname10k . '" />
            <input type="hidden" name="b_mname_10k" id="b_mname_10k" value="' . $borrowerMname10k . '" />
            <input type="hidden" name="b_lname_10k" id="b_lname_10k" value="' . $borrowerLname10k . '" />
            <input type="hidden" name="b_type_10k" id="b_type_10k" value="' . $borrowerType10k . '" />
            <input type="hidden" name="b_rank_10k" id="b_rank_10k" value="' . $borrowerRank10k . '" />
            <input type="hidden" name="b_loanType_10k" id="b_loanType_10k" value="' . $LoanType10k . '" />
            <input type="hidden" name="txt_loan10k_amount_rate" value="' . $LoanAmountRate10k . '" />
            <input type="hidden" name="txt_monthlyPayment_10k_rate" value="' . $MonthlyPaymentRate10k . '" />
            <input type="hidden" name="b_office_10k" id="b_office_10k" value="' . $borrowerOffice10k . '" />
            <input type="hidden" name="b_dp5k" value="' . $dp5k . '" />
            <input type="hidden" name="b_dp10k" value="' . $dp10k . '" />
            <input type="hidden" name="b_dp" value="' . $dp . '" />
            <input type="hidden" name="b_fp" value="' . $fp . '" />
            <input type="hidden" name="b_fp5k" value="' . $fp5k . '" />
            <input type="hidden" name="b_fp10k" value="' . $fp10k . '" />
            <input type="hidden" name="b_penalty_count" value="' . $penalty_count . '" />
            <input type="hidden" name="b_penalty_5k_count" value="' . $penalty_5k_count . '" />
            <input type="hidden" name="b_penalty_10k_count" value="' . $penalty_10k_count . '" />
            <input type="hidden" name="is_new_loan_10k" value="' . $is_new_loan_10k . '" />
            <input type="hidden" name="first_payment_col_10k" value="' . $first_payment_col_10k . '" />
            <input type="hidden" name="second_payment_col_10k" value="' . $second_payment_col_10k . '" />
            <input type="hidden" name="third_payment_col_10k" value="' . $third_payment_col_10k . '" />
            <input type="hidden" name="fourth_payment_col_10k" value="' . $fourth_payment_col_10k . '" />
            <input type="hidden" name="fifth_payment_col_10k" value="' . $fifth_payment_col_10k . '" />
            <input type="hidden" name="sixth_payment_col_10k" value="' . $sixth_payment_col_10k . '" />
            <input type="hidden" name="fullpayment_col_10k" value="' . $fullpayment_col_10k . '" />
            <input type="text" name="b_fullname_10k" disabled id="b_fullname_10k" value="' . $borrowerFullname10k . '" />
            <input type="text" disabled value="' . $borrowerOffice10k . '" />
          </div>
        </div>
        <hr style="margin: 5px 0 5px 0;">
        <div class="current_10K_loantransaction_container">
          <div class="clt_container_10k">
            <div class="cltbox10k">
              <div class="ctrl_number_box_10k clt">
                <label>Control Number</label>
                <input type="hidden" name="txt_ctrl_number_10k" id="txt_ctrl_number_10k" value="' . $control_number10k . '" />
                <input type="text" disabled value="' . $control_number10k . '" />
              </div>
              <div class="account_type_10k clt">
                <label>Account Type:</label>
                <input type="hidden" name="txt_accounttype_10k" id="txt_accounttype_10k" value="' . $LoanType10k . '" />
                <input type="text" disabled value="' . $LoanType10k . '" />
              </div>
              <div class="balance_10k_box clt">
                <label>Balance rate</label>
                <input type="hidden" name="balance_10k" id="balance_10k" value="' . $currentBalance10k . '" /> 
                <input type="text" disabled value="' . $currentBalance10k . '" />
              </div>
              <div class="currentstatus_10k_box clt">
                <label>Status</label>
                <input type="hidden" name="txt_currentstatus_10k" id="txt_currentstatus_10k" value="' . $LoanStatus10k . '" />
                <input type="text" disabled value="' . $LoanStatus10k . '" /> 
              </div>
            </div>
          </div>
        </div>';

        function display_1st_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          // display borrower's first payment
          // 'fp' - first payment
          $display_1st_payment_details = $db->display_1stpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($res = $display_1st_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $prev_fp_pay = $res['amount_paid'];
            $prev_fp_interest = $res['current_interest'];
            $remarks_fp = $res['remarks'];
            $date_of_payment_fp = $res['date_of_payment'];
            $prev_fp_bal = $res['current_balance'];

            if ($res > 0) {
              echo '
              <input type="hidden" name="prev_fp_pay" value="' . $prev_fp_pay . '" />
              <input type="hidden" name="prev_fp_bal" value="' . $prev_fp_bal . '" />
              <input type="hidden" name="prev_fp_interest" value="' . $prev_fp_interest . '" />
              <input type="hidden" name="remarks_fp" value="' . $remarks_fp . '" />
              <input type="hidden" name="date_of_payment_fp" value="' . $date_of_payment_fp . '" />
              <td>' . $prev_fp_pay . '</td>
              <td>' . $prev_fp_interest . '</td>
              <td>' . $prev_fp_bal . '</td>
              <td>' . $remarks_fp . '</td>
              <td>' . $date_of_payment_fp . '</td>
              ';
            } else {
              // do nothing...
            }
          }
        }

        // display borrower's second payment function
        function display_2nd_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $diplay_2nd_payment_details = $db->display_2ndpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $diplay_2nd_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $prev_second_pay = $row['amount_paid'];
            $prev_second_interest = $row['current_interest'];
            $remarks_sp = $row['remarks'];
            $date_of_payment_sp = $row['date_of_payment'];
            $prev_second_bal = $row['current_balance'];

            if ($row > 0) {
              echo '
              <input type="hidden" name="prev_second_pay" value="' . $prev_second_pay . '" />
              <input type="hidden" name="prev_second_bal" value="' . $prev_second_bal . '" />
              <input type="hidden" name="prev_second_interest" value="' . $prev_second_interest . '" />
              <input type="hidden" name="remarks_sp" value="' . $remarks_sp . '" />
              <input type="hidden" name="date_of_payment_sp" value="' . $date_of_payment_sp . '" />
              <td>' . $prev_second_pay . '</td>
              <td>' . $prev_second_interest . '</td>
              <td>' . $prev_second_bal . '</td>
              <td>' . $remarks_sp . '</td>
              <td>' . $date_of_payment_sp . '</td>';
            } else {
              // do nothing...
            }
          }
        }

        // display borrower's second payment function
        function display_3rd_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $diplay_3rd_payment_details = $db->display_3rdpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $diplay_3rd_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $prev_third_pay = $row['amount_paid'];
            $prev_third_interest = $row['current_interest'];
            $remarks_sp = $row['remarks'];
            $date_of_payment_sp = $row['date_of_payment'];
            $prev_third_bal = $row['current_balance'];

            if ($row > 0) {
              echo '
              <input type="hidden" name="prev_third_pay" value="' . $prev_third_pay . '" />
              <input type="hidden" name="prev_third_bal" value="' . $prev_third_bal . '" />
              <input type="hidden" name="prev_third_interest" value="' . $prev_third_interest . '" />
              <input type="hidden" name="remarks_sp" value="' . $remarks_sp . '" />
              <input type="hidden" name="date_of_payment_sp" value="' . $date_of_payment_sp . '" />
              <td>' . $prev_third_pay . '</td>
              <td>' . $prev_third_interest . '</td>
              <td>' . $prev_third_bal . '</td>
              <td>' . $remarks_sp . '</td>
              <td>' . $date_of_payment_sp . '</td>';
            } else {
              // do nothing...
            }
          }
        }

        // display borrower's second payment function
        function display_4th_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $diplay_4th_payment_details = $db->display_4thpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $diplay_4th_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $prev_fourth_pay = $row['amount_paid'];
            $prev_fourth_interest = $row['current_interest'];
            $remarks_sp = $row['remarks'];
            $date_of_payment_sp = $row['date_of_payment'];
            $prev_fourth_bal = $row['current_balance'];

            if ($row > 0) {
              echo '
              <input type="hidden" name="prev_fourth_pay" value="' . $prev_fourth_pay . '" />
              <input type="hidden" name="prev_fourth_bal" value="' . $prev_fourth_bal . '" />
              <input type="hidden" name="prev_fourth_interest" value="' . $prev_fourth_interest . '" />
              <input type="hidden" name="remarks_sp" value="' . $remarks_sp . '" />
              <input type="hidden" name="date_of_payment_sp" value="' . $date_of_payment_sp . '" />
              <td>' . $prev_fourth_pay . '</td>
              <td>' . $prev_fourth_interest . '</td>
              <td>' . $prev_fourth_bal . '</td>
              <td>' . $remarks_sp . '</td>
              <td>' . $date_of_payment_sp . '</td>';
            } else {
              // do nothing...
            }
          }
        }

        // display borrower's fifth payment function
        function display_5th_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $diplay_5th_payment_details = $db->display_5thpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $diplay_5th_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $prev_fifth_pay = $row['amount_paid'];
            $prev_fifth_interest = $row['current_interest'];
            $remarks_sp = $row['remarks'];
            $date_of_payment_sp = $row['date_of_payment'];
            $prev_fifth_bal = $row['current_balance'];

            if ($row > 0) {
              echo '
              <input type="hidden" name="prev_fifth_pay" value="' . $prev_fifth_pay . '" />
              <input type="hidden" name="prev_fifth_bal" value="' . $prev_fifth_bal . '" />
              <input type="hidden" name="prev_fifth_interest" value="' . $prev_fifth_interest . '" />
              <input type="hidden" name="remarks_sp" value="' . $remarks_sp . '" />
              <input type="hidden" name="date_of_payment_sp" value="' . $date_of_payment_sp . '" />
              <td>' . $prev_fifth_pay . '</td>
              <td>' . $prev_fifth_interest . '</td>
              <td>' . $prev_fifth_bal . '</td>
              <td>' . $remarks_sp . '</td>
              <td>' . $date_of_payment_sp . '</td>';
            } else {
              // do nothing...
            }
          }
        }

        function display_6th_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $diplay_6th_payment_details = $db->display_6thpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $diplay_6th_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $prev_sixth_pay = $row['amount_paid'];
            $prev_sixth_interest = $row['current_interest'];
            $remarks_sp = $row['remarks'];
            $date_of_payment_sp = $row['date_of_payment'];
            $prev_sixth_bal = $row['current_balance'];

            if ($row > 0) {
              echo '
              <input type="hidden" name="prev_sixth_pay" value="' . $prev_sixth_pay . '" />
              <input type="hidden" name="prev_sixth_bal" value="' . $prev_sixth_bal . '" />
              <input type="hidden" name="prev_sixth_interest" value="' . $prev_sixth_interest . '" />
              <input type="hidden" name="remarks_sp" value="' . $remarks_sp . '" />
              <input type="hidden" name="date_of_payment_sp" value="' . $date_of_payment_sp . '" />
              <td>' . $prev_sixth_pay . '</td>
              <td>' . $prev_sixth_interest . '</td>
              <td>' . $prev_sixth_bal . '</td>
              <td>' . $remarks_sp . '</td>
              <td>' . $date_of_payment_sp . '</td>';
            } else {
              // do nothing...
            }
          }
        }

        function display_full_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
        {
          $db = new db_access();

          $diplay_full_payment_details = $db->display_fullpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
          while ($row = $diplay_full_payment_details->fetch_array(MYSQLI_ASSOC)) {
            $prev_full_pay = $row['amount_paid'];
            $prev_full_interest = $row['current_interest'];
            $remarks_sp = $row['remarks'];
            $date_of_payment_sp = $row['date_of_payment'];
            $prev_full_bal = $row['current_balance'];

            if ($row > 0) {
              echo '
              <input type="hidden" name="prev_full_pay" value="' . $prev_full_pay . '" />
              <input type="hidden" name="prev_full_bal" value="' . $prev_full_bal . '" />
              <input type="hidden" name="prev_full_interest" value="' . $prev_full_interest . '" />
              <input type="hidden" name="remarks_sp" value="' . $remarks_sp . '" />
              <input type="hidden" name="date_of_payment_sp" value="' . $date_of_payment_sp . '" />
              <td>' . $prev_full_pay . '</td>
              <td>' . $prev_full_interest . '</td>
              <td>' . $prev_full_bal . '</td>
              <td>' . $remarks_sp . '</td>
              <td>' . $date_of_payment_sp . '</td>';
            } else {
              // do nothing...
            }
          }
        }

        // display first loan info
        $get_10k_info = new db_access();
        $display_10k_table = $get_10k_info->display_borrower_new_10k_list($LoanID10k, $borrowerID10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        while ($data_10k = $display_10k_table->fetch_array(MYSQLI_ASSOC)) {
          $la_10k = $data_10k['loan_amount_10k_rate'];
          $mp_10k = $data_10k['monthly_payment_10k_rate'];
          $dp_10k = $data_10k['debit_pay_10k'];
          $int_10k = $data_10k['interest_rate_10k'];
          $com_10k = $data_10k['comment'];
          $dop_10k = $data_10k['date_of_loan'];
          $bal_10k = $data_10k['balance_rate_10k'];
        }

        echo '
        <div id="transaction_box_10kcontainer">
          <table border="1" id="transaction_box_10k">
            <thead>
              <tr>
                <th>Debit</th>
                <th>Interest</th>
                <th>Balance</th>
                <th>Remarks</th>
                <th>Date of Payment</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>' . $dp_10k . '</td>
                <td>' . $int_10k . '</td>
                <td>' . $bal_10k . '</td>
                <td>' . $com_10k . '</td>
                <td>' . $dop_10k . '</td>
              </tr>';
        echo '<tr>';
        echo display_1st_payment($LoanID10k, $LoanType10k, $borrowerID10k, $ctrlPrefix10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        echo '</tr>';
        echo '<tr>';
        echo display_2nd_payment($LoanID10k, $LoanType10k, $borrowerID10k, $ctrlPrefix10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        echo '</tr>';
        echo '<tr>';
        echo display_3rd_payment($LoanID10k, $LoanType10k, $borrowerID10k, $ctrlPrefix10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        echo '</tr>';
        echo '<tr>';
        echo display_4th_payment($LoanID10k, $LoanType10k, $borrowerID10k, $ctrlPrefix10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        echo '</tr>';
        echo '<tr>';
        echo display_5th_payment($LoanID10k, $LoanType10k, $borrowerID10k, $ctrlPrefix10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        echo '</tr>';
        echo '<tr>';
        echo display_6th_payment($LoanID10k, $LoanType10k, $borrowerID10k, $ctrlPrefix10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        echo '</tr>';
        echo '<tr>';
        echo display_full_payment($LoanID10k, $LoanType10k, $borrowerID10k, $ctrlPrefix10k, $borrowerFname10k, $borrowerMname10k, $borrowerLname10k, $borrowerType10k, $borrowerRank10k);
        echo '</tr>';
        echo '</tbody>
          </table>
        </div>';

        if ($LoanStatus10k === 'Active') {
          echo '<div class="paymentbox_10k_container">
          <div class="paymentbox_10k_list">
            <div class="paymentbox10k_title">
              <h5 align="center" style="background: #009245; color: white">Payment Box</h5>
            </div>
            <div class="paymentbox_10k_content">

              <div class="paymentbox_10k">
                <div class="paymentoption_box np10kbox">
                  <label for="paymentoption_10k">Payment Option</label>';
          echo payment_options_10k($is_new_loan_10k, $first_payment_col_10k, $second_payment_col_10k, $third_payment_col_10k, $fourth_payment_col_10k, $fifth_payment_col_10k, $sixth_payment_col_10k, $full_payment_col_10k);
          echo '
                </div>
                <div class="date_of_payment_10k_box np10kbox">
                  <label for="date_of_payment_10k">Date of Payment</label>
                  <input type="date" name="date_of_payment_10k" id="datepicker_10k"/>
                </div>
                <div class="amount_payment_10k_box np10kbox">
                  <label for="txt_amount_payment_10k">Amount Payment</label>
                  <input type="number" name="txt_amount_payment_10k" id="txt_amount_payment_10k"/>
                </div>
                <div class="penaltyrate_10k_box np10kbox">
                  <label>Penalty</label>
                  <div>
                    <label for="penaltyrate_10k" style="font-size: 13px;">160 PHP</label>
                    <input type="radio" name="penaltyrate_10k" id="penaltyrate_10k" value="160"/>
                  </div>
                </div>
                <div class="interest_10k_box np10kbox">
                  <label for="txt_interestamount_10k">Interest</label>
                  <input type="hidden" name="txt_interestamount_10k" value="' . $interestRate10k . '" />
                  <input type="text" disabled id="txt_interestamount_10k" value="' . $interestRate10k . '" />
                </div>
                <div class="current_balance_10k_box np10kbox">
                  <label for="txt_currentbalance_10k">Credit</label>
                  <input type="hidden" name="txt_currentbalance_10k" value="' . $creditRate10k . '" />
                  <input type="text" id="txt_currentbalance_10k" value="' . $creditRate10k . '" />
                </div>
                <div class="pb10k_btnaction">
                  <input type="submit" name="pb10k_btn_submit" id="pb10k_btn_submit" value="Pay" />
                  <input type="button" name="pb10k_btn_cancel" id="pb10k_btn_cancel" onclick="window.location.href=\'loanMonitoring.php\'" value="Cancel" />
                </div>
              </div>
            </div>
          </div>
        </div>';
        } else if ($LoanStatus10k === 'Not Active') {
          echo '
          <div class="not_active_container" align="center">
            <h4>Fully Paid</h4>
          </div>
          <div class="pb10k_btnaction" align="center">
            <input type="button" name="pb10k_btn_cancel" id="pb10k_btn_cancel" onclick="window.location.href=\'loanMonitoring.php\'" value="Cancel" />
          </div>';
        }
        echo '
        </div>
      </div>
    </form>
</section>';
      }
    }
    ?>
  </main>

  <script>
    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
</body>

</html>