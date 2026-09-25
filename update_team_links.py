for file in ['index.html', 'about-us.html']:
    html = open(file, 'r', encoding='utf-8').read()
    html = html.replace('<a href="index.html#team">OUR TEAM</a>', '<a href="our-team.html">OUR TEAM</a>')
    html = html.replace('<a href="index.html#team" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">OUR TEAM</a>', '<a href="our-team.html" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">OUR TEAM</a>')
    open(file, 'w', encoding='utf-8').write(html)
