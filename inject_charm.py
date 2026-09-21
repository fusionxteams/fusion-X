import re

# 1. Update the nav link
with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace "Contact us" with "Let's Connect" and wrap in dangling-container
old_nav_link = '<li><a href="#contact">Contact us</a></li>'
new_nav_link = """<li class="dangling-container">
            <a href="#contact">Let's Connect</a>
            <div class="charm-string">
                <img src="logo_transparent.png" class="charm-object" alt="Fusion X Charm">
            </div>
        </li>"""

content = content.replace(old_nav_link, new_nav_link)

# 2. Add the CSS for the swinging charm
charm_css = """
    <style>
        .dangling-container {
            position: relative;
        }
        .charm-string {
            position: absolute;
            top: 25px; /* Hang just below the text */
            left: 50%;
            width: 2px;
            height: 70px;
            background: repeating-linear-gradient(to bottom, #ff5722, #ff5722 5px, #c24015 5px, #c24015 10px);
            transform-origin: top center;
            animation: swing 3s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite alternate;
            z-index: 100;
            pointer-events: none;
        }
        .charm-string::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -3px;
            width: 8px;
            height: 8px;
            background: #ff5722;
            border-radius: 2px;
        }
        .charm-object {
            position: absolute;
            top: 70px;
            left: -25px;
            width: 50px;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            transform-origin: top center;
        }
        @keyframes swing {
            0% { transform: rotate(12deg); }
            100% { transform: rotate(-12deg); }
        }
    </style>
"""

# Insert the CSS before </head>
content = content.replace('</head>', charm_css + '\n</head>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Nav link and dangling charm added!")
