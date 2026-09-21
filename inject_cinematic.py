import re

html_to_inject = """
    <!-- CINEMATIC SHATTER SEQUENCE -->
    <section id="fusion-shatter" style="background: #ffffff; width: 100%; height: 80vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; border-bottom: 3px solid #000; transition: background 0.3s ease;">
        
        <!-- Three.js Canvas for Lightning -->
        <div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></div>
        
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
            .text-dim {
                color: #333 !important;
                text-shadow: none !important;
                filter: grayscale(100%) brightness(30%);
            }
            #html-samurai {
                transition: transform 0.1s linear, opacity 0.2s ease;
                mix-blend-mode: multiply; /* Removes white background of the image */
            }
            /* The Slash Line */
            #slash-line {
                position: absolute;
                top: 50%;
                left: -10vw;
                width: 120vw;
                height: 4px;
                background: #fff;
                z-index: 6;
                transform: scaleX(0);
                transform-origin: left center;
                box-shadow: 0 0 10px #fff, 0 0 20px #00d4ff;
                opacity: 0;
            }
        </style>

        <!-- The User's Samurai Image -->
        <img id="html-samurai" src="assets/samurai.png" style="position: absolute; bottom: 5%; left: 5%; width: 250px; transform: scaleX(1); z-index: 5;">

        <!-- The Slash Line -->
        <div id="slash-line"></div>

        <!-- The HTML Reveal Text (FUSION X) -->
        <div id="fusion-reveal-text" style="position: absolute; z-index: 3; text-align: center; pointer-events: none; display: flex; align-items: center; gap: 20px; transition: all 0.3s ease;">
            <h1 id="html-fusion" class="text-3d" style="font-size: 8rem; font-weight: 900; color: #ff5722; letter-spacing: 5px; margin: 0; text-transform: uppercase; transition: all 0.3s ease;">
                FUSION
            </h1>
            <h1 id="html-x" class="text-3d" style="font-size: 10rem; font-weight: 900; color: #ff5722; margin: 0; position: relative; transition: all 0.3s ease;">
                X
                <!-- The blue digital glow inside the X -->
                <span id="x-glow" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: #00d4ff; filter: blur(8px); opacity: 1; transition: opacity 0.3s ease; z-index: -1;">X</span>
            </h1>
        </div>
        
        <!-- Trigger Button -->
        <button id="trigger-shatter-btn" style="position: absolute; bottom: 20px; z-index: 10; background: #fff; border: 2px solid #111; color: #111; padding: 10px 20px; border-radius: 50px; cursor: pointer; text-transform: uppercase; font-weight: bold; transition: all 0.3s ease;">
            Initiate Flash Step
        </button>
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the old fusion-shatter section
pattern = re.compile(r'<!-- SHATTER SEQUENCE -->.*?</section>', re.DOTALL)
content = pattern.sub(html_to_inject, content)
pattern2 = re.compile(r'<!-- CINEMATIC SHATTER SEQUENCE -->.*?</section>', re.DOTALL)
content = pattern2.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Cinematic HTML applied!")
