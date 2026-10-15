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
            --brand-orange: #ff5722;
            --brand-orange-hover: #e64a19;
            --brand-orange-glow: rgba(255, 87, 34, 0.25);
            --brand-orange-tint: rgba(255, 87, 34, 0.08);
            --bg-page: #fbfcfd;
            --border-subtle: #e2e8f0;
            --text-heading: #0f172a;
            --text-body: #475569;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-page);
            color: var(--text-body);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ΓöÇΓöÇ HERO SECTION ΓöÇΓöÇ */
        .brands-hero {
            position: relative;
            padding: 160px 24px 75px;
            background: radial-gradient(circle at 50% 20%, rgba(255, 87, 34, 0.07) 0%, transparent 65%), #ffffff;
            text-align: center;
            border-bottom: 1px solid var(--border-subtle);
        }

        .hero-badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 24px;
            background: var(--brand-orange-tint);
            border: 1px solid rgba(255, 87, 34, 0.25);
            border-radius: 50px;
            font-size: 0.82rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--brand-orange);
            margin-bottom: 24px;
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;
            background: var(--brand-orange);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--brand-orange);
            animation: pulseDot 2s infinite ease-in-out;
        }

        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.6; }
        }

        .hero-headline {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.5rem, 5.8vw, 4.8rem);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -1.5px;
            color: var(--text-heading);
            max-width: 1000px;
            margin: 0 auto 22px;
        }

        .hero-headline span {
            background: linear-gradient(135deg, #ff5722 15%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subline {
            font-size: clamp(1.05rem, 2vw, 1.25rem);
            line-height: 1.7;
            color: var(--text-body);
            max-width: 860px;
            margin: 0 auto 45px;
        }

        /* ΓöÇΓöÇ LIVE TRUST METRICS STRIP ΓöÇΓöÇ */
        .hero-metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 1060px;
            margin: 0 auto;
        }

        .metric-stat-card {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 18px;
            padding: 24px 18px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-align: center;
        }

        .metric-stat-card:hover {
            transform: translateY(-4px);
            border-color: var(--brand-orange);
            box-shadow: 0 12px 30px var(--brand-orange-glow);
        }

        .metric-stat-number {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 3.2vw, 3rem);
            font-weight: 900;
            color: var(--text-heading);
            line-height: 1;
            margin-bottom: 8px;
        }

        .metric-stat-number span {
            color: var(--brand-orange);
        }

        .metric-stat-label {
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* ΓöÇΓöÇ INFINITE LOGO MARQUEE RIBBON ΓöÇΓöÇ */
        .marquee-ribbon {
            background: #ffffff;
            border-bottom: 1px solid var(--border-subtle);
            padding: 24px 0;
            overflow: hidden;
            position: relative;
        }

        .marquee-track {
            display: flex;
            align-items: center;
            gap: 24px;
            width: max-content;
            animation: marqueeSlide 40s linear infinite;
        }

        .marquee-ribbon:hover .marquee-track {
            animation-play-state: paused;
        }

        @keyframes marqueeSlide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .brand-logo-pill {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            padding: 10px 22px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.25s ease;
            flex-shrink: 0;
        }

        .brand-logo-pill:hover {
            border-color: var(--brand-orange);
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(255, 87, 34, 0.15);
        }

        .brand-logo-pill img {
            width: 32px;
            height: 32px;
            object-fit: contain;
            border-radius: 6px;
        }

        .brand-logo-pill span {
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-heading);
            white-space: nowrap;
        }

        /* ΓöÇΓöÇ THEATRE SECTION: INTERACTIVE CINEMATIC DOSSIER ΓöÇΓöÇ */
        .theatre-section {
            max-width: 1360px;
            margin: 0 auto;
            padding: 80px 24px 60px;
        }

        .theatre-section-header {
            text-align: center;
            max-width: 820px;
            margin: 0 auto 50px;
        }

        .theatre-section-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4.2vw, 3.4rem);
            font-weight: 900;
            color: var(--text-heading);
            margin: 0 0 14px;
        }

        .theatre-section-header h2 span {
            color: var(--brand-orange);
        }

        .theatre-section-header p {
            font-size: 1.15rem;
            color: var(--text-body);
            line-height: 1.7;
            margin: 0;
        }

        /* Theatre Stage Layout (Split-Screen Master & Display) */
        .theatre-layout {
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 32px;
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.04);
            position: relative;
        }

        /* Left Side: Brand Selector Rail */
        .theatre-selector-rail {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 720px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .theatre-selector-rail::-webkit-scrollbar {
            width: 6px;
        }

        .theatre-selector-rail::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 6px;
        }

        .theatre-brand-tab {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            background: #f8fafc;
            border: 1.5px solid var(--border-subtle);
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            text-align: left;
            width: 100%;
            outline: none;
        }

        .theatre-brand-tab:hover {
            border-color: var(--brand-orange);
            background: #ffffff;
            transform: translateX(4px);
        }

        .theatre-brand-tab.active {
            background: #ffffff;
            border-color: var(--brand-orange);
            box-shadow: 0 6px 20px rgba(255, 87, 34, 0.15);
        }

        .theatre-brand-tab.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 20%;
            bottom: 20%;
            width: 4px;
            background: var(--brand-orange);
            border-radius: 0 4px 4px 0;
        }

        .tab-brand-logo-box {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3px;
            flex-shrink: 0;
        }

        .tab-brand-logo-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 6px;
        }

        .tab-brand-info {
            flex-grow: 1;
            min-width: 0;
        }

        .tab-brand-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--text-heading);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .tab-brand-category {
            font-size: 0.76rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .tab-metric-pill {
            font-family: 'Outfit', sans-serif;
            font-size: 0.82rem;
            font-weight: 800;
            color: var(--brand-orange);
            background: var(--brand-orange-tint);
            padding: 4px 10px;
            border-radius: 50px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        /* Right Side: Showcase Viewport */
        .theatre-stage-viewport {
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            border-radius: 22px;
            padding: 36px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            min-height: 650px;
        }

        /* Parallax Visual Preview */
        .stage-visual-container {
            position: relative;
            width: 100%;
            height: 310px;
            border-radius: 18px;
            overflow: hidden;
            background: #0f172a;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 28px;
        }

        .stage-visual-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease;
        }

        .stage-visual-container:hover .stage-visual-image {
            transform: scale(1.04);
        }

        /* Floating Live HUD Telemetry Badge */
        .stage-hud-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(15, 23, 42, 0.9);
            border: 1.5px solid rgba(255, 87, 34, 0.45);
            color: #ffffff;
            backdrop-filter: blur(12px);
            padding: 10px 20px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
            z-index: 3;
        }

        .stage-hud-badge .pulse-light {
            width: 9px;
            height: 9px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 10px #10b981;
            animation: pulseDot 2s infinite ease-in-out;
        }

        .stage-hud-val {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 900;
            color: #ffffff;
        }

        .stage-hud-val span {
            color: var(--brand-orange);
        }

        /* Stage Content Breakdown */
        .stage-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .stage-brand-main {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stage-logo-large {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: #ffffff;
            border: 1.5px solid var(--border-subtle);
            padding: 5px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            flex-shrink: 0;
        }

        .stage-logo-large img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 8px;
        }

        .stage-title-wrap h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.85rem;
            font-weight: 900;
            color: var(--text-heading);
            margin: 0 0 4px;
        }

        .stage-sector-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 87, 34, 0.1);
            color: var(--brand-orange);
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 4px 12px;
            border-radius: 50px;
        }

        .stage-headline-lead {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-heading);
            line-height: 1.4;
            margin: 0 0 16px;
        }

        .stage-grid-details {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .stage-challenge-box h4,
        .stage-solution-box h4 {
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin: 0 0 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .stage-challenge-box p,
        .stage-solution-box p {
            font-size: 0.95rem;
            line-height: 1.65;
            color: var(--text-body);
            margin: 0;
        }

        /* Delivered Tech Badges */
        .stage-tech-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 26px;
        }

        .stage-tech-badge {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-heading);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        }

        /* Client Quote Strip */
        .stage-quote-strip {
            background: #ffffff;
            border-left: 3px solid var(--brand-orange);
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 28px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .stage-quote-strip p {
            font-size: 0.92rem;
            line-height: 1.6;
            color: var(--text-heading);
            font-style: italic;
            margin: 0 0 6px;
        }

        .stage-quote-strip span {
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--brand-orange);
        }

        /* Bottom Controls Row */
        .stage-footer-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            padding-top: 18px;
            border-top: 1px solid var(--border-subtle);
        }

        .stage-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 32px;
            background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
            color: #ffffff !important;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 800;
            font-size: 0.96rem;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 6px 20px var(--brand-orange-glow);
            transition: all 0.3s ease;
        }

        .stage-cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(255, 87, 34, 0.5);
        }

        .stage-nav-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stage-nav-arrow {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            color: var(--text-heading);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.25s ease;
            outline: none;
        }

        .stage-nav-arrow:hover {
            border-color: var(--brand-orange);
            color: var(--brand-orange);
            transform: scale(1.08);
            box-shadow: 0 4px 12px rgba(255, 87, 34, 0.2);
        }

        .stage-autoplay-toggle {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--text-muted);
            cursor: pointer;
            padding: 6px 14px;
            border-radius: 50px;
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            user-select: none;
        }

        .stage-autoplay-toggle.active {
            color: var(--brand-orange);
            border-color: rgba(255, 87, 34, 0.35);
        }

        /* ΓöÇΓöÇ SECTION 2: EXECUTIVE COMPARISON MATRIX (TABLE VIEW, NOT CARDS) ΓöÇΓöÇ */
        .matrix-section {
            max-width: 1360px;
            margin: 0 auto;
            padding: 70px 24px 100px;
        }

        .matrix-header {
            text-align: center;
            max-width: 820px;
            margin: 0 auto 40px;
        }

        .matrix-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            font-weight: 900;
            color: var(--text-heading);
            margin: 0 0 12px;
        }

        .matrix-header h2 span {
            color: var(--brand-orange);
        }

        .matrix-header p {
            font-size: 1.1rem;
            color: var(--text-body);
            line-height: 1.65;
            margin: 0;
        }

        /* Filter Hub: Sector Tabs + Instant Search */
        .matrix-controls-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 18px;
            padding: 16px 24px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        .matrix-filters-row {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .matrix-tab-btn {
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            padding: 8px 18px;
            border-radius: 50px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.86rem;
            font-weight: 600;
            color: var(--text-body);
            cursor: pointer;
            transition: all 0.25s ease;
            outline: none;
        }

        .matrix-tab-btn:hover {
            border-color: var(--brand-orange);
            color: var(--brand-orange);
            background: #ffffff;
        }

        .matrix-tab-btn.active {
            background: var(--brand-orange);
            border-color: var(--brand-orange);
            color: #ffffff;
            box-shadow: 0 4px 12px var(--brand-orange-glow);
        }

        .matrix-search-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .matrix-search-input {
            padding: 10px 18px 10px 40px;
            border-radius: 50px;
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.88rem;
            color: var(--text-heading);
            outline: none;
            width: 260px;
            transition: all 0.25s ease;
        }

        .matrix-search-input:focus {
            width: 300px;
            border-color: var(--brand-orange);
            background: #ffffff;
            box-shadow: 0 0 14px var(--brand-orange-glow);
        }

        .matrix-search-icon {
            position: absolute;
            left: 15px;
            color: var(--text-muted);
            pointer-events: none;
        }

        /* The Architectural Table / Matrix */
        .matrix-table-container {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .matrix-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .matrix-table th {
            background: #f8fafc;
            padding: 18px 24px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.82rem;
            font-weight: 800;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .matrix-table td {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border-subtle);
            vertical-align: middle;
            transition: background-color 0.2s ease;
        }

        .matrix-table tr:last-child td {
            border-bottom: none;
        }

        .matrix-table tr:hover td {
            background-color: #fafbfc;
        }

        .table-brand-cell {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .table-logo-circle {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            flex-shrink: 0;
        }

        .table-logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 6px;
        }

        .table-brand-names h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-heading);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .table-brand-names span {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .table-sector-badge {
            display: inline-block;
            background: #f1f5f9;
            color: var(--text-heading);
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 50px;
        }

        .table-metric-capsule {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--brand-orange-tint);
            border: 1px solid rgba(255, 87, 34, 0.25);
            padding: 6px 14px;
            border-radius: 50px;
        }

        .table-metric-capsule i {
            color: var(--brand-orange);
            font-size: 0.88rem;
        }

        .table-metric-capsule strong {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 900;
            color: var(--text-heading);
        }

        .table-action-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--brand-orange);
            font-weight: 700;
            font-size: 0.88rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .table-action-link:hover {
            color: var(--brand-orange-hover);
            transform: translateX(3px);
        }

        /* ΓöÇΓöÇ STRATEGIC FRAMEWORK SECTION ΓöÇΓöÇ */
        .framework-section {
            background: #ffffff;
            border-top: 1px solid var(--border-subtle);
            border-bottom: 1px solid var(--border-subtle);
            padding: 90px 24px;
        }

        .section-header-centered {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 60px;
        }

        .section-header-centered h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            font-weight: 900;
            color: var(--text-heading);
            margin: 0 0 16px;
        }

        .section-header-centered h2 span {
            color: var(--brand-orange);
        }

        .section-header-centered p {
            font-size: 1.1rem;
            color: var(--text-body);
            line-height: 1.7;
            margin: 0;
        }

        .framework-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1240px;
            margin: 0 auto;
        }

        .framework-card {
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            padding: 36px 30px;
            transition: all 0.3s ease;
            position: relative;
        }

        .framework-card:hover {
            transform: translateY(-6px);
            border-color: var(--brand-orange);
            background: #ffffff;
            box-shadow: 0 14px 35px rgba(255, 87, 34, 0.1);
        }

        .framework-step-badge {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--brand-orange);
            margin-bottom: 18px;
            display: inline-block;
        }

        .framework-card h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--text-heading);
            margin: 0 0 14px 0;
        }

        .framework-card p {
            font-size: 0.95rem;
            line-height: 1.65;
            color: var(--text-body);
            margin: 0;
        }

        /* ΓöÇΓöÇ HIGH CONVERTING CTA ΓöÇΓöÇ */
        .bottom-cta-banner {
            padding: 90px 24px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #ffffff;
            text-align: center;
            border-radius: 32px;
            max-width: 1280px;
            margin: 0 auto 90px;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.35);
            position: relative;
            overflow: hidden;
        }

        .bottom-cta-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 87, 34, 0.35) 0%, transparent 70%);
            pointer-events: none;
        }

        .cta-inner-content {
            position: relative;
            z-index: 2;
            max-width: 780px;
            margin: 0 auto;
        }

        .bottom-cta-banner h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4.5vw, 3.4rem);
            font-weight: 900;
            line-height: 1.15;
            margin: 0 0 18px;
        }

        .bottom-cta-banner h2 span {
            background: linear-gradient(135deg, #ff5722 20%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bottom-cta-banner p {
            font-size: 1.15rem;
            color: #cbd5e1;
            line-height: 1.7;
            margin: 0 auto 38px;
        }

        .cta-btn-large {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 40px;
            background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
            color: #ffffff !important;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 800;
            font-size: 1.05rem;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(255, 87, 34, 0.45);
            transition: all 0.3s ease;
        }

        .cta-btn-large:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 16px 40px rgba(255, 87, 34, 0.65);
        }

        /* ΓöÇΓöÇ RESPONSIVE RULES ΓöÇΓöÇ */
        @media (max-width: 1024px) {
            .hero-metrics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .theatre-layout {
                grid-template-columns: 1fr;
            }
            .theatre-selector-rail {
                max-height: 320px;
            }
            .framework-grid {
                grid-template-columns: 1fr;
            }
            .stage-grid-details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .brands-hero {
                padding: 130px 20px 55px;
            }
            .hero-metrics-grid {
                grid-template-columns: 1fr;
            }
            .theatre-stage-viewport {
                padding: 20px;
            }
            .stage-visual-container {
                height: 220px;
            }
            .matrix-table-container {
                overflow-x: auto;
            }
            .matrix-table th, .matrix-table td {
                padding: 14px 16px;
            }
            .matrix-controls-bar {
                flex-direction: column;
                align-items: stretch;
            }
            .matrix-search-input {
                width: 100%;
            }
            .bottom-cta-banner {
                border-radius: 20px;
                padding: 60px 20px;
            }
        }
    </style>

