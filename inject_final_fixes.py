import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Remove the "UNLEASHED" text entirely
content = re.sub(r'<p id="fusion-subtext".*?UNLEASHED</p>', '', content, flags=re.DOTALL)

# 2. Adjust the leaning CSS to push the Samurai further left so he leans on the start of the word
content = content.replace('transform: translateX(-150px) rotate(-10deg) !important;', 'transform: translateX(-35vw) rotate(-15deg) !important;')

# 3. Increase Samurai z-index so he leans ON the text, not behind it
content = content.replace('id="html-samurai" style="position: absolute; bottom: 10%; left: 50%; width: 150px; height: 150px; transform: translateX(100vw); z-index: 2;"', 'id="html-samurai" style="position: absolute; bottom: 10%; left: 50%; width: 150px; height: 150px; transform: translateX(100vw); z-index: 5;"')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML adjustments applied!")
