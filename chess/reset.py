import requests
requests.post("http://localhost/chess/api.php", data="start", headers={"Content-Type": "text/plain"})
requests.post("http://localhost/chess/assign_white.php", data="Ethereal", headers={"Content-Type": "text/plain"})
requests.post("http://localhost/chess/assign_black.php", data="Stockfish", headers={"Content-Type": "text/plain"})
