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


kannan_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/kannan-s-web-developer.webp" alt="Kannan S - Best Web Developer" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-code"></i> Lead Web Architect & Engineer</div>
                <h3 class="expert-name">Kannan S</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>Best webdeveloper for you buisneas Kannan S</strong>
                </div>
                <p class="expert-bio">
                    As Chief Web Architect, Kannan S ensures Fusion X remains the <strong>best web development company in india</strong>. Bypassing slow, bloated templates, Kannan writes bespoke, lightweight code tailored directly to your revenue goals. Whether engineering high-converting landing pages, custom Shopify flagships, or interactive portfolio hubs, every deployment is engineered for <strong>sub second Core Web Vitals</strong>, 95+ PageSpeed scores, and frictionless user journeys.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">98/100</span>
                        <span class="expert-stat-lbl">PageSpeed Mobile</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">&lt; 0.8s</span>
                        <span class="expert-stat-lbl">Core Web Vitals</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Bespoke Clean Code</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

bespoke_promise_portfolio = """
    <div class="content-section" style="padding-top: 0; padding-bottom: 30px;">
        <div class="bespoke-promise-box">
            <div class="bespoke-promise-icon"><i class="fa-solid fa-gem"></i></div>
            <div class="bespoke-promise-text">
                <h3>Our Bespoke Guarantee: We Will Do Better</h3>
                <p>
                    Where ordinary agencies deliver sluggish, cookie-cutter WordPress templates, Fusion X builds custom portfolio platforms from clean code. Even if you come to us for an executive or creative personal showcase with unique requirements, <strong>we will do better</strong> and <strong>we will do best in that</strong> — delivering interactive WebGL galleries, fluid mobile interactions, and unrivaled personal brand authority.
                </p>
            </div>
        </div>
    </div>
"""

bespoke_promise_wedding = """
    <div class="content-section" style="padding-top: 0; padding-bottom: 30px;">
        <div class="bespoke-promise-box">
            <div class="bespoke-promise-icon"><i class="fa-solid fa-heart"></i></div>
            <div class="bespoke-promise-text">
                <h3>Bespoke Invitation Craft: We Will Do Better</h3>
                <p>
                    While most vendors settle for static PDFs and clunky generic invitation links, Fusion X creates rich, interactive celebration experiences. For luxury wedding portals and digital event invitations, <strong>we will do better</strong> and <strong>we will do best in that</strong> with instant WhatsApp guest RSVP, real-time Google Maps venue routing, countdown clocks, and cinematic photo journeys.
                </p>
            </div>
        </div>
    </div>
"""

# 1. website-development.html
def update_website_dev(html):
    if "expert-spotlight-section" not in html:
        # insert before process-section or before main-footer / cta
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kannan_spotlight + "\n" + target, 1)
    # Ensure bolding of target keywords
    html = re.sub(r'best web development company in india', '<strong>best web development company in india</strong>', html, flags=re.I)
    html = re.sub(r'best webdeveloper for you buisneas Kannan S', '<strong>best webdeveloper for you buisneas Kannan S</strong>', html, flags=re.I)
    return html

update_file(
    'website-development.html',
    'Best Web Development Company in India | Kannan S Web Architecture | Fusion X',
    'Fusion X is the best web development company in india. Led by the best webdeveloper for you buisneas Kannan S, we build blazing-fast Shopify stores, WordPress, and custom web apps with Core Web Vitals 95+.',
    update_website_dev
)

# 2. portfolio-website.html
def update_portfolio_dev(html):
    if "bespoke-promise-box" not in html:
        html = html.replace('<main class="content-section">', '<main class="content-section">\n' + bespoke_promise_portfolio, 1)
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kannan_spotlight + "\n" + target, 1)
    return html

update_file(
    'portfolio-website.html',
    'Portfolio Website Design | Best Web Developer Kannan S | Fusion X',
    'Custom portfolio websites engineered by the best web development company in india. The best webdeveloper for you buisneas Kannan S builds bespoke, high-converting portfolio showcases.',
    update_portfolio_dev
)

# 3. basic-website.html
def update_basic_dev(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kannan_spotlight + "\n" + target, 1)
    return html

update_file(
    'basic-website.html',
    'Business Website Development | Best Web Developer Kannan S | Fusion X',
    'Professional business websites by the best web development company in india. The best webdeveloper for you buisneas Kannan S builds fast, SEO-ready WordPress and HTML5 web platforms.',
    update_basic_dev
)

# 4. ecommerce-website.html
def update_ecommerce_dev(html):
    kannan_ecom = kannan_spotlight.replace(
        "Kannan S remains the",
        "Kannan S ensures Fusion X leads as the <strong>best web development company in india</strong>, collaborating with Saravana Sanjhay M to deliver the <strong>best ecommerce seo services in india</strong>. Together they create lightning-fast Shopify and WooCommerce stores with 1-click checkouts and top Google rankings. Kannan S is recognized as the"
    )
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kannan_ecom + "\n" + target, 1)
    return html

update_file(
    'ecommerce-website.html',
    'E-Commerce Website Development & SEO | Best Web Developer Kannan S | Fusion X',
    'Scale e-commerce sales with the best web development company in india. The best webdeveloper for you buisneas Kannan S delivers custom Shopify stores paired with the best ecommerce seo services in india.',
    update_ecommerce_dev
)

# 5. landing-page.html
def update_landing_dev(html):
    kannan_landing = kannan_spotlight.replace(
        "Kannan S remains the",
        "Kannan S ensures Fusion X remains the <strong>best web development company in india</strong>, designing high-converting landing pages tailored for campaigns by Google and Meta ads expert Kamalesh J. Kannan is celebrated as the"
    )
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kannan_landing + "\n" + target, 1)
    return html

update_file(
    'landing-page.html',
    'High-Converting Landing Page Design | Best Web Developer Kannan S | Fusion X',
    'High-converting landing pages engineered by the best web development company in india. The best webdeveloper for you buisneas Kannan S builds sub-second pages for high-ROAS ad campaigns.',
    update_landing_dev
)

# 6. wedding-invitation.html
def update_wedding_dev(html):
    if "bespoke-promise-box" not in html:
        html = html.replace('<main class="content-section">', '<main class="content-section">\n' + bespoke_promise_wedding, 1)
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kannan_spotlight + "\n" + target, 1)
    return html

update_file(
    'wedding-invitation.html',
    'Luxury Wedding Digital Invitations & E-Invites | Fusion X Chennai',
    'Bespoke digital luxury wedding invitations by the best web development company in india. Kannan S crafts interactive 3D RSVPs, WhatsApp sync, and Google Maps venue navigation.',
    update_wedding_dev
)
