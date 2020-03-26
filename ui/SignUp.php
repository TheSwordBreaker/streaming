<?php include('header.php'); ?>


    <div class="jumbotron vertical-center ">
        <!-- 
        ^--- Added class  -->
        <div class="container ">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Panel primary</h3>
                        </div>
                        <div class="panel-body">
                            <form  method="post" id="signup-form">
                        <div class="form-group">
                           
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
      </div>
    </div>
                            <div class="form-group">
                                <label for="inputUser" class="col-lg-2 control-label">Username</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="Username"  autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" autocomplete="off">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Password" autocomplete="off">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="showpassword" id="showpassword"> Show Password
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>

    <script>
$(document).ready(function () {

    $("#signup-form").validate({
            rules: {
                
                inputEmail: {
                    required: true,
                    email: true
                },
                inputUser: {
                    required: true,
                    minlength: 5,
                    maxlength: 15
                },
                inputPassword: {
                    required: true,
                    minlength: 5
                },
                inputPassword2: {
                    required: true,
                    minlength: 5,
                    equalTo : "#inputPassword"
                },
            },
            errorClass: "myError",
            messages: {
                inputEmail: "Please enter a valid email address",
                inputUser: {
                    required: "**Please provide a Username",
                    minlength: "**Your Username must be at least 5 characters long",
                    maxlength: "**Your Username must be at most 15 characters long"
                },
                inputPassword: {
                    required: "**Please provide a password",
                    minlength: "**Your password must be at least 5 characters long"
                },
                inputPassword2: {
                    required: "**Please provide a password",
                    minlength: "**Your password must be at least 5 characters long",
                    equalTo : "**Your password must be same."
                },
            },
            submitHandler: function(form) {ui.signup()}
        });


//     $("#signup-form").submit(function (e) { 
        
//        e.preventDefault();
//        var user = $("#inputUser").val(); 
//        var email = $("#inputEmail").val(); 
//        var password = $("#inputPassword").val(); 
       
       
//        $.ajax({
//         url: "http://localhost:8101/",
//         method: "POST",
//         data: {
//             "user": user,
//             "op": "signup",
//             "password":password,
//             "email":email,
//             "extra": ""
//         },
//         success: function(d) {
//             alert(d.msg);
//             if (d.status === 0) {
//                 window.location = "Login.php";
//                 } 
//         },
//         error: function(d) {
//             alert("something went wrong");
//         }
//     });
       
//    }); 
     
});

  

</script>
<?php include('footer.php'); ?>