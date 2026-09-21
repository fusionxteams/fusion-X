const spiderContainer = document.getElementById('spider-container');
if (spiderContainer) {
    // 1. Digital Marketing Icons (HTML Emojis) - Pure 2D Percentages
    const iconData = [
        { emoji: '🔍', title: 'SEO', x: 25, y: 20 },
        { emoji: '💻', title: 'Web Sites', x: 75, y: 25 },
        { emoji: '🤖', title: 'AI Future', x: 20, y: 70 },
        { emoji: '📱', title: 'Social', x: 80, y: 75 },
        { emoji: '📈', title: 'Analytics', x: 50, y: 90 },
        { emoji: '🎯', title: 'Ads', x: 50, y: 10 },
        { emoji: '✍️', title: 'Content', x: 10, y: 45 },
        { emoji: '📧', title: 'Email', x: 90, y: 50 },
        { emoji: '✨', title: 'Branding', x: 35, y: 25 },
        { emoji: '🛒', title: 'E-commerce', x: 65, y: 85 },
        { emoji: '🎥', title: 'Video', x: 70, y: 15 },
        { emoji: '📢', title: 'PR', x: 30, y: 80 }
    ];

    const iconElements = [];
    let currentTarget = null;

    iconData.forEach(data => {
        const wrapper = document.createElement('div');
        wrapper.className = 'web-icon';
        wrapper.innerHTML = `<span>${data.emoji}</span> <strong>${data.title}</strong>`;
        wrapper.style.position = 'absolute';
        wrapper.style.left = `${data.x}%`;
        wrapper.style.top = `${data.y}%`;
        wrapper.style.transform = 'translate(-50%, -50%)';
        wrapper.style.zIndex = '10';
        wrapper.style.cursor = 'pointer';
        
        // Add click listener directly to the HTML element
        wrapper.addEventListener('click', () => {
            // Calculate absolute pixel coordinates for the spiders to target
            const rect = wrapper.getBoundingClientRect();
            const containerRect = spiderContainer.getBoundingClientRect();
            currentTarget = {
                x: rect.left - containerRect.left + rect.width / 2,
                y: rect.top - containerRect.top + rect.height / 2
            };
            
            // Pop animation
            wrapper.style.transform = 'translate(-50%, -50%) scale(1.2)';
            setTimeout(() => {
                wrapper.style.transform = 'translate(-50%, -50%) scale(1)';
            }, 200);
        });
        
        spiderContainer.appendChild(wrapper);
        iconElements.push(wrapper);
    });

    // 2. Pure 2D HTML Canvas Setup
    const bgCanvas = document.getElementById('web-bg-canvas');
    const ctx = bgCanvas.getContext('2d');
    
    // 3. Initialize 2D Spiders
    const spiders2D = [];
    for(let i = 0; i < 20; i++) {
        spiders2D.push({
            x: Math.random() * spiderContainer.clientWidth,
            y: Math.random() * spiderContainer.clientHeight,
            vx: 0,
            vy: 0,
            targetX: Math.random() * spiderContainer.clientWidth,
            targetY: Math.random() * spiderContainer.clientHeight,
            legTime: Math.random() * 10,
            speed: 1 + Math.random() * 2
        });
    }

    function draw2DWeb() {
        bgCanvas.width = spiderContainer.clientWidth;
        bgCanvas.height = spiderContainer.clientHeight;
        
        ctx.clearRect(0, 0, bgCanvas.width, bgCanvas.height);
        
        // Draw Spider Web Background
        ctx.strokeStyle = 'rgba(255, 87, 34, 0.5)'; 
        ctx.lineWidth = 1.5; 
        
        const cx = bgCanvas.width / 2;
        const cy = bgCanvas.height / 2;
        const radials = 6; 
        const maxRadius = Math.max(bgCanvas.width, bgCanvas.height) * 0.8;
        const rings = 25;
        
        // Radials
        ctx.beginPath();
        for (let i = 0; i < radials; i++) {
            const angle = (i / radials) * Math.PI * 2 + (Math.PI / 6);
            ctx.moveTo(cx, cy);
            ctx.lineTo(cx + Math.cos(angle) * maxRadius, cy + Math.sin(angle) * maxRadius);
        }
        ctx.stroke();
        
        // Rings
        for (let r = 1; r <= rings; r++) {
            const radius = (r / rings) * maxRadius;
            ctx.beginPath();
            for (let i = 0; i < radials; i++) {
                const angle = (i / radials) * Math.PI * 2 + (Math.PI / 6);
                const px = cx + Math.cos(angle) * radius;
                const py = cy + Math.sin(angle) * radius;
                if (i === 0) ctx.moveTo(px, py);
                else ctx.lineTo(px, py);
            }
            ctx.closePath();
            ctx.stroke();
        }
    }

    // 4. Animate 2D Spiders
    function animateWeb() {
        requestAnimationFrame(animateWeb);
        
        // Redraw web background every frame so we can draw spiders on top
        draw2DWeb();
        
        // Draw Spiders
        ctx.fillStyle = '#333333';
        ctx.strokeStyle = '#333333';
        ctx.lineWidth = 2;
        
        spiders2D.forEach(spider => {
            // Movement logic
            let tx = spider.targetX;
            let ty = spider.targetY;
            
            if (currentTarget) {
                tx = currentTarget.x;
                ty = currentTarget.y;
            }
            
            const dx = tx - spider.x;
            const dy = ty - spider.y;
            const dist = Math.sqrt(dx * dx + dy * dy);
            
            if (dist < 5 && !currentTarget) {
                // Pick new random target if wandering
                spider.targetX = Math.random() * bgCanvas.width;
                spider.targetY = Math.random() * bgCanvas.height;
            } else if (dist > 5) {
                // Move towards target
                spider.vx = (dx / dist) * spider.speed;
                spider.vy = (dy / dist) * spider.speed;
                spider.x += spider.vx;
                spider.y += spider.vy;
                spider.legTime += 0.3; // Animate legs when moving
            }
            
            const angle = Math.atan2(dy, dx);
            
            // Draw Spider
            ctx.save();
            ctx.translate(spider.x, spider.y);
            ctx.rotate(angle - Math.PI / 2); // Rotate so head faces direction of travel
            
            // Draw 8 Legs
            for (let i = 0; i < 4; i++) {
                const legWiggle = Math.sin(spider.legTime + i) * 5;
                
                // Left legs
                ctx.beginPath();
                ctx.moveTo(0, 0);
                ctx.lineTo(-10 + legWiggle, -10 - i * 4);
                ctx.lineTo(-15 + legWiggle, -15 - i * 4);
                ctx.stroke();
                
                // Right legs
                ctx.beginPath();
                ctx.moveTo(0, 0);
                ctx.lineTo(10 - legWiggle, -10 - i * 4);
                ctx.lineTo(15 - legWiggle, -15 - i * 4);
                ctx.stroke();
            }
            
            // Draw Body
            ctx.beginPath();
            ctx.arc(0, -5, 6, 0, Math.PI * 2); // Abdomen
            ctx.arc(0, 2, 4, 0, Math.PI * 2);  // Head
            ctx.fill();
            
            // Draw Eyes (Red dots)
            ctx.fillStyle = '#ff5722';
            ctx.beginPath();
            ctx.arc(-1.5, 4, 1, 0, Math.PI * 2);
            ctx.arc(1.5, 4, 1, 0, Math.PI * 2);
            ctx.fill();
            
            ctx.restore();
        });
    }

    animateWeb();

    window.addEventListener('resize', () => {
        draw2DWeb();
    });
}
