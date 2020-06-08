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
  padding: 5px;
  background: #FFFFFF;
  font-size: 1.5rem;
  border-radius: 10px;

}

.first-card {
  width: 395px;
  height: 300px;
}

.second-card {
  width: 395px;
  height: 300px;
}

.third-card {
  width: 395px;
  height: 300px;
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