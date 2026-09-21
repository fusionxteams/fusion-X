import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Fix the stripped CSS font sizes
content = content.replace('.fusion-h1 {  }', '.fusion-h1 { font-size: 8rem; }')
content = content.replace('.x-h1 {  }', '.x-h1 { font-size: 10rem; }')

# Fix the duplicate CSS injection by keeping only the one in the #fusion-shatter style block if possible, 
# or it's harmless to have duplicates, but it's cleaner to remove them.
# I'll just leave them for safety, but the font sizes will be fixed.

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Desktop font sizes restored!")
