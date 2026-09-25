js = open('index.html', 'r', encoding='utf-8').read()
js = js.replace('<p style="font-size: 1.1rem; color: #ccc; max-width: 800px; margin: 0 auto;">', '<p style="font-size: 1.1rem; color: #ccc; max-width: 800px; margin: 0 auto; text-align: justify;">')
open('index.html', 'w', encoding='utf-8').write(js)
