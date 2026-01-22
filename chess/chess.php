<link rel="stylesheet"
      href="https://unpkg.com/@chrisoakman/chessboardjs@1.0.0/dist/chessboard-1.0.0.min.css"
      integrity="sha384-q94+BZtLrkL1/ohfjR8c6L+A6qzNH9R2hBLwyoAfu3i/WCvQjzL2RQJ3uNHDISdU"
      crossorigin="anonymous">
<style>
	* {
		margin: 0px;
	}
	@media (orientation: portrait) {
		#board {
			width: 100vw;
		}
	}
	@media (orientation: landscape) {
		#board {
			width: 100vh;
		}
	}
	#board {
		display: block;
		margin: auto;
	}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/@chrisoakman/chessboardjs@1.0.0/dist/chessboard-1.0.0.min.js"
        integrity="sha384-8Vi8VHwn3vjQ9eUHUxex3JSN/NFqUg3QbPyX8kWyb93+8AC/pPWTzj+nHtbC5bxD"
        crossorigin="anonymous"></script>
<div id="board"></div>
<script>
	let config = {
		pieceTheme: "img/{piece}.png",
		position: "start"
	};
	let board = Chessboard("board", config);
	function get_position() {
		let xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			current_position = this.responseText.trim()
			if (board.fen() !== current_position) {
				board.position(current_position, true);
			}
			setTimeout(get_position, 100);
		}
		xhttp.open("GET", "position.txt?d=" + Date.now(), true);
		xhttp.send();
	}
	get_position();
</script>
