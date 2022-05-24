// function loadname(){
//     $.getJSON('/majestic/Dashboard/php/api/post/R_temporary.php',{},function (data) {
//         // console.log(data);
//         $("#display-username").text(data["username"]);
//         $("#display-fullname").text('Welcome back ' + data["fullname"]);
//     });
// }
// window.onload=loadname;
window.addEventListener('load', () => {
    $.getJSON('/majestic/Dashboard/php/api/post/read.php', {}, (data) => {
        let body = document.querySelector(".table tbody");
        for (let i = 0; i < data.data.length; i++) {
            body.innerHTML += `<tr></tr>`;
            let row = document.getElementById('body-table').lastElementChild;
            row.innerHTML = `<td>${data.data[i]['vehicle_id']}</td>`;
            row.innerHTML += `<td>${data.data[i]['bin_id']}</td>`;
            row.innerHTML += `<td>${data.data[i]['bin_address']}</td>`;
            row.innerHTML += `<td>${data.data[i]['driver_id']}</td>`;
            row.innerHTML += `<td>${data.data[i]['driver_fullname']}</td>`;
            // row.innerHTML += `<td><button>More</button></td>`;
        }
    });
});