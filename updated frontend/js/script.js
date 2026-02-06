
// login
function handleLogin() {
  const email = document.getElementById("loginEmail").value.trim();
  const password = document.getElementById("loginPassword").value.trim();
  const role = document.getElementById("loginRole").value.trim();
  console.log("Role selected:", role);
  if (email === "" || password === "") {
    alert("Please fill all fields");
    return false;
  }

  if (role === "Admin") {
    window.location.href = "admin.html";
  } else  {
    window.location.href = "user.html";
  }
}


// Register
function handleRegister() {
  const name = document.getElementById("regName").value.trim();
  const email = document.getElementById("regEmail").value.trim();
  const password = document.getElementById("regPassword").value.trim();
  const confirm = document.getElementById("regConfirm").value.trim();

  if (!name || !email || !password || !confirm) {
    alert("All fields are required");
    return false;
  }

  if (password !== confirm) {
    alert("Passwords do not match");
    return false;
  }

  if (password.length < 6) {
    alert("Password must be at least 6 characters");
    return false;
  }

  alert("Registration successful");
  window.location.href = "login.html";
}



// Request creation
function submitRequest() {
  const type = document.getElementById("reliefType").value;
  const district = document.getElementById("district").value;
  const contactNumber= document.getElementById("contactNumber").value;

  
  if (type === "" || district === ""||contactNumber=="") {
    alert("Please complete required fields");
    return false;
  }else{
    alert("Relief request submitted successfully");
    return true;
  }
}

// USER ACTIONS
//delete
function deleteRequest(button) {
  if (confirm("Are you sure you want to delete this request?")) {
    let row =button.parentElement.parentElement;
    row.remove();
  }
}
//edit
function editRequest(button){
    let row = button.parentElement.parentElement;
    let type = row.cells[0].innerText;
    let district = row.cells[1].innerText;
    let severity = row.cells[2].innerText; 
    let newType = prompt("Edit Relief Type:", type);
    let newDistrict = prompt("Edit District:", district);
    let newSeverity = prompt("Edit Severity:", severity);

    if(newType && newDistrict && newSeverity){
        row.cells[0].innerText = newType;
        row.cells[1].innerText = newDistrict;
        row.cells[2].innerText = newSeverity;
    }


}



// ADMIN ACTIONS
//delete
function deleteUser(button) {
  if (confirm("Delete this user?")) {
    let row =button.parentElement.parentElement;
    row.remove();
  }
}




function logout() {
  window.location.href = "login.html";
}

//submition
//function submitRequest() {
    
    //var reliefType = document.getElementById("reliefType").value.trim();
    //var contactNumber = document.getElementById("contactNumber").value.trim();

    //if ( reliefType === "" || contactNumber === "") {
     // alert("Please fill all the required fields");
      //return false; 
    //}else{

    //alert("Request Submitted Successfully");
    //return true; 
    //}
//}



