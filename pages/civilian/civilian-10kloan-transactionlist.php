<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

if(!isset($_SESSION['cuid']) && !isset($_SESSION['cuname'])){
  header('location: civilian-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/ce5ktransactionlist.css">
  <?php include('css/ce5ktransactionlist.php'); ?>
  <link rel="stylesheet" href="css/loanrequest-civ.css">
  <title>10K Account Transaction List</title>
</head>
<body>

  <header id="cl-header">
    <nav>
      <ul>
        <li>
          <a href="civilian-homepage.php" class="ce-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="cl-btnaction" id="cl-btnaction" onclick="document.getElementById('ce_menu_box').style.display='flex'" value="Your Account" />
          <div id="ce_menu_box">
            <!-- <a href="#">Account Details</a> -->
            <a href="logout_civ.php">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article>
    <section class="ce-10ktl-container">
      <div class="ce-10ktl-inner-content">
        <div class="ce-10ktl-header">
          <div class="ce-10ktl-title-container">
            <h3>10K Account Transaction List</h3>
          </div>
        </div>
        <hr>
        <div class="10ktl-content">
          <div class="10ktl-notransaction">
            <h1>No Transactions for 10k Account</h1>
          </div>
        </div>
      </div>
    </section>
  </article>

</body>
</html>