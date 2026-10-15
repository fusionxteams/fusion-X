<?php
/**
 * Fusion X Theme Footer
 *
 * @package Fusion_X
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    <footer id="main-footer" class="site-footer">
        <div class="footer-container">
            <div class="footer-grid">
                
                <!-- Col 1: Brand & Socials -->
                <div class="footer-col footer-col-brand">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/logo_transparent.png' ); ?>" alt="Fusion X Logo" class="footer-logo">
                    </a>
                    <p class="footer-brand-desc">
                        India's premier digital performance agency - engineering high-ROAS paid media funnels, technical SEO dominance, bespoke web applications, and enterprise brand strategies.
                    </p>
                    <div class="footer-social-links">
                        <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram" class="footer-social-btn"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn" class="footer-social-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook" class="footer-social-btn"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://youtube.com" target="_blank" rel="noopener" aria-label="YouTube" class="footer-social-btn"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://wa.me/919600096973" target="_blank" rel="noopener" aria-label="WhatsApp" class="footer-social-btn"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Col 2: Services List -->
                <div class="footer-col">
                    <h4 class="footer-heading">SERVICES</h4>
                    <ul class="footer-links-list">
                        <li><a href="<?php echo esc_url( home_url( '/meta-ads/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Meta &amp; Performance Ads</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/google-ads/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Google &amp; PMax Ads</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/website-development/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Website Development</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/seo-services/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> SEO Services</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/whatsapp-marketing/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> WhatsApp Marketing API</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/brand-strategy/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Brand Strategy</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/youtube-ads/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> YouTube Ads &amp; Shorts</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/ad-creative-strategy/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Ad Creative Strategy</a></li>
                    </ul>
                </div>

                <!-- Col 3: Quick Links (All Navbar) -->
                <div class="footer-col">
                    <h4 class="footer-heading">QUICK LINKS</h4>
                    <ul class="footer-links-list">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Home</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> About Us</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/brands/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Brands We Worked</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Services</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Our Team</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Portfolio</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Blog</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Careers</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Let's Connect</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact, Address & Mini Map -->
                <div class="footer-col footer-col-contact">
                    <h4 class="footer-heading">CONTACT &amp; LOCATION</h4>
                    <ul class="footer-contact-info">
                        <li>
                            <i class="fa-solid fa-location-dot footer-contact-icon"></i>
                            <span>RC Enclave, Selvam Nagar Extn, Ponniammanmedu, Chennai 600110</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone footer-contact-icon"></i>
                            <a href="tel:+919600096973">+91 96000 96973</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope footer-contact-icon"></i>
                            <a href="mailto:fusionxteams@gmail.com">fusionxteams@gmail.com</a>
                        </li>
                    </ul>
                    <div class="footer-mini-map-box">
                        <iframe 
                            title="Fusion X Chennai Location"
                            src="https://maps.google.com/maps?q=RC%20Enclave%2C%20Selvam%20Nagar%20Extn%2C%20Ponniammanmedu%2C%20Chennai%20600110&t=&z=14&ie=UTF8&iwloc=&output=embed" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom Bar -->
            <div class="footer-bottom-bar">
                <p>&copy; <?php echo date('Y'); ?> Fusion X Digital Marketing Company. All Rights Reserved.</p>
                <div class="footer-bottom-links">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Privacy Policy</a>
                    <span>•</span>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Terms of Service</a>
                    <span>•</span>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- =======================================================================
         ENTRANCE POPUP LEAD GENERATION MODAL
         ======================================================================= -->
    <div id="fx-entrance-popup" class="fx-popup-overlay" style="display:none;" aria-hidden="true">
        <div class="fx-popup-backdrop" id="fx-popup-backdrop"></div>
        <div class="fx-popup-modal">
            <button class="fx-popup-close" id="fx-popup-close-btn" aria-label="Close dialog">&times;</button>
            
            <div class="fx-popup-header">
                <span class="fx-popup-tag"><i class="fa-solid fa-bolt"></i> EXCLUSIVE AUDIT INVITATION</span>
                <h3 class="fx-popup-heading">Claim Your Free AI &amp; Digital Growth Audit</h3>
                <p class="fx-popup-sub">
                    Get an exhaustive audit of your brand's AI search visibility (ChatGPT &amp; Gemini), paid ad ROAS leaks, and keyword expansion roadmap.
                </p>
            </div>

            <form id="fx-entrance-popup-form" class="fx-popup-form-body">
                <input type="hidden" name="action" value="fusion_x_submit_form">
                <input type="hidden" name="form_type" value="Entrance Popup Form">
                <input type="hidden" name="source_page" value="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ); ?>">

                <div class="fx-p-group">
                    <label>Full Name *</label>
                    <input type="text" name="name" class="fx-p-input" placeholder="e.g. Vikramaditya Verma" required>
                </div>

                <div class="fx-p-row">
                    <div class="fx-p-group">
                        <label>Business Email *</label>
                        <input type="email" name="email" class="fx-p-input" placeholder="vikram@brand.com" required>
                    </div>
                    <div class="fx-p-group">
                        <label>Phone / WhatsApp *</label>
                        <input type="tel" name="phone" class="fx-p-input" placeholder="+91 98765 43210" required>
                    </div>
                </div>

                <div class="fx-p-group">
                    <label>Core Growth Goal / Service Needed *</label>
                    <select name="service" class="fx-p-select" required>
                        <option value="AI Search (AEO & GEO) + Technical SEO">AI Search (AEO &amp; GEO) + Technical SEO</option>
                        <option value="Meta Ads & Google Performance Max Scaling">Meta Ads &amp; Google Performance Max Scaling</option>
                        <option value="High-Speed Custom Website / Shopify Plus">High-Speed Custom Website / Shopify Plus</option>
                        <option value="WhatsApp Business API & CRM Automation">WhatsApp Business API &amp; CRM Automation</option>
                        <option value="Full Agency Performance Retainer">Full Agency Performance Retainer</option>
                    </select>
                </div>

                <div class="fx-p-group">
                    <label>Company Name or Website URL (Optional)</label>
                    <input type="text" name="message" class="fx-p-input" placeholder="https://yourbrand.com or monthly budget">
                </div>

                <button type="submit" class="fx-p-submit-btn" id="fx-p-btn">
                    <span>TRANSMIT AUDIT REQUEST</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

                <div id="fx-popup-status" class="fx-p-status" style="display:none;"></div>
            </form>
        </div>
    </div>

    <style>
    /* Entrance Popup Styles */
    .fx-popup-overlay {
        position: fixed;
        inset: 0;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .fx-popup-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.82);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    .fx-popup-modal {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 540px;
        background: #0d0d10;
        border: 1px solid rgba(255, 87, 34, 0.35);
        border-radius: 24px;
        padding: 38px 34px;
        box-shadow: 0 25px 60px rgba(0,0,0,0.9), 0 0 50px rgba(255, 87, 34, 0.2);
        animation: fxPopupIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes fxPopupIn {
        from { opacity: 0; transform: scale(0.92) translateY(20px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .fx-popup-close {
        position: absolute;
        top: 18px;
        right: 20px;
        background: transparent;
        border: none;
        color: #94a3b8;
        font-size: 30px;
        line-height: 1;
        cursor: pointer;
        transition: color 0.2s;
    }
    .fx-popup-close:hover { color: #ff5722; }
    .fx-popup-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #ff5722;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    .fx-popup-heading {
        color: #ffffff;
        font-size: 24px;
        font-weight: 900;
        margin: 0 0 10px;
        line-height: 1.3;
    }
    .fx-popup-sub {
        color: #94a3b8;
        font-size: 13.5px;
        line-height: 1.55;
        margin: 0 0 24px;
    }
    .fx-p-group {
        margin-bottom: 16px;
    }
    .fx-p-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }
    .fx-p-group label {
        display: block;
        color: #cbd5e1;
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 6px;
    }
    .fx-p-input, .fx-p-select {
        width: 100%;
        padding: 12px 14px;
        background: rgba(22, 22, 28, 0.95);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 10px;
        color: #ffffff;
        font-family: inherit;
        font-size: 13.5px;
        box-sizing: border-box;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .fx-p-input:focus, .fx-p-select:focus {
        outline: none;
        border-color: #ff5722;
        box-shadow: 0 0 15px rgba(255, 87, 34, 0.35);
    }
    .fx-p-submit-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #ff5722, #e64a19);
        color: #ffffff;
        border: none;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 800;
        letter-spacing: 1px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
        box-shadow: 0 6px 25px rgba(255, 87, 34, 0.4);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .fx-p-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(255, 87, 34, 0.6);
    }
    .fx-p-status {
        margin-top: 14px;
        padding: 12px;
        border-radius: 8px;
        font-size: 13px;
        text-align: center;
        font-weight: 600;
    }
    .fx-p-status.success {
        background: rgba(16, 185, 129, 0.15);
        border: 1px solid #10b981;
        color: #34d399;
    }
    .fx-p-status.error {
        background: rgba(239, 68, 68, 0.15);
        border: 1px solid #ef4444;
        color: #f87171;
    }
    @media (max-width: 580px) {
        .fx-p-row { grid-template-columns: 1fr; gap: 0; }
        .fx-popup-modal { padding: 30px 20px; }
        .fx-popup-heading { font-size: 20px; }
    }
    </style>

    <!-- Global Form Interceptor & Entrance Popup Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('fx-entrance-popup');
        const closeBtn = document.getElementById('fx-popup-close-btn');
        const backdrop = document.getElementById('fx-popup-backdrop');
        const ajaxUrl = (window.fusionXData && window.fusionXData.ajaxUrl) ? window.fusionXData.ajaxUrl : '/wp-admin/admin-ajax.php';
        const nonce = (window.fusionXData && window.fusionXData.nonce) ? window.fusionXData.nonce : '';

        // Show Entrance Popup after 4 seconds if not closed in this session
        if (popup && !sessionStorage.getItem('fx_popup_dismissed')) {
            setTimeout(function() {
                popup.style.display = 'flex';
                popup.setAttribute('aria-hidden', 'false');
            }, 4000);
        }

        function closePopup() {
            if (popup) {
                popup.style.display = 'none';
                popup.setAttribute('aria-hidden', 'true');
                sessionStorage.setItem('fx_popup_dismissed', '1');
            }
        }

        if (closeBtn) closeBtn.addEventListener('click', closePopup);
        if (backdrop) backdrop.addEventListener('click', closePopup);

        // Reusable Form Submitter
        function attachFormSubmit(formEl, formTypeDefault, statusContainer) {
            if (!formEl) return;
            formEl.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = formEl.querySelector('button[type="submit"]');
                const originalText = submitBtn ? submitBtn.innerHTML : '';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Transmitting...';
                }

                const formData = new FormData(formEl);
                if (!formData.has('action')) formData.append('action', 'fusion_x_submit_form');
                if (!formData.has('nonce')) formData.append('nonce', nonce);
                if (!formData.has('form_type')) formData.append('form_type', formTypeDefault);
                if (!formData.has('source_page')) formData.append('source_page', window.location.href);

                fetch(ajaxUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(r => r.json())
                .then(res => {
                    if (res && res.success) {
                        if (statusContainer) {
                            statusContainer.className = 'fx-p-status success';
                            statusContainer.style.display = 'block';
                            statusContainer.innerHTML = '✓ ' + (res.data && res.data.message ? res.data.message : 'Inquiry received successfully.');
                        } else {
                            alert(res.data && res.data.message ? res.data.message : 'Inquiry received successfully.');
                        }
                        formEl.reset();
                        if (formEl.id === 'fx-entrance-popup-form') {
                            setTimeout(closePopup, 3000);
                        }
                    } else {
                        const errMsg = (res && res.data && res.data.message) ? res.data.message : 'Submission failed. Please try again.';
                        if (statusContainer) {
                            statusContainer.className = 'fx-p-status error';
                            statusContainer.style.display = 'block';
                            statusContainer.innerHTML = '⚠ ' + errMsg;
                        } else {
                            alert(errMsg);
                        }
                    }
                })
                .catch(err => {
                    if (statusContainer) {
                        statusContainer.className = 'fx-p-status error';
                        statusContainer.style.display = 'block';
                        statusContainer.innerHTML = '⚠ Network error. Please try again or WhatsApp us directly.';
                    } else {
                        alert('Network error. Please WhatsApp us at +91 96000 96973.');
                    }
                })
                .finally(() => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }
                });
            });
        }

        // Attach to Entrance Popup Form
        attachFormSubmit(
            document.getElementById('fx-entrance-popup-form'),
            'Entrance Popup Form',
            document.getElementById('fx-popup-status')
        );

        // Attach to Contact Page Form
        attachFormSubmit(
            document.getElementById('contact-inquiry-form') || document.querySelector('.form-card form'),
            'Contact Page Form',
            null
        );

        // Attach to Careers Application Form
        attachFormSubmit(
            document.getElementById('onlineApplicationForm'),
            'Career / Internship Application',
            null
        );

        // Attach to SEO Audit Form
        attachFormSubmit(
            document.getElementById('seo-audit-form'),
            'SEO Audit Form',
            null
        );
    });
    </script>

    <?php wp_footer(); ?>
</body>
</html>
