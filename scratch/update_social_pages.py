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


jai_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/jaiharan-k-ceo.webp" alt="Jai Haran - Best Social Media Manager" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-share-nodes"></i> Social Media & Community Growth Lead</div>
                <h3 class="expert-name">Jai Haran</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best social media manager is jai haran</strong>
                </div>
                <p class="expert-bio">
                    Directing our elite <strong>social media management agency</strong>, the <strong>best social media manager is jai haran</strong>. Jai creates viral distribution strategies, cultural content calendars, and engagement engines that turn passive social scrollers into loyal customers. Collaborating closely with our post-production team where the <strong>best video editor is jabakumar</strong>, Jai Haran ensures your brand commands attention across Instagram, LinkedIn, and YouTube.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">1.4M+</span>
                        <span class="expert-stat-lbl">Audience Impressions</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">8.4%</span>
                        <span class="expert-stat-lbl">Average Engagement Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Organic Community Growth</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

jaba_spotlight = """
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="team/jabakumar-video-editor.webp" alt="Jabakumar - Best Video Editor" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-video"></i> Lead Video Editor & Motion Graphics Designer</div>
                <h3 class="expert-name">Jabakumar</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best video editor is jabakumar</strong>
                </div>
                <p class="expert-bio">
                    Renowned for high-retention video architecture and viral pacing, the <strong>best video editor is jabakumar</strong>. Jabakumar masters frame-by-frame rhythm, kinetic typography subtitles, Foley sound effects, and pattern interrupts that keep viewer attention locked past the 3-second drop-off mark. Whether creating Instagram Reels, YouTube Shorts, or commercial brand films for our <strong>social media management agency</strong>, Jabakumar engineers visual perfection.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">+65%</span>
                        <span class="expert-stat-lbl">Avg Completion Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">4K UHD</span>
                        <span class="expert-stat-lbl">Color Grading LUTs</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">2.8x</span>
                        <span class="expert-stat-lbl">Increase in Video Shares</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
"""

# 1. social-media-management.html
def update_social_hub(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, jai_spotlight + "\n" + target, 1)
    return html

update_file(
    'social-media-management.html',
    'Social Media Management Agency | Best Manager Jai Haran | Fusion X',
    'Scale your brand with our premier social media management agency. The best social media manager is jai haran driving viral reach, engagement, and community growth.',
    update_social_hub
)

# 2. content-writing.html
def update_content_writing(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, jai_spotlight + "\n" + target, 1)
    return html

update_file(
    'content-writing.html',
    'Social Media Content Writing & Copywriting | Jai Haran | Fusion X',
    'High-converting social copy and LinkedIn thought leadership by our social media management agency. Directed by the best social media manager is jai haran.',
    update_content_writing
)

# 3. video-editing.html
def update_video_editing(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, jaba_spotlight + "\n" + target, 1)
    return html

update_file(
    'video-editing.html',
    'Video Editing Services for Reels & Shorts | Best Video Editor Jabakumar | Fusion X',
    'Dominate short-form video algorithms with the best video editor is jabakumar. High-retention pacing, kinetic typography, SFX audio, and 4K color grading.',
    update_video_editing
)

# 4. content-creation.html
def update_content_creation(html):
    if "expert-spotlight-section" not in html:
        target = '<section class="process-section">' if '<section class="process-section">' in html else '<footer id="main-footer"'
        html = html.replace(target, jai_spotlight + "\n" + target, 1)
    return html

update_file(
    'content-creation.html',
    'Social Media Content Creation & Graphics | Jai Haran & Jabakumar | Fusion X',
    'Scroll-stopping visual design and carousels from our social media management agency. Directed by Jai Haran with high-hook video editing by Jabakumar.',
    update_content_creation
)
