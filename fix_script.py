js = open('about-us.html', 'r', encoding='utf-8').read()
js = js.replace('<script src="easter-egg.js">\n/* CTA SECTION', '<script src="easter-egg.js"></script>\n<script>\n/* CTA SECTION')
open('about-us.html', 'w', encoding='utf-8').write(js)
