import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Fix the Launch Project button text
content = re.sub(r'>\s*Launch Project\s*</a>', '>Take Your Brand Worldwide</a>', content)
content = re.sub(r'>\s*LAUNCH PROJECT\s*</a>', '>TAKE YOUR BRAND WORLDWIDE</a>', content)

# 2. Add the favicon
favicon_tag = '<link rel="icon" type="image/png" href="logo.png">\n'
if 'rel="icon"' not in content:
    content = content.replace('</head>', favicon_tag + '</head>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Button text fixed and favicon added!")
