import os, re

paths = [
    'index.html',
    'fusion-x-theme/front-page.php',
    'ai-search-results.html',
    'fusion-x-theme/page-ai-search-results.php'
]

for p in paths:
    if os.path.exists(p):
        with open(p, 'r', encoding='utf-8', errors='ignore') as f:
            c = f.read()
        imgs = re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', c)
        print(f'=== {p} ({len(imgs)} images) ===')
        for img in imgs:
            if any(k in img.lower() for k in ['chatgpt', 'gemini', 'bhawani', 'nilaro', 'ai-', 'proof', 'overview', 'search']):
                print('  ->', img)
