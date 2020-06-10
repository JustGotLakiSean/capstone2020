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
}

/* width */
::-webkit-scrollbar {
  width: 2px;
}

/* Track */
::-webkit-scrollbar-track {
  display: none;
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

#overview-container {
  width: 90%;
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
  grid-gap: 10px;
  margin: auto;
}

#transaction-cards .cards {
  padding: 10px;
  background: #FFFFFF;
  font-size: 1.5rem;
  border-radius: 15px;

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

#active_cards {
  width: 410px;
  height: 130px;
  background: #FFFFFF;
  border-radius: 15px;
  margin-top: 10px;
  padding: 10px;
}

#fourth-card-label-container {
  padding: 5px 0px 5px 10px;
}

.active_inner {
  margin: 0;
}

.loanStatusCount {
  color: #aeaeb2;
}

.active_inner_container {
  width: 100px;
  display: grid;
  grid-template-columns: auto auto;
}

#active_borrower_cards {
  width: 410px;
  height: 320px;
  outline: none;
  // overflow: auto;
  background: #FFFFFF;
  border-radius: 15px;
  margin-top: 10px;
  padding: 10px;
  position: relative;
}

.active_borrower_name {
  font-size: 18px;
}

.active_borrower_office {
  font-size: 12px;
  color: #666666;

}

#active_borrower_cards p {
  margin: 0;
}

.active_borrower_list {
  height: 280px;
  overflow: auto;
  margin-top: 14px;
}

#totalinterest_cards {
  width: 410px;
  height: 300px;
  background: #FFFFFF;
  border-radius: 15px;
  margin-top: 10px;
  padding: 10px;
}

#openloan_cards {
  width: 395px;
  height: 300px;
}

.cards p {
  margin: 0;
  font-size: 16px;
  font-weight: lighter;
  color: #aeaeb2;
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
?>