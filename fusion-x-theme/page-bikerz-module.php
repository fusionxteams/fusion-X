<?php
/**
 * Template Name: The Bikerz Module Case Study
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
            --brand-emerald: #10b981;
            --brand-cyan: #06b6d4;
            --brand-amber: #f59e0b;
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

        /* ── HERO SECTION ── */
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
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.35);
            color: #34d399;
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
            max-width: 620px;
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
            background: rgba(255, 87, 34, 0.06);
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

        .metric-pill-card .mp-number.emerald {
            color: #10b981;
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

        /* ── 3D RACING HELMET & ROTOR CANVAS STAGE ── */
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
            background: radial-gradient(circle at 50% 50%, rgba(255, 87, 34, 0.14) 0%, rgba(17, 17, 17, 0.95) 75%);
            border: 1px solid var(--border-glow);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8), inset 0 0 40px rgba(255, 87, 34, 0.12);
            overflow: hidden;
        }

        #helmet-canvas-container {
            width: 100%;
            height: 100%;
            cursor: grab;
        }

        #helmet-canvas-container:active {
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
            background: rgba(16, 185, 129, 0.18);
            border: 1px solid rgba(16, 185, 129, 0.45);
            color: #34d399;
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
            background: rgba(255, 87, 34, 0.2);
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

        /* ── CLIENT OVERVIEW CARD ── */
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
            object-fit: cover;
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
            background: rgba(255, 87, 34, 0.1);
            color: var(--brand-orange-light);
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid rgba(255, 87, 34, 0.25);
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
            background: linear-gradient(90deg, #ff5722, #10b981);
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

        .stat-num.emerald span {
            background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
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

        /* ── INTERACTIVE ELEVATION GRAPH COMPONENT ── */
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
            color: #34d399;
            background: rgba(16, 185, 129, 0.1);
            padding: 6px 14px;
            border-radius: 50px;
            border: 1px solid rgba(16, 185, 129, 0.3);
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
            filter: drop-shadow(0 4px 12px rgba(255, 87, 34, 0.45));
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
            min-width: 180px;
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
            color: #34d399;
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
            border: 1px solid rgba(16, 185, 129, 0.3);
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
            border: 1px solid rgba(255, 87, 34, 0.3);
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
            border: 1px solid rgba(255, 87, 34, 0.3);
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

        /* ── STORE PREVIEW & SHOWCASE ── */
        .store-showcase-card {
            background: linear-gradient(135deg, #0e0e0e 0%, #151515 100%);
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 44px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
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
            color: #10b981;
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

        /* ── TESTIMONIAL SECTION ── */
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
            border: 1px solid rgba(255, 87, 34, 0.3);
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

        /* ── FAQ SECTION ── */
        .faq-accordion {
            max-width: 900px;
            margin: 0 auto 60px;
        }

        .faq-item {
            background: var(--bg-card);
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            margin-bottom: 14px;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .faq-item:hover {
            border-color: rgba(255, 87, 34, 0.4);
        }

        .faq-item summary {
            padding: 20px 24px;
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff;
            cursor: pointer;
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
        }

        .faq-item summary::-webkit-details-marker {
            display: none;
        }

        .faq-item summary i {
            color: var(--brand-orange);
            transition: transform 0.3s ease;
        }

        .faq-item[open] summary i {
            transform: rotate(180deg);
        }

        .faq-item[open] {
            border-color: var(--brand-orange);
        }

        .faq-content {
            padding: 0 24px 22px;
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.7;
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
            .store-showcase-card {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .case-hero {
                padding: 110px 16px 50px;
                overflow: hidden;
            }
            .hero-container {
                grid-template-columns: 1fr;
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
    <section class="case-hero">
        <div class="hero-container">
            <div class="hero-text-col">
                <div class="breadcrumb-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house"></i> Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">Portfolio</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
                    <span>Bikerz Module</span>
                </div>

                <div class="hero-badge-wrap">
                    <span class="flagship-badge">
                        <i class="fa-brands fa-shopify"></i> SHOPIFY E-COMMERCE SCALE
                    </span>
                    <span class="heritage-pill">
                        <i class="fa-solid fa-bolt"></i> 96/100 Mobile Speed &bull; 1.8s
                    </span>
                </div>

                <h1 class="hero-headline">
                    Bikerz Module: <span class="highlight">96/100 Mobile Speed</span>, 1,000+ SKUs &amp; +40% Conversion Lift
                </h1>

                <p class="hero-subhead">
                    Revolutionizing India's premier motorcycle gear store. Fusion X architected a bespoke, lightweight Shopify storefront that cut mobile load latency down to 1.8 seconds, organized 1,000+ certified riding accessories, and generated an immediate +40% surge in completed mobile checkouts.
                </p>

                <div class="hero-metrics-strip">
                    <div class="metric-pill-card">
                        <div class="mp-number emerald">96/100</div>
                        <div class="mp-label">Mobile Speed Score</div>
                    </div>
                    <div class="metric-pill-card">
                        <div class="mp-number">1.8s</div>
                        <div class="mp-label">Mobile Load Time</div>
                    </div>
                    <div class="metric-pill-card">
                        <div class="mp-number">+40%</div>
                        <div class="mp-label">Conversion Speed Lift</div>
                    </div>
                    <div class="metric-pill-card">
                        <div class="mp-number">1,000+</div>
                        <div class="mp-label">Active Gear SKUs</div>
                    </div>
                </div>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-brand-primary">
                        <span>Explore Speed Elevation Graph</span>
                        <i class="fa-solid fa-arrow-down"></i>
                    </a>
                    <a href="https://bikerzmodule.in/" target="_blank" rel="noopener noreferrer" class="btn-brand-secondary">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span>Visit bikerzmodule.in</span>
                    </a>
                </div>
            </div>

            <!-- 3D Interactive Racing Helmet & Floating Rotor -->
            <div class="hero-visual-col">
                <div class="canvas-3d-wrap">
                    <div class="canvas-badge-overlay">
                        <i class="fa-solid fa-circle-check"></i> 96/100 LIGHTHOUSE
                    </div>
                    <div class="canvas-speed-badge">
                        <i class="fa-solid fa-gauge-high"></i> 1.8s LATENCY
                    </div>
                    <div id="helmet-canvas-container"></div>
                    <div class="canvas-3d-hint">
                        <i class="fa-solid fa-hand-pointer"></i> Drag to inspect 3D Racing Helmet &amp; Carbon Rotor
                    </div>
                </div>

                <div class="client-quick-card">
                    <div class="client-brand-group">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bikerz/logo.jpg" alt="Bikerz Module Logo" class="client-logo-avatar">
                        <div class="client-name-group">
                            <div class="cn-name">Bikerz Module</div>
                            <div class="cn-meta">Motorcycle Riding Gear &amp; Accessories Store</div>
                        </div>
                    </div>
                    <a href="https://bikerzmodule.in/" target="_blank" rel="noopener noreferrer" class="client-link-badge">
                        <span>Storefront</span>
                        <i class="fa-solid fa-external-link"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ 4 KEY KPI HIGHLIGHTS ═══════════════════════ -->
    <section class="case-section" style="padding-bottom: 20px;">
        <div class="section-wrap">
            <div class="stats-grid-row">
                <div class="stat-block">
                    <div class="stat-num emerald"><span>96 / 100</span></div>
                    <div class="stat-title">Mobile Speed Index Score</div>
                    <div class="stat-subtext">Propelled from a sluggish 42/100 baseline to top 1% of Shopify stores globally.</div>
                </div>
                <div class="stat-block">
                    <div class="stat-num"><span>1.8s</span></div>
                    <div class="stat-title">Sub-2s Mobile Load Time</div>
                    <div class="stat-subtext">Slashing initial page load from 5.4s to 1.8s on real 4G and 5G cellular networks.</div>
                </div>
                <div class="stat-block">
                    <div class="stat-num"><span>+40%</span></div>
                    <div class="stat-title">Checkout Conversion Boost</div>
                    <div class="stat-subtext">Zero-friction AJAX slide-out cart with instant UPI & WhatsApp order processing.</div>
                </div>
                <div class="stat-block">
                    <div class="stat-num"><span>1,000+</span></div>
                    <div class="stat-title">Riding Gear & Accessories SKUs</div>
                    <div class="stat-subtext">Seamless faceted filtering across DOT/ECE helmets, jackets, gloves, and bike parts.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ INTERACTIVE PERFORMANCE ELEVATION GRAPH ═══════════════════════ -->
    <section class="case-section" id="interactive-graph">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-arrow-trend-up"></i> INFRASTRUCTURE AUDIT</div>
                <h2 class="section-title">Verified Shopify Speed &amp; <span>Elevation Graph</span></h2>
                <p class="section-desc">
                    Examine 6-phase technical infrastructure optimization curves: Google Lighthouse performance metrics, page load latency reduction, and mobile conversion velocity.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-controls">
                    <div class="graph-metric-tabs">
                        <button class="metric-tab-btn active" data-metric="speed">
                            <i class="fa-solid fa-gauge-high"></i> Mobile Speed Score (42 &rarr; 96)
                        </button>
                        <button class="metric-tab-btn" data-metric="latency">
                            <i class="fa-solid fa-stopwatch"></i> Load Latency (5.4s &rarr; 1.8s)
                        </button>
                        <button class="metric-tab-btn" data-metric="conversions">
                            <i class="fa-solid fa-cart-shopping"></i> Checkout Velocity (+40%)
                        </button>
                    </div>
                    <div class="graph-source-note">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Source: Google Lighthouse &amp; Shopify Analytics Audit</span>
                    </div>
                </div>

                <!-- SVG Interactive Chart Container -->
                <div class="chart-svg-container" id="chart-container">
                    <svg id="elevation-svg" viewBox="0 0 1000 360" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="bikerzAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#10b981" stop-opacity="0.55"/>
                                <stop offset="60%" stop-color="#10b981" stop-opacity="0.12"/>
                                <stop offset="100%" stop-color="#10b981" stop-opacity="0"/>
                            </linearGradient>
                            <linearGradient id="latencyAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
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
                        <div id="tooltip-phase" style="font-weight: 700; color: #ff5722;"></div>
                        <div id="tooltip-value" style="font-size: 1.1rem; font-weight: 900; color: #ffffff;"></div>
                        <div id="tooltip-note" style="font-size: 0.75rem; color: #94a3b8;"></div>
                    </div>
                </div>

                <!-- Clickable Checkpoint Milestones -->
                <div class="checkpoints-header">
                    <i class="fa-solid fa-flag-checkered"></i> 6-Phase Optimization Checkpoints &amp; Milestones
                </div>

                <div class="checkpoints-timeline">
                    <div class="checkpoint-card" data-index="0">
                        <div>
                            <div class="cp-month">PHASE 1</div>
                            <div class="cp-title">Audit Baseline</div>
                            <div class="cp-metric">42 / 100 • 5.4s Latency</div>
                        </div>
                        <div class="cp-desc">Heavy marketplace theme with bloated CSS/JS bundles and high mobile bounce rates.</div>
                    </div>

                    <div class="checkpoint-card" data-index="1">
                        <div>
                            <div class="cp-month">PHASE 2</div>
                            <div class="cp-title">Script Deferral</div>
                            <div class="cp-metric">68 / 100 • 3.6s Latency</div>
                        </div>
                        <div class="cp-desc">Deferred non-essential apps and inlined critical path rendering stylesheets.</div>
                    </div>

                    <div class="checkpoint-card" data-index="2">
                        <div>
                            <div class="cp-month">PHASE 3</div>
                            <div class="cp-title">Liquid Theme Clean</div>
                            <div class="cp-metric">82 / 100 • 2.7s Latency</div>
                        </div>
                        <div class="cp-desc">Rewrote storefront in custom modular Shopify Liquid, purging 14 legacy snippets.</div>
                    </div>

                    <div class="checkpoint-card" data-index="3">
                        <div>
                            <div class="cp-month">PHASE 4</div>
                            <div class="cp-title">WebP &amp; Responsive Media</div>
                            <div class="cp-metric">91 / 100 • 2.1s Latency</div>
                        </div>
                        <div class="cp-desc">Automated next-gen WebP compression, dropping total page asset weight by 64%.</div>
                    </div>

                    <div class="checkpoint-card" data-index="4">
                        <div>
                            <div class="cp-month">PHASE 5</div>
                            <div class="cp-title">Product Schema &amp; Preload</div>
                            <div class="cp-metric">94 / 100 • 1.85s Latency</div>
                        </div>
                        <div class="cp-desc">Integrated JSON-LD rich snippets and browser preloading for critical helmet assets.</div>
                    </div>

                    <div class="checkpoint-card active" data-index="5">
                        <div>
                            <div class="cp-month">PHASE 6</div>
                            <div class="cp-title">Peak Mobile Scale</div>
                            <div class="cp-metric">96 / 100 • 1.80s Record</div>
                        </div>
                        <div class="cp-desc">🏆 Top 1% Lighthouse speed achieved, handling 1,000+ SKUs with +40% checkout conversion.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ COMPARISON TABLES ═══════════════════════ -->
    <section class="case-section" style="padding-top: 20px;">
        <div class="section-wrap">
            <div class="tables-section-wrap">
                <!-- Table 1: Technical Speed Performance -->
                <div class="comparison-table-card">
                    <div class="table-card-head">
                        <h3 class="table-card-title">
                            <i class="fa-solid fa-microchip"></i>
                            E-Commerce Catalog Scale &amp; Speed Performance
                        </h3>
                        <span class="badge-pill-success">
                            <i class="fa-solid fa-circle-check"></i> Google Lighthouse Verified
                        </span>
                    </div>
                    <div class="table-scroll-wrapper">
                        <table class="custom-data-table">
                            <thead>
                                <tr>
                                    <th>Performance Benchmark</th>
                                    <th>Legacy Storefront Baseline</th>
                                    <th>Engineered Result</th>
                                    <th>Commercial Dividend</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Handheld Page Render Latency</strong></td>
                                    <td style="color: #f87171;">5.4s (Initial Audit)</td>
                                    <td><span class="badge-pill-success">1.8s Record Speed</span></td>
                                    <td><span class="badge-pill-orange">66% Latency Reduction</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Google Lighthouse Speed Index</strong></td>
                                    <td style="color: #f87171;">42 / 100 Baseline</td>
                                    <td><span class="badge-pill-success">96 / 100 Score</span></td>
                                    <td><span class="badge-pill-orange">+54 Point Elevation</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Live Inventory &amp; SKU Breadth</strong></td>
                                    <td>150 Products</td>
                                    <td><span class="badge-pill-success">1,000+ Verified SKUs</span></td>
                                    <td><span class="badge-pill-success">6.6x Inventory Expansion</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Faceted Filter &amp; Search Execution</strong></td>
                                    <td style="color: #f87171;">Sluggish Table Grid</td>
                                    <td><span class="badge-pill-success">Sub-Second Fluid Catalog</span></td>
                                    <td><span class="badge-pill-success">Zero Latency Navigation</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Mobile Checkout Flow</strong></td>
                                    <td style="color: #f87171;">Multi-Page Drop-Off Funnel</td>
                                    <td><span class="badge-pill-success">1-Click Slide-Out Cart</span></td>
                                    <td><span class="badge-pill-orange">+40% Conversion Lift</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Product Media Weight Optimization</strong></td>
                                    <td style="color: #f87171;">Uncompressed Files (4.2 MB)</td>
                                    <td><span class="badge-pill-success">Next-Gen WebP (1.5 MB)</span></td>
                                    <td><span class="badge-pill-success">64% Payload Slashing</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 2: Architecture & SEO Comparison -->
                <div class="comparison-table-card">
                    <div class="table-card-head">
                        <h3 class="table-card-title">
                            <i class="fa-solid fa-code"></i>
                            Custom Shopify Liquid vs Marketplace Theme Comparison
                        </h3>
                        <span class="badge-pill-orange">
                            <i class="fa-solid fa-code-fork"></i> Bespoke Architecture
                        </span>
                    </div>
                    <div class="table-scroll-wrapper">
                        <table class="custom-data-table">
                            <thead>
                                <tr>
                                    <th>Infrastructure Component</th>
                                    <th>Standard Off-The-Shelf Theme</th>
                                    <th>Custom Modular Shopify Architecture</th>
                                    <th>Measurable Benefit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Script &amp; Asset Overhead</strong></td>
                                    <td style="color: #f87171;">45+ Unused CSS/JS Dependencies</td>
                                    <td><span class="badge-pill-success">Lean Handcrafted Liquid Templates</span></td>
                                    <td><span class="badge-pill-orange">Lightning-Fast First Paint</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Search Schema Integration</strong></td>
                                    <td style="color: #f87171;">Sparse Standard Metadata</td>
                                    <td><span class="badge-pill-success">Deep JSON-LD Product &amp; Review Schema</span></td>
                                    <td><span class="badge-pill-success">Google Shopping Rich Snippets</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Bike Model Compatibility Filtering</strong></td>
                                    <td style="color: #f87171;">Full Page Refresh Per Selection</td>
                                    <td><span class="badge-pill-success">Dynamic AJAX Facet Filtering</span></td>
                                    <td><span class="badge-pill-orange">Frictionless Part Selection</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Mobile Cart Abandonment</strong></td>
                                    <td style="color: #f87171;">68% Abandonment Rate</td>
                                    <td><span class="badge-pill-success">26% Drop-Off Benchmark</span></td>
                                    <td><span class="badge-pill-success">+42% Cart Retention</span></td>
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
                <div class="section-pill"><i class="fa-solid fa-list-check"></i> FULL-STACK DELIVERABLES</div>
                <h2 class="section-title">Engineered For <span>Scale &amp; Speed</span></h2>
                <p class="section-desc">
                    Comprehensive full-stack Shopify e-commerce deliverables built to withstand high-volume traffic surges, flash sales, and extensive accessory catalogs.
                </p>
            </div>

            <div class="deliverables-grid">
                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-brands fa-shopify"></i></div>
                    <h3 class="deliv-title">Custom Shopify Liquid Storefront</h3>
                    <p class="deliv-desc">Handcrafted responsive theme written from scratch with zero dependency on bloated page builders, ensuring pristine markup and minimal DOM depth.</p>
                    <span class="deliv-tag">Bespoke Liquid Theme</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-gauge-high"></i></div>
                    <h3 class="deliv-title">Speed &amp; Script Optimization</h3>
                    <p class="deliv-desc">Inlined critical CSS, deferred third-party tracking tags, and eliminated render-blocking JavaScript to achieve a 1.8s mobile load time.</p>
                    <span class="deliv-tag">96/100 Mobile Score</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-file-image"></i></div>
                    <h3 class="deliv-title">Automated WebP Compression</h3>
                    <p class="deliv-desc">Next-generation responsive picture elements with automated WebP conversion and lazy-loading, slashing page weight by 64% across 1,000+ SKUs.</p>
                    <span class="deliv-tag">64% Weight Reduction</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-cart-arrow-down"></i></div>
                    <h3 class="deliv-title">AJAX Slide-Out Drawer Cart</h3>
                    <p class="deliv-desc">Sub-second cart drawer with real-time stock verification, instant discount calculation, and seamless 1-tap checkout with UPI integration.</p>
                    <span class="deliv-tag">+40% Conversion Lift</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                    <h3 class="deliv-title">Product Schema.org Structured Data</h3>
                    <p class="deliv-desc">Comprehensive JSON-LD Product, AggregateRating, and Offer markup unlocking Google Shopping carousels, review star snippets, and rich results.</p>
                    <span class="deliv-tag">Rich Search Snippets</span>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-sliders"></i></div>
                    <h3 class="deliv-title">Faceted Gear &amp; Safety Filters</h3>
                    <p class="deliv-desc">Dynamic multi-facet filtering allowing riders to sort by helmet safety certifications (DOT, ECE, ISI), jacket armor levels, and bike model compatibility.</p>
                    <span class="deliv-tag">1,000+ SKUs Filtered</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ STORE SHOWCASE BANNER ═══════════════════════ -->
    <section class="case-section" style="padding-top: 0;">
        <div class="section-wrap">
            <div class="store-showcase-card">
                <div class="store-copy">
                    <div class="section-pill"><i class="fa-solid fa-motorcycle"></i> OFFICIAL DIGITAL SHOWROOM</div>
                    <h3>Engineered for High-Octane Riders &amp; Automotive Enthusiasts</h3>
                    <p>
                        From certified full-face racing helmets and CE-rated armored riding jackets to precision aftermarket motorcycle accessories, Bikerz Module delivers premium gear across India through a high-speed Shopify storefront.
                    </p>
                    <ul class="store-features-list">
                        <li><i class="fa-solid fa-check"></i> DOT / ECE / ISI Certified Gear</li>
                        <li><i class="fa-solid fa-check"></i> Sub-2s Mobile Loading</li>
                        <li><i class="fa-solid fa-check"></i> 1-Tap UPI &amp; Card Processing</li>
                        <li><i class="fa-solid fa-check"></i> WhatsApp Order Verification</li>
                        <li><i class="fa-solid fa-check"></i> All-India Secure Shipping</li>
                        <li><i class="fa-solid fa-check"></i> Precision Vehicle Fitment</li>
                    </ul>
                    <div class="hero-cta-group">
                        <a href="https://bikerzmodule.in/" target="_blank" rel="noopener noreferrer" class="btn-brand-primary">
                            <span>Launch Bikerz Module Storefront</span>
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                        <a href="https://wa.me/919600096973" target="_blank" rel="noopener noreferrer" class="btn-brand-secondary">
                            <i class="fa-brands fa-whatsapp" style="color: #25d366;"></i>
                            <span>Chat with Lead Engineers</span>
                        </a>
                    </div>
                </div>

                <div class="store-visual-wrap">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/the-bikerz-module.jpg" alt="Bikerz Module Storefront Showcase">
                    <div class="store-stat-pill-row">
                        <span class="badge-pill-success"><i class="fa-solid fa-shield-halved"></i> Certified Gear</span>
                        <span class="badge-pill-orange"><i class="fa-solid fa-gauge-high"></i> 1.8s Speed</span>
                        <span class="badge-pill-success"><i class="fa-brands fa-shopify"></i> Shopify Core</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FREQUENTLY ASKED QUESTIONS ═══════════════════════ -->
    <section class="case-section" style="padding-top: 0;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-circle-question"></i> PERFORMANCE INSIGHTS</div>
                <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
                <p class="section-desc">
                    Technical rationale and optimization insights behind the Bikerz Module e-commerce transformation.
                </p>
            </div>

            <div class="faq-accordion">
                <details class="faq-item" open>
                    <summary>
                        <span>What role did sub-2-second speed play in driving Bikerz Module's sales surge?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </summary>
                    <div class="faq-content">
                        In mobile retail, prolonged page rendering causes instant buyer drop-off. By accelerating Bikerz Module's response time from an initial 5.4s baseline down to an ultra-lean 1.8s, riders browsed premium protective gear, DOT-certified helmets, and technical jackets without waiting, directly boosting finished mobile purchases by +40%.
                    </div>
                </details>

                <details class="faq-item">
                    <summary>
                        <span>Why did the engineering team build a bespoke Liquid codebase instead of using a commercial theme?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </summary>
                    <div class="faq-content">
                        Commercial marketplace templates are packaged with heavy visual builders and dozens of bloated vendor scripts that severely handicap mobile performance. Constructing a custom Shopify Liquid architecture gave us complete control over asset sequencing, clean DOM nesting, and bespoke motorcycle model compatibility filters without any bloat.
                    </div>
                </details>

                <details class="faq-item">
                    <summary>
                        <span>How was structured data deployed to elevate organic visibility for protective gear?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </summary>
                    <div class="faq-content">
                        We incorporated thorough JSON-LD structured schema across the entire 1,000+ SKU catalog, detailing product variations, live pricing, stock status, official ISI/ECE safety accreditations, and customer feedback. This allows Google search bots to showcase rich star ratings and pricing tags directly inside organic results and Google Shopping listings.
                    </div>
                </details>
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
                        "The transformation has been extraordinary. Our riders now navigate a massive 1,000+ product catalog on their phones with zero delay. Achieving a 1.8s load speed and 96/100 Lighthouse score directly translated into a 40% jump in completed sales."
                    </p>
                    <div class="quote-author-info">
                        <div>
                            <div class="quote-author-name">Founder</div>
                            <div class="quote-author-role">Bikerz Module &bull; Motorcycle Riding Gear &amp; Accessories</div>
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
                    <h2 class="client-meta-title">Verified Partner: <span>Bikerz Module</span></h2>
                    <p class="client-meta-desc">
                        A leading Indian motorcycle enthusiast destination curating safety-tested track helmets, impact-resistant protective jackets, racing gloves, and bespoke performance accessories shipped nationwide.
                    </p>
                    <ul class="client-details-list">
                        <li>
                            <i class="fa-solid fa-store"></i>
                            <div><strong>Platform:</strong> Shopify Liquid E-Commerce Storefront</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-shield-halved"></i>
                            <div><strong>Specialty:</strong> DOT / ECE / ISI Certified Helmets &amp; Superbike Gear</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-globe"></i>
                            <div><strong>Official Store:</strong> <a href="https://bikerzmodule.in/" target="_blank" rel="noopener noreferrer" style="color: var(--brand-orange-light); text-decoration: underline;">https://bikerzmodule.in/</a></div>
                        </li>
                        <li>
                            <i class="fa-solid fa-laptop-code"></i>
                            <div><strong>Lead Engineers:</strong> Kannan S &amp; Saravana Sanjhay M (Fusion X)</div>
                        </li>
                    </ul>
                </div>

                <div class="client-action-col">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bikerz/logo.jpg" alt="Bikerz Module Official Logo" class="client-action-logo">
                    <a href="https://bikerzmodule.in/" target="_blank" rel="noopener noreferrer" class="btn-brand-primary" style="width: 100%; justify-content: center;">
                        <i class="fa-solid fa-external-link"></i>
                        <span>Visit Store</span>
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
                    <div class="deliv-icon-box"><i class="fa-solid fa-wine-glass"></i></div>
                    <h3 class="deliv-title">Bhawani Corner Glassware</h3>
                    <p class="deliv-desc">India's #1 Glassware brand: 10x organic impressions, 900+ monthly calls, and #1 AI Search dominance.</p>
                    <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="btn-brand-secondary" style="padding: 10px 18px; font-size: 0.85rem; width: fit-content;">Read Case Study &rarr;</a>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-shirt"></i></div>
                    <h3 class="deliv-title">Off Human Apparel</h3>
                    <p class="deliv-desc">Avant-garde D2C streetwear label: 4.2x drop-day ROAS, sub-second drawer cart, and 2.0s load speed.</p>
                    <a href="<?php echo esc_url( home_url( '/off-human/' ) ); ?>" class="btn-brand-secondary" style="padding: 10px 18px; font-size: 0.85rem; width: fit-content;">Read Case Study &rarr;</a>
                </div>

                <div class="deliverable-card">
                    <div class="deliv-icon-box"><i class="fa-solid fa-mug-hot"></i></div>
                    <h3 class="deliv-title">Nilaro Filter Coffee</h3>
                    <p class="deliv-desc">Premium South Indian filter coffee: 42.6K monthly impressions, 4.8x organic growth, and conversational AI.</p>
                    <a href="<?php echo esc_url( home_url( '/nilaro/' ) ); ?>" class="btn-brand-secondary" style="padding: 10px 18px; font-size: 0.85rem; width: fit-content;">Read Case Study &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
