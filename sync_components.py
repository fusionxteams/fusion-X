import re

# 1. READ INDEX.HTML
with open('index.html', 'r', encoding='utf-8') as f:
    index_content = f.read()

# 2. EXTRACT OR CREATE FOOTER
# Since we know there is no footer, let's add one to index.html before the <script> tags at the end.
if '<footer' not in index_content.lower():
    footer_html = """
    <footer style="background-color: #111; color: white; text-align: center; padding: 60px 20px; font-family: 'Inter', sans-serif;">
        <h2 style="font-size: 2.5rem; margin-bottom: 10px; color: white;">FUSION X</h2>
        <p style="color: #ff5722; font-weight: bold; letter-spacing: 2px; margin: 0;">TAKE YOUR BRAND WORLDWIDE</p>
        <div style="margin: 30px 0;">
            <a href="index.html#home" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">HOME</a>
            <a href="about-us.html" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">ABOUT US</a>
            <a href="index.html#services" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">SERVICES</a>
            <a href="index.html#contact" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">LET'S CONNECT</a>
        </div>
        <p style="color: #666; font-size: 0.9rem; margin-top: 30px;">© 2026 Fusion X. All Rights Reserved.</p>
    </footer>
"""
    # Insert it right before the first <script> block at the very end
    # Or just replace </body> with the footer and then </body>
    index_content = index_content.replace('</body>', footer_html + '\n</body>')
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(index_content)
else:
    print("Footer already exists in index.html, extracting it.")

# Re-read to get the latest
with open('index.html', 'r', encoding='utf-8') as f:
    index_content = f.read()

# Extract Navbar
nav_match = re.search(r'(<nav class="navbar">.*?</nav>)', index_content, re.DOTALL | re.IGNORECASE)
if not nav_match:
    raise Exception("Could not find <nav class='navbar'> in index.html")
nav_html = nav_match.group(1)

# Extract Footer
footer_match = re.search(r'(<footer.*?</footer>)', index_content, re.DOTALL | re.IGNORECASE)
if not footer_match:
    raise Exception("Could not find <footer> in index.html")
footer_html = footer_match.group(1)

# 3. APPLY TO ABOUT-US.HTML
with open('about-us.html', 'r', encoding='utf-8') as f:
    about_content = f.read()

# Replace Navbar
about_content = re.sub(r'<nav class="navbar">.*?</nav>', nav_html, about_content, flags=re.DOTALL | re.IGNORECASE)

# Replace Footer
about_content = re.sub(r'<footer.*?</footer>', footer_html, about_content, flags=re.DOTALL | re.IGNORECASE)

with open('about-us.html', 'w', encoding='utf-8') as f:
    f.write(about_content)

print("Successfully synchronized navbar and footer across index.html and about-us.html")
