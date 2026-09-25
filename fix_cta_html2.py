js = open('about-us.html', 'r', encoding='utf-8').read()
old_sect = '<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India">'
new_sect = '<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Agency India" style="position: relative; overflow: hidden;">\n    <canvas id="canvas-cta" class="bg-canvas"></canvas>\n    <div style="position: relative; z-index: 2;">'
js = js.replace(old_sect, new_sect)
open('about-us.html', 'w', encoding='utf-8').write(js)
