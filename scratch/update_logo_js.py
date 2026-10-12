with open('fusion-3d-logo.js', 'r', encoding='utf-8') as f:
    content = f.read()

# Update initial camera position
old_cam = "camera.position.set(0, 0, 3.4);"
new_cam = "camera.position.set(0, 0, 2.75);"
if old_cam in content:
    content = content.replace(old_cam, new_cam)
    print("Updated initial camera position")
else:
    print("WARNING: initial camera position not found")

# Update desiredSize
old_size = "const desiredSize = container.clientWidth < 600 ? 1.85 : 2.15;"
new_size = "const desiredSize = container.clientWidth < 600 ? 2.50 : 2.45;"
if old_size in content:
    content = content.replace(old_size, new_size)
    print("Updated desiredSize")
else:
    print("WARNING: desiredSize not found")

# Update handleResize
old_resize = """    function handleResize() {
        if (!container || !renderer || !camera) return;
        const w = container.clientWidth;
        const h = container.clientHeight;
        camera.aspect = w / h;
        if (w < 500) {
            camera.position.z = 4.0;
        } else if (w < 800) {
            camera.position.z = 3.6;
        } else {
            camera.position.z = 3.2;
        }
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
    }"""

new_resize = """    function handleResize() {
        if (!container || !renderer || !camera) return;
        const w = container.clientWidth;
        const h = container.clientHeight;
        camera.aspect = w / h;
        // Keep 3D logo prominently large and centered on both mobile and desktop
        if (w < 600) {
            camera.position.z = 2.65;
        } else if (w < 900) {
            camera.position.z = 2.75;
        } else {
            camera.position.z = 2.80;
        }
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
        if (renderer.domElement) {
            renderer.domElement.style.width = '100%';
            renderer.domElement.style.maxWidth = '100%';
            renderer.domElement.style.height = '100%';
        }
    }"""

if old_resize in content:
    content = content.replace(old_resize, new_resize)
    print("Updated handleResize")
else:
    print("WARNING: handleResize not found")

# Also ensure renderer.domElement has width 100% after appendChild
old_append = "container.appendChild(renderer.domElement);"
new_append = """container.appendChild(renderer.domElement);
    if (renderer.domElement) {
        renderer.domElement.style.width = '100%';
        renderer.domElement.style.maxWidth = '100%';
        renderer.domElement.style.height = '100%';
    }"""
if old_append in content:
    content = content.replace(old_append, new_append)
    print("Updated appendChild")

with open('fusion-3d-logo.js', 'w', encoding='utf-8') as f:
    f.write(content)
print("fusion-3d-logo.js updated successfully!")
