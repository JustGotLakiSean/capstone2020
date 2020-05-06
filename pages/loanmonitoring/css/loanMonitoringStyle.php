<?php
echo <<<STYLE
<style>
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

#loanmonitoring-container {
  max-width: 1180px;
  margin: auto;
  margin-top: 20px;
}

#loan-summary-content {
  width: 100%;
  display: flex;
  flex-flow: row wrap;
  justify-content: space-between;
}

#loan-summary-content .summarycard {
  padding: 5px;
  margin-bottom: 10px;
  height: 102px;
  width: 180px;
  background: #FFFFFF;
  font-size: 1.2rem;
  border-radius: 5px;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
}

#loan-summary-content p{
  margin: 0;
  padding: 0;
}

#loan-summary-content .ls-value {
  text-align: right;
  font-size: 2rem;
  margin-top: 1rem;
}

#loantransactionform {
  width: 100%;
  height: 520px;
  margin: 0;
  background: #fff;
}

#loantabs {
  overflow: hidden;
}

#loantabs button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

#loantabs button.active {
  border-top: 3px solid #0071BC;
  color: #000000;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
}

#transaction_table_5k > table {
  width: 90%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#transaction_table_5k > table > thead {
  background: #0071BC;
  border: 1px solid rgb(179,179,179);
}

#transaction_table_5k > table > thead > tr > th {
  color: #fff;
  font-weight: lighter;
}

#transaction_table_5k > table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(230, 230, 230);
}

#btn-addnew5k {
  width: 11rem;
  height: 2.5rem;
  background: #0071BC;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#btn-addnew10k {
  width: 11rem;
  height: 2.5rem;
  background: #009245;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* MODALS */
/* Add New Loan 5K MODAL */
#fiveKaddnewloan-container {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.9); /* color */
  display: none; /* making it hidden by default */
}

.fiveKaddnewloanpanel {
  width: 700px;
  height: 650px;
  margin: auto;
  background: #F2F2F2;
  border-radius: 5px;
  border: none;
}

.fiveKnewloantitleholder {
  position: relative;
  height: 26px;
  background: #0071BC;
  border-radius: 5px;
  color: #fff;
}

#btn_close {
  position: absolute;
  top: 3px;
  right: 3px;
  width: 50px;
}

.fiveKnewloantitleholder > h3 {
  text-align: center;
  font-weight: lighter;
  margin: 0;
  top: 2px;
}

.fiveKnewloanfirstbox {
  position: relative;
  top: 10px;
  width: 380px;
  height: 120px;
}


#search_container {
  background: #E6E6E6;
  border-radius: 5px;
  width: 50.95vw;
  max-height: 38vh;
  overflow: auto;
  border: 2px solid #0071BC;
}

#emp_container {
  display: flex;
  flex-flow: row;
}

.search_result_box {
  margin: 5px 0 0 0;
  padding: 0;
}

.emp_info_5k {
  text-align: center;
  margin-bottom: 5px;
  width: 40vw;
  color: #FFF;
  background: #0071BC;
  border: none;
  border-radius: 5px;
  height: 30px;
  //cursor: pointer;
  font-size: 1rem;
}

/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #E6E6E6;
  border-radius: 2px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 7px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #808080;
}

#txt_5K_newloan_borrower, #txt_5K_newloan_office {
  height: 26px;
  width: 27vw;
  padding-left: 10px;
  background: #E6E6E6;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  font-size: .9rem;
  color: #666666;
}

.fiveKborrowernewloandetails {
  margin-top: 150px;
}

.btn_add_5k_loan {
  border: 2px solid #0071BC;
  margin-left: 10px;
  border-radius: 5px;
  font-size: .8rem;
  font-weight: bold;
  color: #0071BC;
  width: 110px;
  height: 30px;
  cursor: pointer;
  transition: 100ms ease-in;
}

.btn_add_5k_loan:hover {
  background: #0071BC;
  color: #fff;
}

hr {
  margin: 15px 0 0px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

#fiveKnewloanform {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 5px;
  margin: auto;
}



/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #E6E6E6;
  border-radius: 2px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 7px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #808080;
}

.fiveKnewloansecondbox h4 {
  text-align: center;
  font-weight: lighter;
  margin: 0;
  font-size: 1rem;
  color: #666666;
}

.fiveKqueuefirstbox {
  padding: 10px;
}

.fiveKborrowerqueue {
  height: 50px;
  background: #fff;
  display: grid;
  grid-auto-flow: column;
  margin: 10px 0 5px 0;
  border-radius: 10px;
}

.lk_rate {
  text-align: center;
  width: 7vw;
  margin: 0;
  font-size: .9rem;
  border-radius: 5px;
  border: 2px solid #CCCCCC;
  height: 20px;
}

.fiveKqueuesecondbox {
  margin: auto;
}

.fiveKloanaccountdetailscontainer {
  width: 380px;
  height: 120px;
  margin: auto;
  top: 10px;
  display: grid;
  grid-gap: 15px;
}

