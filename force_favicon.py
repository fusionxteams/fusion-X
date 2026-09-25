import os, glob

favicon_tag = '    <link rel="icon" type="image/png" href="logo_transparent.png">\n'

html_files = glob.glob('*.html')
for file in html_files:
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Remove existing favicon if present
    import re
    content = re.sub(r'<link rel="icon".*?>', '', content)
    
    # Insert right before </head>
    content = content.replace('</head>', favicon_tag + '</head>')
    with open(file, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f"Force updated favicon in {file}")
