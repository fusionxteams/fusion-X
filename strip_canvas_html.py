import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Delete the shatter canvas container
pattern = re.compile(r'<div id="shatter-canvas-container".*?</div>\n', re.IGNORECASE | re.DOTALL)
content = pattern.sub('', content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Canvas container removed!")
