<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();

session_start();

if(!isset($_SESSION['cuid']) && !isset($_SESSION['cuname'])){
  header('location: civilian-login.php');
}

function show_granted_loan_5k($ce_id, $ce_loan_type, $ce_fname, $ce_mname, $ce_lname, $ce_emp_type, $ce_office, $ce_rank)
{
  $con = new db_access();
  $granted_loan_5k = $con->view_granted_loan_5k($ce_id, $ce_loan_type, $ce_fname, $ce_mname, $ce_lname, $ce_emp_type, $ce_office, $ce_rank);

  echo '
  <div id="granted_transaction_list_5k">
    <div class="title">
      <h4>Transaction Table</h4>
    </div>
    <table border="1">
      <thead>
        <tr>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/ce5ktransactionlist.css">
  <link rel="stylesheet" href="css/loanrequest-civ.css ">
  <title>5K Account Transaction List</title>
</head>
<body>

  <header id="cl-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php" class="ce-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="cl-btnaction" id="cl-btnaction" onclick="document.getElementById('ce_menu_box').style.display='flex'" value="Your Account" />
          <div id="ce_menu_box">
            <a href="#">Account Details</a>
            <a href="#">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article>
    <section class="ce-5ktl-container">
      <div class="ce-5ktl-inner-content">
        <div class="ce-5ktl-header">
          <div class="ce-5ktl-title-container">
            <h4>Hello, <?php echo $_SESSION['cuname']; ?></h4>
            <h3>5K Account Transaction List</h3>
          </div>
        </div>
        <hr>
        <div class="ce5ktl-content">
          <div class="ce5ktl-notransaction">
            <div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </article>
  
</body>
</html>