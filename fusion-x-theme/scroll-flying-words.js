// scroll-flying-words.js - Scroll-Driven Flying Words Animation strictly contained inside Section 2 (#impact) & downstream headings
(function() {
    function getScrollY() {
        return window.pageYOffset || document.documentElement.scrollTop || window.scrollY || 0;
    }

    function initScrollWordFlying() {
        // --- 1. SECTION 2 (#impact) FLYING HEADLINE & KINETIC WORD TRACKS ---
        const impactSection = document.getElementById('impact');
        let streamContainer = null;
        let headingElem = null;

        if (impactSection) {
            headingElem = impactSection.querySelector('h2');
            if (headingElem && !headingElem.dataset.flyingInitialized) {
                headingElem.dataset.flyingInitialized = 'true';
                headingElem.classList.add('flying-headline-wrap');

                const row1 = [
                    { text: 'Boost', fx: -100, fy: -50, fz: 120, fr: -10 },
                    { text: 'Your', fx: 70, fy: -60, fz: 90, fr: 8 },
                    { text: 'Digital', fx: -60, fy: 45, fz: 140, fr: -8, highlight: true },
                    { text: 'Presence', fx: 90, fy: 55, fz: 130, fr: 10, highlight: true }
                ];
                const row2 = [
                    { text: 'Throughout', fx: -110, fy: -40, fz: 100, fr: -7 },
                    { text: 'All', fx: 50, fy: -45, fz: 80, fr: 7 },
                    { text: 'Digital', fx: -75, fy: 40, fz: 110, fr: -9 },
                    { text: 'Space', fx: 95, fy: 50, fz: 120, fr: 11 }
                ];

                function renderRow(words) {
                    return words.map(w => {
                        const hlClass = w.highlight ? ' highlight-orange' : '';
                        return `<span class="flying-word-unit${hlClass}" data-fx="${w.fx}" data-fy="${w.fy}" data-fz="${w.fz}" data-fr="${w.fr}">${w.text}</span>`;
                    }).join(' ');
                }

                headingElem.innerHTML = `
                    <div class="flying-headline-row">${renderRow(row1)}</div>
                    <div class="flying-headline-row">${renderRow(row2)}</div>
                `;
            }

            // Inject the dynamic Scroll Flying Word Streams strictly inside #impact
            streamContainer = document.getElementById('scroll-flying-stream-container');
            if (!streamContainer) {
                streamContainer = document.createElement('div');
                streamContainer.id = 'scroll-flying-stream-container';
                streamContainer.className = 'scroll-flying-stream-wrapper';
                streamContainer.innerHTML = `
                    <!-- Track 1: Flying Right on Scroll (Top) -->
                    <div class="flying-words-rail rail-top">
                        <div class="flying-words-inner track-right">
                            <span>★ AI SEARCH DOMINANCE</span>
                            <span>✦ HIGH-ROAS MEDIA</span>
                            <span>★ TECHNICAL SEO CRAWL</span>
                            <span>✦ CORE WEB VITALS 95+</span>
                            <span>★ EXPONENTIAL SCALE</span>
                            <span>✦ REVENUE FUNNELS</span>
                            <span>★ AI SEARCH DOMINANCE</span>
                            <span>✦ HIGH-ROAS MEDIA</span>
                            <span>★ TECHNICAL SEO CRAWL</span>
                            <span>✦ CORE WEB VITALS 95+</span>
                            <span>★ EXPONENTIAL SCALE</span>
                            <span>✦ REVENUE FUNNELS</span>
                        </div>
                    </div>

                    <!-- Track 2: Flying Left on Scroll (Mid) -->
                    <div class="flying-words-rail rail-mid">
                        <div class="flying-words-inner track-left">
                            <span>✦ BESPOKE WEB ARCHITECTURE</span>
                            <span>★ GOOGLE MAPS 3-PACK</span>
                            <span>✦ HIGH-RETENTION 4K REELS</span>
                            <span>★ ZERO PLUGIN BLOAT</span>
                            <span>✦ GENERATIVE ENGINE OPTIMIZATION</span>
                            <span>★ MULTI-CRORE MEDIA BUYING</span>
                            <span>✦ BESPOKE WEB ARCHITECTURE</span>
                            <span>★ GOOGLE MAPS 3-PACK</span>
                            <span>✦ HIGH-RETENTION 4K REELS</span>
                            <span>★ ZERO PLUGIN BLOAT</span>
                        </div>
                    </div>

                    <!-- Track 3: Flying Right on Scroll (Bottom) -->
                    <div class="flying-words-rail rail-bottom">
                        <div class="flying-words-inner track-right-2">
                            <span>★ TOP 1% SEO RANKINGS</span>
                            <span>✦ CONVERSION RATE OPTIMIZATION</span>
                            <span>★ AI-DRIVEN VISIBILITY</span>
                            <span>✦ EXPONENTIAL REVENUE</span>
                            <span>★ LIGHTNING FAST LOAD</span>
                            <span>✦ EEAT CONTENT AUTHORITY</span>
                            <span>★ TOP 1% SEO RANKINGS</span>
                            <span>✦ CONVERSION RATE OPTIMIZATION</span>
                            <span>★ AI-DRIVEN VISIBILITY</span>
                            <span>✦ EXPONENTIAL REVENUE</span>
                        </div>
                    </div>

                    <!-- 3D Free-Floating Flying Power Words -->
                    <div class="flying-floating-word f-word-1" data-speed="0.22" data-rot="0.06">DOMINATE</div>
                    <div class="flying-floating-word f-word-2" data-speed="-0.28" data-rot="-0.05">SCALE</div>
                    <div class="flying-floating-word f-word-3" data-speed="0.30" data-rot="0.07">CONVERSIONS</div>
                    <div class="flying-floating-word f-word-4" data-speed="-0.22" data-rot="-0.06">VELOCITY</div>
                    <div class="flying-floating-word f-word-5" data-speed="0.26" data-rot="0.05">VISIBILITY</div>
                `;
                streamContainer.style.position = 'absolute';
                streamContainer.style.top = '0';
                streamContainer.style.left = '0';
                streamContainer.style.width = '100%';
                streamContainer.style.height = '100%';
                streamContainer.style.pointerEvents = 'none';
                streamContainer.style.overflow = 'hidden';
                streamContainer.style.zIndex = '1';

                impactSection.style.position = 'relative';
                impactSection.style.overflow = 'hidden';
                impactSection.insertBefore(streamContainer, impactSection.firstChild);
            }

            // Ensure impact section cards sit strictly on top of the flying layer
            const innerContainer = impactSection.querySelector('div[style*="max-width: 1200px"]');
            if (innerContainer) {
                innerContainer.style.position = 'relative';
                innerContainer.style.zIndex = '2';
            }
        }

        // --- 2. DOWNSTREAM SECTION HEADINGS (Preserve pristine layout & markup) ---
        const downstreamHeadings = [];

        const animatedHeadings = [];

        downstreamHeadings.forEach(item => {
            const hElem = document.querySelector(item.selector);
            if (!hElem || hElem.dataset.flyingInitialized) return;
            hElem.dataset.flyingInitialized = 'true';
            hElem.classList.add('flying-scroll-heading');

            const childNodes = Array.from(hElem.childNodes);
            const wordUnits = [];

            childNodes.forEach(node => {
                if (node.nodeType === Node.TEXT_NODE) {
                    const textWords = node.textContent.split(/\s+/).filter(w => w.trim().length > 0);
                    textWords.forEach(tw => {
                        const span = document.createElement('span');
                        span.className = 'flying-sub-word';
                        span.textContent = tw;
                        span.style.marginRight = '0.32em';
                        const rx = (Math.random() - 0.5) * 80;
                        const ry = (Math.random() * 30) + 20;
                        const rr = (Math.random() - 0.5) * 12;
                        span.dataset.fx = rx;
                        span.dataset.fy = ry;
                        span.dataset.fr = rr;
                        hElem.appendChild(span);
                        wordUnits.push(span);
                    });
                    hElem.removeChild(node);
                } else if (node.nodeType === Node.ELEMENT_NODE) {
                    const textWords = node.textContent.split(/\s+/).filter(w => w.trim().length > 0);
                    const innerWrapper = document.createElement('span');
                    innerWrapper.className = 'flying-sub-word-group';
                    innerWrapper.style.marginRight = '0.32em';
                    Array.from(node.attributes).forEach(attr => {
                        innerWrapper.setAttribute(attr.name, attr.value);
                    });
                    
                    innerWrapper.innerHTML = '';
                    textWords.forEach((tw, twIdx) => {
                        const span = document.createElement('span');
                        span.className = 'flying-sub-word';
                        span.textContent = tw;
                        if (twIdx < textWords.length - 1) {
                            span.style.marginRight = '0.32em';
                        }
                        const rx = (Math.random() - 0.5) * 80;
                        const ry = (Math.random() * 30) + 20;
                        const rr = (Math.random() - 0.5) * 12;
                        span.dataset.fx = rx;
                        span.dataset.fy = ry;
                        span.dataset.fr = rr;
                        innerWrapper.appendChild(span);
                        wordUnits.push(span);
                    });
                    hElem.replaceChild(innerWrapper, node);
                }
            });

            animatedHeadings.push({
                element: hElem,
                words: wordUnits
            });
        });

        // --- 3. OPTIMIZED LERP SCROLL ANIMATION LOOP ---
        let targetScrollY = getScrollY();
        let currentScrollY = targetScrollY;
        let isRunning = false;

        const impactUnits = headingElem ? headingElem.querySelectorAll('.flying-word-unit') : [];
        const trackRight = streamContainer ? streamContainer.querySelector('.track-right') : null;
        const trackMid = streamContainer ? streamContainer.querySelector('.track-left') : null;
        const trackRight2 = streamContainer ? streamContainer.querySelector('.track-right-2') : null;
        const floatingWords = streamContainer ? streamContainer.querySelectorAll('.flying-floating-word') : [];

        function onScroll() {
            targetScrollY = getScrollY();
            if (!isRunning) {
                isRunning = true;
                requestAnimationFrame(updateFlyingWords);
            }
        }

        function updateFlyingWords() {
            currentScrollY += (targetScrollY - currentScrollY) * 0.16;
            const windowH = window.innerHeight;
            const isMobile = window.innerWidth <= 768;

            // A. Section 2 (#impact) Headline & Tracks
            if (headingElem) {
                const rect = headingElem.getBoundingClientRect();
                
                // Early trigger points so words assemble into place in lower half of screen
                const startPoint = isMobile ? windowH * 0.95 : windowH * 0.90;
                const endPoint = isMobile ? windowH * 0.65 : windowH * 0.50;

                const progress = Math.max(0, Math.min(1, (startPoint - rect.top) / (startPoint - endPoint)));
                const easeOut = 1 - Math.pow(1 - progress, 3);
                const motionScale = isMobile ? 0.45 : 1.0;

                impactUnits.forEach(unit => {
                    const fx = parseFloat(unit.dataset.fx || 0) * motionScale;
                    const fy = parseFloat(unit.dataset.fy || 0) * motionScale;
                    const fz = parseFloat(unit.dataset.fz || 0) * motionScale;
                    const fr = parseFloat(unit.dataset.fr || 0);

                    const curX = fx * (1 - easeOut);
                    const curY = fy * (1 - easeOut);
                    const curZ = fz * (1 - easeOut);
                    const curR = fr * (1 - easeOut);
                    const curScale = 0.75 + (0.25 * easeOut);
                    const curOpacity = 0.3 + (0.7 * easeOut);

                    unit.style.transform = `translate3d(${curX.toFixed(1)}px, ${curY.toFixed(1)}px, ${curZ.toFixed(1)}px) rotate(${curR.toFixed(1)}deg) scale(${curScale.toFixed(2)})`;
                    unit.style.opacity = curOpacity.toFixed(2);
                });

                if (impactSection) {
                    const impactTop = impactSection.offsetTop;
                    if (currentScrollY >= impactTop - windowH && currentScrollY <= impactTop + impactSection.offsetHeight) {
                        const delta = currentScrollY - impactTop;

                        if (trackRight) {
                            const shiftR = (delta * 0.6) % 2400;
                            trackRight.style.transform = `translate3d(${-shiftR.toFixed(1)}px, 0, 0)`;
                        }
                        if (trackMid) {
                            const shiftM = (delta * 0.5) % 2400;
                            trackMid.style.transform = `translate3d(${(shiftM - 900).toFixed(1)}px, 0, 0)`;
                        }
                        if (trackRight2) {
                            const shiftR2 = (delta * 0.45) % 2400;
                            trackRight2.style.transform = `translate3d(${(-shiftR2 + 400).toFixed(1)}px, 0, 0)`;
                        }

                        floatingWords.forEach(fw => {
                            const spd = parseFloat(fw.dataset.speed || 0.2);
                            const rot = parseFloat(fw.dataset.rot || 0.05);
                            const moveY = delta * spd;
                            const curRot = delta * rot;
                            fw.style.transform = `translate3d(${(moveY * 0.3).toFixed(1)}px, ${moveY.toFixed(1)}px, 0) rotate(${curRot.toFixed(1)}deg)`;
                        });
                    }
                }
            }

            // B. Downstream Headings (Section 3 onwards)
            animatedHeadings.forEach(item => {
                const rect = item.element.getBoundingClientRect();
                const startPoint = isMobile ? windowH * 0.95 : windowH * 0.90;
                const endPoint = isMobile ? windowH * 0.65 : windowH * 0.50;

                const prog = Math.max(0, Math.min(1, (startPoint - rect.top) / (startPoint - endPoint)));
                const ease = 1 - Math.pow(1 - prog, 3);
                const motionScale = isMobile ? 0.45 : 1.0;

                item.words.forEach(w => {
                    const fx = parseFloat(w.dataset.fx || 0) * motionScale * (1 - ease);
                    const fy = parseFloat(w.dataset.fy || 0) * motionScale * (1 - ease);
                    const fr = parseFloat(w.dataset.fr || 0) * (1 - ease);
                    const op = 0.25 + (0.75 * ease);

                    w.style.transform = `translate3d(${fx.toFixed(1)}px, ${fy.toFixed(1)}px, 0) rotate(${fr.toFixed(1)}deg)`;
                    w.style.opacity = op.toFixed(2);
                });
            });

            if (Math.abs(targetScrollY - currentScrollY) > 0.4) {
                requestAnimationFrame(updateFlyingWords);
            } else {
                isRunning = false;
            }
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        document.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('touchmove', onScroll, { passive: true });
        window.addEventListener('resize', onScroll, { passive: true });
        onScroll();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollWordFlying);
    } else {
        initScrollWordFlying();
    }
})();
