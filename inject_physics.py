import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Style the "Let's Connect" button to be orange
old_nav_link = '<a href="#contact">Let\'s Connect</a>'
new_nav_link = '<a href="#contact" class="nav-cta-btn">Let\'s Connect</a>'
content = content.replace(old_nav_link, new_nav_link)

# Inject the CSS for nav-cta-btn
nav_cta_css = """
        .nav-cta-btn {
            background: #ff5722 !important;
            color: #fff !important;
            padding: 8px 25px !important;
            border-radius: 50px !important;
            font-weight: 800 !important;
            letter-spacing: 1px !important;
            box-shadow: 0 4px 10px rgba(255, 87, 34, 0.3) !important;
            transition: transform 0.2s, background 0.2s !important;
        }
        .nav-cta-btn:hover {
            background: #e64a19 !important;
            transform: translateY(-2px);
        }
"""
if '.nav-cta-btn' not in content:
    content = content.replace('</style>', nav_cta_css + '\n    </style>')

# 2. Strip the CSS animation from charm-string so JS can take over
# We don't HAVE to strip it, the JS forces style.animation = 'none', 
# but it's cleaner to remove the animation property from the CSS block.
content = re.sub(r'animation:\s*swing[^;]+;', '', content)
# We can also strip the @keyframes swing block, but it's harmless.

# 3. Inject the charm-physics.js script at the bottom of the body
script_tag = '<script src="charm-physics.js"></script>'
if script_tag not in content:
    content = content.replace('</body>', script_tag + '\n</body>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Button styled and physics script linked!")
