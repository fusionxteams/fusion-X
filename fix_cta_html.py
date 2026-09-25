js = open('about-us.html', 'r', encoding='utf-8').read()

start_idx = js.find('<section id="scene-cta"')
end_idx = js.find('</section>', start_idx) + 10
old_str = js[start_idx:end_idx]

new_str = old_str.replace('<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India">', '<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India" style="position: relative; overflow: hidden;">\n    <canvas id="canvas-cta" class="bg-canvas"></canvas>\n    <div style="position: relative; z-index: 2;">')
new_str = new_str.replace('</section>', '    </div>\n</section>')

js = js[:start_idx] + new_str + js[end_idx:]

open('about-us.html', 'w', encoding='utf-8').write(js)
