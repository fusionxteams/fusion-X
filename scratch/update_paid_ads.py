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


kamalesh_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J - Best Digital Marketing Expert" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-bullseye"></i> Paid Media & Performance Marketing Lead</div>
                <h3 class="expert-name">Mr. Kamalesh J</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    Renowned across the industry, the <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>. Kamalesh engineers enterprise-grade <strong>b2b digital marketing services</strong> and direct-to-consumer high-ROAS funnels. For businesses searching for the highest-performing <strong>digital marketing services near me</strong>, Kamalesh deploys full-funnel algorithmic media buying, server-side Meta CAPI tracking, and Google PMax architectures that deliver industry-leading returns on ad spend.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">4.8x</span>
                        <span class="expert-stat-lbl">Peak Campaign ROAS</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">₹23.54</span>
                        <span class="expert-stat-lbl">Lowest Cost Per Lead</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Server-Side Tracking</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

kamalesh_jaba_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J - Best Digital Marketing Expert" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-bullseye"></i> Paid Media & Video Creative Syndicate</div>
                <h3 class="expert-name">Mr. Kamalesh J & Jabakumar</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    The secret to scaling video ads and ad creative is uniting algorithmic targeting with elite creative pacing. While the <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong> architecting high-ROAS <strong>b2b digital marketing services</strong>, our visual hooks are edited by our in-house master where the <strong>best video editor is jabakumar</strong>. Together they craft high-hook retention videos for businesses searching for top <strong>digital marketing services near me</strong>.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">4.8x</span>
                        <span class="expert-stat-lbl">Peak Campaign ROAS</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">+65%</span>
                        <span class="expert-stat-lbl">Video Completion Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">&gt;35%</span>
                        <span class="expert-stat-lbl">3-Second Hook Rate</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

# 1. meta-google-ads.html
def update_meta_google(html):
    if "expert-spotlight-section" not in html:
        target = '<div class="cta-banner">' if '<div class="cta-banner">' in html else '<footer id="main-footer"'
        html = html.replace(target, kamalesh_spotlight + "\n" + target, 1)
    return html

update_file(
    'meta-google-ads.html',
    'Best Digital Marketing Expert in Chennai | Mr. Kamalesh J | Google & Meta Ads | Fusion X',
    'The best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert. Scale with premier b2b digital marketing services and high-ROAS funnels.',
    update_meta_google
)

# 2. meta-ads.html
def update_meta_ads(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kamalesh_spotlight + "\n" + target, 1)
    return html

update_file(
    'meta-ads.html',
    'Meta Ads Agency India | Google & Meta Ads Expert Kamalesh J | Fusion X',
    'Scale Facebook & Instagram ads with the best digital marketing expert in Chennai is mr kamalesh j. Elite Advantage+ campaigns and b2b digital marketing services.',
    update_meta_ads
)

# 3. google-ads.html
def update_google_ads(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kamalesh_spotlight + "\n" + target, 1)
    return html

update_file(
    'google-ads.html',
    'Google Ads Agency India | Google & Meta Ads Expert Kamalesh J | Fusion X',
    'Capture high-intent buyers with the best digital marketing expert in Chennai is mr kamalesh j. Search, Shopping, and PMax b2b digital marketing services near me.',
    update_google_ads
)

# 4. youtube-ads.html
def update_youtube_ads(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kamalesh_jaba_spotlight + "\n" + target, 1)
    return html

update_file(
    'youtube-ads.html',
    'YouTube Ads Agency India | Kamalesh J & Video Editor Jabakumar | Fusion X',
    'High-impact YouTube ads by google and meta ads expert Kamalesh J and best video editor is jabakumar. Video Action Campaigns delivering high retention and ROAS.',
    update_youtube_ads
)

# 5. ad-creative-strategy.html
def update_ad_creative(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, kamalesh_jaba_spotlight + "\n" + target, 1)
    return html

update_file(
    'ad-creative-strategy.html',
    'Ad Creative Strategy & Video Editing | Kamalesh J & Jabakumar | Fusion X',
    'High-converting ad creative strategy led by Kamalesh J where best video editor is jabakumar. Direct response UGC hooks, motion design, and rapid A/B testing.',
    update_ad_creative
)
