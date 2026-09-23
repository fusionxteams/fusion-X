import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Remove the blue x-glow span entirely
pattern = re.compile(r'<!-- The blue digital glow inside the X -->\s*<span id="x-glow".*?</span>', re.IGNORECASE | re.DOTALL)
content = pattern.sub('', content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Blue glow removed from X!")
