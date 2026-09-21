import re

html_to_inject = """
    <!-- NEW KINETIC SLAM ANIMATION SEQUENCE -->
    <section id="fusion-shatter" style="background: #ffffff; width: 100%; min-height: 60vh; padding: 100px 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden; position: relative;">
        
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
            .slam-letter {
                display: inline-block;
                opacity: 0;
                transform: scale(15) translateZ(0);
            }
            .is-slamming {
                animation: kineticSlam 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            }
            @keyframes kineticSlam {
                0% { transform: scale(15) translateY(-200px); opacity: 0; }
                50% { opacity: 1; }
                100% { transform: scale(1) translateY(0); opacity: 1; }
            }
            .screen-shake {
                animation: shake 0.3s cubic-bezier(.36,.07,.19,.97) both;
            }
            @keyframes shake {
                10%, 90% { transform: translate3d(-2px, 0, 0); }
                20%, 80% { transform: translate3d(3px, 0, 0); }
                30%, 50%, 70% { transform: translate3d(-6px, 0, 0); }
                40%, 60% { transform: translate3d(6px, 0, 0); }
            }
        </style>

        <!-- FUSION X Side by Side -->
        <div id="fusion-text-container" style="display: flex; align-items: center; justify-content: center; gap: 40px; margin-bottom: 60px;">
            <h1 class="text-3d" style="font-size: 8rem; font-weight: 900; color: #ff5722; margin: 0; text-transform: uppercase; display: flex; gap: 5px;">
                <span class="slam-letter">F</span>
                <span class="slam-letter">U</span>
                <span class="slam-letter">S</span>
                <span class="slam-letter">I</span>
                <span class="slam-letter">O</span>
                <span class="slam-letter">N</span>
            </h1>
            <h1 class="text-3d slam-letter" style="font-size: 10rem; font-weight: 900; color: #ff5722; margin: 0; position: relative;" id="x-letter">
                X
                <!-- The blue digital glow inside the X -->
                <span id="x-glow" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: #00d4ff; filter: blur(10px); opacity: 0; transition: opacity 0.3s ease; z-index: -1;">X</span>
            </h1>
        </div>
        
        <!-- Fused CTA Text -->
        <div id="cta-reveal-container" style="position: relative; z-index: 3; text-align: center; opacity: 0; transform: translateY(30px); transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
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

pattern = re.compile(r'<!-- FUSED SHATTER & CTA SEQUENCE -->.*?</section>', re.DOTALL)
content = pattern.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("Kinetic Slam HTML applied!")
