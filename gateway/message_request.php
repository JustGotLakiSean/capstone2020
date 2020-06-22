<?php
namespace loan950;

use \loan950\db_access;

include('../dbaccess/db_access.php');
$db = new db_access();
$get_message_request = $db->get_message_request();

$req_message = $get_message_request->fetch_all(MYSQLI_ASSOC);
echo json_encode($req_message);
?>