import json
kits = []
non_kits = []
with open("amazon.json") as amazon:
	items = json.load(amazon)["results"]
	for item in items:
		print(item["name"])
		if "kit" in item["name"].lower():
			kits.append(item["name"])
		else:
			non_kits.append(item["name"])
print(kits, non_kits)
