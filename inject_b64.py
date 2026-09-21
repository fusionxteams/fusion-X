import base64
import re

with open('assets/samurai.png', 'rb') as f:
    b64_data = base64.b64encode(f.read()).decode('utf-8')
    
b64_string = f"data:image/png;base64,{b64_data}"

with open('shatter-animation.js', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the textureLoader.load call
pattern = r"textureLoader\.load\('assets/samurai\.png'\);"
replacement = f"textureLoader.load('{b64_string}');"

new_content = re.sub(pattern, replacement, content)

with open('shatter-animation.js', 'w', encoding='utf-8') as f:
    f.write(new_content)
    
print("Base64 injected!")
