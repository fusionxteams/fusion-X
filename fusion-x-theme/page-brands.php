<?php
/**
 * Template Name: Brands We Worked
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        :root {
            --fx-orange: #ff5722;
            --fx-orange-hover: #e64a19;
            --fx-orange-glow: rgba(255, 87, 34, 0.45);
            --fx-orange-tint: rgba(255, 87, 34, 0.12);
            --fx-dark-bg: #07090e;
            --fx-card-bg: rgba(18, 24, 38, 0.85);
            --fx-card-border: rgba(255, 255, 255, 0.1);
            --fx-text-primary: #f8fafc;
            --fx-text-secondary: #94a3b8;
            --fx-text-muted: #64748b;
        }

        body {
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--fx-dark-bg);
            color: var(--fx-text-primary);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* â”€â”€ CYBER HERO WITH INTERACTIVE ORANGE DOTS â”€â”€ */
        .brands-hero-stage {
            position: relative;
            padding: 160px 24px 85px;
            background: radial-gradient(circle at 50% 18%, rgba(255, 87, 34, 0.18) 0%, rgba(7, 9, 14, 0.98) 75%), #07090e;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            overflow: hidden;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Kinetic Scrolling Word Streams behind Hero */
        .hero-kinetic-rails {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 2;
        }

        .kinetic-rail {
            position: absolute;
            width: 320%;
            left: -80%;
            white-space: nowrap;
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: clamp(3.2rem, 7vw, 6.5rem);
            -webkit-text-stroke: 1.5px rgba(255, 87, 34, 0.28);
            color: rgba(255, 87, 34, 0.03);
            user-select: none;
            will-change: transform;
            transition: transform 0.08s linear;
        }

        .kinetic-rail-top {
            top: 10%;
            transform: rotate(-2deg);
        }

        .kinetic-rail-bottom {
            bottom: 8%;
            transform: rotate(1.5deg);
        }

        .kinetic-rail span {
            margin-right: 60px;
            display: inline-block;
        }

        /* 3D Floating Parallax Words */
        .floating-scroll-word {
            position: absolute;
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            font-size: clamp(2.2rem, 5vw, 4.5rem);
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255, 87, 34, 0.09);
            -webkit-text-stroke: 1.5px rgba(255, 87, 34, 0.28);
            pointer-events: none;
            user-select: none;
            will-change: transform;
            z-index: 2;
        }

        .fsw-1 { top: 20%; left: 4%; }
        .fsw-2 { top: 38%; right: 5%; }
        .fsw-3 { top: 68%; left: 3%; }
        .fsw-4 { top: 85%; right: 4%; }

        .hero-inner-container {
            position: relative;
            z-index: 3;
            max-width: 1080px;
            margin: 0 auto;
        }

        .hero-badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 24px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.4);
            border-radius: 50px;
            font-size: 0.84rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ff7043;
            margin-bottom: 26px;
            box-shadow: 0 0 25px rgba(255, 87, 34, 0.25);
            backdrop-filter: blur(12px);
        }

        /* Scroll-Animated Words Headline */
        .hero-title-scroll {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.8rem, 6.2vw, 5.2rem);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: -1.5px;
            color: #ffffff;
            max-width: 1000px;
            margin: 0 auto 24px;
            perspective: 1000px;
            text-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
        }

        .scroll-word-item {
            display: inline-block;
            transform-style: preserve-3d;
            will-change: transform, opacity;
            transition: transform 0.15s ease-out, color 0.3s ease;
        }

        .scroll-word-item.gradient-accent {
            background: linear-gradient(135deg, #ff5722 0%, #ff9e80 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            font-size: clamp(1.1rem, 2vw, 1.32rem);
            line-height: 1.7;
            color: #cbd5e1;
            max-width: 820px;
            margin: 0 auto 40px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
        }

        /* Tech Chips Row */
        .tech-chips {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 44px;
        }

        .tech-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 50px;
            font-size: 0.88rem;
            font-weight: 700;
            color: #e2e8f0;
            backdrop-filter: blur(10px);
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .tech-chip:hover {
            border-color: var(--fx-orange);
            color: var(--fx-orange);
            background: rgba(255, 87, 34, 0.12);
            transform: translateY(-2px);
        }

        .tech-chip i {
            color: var(--fx-orange);
        }

        /* Telemetry Strip */
        .hero-telemetry-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            max-width: 980px;
            margin: 0 auto 48px;
        }

        .telemetry-pill-card {
            background: rgba(18, 24, 38, 0.7);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 18px;
            padding: 22px 16px;
            backdrop-filter: blur(16px);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            cursor: pointer;
        }

        .telemetry-pill-card:hover {
            border-color: var(--fx-orange);
            transform: translateY(-6px);
            box-shadow: 0 14px 35px var(--fx-orange-glow);
            background: rgba(255, 87, 34, 0.08);
        }

        .telemetry-val {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: #ffffff;
            line-height: 1;
            margin-bottom: 6px;
        }

        .telemetry-val span {
            color: var(--fx-orange);
        }

        .telemetry-lbl {
            font-size: 0.78rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .hero-ctas {
            display: flex;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .btn-primary-hero {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 36px;
            background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
            color: #ffffff !important;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 800;
            font-size: 1rem;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.45);
            transition: all 0.3s ease;
        }

        .btn-primary-hero:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 14px 35px rgba(255, 87, 34, 0.65);
        }

        .btn-secondary-hero {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 36px;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff !important;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50px;
            text-decoration: none;
            border: 1.5px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }

        .btn-secondary-hero:hover {
            border-color: var(--fx-orange);
            color: var(--fx-orange) !important;
            background: rgba(255, 87, 34, 0.1);
            transform: translateY(-2px);
        }

        /* â”€â”€ INFINITE BRAND LOGO MARQUEE â”€â”€ */
        .marquee-section-dark {
            padding: 28px 0;
            background: #090c12;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            overflow: hidden;
            position: relative;
        }

        .marquee-track-dark {
            display: flex;
            align-items: center;
            gap: 20px;
            width: max-content;
            animation: darkMarquee 45s linear infinite;
        }

        .marquee-track-dark:hover {
            animation-play-state: paused;
        }

        @keyframes darkMarquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .marquee-chip-dark {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 22px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.25s ease;
            flex-shrink: 0;
        }

        .marquee-chip-dark:hover {
            border-color: var(--fx-orange);
            background: rgba(255, 87, 34, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px var(--fx-orange-glow);
        }

        .marquee-chip-dark img {
            width: 32px;
            height: 32px;
            object-fit: contain;
            border-radius: 6px;
            background: #ffffff;
            padding: 3px;
        }

        .marquee-chip-dark span {
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: #ffffff;
            white-space: nowrap;
        }

        /* â”€â”€ REVOLUTIONARY 3D BRAND SHOWCASE STAGE â”€â”€ */
        .showcase-stage-section {
            position: relative;
            padding: 90px 24px 110px;
            background: #080a0f;
            overflow: hidden;
        }

        .showcase-inner-container {
            position: relative;
            z-index: 3;
            max-width: 1360px;
            margin: 0 auto;
        }

        .showcase-header {
            text-align: center;
            max-width: 820px;
            margin: 0 auto 50px;
        }

        .showcase-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.3rem, 4.5vw, 3.5rem);
            font-weight: 900;
            color: #ffffff;
            margin: 0 0 14px;
        }

        .showcase-header h2 span {
            color: var(--fx-orange);
        }

        .showcase-header p {
            font-size: 1.15rem;
            color: #94a3b8;
            margin: 0;
        }

        /* Filter Controls & Live Search Bar */
        .controls-hub-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            background: rgba(18, 24, 38, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 16px 24px;
            margin-bottom: 50px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(16px);
        }

        .category-tabs-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .cat-tab-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 9px 20px;
            border-radius: 50px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.88rem;
            font-weight: 700;
            color: #cbd5e1;
            cursor: pointer;
            transition: all 0.25s ease;
            outline: none;
        }

        .cat-tab-btn:hover {
            border-color: var(--fx-orange);
            color: var(--fx-orange);
            background: rgba(255, 87, 34, 0.1);
            transform: translateY(-2px);
        }

        .cat-tab-btn.active {
            background: var(--fx-orange);
            border-color: var(--fx-orange);
            color: #ffffff;
            box-shadow: 0 4px 18px var(--fx-orange-glow);
        }

        .tab-count-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
            height: 20px;
            padding: 0 5px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.2);
            font-size: 0.72rem;
            font-weight: 800;
        }

        .cat-tab-btn.active .tab-count-pill {
            background: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        .search-field-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-field-input {
            padding: 10px 18px 10px 42px;
            border-radius: 50px;
            background: rgba(10, 14, 23, 0.85);
            border: 1.5px solid rgba(255, 255, 255, 0.12);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.88rem;
            color: #ffffff;
            outline: none;
            width: 240px;
            transition: all 0.25s ease;
        }

        .search-field-input:focus {
            width: 290px;
            border-color: var(--fx-orange);
            box-shadow: 0 0 18px var(--fx-orange-glow);
        }

        .search-field-icon {
            position: absolute;
            left: 16px;
            color: #64748b;
            pointer-events: none;
        }

        /* â”€â”€ 3D HOLOGRAPHIC BRAND CARDS (Unique Architecture) â”€â”€ */
        .brands-hologram-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 32px;
            perspective: 1200px;
        }

        .hologram-brand-monolith {
            background: linear-gradient(160deg, rgba(24, 32, 50, 0.8) 0%, rgba(12, 17, 28, 0.95) 100%);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 26px;
            display: flex;
            flex-direction: column;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease, border-color 0.3s ease;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(16px);
            opacity: 0;
            transform: translateY(45px) rotateX(10deg) scale(0.96);
            will-change: transform, opacity;
        }

        .hologram-brand-monolith.revealed {
            opacity: 1;
            transform: translateY(0) rotateX(0deg) scale(1);
        }

        .hologram-brand-monolith:hover {
            border-color: var(--fx-orange);
            box-shadow: 0 20px 60px -10px var(--fx-orange-glow), 0 0 25px rgba(255, 87, 34, 0.25);
            transform: translateY(-8px) scale(1.02);
            z-index: 5;
        }

        .monolith-status-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .monolith-verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #ff7043;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.3);
            padding: 4px 10px;
            border-radius: 20px;
        }

        .monolith-sector-badge {
            font-size: 0.72rem;
            font-weight: 700;
            color: #94a3b8;
            background: rgba(255, 255, 255, 0.06);
            padding: 4px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Large Brand Logo Stage Box */
        .monolith-logo-box {
            position: relative;
            width: 100%;
            height: 190px;
            background: #ffffff;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            box-sizing: border-box;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.04);
        }

        .monolith-logo-box img {
            max-width: 85%;
            max-height: 85%;
            object-fit: contain;
            border-radius: 10px;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .hologram-brand-monolith:hover .monolith-logo-box img {
            transform: scale(1.08);
        }

        .monolith-title-line {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
        }

        .monolith-brand-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.45rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            line-height: 1.2;
        }

        .monolith-check-icon {
            color: var(--fx-orange);
            font-size: 0.95rem;
        }

        .monolith-strapline {
            font-size: 0.84rem;
            color: #94a3b8;
            font-weight: 500;
            margin-bottom: 14px;
            display: block;
        }

        .monolith-kpi-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            padding: 8px 14px;
            border-radius: 10px;
            margin-bottom: 14px;
            font-size: 0.9rem;
            color: #ff7043;
            transition: all 0.3s ease;
        }

        .monolith-kpi-pill strong {
            font-weight: 900;
            color: #ffffff;
        }

        .hologram-brand-monolith:hover .monolith-kpi-pill {
            background: rgba(255, 87, 34, 0.2);
            border-color: var(--fx-orange);
            transform: scale(1.02);
        }

        .monolith-desc-text {
            font-size: 0.86rem;
            line-height: 1.6;
            color: #cbd5e1;
            margin: 0 0 20px;
            flex-grow: 1;
        }

        .monolith-action-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
        }

        .btn-monolith-inspect {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 11px 14px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.82rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-monolith-inspect:hover {
            border-color: var(--fx-orange);
            color: var(--fx-orange);
            background: rgba(255, 87, 34, 0.12);
        }

        .btn-monolith-case {
            flex: 1.4;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
            color: #ffffff !important;
            border-radius: 12px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.84rem;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(255, 87, 34, 0.4);
        }

        .btn-monolith-case:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 87, 34, 0.6);
        }

        /* â”€â”€ INTERACTIVE DOSSIER MODAL â”€â”€ */
        .dossier-modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(5, 7, 12, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.35s ease;
        }

        .dossier-modal-backdrop.modal-active {
            opacity: 1;
            pointer-events: auto;
        }

        .dossier-modal-window {
            background: linear-gradient(150deg, #1e293b 0%, #0f172a 100%);
            border: 2px solid var(--fx-orange);
            border-radius: 26px;
            max-width: 760px;
            width: 100%;
            padding: 38px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.8), 0 0 50px var(--fx-orange-glow);
            position: relative;
            transform: scale(0.9) translateY(20px);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .dossier-modal-backdrop.modal-active .dossier-modal-window {
            transform: scale(1) translateY(0);
        }

        .dossier-close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .dossier-close-btn:hover {
            background: var(--fx-orange);
            transform: rotate(90deg);
        }

        .dossier-layout-grid {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 28px;
            align-items: center;
        }

        .dossier-logo-frame {
            background: #ffffff;
            border-radius: 18px;
            padding: 24px;
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .dossier-logo-frame img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .dossier-details h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.9rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 4px;
        }

        .dossier-tagline {
            color: var(--fx-orange);
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 14px;
            display: block;
        }

        .dossier-metric-callout {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 87, 34, 0.15);
            border: 1px solid rgba(255, 87, 34, 0.4);
            border-radius: 10px;
            padding: 8px 16px;
            margin-bottom: 16px;
            font-size: 1rem;
            color: #ffffff;
        }

        .dossier-metric-callout strong {
            color: #ff7043;
            font-size: 1.3rem;
        }

        .dossier-deliverables {
            margin: 0 0 22px;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .dossier-deliverables li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.88rem;
            color: #cbd5e1;
            line-height: 1.5;
        }

        .dossier-deliverables li i {
            color: var(--fx-orange);
            margin-top: 4px;
        }

        /* â”€â”€ 4-PHASE ACCELERATION SPRINT â”€â”€ */
        .process-section {
            background: #080808;
            color: #ffffff;
            padding: 100px 24px;
            border-radius: 36px;
            margin: 60px 24px;
            position: relative;
            overflow: hidden;
        }

        .process-header {
            text-align: center;
            max-width: 740px;
            margin: 0 auto 60px;
        }

        .process-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            font-weight: 800;
            margin-bottom: 16px;
        }

        .process-header h2 span {
            color: var(--fx-orange);
        }

        .process-header p {
            color: #94a3b8;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .process-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 36px 28px;
            transition: all 0.35s ease;
            position: relative;
            cursor: pointer;
        }

        .process-card:hover, .process-card.active-step {
            border-color: var(--fx-orange);
            background: rgba(255, 87, 34, 0.08);
            transform: translateY(-6px);
            box-shadow: 0 18px 45px rgba(255, 87, 34, 0.2);
        }

        .process-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2.8rem;
            font-weight: 900;
            color: rgba(255, 87, 34, 0.3);
            line-height: 1;
            margin-bottom: 16px;
            transition: color 0.3s ease;
        }

        .process-card:hover .process-num, .process-card.active-step .process-num {
            color: var(--fx-orange);
        }

        .process-card h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            margin: 0 0 12px;
            color: #ffffff;
        }

        .process-card p {
            color: #94a3b8;
            font-size: 0.92rem;
            line-height: 1.65;
            margin: 0;
        }

        /* â”€â”€ TESTIMONIALS SECTION â”€â”€ */
        .testimonials-section {
            padding: 90px 24px;
            background: #090c12;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 28px;
            max-width: 1240px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            padding: 36px 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.35s ease;
        }

        .testimonial-card:hover {
            border-color: var(--fx-orange);
            background: rgba(255, 87, 34, 0.06);
            transform: translateY(-5px);
            box-shadow: 0 18px 42px rgba(255, 87, 34, 0.18);
        }

        .quote-icon {
            font-size: 2rem;
            color: var(--fx-orange);
            opacity: 0.7;
            margin-bottom: 16px;
        }

        .quote-text {
            font-size: 1rem;
            line-height: 1.68;
            color: #cbd5e1;
            font-style: italic;
            margin: 0 0 24px;
            flex-grow: 1;
        }

        .author-box {
            display: flex;
            align-items: center;
            gap: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 18px;
        }

        .author-logo {
            width: 44px;
            height: 44px;
            object-fit: contain;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: #ffffff;
            padding: 4px;
        }

        .author-info h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
        }

        .author-info p {
            font-size: 0.8rem;
            color: #94a3b8;
            margin: 2px 0 0;
        }

        /* â”€â”€ BOTTOM CTA BANNER â”€â”€ */
        .bottom-cta-banner {
            background: radial-gradient(circle at 50% 30%, rgba(255, 87, 34, 0.18) 0%, rgba(8, 8, 8, 0.98) 75%), #080808;
            color: #ffffff;
            padding: 120px 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-content-box {
            position: relative;
            z-index: 3;
            max-width: 860px;
            margin: 0 auto;
        }

        .cta-content-box h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.15;
            margin: 0 0 20px;
        }

        .cta-content-box h2 span {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a65 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cta-content-box p {
            font-size: 1.2rem;
            line-height: 1.65;
            color: #cbd5e1;
            margin: 0 auto 40px;
            max-width: 680px;
        }

        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .hero-telemetry-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .controls-hub-bar {
                flex-direction: column;
                align-items: stretch;
            }
            .search-field-input {
                width: 100%;
            }
            .search-field-input:focus {
                width: 100%;
            }
            .dossier-layout-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .hero-telemetry-grid {
                grid-template-columns: 1fr;
            }
            .brands-hero-stage {
                padding: 130px 16px 60px;
            }
            .showcase-stage-section {
                padding: 60px 16px;
            }
            .process-section {
                margin: 40px 16px;
                padding: 70px 20px;
            }
        }
    </style>


    <!-- 1. CYBER HERO WITH INTERACTIVE ORANGE DOTS & SCROLL FLYING WORDS -->
    <header class="brands-hero-stage fx-has-orange-dots" id="brands-hero">
        
        <!-- Kinetic Parallax Word Rails (Scroll Driven) -->
        <div class="hero-kinetic-rails" aria-hidden="true">
            <div class="kinetic-rail kinetic-rail-top" id="scroll-rail-top">
                <span>â˜… D2C E-COMMERCE SCALE</span>
                <span>âœ¦ 4.8X PEAK META ROAS</span>
                <span>â˜… PAGE 1 GOOGLE DOMINANCE</span>
                <span>âœ¦ SERVER-SIDE CAPI</span>
                <span>â˜… HIGH-LTV RETENTION</span>
                <span>âœ¦ D2C E-COMMERCE SCALE</span>
                <span>â˜… 4.8X PEAK META ROAS</span>
                <span>âœ¦ PAGE 1 GOOGLE DOMINANCE</span>
            </div>
            <div class="kinetic-rail kinetic-rail-bottom" id="scroll-rail-bottom">
                <span>âœ¦ BESPOKE WEB ARCHITECTURE</span>
                <span>â˜… 320% ORDER VOLUME SURGE</span>
                <span>âœ¦ LOCAL MAPS 3-PACK RANK</span>
                <span>â˜… HIGH-CONVERTING FUNNELS</span>
                <span>âœ¦ BESPOKE WEB ARCHITECTURE</span>
                <span>â˜… 320% ORDER VOLUME SURGE</span>
            </div>

            <!-- Free-floating Kinetic Power Words on Scroll -->
            <div class="floating-scroll-word fsw-1" data-parallax="0.22">SCALE</div>
            <div class="floating-scroll-word fsw-2" data-parallax="-0.28">DOMINANCE</div>
            <div class="floating-scroll-word fsw-3" data-parallax="0.25">CONVERSIONS</div>
            <div class="floating-scroll-word fsw-4" data-parallax="-0.20">VELOCITY</div>
        </div>

        <div class="hero-inner-container">
            <span class="hero-badge-pill">
                <i class="fa-solid fa-gem"></i> Verified Agency Partnerships
            </span>

            <!-- Scroll-Animated Split Headline -->
            <h1 class="hero-title-scroll" id="hero-title-scroll">
                <span class="scroll-word-item" data-drift-x="-35" data-drift-y="-18" data-drift-r="-5">The</span>
                <span class="scroll-word-item" data-drift-x="25" data-drift-y="-22" data-drift-r="4">Brands</span>
                <span class="scroll-word-item" data-drift-x="-30" data-drift-y="18" data-drift-r="-4">Weâ€™ve</span>
                <span class="scroll-word-item gradient-accent" data-drift-x="40" data-drift-y="22" data-drift-r="6">Scaled</span>
                <span class="scroll-word-item" data-drift-x="-18" data-drift-y="-14" data-drift-r="-3">&</span>
                <span class="scroll-word-item gradient-accent" data-drift-x="36" data-drift-y="18" data-drift-r="5">Engineered</span>
            </h1>

            <p class="hero-desc">
                From high-fashion D2C powerhouses and single-origin coffee to premier clinical dermatology and commercial cinema studios â€” discover the quantifiable ROI engineered by Fusion X.
            </p>

            <!-- Tech Chips Row -->
            <div class="tech-chips">
                <div class="tech-chip"><i class="fa-solid fa-cart-shopping"></i> D2C & E-Commerce</div>
                <div class="tech-chip"><i class="fa-solid fa-stethoscope"></i> Clinical Healthcare</div>
                <div class="tech-chip"><i class="fa-solid fa-utensils"></i> Food & Beverages</div>
                <div class="tech-chip"><i class="fa-solid fa-clapperboard"></i> Media & Studios</div>
                <div class="tech-chip"><i class="fa-solid fa-chart-line"></i> Performance Marketing</div>
            </div>

            <!-- Verified Telemetry Strip -->
            <div class="hero-telemetry-grid">
                <div class="telemetry-pill-card">
                    <div class="telemetry-val"><span class="stat-counter" data-val="10">0</span><span>+</span></div>
                    <div class="telemetry-lbl">Client Brands</div>
                </div>
                <div class="telemetry-pill-card">
                    <div class="telemetry-val"><span class="stat-counter" data-val="4.8" data-dec="1">0</span><span>x</span></div>
                    <div class="telemetry-lbl">Peak Meta ROAS</div>
                </div>
                <div class="telemetry-pill-card">
                    <div class="telemetry-val"><span>+</span><span class="stat-counter" data-val="320">0</span><span>%</span></div>
                    <div class="telemetry-lbl">Order Growth</div>
                </div>
                <div class="telemetry-pill-card">
                    <div class="telemetry-val"><span class="stat-counter" data-val="100">0</span><span>%</span></div>
                    <div class="telemetry-lbl">Page 1 Dominance</div>
                </div>
            </div>

            <div class="hero-ctas">
                <a href="#brand-monoliths" class="btn-primary-hero">
                    <span>Explore Client Showcase</span>
                    <i class="fa-solid fa-arrow-down"></i>
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-secondary-hero">
                    <span>Schedule Brand Audit</span>
                    <i class="fa-solid fa-calendar-check"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- 2. INFINITE BRAND LOGO MARQUEE -->
    <section class="marquee-section-dark">
        <div class="marquee-track-dark">
            <!-- Set 1 -->
            <a href="<?php echo esc_url( home_url( '/off-human/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/off-human/logo.jpg" alt="Off Human">
                <span>Off Human</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/energy-bags/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/the-energy-bags.png" alt="The Energy Bags">
                <span>The Energy Bags</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/nilaro/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro.png" alt="Nilaro">
                <span>Nilaro Coffee</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bikerz-module/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bikerz/logo.jpg" alt="Bikerz Module">
                <span>Bikerz Module</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani-corner.png" alt="Bhawani Corner">
                <span>Bhawani Glassware</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/dr-madhavi/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/dr-madhavi/logo.svg" alt="Dr. Madhavi Clinic">
                <span>Dr. Madhavi Clinic</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/truly-yours/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/truly-yours/logo.jpg" alt="Truly Yours">
                <span>Truly Yours</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/sridhar-food-house/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/sridhar-food-house.jpg" alt="Sridhar Food House">
                <span>Sridhar Food House</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/tk-cinematic-studio/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/tk/logo.png" alt="TK Cinematic Studio">
                <span>TK Cinematic Studio</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/meeras-beauty-parlour/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/meeras/logo.webp" alt="Meera's Beauty Parlour">
                <span>Meera's Beauty Parlour</span>
            </a>

            <!-- Set 2 (Repeated for seamless loop) -->
            <a href="<?php echo esc_url( home_url( '/off-human/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/off-human/logo.jpg" alt="Off Human">
                <span>Off Human</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/energy-bags/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/the-energy-bags.png" alt="The Energy Bags">
                <span>The Energy Bags</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/nilaro/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro.png" alt="Nilaro">
                <span>Nilaro Coffee</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bikerz-module/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bikerz/logo.jpg" alt="Bikerz Module">
                <span>Bikerz Module</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani-corner.png" alt="Bhawani Corner">
                <span>Bhawani Glassware</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/dr-madhavi/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/dr-madhavi/logo.svg" alt="Dr. Madhavi Clinic">
                <span>Dr. Madhavi Clinic</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/truly-yours/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/truly-yours/logo.jpg" alt="Truly Yours">
                <span>Truly Yours</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/sridhar-food-house/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/sridhar-food-house.jpg" alt="Sridhar Food House">
                <span>Sridhar Food House</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/tk-cinematic-studio/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/tk/logo.png" alt="TK Cinematic Studio">
                <span>TK Cinematic Studio</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/meeras-beauty-parlour/' ) ); ?>" class="marquee-chip-dark">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/meeras/logo.webp" alt="Meera's Beauty Parlour">
                <span>Meera's Beauty Parlour</span>
            </a>
        </div>
    </section>

    <!-- 3. REVOLUTIONARY 3D HOLOGRAPHIC BRAND SHOWCASE STAGE (With Orange Dots Integration) -->
    <main class="showcase-stage-section fx-has-orange-dots" id="brand-monoliths">
        <div class="showcase-inner-container">
            
            <div class="showcase-header">
                <h2>Our Verified <span>Client Roster</span></h2>
                <p>Filter by industry sector or search by brand name to view audited deliverables and performance ROI.</p>
            </div>

            <!-- Controls Hub: Category Tabs & Search Bar -->
            <div class="controls-hub-bar">
                <div class="category-tabs-row" id="category-tabs-row">
                    <button type="button" class="cat-tab-btn active" data-filter="all">
                        <span>All Brands</span><span class="tab-count-pill">10</span>
                    </button>
                    <button type="button" class="cat-tab-btn" data-filter="ecommerce">
                        <span>D2C & E-Commerce</span><span class="tab-count-pill">4</span>
                    </button>
                    <button type="button" class="cat-tab-btn" data-filter="healthcare">
                        <span>Healthcare & Clinics</span><span class="tab-count-pill">2</span>
                    </button>
                    <button type="button" class="cat-tab-btn" data-filter="fnb">
                        <span>Food & Beverages</span><span class="tab-count-pill">2</span>
                    </button>
                    <button type="button" class="cat-tab-btn" data-filter="media">
                        <span>Media & Studios</span><span class="tab-count-pill">2</span>
                    </button>
                </div>

                <div class="search-field-wrap">
                    <i class="fa-solid fa-magnifying-glass search-field-icon"></i>
                    <input type="text" id="brand-search-input" class="search-field-input" placeholder="Search brand or service..." autocomplete="off">
                </div>
            </div>

            <!-- 3D Monolith Cards Grid (Scroll Reveal & 3D Tilt) -->
            <div class="brands-hologram-grid" id="brands-hologram-grid">

                <!-- 1. Off Human -->
                <article class="hologram-brand-monolith" data-category="ecommerce" data-keywords="off human streetwear fashion luxury shopify meta ads d2c">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">D2C & E-Com</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/off-human/logo.jpg" alt="Off Human Official Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Off Human</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Luxury Heavyweight Streetwear Drops</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>4.8x Meta Ad ROAS</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Custom Shopify D2C Storefront, Server-Side Meta CAPI tracking architecture, and an instant sellout drop-launch strategy.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="0">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/off-human/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 2. The Energy Bags -->
                <article class="hologram-brand-monolith" data-category="ecommerce" data-keywords="the energy bags luggage backpacks travel d2c shopify bags">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">D2C & E-Com</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/the-energy-bags.png" alt="The Energy Bags Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">The Energy Bags</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Durable Eco Luggage & Travel Backpacks</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>+320% Order Volume</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Custom Shopify Plus store, collection funnel redesign, high-velocity Meta catalog ads, and frictionless mobile checkout.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="1">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/energy-bags/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 3. Nilaro -->
                <article class="hologram-brand-monolith" data-category="fnb" data-keywords="nilaro coffee filter coffee artisanal roaster fnb beverage">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">Food & Beverages</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro.png" alt="Nilaro Filter Coffee Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Nilaro</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Artisanal Single-Origin Filter Coffee</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>+220% Subscriptions</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Premium brand identity design, bespoke pouch packaging, recurring subscription architecture, and sensory storytelling reels.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="2">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/nilaro/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 4. Bikerz Module -->
                <article class="hologram-brand-monolith" data-category="ecommerce" data-keywords="bikerz module motorcycle helmets riding gear woocommerce automotive">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">D2C & E-Com</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bikerz/logo.jpg" alt="Bikerz Module Official Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Bikerz Module</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">High-Performance Riding Helmets & Gear</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>+310% Online Checkouts</strong>
                    </div>
                    <p class="monolith-desc-text">
                        High-speed WooCommerce storefront, Meta dynamic catalog sales, and automated WhatsApp abandoned cart retargeting.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="3">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/bikerz-module/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 5. Bhawani Corner Glassware -->
                <article class="hologram-brand-monolith" data-category="ecommerce" data-keywords="bhawani corner glassware crockery hospitality t nagar local seo">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">D2C & E-Com</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani-corner.png" alt="Bhawani Corner Glassware Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Bhawani Corner</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">India's No. 1 Glassware & Crockery Brand</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>900+ Inbound Calls</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Local SEO 3-Pack rank dominance in T Nagar, Chennai, paired with an ultra-responsive product catalog web application.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="4">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 6. Dr. Madhavi Clinic -->
                <article class="hologram-brand-monolith" data-category="healthcare" data-keywords="dr madhavi clinic dermatology laser skincare healthcare clinic patient leads">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">Healthcare & Clinics</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/dr-madhavi/logo.svg" alt="Dr. Madhavi Clinic Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Dr. Madhavi Clinic</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Advanced Clinical Laser & Skin Treatments</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>400+ Patient Leads</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Full-funnel Google & Meta patient acquisition engine, strict privacy compliant tracking, and WhatsApp appointment booking.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="5">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/dr-madhavi/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 7. Truly Yours -->
                <article class="hologram-brand-monolith" data-category="healthcare" data-keywords="truly yours skincare serums clinical cosmetics d2c dermatological">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">Healthcare & Clinics</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/truly-yours/logo.jpg" alt="Truly Yours Skincare Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Truly Yours</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Dermatologist-Formulated Face Serums</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>+180% Repeat Sales</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Brand identity moat, customer messaging matrix, high-LTV D2C funnels, educational reels, and retention email flows.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="6">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/truly-yours/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 8. Sridhar Food House -->
                <article class="hologram-brand-monolith" data-category="fnb" data-keywords="sridhar food house chaat street food kolathur local seo food">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">Food & Beverages</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/sridhar-food-house.jpg" alt="Sridhar Food House Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Sridhar Food House</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Authentic North Indian Chaat & Delicacies</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>+240% Footfall Surge</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Google Maps 3-Pack Kolathur dominance, viral food reels production on Instagram, and geo-targeted review acceleration.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="7">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/sridhar-food-house/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 9. TK Cinematic Studio -->
                <article class="hologram-brand-monolith" data-category="media" data-keywords="tk cinematic studio film video production porur wedding cinema creator commercial">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">Media & Studios</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/tk/logo.png" alt="TK Cinematic Studio Official Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">TK Cinematic Studio</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Commercial Film & Creator Studio</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>7.9% Organic CTR</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Immersive digital screening room, audited Google Search Console elevation with 1K+ impressions, and commercial booking funnels.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="8">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/tk-cinematic-studio/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- 10. Meera's Beauty Parlour -->
                <article class="hologram-brand-monolith" data-category="media" data-keywords="meeras beauty parlour salon bridal makeup spa appointments makeover">
                    <div class="monolith-status-bar">
                        <span class="monolith-verified-badge"><i class="fa-solid fa-gem"></i> Verified Client</span>
                        <span class="monolith-sector-badge">Media & Studios</span>
                    </div>
                    <div class="monolith-logo-box">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/meeras/logo.webp" alt="Meera's Beauty Parlour Logo" loading="lazy">
                    </div>
                    <div class="monolith-title-line">
                        <h3 class="monolith-brand-title">Meera's Beauty Parlour</h3>
                        <i class="fa-solid fa-circle-check monolith-check-icon"></i>
                    </div>
                    <span class="monolith-strapline">Bespoke Bridal Makeover & Spa Packages</span>
                    <div class="monolith-kpi-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>+190% Bridal Bookings</strong>
                    </div>
                    <p class="monolith-desc-text">
                        Local SEO GMB ranking dominance, aesthetic social media showcase feeds, and an instant WhatsApp bridal booking bot.
                    </p>
                    <div class="monolith-action-row">
                        <button type="button" class="btn-monolith-inspect" data-inspect-index="9">
                            <i class="fa-solid fa-eye"></i> Quick View
                        </button>
                        <a href="<?php echo esc_url( home_url( '/meeras-beauty-parlour/' ) ); ?>" class="btn-monolith-case">
                            <span>Case Study</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

            </div>

        </div>
    </main>

    <!-- 4. INTERACTIVE DOSSIER MODAL -->
    <div class="dossier-modal-backdrop" id="dossier-modal-backdrop">
        <div class="dossier-modal-window">
            <button type="button" class="dossier-close-btn" id="dossier-close-btn" aria-label="Close Dossier">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="dossier-layout-grid">
                <div class="dossier-logo-frame">
                    <img src="" alt="Brand Logo" id="dossier-modal-logo">
                </div>
                <div class="dossier-details">
                    <span class="monolith-verified-badge" id="dossier-modal-sector"><i class="fa-solid fa-gem"></i> Verified Client</span>
                    <h3 id="dossier-modal-title">Brand Name</h3>
                    <span class="dossier-tagline" id="dossier-modal-strapline">Brand Strapline</span>
                    
                    <div class="dossier-metric-callout">
                        <i class="fa-solid fa-chart-line" style="color: #ff5722;"></i>
                        <span>Audited Milestone:</span>
                        <strong id="dossier-modal-metric">4.8x ROAS</strong>
                    </div>

                    <ul class="dossier-deliverables" id="dossier-modal-deliverables">
                        <li><i class="fa-solid fa-circle-check"></i> <span>Custom Engineering & Funnel Architecture</span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>High-ROAS Paid Acquisition & Audience Scaling</span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>Server-Side CAPI Analytics & Attribution Modeling</span></li>
                    </ul>

                    <div style="display: flex; gap: 12px; align-items: center;">
                        <a href="#" id="dossier-modal-case-btn" class="btn-primary-hero" style="padding: 12px 26px; font-size: 0.88rem;">
                            <span>Read Full Case Study</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-monolith-inspect" style="padding: 12px 20px; font-size: 0.88rem;">
                            <span>Schedule Call</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. 4-PHASE ACCELERATION SPRINT WITH ORANGE DOTS -->
    <section class="process-section fx-has-orange-dots">
        <div class="process-header">
            <h2>The Fusion X <span>Scale Sprint</span></h2>
            <p>Our engineered four-step framework for turning ambitious brands into high-ROAS market leaders.</p>
        </div>

        <div class="process-grid">
            <div class="process-card active-step">
                <div class="process-num">01</div>
                <h3>Diagnostic Audit</h3>
                <p>
                    Comprehensive technical forensic audit covering conversion funnels, pixel tracking hygiene, competitor pricing moats, and CAC velocity.
                </p>
            </div>
            <div class="process-card">
                <div class="process-num">02</div>
                <h3>Funnel Engineering</h3>
                <p>
                    Sub-second load speed redesign on Shopify, custom WordPress landing engines, server-side Meta CAPI tracking, and checkout friction removal.
                </p>
            </div>
            <div class="process-card">
                <div class="process-num">03</div>
                <h3>High-ROAS Media</h3>
                <p>
                    Algorithm-engineered ad hooks, high-converting UGC reels, Google PMax search dominance, and ruthless budget reallocation toward winning ad sets.
                </p>
            </div>
            <div class="process-card">
                <div class="process-num">04</div>
                <h3>Scale & Dominate</h3>
                <p>
                    Automated WhatsApp retention flows, VIP customer loyalty loops, Local SEO 3-Pack consolidation, and relentless market share expansion.
                </p>
            </div>
        </div>
    </section>

    <!-- 6. VERIFIED FOUNDER TESTIMONIALS -->
    <section class="testimonials-section">
        <div class="process-header" style="margin-bottom: 50px;">
            <h2>Founder <span>Transcripts</span></h2>
            <p>Direct words from executive leaders and founders scaled by Fusion X.</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <p class="quote-text">
                    "Fusion X completely rebuilt our D2C e-commerce engine from ground zero. Our drop sellouts went from days to hours, and our Meta ad ROAS stabilized at 4.8x consistently."
                </p>
                <div class="author-box">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/off-human/logo.jpg" alt="Off Human Founder" class="author-logo">
                    <div class="author-info">
                        <h4>Off Human</h4>
                        <p>D2C Luxury Streetwear Founder</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <p class="quote-text">
                    "Our clinic had been relying on walk-ins and generic ads with poor ROI. Fusion X engineered a HIPAA-grade patient acquisition funnel that delivered over 400 qualified patient leads in 60 days."
                </p>
                <div class="author-box">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/dr-madhavi/logo.svg" alt="Dr. Madhavi Clinic" class="author-logo">
                    <div class="author-info">
                        <h4>Dr. Madhavi Clinic</h4>
                        <p>Medical Director & Aesthetician</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <p class="quote-text">
                    "In the competitive riding gear market, customer trust is everything. Fusion X's high-speed store redesign and catalog retargeting led to a +310% surge in completed checkouts."
                </p>
                <div class="author-box">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bikerz/logo.jpg" alt="Bikerz Module" class="author-logo">
                    <div class="author-info">
                        <h4>Bikerz Module</h4>
                        <p>Managing Director</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. HIGH-CONVERTING BOTTOM CTA -->
    <section class="bottom-cta-banner fx-has-orange-dots">
        <div class="cta-content-box">
            <span class="hero-badge-pill" style="background: rgba(255, 87, 34, 0.15); border-color: rgba(255, 87, 34, 0.4); color: #ff7043;">
                <i class="fa-solid fa-bolt"></i> Ready To Scale
            </span>
            <h2>Letâ€™s Engineer Your Brandâ€™s <span>Next Flagship Milestone</span></h2>
            <p>
                Whether you need high-converting D2C storefront engineering, high-ROAS paid media scaling, or Page 1 Google dominance â€” let's review your numbers today.
            </p>
            <div class="hero-ctas">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">
                    <span>Book Strategy Consultation</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="https://wa.me/919600096973" target="_blank" rel="noopener noreferrer" class="btn-secondary-hero">
                    <i class="fa-brands fa-whatsapp" style="color: #25d366;"></i>
                    <span>Direct WhatsApp Desk</span>
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    

