import re

html = open('our-team.html', 'r', encoding='utf-8').read()

# 1. Increase .member-content max-width
html = re.sub(r'max-width:\s*500px;', 'max-width: 650px;', html)

# 2. Move props further away
html = html.replace('x: 6', 'x: 8')
html = html.replace('x: -6', 'x: -8')

# 3. Expand Content
kamalesh_new_desc = """Meet Kamalesh, the strategic powerhouse and our leading digital marketing expert in Chennai. With 4 years of elite industry experience, Kamalesh doesn't just run campaigns; he engineers digital ecosystems that generate predictable revenue and High ROAS value. He deeply analyzes competitor brands and formulates bespoke roadmaps for client growth. From crafting custom conversion tracking frameworks and laser-targeted local audience funnels to executing high-converting landing page CRO (Conversion Rate Optimization), he drives qualified buyer inquiries on auto-pilot. Trained by top industry experts at Digital Scholar, including Sorav Jain and Rishi Jain, he brings a deeply humanized approach to data analysis across Meta Ads and Google Ads."""

jaiharan_new_desc = """JaiHaran is the empathetic bridge between our clients and our creative execution team. With over 2 years of hands-on experience in client relationship management, he ensures that every founder's vision is heard, understood, and brought to life. He manages all client interactions and speaks directly to client needs, ensuring our social media management operations align perfectly with business goals. Beyond client success, JaiHaran is a multi-talented asset—he leverages his video editing skills for quick turnarounds and acts as our strict Quality Assurance (QA) lead, meticulously hunting down bugs across websites, Android apps, and iOS platforms before any project goes live."""

kannan_new_desc = """Kannan is the architectural mind behind our breathtaking digital experiences. As a highly skilled Web Designer and Certified React Developer at Fusion X with more than 2 years of specialized expertise in custom website design and Shopify storefront development, he merges stunning visual aesthetics with lightning-fast code. He dominates Core Web Vitals optimization, ensuring every pixel looks perfect while maintaining flawless backend architecture. Whether it's complex React state management or crafting seamless e-commerce checkout flows, Kannan builds digital properties that convert visitors into loyal customers."""

saravana_new_desc = """Saravana is our master of search visibility and organic growth. As a Certified Angular Developer and a highly sought-after technical SEO specialist, he brings over 2 years of experience in propelling brands to the absolute top of the search engine results pages (SERPs). He doesn't just chase vanity metrics; he excels in mapping user search intent to high-volume, low-difficulty semantic keywords. From dominating the Google Maps 3-Pack for local businesses to executing rigorous technical SEO audits that fix crawlability issues, Saravana ensures your brand captures high-intent organic traffic."""

jabakumar_new_desc = """Jabakumar is the visionary cinematic storyteller who captures the absolute soul of your brand on film. With 2 years of specialized experience in commercial video editing, motion graphics, and cinematic post-production, he understands how to make audiences feel something profound. He is our secret weapon for short-form video marketing across Instagram Reels and TikTok. By mastering advanced color grading, precise audio syncing, and retention-driven editing techniques, Jabakumar transforms raw footage into scroll-stopping masterpieces that hook viewers within the first three seconds."""

# Replacements
html = re.sub(r'(<h2 class="member-name">Kamalesh J</h2>.*?<div class="member-desc">)(.*?)(</div>)', r'\1\n                    ' + kamalesh_new_desc + r'\n                \3', html, flags=re.DOTALL)
html = re.sub(r'(<h2 class="member-name">JaiHaran K</h2>.*?<div class="member-desc">)(.*?)(</div>)', r'\1\n                    ' + jaiharan_new_desc + r'\n                \3', html, flags=re.DOTALL)
html = re.sub(r'(<h2 class="member-name">Kannan S</h2>.*?<div class="member-desc">)(.*?)(</div>)', r'\1\n                    ' + kannan_new_desc + r'\n                \3', html, flags=re.DOTALL)
html = re.sub(r'(<h2 class="member-name">Saravana S</h2>.*?<div class="member-desc">)(.*?)(</div>)', r'\1\n                    ' + saravana_new_desc + r'\n                \3', html, flags=re.DOTALL)
html = re.sub(r'(<h2 class="member-name">Jabakumar</h2>.*?<div class="member-desc">)(.*?)(</div>)', r'\1\n                    ' + jabakumar_new_desc + r'\n                \3', html, flags=re.DOTALL)

open('our-team.html', 'w', encoding='utf-8').write(html)
