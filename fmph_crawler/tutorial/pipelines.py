# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html


import json
import codecs
import os

class JsonWithEncodingPipeline(object):

    def __init__(self):
        self.file = codecs.open('tutorial\items_utf8.json', 'rb+', encoding='utf-8')
        self.file.write('[')

    def process_item(self, item, spider):
        line = json.dumps(dict(item), ensure_ascii=False) + "\n"
        self.file.write(line + ',')
        return item

    def close_spider(self, spider):
    	self.file.seek(-1, os.SEEK_END)
    	self.file.truncate()
    	self.file.write(']')
        self.file.close()