import os, re

files_to_check = [
    'about-us.html', 'ai-search-results.html', 'bhawani-corner.html', 'bikerz-module.html',
    'blog-post.html', 'careers.html', 'digital-marketing-services.html', 'dr-madhavi.html',
    'energy-bags.html', 'marketing-brand-consultation.html', 'marketing-consultation.html',
    'meeras-beauty-parlour.html', 'nilaro.html', 'off-human.html', 'portfolio.html',
    'seo-services.html', 'sridhar-food-house.html', 'tk-cinematic-studio.html', 'truly-yours.html'
]

theme_dir = 'fusion-x-theme'

for html_file in files_to_check:
    slug = html_file[:-5]
    php_file = os.path.join(theme_dir, f'page-{slug}.php')
    if not os.path.exists(php_file):
        print(f'PHP file not found: {php_file}')
        continue
    
    with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
        html = f.read()
    
    footer_pos = html.rfind('</footer>')
    if footer_pos == -1:
        print(f'No footer found in {html_file}')
        continue
    
    after_footer = html[footer_pos + len('</footer>'):]
    
    # Extract all inline scripts (both ld+json and regular inline js)
    inline_scripts = re.findall(r'<script(?:\s+type="application/ld\+json")?>.*?</script>', after_footer, re.DOTALL)
    # Filter out external script tags like <script src="...">
    actual_inline = [s for s in inline_scripts if 'src=' not in s and len(s.strip()) > 30]
    
    if not actual_inline:
        print(f'{html_file}: No inline scripts after footer.')
        continue
        
    combined_scripts = '\n\n'.join(actual_inline)
    
    # Adjust paths if any
    combined_scripts = re.sub(r'src="logo_transparent\.png"', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo_transparent.png"', combined_scripts)
    combined_scripts = re.sub(r'src="team/', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/', combined_scripts)
    combined_scripts = re.sub(r'src="brands/', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/', combined_scripts)
    
    with open(php_file, 'r', encoding='utf-8', errors='ignore') as f:
        php_content = f.read()
    
    # Check if already inserted
    if actual_inline[0][:50] in php_content:
        print(f'{php_file}: Already contains the inline script.')
        continue
        
    # Insert right before get_footer()
    footer_call_pattern = re.search(r'(<\?php\s+get_footer\(\);|\bget_footer\(\);)', php_content)
    if footer_call_pattern:
        insert_idx = footer_call_pattern.start()
        new_php = php_content[:insert_idx] + combined_scripts + '\n\n' + php_content[insert_idx:]
        with open(php_file, 'w', encoding='utf-8') as f:
            f.write(new_php)
        print(f'Successfully restored {len(actual_inline)} inline scripts to {php_file} (+{len(combined_scripts)} bytes)')
    else:
        print(f'Could not find get_footer() in {php_file}')

print('Done restoring inline scripts across all templates!')
