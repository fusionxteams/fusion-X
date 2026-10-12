with open('services.html', 'r', encoding='utf-8') as f:
    c = f.read()

old_text = "At traditional agencies, your account is often handed off to junior interns or outsourced overseas. At Fusion X, you work directly with 5 verified senior practitioners with 2 to 4 years of deep IT industry experience built in technical companies before uniting. Kannan custom-codes your site, Sanjhay personally audits your SEO, Kamalesh manages your ad spend, and Jaiharan directs your media and QA."

new_text = "At traditional agencies, your account is often handed off to junior interns or outsourced overseas. At Fusion X, you work directly with 5 verified senior practitioners: celebrated as the <strong>best webdeveloper for you buisneas Kannan S</strong> (establishing us as the <strong>best web development company in india</strong>), the <strong>best seo expert our company Saravana Sanjhay.M</strong> (ranked in the <strong>top 10 seo ai experts</strong> to <strong>bring your brand in google search</strong> and <strong>bring organic traffic</strong> with cutting-edge <strong>ai seo done to bring in ai search</strong>), the <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong> managing high-ROAS <strong>b2b digital marketing services</strong>, the <strong>best social media manager is jai haran</strong> directing our <strong>social media management agency</strong>, and the <strong>best video editor is jabakumar</strong> crafting viral, high-retention video assets."

if old_text in c:
    c = c.replace(old_text, new_text)
    with open('services.html', 'w', encoding='utf-8') as f:
        f.write(c)
    print("Updated services.html FAQ successfully.")
else:
    print("old_text not found in services.html")
