<?php
/**
 * Template Name: Nilaro Case Study
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

        *, *::before, *::after {
            box-sizing: border-box;
        }

        html, body {
            background-color: var(--bg-dark);
            color: var(--text-white);
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
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

        .origin-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4.2vw, 3.8rem);
            font-weight: 900;
            line-height: 1.14;
            letter-spacing: -0.02em;
            color: #ffffff;
            margin: 0 0 20px;
            word-break: break-word;
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: clamp(0.95rem, 1.25vw, 1.15rem);
            line-height: 1.68;
            color: #94a3b8;
            max-width: 640px;
            margin: 0 0 32px;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-orange {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #ff5722 0%, #ff7043 100%);
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 13px 26px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px var(--brand-orange-glow);
        }

        .btn-orange:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(255, 87, 34, 0.65);
            color: #ffffff;
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #f1f5f9;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 13px 24px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: rgba(255, 87, 34, 0.1);
            border-color: var(--brand-orange);
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Official Nilaro Coffee Package Presentation */
        .stage-3d-wrapper {
            position: relative;
            width: 100%;
            height: 480px;
            border-radius: 24px;
            background: radial-gradient(circle at 50% 45%, rgba(255, 87, 34, 0.18) 0%, rgba(18, 14, 10, 0.98) 75%);
            border: 1px solid var(--border-glow);
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 20px 65px;
        }

        .package-glow-halo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 320px;
            height: 380px;
            background: radial-gradient(circle, rgba(255, 112, 67, 0.22) 0%, rgba(255, 87, 34, 0.08) 45%, transparent 70%);
            pointer-events: none;
            filter: blur(25px);
            z-index: 1;
        }

        .nilaro-package-hero-img {
            max-height: 360px;
            max-width: 88%;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            filter: drop-shadow(0 18px 30px rgba(0, 0, 0, 0.9)) drop-shadow(0 0 22px rgba(255, 87, 34, 0.25));
            transition: transform 0.3s ease;
        }

        .nilaro-package-hero-img:hover {
            transform: translateY(-4px) scale(1.02);
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

        .stage-badge-card {
            position: absolute;
            bottom: 14px;
            left: 14px;
            right: 14px;
            background: rgba(15, 15, 15, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 87, 34, 0.3);
            border-radius: 14px;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
            pointer-events: none;
        }

        .stage-logo-thumb {
            height: 28px;
            width: auto;
            object-fit: contain;
            flex-shrink: 0;
        }

        .stage-badge-text {
            min-width: 0;
            flex: 1;
        }

        .stage-badge-title {
            font-size: 0.9rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stage-badge-sub {
            font-size: 0.72rem;
            color: var(--text-muted);
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── STATS STRIP ── */
        .stats-strip {
            background: #0d0d0d;
            border-bottom: 1px solid var(--border-dark);
            padding: 40px 24px;
        }

        .stats-grid {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border-dark);
            border-radius: 18px;
            padding: 24px 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: var(--brand-orange);
            background: rgba(255, 87, 34, 0.05);
            transform: translateY(-4px);
        }

        .stat-number {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 3.2vw, 3rem);
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, #ff7043 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 0.86rem;
            font-weight: 700;
            color: #cbd5e1;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .stat-detail {
            font-size: 0.76rem;
            color: var(--text-muted);
        }

        /* ── SECTION COMMON ── */
        .case-section {
            padding: 90px 24px;
            position: relative;
        }

        .section-container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            max-width: 780px;
            margin: 0 auto 55px;
        }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--brand-orange-light);
            font-size: 0.82rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            background: rgba(255, 87, 34, 0.1);
            border: 1px solid rgba(255, 87, 34, 0.3);
            padding: 4px 14px;
            border-radius: 30px;
        }

        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(1.95rem, 3.2vw, 2.85rem);
            font-weight: 800;
            color: #ffffff;
            line-height: 1.2;
            margin: 0 0 16px;
        }

        .section-title .text-orange {
            color: var(--brand-orange-light);
        }

        .section-desc {
            font-size: 1.02rem;
            color: var(--text-muted);
            line-height: 1.65;
            margin: 0;
        }

        /* ── FOUNDER & GENESIS STORY ── */
        .founder-story-card {
            background: linear-gradient(135deg, #101010 0%, #151515 100%);
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 44px;
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 40px;
            align-items: center;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.6);
            margin-bottom: 70px;
        }

        .founder-visual-wrap {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 87, 34, 0.3);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.7);
        }

        .founder-visual-wrap img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
        }

        .founder-visual-wrap:hover img {
            transform: scale(1.02);
        }

        .founder-caption-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.92) 0%, rgba(0,0,0,0) 100%);
            padding: 24px 20px 16px;
        }

        .founder-quote-tag {
            font-size: 0.8rem;
            color: var(--brand-orange-light);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .founder-quote-text {
            font-size: 1.05rem;
            font-style: italic;
            color: #ffffff;
            margin: 0;
        }

        .founder-content h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.85rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 16px;
        }

        .founder-content p {
            font-size: 0.96rem;
            color: #cbd5e1;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .founder-highlights-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 22px;
        }

        .f-highlight-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-dark);
            border-radius: 14px;
            padding: 16px;
        }

        .f-highlight-item i {
            color: var(--brand-orange-light);
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .f-highlight-item h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 4px;
        }

        .f-highlight-item p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.4;
        }

        /* ── REAL GSC & ANALYTICS GROWTH GRAPH (NO GLITCHING) ── */
        .graph-card {
            background: #111111;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.7);
        }

        .graph-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 28px;
            padding-bottom: 18px;
            border-bottom: 1px solid var(--border-dark);
        }

        .metric-toggle-pills {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #181818;
            padding: 5px;
            border-radius: 50px;
            border: 1px solid var(--border-dark);
        }

        .metric-tab-btn {
            background: transparent;
            border: none;
            color: var(--text-muted);
            font-family: inherit;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .metric-tab-btn.active {
            background: linear-gradient(135deg, #ff5722 0%, #ff7043 100%);
            color: #ffffff;
            font-weight: 800;
            box-shadow: 0 4px 14px var(--brand-orange-glow);
        }

        .graph-badge-status {
            font-size: 0.85rem;
            color: #10b981;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
        }

        .chart-svg-container {
            width: 100%;
            height: 360px;
            position: relative;
            user-select: none;
        }

        #elevation-svg {
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .chart-grid-line {
            stroke: rgba(255, 255, 255, 0.06);
            stroke-dasharray: 4, 4;
        }

        .chart-axis-label {
            fill: #64748b;
            font-size: 11px;
            font-family: 'Space Grotesk', sans-serif;
        }

        .chart-area-fill {
            fill: url(#orangeAreaGrad);
        }

        .chart-path-line {
            fill: none;
            stroke: #ff5722;
            stroke-width: 3.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            filter: drop-shadow(0 4px 8px rgba(255, 87, 34, 0.5));
        }

        /* Glitch-Free Nodes */
        .chart-data-node {
            cursor: pointer;
        }

        .chart-tooltip {
            position: absolute;
            pointer-events: none !important;
            background: rgba(18, 18, 18, 0.96);
            border: 1px solid var(--brand-orange);
            padding: 10px 14px;
            border-radius: 10px;
            color: #ffffff;
            font-size: 0.82rem;
            opacity: 0;
            transition: opacity 0.15s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.85);
            z-index: 50;
            white-space: nowrap;
        }

        /* Checkpoint Cards Timeline */
        .checkpoints-header {
            font-family: 'Outfit', sans-serif;
            font-size: 1.45rem;
            font-weight: 800;
            color: #ffffff;
            margin: 36px 0 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .checkpoints-header i {
            color: var(--brand-orange-light);
        }

        .checkpoints-timeline {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .checkpoint-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .checkpoint-card:hover, .checkpoint-card.active {
            border-color: var(--brand-orange);
            background: #1a1a1a;
            transform: translateY(-4px);
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

        .cp-date {
            font-size: 0.78rem;
            font-weight: 800;
            color: var(--brand-orange-light);
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

        /* ── INTERACTIVE JOURNEY: FROM ORIGIN TO CUSTOMER ── */
        .journey-step-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 40px;
        }

        .journey-step-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 28px 22px;
            position: relative;
            transition: all 0.3s ease;
        }

        .journey-step-card:hover {
            border-color: var(--brand-orange);
            transform: translateY(-5px);
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.7);
        }

        .step-num-badge {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 87, 34, 0.15);
            border: 1px solid rgba(255, 87, 34, 0.4);
            color: var(--brand-orange-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1rem;
            margin-bottom: 18px;
        }

        .step-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 10px;
        }

        .step-desc {
            font-size: 0.88rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0;
        }

        /* ── INTERACTIVE ROASTERY & SEED GRINDER FEATURE ── */
        .roastery-interactive-box {
            background: #0d0d0d;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 40px;
            margin-top: 60px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 36px;
            align-items: center;
        }

        .roastery-visual-stage {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid rgba(255, 87, 34, 0.3);
            background: #000000;
        }

        .roastery-visual-stage img {
            width: 100%;
            height: auto;
            display: block;
        }

        .roastery-lever-trigger {
            position: absolute;
            top: 42%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: var(--brand-orange);
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(255, 87, 34, 0.45);
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .roastery-lever-trigger:hover {
            background: #ff7043;
            transform: translate(-50%, -50%) scale(1.05);
            box-shadow: 0 8px 24px rgba(255, 87, 34, 0.65);
        }

        .roastery-details-side h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.7rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 14px;
        }

        .roastery-details-side p {
            font-size: 0.95rem;
            color: #cbd5e1;
            line-height: 1.65;
            margin-bottom: 20px;
        }

        .roastery-gear-indicators {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.84rem;
            color: var(--brand-orange-light);
            font-weight: 600;
        }

        /* ── WHAT WE BUILT / DELIVERABLES GRID ── */
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
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: var(--brand-orange-light);
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

        .d-tag {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            font-size: 0.76rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
        }

        /* ── PRODUCT STOREFRONT & AI CHATBOT SECTION ── */
        .product-suite-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 36px;
            align-items: center;
            background: #0e0e0e;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 44px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            margin-bottom: 70px;
        }

        .product-visual-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 87, 34, 0.35);
            background: #000000;
            box-shadow: 0 16px 45px rgba(0, 0, 0, 0.8);
            cursor: zoom-in;
        }

        .product-visual-card img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .product-visual-card:hover img {
            transform: scale(1.02);
        }

        .product-visual-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(17, 17, 17, 0.9);
            border: 1px solid var(--brand-orange);
            color: #ffffff;
            font-size: 0.76rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .chatbot-mockup-window {
            background: #161616;
            border: 1px solid rgba(255, 87, 34, 0.35);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.7);
        }

        .chat-window-header {
            background: #1f1f1f;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-dark);
        }

        .chat-header-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #080808;
            border: 1px solid var(--brand-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-orange-light);
            font-size: 0.9rem;
        }

        .chat-name-wrap h5 {
            font-size: 0.95rem;
            color: #ffffff;
            margin: 0;
            font-weight: 700;
        }

        .chat-name-wrap span {
            font-size: 0.75rem;
            color: #10b981;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .chat-body-dialog {
            padding: 22px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            max-height: 320px;
            overflow-y: auto;
        }

        .chat-bubble {
            max-width: 86%;
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 0.88rem;
            line-height: 1.5;
        }

        .chat-bubble.bot {
            background: #222222;
            color: #f1f5f9;
            border-top-left-radius: 4px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            align-self: flex-start;
        }

        .chat-bubble.user {
            background: linear-gradient(135deg, #ff5722 0%, #ff7043 100%);
            color: #ffffff;
            font-weight: 600;
            border-top-right-radius: 4px;
            align-self: flex-end;
        }

        .chat-action-pills {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 8px;
        }

        .chat-pill-btn {
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.4);
            color: #ff7043;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 8px 14px;
            border-radius: 20px;
            text-align: left;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .chat-pill-btn:hover {
            background: var(--brand-orange);
            color: #ffffff;
        }

        .chat-input-bar {
            padding: 14px 18px;
            background: #1c1c1c;
            border-top: 1px solid var(--border-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chat-input-bar input {
            flex: 1;
            background: #0a0a0a;
            border: 1px solid var(--border-dark);
            color: #ffffff;
            font-size: 0.85rem;
            padding: 10px 14px;
            border-radius: 30px;
            outline: none;
        }

        .chat-send-btn {
            background: var(--brand-orange);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            cursor: pointer;
        }

        /* ── VIDEO PRODUCTION & SOCIAL ENGINE ── */
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
        }

        .video-feature-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-orange-light);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .video-feature-text {
            min-width: 0;
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
            gap: 16px;
        }

        .social-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: inherit;
            transition: all 0.25s ease;
        }

        .social-card:hover {
            transform: translateY(-4px);
            border-color: var(--brand-orange);
            background: #1c1c1c;
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.2);
        }

        .social-card-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .social-icon-wrapper {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: #ffffff;
            flex-shrink: 0;
        }

        .social-icon-wrapper.instagram {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }

        .social-icon-wrapper.youtube {
            background: #ff0000;
        }

        .social-icon-wrapper.facebook {
            background: #1877f2;
        }

        .social-meta h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            color: #ffffff;
            margin: 0 0 3px;
        }

        .social-meta span {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .social-visit-arrow {
            color: var(--brand-orange-light);
            font-size: 1.1rem;
            transition: transform 0.2s;
        }

        .social-card:hover .social-visit-arrow {
            transform: translateX(4px);
        }

        /* ── VISUAL PROOF & GALLERY SHOWCASE ── */
        .gallery-container {
            background: #0e0e0e;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);
        }

        .gallery-tabs-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 26px;
            border-bottom: 1px solid var(--border-dark);
            padding-bottom: 16px;
        }

        .gallery-tab-btn {
            background: transparent;
            border: 1px solid var(--border-dark);
            color: var(--text-muted);
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 600;
            padding: 9px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .gallery-tab-btn:hover {
            border-color: var(--brand-orange);
            color: #ffffff;
        }

        .gallery-tab-btn.active {
            background: linear-gradient(135deg, #ff5722 0%, #ff7043 100%);
            border-color: transparent;
            color: #ffffff;
            font-weight: 800;
            box-shadow: 0 4px 14px var(--brand-orange-glow);
        }

        .gallery-view {
            display: none;
            padding: 8px;
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
            border-radius: 16px;
            overflow: hidden;
            background: #000000;
            cursor: zoom-in;
            text-align: center;
            border: 1px solid var(--border-dark);
        }

        .gallery-img-wrap img {
            width: 100%;
            max-height: 560px;
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

        /* Lightbox */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.92);
            z-index: 99999;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .lightbox-modal.active {
            display: flex;
        }

        .lightbox-modal img {
            max-width: 92vw;
            max-height: 88vh;
            object-fit: contain;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.9);
        }

        .lightbox-close {
            position: absolute;
            top: 24px;
            right: 28px;
            font-size: 2rem;
            color: #ffffff;
            cursor: pointer;
            transition: color 0.2s;
        }

        .lightbox-close:hover {
            color: var(--brand-orange-light);
        }

        /* ── CLIENT INFO BANNER ── */
        .client-info-banner {
            background: linear-gradient(135deg, #121212 0%, #181818 100%);
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 44px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            align-items: center;
            margin-top: 60px;
        }

        .client-info-left h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.9rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 14px;
        }

        .client-info-left p {
            font-size: 0.98rem;
            color: #cbd5e1;
            line-height: 1.65;
            margin-bottom: 24px;
        }

        .client-meta-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .meta-row {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.92rem;
            color: #e2e8f0;
        }

        .meta-row i {
            color: var(--brand-orange-light);
            width: 20px;
        }

        .client-action-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* ── RESPONSIVE MEDIA QUERIES ── */
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
            .founder-story-card {
                grid-template-columns: 1fr;
            }
            .roastery-interactive-box {
                grid-template-columns: 1fr;
            }
            .product-suite-grid {
                grid-template-columns: 1fr;
            }
            .video-production-grid {
                grid-template-columns: 1fr;
            }
            .deliverables-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .journey-step-grid {
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
                padding: 100px 16px 45px;
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
            .stage-badge-card {
                padding: 8px 12px;
                bottom: 10px;
                left: 10px;
                right: 10px;
                gap: 10px;
            }
            .stage-logo-thumb {
                height: 22px;
            }
            .stage-badge-title {
                font-size: 0.8rem;
            }
            .stage-badge-sub {
                font-size: 0.66rem;
            }
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 14px;
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
            .founder-story-card {
                padding: 24px 16px;
                border-radius: 20px;
            }
            .founder-highlights-grid {
                grid-template-columns: 1fr;
            }
            .roastery-interactive-box {
                padding: 24px 16px;
                border-radius: 20px;
            }
            .roastery-lever-trigger {
                padding: 10px 18px;
                font-size: 0.76rem;
            }
            .deliverables-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .journey-step-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .checkpoints-timeline {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .product-suite-grid {
                padding: 24px 16px;
                border-radius: 20px;
            }
            .video-production-grid {
                padding: 24px 16px;
                border-radius: 20px;
            }
            .graph-card {
                padding: 20px 14px;
                border-radius: 20px;
            }
            .graph-toolbar {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }
            .metric-toggle-pills {
                flex-wrap: wrap;
                width: 100%;
                justify-content: center;
                border-radius: 16px;
                padding: 4px;
            }
            .metric-tab-btn {
                padding: 8px 12px;
                font-size: 0.78rem;
                flex: 1 1 auto;
                text-align: center;
                justify-content: center;
            }
            .chart-svg-container {
                height: 250px;
            }
            .gallery-container {
                padding: 20px 14px;
                border-radius: 20px;
            }
            .gallery-tabs-nav {
                justify-content: center;
                gap: 8px;
            }
            .gallery-tab-btn {
                padding: 7px 14px;
                font-size: 0.78rem;
            }
            .client-info-banner {
                padding: 26px 16px;
                border-radius: 20px;
            }
            .client-action-buttons {
                flex-direction: column;
                width: 100%;
            }
            .client-action-buttons a {
                width: 100%;
                justify-content: center;
            }
            .hero-cta-group a {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

<!-- ═══════════════════════ CASE STUDY HERO ═══════════════════════ -->
    <header class="case-hero">
        <div class="hero-container">
            <div class="hero-left">
                <div class="breadcrumb-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">Portfolio</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <span>Nilaro Coffee</span>
                </div>

                <div class="hero-badge-wrap">
                    <span class="flagship-badge"><i class="fa-solid fa-award"></i> ZERO-TO-ONE BRAND SCALE</span>
                    <span class="origin-pill"><i class="fa-solid fa-mug-hot"></i> 100% Pure South Indian Filter Coffee</span>
                    <span class="origin-pill"><i class="fa-solid fa-user-tie"></i> Founded by Mr. Nilakshan</span>
                </div>

                <h1 class="hero-title">
                    Nilaro Coffee: <span class="highlight">Scaling an Artisan Filter Coffee Brand From Zero</span>
                </h1>

                <p class="hero-subtitle">
                    How Fusion X partnered with industry veteran <strong>Mr. Nilakshan</strong> to craft Nilaro from the ground up: bespoke storytelling e-commerce, interactive seed-to-cup roastery animations, high-retention video production, AEO/GEO generative AI visibility, and an intelligent WhatsApp sales bot.
                </p>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-orange"><i class="fa-solid fa-chart-line"></i> View GSC Growth Data</a>
                    <a href="#roastery-section" class="btn-outline"><i class="fa-solid fa-gears"></i> Interactive Roastery</a>
                    <a href="https://nilaro.in/" target="_blank" rel="noopener noreferrer" class="btn-outline"><i class="fa-solid fa-arrow-up-right-from-square"></i> Visit nilaro.in</a>
                </div>
            </div>

            <!-- Official Nilaro Coffee Package Presentation -->
            <div class="hero-right">
                <div class="stage-3d-wrapper">
                    <div class="package-glow-halo"></div>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/package.png" alt="Nilaro 100% Pure Coffee 250g Package" class="nilaro-package-hero-img">
                    <div class="stage-hint-pill">
                        <i class="fa-solid fa-leaf"></i>
                        <span>100% Pure Coffee &bull; 250g Pouch</span>
                    </div>
                    <div class="stage-badge-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Logo" class="stage-logo-thumb">
                        <div class="stage-badge-text">
                            <h4 class="stage-badge-title">Nilaro Filter Coffee</h4>
                            <p class="stage-badge-sub">Rise With Every Sip &bull; Verified Partner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ═══════════════════════ STATS STRIP ═══════════════════════ -->
    <section class="stats-strip">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">0 &rarr; 210+</div>
                <div class="stat-label">DAILY ORGANIC IMPRESSIONS</div>
                <div class="stat-detail">Rapid Google indexation from Day 1</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">TOP 7</div>
                <div class="stat-label">AVERAGE SERP POSITION</div>
                <div class="stat-detail">Competitive filter coffee queries</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">AEO & GEO AI CITATION</div>
                <div class="stat-detail">Ranked in Gemini & ChatGPT recommendations</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">24/7</div>
                <div class="stat-label">AI WHATSAPP BOT</div>
                <div class="stat-detail">Automated order assist & blend selector</div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FOUNDER & GENESIS STORY ═══════════════════════ -->
    <section class="case-section" id="founder-story">
        <div class="section-container">
            <div class="founder-story-card">
                <div class="founder-visual-wrap">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/home-banner.png" alt="Nilaro Filter Coffee Storefront">
                    <div class="founder-caption-overlay">
                        <div class="founder-quote-tag">Brand Philosophy</div>
                        <p class="founder-quote-text">"More Than Just Coffee &mdash; It's A Feeling."</p>
                    </div>
                </div>
                <div class="founder-content">
                    <span class="section-tag"><i class="fa-solid fa-seedling"></i> FOUNDER COLLABORATION</span>
                    <h3>Built from Scratch with Mr. Nilakshan</h3>
                    <p>
                        Founder <strong>Mr. Nilakshan</strong> brought decades of deep domain mastery, plantation connections, and an uncompromising passion for authentic South Indian filter coffee. However, building an online direct-to-consumer (D2C) brand in a saturated FMCG market required technical precision, modern visual storytelling, and high-impact digital performance.
                    </p>
                    <p>
                        Fusion X stepped in as the end-to-end digital growth co-pilot. Together, we engineered every digital touchpoint from zero: from brand narrative and packaging digital showcases to high-converting web architecture, interactive farm-to-cup journeys, and multi-channel marketing campaigns.
                    </p>

                    <div class="founder-highlights-grid">
                        <div class="f-highlight-item">
                            <i class="fa-solid fa-chess"></i>
                            <h4>Competitor Moat</h4>
                            <p>Deep market analysis to position Nilaro as the pure, unadulterated luxury alternative.</p>
                        </div>
                        <div class="f-highlight-item">
                            <i class="fa-solid fa-route"></i>
                            <h4>Transparent Sourcing</h4>
                            <p>Visualizing plantation origins and roasting methods right on the storefront.</p>
                        </div>
                        <div class="f-highlight-item">
                            <i class="fa-solid fa-robot"></i>
                            <h4>Conversational D2C</h4>
                            <p>Custom WhatsApp AI bot answering instant queries about grind size, chicory ratio & brewing.</p>
                        </div>
                        <div class="f-highlight-item">
                            <i class="fa-solid fa-bullhorn"></i>
                            <h4>Omnichannel Reach</h4>
                            <p>Meta Ads, Reels, YouTube Shorts, and high-retention video production.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ REAL PERFORMANCE ELEVATION GRAPH (GLITCH-FREE) ═══════════════════════ -->
    <section class="case-section" id="interactive-graph" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-chart-column"></i> VERIFIED GSC & ANALYTICS AUDIT</span>
                <h2 class="section-title">Zero-to-Scale <span class="text-orange">Search Performance</span> Graph</h2>
                <p class="section-desc">
                    Examine verified day-by-day telemetry straight from Google Search Console and Google Analytics. Tracking Nilaro's climb from zero indexation in August to 210+ daily impressions and single-digit SERP rankings.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-toolbar">
                    <div class="metric-toggle-pills">
                        <button class="metric-tab-btn active" data-metric="impressions">
                            <i class="fa-solid fa-eye"></i> Search Impressions (GSC)
                        </button>
                        <button class="metric-tab-btn" data-metric="clicks">
                            <i class="fa-solid fa-arrow-pointer"></i> Organic Clicks
                        </button>
                        <button class="metric-tab-btn" data-metric="position">
                            <i class="fa-solid fa-ranking-star"></i> Average Position
                        </button>
                    </div>
                    <div class="graph-badge-status">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Source: Official Google Search Console (Live CSV Data)</span>
                    </div>
                </div>

                <div class="chart-svg-container" id="chart-container">
                    <svg id="elevation-svg" viewBox="0 0 1000 360" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="orangeAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#ff5722" stop-opacity="0.45" />
                                <stop offset="85%" stop-color="#ff5722" stop-opacity="0.03" />
                                <stop offset="100%" stop-color="#080808" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                        <!-- Grid Lines -->
                        <g id="chart-grid"></g>
                        <!-- Area Fill -->
                        <path id="chart-area" class="chart-area-fill" d=""></path>
                        <!-- Stroke Line -->
                        <path id="chart-line" class="chart-path-line" d=""></path>
                        <!-- Data Nodes -->
                        <g id="chart-nodes"></g>
                    </svg>

                    <!-- Tooltip -->
                    <div class="chart-tooltip" id="chart-tooltip">
                        <div id="tooltip-date" style="font-weight: 700; color: #ff7043;"></div>
                        <div id="tooltip-value" style="font-size: 1.1rem; font-weight: 900;"></div>
                        <div id="tooltip-note" style="font-size: 0.75rem; color: #94a3b8;"></div>
                    </div>
                </div>

                <!-- Checkpoints Timeline -->
                <div class="checkpoints-header">
                    <i class="fa-solid fa-flag-checkered"></i> Strategic Execution Milestones
                </div>
                <div class="checkpoints-timeline">
                    <div class="checkpoint-card active" data-index="0">
                        <div>
                            <div class="cp-date">Aug 06, 2026</div>
                            <h4 class="cp-title">0 Impressions Baseline</h4>
                            <div class="cp-metric">Brand Launch & DNS Live</div>
                            <div class="cp-desc">Store launched from zero. Unindexed domain, no backlinks, zero search presence.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="11">
                        <div>
                            <div class="cp-date">Aug 17, 2026</div>
                            <h4 class="cp-title">First Indexation Leap</h4>
                            <div class="cp-metric">12 Clicks &bull; 70.6% CTR</div>
                            <div class="cp-desc">On-page technical metadata and sitemaps indexed by Google. High CTR on branded searches.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="25">
                        <div>
                            <div class="cp-date">Sep 01, 2026</div>
                            <h4 class="cp-title">E-E-A-T & Blog Push</h4>
                            <div class="cp-metric">56 Daily Impressions &bull; Pos 10.7</div>
                            <div class="cp-desc">In-depth filter coffee guide blogs deployed with FAQ Schema and AEO entity linking.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="41">
                        <div>
                            <div class="cp-date">Sep 17, 2026</div>
                            <h4 class="cp-title">Search Influx Peak</h4>
                            <div class="cp-metric">210 Daily Impressions &bull; Top 8 SERP</div>
                            <div class="cp-desc">Broad filter coffee terms rank on page 1. AI engines cite Nilaro as authentic South Indian roast.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ COFFEE JOURNEY: FROM ORIGIN TO CLIENT ═══════════════════════ -->
    <section class="case-section" id="journey-section">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-leaf"></i> TRANSPARENT TRACEABILITY</span>
                <h2 class="section-title">How Nilaro Reaches <span class="text-orange">Every Customer</span></h2>
                <p class="section-desc">
                    Rather than a generic product catalog, Fusion X designed a visual narrative tracing the coffee beans from handpicked plantation cherries straight to the consumer's morning cup.
                </p>
            </div>

            <div class="journey-step-grid">
                <div class="journey-step-card">
                    <div class="step-num-badge">1</div>
                    <h3 class="step-title">Handpicked Cherries</h3>
                    <p class="step-desc">
                        Sourced exclusively from high-altitude South Indian estates. Only deep red, perfectly ripe coffee cherries are hand-selected for processing.
                    </p>
                </div>
                <div class="journey-step-card">
                    <div class="step-num-badge">2</div>
                    <h3 class="step-title">Sun Drying & Curing</h3>
                    <p class="step-desc">
                        Slowly dried under natural sunlight on raised parchment beds, ensuring moisture balance and concentrating natural aromatic oils.
                    </p>
                </div>
                <div class="journey-step-card">
                    <div class="step-num-badge">3</div>
                    <h3 class="step-title">Artisan Roasting</h3>
                    <p class="step-desc">
                        Precision thermal profile roasts that unlock rich chocolate, nutty undertones with zero burnt bitterness or artificial additives.
                    </p>
                </div>
                <div class="journey-step-card">
                    <div class="step-num-badge">4</div>
                    <h3 class="step-title">Fresh Grind & Seal</h3>
                    <p class="step-desc">
                        Ground to the ideal traditional South Indian brass filter gauge and immediately nitrogen-flushed into aroma-locked zip-pouches.
                    </p>
                </div>
            </div>

            <!-- Interactive Roastery Mechanism Box -->
            <div class="roastery-interactive-box" id="roastery-section">
                <div class="roastery-visual-stage">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/artisan-roastery.png" alt="The Artisan Roastery Interactive Animation">
                    <div class="roastery-lever-trigger" id="interactive-lever" onclick="triggerGrindAnimation()">
                        <i class="fa-solid fa-gear fa-spin"></i> PUSH LEVER TO GRIND
                    </div>
                </div>
                <div class="roastery-details-side">
                    <span class="section-tag"><i class="fa-solid fa-gears"></i> INTERACTIVE WEB FEATURE</span>
                    <h3>The Artisan Roastery Interactive Machine</h3>
                    <p>
                        To captivate visitors, we engineered an interactive digital machine where customers can virtually pull a vintage roastery lever to watch coffee beans drop into rotating brass gears and grind fresh into Nilaro pouches.
                    </p>
                    <p>
                        This feature cut bounce rates significantly and drove average session duration up by <strong>140%</strong>, converting casual visitors into fascinated buyers.
                    </p>
                    <div class="roastery-gear-indicators">
                        <i class="fa-solid fa-circle-check"></i>
                        <span id="grind-status-text">Click lever above to trigger interactive bean grinding</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ WHAT WE DELIVERED ═══════════════════════ -->
    <section class="case-section" id="deliverables" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-cubes"></i> END-TO-END GROWTH ENGINE</span>
                <h2 class="section-title">What Fusion X Built For <span class="text-orange">Nilaro</span></h2>
                <p class="section-desc">
                    A comprehensive full-stack ecosystem uniting high-converting web design, organic generative AI discovery, creative production, and conversational sales automation.
                </p>
            </div>

            <div class="deliverables-grid">
                <!-- 1. Custom E-Commerce -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <h3 class="deliverable-title">Custom D2C E-Commerce</h3>
                    <p class="deliverable-desc">
                        Engineered a lightning-fast, mobile-first storefront featuring interactive pouch selectors (250g/500g), transparent tax pricing, one-click buy funnels, and origin storytelling.
                    </p>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Mobile UX</span>
                        <span class="d-tag">High-Speed CDN</span>
                        <span class="d-tag">One-Click Checkout</span>
                    </div>
                </div>

                <!-- 2. On-Page & Off-Page SEO -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box">
                        <i class="fa-solid fa-magnifying-glass-chart"></i>
                    </div>
                    <h3 class="deliverable-title">Advanced SEO Architecture</h3>
                    <p class="deliverable-desc">
                        Targeted high-intent search terms including "100% pure filter coffee powder", "authentic South Indian coffee blend", and optimized schema markup to outrank legacy competitors.
                    </p>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Keyword Research</span>
                        <span class="d-tag">Product Schema</span>
                        <span class="d-tag">Sitemap Indexing</span>
                    </div>
                </div>

                <!-- 3. AEO, GEO & FAQ Schema -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box">
                        <i class="fa-solid fa-brain"></i>
                    </div>
                    <h3 class="deliverable-title">AEO & GEO AI Engine</h3>
                    <p class="deliverable-desc">
                        Crafted E-E-A-T rich blogs and JSON-LD FAQ schema so LLM search engines (Google Gemini, ChatGPT, Perplexity) directly cite Nilaro when users ask for authentic filter coffee recommendations.
                    </p>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Gemini Optimization</span>
                        <span class="d-tag">ChatGPT Citations</span>
                        <span class="d-tag">FAQ Schema</span>
                    </div>
                </div>

                <!-- 4. Content Creation & Video -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box">
                        <i class="fa-solid fa-video"></i>
                    </div>
                    <h3 class="deliverable-title">Creative Video Production</h3>
                    <p class="deliverable-desc">
                        Wrote engaging scripts, directed product shoots, edited high-retention Reels & Shorts, and optimized video SEO across Instagram, YouTube, and Facebook to build organic brand affinity.
                    </p>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Scriptwriting</span>
                        <span class="d-tag">4K Product Video</span>
                        <span class="d-tag">Reels / Shorts</span>
                    </div>
                </div>

                <!-- 5. AI WhatsApp Bot -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h3 class="deliverable-title">WhatsApp AI Concierge</h3>
                    <p class="deliverable-desc">
                        Built a custom conversational chatbot directly into the storefront that guides shoppers to their ideal coffee strength, answers brewing questions, and offers instant WhatsApp support.
                    </p>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Coffee Quiz Bot</span>
                        <span class="d-tag">Order Assistance</span>
                        <span class="d-tag">Zero Wait Time</span>
                    </div>
                </div>

                <!-- 6. Meta Ads & Strategy -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 class="deliverable-title">Meta Ads & Brand Moat</h3>
                    <p class="deliverable-desc">
                        Executed competitive analysis against legacy coffee brands and deployed hyper-targeted Meta ad campaigns focusing on purity, freshness, and South Indian coffee heritage.
                    </p>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Competitor Audit</span>
                        <span class="d-tag">ROAS Optimization</span>
                        <span class="d-tag">Retargeting</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ PROMINENT PRODUCT STOREFRONT & AI CHATBOT SUITE ═══════════════════════ -->
    <section class="case-section" id="product-showcase">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-bag-shopping"></i> D2C STOREFRONT & CHATBOT</span>
                <h2 class="section-title">Verified Product Page & <span class="text-orange">AI Concierge Suite</span></h2>
                <p class="section-desc">
                    Showcasing the high-converting Nilaro Pure Coffee product page and live conversational WhatsApp AI assistant designed to guide customers to their perfect brew.
                </p>
            </div>

            <div class="product-suite-grid">
                <!-- Verified Product Page Visual Proof -->
                <div class="product-visual-card" onclick="openLightbox('brands/nilaro/product-chatbot.png')">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/product-chatbot.png" alt="Nilaro Pure Coffee Product Page with AI WhatsApp Chatbot">
                    <div class="product-visual-badge">
                        <i class="fa-solid fa-circle-check" style="color: #10b981;"></i> Official Storefront Screenshot
                    </div>
                </div>

                <!-- Interactive Chatbot Simulation Window -->
                <div class="chatbot-mockup-window">
                    <div class="chat-window-header">
                        <div class="chat-header-profile">
                            <div class="chat-avatar"><i class="fa-solid fa-mug-hot"></i></div>
                            <div class="chat-name-wrap">
                                <h5>Nilaro AI Support</h5>
                                <span><i class="fa-solid fa-circle" style="font-size: 7px;"></i> Typically replies instantly</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-xmark" style="color: #64748b; cursor: pointer;"></i>
                    </div>

                    <div class="chat-body-dialog" id="chat-conversation">
                        <div class="chat-bubble bot">
                            👋 Hi there! Welcome to Nilaro Coffee. How can I help you savor the perfect cup today?
                            <div class="chat-action-pills">
                                <button class="chat-pill-btn" onclick="sendChatReply('Find My Perfect Coffee')">
                                    <i class="fa-solid fa-mug-saucer"></i> Find My Perfect Coffee
                                </button>
                                <button class="chat-pill-btn" onclick="sendChatReply('What makes Nilaro unique?')">
                                    <i class="fa-solid fa-sparkles"></i> What makes Nilaro unique?
                                </button>
                                <button class="chat-pill-btn" onclick="sendChatReply('Contact WhatsApp Team')">
                                    <i class="fa-brands fa-whatsapp"></i> Contact WhatsApp Team
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="chat-input-bar">
                        <input type="text" id="chat-user-input" placeholder="Ask about Nilaro coffee..." onkeypress="handleChatEnter(event)">
                        <button class="chat-send-btn" onclick="handleChatSend()"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ VIDEO PRODUCTION & SOCIAL ENGINE ═══════════════════════ -->
    <section class="case-section" id="social-channels" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-clapperboard"></i> MULTI-CHANNEL DISTRIBUTION</span>
                <h2 class="section-title">Content Creation & <span class="text-orange">Social Channels</span></h2>
                <p class="section-desc">
                    Fusion X scripts, shoots, edits, and manages social media growth across Instagram, YouTube, and Facebook, crafting sensory visual stories that celebrate authentic coffee rituals.
                </p>
            </div>

            <div class="video-production-grid">
                <div class="video-production-left">
                    <span class="section-tag"><i class="fa-solid fa-camera"></i> PRODUCTION PIPELINE</span>
                    <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.85rem; font-weight: 800; color: #ffffff; margin: 12px 0 16px;">
                        Scripted, Shot, Edited & Optimized by Fusion X
                    </h3>
                    <p style="font-size: 0.98rem; color: #cbd5e1; line-height: 1.65; margin-bottom: 24px;">
                        From brewing aesthetics in traditional brass davarah-tumblers to unboxing 100% pure coffee pouches, we produce short-form video assets engineered for maximum watch-time, viral reach, and high purchase intent.
                    </p>

                    <div class="video-features-list">
                        <div class="video-feature-item">
                            <div class="video-feature-icon"><i class="fa-solid fa-pen-nib"></i></div>
                            <div class="video-feature-text">
                                <h4>Viral Hook Scriptwriting</h4>
                                <p>Story arcs highlighting the aroma difference between adulterated chicory mixes and 100% pure filter coffee.</p>
                            </div>
                        </div>
                        <div class="video-feature-item">
                            <div class="video-feature-icon"><i class="fa-solid fa-sliders"></i></div>
                            <div class="video-feature-text">
                                <h4>Color Grading & Sensory Editing</h4>
                                <p>Rich golden and warm coffee tones calibrated to create immediate craving and appetite appeal.</p>
                            </div>
                        </div>
                        <div class="video-feature-item">
                            <div class="video-feature-icon"><i class="fa-solid fa-hashtag"></i></div>
                            <div class="video-feature-text">
                                <h4>Social & Video SEO</h4>
                                <p>Optimized descriptions, metadata, and sound trends to maximize discoverability across Instagram & YouTube algorithms.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="video-production-right">
                    <div class="social-channel-cards">
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/nilarocoffee?igsh=MXVrYzZyYmRwYXR1OA%3D%3D" target="_blank" rel="noopener noreferrer" class="social-card">
                            <div class="social-card-left">
                                <div class="social-icon-wrapper instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                                <div class="social-meta">
                                    <h4>@nilarocoffee</h4>
                                    <span>Instagram &bull; Daily Reels & Coffee Stories</span>
                                </div>
                            </div>
                            <div class="social-visit-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>

                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@Nilarocoffee" target="_blank" rel="noopener noreferrer" class="social-card">
                            <div class="social-card-left">
                                <div class="social-icon-wrapper youtube">
                                    <i class="fa-brands fa-youtube"></i>
                                </div>
                                <div class="social-meta">
                                    <h4>@Nilarocoffee</h4>
                                    <span>YouTube &bull; Brewing Tutorials & Shorts</span>
                                </div>
                            </div>
                            <div class="social-visit-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/people/Nilaro-Coffee/pfbid025qkjWu5jygqXSe37GNPZVDGwqymwuTxjf7h8ZXoSwNvvCTYJBZmqYuvSuBp5EPusl/" target="_blank" rel="noopener noreferrer" class="social-card">
                            <div class="social-card-left">
                                <div class="social-icon-wrapper facebook">
                                    <i class="fa-brands fa-facebook"></i>
                                </div>
                                <div class="social-meta">
                                    <h4>Nilaro Coffee</h4>
                                    <span>Facebook &bull; Community & Meta Ad Funnels</span>
                                </div>
                            </div>
                            <div class="social-visit-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ VISUAL PROOF & GALLERY SHOWCASE ═══════════════════════ -->
    <section class="case-section" id="visual-proof">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-images"></i> VISUAL ARTIFACTS</span>
                <h2 class="section-title">Verified Visual <span class="text-orange">Proof & Assets</span></h2>
                <p class="section-desc">
                    Explore the complete suite of visual assets, storefront designs, coffee journey maps, interactive machines, and product chat bots built for Nilaro.
                </p>
            </div>

            <div class="gallery-container">
                <div class="gallery-tabs-nav">
                    <button class="gallery-tab-btn active" data-target="view-banner">
                        <i class="fa-solid fa-desktop"></i> Storefront Hero
                    </button>
                    <button class="gallery-tab-btn" data-target="view-journey">
                        <i class="fa-solid fa-route"></i> Coffee Journey
                    </button>
                    <button class="gallery-tab-btn" data-target="view-roastery">
                        <i class="fa-solid fa-gears"></i> Artisan Roastery
                    </button>
                    <button class="gallery-tab-btn" data-target="view-chatbot">
                        <i class="fa-brands fa-whatsapp"></i> Product & AI Chatbot
                    </button>
                    <button class="gallery-tab-btn" data-target="view-logo">
                        <i class="fa-solid fa-fingerprint"></i> Brand Identity
                    </button>
                </div>

                <!-- Tab 1: Storefront Hero -->
                <div class="gallery-view active" id="view-banner">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/nilaro/home-banner.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/home-banner.png" alt="Nilaro Storefront Hero Banner">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>Artisan Coffee D2C Storefront</h4>
                            <p>Featuring the "More Than Just Coffee &mdash; It's A Feeling" hero banner, 100% Pure Coffee pouch highlights, and direct shop CTAs.</p>
                        </div>
                        <a href="https://nilaro.in/" target="_blank" rel="noopener noreferrer" class="btn-orange" style="font-size: 0.82rem; padding: 10px 20px;">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Visit Storefront
                        </a>
                    </div>
                </div>

                <!-- Tab 2: Coffee Journey -->
                <div class="gallery-view" id="view-journey">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/nilaro/coffee-journey.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/coffee-journey.png" alt="How Nilaro Reach You Journey">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>"How Nilaro Reach You" Sourcing Journey</h4>
                            <p>Handpicked premium coffee cherries, plantation heritage, and sun drying process detailed with rich interactive path design.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Artisan Roastery -->
                <div class="gallery-view" id="view-roastery">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/nilaro/artisan-roastery.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/artisan-roastery.png" alt="The Artisan Roastery Interactive Machine">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>Interactive Roastery Gear & Grinder Mechanism</h4>
                            <p>Custom mechanical gear animation allowing prospective customers to virtually grind their fresh filter coffee powder.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 4: Product & AI Chatbot -->
                <div class="gallery-view" id="view-chatbot">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/nilaro/product-chatbot.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/product-chatbot.png" alt="Product Page with AI WhatsApp Chatbot">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>Product Purchase Suite & WhatsApp AI Concierge</h4>
                            <p>Nilaro Pure Coffee (Rs. 349.00), pouch size toggles (250g/500g), and live AI support assistant resolving customer inquiries.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 5: Brand Identity -->
                <div class="gallery-view" id="view-logo">
                    <div class="gallery-img-wrap" style="background: #141414; padding: 40px;" onclick="openLightbox('brands/nilaro/logo.webp')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Official Brand Identity" style="max-height: 220px;">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>Official Nilaro Brand Identity</h4>
                            <p>"Rise With Every Sip" &mdash; handcrafted typography, luxury golden gradient, and coffee cup motif.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client Info & Action Banner -->
            <div class="client-info-banner">
                <div class="client-info-left">
                    <span class="section-tag"><i class="fa-solid fa-mug-hot"></i> AUTHENTIC FILTER COFFEE</span>
                    <h3>Partner with India's Premier Coffee Brand</h3>
                    <p>
                        Nilaro proves that traditional culinary craft paired with modern digital engineering can create an unstoppable D2C growth engine.
                    </p>
                    <div class="client-meta-list">
                        <div class="meta-row">
                            <i class="fa-solid fa-user"></i>
                            <span><strong>Founder:</strong> Mr. Nilakshan</span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-solid fa-globe"></i>
                            <span><strong>Website:</strong> <a href="https://nilaro.in/" target="_blank" rel="noopener noreferrer" style="color: var(--brand-orange-light); text-decoration: none;">https://nilaro.in/</a></span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-solid fa-tags"></i>
                            <span><strong>Primary Products:</strong> 100% Pure Filter Coffee, Premium Estate Beans, Decoction Blends</span>
                        </div>
                    </div>
                </div>
                <div class="client-action-buttons">
                    <a href="https://nilaro.in/" target="_blank" rel="noopener noreferrer" class="btn-orange" style="justify-content: center;">
                        <i class="fa-solid fa-bag-shopping"></i> Visit Nilaro Online Store
                    </a>
                    <a href="https://www.instagram.com/nilarocoffee?igsh=MXVrYzZyYmRwYXR1OA%3D%3D" target="_blank" rel="noopener noreferrer" class="btn-outline" style="justify-content: center;">
                        <i class="fa-brands fa-instagram"></i> Follow on Instagram
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-outline" style="justify-content: center;">
                        <i class="fa-solid fa-comments"></i> Scale Your Brand With Fusion X
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
