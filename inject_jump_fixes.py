import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Adjust Samurai bottom position to sit perfectly on the road
content = content.replace('bottom: 10%; left: 50%; width: 150px; height: 150px;', 'bottom: 2%; left: 50%; width: 150px; height: 150px;')

# 2. Add CSS for the double slash action
css_double_slash = """
            .is-slashing-1 #right-arm {
                transform: rotate(140deg) !important;
                transition: transform 0.1s cubic-bezier(0.1, 0.9, 0.2, 1) !important;
            }
            .is-slashing-2 #right-arm {
                transform: rotate(140deg) !important;
                transition: transform 0.1s cubic-bezier(0.1, 0.9, 0.2, 1) !important;
            }
            /* Add an explicit pull-back state if needed, or just let JS remove the class to pull back */
"""
if '.is-slashing-1' not in content:
    content = content.replace('</style>', css_double_slash + '\n        </style>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML adjustments applied!")
