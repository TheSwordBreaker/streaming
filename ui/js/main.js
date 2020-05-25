class BaseUi {
    // token
    // username

    // id
    // path
    // operation
    
    // url = document.location.protocol + "//" + document.location.hostname 

    // UI - Methods
    showMainPanel() {}
    showSidePanel() {}
    showBreadCrumb() {}

    //File -Methods
    deleteMe() {}
    uploadMe() {}

    renameMe() {}

    createDictory() {}
    deleteDictory() {}

    changedPath() {}

    //Auth - Methods
    login() {}
    logout() {}
    signup() {}
    verify() {}

    removeUser() {}
    editUser() {}
    deleteUser() {}

    showUser() {}
    showLoginUser() {}

}

var auth = document.location.protocol + "//" + document.location.hostname + ":8101/"
var files = document.location.protocol + "//" + document.location.hostname + ":8103/"

class ui extends BaseUi {



    constructor() {



        $(document).ready(function() {
            $.ajax({
                url: auth,
                method: "POST",
                data: {

                    "op": "verify",
                    "token": sessionStorage.getItem("token")
                },
                success: function(d) {
                    if (d.status == 0) {
                        open = 0;
                    } else {

                    }
                },
                error: function(d) {

                }
            });
            $(".preloader").fadeOut(1800, function() {
                if (open === 0) {
                    $("#content").show();
                } else {
                    window.location = "home.php";
                }

            });

            showSidePanel();
            showMainPanel();
            $("#logout").show();
            $(document).on('click', '#logout', function() {
                // alert(user + password + op)
                logout()
            });

            $(".delete").click(function() {
                // var name =  $("this").find(".panel-body").text();
                // alert(name);
            });



            $(document).on('click', '#side-changed', function() {
                var name = $(this).find(".foldername").text();

                // alert(name);
                changedPath(name, "side");
            });

            $(document).on('click', '.delete', function() {
                var name = $(this).parents("#changed").find(".foldername").text();
                // $(this).parents("#changed").css("background-color", 'red');
                alert(name);

            });

            $(document).on('click', '.rename', function() {
                var name = $(this).find(".foldername").text();
                $(this).css("background-color", 'red');
                // alert(name);

            });

            $(document).on('click', '.download', function() {
                var name = $(this).find(".foldername").text();
                $(this).css("background-color", 'red');
                // alert(name);

            });

            $(document).on('click', '#changed', function() {
                var name = $(this).find(".foldername").text();
                changedPath(name);
            });






        });
    }


    static showSidePanel() {
        $.ajax({
            url: files,
            method: "POST",
            data: {
                "user": sessionStorage.getItem("username"),
                "op": "view",
                "path": "/",
                "extra": "",
                "token": sessionStorage.getItem("token")

            },
            success: function(d) {
                var i = 0;
                var data = "";
                $("#side-panel").empty()
                for (i = 1; i < d.length; i++) {
                    if (i == 1) {
                        $("#side-panel").append('<li class="list-group-item" id="side-changed"><span class="badge">' + i +
                            '</span><span class="foldername">' +
                            d[i] + '</span></li>')

                    } else if (!d[i].includes('.')) {
                        $("#side-panel").append(
                            '<li class="list-group-item" id="side-changed"><span class="badge">' + i +
                            '</span><span class="foldername">' +
                            d[i] + '</span></li>')

                    } else {
                        $("#side-panel").append('<li class="list-group-item" ><span class="badge">' + i +
                            '</span><span class="foldername">' + d[i] + '</span></li>')
                    }


                }
            },
            error: function(d) {
                // alert(d);
            }
        });

    }

