<?php

namespace loan950;

class CivilianEmployee {
  const HOST = 'localhost';
  const USERNAME = 'root';
  const PASSWORD = '';
  const DATABASE = 'loandb';

  private $con;

  public function __construct(Type $var = null) {
    $this->con = $this->getConnection();
  }

  public function getConnection() {
    $con = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);
    if(mysqli_connect_errno()){
      trigger_error("Database Connection Problem.");
    }

    $con->set_charset("utf8");
    return $con;
  }

  // Admin side
  public function add_new_civilian_record($civ_fname, $civ_lname, $civ_mname, $civ_office, $civ_email, $civ_contactnumber, $civ_birthdate, $civ_address){
    $con = $this->getConnection();
    $query = "INSERT INTO tbl_civilian_employee(civilian_fName, civilian_lName, civilian_mName, civilian_office, civilian_email, civilian_contactNumber, civilian_birthdate, civilian_address)
    VALUES('$civ_fname', '$civ_lname', '$civ_mname', '$civ_office', '$civ_email', '$civ_contactnumber', '$civ_birthdate', '$civ_address')";
    $insert_query = $con->query($query);
    if($insert_query){
      return true;
    } else {
      return false;
    }
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
  }

  public function display_civilian(){
    $con=$this>getConnection();
    $query = "SELECT * FROM tbl_civilian_employee";
    $ce_list = $con->query($query);
    if($ce_list) {
      return $ce_list;
    } else {
      return false;
    }
  }
}
?>