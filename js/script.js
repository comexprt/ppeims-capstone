$(document).ready(function() {

	initTooltip();

	function initTooltip() {
		$('[data-toggle="tooltip"]').tooltip();
	}

	function toggleChevron(e) {
	    $(e.target)
	        .prev('.panel-group-issuance .panel-heading')
	        .find('span:nth-child(2) i')
	        .toggleClass('glyphicon-minus glyphicon-plus');
	}
	$('#accordion').on('hidden.bs.collapse', toggleChevron);
	$('#accordion').on('shown.bs.collapse', toggleChevron);

	$('.alert-auto-dismiss').fadeTo(3000, 700).slideUp(700, function() {
		$('.alert-auto-dismiss').slideUp(700);
	});

	$('.printBtn').on('click', function(e) {
		e.preventDefault();
		window.print();
	});

});