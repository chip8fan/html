import chess
import chess.engine
import sys
engine = chess.engine.SimpleEngine.popen_uci("/usr/games/stockfish")
board = chess.Board()
limit = chess.engine.Limit(time=60)
moves = engine.analyse(board, limit, multipv=len(list(board.legal_moves)))
engine.quit()
moves = [[move['pv'][0], move['score'].relative.score(mate_score=sys.maxsize)] for move in moves]
max_score = moves[0][1]
cp_loss = 50
for move in moves:
	if move[1]+cp_loss >= max_score:
		print(move)
