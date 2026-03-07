function generateReport() {

  const area = document.getElementById("area").value;
  const type = document.getElementById("type").value;

  fetch(`../backend/get_summary.php?area=${area}&type=${type}`)
    .then(res => res.json())
    .then(data => {

      document.getElementById("reportResult").innerHTML = `
        <div class="report-box">
          <h3>Filtered Summary</h3>
          <p><strong>Total Users:</strong> ${data.total_users}</p>
          <p><strong>High Severity:</strong> ${data.high_severity}</p>
          <p><strong>Food Requests:</strong> ${data.food_requests}</p>
          <p><strong>Medicine Requests:</strong> ${data.medicine_requests}</p>
        </div>
      `;
    })
    .catch(error => {
      console.error("Error generating report:", error);
    });
}


function deleteUser(id) {

    if(confirm("Delete this request?")){

        window.location.href = "../backend/delete_request.php?id=" + id;

    }

}