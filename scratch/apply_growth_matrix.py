import re

with open('about-us.html', 'r', encoding='utf-8') as f:
    html = f.read()

# 1. CSS for the Neural Growth Matrix HUD
hud_css = """
        /* ════════════════════════════════════════════════════════
           FUSION X NEURAL GROWTH ENGINE (HIGH SPEED & ATTRACTIVE)
           Replaces heavy 3D planetary spheres with 0-KB 120-FPS CSS/SVG Matrix
        ═════════════════════════════════════════════════════════ */
        .who-3d {
            height: 550px;
            border-radius: 28px;
            overflow: hidden;
            background: #080808 !important;
            border: 1px solid rgba(255, 87, 34, 0.25);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7), inset 0 0 40px rgba(255, 87, 34, 0.05);
            position: relative;
        }

        .growth-matrix-hud {
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 24px;
            box-sizing: border-box;
            user-select: none;
            overflow: hidden;
            background: radial-gradient(circle at 50% 50%, rgba(255, 87, 34, 0.12) 0%, rgba(8, 8, 8, 0.98) 70%);
        }

        .hud-bg-grid {
            position: absolute;
            inset: 0;
            background-size: 32px 32px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            pointer-events: none;
            z-index: 1;
        }

        .hud-ambient-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 280px;
            height: 280px;
            background: radial-gradient(circle, rgba(255, 87, 34, 0.22) 0%, transparent 70%);
            filter: blur(40px);
            pointer-events: none;
            z-index: 1;
        }

        /* Top HUD Bar */
        .hud-top-bar {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .hud-status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 5px 14px;
            backdrop-filter: blur(8px);
        }

        .hud-pulse-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 10px #10b981;
            animation: pulseGreenDot 2s infinite ease-in-out;
        }

        @keyframes pulseGreenDot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.85); }
        }

        .hud-status-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            color: #cbd5e1;
            letter-spacing: 1px;
        }

        .hud-chip-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            border-radius: 30px;
            padding: 5px 14px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.72rem;
            font-weight: 800;
            color: #ff7043;
            letter-spacing: 0.8px;
        }

        /* Circuit SVG */
        .hud-circuit-svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
        }

        .circuit-path {
            stroke: rgba(255, 87, 34, 0.22);
            stroke-width: 1.5;
            fill: none;
            stroke-dasharray: 4, 3;
            animation: circuitFlow 30s linear infinite;
        }

        @keyframes circuitFlow {
            from { stroke-dashoffset: 200; }
            to { stroke-dashoffset: 0; }
        }

        /* Pods Layer */
        .hud-pods-layer {
            position: absolute;
            inset: 0;
            z-index: 4;
            pointer-events: none;
        }

        .hud-pod-card {
            position: absolute;
            pointer-events: auto;
            background: rgba(18, 18, 18, 0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 87, 34, 0.25);
            border-radius: 14px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
            max-width: 175px;
        }

        .hud-pod-card:hover {
            transform: translateY(-3px) scale(1.04);
            border-color: #ff5722;
            background: rgba(26, 18, 15, 0.95);
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.35), 0 0 15px rgba(255, 87, 34, 0.2);
        }

        .pod-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(255, 87, 34, 0.14);
            border: 1px solid rgba(255, 87, 34, 0.35);
            color: #ff7043;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.88rem;
            flex-shrink: 0;
            transition: all 0.25s ease;
        }

        .hud-pod-card:hover .pod-icon {
            background: #ff5722;
            color: #ffffff;
            box-shadow: 0 0 12px #ff5722;
        }

        .pod-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .pod-name {
            font-family: 'Outfit', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pod-metric {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            color: #ff7043;
            letter-spacing: 0.5px;
        }

        /* Pod Positions (Desktop 540x550 Container) */
        .pod-top-left { top: 72px; left: 24px; }
        .pod-top-right { top: 72px; right: 24px; }
        .pod-mid-left { top: 220px; left: 16px; }
        .pod-mid-right { top: 220px; right: 16px; }
        .pod-bot-left { bottom: 95px; left: 24px; }
        .pod-bot-right { bottom: 95px; right: 24px; }

        /* Central Reactor Core */
        .hud-core-stage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 3;
            pointer-events: none;
        }

        .core-orbit-ring {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .ring-outer {
            width: 170px;
            height: 170px;
            border: 1px dashed rgba(255, 87, 34, 0.35);
            animation: spinRingClockwise 20s linear infinite;
        }

        .ring-mid {
            width: 130px;
            height: 130px;
            border: 1px solid rgba(255, 87, 34, 0.2);
            border-top-color: #ff5722;
            animation: spinRingCounter 12s linear infinite;
        }

        @keyframes spinRingClockwise {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes spinRingCounter {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }

        .core-center-reactor {
            width: 82px;
            height: 82px;
            border-radius: 50%;
            background: radial-gradient(circle, #25130d 0%, #110804 80%);
            border: 2px solid #ff5722;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 0 35px rgba(255, 87, 34, 0.45);
        }

        .core-logo-badge {
            width: 44px;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.8));
            position: relative;
            z-index: 2;
        }

        .core-energy-aura {
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 87, 34, 0.3) 0%, transparent 70%);
            animation: pulseCoreAura 3s ease-in-out infinite;
        }

        @keyframes pulseCoreAura {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.15); opacity: 0.9; }
        }

        .core-label-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(14, 14, 14, 0.9);
            border: 1px solid rgba(255, 87, 34, 0.4);
            border-radius: 30px;
            padding: 4px 12px;
            margin-top: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .core-pulse-beacon {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ff5722;
            box-shadow: 0 0 8px #ff5722;
            animation: pulseGreenDot 1.8s infinite;
        }

        #hud-active-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.7rem;
            font-weight: 800;
            color: #ff7043;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Bottom Telemetry Bar */
        .hud-bottom-telemetry {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: rgba(18, 18, 18, 0.88);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 10px 16px;
            width: 100%;
            box-sizing: border-box;
        }

        .telemetry-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }

        .telemetry-val {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
        }

        .telemetry-lbl {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.62rem;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.8px;
        }

        .telemetry-divider {
            width: 1px;
            height: 24px;
            background: rgba(255, 255, 255, 0.1);
        }

        /* Mobile Adaptability */
        @media (max-width: 900px) {
            .who-3d {
                height: 480px;
                border-radius: 20px;
            }
            .hud-circuit-svg {
                display: none;
            }
            .hud-pods-layer {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                position: relative;
                inset: auto;
                margin: 18px 0;
            }
            .hud-pod-card {
                position: relative;
                top: auto !important;
                left: auto !important;
                right: auto !important;
                bottom: auto !important;
                max-width: 100%;
                padding: 8px 10px;
            }
            .hud-core-stage {
                display: none;
            }
            .growth-matrix-hud {
                padding: 16px 14px;
                justify-content: flex-start;
                gap: 12px;
            }
        }
"""

