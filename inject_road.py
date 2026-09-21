import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the dashline with a solid road
old_dashline = '<div id="html-dashline" style="position: absolute; bottom: 5%; left: 0; width: 100%; height: 2px; background: #000; z-index: 2; opacity: 0;"></div>'
new_road = '<div id="html-road" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 10%; background: #111; z-index: 2; border-top: 4px solid #ff5722;"></div>'

content = content.replace(old_dashline, new_road)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Road added!")
