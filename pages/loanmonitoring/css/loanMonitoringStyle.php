<?php
echo <<<STYLE
<style>

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: 'Roboto', 'Helvetica', 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
  //background: linear-gradient(286deg, rgba(0,255,56,0.6839110644257703) 4%, rgba(147,48,204,1) 50%, rgba(0,255,188,1) 100%);
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
  height: 42px;
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
  height: 26px;
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
  max-width: 92%;
  margin: auto;
  height: 740px;
}

#loan-summary-content {
  position: relative;
  // top: 58px;
  width: 100%;
  display: flex;
  flex-flow: row wrap;
  justify-content: space-between;
}

#loan-summary-content .summarycard {
  padding: 3px;
  margin-bottom: 10px;
  height: auto;
  width: 200px;
  //background: rgba(255, 255, 255, 0.2);
  background: #FFFFFF;
  font-size: 20px;
  border-radius: 5px;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
  //backdrop-filter: blur(8px);
}

.summarycard5k {
  padding: 3px;
  // margin-bottom: 10px;
  height: auto;
  width: 200px;
  //background: rgba(255, 255, 255, 0.2);
  background: #FFFFFF;
  font-size: 20px;
  border-radius: 5px;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
  //backdrop-filter: blur(8px);

}

.summarycard5k p, h6 {
  text-align: center;
  margin: 0;
  padding: 0;
}

#loan-summary-content p, h6{
  text-align: center;
  margin: 0;
  padding: 0;
}

// #loan-summary-content .ls-value {
//   text-align: right;
//   font-size: 2rem;
//   margin-top: 1rem;
// }

#loantransactionform {
  width: 100%;
  height: 520px;
  margin: 0;
  background: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
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
  width: 100%;
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

#trasaction_table_10k > table {
  width: 100%;
  margin: auto;
  border-collapse: collapse;
  text-align: center;
}

#trasaction_table_10k > table > thead {
  background: #009245;
  border: 1px solid rgb(179,179,179);
}

#trasaction_table_10k > table > thead > tr > th {
  color: #fff;
  font-weight: lighter;
}

#trasaction_table_10k > table > tbody {
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
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
  display: none; /* making it hidden by default */
}

.fiveKaddnewloanpanel {
  width: 700px;
  height: 650px;
  margin: auto;
  background: #F2F2F2;
  // background: rgba(255, 255, 255, 0.9);
  // backdrop-filter: blur(10px);
  position: relative;
  top: 8px;
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
  position: relative;
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
  width: 6px;
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
  width: 6px;
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
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
  display: none; /* making it hidden by default */
}

.tenKaddnewloanpanel {
  width: 700px;
  height: 650px;
  margin: auto;
  background: #F2F2F2;
  border: none;
  border-radius: 5px;
}

.tenKnewloantitleholder {
  position: relative;
  height: 26px;
  background: #009245;
  border-radius: 5px;
  color: #fff;
}

#btn_close_10k {
  position: absolute;
  top: 3px;
  right: 3px;
  width: 50px;
}

.tenKnewloantitleholder > h3 {
  text-align: center;
  font-weight: lighter;
  margin: 0;
  position: relative;
  top: 2px;
}

.tenKnewloanfirstbox {
  position: relative;
  top: 10px;
  width: 380px;
  height: 120px;
}

#search_container_10k {
  background: #E6E6E6;
  border-radius: 5px;
  width: 50.95vw;
  max-height: 38vh;
  overflow: auto;
  border: 2px solid #009245;
}

.search_result_box_10k {
  margin: 5px 0 0 0;
  padding: 0;
}

.emp_info_10k {
  text-align: center;
  margin-bottom: 5px;
  width: 40vw;
  color: #FFF;
  background: #009245;
  border: none;
  border-radius: 5px;
  height: 30px;
  //cursor: pointer;
  font-size: 1rem;
}

.btn_add_10k_loan {
  border: 2px solid #009245;
  margin-left: 10px;
  border-radius: 5px;
  font-size: .8rem;
  font-weight: bold;
  color: #009245;
  width: 110px;
  height: 30px;
  cursor: pointer;
  transition: 100ms ease-in;
}

.btn_add_10k_loan:hover {
  background: #009245;
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

#tenKnewloanform {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 5px;
  margin: auto;
}

