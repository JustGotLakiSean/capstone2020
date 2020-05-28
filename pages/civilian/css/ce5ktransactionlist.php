<?php
echo <<<style
<style>
.tabcontent {
  display: none;
  padding: 6px 12px;
}

.pb5k_btnaction {
  margin: auto;
}

#pb5k_btn_cancel {
  margin-top: 40px;
  background: #ED1C24;
  width: 60px;
  height: 23px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 100ms ease-in;
  font-size: 12px;
  cursor: pointer;
}

#pb5k_btn_cancel:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#newpayment_5k_modal {
  position: fixed;
  margin: 0;
  padding: 0;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.9); /* color */
}

#newpayment_5k_container {
  display: block;
  width: 600px;
  height: 300px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 40px;
  border: none;
}

.newpayment_5k_titlecontainer {
  height: 26px;
  background: #0071BC;
  border-radius: 5px;
  color: #fff;
}

.newpayment_5k_titlecontainer > h3 {
  font-weight: lighter;
  font-size: 16px;
  margin: 0;
}

.bdb-content{
  width: 550px;
  margin: auto;
}

.bdb_container {
  display: block;
  height: 85px;
}

.borrowers_detailbox {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 5px;
  margin: auto;
  position: relative;
  top: 10px;
  height: 65px;
}

.borrowers_detailbox input[type=text]{
  height: 26px;
  padding-left: 10px;
  background: #E6E6E6;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  font-size: .9rem;
  color: #666666;
}

#transaction_box_5kcontainer {
  margin-top: 15px;
}

#transaction_box_5k {
  margin: auto;
  border-collapse: collapse;
  width: 100%;
  font-size: 13px;
}

#transaction_box_5k > thead > tr > th {
  font-size: 13px;
}

#active_table_5k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#active_table_5k > table > thead {
  background: #009245;
  border: 1px solid #009245;
}

#active_table_5k > table > thead > tr > th {
  color: #fff;
  font-weight: lighter;
}

#active_table_5k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(230, 230, 230);
}

.ce5ktl-notransaction button.active {
  border-top: 3px solid #0071BC;
  color: #000000;
}

.tablinks {
  width: 570px;
  height: 30px;
  cursor: pointer;
}

#pending_table_5k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#pending_table_5k > table > thead {
  background: #009245;
  border: 1px solid #009245;
}

#pending_table_5k > table > thead > tr > th {
  color: #000;
  font-weight: lighter;
}

#pending_table_5k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(179,179,179);
}

.ce5ktl-notransaction {
  display: grid;
  grid-auto-flow: column;
}

body {
  background: #F2F2F2;
  margin: 0;
  font-family: 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
}

#cl-header {
  margin: 0;
  padding: 0;
  overflow-y: hidden;
}

#cl-header nav {
  max-width: auto;
  height: 40px;
  background-color: #009245;
  color: #333;
}

#cl-header nav ul {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  padding: 0 10px;
  margin: 0;
}

#cl-header nav li {
  display: inline;
}

.ce-home-link {
  display: block;
  width: 100px;
  text-decoration: none;
  padding: 10px 0;
  color: #fff;
}

#cl-btnaction {
  background: #0f753f;
  border: none;
  border-radius: 3px;
  height: 4vh;
  cursor: pointer;
  color: #fff;
}

#ce_menu_box {
  position: absolute;
  top: 37px;
  right: 5px;
  width: 150px;
  height: 100px;
  font-size: .9rem;
  background: #009245;
  border-radius: 15px;
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  box-shadow: 2px 2px 5px rgba(126, 125, 125, .5),
  -2px 2px 5px rgba(126, 125, 125, .5);
}

#ce_menu_box > a {
  text-decoration: none;
  color: #fff;
  font-size: 1rem;
}

.ce-5ktl-inner-content {
  max-width: 1140px;
  margin: auto;
  margin-top: 30px;
}

.ce-5ktl-header {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
}

.ce-10ktl-inner-content {
  max-width: 1140px;
  margin: auto;
  margin-top: 30px;
}

.ce-10ktl-header {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
}

h3 {
  margin: 0;
  font-weight: lighter;
}

hr {
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
}

#btn-request {
  width: 115px;
  height: 30px;
  background: #006837;
  border: none;
  border-radius: 20px;
  color: #fff;
  font-weight: lighter;
}

h1 {
  text-align: center;
  font-size: 40px;
  color: #808080;
  font-weight: lighter;
}
</style>
style;
?>