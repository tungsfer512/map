window.addEventListener('load', function() {
    $.getJSON('/majestic/Dashboard/php/api/post/R_driver.php', {}, (data) => {
        let body = document.querySelector(".table-driver tbody");
        for (let i = 0; i < data.data.length; i++) {
            body.innerHTML += `<tr></tr>`;
            let row = document.getElementById('body-table-driver').lastElementChild;
            row.innerHTML = `<td>${data.data[i]['id']}</td>`;
            row.innerHTML += `<td>${data.data[i]['fullname']}</td>`;
            row.innerHTML += `<td>${data.data[i]['addresses']}</td>`;
            row.innerHTML += `<td>${data.data[i]['phone']}</td>`;
            row.innerHTML += `<td>${data.data[i]['gender']}</td>`;
            row.innerHTML += `<td>${data.data[i]['birth']}</td>`;
            //row.innerHTML += `<td>${data.data[i]['images']}</td>`;
            row.innerHTML += `<td>${data.data[i]['statuses']}</td>`;
            // row.innerHTML += `<td><button type="button" class="btn btn-primary btn-open" data-bs-toggle="modal" data-bs-target="#modalDetail" >
            // More</button></td>`;
            row.innerHTML += `<td><button type="button" class="btn btn-primary btn-open-driver badge badge-danger" data-bs-toggle="modal" data-bs-target="#modalDetaildriver">
            More</button></td>`;
        }
        var myModal = document.getElementById('modalDetaildriver');
        var myButts = document.querySelectorAll('.btn-open-driver');
        myModal.addEventListener('shown.bs.modal', function() {});
        for (var i = 0; i < myButts.length; i++) {
            myButts[i].addEventListener('click', function(e) {
                let ev = e.target.parentElement;
                ev = ev.parentElement.firstElementChild;
                $.getJSON('/majestic/Dashboard/php/api/post/R_single_Driver.php', { id: ev.textContent }, (data) => {
                    $("#content-id-d").text(data['id']);
                    $("#content-fullname").text(data['fullname']);
                    $("#content-addresses").text(data['addresses']);
                    $("#content-phone").text(data['phone']);
                    $("#content-gender").text(data['gender']);
                    $("#content-birth-d").text(data['birth']);
                    $("#content-statuses").text(data['statuses']);
                    document.getElementById("uploads-img-d").innerHTML = "";
                    $("#uploads-img-d").append('<img src="/majestic/Dashboard/php/api/post/uploads/' +
                        data['images'] +
                        '" width="900px;" height="1400px">');
        
                    document.getElementById("image-view-d").innerHTML = "";
                    $("#image-view-d").append('<img src="/majestic/Dashboard/php/api/post/uploads/' +
                        data['images'] +
                        '" width="900px;" height="1400px">');
                        
                    $("#content-d-id").val(data['id']);
                    $("#content-d-fullname").val(data['fullname']);
                    $("#content-d-address").val(data['addresses']);
                    $("#content-d-phone").val(data['phone']);
                    $("#content-d-gender").val(data['gender']);
                    $("#content-d-birth").val(data['birth']);
                    $("#content-d-status").val(data['statuses']);
                });
            });
        }
    });
});
// setTimeout(function() {
// }, 500);
function addD() {
    var form_data = new FormData();
    // form_data.append("files[]", document.getElementById("images-d").files[0]);
    form_data.append('id', $("#content-da-id").val());
    form_data.append('fullname', $("#content-da-fullname").val());
    form_data.append('address', $("#content-da-address").val());
    form_data.append('phone', $("#content-da-phone").val());
    form_data.append('gender', $("#content-da-gender").val());
    form_data.append('birth', $("#content-da-birth").val());
    form_data.append('status', $("#content-da-status").val());
    $.ajax({
        url: "/majestic/Dashboard/php/api/post/Add_D.php",
        type: "post",
        data: form_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response) {
            var form = new FormData();
            form.append("files[]", document.getElementById("images-d").files[0]);
            form.append('id', $("#content-da-id").val());
            $.ajax({
                url: "/majestic/Dashboard/php/api/post/update_img_driver.php",
                type: "post",
                data: form,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }
    });
    // window.location = "/majestic/Dashboard/driver-table.html";
}
function saveD() {
    $.getJSON("/majestic/Dashboard/php/api/post/Save_D.php", {
            id: $("#content-d-id").val(),
            fullname: $("#content-d-fullname").val(),
            address: $("#content-d-address").val(),
            phone: $("#content-d-phone").val(),
            gender: $("#gender").val(),
            birth: $("#content-d-birth").val(),
            status: $("#content-d-status").val()
        },
        function(data) {
            console.log(data);
        });
        
    var form_data = new FormData();
    form_data.append("files[]", document.getElementById("image").files[0]);
    form_data.append('id', $("#content-d-id").val());
    $.ajax({
        url: "/majestic/Dashboard/php/api/post/update_img_driver.php",
        type: "post",
        data: form_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);
        }
    });
    // window.location = "/majestic/Dashboard/driver-table.html";
}

function deleD() {
    $.getJSON("/majestic/Dashboard/php/api/post/Dele_D.php", {
        id: $("#content-d-id").val()
    }, function(data) {
        console.log(data);
    })
}