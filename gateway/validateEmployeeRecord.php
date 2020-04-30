<?PHP
namespace loan950;

use \loan950\OfficersAndEP;

echo "TEST";

// Validate Officers And EP before "adding" to
// the database by the Admin
if(isset($_POST['submitnewofficer'])){
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

    require_once ("../dbaccess/db_access.php");
    $new_oaep_record = new OfficersAndEP();
    $insert_new_oaep = $new_oaep_record->add_new_officers_and_ep($oaep_firstname, $oaep_lastname, $oaep_middlename, $oaep_office, $oaep_email, $oaep_contactnumber, $oaep_birthdate, $oaep_address, $oaep_rank);
    if($insert_new_oaep) {
      header('Location: ../');
    }
  } else {

  }
} else {

}
?>