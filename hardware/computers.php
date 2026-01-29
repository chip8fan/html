<?php
	echo "<table>";
	$file = fopen("rpi5.csv", "r");
	while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
		$num = count($data);
		echo "<tr>";
		for ($c=0; $c < $num; $c++) {
			echo "<td>" . $data[$c] . "</td>";
		}
		echo "</tr>";
	}
	fclose($file);
	echo "</table>";
?>
<style>
	* {
		margin: 0px;
	}
	table, tr, td {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: center;
	}
	table {
		width: 100%;
		height: 100%;
	}
</style>
