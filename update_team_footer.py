import os

js = open('our-team.html', 'r', encoding='utf-8').read()

old_footer = '''    <footer>
        <p>c 2026 Fusion X Digital Marketing Agency.</p>
    </footer>'''

new_footer = '''    <footer>
        <h2 style="font-size:2rem;font-weight:900;letter-spacing:-1px;margin-bottom:6px;">FUSION X</h2>
        <p style="color:#ff5722;font-weight:700;letter-spacing:3px;font-size:0.78rem;text-transform:uppercase;margin-bottom:32px;">Take Your Brand Worldwide</p>
        <div style="margin-bottom:32px;">
            <a href="index.html#home" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Home</a>
            <a href="about-us.html" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">About</a>
            <a href="index.html#services" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Services</a>
            <a href="index.html#brands" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Brands</a>
            <a href="index.html#contact" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Connect</a>
        </div>
        <p style="color:#222;font-size:0.8rem;">© 2026 Fusion X Digital Marketing Agency. All Rights Reserved.</p>
    </footer>'''

if old_footer in js:
    open('our-team.html', 'w', encoding='utf-8').write(js.replace(old_footer, new_footer))
    print('Replaced footer.')
else:
    print('Failed to find footer.')
