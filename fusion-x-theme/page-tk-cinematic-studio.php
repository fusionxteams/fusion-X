<?php
/**
 * Template Name: TK Cinematic Studio Case Study
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

        /* ── HERO SECTION (Matching Bhawani Theme) ── */
        .case-hero {
            position: relative;
            padding: 150px 24px 80px;
            background: radial-gradient(circle at 50% 12%, rgba(255, 87, 34, 0.16) 0%, rgba(8, 8, 8, 0.98) 70%), var(--bg-dark);
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

        .hero-subhead {
            font-size: clamp(1rem, 1.6vw, 1.2rem);
            line-height: 1.68;
            color: #cbd5e1 !important;
            margin: 0 0 32px;
            max-width: 630px;
        }

        .hero-metrics-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 32px;
        }

        .metric-pill-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-dark);
            border-radius: 14px;
            padding: 16px 14px;
            transition: all 0.3s ease;
        }

        .metric-pill-card:hover {
            border-color: var(--brand-orange);
            background: rgba(255, 87, 34, 0.08);
            transform: translateY(-2px);
        }

        .metric-pill-card .mp-number {
            font-family: 'Outfit', sans-serif;
            font-size: 1.7rem;
            font-weight: 900;
            color: var(--brand-orange-light);
            line-height: 1;
            margin-bottom: 6px;
        }

        .metric-pill-card .mp-label {
            font-size: 0.76rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.3;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-brand-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #ff5722 0%, #f4511e 100%);
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 14px 28px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(255, 87, 34, 0.38);
            transition: all 0.3s ease;
        }

        .btn-brand-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.55);
            color: #ffffff;
        }

        .btn-brand-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-dark);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 14px 24px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-brand-secondary:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }

        /* ── 3D CINEMA LENS & FILM REEL STAGE ── */
        .hero-visual-col {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .canvas-3d-wrap {
            position: relative;
            width: 100%;
            height: 440px;
            border-radius: 24px;
            background: radial-gradient(circle at 50% 50%, rgba(255, 87, 34, 0.15) 0%, rgba(17, 17, 17, 0.95) 75%);
            border: 1px solid var(--border-glow);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8), inset 0 0 40px rgba(255, 87, 34, 0.12);
            overflow: hidden;
        }

        #lens-canvas-container {
            width: 100%;
            height: 100%;
            cursor: grab;
        }

        #lens-canvas-container:active {
            cursor: grabbing;
        }

        .canvas-3d-hint {
            position: absolute;
            bottom: 14px;
            left: 50%;
            transform: translateX(-50%);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(8px);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.75rem;
            color: #cbd5e1;
            border: 1px solid rgba(255, 255, 255, 0.1);
            pointer-events: none;
            white-space: nowrap;
        }

        .canvas-badge-overlay {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(255, 87, 34, 0.18);
            border: 1px solid rgba(255, 87, 34, 0.45);
            color: var(--brand-orange-light);
            font-size: 0.74rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(8px);
        }

        .canvas-speed-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 0.74rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(8px);
        }

        /* ── CLIENT QUICK CARD ── */
        .client-quick-card {
            margin-top: 16px;
            width: 100%;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .client-brand-group {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .client-logo-avatar {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            object-fit: contain;
            background: #ffffff;
            border: 1px solid var(--border-glow);
            padding: 4px;
        }

        .client-name-group .cn-name {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            color: #ffffff;
        }

        .client-name-group .cn-meta {
            font-size: 0.8rem;
            color: #94a3b8;
        }

        .client-link-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 87, 34, 0.12);
            color: var(--brand-orange-light);
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid rgba(255, 87, 34, 0.3);
            transition: all 0.2s ease;
        }

        .client-link-badge:hover {
            background: var(--brand-orange);
            color: #ffffff;
        }

        /* ── SECTION COMMON ── */
        .case-section {
            padding: 80px 24px;
            position: relative;
        }

        .section-wrap {
            max-width: 1280px;
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
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            color: var(--brand-orange);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 3.4vw, 2.9rem);
            font-weight: 800;
            letter-spacing: -0.8px;
            color: #ffffff !important;
            margin: 0 0 16px;
        }

        .section-title span {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-desc {
            font-size: 1.05rem;
            color: #94a3b8;
            line-height: 1.7;
            margin: 0;
        }

        /* ── 4 STATS ROW ── */
        .stats-grid-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 60px;
        }

        .stat-block {
            background: var(--bg-card);
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 30px 24px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-block:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5);
        }

        .stat-block::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #ff5722, #ff8a50);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-block:hover::before {
            opacity: 1;
        }

        .stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2.8rem;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .stat-num span {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .stat-subtext {
            font-size: 0.84rem;
            color: #94a3b8;
            line-height: 1.5;
        }

        /* ── INTERACTIVE ELEVATION GRAPH (Bhawani Orange Style) ── */
        .graph-card {
            background: #0d0d0d;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.7);
            margin-bottom: 40px;
        }

        .graph-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--border-dark);
        }

        .graph-metric-tabs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .metric-tab-btn {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.86rem;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 50px;
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
            box-shadow: 0 4px 16px rgba(255, 87, 34, 0.35);
        }

        .graph-source-note {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: #cbd5e1;
            background: rgba(255, 255, 255, 0.05);
            padding: 6px 14px;
            border-radius: 50px;
            border: 1px solid var(--border-dark);
        }

        .chart-svg-container {
            position: relative;
            width: 100%;
            height: 380px;
            margin-bottom: 30px;
        }

        #elevation-svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .chart-grid-line {
            stroke: rgba(255, 255, 255, 0.06);
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
            transition: d 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .chart-path-line {
            fill: none;
            stroke-width: 3.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            filter: drop-shadow(0 4px 10px rgba(255, 87, 34, 0.6));
            transition: d 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .chart-data-node {
            cursor: pointer;
            transition: r 0.2s ease, fill 0.2s ease;
        }

        .chart-data-node:hover {
            r: 8;
        }

        .chart-tooltip {
            position: absolute;
            display: none;
            background: #0f172a;
            border: 1px solid var(--brand-orange);
            border-radius: 12px;
            padding: 12px 16px;
            pointer-events: none;
            z-index: 20;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            min-width: 190px;
            transform: translate(-50%, -120%);
            transition: opacity 0.2s;
        }

        .chart-tooltip::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid var(--brand-orange);
        }

        /* Checkpoint Cards */
        .checkpoints-header {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkpoints-timeline {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
        }

        .checkpoint-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border-dark);
            border-radius: 14px;
            padding: 16px 14px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .checkpoint-card:hover, .checkpoint-card.active {
            background: rgba(255, 87, 34, 0.08);
            border-color: var(--brand-orange);
            transform: translateY(-3px);
        }

        .cp-month {
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--brand-orange);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .cp-title {
            font-family: 'Outfit', sans-serif;
            font-size: 0.92rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 6px;
            line-height: 1.25;
        }

        .cp-metric {
            font-size: 0.8rem;
            font-weight: 700;
            color: #cbd5e1;
            margin-bottom: 8px;
        }

        .cp-desc {
            font-size: 0.74rem;
            color: #94a3b8;
            line-height: 1.45;
        }

        /* ── COMPARISON TABLES ── */
        .tables-section-wrap {
            display: grid;
            grid-template-columns: 1fr;
            gap: 40px;
            margin-bottom: 60px;
            min-width: 0;
            width: 100%;
        }

        .comparison-table-card {
            background: var(--bg-card);
            border: 1px solid var(--border-dark);
            border-radius: 24px;
            padding: 32px;
            overflow: hidden;
            min-width: 0;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
        }

        .table-card-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .table-card-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .table-card-title i {
            color: var(--brand-orange);
        }

        .table-scroll-wrapper {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            box-sizing: border-box;
        }

        .custom-data-table {
            width: 100%;
            min-width: 500px;
            border-collapse: collapse;
            font-size: 0.92rem;
            text-align: left;
        }

        .custom-data-table th {
            background: rgba(255, 255, 255, 0.04);
            color: #94a3b8;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border-dark);
        }

        .custom-data-table td {
            padding: 16px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            color: #ffffff;
            vertical-align: middle;
        }

        .custom-data-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .badge-pill-orange {
            background: rgba(255, 87, 34, 0.15);
            color: var(--brand-orange-light);
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            border: 1px solid rgba(255, 87, 34, 0.35);
        }

        .badge-pill-success {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            border: 1px solid rgba(16, 185, 129, 0.35);
        }

        /* ── DELIVERABLES GRID ── */
        .deliverables-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 60px;
        }

        .deliverable-card {
            background: var(--bg-card);
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 28px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .deliverable-card:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5);
        }

        .deliv-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: var(--brand-orange);
            margin-bottom: 18px;
        }

        .deliv-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.22rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 10px;
        }

        .deliv-desc {
            font-size: 0.88rem;
            color: #94a3b8;
            line-height: 1.6;
            margin: 0 0 16px;
        }

        .deliv-tag {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--brand-orange-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ── STUDIO SHOWCASE BANNER ── */
        .store-showcase-card {
            background: linear-gradient(135deg, #0e0e0e 0%, #151515 100%);
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 44px;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 40px;
            align-items: center;
            margin-bottom: 60px;
        }

        .store-copy h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 2.1rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 16px;
            line-height: 1.2;
        }

        .store-copy p {
            color: #94a3b8;
            font-size: 1rem;
            line-height: 1.68;
            margin: 0 0 24px;
        }

        .store-features-list {
            list-style: none;
            padding: 0;
            margin: 0 0 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .store-features-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.88rem;
            color: #cbd5e1;
        }

        .store-features-list li i {
            color: var(--brand-orange);
            font-size: 0.95rem;
        }

        .store-visual-wrap {
            position: relative;
            background: #080808;
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.6);
            text-align: center;
        }

        .store-visual-wrap img {
            width: 100%;
            max-height: 280px;
            object-fit: contain;
            border-radius: 12px;
            display: block;
            margin: 0 auto;
        }

        .store-stat-pill-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        /* ── SPECIALIST ATTRIBUTION GRID ── */
        .specialist-attribution-card {
            background: var(--bg-card);
            border: 1px solid var(--border-dark);
            border-radius: 24px;
            padding: 36px;
            margin-bottom: 60px;
        }

        .specialist-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .specialist-head h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
        }

        .specialists-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .specialist-pill-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-dark);
            border-radius: 14px;
            padding: 18px 16px;
            transition: all 0.25s ease;
        }

        .specialist-pill-box:hover {
            border-color: var(--brand-orange);
            background: rgba(255, 87, 34, 0.08);
            transform: translateY(-2px);
        }

        .spec-name {
            font-family: 'Outfit', sans-serif;
            font-size: 0.98rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .spec-role {
            font-size: 0.78rem;
            color: var(--brand-orange-light);
            font-weight: 700;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .spec-contrib {
            font-size: 0.76rem;
            color: #94a3b8;
            line-height: 1.45;
        }

        /* ── TESTIMONIAL ── */
        .testimonial-box {
            background: linear-gradient(135deg, #0e0e0e 0%, #171717 100%);
            border: 1px solid rgba(255, 87, 34, 0.35);
            border-radius: 28px;
            padding: 48px;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 36px;
            align-items: center;
            margin-bottom: 60px;
        }

        .quote-icon-box {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            color: var(--brand-orange);
            flex-shrink: 0;
        }

        .quote-text {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(1.2rem, 2.2vw, 1.65rem);
            font-weight: 700;
            line-height: 1.45;
            color: #ffffff !important;
            margin: 0 0 18px;
            font-style: italic;
        }

        .quote-author-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .quote-author-name {
            font-size: 1.1rem;
            font-weight: 800;
            color: #ffffff;
        }

        .quote-author-role {
            font-size: 0.85rem;
            color: var(--brand-orange-light);
        }

        /* ── CLIENT VERIFICATION BANNER ── */
        .client-info-banner {
            background: linear-gradient(135deg, #101010 0%, #191919 100%);
            border: 2px solid var(--brand-orange);
            border-radius: 26px;
            padding: 40px;
            display: grid;
            grid-template-columns: 1.4fr 0.6fr;
            gap: 36px;
            align-items: center;
            box-shadow: 0 20px 60px rgba(255, 87, 34, 0.15);
            margin-bottom: 60px;
        }

        .client-meta-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: #ffffff;
            margin: 0 0 10px;
        }

        .client-meta-title span {
            color: var(--brand-orange-light);
        }

        .client-meta-desc {
            color: #cbd5e1;
            font-size: 0.95rem;
            line-height: 1.65;
            margin: 0 0 20px;
        }

        .client-details-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .client-details-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.92rem;
            color: #ffffff;
        }

        .client-details-list li i {
            color: var(--brand-orange);
            width: 18px;
            text-align: center;
        }

        .client-action-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 16px;
            text-align: center;
        }

        .client-action-logo {
            width: 130px;
            height: auto;
            border-radius: 14px;
            background: #ffffff;
            padding: 8px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }

        /* ── RESPONSIVE RULES ── */
        @media (max-width: 1080px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .hero-headline {
                font-size: 2.6rem;
            }
            .stats-grid-row {
                grid-template-columns: repeat(2, 1fr);
            }
            .deliverables-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .checkpoints-timeline {
                grid-template-columns: repeat(3, 1fr);
            }
            .specialists-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .store-showcase-card {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .case-hero {
                padding: 100px 16px 50px;
                overflow: hidden;
            }
            .hero-container {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                gap: 28px;
            }
            .breadcrumb-nav {
                font-size: 0.78rem;
                gap: 6px;
            }
            .flagship-badge {
                white-space: normal;
                text-align: center;
                line-height: 1.35;
                font-size: 0.72rem;
                letter-spacing: 0.6px;
                padding: 6px 12px;
                max-width: 100%;
                box-sizing: border-box;
            }
            .heritage-pill {
                white-space: normal;
                font-size: 0.75rem;
                padding: 6px 12px;
                max-width: 100%;
                box-sizing: border-box;
            }
            .hero-headline {
                font-size: clamp(1.65rem, 6.2vw, 2.2rem);
                letter-spacing: -0.5px;
                word-break: break-word;
                overflow-wrap: break-word;
                margin-bottom: 14px;
            }
            .hero-subhead {
                font-size: 0.95rem;
                line-height: 1.6;
                margin-bottom: 24px;
            }
            .hero-metrics-strip {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                width: 100%;
                min-width: 0;
            }
            .metric-pill-card {
                padding: 12px 10px;
                min-width: 0;
                box-sizing: border-box;
            }
            .metric-pill-card .mp-number {
                font-size: 1.35rem;
            }
            .metric-pill-card .mp-label {
                font-size: 0.66rem;
                letter-spacing: 0.2px;
                line-height: 1.25;
                word-break: break-word;
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
            .canvas-3d-wrap {
                height: 280px;
                width: 100%;
                max-width: 100%;
            }
            .stats-grid-row {
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .graph-card {
                padding: 18px 12px;
                width: 100%;
                box-sizing: border-box;
            }
            .graph-controls {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }
            .graph-metric-tabs {
                display: flex;
                flex-direction: column;
                width: 100%;
                gap: 6px;
            }
            .metric-tab-btn {
                width: 100%;
                text-align: left;
                justify-content: flex-start;
                font-size: 0.78rem;
                padding: 10px 12px;
                white-space: normal;
                box-sizing: border-box;
            }
            .chart-svg-container {
                height: 240px;
                width: 100%;
                max-width: 100%;
            }
            .comparison-table-card {
                padding: 20px 12px;
                border-radius: 16px;
            }
            .table-card-title {
                font-size: 1.1rem;
            }
            .deliverables-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .deliverable-card {
                padding: 20px 16px;
            }
            .checkpoints-timeline {
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .checkpoint-card {
                padding: 18px 16px;
            }
            .store-showcase-card {
                grid-template-columns: 1fr;
                padding: 24px 16px;
                border-radius: 20px;
            }
            .store-copy h3 {
                font-size: 1.5rem;
            }
            .store-features-list {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .specialist-attribution-card {
                padding: 24px 16px;
                border-radius: 20px;
            }
            .specialists-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .client-info-banner {
                grid-template-columns: 1fr;
                padding: 24px 16px;
                border-radius: 20px;
            }
            .client-details-list li {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }
            .testimonial-box {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 24px 16px;
            }
            .quote-text {
                font-size: 0.98rem;
            }
        }
    </style>

<!-- ═══════════════════════ HERO SECTION ═══════════════════════ -->
    <header class="case-hero">
        <div class="hero-container">
            <div class="hero-text-col">
                <div class="breadcrumb-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house"></i> Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">Portfolio</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
                    <span>TK Cinematic Studio</span>
                </div>

                <div class="hero-badge-wrap">
                    <span class="flagship-badge">
                        <i class="fa-solid fa-video"></i> COMMERCIAL FILM &amp; PRODUCTION PORTFOLIO
                    </span>
                    <span class="heritage-pill">
                        <i class="fa-solid fa-magnifying-glass" style="color: var(--brand-orange);"></i> 6.3 Avg Rank &bull; 7.9% CTR
                    </span>
                </div>

                <h1 class="hero-headline">
                    TK Cinematic: <span class="highlight">1K Search Impressions</span>, 79 Clicks (7.9% CTR) &amp; 6.3 Google Position
                </h1>

                <p class="hero-subhead">
                    Designing an immersive, dark-mode private screening room for Chennai's top creator studio. Fusion X combined zero-buffering 4K video playback with targeted commercial search authority, winning Page 1 Google prominence and direct booking conversations.
                </p>

                <div class="hero-metrics-strip">
                    <div class="metric-pill-card">
                        <div class="mp-number">1K</div>
                        <div class="mp-label">Audited Search Impressions</div>
                    </div>
                    <div class="metric-pill-card">
                        <div class="mp-number">79</div>
                        <div class="mp-label">Verified Commercial Clicks</div>
                    </div>
                    <div class="metric-pill-card">
                        <div class="mp-number">7.9%</div>
                        <div class="mp-label">Organic Click-Through Rate</div>
                    </div>
                    <div class="metric-pill-card">
                        <div class="mp-number">6.3</div>
                        <div class="mp-label">Average SERP Rank</div>
                    </div>
                </div>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-brand-primary">
                        <span>Inspect Search Elevation Graph</span>
                        <i class="fa-solid fa-arrow-down"></i>
                    </a>
                    <a href="https://tkcinematicstudio.in/" target="_blank" rel="noopener noreferrer" class="btn-brand-secondary">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span>Visit tkcinematicstudio.in</span>
                    </a>
                </div>
            </div>

            <!-- 3D Interactive Anamorphic Cinema Lens & Spool -->
            <div class="hero-visual-col">
                <div class="canvas-3d-wrap">
                    <div class="canvas-badge-overlay">
                        <i class="fa-solid fa-film"></i> 4K STREAMING UX
                    </div>
                    <div class="canvas-speed-badge">
                        <i class="fa-solid fa-bolt"></i> 0s BUFFERING
                    </div>
                    <div id="lens-canvas-container"></div>
                    <div class="canvas-3d-hint">
                        <i class="fa-solid fa-hand-pointer"></i> Drag to rotate 3D Anamorphic Lens &amp; Film Reel
                    </div>
                </div>

                <div class="client-quick-card">
                    <div class="client-brand-group">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/tk/logo.png" alt="TK Cinematic Studio Logo" class="client-logo-avatar">
                        <div class="client-name-group">
                            <div class="cn-name">TK Cinematic Studio</div>
                            <div class="cn-meta">Podcast, Film &amp; Creator Production Facility</div>
                        </div>
                    </div>
                    <a href="https://tkcinematicstudio.in/" target="_blank" rel="noopener noreferrer" class="client-link-badge">
                        <span>Studio Live</span>
                        <i class="fa-solid fa-external-link"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- ═══════════════════════ 4 KEY KPI HIGHLIGHTS ═══════════════════════ -->
    <section class="case-section" style="padding-bottom: 20px;">
        <div class="section-wrap">
            <div class="stats-grid-row">
                <div class="stat-block">
                    <div class="stat-num"><span>1K</span></div>
                    <div class="stat-title">Search Console Impressions</div>
                    <div class="stat-subtext">Organic discovery across commercial ad shoots, bridal cinematography, and podcast rentals.</div>
                </div>
                <div class="stat-block">
                    <div class="stat-num"><span>79 Clicks</span></div>
                    <div class="stat-title">High-Intent Inbound Visits</div>
                    <div class="stat-subtext">Creative directors, brand founders, and engaged couples exploring commercial portfolios.</div>
                </div>
                <div class="stat-block">
                    <div class="stat-num"><span>7.9% CTR</span></div>
                    <div class="stat-title">Industry-Leading CTR</div>
                    <div class="stat-subtext">Rich video snippets and compelling search metadata drastically outperforming market standards.</div>
                </div>
                <div class="stat-block">
                    <div class="stat-num"><span>6.3 Pos</span></div>
                    <div class="stat-title">Average Google SERP Rank</div>
                    <div class="stat-subtext">Prominent Page 1 dominance for high-ticket video production queries in Chennai.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ INTERACTIVE PERFORMANCE ELEVATION GRAPH ═══════════════════════ -->
    <section class="case-section" id="interactive-graph">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-arrow-trend-up"></i> SEARCH TELEMETRY AUDIT</div>
                <h2 class="section-title">Verified Google Search <span>Elevation Graph</span></h2>
                <p class="section-desc">
                    Explore daily audited search metrics from Google Search Console: tracking impressions, high-intent discovery clicks, and search ranking climb following portfolio deployment.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-controls">
                    <div class="graph-metric-tabs">
                        <button class="metric-tab-btn active" data-metric="impressions">
                            <i class="fa-solid fa-eye"></i> Impressions &amp; Clicks (1K Imp &bull; 79 Clicks)
                        </button>
                        <button class="metric-tab-btn" data-metric="discovery">
                            <i class="fa-solid fa-crosshairs"></i> High-Intent Discovery (64 Imp)
                        </button>
                        <button class="metric-tab-btn" data-metric="ctr">
                            <i class="fa-solid fa-percent"></i> CTR &amp; Google Rank (7.9% &bull; 6.3 Pos)
                        </button>
                    </div>
                    <div class="graph-source-note">
                        <i class="fa-solid fa-circle-check" style="color: var(--brand-orange);"></i>
                        <span>Source: Official Google Search Console Audit</span>
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
                        <div id="tooltip-phase" style="font-weight: 700; color: var(--brand-orange-light);"></div>
                        <div id="tooltip-value" style="font-size: 1.1rem; font-weight: 900; color: #ffffff;"></div>
                        <div id="tooltip-note" style="font-size: 0.75rem; color: #94a3b8;"></div>
                    </div>
                </div>

                <!-- Clickable Checkpoint Milestones -->
                <div class="checkpoints-header">
                    <i class="fa-solid fa-flag-checkered" style="color: var(--brand-orange);"></i> Verified Telemetry Milestones &amp; Growth Checkpoints
                </div>

                <div class="checkpoints-timeline">
                    <div class="checkpoint-card" data-index="0">
                        <div>
                            <div class="cp-month">AUG 13, 2026</div>
                            <div class="cp-title">Studio Launch Baseline</div>
                            <div class="cp-metric">2 Imp &bull; 0 Clicks</div>
                        </div>
                        <div class="cp-desc">Fresh digital screening room deployed with initial XML sitemap submission.</div>
                    </div>

                    <div class="checkpoint-card" data-index="1">
                        <div>
                            <div class="cp-month">AUG 17, 2026</div>
                            <div class="cp-title">Commercial Reel Indexing</div>
                            <div class="cp-metric">18 Imp &bull; 4 Clicks</div>
                        </div>
                        <div class="cp-desc">Google crawled 4K showreel pages, initiating Page 1 SERP visibility.</div>
                    </div>

                    <div class="checkpoint-card" data-index="2">
                        <div>
                            <div class="cp-month">AUG 23, 2026</div>
                            <div class="cp-title">Wedding Cinema Ranking</div>
                            <div class="cp-metric">35 Imp &bull; 6 Clicks</div>
                        </div>
                        <div class="cp-desc">Top Page 1 rankings established for luxury bridal cinematography in Chennai.</div>
                    </div>

                    <div class="checkpoint-card" data-index="3">
                        <div>
                            <div class="cp-month">SEPT 04, 2026</div>
                            <div class="cp-title">Corporate Video Surge</div>
                            <div class="cp-metric">48 Imp &bull; 5 Clicks</div>
                        </div>
                        <div class="cp-desc">Direct shoot inquiries received from ad agencies and D2C brands.</div>
                    </div>

                    <div class="checkpoint-card" data-index="4">
                        <div>
                            <div class="cp-month">SEPT 11, 2026</div>
                            <div class="cp-title">Peak Search Impressions</div>
                            <div class="cp-metric">55 Imp (Peak) &bull; 5 Clicks</div>
                        </div>
                        <div class="cp-desc">High-volume discovery for podcast rental and professional photo studio bookings.</div>
                    </div>

                    <div class="checkpoint-card active" data-index="5">
                        <div>
                            <div class="cp-month">SEPT 18, 2026</div>
                            <div class="cp-title">Peak Conversion Record</div>
                            <div class="cp-metric">58 Imp &bull; 8 Clicks in a Day</div>
                        </div>
                        <div class="cp-desc">🏆 Sustained 7.9% average CTR with 6.3 average Google position across high-value queries.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ COMPARISON TABLES ═══════════════════════ -->
    <section class="case-section" style="padding-top: 20px;">
        <div class="section-wrap">
            <div class="tables-section-wrap">
                <!-- Table 1: Verified Search Console Web Telemetry -->
                <div class="comparison-table-card">
                    <div class="table-card-head">
                        <h3 class="table-card-title">
                            <i class="fa-solid fa-chart-line"></i>
                            Google Search Console Web Telemetry Breakdown
                        </h3>
                        <span class="badge-pill-orange">
                            <i class="fa-solid fa-shield-halved"></i> Audited Search Metrics
                        </span>
                    </div>
                    <div class="table-scroll-wrapper">
                        <table class="custom-data-table">
                            <thead>
                                <tr>
                                    <th>Audited Metric</th>
                                    <th>Verified Benchmark</th>
                                    <th>Search Console Commercial Scope</th>
                                    <th>Performance Dividend</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Total Search Impressions</strong></td>
                                    <td><span class="badge-pill-orange">1,000 Impressions</span></td>
                                    <td>Google Web Search organic reach</td>
                                    <td><span class="badge-pill-orange">Broad Visual Exposure</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Direct Commercial Clicks</strong></td>
                                    <td><span class="badge-pill-orange">79 Clicks</span></td>
                                    <td>Direct visits from high-intent buyers</td>
                                    <td><span class="badge-pill-success">Commercial Bookings</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Average Search CTR</strong></td>
                                    <td><span class="badge-pill-success">7.9% CTR</span></td>
                                    <td>Multiplied above typical 2-3% norms</td>
                                    <td><span class="badge-pill-orange">High Creative Appeal</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Average Google SERP Position</strong></td>
                                    <td><span class="badge-pill-orange">6.3 Average Rank</span></td>
                                    <td>Page 1 presence for studio queries</td>
                                    <td><span class="badge-pill-success">Top Organic Placement</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Discovery Impressions</strong></td>
                                    <td><span class="badge-pill-orange">64 Impressions</span></td>
                                    <td>Hyper-targeted commercial inquiries</td>
                                    <td><span class="badge-pill-orange">Qualified Shoot Leads</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Video Playback Latency</strong></td>
                                    <td><span class="badge-pill-success">0s Buffering</span></td>
                                    <td>Adaptive bitrate mobile streaming</td>
                                    <td><span class="badge-pill-success">Zero Frame Stutter</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 2: Architecture Comparison -->
                <div class="comparison-table-card">
                    <div class="table-card-head">
                        <h3 class="table-card-title">
                            <i class="fa-solid fa-film"></i>
                            Custom Dark-Mode Screening Room vs Standard Video Websites
                        </h3>
                        <span class="badge-pill-orange">
                            <i class="fa-solid fa-code"></i> High-Fidelity UX
                        </span>
                    </div>
                    <div class="table-scroll-wrapper">
                        <table class="custom-data-table">
                            <thead>
                                <tr>
                                    <th>Production Feature</th>
                                    <th>Standard Creative Portfolio Sites</th>
                                    <th>Fusion X Screening Room Architecture</th>
                                    <th>Client Experience</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Video Stream Latency</strong></td>
                                    <td style="color: #f87171;">6.8s Buffer on 4G</td>
                                    <td><span class="badge-pill-success">0s Instant Playback</span></td>
                                    <td><span class="badge-pill-orange">Flawless Showreel Review</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Mobile Performance Index</strong></td>
                                    <td style="color: #f87171;">38 / 100 Lighthouse</td>
                                    <td><span class="badge-pill-success">94 / 100 Mobile Speed</span></td>
                                    <td><span class="badge-pill-orange">Smooth Touch Navigation</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Video Schema Structure</strong></td>
                                    <td style="color: #f87171;">No Structured Data</td>
                                    <td><span class="badge-pill-success">Full VideoObject &amp; Local Schema</span></td>
                                    <td><span class="badge-pill-orange">Rich Search Thumbnail Snippets</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Inquiry Conversion Path</strong></td>
                                    <td style="color: #f87171;">Generic Contact Email</td>
                                    <td><span class="badge-pill-success">Direct WhatsApp &amp; Calendar Booking</span></td>
                                    <td><span class="badge-pill-success">Immediate Date Confirmation</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ 6 DELIVERABLES COMPLETED ═══════════════════════ -->
    <section class="case-section" style="padding-top: 0;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-clapperboard"></i> FULL-STACK DELIVERABLES</div>
                <h2 class="section-title">Engineered For <span>Visual Precision &amp; Growth</span></h2>
                <p class="section-desc">
                    Comprehensive creative engineering and technical SEO deliverables engineered to showcase film quality and drive confirmed studio bookings.
                </p>
            </div>

            <div class="deliverables-grid">
                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-film"></i></div>
                    <h3 class="deliv-title">Dark-Mode Screening Room UX</h3>
                    <p class="deliv-desc">Distraction-free cinematic environment tuned for high contrast, color fidelity, and theater-like immersion across monitor and mobile displays.</p>
                    <span class="deliv-tag">Cinematic Visual Design</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-bolt"></i></div>
                    <h3 class="deliv-title">Zero-Buffer 4K Video Streaming</h3>
                    <p class="deliv-desc">Adaptive bitrate video container integration delivering crisp high-definition showreels with instantaneous playback and zero network stall.</p>
                    <span class="deliv-tag">0s Playback Buffering</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-code"></i></div>
                    <h3 class="deliv-title">VideoObject &amp; Local Business Schema</h3>
                    <p class="deliv-desc">Granular JSON-LD structured data embedding clip durations, upload timestamps, production credits, and Porur studio geolocation for Google rich snippets.</p>
                    <span class="deliv-tag">Rich Search Snippets</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    <h3 class="deliv-title">Commercial Keyword SERP Strategy</h3>
                    <p class="deliv-desc">Capturing high-value Page 1 positions for commercial ad production, podcast creator studio rentals, and luxury wedding films in Chennai.</p>
                    <span class="deliv-tag">6.3 Average SERP Rank</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-microphone-lines"></i></div>
                    <h3 class="deliv-title">Multi-Facility Creator Space Showcase</h3>
                    <p class="deliv-desc">Interactive virtual tour highlighting dedicated audio podcast booths, green screen stages, expansive makeup suites, and editing lounges.</p>
                    <span class="deliv-tag">Studio Facility Tours</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-calendar-check"></i></div>
                    <h3 class="deliv-title">Direct Booking &amp; WhatsApp Gateway</h3>
                    <p class="deliv-desc">Frictionless inquiry funnels routing corporate clients and couples straight to studio availability schedules and direct consultation chats.</p>
                    <span class="deliv-tag">Instant Shoot Bookings</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ STUDIO SHOWCASE BANNER ═══════════════════════ -->
    <section class="case-section" style="padding-top: 0;">
        <div class="section-wrap">
            <div class="store-showcase-card">
                <div class="store-copy">
                    <div class="section-pill"><i class="fa-solid fa-camera"></i> THE TK FRAME PHILOSOPHY</div>
                    <h3>"We Don't Shoot Events. We Shoot Legacies."</h3>
                    <p>
                        Operating out of Anna Industrial Estate in Porur, Chennai, TK Cinematic Studio provides world-class cinema cameras, bespoke lighting rigs, and soundproof podcast suites built for visionary creators and couples.
                    </p>
                    <ul class="store-features-list">
                        <li><i class="fa-solid fa-check"></i> Cinematic Wedding Films</li>
                        <li><i class="fa-solid fa-check"></i> High-End Commercial Ads</li>
                        <li><i class="fa-solid fa-check"></i> Soundproof Podcast Suites</li>
                        <li><i class="fa-solid fa-check"></i> Model &amp; Fashion Portfolios</li>
                        <li><i class="fa-solid fa-check"></i> Dedicated Makeup Suites</li>
                        <li><i class="fa-solid fa-check"></i> 4K Zero-Buffer Showcase</li>
                    </ul>
                    <div class="hero-cta-group">
                        <a href="https://tkcinematicstudio.in/" target="_blank" rel="noopener noreferrer" class="btn-brand-primary">
                            <span>Explore Official Studio</span>
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                        <a href="https://wa.me/919944288611" target="_blank" rel="noopener noreferrer" class="btn-brand-secondary">
                            <i class="fa-brands fa-whatsapp" style="color: #25d366;"></i>
                            <span>WhatsApp Studio Desk</span>
                        </a>
                    </div>
                </div>

                <div class="store-visual-wrap">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/tk-cinematic-studio.png" alt="TK Cinematic Studio Showcase">
                    <div class="store-stat-pill-row">
                        <span class="badge-pill-orange"><i class="fa-solid fa-video"></i> 4K Showcase</span>
                        <span class="badge-pill-orange"><i class="fa-solid fa-star"></i> 7.9% CTR</span>
                        <span class="badge-pill-success"><i class="fa-solid fa-location-dot"></i> Porur Studio</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ SPECIALIST ATTRIBUTION ═══════════════════════ -->
    <section class="case-section" style="padding-top: 0;">
        <div class="section-wrap">
            <div class="specialist-attribution-card">
                <div class="specialist-head">
                    <div class="deliv-icon-box" style="margin-bottom: 0; width: 44px; height: 44px; font-size: 1.1rem;">
                        <i class="fa-solid fa-users-gear"></i>
                    </div>
                    <h4>Direct In-House Execution by Fusion X Specialists</h4>
                </div>
                <div class="specialists-grid">
                    <div class="specialist-pill-box">
                        <div class="spec-name"><i class="fa-solid fa-user-check" style="color: var(--brand-orange);"></i> Jabakumar</div>
                        <div class="spec-role">2 Years Experience</div>
                        <div class="spec-contrib">Visual Reel Sequence Curation &amp; Ultra-HD Showcase Art Direction</div>
                    </div>

                    <div class="specialist-pill-box">
                        <div class="spec-name"><i class="fa-solid fa-user-check" style="color: var(--brand-orange);"></i> Kannan S</div>
                        <div class="spec-role">2 Years Experience</div>
                        <div class="spec-contrib">Bespoke Theatre-Mode UI Engineering &amp; Fast CDN Stream Pipeline</div>
                    </div>

                    <div class="specialist-pill-box">
                        <div class="spec-name"><i class="fa-solid fa-user-check" style="color: var(--brand-orange);"></i> Saravana Sanjhay M</div>
                        <div class="spec-role">2 Years Experience</div>
                        <div class="spec-contrib">Structured VideoObject Metadata Architecture &amp; High-Intent Keyword Targeting (6.3 Pos)</div>
                    </div>

                    <div class="specialist-pill-box">
                        <div class="spec-name"><i class="fa-solid fa-user-check" style="color: var(--brand-orange);"></i> Jaiharan K</div>
                        <div class="spec-role">3 Years Experience</div>
                        <div class="spec-contrib">Cross-Device Framerate Auditing &amp; Zero-Latency Playback Performance QA</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CLIENT TESTIMONIAL ═══════════════════════ -->
    <section class="case-section" id="testimonial" style="background: #0b0b0b; padding-top: 20px;">
        <div class="section-wrap">
            <div class="testimonial-box">
                <div class="quote-icon-box">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                <div>
                    <p class="quote-text">
                        "Presenting our 4K footage without stutter on handheld screens was our biggest hurdle. Fusion X engineered a bespoke theatre-grade platform that plays our master cuts instantly, while commanding position #6 on Google for high-ticket commercial shoots. It has redefined how premium brands discover and book our studio."
                    </p>
                    <div class="quote-author-info">
                        <div>
                            <div class="quote-author-name">Lead Cinematographer</div>
                            <div class="quote-author-role">TK Cinematic Studio &bull; Film &amp; Creator Production Facility</div>
                        </div>
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
                    <h2 class="client-meta-title">Verified Partner: <span>TK Cinematic Studio</span></h2>
                    <p class="client-meta-desc">
                        A premier creative production hub in Chennai specializing in commercial films, luxury wedding cinematography, soundproof podcast rooms, model shoots, and complete media production.
                    </p>
                    <ul class="client-details-list">
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <div><strong>Studio Facility:</strong> Anna Industrial Estate, Porur, Chennai, Tamil Nadu 600116</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <div><strong>Direct Desk:</strong> <a href="tel:+919944288611" style="color: #ffffff; text-decoration: underline;">+91 9944288611</a></div>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <div><strong>Email:</strong> <a href="mailto:tkcinematicstudio06@gmail.com" style="color: #ffffff; text-decoration: underline;">tkcinematicstudio06@gmail.com</a></div>
                        </li>
                        <li>
                            <i class="fa-solid fa-globe"></i>
                            <div><strong>Official Web Platform:</strong> <a href="https://tkcinematicstudio.in/" target="_blank" rel="noopener noreferrer" style="color: var(--brand-orange-light); text-decoration: underline;">https://tkcinematicstudio.in/</a></div>
                        </li>
                    </ul>
                </div>

                <div class="client-action-col">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/tk/logo.png" alt="TK Cinematic Studio Official Logo" class="client-action-logo">
                    <a href="https://tkcinematicstudio.in/" target="_blank" rel="noopener noreferrer" class="btn-brand-primary" style="width: 100%; justify-content: center;">
                        <i class="fa-solid fa-external-link"></i>
                        <span>Visit Official Site</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ RELATED CASE STUDIES ═══════════════════════ -->
    <section class="case-section" style="padding-top: 0; padding-bottom: 80px;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-cubes"></i> EXPLORE CASE STUDIES</div>
                <h2 class="section-title">More High-Growth <span>Brand Stories</span></h2>
                <p class="section-desc">Discover how Fusion X delivers exponential scaling across leading Indian enterprises.</p>
            </div>

            <div class="deliverables-grid">
                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-motorcycle"></i></div>
                    <h3 class="deliv-title">Bikerz Module</h3>
                    <p class="deliv-desc">High-performance Shopify storefront: 96/100 speed index, 1.8s mobile load time, and 1,000+ gear SKUs.</p>
                    <a href="<?php echo esc_url( home_url( '/bikerz-module/' ) ); ?>" class="btn-brand-secondary" style="padding: 10px 18px; font-size: 0.85rem; width: fit-content;">Read Case Study &rarr;</a>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-utensils"></i></div>
                    <h3 class="deliv-title">Sridhar Food House</h3>
                    <p class="deliv-desc">Hyper-local street food scale: 40.6K+ accounts reached, ₹0.11 cost/interaction, and 120 direct chat leads.</p>
                    <a href="<?php echo esc_url( home_url( '/sridhar-food-house/' ) ); ?>" class="btn-brand-secondary" style="padding: 10px 18px; font-size: 0.85rem; width: fit-content;">Read Case Study &rarr;</a>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-wine-glass"></i></div>
                    <h3 class="deliv-title">Bhawani Corner Glassware</h3>
                    <p class="deliv-desc">India's #1 Glassware brand: 10x organic impressions, 900+ monthly calls, and #1 AI search dominance.</p>
                    <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="btn-brand-secondary" style="padding: 10px 18px; font-size: 0.85rem; width: fit-content;">Read Case Study &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FOOTER (Authentic Fusion X) ═══════════════════════ -->

<?php
get_footer();
