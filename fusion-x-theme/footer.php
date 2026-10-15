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
                        <li><a href="<?php echo esc_url( home_url( '/meta-ads/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Meta & Performance Ads</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/google-ads/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Google & PMax Ads</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/website-development/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Website Development</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/seo-services/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> SEO Services</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/whatsapp-marketing/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> WhatsApp Marketing API</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/brand-strategy/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> Brand Strategy</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/youtube-ads/' ) ); ?>"><i class="fa-solid fa-chevron-right footer-chevron"></i> YouTube Ads & Shorts</a></li>
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
                    <h4 class="footer-heading">CONTACT & LOCATION</h4>
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

    <?php wp_footer(); ?>
</body>
</html>
