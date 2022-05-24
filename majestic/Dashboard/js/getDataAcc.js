var listAcc = [];
window.addEventListener('load', function() {
    $.getJSON('https://demoleaflet.000webhostapp.com/majestic/Dashboard/php/api/post/R_Acc.php', {}, (data) => {
        for (let i = 0; i < data.data.length; i++) {
            var o = {
                id: data.data[i].id,
                username: data.data[i].username,
                password: data.data[i].password,
                fullname: data.data[i].fullname,
            }
            listAcc.push(o);
        }
    });
});
setTimeout(function() {
    console.log(listAcc);
}, 3000);