<?php
echo <<<STYLE
<style>
.tabcontent {
  display: none;
  padding: 6px 12px;
}

.loan_request_tabs button.active {
  border-top: 3px solid #0071BC;
  color: #000000;
}

.tablinks {
  width: 570px;
  height: 30px;
  cursor: pointer;
}

.loan_request_tabs {
  overflow: hidden;
}

.loan_request_tabs button {
  background-color: #dddddd;
  border-radius: 5px;
  border: 1px solid rgb(179,179,179);
  outline: none;
  cursor: pointer;
  height: 30px;
  transition: 0.3s;
  font-size: 16px;
}

#pending_table_5k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#pending_table_5k > table > thead {
  background: #0071BC;
  border: 1px solid rgb(179,179,179);
}

#pending_table_5k > table > thead > tr > th {
  color: #000;
  font-weight: lighter;
}

#pending_table_5k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(179,179,179);
}

body {
  margin: 0;
  font-family: 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
  background: #F2F2F2;
}

#loan-navigation-container {
  margin: 0;
  padding: 0;
}

#loan-navigation-container nav {
  background-color: #0071BC;
  color: #eee;
}

#loan-navigation-container nav ul {
  height: 6vh;
  display: flex;
  justify-content: space-evenly;
  padding: 0;
  margin: 0;
}

#loan-navigation-container nav li {
  display: inline;
  margin: 0;
}

#loan-navigation-container nav > ul > li > a {
  display: inline-block;
  text-align: center;
  text-decoration: none;
  color: #eee;
  text-decoration: none;
  position: relative;
  top: .7rem;
}

#loan-navigation-container input[type=text] {
  width: 20vw;
  height: 3vh;
  background: #F2F2F2;
  font-size: .8rem;
  padding-left: 10px;
  border: none;
  border-radius: 5px;
  position: relative;
  top: .5rem;
}

#admin-button {
  background: #dddddd;
  border: none;
  border-radius: 3px;
  height: 4vh;
  cursor: pointer;
  color: #fff;
  position: relative;
  top: .5rem;
}

#admin_menu_box {
  position: absolute;
  top: 37px;
  right: 65px;
  width: 10vw;
  height: 100px;
  font-size: .9rem;
  background: #fff;
  border-radius: 15px;
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  box-shadow: 1px 2px 5px rgba(126, 125, 125, 0.1),
  -1px 2px 5px rgba(126, 125, 125, 0.1);
}

#admin_menu_box a {
  text-decoration: none;
  color: #666;
}

#loan-navigation-container ::placeholder {
  color: #666666;
}

section {
  max-width: 1150px;
  margin: auto;
  padding: 0;
}

h1 {
  text-align: center;
  font-size: 2.6rem;
}

hr {
  padding: 0;
  border: 0;
  height: 2px;
  background: #E6E6E6;
  overflow: visible;
  text-align: center;
}
</style>
STYLE;
?>