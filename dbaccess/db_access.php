<?php

namespace loan950;

class db_access {
  const HOST = 'localhost';
  const USERNAME = 'root';
  const PASSWORD = '';
  const DATABASE = 'loandb';

  private $con;

  public function __construct() {
    $this->con = $this->getConnection();
  }

  public function getConnection(){
    $con = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);
    if(mysqli_connect_errno()) {
      trigger_error("Database Connection Problem.");
    }

    $con->set_charset("utf8");
    return $con;
  }

  // Check if user exists by email

  /* ADMIN SIDE */
  public function registerAdmin($admin_fName, $admin_lName, $admin_mName, $admin_username, $admin_password, $admin_email) {
    $admin_password = md5($admin_password);
    $conn=$this->getConnection();
    $insert_admin = "INSERT INTO tbl_admin_account(admin_firstname, admin_lastname, admin_middlename, admin_username, admin_password, admin_email) VALUE('$admin_fName', '$admin_lName', '$admin_mName', '$admin_username', '$admin_password', '$admin_email')";
    $executeQuery = $conn->query($insert_admin);
    if($executeQuery){
      return true;
    } else {
      return mysqli_error($conn);
    }
  }

  public function login_admin($username, $password){
    $hashedPassword = md5($password);
    $conn=$this->getConnection();
    $query = "SELECT * FROM tbl_admin_account WHERE admin_username = '$username' AND admin_password = '$hashedPassword'";
    $loginUser = $conn->query($query);
    if($loginUser) {
      return $loginUser;
    } else {
      return false;
    }
  }

  public function view_all_employee(){
    $con = $this->getConnection();
    $query = "SELECT civilian_ID as emp_id, type_of_employee as emptype, civilian_fName as emp_fName, civilian_mName as emp_mName, civilian_lName as emp_lName, civilian_email as emp_email, civilian_office as emp_office, civilian_rank as empRank, downpayment_count as dpCount, dp_5k_count as dp5k, dp_10k_count as dp10k, fullpayment_count as fp_count, fp_5k_count as fp5k, fp_10k_count as fp10k, penalty_count as penaltyCount, penalty_5k_count as penalty5k, penalty_10k_count as penalty10k, la_5k_count as la5k, la_10k_count as la10k FROM tbl_civilian_employee UNION SELECT officer_ID, type_of_employee, officer_fName, officer_mName, officer_lName, officer_email, officer_headquarter, officer_rank, downpayment_count, dp_5k_count, dp_10k_count, fullpayment_count, fp_5k_count, fp_10k_count, penalty_count, penalty_5k_count, penalty_10k_count, la_5k_count, la_10k_count FROM tbl_officersandep";
    $data = $con->query($query);
    if($data){
      return $data;
    } else {
      return false;
    }
    $con-close();
  }

  public function search_data($keyword){
    $con = $this->getConnection();
    $query = "SELECT civilian_ID as emp_id, civilian_fName as emp_fName, civilian_mName as emp_mName, civilian_lName as emp_lName, civilian_email as emp_email, civilian_office as emp_office FROM tbl_civilian_employee WHERE civilian_fName LIKE '%" . $keyword . "%' OR civilian_lName LIKE '%" . $keyword . "%' UNION SELECT officer_ID, officer_fName, officer_mName, officer_lName, officer_email, officer_headquarter FROM tbl_officersandep WHERE officer_fName LIKE '%" . $keyword . "%' OR officer_lName LIKE '%" . $keyword . "%'";
    $data = $con->query($query);
    if($data){
      return $data;
    } else {
      return false;
    }
  }

  /* --- END OF ADMIN SIDE */

  /* OFFICER SIDE */
  public function add_new_officers_and_ep($emp_type, $oaep_fname, $oaep_lname, $oaep_mname, $oaep_headquarter, $oaep_email, $oaep_contactnumber, $oaep_birthdate, $oaep_address, $oaep_rank, $downpayment_count, $db_5k_count, $db_10k_count, $fullpayment_count, $fp_5k_count, $fp_10k_count, $penalty_count, $penalty_5k_count, $penalty_10k_count, $la_5k_count, $la_10k_count){
    $con = $this->getConnection();
    $query = "INSERT INTO tbl_officersandep(type_of_employee, officer_fName, officer_lName, officer_mName, officer_headquarter, officer_email, officer_contactNumber, officer_birthdate, officer_address, officer_rank, downpayment_count, dp_5k_count, dp_10k_count, fullpayment_count, fp_5k_count, fp_10k_count, penalty_count, penalty_5k_count, penalty_10k_count, la_5k_count, la_10k_count) 
    VALUES('$emp_type', '$oaep_fname', '$oaep_lname', '$oaep_mname', '$oaep_headquarter', '$oaep_email', '$oaep_contactnumber', '$oaep_birthdate', '$oaep_address', '$oaep_rank', '$downpayment_count', '$db_5k_count', '$db_10k_count', '$fullpayment_count', '$fp_5k_count', '$fp_10k_count', '$penalty_count', '$penalty_5k_count', '$penalty_10k_count', '$la_5k_count', '$la_10k_count')";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      return false;
    }
  }

  public function view_oaep_profile($oaep_ID)
  {
    $con = $this->getConnection();
    $query = "SELECT * FROM tbl_officersandep WHERE officer_ID = '$oaep_ID'";
    $get_officer = $con->query($query);
    if($get_officer){
      return $get_officer;
    } else {
      return false;
    }
    $con->close();
  }

  public function display_officers(){
    $con=$this->getConnection();
    $query = "SELECT * FROM tbl_officersandep";
    $oaep_list = $con->query($query);
    if($oaep_list){
      return $oaep_list;
    } else {
      return false;
    }
    $con->close();
  }
  /* --- END OF OFFICER SIDE --- */

  /* CIVILIAN SIDE */
  public function add_new_civilian_record($emp_type, $civ_fname, $civ_lname, $civ_mname, $civ_office, $civ_email, $civ_contactnumber, $civ_birthdate, $civ_address, $civ_rank, $downpayment_count, $db_5k_count, $db_10k_count, $fullpayment_count, $fp_5k_count, $fp_10k_count, $penalty_count, $penalty_5k_count, $penalty_10k_count, $la_5k_count, $la_10k_count){
    $con = $this->getConnection();
    $query = "INSERT INTO tbl_civilian_employee(type_of_employee, civilian_fName, civilian_lName, civilian_mName, civilian_office, civilian_email, civilian_contactNumber, civilian_birthdate, civilian_address, civilian_rank, downpayment_count, dp_5k_count, dp_10k_count, fullpayment_count, fp_5k_count, fp_10k_count, penalty_count, penalty_5k_count, penalty_10k_count, la_5k_count, la_10k_count)
    VALUES('$emp_type', '$civ_fname', '$civ_lname', '$civ_mname', '$civ_office', '$civ_email', '$civ_contactnumber', '$civ_birthdate', '$civ_address', '$civ_rank', '$downpayment_count', '$db_5k_count', '$db_10k_count', '$fullpayment_count', '$fp_5k_count', '$fp_10k_count', '$penalty_count', '$penalty_5k_count', '$penalty_10k_count', '$la_5k_count', '$la_10k_count')";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  public function view_civilian_profile($ce_id){
    $con = $this->getConnection();
    $query = "SELECT * FROM tbl_civilian_employee WHERE civilian_ID = '$ce_id'";
    $get_civilian = $con->query($query);
    if($get_civilian){
      return $get_civilian;
    } else {
      return false;
    }
    $con->close();
  }

  public function display_civilian(){
    $con=$this->getConnection();
    $query = "SELECT * FROM tbl_civilian_employee";
    $ce_list = $con->query($query);
    if($ce_list) {
      return $ce_list;
    } else {
      return false;
    }
    $con->close();
  }
  /* --- END OF CIVILIAN SIDE --- */

  /* LOAN RATES DATA */
  // 5K Rates
  public function loan_rates_5K(){
    $con=$this->getConnection();
    $query = "SELECT * FROM tbl_5k_rates";
    $LOANRATES_5K = $con->query($query);
    if($LOANRATES_5K){
      return $LOANRATES_5K;
    } else {
      return false;
    }
    $con->close();
  }

  // 10K Rates
  public function loan_rates_10K(){
    $con=$this->getConnection();
    $query = "SELECT * FROM tbl_10k_rates";
    $LOANRATES_10K = $con->query($query);
    if($LOANRATES_10K){
      return $LOANRATES_10K;
    } else {
      return false;
    }
    $con->close();
  }

  // LOAN TRANSACTIONS //

  /* ADD NEW LOAN RECORD */
  // For new 5k record //
  // 'nl' for New Loan //$nl_loanAmount, $nl_credit, $nl_monthlypayment, $nl_beginningBalance, $nl_dateBorrowed, $nl_remarks
  public function add_new_5k_record($borrower_id, $ctrlno_prefix, $fname, $mname, $lname, $emp_type, $loan_type, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $debit_pay, $interest_rate, $balance_rate, $date_of_loan, $comment_remarks, $penalty_per_month, $emp_office, $emp_rank, $first_payment, $second_payment, $third_payment, $fourth_payment, $fifth_payment, $full_payment, $status, $isNewLoan)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_new_5k_loan(borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, type_of_loan, loan_amount_5k_rate, monthly_payment_5k_rate, credit_5k_rate, debit_pay_5k, interest_rate_5k, balance_rate_5k, date_of_loan, comment, penalty, office, emp_rank, first_payment, second_payment, third_payment, fourth_payment, fifth_payment, full_payment, loan_status, isNewLoan)
    VALUES('$borrower_id', '$ctrlno_prefix', '$fname', '$mname', '$lname', '$emp_type', '$loan_type', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$debit_pay', '$interest_rate', '$balance_rate', '$date_of_loan', '$comment_remarks', '$penalty_per_month', '$emp_office', '$emp_rank', '$first_payment', '$second_payment', '$third_payment', '$fourth_payment', '$fifth_payment', '$full_payment', '$status', '$isNewLoan')";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  public function select_emp($id, $fname, $mname, $lname, $emp_type){
    $con=$this->getConnection();
    $query = "SELECT civilian_ID as eid, civilian_fName as fname, civilian_mName as mname, civilian_lName as lname, type_of_employee as emptype, civilian_email as email FROM tbl_civilian_employee WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$emp_type' UNION SELECT officer_ID, type_of_employee, officer_fName, officer_mName, officer_lName, officer_email FROM tbl_officersandep WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$emp_type'";
    $select_query = $con->query($query);
    if($select_query){
      return $select_query;
    } else {
      return false;
    }
    $con->close();
  }

  public function select_new_loan_5k($loan_id){
    $con=$this->getConnection();
    $query = "SELECT * FROM tbl_new_5k_loan WHERE loan_id_5k = '$loan_id'";
    $display_5k_loan_panel = $con->query($query);
    if($display_5k_loan_panel){
      return $display_5k_loan_panel;
    } else {
      return false;
    }
    $con->close();
  }

  public function new_5k_list()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_new_5k_loan";
    $view_list = $con->query($query);
    if($view_list){
      return $view_list;
    } else {
      return false;
    }
    $con->close();
  }

  public function check_if_5k_empty()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_new_5k_loan";
    $check = $con->query($query);
    if($check){
      return $check;
    } else {
      return false;
    }
    $con->close();
  }

  public function check_1stpayment_table()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_1stpayment";
    $check=$con->query($query);
    if($check){
      return $check;
    } else {
      return false;
    }
    $con->close();
  }

  // ### Loan payment ### //
  //tbl_1stpayment
  public function add_to_1stpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_1stpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount')";
    $first_payment = $con->query($query);
    if($first_payment){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  //tbl_2ndpayment
  public function add_to_2ndpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_2ndpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount')";
    $second_payment = $con->query($query);
    if($second_payment){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  //tbl_3rdpayment
  public function add_to_3rdpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_3rdpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount')";
    $third_payment = $con->query($query);
    if($third_payment){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  //tbl_4thpayment
  public function add_to_4thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_4thpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount')";
    $fourth_payment = $con->query($query);
    if($fourth_payment){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  //tbl_5thpayment
  public function add_to_5thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_5thpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount')";
    $fifth_payment = $con->query($query);
    if($fifth_payment){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  //tbl_fullpayment
  public function add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_fullpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount')";
    $full_payment = $con->query($query);
    if($full_payment){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  public function update_civilian_la5k_count($id, $fname, $mname, $lname, $emp_type, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET la_5k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$emp_type'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  public function update_civilian_la10k_count($id, $fname, $mname, $lname, $emp_type, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET la_10k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$emp_type'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  public function update_officer_la5k_count($id, $fname, $mname, $lname, $emp_type, $increment)
  {
    $con=$this->getConnection();
    // $query = 'UPDATE tbl_officersandep SET la_5k_count = ' . +1 . ' WHERE officer_ID = ' . $id . ' AND officer_fName = ' . $fname . ' AND officer_mName = ' . $mname . ' AND officer_lName = ' . $lname . ' AND type_of_employee = ' . $emp_type . '';
    $query = "UPDATE tbl_officersandep SET la_5k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$emp_type'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  // increment civilian downpayment (dp) count //
  // dp5k
  public function update_dp5k_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET dp_5k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // dp10k
  public function update_dp10k_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET dp_10k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // downpayment count; increment by 1 whether dp5k or dp10k
  public function update_downpayment_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET downpayment_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // increment civilian fullpayment (fp) count
  // fp5k
  public function update_fp_5k_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET fp_5k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // fp10k
  public function update_fp_10k_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET fp_10k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // fullpayment count; increment by 1 whether fp5k or fp10k
  public function update_fullpayment_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET fullpayment_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // increment officer downpayment (dp) count //
  // dp5k
  public function update_dp5k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET dp_5k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // dp10k
  public function update_dp10k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET dp_10k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // downpayment count; increment by 1 whether dp5k or dp10k
  public function update_downpayment_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET downpayment_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // increment civilian fullpayment (fp) count
  // fp5k
  public function update_fp_5k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET fp_5k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // fp10k
  public function update_fp_10k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET fp_10k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }

  // fullpayment count; increment by 1 whether fp5k or fp10k
  public function update_fullpayment_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET fullpayment_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
  }
}
?>