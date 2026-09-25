import re

html_path = 'about-us.html'
js = open(html_path, 'r', encoding='utf-8').read()

old_js = open('about-us-old.html', 'r', encoding='utf-8').read()
start_idx_old = old_js.find('HERO: Particle galaxy')
start_idx_old = old_js.rfind('/*', 0, start_idx_old)
end_idx_old = old_js.find('})();', start_idx_old) + 5
particle_script = old_js[start_idx_old:end_idx_old]

start_idx_new = js.find('/* LAYERED DIGITAL MARKETING 3D SCENE */')
end_idx_new = js.find('})();', start_idx_new) + 5
layered_scene_script = js[start_idx_new:end_idx_new]

# Swap back the hero script
js = js[:start_idx_new] + particle_script + js[end_idx_new:]

# 2. Modify `#scene-cta` HTML
old_cta = '''<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India">
    <span class="eyebrow">Ready to Dominate?</span>
    <h2 class="cta-h">Take Your Brand<br><span>Worldwide</span></h2>
    <p class="cta-sub">Whether you are a local Chennai startup or a global enterprise - Fusion X architects your digital dominance from day one.</p>
    <a href="index.html#contact" class="cta-btn">Let's Connect  </a>
</section>'''

new_cta = '''<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India" style="position: relative; overflow: hidden;">
    <canvas id="canvas-cta" class="bg-canvas"></canvas>
    <div style="position: relative; z-index: 2;">
        <span class="eyebrow">Ready to Dominate?</span>
        <h2 class="cta-h">Take Your Brand<br><span>Worldwide</span></h2>
        <p class="cta-sub">Whether you are a local Chennai startup or a global enterprise - Fusion X architects your digital dominance from day one.</p>
        <a href="index.html#contact" class="cta-btn">Let's Connect  </a>
    </div>
</section>'''

js = js.replace(old_cta, new_cta)

# 3. Add the layered script targeted at `#canvas-cta` instead of `#canvas-hero`
layered_scene_script = layered_scene_script.replace("getElementById('canvas-hero')", "getElementById('canvas-cta')")
layered_scene_script = layered_scene_script.replace("/* LAYERED DIGITAL MARKETING 3D SCENE */", "/* CTA SECTION LAYERED DIGITAL MARKETING 3D SCENE */")

# Find the end of the script block to append the new scene
idx_script_end = js.rfind('</script>')
js = js[:idx_script_end] + "\n" + layered_scene_script + "\n" + js[idx_script_end:]

open(html_path, 'w', encoding='utf-8').write(js)
