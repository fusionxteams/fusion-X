import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Add responsive CSS classes
css_responsive = """
            .fusion-h1 { font-size: 8rem; }
            .x-h1 { font-size: 10rem; }
            .cta-h2 { font-size: 2.5rem; }
            
            @media (max-width: 768px) {
                .fusion-h1 { font-size: 3rem !important; }
                .x-h1 { font-size: 4.5rem !important; }
                .cta-h2 { font-size: 1.6rem !important; line-height: 1.3; padding: 0 10px; }
                #fusion-text-container { gap: 15px !important; flex-wrap: wrap; margin-bottom: 30px !important; }
                #fusion-shatter { padding: 50px 10px !important; min-height: auto !important; }
            }
"""
if '.fusion-h1' not in content:
    content = content.replace('</style>', css_responsive + '\n        </style>')

# 2. Strip inline font-sizes and apply the new classes
# Replace <h1 class="text-3d" style="font-size: 8rem; ..."> with <h1 class="text-3d fusion-h1" style="...">
content = content.replace('class="text-3d"', 'class="text-3d fusion-h1"', 1)
content = content.replace('font-size: 8rem;', '')

# Replace <h1 class="text-3d slam-letter" style="font-size: 10rem; ..."> with <h1 class="text-3d slam-letter x-h1" style="...">
content = content.replace('class="text-3d slam-letter"', 'class="text-3d slam-letter x-h1"')
content = content.replace('font-size: 10rem;', '')

# Replace <h2 style="font-size: 2.5rem; ..."> with <h2 class="cta-h2" style="...">
content = content.replace('<h2 style="font-size: 2.5rem;', '<h2 class="cta-h2" style="')

# Remove the explicit min-height if it causes scrolling issues on mobile
# Actually, the media query handles min-height: auto.

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Responsive tweaks applied!")
