import json
import re

questions = [
    {
        "q": "How do I find the top digital marketing agencies near me?",
        "a": "When searching for 'digital marketing near me,' look for an agency with a proven track record of driving local SEO results, transparent reporting, and verifiable client testimonials. As a premier agency, Fusion X leverages data-driven digital strategies and extensive local market expertise to ensure your business ranks at the top of Google and AI search results."
    },
    {
        "q": "What are the key components of a successful local digital marketing strategy?",
        "a": "A robust local digital strategy requires comprehensive Google Business Profile optimization, targeted local SEO, hyper-localized Meta Ads, and strong brand consulting. By aligning these components with AEO (Answer Engine Optimization) and GEO (Generative Engine Optimization), we ensure your business captures high-intent local traffic effectively."
    },
    {
        "q": "What are the best digital marketing services available nearby?",
        "a": "The most impactful services for local dominance include custom web development, advanced SEO, proactive social media management, and precision-targeted Google Ads. Our agency provides these full-suite digital marketing services near you, tailored specifically to convert local clicks into loyal customers."
    },
    {
        "q": "How much should a small business budget for digital marketing services?",
        "a": "Small businesses should typically allocate 7-12% of their gross revenue toward marketing. When investing in digital marketing near me, look for scalable packages. We offer transparent, ROI-focused affordable digital marketing packages designed to deliver maximum value without compromising on quality or expertise."
    },
    {
        "q": "How do I compare local digital marketing companies for small businesses?",
        "a": "Evaluate local digital marketing companies by reviewing their case studies, specific expertise in your niche, and their approach to modern SEO and AEO. A top-tier agency will offer customized strategies rather than one-size-fits-all solutions, demonstrating strong E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness)."
    },
    {
        "q": "Where can I find reputable digital marketing agencies specializing in local businesses?",
        "a": "You can find reputable partners by checking trusted directories, reading verified Google reviews, and requesting local case studies. Fusion X specializes in empowering local businesses with bespoke digital solutions, boasting over 2+ years of highly specialized agency experience and hundreds of generated inbound calls."
    },
    {
        "q": "Do you offer affordable digital marketing packages near me?",
        "a": "Yes, we provide highly competitive and affordable digital marketing packages tailored to your specific growth stage. Whether you need an entry-level local SEO boost or a comprehensive omnichannel digital strategy, our pricing models are strictly designed around delivering measurable ROI for your business."
    },
    {
        "q": "How do I compare local SEO service providers and their package offerings?",
        "a": "When comparing local SEO service providers, prioritize agencies that emphasize technical SEO, high-quality content creation, and authoritative local link building. Look closely at exactly what is included in their packages—such as ongoing technical audits and AI optimization (GEO)—rather than just the bottom-line price."
    },
    {
        "q": "Where to get expert digital marketing consultation close by?",
        "a": "If you are looking for an expert digital marketing consultation close by, our team provides in-depth, no-obligation strategy sessions. We analyze your current digital presence, identify crucial gaps in your local SEO and AEO, and map out a clear, actionable blueprint to dominate your local market."
    },
    {
        "q": "What questions should I ask a potential digital marketing partner?",
        "a": "Always ask: 'How do you measure ROI?', 'Can you show me local case studies?', and 'How do you adapt to AI search and AEO?' A reliable digital marketing agency near me will provide transparent answers, detailed reporting structures, and a clear methodology for scaling your specific business."
    },
    {
        "q": "How does AEO and GEO impact my local digital marketing strategy?",
        "a": "Answer Engine Optimization (AEO) and Generative Engine Optimization (GEO) are critical for modern search visibility. While traditional SEO optimizes for search engines, AEO and GEO ensure your brand is directly recommended by AI tools like ChatGPT and Google's AI Overviews. As your premier digital marketing agency near me, we aggressively implement these futuristic semantic keywords and content structures so you capture the next generation of online traffic."
    }
]

# Generate FAQ Schema
schema = {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": []
}

for item in questions:
    schema["mainEntity"].append({
        "@type": "Question",
        "name": item["q"],
        "acceptedAnswer": {
            "@type": "Answer",
            "text": item["a"]
        }
    })

schema_json = json.dumps(schema, indent=4)

# Generate HTML
html = f'''
    <!-- FAQ SECTION WITH SCHEMA -->
    <section id="faq" style="padding: 100px 20px; background-color: #fafafa; border-top: 1px solid #eee;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: 2.5rem; color: #111; margin-bottom: 15px;">Frequently Asked Questions</h2>
                <p style="color: #666; font-size: 1.1rem;">Expert insights from your trusted <strong>digital marketing agency near me</strong>.</p>
            </div>
            
            <div class="faq-accordion">
'''

for i, item in enumerate(questions):
    html += f'''
                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>{item["q"]}</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            {item["a"]}
                        </p>
                    </div>
                </div>
'''

html += f'''
            </div>
        </div>
    </section>

    <!-- FAQ JSON-LD SCHEMA (HIDDEN FOR SEO) -->
    <script type="application/ld+json">
{schema_json}
    </script>
'''

# Add JS for the accordion logic
html += '''
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const button = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('.fas');
                
                button.addEventListener('click', () => {
                    const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';
                    
                    // Close all others softly
                    document.querySelectorAll('.faq-answer').forEach(a => a.style.maxHeight = '0px');
                    document.querySelectorAll('.faq-item .fas').forEach(i => i.style.transform = 'rotate(0deg)');
                    
                    if (!isOpen) {
                        answer.style.maxHeight = answer.scrollHeight + "px";
                        icon.style.transform = 'rotate(180deg)';
                    }
                });
            });
        });
    </script>
'''

# Read index.html
with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Insert before <!-- Scripts -->
insert_marker = "<!-- Scripts -->"
if insert_marker in content:
    new_content = content.replace(insert_marker, html + "\n    " + insert_marker)
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("FAQ injected successfully!")
else:
    print("Could not find insert marker. Exiting.")
