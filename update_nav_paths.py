import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Update hrefs in the navbar so they work globally across all pages
content = re.sub(r'<a href="#home"', r'<a href="index.html#home"', content)
content = re.sub(r'<a href="#services"', r'<a href="index.html#services"', content)
content = re.sub(r'<a href="#brands"', r'<a href="index.html#brands"', content)
content = re.sub(r'<a href="#team"', r'<a href="index.html#team"', content)
content = re.sub(r'<a href="#works"', r'<a href="index.html#works"', content)
content = re.sub(r'<a href="#contact"', r'<a href="index.html#contact"', content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Updated absolute paths in index.html navbar.")
