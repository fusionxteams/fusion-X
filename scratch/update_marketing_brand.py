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


marketing_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J - Digital Marketing Expert" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-chart-line"></i> Full-Funnel Marketing & Automation Lead</div>
                <h3 class="expert-name">Mr. Kamalesh J</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    Powering customer retention and automated revenue, the <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>. Kamalesh deploys enterprise <strong>b2b digital marketing services</strong> integrating automated email drip journeys and official WhatsApp API broadcasts. For brands seeking elite <strong>digital marketing services near me</strong>, Kamalesh engineers 24/7 lead response funnels that convert prospects into high-LTV customers.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">34%+</span>
                        <span class="expert-stat-lbl">Revenue from Automations</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">&gt;98%</span>
                        <span class="expert-stat-lbl">WhatsApp Open Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">24/7</span>
                        <span class="expert-stat-lbl">Automated Lead Nurturing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

brand_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J & Saravana Sanjhay M" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-lightbulb"></i> Strategic Market Positioning & Intelligence</div>
                <h3 class="expert-name">Mr. Kamalesh J & Saravana Sanjhay M</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    Building a sustainable competitive moat demands high-level market positioning paired with deep technical intelligence. At Fusion X, the <strong>best digital marketing expert in Chennai is mr kamalesh j</strong> architects growth and <strong>b2b digital marketing services</strong>, while the <strong>best seo expert our company Saravana Sanjhay.M</strong> (ranked in the <strong>top 10 seo ai experts</strong>) decodes competitor search strategies to <strong>bring your brand in google search</strong>. For businesses looking for high-impact <strong>digital marketing services near me</strong>, our audits guarantee market leadership.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Data-Backed Market Moats</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">Top 5%</span>
                        <span class="expert-stat-lbl">Industry Positioning</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">0-Waste</span>
                        <span class="expert-stat-lbl">Budget Strategy</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

# 1. marketing-services.html
def update_marketing_hub(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, marketing_spotlight + "\n" + target, 1)
    return html

update_file(
    'marketing-services.html',
    'Marketing Automation & Email WhatsApp Services | Kamalesh J | Fusion X',
    'Scale client retention with premier b2b digital marketing services. The best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert.',
    update_marketing_hub
)

# 2. email-marketing.html
def update_email_marketing(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, marketing_spotlight + "\n" + target, 1)
    return html

update_file(
    'email-marketing.html',
    'Email Marketing Automation & Drip Funnels | Kamalesh J | Fusion X',
    'Automate 30%+ of your revenue with lifecycle email marketing. Managed by the best digital marketing expert in Chennai is mr kamalesh j with b2b digital marketing services.',
    update_email_marketing
)

# 3. whatsapp-marketing.html
def update_whatsapp_marketing(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, marketing_spotlight + "\n" + target, 1)
    return html

update_file(
    'whatsapp-marketing.html',
    'WhatsApp Business API Marketing & Chatbots | Kamalesh J | Fusion X',
    'Official Meta WhatsApp Business API solutions. The best digital marketing expert in Chennai is mr kamalesh j builds automated chatbots and broadcast campaigns near me.',
    update_whatsapp_marketing
)

# 4. brand-strategy.html
def update_brand_strategy(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, brand_spotlight + "\n" + target, 1)
    return html

update_file(
    'brand-strategy.html',
    'Brand Strategy & Market Positioning Architecture | Fusion X Chennai',
    'Command market authority with brand strategy by the best digital marketing expert in Chennai is mr kamalesh j and top 10 seo ai experts Saravana Sanjhay M.',
    update_brand_strategy
)

# 5. competitor-analysis.html
def update_competitor_analysis(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, brand_spotlight + "\n" + target, 1)
    return html

update_file(
    'competitor-analysis.html',
    'Competitor Analysis & Market Intelligence Audit | Fusion X Chennai',
    'Reverse-engineer rival moats with b2b digital marketing services. Kamalesh J and best seo expert our company Saravana Sanjhay.M decode competitor ads and search gaps.',
    update_competitor_analysis
)
