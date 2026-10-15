import re

for filepath in ['fusion-x-theme/front-page.php', 'fusion-x-theme/page-ai-search-results.php']:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Replace srcset="ai-proof/... with srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/...
    new_content = re.sub(r'srcset=["\']ai-proof/([^"\']+)["\']', r'srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/\1"', content)
    # Replace src="ai-proof/... with src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/...
    new_content = re.sub(r'src=["\']ai-proof/([^"\']+)["\']', r'src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/\1"', new_content)
    
    # Also check lightbox modal JS or any data-full="ai-proof/...
    new_content = re.sub(r'data-full=["\']ai-proof/([^"\']+)["\']', r'data-full="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/\1"', new_content)

    if new_content != content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print('Updated ai-proof image paths in', filepath)
    else:
        print('No relative ai-proof paths found in', filepath)