.fiveKloanaccountdetailscontainer p {
  font-size: 13px;
  margin: 0;
  padding:0;
}

.firstbox {
  display: grid;
  grid-gap: 5px;
  color: #666666;
}

.secondbox {
  display: grid;
  grid-gap: 5px;
}

#submit_fiveK_newloan {
  height: 30px;
  width: 110px;
  border: none;
  border-radius: 5px;
  font-size: 17px;
  color: #fff;
  background: #0071BC;
}

#cancel_fiveK_newloan {
  height: 30px;
  width: 110px;
  border: none;
  border-radius: 5px;
  font-size: 17px;
  color: #fff;
  background: #ED1C24;
}

/* 10K new loan */
#tenKaddnewloan-container {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.9); /* color */
  display: none; /* making it hidden by default */
}

.tenKaddnewloanpanel {
  width: 400px;
  height: 550px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
}

.tenKnewloantitleholder {
  height: 26px;
  background: #009245;
  border-radius: 5px;
  color: #fff;
}

.tenKnewloantitleholder > h3 {
  text-align: center;
  font-weight: lighter;
  margin: 0;
  position: relative;
  top: 2px;
}

.tenKnewloanfirstbox {
  display: grid;
  margin: auto;
  position: relative;
  top: 10px;
  width: 380px;
  height: 120px;
}

.tenKborrowerdetails {
  display: grid;
}

.tenKborrowerdetails input[type=text] {
  height: 26px;
  padding-left: 10px;
  background: #E6E6E6;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  font-size: .9rem;
  color: #666666;
}

#btn_tenKaddtolist {
  background: #009245;
  border: none;
  border-radius: 5px;
  font-size: .8rem;
  color: #fff;
  width: 94px;
  height: 31px;
  float: right;
  cursor: pointer;
  
}

#btn_tenKaddtolist:hover {
  background: #007C45;
}

hr {
  margin: 15px 0 0px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

#tenKnewloanform {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 5px;
  margin: auto;
  position: relative;
}

.tenKborrowerlistbox {
  width: 380px;
  height: 200px;
  margin: auto;
  overflow: auto;
}

/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #E6E6E6;
  border-radius: 2px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 7px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #808080;
}

.tenKnewloansecondbox h4 {
  text-align: center;
  font-weight: lighter;
  margin: 0;
  position: relative;
  top: 2px;
  font-size: 20px;
  color: #666666;
}

.tenKqueuefirstbox {
  padding: 10px;
}

.tenKborrowerqueue {
  height: 50px;
  background: #fff;
  display: grid;
  grid-auto-flow: column;
  margin: 10px 0 5px 0;
  border-radius: 10px;
}

.tenKborrowerqueue p {
  margin: 0;
  padding:0;
  font-size: 13px;
  font-weight: bold;
}

.tenKqueuesecondbox {
  position: relative;
  margin: auto;
}

.tenKloanaccountdetailscontainer {
  width: 380px;
  height: 120px;
  margin: auto;
  position: relative;
  top: 10px;
  display: grid;
  grid-gap: 15px;
}

.tenKloanaccountdetailscontainer p {
  font-size: 13px;
  margin: 0;
  padding:0;
}

.loanaccountdetails-box {
  position: relative;
  top: 20px;
  display: grid;
  grid-auto-flow: column;
  grid-gap: 40px;
  justify-content: center;
}

.firstbox {
  display: grid;
  grid-gap: 5px;
  color: #666666;
}

.secondbox {
  display: grid;
  grid-gap: 5px;
}

#submit_tenK_newloan {
  height: 30px;
  width: 110px;
  border: none;
  border-radius: 5px;
  font-size: 17px;
  color: #fff;
  background: #009245;
}

#cancel_tenK_newloan {
  height: 30px;
  width: 110px;
  border: none;
  border-radius: 5px;
  font-size: 17px;
  color: #fff;
  background: #ED1C24;
}

/* Add New Payment 5K Modal */
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
  width: 400px;
  height: 655px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 5px;
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

#btn_5k_moreoption {
  position: absolute;
  right: 10px;
  top: 2px;
}

