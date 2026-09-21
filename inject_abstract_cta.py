import re

html_to_inject = """
    <!-- ABSTRACT SHATTER SEQUENCE -->
    <section id="fusion-shatter" style="background: #ffffff; width: 100%; height: 60vh; position: relative; overflow: hidden; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        
        <!-- Three.js Canvas -->
        <div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none;"></div>
        
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
            .slash-line-abstract {
                position: absolute;
                top: 50%;
                left: -10vw;
                width: 120vw;
                height: 4px;
                background: #fff;
                z-index: 6;
                transform: scaleX(0) rotate(-15deg);
                transform-origin: center;
                box-shadow: 0 0 10px #fff, 0 0 20px #00d4ff;
                opacity: 0;
            }
        </style>

        <div id="abstract-slash" class="slash-line-abstract"></div>

        <!-- The HTML Reveal Text (X then FUSION) -->
        <div id="fusion-reveal-text" style="position: absolute; z-index: 3; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; opacity: 0; transform: scale(0.5); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
            <h1 id="html-x" class="text-3d" style="font-size: 12rem; line-height: 1; font-weight: 900; color: #ff5722; margin: 0; position: relative;">
                X
                <!-- The blue digital glow inside the X -->
                <span id="x-glow" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: #00d4ff; filter: blur(10px); opacity: 0; transition: opacity 0.3s ease; z-index: -1;">X</span>
            </h1>
            <h1 id="html-fusion" class="text-3d" style="font-size: 6rem; line-height: 1; font-weight: 900; color: #ff5722; letter-spacing: 15px; margin: 0; text-transform: uppercase; margin-top: -20px;">
                FUSION
            </h1>
        </div>
        
        <!-- Trigger Button -->
        <button id="trigger-shatter-btn" style="position: absolute; bottom: 20px; z-index: 10; background: #fff; border: 2px solid #111; color: #111; padding: 10px 30px; border-radius: 50px; cursor: pointer; text-transform: uppercase; font-weight: bold; letter-spacing: 2px; transition: all 0.3s ease;">
            Initiate Sequence
        </button>
    </section>

    <!-- NEW CTA BANNER -->
    <section style="background: linear-gradient(135deg, #4b2382, #6b33b8); width: 100%; padding: 80px 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; overflow: hidden;">
        <!-- Faint background pattern -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.05; background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <h2 style="position: relative; z-index: 2; font-size: 3rem; color: #fff; font-weight: 800; text-align: center; margin-bottom: 40px; display: inline-block;">
            <span style="background-color: #0044cc; padding: 5px 20px; line-height: 1.4; box-decoration-break: clone; -webkit-box-decoration-break: clone;">Ready to Skyrocket Your Brand's Success?</span>
        </h2>
        
        <a href="#contact" style="position: relative; z-index: 2; background: #ff4500; color: #fff; text-decoration: none; font-size: 1.2rem; font-weight: bold; padding: 15px 40px; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 15px rgba(255, 69, 0, 0.4); transition: transform 0.2s, box-shadow 0.2s;">
            Launch Project
        </a>
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

pattern = re.compile(r'<!-- 3D SHURIKEN SHATTER SEQUENCE -->.*?</section>', re.DOTALL)
content = pattern.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Abstract HTML and CTA Banner applied!")
