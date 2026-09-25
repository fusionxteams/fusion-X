import re

html_path = 'index.html'
js = open(html_path, 'r', encoding='utf-8').read()

js = js.replace('<h2 class="cta-h2" style=" margin-bottom: 20px; color: #111;">Your Premier', '<h2 class="cta-h2" style=" margin-bottom: 20px; color: #fff;">Your Premier')
js = js.replace('color: #555; max-width: 800px; margin: 0 auto;">\n                    In today\'s fast-paced digital world', 'color: #ccc; max-width: 800px; margin: 0 auto;">\n                    In today\'s fast-paced digital world')

open(html_path, 'w', encoding='utf-8').write(js)