    static showMainPanel() {


        $.ajax({
            url: files,
            method: "POST",
            data: {
                "user": sessionStorage.getItem("username"),
                "op": "view",
                "path": sessionStorage.getItem("path"),
                "extra": "",
                "token": sessionStorage.getItem("token")
            },
            success: function(d) {

                var i = 0;
                var data = "";
                d[1] = "<-"

                $("#main-panel").empty();
                for (i = 1; i < d.length; i++) {

                    if (i == 1) {
                        data =
                            ' <div class=" col-sm-6 col-md-3 p-3 bg-dark" ><div class="panel panel-default "><div class="panel-body" id="changed" ><p> ';
                        data += ' <span class="material-icons">folder</span><span class="foldername">'
                        data += d[i] + '<span></p></div>';
                        data += ' <div class="panel-footer"> ';
                        data +=
                            '<span class="badge"><span class="material-icons">arrow_back</span></span>';

                        data += '</div></div> ';
                    } else if (!d[i].includes('.')) {
                        data =
                            ' <div class=" col-sm-6 col-md-3 p-3 bg-dark" ><div class="panel panel-default "><div class="panel-body" id="changed" ><p> ';
                        data += ' <span class="material-icons">folder</span><span class="foldername">'
                        data += d[i] + '<span></p></div>';
                        data += ' <div class="panel-footer"> ';
                        data +=
                            '<span class="badge delete" role="button" data-toggle="modal" data-target="#DeleteModel"><i class="material-icons">delete</i></span>' +
                            '<span class="badge rename" role="button" data-toggle="modal" data-target="#EditModel" > <i class="material-icons">edit</i></span>';
                        data += '</div></div> ';
                    } else {
                        data =
                            ' <div class=" col-sm-6 col-md-3 p-3 bg-dark" ><div class="panel panel-default "><div class="panel-body " ><p> ';
                        data += '<span class="material-icons">description</span><span class="foldername">';
                        data += d[i] + '<span></p></div>';
                        data += ' <div class="panel-footer"> ';
                        data +=
                            '<span class="badge delete" role="button" data-toggle="modal" data-target="#DeleteModel"><i class="material-icons">delete</i></span>' +
                            '<span class="badge rename" role="button" data-toggle="modal" data-target="#EditModel" > <i class="material-icons">edit</i></span>' +
                            '<span class="badge download" role="button" data-toggle="modal" data-target="#DownloadModel"  > <i class="material-icons">get_app</i></span>';
                        data += '</div></div> ';

                    }



                    $("#main-panel").append(data);
                }
            },
            error: function(d) {
                // alert(d);
            }
        });


    }



    static download() {


        $.ajax({

            url: files,
            method: "POST",
            data: {
                "user": sessionStorage.getItem("username"),
                "token": sessionStorage.getItem("token"),
                "extra": sessionStorage.getItem("filename"),
                "path": sessionStorage.getItem("path"),
                "op": "download",

            },
            success: function(d) {
                $("#DownloadModel").modal("hide");
                if (d.status === 0) {
                    var a = document.createElement('a');
                    a.setAttribute('href', 'data:text/plain;charset=utf-8, ' +
                        encodeURIComponent(d.uri));
                    a.setAttribute('download', sessionStorage.getItem("filename"));
                    document.body.append(a);
                    a.click();
                    a.remove();

                } else {
                    alert(d.msg);
                }

            },
            error: function(d) {
                alert("something");
            }
        });

    }

    static uploadMe(f) {
        f.append('username', sessionStorage.getItem("username"));
        f.append("token", sessionStorage.getItem("token"));
        f.append("op", "upload");
        f.append("path", sessionStorage.getItem("path"));

        $.ajax({
            type: 'POST',
            url: files,
            data: f,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,

            success: function(d) { //console.log(response);

                alert("zala bho send");
                ui.showMainPanel()
            }
        });
    }

    static delete() {
        var file = sessionStorage.getItem("filename");
        if (file.includes('.')) {
            ui.deleteMe()
        } else {
            ui.deleteDictory()
        }

    }

    static deleteMe() {
        // alert(sessionStorage.getItem("path") + sessionStorage.getItem("filename"))
        $.ajax({
            url: files,
            method: "POST",
            data: {
                "user": sessionStorage.getItem("username"),
                "token": sessionStorage.getItem("token"),
                "path": sessionStorage.getItem("path") + sessionStorage.getItem("filename"),
                "op": "del",
                "extra": ""
            },
            success: function(d) {
                $("#DeleteModel").modal("hide");
                if (d.status === 0) {
                    ui.fine()

                } else {
                    alert(d.msg);
                }

            },
            error: function(d) {
                // alert(d);
            }
        });
    }

    static renameMe() {
        var name = $("#extra").val();
        $("#inputFolder").val("")
        var oldname = sessionStorage.getItem("path") + sessionStorage.getItem("filename");
        var newname = sessionStorage.getItem("path") + name;
        $.ajax({
            url: files,
            method: "POST",
            data: {
                "user": sessionStorage.getItem("username"),
                "token": sessionStorage.getItem("token"),
                "op": "rename",
                "path": oldname,
                "extra": newname
            },
            success: function(d) {
                $("#EditModel").modal("hide");
                if (d.status === 0) {
                    ui.fine()
                } else {
                    alert(d.msg);
                }

            },
            error: function(d) {
                alert(d);
            }
        });
    }