<!-- ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ HERO SECTION ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ -->
    <header class="brands-hero">
        <div class="hero-badge-pill">
            <span class="hero-badge-dot"></span>
            100% Audited Client Partnerships
        </div>
        <h1 class="hero-headline">
            The Iconic Brands We've <span>Scaled &amp; Transformed</span>
        </h1>
        <p class="hero-subline">
            From high-fashion D2C powerhouses and single-origin artisanal coffee to commercial cinema studios, multi-crore glassware enterprises, and clinical dermatology leaders ΓÇö explore the quantifiable revenue, search dominance, and digital ecosystems engineered by Fusion X.
        </p>

        <!-- Live Trust Telemetry -->
        <div class="hero-metrics-grid">
            <div class="metric-stat-card">
                <div class="metric-stat-number">50<span>+</span></div>
                <div class="metric-stat-label">Happy Customers</div>
            </div>
            <div class="metric-stat-card">
                <div class="metric-stat-number">100<span>+</span></div>
                <div class="metric-stat-label">Projects Delivered</div>
            </div>
            <div class="metric-stat-card">
                <div class="metric-stat-number">900<span>+</span></div>
                <div class="metric-stat-label">Inbound Calls Generated</div>
            </div>
            <div class="metric-stat-card">
                <div class="metric-stat-number">5.2<span>x</span></div>
                <div class="metric-stat-label">Peak Campaign ROAS</div>
            </div>
        </div>
    </header>

    <!-- ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ INFINITE LOGO MARQUEE ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ -->
    <section class="marquee-ribbon" aria-label="Partner Brand Marquee">
        <div class="marquee-track">
            <!-- Set 1 -->
            <a href="<?php echo esc_url( home_url( '/off-human/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/off-human/logo.jpg' ); ?>" alt="Off Human Logo">
                <span>Off Human</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/energy-bags/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/energy-bags/logo.png' ); ?>" alt="The Energy Bags Logo">
                <span>The Energy Bags</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/nilaro/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/nilaro/logo.webp' ); ?>" alt="Nilaro Coffee Logo">
                <span>Nilaro Coffee</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/bhawani/logo.png' ); ?>" alt="Bhawani Glassware Logo">
                <span>Bhawani Glassware</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/dr-madhavi/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/dr-madhavi/logo.svg' ); ?>" alt="Dr. Madhavi Clinic Logo">
                <span>Dr. Madhavi Clinic</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bikerz-module/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/bikerz/logo.jpg' ); ?>" alt="Bikerz Module Logo">
                <span>Bikerz Module</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/sridhar-food-house/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/sridhar/logo.jpg' ); ?>" alt="Sridhar Food House Logo">
                <span>Sridhar Food House</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/meeras-beauty-parlour/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/meeras/logo.webp' ); ?>" alt="Meera's Beauty Parlour Logo">
                <span>Meera's Beauty</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/tk-cinematic-studio/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/tk/logo.webp' ); ?>" alt="TK Cinematic Studio Logo">
                <span>TK Cinematic</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/truly-yours/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/truly-yours/logo.jpg' ); ?>" alt="Truly Yours Logo">
                <span>Truly Yours</span>
            </a>

            <!-- Duplicate Set for Smooth Infinite Loop -->
            <a href="<?php echo esc_url( home_url( '/off-human/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/off-human/logo.jpg' ); ?>" alt="Off Human Logo">
                <span>Off Human</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/energy-bags/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/energy-bags/logo.png' ); ?>" alt="The Energy Bags Logo">
                <span>The Energy Bags</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/nilaro/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/nilaro/logo.webp' ); ?>" alt="Nilaro Coffee Logo">
                <span>Nilaro Coffee</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/bhawani/logo.png' ); ?>" alt="Bhawani Glassware Logo">
                <span>Bhawani Glassware</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/dr-madhavi/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/dr-madhavi/logo.svg' ); ?>" alt="Dr. Madhavi Clinic Logo">
                <span>Dr. Madhavi Clinic</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/bikerz-module/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/bikerz/logo.jpg' ); ?>" alt="Bikerz Module Logo">
                <span>Bikerz Module</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/sridhar-food-house/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/sridhar/logo.jpg' ); ?>" alt="Sridhar Food House Logo">
                <span>Sridhar Food House</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/meeras-beauty-parlour/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/meeras/logo.webp' ); ?>" alt="Meera's Beauty Parlour Logo">
                <span>Meera's Beauty</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/tk-cinematic-studio/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/tk/logo.webp' ); ?>" alt="TK Cinematic Studio Logo">
                <span>TK Cinematic</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/truly-yours/' ) ); ?>" class="brand-logo-pill">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/brands/truly-yours/logo.jpg' ); ?>" alt="Truly Yours Logo">
                <span>Truly Yours</span>
            </a>
        </div>
    </section>

    <!-- ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ THEATRE SECTION: KINETIC BRAND STAGE ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ -->
    <section class="theatre-section">
        <div class="theatre-section-header">
            <h2>Interactive <span>Brand Showcase Theatre</span></h2>
            <p>Select any brand from the left directory to examine their live digital architecture, audited performance metrics, and verified engineering transformation.</p>
        </div>

        <div class="theatre-layout">
            
            <!-- Left Side: Interactive Selector Rail (List Concept, NOT cards) -->
            <div class="theatre-selector-rail" id="brandSelectorRail">
                <!-- Dynamically populated via JavaScript for clean maintainability -->
            </div>

            <!-- Right Side: Cinematic Viewport Stage -->
            <div class="theatre-stage-viewport" id="theatreStageViewport">
                
                <!-- Upper Visual Window -->
                <div>
                    <div class="stage-visual-container">
                        <img id="stageVisualImg" src="<?php echo esc_url( get_template_directory_uri() . '/brands/off-human.webp' ); ?>" alt="Brand Visual Preview" class="stage-visual-image">
                        <div class="stage-hud-badge">
                            <span class="pulse-light"></span>
                            <div class="stage-hud-val" id="stageHudMetric">4.8x <span>Meta ROAS</span></div>
                        </div>
                    </div>

                    <!-- Brand Header Row -->
                    <div class="stage-header-row">
                        <div class="stage-brand-main">
                            <div class="stage-logo-large">
                                <img id="stageLogoImg" src="<?php echo esc_url( get_template_directory_uri() . '/brands/off-human/logo.jpg' ); ?>" alt="Brand Logo">
                            </div>
                            <div class="stage-title-wrap">
                                <h3 id="stageBrandTitle">Off Human</h3>
                                <span class="stage-sector-pill" id="stageSectorPill">D2C Luxury Streetwear</span>
                            </div>
                        </div>
                    </div>

                    <h4 class="stage-headline-lead" id="stageLeadHeadline">
                        Engineering Flash-Drop E-Commerce &amp; 4.8x Meta ROAS for Luxury Streetwear
                    </h4>

                    <!-- Technical Breakdown Grid -->
                    <div class="stage-grid-details">
                        <div class="stage-challenge-box">
                            <h4><i class="fa-solid fa-triangle-exclamation" style="color:#ef4444;"></i> Core Challenge</h4>
                            <p id="stageChallengeText">High checkout friction and attribution drop during limited drop releases.</p>
                        </div>
                        <div class="stage-solution-box">
                            <h4><i class="fa-solid fa-screwdriver-wrench" style="color:var(--brand-orange);"></i> Fusion X Solution</h4>
                            <p id="stageSolutionText">Engineered headless Shopify drop flow with Server-Side Meta CAPI and VIP early access.</p>
                        </div>
                    </div>

                    <!-- Tech Stack Delivered -->
                    <div class="stage-tech-tags" id="stageTechBadges">
                        <!-- Injected dynamically -->
                    </div>

                    <!-- Testimonial Quote -->
                    <div class="stage-quote-strip">
                        <p id="stageQuoteText">"Our streetwear drop sold out in record time. The custom checkout speed delivered a consistent 4.8x ROAS."</p>
                        <span id="stageQuoteAuthor">Off Human Creative Director</span>
                    </div>
                </div>

                <!-- Stage Footer Controls -->
                <div class="stage-footer-actions">
                    <a id="stageCaseStudyLink" href="<?php echo esc_url( home_url( '/off-human/' ) ); ?>" class="stage-cta-btn">
                        <span>Read Audited Case Study</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    
                    <div class="stage-nav-controls">
                        <div class="stage-autoplay-toggle active" id="autoPlayToggle" onclick="toggleAutoPlay()">
                            <i class="fa-solid fa-play" id="autoPlayIcon"></i>
                            <span>Auto Showroom</span>
                        </div>
                        <button class="stage-nav-arrow" onclick="prevBrand()" title="Previous Brand">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="stage-nav-arrow" onclick="nextBrand()" title="Next Brand">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ SECTION 2: EXECUTIVE COMPARISON MATRIX (TABLE, NOT CARDS) ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ -->
    <section class="matrix-section">
        <div class="matrix-header">
            <h2>Complete Client <span>Portfolio Matrix</span></h2>
            <p>An executive overview of client partnerships, verified industry niches, custom deliverables, and audited outcomes engineered by Fusion X.</p>
        </div>

        <!-- Controls: Category Filters + Live Search -->
        <div class="matrix-controls-bar">
            <div class="matrix-filters-row">
                <button class="matrix-tab-btn active" data-filter="all">All Brands (10)</button>
                <button class="matrix-tab-btn" data-filter="ecommerce">D2C &amp; E-Commerce (3)</button>
                <button class="matrix-tab-btn" data-filter="fnb">Food &amp; Beverage (2)</button>
                <button class="matrix-tab-btn" data-filter="healthcare">Healthcare &amp; Clinics (2)</button>
                <button class="matrix-tab-btn" data-filter="retail">Automotive &amp; Retail (2)</button>
                <button class="matrix-tab-btn" data-filter="media">Media &amp; Studios (1)</button>
            </div>
            <div class="matrix-search-box">
                <i class="fa-solid fa-magnifying-glass matrix-search-icon"></i>
                <input type="text" id="matrixSearchInput" class="matrix-search-input" placeholder="Search by brand, tech, sector...">
            </div>
        </div>

        <!-- Architectural Table View (NOT cards) -->
        <div class="matrix-table-container">
            <table class="matrix-table" id="matrixTable">
                <thead>
                    <tr>
                        <th>Brand &amp; Identity</th>
                        <th>Sector</th>
                        <th>Engineered Solution</th>
                        <th>Audited Business Outcome</th>
                        <th>Case Study</th>
                    </tr>
                </thead>
                <tbody id="matrixTableBody">
                    <!-- Populated dynamically via JavaScript -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ STRATEGIC TRANSFORMATION FRAMEWORK ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ -->
    <section class="framework-section" aria-label="Transformation Methodology">
        <div class="section-header-centered">
            <h2>How Fusion X <span>Engineers Brand Growth</span></h2>
            <p>Our proven three-stage growth protocol takes growing enterprises from invisible to dominating search and conversion across every digital touchpoint.</p>
        </div>
        <div class="framework-grid">
            <div class="framework-card">
                <span class="framework-step-badge">01.</span>
                <h3>Deep Architecture Audit</h3>
                <p>We analyze competitor vulnerabilities, core web vitals, Answer Engine Optimization (AEO/GEO) gaps, and historical paid media attribution to formulate a custom scaling blueprint.</p>
            </div>
            <div class="framework-card">
                <span class="framework-step-badge">02.</span>
                <h3>Custom Code &amp; Funnels</h3>
                <p>No cookie-cutter templates. We engineer bespoke Shopify Plus architectures, frictionless checkout flows, and high-CTR dynamic creative assets designed to maximize customer lifetime value.</p>
            </div>
            <div class="framework-card">
                <span class="framework-step-badge">03.</span>
                <h3>High-Velocity Dominance</h3>
                <p>We deploy precision Meta and Google Ads alongside entity-structured organic search rankings, creating a self-sustaining customer acquisition engine that compounds month over month.</p>
            </div>
        </div>
    </section>

    <!-- ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ HIGH-CONVERTING BOTTOM CTA ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ -->
    <section style="padding: 0 24px;">
        <div class="bottom-cta-banner">
            <div class="cta-inner-content">
                <h2>Ready to Scale Your Brand to <span>New Heights?</span></h2>
                <p>
                    Join over 50+ happy business leaders who scaled their revenue, organic search monopoly, and paid ROAS with Fusion X. Schedule your complimentary 1-on-1 strategy consultation today.
                </p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn-large">
                    <span>Schedule Free Strategy Audit</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ EXACT UNIVERSAL SITE FOOTER ΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉΓòÉ -->

