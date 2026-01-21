<style>
	* {
		margin: 0px;
	}
	canvas {
		display: block;
		max-width: 50%;
		max-height: 50%;
		margin: auto;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<canvas id="minimum-ram"></canvas>
<canvas id="maximum-ram"></canvas>
<script>
	let minimum_ram = new Chart("minimum-ram", {
		type: "line",
		data: {
			labels: [],
			datasets: [{
				data: []
			}]
		},
		options: {
			legend: {display: false},
			title: {
				display: true,
				text: ""
			}
		}
	});
	let maximum_ram = new Chart("maximum-ram", {
		type: "line",
		data: {
			labels: [],
			datasets: [{
				data: []
			}]
		},
		options: {
			legend: {display: false},
			title: {
				display: true,
				text: ""
			}
		}
	});
</script>
