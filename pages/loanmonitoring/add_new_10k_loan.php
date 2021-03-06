<?php

namespace loan950;

use \loan950\db_access;

include("../../dbaccess/db_access.php");
$db = new db_access();
$ctrlno_prefix_10k = mysqli_real_escape_string($db->getConnection(), $_POST['ctrlno_prefix_10k']);
$empid_10k = mysqli_real_escape_string($db->getConnection(), $_POST['empid_10k']);
$empfname_10k = mysqli_real_escape_string($db->getConnection(), $_POST['empfname_10k']);
$empmname_10k = mysqli_real_escape_string($db->getConnection(), $_POST['empmname_10k']);
$emplname_10k = mysqli_real_escape_string($db->getConnection(), $_POST['emplname_10k']);
$empoffice_10k = mysqli_real_escape_string($db->getConnection(), $_POST['empoffice_10k']);
$empType_10k = mysqli_real_escape_string($db->getConnection(), $_POST['empType_10k']);
$empRank_10k = mysqli_real_escape_string($db->getConnection(), $_POST['empRank_10k']);
$la10kcount = mysqli_real_escape_string($db->getConnection(), $_POST['la10kcount']);
$loan_status_10k = mysqli_real_escape_string($db->getConnection(), $_POST['loan_status_10k']);
$first_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['first_payment_10k']);
$second_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['second_payment_10k']);
$third_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['third_payment_10k']);
$fourth_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['fourth_payment_10k']);
$five_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['five_payment_10k']);
$sixth_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['sixth_payment_10k']);
$full_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['full_payment_10k']);
$amount_of_payment_10k = mysqli_real_escape_string($db->getConnection(), $_POST['amount_of_payment_10k']);
$comment_remarks_10k = mysqli_real_escape_string($db->getConnection(), $_POST['comment_remarks_10k']);
$empfullname_10k = mysqli_real_escape_string($db->getConnection(), $_POST['empfullname_10k']);
$loan_type_10k = mysqli_real_escape_string($db->getConnection(), $_POST['loan_type_10k']);
$la_rate_10k = mysqli_real_escape_string($db->getConnection(), $_POST['la_rate_10k']);
$mp_rate_10k = mysqli_real_escape_string($db->getConnection(), $_POST['mp_rate_10k']);
$interest_rate_10k = mysqli_real_escape_string($db->getConnection(), $_POST['interest_rate_10k']);
$cr_rate_10k = mysqli_real_escape_string($db->getConnection(), $_POST['cr_rate_10k']);
$beg_bal_10k = mysqli_real_escape_string($db->getConnection(), $_POST['beg_bal_10k']);
$pen_permonth_10k = mysqli_real_escape_string($db->getConnection(), $_POST['pen_permonth_10k']);
$date_today_10k = mysqli_real_escape_string($db->getConnection(), $_POST['date_today_10k']);
$increment = (int) $la10kcount + 1;
$isNewLoan = 1;
$is_loan_requested_10k = 0;
$message = "New Record Added Successfully";

$borrower_detail = array('id' => $empid_10k, 'ctrlNoPrefix10k' => $ctrlno_prefix_10k, 'firstName' => $empfname_10k, 'middleName' => $empmname_10k, 'lastName' => $emplname_10k, 'borrowerType' => $empType_10k, 'loanAccountType10k' => $loan_type_10k, 'loanAmountRate10k' => $la_rate_10k, 'fullName' => $empfullname_10k, 'monthlyPayment10k' => $mp_rate_10k, 'credit' => $cr_rate_10k, 'debitPay10k' => $amount_of_payment_10k, 'interestRate10k' => $interest_rate_10k, 'balanceRate' => $beg_bal_10k, 'dateOfLoan' => $date_today_10k, 'comment_remarks_10k' => $comment_remarks_10k, 'penaltyPerMonth' => $pen_permonth_10k, 'empOffice' => $empoffice_10k, 'empRank' => $empRank_10k, 'loan10kCount' => $la10kcount, 'firstPayment10k' => $first_payment_10k, 'secondPayment10k' => $second_payment_10k, 'thirdPayment10k' => $third_payment_10k, 'fourthPayment10k' => $fourth_payment_10k, 'fifthPayment10k' => $five_payment_10k, 'sixthPayment' => $sixth_payment_10k, 'fullPayment10k' => $full_payment_10k, 'Message' => $message, 'loanStatus10k' => $loan_status_10k, 'increment10k' => $increment, 'isNewLoan' => $isNewLoan);
$n = array('full_name' => "New loan for $empfullname_10k");
$add_new_10kloan = $db->add_new_10k_record($empid_10k, $ctrlno_prefix_10k, $empfname_10k, $empmname_10k, $emplname_10k, $empType_10k, $loan_type_10k, $la_rate_10k, $mp_rate_10k, $cr_rate_10k, $amount_of_payment_10k, $interest_rate_10k, $beg_bal_10k, $date_today_10k, $comment_remarks_10k, $pen_permonth_10k, $empoffice_10k, $empRank_10k, $first_payment_10k, $second_payment_10k, $third_payment_10k, $fourth_payment_10k, $five_payment_10k, $sixth_payment_10k, $full_payment_10k, $loan_status_10k, $isNewLoan, $is_loan_requested_10k);
if ($add_new_10kloan) {
  if ($empType_10k === 'civilian') {
    $db->update_civilian_la10k_count($empid_10k, $empfname_10k, $empmname_10k, $emplname_10k, $empType_10k, $increment);
  } else if ($empType_10k === 'officer') {
    $db->update_officer_la10k_count($empid_10k, $empfname_10k, $empmname_10k, $emplname_10k, $empType_10k, $increment);
  }
  echo json_encode($n);
  // session_start();
  // $_SESSION['mess'] = "<script>$message</script>";
  // echo "$_SESSION";
} else {
  // do nothing...
}