<script>
        // Full 10 Client Brands Dataset
        const BRANDS_DATA = [
            {
                id: 'off-human',
                name: 'Off Human',
                category: 'ecommerce',
                sector: 'D2C Luxury Streetwear',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/off-human/logo.jpg' : 'brands/off-human/logo.jpg'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/off-human.webp' : 'brands/off-human.webp'),
                metric: '4.8x Meta ROAS',
                metricSub: 'Instant Flash-Drop Sellout Rate',
                lead: 'Engineering Flash-Drop E-Commerce & 4.8x Meta ROAS for Luxury Streetwear',
                challenge: 'High checkout friction, scalping bots, and ad tracking data loss during limited quantity product drop releases.',
                solution: 'Architected custom headless Shopify storefront with Server-Side Meta CAPI tracking, anti-bot checkout locks, and high-CTR Instagram hype reels.',
                tech: ['Shopify Plus', 'Meta CAPI Tracking', 'Drop-Gating Funnels', 'Mobile CRO'],
                quote: 'Our streetwear drop sold out in record time. The custom checkout speed combined with their Server-Side CAPI tracking delivered a consistent 4.8x ROAS.',
                author: 'Off Human Creative Director',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'off-human/' : '/off-human/')
            },
            {
                id: 'energy-bags',
                name: 'The Energy Bags',
                category: 'ecommerce',
                sector: 'Eco Luggage & Backpacks',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/energy-bags/logo.png' : 'brands/energy-bags/logo.png'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/energy-bags/home-banner.png' : 'brands/energy-bags/home-banner.png'),
                metric: '+320% Orders',
                metricSub: 'Sustained 4-Month Growth Run',
                lead: 'Scaling Multi-Tier Luggage Bundles & Increasing Orders by 320%',
                challenge: 'Low average order value (AOV) and high mobile drop-off on collection navigation pages.',
                solution: 'Engineered high-converting Shopify Plus collection architecture with dynamic bundle builders and multi-variant Meta catalog retargeting.',
                tech: ['Shopify Plus', 'Bundle Architecture', 'Meta Catalog Ads', 'Mobile Checkout'],
                quote: 'Fusion X restructured our product collection funnels and checkout experience. Our overall order volume increased by 320% within four months.',
                author: 'The Energy Bags Operations',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'energy-bags/' : '/energy-bags/')
            },
            {
                id: 'nilaro',
                name: 'Nilaro Coffee',
                category: 'fnb',
                sector: 'Single-Origin Filter Coffee',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/nilaro/logo.webp' : 'brands/nilaro/logo.webp'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/nilaro/home-banner.png' : 'brands/nilaro/home-banner.png'),
                metric: '+220% Subs',
                metricSub: 'Monthly Recurring Revenue Surge',
                lead: 'Crafting a Sensory D2C Brand Identity & Scaling Subscriptions by 220%',
                challenge: 'High customer acquisition cost and lack of repeat subscription retention in artisanal filter coffee.',
                solution: 'Bespoke artisanal brand identity, pouch packaging illustrations, automated subscription billing funnels, and viral sensory coffee brewing reels.',
                tech: ['Brand Identity', 'Pouch Packaging', 'Shopify Subscriptions', 'Visual Reels'],
                quote: 'From brand identity to packaging design and recurring Shopify subscription setup, Fusion X handled every piece seamlessly. Monthly subscriptions grew by 220%.',
                author: 'Nilaro Coffee Founding Team',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'nilaro/' : '/nilaro/')
            },
            {
                id: 'bhawani',
                name: 'Bhawani Glassware',
                category: 'retail',
                sector: 'Architectural & Table Glassware',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/bhawani/logo.png' : 'brands/bhawani/logo.png'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/bhawani/homepage.png' : 'brands/bhawani/homepage.png'),
                metric: '900+ Calls',
                metricSub: 'Generated in 3 Months Exclusively',
                lead: 'Capturing Local Search Monopoly & Driving 900+ Direct Showroom Calls',
                challenge: 'Zero digital presence and losing commercial glass contracts to competitor directories in Chennai.',
                solution: 'Hyper-targeted Google Maps SEO, semantic keyword silos for commercial glass, entity linkages, and automated Google review funnels.',
                tech: ['Local GMB SEO', 'Entity Linkages', 'Call-Only Funnels', 'Review Strategy'],
                quote: 'Fusion X completely transformed our local inbound acquisition. Over 900+ phone calls came directly to our showroom in just 3 months.',
                author: 'Managing Director, Bhawani Corner',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'bhawani-corner/' : '/bhawani-corner/')
            },
            {
                id: 'dr-madhavi',
                name: 'Dr. Madhavi Clinic',
                category: 'healthcare',
                sector: 'Clinical Aesthetics & Dermatology',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/dr-madhavi/logo.svg' : 'brands/dr-madhavi/logo.svg'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/dr-madhavi/banner.svg' : 'brands/dr-madhavi/banner.svg'),
                metric: '3.8x Bookings',
                metricSub: 'Verified In-Clinic Consultations',
                lead: 'Positioning ChennaiΓÇÖs Premier Clinical Aesthetics & 3.8x Patient Bookings',
                challenge: 'Crowded local clinic competition and low conversion on generic social leads.',
                solution: 'Trust-first medical authority architecture with Google Search Ads, AI Overviews citation strategy (GEO), and friction-free appointment scheduling.',
                tech: ['Google Search Ads', 'AEO/GEO Optimization', 'Local Clinic SEO', 'Patient Funnels'],
                quote: 'Fusion X built an authoritative digital presence for our clinic that attracts genuine, high-trust aesthetic dermatology patients consistently.',
                author: 'Dr. Madhavi Anjimati',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'dr-madhavi/' : '/dr-madhavi/')
            },
            {
                id: 'bikerz',
                name: 'Bikerz Module',
                category: 'retail',
                sector: 'Superbike Gear & Custom Parts',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/bikerz/logo.jpg' : 'brands/bikerz/logo.jpg'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/bikerz-module.jpg' : 'brands/bikerz-module.jpg'),
                metric: '5.2x Meta ROAS',
                metricSub: 'High-Ticket Riding Gear Sales',
                lead: 'Dominating Superbike Accessories with High-Velocity Meta Ads at 5.2x ROAS',
                challenge: 'High cart abandonment due to complex multi-variant motorcycle compatibility parts.',
                solution: 'Sub-second catalog browsing speed, dynamic vehicle compatibility filters, and precision-targeted Meta enthusiast community retargeting.',
                tech: ['Meta Dynamic Ads', 'Speed Optimization', 'Vehicle Filter Flow', 'Enthusiast CRO'],
                quote: 'Our riding gear and custom accessories require targeted targeting. Fusion X delivered a record 5.2x ROAS and flawless mobile speed.',
                author: 'Bikerz Module Management',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'bikerz-module/' : '/bikerz-module/')
            },
            {
                id: 'sridhar',
                name: 'Sridhar Food House',
                category: 'fnb',
                sector: 'Heritage Sweets & Catering',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/sridhar/logo.jpg' : 'brands/sridhar/logo.jpg'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/sridhar/cart-showcase.jpg' : 'brands/sridhar/cart-showcase.jpg'),
                metric: '+410% Inquiries',
                metricSub: 'Wedding & Corporate Bulk Inquiries',
                lead: 'Re-energizing a Heritage Food Icon & Driving +410% Bulk Catering Growth',
                challenge: 'Reliance on walk-in footfall with zero capture of high-margin corporate & wedding catering.',
                solution: 'Google Business Profile ranking for bulk catering keywords, festive sweet gift box landing funnels, and viral street-food shorts.',
                tech: ['Hyperlocal GMB SEO', 'Festive Funnels', 'Food Reels & Shorts', 'Bulk Catering Lead Gen'],
                quote: 'During festive seasons and wedding months, our bulk catering orders increased dramatically. Their local SEO and food reels made all the difference.',
                author: 'Sridhar Food House Leadership',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'sridhar-food-house/' : '/sridhar-food-house/')
            },
            {
                id: 'meeras',
                name: "Meera's Beauty",
                category: 'healthcare',
                sector: 'Luxury Bridal Makeup & Hair',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/meeras/logo.webp' : 'brands/meeras/logo.webp'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/meeras-beauty-parlour.webp' : 'brands/meeras-beauty-parlour.webp'),
                metric: '150+ Brides',
                metricSub: 'Pre-Booked High-Ticket Packages',
                lead: 'Scaling High-Ticket Bridal Makeup Inquiries with Instagram Reels & WhatsApp Automation',
                challenge: 'Manual telephone inquiry handling with slow follow-ups leading to missed wedding bookings.',
                solution: 'Instagram transformation portfolio reels, hyperlocal Meta lead ads, and automated instant WhatsApp click-to-chat consultation bookings.',
                tech: ['Instagram Reels SEO', 'WhatsApp API Funnel', 'Meta Lead Ads', 'Bridal Packages'],
                quote: 'We are booked out months in advance for bridal makeovers. The automated WhatsApp booking funnel connects directly with high-intent brides.',
                author: "Meera's Beauty Creative Director",
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'meeras-beauty-parlour/' : '/meeras-beauty-parlour/')
            },
            {
                id: 'tk',
                name: 'TK Cinematic Studio',
                category: 'media',
                sector: 'Cinema & Commercial Film',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/tk/logo.webp' : 'brands/tk/logo.webp'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/tk-cinematic-studio.webp' : 'brands/tk-cinematic-studio.webp'),
                metric: '12M+ Views',
                metricSub: 'Organic Commercial Impressions',
                lead: 'Positioning a Commercial Cinema Studio & Generating 12M+ Organic Impressions',
                challenge: 'Under-monetized production showreels and lack of enterprise brand ad contracts.',
                solution: 'Cinematic brand portfolio website, YouTube algorithm video SEO, and high-ticket B2B commercial outreach to enterprise marketing heads.',
                tech: ['Video SEO & Algorithms', 'Cinema Showreel Site', 'B2B Brand Outreach', 'Digital PR'],
                quote: 'Fusion X brought our cinema production capabilities to national brands. Our video impressions crossed 12 million with high-ticket commercial contracts.',
                author: 'TK Cinematic Studio Director',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'tk-cinematic-studio/' : '/tk-cinematic-studio/')
            },
            {
                id: 'truly-yours',
                name: 'Truly Yours',
                category: 'ecommerce',
                sector: 'Bespoke Wedding Keepsakes',
                logo: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/truly-yours/logo.jpg' : 'brands/truly-yours/logo.jpg'),
                visual: (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI + '/brands/truly-yours.jpg' : 'brands/truly-yours.jpg'),
                metric: '350+ Orders',
                metricSub: 'High-Margin Bespoke Bridal Keepsakes',
                lead: 'Architecting Interactive Wedding Invites & Generating 350+ Luxury Commissions',
                challenge: 'Difficulty conveying the bespoke craftsmanship of physical & digital invitations online.',
                solution: 'Interactive bespoke digital previewer, aesthetic Pinterest & Meta carousel funnels, and frictionless WhatsApp bridal concierge.',
                tech: ['Interactive E-Invites', 'Meta Carousel Ads', 'Luxury Branding', 'Bridal CRO'],
                quote: 'Our custom wedding invitation commissions skyrocketed. Fusion X understood our aesthetic vision and built an experience brides adore.',
                author: 'Truly Yours Founder',
                link: (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL + 'truly-yours/' : '/truly-yours/')
            }
        ];

        let currentBrandIndex = 0;
        let autoPlayTimer = null;
        let isAutoPlay = true;

        document.addEventListener('DOMContentLoaded', () => {
            initTheatreRail();
            renderTheatreStage(0);
            initMatrixTable();
            startAutoPlay();

            // Mobile Hamburger Drawer
            const hamburger = document.querySelector('.hamburger');
            const navLinks = document.querySelector('.nav-links');
            if (hamburger && navLinks) {
                hamburger.addEventListener('click', () => {
                    navLinks.classList.toggle('nav-active');
                    hamburger.classList.toggle('toggle');
                });
            }
        });

        // 1. Initialize the Left Selector Rail (List format, NOT cards)
        function initTheatreRail() {
            const rail = document.getElementById('brandSelectorRail');
            rail.innerHTML = '';

            BRANDS_DATA.forEach((b, idx) => {
                const tab = document.createElement('button');
                tab.className = `theatre-brand-tab ${idx === 0 ? 'active' : ''}`;
                tab.id = `theatreTab_${idx}`;
                tab.onclick = () => {
                    selectBrand(idx);
                };

                tab.innerHTML = `
                    <div class="tab-brand-logo-box">
                        <img src="${b.logo}" alt="${b.name} Logo">
                    </div>
                    <div class="tab-brand-info">
                        <div class="tab-brand-title">
                            ${b.name} <i class="fa-solid fa-circle-check" style="color:var(--brand-orange); font-size:0.8rem;"></i>
                        </div>
                        <div class="tab-brand-category">${b.sector}</div>
                    </div>
                    <div class="tab-metric-pill">${b.metric}</div>
                `;

                rail.appendChild(tab);
            });
        }

        // 2. Render Theatre Stage with Fluid Depth Transition
        function renderTheatreStage(index) {
            currentBrandIndex = index;
            const b = BRANDS_DATA[index];

            // Update Tab Active State
            document.querySelectorAll('.theatre-brand-tab').forEach((t, i) => {
                t.classList.toggle('active', i === index);
            });

            const viewport = document.getElementById('theatreStageViewport');
            const visualImg = document.getElementById('stageVisualImg');

            // Quick soft fade
            visualImg.style.opacity = '0.3';
            visualImg.style.transform = 'scale(0.98)';

            setTimeout(() => {
                visualImg.src = b.visual;
                visualImg.alt = `${b.name} Visual Showcase`;
                document.getElementById('stageHudMetric').innerHTML = `${b.metric} <span>ΓÇó ${b.metricSub}</span>`;
                document.getElementById('stageLogoImg').src = b.logo;
                document.getElementById('stageLogoImg').alt = `${b.name} Logo`;
                document.getElementById('stageBrandTitle').innerText = b.name;
                document.getElementById('stageSectorPill').innerText = b.sector;
                document.getElementById('stageLeadHeadline').innerText = b.lead;
                document.getElementById('stageChallengeText').innerText = b.challenge;
                document.getElementById('stageSolutionText').innerText = b.solution;

                // Tech tags
                const tagsBox = document.getElementById('stageTechBadges');
                tagsBox.innerHTML = '';
                b.tech.forEach(t => {
                    const sp = document.createElement('span');
                    sp.className = 'stage-tech-badge';
                    sp.innerText = t;
                    tagsBox.appendChild(sp);
                });

                // Quote
                document.getElementById('stageQuoteText').innerText = `"${b.quote}"`;
                document.getElementById('stageQuoteAuthor').innerText = b.author;

                // Link
                document.getElementById('stageCaseStudyLink').href = b.link;

                // Restore visual
                visualImg.style.opacity = '1';
                visualImg.style.transform = 'scale(1)';
            }, 180);
        }

        function selectBrand(index) {
            renderTheatreStage(index);
            resetAutoPlay();
        }

        function nextBrand() {
            let next = (currentBrandIndex + 1) % BRANDS_DATA.length;
            selectBrand(next);
        }

        function prevBrand() {
            let prev = (currentBrandIndex - 1 + BRANDS_DATA.length) % BRANDS_DATA.length;
            selectBrand(prev);
        }

        function startAutoPlay() {
            if (autoPlayTimer) clearInterval(autoPlayTimer);
            autoPlayTimer = setInterval(() => {
                if (isAutoPlay) {
                    let next = (currentBrandIndex + 1) % BRANDS_DATA.length;
                    renderTheatreStage(next);
                }
            }, 6000);
        }

        function resetAutoPlay() {
            if (isAutoPlay) {
                startAutoPlay();
            }
        }

        function toggleAutoPlay() {
            isAutoPlay = !isAutoPlay;
            const toggle = document.getElementById('autoPlayToggle');
            const icon = document.getElementById('autoPlayIcon');
            if (isAutoPlay) {
                toggle.classList.add('active');
                icon.className = 'fa-solid fa-play';
                startAutoPlay();
            } else {
                toggle.classList.remove('active');
                icon.className = 'fa-solid fa-pause';
                if (autoPlayTimer) clearInterval(autoPlayTimer);
            }
        }

        // 3. Initialize the Matrix Table View (NOT cards)
        function initMatrixTable() {
            const tbody = document.getElementById('matrixTableBody');
            const searchInput = document.getElementById('matrixSearchInput');
            const filterTabs = document.querySelectorAll('.matrix-tab-btn');

            function renderRows() {
                const activeBtn = document.querySelector('.matrix-tab-btn.active');
                const selectedCat = activeBtn ? activeBtn.getAttribute('data-filter') : 'all';
                const searchTxt = searchInput ? searchInput.value.toLowerCase().trim() : '';

                tbody.innerHTML = '';

                BRANDS_DATA.forEach((b, idx) => {
                    const matchesCategory = (selectedCat === 'all' || b.category === selectedCat);
                    const matchesSearch = (searchTxt === '' ||
                        b.name.toLowerCase().includes(searchTxt) ||
                        b.sector.toLowerCase().includes(searchTxt) ||
                        b.tech.join(' ').toLowerCase().includes(searchTxt) ||
                        b.metric.toLowerCase().includes(searchTxt));

                    if (matchesCategory && matchesSearch) {
                        const tr = document.createElement('tr');
                        tr.style.cursor = 'pointer';
                        tr.onclick = () => {
                            window.location.href = b.link;
                        };

                        tr.innerHTML = `
                            <td>
                                <div class="table-brand-cell">
                                    <div class="table-logo-circle">
                                        <img src="${b.logo}" alt="${b.name}">
                                    </div>
                                    <div class="table-brand-names">
                                        <h4>${b.name} <i class="fa-solid fa-circle-check" style="color:var(--brand-orange); font-size:0.8rem;"></i></h4>
                                        <span>${b.sector}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="table-sector-badge">${b.sector}</span>
                            </td>
                            <td>
                                <div style="display:flex; flex-wrap:wrap; gap:4px; max-width:320px;">
                                    ${b.tech.map(t => `<span style="font-size:0.72rem; background:#f1f5f9; padding:2px 8px; border-radius:4px; color:#475569;">${t}</span>`).join('')}
                                </div>
                            </td>
                            <td>
                                <div class="table-metric-capsule">
                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                    <strong>${b.metric}</strong>
                                </div>
                            </td>
                            <td>
                                <a href="${b.link}" class="table-action-link" onclick="event.stopPropagation()">
                                    <span>Case Study</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    }
                });
            }

            filterTabs.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterTabs.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    renderRows();
                });
            });

            if (searchInput) {
                searchInput.addEventListener('input', renderRows);
            }

            renderRows();
        }
    </script>

<?php
get_footer();
