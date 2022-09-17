<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Validation library file -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> -->
<!-- Sweetalert library file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<style>
    
        #frm-add-user label.error{
            color:red;
        }
        .msg{
            color:green;
        }
</style>
</head>
<body>
    <div class="container">
<nav class="navbar navbar-light bg-primary mb-5 mt-1" >
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-light">Employee Dashboard</span>
        </div>
    </nav>
        <h4 class="mb-5">Update Employee Here..........</h4>

     
    <h3 class="msg"></h3>
    <form action="javascript:void(0)" id="frm-add-user">
    <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Designation</label>
    <input type="text" class="form-control" name="designation" id="designation" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
    $(document).ready(function(){

        // Adding form validation
        // $('#frm-add-user').validate();

        // Ajax form submission with image
        $('#frm-add-user').on('submit', function(e) {

            e.preventDefault();

            var formData = new FormData(this);
            // OR var formData = $(this).serialize();
            //We can add more values to form data
            //formData.append("key", "value");

            $.ajax({
                url: "<?= base_url('api/employee/add') ?>",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    // $(".msg").text(data.message).css("color", "green");
                    if (data.error == false) {
                        $(".msg").text(data.message).css("color", "green");
                    }
                    else{
                        $(".msg").text(data.message['email']).css("color", "red");
                    }
                },
                // error: function(jqXHR, textStatus, errorThrown) {
                //     // console.log(data.error);
                //     $(".msg").text(data.error).css("color", "red");
                //     // alert('Error at add data');
                // }
            });
        });
    });
</script>

</div>
</body>
</html>