.bdb-content{
  width: 380px;
  padding: 5px;
  height: 520px;
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

hr {
  margin: 10px 0 0px 0;
  margin: auto;
  width: auto;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

.current_loantransaction_container {
  width: 380px;
  height: 125px;
  margin: auto;
}

.current_loantransaction_container p {
  margin: 0;
  padding: 0;
  font-size: 13px;
}

.clt_container {
  position: relative;
  top: 10px;
}

.cltbox {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 2px;
}

.clt {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
}

.clt > label {
  font-size: 14px;
  color: #666666;
}

.clt > input {
  width: 115px;
  height: 20px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
}

.current_loantransaction_container h5 {
  font-size: 16px;
  font-weight: lighter;
  margin: 0;
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

#transaction_box_5kcontainer {
  margin-top: 15px;
}

.paymentbox_5k_container {
  position: relative;
  top: 10px;
  background: #fff;
}

.paymentbox_5k_content {
  height: 240px;
  overflow: auto;
}

.paymentbox_5k_container h5 {
  font-size: 16px;
  font-weight: lighter;
  margin: 0;
}

.paymentbox_5k {
  height: 215px;
  display: grid;
  grid-gap: 5px;
  margin-top: 10px;
}

.np5kbox {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
}

.np5kbox p {
  margin: 0;
}

.np5kbox > label {
  font-size: 14px;
  color: #666666;
}

.np5kbox select {
  width: 150px;
  height: 27px;
  background: #0071BC;
  border: none;
  border-radius: 5px;
  color: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .2),
  -5px 2px 10px rgba(126, 125, 125, .2);
  padding-left: 10px;
  cursor: pointer;
}

#datepicker {
  width: 10vw;
  height: 4vh;
  border: 2px solid #0071BC;
  background: #F2F2F2;
  color: #808080;
  font-size: 12px;
  border-radius: 5px;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .2),
  -5px 2px 10px rgba(126, 125, 125, .2);
  padding-left: 10px;
  cursor: pointer;
}

#penaltyrate_5k {
  margin: 0;
}

#txt_amount_payment_5k {
  width: 150px;
  height: 26px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
}

#txt_interestamount_5k, #txt_currentbalance_5k {
  width: 40px;
  height: 20px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
}

.pb5k_btnaction {
  margin-top: .3rem;
  margin-left: 15.5rem;
}

#pb5k_btn_submit {
  background: #0071BC;
  width: 60px;
  height: 23px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 100ms ease-in;
  font-size: 12px;
  cursor: pointer;
}

#pb5k_btn_submit:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#pb5k_btn_cancel {
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

/* Add New Payment 10K Modal */
#newpayment_10k_modal {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.9); /* color */
  display: none; /* making it hidden by default */
}

.newpayment_10k_container {
  display: block;
  width: 400px;
  height: 550px;
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
  background: #009245;
  border-radius: 5px;
  color: #fff;
}

.newpayment_10k_titlecontainer > h3 {
  font-weight: lighter;
  font-size: 16px;
  margin: 0;
}

#btn_10k_moreoption {
  position: absolute;
  right: 10px;
  top: 2px;
}

.bdb-10k-content{
  width: 380px;
  padding: 5px;
  height: 520px;
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

hr {
  margin: 10px 0 0px 0;
  margin: auto;
  width: auto;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

.current_10K_loantransaction_container {
  width: 380px;
  height: 150px;
  margin: auto;
}

.current_10K_loantransaction_container p {
  margin: 0;
  padding: 0;
  font-size: 13px;
}

.clt_container_10k {
  position: relative;
  top: 10px;
}

.cltbox10k {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 10px;
}

.current_10K_loantransaction_container h5 {
  font-size: 16px;
  font-weight: lighter;
  margin: 0;
}

.paymentbox_10k_container {
  position: relative;
  top: 10px;
  background: #fff;
}

.paymentbox_10k_content {
  height: 230px;
  overflow: auto;
}

.paymentbox_10k_container h5 {
  font-size: 16px;
  font-weight: lighter;
  margin: 0;
}

.paymentbox_10k {
  height: 215px;
  display: grid;
  grid-gap: 5px;
  margin-top: 10px;
}

.np10kbox {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
}

.np10kbox p {
  margin: 0;
}

.np10kbox > label {
  font-size: 14px;
  color: #666666;
}

.np10kbox select {
  width: 150px;
  height: 27px;
  background: #009245;
  border: none;
  border-radius: 5px;
  color: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .2),
  -5px 2px 10px rgba(126, 125, 125, .2);
  padding-left: 10px;
  cursor: pointer;
}

#datepicker_10k {
  width: 10vw;
  height: 4vh;
  border: 2px solid #009245;
  background: #F2F2F2;
  color: #808080;
  font-size: 12px;
  border-radius: 5px;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .2),
  -5px 2px 10px rgba(126, 125, 125, .2);
  padding-left: 10px;
  cursor: pointer;
}

#penaltyrate_10k {
  margin: 0;
}

#txt_amount_payment_10k {
  width: 150px;
  height: 26px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
}

#txt_interestamount_10k, #txt_currentbalance_10k {
  width: 40px;
  height: 20px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
}

.pb10k_btnaction {
  margin-top: .3rem;
  margin-left: 15.5rem;
}

#pb10k_btn_submit {
  width: 60px;
  height: 23px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 100ms ease-in;
  font-size: 12px;
  background: #009245;
  cursor: pointer;
}

#pb10k_btn_submit:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#pb10k_btn_cancel {
  width: 60px;
  height: 23px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 100ms ease-in;
  font-size: 12px;
  background: #ED1C24;
  cursor: pointer;
}

#pb10k_btn_cancel:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}
</style>
STYLE;
?>