function generateReport() {

    let district = document.getElementById("area").value;
    let type = document.getElementById("type").value;

    let url = "reports.php?district=" + district + "&type=" + type;

    window.location.href = url;

}

function deleteUser(id) {

    if(confirm("Delete this request?")){

        window.location.href = "../backend/delete_request.php?id=" + id;

    }

}