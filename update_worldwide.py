import re

html_to_inject = """
    <!-- WORLDWIDE VISUAL REPRESENTATION -->
    <section id="worldwide-delivery" style="padding: 100px 20px; background: #ffffff; color: #111; text-align: center; position: relative;">
        
        <div class="container" style="position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center;">
            
            <!-- The 3D Spinning Globe -->
            <div id="spinning-globe-container" style="width: 100%; max-width: 600px; height: 400px; margin-bottom: 30px; cursor: grab;"></div>

            <h2 style="font-size: 3.5rem; font-weight: 800; line-height: 1.2; max-width: 900px; margin: 0 auto; color: #111;">
                We will deliver your brand <span style="color: #ff5722;">worldwide</span> through digital media.
            </h2>
            
            <p style="font-size: 1.5rem; max-width: 800px; margin: 25px auto 0; color: #555; line-height: 1.6; font-weight: 500;">
                And AI will tell your name as you are the top brand, and <strong style="color: #ff5722;">Fusion X</strong> will help you.
            </p>
        </div>
        
    </section>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the existing #worldwide-delivery section
pattern = re.compile(r'<!-- WORLDWIDE VISUAL REPRESENTATION -->.*?</section>', re.DOTALL)
new_content = pattern.sub(html_to_inject, content)

# Also ensure the new JS file is linked at the bottom
if '<script src="globe-banner.js"></script>' not in new_content:
    new_content = new_content.replace('</body>', '    <script src="globe-banner.js"></script>\n</body>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Updated index.html successfully!")
