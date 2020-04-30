function search_employee(emp_keyword){
  console.log(emp_keyword);
  fetchEmployeeData(emp_keyword);
}

function fetchEmployeeData(keyword){
  fetch('search_employee.php', {
    method: 'POST',
    header: {
      "Content-type" : "application/json"
    },
    body: new URLSearchParams('txt_5K_newloan_borrower=' + keyword)
  })
  .then(res => res.json())
  .then(res => display_search_result(res))
  .catch(e => console.error('Error: ' + e))
}

function display_search_result(emp_data){
  const emp_container = document.getElementById('emp_container');
  const emp_list = document.getElementById('emp_list');
  // const hidden_input = document.querySelectorAll('.hidden_5k_info');
  // const hidden_id = document.querySelector('.hidden_id');
  // const hidden_fname = document.querySelector('.hidden_fname');
  // const hidden_mname = document.querySelectorAll('.hidden_mname');
  // const hidden_lname = document.querySelectorAll('.hidden_lname');
  emp_list.innerHTML = "";

  for(let i = 0; i < emp_data.length; i++){
    document.querySelectorAll('.hidden_5k_info').forEach(e => {
      e.type="text";
    });
    const hidden_id = document.querySelector('.hidden_id');
    const hidden_fname = document.querySelector('.hidden_fname');
    const hidden_mname = document.querySelector('.hidden_mname');
    const hidden_lname = document.querySelector('.hidden_lname');

    const fullname_5k = document.createElement("input");

    hidden_id.type="text";
    hidden_fname.type="text";
    hidden_mname.type="text";
    hidden_lname.type="text";

    hidden_id.value = emp_data[i]["emp_id"];

    fullname_5k.value = `${emp_data[i]["emp_fName"]} ${emp_data[i]["emp_lName"]} | ${emp_data[i]["emp_office"]}`;
    fullname_5k.classList.add("emp_fullname_5k");
    fullname_5k.type="text"; // forced the type to "button" because the default is "submit". 
    emp_list.appendChild(fullname_5k);
    emp_list.appendChild(hidden_id);
    // emp_container.appendChild(emp_list);
  }
}