import re

html_to_inject = """
    <!-- 3D SHATTER SEQUENCE -->
    <section id="fusion-shatter" style="background: #000000; width: 100%; height: 100vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
        
        <!-- The 3D Canvas Container -->
        <div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></div>
        
        <!-- The HTML Reveal Text (Hidden initially) -->
        <div id="fusion-reveal-text" style="position: absolute; z-index: 2; opacity: 0; transform: scale(0.1); transition: all 1s cubic-bezier(0.175, 0.885, 0.32, 1.275); text-align: center; pointer-events: none;">
            <h1 style="font-size: 10vw; font-weight: 900; color: #ffffff; letter-spacing: 10px; margin: 0; filter: drop-shadow(0 0 30px rgba(255,87,34,0.8)); text-transform: uppercase;">
                Fusion
            </h1>
            <p style="color: #ff5722; font-size: 3vw; font-weight: bold; letter-spacing: 5px; margin-top: 10px; text-transform: uppercase;">Unleashed</p>
        </div>
        
        <!-- Trigger Button to replay animation -->
        <button id="trigger-shatter-btn" style="position: absolute; bottom: 40px; z-index: 3; background: transparent; border: 2px solid #333; color: #aaa; padding: 10px 20px; border-radius: 50px; cursor: pointer; text-transform: uppercase; font-weight: bold; letter-spacing: 2px; transition: all 0.3s ease;">
            Initiate Sequence
        </button>
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Insert before FAQ section
target = '<section id="faq"'
if target in content:
    new_content = content.replace(target, html_to_inject + "\n    " + target)
    
    # Also ensure the new JS file is linked at the bottom
    if '<script src="shatter-animation.js"></script>' not in new_content:
        new_content = new_content.replace('</body>', '    <script src="shatter-animation.js"></script>\n</body>')
        
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Shatter section injected!")
else:
    print("FAQ Section not found.")
