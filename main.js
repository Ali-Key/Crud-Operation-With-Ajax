loadData();

$("#Addclass").click(function () {
  $("#StudentModal").modal("show");
});

$("#studentForm").submit(function (event) {
  event.preventDefault();

  // Get the form data
  let form_data = new FormData($("#studentForm")[0]); // Use [0] to get the actual DOM element

  // Add the action to the form value
  form_data.append("action", "registerStudent");

  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "api.php",
    data: form_data,
    processData: false,
    contentType: false, // Corrected the typo here

    success: function (data) {
      // let status = data.status;
      let Status = data.status;
      let response = data.data;

      console.log(data);

      alert(response);
    },

    error: function (data) {
      console.log(data);
    },
  });
});

function loadData() {
  let sendingData = {
    action: "readAll",
  };

  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "api.php",
    data: sendingData,
    success: function (data) {
      let status = data.status;
      let response = data.data;

      let html = "";
      let tr = "";

      if (status) {
        response.forEach((element) => {
          // console.log(element);

          tr += "<tr>";
          for (let i in element) {
            tr += `<td>${element[i]}</td>`;
          }
          tr += `<td>
          <a class = "btn bg-primary p-2  " update_info=${element["id"]}>Update</a>
         
          <a class = "btn bg-danger p-2  text-white  " delete_info=${element["id"]}>Delete</a>
          </td> `;
          tr += "</tr>";
        });

        $("#studentTable ").append(tr);
      }
    },
    error: function (data) {},
  });
}
