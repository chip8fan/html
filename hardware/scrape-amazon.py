import requests
print(requests.get("https://api.scraperapi.com/structured/amazon/search", params={'api_key': open("amazon-key.txt", "rb").read().decode().strip(), 'query': "raspberry pi"}).text, file=open("amazon.json", "w"))
