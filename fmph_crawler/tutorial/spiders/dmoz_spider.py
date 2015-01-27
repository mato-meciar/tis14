import scrapy
from unidecode import unidecode
from tutorial.items import DmozItem

class DmozSpider(scrapy.Spider):
    name = "dmoz"
    allowed_domains = ["fmph.uniba.sk"]
    start_urls = [
        "http://www.fmph.uniba.sk/index.php?id=telefony",
        "http://www.fmph.uniba.sk/index.php?id=855",
        "http://www.fmph.uniba.sk/index.php?id=869",
        "http://www.fmph.uniba.sk/index.php?id=871",
        "http://www.fmph.uniba.sk/index.php?id=872",
        "http://www.fmph.uniba.sk/index.php?id=873",
        "http://www.fmph.uniba.sk/index.php?id=874",
        "http://www.fmph.uniba.sk/index.php?id=875",
        "http://www.fmph.uniba.sk/index.php?id=876",
        "http://www.fmph.uniba.sk/index.php?id=877",
        "http://www.fmph.uniba.sk/index.php?id=878",
        "http://www.fmph.uniba.sk/index.php?id=879",
        "http://www.fmph.uniba.sk/index.php?id=880",
        "http://www.fmph.uniba.sk/index.php?id=881",
        "http://www.fmph.uniba.sk/index.php?id=882",
        "http://www.fmph.uniba.sk/index.php?id=883",
        "http://www.fmph.uniba.sk/index.php?id=887",
        "http://www.fmph.uniba.sk/index.php?id=888",
        "http://www.fmph.uniba.sk/index.php?id=889",
        "http://www.fmph.uniba.sk/index.php?id=890",
        "http://www.fmph.uniba.sk/index.php?id=891",
        "http://www.fmph.uniba.sk/index.php?id=893",
        "http://www.fmph.uniba.sk/index.php?id=892",
        "http://www.fmph.uniba.sk/index.php?id=894",
        "http://www.fmph.uniba.sk/index.php?id=3376",
        "http://www.fmph.uniba.sk/index.php?id=895",
        "http://www.fmph.uniba.sk/index.php?id=896",
        "http://www.fmph.uniba.sk/index.php?id=898",
        "http://www.fmph.uniba.sk/index.php?id=897",
    ]

    def parse(self, response):
        unicode(response.body.decode(response.encoding)).encode('utf-8')
        for sel in response.xpath('//table/tbody//tr'):
            try:
                item = DmozItem()
                string = sel.xpath('td[1]').extract().pop()
                if not string:
                    continue
                if string.find('<a href') != -1:
                    item['meno'] = sel.xpath('td[1]/p/a/text()').extract()
                else:
                    item['meno'] = sel.xpath('td[1]/p/text()').extract()
                tmp = item['meno'][0].strip().split(',', 1)[0].split(' ')
                if len(tmp) > 2:
                    item['meno'] = " ".join(tmp[-2:])
                    item['priezvisko'] = " ".join(tmp[:-2])
                else:
                    item['meno'] = tmp.pop()
                    item['priezvisko'] = " ".join(tmp)
                item['email'] = unidecode(unicode(item['meno'].replace(' ', ''))) + '.' + unidecode(unicode(item['priezvisko'].replace(' ', ''))) + '@fmph.uniba.sk'
                item['katedra'] = sel.xpath('td[2]/p/text()').extract().pop()
                item['miestnost'] = sel.xpath('td[3]/p/text()').extract().pop()
                item['klapka'] = sel.xpath('td[4]/p/text()').extract().pop()
                sel.xpath('td[5]/p/text()').extract()
            except IndexError:
                pass
            if item['meno']:
                yield item
