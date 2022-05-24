window.addEventListener('load', function() {
    $.getJSON('/majestic/Dashboard/php/api/post/R_bin.php', {}, (data) => {
        // console.log(data.data);
        let body = document.querySelector(".table-bin tbody");
        for (let i = 0; i < data.data.length; i++) {
            body.innerHTML += `<tr></tr>`;
            let row = document.getElementById('body-table-bin').lastElementChild;
            row.innerHTML = `<td>${data.data[i]['id']}</td>`;
            row.innerHTML += `<td>${data.data[i]['createddate']}</td>`;
            row.innerHTML += `<td>${data.data[i]['owners']}</td>`;
            row.innerHTML += `<td>${data.data[i]['lat']}</td>`;
            row.innerHTML += `<td>${data.data[i]['long']}</td>`;
            row.innerHTML += `<td>${data.data[i]['addresses']}</td>`;
            // row.innerHTML += `<td><button type="button" class="btn btn-primary btn-open" data-bs-toggle="modal" data-bs-target="#modalDetail">
            // More</button></td>`;
            row.innerHTML += `<td><button type="button" class="btn btn-primary btn-open-bin badge badge-danger" data-bs-toggle="modal" data-bs-target="#modalDetailbin">
            More</button></td>`;
        }
        var myModal = document.getElementById('modalDetailbin');
        var myButts = document.querySelectorAll('.btn-open-bin');
        myModal.addEventListener('shown.bs.modal', function() {});
        for (var i = 0; i < myButts.length; i++) {
            myButts[i].addEventListener('click', function(e) {
                // console.log(e.target);
                let ev = e.target.parentElement;
                ev = ev.parentElement.firstElementChild;
                $.getJSON('/majestic/Dashboard/php/api/post/R_single_b.php', { id: ev.textContent }, (data) => {
                    console.log(data);
                    $("#content-id").text(data['id']);
                    $("#content-date").text(data['createddate']);
                    $("#content-Owners").text(data['owners']);
                    $("#content-Name").text(data['names']);
                    $("#content-Weight").text(data['weights']);
                    $("#content-Height").text(data['height']);
                    $("#content-Lat").text(data['lat']);
                    $("#content-Long").text(data['long']);
                    $("#content-Address").text(data['addresses']);
                    $("#content-Status").text(data['statuses']);
                    // image
                    $("#content-b-id").val(data['id']);
                    $("#content-b-date").val(data['createddate']);
                    $("#content-b-owners").val(data['owners']);
                    $("#content-b-name").val(data['names']);
                    $("#content-b-weight").val(data['weights']);
                    $("#content-b-height").val(data['height']);
                    $("#content-b-lat").val(data['lat']);
                    $("#content-b-long").val(data['long']);
                    $("#content-b-address").val(data['addresses']);
                    $("#content-b-status").val(data['statuses']);
                })
            });
        }  
    });
});


function addB() {
    var form_data = new FormData();
    form_data.append('id', $("#content-ba-id").val());
    form_data.append('date', $("#content-ba-date").val());
    form_data.append('owners', $("#content-ba-owners").val());
    form_data.append('name', $("#content-ba-name").val());
    form_data.append('weight', $("#content-ba-weight").val());
    form_data.append('height', $("#content-ba-height").val());
    form_data.append('lat', $("#content-ba-lat").val());
    form_data.append('long', $("#content-ba-long").val());
    form_data.append('address', $("#content-ba-address").val());
    form_data.append('status', $("#content-ba-status").val());
    $.ajax({
        url: "/majestic/Dashboard/php/api/post/Add_B.php",
        type: "post",
        data: form_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);

        }
    });
    // window.location = "/majestic/Dashboard/bin-table.html";
}

function saveB() {
    // update success
    $.getJSON("/majestic/Dashboard/php/api/post/Save_B.php", {
            id: $("#content-b-id").val(),
            date: $("#content-b-date").val(),
            owners: $("#content-b-owners").val(),
            names: $("#content-b-name").val(),
            weight: $("#content-b-weight").val(),
            height: $("#content-b-height").val(),
            lat: $("#content-b-lat").val(),
            long: $("#content-b-long").val(),
            statuses: $("#content-b-status").val(),
            address: $("#content-b-address").val()
        },
        function(data) {
            // console.log(data);
        });
        // window.location = "/majestic/Dashboard/bin-table.html";
}

function deleB() {
    $.getJSON("/majestic/Dashboard/php/api/post/Dele_B.php", {
        id: $("#content-b-id").val()
    }, function(data) {
        // console.log(data);
    });
}