import re

html_to_inject = """
    <!-- SHATTER SEQUENCE -->
    <section id="fusion-shatter" style="background: #cceeff; width: 100%; height: 80vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; border-bottom: 3px solid #000;">
        
        <!-- Three.js Canvas for Lightning -->
        <div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></div>
        
        <!-- CSS Animation for the SVG Rig -->
        <style>
            @keyframes runCycle {
                0% { transform: rotate(45deg); }
                50% { transform: rotate(-45deg); }
                100% { transform: rotate(45deg); }
            }
            @keyframes runCycleAlt {
                0% { transform: rotate(-45deg); }
                50% { transform: rotate(45deg); }
                100% { transform: rotate(-45deg); }
            }
            @keyframes bobCycle {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }
            
            .is-running .limb-run {
                animation: runCycle 0.3s infinite linear;
            }
            .is-running .limb-run-alt {
                animation: runCycleAlt 0.3s infinite linear;
            }
            .is-running #samurai-rig-inner {
                animation: bobCycle 0.15s infinite linear;
            }
            
            /* Override running when slashing */
            .is-slashing .limb-run, .is-slashing .limb-run-alt {
                animation: none !important;
                transform: rotate(0deg);
                transition: transform 0.1s ease;
            }
            .is-slashing #right-arm {
                transform: rotate(140deg) !important;
                transition: transform 0.05s cubic-bezier(0.1, 0.9, 0.2, 1) !important;
            }
            .is-slashing #samurai-rig-inner {
                animation: none !important;
                transform: translateY(0) scale(1.1);
                transition: transform 0.1s ease;
            }
            
            .is-done #right-arm {
                transform: rotate(0deg);
                transition: transform 0.5s ease;
            }
        </style>

        <!-- The SVG Samurai Rig -->
        <div id="html-samurai" style="position: absolute; bottom: 10%; left: 50%; width: 250px; height: 250px; transform: translateX(100vw); z-index: 2;">
            <svg viewBox="0 0 100 100" style="width: 100%; height: 100%; overflow: visible;">
                <g id="samurai-rig-inner" transform="translate(50, 50)">
                    
                    <!-- Back Arm -->
                    <g class="limb-run-alt" style="transform-origin: 0px -10px;">
                        <rect x="-4" y="-10" width="8" height="25" fill="#222" rx="4" />
                    </g>
                    
                    <!-- Back Leg -->
                    <g class="limb-run-alt" style="transform-origin: 0px 20px;">
                        <rect x="-6" y="20" width="12" height="30" fill="#222" rx="6" />
                    </g>
                    
                    <!-- Torso -->
                    <path d="M -15 -15 L 15 -15 L 12 25 L -12 25 Z" fill="#111" />
                    <!-- Belt -->
                    <rect x="-13" y="15" width="26" height="4" fill="#ff5722" />
                    
                    <!-- Head -->
                    <g id="head">
                        <circle cx="0" cy="-25" r="10" fill="#111" />
                        <!-- Topknot -->
                        <path d="M -4 -35 C -15 -45, -15 -25, -2 -30 Z" fill="#111" />
                        <!-- Headband tail -->
                        <path d="M 8 -25 C 20 -20, 25 -30, 30 -15" stroke="#ff5722" stroke-width="2" fill="none" />
                    </g>
                    
                    <!-- Front Leg -->
                    <g class="limb-run" style="transform-origin: 0px 20px;">
                        <rect x="-6" y="20" width="12" height="30" fill="#000" rx="6" />
                    </g>
                    
                    <!-- Front Arm (Holding Sword) -->
                    <g id="right-arm" class="limb-run" style="transform-origin: 0px -10px;">
                        <rect x="-5" y="-10" width="10" height="25" fill="#000" rx="5" />
                        <!-- Katana Handle -->
                        <rect x="-2" y="10" width="4" height="15" fill="#555" />
                        <!-- Katana Handguard -->
                        <rect x="-5" y="23" width="10" height="3" fill="#ff5722" />
                        <!-- Katana Blade -->
                        <path d="M -1 26 L -1 90 L 1 90 L 1 26 Z" fill="#ddd" />
                        <path d="M -1 90 L 0 95 L 1 90 Z" fill="#ddd" />
                    </g>
                    
                </g>
            </svg>
        </div>

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
pattern = re.compile(r'<!-- SHATTER SEQUENCE -->.*?</section>', re.DOTALL)
new_content = pattern.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(new_content)

print("SVG HTML Replaced!")
