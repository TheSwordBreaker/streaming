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
                        <form id="login-form">
                            <input type="hidden" name="op" value="login" id="op">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail" name="inputEmail"  placeholder="Username" name="username" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" autocomplete="off">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="showpassword" id="showpassword" > Show Password
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
    $(document).ready(function() {

        $('input').on('focus focusout keyup', function () {
            $(this).valid();
        });

       

        $("#login-form").validate({
            rules: {
                inputEmail: {
                    required: true,
                    minlength: 5
                },
                inputPassword: {
                    required: true,
                    minlength: 5
                }
            },
            errorClass: "myError",
            messages: {
                inputEmail: {
                    required: "**Please provide a Username",
                    minlength: "**Your Username must be at least 5 characters long"
                },
                inputPassword: {
                    required: "**Please provide a password",
                    minlength: "**Your password must be at least 5 characters long"
                },
            },
            submitHandler: function(form) {ui.login()}
        });
    });

</script>

<?php include('footer.php') ?>