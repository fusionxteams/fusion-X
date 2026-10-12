import re

def update_file(filepath, title, desc, custom_content_func):
    with open(filepath, 'r', encoding='utf-8') as f:
        html = f.read()

    # Update Title
    html = re.sub(r'<title>.*?</title>', f'<title>{title}</title>', html, flags=re.DOTALL)
    
    # Update Meta Description
    html = re.sub(r'<meta\s+name=["\']description["\']\s+content=["\'].*?["\']', 
                  f'<meta name="description" content="{desc}"', html, flags=re.DOTALL | re.IGNORECASE)
    
    # Run custom transformations
    html = custom_content_func(html)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(html)
    print(f"Updated {filepath} successfully.")


sanjhay_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/saravana-sanjhay-m-seo-expert.webp" alt="Saravana Sanjhay M - Best SEO Expert" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-magnifying-glass-chart"></i> Technical SEO & AI Search Lead</div>
                <h3 class="expert-name">Saravana Sanjhay M</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best seo expert our company Saravana Sanjhay.M</strong>
                </div>
                <p class="expert-bio">
                    Recognized among the <strong>top 10 seo ai experts</strong> in India, Saravana Sanjhay M leads Fusion X with deep mastery of <strong>technical seo vs on page seo</strong>. His proprietary systems are engineered to <strong>bring your brand in google search</strong> and sustainably <strong>bring organic traffic</strong> that accelerates client revenue. When ambitious brands choose to <strong>hire seo expert in india</strong>, Saravana ensures cutting-edge <strong>ai seo done to bring in ai search</strong> (ChatGPT Search, Perplexity AI, Google Gemini, and AI Overviews), alongside delivering the <strong>best ecommerce seo services in india</strong> for high-converting stores.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">+280%</span>
                        <span class="expert-stat-lbl">Avg Organic Traffic Lift</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">Top 3</span>
                        <span class="expert-stat-lbl">Maps 3-Pack Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">White-Hat & AI Entity SEO</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

# 1. seo-services.html
def update_seo_services(html):
    if "expert-spotlight-section" not in html:
        target = '<footer id="main-footer"' if '<footer id="main-footer"' in html else '</main>'
        html = html.replace(target, sanjhay_spotlight + "\n" + target, 1)
    return html

update_file(
    'seo-services.html',
    'Best SEO Expert in India | Saravana Sanjhay M | Top 10 SEO AI Experts | Fusion X',
    'Hire the best seo expert our company Saravana Sanjhay.M to bring your brand in google search and bring organic traffic. Ranked in top 10 seo ai experts with elite ai seo done to bring in ai search.',
    update_seo_services
)

# 2. site-reworking.html
def update_site_reworking(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, sanjhay_spotlight + "\n" + target, 1)
    return html

update_file(
    'site-reworking.html',
    'Technical SEO vs On Page SEO & Site Reworking | Saravana Sanjhay M | Fusion X',
    'Master technical seo vs on page seo with site reworking by Saravana Sanjhay M. Clean crawl bloat, speed up Core Web Vitals, and bring your brand in google search.',
    update_site_reworking
)

# 3. content-blogs.html
def update_content_blogs(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, sanjhay_spotlight + "\n" + target, 1)
    return html

update_file(
    'content-blogs.html',
    'SEO Content Writing & Blogs | Best SEO Expert Saravana Sanjhay M | Fusion X',
    'Topical authority blogs to bring your brand in google search and bring organic traffic. Managed by Saravana Sanjhay M with advanced ai seo done to bring in ai search.',
    update_content_blogs
)

# 4. backlinks-guest-blogs.html
def update_backlinks(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, sanjhay_spotlight + "\n" + target, 1)
    return html

update_file(
    'backlinks-guest-blogs.html',
    'Authority Backlinks & Digital PR | Hire SEO Expert in India | Fusion X',
    'Secure high-DA editorial backlinks. Hire seo expert in india Saravana Sanjhay M to build domain authority, outrank rivals, and bring organic traffic.',
    update_backlinks
)

# 5. local-seo.html
def update_local_seo(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, sanjhay_spotlight + "\n" + target, 1)
    return html

update_file(
    'local-seo.html',
    'Local SEO & Google Maps 3-Pack | Best SEO Expert Saravana Sanjhay M | Fusion X',
    'Dominate Google Maps local 3-pack rankings. Best seo expert our company Saravana Sanjhay.M helps bring your brand in google search for hyper-local customer calls.',
    update_local_seo
)

# 6. social-video-seo.html
def update_video_seo(html):
    video_seo_spotlight = sanjhay_spotlight.replace(
        "Kannan S", "Jabakumar"
    ).replace(
        "delivering the <strong>best ecommerce seo services in india</strong>",
        "collaborating with our video team where <strong>best video editor is jabakumar</strong> to engineer high-retention cuts that maximize YouTube and Instagram algorithmic watch time"
    )
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, video_seo_spotlight + "\n" + target, 1)
    return html

update_file(
    'social-video-seo.html',
    'YouTube & Instagram Video SEO | Saravana Sanjhay M & Jabakumar | Fusion X',
    'Rank on YouTube and Instagram explore algorithms. Saravana Sanjhay M and best video editor is jabakumar maximize retention, tags, and algorithmic search reach.',
    update_video_seo
)

# 7. brand-analysis.html
def update_brand_analysis(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, sanjhay_spotlight + "\n" + target, 1)
    return html

update_file(
    'brand-analysis.html',
    'Brand Analysis & EEAT Audit | Top 10 SEO AI Experts | Fusion X',
    'In-depth brand EEAT audit led by Saravana Sanjhay M, ranked in the top 10 seo ai experts. Identify search gaps, technical crawl leaks, and AI citation readiness.',
    update_brand_analysis
)
