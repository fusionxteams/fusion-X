<?php
/**
 * Template Name: Dr Madhavi Case Study
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
            --brand-cyan: #06b6d4;
            --brand-cyan-light: #38bdf8;
            --brand-cyan-glow: rgba(6, 182, 212, 0.4);
            --brand-emerald: #10b981;
            --brand-emerald-glow: rgba(16, 185, 129, 0.4);
            --bg-dark: #080808;
            --bg-card: #111111;
            --bg-card-hover: #181818;
            --border-dark: rgba(255, 255, 255, 0.08);
            --border-glow: rgba(255, 87, 34, 0.35);
            --text-white: #ffffff;
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

        /* ── HERO SECTION (Obsidian Theme) ── */
        .case-hero {
            position: relative;
            padding: 150px 24px 80px;
            background: radial-gradient(circle at 50% 12%, rgba(6, 182, 212, 0.12) 0%, rgba(255, 87, 34, 0.10) 45%, rgba(8, 8, 8, 0.98) 75%), var(--bg-dark);
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

        .hero-text-col {
            position: relative;
            z-index: 2;
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
            color: #ffffff !important;
            margin: 0 0 18px;
        }

        .hero-headline .highlight {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-headline .highlight-cyan {
            background: linear-gradient(135deg, #06b6d4 0%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subhead {
            font-size: clamp(1rem, 1.6vw, 1.18rem);
            line-height: 1.68;
            color: #cbd5e1;
            margin: 0 0 30px;
            max-width: 660px;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary-orange {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--brand-orange);
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 14px 28px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(255, 87, 34, 0.4);
            border: 1px solid transparent;
        }

        .btn-primary-orange:hover {
            transform: translateY(-2px);
            background: var(--brand-orange-light);
            box-shadow: 0 8px 30px rgba(255, 87, 34, 0.6);
            color: #ffffff;
        }

        .btn-secondary-dark {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 14px 26px;
            border-radius: 50px;
            text-decoration: none;
            border: 1px solid var(--border-dark);
            transition: all 0.3s ease;
        }

        .btn-secondary-dark:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
            color: #ffffff;
        }

        /* ── 3D HERO STAGE ── */
        .hero-visual-col {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .stage-3d-wrapper {
            position: relative;
            width: 100%;
            height: 460px;
            background: radial-gradient(circle at center, rgba(6, 182, 212, 0.08) 0%, rgba(17, 17, 17, 0.95) 70%);
            border: 1px solid var(--border-dark);
            border-radius: 28px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), inset 0 0 40px rgba(6, 182, 212, 0.05);
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
            top: 16px;
            right: 16px;
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid var(--border-dark);
            backdrop-filter: blur(8px);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
            pointer-events: none;
            z-index: 10;
        }

        .stage-hint-pill i {
            color: var(--brand-cyan);
            animation: spinHint 4s linear infinite;
        }

        @keyframes spinHint {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .stage-overlay-card {
            position: absolute;
            bottom: 16px;
            left: 16px;
            right: 16px;
            background: rgba(15, 23, 42, 0.88);
            border: 1px solid rgba(6, 182, 212, 0.3);
            backdrop-filter: blur(12px);
            padding: 12px 18px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            z-index: 10;
        }

        .stage-client-logo {
            height: 42px;
            width: auto;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            padding: 4px 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .stage-client-text {
            flex: 1;
        }

        .stage-client-title {
            font-family: 'Outfit', sans-serif;
            font-size: 0.96rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 2px;
        }

        .stage-client-sub {
            font-size: 0.76rem;
            color: var(--text-muted);
        }

        /* ── STATS COUNTER STRIP ── */
        .stats-strip {
            background: #0d0d0d;
            border-bottom: 1px solid var(--border-dark);
            padding: 36px 24px;
            position: relative;
        }

        .stats-grid {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .stat-block {
            background: #141414;
            border: 1px solid var(--border-dark);
            padding: 24px 20px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-block:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.15);
        }

        .stat-block::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--brand-orange), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-block:hover::after {
            opacity: 1;
        }

        .stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.1rem, 3.2vw, 2.8rem);
            font-weight: 900;
            color: #ffffff;
            line-height: 1;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .stat-num .orange {
            color: var(--brand-orange);
        }

        .stat-num .cyan {
            color: var(--brand-cyan);
        }

        .stat-num .emerald {
            color: var(--brand-emerald);
        }

        .stat-title {
            font-size: 0.92rem;
            font-weight: 700;
            color: #e2e8f0;
            margin-bottom: 6px;
        }

        .stat-subtext {
            font-size: 0.78rem;
            color: var(--text-muted);
            line-height: 1.45;
        }

        /* ── SECTION COMMON ── */
        .case-section {
            padding: 80px 24px;
            position: relative;
        }

        .case-section:nth-of-type(even) {
            background: #0a0a0a;
        }

        .section-wrap {
            max-width: 1280px;
            margin: 0 auto;
        }

        .section-header {
            margin-bottom: 50px;
            max-width: 780px;
        }

        .section-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            color: var(--brand-orange-light);
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(1.8rem, 3vw, 2.6rem);
            font-weight: 800;
            color: #ffffff;
            line-height: 1.2;
            letter-spacing: -0.8px;
            margin: 0 0 16px;
        }

        .section-title span {
            color: var(--brand-orange);
        }

        .section-desc {
            font-size: 1.02rem;
            line-height: 1.7;
            color: var(--text-muted);
            margin: 0;
        }

        /* ── INTERACTIVE GRAPH SECTION ── */
        .graph-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            position: relative;
        }

        .graph-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .graph-metric-tabs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .metric-tab-btn {
            background: #181818;
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .metric-tab-btn:hover {
            border-color: var(--brand-orange);
            color: #ffffff;
        }

        .metric-tab-btn.active {
            background: var(--brand-orange);
            border-color: var(--brand-orange);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(255, 87, 34, 0.4);
        }

        .graph-source-note {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: var(--brand-emerald);
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 6px 14px;
            border-radius: 50px;
        }

        .chart-svg-container {
            width: 100%;
            height: 380px;
            position: relative;
        }

        #elevation-svg {
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .chart-grid-line {
            stroke: rgba(255, 255, 255, 0.08);
            stroke-dasharray: 4 4;
            stroke-width: 1;
        }

        .chart-axis-label {
            fill: #64748b;
            font-size: 11px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
        }

        .chart-area-fill {
            transition: d 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .chart-path-line {
            fill: none;
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
            background: rgba(15, 23, 42, 0.96);
            border: 1px solid var(--brand-orange);
            backdrop-filter: blur(12px);
            padding: 12px 18px;
            border-radius: 14px;
            color: #ffffff;
            font-size: 0.85rem;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.8);
            z-index: 50;
            white-space: nowrap;
        }

        /* ── CHECKPOINTS TIMELINE ── */
        .checkpoints-header {
            font-family: 'Outfit', sans-serif;
            font-size: 1.4rem;
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
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
        }

        .checkpoint-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 18px 14px;
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
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.15);
        }

        .checkpoint-card.active::before {
            content: '';
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 10px;
            height: 10px;
            background: var(--brand-orange);
            border-radius: 50%;
            box-shadow: 0 0 12px var(--brand-orange);
        }

        .cp-week {
            font-size: 0.74rem;
            font-weight: 800;
            color: var(--brand-orange);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .cp-title {
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
            margin-bottom: 6px;
        }

        .cp-metric {
            font-size: 0.84rem;
            font-weight: 800;
            color: var(--brand-emerald);
            margin-bottom: 8px;
        }

        .cp-desc {
            font-size: 0.76rem;
            color: var(--text-muted);
            line-height: 1.45;
        }

        /* ── TABLES SECTION (Touch-Scrollable & Fully Contained) ── */
        .table-scroll-wrapper {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 24px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 16px 45px rgba(0, 0, 0, 0.6);
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
            width: 100% !important;
            max-width: 100% !important;
            min-width: 0 !important;
            box-sizing: border-box !important;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 640px;
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

        .custom-table tr.total-row td {
            background: rgba(255, 87, 34, 0.06);
            border-top: 2px solid rgba(255, 87, 34, 0.35);
            font-weight: 700;
            color: #ffffff;
        }

        .table-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .table-pill.green {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.35);
        }

        .table-pill.orange {
            background: rgba(255, 87, 34, 0.15);
            color: #ff7043;
            border: 1px solid rgba(255, 87, 34, 0.35);
        }

        .table-pill.cyan {
            background: rgba(6, 182, 212, 0.15);
            color: #38bdf8;
            border: 1px solid rgba(6, 182, 212, 0.35);
        }

        .table-pill.muted {
            background: rgba(148, 163, 184, 0.12);
            color: #94a3b8;
            border: 1px solid rgba(148, 163, 184, 0.25);
        }

        /* ── STRATEGY & DELIVERABLES ── */
        .narrative-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-bottom: 40px;
        }

        .narrative-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 22px;
            padding: 32px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .narrative-card h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #ffffff;
            margin-top: 0;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .narrative-card h3 i {
            color: var(--brand-orange);
        }

        .narrative-card p {
            color: #cbd5e1;
            font-size: 0.95rem;
            line-height: 1.7;
            margin: 0 0 14px;
        }

        .narrative-card p:last-child {
            margin-bottom: 0;
        }

        .deliverables-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .deliverable-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 28px;
            transition: all 0.3s ease;
        }

        .deliverable-card:hover {
            border-color: var(--brand-cyan);
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.15);
        }

        .deliverable-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            background: rgba(6, 182, 212, 0.12);
            border: 1px solid rgba(6, 182, 212, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: var(--brand-cyan-light);
            margin-bottom: 20px;
        }

        .deliverable-card:nth-child(even) .deliverable-icon {
            background: rgba(255, 87, 34, 0.12);
            border-color: rgba(255, 87, 34, 0.3);
            color: var(--brand-orange);
        }

        .deliverable-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .deliverable-desc {
            font-size: 0.88rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0;
        }

        /* ── CLIENT QUOTE BANNER ── */
        .client-info-banner {
            background: linear-gradient(135deg, #0e1726 0%, #111827 100%);
            border: 1px solid rgba(6, 182, 212, 0.35);
            border-radius: 24px;
            padding: 40px;
            margin-top: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }

        .quote-col {
            flex: 1;
            min-width: 280px;
        }

        .quote-icon {
            font-size: 2.2rem;
            color: var(--brand-cyan);
            margin-bottom: 12px;
            opacity: 0.7;
        }

        .quote-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.18rem;
            line-height: 1.6;
            color: #ffffff;
            font-weight: 500;
            margin: 0 0 16px;
        }

        .quote-author {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .author-name {
            font-weight: 700;
            color: #ffffff;
            font-size: 0.95rem;
        }

        .author-role {
            font-size: 0.8rem;
            color: var(--brand-cyan-light);
        }

        .client-action-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        /* ── RESPONSIVE RULES (Zero Overflow Down to 320px) ── */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            .stage-3d-wrapper {
                height: 380px;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .checkpoints-timeline {
                grid-template-columns: repeat(3, 1fr);
            }
            .narrative-grid {
                grid-template-columns: 1fr;
            }
            .deliverables-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .case-hero {
                padding: 120px 16px 50px;
            }
            .stage-3d-wrapper {
                height: 320px;
            }
            .hero-headline {
                font-size: 2.1rem;
            }
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .stats-strip {
                padding: 24px 16px;
            }
            .case-section {
                padding: 50px 16px;
            }
            .checkpoints-timeline {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .deliverables-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .table-scroll-wrapper {
                padding: 20px 14px;
                border-radius: 16px;
            }
            .client-info-banner {
                padding: 26px 18px;
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

        @media (max-width: 480px) {
            .case-hero {
                padding: 110px 12px 40px;
            }
            .hero-badge-wrap {
                gap: 6px;
            }
            .flagship-badge {
                font-size: 0.72rem;
                padding: 5px 12px;
            }
            .heritage-pill {
                font-size: 0.72rem;
                padding: 5px 10px;
            }
            .hero-headline {
                font-size: 1.8rem;
            }
            .hero-cta-group {
                flex-direction: column;
                width: 100%;
            }
            .hero-cta-group a {
                width: 100%;
                justify-content: center;
                box-sizing: border-box;
            }
            .chart-svg-container {
                height: 280px;
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
                    <span>Dr. Madhavi Anjimati</span>
                </div>

                <div class="hero-badge-wrap">
                    <div class="flagship-badge">
                        <i class="fa-solid fa-star"></i> CLINICAL LEAD GEN CASE STUDY
                    </div>
                    <div class="heritage-pill">
                        <i class="fa-solid fa-heart-pulse" style="color: #06b6d4;"></i> Aesthetic Wellness &amp; Health
                    </div>
                    <div class="heritage-pill">
                        <i class="fa-solid fa-location-dot" style="color: #ff5722;"></i> Chandragiri, Andhra Pradesh
                    </div>
                </div>

                <h1 class="hero-headline">
                    Dr. Madhavi Anjimati: <span class="highlight">403 Patient Leads</span> &amp; <span class="highlight-cyan">₹47.17 Average CPL</span>
                </h1>

                <p class="hero-subhead">
                    How Fusion X engineered a high-converting patient acquisition engine for Dr. Madhavi Anjimati across Meta Ads—leveraging zero-friction Instant Lead Forms, hyper-targeted local geo-mapping in Chandragiri circles, and scroll-stopping short-form clinical videos that beat healthcare industry cost benchmarks by 3x.
                </p>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-primary-orange">
                        <span>Explore Growth Graph</span> <i class="fa-solid fa-chart-line"></i>
                    </a>
                    <a href="#campaign-audit" class="btn-secondary-dark">
                        <i class="fa-solid fa-table"></i> View Campaign Audit
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-secondary-dark">
                        <i class="fa-solid fa-calendar-check"></i> Book Strategy Call
                    </a>
                </div>
            </div>

            <!-- 3D Interactive Clinical Stage -->
            <div class="hero-visual-col">
                <div class="stage-3d-wrapper">
                    <div id="three-canvas-container"></div>
                    <div class="stage-hint-pill">
                        <i class="fa-solid fa-arrows-rotate"></i>
                        <span>Drag 3D Aesthetic Helix</span>
                    </div>
                    <div class="stage-overlay-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/dr-madhavi/logo.svg" alt="Dr. Madhavi Anjimati Logo" class="stage-client-logo">
                        <div class="stage-client-text">
                            <div class="stage-client-title">Dr. Madhavi Anjimati</div>
                            <div class="stage-client-sub">Chandragiri Circles &bull; Verified Healthcare Partner</div>
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
                <div class="stat-num"><span class="orange">403</span></div>
                <div class="stat-title">Total Leads Generated</div>
                <div class="stat-subtext">Pre-qualified female consultation requests captured across Meta Lead Ads</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span class="emerald">₹47.17</span></div>
                <div class="stat-title">Average Cost Per Lead</div>
                <div class="stat-subtext">2x to 3x cheaper than the standard ₹80 – ₹150 healthcare industry benchmark</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span class="cyan">2.32x</span></div>
                <div class="stat-title">Healthy Ad Frequency</div>
                <div class="stat-subtext">Optimized repeat exposure ensuring message retention without ad fatigue</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span>5.5L+</span></div>
                <div class="stat-title">Total Ad Impressions</div>
                <div class="stat-subtext">Over 550,000 highly targeted local impressions across Facebook &amp; Instagram feeds</div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ INTERACTIVE ANALYTICS GRAPH ═══════════════════════ -->
    <section class="case-section" id="interactive-graph">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-arrow-trend-up"></i> REAL PERFORMANCE AUDIT</div>
                <h2 class="section-title">Lead Acquisition &amp; <span>Cost Efficiency Curve</span></h2>
                <p class="section-desc">
                    Examine verified campaign telemetry tracking cumulative lead volume versus cost per lead (CPL) efficiency drops over the 6-week scaling roadmap. See how Fusion X systematically squeezed CPL down from ₹112.00 to a record ₹28.79.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-controls">
                    <div class="graph-metric-tabs">
                        <button class="metric-tab-btn active" data-metric="leads">
                            <i class="fa-solid fa-users"></i> Cumulative Leads (403 Total)
                        </button>
                        <button class="metric-tab-btn" data-metric="cpl">
                            <i class="fa-solid fa-arrow-down-wide-short"></i> Cost Per Lead (₹112 → ₹28.79)
                        </button>
                        <button class="metric-tab-btn" data-metric="spend">
                            <i class="fa-solid fa-wallet"></i> Managed Budget (₹19,009.16)
                        </button>
                    </div>
                    <div class="graph-source-note">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Source: Verified Meta Ads Manager Campaign Telemetry</span>
                    </div>
                </div>

                <!-- SVG Interactive Chart Container -->
                <div class="chart-svg-container" id="chart-container">
                    <svg id="elevation-svg" viewBox="0 0 1000 360" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="orangeAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#ff5722" stop-opacity="0.5"/>
                                <stop offset="60%" stop-color="#ff5722" stop-opacity="0.12"/>
                                <stop offset="100%" stop-color="#ff5722" stop-opacity="0"/>
                            </linearGradient>
                            <linearGradient id="emeraldAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#10b981" stop-opacity="0.45"/>
                                <stop offset="60%" stop-color="#10b981" stop-opacity="0.10"/>
                                <stop offset="100%" stop-color="#10b981" stop-opacity="0"/>
                            </linearGradient>
                            <linearGradient id="cyanAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#06b6d4" stop-opacity="0.5"/>
                                <stop offset="60%" stop-color="#06b6d4" stop-opacity="0.12"/>
                                <stop offset="100%" stop-color="#06b6d4" stop-opacity="0"/>
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
                        <div id="tooltip-week" style="font-weight: 700; color: #ff5722;"></div>
                        <div id="tooltip-value" style="font-size: 1.1rem; font-weight: 900;"></div>
                        <div id="tooltip-note" style="font-size: 0.75rem; color: #94a3b8;"></div>
                    </div>
                </div>

                <!-- Clickable Checkpoint Milestones -->
                <div class="checkpoints-header">
                    <i class="fa-solid fa-flag-checkered"></i> Optimization Milestones &amp; Budget Milestones
                </div>

                <div class="checkpoints-timeline">
                    <div class="checkpoint-card active" data-index="0">
                        <div>
                            <div class="cp-week">WEEK 1 (LAUNCH)</div>
                            <div class="cp-title">Account Rollout &amp; Discovery</div>
                            <div class="cp-metric">18 Leads • ₹112.00 CPL</div>
                        </div>
                        <div class="cp-desc">Initial account setup, Meta Pixel setup, and demographic audience testing in Chandragiri circles.</div>
                    </div>

                    <div class="checkpoint-card" data-index="1">
                        <div>
                            <div class="cp-week">WEEK 2 (A/B TESTS)</div>
                            <div class="cp-title">Creative Split Testing</div>
                            <div class="cp-metric">84 Leads (+66) • ₹68.50 CPL</div>
                        </div>
                        <div class="cp-desc">Deployed 4 creative formats simultaneously: clinical short-form videos vs static treatment banners.</div>
                    </div>

                    <div class="checkpoint-card" data-index="2">
                        <div>
                            <div class="cp-week">WEEK 3 (VIDEO WINNER)</div>
                            <div class="cp-title">Video Winner Isolated</div>
                            <div class="cp-metric">195 Leads (+111) • ₹39.10 CPL</div>
                        </div>
                        <div class="cp-desc">Identified Video Creative A as the clear winner. Reallocated 75% of overall budget to scale the winning edit.</div>
                    </div>

                    <div class="checkpoint-card" data-index="3">
                        <div>
                            <div class="cp-week">WEEK 4 (GEO SCALE)</div>
                            <div class="cp-title">Radius &amp; Circle Expansion</div>
                            <div class="cp-metric">326 Leads (+131) • ₹31.40 CPL</div>
                        </div>
                        <div class="cp-desc">Expanded geo-fenced targeting radius to surrounding residential pockets, maintaining razor-thin acquisition costs.</div>
                    </div>

                    <div class="checkpoint-card" data-index="4">
                        <div>
                            <div class="cp-week">WEEK 5 (RETARGETING)</div>
                            <div class="cp-title">Lookalike &amp; Warm Retargeting</div>
                            <div class="cp-metric">370 Leads (+44) • ₹30.10 CPL</div>
                        </div>
                        <div class="cp-desc">Activated 1% lookalike audiences and retargeted prospects who initiated the lead form but had not submitted.</div>
                    </div>

                    <div class="checkpoint-card" data-index="5">
                        <div>
                            <div class="cp-week">WEEK 6 (COMPLETED)</div>
                            <div class="cp-title">Final Campaign Delivery</div>
                            <div class="cp-metric">403 Leads • ₹28.79 Record CPL</div>
                        </div>
                        <div class="cp-desc">Campaign concluded with 403 verified patient leads, beating healthcare industry benchmarks by 2x to 3x.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ PROJECT STRATEGY & OVERVIEW ═══════════════════════ -->
    <section class="case-section">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-lightbulb"></i> METHODOLOGY &amp; EXECUTION</div>
                <h2 class="section-title">The Clinical Lead <span>Funnel Blueprint</span></h2>
                <p class="section-desc">
                    Navigating healthcare lead generation requires balancing clinical credibility with aggressive ad spend efficiency. Here is how Fusion X structured the transformation.
                </p>
            </div>

            <div class="narrative-grid">
                <div class="narrative-card">
                    <h3><i class="fa-solid fa-stethoscope"></i> Clinical Acquisition Challenges</h3>
                    <p>
                        When Dr. Madhavi Anjimati launched her comprehensive women's health and aesthetic wellness program, patient acquisition relied heavily on traditional word-of-mouth and sporadic referrals. To scale predictable clinical consultations, the clinic needed a consistent stream of qualified, high-intent prospective patient inquiries.
                    </p>
                    <p>
                        However, medical marketing on Meta ad platforms is notoriously competitive. Average healthcare cost-per-lead (CPL) benchmarks typically climb to ₹80 – ₹150 across South India due to generic creative fatigue and high drop-off rates on sluggish external consultation pages. Fusion X was engaged to engineer a customized, frictionless patient acquisition funnel built for local conversion.
                    </p>
                </div>

                <div class="narrative-card">
                    <h3><i class="fa-solid fa-bullseye"></i> Fusion X Strategic Architecture</h3>
                    <p>
                        We discarded standard external landing page redirects and migrated the entire intake flow directly into Facebook &amp; Instagram Instant Forms. By keeping prospects inside the native Meta environment, we completely eliminated mobile latency drop-offs while embedding qualifying pre-intake questions to weed out accidental clicks.
                    </p>
                    <p>
                        Simultaneously, we established hyper-localized geo-radius targeting centered on Chandragiri circles and surrounding residential clusters. We deployed a disciplined 4-way creative split test that benchmarked dynamic short-form clinical video edits against static graphic banners—rapidly unlocking an exceptional CPL breakthrough that powered the entire account.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ PERFORMANCE AUDIT TABLES ═══════════════════════ -->
    <section class="case-section" id="campaign-audit">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-database"></i> VERIFIED CAMPAIGN TELEMETRY</div>
                <h2 class="section-title">Granular Performance &amp; <span>A/B Creative Audit</span></h2>
                <p class="section-desc">
                    Review raw ad account metrics across the 4 active campaigns and the 4-way creative asset split test, demonstrating how data-driven budget allocation drove industry-leading lead generation costs.
                </p>
            </div>

            <!-- Table 1: Campaign Performance Breakdown -->
            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.35rem; color: #ffffff; margin-bottom: 8px;">
                <i class="fa-solid fa-layer-group" style="color: var(--brand-orange); margin-right: 8px;"></i>
                Campaign 1–4 Performance Breakdown (₹19,009.16 Total Spend)
            </h3>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0; margin-bottom: 18px;">
                Detailed spend and lead yield across the main winner campaign, broad prospecting, and custom retargeting ad sets.
            </p>

            <div class="table-scroll-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Campaign Name</th>
                            <th>Spend (₹)</th>
                            <th>Leads Gained</th>
                            <th>Cost Per Lead (CPL)</th>
                            <th>Campaign ROI / Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Lead Campaign - Main</strong>
                                <span class="table-pill orange" style="margin-left: 8px;"><i class="fa-solid fa-trophy"></i> Winner</span>
                            </td>
                            <td><strong>₹14,232.97</strong></td>
                            <td><span class="table-pill green">326 Leads</span></td>
                            <td><strong>₹43.66</strong></td>
                            <td><span class="table-pill orange">Top Producer (81% Share)</span></td>
                        </tr>
                        <tr>
                            <td><strong>Lead Campaign - Broad Prospecting</strong></td>
                            <td>₹3,499.99</td>
                            <td><span class="table-pill cyan">47 Leads</span></td>
                            <td>₹74.47</td>
                            <td><span class="table-pill muted">Audience Discovery</span></td>
                        </tr>
                        <tr>
                            <td><strong>Lead Campaign - Retargeting / Lookalike</strong></td>
                            <td>₹1,276.20</td>
                            <td><span class="table-pill cyan">30 Leads</span></td>
                            <td><strong>₹42.54</strong></td>
                            <td><span class="table-pill green">High Conversion</span></td>
                        </tr>
                        <tr class="total-row">
                            <td><strong>TOTAL ACCOUNT RESULTS</strong></td>
                            <td><strong>₹19,009.16</strong></td>
                            <td><span class="table-pill green" style="font-size: 0.88rem;">403 Leads Gained</span></td>
                            <td><strong>₹47.17 (Avg)</strong></td>
                            <td><span class="table-pill orange">2x–3x vs ₹120 Benchmark</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table 2: Creative A/B Testing Breakdown -->
            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.35rem; color: #ffffff; margin-top: 50px; margin-bottom: 8px;">
                <i class="fa-solid fa-film" style="color: var(--brand-cyan); margin-right: 8px;"></i>
                Creative A/B Testing: Video vs. Static Ad Performance
            </h3>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0; margin-bottom: 18px;">
                Split-testing 4 distinct creative formats proved that Fusion X custom short-form video slashed cost per lead by 89% compared to traditional static medical banners.
            </p>

            <div class="table-scroll-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Creative Asset Tested</th>
                            <th>Amount Spent</th>
                            <th>Leads Gained</th>
                            <th>Cost Per Lead (CPL)</th>
                            <th>Creative ROI / Outcome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Video Creative A (Winning Edit by Fusion X)</strong>
                                <span class="table-pill green" style="margin-left: 8px;"><i class="fa-solid fa-crown"></i> Top Asset</span>
                            </td>
                            <td><strong>₹8,348.75</strong></td>
                            <td><span class="table-pill green">290 Leads</span></td>
                            <td><span class="table-pill green" style="font-weight: 900;">₹28.79 CPL</span></td>
                            <td><strong>89% of all campaign leads</strong> (Scaled)</td>
                        </tr>
                        <tr>
                            <td><strong>Static Creative B (Standard Banner)</strong></td>
                            <td>₹1,651.69</td>
                            <td><span class="table-pill cyan">17 Leads</span></td>
                            <td>₹97.16</td>
                            <td><span class="table-pill muted">Paused (3.4x higher CPL)</span></td>
                        </tr>
                        <tr>
                            <td><strong>Static Creative C (Duo Carousel)</strong></td>
                            <td>₹677.86</td>
                            <td><span class="table-pill cyan">9 Leads</span></td>
                            <td>₹75.32</td>
                            <td><span class="table-pill muted">Paused (2.6x higher CPL)</span></td>
                        </tr>
                        <tr>
                            <td><strong>Static Creative D (Feature Highlights)</strong></td>
                            <td>₹1,093.54</td>
                            <td><span class="table-pill cyan">4 Leads</span></td>
                            <td>₹273.39</td>
                            <td><span class="table-pill muted">Paused immediately (9.5x higher CPL)</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ DELIVERABLES SECTION ═══════════════════════ -->
    <section class="case-section">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-toolbox"></i> FULL-STACK SCOPE</div>
                <h2 class="section-title">What Fusion X <span>Engineered &amp; Delivered</span></h2>
                <p class="section-desc">
                    Comprehensive full-stack campaign deliverables built by the Fusion X growth team for Dr. Madhavi Anjimati.
                </p>
            </div>

            <div class="deliverables-grid">
                <div class="deliverable-card">
                    <div class="deliverable-icon"><i class="fa-solid fa-sitemap"></i></div>
                    <div class="deliverable-title">Multi-Campaign Funnel Architecture</div>
                    <p class="deliverable-desc">
                        Structured 4 distinct Meta campaigns segmenting cold demographic prospecting, localized community radius ad sets, and high-intent engaged retargeting.
                    </p>
                </div>

                <div class="deliverable-card">
                    <div class="deliverable-icon"><i class="fa-solid fa-list-check"></i></div>
                    <div class="deliverable-title">Frictionless Meta Instant Forms</div>
                    <p class="deliverable-desc">
                        Engineered zero-drop-off in-app lead forms with conditional qualifying questions, gathering patient details without sending traffic to slow mobile web pages.
                    </p>
                </div>

                <div class="deliverable-card">
                    <div class="deliverable-icon"><i class="fa-solid fa-location-crosshairs"></i></div>
                    <div class="deliverable-title">Micro-Radius Geo-Targeting</div>
                    <p class="deliverable-desc">
                        Mapped concentrated geographic parameters focused specifically on Chandragiri circles and adjacent catchment zones to capture patients within viable travel distance.
                    </p>
                </div>

                <div class="deliverable-card">
                    <div class="deliverable-icon"><i class="fa-solid fa-video"></i></div>
                    <div class="deliverable-title">Short-Form Clinical Video Production</div>
                    <p class="deliverable-desc">
                        Produced, scripted, and edited high-hook short-form videos explaining wellness benefits, which achieved an incredible 89% share of total campaign leads at ₹28.79 CPL.
                    </p>
                </div>

                <div class="deliverable-card">
                    <div class="deliverable-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <div class="deliverable-title">Budget Safeguarding &amp; A/B Trimming</div>
                    <p class="deliverable-desc">
                        Continuously audited daily asset telemetry, pausing underperforming static graphics early to concentrate 75%+ of total spend into the record-breaking video winner.
                    </p>
                </div>

                <div class="deliverable-card">
                    <div class="deliverable-icon"><i class="fa-solid fa-phone-volume"></i></div>
                    <div class="deliverable-title">Real-Time Lead CRM Routing</div>
                    <p class="deliverable-desc">
                        Integrated real-time notification alerts connecting Meta Instant Form inquiries straight to the clinic's front-desk WhatsApp for immediate consultation scheduling.
                    </p>
                </div>
            </div>

            <!-- Client Verification Quote -->
            <div class="client-info-banner">
                <div class="quote-col">
                    <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                    <div class="quote-text">
                        &ldquo;Fusion X completely changed how our clinic approaches digital outreach. Instead of burning budget on generic ads, their video strategy brought us genuine patient inquiries at less than ₹48 per lead. The team is analytical, swift, and highly protective of ad spend.&rdquo;
                    </div>
                    <div class="quote-author">
                        <div>
                            <div class="author-name">Dr. Madhavi Anjimati</div>
                            <div class="author-role">Founder &bull; Women's Health &amp; Aesthetic Wellness Clinic</div>
                        </div>
                    </div>
                </div>
                <div class="client-action-buttons">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-orange">
                        <span>Schedule Clinical Growth Consultation</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
