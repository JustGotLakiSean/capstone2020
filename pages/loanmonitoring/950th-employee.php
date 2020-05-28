<?PHP
namespace loan950;

use \loan950\db_access;
include("../../dbaccess/db_access.php");

// Validate Officers And EP before "adding" to
// the database by the Admin
if(isset($_POST['submitnewofficer'])){
  $oaep_firstname = '';
  $oaep_middlename = '';
  $oaep_lastname = '';
  $oaep_birthdate = '';
  $oaep_address = '';
  $oaep_office = '';
  $oaep_rank = '';
  $oaep_email = '';
  $oaep_contactnumber = '';
  $emp_type = '';
  $has_account = '';
  $downpayment_count = '';
  $db_5k_count = '';
  $db_10k_count = '';
  $fullpayment_count = '';
  $fp_5k_count = '';
  $fp_10k_count = '';
  $penalty_count = '';
  $penalty_5k_count = '';
  $penalty_10k_count = '';
  $la_5k_count = '';
  $la_10k_count = '';

  if(isset($_POST['txtofficerfirstname']) && isset($_POST['txtofficermiddlename']) && isset($_POST['txtofficerlastname']) && isset($_POST['txtofficerbirthdate']) && isset($_POST['txtofficeraddress']) && isset($_POST['oae_office_option']) && isset($_POST['oae_rank_option']) && isset($_POST['txtofficeremail']) && isset($_POST['txtofficercontactnumber'])){
    $oaep_firstname = filter_var($_POST['txtofficerfirstname'], FILTER_SANITIZE_STRING);
    $oaep_middlename = filter_var($_POST['txtofficermiddlename'], FILTER_SANITIZE_STRING);
    $oaep_lastname = filter_var($_POST['txtofficerlastname'], FILTER_SANITIZE_STRING);
    $oaep_birthdate = filter_var($_POST['txtofficerbirthdate'], FILTER_SANITIZE_STRING);
    $oaep_address = filter_var($_POST['txtofficeraddress'], FILTER_SANITIZE_STRING);
    $oaep_office = filter_var($_POST['oae_office_option'], FILTER_SANITIZE_STRING);
    $oaep_rank = filter_var($_POST['oae_rank_option'], FILTER_SANITIZE_STRING);
    $oaep_email = filter_var($_POST['txtofficeremail'], FILTER_SANITIZE_EMAIL);
    $oaep_contactnumber = filter_var($_POST['txtofficercontactnumber'], FILTER_SANITIZE_STRING);
    $emp_type = "officer";
    $has_account = 0;
    $downpayment_count = 0;
    $db_5k_count = 0;
    $db_10k_count = 0;
    $fullpayment_count = 0;
    $fp_5k_count = 0;
    $fp_10k_count = 0;
    $penalty_count = 0;
    $penalty_5k_count = 0;
    $penalty_10k_count = 0;
    $la_5k_count = 0;
    $la_10k_count = 0;
    
    $new_oaep_record = new db_access();
    $insert_new_oaep = $new_oaep_record->add_new_officers_and_ep($emp_type, $oaep_firstname, $oaep_lastname, $oaep_middlename, $oaep_office, $oaep_email, $oaep_contactnumber, $oaep_birthdate, $oaep_address, $oaep_rank, $has_account, $downpayment_count, $db_5k_count, $db_10k_count, $fullpayment_count, $fp_5k_count, $fp_10k_count, $penalty_count, $penalty_5k_count, $penalty_10k_count, $la_5k_count, $la_10k_count);
    if($insert_new_oaep) {
      echo '<script>
      alert("New Officers And EP Recorded.")
      </script>';
    } else {
      echo "ERROR";
    }
  } else {

  }
} else {

}

