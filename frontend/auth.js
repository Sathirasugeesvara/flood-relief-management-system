// Login Form
if(document.getElementById("loginForm")){
    document.getElementById("loginForm").addEventListener("submit", function(e){
        e.preventDefault();
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        if(email === "" || password === ""){
            alert("Please fill all fields");
            return;
        }

        // Admin hardcoded
        if(email === "admin@gmail.com"){
    alert("Login successful as Admin");
    window.location.href = "/frontend/pages/admin_dashboard.html";
}else{
    alert("Login successful as User");
    window.location.href = "/frontend/pages/dashboard_user.html";
}

    });
}

// Register Form
if(document.getElementById("registerForm")){
    document.getElementById("registerForm").addEventListener("submit", function(e){
        e.preventDefault();
        alert("Registration successful! Please login.");
        window.location.href = "/frontend/index.html";

    });
}

// Logout
function logout(){
    alert("Logged out successfully!");
    window.location.href = "/frontend/index.html";

}

// Admin Actions
function editUser(btn){
    let row = btn.parentElement.parentElement;
    let name = row.cells[0].innerText;
    let email = row.cells[1].innerText;
    alert("Edit user: " + name + " (" + email + ")");
}

function deleteUser(btn){
    if(confirm("Are you sure you want to delete this user?")){
        let row = btn.parentElement.parentElement;
        row.remove();
        alert("User deleted successfully!");
    }
}

// Relief Request
if(document.getElementById("requestForm")){
    document.getElementById("requestForm").addEventListener("submit", function(e){
        e.preventDefault();
        alert("Your relief request has been created successfully.");
        window.location.href = "dashboard_user.html";
    });
}




function editUser(btn){
    let row = btn.parentElement.parentElement;
    let name = prompt("Edit Name:", row.cells[0].innerText);
    let email = prompt("Edit Email:", row.cells[1].innerText);

    if(name && email){
        row.cells[0].innerText = name;
        row.cells[1].innerText = email;
        alert("User updated!");
    }
}

function saveStatus(btn) {
        const row = btn.closest("tr");
        const statusSelect = row.querySelector("select");
        alert(`Status for Request ID ${row.cells[0].innerText} updated to "${statusSelect.value}"`);

}









function deleteRequest(button){
    if(confirm("Are you sure you want to delete this request?")){
        // Remove the row from the table
        let row = button.parentElement.parentElement;
        row.remove();
    }
}

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