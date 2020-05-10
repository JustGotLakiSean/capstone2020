<?php
namespace loan950;
use \loan950\db_access;
include("../../dbaccess/db_access.php");
$db = new db_access();
$ctrlNo_suffix = mysqli_real_escape_string($db->getConnection(), $_POST['ctrlno_prefix']);
$emp_id = mysqli_real_escape_string($db->getConnection(), $_POST['empid']);
$emp_fname = mysqli_real_escape_string($db->getConnection(), $_POST['empfname']);
$emp_mname = mysqli_real_escape_string($db->getConnection(), $_POST['empmname']);
$emp_lname = mysqli_real_escape_string($db->getConnection(), $_POST['emplname']);
$emp_fullname = mysqli_real_escape_string($db->getConnection(), $_POST['empfullname']);
$emp_office = mysqli_real_escape_string($db->getConnection(), $_POST['empoffice']);
$emp_type = mysqli_real_escape_string($db->getConnection(), $_POST['empType']);
$empRank = mysqli_real_escape_string($db->getConnection(), $_POST['empRank']);
$loan_account_type = mysqli_real_escape_string($db->getConnection(), $_POST['loan_type_5k']);
$loan_amount = mysqli_real_escape_string($db->getConnection(), $_POST['la_rate']);
$monthly_payment = mysqli_real_escape_string($db->getConnection(), $_POST['mp_rate']);
$credit = mysqli_real_escape_string($db->getConnection(), $_POST['cr_rate']);
$interest = mysqli_real_escape_string($db->getConnection(), $_POST['interest_rate']);
$beginning_balance = mysqli_real_escape_string($db->getConnection(), $_POST['beg_bal']);
$penalty_per_month = mysqli_real_escape_string($db->getConnection(), $_POST['pen_permonth']);
$loan5kcount = mysqli_real_escape_string($db->getConnection(), $_POST['la5kcount']);
$current_date = $_POST['date_today'];
$comment = mysqli_real_escape_string($db->getConnection(), $_POST['comment_remarks']);
$debitPay = mysqli_real_escape_string($db->getConnection(), $_POST['amount_of_payment']);
$status = mysqli_real_escape_string($db->getConnection(), $_POST['loan_status']);
$first_payment = mysqli_real_escape_string($db->getConnection(), $_POST['first_payment']);
$second_payment = mysqli_real_escape_string($db->getConnection(), $_POST['second_payment']);
$third_payment = mysqli_real_escape_string($db->getConnection(), $_POST['third_payment']);
$fourth_payment = mysqli_real_escape_string($db->getConnection(), $_POST['fourth_payment']);
$fifth_payment = mysqli_real_escape_string($db->getConnection(), $_POST['fifth_payment']);
$full_payment = mysqli_real_escape_string($db->getConnection(), $_POST['full_payment']);
$increment = (int)$loan5kcount + 1;
$isNewLoan = 1;
$message = "New Record Added Successfully";

// $emp_detail = array('ctrlNo_suffix' => $ctrlNo_suffix,'id' => $emp_id,'firstname' => $emp_fname,'middleName' => $emp_mname,'lastName' => $emp_lname, 'empType' => $emp_type, 'empOffice' => $emp_office,'empRank' => $empRank, 'fullname' => $emp_fullname,'loanAmount' => $loan_amount,'monthlyPayment' => $monthly_payment,'credit' => $credit, 'debitPay' => $debit_pay, 'interestRate' => $interest, 'beginningBalance' => $beginning_balance, 'penaltyPerMonth' => $penalty_per_month, 'currentDate' => $current_date, 'comment' => $comment);
// $emp_detail = array('id' => $emp_id, 'ctrlNo_suffix' => $ctrlNo_suffix, 'firstname' => $emp_fname, 'middleName' => $emp_mname, 'lastName' => $emp_lname, 'empType' => $emp_type, 'firstPayment' => $first_payment, 'secondPayment' => $second_payment, 'thirdPayment' => $third_payment, 'fourthPayment' => $fourth_payment, 'fifthPayment' => $fifth_payment, 'loanAccount' => $loan_account_type, 'loanAmount' => $loan_amount, 'monthlyPayment' => $monthly_payment, 'credit' => $credit, 'debitPay' => $debit_pay, 'interestRate' => $interest, 'balanceRate' => $beginning_balance, 'dateOfLoan' => $current_date, 'comment_remarks' => $comment, 'penaltyPerMonth' => $penalty_per_month, 'empOffice' => $emp_office, 'empRank' => $empRank, 'message' => $message, 'loan5kcount' => $loan5kcount, 'loanStatus' => $status, 'increment' => $increment);
$emp_detail = array('id' => $emp_id, 'ctrlNoprefix' => $ctrlNo_suffix, 'firstName' => $emp_fname, 'middleName' => $emp_mname, 'lastName' => $emp_lname, 'empType' => $emp_type, 'loanAccount' => $loan_account_type, 'loanAmount' => $loan_amount, 'fullName' => $emp_fullname, 'monthlyPayment' => $monthly_payment, 'credit' => $credit, 'debitPay' => $debitPay, 'interestRate' => $interest, 'balanceRate' => $beginning_balance, 'dateOfLoan' => $current_date, 'comment_remarks' => $comment, 'penaltyPerMonth' => $penalty_per_month, 'empOffice' => $emp_office, 'empRank' => $empRank, 'loan5kCount' => $loan5kcount, 'firstPayment' => $first_payment, 'secondPayment' => $second_payment, 'thirdPayment' => $third_payment, 'fourthPayment' => $fourth_payment, 'fifthPayment' => $fifth_payment, 'fullPayment' => $full_payment, 'message' => $message, 'loanStatus' => $status, 'increment' => $increment, 'isNewLoan' => $isNewLoan);
// $add_new_5kloan = $db->add_new_5k_record($emp_detail{'id'}, $emp_detail{'ctrlNoprefix'}, $emp_detail{'firstName'}, $emp_detail{'middleName'}, $emp_detail{'lastName'}, $emp_detail{'empType'}, $emp_detail{'loanAccount'}, $emp_detail{'loanAmount'}, $emp_detail{'monthlyPayment'}, $emp_detail{'credit'}, $emp_detail{'debitPay'}, $emp_detail{'interestRate'}, $emp_detail{'balanceRate'}, $emp_detail{'dateOfLoan'}, $emp_detail{'comment_remarks'}, $emp_detail{'penaltyPerMonth'}, $emp_detail{'empOffice'}, $emp_detail{'empRank'}, $emp_detail{'firstPayment'}, $emp_detail{'secondPayment'}, $emp_detail{'thirdPayment'}, $emp_detail{'fourthPayment'}, $emp_detail{'fifthPayment'}, $emp_detail{'fullPayment'}, $emp_detail{'loanStatus'}, $emp_detail{'isNewLoan'});
// if($add_new_5kloan){
//   if($emp_type === 'civilian'){
//     $db->update_civilian_la5k_count($emp_id, $emp_fname, $emp_mname, $emp_lname, $emp_type, $increment);
//   } else if($emp_type === 'officer'){
//     $db->update_officer_la5k_count($emp_id, $emp_fname, $emp_mname, $emp_lname, $emp_type, $increment);
//   }
// echo json_encode($emp_detail);
// } else {
//   echo 'ERR';
// }
echo json_encode($emp_detail);
?>