// Validate Civilian Employee data before "adding" to
// the database by the Admin
if(isset($_POST['submitnewcivilian'])){
  $CIVRECORD_FIRSTNAME = '';
  $CIVRECORD_MIDDLENAME = '';
  $CIVRECORD_LASTNAME = '';
  $CIVRECORD_BIRTHDATE = '';
  $CIVRECORD_ADDRESS = '';
  $CIVRECORD_OFFICE = '';
  $CIVRECORD_EMAIL = '';
  $CIVRECORD_CONTACTNUMBER = '';
  $CIV_RECORD_RANK = '';
  $has_account = '';
  $emp_type = '';
  $downpayment_count = '';
  $db_5k_count = '';
  $db_10k_count = '';
  $fullpayment_count = '';
  $fp_5k_count = '';
  $fp_10k_count = '';
  $penalty_count = '';
  $penalty_5k_count = '';
  $penalty_10k_count = '';
  $la_5k_count = '';
  $la_10k_count = '';

  if(isset($_POST['txtcivilianfirstname']) && isset($_POST['txtcivilianmiddlename']) && isset($_POST['txtcivilianlastname']) && isset($_POST['txtcivilianbirthdate']) && isset($_POST['txtcivilianaddress']) && isset($_POST['ce_office_option']) && isset($_POST['txtcivilianemail']) && isset($_POST['txtciviliancontactnumber'])){
    $CIVRECORD_FIRSTNAME = filter_var($_POST['txtcivilianfirstname'], FILTER_SANITIZE_STRING);
    $CIVRECORD_MIDDLENAME = filter_var($_POST['txtcivilianmiddlename'], FILTER_SANITIZE_STRING);
    $CIVRECORD_LASTNAME = filter_var($_POST['txtcivilianlastname'], FILTER_SANITIZE_STRING);
    $CIVRECORD_BIRTHDATE = filter_var($_POST['txtcivilianbirthdate'], FILTER_SANITIZE_STRING);
    $CIVRECORD_ADDRESS = filter_var($_POST['txtcivilianaddress'], FILTER_SANITIZE_STRING);
    $CIVRECORD_OFFICE = filter_var($_POST['ce_office_option'], FILTER_SANITIZE_STRING);
    $CIVRECORD_EMAIL = filter_var($_POST['txtcivilianemail'], FILTER_SANITIZE_EMAIL);
    $CIVRECORD_CONTACTNUMBER = filter_var($_POST['txtciviliancontactnumber'], FILTER_SANITIZE_STRING);
    $emp_type = 'civilian';
    $CIV_RECORD_RANK = 'none';
    $has_account = 0;
    $downpayment_count = 0;
    $db_5k_count = 0;
    $db_10k_count = 0;
    $fullpayment_count = 0;
    $fp_5k_count = 0;
    $fp_10k_count = 0;
    $penalty_count = 0;
    $penalty_5k_count = 0;
    $penalty_10k_count = 0;
    $la_5k_count = 0;
    $la_10k_count = 0;

    $NEW_CIVILIAN_RECORD = new db_access();
    $INSERT_NEW_RECORD = $NEW_CIVILIAN_RECORD->add_new_civilian_record($emp_type, $CIVRECORD_FIRSTNAME, $CIVRECORD_LASTNAME, $CIVRECORD_MIDDLENAME, $CIVRECORD_OFFICE, $CIVRECORD_EMAIL, $CIVRECORD_CONTACTNUMBER, $CIVRECORD_BIRTHDATE, $CIVRECORD_ADDRESS, $CIV_RECORD_RANK, $has_account, $downpayment_count, $db_5k_count, $db_10k_count, $fullpayment_count, $fp_5k_count, $fp_10k_count, $penalty_count, $penalty_5k_count, $penalty_10k_count, $la_5k_count, $la_10k_count);
    if($INSERT_NEW_RECORD) {
      echo '<script>
      alert("New Civilian Record Added.")
      </script>';
    } else {
      echo "ERROR";
    }
  } else {

  }
} else {

}
?>
<?PHP
session_start();
?>

