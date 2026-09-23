import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Update the button text
content = content.replace('>Launch Project</a>', '>Take Your Brand Worldwide</a>')
content = content.replace('>LAUNCH PROJECT</a>', '>TAKE YOUR BRAND WORLDWIDE</a>')

# 2. Replace the Kinetic Slam HTML structure with the Elegant Reveal structure
old_html_pattern = re.compile(r'<!-- FUSION X Side by Side -->.*?Ready to Skyrocket Your Brand\'s Success\?', re.DOTALL)

new_html = """<!-- FUSION X Side by Side -->
        <div id="fusion-text-container" style="display: flex; align-items: center; justify-content: center; gap: 40px; margin-bottom: 60px; perspective: 1000px;">
            <h1 class="text-3d fusion-h1 elegant-reveal" style="font-weight: 900; color: #ff5722; margin: 0; text-transform: uppercase;">
                FUSION
            </h1>
            <h1 class="text-3d x-h1 elegant-reveal" style="font-weight: 900; color: #ff5722; margin: 0; position: relative; transition-delay: 0.2s;" id="x-letter">
                X
                <!-- The blue digital glow inside the X -->
                <span id="x-glow" class="elegant-glow" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: #00d4ff; filter: blur(10px); opacity: 0; transition: opacity 1s ease 0.8s; z-index: -1;">X</span>
            </h1>
        </div>
        
        <!-- Fused CTA Text -->
        <div id="cta-reveal-container" class="elegant-reveal" style="position: relative; z-index: 3; text-align: center; transition-delay: 0.4s;">
            <h2 class="cta-h2" style="color: #ff5722; font-weight: 800; margin-bottom: 30px;">
                Ready to Skyrocket Your Brand's Success?"""

content = old_html_pattern.sub(new_html, content)

# 3. Add the elegant-reveal CSS
css_to_add = """
        .elegant-reveal {
            opacity: 0;
            transform: translateY(60px) rotateX(-30deg);
            transition: all 1.2s cubic-bezier(0.25, 1, 0.5, 1);
            transform-origin: bottom center;
        }
        .elegant-reveal.is-visible {
            opacity: 1;
            transform: translateY(0) rotateX(0);
        }
"""
if '.elegant-reveal' not in content:
    content = content.replace('</style>', css_to_add + '\n        </style>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML updated to elegant reveal!")
