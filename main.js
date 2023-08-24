LoadData();
function resetForm(){
  $("#studentForm")[0].reset();
}
function hideModal(){
  $("#StudentModal").modal('hide');
}
function showModal(){
  $("#StudentModal").modal('show');
}

function clearData(){
  $("#studentTable tr").html('');
}
$("#Addclass").on('click', ()=>{
  showModal();
})

let btnAction = 'insert';

$("#studentForm").on('submit', (e)=>{
  e.preventDefault();

  let form_data = new FormData($("#studentForm")[0]);

  let sendingData = {}

  if(btnAction === 'insert'){
    form_data.append("action","register_student_api")
  }else{
    form_data.append("action","update_student_api")
  }

  $.ajax({
    method:"POST",
    dataType:"json",
    url:"api.php",
    processData:false,
    contentType:false,
    data:form_data,
    success : function(data){
      let status = data.status;
      let response = data.data;

      if(status){
        displayMessage('success',response);
        LoadData();
        btnAction = 'insert'
      }else{
        displayMessage('success',response);
      }

    },
    error: function (data){
      displayMessage('error',data.responseText);
    }
  })
})

function displayMessage(type , message){

  let success = document.querySelector('.alert-success');
  let error = document.querySelector('.alert-danger');

  if(type === 'success'){
    error.classList = 'alert alert-danger d-none';
    success.classList = 'alert alert-success';
    success.innerHTML = message;
    setTimeout(()=>{
      resetForm();
      success.classList= ' alert alert-success d-none';
      hideModal();
    },3000)
  }else{

    error.classList = 'alert alert-danger';
    error.innerHTML = message;
  }
}

function LoadData(){
  clearData();
  let sendingData = {
    "action":"readAll"
  }

  $.ajax({
    method:"POST",
    dataType:"json",
    url:"api.php",
    data:sendingData,
    success : function(data){
      let status = data.status;
      let response = data.data;

      let tr = '';
      let th = '';

      if(status){

        response.forEach((info)=>{
         tr += '<tr>';
         th = '<tr>';

         for (let i in info) {

          th += `<th>${i}</th>`;
         }
         th += '<th>Action</th>';
         th += '</tr>';
 
         for (let i in info) {

          tr += `<td>${info[i]}</td>`;
         }
         tr += `
         <td>
         <a href="#" class="btn btn-info bg-info p-2 update_info" update_id="${info['Id']}">Update</a>
         <a href="#" class="btn btn-danger bg-danger p-2 delete_info" delete_id="${info['Id']}">Delete</a>
         </td>`;
         tr += '</tr>';
        })
        $("#studentTable thead").append(th);
        $("#studentTable").append(tr);

      }else{
        console.log(response);
      }

    },
    error: function (data){
      console.log();('error',data.responseText);
    }
  })
}

function fectch_single_student_info (id){
  let sendingData = {
    "action":"fectch_single_student_info",
    "id":id
  }

  $.ajax({
    method:"POST",
    dataType:"json",
    url:"api.php",
    data:sendingData,
    success : function(data){
      let status = data.status;
      let response = data.data;

      if(status){
        $("#id").val(response[0].Id)
        $("#name").val(response[0].Name)
        $("#class").val(response[0].Class)
        btnAction = 'update'
        LoadData();
      }else{
        alert(response)
      }

    },
    error: function (data){
      console.log();('error',data.responseText);
    }
  })

}

$("#studentTable ").on('click', 'a.update_info', function(){

  let id = $(this).attr('update_id');
  showModal();
  fectch_single_student_info(id);

})

function delete_student_info(id){
  let sendingData = {
    "action":"delete_student_info",
    "id":id
  }

  $.ajax({
    method:"POST",
    dataType:"json",
    url:"api.php",
    data:sendingData,
    success : function(data){
      let status = data.status;
      let response = data.data;

      if(status){
        alert(response)
      }else{
        alert(response)
      }

    },
    error: function (data){
      console.log();('error',data.responseText);
    }
  })

}
$("#studentTable ").on('click', 'a.delete_info', function(){

  let id = $(this).attr('delete_id');
  if(confirm("Are you sure you want to delete this record?")){

    delete_student_info(id);
  }

})