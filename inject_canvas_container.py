import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

canvas_container = '<div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none;"></div>\n'

# Find the start of the fusion-shatter section and insert the container
if 'shatter-canvas-container' not in content:
    pattern = re.compile(r'(<section id="fusion-shatter".*?>\s*)', re.IGNORECASE)
    content = pattern.sub(r'\1' + canvas_container, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Canvas container added back for particle wave!")
