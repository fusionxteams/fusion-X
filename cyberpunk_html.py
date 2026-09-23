import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Fix the Z-index of the FUSION X text container
content = content.replace(
    '<div id="fusion-text-container" style="display: flex; align-items: center; justify-content: center; gap: 40px; margin-bottom: 60px; perspective: 1000px;">',
    '<div id="fusion-text-container" style="display: flex; align-items: center; justify-content: center; gap: 40px; margin-bottom: 60px; perspective: 1000px; position: relative; z-index: 10;">'
)

# 2. Change the section background to Cyberpunk
content = re.sub(
    r'<section id="fusion-shatter" style="background: #ffffff;(.*?)"',
    r'<section id="fusion-shatter" style="background: radial-gradient(circle at center, #1b003a 0%, #05000a 100%);\1"',
    content
)

# 3. Ensure the CTA Text is readable on the dark background
# It's currently color: #ff5722; which works, but let's add a white glow to it to make it pop on the dark bg.
content = content.replace(
    '<h2 class="cta-h2" style="color: #ff5722; font-weight: 800; margin-bottom: 30px;">',
    '<h2 class="cta-h2" style="color: #fff; text-shadow: 0 0 10px #00d4ff, 0 0 20px #00d4ff; font-weight: 800; margin-bottom: 30px;">'
)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML updated for z-index and cyberpunk background!")
