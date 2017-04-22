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



	var pieChartElement = $('#pieChart');

	var data = {
		labels: [
			"Red",
			"Blue",
			"Yellow"
		],
		datasets: [
			{
				data: [300, 50, 100],
				backgroundColor: [
					"#FF6384",
					"#36A2EB",
					"#FFCE56"
				],
				hoverBackgroundColor: [
					"FF6384",
					"#36A2EB",
					"#FFCE56"
				]
			}]
	};

	var pieChart = new Chart(pieChartElement, {
		type: 'doughnut',
		data: data

	});

});