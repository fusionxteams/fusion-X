import re

files = [
    # Web Dev
    'website-development.html', 'portfolio-website.html', 'basic-website.html', 'ecommerce-website.html', 'landing-page.html', 'wedding-invitation.html',
    # SEO
    'seo-services.html', 'site-reworking.html', 'content-blogs.html', 'backlinks-guest-blogs.html', 'local-seo.html', 'social-video-seo.html', 'brand-analysis.html',
    # Paid Ads
    'meta-google-ads.html', 'meta-ads.html', 'google-ads.html', 'youtube-ads.html', 'ad-creative-strategy.html',
    # Social Media
    'social-media-management.html', 'content-writing.html', 'video-editing.html', 'content-creation.html',
    # Marketing
    'marketing-services.html', 'email-marketing.html', 'whatsapp-marketing.html',
    # Brand Strategy
    'brand-strategy.html', 'competitor-analysis.html'
]

for f in files:
    try:
        with open(f, 'r', encoding='utf-8') as fp:
            c = fp.read()
        t = re.search(r'<title>(.*?)</title>', c, re.DOTALL)
        d = re.search(r'<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']', c, re.DOTALL | re.IGNORECASE)
        print(f'{f}:')
        print('  TITLE:', t.group(1).strip() if t else 'NONE')
        print('  DESC :', d.group(1).strip() if d else 'NONE')
    except Exception as e:
        print(f'{f} ERROR: {e}')
