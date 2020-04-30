<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Welcome!</title>
</head>
<body>
  <main>
    <article id = "btn_signin_container">
      <div class="btn_signin_inner_content">
        <section id = "btn_admin_container">
          <button id = "btn_admin" type="button" onclick="location.href='admin/adminSignInForm.php';">
            Admin
          </button>
        </section>
        <section id = "btn_ce_container">
          <button id = "btn_ce" type="button" onclick="location.href='civilian/civilian-login.php';">
            Civilian Employee
          </button>
        </section>
        <section id = "btn_oaep_container">
          <button id = "btn_oaep" type="button" onclick="location.href='officersandep/officer-ep-login.php';">
            Officers and EP
          </button>
        </section>
      </div>
    </article>
  </main>
</body>
</html>