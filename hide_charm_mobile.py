import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

hide_charm_css = """
        @media (max-width: 768px) {
            .charm-string {
                display: none !important;
            }
        }
"""

if '.charm-string {' in content:
    # Append the media query right before the closing style tag for the charm CSS
    content = content.replace('        @keyframes swing {', hide_charm_css + '\n        @keyframes swing {')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Charm hidden on mobile!")
