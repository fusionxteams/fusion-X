import os, re, json

results = {}

for root, dirs, files in os.walk('.'):
    if any(x in root for x in ['.git', 'node_modules', 'scratch']):
        continue
    for f in sorted(files):
        if f.endswith('.html'):
            filepath = os.path.join(root, f)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as fl:
                html = fl.read()

            # Find 3D and canvas features
            three_loaded = 'three' in html.lower()
            glbs = re.findall(r'[\'"]([^\'"]+\.glb)[\'"]', html, re.IGNORECASE)
            
            # Find canvases
            canvases = re.findall(r'<canvas[^>]*id=[\'"]([^\'"]+)[\'"]', html, re.IGNORECASE)
            
            # Find 3D divs
            three_divs = re.findall(r'<div[^>]*id=[\'"]([^\'"]*(?:3d|three|spider|canvas|model)[^\'"]*)[\'"]', html, re.IGNORECASE)
            
            # Find JS scripts linked
            scripts = re.findall(r'<script[^>]*src=[\'"]([^\'"]+)[\'"]', html, re.IGNORECASE)
            relevant_scripts = [s for s in scripts if any(k in s.lower() for k in ['three', '3d', 'model', 'animation', 'shatter', 'spider', 'brand'])]
            
            # Check inline script 3D occurrences
            inline_three = bool(re.search(r'THREE\.(Scene|WebGLRenderer|PerspectiveCamera)', html))
            
            if three_loaded or glbs or canvases or three_divs or relevant_scripts or inline_three:
                results[f] = {
                    'glbs': list(set(glbs)),
                    'canvases': canvases,
                    'three_divs': three_divs,
                    'relevant_scripts': relevant_scripts,
                    'has_inline_three': inline_three
                }

print(json.dumps(results, indent=2))
