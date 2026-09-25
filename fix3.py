import re
js = open('about-us.html', 'r', encoding='utf-8').read()
js = js.replace('<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India">', '<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India" style="position: relative; overflow: hidden;">\n    <canvas id="canvas-cta" class="bg-canvas"></canvas>\n    <div style="position: relative; z-index: 2;">')
open('about-us.html', 'w', encoding='utf-8').write(js)
