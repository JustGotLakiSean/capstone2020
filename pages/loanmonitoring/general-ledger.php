<?PHP

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/generalledger.css">
  <title>General Ledger</title>
</head>
<body>
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

    <section id="gl-container">
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
      <div class="gl-header-container">
        <h1>General Ledger</h1>
      </div>
      <div class="gl-entrybox">
        <div class="gl-inner-entrybox">
          <div class="gl-journalposting-fields-left">
            <div class="gl-journaldate-container">
              <label>Journal Date</label>
              <input type="text" name="txt-gl-journaldate" id="txt-gl-journaldate" />
              <input type="button" name="gl-journal-calendar" id="gl-journal-calendar" value="calendar"/>
            </div>
            <div class="gl-credit-container">
              <label>Credit</label>
              <input type="text" name="txt-gl-credit" id="txt-gl-credit" />
            </div>
            <div class="gl-debit-container">
              <label>Credit</label>
              <input type="text" name="txt-gl-debit" id="txt-gl-debit" />
            </div>
          </div>
          <div class="gl-journalposting-fields-right">
            <div class="gl-journal-currentbalance-container">
              <div class="gl-journal-cbtitle-container">
                <label>Current Balance: $EWAN</label>
              </div>
            </div>
            <div class="gl-journal-comment-container">
              <label for="txt-gl-comment">Comment</label>
              <input type="text" name="txt-gl-comment" id="txt-gl-comment" />
            </div>
          </div>
          <div class="gl-postentry-button-container">
            <button type="button">
              Post Entry
            </button>
          </div>
        </div>
        <div class="gl-table-container">
          <div class="gl-table">
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th width="300px">Comment</th>
                  <th>Debit</th>
                  <th>Credit</th>
                  <th>Balance</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Helo</td>
                  <td>Helo</td>
                  <td>Helo</td>
                  <td>Helo</td>
                  <td>Helo</td>
                  <td>Helo</td>
                  <td>Helo</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>