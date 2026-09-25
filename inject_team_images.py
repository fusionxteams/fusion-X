import os

html = open('our-team.html', 'r', encoding='utf-8').read()

# Add images to each section
kamalesh_img = '<img src="team/kamalesh-j-digital-marketing-expert.webp" style="width:150px; border-radius:10px; margin-bottom:20px; box-shadow: 0 10px 30px rgba(255,87,34,0.3);" alt="Kamalesh">'
html = html.replace('<h2 class="member-name">Kamalesh', kamalesh_img + '<h2 class="member-name">Kamalesh')

jaiharan_img = '<img src="team/jaiharan-k-ceo.webp" style="width:150px; border-radius:10px; margin-bottom:20px; box-shadow: 0 10px 30px rgba(255,87,34,0.3);" alt="JaiHaran">'
html = html.replace('<h2 class="member-name">JaiHaran', jaiharan_img + '<h2 class="member-name">JaiHaran')

kannan_img = '<img src="team/kannan-s-web-developer.webp" style="width:150px; border-radius:10px; margin-bottom:20px; box-shadow: 0 10px 30px rgba(255,87,34,0.3);" alt="Kannan">'
html = html.replace('<h2 class="member-name">Kannan', kannan_img + '<h2 class="member-name">Kannan')

saravana_img = '<img src="team/saravana-sanjhay-m-seo-expert.webp" style="width:150px; border-radius:10px; margin-bottom:20px; box-shadow: 0 10px 30px rgba(255,87,34,0.3);" alt="Saravana">'
html = html.replace('<h2 class="member-name">Saravana Sanjhay M', saravana_img + '<h2 class="member-name">Saravana Sanjhay M')

jabakumar_img = '<img src="team/jabakumar-video-editor.webp" style="width:150px; border-radius:10px; margin-bottom:20px; box-shadow: 0 10px 30px rgba(255,87,34,0.3);" alt="Jabakumar">'
html = html.replace('<h2 class="member-name">Jabakumar', jabakumar_img + '<h2 class="member-name">Jabakumar')

open('our-team.html', 'w', encoding='utf-8').write(html)