/* width */
::-webkit-scrollbar {
  width: 6px;
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
  font-size: 1rem;
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

.tenKborrowernewloandetails {
  margin-top: 150px;
}

.lk_rate_10k {
  text-align: center;
  width: 7vw;
  margin: 0;
  font-size: .9rem;
  border-radius: 5px;
  border: 2px solid #CCCCCC;
  height: 20px;
}

.tenKqueuesecondbox {
  margin: auto;
}

.tenKloanaccountdetailscontainer {
  width: 380px;
  height: 120px;
  margin: auto;
  display: grid;
  grid-gap: 15px;
}

.tenKloanaccountdetailscontainer p {
  font-size: 13px;
  margin: 0;
  padding:0;
}

.firstbox_10k {
  display: grid;
  grid-gap: 5px;
  color: #666666;
}

.secondbox_10k {
  display: grid;
  grid-gap: 5px;
}

.loanaccountdetails-box {
  margin-top: 10px;
  display: grid;
  grid-auto-flow: column;
  grid-gap: 40px;
  justify-content: center;
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
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
}

#newpayment_5k_container {
  display: block;
  width: 600px;
  height: auto;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 5px;
  border: none;
}

.newpayment_5k_titlecontainer {
  height: auto;
  background: #0071BC;
  border-radius: 5px;
  color: #fff;
}

.newpayment_5k_titlecontainer > h3 {
  font-weight: lighter;
  margin: 0;
}

#btn_5k_moreoption {
  position: absolute;
  right: 10px;
  top: 2px;
}

.bdb-content{
  width: 550px;
  margin: auto;
}

.bdb_container {
  display: block;
  height: auto;
  position: relative;
}

.borrowers_detailbox {
  display: grid;
  // grid-auto-flow: row;
  grid-gap: 5px;
  margin-top: 10px;
  // margin: auto;
  // position: relative;
  // height: 65px;
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
  width: 550px;
  height: 110px;
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

.paymentbox_5k_container {
  position: relative;
  margin-top: 10px;
}

.paymentbox_5k_content {
  height: 240px;
}

.paymentbox_5k_container h5 {
  font-size: 16px;
  font-weight: lighter;
  margin: 0;
}

.paymentbox_5k {
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
  width: 184px;
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
  width: 184px;
  height: 27px;
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
  margin: auto;
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
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
}

.newpayment_10k_container {
  display: block;
  width: 600px;
  height: auto;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 5px;
  border: none;
}

.newpayment_10k_titlecontainer {
  height: auto;
  background: #009245;
  border-radius: 5px;
  color: #fff;
}

.newpayment_10k_titlecontainer > h3 {
  font-weight: lighter;
  margin: 0;
}

#btn_10k_moreoption {
  position: absolute;
  right: 10px;
  top: 2px;
}

.bdb-10k-content{
  width: 550px;
  margin: auto;
}

.bdb-10k_container {
  display: block;
  height: auto;
  position: relative;
}

.borrowers_detailbox_10k {
  display: grid;
  // grid-auto-flow: row;
  grid-gap: 5px;
  // margin: auto;
  // position: relative;
  margin-top: 10px;
  // height: 65px;
  // background: rgb(217,50,67);
  // background: linear-gradient(90deg, rgba(217,50,67,1) 0%, rgba(255,172,177,1) 25%, rgba(254,132,187,1) 50%, rgba(255,177,120,1) 75%, rgba(255,167,68,1) 100%);
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
  width: 550px;
  height: 110px;
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
  grid-gap: 2px;
}

.current_10K_loantransaction_container h5 {
  font-size: 16px;
  font-weight: lighter;
  margin: 0;
}

#transaction_box_10k {
  margin: auto;
  border-collapse: collapse;
  width: 100%;
  font-size: 13px;
}

#transaction_box_10k > thead > tr > th{
  font-size: 13px;
}

.paymentbox_10k_container {
  margin-top: 10px;
  position: relative;
}

.paymentbox_10k_content {
  height: 220px;
  // overflow: auto;
}

.paymentbox_10k_container h5 {
  font-size: 16px;
  font-weight: lighter;
  margin: 0;
}

.paymentbox_10k {
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
  width: 184px;
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
  width: 184px;
  height: 27px;
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
  margin: auto;
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