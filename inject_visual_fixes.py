import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Change background to white
content = content.replace('background: #cceeff;', 'background: #ffffff;')

# 2. Change FUSION X text color to orange
content = content.replace('color: #111; letter-spacing: 5px; margin: 0; text-transform: uppercase;">\n                FUSION', 'color: #ff5722; letter-spacing: 5px; margin: 0; text-transform: uppercase;">\n                FUSION')
content = content.replace('id="html-x" style="font-size: 10rem; font-weight: 900; color: #111;', 'id="html-x" style="font-size: 10rem; font-weight: 900; color: #ff5722;')

# 3. Slow down the CSS run cycle
content = content.replace('animation: runCycle 0.3s infinite linear;', 'animation: runCycle 0.6s infinite linear;')
content = content.replace('animation: runCycleAlt 0.3s infinite linear;', 'animation: runCycleAlt 0.6s infinite linear;')
content = content.replace('animation: bobCycle 0.15s infinite linear;', 'animation: bobCycle 0.3s infinite linear;')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML adjustments applied!")
