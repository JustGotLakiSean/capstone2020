<?php
echo <<<style
<style>
.tabcontent {
  display: none;
  padding: 6px 12px;
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