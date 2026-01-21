import requests
import random
import chess
import time
headers = {"Content-Type": "text/plain"}
url = "http://localhost/chess/api.php"
with requests.Session() as session:
    while True:
        board = chess.Board()
        session.post(url, data="start", headers=headers)
        time.sleep(1)
        while board.is_game_over(claim_draw=True) == False:
            board.push(random.choice(list(board.legal_moves)))
            session.post(url, data=board.fen(), headers=headers)
            time.sleep(1)
