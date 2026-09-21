import re

html_to_inject = """
    <!-- SHATTER SEQUENCE -->
    <section id="fusion-shatter" style="background: #cceeff; width: 100%; height: 80vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; border-bottom: 3px solid #000;">
        
        <!-- Three.js Canvas for Lightning -->
        <div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></div>
        
        <!-- The HTML Samurai -->
        <img id="html-samurai" src="assets/samurai.png" style="position: absolute; bottom: 0; left: 50%; height: 80%; transform: translateX(150vw); z-index: 2; transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1); mix-blend-mode: multiply;">
        
        <!-- The Dash Line -->
        <div id="html-dashline" style="position: absolute; bottom: 5%; left: 0; width: 100%; height: 2px; background: #000; z-index: 2; opacity: 0;"></div>

        <!-- The HTML Reveal Text (FUSION X) -->
        <div id="fusion-reveal-text" style="position: absolute; z-index: 3; opacity: 0; transform: scale(0.5); transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275); text-align: center; pointer-events: none; display: flex; align-items: center; gap: 20px;">
            <h1 style="font-size: 8rem; font-weight: 900; color: #111; letter-spacing: 5px; margin: 0; text-transform: uppercase;">
                FUSION
            </h1>
            <h1 id="html-x" style="font-size: 10rem; font-weight: 900; color: #111; margin: 0; position: relative;">
                X
                <!-- The blue digital glow inside the X -->
                <span id="x-glow" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: #00d4ff; filter: blur(8px); opacity: 0; transition: opacity 0.5s ease; z-index: -1;">X</span>
            </h1>
        </div>
        
        <p id="fusion-subtext" style="position: absolute; bottom: 15%; z-index: 3; color: #ff5722; font-size: 2rem; font-weight: bold; letter-spacing: 5px; text-transform: uppercase; opacity: 0; transition: opacity 1s ease;">UNLEASHED</p>
        
        <!-- Trigger Button -->
        <button id="trigger-shatter-btn" style="position: absolute; bottom: 20px; z-index: 4; background: #fff; border: 2px solid #111; color: #111; padding: 10px 20px; border-radius: 50px; cursor: pointer; text-transform: uppercase; font-weight: bold; transition: all 0.3s ease;">
            Initiate Sequence
        </button>
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the old fusion-shatter section
pattern = re.compile(r'<!-- 3D SHATTER SEQUENCE -->.*?</section>', re.DOTALL)
new_content = pattern.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(new_content)

print("HTML Replaced!")
