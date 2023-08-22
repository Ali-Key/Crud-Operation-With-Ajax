$("#Addclass").click(function(){
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

        alert(response)
    },

    error: function (data) {
        console.log(data);
    }
  });
});
