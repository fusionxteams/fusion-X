import re

pages = ['about-us.html', 'bhawani-corner.html', 'nilaro.html', 'energy-bags.html', 'truly-yours.html']

for p in pages:
    with open(p, 'r', encoding='utf-8') as f:
        html = f.read()
    
    style_blocks = re.findall(r'<style[^>]*>(.*?)</style>', html, re.DOTALL)
    all_css = "\n".join(style_blocks)
    
    print(f"=== {p} ===")
    print("  footer-grid in CSS:", ".footer-grid" in all_css or "footer-grid" in all_css)
    print("  footer-mini-map-box in CSS:", "footer-mini-map-box" in all_css)
    print("  footer-bottom-bar in CSS:", "footer-bottom-bar" in all_css)
    print("  footer-links-list in CSS:", "footer-links-list" in all_css)
    print("  footer HTML present:", "<footer" in html and "</footer>" in html)
