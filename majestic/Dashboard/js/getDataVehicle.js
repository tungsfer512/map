window.addEventListener('load', function() {
    $.getJSON('/majestic/Dashboard/php/api/post/R_vehicle.php', {}, (data) => {
        let body = document.querySelector(".table-vehicle tbody");
        console.log(data.data[0]);
        for (let i = 0; i < data.data.length; i++) {
            body.innerHTML += `<tr></tr>`;
            let row = document.getElementById('body-table-vehicle').lastElementChild;
            row.innerHTML = `<td>${data.data[i]['id']}</td>`;
            row.innerHTML += `<td>${data.data[i]['code']}</td>`;
            row.innerHTML += `<td>${data.data[i]['license']}</td>`;
            row.innerHTML += `<td>${data.data[i]['typed']}</td>`;
            row.innerHTML += `<td>${data.data[i]['addresses']}</td>`;
            row.innerHTML += `<td>${data.data[i]['lat']}</td>`;
            row.innerHTML += `<td>${data.data[i]['long']}</td>`;
            row.innerHTML += `<td><button type="button" class="btn btn-primary btn-open-ve badge badge-danger" data-bs-toggle="modal" data-bs-target="#modalDetailve">
            More</button></td>`;
            
            // row.innerHTML += `<td><button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#modalDetail">Pending</button></td>`;
        }
        var myModal = document.getElementById('modalDetailve');
        var myButts = document.querySelectorAll('.btn-open-ve');
        myModal.addEventListener('shown.bs.modal', function() {});
        for (var i = 0; i < myButts.length; i++) {
            myButts[i].addEventListener('click', function(e) {
                let ev = e.target.parentElement;
                ev = ev.parentElement.firstElementChild;
                $.getJSON('/majestic/Dashboard/php/api/post/R_single_V.php', { id: ev.textContent }, (data) => {
                    $("#content-id-v").text(data['id']);
                    $("#content-code").text(data['code']);
                    $("#content-type").text(data['typed']);
                    $("#content-license").text(data['license']);
                    $("#content-imei").text(data['imei']);
                    $("#content-timestamps").text(data['timestamps']);
                    $("#content-lat").text(data['lat']);
                    $("#content-long").text(data['long']);
                    $("#content-weight").text(data['weights']);
                    $("#content-address").text(data['addresses']);
                    $("#content-status").text(data['statuses']);
                    document.getElementById("uploads-img").innerHTML = "";
                    $("#uploads-img").append('<img src="/majestic/Dashboard/php/api/post/uploads/' +
                        data['images'] +
                        '" width="900px;" height="1400px">');
    
                    document.getElementById("image-view").innerHTML = "";
                    $("#image-view").append('<img src="/majestic/Dashboard/php/api/post/uploads/' +
                        data['images'] +
                        '" width="900px;" height="1400px">');
                    $("#content-v-id").val(data['id']);
                    $("#content-v-code").val(data['code']);
                    $("#content-v-type").val(data['typed']);
                    $("#content-v-license").val(data['license']);
                    $("#content-v-imei").val(data['imei']);
                    $("#content-v-timestamps").val(data['timestamps']);
                    $("#content-v-lat").val(data['lat']);
                    $("#content-v-long").val(data['long']);
                    $("#content-v-weight").val(data['weights']);
                    $("#content-v-address").val(data['addresses']);
                    $("#content-v-status").val(data['statuses']);
                });
            });
        }
    });
});

function saveV() {
    $.getJSON("/majestic/Dashboard/php/api/post/Save_V.php", {
            id: $("#content-v-id").val(),
            code: $("#content-v-code").val(),
            typed: $("#content-v-type").val(),
            license: $("#content-v-license").val(),
            imei: $("#content-v-imei").val(),
            timestamps: $("#content-v-timestamps").val(),
            lat: $("#content-v-lat").val(),
            long: $("#content-v-long").val(),
            weights: $("#content-v-weight").val(),
            addresses: $("#content-v-address").val(),
            status:$("#content-v-status").val()
        },
        function(data) {
            console.log(data);
        });
        
    var form_data = new FormData();
    form_data.append("files[]", document.getElementById("image-ve").files[0]);
    form_data.append('id', $("#content-v-id").val());
    $.ajax({
        url: "/majestic/Dashboard/php/api/post/update_img.php",
        type: "post",
        data: form_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response) {
           console.log(response);
        }
    });
    // window.location = "/majestic/Dashboard/vehicle-table.html";
}

function addV() {
    var form_data = new FormData();
    form_data.append("files[]", document.getElementById("images").files[0]);
    form_data.append('id', $("#content-va-id").val());
    form_data.append('code', $("#content-va-code").val());
    form_data.append('typed', $("#content-va-type").val());
    form_data.append('license', $("#content-va-license").val());
    form_data.append('imei', $("#content-va-imei").val());
    form_data.append('timestamps', $("#content-va-timestamps").val());
    form_data.append('lat', $("#content-va-lat").val());
    form_data.append('long', $("#content-va-long").val());
    form_data.append('weights', $("#content-va-weights").val());
    form_data.append('addresses', $("#content-va-address").val());
    form_data.append('status', $("#content-va-status").val());
    $.ajax({
        url: "/majestic/Dashboard/php/api/post/Add_V.php",
        type: "post",
        data: form_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response) {
            // console.log(response);
            var form = new FormData();
            form.append("files[]", document.getElementById("images").files[0]);
            form.append('id', $("#content-va-id").val());
            $.ajax({
                url: "/majestic/Dashboard/php/api/post/update_img.php",
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
    // window.location = "/majestic/Dashboard/vehicle-table.html";
}

function deleV(){
    $.getJSON("/majestic/Dashboard/php/api/post/Dele_V.php", {
        id: $("#content-v-id").val()
    }, function(data) {
        console.log(data);
    })
}