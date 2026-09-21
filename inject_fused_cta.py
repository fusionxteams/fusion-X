import re

html_to_inject = """
    <!-- FUSED SHATTER & CTA SEQUENCE -->
    <section id="fusion-shatter" style="background: #ffffff; width: 100%; min-height: 80vh; padding: 60px 20px; position: relative; overflow: hidden; display: flex; flex-direction: column; align-items: center; justify-content: center; border-bottom: 3px solid #000;">
        
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

        <!-- The HTML Reveal Text (FUSION then X) -->
        <div id="fusion-reveal-text" style="position: relative; z-index: 3; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; opacity: 0; transform: scale(0.5); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); margin-bottom: 50px;">
            <h1 id="html-fusion" class="text-3d" style="font-size: 6rem; line-height: 1; font-weight: 900; color: #ff5722; letter-spacing: 15px; margin: 0; text-transform: uppercase;">
                FUSION
            </h1>
            <h1 id="html-x" class="text-3d" style="font-size: 12rem; line-height: 1; font-weight: 900; color: #ff5722; margin: 0; margin-top: -20px; position: relative;">
                X
                <!-- The blue digital glow inside the X -->
                <span id="x-glow" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: #00d4ff; filter: blur(10px); opacity: 0; transition: opacity 0.3s ease; z-index: -1;">X</span>
            </h1>
        </div>
        
        <!-- Fused CTA Text -->
        <div id="cta-reveal-container" style="position: relative; z-index: 3; text-align: center; opacity: 0; transform: translateY(20px); transition: all 0.5s ease 0.5s;">
            <h2 style="font-size: 2.5rem; color: #ff5722; font-weight: 800; margin-bottom: 30px;">
                Ready to Skyrocket Your Brand's Success?
            </h2>
            
            <a href="#contact" style="display: inline-block; background: #ff5722; color: #fff; text-decoration: none; font-size: 1.2rem; font-weight: bold; padding: 15px 40px; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 15px rgba(255, 87, 34, 0.4); transition: transform 0.2s, box-shadow 0.2s;">
                Launch Project
            </a>
        </div>
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Remove the old shatter section and the old CTA banner
# The shatter section goes from <section id="fusion-shatter"> to </section>
# The CTA banner goes from <!-- NEW CTA BANNER --> to </section>
pattern1 = re.compile(r'<!-- ABSTRACT SHATTER SEQUENCE -->.*?</section>', re.DOTALL)
content = pattern1.sub('', content)

pattern2 = re.compile(r'<!-- NEW CTA BANNER -->.*?</section>', re.DOTALL)
content = pattern2.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Fused Section HTML applied!")
