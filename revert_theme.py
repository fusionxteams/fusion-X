import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Change the section background back to white
content = re.sub(
    r'<section id="fusion-shatter" style="background: radial-gradient\(circle at center, #1b003a 0%, #05000a 100%\);(.*?)">',
    r'<section id="fusion-shatter" style="background: #ffffff;\1">',
    content
)

# 2. Change the CTA Text back to orange without the cyan text-shadow
content = content.replace(
    '<h2 class="cta-h2" style="color: #fff; text-shadow: 0 0 10px #00d4ff, 0 0 20px #00d4ff; font-weight: 800; margin-bottom: 30px;">',
    '<h2 class="cta-h2" style="color: #ff5722; font-weight: 800; margin-bottom: 30px;">'
)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML updated back to white and orange theme!")