<script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // â”€â”€ 1. KINETIC SCROLL ANIMATION FOR WORDS â”€â”€
            const railTop = document.getElementById('scroll-rail-top');
            const railBottom = document.getElementById('scroll-rail-bottom');
            const floatingWords = document.querySelectorAll('.floating-scroll-word');
            const titleWords = document.querySelectorAll('.scroll-word-item');
            const heroSection = document.getElementById('brands-hero');

            function handleScroll() {
                const scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;

                // Move Kinetic Parallax Word Rails
                if (railTop) {
                    railTop.style.transform = `translateX(${scrollY * -0.45}px) rotate(-2deg)`;
                }
                if (railBottom) {
                    railBottom.style.transform = `translateX(${scrollY * 0.4}px) rotate(1.5deg)`;
                }

                // Move Floating Power Words
                floatingWords.forEach(fw => {
                    const speed = parseFloat(fw.dataset.parallax) || 0.2;
                    fw.style.transform = `translateY(${scrollY * speed}px)`;
                });

                // 3D Perspective Word Drift on Scroll
                if (heroSection) {
                    const rect = heroSection.getBoundingClientRect();
                    const progress = Math.max(0, Math.min(1, -rect.top / (rect.height || 1)));

                    titleWords.forEach(w => {
                        const dx = parseFloat(w.dataset.driftX) || 0;
                        const dy = parseFloat(w.dataset.driftY) || 0;
                        const dr = parseFloat(w.dataset.driftR) || 0;

                        const curX = dx * progress * 1.5;
                        const curY = dy * progress * 1.5;
                        const curR = dr * progress * 1.5;
                        const curOpacity = Math.max(0.2, 1 - (progress * 1.2));

                        w.style.transform = `translate3d(${curX}px, ${curY}px, 0) rotate(${curR}deg)`;
                        w.style.opacity = curOpacity.toString();
                    });
                }
            }

            window.addEventListener('scroll', handleScroll, { passive: true });
            handleScroll();

            // â”€â”€ 2. SCROLL ENTRANCE & 3D GYRO TILT FOR MONOLITHS â”€â”€
            const monoliths = document.querySelectorAll('.hologram-brand-monolith');

            const monolithObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, idx) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('revealed');
                        }, (idx % 3) * 110);
                        monolithObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            monoliths.forEach(m => monolithObserver.observe(m));

            // Mouse 3D Gyro Tilt Physics
            monoliths.forEach(monolith => {
                monolith.addEventListener('mousemove', (e) => {
                    const rect = monolith.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotX = ((y - centerY) / centerY) * -10;
                    const rotY = ((x - centerX) / centerX) * 10;

                    monolith.style.transform = `perspective(1000px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-8px) scale(1.02)`;
                });

                monolith.addEventListener('mouseleave', () => {
                    monolith.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0) scale(1)';
                });
            });

            // â”€â”€ 3. ROLLING COUNTERS ON SCROLL â”€â”€
            const counters = document.querySelectorAll('.stat-counter');
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseFloat(entry.target.dataset.val);
                        const isDec = entry.target.dataset.dec;
                        let count = 0;
                        const step = target / 35;
                        const timer = setInterval(() => {
                            count += step;
                            if (count >= target) {
                                entry.target.textContent = isDec ? target.toFixed(1) : target;
                                clearInterval(timer);
                            } else {
                                entry.target.textContent = isDec ? count.toFixed(1) : Math.floor(count);
                            }
                        }, 25);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            counters.forEach(c => counterObserver.observe(c));

            // â”€â”€ 4. CATEGORY FILTERING & SEARCH â”€â”€
            const filterBtns = document.querySelectorAll('.cat-tab-btn');
            const searchInput = document.getElementById('brand-search-input');
            let currentFilter = 'all';
            let currentSearch = '';

            function applyFilters() {
                monoliths.forEach(m => {
                    const cat = m.dataset.category;
                    const keywords = (m.dataset.keywords || '').toLowerCase();
                    const title = (m.querySelector('.monolith-brand-title')?.textContent || '').toLowerCase();
                    const desc = (m.querySelector('.monolith-desc-text')?.textContent || '').toLowerCase();

                    const matchesCategory = (currentFilter === 'all' || cat === currentFilter);
                    const matchesSearch = !currentSearch || title.includes(currentSearch) || desc.includes(currentSearch) || keywords.includes(currentSearch);

                    if (matchesCategory && matchesSearch) {
                        m.style.display = 'flex';
                    } else {
                        m.style.display = 'none';
                    }
                });
            }

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    currentFilter = btn.dataset.filter;
                    applyFilters();
                });
            });

            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    currentSearch = e.target.value.trim().toLowerCase();
                    applyFilters();
                });
            }

            // â”€â”€ 5. INTERACTIVE DOSSIER MODAL â”€â”€
            const modalBackdrop = document.getElementById('dossier-modal-backdrop');
            const modalCloseBtn = document.getElementById('dossier-close-btn');
            const modalLogo = document.getElementById('dossier-modal-logo');
            const modalTitle = document.getElementById('dossier-modal-title');
            const modalStrapline = document.getElementById('dossier-modal-strapline');
            const modalMetric = document.getElementById('dossier-modal-metric');
            const modalCaseBtn = document.getElementById('dossier-modal-case-btn');
            const modalDeliverables = document.getElementById('dossier-modal-deliverables');

            const brandDossiers = [
                {
                    title: "Off Human",
                    strapline: "Heavyweight Oversized Streetwear Drops",
                    metric: "4.8x Meta Ad ROAS",
                    logo: "brands/off-human/logo.jpg",
                    link: "<?php echo esc_url( home_url( '/off-human/' ) ); ?>",
                    deliverables: [
                        "Custom high-speed Shopify storefront with countdown drops",
                        "Server-side Meta Conversions API (CAPI) tracking architecture",
                        "Instant-sellout product launch funnels & VIP SMS early access"
                    ]
                },
                {
                    title: "The Energy Bags",
                    strapline: "Eco-Friendly Luggage & Travel Backpacks",
                    metric: "+320% Order Volume",
                    logo: "brands/the-energy-bags.png",
                    link: "<?php echo esc_url( home_url( '/energy-bags/' ) ); ?>",
                    deliverables: [
                        "Shopify Plus collection funnel architecture redesign",
                        "High-velocity Meta dynamic catalog sales & lookalike models",
                        "Frictionless 1-page checkout with native Razorpay UPI integration"
                    ]
                },
                {
                    title: "Nilaro",
                    strapline: "Single-Origin Dark Roast Coffee Pouches",
                    metric: "+220% Subscriptions",
                    logo: "brands/nilaro.png",
                    link: "<?php echo esc_url( home_url( '/nilaro/' ) ); ?>",
                    deliverables: [
                        "Minimalist luxury brand identity & packaging aesthetics",
                        "Recurring subscription e-commerce & refill retention models",
                        "Sensory storytelling video reels highlighting roasting heritage"
                    ]
                },
                {
                    title: "Bikerz Module",
                    strapline: "High-Performance Riding Helmets & Gear",
                    metric: "+310% Online Checkouts",
                    logo: "brands/bikerz/logo.jpg",
                    link: "<?php echo esc_url( home_url( '/bikerz-module/' ) ); ?>",
                    deliverables: [
                        "High-speed WooCommerce catalog with technical bike taxonomy",
                        "Automated WhatsApp abandoned cart retargeting sequences",
                        "Motorcycle riding gear Meta dynamic remarketing campaigns"
                    ]
                },
                {
                    title: "Bhawani Corner",
                    strapline: "India's No. 1 Crockery & Glassware Brand",
                    metric: "900+ Inbound Calls",
                    logo: "brands/bhawani-corner.png",
                    link: "<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>",
                    deliverables: [
                        "Local SEO Google Maps 3-Pack rank dominance in T Nagar, Chennai",
                        "Interactive commercial glassware digital catalog web application",
                        "High-intent local Google Search Ads for hospitality buyers"
                    ]
                },
                {
                    title: "Dr. Madhavi Clinic",
                    strapline: "Laser & Aesthetic Dermatology Specialist",
                    metric: "400+ Patient Leads",
                    logo: "brands/dr-madhavi/logo.svg",
                    link: "<?php echo esc_url( home_url( '/dr-madhavi/' ) ); ?>",
                    deliverables: [
                        "Full-funnel Google & Meta patient acquisition engine",
                        "Strict healthcare privacy compliant tracking & landing funnels",
                        "Instant WhatsApp automated clinical appointment booking bot"
                    ]
                },
                {
                    title: "Truly Yours",
                    strapline: "Clinical Dermatological Face Serums",
                    metric: "+180% Repeat Sales",
                    logo: "brands/truly-yours/logo.jpg",
                    link: "<?php echo esc_url( home_url( '/truly-yours/' ) ); ?>",
                    deliverables: [
                        "Dermatologist brand equity moat & scientific messaging framework",
                        "High-LTV D2C funnels & educational ingredient breakdown reels",
                        "Post-purchase retention email sequences & skincare loyalty rewards"
                    ]
                },
                {
                    title: "Sridhar Food House",
                    strapline: "Authentic North Indian Chaat & Delicacies",
                    metric: "+240% Footfall Surge",
                    logo: "brands/sridhar-food-house.jpg",
                    link: "<?php echo esc_url( home_url( '/sridhar-food-house/' ) ); ?>",
                    deliverables: [
                        "Google Maps 3-Pack Kolathur dominance with high local authority",
                        "Viral Instagram food reels showcasing heritage chaat preparation",
                        "Geo-targeted local review acceleration and citation building"
                    ]
                },
                {
                    title: "TK Cinematic Studio",
                    strapline: "Commercial Film & Creator Production House",
                    metric: "7.9% Organic CTR",
                    logo: "brands/tk/logo.png",
                    link: "<?php echo esc_url( home_url( '/tk-cinematic-studio/' ) ); ?>",
                    deliverables: [
                        "Immersive dark-mode digital cinema screening room web app",
                        "Google Search Console audit elevating search clicks to 7.9% CTR",
                        "B2B commercial client booking funnel & portfolio showcase"
                    ]
                },
                {
                    title: "Meera's Beauty Parlour",
                    strapline: "Luxury Bridal Makeover & Spa Services",
                    metric: "+190% Bridal Bookings",
                    logo: "brands/meeras/logo.webp",
                    link: "<?php echo esc_url( home_url( '/meeras-beauty-parlour/' ) ); ?>",
                    deliverables: [
                        "Local SEO Google My Business dominance across Chennai",
                        "Aesthetic bridal transformation reels with influencer collabs",
                        "WhatsApp bridal package pricing calculator & booking engine"
                    ]
                }
            ];

            function openDossier(idx) {
                const item = brandDossiers[idx];
                if (!item) return;

                modalLogo.src = (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI.replace(/\/$/, "") + "/" : "") + item.logo;
                modalTitle.textContent = item.title;
                modalStrapline.textContent = item.strapline;
                modalMetric.textContent = item.metric;
                modalCaseBtn.href = item.link;

                modalDeliverables.innerHTML = '';
                item.deliverables.forEach(d => {
                    const li = document.createElement('li');
                    li.innerHTML = `<i class="fa-solid fa-circle-check"></i> <span>${d}</span>`;
                    modalDeliverables.appendChild(li);
                });

                modalBackdrop.classList.add('modal-active');
            }

            function closeDossier() {
                modalBackdrop.classList.remove('modal-active');
            }

            document.addEventListener('click', (e) => {
                const btn = e.target.closest('.btn-monolith-inspect');
                if (btn) {
                    const idx = parseInt(btn.dataset.inspectIndex);
                    openDossier(idx);
                }
            });

            if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeDossier);
            modalBackdrop.addEventListener('click', (e) => {
                if (e.target === modalBackdrop) closeDossier();
            });
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && modalBackdrop.classList.contains('modal-active')) {
                    closeDossier();
                }
            });

            // â”€â”€ 6. PROCESS SPRINT STEP HIGHLIGHTS â”€â”€
            const processCards = document.querySelectorAll('.process-card');
            processCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    processCards.forEach(c => c.classList.remove('active-step'));
                    card.classList.add('active-step');
                });
            });
        });
    </script>

<?php
get_footer();
