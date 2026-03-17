function showMessage(message) {
  alert(message);
}

// for LOGIN
function handleLogin() {
  const email = document.getElementById("loginEmail").value;
  const password = document.getElementById("loginPassword").value;
  const role = document.getElementById("loginRole").value;

  if (!email || !password) {
    showMessage("Please fill all fields");
    return;
  }

  if (role === "Admin") {
    window.location.href = "admin.php";
  } else {
    window.location.href = "user.php";
  }
}

// for REGISTER
function handleRegister() {
  const name = document.getElementById("regName").value;
  const email = document.getElementById("regEmail").value;
  const password = document.getElementById("regPassword").value;
  const confirm = document.getElementById("regConfirm").value;

  if (!name || !email || !password || !confirm) {
    showMessage("All fields are required");
    return;
  }

  if (password !== confirm) {
    showMessage("Passwords do not match");
    return;
  }

  showMessage("Registration successful");
  window.location.href = "login.php";
}

// for CREATE REQUEST
function submitRequest() {
  const type = document.getElementById("reliefType").value;
  const district = document.getElementById("district").value;
  const severity = document.getElementById("severity").value;

  if (!type || !district) {
    showMessage("Please complete required fields");
    return false;
  }

  return true;
}

// for DELETE REQUEST
function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this request?")) {
    window.location.href = "../backend/delete_request.php?id=" + id;
  }
}

// for ADMIN ACTIONS
function deleteUser() {
  if (confirm("Delete this user?")) {
    showMessage("User deleted");
  }
}

function viewUser() {
  showMessage("User details opened");
}

// forLOGOUT
function logout() {
  window.location.href = "login.php";
}

// for Fetch user requests dynamically (optional)
document.addEventListener("DOMContentLoaded", function () {
  const table = document.getElementById("requestTable");
  if (!table) return;

  fetch("../backend/get_user_requests.php")
    .then(res => res.json())
    .then(data => {
      let rows = "";
      data.forEach(request => {
        rows += `
          <tr>
            <td>${request.relief_type}</td>
            <td>${request.district}</td>
            <td>${request.severity}</td>
            <td>
              <button onclick="editRequest(${request.id})">Edit</button>
              <button onclick="confirmDelete(${request.id})" style="background-color:#dc2626;">Delete</button>
            </td>
          </tr>`;
      });
      table.innerHTML = rows;
    });
});


function editRequest(id) {
  window.location.href = "edit_request.php?id=" + id;
}

function deleteRequest(id) {
  if (confirm("Are you sure you want to delete this request?")) {
    window.location.href = "../backend/delete_request.php?id=" + id;
  }
}