<?php
function show_ce_table(){
  $civRecord_access = new db_access();
  $civ_record_database = $civRecord_access->display_civilian();
  echo '<form action="" method="POST" >';
  echo '<table border="1px" id="civRecord_table">';
  echo <<<THEAD
  <thead>
    <tr>
      <th>NAME</th>
      <th>Contributions</th>
      <th>View</th>
    </tr>
  </thead>
THEAD;
          
  while($civ_record_table = $civ_record_database->fetch_assoc()){
    $_SESSION['CE_ID'] = $civ_record_table['civilian_ID'];
    $ce_fname = $civ_record_table['civilian_fName'];
    $ce_lname = $civ_record_table['civilian_lName'];
    $ce_mname = $civ_record_table['civilian_mName'];
    $ce_fullname = "$ce_fname $ce_mname $ce_lname";
    $ce_contribution = 0;
          
    echo <<<TBODY
    <tbody>
      <tr>
        <input type="hidden" name="CIVILIAN_ID" id="CIVILIAN_ID" value=$_SESSION[CE_ID] />
        <input type="hidden" name="CIVILIAN_FULLNAME" id="CIVILIAN_FULLNAME" value="$ce_fullname" />
        <td>$ce_fullname</td>
        <input type="hidden" name="CIVILIAN_CONTRIBUTIONS" id="CIVILIAN_CONTRIBUTIONS" value="$ce_contribution" />
        <td>$ce_contribution</td>
        <td><a type="submit" id="btn-view-ce" name="btn-view-ce" href="950th-employee.php?civilian_id={$_SESSION['CE_ID']}">View<a/></td>
      </tr>
    </tbody>
TBODY;
  }
          
  echo '</table>';
  echo '</form>';
}
?>

<?php

