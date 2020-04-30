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
  const search_result = document.getElementById('search_result');

  search_result.innerHTML = "";

  for(let i = 0; i < emp_data.length; i++){
    const btn = document.createElement("button");
    btn.innerHTML = `${emp_data[i]["emp_fName"]} ${emp_data[i]["emp_lName"]} | ${emp_data[i]["emp_office"]}`;
    search_result.appendChild(btn);
    btn.classList.add("add_to_queue");
    btn.type="button"; // forced the type to "button" because the default is "submit". 
    document.querySelectorAll('.add_to_queue').forEach(add => {
      add.addEventListener('click', () => {
        console.log(emp_data[i]);
      });
    });
  }
}