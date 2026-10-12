import re

# 1. Update index.html
with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace fusion-3d-box CSS
old_box_css = """            .fusion-3d-box {
                width: 100%;
                height: 480px;
                position: relative;
                cursor: grab;
                touch-action: none;
            }

            .fusion-3d-box:active {
                cursor: grabbing;
            }"""

new_box_css = """            .fusion-3d-box {
                width: 100%;
                height: 480px;
                position: relative;
                cursor: grab;
                touch-action: pan-y;
                max-width: 100%;
            }

            .fusion-3d-box canvas {
                max-width: 100% !important;
                width: 100% !important;
                height: 100% !important;
                display: block !important;
            }

            .fusion-3d-box:active {
                cursor: grabbing;
            }"""

if old_box_css in content:
    content = content.replace(old_box_css, new_box_css)
    print("Replaced old_box_css")
else:
    print("WARNING: old_box_css not found")

# Replace hint tag CSS
old_hint_css = """            .interaction-hint-tag {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.12);
                border-radius: 30px;
                padding: 8px 18px;
                font-family: 'Space Grotesk', sans-serif;
                font-size: 0.82rem;
                color: #cccccc;
                margin-top: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                pointer-events: none;
            }"""

new_hint_css = """            .interaction-hint-tag {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.12);
                border-radius: 30px;
                padding: 8px 18px;
                font-family: 'Space Grotesk', sans-serif;
                font-size: 0.82rem;
                color: #cccccc;
                margin-top: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                pointer-events: none;
                max-width: 95%;
                box-sizing: border-box;
                text-align: center;
            }

            .hint-text-mobile {
                display: none;
            }"""

if old_hint_css in content:
    content = content.replace(old_hint_css, new_hint_css)
    print("Replaced old_hint_css")
else:
    print("WARNING: old_hint_css not found")

# Replace cockpit responsive CSS
old_cockpit_css = """            /* Responsive Cockpit Layout */
            @media (max-width: 1100px) {
                .achieve-cockpit-grid {
                    grid-template-columns: 1fr;
                    gap: 36px;
                }
                .achieve-center-stage {
                    order: 1;
                }
                .achieve-col.left-col {
                    order: 2;
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 18px;
                }
                .achieve-col.right-col {
                    order: 3;
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 18px;
                }
                .fusion-3d-box {
                    height: 380px;
                    max-width: 480px;
                }
            }

            @media (max-width: 860px) {
                .achieve-col.left-col,
                .achieve-col.right-col {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 600px) {
                .achieve-col.left-col,
                .achieve-col.right-col {
                    grid-template-columns: 1fr;
                }
                .fusion-3d-box {
                    height: 310px;
                }
                .achieve-cockpit-grid {
                    gap: 22px;
                }
            }"""

new_cockpit_css = """            /* Responsive Cockpit Layout */
            @media (max-width: 1100px) {
                .achieve-cockpit-grid {
                    grid-template-columns: minmax(0, 1fr) !important;
                    width: 100% !important;
                    gap: 32px !important;
                }
                .achieve-center-stage {
                    order: 1;
                    width: 100% !important;
                    max-width: 100% !important;
                    min-width: 0 !important;
                }
                .model-canvas-wrapper {
                    width: 100% !important;
                    max-width: 100% !important;
                }
                .fusion-3d-box {
                    height: 440px !important;
                    max-width: 100% !important;
                    width: 100% !important;
                }
                .achieve-col.left-col {
                    order: 2;
                    display: grid;
                    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                    gap: 16px;
                    width: 100% !important;
                    min-width: 0 !important;
                }
                .achieve-col.right-col {
                    order: 3;
                    display: grid;
                    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                    gap: 16px;
                    width: 100% !important;
                    min-width: 0 !important;
                }
            }

            @media (max-width: 860px) {
                .achieve-col.left-col,
                .achieve-col.right-col {
                    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                }
                .fusion-3d-box {
                    height: 400px !important;
                }
            }

            @media (max-width: 600px) {
                .achieve-col.left-col,
                .achieve-col.right-col {
                    grid-template-columns: minmax(0, 1fr) !important;
                    width: 100% !important;
                }
                .achievement-card-box {
                    width: 100% !important;
                    max-width: 100% !important;
                    box-sizing: border-box !important;
                    padding: 22px 18px !important;
                }
                .card-desc-text {
                    word-break: normal !important;
                    overflow-wrap: break-word !important;
                }
                .fusion-3d-box {
                    height: 380px !important;
                    width: 100% !important;
                    max-width: 100% !important;
                }
                .achieve-cockpit-grid {
                    gap: 20px !important;
                    width: 100% !important;
                }
                .hint-text-full {
                    display: none !important;
                }
                .hint-text-mobile {
                    display: inline !important;
                }
                .interaction-hint-tag {
                    font-size: 0.74rem !important;
                    padding: 6px 14px !important;
                    gap: 6px !important;
                }
            }"""

if old_cockpit_css in content:
    content = content.replace(old_cockpit_css, new_cockpit_css)
    print("Replaced old_cockpit_css")
else:
    print("WARNING: old_cockpit_css not found")

# Replace hint tag markup
old_markup = """                        <!-- 3D Interactive Instruction Tag -->
                        <div class="interaction-hint-tag">
                            <span class="hint-pulse-dot"></span>
                            <i class="fas fa-compass" style="color:#ff5722;"></i>
                            <span>Interactive 3D Emblem • Move cursor or drag to tilt</span>
                        </div>"""

new_markup = """                        <!-- 3D Interactive Instruction Tag -->
                        <div class="interaction-hint-tag">
                            <span class="hint-pulse-dot"></span>
                            <i class="fas fa-compass" style="color:#ff5722;"></i>
                            <span class="hint-text-full">Interactive 3D Emblem • Move cursor or drag to tilt</span>
                            <span class="hint-text-mobile">Interactive 3D • Drag to tilt</span>
                        </div>"""

if old_markup in content:
    content = content.replace(old_markup, new_markup)
    print("Replaced hint markup")
else:
    print("WARNING: hint markup not found")

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)
print("index.html updated successfully!")
