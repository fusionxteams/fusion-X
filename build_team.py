import re

with open('our-team.html', 'r', encoding='utf-8') as f:
    c = f.read()

# Style
style_match = re.search(r'(<style>.*?</style>)', c, re.DOTALL)
style_block = style_match.group(1) if style_match else ''

# Canvas and main content
nav_end = c.find('</nav>') + len('</nav>')
footer_pos = c.find('<footer')
main_content = c[nav_end:footer_pos].strip()

# Adjust image paths in main_content
main_content = re.sub(r'src="team/', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/', main_content)
main_content = re.sub(r'src="logo_transparent\.png"', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo_transparent.png"', main_content)
main_content = re.sub(r'href="contact\.html"', 'href="<?php echo esc_url( home_url( \'/contact/\' ) ); ?>"', main_content)
main_content = re.sub(r'href="index\.html"', 'href="<?php echo esc_url( home_url( \'/\' ) ); ?>"', main_content)

# After footer script
footer_end = c.find('</footer>') + len('</footer>')
after_footer = c[footer_end:]

# Extract inline script (contains gsap.registerPlugin and all 3D scene code)
script_match = re.search(r'(<script>\s*gsap\.registerPlugin.*?updateCamera\(\);\s*</script>)', after_footer, re.DOTALL)
if script_match:
    page_script = script_match.group(1)
    print('Found page_script, length:', len(page_script))
else:
    print('ERROR: page_script not found!')
    page_script = ''

php_template = f"""<?php
/**
 * Template Name: Our Team
 *
 * @package Fusion_X
 */

get_header();
?>

{style_block}

{main_content}

{page_script}

<?php
get_footer();
"""

with open('fusion-x-theme/page-our-team.php', 'w', encoding='utf-8') as f:
    f.write(php_template)

print('Updated fusion-x-theme/page-our-team.php successfully!')
print('New file size:', len(php_template), 'bytes')
