import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Reduce height of the brands 3D container
content = content.replace(
    '<div id="brands-3d-container" style="width: 100%; height: 600px; cursor: grab;"></div>',
    '<div id="brands-3d-container" style="width: 100%; height: 400px; cursor: grab;"></div>'
)

# 2. Reduce top padding of the Fusion Shatter section
# Current: style="background: #ffffff; width: 100%; min-height: 60vh; padding: 100px 20px; 
content = re.sub(
    r'<section id="fusion-shatter" style="background: #ffffff; width: 100%; min-height: 60vh; padding: 100px 20px;',
    r'<section id="fusion-shatter" style="background: #ffffff; width: 100%; min-height: 60vh; padding: 20px 20px;',
    content
)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Spacing reduced!")
