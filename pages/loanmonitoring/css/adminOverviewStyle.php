<?php
echo <<<STYLE
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: 'Roboto', 'Helvetica', 'sans-serif';
  background: #F2F2F2;
  //background: linear-gradient(118deg, rgba(226,30,255,1) 9%, rgba(242,146,61,0.8295693277310925) 50%, rgba(44,91,229,1) 90%) no-repeat center center fixed;
  // background: rgb(226,30,255);
  // background: linear-gradient(199deg, rgba(226,30,255,1) 0%, rgba(255,0,131,0.865983893557423) 25%, rgba(205,0,255,0.8295693277310925) 50%, rgba(255,0,236,0.8995973389355743) 77%, rgba(44,91,229,1) 100%) no-repeat center center fixed;
  // height: 100%;
  // background-position: center;
  // -webkit-background-size: cover;
  // -moz-background-size: cover;
  // -o-background-size: cover;
  // background-size: cover;
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

#loan-navigation-container {
  margin: 0;
  padding: 0;
}

#loan-navigation-container nav {
  //background-color: rgba(0, 113, 188, 0.9);
  background-color: #0071BC;
  // backdrop-filter: blur(3px);
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

#overview-container {
  width: 92%;
  height: 950px;
  margin: auto;
}

#overview-container > h1 {
  font-size: 3em;
  margin: 0;
  padding: 0;
}

#transaction-cards {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-gap: 12px;
  width: 1254px;
}

#transaction-cards .cards {
  height: auto;
  padding: 10px;
  background: #FFFFFF;
  border-radius: 15px;
  // background-color: rgba(250, 250, 250, 0.4);
  // backdrop-filter: blur(3px);
}

.first-card {
  width: 410px;
  height: 310px;
}

.second-card {
  width: 410px;
  height: 310px;
}

.third-card {
  width: 410px;
  height: 310px;
}

.sixth-card {
  width: 410px;
  height: 310px;
}

#active_cards {
  width: 410px;
  height: 140px;
  background: #FFFFFF;
  border-radius: 15px;
  padding: 10px;
}

#fourth-card-label-container {
  padding: 5px 0px 5px 10px;
}

.active_inner {
  margin: 0;
  color: #333333;
}

.loanStatusCount {
  color: #aeaeb2;
}

.active_inner_container {
  width: 230px;
  display: grid;
  grid-template-columns: auto auto;
  grid-gap: 32px;
}

.payment_received_inner {
  width: 230px;
  display: grid;
  grid-template-columns: auto auto;
  grid-gap: 32px;
}

.payment_received_inner p {
  margin: 5px 0 5px 0;
}

.title_payment_received {
  color: #aeaeb2;
}

#third_line {
  // display: flex;
  // justify-content: space-between;
  // margin-top: 12px;
  // width: 1254px;
  // height: 400px;
  overflow: hidden;
  width: 1254px;
}

#active_borrower_cards {
  width: 410px;
  // max-height: 400px;
  height: auto;
  // outline: none;
  // overflow: auto;
  background: #FFFFFF;
  border-radius: 15px;
  padding: 10px;
  // position: relative;
  box-sizing: border-box;
  float: left;
  margin: 12px 12px 0 0;
}

#most_borrower_cards {
  width: 410px;
  height: auto;
  // overflow: auto;
  background: #FFFFFF;
  border-radius: 15px;
  padding: 10px;
  box-sizing: border-box;
  // position: relative;
  float: left;
  margin: 12px 12px 0 0;
}

#penalty_list_box {
  width: 410px;
  height: auto;
  // outline: none;
  // overflow: hidden;
  background: #FFFFFF;
  border-radius: 15px;
  padding: 10px;
  box-sizing: border-box;
  // position: relative;
  float: left;
  // margin: 12px;
  margin-top: 12px;
}

.active_borrower_name {
  font-size: 18px;
  font-weight: bold;
  color: #333333;
}

.active_borrower_office {
  font-size: 14px;
  color: #666666;
}

#active_borrower_cards p {
  margin: 0;
}

// .active_borrower_list {
//   height: 334px;
//   overflow: auto;
//   margin-top: 14px;
// }

// .penalty_list_card {
//   max-height: 334px;
//   overflow: auto;
//   margin-top: 14px;
// }

#totalpayment_cards {
  width: 410px;
  height: 140px;
  background: #FFFFFF;
  border-radius: 15px;
  padding: 10px;
}

#paymentoption_cards {
  width: 410px;
  height: 140px;
  background: #FFFFFF;
  border-radius: 15px;
  padding: 10px;
}

.payment_option_box {
  display: grid;
  grid-gap: 10px;
  grid-template-columns: auto auto;
  margin: auto;
  background: #f2f2f7;
  border-radius: 15px;
  margin-top: 10px;
}

.fullpayment_box, .downpayment_box {
  width: 190px;
  height: 90px;
  color: #48484a;
}

#openloan_cards {
  width: 395px;
  height: 300px;
}

.cards p {
  margin: 0;
}

hr {
  margin: 5px 0 5px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dddddd;
  overflow: visible;
  text-align: center;
}
</style>
STYLE;
