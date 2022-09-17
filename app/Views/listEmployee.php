<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Validation library file -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> -->
		<!-- Sweetalert library file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

<div class="container mt-5"> 
<a href="<?= base_url('/addemployee')?>" class="btn btn-primary mb-1"> Add Employee</a>
<a href="<?= base_url('/logout')?>" class="btn btn-danger mb-1 float-end" >Logout</a>
   
<div class="alert alert-primary msg" role="alert" style="display:none">
 
</div>
     
    <table align="center" cellspacing="0px" cellpadding="10px" class='table table-borderd'>
    <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Designation</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody class="employeeData">
    
  </tbody>
    </table>
    <div id="result"></div>

        <script>
				$(document).ready(function(){
            reloadTable()   
        });

        function reloadTable() {
				$.ajax({
					url: "<?php echo base_url('api/employee/list'); ?>",
					success: function (response) {
                    // console.log(response.data);
                    $.each(response.data, function(key, value){
                        // console.log(value['id']);
                        $(".employeeData").append(`<tr>
                        <td class="empId">${value['id']}</td>
                        <td>${value['name']}</td>
                        <td>${value['email']}</td>
                        <td>${value['designation']}</td>
                        <td> <a href="#" class="btn btn-primary edit-btn" onclick="updateUser(${value['id']})">Edit</a></td>
                        <td> <a href="#" class="btn btn-danger delete-btn" onclick="deleteUserList(${value['id']})">Delete</a></td>
                        </tr>`)
                    })
				//    $('#results').html(response.data['id']);
				}
			})
			}

		function deleteUserList(id)
		{
			alert("<?= base_url('api/employee/delete')?>/"+id);
			           $.ajax({
									type: "DELETE",
									url: "<?= base_url('api/employee/delete')?>/"+id,
									success: function (response) {
										if(response){
											$(".msg").show();
                    	$(".msg").text("data deleted successfull");
											$(".msg").fadeOut(5000);
											// reloadTable();  
										}	
									}
                });
		}	


		function updateUser(id)
		{
			// alert("<?= base_url('api/employee/update')?>/"+id);
			           $.ajax({
									type: "PUT",
									url: "<?= base_url('api/employee/UpdateForm')?>/"+id,
									success: function (response) {
								// 		// if(response){
								// 		// 	$(".msg").show();
                //     // 	$(".msg").text("data deleted successfull");
								// 		// 	$(".msg").fadeOut(5000);
								// 		// 	// reloadTable();  
								// 		// }	
									}
                });
		}	
		</script>
       
    </div>
</body>
</html>