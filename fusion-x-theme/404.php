<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Fusion_X
 */

get_header();
?>

<main id="primary" class="site-main error-404 not-found" style="min-height: 75vh; display: flex; align-items: center; justify-content: center; text-align: center; padding: 140px 24px 80px; position: relative; z-index: 2;">
    <div class="glass-card" style="max-width: 600px; padding: 60px 40px; border-radius: 24px; background: rgba(18, 18, 18, 0.75); border: 1px solid rgba(255, 87, 34, 0.25); backdrop-filter: blur(15px); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);">
        <div style="font-size: clamp(5rem, 12vw, 8rem); font-weight: 900; line-height: 1; background: linear-gradient(135deg, #ff5722, #ff8a50); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 0 40px rgba(255, 87, 34, 0.4);">
            404
        </div>
        <h1 style="color: #fff; font-size: clamp(1.5rem, 3vw, 2.2rem); font-weight: 800; margin: 20px 0 15px;">
            Coordinate Lost in Cyberspace
        </h1>
        <p style="color: #94a3b8; font-size: 1.05rem; line-height: 1.6; margin-bottom: 30px;">
            The digital destination you are looking for has been moved, re-indexed, or does not exist in our telemetry matrix.
        </p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary" style="display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, #ff5722, #e64a19); color: #fff; padding: 14px 28px; border-radius: 30px; font-weight: 700; text-decoration: none; box-shadow: 0 4px 20px rgba(255, 87, 34, 0.4);">
                <i class="fa-solid fa-house"></i> Return to Command Center
            </a>
            <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="btn-secondary" style="display: inline-flex; align-items: center; gap: 10px; background: rgba(255, 255, 255, 0.05); color: #fff; border: 1px solid rgba(255, 255, 255, 0.2); padding: 14px 28px; border-radius: 30px; font-weight: 700; text-decoration: none;">
                Explore Services
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
