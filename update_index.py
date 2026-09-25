import re

html_content = open('index.html', 'r', encoding='utf-8').read()

# 1. Update Hero (#home) to dark theme
html_content = re.sub(r'class="hero"', 'class="hero dark-theme"', html_content)

# 2. Update #impact (keep it white)
# 3. Update #services to dark theme
html_content = re.sub(r'<section id="services" class="services-section">', '<section id="services" class="services-section dark-theme">', html_content)
html_content = re.sub(r'<div id="spider-container" style="width: 100%; height: 700px; position: relative; background: #ffffff;">', '<div id="spider-container" style="width: 100%; height: 700px; position: relative; background: transparent;">', html_content)

# 4. #worldwide-delivery (keep it white)
# 5. #expertise to dark theme
html_content = re.sub(r'style="padding: 100px 20px; background-color: #fafafa; color: #333; line-height: 1\.6;"', 'style="padding: 100px 20px; background-color: #080808; color: #fff; line-height: 1.6;" class="dark-theme"', html_content)

# 6. #brands (keep it white)
# 7. #fusion-shatter to dark theme
html_content = re.sub(r'style="background: #ffffff; width: 100%; min-height: 60vh; padding: 20px 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden; position: relative;"', 'style="background: #080808; width: 100%; min-height: 60vh; padding: 20px 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden; position: relative;" class="dark-theme"', html_content)

# 8. #faq (keep it white, maybe #fafafa -> #ffffff)
html_content = re.sub(r'style="padding: 100px 20px; background-color: #fafafa; border-top: 1px solid #eee;"', 'style="padding: 100px 20px; background-color: #ffffff; border-top: 1px solid #eee;"', html_content)

open('index.html', 'w', encoding='utf-8').write(html_content)
print("Updated index.html")