function show_oaep_table(){
  $dbaccess = new db_access();
  $oaep_list = $dbaccess->display_officers();
  echo '<form action="" method="POST" >';
  echo '<table border="1px" id="oaep_table">';
  echo <<<THEAD
          <thead>
            <tr>
              <th>NR</th>
              <th>RANK</th>
              <th>NAME</th>
              <th>CONTRIBUTIONS</th>
              <th>ACTION</th>
            </tr>
          </thead>
THEAD;
// ACTION BUTTONS
          while($oaep_table = $oaep_list->fetch_assoc()){
            $_SESSION['oaep_id'] = $oaep_table['officer_ID'];
            $oaep_rank = $oaep_table['officer_rank'];
            $oaep_fname = $oaep_table['officer_fName'];
            $oaep_lName = $oaep_table['officer_lName'];
            $oaep_mName = $oaep_table['officer_mName'];
            $oaep_fullname = "$oaep_fname $oaep_mName $oaep_lName";
            $oaep_headquarter = $oaep_table['officer_headquarter'];
            $oaep_birthdate = $oaep_table['officer_birthdate'];
            $oaep_address = $oaep_table['officer_address'];
            $oaep_email = $oaep_table['officer_email'];
            $oaep_contactnumber = $oaep_table['officer_contactNumber'];
            $oaep_contribution = 0;

            echo <<<TBODY
            <tbody>
              <tr>
                <input type="hidden" name="OFFICER_ID" id="oaep_id" value=$_SESSION[oaep_id] />
                <td>$_SESSION[oaep_id]</td>
                <input type="hidden" name="OFFICER_RANK" value="$oaep_rank" />
                <td>$oaep_rank</td>
                <input type="hidden" name="oaep_first_name" value="$oaep_fname" />
                <input type="hidden" name="oaep_last_name" value="$oaep_lName" />
                <input type="hidden" name="oaep_middle_name" value="$oaep_mName" />
                <input type="hidden" name="OFFICER_full_name" value="$oaep_fullname" />
                <input type="hidden" name="OFFICER_EMAIL" value="$oaep_email" />
                <input type="hidden" name="OFFICER_CONTACTNUMBER" value="$oaep_contactnumber" />
                <input type="hidden" name="OFFICER_HEADQUARTER" value="$oaep_headquarter" />
                <input type="hidden" name="OFFICER_BIRTHDATE" value="$oaep_birthdate" />
                <input type="hidden" name="OFFICER_ADDRESS" value="$oaep_address" />
                <td>$oaep_fullname</td>
                <td>$oaep_contribution</td>
                <td><a type="submit" id="btn-view-oaep" name="btn-view-oaep" href="950th-employee.php?officer_id={$_SESSION['oaep_id']}">View<a/></td>
              </tr>
            </tbody>
TBODY;
// href="950th-employee.php?officer_id=officer_profile"
// {$_SESSION['oaep_id']}
          }
  echo '</table>';
  echo '</form>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/950themployee.php">
  <?php
  require_once ("css/950themployee.php");
  ?>
  <title>Employee</title>
</head>
<body>
  <script type="text/javascript">
  function validate_ce() {
    var valid = true;

    var civilian_firstname = document.getElementById('txtcivilianfirstname').value;
    var civilian_middlename = document.getElementById('txtcivilianmiddlename').value;
    var civilian_lastname = document.getElementById('txtcivilianlastname').value;
    var civilian_birthdate = document.getElementById('txtcivilianbirthdate').value;
    var civilian_address = document.getElementById('txtcivilianaddress').value;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    var civilian_office = document.getElementById('ce_office_option').value;
    var civilian_email = document.getElementById('txtcivilianemail').value;
    var civilian_contactnumber = document.getElementById('txtciviliancontactnumber').value;

    if(civilian_firstname == ""){
      document.getElementById('txtcivilianfirstname').style.border = '1px solid #FF0C25';
      valid = false;
    }

    if(civilian_middlename == ""){
      document.getElementById('txtcivilianmiddlename').style.border = '1px solid #FF0C25';
      valid = false;
    }

    if(civilian_lastname == ""){
      document.getElementById('txtcivilianlastname').style.border = '1px solid = #FFC025';
      valid = false;
    }

    if(civilian_birthdate == ""){
      document.getElementById('txtcivilianbirthdate').style.border = '1px solid = #FFC025';
      valid = false;
    }

    if(civilian_address == ""){
      document.getElementById('txtcivilianaddress').style.border = '1px solid = #FFC025';
      valid = false;
    }

    if(civilian_office == ""){
      document.getElementById('ce_office_option').style.border = '1px solid = #FFC025';
      valid = false;
    }

    if(civilian_email == ""){
      document.getElementById('txtcivilianemail').style.border = '1px solid = #FFC025';
      valid = false;
    } else if(!emailRegex.test(civilian_email)){
      document.getElementById('txtofficeremail').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(civilian_contactnumber == ""){
      document.getElementById('txtciviliancontactnumber').style.border = '1px solid = #FFC025';
      valid = false;
    }

    return valid;
  }

  function validate_oaep() {
    var valid = true;

    var officer_firstname = document.getElementById('txtofficerfirstname').value;
    var officer_middlename = document.getElementById('txtofficermiddlename').value;
    var officer_lastname = document.getElementById('txtofficerlastname').value;
    var officer_birthdate = document.getElementById('txtofficerbirthdate').value;
    var officer_address = document.getElementById('txtofficeraddress').value;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    var officer_headquarter = document.getElementById('oae_office_option').value;
    var officer_rank = document.getElementById('oae_rank_option').value;
    var officer_email = document.getElementById('txtofficeremail').value;
    var officer_contactnumber = document.getElementById('txtofficercontactnumber').value;

    if(officer_firstname == ""){
      document.getElementById('txtofficerfirstname').style.border = '1px solid #FF0C25';
      valid = false;
    }

    if(officer_middlename == ""){
      document.getElementById('txtofficermiddlename').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(officer_lastname == ""){
      document.getElementById('txtofficerlastname').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(officer_birthdate == ""){
      document.getElementById('txtofficerbirthdate').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(officer_address == ""){
      document.getElementById('txtofficeraddress').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(officer_headquarter == ""){
      document.getElementById('oae_office_option').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(officer_rank == ""){
      document.getElementById('oae_rank_option').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(officer_email == ""){
      document.getElementById('txtofficeremail').style.border = "1px solid #FF0C25";
      valid = false;
    } else if(!emailRegex.test(officer_email)){
      document.getElementById('txtofficeremail').style.border = "1px solid #FF0C25";
      valid = false;
    }

    if(officer_contactnumber == ""){
      document.getElementById('txtofficercontactnumber').style.border = "1px solid #FF0C25";
      valid = false;
    }

    return valid;
  }
  </script>
  <header id = "loan-navigation-container">
    <nav id = "loan-global-navigation">
      <ul>
        <li class = "nav-links"><a href = "adminOverview.php">Overview</a></li>
        <li class = "nav-links"><a href = "loanMonitoring.php">Loan Monitoring</a></li>
        <li class = "nav-links"><a href = "950th-employee.php">Employee</a></li>
        <li class = "nav-links"><a href = "general-ledger.php">General Ledger</a></li>
        <li class = "nav-links"><a href = "#">Balance Sheet</a></li>
        <li>
          <div>
            <input type="button" id = "admin-button" value="Admin Button" onclick="document.getElementById('admin_menu_box').style.display='flex'"/>
            <div id="admin_menu_box">
              <a href="../../pages/admin/adminSettings.php">Setting</a>
              <a href="../../pages/admin/adminloanrequest.php">View Loan Request</a>
              <a href="logout.php">Sign Out</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <main onclick="document.getElementById('admin_menu_box').style.display='none'">

    <section id = "employee-container">
<?php
if(isset($_SESSION['admin_username'])){
  echo '<div class="account_box">';
  echo '<h3>Hello, ' . $_SESSION['fname'] . '</h3>';
  echo '</div>';
} else if(!isset($_SESSION['admin_username'])) {
  // header('location: ../../pages/admin/adminSignInForm.php');
  echo '<script>
  window.location.href="../../pages/admin/adminSignInForm.php"
  </script>';
}
?>
      <h1>Employee</h1>
      <div id = "listofemployeeform">
        <div id = "employeetabs">
          <button class = "tablinks" onclick="openTab(event, 'officersandep')">Officers and EP<span class = "officerline"></span></button>
          <button class = "tablinks" onclick="openTab(event, 'civilianemployee')">Civilian Employee<span class="civilianline"></span></button>
        </div>

        <div id = "officersandep" class = "tabcontent">
          <div id = "officersandepadd-button-container">
            <button type="button" id="btn-add-oaep" onclick="document.getElementById('addnewoaep-container').style.display='block'">Add New Officers and EP</button>
          </div>
          <div id = "officersandeptable">
          <?PHP show_oaep_table(); ?>
          </div>
        </div>

        <div id = "civilianemployee" class = "tabcontent">
          <div id = "civilianemployeeadd-button-container">
            <button type="button" id="btn-add-ce" onclick="document.getElementById('addnewce-container').style.display='block'">Add New Civilian Employee</button>
            <!-- <input type="button" value="VIEW CIVILIAN" onclick="document.getElementById('CivilianEmployeeProfile').style.display='block'" /> -->
          </div>
          <div id = "civilianemployeetable">
          <?PHP show_ce_table(); ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Add New Officers and EP MODAL-->
    <section id="addnewoaep-container">
      <div class="addnewofficersandeppanel" id="AddNewOfficerAndEPRecord">
        <form action="" method="POST" id="addnewofficersandepform" onsubmit ="return validate_oaep()">
          <div class="addoaeformtitlebox">
            <h3 align="center">Add New Officer</h3>
          </div>
          <div class="oaeinputbox">
            <div class="oaeaddimageboxcontainer">
              <div class="add_oaeimagebox">
                <img src="" id="add_oae_avatar" />
              </div>
              <div class="addimagelink">
                <input type="button" id="oaeaddimagebutton" value="Choose Image Profile" capture="user"/>
              </div>
            </div>
            <div class="oaetextfieldcontainer">
              <div class="add_oae_personaldetails add_info_box">
                <input type="text" name="txtofficerfirstname" id="txtofficerfirstname" placeholder="Firstname" required />
                <input type="text" name="txtofficermiddlename" id="txtofficermiddlename" placeholder="Middle Name" required />
                <input type="text" name="txtofficerlastname" id="txtofficerlastname" placeholder="Lastname" required />
                <input type="date" id="txtofficerbirthdate" class="datepicker" name="txtofficerbirthdate" placeholder="Birthdate" />
                <input type="text" id="txtofficeraddress" name="txtofficeraddress" placeholder="Address" required />
              </div>
              <div class="oaeofficebox add_info_box oae_select_option">
                <label for="oae_office_option">Office:</label>
                <select name="oae_office_option" id="oae_office_option" required>
                  <option value=""></option>
                  <option value="Headquarters">Headquarters</option>
                  <option value="951ST CES">951ST CES</option>
                  <option value="VSAT">VSAT</option>
                  <option value="952ND MIS">952ND MIS</option>
                  <option value="953RD SSS">953RD SSS</option>
                  <option value="954TH COS">954TH COS</option>
                </select>
              </div>
              <div class="oaerankbox add_info_box oae_select_option">
                <label for="oae_rank_option">Rank:</label>
                <select name="oae_rank_option" id="oae_rank_option" required>
                  <option value=""></option>
                  <option value="LTC">LTC</option>
                  <option value="MAJ">MAJ</option>
                  <option value="SMS">SMS</option>
                  <option value="CPT">CPT</option>
                  <option value="MSgt">MSgt</option>
                </select>
              </div>
              <div class="oae_contactdetails_box add_info_box">
                <input type="email" id="txtofficeremail" name="txtofficeremail" placeholder="Email" />
                <input type="text" id="txtofficercontactnumber" name="txtofficercontactnumber" placeholder="Contact Number" />
              </div>
              <div class="addofficercommand">
                <input type="submit" name="submitnewofficer" id="submitnewofficer" value="Submit New Record" />
                <input type="button" name="canceloperation" id="canceloperation" value="Cancel" onclick="document.getElementById('addnewoaep-container').style.display='none'"/>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>



    <!-- Officers and EP Profile MODAL-->
    <!-- <section class="officersandeprofilepanel" id="OfficersAndEPProfile"> -->
<?php
if(isset($_GET['civilian_id'])){
  $CIVILIAN_ID = '';
  $CIVILIAN_FNAME = '';
  $CIVILIAN_MNAME = '';
  $CIVILIAN_LNAME = '';
  $CIVILIAN_FULLNAME = '';
  $CIVILIAN_OFFICE = '';
  $CIVILIAN_BIRTHDATE = '';
  $CIVILIAN_ADDRESS = '';
  $CIVILIAN_EMAIL = '';
  $CIVILIAN_CONTACTNUMBER = '';
  
  $CIVILIAN_PROFILE = '';

  if(isset($_SESSION['CE_ID'])){
    echo '<section id="CivilianEmployeeProfile">';
    $CIVILIAN_RECORD_ACCESS = new db_access();
    $DISPLAY_CIVILIAN_PROFILE = $CIVILIAN_RECORD_ACCESS->view_civilian_profile($_GET['civilian_id']);

    while($CIVILIAN_PROFILE = $DISPLAY_CIVILIAN_PROFILE->fetch_assoc()){
      $CIVILIAN_ID = $CIVILIAN_PROFILE['civilian_ID'];
      $CIVILIAN_FNAME = $CIVILIAN_PROFILE['civilian_fName'];
      $CIVILIAN_LNAME = $CIVILIAN_PROFILE['civilian_lName'];
      $CIVILIAN_MNAME = $CIVILIAN_PROFILE['civilian_mName'];
      $CIVILIAN_FULLNAME = "$CIVILIAN_FNAME $CIVILIAN_MNAME $CIVILIAN_LNAME";
      $CIVILIAN_OFFICE = $CIVILIAN_PROFILE['civilian_office'];
      $CIVILIAN_EMAIL = $CIVILIAN_PROFILE['civilian_email'];
      $CIVILIAN_CONTACTNUMBER = $CIVILIAN_PROFILE['civilian_contactNumber'];
      $CIVILIAN_BIRTHDATE = $CIVILIAN_PROFILE['civilian_birthdate'];
      $CIVILIAN_ADDRESS = $CIVILIAN_PROFILE['civilian_address'];
    }

    echo <<<CIVILIAN_PANEL
  <div class="civilianemployeerofilepanel">
    <div class="cefirstbox">
      <div class="cemorebuttonbox">
        <button type="button" id="cemorebutton" onclick="window.location.href='950th-employee.php'">
          Close
        </button>
      </div>
      <div class="ce-bottom-box">
        <div class="cetitleholder">
          <h3 id="cetitle">Civilian Employee Profile</h3>
        </div>
        <div class="ceofficelogo">
          <!-- 950th LOGO -->
        </div>
      </div>
    </div>
    <div class="cesecondbox">
      <div class="ceimageboxcontainer">
        <div class="ceimagebox">
          <img src="" id="ce_avatar" />
        </div>
      </div>
      <div class="cedetailsboxcontainer">
        <div class="ce_name cebox">
          <label>Officer Name</label>
          <input type="text" disabled name="txt_ce_name" id="txt_ce_name" value="$CIVILIAN_FULLNAME" />
        </div>
        <div class="ce_email cebox">
          <label>Email</label>
          <input type="text" disabled name="txt_ce_email" id="txt_ce_email" value="$CIVILIAN_EMAIL" />
        </div>
        <div class="ce_contactno cebox">
          <label>Contact Number</label>
          <input type="text" disabled name="txt_ce_contactno" id="txt_ce_contactno" value="$CIVILIAN_CONTACTNUMBER" />
        </div>
        <div class="ce_birthdate cebox">
          <label>Birthdate</label>
          <input type="text" disabled name="txt_ce_birthdate" id="txt_ce_birthdate" value="$CIVILIAN_BIRTHDATE" />
        </div>
        <div class="ce_address cebox">
          <label>Address</label>
          <input type="text" disabled name="txt_ce_address" id="txt_ce_address" value="$CIVILIAN_ADDRESS" />
        </div>
      </div>
    </div>
  </div>
CIVILIAN_PANEL;

echo '</section>';
  }
}

if(isset($_GET['officer_id'])){
  $OFFICER_ID = '';
  $OFFICER_RANK = '';
  $OFFICER_FULLNAME = '';
  $OFFICER_HEADQUARTER = '';
  $OFFICER_BIRTHDATE = '';
  $OFFICER_CONTACTNUMBER = '';
  $OFFICER_ADDRESS = '';
  $OFFICER_EMAIL = '';

  if(isset($_SESSION['oaep_id'])){
    echo '<section class="officersandeprofilepanel" id="OfficersAndEPProfile">';

    $OAEP_ACCESS = new db_access();
    $display_profile = $OAEP_ACCESS->view_oaep_profile($_GET['officer_id']);
      
    while($oaep_profile = $display_profile->fetch_assoc()){
      $OFFICER_ID = $oaep_profile['officer_ID'];
      $OFFICER_RANK = $oaep_profile['officer_rank'];
      $txt_oaep_fname = $oaep_profile['officer_fName'];
      $txt_oaep_mname = $oaep_profile['officer_mName'];
      $txt_oaep_lname = $oaep_profile['officer_lName'];
      $OFFICER_FULLNAME = "$txt_oaep_fname $txt_oaep_mname $txt_oaep_lname";
      $OFFICER_HEADQUARTER = $oaep_profile['officer_headquarter'];
      $OFFICER_BIRTHDATE = $oaep_profile['officer_birthdate'];
      $OFFICER_ADDRESS = $oaep_profile['officer_address'];
      $OFFICER_EMAIL = $oaep_profile['officer_email'];
      $OFFICER_CONTACTNUMBER = $oaep_profile['officer_contactNumber'];
    }


    echo <<<OAEP_PROFILE
        <div class="oae_profile_container">
          <div class="oaefirstbox">
            <div class="oaemorebuttonbox">
              <button type="button" id="oaemorebutton" name="oaemorebutton" value="View Officer" onclick="window.location.href='950th-employee.php'" />
                Close
              </button>
            </div>
            <div class="bottom-box">
              <div class="oaetitleholder">
                <h3 id="oaetitle">Officers and EP Profile</h3>
              </div>
              <div class="oaeofficelogo">
              </div>
            </div>
          </div>
          <div class="oaesecondbox">
            <div class="oaeimageboxcontainer">
              <div class="oaeimagebox">
                <img src="" id="oae_avatar" />
              </div>
            </div>
            <div class="oaedetailbox">
              <div class="oae_name oaebox">
                <label for="txt_op_name">Officer Name</label>
                <input type="text" disabled name="txt_op_name" id="txt_op_name" value="$OFFICER_FULLNAME" />
              </div>
              <div class="oae_rank oaebox">
                <label for="txt_op_rank">RanK</label>
                <input type="text" disabled name="txt_op_rank" id="txt_op_rank" value="$OFFICER_RANK" />
              </div>
              <div class="oae_unit oaebox">
                <label for="txt_op_unit">Unit</label>
                <input type="text" disabled name="txt_op_unit" id="txt_op_unit" value="$OFFICER_HEADQUARTER" />
              </div>
              <div class="oae_email oaebox">
                <label for="txt_op_email">Email</label>
                <input type="text" disabled name="txt_op_email" id="txt_op_email" value="$OFFICER_EMAIL" />
              </div>
              <div class="oae_contactno oaebox">
                <label for="txt_op_contactno">Contact Number</label>
                <input type="text" disabled name="txt_op_contactno" id="$OFFICER_CONTACTNUMBER" />
              </div>
              <div class="oae_birthdate oaebox">
                <label for="txt_op_birthdate">Birthdate</label>
                <input type="text" disabled name="txt_op_birthdate" id="txt_op_birthdate" value="$OFFICER_BIRTHDATE" />
              </div>
              <div class="oae_address oaebox">
                <label for="txt_op_address">Address</label>
                <input type="text" disabled name="txt_op_address" id="txt_op_address" value="$OFFICER_ADDRESS" />
              </div>
            </div>
          </div>
        </div>
OAEP_PROFILE;

echo '</section>';
  } else {
    
  }
} else {

}
?>

    <!-- Add New Civilian Employee -->
    <section id="addnewce-container">
      <div class="addnewcivilianemployeepanel" id="AddNewCivilianEmployeeRecord">
        <form action="" method="POST" id="addnewcivilianemployeeform" onsubmit="return validate_ce()">
          <div class="addnewcetitlebox">
            <h3 align="center">Add New civilian</h3>
          </div>
          <div class="add_ceinputbox">
            <div class="ceaddimageboxcontainer">
              <div class="add_ceimagebox">
                <img src="" id="add_ce_avatar" />
              </div>
              <div class="addimagelink">
                <input type="button" id="ceaddimagebutton" value="Choose Image Profile" />
              </div>
            </div>
            <div class="cetextfieldcontainer">
              <div class="add_ce_personaldetails add_info_box">
                <input type="text" name="txtcivilianfirstname" id="txtcivilianfirstname" placeholder="Firstname" required />
                <input type="text" name="txtcivilianmiddlename" id="txtcivilianmiddlename" placeholder="Middle Name" required />
                <input type="text" name="txtcivilianlastname" id="txtcivilianlastname" placeholder="Lastname" required />
                <input type="date" id="txtcivilianbirthdate" class="datepicker" name="txtcivilianbirthdate" placeholder="Birthdate" required />
                <input type="text" id="txtcivilianaddress" name="txtcivilianaddress" placeholder="Address" required />
              </div>  
              <div class="ceofficebox add_info_box">
                <label for="ce_office_option add_info_box">Office</label>
                <select name="ce_office_option" id="ce_office_option" required>
                  <option value="Headquarters">Headquarters</option>
                    <option value="951ST CES">951ST CES</option>
                    <option value="VSAT">VSAT</option>
                    <option value="952ND MIS">952ND MIS</option>
                    <option value="953RD SSS">953RD SSS</option>
                    <option value="954TH COS">954TH COS</option>
                </select>
              </div>
              <div class="ce_contactdetails_box add_info_box">
                <input type="email" id="txtcivilianemail" name="txtcivilianemail" placeholder="Email" required />
                <input type="text" id="txtciviliancontactnumber" name="txtciviliancontactnumber" placeholder="Contact Number" required />
              </div>
              <div class="addciviliancommand">
                <input type="submit" name="submitnewcivilian" id="submitnewcivilian" value="Submit New Record" />
                <input type="button" name="canceloperation" id="canceloperation" value="Cancel" onclick="document.getElementById('addnewce-container').style.display='none'"/>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- Civilian Employee Profile MODAL-->
    <!-- <section id="CivilianEmployeeProfile">
      
    </section> -->

  </main>

  <script>
    function openTab(evt, tabName){
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for(i = 0; i < tabcontent.length; i++){
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for(i = 0; i < tablinks.length; i++){
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
</body>
</html>