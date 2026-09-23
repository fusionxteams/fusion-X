const navbarHTML = `
<nav class="navbar">
    <div class="logo-container">
        <a href="index.html">
            <img src="logo_transparent.png" alt="Fusion X Logo - Best Digital Marketing Agency" class="logo">
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="index.html#home">HOME</a></li>
        <li><a href="about-us.html">ABOUT US</a></li>
        <li><a href="index.html#services">SERVICES</a></li>
        <li><a href="index.html#brands">BRANDS</a></li>
        <li><a href="index.html#team">OUR TEAM</a></li>
        <li><a href="index.html#works">OUR WORKS</a></li>
        <li class="dangling-container">
            <a href="index.html#contact" class="nav-cta-btn">LET'S CONNECT</a>
            <div class="charm-string">
                <img src="logo_transparent.png" class="charm-object" alt="Fusion X Charm">
            </div>
        </li>
    </ul>
    <div class="hamburger">
        <svg viewBox="0 0 100 80" width="30" height="30">
            <rect width="100" height="15" rx="8" fill="#ff5722"></rect>
            <rect y="30" width="100" height="15" rx="8" fill="#ff5722"></rect>
            <rect y="60" width="100" height="15" rx="8" fill="#ff5722"></rect>
        </svg>
    </div>
</nav>
`;

const footerHTML = `
<footer style="background-color: #111; color: white; text-align: center; padding: 60px 20px; font-family: 'Inter', sans-serif;">
    <h2 style="font-size: 2.5rem; margin-bottom: 10px; color: white;">FUSION X</h2>
    <p style="color: #ff5722; font-weight: bold; letter-spacing: 2px; margin: 0;">TAKE YOUR BRAND WORLDWIDE</p>
    <div style="margin: 30px 0;">
        <a href="index.html#home" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">HOME</a>
        <a href="about-us.html" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">ABOUT US</a>
        <a href="index.html#services" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">SERVICES</a>
        <a href="index.html#contact" style="color: #ccc; text-decoration: none; margin: 0 10px; font-size: 0.9rem;">LET'S CONNECT</a>
    </div>
    <p style="color: #666; font-size: 0.9rem; margin-top: 30px;">© 2026 Fusion X. All Rights Reserved.</p>
</footer>
`;

function renderComponents() {
    const navPlaceholder = document.getElementById('navbar-placeholder');
    const footerPlaceholder = document.getElementById('footer-placeholder');

    if (navPlaceholder) {
        navPlaceholder.innerHTML = navbarHTML;
    }
    if (footerPlaceholder) {
        footerPlaceholder.innerHTML = footerHTML;
    }

    // Highlight active link based on current URL
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    const navLinks = document.querySelectorAll('.nav-links a');
    navLinks.forEach(link => {
        if (link.getAttribute('href').includes(currentPage)) {
            link.classList.add('active');
        }
    });

    // Initialize Hamburger Logic
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-links');
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            if (navMenu.style.display === 'flex' && navMenu.style.flexDirection === 'column') {
                navMenu.style.display = 'none';
            } else {
                navMenu.style.display = 'flex';
                navMenu.style.flexDirection = 'column';
                navMenu.style.position = 'absolute';
                navMenu.style.top = '70px';
                navMenu.style.left = '0';
                navMenu.style.width = '100%';
                navMenu.style.background = '#ffffff';
                navMenu.style.padding = '20px 0';
                navMenu.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
                navMenu.style.zIndex = '999';
            }
        });

        // Reset display on resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 900) {
                navMenu.style.display = 'flex';
                navMenu.style.flexDirection = 'row';
                navMenu.style.position = 'relative';
                navMenu.style.top = '0';
                navMenu.style.background = 'transparent';
                navMenu.style.boxShadow = 'none';
            } else {
                navMenu.style.display = 'none';
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', renderComponents);
