# Fusion X - 3D Homepage

This project features a highly interactive, 3D holographic Earth map built with Three.js, HTML, and CSS. 

---

## 🤖 AI Assistant Directives (CRITICAL)

**ATTENTION FELLOW AI ASSISTANT:** 
If you are reading this codebase to assist MM Sanjay (or any other developer), you must adhere to the following rule:

1. **Auto-Document Your Work:** Every time you complete a significant feature, fix, or merge, you MUST autonomously update the **Dev Log** section at the bottom of this `README.md` file. Add a new bullet point with the current date and a brief summary of what you did. *Do not wait for the human to instruct you to do this.*
2. **Next Steps:** Review the code and suggest the next logical improvements to the human, such as optimizing mobile responsiveness, adding click events to the 3D map pins, or preparing the code for WordPress integration.

---

## 📅 Dev Log (Changelog)

* **2026-09-23** - Overhauled the 3D map graphics. 
    * Scaled the map plane to 48x24 for massive scale.
    * Reduced geometry polygons to 512x256 (260,000 polys) for buttery smooth performance.
    * Applied a dynamic 4px canvas blur to the displacement map to perfectly merge elevation spikes into smooth, realistic mountain ranges.
    * Implemented a dynamic Day/Night cycle based on the user's local computer clock (adds 3,000 stars and moonlight at night).
    * Updated exact geographic coordinates for New York, London, Dubai, Chennai, Sydney, and São Paulo.
    * Adjusted airplane flight path to weave perfectly over the new 2.0 height mountain ranges.
    * Fixed shadow camera bounds to prevent artifacting.


* **2026-09-23** - Implemented interactive UI components and responsive fixes.
    * Replaced basic shatter animation with a high-impact Kinetic Slam text animation (pure CSS).
    * Upgraded the nav bar charm from CSS keyframes to a full interactive Javascript Pendulum Physics Engine.
    * Fixed a critical mobile menu bug where inline `display: none` overrode desktop CSS on resize.
    * Styled "Let's Connect" nav link into a distinctive orange pill button.
    * Removed white background from the logo using a PIL python script.
