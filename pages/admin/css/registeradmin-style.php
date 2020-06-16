<?php

echo <<<STYLE
<style type="text/css">
body {
  margin: 0;
  height: auto;
  font-family: 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
}

#raa-header {
  margin: 0;
  padding: 0;
  overflow-y: hidden;
}

#raa-header nav {
  height: 40px;
  width: 100%;
  background-color: #fff;
  color: #333;
}

#raa-header nav ul {
  padding: 0;
  margin: 0;
}

#raa-header nav li {
  display: inline;
  float: left;
}

#raa-header nav a {
  display: inline-block;
  width: 100px;
  text-align: center;
  text-decoration: none;
  padding: 10px 0;
  color: #333;
  text-decoration: none;
}

#raa-header nav li:hover {
  background-color: #eee;
}

#register-admin-container {
  max-width: 530px;
  height: 530px;
  margin: auto;
  border-radius: 5px;
  background: #fff;
  position: relative;
  box-shadow: 1px 2px 10px rgba(126, 125, 125, 0.3),
  -1px 2px 10px rgba(126, 125, 125, 0.3);
}

#register-admin-container > h4 {
  top: 20px;
  margin-bottom: 40px;
  padding: 0;
  text-align: center;
  position: relative;
  color: #4D4D4D;
  font-family: 'Franklin Gothic Heavy';
  font-size: 22px;
}

form {
  display: grid;
  grid-auto-flow: row;
  padding: 0 1rem 0 .5rem;
}

#register-admin-personaldetails, #register-admin-accountdetails {
  display: grid;
  grid-auto-flow: column;
}

label {
  font-size: .93rem;
  margin-right: 10px;
  color: #808080;
  position: relative;
}

hr {
  margin: 16px 0 16px 0;
  width: 505px;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

.raaform-input-inner {
  display: grid;
  grid-gap: 5px;
  grid-auto-flow: row;
}

input[type=text], input[type=password], input[type=date], input[type=email] {
  height: 4vh;
  width: 380px;
  background: #F2F2F2;
  border: 1px solid #E6E6E6;
  border-radius: 3px;
  padding-left: 10px;
  font-size: .9rem;
}

::placeholder {
  color: #808080;
}

#register-action {
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin-top: 1rem;
  padding-left: 105px;
}

input[type=submit] {
  background: #1A1A1A;
  border-radius: 5px;
  border: none;
  height: 6vh;
  width: 28vw;
  color: #808080;
  font-size: 1rem;
  cursor: pointer;
}

input[type=button] {
  background: #FF1D25;
  border-radius: 5px;
  border: none;
  height: 3rem;
  width: 180px;
  color: #FFFFFF;
  font-size: 1rem;
  cursor: pointer;
}

form > p {
  color: #808080;
  font-size: 12px;
  text-align: center;
}
</style>
STYLE;
?>