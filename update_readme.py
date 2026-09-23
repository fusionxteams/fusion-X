import re
from datetime import datetime

with open('README.md', 'r', encoding='utf-8') as f:
    content = f.read()

# I will add an entry for my previous work (Kinetic Slam, Physics Charm, Mobile fixes)
today = datetime.now().strftime('%Y-%m-%d')
my_log_entry = f"""
* **{today}** - Implemented interactive UI components and responsive fixes.
    * Replaced basic shatter animation with a high-impact Kinetic Slam text animation (pure CSS).
    * Upgraded the nav bar charm from CSS keyframes to a full interactive Javascript Pendulum Physics Engine.
    * Fixed a critical mobile menu bug where inline `display: none` overrode desktop CSS on resize.
    * Styled "Let's Connect" nav link into a distinctive orange pill button.
    * Removed white background from the logo using a PIL python script.
"""

# Append to the end of the README
content += my_log_entry

with open('README.md', 'w', encoding='utf-8') as f:
    f.write(content)

print("Dev Log updated!")
