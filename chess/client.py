import chess
import chess.polyglot
import chess.engine
import time
position = "/var/www/html/chess/position.txt"
white = "/var/www/html/chess/white.txt"
black = "/var/www/html/chess/black.txt"
engine_name = ""
engine = chess.engine.SimpleEngine.popen_uci("")
while True:
	fen = open(position, "rb").read().decode()
	if not fen:
		continue
	if fen == "start":
		fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1"
	board = chess.Board(fen=fen)
	if board.is_game_over(claim_draw=True):
		break
	if board.turn == chess.WHITE and open(white, "rb").read().decode() == engine_name or board.turn == chess.BLACK and open(black, "rb").read().decode() == engine_name:
		with chess.polyglot.open_reader("") as reader:
			try:
				board.push(reader.choice(board).move)
			except IndexError:
				board.push(engine.play(board, chess.engine.Limit()).move)
		open(position, "w").write(board.fen())
engine.quit()
