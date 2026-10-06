/**
 * Fusion X - Orange Dot Moving Reactive Animation
 * Lightweight, high-performance canvas particle system with mouse repulsion,
 * breathing glow, and organic floating motion for dark/black backgrounds.
 * 
 * STRICT RULE: Never attaches to the "web" section (#services / #spider-container)
 * to avoid interfering with the orange spider web.
 */
(function() {
    'use strict';

    class OrangeDotsField {
        constructor(container, options = {}) {
            this.container = container;
            this.options = Object.assign({
                dotColor: '255, 87, 34', // #ff5722 Neon Orange
                density: 13000,          // Area (px^2) per dot
                minDots: 24,
                maxDots: 85,
                repelRadius: 130,
                repelForce: 4.8,
                friction: 0.92,
                connectLines: true,
                connectDistance: 65
            }, options);

            this.canvas = document.createElement('canvas');
            this.canvas.className = 'fx-orange-dots-canvas';
            this.ctx = this.canvas.getContext('2d');
            
            this.canvas.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; pointer-events: none !important; z-index: 1 !important; display: block !important; margin: 0 !important; padding: 0 !important; border: none !important;';
            
            const computedPos = window.getComputedStyle(this.container).position;
            if (computedPos === 'static') {
                this.container.style.position = 'relative';
            }

            // Ensure container has overflow hidden so particles don't spill
            this.container.style.overflow = 'hidden';

            // Insert as first child so it sits behind section content
            this.container.prepend(this.canvas);

            this.dots = [];
            this.mouse = { x: -9999, y: -9999, isOver: false };
            this.width = 0;
            this.height = 0;
            this.isRunning = false;
            this.rafId = null;

            this.init();
        }

        init() {
            this.resize();
            this.createDots();
            this.bindEvents();
            this.start();
        }

        resize() {
            const rect = this.container.getBoundingClientRect();
            this.width = rect.width || this.container.clientWidth || window.innerWidth;
            this.height = rect.height || this.container.clientHeight || 400;

            const dpr = Math.min(window.devicePixelRatio || 1, 2);
            this.canvas.width = this.width * dpr;
            this.canvas.height = this.height * dpr;
            this.ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        }

        createDots() {
            const calculated = Math.floor((this.width * this.height) / this.options.density);
            const count = Math.max(this.options.minDots, Math.min(this.options.maxDots, calculated));
            
            this.dots = [];
            for (let i = 0; i < count; i++) {
                this.dots.push({
                    x: Math.random() * this.width,
                    y: Math.random() * this.height,
                    vx: (Math.random() - 0.5) * 0.45,
                    vy: (Math.random() - 0.5) * 0.45,
                    baseVx: (Math.random() - 0.5) * 0.35,
                    baseVy: (Math.random() - 0.5) * 0.35,
                    radius: Math.random() * 2.0 + 1.4, // 1.4px to 3.4px
                    baseAlpha: Math.random() * 0.45 + 0.35, // 0.35 to 0.8
                    pulsePhase: Math.random() * Math.PI * 2,
                    pulseSpeed: Math.random() * 0.025 + 0.015
                });
            }
        }

        bindEvents() {
            this.handleMouseMove = (e) => {
                const rect = this.container.getBoundingClientRect();
                if (e.clientX >= rect.left && e.clientX <= rect.right &&
                    e.clientY >= rect.top && e.clientY <= rect.bottom) {
                    this.mouse.x = e.clientX - rect.left;
                    this.mouse.y = e.clientY - rect.top;
                    this.mouse.isOver = true;
                } else {
                    this.mouse.isOver = false;
                }
            };

            this.handleMouseLeave = () => {
                this.mouse.isOver = false;
                this.mouse.x = -9999;
                this.mouse.y = -9999;
            };

            window.addEventListener('mousemove', this.handleMouseMove, { passive: true });
            document.addEventListener('mouseleave', this.handleMouseLeave);

            let resizeTimer;
            this.handleResize = () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    this.resize();
                    this.createDots();
                }, 150);
            };
            window.addEventListener('resize', this.handleResize);

            // IntersectionObserver to pause rendering when off-screen
            if ('IntersectionObserver' in window) {
                this.observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.start();
                        } else {
                            this.stop();
                        }
                    });
                }, { threshold: 0.02 });
                this.observer.observe(this.container);
            }
        }

        update() {
            const { repelRadius, repelForce, friction } = this.options;
            const w = this.width;
            const h = this.height;

            for (let i = 0; i < this.dots.length; i++) {
                const dot = this.dots[i];

                // Mouse interaction: dynamic repulsion
                if (this.mouse.isOver) {
                    const dx = dot.x - this.mouse.x;
                    const dy = dot.y - this.mouse.y;
                    const dist = Math.hypot(dx, dy);

                    if (dist < repelRadius && dist > 0.1) {
                        const factor = (repelRadius - dist) / repelRadius;
                        const force = factor * repelForce;
                        dot.vx += (dx / dist) * force;
                        dot.vy += (dy / dist) * force;
                    }
                }

                // Damping back to gentle drift
                dot.vx *= friction;
                dot.vy *= friction;
                dot.x += dot.vx + dot.baseVx;
                dot.y += dot.vy + dot.baseVy;

                // Seamless wrapping
                const pad = 12;
                if (dot.x < -pad) dot.x = w + pad;
                if (dot.x > w + pad) dot.x = -pad;
                if (dot.y < -pad) dot.y = h + pad;
                if (dot.y > h + pad) dot.y = -pad;

                // Pulsate opacity for breathing effect
                dot.pulsePhase += dot.pulseSpeed;
            }
        }

        draw() {
            this.ctx.clearRect(0, 0, this.width, this.height);
            const rgb = this.options.dotColor;

            // Faint connecting lines between nearby orange dots
            if (this.options.connectLines) {
                const connDist = this.options.connectDistance;
                this.ctx.lineWidth = 0.75;
                for (let i = 0; i < this.dots.length; i++) {
                    for (let j = i + 1; j < this.dots.length; j++) {
                        const dx = this.dots[i].x - this.dots[j].x;
                        const dy = this.dots[i].y - this.dots[j].y;
                        const dist = Math.hypot(dx, dy);
                        if (dist < connDist) {
                            const alpha = (1 - dist / connDist) * 0.13;
                            this.ctx.strokeStyle = `rgba(${rgb}, ${alpha})`;
                            this.ctx.beginPath();
                            this.ctx.moveTo(this.dots[i].x, this.dots[i].y);
                            this.ctx.lineTo(this.dots[j].x, this.dots[j].y);
                            this.ctx.stroke();
                        }
                    }
                }
            }

            // Draw glowing orange dots
            for (let i = 0; i < this.dots.length; i++) {
                const dot = this.dots[i];
                const currentAlpha = Math.max(0.18, Math.min(1, dot.baseAlpha + Math.sin(dot.pulsePhase) * 0.22));

                this.ctx.save();
                this.ctx.shadowBlur = 8;
                this.ctx.shadowColor = `rgba(${rgb}, ${currentAlpha * 0.85})`;
                this.ctx.fillStyle = `rgba(${rgb}, ${currentAlpha})`;

                this.ctx.beginPath();
                this.ctx.arc(dot.x, dot.y, dot.radius, 0, Math.PI * 2);
                this.ctx.fill();
                this.ctx.restore();
            }
        }

        loop() {
            if (!this.isRunning) return;
            this.update();
            this.draw();
            this.rafId = requestAnimationFrame(() => this.loop());
        }

        start() {
            if (!this.isRunning) {
                this.isRunning = true;
                this.loop();
            }
        }

        stop() {
            this.isRunning = false;
            if (this.rafId) {
                cancelAnimationFrame(this.rafId);
                this.rafId = null;
            }
        }

        destroy() {
            this.stop();
            if (this.observer) this.observer.disconnect();
            window.removeEventListener('mousemove', this.handleMouseMove);
            document.removeEventListener('mouseleave', this.handleMouseLeave);
            window.removeEventListener('resize', this.handleResize);
            if (this.canvas && this.canvas.parentNode) {
                this.canvas.parentNode.removeChild(this.canvas);
            }
        }
    }

    // Auto-Mount Controller
    function initOrangeDots() {
        // EXCLUSION CHECK:
        // DO NOT use orange dots in web section (#services / #spider-container / #web-bg-canvas)
        // because it will affect the orange spider web!
        const isExcluded = (el) => {
            if (!el) return true;
            if (el.id === 'services' || el.id === 'spider-container' || el.id === 'web-bg-canvas') return true;
            if (el.closest('#services') || el.closest('#spider-container') || el.classList.contains('services-section')) return true;
            return false;
        };

        const targetSelectors = [
            // Home page black background section & footer
            '#expertise',
            
            // Services page black background sections
            '.eeat-authority-bar',
            '#full-explorer',
            '.keyword-matrix-section',
            '.services-cta-banner',

            // SEO Services page black background sections
            '.seo-hero-wrap',
            '.pillars-section',
            '.chart-timeline-section',
            '.localities-matrix-section',
            '.specialists-spotlight-section',
            '.seo-keywords-section',
            '.seo-faq-section',

            // Universal black footer & sub-services dark sections
            '.process-section',
            '.cta-banner',
            '.tech-matrix-section',
            '.comparison-section',
            '#main-footer',
            'footer',
            '.site-footer'
        ];

        targetSelectors.forEach(sel => {
            const elements = document.querySelectorAll(sel);
            elements.forEach(el => {
                if (!isExcluded(el) && !el.querySelector('.fx-orange-dots-canvas')) {
                    new OrangeDotsField(el);
                }
            });
        });

        // Also check any element with explicit class .fx-has-orange-dots
        document.querySelectorAll('.fx-has-orange-dots').forEach(el => {
            if (!isExcluded(el) && !el.querySelector('.fx-orange-dots-canvas')) {
                new OrangeDotsField(el);
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initOrangeDots);
    } else {
        initOrangeDots();
    }

    window.OrangeDotsField = OrangeDotsField;
})();
