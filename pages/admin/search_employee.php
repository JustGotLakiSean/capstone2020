<?php
  namespace loan950;
  use \loan950\db_access;
  include("../../dbaccess/db_access.php");
  $db = new db_access();
  $keyword = filter_var($_POST['txt_emp_search'], FILTER_SANITIZE_STRING);
  $result = $db->search_data($keyword);
  $myarr = array();
  while($res = $result->fetch_array(MYSQLI_ASSOC)){
    $myarr[] = $res;
  }
  echo json_encode($myarr);
?>