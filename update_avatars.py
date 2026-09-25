import re
js = open('about-us.html', 'r', encoding='utf-8').read()

replacements = {
    '>JK</div>': '><img src="team/jaiharan-k-ceo.webp" alt="Jaiharan K"></div>',
    '>KJ</div>': '><img src="team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J"></div>',
    '>KN</div>': '><img src="team/kannan-s-web-developer.webp" alt="Kannan S"></div>',
    '>SS</div>': '><img src="team/saravana-sanjhay-m-seo-expert.webp" alt="Saravana Sanjhay M"></div>',
    '>JB</div>': '><img src="team/jabakumar-video-editor.webp" alt="Jabakumar"></div>'
}

for old, new_html in replacements.items():
    js = js.replace(old, new_html)

open('about-us.html', 'w', encoding='utf-8').write(js)
