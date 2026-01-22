<style>
	* {
		margin: 0px;
	}
	@media (orientation: portrait) {
		#chat {
			width: 100vw;
		}
	}
	@media (orientation: landscape) {
		#chat {
			width: 75vw;
		}
	}
	#chat {
		display: block;
		margin: auto;
	}
</style>
<div id="chat"></div>
<script>
	function get_chat() {
		let xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			data = this.responseText
			if (document.getElementById("chat").innerHTML !== data) {
				document.getElementById("chat").innerHTML = data;
			}
			setTimeout(get_chat, 100);
		}
		xhttp.open("GET", "chat.txt?d=" + Date.now(), true);
		xhttp.send();
	}
	get_chat();
</script>
