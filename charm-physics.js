// charm-physics.js

document.addEventListener("DOMContentLoaded", () => {
    const stringElement = document.querySelector('.charm-string');
    const charmElement = document.querySelector('.charm-object');
    
    if (!stringElement || !charmElement) return;

    // Physics variables
    let angle = 0.2; // Starting angle in radians (~11 degrees)
    let aVelocity = 0.0;
    let aAcceleration = 0.0;
    
    // Constants
    const gravity = 0.4; // Gravity strength
    const length = 70; // Length of the string
    const damping = 0.985; // Air resistance / friction
    
    // Interaction state
    let isDragging = false;
    
    // Disable CSS animation so JS can take over
    stringElement.style.animation = 'none';
    charmElement.style.cursor = 'grab';

    // Update loop
    function updatePhysics() {
        if (!isDragging) {
            // Standard Pendulum Math
            aAcceleration = (-1 * gravity / length) * Math.sin(angle);
            aVelocity += aAcceleration;
            aVelocity *= damping;
            angle += aVelocity;
        }
        
        // Apply rotation via CSS transform
        // The transform-origin is already top center via CSS
        const degrees = angle * (180 / Math.PI);
        stringElement.style.transform = `rotate(${degrees}deg)`;
        
        requestAnimationFrame(updatePhysics);
    }

    // Start physics loop
    updatePhysics();

    // Interaction handling (Mouse & Touch)
    function startDrag(e) {
        isDragging = true;
        charmElement.style.cursor = 'grabbing';
        
        // Optional: Reset velocity when caught so it doesn't violently snap when released
        aVelocity = 0;
        
        // Prevent default text selection/scrolling while dragging
        if (e.cancelable) e.preventDefault(); 
    }

    function drag(e) {
        if (!isDragging) return;
        
        // Get the bounding box of the pivot (top of the string)
        const pivotRect = stringElement.getBoundingClientRect();
        // The pivot is at the top-center of the string element
        const pivotX = pivotRect.left + (pivotRect.width / 2);
        const pivotY = pivotRect.top;
        
        // Get client coordinates depending on touch or mouse
        let clientX = e.clientX;
        let clientY = e.clientY;
        if (e.touches && e.touches.length > 0) {
            clientX = e.touches[0].clientX;
            clientY = e.touches[0].clientY;
        }

        // Calculate angle from pivot to mouse
        const dx = clientX - pivotX;
        const dy = clientY - pivotY;
        
        // atan2 gives angle from X axis. We subtract PI/2 to align with Y axis (downwards)
        let newAngle = Math.atan2(dy, dx) - (Math.PI / 2);
        
        // Clamp the angle so they can't flip it over the top of the nav bar
        const maxAngle = Math.PI / 2.5; // ~72 degrees
        if (newAngle > maxAngle) newAngle = maxAngle;
        if (newAngle < -maxAngle) newAngle = -maxAngle;
        
        angle = newAngle;
    }

    function endDrag() {
        if (isDragging) {
            isDragging = false;
            charmElement.style.cursor = 'grab';
        }
    }

    // Mouse events
    charmElement.addEventListener('mousedown', startDrag);
    window.addEventListener('mousemove', drag);
    window.addEventListener('mouseup', endDrag);

    // Touch events for mobile
    charmElement.addEventListener('touchstart', startDrag, { passive: false });
    window.addEventListener('touchmove', drag, { passive: false });
    window.addEventListener('touchend', endDrag);

    
});
