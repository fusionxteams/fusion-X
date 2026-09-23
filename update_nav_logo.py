import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace all instances of logo.png with logo_transparent.png
content = content.replace('src="logo.png"', 'src="logo_transparent.png"')
content = content.replace('href="logo.png"', 'href="logo_transparent.png"')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Navbar logo updated to transparent version!")
