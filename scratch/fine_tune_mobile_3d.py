# 1. Update fusion-3d-logo.js
with open('fusion-3d-logo.js', 'r', encoding='utf-8') as f:
    js = f.read()

# Update desiredSize
old_desired = "const desiredSize = container.clientWidth < 600 ? 2.50 : 2.45;"
new_desired = "const desiredSize = container.clientWidth < 600 ? 1.95 : 2.35;"
if old_desired in js:
    js = js.replace(old_desired, new_desired)
    print("Updated desiredSize in js")
else:
    print("WARNING: desiredSize not found in js")

# Update handleResize camera.position.z
old_cam_logic = """        if (w < 600) {
            camera.position.z = 2.65;
        } else if (w < 900) {
            camera.position.z = 2.75;
        } else {
            camera.position.z = 2.80;
        }"""

new_cam_logic = """        if (w < 600) {
            camera.position.z = 3.25;
        } else if (w < 900) {
            camera.position.z = 2.90;
        } else {
            camera.position.z = 2.80;
        }"""

if old_cam_logic in js:
    js = js.replace(old_cam_logic, new_cam_logic)
    print("Updated camera logic in js")
else:
    print("WARNING: camera logic not found in js")

with open('fusion-3d-logo.js', 'w', encoding='utf-8') as f:
    f.write(js)

# 2. Update index.html mobile height of .fusion-3d-box
with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

old_box_h = """                .fusion-3d-box {
                    height: 380px !important;
                    width: 100% !important;
                    max-width: 100% !important;
                }"""

new_box_h = """                .fusion-3d-box {
                    height: 320px !important;
                    width: 100% !important;
                    max-width: 100% !important;
                }"""

if old_box_h in html:
    html = html.replace(old_box_h, new_box_h)
    print("Updated mobile box height in html")
else:
    print("WARNING: mobile box height not found in html")

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(html)

print("Updates complete!")
