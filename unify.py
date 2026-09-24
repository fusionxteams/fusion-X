import re

# 1. APPEND GLOBALLY REQUIRED NAVBAR CSS TO STYLE.CSS
with open('style.css', 'r', encoding='utf-8') as f:
    css_content = f.read()

# Only append if not already there
if '.dangling-container' not in css_content:
    nav_css = """
/* --- GLOBAL UNIFIED NAVBAR STYLES --- */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 5%;
    background: #ffffff !important;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    position: fixed;
    top: 0; left: 0; width: 100%;
    z-index: 1000;
    box-sizing: border-box;
}

.logo-container img { height: 40px; }

.nav-links {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0; padding: 0;
    gap: 30px;
}

.nav-links li a {
    text-decoration: none;
    color: #333;
    font-weight: 600;
    font-size: 15px;
    text-transform: uppercase;
    transition: color 0.3s;
}

.nav-links li a:hover, .nav-links li a.active {
    color: #ff5722;
}

.nav-cta-btn {
    background: #ff5722 !important;
    color: #fff !important;
    padding: 10px 25px !important;
    border-radius: 50px !important;
    font-weight: 800 !important;
    font-size: 15px !important;
    letter-spacing: 1px !important;
    box-shadow: 0 4px 15px rgba(255, 87, 34, 0.4) !important;
    transition: transform 0.2s, background 0.2s !important;
    display: inline-block;
}

.nav-cta-btn:hover {
    background: #e64a19 !important;
    transform: translateY(-2px);
}

.dangling-container { position: relative; display: flex; align-items: center; }
.charm-string {
    position: absolute; top: 35px; left: 50%; width: 2px; height: 70px;
    background: repeating-linear-gradient(to bottom, #ff5722, #ff5722 5px, #c24015 5px, #c24015 10px);
    transform-origin: top center; z-index: 100; pointer-events: none;
    animation: swing 3s ease-in-out infinite alternate;
}
.charm-object {
    position: absolute; top: 70px; left: -25px; width: 50px;
    filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)); transform-origin: top center;
}
@keyframes swing { 0% { transform: rotate(12deg); } 100% { transform: rotate(-12deg); } }

.hamburger { display: none; cursor: pointer; }
@media (max-width: 900px) {
    .nav-links { display: none; }
    .hamburger { display: block; }
    .charm-string { display: none !important; }
}
"""
    # Just append it to the bottom
    with open('style.css', 'a', encoding='utf-8') as f:
        f.write(nav_css)


def unify_html_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        html = f.read()
    
    # Replace existing <nav class="navbar">...</nav> with placeholder
    html = re.sub(r'<nav class="navbar">.*?</nav>', '<div id="navbar-placeholder"></div>', html, flags=re.DOTALL | re.IGNORECASE)
    
    # Replace existing <footer>...</footer> with placeholder
    html = re.sub(r'<footer.*?</footer>', '<div id="footer-placeholder"></div>', html, flags=re.DOTALL | re.IGNORECASE)
    
    # Ensure components.js is included right before </body>
    if '<script src="components.js"></script>' not in html:
        html = html.replace('</body>', '<script src="components.js"></script>\n</body>')
    
    # Strip any inline <style> block that contains .dangling-container to avoid conflicts
    # Let's use a simpler regex or just strip out the known blocks manually if needed.
    # A heavy-handed approach for about-us.html is to strip the /* ---------------- NAVBAR ---------------- */ section inside <style>
    html = re.sub(r'/\* -+ NAVBAR -+ \*/.*?(?=/\* -+ HERO)', '', html, flags=re.DOTALL | re.IGNORECASE)
    
    # For index.html, strip the inline styles defining .dangling-container and .nav-cta-btn
    html = re.sub(r'\.dangling-container\s*\{.*?\}(?=\s*\</style\>|\s*\.elegant-reveal|\s*\.charm-string)', '', html, flags=re.DOTALL)
    html = re.sub(r'\.charm-string\s*\{.*?\}', '', html, flags=re.DOTALL)
    html = re.sub(r'\.charm-string::before\s*\{.*?\}', '', html, flags=re.DOTALL)
    html = re.sub(r'\.charm-object\s*\{.*?\}', '', html, flags=re.DOTALL)
    html = re.sub(r'@media \(max-width: 768px\)\s*\{\s*\.charm-string\s*\{\s*display:\s*none\s*!important;\s*\}\s*\}', '', html, flags=re.DOTALL)
    html = re.sub(r'@keyframes swing\s*\{.*?\}', '', html, flags=re.DOTALL)
    html = re.sub(r'\.nav-cta-btn\s*\{.*?\}', '', html, flags=re.DOTALL)
    html = re.sub(r'\.nav-cta-btn:hover\s*\{.*?\}', '', html, flags=re.DOTALL)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(html)

unify_html_file('index.html')
unify_html_file('about-us.html')
print("HTML and CSS unified perfectly.")
