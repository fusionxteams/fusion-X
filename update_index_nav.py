import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace('<li><a href="#about">About us</a></li>', '<li><a href="about-us.html">About us</a></li>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("index.html navbar updated!")
