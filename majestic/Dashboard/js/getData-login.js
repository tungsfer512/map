function login() {
    $.getJSON("/majestic/Dashboard/php/api/post/R_Acc.php", {
        username: $("#username").val(),
        password: $("#password").val()

    }, function (data) {
        console.log(data);
        if (data['id'] == null) {
            alert("sai mat khau");
            return false;
        }
        else {
            $.ajax({
                url: "/majestic/Dashboard/php/api/post/admin.php",
                method: "POST",
                data: {
                    id: data['id'],
                    username: $("#username").val(),
                    password: $("#password").val(),
                    fullname:data['fullname']
                }, success: function (response) {

                }
            });
            window.location = "/majestic/Dashboard/map.php";
        }
        
    });
}