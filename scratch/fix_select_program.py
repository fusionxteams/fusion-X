import re

with open('careers.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace selectProgram function with robust matching
old_select = """        function selectProgram(type, duration, trackName) {
            const formSection = document.getElementById('apply-form-section');
            const typeSelect = document.getElementById('programType');
            const durationSelect = document.getElementById('programDuration');
            const trackSelect = document.getElementById('specializationTrack');

            if (typeSelect) typeSelect.value = type;
            if (durationSelect) durationSelect.value = duration;

            if (trackSelect) {
                // Find matching option
                for (let i = 0; i < trackSelect.options.length; i++) {
                    if (trackSelect.options[i].text.toLowerCase().includes(trackName.toLowerCase()) || 
                        trackName.toLowerCase().includes(trackSelect.options[i].value.toLowerCase())) {
                        trackSelect.selectedIndex = i;
                        break;
                    }
                }
            }

            if (formSection) {
                formSection.scrollIntoView({ behavior: 'smooth' });
                // Briefly highlight input
                setTimeout(() => {
                    const nameInput = document.getElementById('applicantName');
                    if (nameInput) nameInput.focus();
                }, 600);
            }
        }"""

new_select = """        function selectProgram(type, duration, trackName) {
            const formSection = document.getElementById('apply-form-section');
            const typeSelect = document.getElementById('programType');
            const durationSelect = document.getElementById('programDuration');
            const trackSelect = document.getElementById('specializationTrack');

            if (typeSelect) typeSelect.value = type;
            if (durationSelect) durationSelect.value = duration;

            if (trackSelect) {
                const query = trackName.toLowerCase();
                for (let i = 0; i < trackSelect.options.length; i++) {
                    const optVal = trackSelect.options[i].value.toLowerCase();
                    const optText = trackSelect.options[i].text.toLowerCase();
                    if (
                        (query.includes('seo') && optVal.includes('seo')) ||
                        (query.includes('web') && optVal.includes('web')) ||
                        (query.includes('video') && optVal.includes('video')) ||
                        (query.includes('social') && optVal.includes('social')) ||
                        (query.includes('marketing') && optVal.includes('marketing')) ||
                        optVal.includes(query) || query.includes(optVal) ||
                        optText.includes(query) || query.includes(optText)
                    ) {
                        trackSelect.selectedIndex = i;
                        break;
                    }
                }
            }

            if (formSection) {
                formSection.scrollIntoView({ behavior: 'smooth' });
                setTimeout(() => {
                    const nameInput = document.getElementById('applicantName');
                    if (nameInput) nameInput.focus();
                }, 500);
            }
        }"""

if old_select in content:
    content = content.replace(old_select, new_select)
    with open('careers.html', 'w', encoding='utf-8') as f:
        f.write(content)
    print("Updated selectProgram logic successfully.")
else:
    print("old_select not found")
