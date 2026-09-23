import re

# ========================================================
# The ONE TRUE navbar & footer — copied char-for-char
# ========================================================
NAVBAR = '''    <nav class="navbar">
        <div class="logo-container">
            <a href="index.html">
                <img src="logo_transparent.png" alt="Fusion X Logo - Best Digital Marketing Agency" class="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.html#home">HOME</a></li>
            <li><a href="about-us.html">ABOUT US</a></li>
            <li><a href="index.html#services">SERVICES</a></li>
            <li><a href="index.html#brands">BRANDS</a></li>
            <li><a href="index.html#team">OUR TEAM</a></li>
            <li><a href="index.html#works">OUR WORKS</a></li>
            <li class="dangling-container">
                <a href="index.html#contact" class="nav-cta-btn">LET\'S CONNECT</a>
                <div class="charm-string">
                    <img src="logo_transparent.png" class="charm-object" alt="Fusion X Charm">
                </div>
            </li>
        </ul>
        <div class="hamburger">
            <svg viewBox="0 0 100 80" width="30" height="30">
                <rect width="100" height="15" rx="8" fill="#ff5722"></rect>
                <rect y="30" width="100" height="15" rx="8" fill="#ff5722"></rect>
                <rect y="60" width="100" height="15" rx="8" fill="#ff5722"></rect>
            </svg>
        </div>
    </nav>'''

FOOTER = '''    <footer style="background-color:#111;color:white;text-align:center;padding:60px 20px;font-family:\'Inter\',sans-serif;">
        <h2 style="font-size:2.5rem;margin-bottom:10px;color:white;">FUSION X</h2>
        <p style="color:#ff5722;font-weight:bold;letter-spacing:2px;margin:0;">TAKE YOUR BRAND WORLDWIDE</p>
        <div style="margin:30px 0;">
            <a href="index.html#home" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">HOME</a>
            <a href="about-us.html" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">ABOUT US</a>
            <a href="index.html#services" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">SERVICES</a>
            <a href="index.html#contact" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">LET\'S CONNECT</a>
        </div>
        <p style="color:#666;font-size:0.9rem;margin-top:30px;">© 2026 Fusion X. All Rights Reserved.</p>
    </footer>'''


def inject(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        html = f.read()

    # --- Replace ANY existing nav (class navbar or placeholder div) ---
    html = re.sub(r'<div id="navbar-placeholder"[^>]*>.*?</div>', NAVBAR, html, flags=re.DOTALL)
    html = re.sub(r'<nav class="navbar">.*?</nav>', NAVBAR, html, flags=re.DOTALL)

    # --- Replace ANY existing footer or placeholder ---
    html = re.sub(r'<div id="footer-placeholder"[^>]*>.*?</div>', FOOTER, html, flags=re.DOTALL)
    html = re.sub(r'<footer.*?</footer>', FOOTER, html, flags=re.DOTALL)

    # --- Remove the broken duplicate hamburger script that runs before navbar is injected ---
    html = re.sub(
        r'<script>\s*const hamburger.*?</script>',
        '',
        html,
        flags=re.DOTALL
    )

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(html)
    print(f"  OK Fixed: {filepath}")


print("Injecting identical navbar and footer into all pages...")
inject('index.html')
inject('about-us.html')
print("Done! Both pages now share byte-identical navbar and footer.")
