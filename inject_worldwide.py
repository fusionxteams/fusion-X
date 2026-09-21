import re

html_to_inject = """
    <!-- WORLDWIDE VISUAL REPRESENTATION -->
    <section id="worldwide-delivery" style="padding: 120px 20px; background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%); color: white; text-align: center; overflow: hidden; position: relative;">
        
        <!-- Radar/Pulse Visual Background -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; height: 100%; pointer-events: none; z-index: 1;">
            <div class="pulse-circle" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 300px; height: 300px; border-radius: 50%; border: 1px solid rgba(255, 87, 34, 0.4); animation: pulse 4s infinite cubic-bezier(0.215, 0.61, 0.355, 1);"></div>
            <div class="pulse-circle" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 600px; height: 600px; border-radius: 50%; border: 1px solid rgba(255, 87, 34, 0.2); animation: pulse 4s infinite cubic-bezier(0.215, 0.61, 0.355, 1); animation-delay: 1.3s;"></div>
            <div class="pulse-circle" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 900px; height: 900px; border-radius: 50%; border: 1px solid rgba(255, 87, 34, 0.05); animation: pulse 4s infinite cubic-bezier(0.215, 0.61, 0.355, 1); animation-delay: 2.6s;"></div>
        </div>

        <style>
            @keyframes pulse {
                0% { transform: translate(-50%, -50%) scale(0.5); opacity: 0; }
                50% { opacity: 1; }
                100% { transform: translate(-50%, -50%) scale(2); opacity: 0; }
            }
            .world-icon {
                font-size: 4rem;
                color: #ff5722;
                margin-bottom: 30px;
                position: relative;
                z-index: 2;
                filter: drop-shadow(0 0 20px rgba(255,87,34,0.6));
            }
            .worldwide-text {
                font-size: 3.5rem;
                font-weight: 800;
                line-height: 1.2;
                max-width: 900px;
                margin: 0 auto;
                position: relative;
                z-index: 2;
                background: linear-gradient(to right, #ffffff, #aaaaaa);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .worldwide-text span {
                color: #ff5722;
                -webkit-background-clip: unset;
                -webkit-text-fill-color: unset;
            }
            @media(max-width: 768px) {
                .worldwide-text { font-size: 2.2rem; }
            }
        </style>

        <div class="container" style="position: relative; z-index: 2;">
            <div class="world-icon">
                <i class="fas fa-globe-americas"></i>
                <i class="fas fa-broadcast-tower" style="font-size: 2rem; position: absolute; top: -15px; right: -25px; animation: pulse 2s infinite;"></i>
            </div>
            <h2 class="worldwide-text">We will deliver your brand <span>worldwide</span> through digital media.</h2>
        </div>
        
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

target = '<!-- DIGITAL MARKETING SEO SECTION -->'
if target in content:
    new_content = content.replace(target, html_to_inject + "\n    " + target)
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Section injected!")
else:
    print("Target not found.")
