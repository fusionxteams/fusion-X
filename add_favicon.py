import os, glob

favicon_tag = '    <link rel="icon" type="image/png" href="logo_transparent.png">\n'

html_files = glob.glob('*.html')
for file in html_files:
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    if '<link rel="icon"' not in content:
        # Insert right after <head>
        content = content.replace('<head>', '<head>\n' + favicon_tag)
        with open(file, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Added favicon to {file}")
