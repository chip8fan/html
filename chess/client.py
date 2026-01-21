import requests
import chess
import chess.polyglot
import chess.engine
headers = {"Content-Type": "text/plain"}
url = "http://localhost/chess/api.php"
position = "http://localhost/chess/position.txt"
white = "http://localhost/chess/white.txt"
black = "http://localhost/chess/black.txt"
white_assign = "http://localhost/chess/assign_white.php"
black_assign = "http://localhost/chess/assign_black.php"
engine_name = ""
with requests.Session() as session:
	while True:
		while True:
			fen = requests.get(position).content.decode()
			if fen == "start":
				fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1"
			board = chess.Board(fen=fen)
			if board.is_game_over(claim_draw=True):
				break
			while True:
				if board.turn == chess.WHITE and requests.get(white).content.decode() == engine_name or board.turn == chess.BLACK and requests.get(black).content.decode() == engine_name:
					with chess.polyglot.open_reader("") as reader:
						try:
							board.push(reader.choice(board))
						except IndexError:
							board.push(engine.play().move)
			session.post(url, data=board.fen(), headers=headers)
		board = chess.Board()
		session.post(url, data="start", headers=headers)
		if requests.get(white).content.decode() == engine_name:
			opponent = requests.get(black).content.decode()
			session.post(white_assign, data=opponent, headers=headers)
			session.post(black_assign, data=engine_name, headers=headers)
		elif requests.get(black).content.decode() == engine_name:
			opponent = requests.get(white).content.decode()
			session.post(white_assign, data=engine_name, headers=headers)
			session.post(black_assign, data=opponent, headers=headers)
