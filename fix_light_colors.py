import re

html_path = 'about-us.html'
js = open(html_path, 'r', encoding='utf-8').read()

js = re.sub(r'(\.who-body\s*\{[^}]*?)color:\s*#ccc;', r'\1color: #555;', js)
js = re.sub(r'(\.eyebrow\s*\{[^}]*?)color:\s*#ccc;', r'\1color: var(--orange);', js)

open(html_path, 'w', encoding='utf-8').write(js)