    static fine() {
        ui.showMainPanel()
        ui.showSidePanel()
            // $("#content").hide();
            // $(".preloader").fadeOut(2000, function() {
            //     $("#content").show();
            //     ui.showMainPanel()
            //     ui.showSidePanel()
            //     sessionStorage.setItem("filename", "");
            // });
    }

    static createDictory() {

        var folder = $("#inputFolder").val();
        $("#inputFolder").val("")
        var path = sessionStorage.getItem("path") + folder;
        $.ajax({
            url: files,
            method: "POST",
            data: {
                "user": sessionStorage.getItem("username"),
                "op": "dc",
                "path": path,
                "extra": "",
                "token": sessionStorage.getItem("token")
            },

            success: function(d) {
                $("#newfolder").modal("hide");
                if (d.status === 0) {
                    ui.fine()
                } else {
                    alert(d.msg);
                }
            },
            error: function() {
                alert("some internal error occue due to internet connections");
            }
        });
    }

    static deleteDictory() {

        $.ajax({
            url: files,
            method: "POST",
            data: {
                "user": sessionStorage.getItem("username"),
                "token": sessionStorage.getItem("token"),
                "path": sessionStorage.getItem("path") + sessionStorage.getItem("filename"),

                "op": "dr",
                "extra": ""
            },
            success: function(d) {
                $("#DeleteModel").modal("hide");
                if (d.status === 0) {
                    // alert("folder  2")
                    ui.fine()
                } else {
                    alert(d.msg);
                }

            },
            error: function(d) {
                alert("some probles");
            }
        });
    }

    static changedPath(foldername, where = "not") {
        var path = sessionStorage.getItem("path");
        console.log(foldername);
        if (where == "side") {
            if (foldername == "..")
                path = "/";
            else
                path = "/" + foldername + "/";
        } else {
            if (foldername == "<-") {
                if ("/" != path) {
                    path = path.substring(0, path.lastIndexOf('/'));
                    path = path.substring(0, path.lastIndexOf('/') + 1);
                } else {
                    path = "/";
                }

            } else {
                path += foldername + "/";
            }
        }
        sessionStorage.setItem("path", path);
        var path = sessionStorage.getItem("path");
        console.log(path);
        this.showMainPanel();

    }

    static login() {
        var user = $("#inputEmail").val();
        var password = $("#inputPassword").val();
        var op = $("#op").val();
        // alert(user + password + op)
        $.ajax({
            url: auth,
            method: "POST",
            data: {
                "user": user,
                "op": op,
                "password": password,
                "email": "",
                "extra": ""
            },
            success: function(d) {
                if (d.status == 0) {
                    sessionStorage.setItem("username", user);
                    sessionStorage.setItem("path", "/");
                    sessionStorage.setItem("token", d.token);
                    sessionStorage.setItem("id", d.id);
                    window.location = "control.php";
                } else {
                    alert(d.msg)
                }
            },
            error: function(d) {
                alert("there was a connection problem")
            }
        });

    }

    static logout() {
        $.ajax({
            url: auth,
            method: "POST",
            data: {

                "op": "logout",
                "id": sessionStorage.getItem("id")

            },
            success: function(d) {
                if (d.status == 0) {

                    sessionStorage.removeItem("id");
                    sessionStorage.removeItem("username");
                    sessionStorage.removeItem("path");
                    sessionStorage.removeItem("token");

                }
            },
            error: function(d) {

            }
        });
    }

    static signup() {

        var user = $("#inputUser").val();
        var email = $("#inputEmail").val();
        var password = $("#inputPassword").val();


        $.ajax({
            url: auth,
            method: "POST",
            data: {
                "user": user,
                "op": "signup",
                "password": password,
                "email": email,
                "extra": ""
            },
            success: function(d) {
                alert(d.msg);
                if (d.status === 0) {
                    window.location = "Login.php";
                }
            },
            error: function(d) {
                alert("something went wrong");
            }
        });

    }

    static verify() {
        $.ajax({
            url: auth,
            method: "POST",
            data: {

                "op": "verify",
                "token": sessionStorage.getItem("token")
            },
            success: function(d) {
                if (d.status == 0) {
                    open = 0;
                } else {
                    alert(d.msg)
                }
            },
            error: function(d) {

            }
        });
    }
}