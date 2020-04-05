<?php include_once('header.php'); ?>
<!-- <?php include_once('notfiy.php'); ?> -->





<div class="preloader">
    <div class="circle "></div>
</div>
<div id="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-9 col-md-offset-1 mt-2">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ul>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3  bg-dark">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <p> Add something:</p>
                            <div class="btn-group-vertical">
                                <a href="#" class="btn btn-primary btn-lg " data-toggle="modal"
                                    data-target="#newfile">NEW
                                    File</a> <br>
                                <a href="#" class="btn btn-primary btn-lg " data-toggle="modal"
                                    data-target="#newfolder">NEW
                                    Folder</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Panel success</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group" id="side-panel">

                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-md-9 bg-dark">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Panel success
                            </h3>
                        </div>
                        <div class="panel-body" id="main-panel">

                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>

    <!-- Modal -->
    <div id="newfile" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New File</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-9">
                        <form action="" method="post" enctype="multipart/form-data" id="upload">

                            <label for="inputFile" class="col-lg-2 control-label">Upload A File </label>
                            <div class="col-lg-10">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- New Folder Model start -->
    <div id="newfolder" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Folder</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="new-folder">

                        <div class="form-group">
                            <label for="inputFolder" class="col-lg-2 control-label">Folder name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputFolder" name="inputFolder"
                                    placeholder="Folder">
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- New Folder Model end -->

    <!-- Delete Model Start -->
    <div id="DeleteModel" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete </h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Folder name</label>

                            <h4 class="filename">hiiii</h4>
                        </div>
                        <br>
                        <br>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" id="delete-model">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- delete model end -->

    <!-- Edit model start -->
    <div id="EditModel" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Rename </h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="edit-model">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Folder name</label>
                            <h4 class="filename">hiiii</h4>
                        </div>

                        <div class="form-group">
                            <label for="extra" class="col-lg-2 control-label">Rename </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="extra" name="extra" placeholder="New Name">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                            <br>
                        <br>
                                <button class="btn btn-danger">Cancel</button>
                                <button class="btn btn-default">Ok</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Edit Model End -->

    <!-- Download model -->
    <div id="DownloadModel" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Download </h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Folder name</label>
                        <h4 class="filename">hiiii</h4>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-danger">Cancel</button>
                            <button class="btn btn-default" id="download-model">Ok</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>


</body>

<script>
$(document).ready(function() {
    ui.verify()
    //1800
    $(".preloader").fadeOut(1800, function() {
        if (open === 0) {
            $("#content").show();
        } else {
            window.location = "home.php";
        }

    });

    ui.showSidePanel();
    ui.showMainPanel();

    $("#logout").show();

    $(document).on('click', '#logout', function() {
        // alert(user + password + op)
        ui.logout()
    });

    //changed path
    $(document).on('click', '#side-changed', function() {
        var name = $(this).find(".foldername").text();
        ui.changedPath(name, "side");
    });

    $(document).on('click', '#changed', function() {
        var name = $(this).find(".foldername").text();
        ui.changedPath(name);
    });

    // call model for files and folders
    $(document).on('click', '.delete', function() {
        var name = $(this).parent(".panel-footer").prev().find(".foldername").text();
        sessionStorage.setItem("filename", name);
        $(".filename").text(name);

    });

    $(document).on('click', '.rename', function() {
        var name = $(this).parent(".panel-footer").prev().find(".foldername").text();
        sessionStorage.setItem("filename", name);
        $(".filename").text(name);
    });

    $(document).on('click', '.download', function() {
        var name = $(this).parent(".panel-footer").prev().find(".foldername").text();
        sessionStorage.setItem("filename", name);
        $(".filename").text(name);
    });

    $.validator.addMethod("folderregex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "***Folder name must contain only letters and numbers.");

    $.validator.addMethod("myFile", function(value, element) {
        
        return this.optional(element) || /([a-zA-Z0-9\s_\\.\-\(\):])+\.(png|txt|gif|pdf|doc|docx|jpg|jpeg|ppt)$/i.test(value);
    }, "**File type not allowed");


    // if(sessionStorage.getItem("filename").includes('.')){

    //         $( "#extra" ).rules( "add", {
    //             required: true,
    //             myFile: true,
    //             folderregex: false
    //         });

    //         // $( "#extra" ).rules( "remove", 'folderregex');

    // }else{
    //     $( "#extra" ).rules( "add", {
    //         required: true,
    //             folderregex: true,
    //             myFile: false
    //         });

    //         // $( "#extra" ).rules( "remove", 'myFile');

    // }

    $("#edit-model").validate({

        rules: {
            extra: {
                required: true,
                folderregex: {
                    depends: function() {
                        return !(sessionStorage.getItem("filename").includes('.'));
                    }
                },
                myFile: {
                    depends: function(element) {
                        return sessionStorage.getItem("filename").includes('.');
                    }
                },
            },
        },

        errorClass: "myError",
        messages: {
            extra: {
                required: "**Please provide a  name",


            },
        },
        submitHandler: function(form) {
            // e.preventDefault()
            ui.renameMe()
        }
    });

    // $("#edit-model").click(ui.renameMe);

    $("#download-model").click(ui.download);
    // $("#delete-model").click(ui.delete());
    $("#delete-model").click(function(e) {
        ui.delete()
    });



    $("#new-folder").validate({
        rules: {
            inputFolder: {
                required: true,
                folderregex: true
            },
        },
        errorClass: "myError",
        messages: {
            required: "**Please provide a Folder name"
        },
        submitHandler: function(form) {
            // e.preventDefault()
            ui.createDictory()
        }
    });


    // $("#new-folder").submit(function(e){
    //     e.preventDefault()
    //     ui.createDictory()
    // });

    $("#upload").submit(function(e) {
        e.preventDefault()
        var f = new FormData(this);
        f.append('user', sessionStorage.getItem("username"));
        f.append("token", sessionStorage.getItem("token"));
        f.append("op", "upload");
        f.append("path", sessionStorage.getItem("path"));


        $.ajax({
            type: 'POST',
            url: "http://localhost:8103/",
            data: f,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,

            success: function(d) { //console.log(response);

                // alert(d.msg);

                $("#newfile").modal("hide");
                if (d.status === 0) {
                    ui.fine()

                } else {
                    alert(d.msg);
                }

            }
        });
        //    console.log(f)
        // ui.uploadMe(f)
    });










});
</script>


</html>