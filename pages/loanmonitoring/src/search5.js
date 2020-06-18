function search_employee(emp_keyword) {
  // console.log(emp_keyword);
  // if(emp_keyword.length < 0){
  //   const search_result_box = document.getElementById('search_result_box');
  //   search_result_box.style.display = 'none';
  // } else if(emp_keyword.length > 0){
  // console.log(emp_keyword);
  // fetchEmployeeData(emp_keyword);
  // }

  // var txt_emp_search = document.getElementById('txt_emp_search');
  // if (emp_keyword.length > 0) {
  //   console.log(emp_keyword);
  //   fetchEmployeeData(emp_keyword)
  // } else if(emp_keyword == null){
  //   var search_result_box = document.getElementById('search_result_container');
  //   search_result_box.style.display = 'none';
  //   return false;
  // }

  if(emp_keyword.length >= 1){
    document.getElementById('search_result_container').style.display = 'block';
    console.log(emp_keyword);
    fetchEmployeeData(emp_keyword);
  } else {
    document.getElementById('search_result_container').style.display = 'none';
    console.log("empty");
  }

}

function fetchEmployeeData(keyword) {
  fetch('search_employee.php', {
    method: 'POST',
    header: {
      "Content-type": "application/json"
    },
    body: new URLSearchParams('txt_emp_search=' + keyword)
  })
    .then(res => res.json())
    .then(res => display_search_result(res))
    .catch(e => console.error('Error: ' + e))
}

function display_search_result(emp_data) {
  const search_result = document.getElementById('search_result_box');

  search_result.innerHTML = "";

  for (let i = 0; i < emp_data.length; i++) {
    const btn = document.createElement("button");
    btn.innerHTML = `${emp_data[i]["emp_fName"]} ${emp_data[i]["emp_lName"]}<hr>`;
    search_result.appendChild(btn);
    btn.classList.add("add_to_queue");
    btn.setAttribute("formid", "form1");
    btn.type="submit"; // forced the type to "button" because the default is "submit". 
  }
}