# Inject CSS into <style> before </style>
if '#canvas-ecosystem { width: 100%; height: 100%; }' in html:
    html = html.replace('#canvas-ecosystem { width: 100%; height: 100%; }', hud_css)
    print("Replaced #canvas-ecosystem CSS with HUD CSS")
else:
    print("Warning: canvas-ecosystem CSS rule not found directly")

# 2. Replace HTML markup
old_markup = """        <div class="who-3d" aria-hidden="true">
            <canvas id="canvas-ecosystem"></canvas>
        </div>"""

with open('scratch/growth_matrix_template.py', 'r', encoding='utf-8') as f:
    template_code = f.read()

# Extract replacement_html
match_t = re.search(r"replacement_html\s*=\s*'''([\s\S]*?)'''", template_code)
replacement_html = match_t.group(1).strip()

new_markup = f"""        <div class="who-3d" aria-hidden="true">
{replacement_html}
        </div>"""

if old_markup in html:
    html = html.replace(old_markup, new_markup)
    print("Replaced who-3d HTML markup successfully")
else:
    print("Warning: old_markup not found directly")

# 3. Remove the heavy Three.js canvas-ecosystem script block
old_script_start = html.rfind('/*', 0, html.find('const cv = document.getElementById(\'canvas-ecosystem\');'))
old_script_end = html.find('})();', old_script_start) + 5

if old_script_start != -1 and old_script_end > old_script_start:
    script_snippet = html[old_script_start:old_script_end]
    print(f"Removing old Three.js ecosystem script ({len(script_snippet)} chars)")
    
    # Replace with lightweight hover interaction listener
    new_script = """/*  FUSION X NEURAL GROWTH ENGINE INTERACTION (0 KB WebGL)  */
(function () {
    const cards = document.querySelectorAll('.hud-pod-card');
    const label = document.getElementById('hud-active-label');
    if (!cards.length || !label) return;

    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const title = card.getAttribute('data-title') || 'GROWTH REACTOR';
            label.textContent = title;
            label.style.color = '#ffffff';
        });
        card.addEventListener('mouseleave', () => {
            label.textContent = 'GROWTH REACTOR';
            label.style.color = '#ff7043';
        });
        card.addEventListener('touchstart', () => {
            const title = card.getAttribute('data-title') || 'GROWTH REACTOR';
            label.textContent = title;
        }, { passive: true });
    });
})();"""
    html = html[:old_script_start] + new_script + html[old_script_end:]
    print("Replaced old Three.js ecosystem script with lightweight HUD interaction script")
else:
    print("Warning: Could not isolate old Three.js ecosystem script")

with open('about-us.html', 'w', encoding='utf-8') as f:
    f.write(html)

print("about-us.html successfully updated with high-speed Neural Growth Matrix!")
