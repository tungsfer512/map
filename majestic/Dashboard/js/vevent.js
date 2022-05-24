var appe = $('.noti-drop');
function updateVevent() {
	// appe.html("");
  $.getJSON("/majestic/Dashboard/php/api/post/R_vevent.php", {},
    function (data) {
      // appe.html("");
      for(let i = 0; i < data.data.length; i++) {
        appe.append(`<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-warning">
										<i class="mdi mdi-truck mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Vehicle event</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										ID = ${data.data[i].id_vehicle}<br>
										${data.data[i].error_title}.
									</p>
								</div>
							</a>`);
      }
    }
  );

	$.getJSON("/majestic/Dashboard/php/api/post/R_bin.php", {},
		function (data) {
			// appe.html("");
			for (let i = 0; i < data.data.length; i++) {
				if (data.data[i].statuses == "full") {
					appe.append(`<a class="dropdown-item">
									<div class="item-thumbnail">
										<div class="item-icon bg-warning">
											<i class="mdi mdi-truck mx-0"></i>
										</div>
									</div>
									<div class="item-content">
										<h6 class="font-weight-normal">Bin event</h6>
										<p class="font-weight-light small-text mb-0 text-muted">
											ID = ${data.data[i].id}<br>
											${data.data[i].statuses}.
										</p>
									</div>
								</a>`);
				}
			}
		}
	);
}


setInterval(function() {
	updateVevent();
}, 1000);