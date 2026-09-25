import glob
import re

robust_footer = '''    <footer style="background-color:#111;color:white;text-align:center;padding:60px 20px;font-family:'Space Grotesk',sans-serif;position:relative;z-index:100;width:100%;box-sizing:border-box;">
        <h2 style="font-size:2.5rem;margin-bottom:10px;color:white;font-family:'Outfit',sans-serif;font-weight:900;">FUSION X</h2>
        <p style="color:#ff5722;font-weight:bold;letter-spacing:2px;margin:0;text-transform:uppercase;">TAKE YOUR BRAND WORLDWIDE</p>
        <div style="margin:30px 0; display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
            <a href="index.html#home" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">HOME</a>
            <a href="about-us.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">ABOUT US</a>
            <a href="services.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">SERVICES</a>
            <a href="brands.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">BRANDS</a>
            <a href="contact.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">LET'S CONNECT</a>
        </div>
        <p style="color:#666;font-size:0.9rem;margin-top:30px;">© 2026 Fusion X Digital Marketing Agency. All Rights Reserved.</p>
    </footer>'''

for file in glob.glob('*.html'):
    js = open(file, 'r', encoding='utf-8').read()
    
    # We will just replace everything from <footer> to </footer>
    new_js = re.sub(r'<footer.*?</footer>', robust_footer, js, flags=re.DOTALL)
    if new_js != js:
        open(file, 'w', encoding='utf-8').write(new_js)
        print(f'Updated footer in {file}')
