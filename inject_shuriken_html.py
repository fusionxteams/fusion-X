import re

html_to_inject = """
    <!-- 3D SHURIKEN SHATTER SEQUENCE -->
    <section id="fusion-shatter" style="background: #ffffff; width: 100%; height: 80vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; border-bottom: 3px solid #000;">
        
        <!-- Three.js Canvas -->
        <div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 5; pointer-events: none;"></div>
        
        <style>
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
        </style>

        <!-- The HTML Reveal Text (FUSION X) -->
        <div id="fusion-reveal-text" style="position: absolute; z-index: 3; text-align: center; display: flex; align-items: center; gap: 20px; opacity: 0; transform: scale(0.5); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
            <h1 id="html-fusion" class="text-3d" style="font-size: 8rem; font-weight: 900; color: #ff5722; letter-spacing: 5px; margin: 0; text-transform: uppercase;">
                FUSION
            </h1>
            <h1 id="html-x" class="text-3d" style="font-size: 10rem; font-weight: 900; color: #ff5722; margin: 0; position: relative;">
                X
                <!-- The blue digital glow inside the X -->
                <span id="x-glow" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: #00d4ff; filter: blur(8px); opacity: 0; transition: opacity 0.3s ease; z-index: -1;">X</span>
            </h1>
        </div>
        
        <!-- Trigger Button -->
        <button id="trigger-shatter-btn" style="position: absolute; bottom: 20px; z-index: 10; background: #fff; border: 2px solid #111; color: #111; padding: 10px 20px; border-radius: 50px; cursor: pointer; text-transform: uppercase; font-weight: bold; transition: all 0.3s ease;">
            Initiate Strike
        </button>
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

pattern = re.compile(r'<!-- CINEMATIC SHATTER SEQUENCE -->.*?</section>', re.DOTALL)
content = pattern.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Shuriken HTML applied!")
