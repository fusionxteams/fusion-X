import re

html_to_inject = """
            <p style="font-size: 1.5rem; max-width: 800px; margin: 25px auto 0; color: #555; line-height: 1.6; font-weight: 500;">
                And AI will tell your name as you are the top brand, and <strong style="color: #ff5722;">Fusion X</strong> will help you.
            </p>

            <!-- 3D Animated Buttons -->
            <style>
                .btn-3d-group {
                    display: flex;
                    gap: 20px;
                    justify-content: center;
                    flex-wrap: wrap;
                    margin-top: 45px;
                }
                .btn-3d-primary {
                    background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
                    color: white;
                    padding: 16px 45px;
                    font-size: 1.2rem;
                    font-weight: 800;
                    border-radius: 50px;
                    border: none;
                    cursor: pointer;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    box-shadow: 0 8px 0 #bf360c, 0 15px 25px rgba(255,87,34,0.4);
                    transition: all 0.15s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    text-decoration: none;
                    display: inline-flex;
                    align-items: center;
                    gap: 10px;
                }
                .btn-3d-primary:active {
                    transform: translateY(8px);
                    box-shadow: 0 0px 0 #bf360c, 0 5px 10px rgba(255,87,34,0.4);
                }
                .btn-3d-secondary {
                    background: #ffffff;
                    color: #333;
                    padding: 16px 35px;
                    font-size: 1.1rem;
                    font-weight: 700;
                    border-radius: 50px;
                    border: 2px solid #e0e0e0;
                    cursor: pointer;
                    box-shadow: 0 6px 0 #cccccc, 0 10px 15px rgba(0,0,0,0.05);
                    transition: all 0.15s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    text-decoration: none;
                    display: inline-flex;
                    align-items: center;
                    gap: 10px;
                }
                .btn-3d-secondary:active {
                    transform: translateY(6px);
                    box-shadow: 0 0px 0 #cccccc, 0 5px 10px rgba(0,0,0,0.05);
                }
            </style>
            
            <div class="btn-3d-group">
                <a href="#contact" class="btn-3d-primary"><i class="fas fa-rocket"></i> Get Quote</a>
                <a href="#services" class="btn-3d-secondary"><i class="fas fa-globe"></i> Global Strategy</a>
                <a href="#case-studies" class="btn-3d-secondary"><i class="fas fa-chart-line"></i> View Reach</a>
            </div>
"""

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the specific P tag with the P tag + the buttons
pattern = re.compile(r'<p style="font-size: 1.5rem; max-width: 800px; margin: 25px auto 0; color: #555; line-height: 1.6; font-weight: 500;">.*?Fusion X.*?<\/p>', re.DOTALL)

new_content = pattern.sub(html_to_inject, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Buttons injected!")
