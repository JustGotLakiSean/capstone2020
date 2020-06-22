<?php

namespace loan950;

use \loan950\db_access;

include('../dbaccess/db_access.php');
$db = new db_access();
$all_pending_request = $db->all_pending_request();

while($req_count = $all_pending_request->fetch_array(MYSQLI_ASSOC)){
  $req_id = $req_count['all_pending'];
break;
}
echo $req_id;
?>