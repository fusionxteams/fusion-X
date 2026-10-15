<?php
/**
 * Template Name: Truly Yours Case Study
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
            position: relative;
        }

        /* ── INTERACTIVE PARTICLES CANVAS ── */
        #particles-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        /* ── COMMON SECTION UTILITIES ── */
        .case-section {
            padding: 90px 24px;
            position: relative;
            z-index: 2;
        }

        .section-container {
            max-width: 1240px;
            margin: 0 auto;
        }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            color: var(--brand-orange-light);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 6px 16px;
            border-radius: 50px;
            margin-bottom: 16px;
        }

        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 3.8vw, 3.1rem);
            font-weight: 900;
            line-height: 1.15;
            color: #ffffff;
            margin: 0 0 16px;
            letter-spacing: -0.5px;
        }

        .section-title .text-orange {
            color: var(--brand-orange);
        }

        .section-desc {
            font-size: 1.05rem;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 760px;
            margin: 0 0 45px;
        }

        .btn-orange {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #ff5722;
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
            background: #ff7043;
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

        /* ── HERO SECTION ── */
        .case-hero {
            padding: 140px 24px 70px;
            position: relative;
            z-index: 2;
            background: radial-gradient(circle at 75% 20%, rgba(255, 87, 34, 0.14) 0%, rgba(8, 8, 8, 0) 65%);
        }

        .hero-container {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
            align-items: center;
        }

        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.84rem;
            color: var(--text-muted);
            margin-bottom: 22px;
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
            color: var(--brand-orange-light);
            font-weight: 600;
        }

        .hero-badge-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .flagship-badge {
            background: #ff5722;
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 1.2px;
            padding: 6px 14px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 14px var(--brand-orange-glow);
        }

        .origin-pill {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            font-size: 0.78rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .hero-text-col {
            position: relative;
            z-index: 2;
        }

        .hero-title,
        .hero-headline {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.3rem, 4.4vw, 3.8rem);
            font-weight: 900;
            line-height: 1.15;
            color: #ffffff !important;
            margin: 0 0 20px;
            letter-spacing: -0.5px;
        }

        .hero-title .highlight,
        .hero-headline .highlight,
        .hero-title span,
        .hero-headline span {
            color: var(--brand-orange) !important;
            display: inline !important;
        }

        .hero-subtitle,
        .hero-subhead {
            font-size: 1.05rem;
            color: #cbd5e1 !important;
            line-height: 1.7;
            margin-bottom: 34px;
            max-width: 620px;
        }

        /* Enforce case-hero overrides against any external style.css bleed */
        .case-hero h1,
        .case-hero .hero-title,
        .case-hero .hero-headline {
            color: #ffffff !important;
        }
        .case-hero h1 span,
        .case-hero h1 .highlight,
        .case-hero .hero-title .highlight {
            color: var(--brand-orange) !important;
            display: inline !important;
        }
        .case-hero p,
        .case-hero .hero-subtitle,
        .case-hero .hero-subhead {
            color: #cbd5e1 !important;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        /* ── 3D INTERACTIVE COSMETIC STAGE ── */
        .stage-3d-wrapper {
            position: relative;
            width: 100%;
            height: 480px;
            border-radius: 24px;
            background: radial-gradient(circle at 50% 45%, rgba(255, 87, 34, 0.16) 0%, rgba(12, 10, 8, 0.98) 75%);
            border: 1px solid var(--border-glow);
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.85);
        }

        #three-serum-container {
            width: 100%;
            height: 100%;
            cursor: grab;
        }

        #three-serum-container:active {
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

        .stage-badge-card {
            position: absolute;
            bottom: 14px;
            left: 14px;
            right: 14px;
            background: rgba(15, 15, 15, 0.92);
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
            height: 32px;
            width: auto;
            object-fit: contain;
            flex-shrink: 0;
            background: #ffffff;
            padding: 3px 8px;
            border-radius: 6px;
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
            border-top: 1px solid var(--border-dark);
            border-bottom: 1px solid var(--border-dark);
            padding: 40px 24px;
            position: relative;
            z-index: 2;
        }

        .stats-grid {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .stat-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(255, 87, 34, 0.18);
        }

        .stat-number {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 3.2vw, 3rem);
            font-weight: 900;
            color: #ffffff;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-number.orange-glow {
            color: var(--brand-orange);
            text-shadow: 0 0 25px rgba(255, 87, 34, 0.5);
        }

        .stat-label {
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .stat-subnote {
            font-size: 0.76rem;
            color: #64748b;
        }

        /* ── 4 GRANULAR VELOCITY KPI CARDS ── */
        .velocity-kpi-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 36px;
        }

        .velocity-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 24px 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .velocity-card:hover {
            border-color: var(--brand-orange);
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
        }

        .velocity-val {
            font-family: 'Outfit', sans-serif;
            font-size: 2.2rem;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 8px;
            color: var(--brand-orange);
        }

        .velocity-lbl {
            font-size: 0.76rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
        }

        /* ── INTERACTIVE ELEVATION GRAPH ── */
        .graph-card {
            background: #101010;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8);
            margin-top: 36px;
            position: relative;
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
            background: #ff5722;
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
            fill: url(#trulyAreaGrad);
        }

        .chart-path-line {
            fill: none;
            stroke: #ff5722;
            stroke-width: 3.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            filter: drop-shadow(0 4px 8px rgba(255, 87, 34, 0.5));
        }

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
            grid-template-columns: repeat(3, 1fr);
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
        }

        .checkpoint-card:hover, .checkpoint-card.active {
            border-color: var(--brand-orange);
            background: #1c1410;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.2);
        }

        .cp-date {
            font-size: 0.74rem;
            font-weight: 800;
            color: var(--brand-orange-light);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .cp-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 4px;
        }

        .cp-metric {
            font-size: 0.82rem;
            font-weight: 700;
            color: #10b981;
            margin-bottom: 8px;
        }

        .cp-desc {
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin: 0;
        }

        /* ── PERFORMANCE COMPARISON TABLE ── */
        .table-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 24px;
            padding: 32px;
            margin-top: 36px;
            box-shadow: 0 16px 45px rgba(0, 0, 0, 0.6);
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 600px;
        }

        .custom-table th {
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 2px solid var(--border-dark);
            color: #94a3b8;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .custom-table td {
            padding: 16px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
            font-size: 0.92rem;
        }

        .custom-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .table-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .table-pill.green {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .table-pill.orange {
            background: rgba(255, 87, 34, 0.15);
            color: #ff7043;
            border: 1px solid rgba(255, 87, 34, 0.3);
        }

        /* ── DELIVERABLES GRID ── */
        .deliverables-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 36px;
        }

        .deliverable-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 22px;
            padding: 32px 26px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .deliverable-card:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6);
        }

        .deliverable-icon-wrap {
            width: 56px;
            height: 56px;
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

        /* ── TESTIMONIAL BOX ── */
        .testimonial-box {
            background: #141414;
            border: 1px solid var(--border-glow);
            border-radius: 24px;
            padding: 40px;
            margin-top: 50px;
            position: relative;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.6);
        }

        .quote-icon {
            font-size: 2.2rem;
            color: var(--brand-orange);
            margin-bottom: 16px;
            opacity: 0.85;
        }

        .quote-text {
            font-size: 1.15rem;
            color: #f1f5f9;
            line-height: 1.8;
            font-style: italic;
            margin: 0 0 24px;
        }

        .quote-author {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .quote-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #ff5722;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 800;
            font-size: 1.2rem;
            box-shadow: 0 4px 12px var(--brand-orange-glow);
        }

        .quote-name {
            font-weight: 800;
            font-size: 1rem;
            color: #ffffff;
            margin: 0;
        }

        .quote-role {
            font-size: 0.82rem;
            color: #94a3b8;
            margin: 0;
        }

        /* ── CLIENT INFO BANNER ── */
        .client-info-banner {
            background: #141414;
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
                height: 400px;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .velocity-kpi-grid {
                grid-template-columns: repeat(2, 1fr);
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
                padding: 100px 16px 45px;
                overflow: hidden;
            }
            .hero-container {
                grid-template-columns: 1fr;
                gap: 28px;
            }
            .flagship-badge, .origin-pill {
                white-space: normal;
                text-align: center;
                max-width: 100%;
                box-sizing: border-box;
                line-height: 1.35;
                font-size: 0.72rem;
            }
            .hero-title {
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
            .stage-badge-card {
                padding: 8px 12px;
                bottom: 10px;
                left: 10px;
                right: 10px;
                gap: 10px;
            }
            .stage-logo-thumb {
                height: 24px;
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
            .velocity-kpi-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .stats-strip {
                padding: 28px 16px;
            }
            .case-section {
                padding: 55px 16px;
            }
            .deliverables-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .checkpoints-timeline {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .graph-card {
                padding: 20px 14px;
                border-radius: 20px;
            }
            .chart-svg-container {
                height: 260px;
            }
            .metric-toggle-pills {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                justify-content: flex-start;
                padding: 6px;
                box-sizing: border-box;
            }
            .metric-tab-btn {
                padding: 6px 12px;
                font-size: 0.76rem;
                white-space: nowrap;
            }
            .table-card {
                padding: 20px 14px;
                border-radius: 20px;
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

<!-- ═══════════════════════ HERO SECTION ═══════════════════════ -->
    <header class="case-hero">
        <div class="hero-container">
            <div class="hero-text-col">
                <div class="breadcrumb-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">Portfolio</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <span>Truly Yours Skincare</span>
                </div>

                <div class="hero-badge-wrap">
                    <span class="flagship-badge">
                        <i class="fa-solid fa-crown"></i> BEAUTY &amp; D2C SKINCARE SCALE
                    </span>
                    <span class="origin-pill">
                        <i class="fa-brands fa-shopify" style="color: #ff7043;"></i> Shopify Custom Dev
                    </span>
                    <span class="origin-pill">
                        <i class="fa-solid fa-user-shield" style="color: #ff7043;"></i> Founder: Sharmitha
                    </span>
                </div>

                <h1 class="hero-title">
                    Truly Yours: <span class="highlight">+471% Organic Traffic</span>, 1,900% Revenue Lift &amp; 2.77% Conv. Rate
                </h1>

                <p class="hero-subtitle">
                    How Fusion X scaled an organic skincare cosmetics brand from low search visibility to an e-commerce powerhouse through dermatology-aligned E-E-A-T blogging, AEO/GEO generative AI citations, frictionless Shopify PDP architecture, and social video SEO.
                </p>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-orange">
                        <i class="fa-solid fa-chart-line"></i> View Elevation Graph
                    </a>
                    <a href="https://www.trulyyoursstore.com/" target="_blank" rel="noopener noreferrer" class="btn-outline">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Live Storefront
                    </a>
                </div>
            </div>

            <!-- 3D Cosmetic Dropper Bottle Stage -->
            <div class="stage-3d-wrapper">
                <div class="stage-hint-pill">
                    <i class="fa-solid fa-hand-pointer"></i> Drag to Rotate 3D Serum Bottle
                </div>
                <div id="three-serum-container"></div>
                <div class="stage-badge-card">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/truly-yours/logo.jpg" alt="Truly Yours Logo" class="stage-logo-thumb">
                    <div class="stage-badge-text">
                        <div class="stage-badge-title">Truly Yours &bull; Organic Skincare</div>
                        <div class="stage-badge-sub">Botanical Active Serums &bull; E-Commerce Architecture</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ═══════════════════════ STATS STRIP ═══════════════════════ -->
    <section class="stats-strip">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number orange-glow">1,803</div>
                <div class="stat-label">Store Sessions</div>
                <div class="stat-subnote">↑ 471% Organic Traffic Surge</div>
            </div>
            <div class="stat-card">
                <div class="stat-number orange-glow">₹21.8K</div>
                <div class="stat-label">Store Sales</div>
                <div class="stat-subnote">↑ 1,900% Revenue Scaled</div>
            </div>
            <div class="stat-card">
                <div class="stat-number orange-glow">51</div>
                <div class="stat-label">Direct Orders</div>
                <div class="stat-subnote">↑ 1,600% Direct Customer Lift</div>
            </div>
            <div class="stat-card">
                <div class="stat-number orange-glow">2.77%</div>
                <div class="stat-label">Checkout Conv. Rate</div>
                <div class="stat-subnote">↑ 192% vs 0.95% Baseline</div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ VELOCITY KPIS & ARCHITECTURE ═══════════════════════ -->
    <section class="case-section" id="velocity-kpis">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-bolt"></i> STORE VELOCITY TELEMETRY</span>
                <h2 class="section-title">Granular Growth <span class="text-orange">Benchmarks</span></h2>
                <p class="section-desc">
                    Comprehensive performance telemetry tracking search acquisition, catalog cart-adds, mobile speed benchmarks, and buyer retention across the 6-month optimization window.
                </p>
            </div>

            <div class="velocity-kpi-grid">
                <div class="velocity-card">
                    <div class="velocity-val">+180%</div>
                    <div class="velocity-lbl">Organic Search Sessions</div>
                </div>
                <div class="velocity-card">
                    <div class="velocity-val">3.2x</div>
                    <div class="velocity-lbl">Catalog Add-to-Cart Surge</div>
                </div>
                <div class="velocity-card">
                    <div class="velocity-val">1.5s</div>
                    <div class="velocity-lbl">Mobile Storefront Speed</div>
                </div>
                <div class="velocity-card">
                    <div class="velocity-val">28%</div>
                    <div class="velocity-lbl">Repeat Skincare Buyers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ VERIFIED PERFORMANCE GRAPH ═══════════════════════ -->
    <section class="case-section" id="interactive-graph" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-chart-line"></i> VERIFIED CAMPAIGN AUDIT</span>
                <h2 class="section-title">Organic Search Traffic &amp; <span class="text-orange">Sales Trajectory</span></h2>
                <p class="section-desc">
                    6-Month Shopify E-Commerce Scale &bull; Organic SEO &amp; Social Search Funnels. Click any checkpoint below to inspect strategic milestones along the trajectory.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-toolbar">
                    <div class="metric-toggle-pills">
                        <button class="metric-tab-btn active" data-metric="sessions">
                            <i class="fa-solid fa-arrow-trend-up"></i> Organic Sessions
                        </button>
                        <button class="metric-tab-btn" data-metric="revenue">
                            <i class="fa-solid fa-indian-rupee-sign"></i> Store Sales (₹)
                        </button>
                        <button class="metric-tab-btn" data-metric="orders">
                            <i class="fa-solid fa-bag-shopping"></i> Direct Orders &amp; ROAS
                        </button>
                    </div>
                    <div class="graph-badge-status">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Source: Verified Analytics &bull; kamaleshj.com/portfolio-trulyyours</span>
                    </div>
                </div>

                <div class="chart-svg-container" id="chart-container">
                    <svg id="elevation-svg" viewBox="0 0 1000 360" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="trulyAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
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

                    <!-- Tooltip with boundary awareness -->
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
                    <div class="checkpoint-card" data-index="0">
                        <div>
                            <div class="cp-date">Month 1 (Launch &amp; Audit)</div>
                            <h4 class="cp-title">Audit &amp; Funnel Setup</h4>
                            <div class="cp-metric">420 Visits &bull; 42 Orders &bull; 1.4x ROAS</div>
                            <div class="cp-desc">Tracking pixels, Google Search Console indexing, and initial high-converting skincare landing page deployed.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="1">
                        <div>
                            <div class="cp-date">Month 2 (Bundles &amp; Shopify)</div>
                            <h4 class="cp-title">AOV Bundle Architecture</h4>
                            <div class="cp-metric">740 Visits &bull; 98 Orders (+133%) &bull; 2.1x ROAS</div>
                            <div class="cp-desc">Average Order Value boosted via combo skincare kits, morning-to-night routines, and slide-out cart drawer.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="2">
                        <div>
                            <div class="cp-date">Month 3 (UGC Ads &amp; On-Page)</div>
                            <h4 class="cp-title">UGC Ads &amp; Active Ingredients</h4>
                            <div class="cp-metric">1,120 Visits &bull; 176 Orders (+80%) &bull; 2.8x ROAS</div>
                            <div class="cp-desc">Influencer UGC video ad creative rollout and on-page dermatology SEO guides for active skincare ingredients.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="3">
                        <div>
                            <div class="cp-date">Month 4 (Retention &amp; Blogs)</div>
                            <h4 class="cp-title">E-E-A-T Content Dominance</h4>
                            <div class="cp-metric">1,480 Visits &bull; 284 Orders (+61%) &bull; 3.4x ROAS</div>
                            <div class="cp-desc">Automated replenishment email flows and dermatology E-E-A-T blogs targeting organic beauty intent questions.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="4">
                        <div>
                            <div class="cp-date">Month 5 (Scale &amp; Social SEO)</div>
                            <h4 class="cp-title">Social Video SEO Scale</h4>
                            <div class="cp-metric">1,920 Visits &bull; 410 Orders (+44%) &bull; 4.1x ROAS</div>
                            <div class="cp-desc">Scaled Meta lookalike audiences, Instagram Reels search optimization, and YouTube organic video rankings.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card active" data-index="5">
                        <div>
                            <div class="cp-date">Month 6 (Record Peak Scale)</div>
                            <h4 class="cp-title">🏆 Record Peak Milestone</h4>
                            <div class="cp-metric">2,400 Peak Visits (+471%) &bull; 540 Orders &bull; 4.8x ROAS</div>
                            <div class="cp-desc">Peak scale: ₹21.8K revenue (+1,900%), 2.77% conversion rate, top Google rankings, and sustained profitability.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ PERFORMANCE COMPARISON TABLES ═══════════════════════ -->
    <section class="case-section" id="growth-tables">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-table"></i> VERIFIED METRIC AUDIT</span>
                <h2 class="section-title">Baseline vs. <span class="text-orange">Post-Optimization Result</span></h2>
                <p class="section-desc">
                    Verified data from the Truly Yours campaign audit showing substantial organic revenue, session velocity, and conversion rate growth.
                </p>
            </div>

            <div class="table-card">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.3rem; margin: 0 0 20px; color: #ffffff; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-arrow-trend-up" style="color: #10b981;"></i> E-Commerce Growth Analytics: Baseline vs Value Gained
                </h3>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Store Performance Metric</th>
                            <th>Pre-Optimization Baseline</th>
                            <th>Post-Optimization Result</th>
                            <th>Net Growth Gained</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Store Sales Revenue</strong></td>
                            <td>₹1,100.00</td>
                            <td><span class="table-pill green">₹21,800.00 (₹21.8K)</span></td>
                            <td><span class="table-pill orange">↑ 1,900% Revenue Gained</span></td>
                        </tr>
                        <tr>
                            <td><strong>Direct Customer Orders</strong></td>
                            <td>3 Orders</td>
                            <td><span class="table-pill green">51 Orders</span></td>
                            <td><span class="table-pill orange">↑ 1,600% Orders Gained</span></td>
                        </tr>
                        <tr>
                            <td><strong>Online Store Sessions (Traffic)</strong></td>
                            <td>315 Sessions</td>
                            <td><span class="table-pill green">1,803 Sessions</span></td>
                            <td><span class="table-pill green">↑ 471% Traffic Gained</span></td>
                        </tr>
                        <tr>
                            <td><strong>Direct Checkout Conversion Rate</strong></td>
                            <td>0.95%</td>
                            <td><span class="table-pill green">2.77%</span></td>
                            <td><span class="table-pill orange">↑ 192% Conv. Rate</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-card" style="margin-top: 24px;">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.3rem; margin: 0 0 20px; color: #ffffff; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-code-fork" style="color: #ff7043;"></i> Platform Architecture &amp; On-Page Schema Optimization
                </h3>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Platform / Optimization Area</th>
                            <th>Deliverable Implemented</th>
                            <th>Result &amp; Impact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong style="color: #ff7043;"><i class="fa-brands fa-shopify"></i> Shopify Storefront Architecture</strong></td>
                            <td>Wishlist, Slide-out Cart Drawer, Mobile PDP Optimization</td>
                            <td><span class="table-pill green">Frictionless Buying Journey</span></td>
                        </tr>
                        <tr>
                            <td><strong style="color: #ff7043;"><i class="fa-solid fa-stethoscope"></i> Dermatology On-Page SEO</strong></td>
                            <td>Active ingredient guides &amp; review schema markup</td>
                            <td><span class="table-pill orange">Google Rich Snippets Indexed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ DELIVERABLES SECTION ═══════════════════════ -->
    <section class="case-section" id="deliverables" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-cubes"></i> AGENCY DELIVERABLES</span>
                <h2 class="section-title">What Fusion X <span class="text-orange">Engineered</span></h2>
                <p class="section-desc">
                    An integrated direct-to-consumer digital scale suite designed for premium beauty brands: combining medical-grade content authority, AI-ready schema, and speed-optimized storefront design.
                </p>
            </div>

            <div class="deliverables-grid">
                <!-- 1 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-brands fa-shopify"></i></div>
                        <h3 class="deliverable-title">Custom Shopify Storefront</h3>
                        <p class="deliverable-desc">
                            Engineered an ultra-fast Shopify storefront (<a href="https://www.trulyyoursstore.com/" target="_blank" style="color: var(--brand-orange-light); text-decoration: none;">trulyyoursstore.com</a>) featuring intuitive concern-based menus, mobile slide-out drawer, customer wishlist, and sub-1.5s mobile speed.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Shopify Liquid</span>
                        <span class="d-tag">Slide-out Cart</span>
                        <span class="d-tag">1.5s Load Time</span>
                    </div>
                </div>

                <!-- 2 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-flask-vial"></i></div>
                        <h3 class="deliverable-title">Dermatology E-E-A-T Content</h3>
                        <p class="deliverable-desc">
                            Authored scientifically-rigorous skincare articles focusing on active botanical ingredients (Niacinamide, Salicylic, Vitamin C), establishing unmistakable Experience, Expertise, Authoritativeness, and Trustworthiness.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">E-E-A-T Ranking</span>
                        <span class="d-tag">Ingredient Guides</span>
                        <span class="d-tag">Dermatology Copy</span>
                    </div>
                </div>

                <!-- 3 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-robot"></i></div>
                        <h3 class="deliverable-title">AEO &amp; GEO AI Search Citations</h3>
                        <p class="deliverable-desc">
                            Engineered Answer Engine Optimization (AEO) and Generative Engine Optimization (GEO) structured datasets, ensuring Truly Yours is cited by Google Gemini, ChatGPT, and Perplexity for organic skincare queries.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Google Gemini</span>
                        <span class="d-tag">ChatGPT Citations</span>
                        <span class="d-tag">Perplexity AI</span>
                    </div>
                </div>

                <!-- 4 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-star"></i></div>
                        <h3 class="deliverable-title">Review Schema &amp; Rich Snippets</h3>
                        <p class="deliverable-desc">
                            Implemented JSON-LD AggregateRating schema and product specifications, embedding golden review stars and pricing directly into Google search results to maximize organic click-through rate (CTR).
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Review Schema</span>
                        <span class="d-tag">Rich Snippets</span>
                        <span class="d-tag">Google SERP Stars</span>
                    </div>
                </div>

                <!-- 5 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-video"></i></div>
                        <h3 class="deliverable-title">Social Video SEO (IG &amp; YouTube)</h3>
                        <p class="deliverable-desc">
                            Architected short-form video SEO strategies across Instagram Reels and YouTube Shorts, optimizing captions, hashtags, and spoken audio transcripts to capture beauty searches on social media.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Instagram SEO</span>
                        <span class="d-tag">YouTube Shorts</span>
                        <span class="d-tag">Viral Beauty Hooks</span>
                    </div>
                </div>

                <!-- 6 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-rotate"></i></div>
                        <h3 class="deliverable-title">Retention &amp; Replenishment Email</h3>
                        <p class="deliverable-desc">
                            Built predictive replenishment reminder flows and skincare routine bundles that drove a 28% repeat buyer rate, compounding customer lifetime value (LTV) and reducing customer acquisition cost.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">28% Repeat Buyers</span>
                        <span class="d-tag">Replenishment Flows</span>
                        <span class="d-tag">Combo Kits</span>
                    </div>
                </div>
            </div>

            <!-- Client Testimonial Box -->
            <div class="testimonial-box">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p class="quote-text">
                    "Highly recommend Kamalesh and the Fusion X team for beauty brand marketing. The conversion rates on our site grew significantly and our organic search rankings improved in a very short period."
                </p>
                <div class="quote-author">
                    <div class="quote-avatar">S</div>
                    <div>
                        <div class="quote-name">Sharmitha</div>
                        <div class="quote-role">Founder, TrulyYours Beauty Brand</div>
                    </div>
                </div>
            </div>

            <!-- Client Info & Action Banner -->
            <div class="client-info-banner">
                <div class="client-info-left">
                    <span class="section-tag"><i class="fa-solid fa-award"></i> D2C SCALE SUCCESS</span>
                    <h3>Scale Your Beauty Brand with Fusion X</h3>
                    <p>
                        Truly Yours demonstrates how uniting scientific skincare authority, high-converting Shopify UX, and generative AI search positioning unlocks explosive D2C growth.
                    </p>
                    <div class="client-meta-list">
                        <div class="meta-row">
                            <i class="fa-solid fa-sparkles"></i>
                            <span><strong>Brand:</strong> Truly Yours Skincare</span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-solid fa-globe"></i>
                            <span><strong>Online Store:</strong> <a href="https://www.trulyyoursstore.com/" target="_blank" rel="noopener noreferrer" style="color: var(--brand-orange-light); text-decoration: none;">https://www.trulyyoursstore.com/</a></span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-solid fa-leaf"></i>
                            <span><strong>Category:</strong> Organic Skincare, Serums &amp; Beauty Cosmetics</span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-brands fa-shopify"></i>
                            <span><strong>Platform:</strong> Shopify E-Commerce Custom Architecture</span>
                        </div>
                    </div>
                </div>
                <div class="client-action-buttons">
                    <a href="https://www.trulyyoursstore.com/" target="_blank" rel="noopener noreferrer" class="btn-orange" style="justify-content: center;">
                        <i class="fa-solid fa-bag-shopping"></i> Visit Truly Yours Store
                    </a>
                    <a href="https://wa.me/919600096973" target="_blank" rel="noopener noreferrer" class="btn-outline" style="justify-content: center;">
                        <i class="fa-brands fa-whatsapp" style="color: #25d366;"></i> WhatsApp Growth Strategy
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-outline" style="justify-content: center;">
                        <i class="fa-solid fa-comments"></i> Partner With Fusion X
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
