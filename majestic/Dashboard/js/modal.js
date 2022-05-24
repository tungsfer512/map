setTimeout(function() {
    var myModal = document.getElementById('modalDetail');
    var myButts = document.querySelectorAll('.btn-open');
    myModal.addEventListener('shown.bs.modal', function() {});
    for (var i = 0; i < myButts.length; i++) {
        myButts[i].addEventListener('click', function(e) {
            console.log(e.target);
        });
    }
}, 500);