<?php

echo <<<STYLE

<style>
body {
  background: #fff;
  margin: 0;
  height: auto;
  font-family: 'Roboto', 'Helvetica', 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
}

#asf-header {
  margin: 0;
  padding: 0;
  overflow-y: hidden;
}

#asf-header nav {
  height: 40px;
  width: 100%;
  background-color: #fff;
  color: #333;
}

#asf-header nav ul {
  padding: 0;
  margin: 0;
}

#asf-header nav li {
  display: inline;
  float: left;
}

#asf-header nav a {
  display: inline-block;
  width: 100px;
  text-align: center;
  text-decoration: none;
  padding: 10px 0;
  color: #333;
  text-decoration: none;
}

#asf-header nav li:hover {
  background-color: #eee;
}

/* Section */
section#admin-signin-container {
  top: 10vh;
  max-width: 330px;
  margin: auto;
  padding: 5px 0 0 0;
  background: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
  border-radius: 15px;
  position: relative;
}

#admin-signin-form {
  padding: 0;
  margin: 0 42px 0 42px;
  height: 380px;
}

section h1 {
  margin: 35px 0 0 0;
  padding: 0;
  text-align: center;
}

section hr {
  margin: 16px 0 16px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

#asf-inputbox {
  display: flex;
  flex-direction: column;
}

input[type=text], input[type=password] {
  height: 32px;
  font-size: 17px;
  border: 1px #ccc solid;
  border-radius: 5px;
  margin-bottom: 12px;
  padding-left: 10px;
}

::placeholder {
  color: #BCBEC0;
}

input[type=submit] {
  background-color: #fff;
  height: 2.2rem;
  border: 1px #D1D3D4 solid;
  border-radius: 5px;
  font-size: 20px;
  transition: 200ms ease-in;
  cursor: pointer;
}

input[type=submit]:hover {
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
}

.hr-or:after {
  content: "OR";
  position: relative;
  display: inline-block;
  top: -0.5em;
  font-size: 15px;
  padding: 0 0.25em;
  background: #fff;
  color: #BCBEC0;
}

#admin-signin-as-options {
  display: flex;
  flex-direction: column;
  align-items: center;
}

#admin-signin-as-options > label {
  text-align: center;
  color: #BCBEC0;
}

#asf-btn-option > button {
  width: 7.5rem;
  height: 2.5rem;
  color: #BCBEC0;
  border: none;
  border-radius: 5px;
}

#asf-btn-option {
  margin-top: 1rem;
}

.btn-ce {
  background: #006838;
}

.btn-oaep {
  background: #191919;
}

#admin-options {
  display: flex;
  justify-content: space-between;
  text-align: center;
  position: relative;
  margin: auto;
  
}

#admin-options > a {
  text-decoration: none;
  color: #00AEEF;
  font-size: 14px;
}
</style>
STYLE;
?>