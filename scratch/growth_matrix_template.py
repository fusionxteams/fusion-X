# Script to generate and preview the replacement for canvas-ecosystem in about-us.html

replacement_html = '''            <!-- ════════════════════════════════════════════════════════
                 FUSION X NEURAL GROWTH MATRIX (0 KB WebGL - 120 FPS Pure CSS & SVG)
                 Replaces heavy 3D planetary spheres with ultra-fast, attractive interactive growth cockpit
            ═════════════════════════════════════════════════════════ -->
            <div class="growth-matrix-hud" id="growth-engine-hud">
                
                <!-- Background Ambient Glow & Grid -->
                <div class="hud-bg-grid"></div>
                <div class="hud-ambient-glow"></div>

                <!-- Top Telemetry Status Bar -->
                <div class="hud-top-bar">
                    <div class="hud-status-indicator">
                        <span class="hud-pulse-dot"></span>
                        <span class="hud-status-label">FX ENGINE v4.2 &bull; ONLINE</span>
                    </div>
                    <div class="hud-chip-badge">
                        <i class="fa-solid fa-bolt" style="color: #ff5722;"></i>
                        <span>100% SPEED &bull; ZERO LAG</span>
                    </div>
                </div>

                <!-- Interactive SVG Neural Circuit Lines -->
                <svg class="hud-circuit-svg" viewBox="0 0 540 440" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="circuitGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#ff5722" stop-opacity="0.6"/>
                            <stop offset="50%" stop-color="#ff7043" stop-opacity="0.9"/>
                            <stop offset="100%" stop-color="#ff5722" stop-opacity="0.3"/>
                        </linearGradient>
                        <filter id="glowFilter" x="-20%" y="-20%" width="140%" height="140%">
                            <feGaussianBlur stdDeviation="3" result="blur"/>
                            <feComposite in="SourceGraphic" in2="blur" operator="over"/>
                        </filter>
                    </defs>

                    <!-- Connecting Beams from Core (270, 220) to 6 Pods -->
                    <!-- Top-Left Pod (110, 80) -->
                    <path class="circuit-path" d="M 270 220 L 190 140 L 110 80" />
                    <!-- Top-Right Pod (430, 80) -->
                    <path class="circuit-path" d="M 270 220 L 350 140 L 430 80" />
                    <!-- Mid-Left Pod (80, 220) -->
                    <path class="circuit-path" d="M 270 220 L 175 220 L 80 220" />
                    <!-- Mid-Right Pod (460, 220) -->
                    <path class="circuit-path" d="M 270 220 L 365 220 L 460 220" />
                    <!-- Bot-Left Pod (110, 360) -->
                    <path class="circuit-path" d="M 270 220 L 190 300 L 110 360" />
                    <!-- Bot-Right Pod (430, 360) -->
                    <path class="circuit-path" d="M 270 220 L 350 300 L 430 360" />

                    <!-- Animated Flowing Data Sparks along Beams -->
                    <circle class="circuit-spark" r="3.5" fill="#ff7043" filter="url(#glowFilter)">
                        <animateMotion path="M 270 220 L 190 140 L 110 80" dur="2.4s" repeatCount="indefinite" />
                    </circle>
                    <circle class="circuit-spark" r="3.5" fill="#ff7043" filter="url(#glowFilter)">
                        <animateMotion path="M 270 220 L 350 140 L 430 80" dur="2.1s" repeatCount="indefinite" />
                    </circle>
                    <circle class="circuit-spark" r="3" fill="#ff7043" filter="url(#glowFilter)">
                        <animateMotion path="M 270 220 L 175 220 L 80 220" dur="1.8s" repeatCount="indefinite" />
                    </circle>
                    <circle class="circuit-spark" r="3" fill="#ff7043" filter="url(#glowFilter)">
                        <animateMotion path="M 270 220 L 365 220 L 460 220" dur="2.6s" repeatCount="indefinite" />
                    </circle>
                    <circle class="circuit-spark" r="3.5" fill="#ff7043" filter="url(#glowFilter)">
                        <animateMotion path="M 270 220 L 190 300 L 110 360" dur="2.2s" repeatCount="indefinite" />
                    </circle>
                    <circle class="circuit-spark" r="3.5" fill="#ff7043" filter="url(#glowFilter)">
                        <animateMotion path="M 270 220 L 350 300 L 430 360" dur="2.5s" repeatCount="indefinite" />
                    </circle>
                </svg>

                <!-- 6 Interactive Holographic Growth Pods -->
                <div class="hud-pods-layer">

                    <!-- Pod 1: Meta Ads AI -->
                    <div class="hud-pod-card pod-top-left" data-title="Meta Advantage+ Funnels" data-desc="Advantage+ Shopping campaigns with high-converting creative testing driving peak 4.8x ROAS.">
                        <div class="pod-icon"><i class="fa-brands fa-meta"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">Meta Ads AI</span>
                            <span class="pod-metric">+4.8x ROAS</span>
                        </div>
                    </div>

                    <!-- Pod 2: Generative SEO -->
                    <div class="hud-pod-card pod-top-right" data-title="AEO & GEO Generative SEO" data-desc="Dominating organic keyword silos & ranking in Google Gemini, ChatGPT, and SGE AI summaries.">
                        <div class="pod-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">AEO &amp; GEO</span>
                            <span class="pod-metric">#1 SERP &bull; AI</span>
                        </div>
                    </div>

                    <!-- Pod 3: Web Architecture -->
                    <div class="hud-pod-card pod-mid-left" data-title="Next-Gen Web Architecture" data-desc="Custom-coded Shopify Liquid & React platforms with 1.2s mobile Core Web Vitals & high-CRO UX.">
                        <div class="pod-icon"><i class="fa-solid fa-code"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">Custom Web</span>
                            <span class="pod-metric">1.2s Fast CWV</span>
                        </div>
                    </div>

                    <!-- Pod 4: AI WhatsApp Bot -->
                    <div class="hud-pod-card pod-mid-right" data-title="Conversational AI Sales Bot" data-desc="24/7 intelligent WhatsApp API bot assisting customers, recommending products, and booking inquiries.">
                        <div class="pod-icon"><i class="fa-brands fa-whatsapp"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">WhatsApp AI</span>
                            <span class="pod-metric">900+ Calls/Mo</span>
                        </div>
                    </div>

                    <!-- Pod 5: Server-Side CAPI -->
                    <div class="hud-pod-card pod-bot-left" data-title="Attribution Telemetry & CAPI" data-desc="First-party Meta Conversions API & GA4 telemetry ensuring 100% signal preservation & ROAS accuracy.">
                        <div class="pod-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">Attribution</span>
                            <span class="pod-metric">100% CAPI</span>
                        </div>
                    </div>

                    <!-- Pod 6: Viral Video SEO -->
                    <div class="hud-pod-card pod-bot-right" data-title="Viral Video Production Studio" data-desc="End-to-end video scripting, multi-angle shoots, high-retention editing, and YouTube/Reels SEO.">
                        <div class="pod-icon"><i class="fa-solid fa-video"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">Video Studio</span>
                            <span class="pod-metric">Viral Reach</span>
                        </div>
                    </div>

                </div>

                <!-- Central Kinetic Reactor Core -->
                <div class="hud-core-stage">
                    <div class="core-orbit-ring ring-outer"></div>
                    <div class="core-orbit-ring ring-mid"></div>
                    <div class="core-center-reactor">
                        <img src="logo_transparent.png" alt="Fusion X Core" class="core-logo-badge">
                        <div class="core-energy-aura"></div>
                    </div>
                    <div class="core-label-pill">
                        <span class="core-pulse-beacon"></span>
                        <span id="hud-active-label">GROWTH REACTOR</span>
                    </div>
                </div>

                <!-- Bottom Real-Time Telemetry Bar -->
                <div class="hud-bottom-telemetry">
                    <div class="telemetry-item">
                        <span class="telemetry-val">10+</span>
                        <span class="telemetry-lbl">BRANDS SCALED</span>
                    </div>
                    <div class="telemetry-divider"></div>
                    <div class="telemetry-item">
                        <span class="telemetry-val">+470%</span>
                        <span class="telemetry-lbl">AVG TRAFFIC LIFT</span>
                    </div>
                    <div class="telemetry-divider"></div>
                    <div class="telemetry-item">
                        <span class="telemetry-val">4.8x</span>
                        <span class="telemetry-lbl">PEAK ROAS</span>
                    </div>
                </div>

            </div>'''

print("Replacement HTML template created successfully!")
