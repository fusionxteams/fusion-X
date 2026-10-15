<?php
/**
 * Template Name: Bhawani Corner Case Study
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        :root {
            --brand-orange: #ff5722;
            --brand-orange-light: #ff7043;
            --brand-orange-glow: rgba(255, 87, 34, 0.45);
            --bg-dark: #080808;
            --bg-card: #111111;
            --bg-card-hover: #181818;
            --border-dark: rgba(255, 255, 255, 0.08);
            --border-glow: rgba(255, 87, 34, 0.35);
            --text-white: #f8fafc;
            --text-muted: #94a3b8;
        }

        html, body {
            overflow-x: hidden !important;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-white);
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ── HERO SECTION ── */
        .case-hero {
            position: relative;
            padding: 150px 24px 80px;
            background: radial-gradient(circle at 50% 12%, rgba(255, 87, 34, 0.14) 0%, rgba(8, 8, 8, 0.98) 70%), var(--bg-dark);
            border-bottom: 1px solid var(--border-dark);
            overflow: hidden;
        }

        .hero-container {
            max-width: 1280px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 40px;
            align-items: center;
        }

        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.86rem;
            color: var(--text-muted);
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .breadcrumb-nav a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb-nav a:hover {
            color: var(--brand-orange);
        }

        .breadcrumb-nav span {
            color: var(--brand-orange);
        }

        .hero-badge-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .flagship-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 87, 34, 0.15);
            border: 1px solid rgba(255, 87, 34, 0.4);
            color: var(--brand-orange-light);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .heritage-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .hero-headline {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4.2vw, 3.8rem);
            font-weight: 900;
            line-height: 1.12;
            letter-spacing: -1.2px;
            color: #ffffff;
            margin: 0 0 18px;
        }

        .hero-headline .highlight {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subhead {
            font-size: clamp(1rem, 1.6vw, 1.2rem);
            line-height: 1.68;
            color: #cbd5e1;
            margin: 0 0 30px;
            max-width: 660px;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .btn-primary-orange {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #ff5722 0%, #ff7043 100%);
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 13px 26px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 25px var(--brand-orange-glow);
            transition: all 0.25s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary-orange:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 32px rgba(255, 87, 34, 0.65);
        }

        .btn-secondary-dark {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: 0.92rem;
            padding: 12px 20px;
            border-radius: 50px;
            text-decoration: none;
            border: 1px solid var(--border-dark);
            transition: all 0.25s ease;
        }

        .btn-secondary-dark:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 87, 34, 0.4);
            transform: translateY(-2px);
            color: var(--brand-orange);
        }

        /* 3D Glassware Showcase Stage */
        .stage-3d-wrapper {
            position: relative;
            width: 100%;
            height: 480px;
            background: radial-gradient(circle at center, rgba(255, 87, 34, 0.16) 0%, rgba(18, 18, 18, 0.65) 70%);
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), inset 0 0 40px rgba(255, 87, 34, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        #three-canvas-container {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            cursor: grab;
        }

        #three-canvas-container:active {
            cursor: grabbing;
        }

        .stage-hint-pill {
            position: absolute;
            top: 14px;
            right: 14px;
            background: rgba(14, 14, 14, 0.88);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 87, 34, 0.4);
            border-radius: 30px;
            padding: 6px 14px;
            font-size: 0.74rem;
            color: var(--brand-orange-light);
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            z-index: 10;
            pointer-events: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .stage-overlay-card {
            position: absolute;
            bottom: 14px;
            left: 14px;
            right: 14px;
            background: rgba(12, 12, 12, 0.88);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 87, 34, 0.3);
            border-radius: 14px;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 5;
            pointer-events: none;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        }

        .stage-client-logo {
            height: 30px;
            background: #ffffff;
            padding: 3px 8px;
            border-radius: 6px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .stage-client-text {
            min-width: 0;
            flex: 1;
        }

        .stage-client-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 0.9rem;
            color: #ffffff;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stage-client-sub {
            font-size: 0.72rem;
            color: var(--text-muted);
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── STATS COUNTER STRIP ── */
        .stats-strip {
            background: #0d0d0d;
            border-bottom: 1px solid var(--border-dark);
            padding: 40px 24px;
            position: relative;
            z-index: 3;
        }

        .stats-grid {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .stat-block {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border-dark);
            border-radius: 18px;
            padding: 24px 20px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-block:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(255, 87, 34, 0.15);
        }

        .stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 3.6vw, 3rem);
            font-weight: 900;
            color: #ffffff;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-num span {
            color: var(--brand-orange);
        }

        .stat-title {
            font-size: 0.88rem;
            font-weight: 700;
            color: #cbd5e1;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .stat-subtext {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* ── SECTION COMMON ── */
        .case-section {
            padding: 80px 24px;
            position: relative;
            z-index: 2;
        }

        .section-wrap {
            max-width: 1240px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            max-width: 820px;
            margin: 0 auto 50px;
        }

        .section-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--brand-orange);
            background: rgba(255, 87, 34, 0.08);
            border: 1px solid rgba(255, 87, 34, 0.25);
            padding: 6px 18px;
            border-radius: 50px;
            margin-bottom: 16px;
        }

        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.1rem, 3.6vw, 3.1rem);
            font-weight: 900;
            line-height: 1.15;
            color: #ffffff;
            margin: 0 0 16px;
        }

        .section-title span {
            color: var(--brand-orange);
        }

        .section-desc {
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--text-muted);
            margin: 0;
        }

        /* ── INTERACTIVE ELEVATION GRAPH ── */
        .graph-card {
            background: #0f0f0f;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            margin-bottom: 45px;
            position: relative;
        }

        .graph-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-dark);
        }

        .graph-metric-tabs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .metric-tab-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-dark);
            color: #94a3b8;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .metric-tab-btn:hover {
            color: #ffffff;
            border-color: rgba(255, 87, 34, 0.3);
        }

        .metric-tab-btn.active {
            background: var(--brand-orange);
            color: #ffffff;
            border-color: var(--brand-orange);
            box-shadow: 0 4px 15px rgba(255, 87, 34, 0.4);
        }

        .graph-source-note {
            font-size: 0.85rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .graph-source-note i {
            color: #22c55e;
        }

        /* SVG Graph Canvas */
        .chart-svg-container {
            width: 100%;
            height: 380px;
            position: relative;
            overflow: visible;
        }

        .chart-svg-container svg {
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .chart-grid-line {
            stroke: rgba(255, 255, 255, 0.06);
            stroke-width: 1;
            stroke-dasharray: 4 4;
        }

        .chart-axis-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            fill: #64748b;
        }

        .chart-area-fill {
            fill: url(#orangeAreaGrad);
            transition: d 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .chart-path-line {
            fill: none;
            stroke: var(--brand-orange);
            stroke-width: 3.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            filter: drop-shadow(0 4px 10px rgba(255, 87, 34, 0.6));
            transition: d 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .chart-data-node {
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .chart-data-node:hover circle {
            r: 7;
            stroke-width: 3;
            stroke: #ffffff;
        }

        .chart-tooltip {
            position: absolute;
            background: rgba(15, 15, 15, 0.95);
            border: 1px solid var(--brand-orange);
            backdrop-filter: blur(10px);
            padding: 10px 16px;
            border-radius: 12px;
            color: #ffffff;
            font-size: 0.85rem;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.7);
            z-index: 50;
            white-space: nowrap;
        }

        /* Checkpoint Cards Timeline */
        .checkpoints-header {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #ffffff;
            margin: 40px 0 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .checkpoints-header i {
            color: var(--brand-orange);
        }

        .checkpoints-timeline {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
        }

        .checkpoint-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .checkpoint-card:hover, .checkpoint-card.active {
            border-color: var(--brand-orange);
            background: #1a1a1a;
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.15);
        }

        .checkpoint-card.active::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 12px;
            background: var(--brand-orange);
            border-radius: 50%;
            box-shadow: 0 0 12px var(--brand-orange);
        }

        .cp-month {
            font-size: 0.78rem;
            font-weight: 800;
            color: var(--brand-orange);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .cp-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .cp-metric {
            font-size: 0.88rem;
            font-weight: 800;
            color: #cbd5e1;
            margin-bottom: 8px;
        }

        .cp-desc {
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* ── VIDEO PRODUCTION & SOCIAL CHANNELS SECTION ── */
        .video-production-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 36px;
            align-items: center;
            background: #0d0d0d;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 44px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            margin-bottom: 60px;
            box-sizing: border-box;
            width: 100%;
        }

        .video-features-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin: 24px 0 30px;
        }

        .video-feature-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            min-width: 0;
            box-sizing: border-box;
        }

        .video-feature-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-orange);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .video-feature-text {
            min-width: 0;
            box-sizing: border-box;
            word-break: break-word;
        }

        .video-feature-text h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem;
            color: #ffffff;
            margin: 0 0 4px;
        }

        .video-feature-text p {
            font-size: 0.88rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.55;
        }

        .social-channel-cards {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .social-channel-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .social-channel-card:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
        }

        .social-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .social-logo-box {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #ffffff;
            flex-shrink: 0;
        }

        .social-logo-instagram {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
        }

        .social-logo-youtube {
            background: #ff0000;
        }

        .social-name {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 4px;
        }

        .social-handle {
            font-size: 0.86rem;
            color: var(--brand-orange-light);
            font-weight: 600;
        }

        .social-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-dark);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #cbd5e1;
            white-space: nowrap;
        }

        /* ── INTERACTIVE GALLERY / SHOWCASE TABS ── */
        .gallery-container {
            background: #0f0f0f;
            border: 1px solid var(--border-dark);
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        }

        .gallery-tabs {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 28px;
            border-bottom: 1px solid var(--border-dark);
            padding-bottom: 20px;
        }

        .gallery-tab-btn {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.92rem;
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .gallery-tab-btn:hover {
            color: #ffffff;
            border-color: rgba(255, 87, 34, 0.4);
        }

        .gallery-tab-btn.active {
            background: linear-gradient(135deg, #ff5722 0%, #ff7043 100%);
            color: #ffffff;
            border-color: #ff5722;
            box-shadow: 0 4px 15px rgba(255, 87, 34, 0.35);
        }

        .gallery-display {
            position: relative;
            background: #080808;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.8);
        }

        .gallery-view {
            display: none;
            padding: 16px;
        }

        .gallery-view.active {
            display: block;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .gallery-img-wrap {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            background: #000000;
            cursor: zoom-in;
            text-align: center;
        }

        .gallery-img-wrap img {
            width: 100%;
            max-height: 580px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            transition: transform 0.3s ease;
        }

        .gallery-img-wrap:hover img {
            transform: scale(1.02);
        }

        .gallery-caption-bar {
            padding: 20px 10px 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .gallery-caption-text h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            color: #ffffff;
            margin: 0 0 6px;
        }

        .gallery-caption-text p {
            font-size: 0.92rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }

        /* ── DELIVERABLES / WHAT WE BUILT ── */
        .deliverables-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .deliverable-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 22px;
            padding: 32px 28px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .deliverable-card:hover {
            border-color: rgba(255, 87, 34, 0.45);
            background: #161616;
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6);
        }

        .deliverable-icon-box {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: rgba(255, 87, 34, 0.1);
            border: 1px solid rgba(255, 87, 34, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: var(--brand-orange);
            margin-bottom: 22px;
        }

        .deliverable-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 12px;
        }

        .deliverable-desc {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.65;
            margin: 0 0 20px;
        }

        .deliverable-tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .deliv-pill {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
        }

        /* ── BRAND VERIFICATION / CONTACT FOOTER CARD ── */
        .client-info-banner {
            background: linear-gradient(135deg, #121212 0%, #1c1c1c 100%);
            border: 2px solid rgba(255, 87, 34, 0.35);
            border-radius: 28px;
            padding: 48px;
            box-shadow: 0 20px 60px rgba(255, 87, 34, 0.12);
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            gap: 40px;
            align-items: center;
        }

        .client-meta-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.1rem;
            font-weight: 900;
            color: #ffffff;
            margin: 0 0 14px;
        }

        .client-meta-title span {
            color: var(--brand-orange);
        }

        .client-meta-desc {
            font-size: 1.05rem;
            color: #cbd5e1;
            line-height: 1.7;
            margin: 0 0 24px;
        }

        .client-details-list {
            list-style: none;
            padding: 0;
            margin: 0 0 28px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .client-details-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.95rem;
            color: #cbd5e1;
        }

        .client-details-list li i {
            color: var(--brand-orange);
            font-size: 1.1rem;
            margin-top: 3px;
        }

        .client-action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        /* Modal Lightbox */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.94);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .lightbox-modal.active {
            display: flex;
        }

        .lightbox-modal img {
            max-width: 95%;
            max-height: 90vh;
            border-radius: 12px;
            border: 2px solid var(--brand-orange);
            box-shadow: 0 0 40px rgba(255, 87, 34, 0.5);
        }

        .lightbox-close {
            position: absolute;
            top: 25px;
            right: 35px;
            font-size: 2.2rem;
            color: #ffffff;
            cursor: pointer;
            transition: color 0.2s;
        }

        .lightbox-close:hover {
            color: var(--brand-orange);
        }

        /* ── RESPONSIVE RULES ── */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
            }
            .stage-3d-wrapper {
                height: 380px;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .video-production-grid {
                grid-template-columns: 1fr;
            }
            .deliverables-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .checkpoints-timeline {
                grid-template-columns: repeat(2, 1fr);
            }
            .client-info-banner {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .case-hero {
                padding: 110px 18px 50px;
                overflow: hidden;
            }
            .hero-container {
                grid-template-columns: 1fr;
                gap: 28px;
            }
            .flagship-badge, .heritage-pill {
                white-space: normal;
                text-align: center;
                max-width: 100%;
                box-sizing: border-box;
                line-height: 1.35;
                font-size: 0.72rem;
            }
            .hero-headline {
                font-size: clamp(1.65rem, 6.2vw, 2.2rem) !important;
                letter-spacing: -0.5px;
                word-break: break-word;
                overflow-wrap: break-word;
            }
            .hero-cta-group {
                flex-direction: column;
                width: 100%;
                gap: 12px;
            }
            .hero-cta-group a {
                width: 100%;
                justify-content: center;
                box-sizing: border-box;
            }
            .stage-3d-wrapper {
                height: 385px;
            }
            .stage-hint-pill {
                top: 10px;
                right: 10px;
                padding: 4px 10px;
                font-size: 0.68rem;
            }
            .stage-overlay-card {
                bottom: 10px;
                left: 10px;
                right: 10px;
                padding: 8px 12px;
                gap: 10px;
            }
            .stage-client-logo {
                height: 24px;
                padding: 2px 6px;
            }
            .stage-client-title {
                font-size: 0.8rem;
            }
            .stage-client-sub {
                font-size: 0.66rem;
            }
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .stats-strip {
                padding: 28px 16px;
            }
            .case-section {
                padding: 55px 16px;
            }
            .section-header {
                margin-bottom: 35px;
            }
            .deliverables-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            .checkpoints-timeline {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .video-production-grid {
                grid-template-columns: 1fr !important;
                padding: 24px 16px !important;
                gap: 24px !important;
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }
            .video-production-grid > div {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }
            .video-features-list {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }
            .video-feature-item {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }
            .video-feature-text {
                min-width: 0 !important;
                max-width: 100% !important;
                word-break: break-word !important;
                box-sizing: border-box !important;
            }
            .social-channel-cards {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }
            .social-channel-card {
                flex-direction: column !important;
                align-items: flex-start !important;
                padding: 16px 14px !important;
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
                gap: 12px !important;
            }
            .social-left {
                width: 100% !important;
                min-width: 0 !important;
            }
            .social-badge {
                align-self: flex-start !important;
            }
            .graph-card {
                padding: 20px 14px;
            }
            .chart-svg-container {
                height: 260px;
            }
            .gallery-container {
                padding: 20px 14px;
            }
            .client-info-banner {
                grid-template-columns: 1fr !important;
                padding: 24px 16px !important;
                border-radius: 20px !important;
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }
            .client-info-banner > div {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }
            .client-meta-title {
                font-size: 1.45rem !important;
                word-break: break-word !important;
            }
            .client-meta-desc {
                font-size: 0.92rem !important;
                word-break: break-word !important;
            }
            .client-details-list {
                width: 100% !important;
                max-width: 100% !important;
                box-sizing: border-box !important;
            }
            .client-details-list li {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 4px !important;
                width: 100% !important;
                max-width: 100% !important;
                word-break: break-word !important;
                overflow-wrap: break-word !important;
                box-sizing: border-box !important;
            }
            .client-details-list li div {
                width: 100% !important;
                max-width: 100% !important;
                word-break: break-all !important;
                overflow-wrap: break-word !important;
            }
            .client-details-list li a {
                word-break: break-all !important;
                overflow-wrap: break-word !important;
                display: inline-block !important;
                max-width: 100% !important;
            }
            .client-action-buttons {
                flex-direction: column;
                width: 100%;
            }
            .client-action-buttons a {
                width: 100%;
                justify-content: center;
                box-sizing: border-box;
            }
        }
    </style>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
    <header class="case-hero">
        <div class="hero-container">
            <div class="hero-text-col">
                <div class="breadcrumb-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">Portfolio</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <span>Bhawani Corner Glassware</span>
                </div>

                <div class="hero-badge-wrap">
                    <div class="flagship-badge">
                        <i class="fa-solid fa-star"></i> FLAGSHIP CLIENT CASE STUDY
                    </div>
                    <div class="heritage-pill">
                        <i class="fa-solid fa-crown" style="color: #f59e0b;"></i> India's No. 1 Glassware Brand
                    </div>
                    <div class="heritage-pill">
                        <i class="fa-solid fa-clock-rotate-left"></i> 40+ Years Heritage
                    </div>
                </div>

                <h1 class="hero-headline">
                    Bhawani Corner Glassware: <span class="highlight">10x Organic Search Surge</span> & 900+ Monthly Inquiries
                </h1>

                <p class="hero-subhead">
                    How Fusion X revolutionized a 40-year heritage powerhouse into a modern digital authority through custom e-commerce web engineering, high-production video shoots & editing for Instagram & YouTube, Generative Engine Optimization (GEO/AEO), and an intelligent AI WhatsApp bot.
                </p>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-primary-orange">
                        <span>Explore Growth Graph</span> <i class="fa-solid fa-chart-line"></i>
                    </a>
                    <a href="#video-production" class="btn-secondary-dark">
                        <i class="fa-solid fa-video"></i> Video Shoots & Socials
                    </a>
                    <a href="https://bhawanicorner.com/" target="_blank" rel="noopener noreferrer" class="btn-secondary-dark">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Visit Official Store
                    </a>
                    <a href="tel:+919840207781" class="btn-secondary-dark">
                        <i class="fa-solid fa-phone"></i> Call 98402 07781
                    </a>
                </div>
            </div>

            <!-- 3D Interactive Stage -->
            <div class="hero-visual-col">
                <div class="stage-3d-wrapper">
                    <div id="three-canvas-container"></div>
                    <div class="stage-hint-pill">
                        <i class="fa-solid fa-arrows-rotate"></i>
                        <span>Drag 3D Glassware</span>
                    </div>
                    <div class="stage-overlay-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Glassware Logo" class="stage-client-logo">
                        <div class="stage-client-text">
                            <div class="stage-client-title">Bhawani Corner Glassware</div>
                            <div class="stage-client-sub">T. Nagar, Chennai &bull; Verified Partner</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ═══════════════════════ STATS COUNTER STRIP ═══════════════════════ -->
    <section class="stats-strip">
        <div class="stats-grid">
            <div class="stat-block">
                <div class="stat-num"><span>+1,050%</span></div>
                <div class="stat-title">Search Impressions Lift</div>
                <div class="stat-subtext">From 3.2K to 37.5K/month on Google Search Console</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span>900+</span></div>
                <div class="stat-title">Monthly Phone Inquiries</div>
                <div class="stat-subtext">Direct calls for bridal sets, bulk orders & luxury gifting</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span>11.8x</span></div>
                <div class="stat-title">Organic Click Surge</div>
                <div class="stat-subtext">From 66 baseline clicks up to 781 monthly visits</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span>#1</span></div>
                <div class="stat-title">Rank in AI Engines</div>
                <div class="stat-subtext">Cited in Google Gemini, ChatGPT & Perplexity answers</div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ INTERACTIVE PERFORMANCE ELEVATION GRAPH ═══════════════════════ -->
    <section class="case-section" id="interactive-graph">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-arrow-trend-up"></i> REAL PERFORMANCE AUDIT</div>
                <h2 class="section-title">Verified Organic Search <span>Elevation Graph</span></h2>
                <p class="section-desc">
                    Examine month-by-month verified data directly from Google Search Console. Tracking the inflection point where Fusion X kicked off technical SEO in Month 4 (April 2026) and scaled Bhawani Corner to national dominance.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-controls">
                    <div class="graph-metric-tabs">
                        <button class="metric-tab-btn active" data-metric="impressions">
                            <i class="fa-solid fa-eye"></i> Search Impressions (GSC)
                        </button>
                        <button class="metric-tab-btn" data-metric="clicks">
                            <i class="fa-solid fa-mouse-pointer"></i> Organic Clicks
                        </button>
                        <button class="metric-tab-btn" data-metric="calls">
                            <i class="fa-solid fa-phone-volume"></i> Customer Call Inquiries
                        </button>
                    </div>
                    <div class="graph-source-note">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Source: Official Google Search Console & Analytics Audit</span>
                    </div>
                </div>

                <!-- SVG Interactive Chart Container -->
                <div class="chart-svg-container" id="chart-container">
                    <svg id="elevation-svg" viewBox="0 0 1000 360" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="orangeAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#ff5722" stop-opacity="0.55"/>
                                <stop offset="60%" stop-color="#ff5722" stop-opacity="0.12"/>
                                <stop offset="100%" stop-color="#ff5722" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        
                        <!-- Grid Lines -->
                        <g id="chart-grid"></g>
                        
                        <!-- Area Fill -->
                        <path id="chart-area" class="chart-area-fill" d=""></path>
                        
                        <!-- Main Stroke -->
                        <path id="chart-line" class="chart-path-line" d=""></path>
                        
                        <!-- Data Nodes -->
                        <g id="chart-nodes"></g>
                    </svg>

                    <!-- Floating Tooltip -->
                    <div class="chart-tooltip" id="chart-tooltip">
                        <div id="tooltip-month" style="font-weight: 700; color: #ff5722;"></div>
                        <div id="tooltip-value" style="font-size: 1.1rem; font-weight: 900;"></div>
                        <div id="tooltip-note" style="font-size: 0.75rem; color: #94a3b8;"></div>
                    </div>
                </div>

                <!-- Clickable Checkpoint Milestones -->
                <div class="checkpoints-header">
                    <i class="fa-solid fa-flag-checkered"></i> Strategic Growth Checkpoints & Milestones
                </div>

                <div class="checkpoints-timeline">
                    <div class="checkpoint-card" data-index="4">
                        <div>
                            <div class="cp-month">MONTH 1–3 (PRE-SEO)</div>
                            <div class="cp-title">Traditional Heritage Baseline</div>
                            <div class="cp-metric">3,233 Imp • 66 Clicks</div>
                        </div>
                        <div class="cp-desc">A respected 40-year physical store in T. Nagar with 5,000+ SKUs but stagnant organic reach and zero AI engine indexing.</div>
                    </div>

                    <div class="checkpoint-card active" data-index="5">
                        <div>
                            <div class="cp-month">MONTH 4 (APRIL 2026)</div>
                            <div class="cp-title">Fusion X Campaign Kickoff</div>
                            <div class="cp-metric">+240% Surge (11,010 Imp)</div>
                        </div>
                        <div class="cp-desc">Instant breakout after launching the high-speed e-commerce architecture, product schema, and complete on-page metadata.</div>
                    </div>

                    <div class="checkpoint-card" data-index="7">
                        <div>
                            <div class="cp-month">MONTH 6 (JUNE 2026)</div>
                            <div class="cp-title">GEO & AEO AI Indexing</div>
                            <div class="cp-metric">25,172 Imp • 524 Clicks</div>
                        </div>
                        <div class="cp-desc">Topical authority blogs ranked in Google Gemini & ChatGPT for queries like "Cutlery shop near me" & "Best crockery in Chennai".</div>
                    </div>

                    <div class="checkpoint-card" data-index="9">
                        <div>
                            <div class="cp-month">MONTH 8 (AUGUST 2026)</div>
                            <div class="cp-title">900+ Monthly Inquiries Peak</div>
                            <div class="cp-metric">37,519 Imp • 900+ Calls</div>
                        </div>
                        <div class="cp-desc">Integration of AI WhatsApp Bot and peak festive ranking drove over 900 direct customer calls for dinner sets and return gifts.</div>
                    </div>

                    <div class="checkpoint-card" data-index="10">
                        <div>
                            <div class="cp-month">PRESENT (SUSTAINED)</div>
                            <div class="cp-title">India's #1 Glassware Authority</div>
                            <div class="cp-metric">37K+ Consistent Reach</div>
                        </div>
                        <div class="cp-desc">Established an untouchable digital moat with nationwide ranking across high-ticket tableware, drinkware, and school utility bottles.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ HIGH-QUALITY VIDEO PRODUCTION & SOCIAL CHANNELS ═══════════════════════ -->
    <section class="case-section" id="video-production" style="padding-top: 20px;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-clapperboard"></i> PRODUCTION & SOCIAL MEDIA</div>
                <h2 class="section-title">High-Quality Video Production & <span>Social SEO Engine</span></h2>
                <p class="section-desc">
                    Fusion X doesn't just manage digital campaigns; we handle full end-to-end creative production. From writing high-retention concepts and on-location shoots at Bhawani Corner's showroom to cinematic video editing and multi-platform video SEO.
                </p>
            </div>

            <div class="video-production-grid">
                <div>
                    <span class="flagship-badge" style="margin-bottom: 14px;"><i class="fa-solid fa-camera"></i> ON-SITE PRODUCTION PIPELINE</span>
                    <h3 style="font-family: 'Outfit', sans-serif; font-size: clamp(1.8rem, 3vw, 2.4rem); font-weight: 900; color: #ffffff; margin: 12px 0 16px;">
                        Scripted, Shot, Edited & Optimized by Fusion X
                    </h3>
                    <p style="font-size: 1rem; color: #cbd5e1; line-height: 1.65; margin: 0;">
                        We go directly on-location to Bhawani Corner's T. Nagar store to shoot luxury tableware unboxings, festive gift curation guides, and product utility showcases with cinematic lighting and 4K camera gear.
                    </p>

                    <div class="video-features-list">
                        <div class="video-feature-item">
                            <div class="video-feature-icon"><i class="fa-solid fa-pen-nib"></i></div>
                            <div class="video-feature-text">
                                <h4>Viral Scriptwriting & Storyboarding</h4>
                                <p>We craft high-retention 3-second visual hooks, storytelling scripts, and educational showcases tailored for Chennai and Pan-India shoppers.</p>
                            </div>
                        </div>
                        <div class="video-feature-item">
                            <div class="video-feature-icon"><i class="fa-solid fa-video"></i></div>
                            <div class="video-feature-text">
                                <h4>On-Location Studio & Showroom Shoots</h4>
                                <p>Professional cinematographers shoot real glassware, luxury Corelle dinnerware, and insulated bottles directly with the Bhawani Corner team.</p>
                            </div>
                        </div>
                        <div class="video-feature-item">
                            <div class="video-feature-icon"><i class="fa-solid fa-film"></i></div>
                            <div class="video-feature-text">
                                <h4>High-Retention Video Editing & Motion Graphics</h4>
                                <p>Fast-paced cuts, sound design, engaging captions, and luxury grading crafted specifically for high completion rates on Instagram Reels and YouTube Shorts.</p>
                            </div>
                        </div>
                        <div class="video-feature-item">
                            <div class="video-feature-icon"><i class="fa-solid fa-chart-line"></i></div>
                            <div class="video-feature-text">
                                <h4>Video SEO & Algorithmic Distribution</h4>
                                <p>Optimized titles, search-intent descriptions, hashtags, and keyword-rich audio transcripts to trigger YouTube search recommendation and Instagram Explore feeds.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Official Channel Badges -->
                <div class="social-channel-cards">
                    <div style="font-family: 'Outfit', sans-serif; font-size: 1.25rem; font-weight: 800; color: #ffffff; margin-bottom: 6px;">
                        Explore Official Channels Managed by Us:
                    </div>

                    <!-- Instagram Card -->
                    <a href="https://www.instagram.com/bhawani_corner/?hl=en" target="_blank" rel="noopener noreferrer" class="social-channel-card">
                        <div class="social-left">
                            <div class="social-logo-box social-logo-instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                            <div>
                                <div class="social-name">Instagram Channel</div>
                                <div class="social-handle">@bhawani_corner</div>
                                <div style="font-size: 0.78rem; color: #94a3b8; margin-top: 4px;">Viral Reels • Product Highlights • Seasonal Drops</div>
                            </div>
                        </div>
                        <div class="social-badge">
                            <span>Watch Reels</span> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </div>
                    </a>

                    <!-- YouTube Card -->
                    <a href="https://www.youtube.com/@bhawanicorner" target="_blank" rel="noopener noreferrer" class="social-channel-card">
                        <div class="social-left">
                            <div class="social-logo-box social-logo-youtube">
                                <i class="fa-brands fa-youtube"></i>
                            </div>
                            <div>
                                <div class="social-name">YouTube Channel</div>
                                <div class="social-handle">@bhawanicorner</div>
                                <div style="font-size: 0.78rem; color: #94a3b8; margin-top: 4px;">Shorts & Long-form Showcase • Video SEO</div>
                            </div>
                        </div>
                        <div class="social-badge">
                            <span>Visit Channel</span> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </div>
                    </a>

                    <div style="background: rgba(255, 87, 34, 0.08); border: 1px solid rgba(255, 87, 34, 0.25); border-radius: 16px; padding: 18px; text-align: center;">
                        <i class="fa-solid fa-bolt" style="color: var(--brand-orange); font-size: 1.2rem; margin-bottom: 6px;"></i>
                        <div style="font-size: 0.88rem; font-weight: 700; color: #ffffff;">Need High-End Video Shoots for Your Brand?</div>
                        <div style="font-size: 0.78rem; color: #94a3b8; margin-top: 4px;">Our in-house production crew handles scripts, cameras, edits, and viral distribution.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ PROJECT VISUAL SHOWCASE ═══════════════════════ -->
    <section class="case-section" style="background: #0b0b0b;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-camera"></i> VISUAL EVIDENCE</div>
                <h2 class="section-title">Engineered Digital <span>Showcase</span></h2>
                <p class="section-desc">
                    Explore real live captures of the high-velocity e-commerce storefront, GEO-optimized knowledge hub, and the AI WhatsApp chatbot created for Bhawani Corner Glassware.
                </p>
            </div>

            <div class="gallery-container">
                <div class="gallery-tabs">
                    <button class="gallery-tab-btn active" data-target="view-home">
                        <i class="fa-solid fa-store"></i> 1. E-Commerce Storefront
                    </button>
                    <button class="gallery-tab-btn" data-target="view-blog">
                        <i class="fa-solid fa-newspaper"></i> 2. Ranking Blog & GEO Hub
                    </button>
                    <button class="gallery-tab-btn" data-target="view-chatbot">
                        <i class="fa-solid fa-robot"></i> 3. Products & AI WhatsApp Chatbot
                    </button>
                    <button class="gallery-tab-btn" data-target="view-logo">
                        <i class="fa-solid fa-award"></i> 4. Official Brand Identity
                    </button>
                </div>

                <div class="gallery-display">
                    <!-- View 1: Home Page -->
                    <div class="gallery-view active" id="view-home">
                        <div class="gallery-img-wrap" onclick="openLightbox('brands/bhawani/homepage.png')">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/homepage.png" alt="Bhawani Corner Glassware E-Commerce Home Page" loading="lazy">
                        </div>
                        <div class="gallery-caption-bar">
                            <div class="gallery-caption-text">
                                <h4>Custom High-Speed E-Commerce Web Storefront</h4>
                                <p>Engineered with interactive seasonal gift sliders, responsive category icons (Tableware, Drinkware, Cutlery, Furnishing, Bowls), and sub-second page loads.</p>
                            </div>
                            <a href="https://bhawanicorner.com/" target="_blank" rel="noopener noreferrer" class="btn-primary-orange" style="padding: 8px 18px; font-size: 0.85rem;">
                                Visit Live Page <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>

                    <!-- View 2: Blog Hub -->
                    <div class="gallery-view" id="view-blog">
                        <div class="gallery-img-wrap" onclick="openLightbox('brands/bhawani/blog-page.png')">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/blog-page.png" alt="Bhawani Corner Glassware Blog and GEO Engine" loading="lazy">
                        </div>
                        <div class="gallery-caption-bar">
                            <div class="gallery-caption-text">
                                <h4>AEO & GEO High-Ranking Knowledge Base</h4>
                                <p>Topical authority articles targeting high-intent buyer searches ("Cutlery Shop Near Me", "Best Shops in T. Nagar", "Best Crockery Shops in India") that dominate Google and AI engines.</p>
                            </div>
                            <span class="flagship-badge" style="font-size: 0.78rem;">Authored by Pratik S</span>
                        </div>
                    </div>

                    <!-- View 3: Chatbot & Products -->
                    <div class="gallery-view" id="view-chatbot">
                        <div class="gallery-img-wrap" onclick="openLightbox('brands/bhawani/products-chatbot.png')">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/products-chatbot.png" alt="Bhawani Corner Catalog and WhatsApp Chatbot" loading="lazy">
                        </div>
                        <div class="gallery-caption-bar">
                            <div class="gallery-caption-text">
                                <h4>Luxury Catalog & 24/7 AI WhatsApp Chatbot Assistant</h4>
                                <p>Curated catalog featuring items from daily essentials to luxury hosting sets up to ₹27,000. Connected with a smart WhatsApp bot answering customer questions round-the-clock.</p>
                            </div>
                            <span class="heritage-pill"><i class="fa-brands fa-whatsapp" style="color: #22c55e;"></i> 24/7 Automation</span>
                        </div>
                    </div>

                    <!-- View 4: Brand Logo -->
                    <div class="gallery-view" id="view-logo">
                        <div class="gallery-img-wrap" onclick="openLightbox('brands/bhawani/logo.png')" style="background: #ffffff; padding: 40px;">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Glassware Official Logo" style="max-height: 200px; width: auto;" loading="lazy">
                        </div>
                        <div class="gallery-caption-bar">
                            <div class="gallery-caption-text">
                                <h4>Official Trademark Brand Identity</h4>
                                <p>Bhawani Corner Glassware Pvt Ltd — Recognized nationwide as India's No. 1 Glassware Brand with over four decades of consumer trust.</p>
                            </div>
                            <span class="heritage-pill">Established 40+ Years</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ WHAT FUSION X DELIVERED ═══════════════════════ -->
    <section class="case-section">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-screwdriver-wrench"></i> FULL-STACK DELIVERABLES</div>
                <h2 class="section-title">What Fusion X <span>Engineered</span></h2>
                <p class="section-desc">
                    A comprehensive, synchronized growth system blending cutting-edge software architecture, search algorithm mastery, video production, and AI conversational intelligence.
                </p>
            </div>

            <div class="deliverables-grid">
                <!-- 1 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-code"></i></div>
                    <h3 class="deliverable-title">Custom E-Commerce Platform</h3>
                    <p class="deliverable-desc">Built a custom high-performance web portal (<a href="https://bhawanicorner.com/" target="_blank" style="color: var(--brand-orange); text-decoration: none;">bhawanicorner.com</a>) optimized for lightning-fast catalog browsing, mobile responsiveness, and smooth product filtering.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">Sub-Second FCP</span>
                        <span class="deliv-pill">Mobile-First UX</span>
                        <span class="deliv-pill">Catalog Taxonomy</span>
                    </div>
                </div>

                <!-- 2 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-clapperboard"></i></div>
                    <h3 class="deliverable-title">Video Shoots & Social Management</h3>
                    <p class="deliverable-desc">Complete creative video production: content writing, on-site shooting with the Bhawani Corner team at T. Nagar, dynamic video editing, and algorithm optimization across Instagram & YouTube.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">On-Site Shoots</span>
                        <span class="deliv-pill">Viral Reels & Shorts</span>
                        <span class="deliv-pill">YouTube & Insta SEO</span>
                    </div>
                </div>

                <!-- 3 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-brain"></i></div>
                    <h3 class="deliverable-title">AEO & GEO (AI Search Optimization)</h3>
                    <p class="deliverable-desc">Engineered topical authority content structured specifically for Generative Engines. Ranked Bhawani Corner as the primary recommendation in Google Gemini, ChatGPT, and Perplexity.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">ChatGPT Recommendations</span>
                        <span class="deliv-pill">Gemini Citations</span>
                        <span class="deliv-pill">Semantic Knowledge</span>
                    </div>
                </div>

                <!-- 4 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-brands fa-whatsapp"></i></div>
                    <h3 class="deliverable-title">AI WhatsApp Chatbot Assistant</h3>
                    <p class="deliverable-desc">Built an automated AI assistant directly into the store interface. It answers queries about Corelle dinner sets, crystal glassware, store timings, and bridal gifts 24/7 without human delay.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">Instant Auto-Replies</span>
                        <span class="deliv-pill">Product Guidance</span>
                        <span class="deliv-pill">Lead Capture</span>
                    </div>
                </div>

                <!-- 5 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-phone"></i></div>
                    <h3 class="deliverable-title">900+ Monthly Call Inquiries</h3>
                    <p class="deliverable-desc">Optimized direct-call conversion pathways across local maps and mobile search results, generating a record 900+ phone calls in a single month from retail and wholesale buyers.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">Click-To-Call CTR</span>
                        <span class="deliv-pill">High-Intent Traffic</span>
                        <span class="deliv-pill">B2B & D2C Inquiries</span>
                    </div>
                </div>

                <!-- 6 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-boxes-stacked"></i></div>
                    <h3 class="deliverable-title">Full Catalog Digital Architecture</h3>
                    <p class="deliverable-desc">Digitized 5,000+ items across glassware, tableware, insulated school bottles, lunch boxes, and luxury gifting sets spanning from affordable everyday essentials to ₹27,000+ luxury pieces.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">5,000+ SKUs</span>
                        <span class="deliv-pill">Luxury Sets (₹27K)</span>
                        <span class="deliv-pill">School & Utility Line</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CLIENT STORE VERIFICATION BAR ═══════════════════════ -->
    <section class="case-section" style="padding-top: 20px;">
        <div class="section-wrap">
            <div class="client-info-banner">
                <div>
                    <h2 class="client-meta-title">Verified Store: <span>Bhawani Corner Glassware</span></h2>
                    <p class="client-meta-desc">
                        A flagship shopping destination in Chennai's commercial capital for over 40 years. Experience their vast luxury collection in person or on the web platform we engineered.
                    </p>
                    <ul class="client-details-list">
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <div><strong>Showroom Address:</strong> Second Floor, Shree Shakthi Plaza, 70, Sir Thyagaraya Rd, T. Nagar, Chennai, Tamil Nadu 600017</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <div><strong>Phone Line:</strong> +91 98402 07781 (Direct Store & Product Inquiries)</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-clock"></i>
                            <div><strong>Store Hours:</strong> Monday – Sunday: 11:00 AM – 8:00 PM</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-globe"></i>
                            <div><strong>Official Web Platform:</strong> <a href="https://bhawanicorner.com/" target="_blank" style="color: var(--brand-orange); text-decoration: underline;">https://bhawanicorner.com/</a></div>
                        </li>
                    </ul>
                    <div class="client-action-buttons">
                        <a href="https://bhawanicorner.com/" target="_blank" rel="noopener noreferrer" class="btn-primary-orange">
                            <span>Visit Official Website</span> <i class="fa-solid fa-external-link-alt"></i>
                        </a>
                        <a href="tel:+919840207781" class="btn-secondary-dark">
                            <i class="fa-solid fa-phone"></i> Call 98402 07781
                        </a>
                        <a href="https://maps.google.com/?q=Bhawani+Corner+Glassware+T+Nagar+Chennai" target="_blank" rel="noopener noreferrer" class="btn-secondary-dark">
                            <i class="fa-solid fa-map-location-dot"></i> View on Google Maps
                        </a>
                    </div>
                </div>

                <div style="text-align: center; background: rgba(0,0,0,0.4); padding: 30px; border-radius: 20px; border: 1px solid rgba(255,87,34,0.25);">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Glassware Logo" style="max-height: 80px; background: #fff; padding: 10px 20px; border-radius: 12px; margin-bottom: 20px; object-fit: contain;">
                    <div style="font-family: 'Outfit', sans-serif; font-size: 1.3rem; font-weight: 800; color: #fff; margin-bottom: 8px;">
                        Ready for Your Own Transformation?
                    </div>
                    <p style="font-size: 0.9rem; color: #94a3b8; margin-bottom: 20px;">
                        Let Fusion X engineer an undeniable market moat, video dominance, AI visibility, and high-converting web architecture for your brand.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-orange" style="width: 100%; box-sizing: border-box; justify-content: center;">
                        <span>Book Strategy Call</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ LIGHTBOX MODAL ═══════════════════════ -->
    <div class="lightbox-modal" id="lightbox-modal" onclick="closeLightbox()">
        <span class="lightbox-close">&times;</span>
        <img id="lightbox-img" src="" alt="Fullscreen Preview">
    </div>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
