import re

html_path = 'about-us.html'
js = open(html_path, 'r', encoding='utf-8').read()

js = js.replace('.cta-sub {\n            font-size: 1.1rem;\n            color: #555;', '.cta-sub {\n            font-size: 1.1rem;\n            color: #ccc;')

# Also there's an inline color for the h2 near CTA?
js = js.replace('color: #111;">Your Premier', 'color: #fff;">Your Premier')

open(html_path, 'w', encoding='utf-8').write(js)
