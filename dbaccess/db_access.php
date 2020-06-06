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
    $con->close();
  }

  // get civilian la_5k count for it will update
  // upon admin's approval;
  public function get_civilian_la5kcount($civilian_id, $type_of_employee, $civilian_fname, $civilian_mname, $civilian_lname, $civilian_email)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_civilian_employee WHERE civilian_ID = '$civilian_id' AND type_of_employee = '$type_of_employee' AND civilian_fName = '$civilian_fname' AND civilian_mName = '$civilian_mname' AND civilian_lName = '$civilian_lname' AND civilian_email = '$civilian_email'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      return false;
    }
    $con->close();
  }

  public function select_emp_account()
  {
    $con=$this->getConnection();
    $query = "SELECT civilian_ID as emp_id, type_of_employee as emptype, civilian_fName as emp_fName, civilian_mName as emp_mName, civilian_lName as emp_lName, civilian_email as emp_email, civilian_office as emp_office, civilian_rank as empRank, has_account as empAccount, downpayment_count as dpCount, dp_5k_count as dp5k, dp_10k_count as dp10k, fullpayment_count as fp_count, fp_5k_count as fp5k, fp_10k_count as fp10k, penalty_count as penaltyCount, penalty_5k_count as penalty5k, penalty_10k_count as penalty10k, la_5k_count as la5k, la_10k_count as la10k FROM tbl_civilian_employee WHERE has_account = 0 UNION SELECT officer_ID, type_of_employee, officer_fName, officer_mName, officer_lName, officer_email, officer_headquarter, officer_rank, has_account, downpayment_count, dp_5k_count, dp_10k_count, fullpayment_count, fp_5k_count, fp_10k_count, penalty_count, penalty_5k_count, penalty_10k_count, la_5k_count, la_10k_count FROM tbl_officersandep WHERE has_account = 0";
    $res = $con->query($query);
    if($res){
      return $res;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function select_civ_account()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_civilian_employee WHERE has_account = 0";
    $res=$con->query($query);
    if($res){
      return $res;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // get the downpayment (dp) and fullpayment (dp) column of the employee
  public function get_dp_and_fp($borrower_id, $fname, $mname, $lname, $office, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query = "SELECT civilian_ID as emp_id, type_of_employee as emptype, civilian_fName as emp_fName, civilian_mName as emp_mName, civilian_lName as emp_lName, civilian_email as emp_email, civilian_office as emp_office, civilian_rank as empRank, downpayment_count as dpCount, dp_5k_count as dp5k, dp_10k_count as dp10k, fullpayment_count as fp_count, fp_5k_count as fp5k, fp_10k_count as fp10k, penalty_count as penaltyCount, penalty_5k_count as penalty5k, penalty_10k_count as penalty10k, la_5k_count as la5k, la_10k_count as la10k FROM tbl_civilian_employee WHERE civilian_ID = '$borrower_id' AND type_of_employee = '$type_of_employee' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND civilian_office = '$office' AND civilian_rank = '$rank' UNION SELECT officer_ID, type_of_employee, officer_fName, officer_mName, officer_lName, officer_email, officer_headquarter, officer_rank, downpayment_count, dp_5k_count, dp_10k_count, fullpayment_count, fp_5k_count, fp_10k_count, penalty_count, penalty_5k_count, penalty_10k_count, la_5k_count, la_10k_count FROM tbl_officersandep WHERE officer_ID = '$borrower_id' AND type_of_employee = '$type_of_employee' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND officer_headquarter = '$office' AND officer_rank = '$rank'";
    $res = $con->query($query);
    if($res){
      return $res;
    } else {
      return false;
    }
    $con->close();
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

  public function register_officer_account($officer_id, $officer_account_fName, $officer_account_lName, $officer_account_mName, $type_of_employee, $officer_account_rank, $officer_account_headquarter, $officer_account_email, $officer_account_contactNumber, $officer_account_birthdate, $officer_account_address, $officer_account_username, $officer_account_password, $officer_confirm_password)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_officersandep_account(officer_id, officer_account_fName, officer_account_lName, officer_account_mName, type_of_employee, officer_account_rank, officer_account_headquarter, officer_account_email, officer_account_contactNumber, officer_account_birthdate, officer_account_address, officer_account_username, officer_account_password, officer_confirm_password)
    VALUES('$officer_id', '$officer_account_fName', '$officer_account_lName', '$officer_account_mName', '$type_of_employee', '$officer_account_rank', '$officer_account_headquarter', '$officer_account_email', '$officer_account_contactNumber', '$officer_account_birthdate', '$officer_account_address', '$officer_account_username', '$officer_account_password', '$officer_confirm_password')";
    $insert_account = $con->query($query);
    if($insert_account){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function update_has_account_officer($officer_id, $officer_account_fName, $officer_account_lName, $officer_account_mName, $officer_account_email, $officer_account_rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_officersandep SET has_account = 1 WHERE officer_ID = '$officer_id' AND officer_fName = '$officer_account_fName' AND officer_lName = '$officer_account_lName' AND officer_mName = '$officer_account_mName' AND officer_email = '$officer_account_email' AND officer_rank = '$officer_account_rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function add_new_officers_and_ep($emp_type, $oaep_fname, $oaep_lname, $oaep_mname, $oaep_headquarter, $oaep_email, $oaep_contactnumber, $oaep_birthdate, $oaep_address, $oaep_rank, $has_account, $downpayment_count, $db_5k_count, $db_10k_count, $fullpayment_count, $fp_5k_count, $fp_10k_count, $penalty_count, $penalty_5k_count, $penalty_10k_count, $la_5k_count, $la_10k_count){
    $con = $this->getConnection();
    $query = "INSERT INTO tbl_officersandep(type_of_employee, officer_fName, officer_lName, officer_mName, officer_headquarter, officer_email, officer_contactNumber, officer_birthdate, officer_address, officer_rank, has_account, downpayment_count, dp_5k_count, dp_10k_count, fullpayment_count, fp_5k_count, fp_10k_count, penalty_count, penalty_5k_count, penalty_10k_count, la_5k_count, la_10k_count) 
    VALUES('$emp_type', '$oaep_fname', '$oaep_lname', '$oaep_mname', '$oaep_headquarter', '$oaep_email', '$oaep_contactnumber', '$oaep_birthdate', '$oaep_address', '$oaep_rank', '$has_account', '$downpayment_count', '$db_5k_count', '$db_10k_count', '$fullpayment_count', '$fp_5k_count', '$fp_10k_count', '$penalty_count', '$penalty_5k_count', '$penalty_10k_count', '$la_5k_count', '$la_10k_count')";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      return false;
    }
  }

  public function if_off_exist($officer_username)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_officersandep_account WHERE officer_account_username = '$officer_username'";
    $is_exist=$con->query($query);
    if($is_exist){
      return $is_exist;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function login_officer($officer_username, $officer_password)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_officersandep_account WHERE officer_account_username = '$officer_username' AND officer_account_password = '$officer_password'";
    $login_officer = $con->query($query);
    if($login_officer){
      return $login_officer;
    } else {
      die($con->error);
    }
    $con->close();
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

  public function select_off_account()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_officersandep WHERE has_account = 0";
    $res=$con->query($query);
    if($res){
      return $res;
    } else {
      die($con->error);
    }
    $con->close();
  }
  /* --- END OF OFFICER SIDE --- */

  /* CIVILIAN SIDE */

  public function register_civilian_account($civilian_id, $civilian_account_fName, $civilian_account_lName, $civilian_account_mName, $type_of_employee, $civilian_account_rank, $civilian_account_office, $civilian_account_email, $civilian_account_contactNumber, $civilian_account_birthdate, $civilian_account_address, $civilian_username, $civilian_password, $civilian_confirm_password)
  {
    $con=$this->getConnection();
    $query = "INSERT INTO tbl_civilian_employee_account(civilian_id, civilian_account_fName, civilian_account_lName, civilian_account_mName, type_of_employee, civilian_account_rank, civilian_account_office, civilian_account_email, civilian_account_contactNumber, civilian_account_birthdate, civilian_account_address, civilian_username, civilian_password, civilian_confirm_password)
    VALUES('$civilian_id', '$civilian_account_fName', '$civilian_account_lName', '$civilian_account_mName', '$type_of_employee', '$civilian_account_rank', '$civilian_account_office', '$civilian_account_email', '$civilian_account_contactNumber', '$civilian_account_birthdate', '$civilian_account_address', '$civilian_username', '$civilian_password', '$civilian_confirm_password')";
    $insert_account = $con->query($query);
    if($insert_account){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function update_has_account_civilian($civilian_id, $civilian_fname, $civilian_mname, $civilian_lname, $civilian_email, $civilian_rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_civilian_employee SET has_account = 1 WHERE civilian_ID = '$civilian_id' AND civilian_fName = '$civilian_fname' AND civilian_mName = '$civilian_mname' AND civilian_lName = '$civilian_lname' AND civilian_email = '$civilian_email' AND civilian_rank = '$civilian_rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function if_civ_exist($civilian_username)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_civilian_employee_account WHERE civilian_username = '$civilian_username'";
    $is_exist = $con->query($query);
    if($is_exist){
      return $is_exist;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function login_civ($civilian_username, $civilian_password)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_civilian_employee_account WHERE civilian_username = '$civilian_username' AND civilian_password = '$civilian_password'";
    $log_civ=$con->query($query);
    if($log_civ){
      return $log_civ;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function add_new_civilian_record($emp_type, $civ_fname, $civ_lname, $civ_mname, $civ_office, $civ_email, $civ_contactnumber, $civ_birthdate, $civ_address, $civ_rank, $has_account, $downpayment_count, $db_5k_count, $db_10k_count, $fullpayment_count, $fp_5k_count, $fp_10k_count, $penalty_count, $penalty_5k_count, $penalty_10k_count, $la_5k_count, $la_10k_count){
    $con = $this->getConnection();
    $query = "INSERT INTO tbl_civilian_employee(type_of_employee, civilian_fName, civilian_lName, civilian_mName, civilian_office, civilian_email, civilian_contactNumber, civilian_birthdate, civilian_address, civilian_rank, has_account, downpayment_count, dp_5k_count, dp_10k_count, fullpayment_count, fp_5k_count, fp_10k_count, penalty_count, penalty_5k_count, penalty_10k_count, la_5k_count, la_10k_count)
    VALUES('$emp_type', '$civ_fname', '$civ_lname', '$civ_mname', '$civ_office', '$civ_email', '$civ_contactnumber', '$civ_birthdate', '$civ_address', '$civ_rank', '$has_account', '$downpayment_count', '$db_5k_count', '$db_10k_count', '$fullpayment_count', '$fp_5k_count', '$fp_10k_count', '$penalty_count', '$penalty_5k_count', '$penalty_10k_count', '$la_5k_count', '$la_10k_count')";
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
  public function add_new_5k_record($borrower_id, $ctrlno_prefix, $fname, $mname, $lname, $emp_type, $loan_type, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $debit_pay, $interest_rate, $balance_rate, $date_of_loan, $comment_remarks, $penalty_per_month, $emp_office, $emp_rank, $first_payment, $second_payment, $third_payment, $fourth_payment, $fifth_payment, $sixth_payment, $full_payment, $status, $isNewLoan, $is_loan_requested)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_new_5k_loan(borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, type_of_loan, loan_amount_5k_rate, monthly_payment_5k_rate, credit_5k_rate, debit_pay_5k, interest_rate_5k, balance_rate_5k, date_of_loan, comment, penalty, office, emp_rank, first_payment, second_payment, third_payment, fourth_payment, fifth_payment, sixth_payment, full_payment, loan_status, isNewLoan, is_loan_requested)
    VALUES('$borrower_id', '$ctrlno_prefix', '$fname', '$mname', '$lname', '$emp_type', '$loan_type', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$debit_pay', '$interest_rate', '$balance_rate', '$date_of_loan', '$comment_remarks', '$penalty_per_month', '$emp_office', '$emp_rank', '$first_payment', '$second_payment', '$third_payment', '$fourth_payment', '$fifth_payment', '$sixth_payment', '$full_payment', '$status', '$isNewLoan', '$is_loan_requested')";
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

  // display borrower's 5k transaction as table
  public function display_borrower_new_5k_list($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $emp_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_new_5k_loan WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$emp_rank'";
    $get_info=$con->query($query);
    if($get_info){
      return $get_info;
    } else {
      return false;
    }
    $con->close();
  }

  // Add New 10k Loan //
  public function add_new_10k_record($borrower_id, $ctrlno_prefix, $fname, $mname, $lname, $emp_type, $loan_type, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $debit_pay, $interest_rate, $balance_rate, $date_of_loan, $comment_remarks, $penalty_per_month, $emp_office, $emp_rank, $first_payment, $second_payment, $third_payment, $fourth_payment, $fifth_payment, $sixth_payment, $full_payment, $status, $isNewLoan, $is_loan_requested_10k)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_new_10k_loan(borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, type_of_loan, loan_amount_10k_rate, monthly_payment_10k_rate, credit_10k_rate, debit_pay_10k, interest_rate_10k, balance_rate_10k, date_of_loan, comment, penalty_10k, office_10k, emp_rank_10k, first_payment_10k, second_payment_10k, third_payment_10k, fourth_payment_10k, fifth_payment_10k, sixth_payment_10k, full_payment_10k, loan_status_10k, isNewLoan, is_loan_requested_10k)
    VALUES('$borrower_id', '$ctrlno_prefix', '$fname', '$mname', '$lname', '$emp_type', '$loan_type', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$debit_pay', '$interest_rate', '$balance_rate', '$date_of_loan', '$comment_remarks', '$penalty_per_month', '$emp_office', '$emp_rank', '$first_payment', '$second_payment', '$third_payment', '$fourth_payment', '$fifth_payment', '$sixth_payment', '$full_payment', '$status', '$isNewLoan', '$is_loan_requested_10k')";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  public function select_new_loan_10k($loan_id)
  {
    $con=$this->getConnection();
    $query = "SELECT * FROM tbl_new_10k_loan WHERE loan_id_10k = '$loan_id'";
    $display_10k_loan_panel = $con->query($query);
    if($display_10k_loan_panel){
      return $display_10k_loan_panel;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function new_10k_list()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_new_10k_loan";
    $view_list = $con->query($query);
    if($view_list){
      return $view_list;
    } else {
      return false;
    }
  }

  public function display_borrower_new_10k_list($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $emp_rank_10k)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_new_10k_loan WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$emp_rank_10k'";
    $get_info=$con->query($query);
    if($get_info){
      return $get_info;
    } else {
      return false;
    }
    $con->close();
  }

  // ### Loan payment ### //
  //tbl_1stpayment
  public function first_payment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_rate, $amount_paid, $is_paid, $new_current_interest_5k, $new_current_balance_5k, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks)
  {
    $connect = $this->getConnection();
    $insert_payment = "INSERT INTO tbl_1stpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, borrower_office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount, remarks)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_5k_rate', '$monthly_payment_5k_rate', '$credit_rate', '$amount_paid', '$is_paid', '$new_current_interest_5k', '$new_current_balance_5k', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount', '$remarks')";
    $add_payment = $connect->query($insert_payment);
    if($add_payment){
      return true;
    } else {
      die($connect->error);
    }
    $con->close();
  }

  // get 1st payment data
  public function get_1st_payment()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_1stpayment";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      return false;
    }
    $con->close();
  }

  // get borrower's 1st payment transaction
  public function display_1stpayment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_1stpayment WHERE loan_id = '$loan_id' AND type_of_loanAccount = '$type_of_loanAccount' AND borrower_id = '$borrower_id' AND ctrl_no_prefix = '$ctrl_no_prefix' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      return false;
    }
    $con->close();
  }

  //tbl_2ndpayment
  public function add_to_2ndpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_rate, $amount_paid, $is_paid, $new_current_interest_5k, $new_current_balance_5k, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_2ndpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rank, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount, remarks)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_5k_rate', '$monthly_payment_5k_rate', '$credit_rate', '$amount_paid', '$is_paid', '$new_current_interest_5k', '$new_current_balance_5k', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount', '$remarks')";
    $second_payment = $con->query($query);
    if($second_payment){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // get borrower's 2nd payment transaction
  public function display_2ndpayment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_2ndpayment WHERE loan_id = '$loan_id' AND type_of_loanAccount = '$type_of_loanAccount' AND borrower_id = '$borrower_id' AND ctrl_no_prefix = '$ctrl_no_prefix' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  //tbl_3rdpayment
  public function add_to_3rdpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_3rdpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount, remarks)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount', '$remarks')";
    $third_payment = $con->query($query);
    if($third_payment){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  public function display_3rdpayment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_3rdpayment WHERE loan_id = '$loan_id' AND type_of_loanAccount = '$type_of_loanAccount' AND borrower_id = '$borrower_id' AND ctrl_no_prefix = '$ctrl_no_prefix' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  //tbl_4thpayment
  public function add_to_4thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_4thpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount, remarks)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount', '$remarks')";
    $fourth_payment = $con->query($query);
    if($fourth_payment){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function display_4thpayment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_4thpayment WHERE loan_id = '$loan_id' AND type_of_loanAccount = '$type_of_loanAccount' AND borrower_id = '$borrower_id' AND ctrl_no_prefix = '$ctrl_no_prefix' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  //tbl_5thpayment
  public function add_to_5thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_5thpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount, remarks)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount', '$remarks')";
    $fifth_payment = $con->query($query);
    if($fifth_payment){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function display_5thpayment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_5thpayment WHERE loan_id = '$loan_id' AND type_of_loanAccount = '$type_of_loanAccount' AND borrower_id = '$borrower_id' AND ctrl_no_prefix = '$ctrl_no_prefix' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // 6th payment
  public function add_to_6thpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_6thpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, borrower_office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount, remarks)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount', '$remarks')";
    $sixth_payment = $con->query($query);
    if($sixth_payment){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function display_6thpayment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_6thpayment WHERE loan_id = '$loan_id' AND type_of_loanAccount = '$type_of_loanAccount' AND borrower_id = '$borrower_id' AND ctrl_no_prefix = '$ctrl_no_prefix' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  //tbl_fullpayment
  public function add_to_fullpayment_table($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $office, $borrower_rank, $loan_amount_rate, $monthly_payment_rate, $credit_rate, $amount_paid, $is_paid, $current_interest, $current_balance, $payment_option, $date_of_payment, $has_penalty, $is_penalty_paid, $penalty_amount, $remarks)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_fullpayment(loan_id, type_of_loanAccount, borrower_id, ctrl_no_prefix, fname, mname, lname, type_of_employee, office, borrower_rank, loan_amount_rate, monthly_payment_rate, credit_rate, amount_paid, is_paid, current_interest, current_balance, payment_option, date_of_payment, has_penalty, is_penalty_paid, penalty_amount, remarks)
    VALUES('$loan_id', '$type_of_loanAccount', '$borrower_id', '$ctrl_no_prefix', '$fname', '$mname', '$lname', '$type_of_employee', '$office', '$borrower_rank', '$loan_amount_rate', '$monthly_payment_rate', '$credit_rate', '$amount_paid', '$is_paid', '$current_interest', '$current_balance', '$payment_option', '$date_of_payment', '$has_penalty', '$is_penalty_paid', '$penalty_amount', '$remarks')";
    $full_payment = $con->query($query);
    if($full_payment){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function display_fullpayment($loan_id, $type_of_loanAccount, $borrower_id, $ctrl_no_prefix, $fname, $mname, $lname, $type_of_employee, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_fullpayment WHERE loan_id = '$loan_id' AND type_of_loanAccount = '$type_of_loanAccount' AND borrower_id = '$borrower_id' AND ctrl_no_prefix = '$ctrl_no_prefix' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
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
    $con->close();
  }

  public function update_officer_la5k_count($id, $fname, $mname, $lname, $emp_type, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET la_5k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$emp_type'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  public function update_officer_la10k_count($id, $fname, $mname, $lname, $emp_type, $increment)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_officersandep SET la_10k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$emp_type'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  // increment civilian downpayment (dp) count //
  // dp5k
  public function increment_dp5k_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET dp_5k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
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
    $con->close();
  }

  // downpayment count; increment by 1 whether dp5k or dp10k
  public function increment_downpayment_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET downpayment_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // increment civilian fullpayment (fp) count
  // fp5k
  public function increment_fp_5k_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET fp_5k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // fp10k
  public function increment_fp_10k_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET fp_10k_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // fullpayment count; increment by 1 whether fp5k or fp10k
  public function increment_fullpayment_count_civilian($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_civilian_employee SET fullpayment_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // increment officer downpayment (dp) count //
  // dp5k
  public function increment_dp5k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET dp_5k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // dp10k
  public function increment_dp10k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET dp_10k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // downpayment count; increment by 1 whether dp5k or dp10k
  public function increment_downpayment_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET downpayment_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // increment civilian fullpayment (fp) count
  // fp5k
  public function increment_fp_5k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET fp_5k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // fp10k
  public function increment_fp_10k_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET fp_10k_count = '$increment' WHERE officer_ID = '$id' AND officer_fName = '$fname' AND officer_mName = '$mname' AND officer_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // fullpayment count; increment by 1 whether fp5k or fp10k
  public function increment_fullpayment_count_officer($id, $fname, $mname, $lname, $type_of_employee, $increment)
  {
    $con=$this->getConnection();
    $query = "UPDATE tbl_officersandep SET fullpayment_count = '$increment' WHERE civilian_ID = '$id' AND civilian_fName = '$fname' AND civilian_mName = '$mname' AND civilian_lName = '$lname' AND type_of_employee = '$type_of_employee'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return true;
    }
    $con->close();
  }

  // update is_new_loan from the borrower's table //
  public function update_is_new_loan($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET isNewLoan = 0 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
    $con->close();
  }

  // update the payment option of on the new 5k loan table
  // first payment to '1';
  // is_new_loan to '0';
  public function update_first_payment($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET first_payment = 1 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }
  
  // second payment
  public function update_second_payment($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET second_payment = 1 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  // third payment
  public function update_third_payment($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET third_payment = 0 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  // fourth payment
  public function update_fourth_payment($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET fourth_payment = 0 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  // fifth payment
  public function update_fifth_payment($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET fifth_payment = 0 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  // full payment; fully paid / not active;
  public function update_full_payment($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET full_payment = 1 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
  }

  public function update_loan_status($loan_id_5k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_5k_loan SET loan_status = 1 WHERE loan_id_5k = '$loan_id_5k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
  }

  // update the payment option on the new 10k loan table
  // first payment to '1';
  // is_new_loan to '0';
  public function update_first_payment_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET first_payment_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  // second
  public function update_second_payment_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET second_payment_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  public function update_third_payment_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET third_payment_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  public function update_fourth_payment_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET fourth_payment_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function update_fifth_payment_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET fifth_payment_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  public function update_sixth_payment_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET sixth_payment_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
  }

  public function update_full_payment_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET full_payment_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  public function update_loan_status_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET loan_status_10k = 1 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  public function update_is_new_loan_10k($loan_id_10k, $borrower_id, $fname, $mname, $lname, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_new_10k_loan SET isNewLoan = 0 WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id' AND fname = '$fname' AND mname = '$mname' AND lname = '$lname' AND type_of_employee = '$type_of_employee' AND emp_rank_10k = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      return false;
    }
  }

  // loan request 5k //
  public function add_loan_request_5k($borrower_id, $borrower_account_id, $ctrl_no_prefix, $type_of_loan, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_office, $borrower_rank, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_5k_rate, $debit_pay_5k, $interest_rate_5k, $balance_rate_5k, $comment, $penalty, $first_payment, $second_payment, $third_payment, $fourth_payment, $fifth_payment, $full_payment, $loan_status, $is_new_loan, $is_granted, $is_declined, $is_pending, $is_loan_requested_5k)
  {
    $con=$this->getConnection();
    $query = "INSERT INTO tbl_loan_request_5k(borrower_id, account_id, ctrl_no_prefix, type_of_loan, borrower_username, borrower_fname, borrower_mname, borrower_lname, borrower_email, type_of_employee, borrower_office, borrower_rank, loan_amount_5k_rate, monthly_payment_5k_rate, credit_5k_rate, debit_pay_5k, interest_rate_5k, balance_rate_5k, comment, penalty, first_payment, second_payment, third_payment, fourth_payment, fifth_payment, full_payment, loan_status, is_new_loan, is_granted, is_declined, is_pending, is_loan_requested_5k)
    VALUES('$borrower_id', '$borrower_account_id', '$ctrl_no_prefix', '$type_of_loan', '$borrower_username', '$borrower_fname', '$borrower_mname', '$borrower_lname', '$borrower_email', '$type_of_employee', '$borrower_office', '$borrower_rank', '$loan_amount_5k_rate', '$monthly_payment_5k_rate', '$credit_5k_rate', '$debit_pay_5k', '$interest_rate_5k', '$balance_rate_5k', '$comment', '$penalty', '$first_payment', '$second_payment', '$third_payment', '$fourth_payment', '$fifth_payment', '$full_payment', '$loan_status', '$is_new_loan', '$is_granted', '$is_declined', '$is_pending', '$is_loan_requested_5k')";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function view_pending_loan_5k($borrower_id, $borrower_account_id, $type_of_loan, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_loan_request_5k WHERE is_pending = 1 AND borrower_id = '$borrower_id' AND account_id = '$borrower_account_id' AND type_of_loan = '$type_of_loan' AND borrower_username = '$borrower_username' AND borrower_fname = '$borrower_fname' AND borrower_mname = '$borrower_mname' AND borrower_lname = '$borrower_lname' AND type_of_employee = '$type_of_employee' AND borrower_office = '$borrower_office' AND borrower_rank = '$borrower_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // get the type_of_loan
  public function fetch_loan_request_5k()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_loan_request_5k";
    $get_data=$con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function view_declined_loan_5k($borrower_id, $type_of_loan, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_loan_request WHERE is_declined = 1";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // view civilian's granted loan 5k
  public function view_granted_loan_5k($loan_id, $borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_new_5k_loan WHERE loan_id_5k = '$loan_id' AND borrower_id = '$borrower_id' AND fname = '$borrower_fname' AND mname = '$borrower_mname' AND lname = '$borrower_lname' AND type_of_employee = '$type_of_employee' AND office = '$borrower_office' AND emp_rank = '$borrower_rank' AND is_loan_requested = 1";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function update_is_pending_5k($loan_request_id_5k, $borrower_id, $account_id, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_loan_request_5k SET is_pending = 0 WHERE loan_request_id = '$loan_request_id_5k' AND borrower_id = '$borrower_id' AND account_id = '$account_id' AND borrower_username = '$borrower_username' AND borrower_fname = '$borrower_fname' AND borrower_mname = '$borrower_mname' AND borrower_lname = '$borrower_lname' AND borrower_email = '$borrower_email' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function update_is_granted_5k($loan_request_id_5k, $borrower_id, $account_id, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_loan_request_5k SET is_granted = 1 WHERE loan_request_id = '$loan_request_id_5k' AND borrower_id = '$borrower_id' AND account_id = '$account_id' AND borrower_username = '$borrower_username' AND borrower_fname = '$borrower_fname' AND borrower_mname = '$borrower_mname' AND borrower_lname = '$borrower_lname' AND borrower_email = '$borrower_email' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }
  
  public function update_is_declined_5k($loan_request_id_5k, $borrower_id, $account_id, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $rank)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_loan_request_5k SET is_declined = 1 WHERE loan_request_id = '$loan_request_id_5k' AND borrower_id = '$borrower_id' AND account_id = '$account_id' AND borrower_username = '$borrower_username' AND borrower_fname = '$borrower_fname' AND borrower_mname = '$borrower_mname' AND borrower_lname = '$borrower_lname' AND borrower_email = '$borrower_email' AND type_of_employee = '$type_of_employee' AND borrower_rank = '$rank'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // fetch borrower's record //
  public function fetch_pending_request($loan_request_id_5k, $borrower_account_id, $borrower_id, $type_of_employee, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_username)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_loan_request_5k WHERE loan_request_id = '$loan_request_id_5k' AND account_id = '$borrower_account_id' AND borrower_id = '$borrower_id' AND type_of_employee = '$type_of_employee' AND borrower_fname = '$borrower_fname' AND borrower_mname = '$borrower_mname' AND borrower_lname = '$borrower_lname' AND borrower_username = '$borrower_username' AND is_pending = 1 AND is_granted = 0 AND is_declined = 0";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // get the loan_id of the borrower's requested loan
  public function get_5k_loan_id($borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank){
    $con=$this->getConnection();
    $query="SELECT loan_id_5k FROM tbl_new_5k_loan WHERE borrower_id = '$borrower_id' AND fname = '$borrower_fname' AND mname = '$borrower_mname' AND lname = '$borrower_lname' AND type_of_employee = '$type_of_employee' AND office = '$borrower_office' AND emp_rank = '$borrower_rank' AND is_loan_requested = 1";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // loan request 10k //
  public function add_loan_request_10k($borrower_id_10k, $borrower_account_id_10k, $ctrl_no_prefix_10k, $type_of_loan_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_10k_rate, $debit_pay_10k, $interest_rate_10k, $balance_rate_10k, $comment_10k, $penalty_10k, $first_payment_10k, $second_payment_10k, $third_payment_10k, $fourth_payment_10k, $fifth_payment_10k, $sixth_payment_10k, $full_payment_10k, $loan_status_10k, $is_new_loan_10k, $is_granted_10k, $is_declined_10k, $is_pending_10k, $is_loan_requested_10k)
  {
    $con=$this->getConnection();
    $query="INSERT INTO tbl_loan_request_10k(borrower_id_10k, account_id_10k, ctrl_no_prefix_10k, type_of_loan_10k, borrower_username_10k, borrower_fname_10k, borrower_mname_10k, borrower_lname_10k, borrower_email_10k, type_of_employee_10k, borrower_office_10k, borrower_rank_10k, loan_amount_10k_rate, monthly_payment_10k_rate, credit_10k_rate, debit_pay_10k, interest_rate_10k, balance_rate_10k, comment_10k, penalty_10k, first_payment_10k, second_payment_10k, third_payment_10k, fourth_payment_10k, fifth_payment_10k, sixth_payment_10k, full_payment_10k, loan_status_10k, is_new_loan_10k, is_granted_10k, is_declined_10k, is_pending_10k, is_loan_requested_10k)
    VALUES('$borrower_id_10k', '$borrower_account_id_10k', '$ctrl_no_prefix_10k', '$type_of_loan_10k', '$borrower_username_10k', '$borrower_fname_10k', '$borrower_mname_10k', '$borrower_lname_10k', '$borrower_email_10k', '$type_of_employee_10k', '$borrower_office_10k', '$borrower_rank_10k', '$loan_amount_10k_rate', '$monthly_payment_10k_rate', '$credit_10k_rate', '$debit_pay_10k', '$interest_rate_10k', '$balance_rate_10k', '$comment_10k', '$penalty_10k', '$first_payment_10k', '$second_payment_10k', '$third_payment_10k', '$fourth_payment_10k', '$fifth_payment_10k', '$sixth_payment_10k', '$full_payment_10k', '$loan_status_10k', '$is_new_loan_10k', '$is_granted_10k', '$is_declined_10k', '$is_pending_10k', $is_loan_requested_10k)";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function view_pending_loan_10k($borrower_id_10k, $borrower_account_id_10k, $type_of_loan_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_loan_request_10k WHERE is_pending_10k = 1 AND borrower_id_10k = '$borrower_id_10k' AND account_id_10k = '$borrower_account_id_10k' AND type_of_loan_10k = '$type_of_loan_10k' AND borrower_username_10k = '$borrower_username_10k' AND borrower_fname_10k = '$borrower_fname_10k' AND borrower_mname_10k = '$borrower_mname_10k' AND borrower_lname_10k = '$borrower_lname_10k' AND type_of_employee_10k = '$type_of_employee_10k' AND borrower_office_10k = '$borrower_office_10k' AND borrower_rank_10k = '$borrower_rank_10k'";
    $get_data=$con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function fetch_loan_request_10k()
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_loan_request_10k";
    $get_data=$con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function fetch_pending_request_10k($loan_request_id_10k, $borrower_account_id_10k, $borrower_id_10k, $type_of_employee_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_username_10k)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_loan_request_10k WHERE loan_request_id_10k = '$loan_request_id_10k' AND account_id_10k = '$borrower_account_id_10k' AND borrower_id_10k = '$borrower_id_10k' AND type_of_employee_10k = '$type_of_employee_10k' AND borrower_fname_10k = '$borrower_fname_10k' AND borrower_mname_10k = '$borrower_mname_10k' AND borrower_lname_10k = '$borrower_lname_10k' AND borrower_username_10k = '$borrower_username_10k' AND is_pending_10k = 1 AND is_granted_10k = 0 AND is_declined_10k = 0";
    $get_data=$con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
  }

  public function update_is_pending_10k($loan_request_id_10k, $borrower_id_10k, $account_id_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_loan_request_10k SET is_pending_10k = 0 WHERE loan_request_id_10k = '$loan_request_id_10k' AND borrower_id_10k = '$borrower_id_10k' AND account_id_10k = '$account_id_10k' AND borrower_username_10k = '$borrower_username_10k' AND borrower_fname_10k = '$borrower_fname_10k' AND borrower_mname_10k = '$borrower_mname_10k' AND borrower_lname_10k = '$borrower_lname_10k' AND borrower_email_10k = '$borrower_email_10k' AND type_of_employee_10k = '$type_of_employee_10k' AND borrower_rank_10k = '$borrower_rank_10k'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function update_is_granted_10k($loan_request_id_10k, $borrower_id_10k, $account_id_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_loan_request_10k SET is_granted_10k = 1 WHERE loan_request_id_10k = '$loan_request_id_10k' AND borrower_id_10k = '$borrower_id_10k' AND account_id_10k = '$account_id_10k' AND borrower_username_10k = '$borrower_username_10k' AND borrower_fname_10k = '$borrower_fname_10k' AND borrower_mname_10k = '$borrower_mname_10k' AND borrower_lname_10k = '$borrower_lname_10k' AND borrower_email_10k = '$borrower_email_10k' AND type_of_employee_10k = '$type_of_employee_10k' AND borrower_rank_10k = '$borrower_rank_10k'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  public function update_is_declined_10k($loan_request_id_10k, $borrower_id_10k, $account_id_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k)
  {
    $con=$this->getConnection();
    $query="UPDATE tbl_loan_request_10k SET is_declined_10k = 1 WHERE loan_request_id_10k = '$loan_request_id_10k' AND borrower_id_10k = '$borrower_id_10k' AND account_id_10k = '$account_id_10k' AND borrower_username_10k = '$borrower_username_10k' AND borrower_fname_10k = '$borrower_fname_10k' AND borrower_mname_10k = '$borrower_mname_10k' AND borrower_lname_10k = '$borrower_lname_10k' AND borrower_email_10k = '$borrower_email_10k' AND type_of_employee_10k = '$type_of_employee_10k' AND borrower_rank_10k = '$borrower_rank_10k'";
    $update_query = $con->query($query);
    if($update_query){
      return true;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // view civilian's granted loan 10k
  public function view_granted_loan_10k($loan_id_10k, $borrower_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_new_10k_loan WHERE loan_id_10k = '$loan_id_10k' AND borrower_id = '$borrower_id_10k' AND fname = '$borrower_fname_10k' AND mname = '$borrower_mname_10k' AND lname = '$borrower_lname_10k' AND type_of_employee = '$type_of_employee_10k' AND office_10k = '$borrower_office_10k' AND emp_rank_10k = '$borrower_rank_10k' AND is_loan_requested_10k = 1";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // get the loan_id_10k of the borrower's requested loan
  public function get_10k_loan_id($borrower_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k)
  {
    $con=$this->getConnection();
    $query="SELECT loan_id_10k FROM tbl_new_10k_loan WHERE borrower_id = '$borrower_id_10k' AND fname = '$borrower_fname_10k' AND mname = '$borrower_mname_10k' AND lname = '$borrower_lname_10k' AND type_of_employee = '$type_of_employee_10k' AND office_10k = '$borrower_office_10k' AND emp_rank_10k = '$borrower_rank_10k' AND is_loan_requested_10k = 1";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // get officer la count for it will update
  // upon admin's approval
  public function get_officer_lacount($officer_id, $type_of_employee, $officer_fname, $officer_mname, $officer_lname, $officer_email, $officer_rank)
  {
    $con=$this->getConnection();
    $query="SELECT * FROM tbl_officersandep WHERE officer_ID = '$officer_id' AND type_of_employee = '$type_of_employee' AND officer_fName = '$officer_fname' AND officer_mName = '$officer_mname' AND officer_lName = '$officer_lname' AND officer_email = '$officer_email' AND officer_rank = '$officer_rank'";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // DATA ANALYTICS //
  // Count all the total number of Borrowers (5K and 10K)
  public function total_num_borrowers()
  {
    $con=$this->getConnection();
    $query="SELECT SUM((SELECT count(loan_id_5k) FROM tbl_new_5k_loan) + (SELECT count(loan_id_10k) FROM tbl_new_10k_loan)) as totSum";
    $get_data=$con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
    $con->close();
  }

  // Get 5k and 10k count for pie Chart
  public function get_type_of_loan_count()
  {
    $con=$this->getConnection();
    $query="SELECT type_of_loan, count(*) as totalNum FROM tbl_new_5k_loan UNION SELECT type_of_loan, count(*) as totNum FROM tbl_new_10k_loan";
    $get_data = $con->query($query);
    if($get_data){
      return $get_data;
    } else {
      die($con->error);
    }
  }
}
?>