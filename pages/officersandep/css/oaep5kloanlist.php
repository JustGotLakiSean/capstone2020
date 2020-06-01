<?php
echo <<<STYLE
<style>

#active_table_10k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#active_table_10k > table > thead {
  background: #1A1A1A;
  border: 1px solid #1A1A1A;
}

#active_table_10k > table > thead > tr > th {
  color: #fff;
  font-weight: lighter;
}

#active_table_10k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(230, 230, 230);
}

#pending_table_10k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#pending_table_10k > table > thead {
  background: #1A1A1A;
  border: 1px solid #1A1A1A;
}

#pending_table_10k > table > thead > tr > th {
  color: #fff;
  font-weight: lighter;
}

#pending_table_10k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(179,179,179);
}

#pending_table_5k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#pending_table_5k > table > thead {
  background: #1A1A1A;
  border: 1px solid #1A1A1A;
}

#pending_table_5k > table > thead > tr > th {
  color: #fff;
  font-weight: lighter;
}

#pending_table_5k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(179,179,179);
}

.tablinks {
  width: 570px;
  height: 30px;
  cursor: pointer;
}

.oaep5ktl-notransaction {
  display: grid;
  grid-auto-flow: column;
}

.oaep5ktl-notransaction button.active {
  border-top: 3px solid #333;
  color: #000000;
}

.oaep10ktl-notransaction {
  display: grid;
  grid-auto-flow: column;
}

.oaep10ktl-notransaction button.active {
  border-top: 3px solid #333;
  color: #000000;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
}

#active_table_5k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#active_table_5k > table > thead {
  background: #1A1A1A;
  border: 1px solid #1A1A1A;
}

#active_table_5k > table > thead > tr > th {
  color: #fff;
  font-weight: lighter;
}

#active_table_5k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(230, 230, 230);
}

#newpayment_10k_modal {
  position: fixed;
  margin: 0;
  padding: 0;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.9); /* color */
}

.newpayment_10k_container {
  display: block;
  width: 600px;
  height: 500px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 40px;
  border: none;
}

.newpayment_10k_titlecontainer {
  height: 26px;
  background: #1A1A1A;
  border-radius: 5px;
  color: #fff;
}

.newpayment_10k_titlecontainer > h3 {
  font-weight: lighter;
  font-size: 16px;
  margin: 0;
}

.bdb-10k-content {
  width: 550px;
  margin: auto;
}

.bdb-10k_container {
  display: block;
  height: 85px;  
}

.borrowers_detailbox_10k {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 5px;
  margin: auto;
  position: relative;
  top: 10px;
  height: 65px;
}

.borrowers_detailbox_10k input[type=text]{
  height: 26px;
  padding-left: 10px;
  background: #E6E6E6;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  font-size: .9rem;
  color: #666666;
}

#transaction_box_10kcontainer {
  margin-top: 15px;
}

#transaction_box_10k {
  margin: auto;
  border-collapse: collapse;
  width: 100%;
  font-size: 13px;
}

#transaction_box_10k > thead > tr > th {
  font-size: 13px;
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
  height: 500px;
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
  background: #1A1A1A;
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

body {
  background: #F2F2F2;
  margin: 0;
  height: auto;
  font-family: 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
}

#oep-header {
  margin: 0;
  padding: 0;
}

#oep-header nav {
  max-width: auto;
  height: 40px;
  background-color: #1A1A1A;
  color: #fff;
}

#oep-header nav ul {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  padding: 0 10px;
  margin: 0;
}

#oep-header nav li {
  display: inline;
}

.oaep-home-link {
  display: block;
  width: 100px;
  text-decoration: none;
  padding: 10px 0;
  color: #ccc;
}

#oep-btnaction {
  background: #333;
  border: none;
  border-radius: 3px;
  height: 4vh;
  cursor: pointer;
  color: #fff;
}

#oaep_menu_box {
  position: absolute;
  top: 37px;
  right: 5px;
  width: 150px;
  height: 100px;
  font-size: .9rem;
  background: #4b4b4b;
  border-radius: 15px;
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  box-shadow: 1px 2px 5px rgba(126, 125, 125, 0.1),
  -1px 2px 5px rgba(126, 125, 125, 0.1);
}

#oaep_menu_box > a {
  text-decoration: none;
  color: #ccc;
}

.oaep-5ktl-inner-content {
  max-width: 1140px;
  margin: auto;
  margin-top: 30px;
}

.oaep-5ktl-header {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
}

.oaep-10ktl-inner-content {
  max-width: 1140px;
  margin: auto;
  margin-top: 30px;
}

.oaep-10ktl-header {
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
  background: #1A1A1A;
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

#pb10k_btn_cancel {
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

#pb10k_btn_cancel:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}
</style>
STYLE;
?>