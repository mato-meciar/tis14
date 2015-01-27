import dicttoxml
import json

filePath = "items_utf8.json"

inf = open(filePath)
obj = json.loads(inf.read())
xml = dicttoxml.dicttoxml(obj)
inf.close()

ouf = open("items_utf8.xml", 'w')
ouf.write(xml)
ouf.close()