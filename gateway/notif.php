<?php

namespace loan950;

use \loan950\db_access;

include('../dbaccess/db_access.php');
$db = new db_access();
$all_pending_request = $db->all_pending_request();
// while($notif_count = $all_pending_request->fetch_array(MYSQLI_ASSOC)){
//   $notifCount = $notif_count['notifCount'];
// }
// $_SESSION['r'] = mysqli_num_rows($all_pending_request);
// echo "$_SESSION[r]";
while($req_count = $all_pending_request->fetch_array(MYSQLI_ASSOC)){
  $req_id = $req_count['all_pending'];
  // $c = mysqli_num_rows($all_pending_request);
}
echo $req_id;
// echo "HE<br>";
// while ($notif_count = $all_pending_request->fetch_array(MYSQLI_ASSOC)) {
//   $notifCount = $notif_count['notifCount'];
//   $checkNotif = $db->all_pending_request();
//   if ($checkNotif) {
//     $c = mysqli_num_rows($checkNotif);
//     if ($c >= 1) {
//       // printf($c);
//       // echo "<span style='height: 12px; width: 12px; border-radius: 50px; background: #dd0000; position: absolute; top: 9px;'></span>";
//       echo '<script>
//       alert("New Loan Request");
//       </script>';
//     } else {
//     }
//   } else {
//   }
// }
?>