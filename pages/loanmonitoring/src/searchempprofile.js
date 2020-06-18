  function comm() {
    // document.querySelector(".search_box_container").style.display="none";
    document.getElementById("result_container").style.display = "block";
  }

  function search_employee(emp_keyword) {


    if (emp_keyword.length >= 1) {
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
      const form = document.createElement("form");
      const btn = document.createElement("button");
      const input_id = document.createElement("input");
      const input_fname = document.createElement("input");
      const input_mname = document.createElement("input");
      const input_lname = document.createElement("input");
      const input_emp_type = document.createElement("input");
      const hr = document.createElement("hr");

      btn.innerHTML = `${emp_data[i]["emp_fName"]} ${emp_data[i]["emp_mName"]} ${emp_data[i]["emp_lName"]}`;

      input_id.setAttribute("name", "emp_search_id");
      input_id.setAttribute("type", "hidden");
      input_id.setAttribute("value", `${emp_data[i]["emp_id"]}`);

      input_fname.setAttribute("name", "emp_search_fname");
      input_fname.setAttribute("type", "hidden");
      input_fname.setAttribute("value", `${emp_data[i]["emp_fName"]}`);

      input_mname.setAttribute("name", "emp_search_mname");
      input_mname.setAttribute("type", "hidden");
      input_mname.setAttribute("value", `${emp_data[i]["emp_mName"]}`);

      input_lname.setAttribute("name", "emp_search_lname");
      input_lname.setAttribute("type", "hidden");
      input_lname.setAttribute("value", `${emp_data[i]["emp_lName"]}`);

      input_emp_type.setAttribute("name", "emp_search_empType");
      input_emp_type.setAttribute("type", "hidden");
      input_emp_type.setAttribute("value", `${emp_data[i]["emp_type"]}`);

      btn.setAttribute("onclick", "return comm()");

      search_result.appendChild(form);
      form.setAttribute("method", "GET");
      form.setAttribute("id", "result_form");
      form.appendChild(input_id);
      form.appendChild(input_fname);
      form.appendChild(input_mname);
      form.appendChild(input_lname);
      form.appendChild(input_emp_type);
      form.appendChild(btn);
      form.appendChild(hr);

      // btn.classList.add("add_to_queue");
      btn.setAttribute("id", "btn_view_emp_profile");
      btn.type = "submit"; // forced the type to "button" because the default is "submit". 
    }
  }