html = open('about-us.html', 'r', encoding='utf-8').read()
start = html.find('<nav class="navbar">')
end = html.find('</nav>') + 6
print(html[start:end])
