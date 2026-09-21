import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Reduce Samurai size
content = content.replace('width: 250px; height: 250px;', 'width: 150px; height: 150px;')

# 2. Add 3D text CSS to FUSION X
css_3d = """
            .text-3d {
                text-shadow: 
                    1px 1px 0px #b03a15,
                    2px 2px 0px #b03a15,
                    3px 3px 0px #b03a15,
                    4px 4px 0px #b03a15,
                    5px 5px 0px #b03a15,
                    6px 6px 0px #b03a15,
                    7px 7px 0px #b03a15,
                    8px 8px 10px rgba(0,0,0,0.6);
            }
"""

if '.text-3d' not in content:
    content = content.replace('<style>', '<style>\n' + css_3d)

# Add the class to the H1 elements
content = content.replace('<h1 style="font-size: 8rem;', '<h1 class="text-3d" style="font-size: 8rem;')
content = content.replace('id="html-x" style="font-size: 10rem;', 'id="html-x" class="text-3d" style="font-size: 10rem;')

# Add a leaning state to the CSS
css_lean = """
            .is-leaning {
                transform: translateX(-150px) rotate(-10deg) !important;
                transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1) !important;
            }
            .is-leaning #right-arm {
                transform: rotate(30deg) !important;
                transition: transform 1s ease !important;
            }
"""
if '.is-leaning' not in content:
    content = content.replace('</style>', css_lean + '\n        </style>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML structural tweaks applied!")
