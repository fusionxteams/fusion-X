js = open('about-us.html', 'r', encoding='utf-8').read()

start_idx = js.find('<section id="scene-cta"')
end_idx = js.find('>', start_idx) + 1

new_start = js[start_idx:end_idx].replace('>', ' style="position: relative; overflow: hidden;">\n    <canvas id="canvas-cta" class="bg-canvas"></canvas>\n    <div style="position: relative; z-index: 2;">')

js = js[:start_idx] + new_start + js[end_idx:]

open('about-us.html', 'w', encoding='utf-8').write(js)
