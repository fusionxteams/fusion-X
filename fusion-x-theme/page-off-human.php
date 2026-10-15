<?php
/**
 * Template Name: Off Human Case Study
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
            --brand-indigo: #6366f1;
            --brand-indigo-light: #818cf8;
            --brand-indigo-glow: rgba(99, 102, 241, 0.4);
            --brand-emerald: #10b981;
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

        .hero-headline .highlight-streetwear {
            background: linear-gradient(135deg, #818cf8 0%, #c084fc 100%);
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
            color: #ffffff !important;
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
            color: #ffffff !important;
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
            color: var(--brand-orange) !important;
        }

        /* 3D Showcase Stage */
        .stage-3d-wrapper {
            position: relative;
            width: 100%;
            height: 480px;
            background: radial-gradient(circle at center, rgba(99, 102, 241, 0.18) 0%, rgba(255, 87, 34, 0.1) 40%, rgba(18, 18, 18, 0.7) 75%);
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), inset 0 0 40px rgba(99, 102, 241, 0.08);
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
            height: 38px;
            width: 38px;
            background: #ffffff;
            padding: 3px;
            border-radius: 50%;
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
            font-size: 0.92rem;
            color: #ffffff;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stage-client-sub {
            font-size: 0.74rem;
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

        .stat-num span.indigo {
            color: var(--brand-indigo-light);
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
            line-height: 1.45;
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
            color: #ffffff !important;
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
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
        }

        .checkpoint-card {
            background: #141414;
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 18px 16px;
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
            font-size: 0.74rem;
            font-weight: 800;
            color: var(--brand-orange);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .cp-title {
            font-family: 'Outfit', sans-serif;
            font-size: 0.98rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .cp-metric {
            font-size: 0.85rem;
            font-weight: 800;
            color: #cbd5e1;
            margin-bottom: 8px;
        }

        .cp-desc {
            font-size: 0.78rem;
            color: var(--text-muted);
            line-height: 1.45;
        }

        /* ── PERFORMANCE COMPARISON TABLES ── */
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

        .table-pill.indigo {
            background: rgba(99, 102, 241, 0.15);
            color: #818cf8;
            border: 1px solid rgba(99, 102, 241, 0.35);
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

        /* ── FAQ ACCORDION ── */
        .faq-grid {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 36px;
        }

        .faq-item {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: rgba(255, 87, 34, 0.35);
        }

        .faq-question {
            padding: 22px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            user-select: none;
        }

        .faq-chevron {
            color: var(--brand-orange);
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-chevron {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            background: #0d0d0d;
        }

        .faq-answer-inner {
            padding: 0 28px 24px;
            font-size: 0.95rem;
            color: #94a3b8;
            line-height: 1.7;
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
            color: #ffffff;
            margin: 0 0 18px;
            font-style: italic;
        }

        .quote-author-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .quote-author-name {
            font-weight: 800;
            font-size: 1.05rem;
            color: #ffffff;
        }

        .quote-author-role {
            font-size: 0.85rem;
            color: var(--brand-orange-light);
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
            .deliverables-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .checkpoints-timeline {
                grid-template-columns: repeat(3, 1fr);
            }
            .client-info-banner {
                grid-template-columns: 1fr;
            }
            .testimonial-box {
                grid-template-columns: 1fr;
                gap: 20px;
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
                height: 32px;
                width: 32px;
            }
            .stage-client-title {
                font-size: 0.82rem;
            }
            .stage-client-sub {
                font-size: 0.68rem;
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
            .table-card {
                padding: 20px 12px;
                border-radius: 16px;
            }
            .deliverables-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            .checkpoints-timeline {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .graph-card {
                padding: 20px 14px;
            }
            .chart-svg-container {
                height: 260px;
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
                    <span>Off Human Apparel</span>
                </div>

                <div class="hero-badge-wrap">
                    <div class="flagship-badge">
                        <i class="fa-solid fa-star"></i> FLAGSHIP CLIENT CASE STUDY
                    </div>
                    <div class="heritage-pill">
                        <i class="fa-solid fa-shirt" style="color: #818cf8;"></i> D2C Streetwear &amp; Apparel
                    </div>
                    <div class="heritage-pill">
                        <i class="fa-solid fa-bolt" style="color: #ff5722;"></i> 4.2x Drop-Day Conversion
                    </div>
                </div>

                <h1 class="hero-headline">
                    Off Human Apparel: <span class="highlight">4.2x Drop ROAS</span> &amp; <span class="highlight-streetwear">+50% Inquiries Surge</span>
                </h1>

                <p class="hero-subhead">
                    Empowering an avant-garde urban streetwear label to scale. Fusion X engineered a high-velocity editorial storefront with frictionless slide-out bag interactions, viral Instagram Reels creative strategy, and direct server-to-server Meta tracking that yielded a 4.2x ROAS and +50% custom fashion inquiries.
                </p>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-primary-orange">
                        <span>Explore Growth Graph</span> <i class="fa-solid fa-chart-line"></i>
                    </a>
                    <a href="#campaign-audit" class="btn-secondary-dark">
                        <i class="fa-solid fa-table"></i> View Drop Performance
                    </a>
                    <a href="https://offhuman.com/" target="_blank" rel="noopener noreferrer" class="btn-secondary-dark">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Visit Official Store
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-secondary-dark">
                        <i class="fa-solid fa-calendar-check"></i> Book Strategy Call
                    </a>
                </div>
            </div>

            <!-- 3D Interactive Stage -->
            <div class="hero-visual-col">
                <div class="stage-3d-wrapper">
                    <div id="three-canvas-container"></div>
                    <div class="stage-hint-pill">
                        <i class="fa-solid fa-arrows-rotate"></i>
                        <span>Drag 3D Streetwear Emblem</span>
                    </div>
                    <div class="stage-overlay-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/off-human/logo.jpg" alt="Off Human Apparel Logo" class="stage-client-logo">
                        <div class="stage-client-text">
                            <div class="stage-client-title">Off Human Apparel</div>
                            <div class="stage-client-sub">Streetwear &amp; Fashion &bull; Verified Partner</div>
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
                <div class="stat-num"><span>4.2x</span></div>
                <div class="stat-title">Drop Day Conversion Rate</div>
                <div class="stat-subtext">Flash sales and limited capsule drops sold out within 48 to 96 hours</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span class="indigo">+50%</span></div>
                <div class="stat-title">Lookbook Inquiries Boost</div>
                <div class="stat-subtext">Direct custom styling orders and pre-drop reservations via website</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span>2.0s</span></div>
                <div class="stat-title">Mobile Load Speed</div>
                <div class="stat-subtext">63% faster FCP from 5.4s baseline with lossless WebP &amp; CDN prefetch</div>
            </div>
            <div class="stat-block">
                <div class="stat-num"><span>45%</span></div>
                <div class="stat-title">Repeat Streetwear Buyers</div>
                <div class="stat-subtext">Loyal community repurchasing across new seasonal collection capsules</div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ INTERACTIVE PERFORMANCE ELEVATION GRAPH ═══════════════════════ -->
    <section class="case-section" id="interactive-graph">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-arrow-trend-up"></i> REAL PERFORMANCE AUDIT</div>
                <h2 class="section-title">Verified Drop Growth &amp; <span>Elevation Graph</span></h2>
                <p class="section-desc">
                    Examine verified multi-phase drop performance across Shopify and Meta Ads Manager. Tracking how Fusion X transitioned Off Human from an unindexed concept to high-velocity sold-out capsule releases.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-controls">
                    <div class="graph-metric-tabs">
                        <button class="metric-tab-btn active" data-metric="revenue">
                            <i class="fa-solid fa-indian-rupee-sign"></i> Drop Revenue (₹K)
                        </button>
                        <button class="metric-tab-btn" data-metric="queries">
                            <i class="fa-solid fa-shirt"></i> Monthly Lookbook Inquiries
                        </button>
                        <button class="metric-tab-btn" data-metric="community">
                            <i class="fa-solid fa-users"></i> Streetwear Community
                        </button>
                    </div>
                    <div class="graph-source-note">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Source: Verified Shopify Analytics &amp; Meta Ads Manager Audit</span>
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
                    <i class="fa-solid fa-flag-checkered"></i> Strategic Capsule Drop Milestones
                </div>

                <div class="checkpoints-timeline">
                    <div class="checkpoint-card" data-index="0">
                        <div>
                            <div class="cp-month">PHASE 1 (IDENTITY)</div>
                            <div class="cp-title">Brand Aesthetics &amp; Store Setup</div>
                            <div class="cp-metric">₹45K Rev • 2.1K Community</div>
                        </div>
                        <div class="cp-desc">Monochrome brutalist lookbook layout and baseline Shopify architecture setup.</div>
                    </div>

                    <div class="checkpoint-card" data-index="1">
                        <div>
                            <div class="cp-month">PHASE 2 (DROP 01)</div>
                            <div class="cp-title">Limited Hoodie Capsule</div>
                            <div class="cp-metric">₹92K Rev (+104%) • 4.8K Comm</div>
                        </div>
                        <div class="cp-desc">First limited drop campaign selling out initial inventory batch in 6 days.</div>
                    </div>

                    <div class="checkpoint-card" data-index="2">
                        <div>
                            <div class="cp-month">PHASE 3 (SPEED)</div>
                            <div class="cp-title">Hype Reels &amp; 2.0s Tuning</div>
                            <div class="cp-metric">₹160K Rev (+74%) • 8.5K Comm</div>
                        </div>
                        <div class="cp-desc">Underground culture video reels, creator seeding, and CDN prefetching deployed.</div>
                    </div>

                    <div class="checkpoint-card" data-index="3">
                        <div>
                            <div class="cp-month">PHASE 4 (DROP 02)</div>
                            <div class="cp-title">Drawer Cart &amp; Capsule 02</div>
                            <div class="cp-metric">₹245K Rev (+53%) • 14.2K Comm</div>
                        </div>
                        <div class="cp-desc">Sub-second slide-out AJAX drawer cart cut drop-day friction, selling out in 4 days.</div>
                    </div>

                    <div class="checkpoint-card" data-index="4">
                        <div>
                            <div class="cp-month">PHASE 5 (CAPI ADS)</div>
                            <div class="cp-title">Meta Dynamic Catalog Retargeting</div>
                            <div class="cp-metric">₹340K Rev (+39%) • 21K Comm</div>
                        </div>
                        <div class="cp-desc">Server-side Conversions API integration guaranteeing 100% accurate event attribution.</div>
                    </div>

                    <div class="checkpoint-card active" data-index="5">
                        <div>
                            <div class="cp-month">PHASE 6 (SCALE DROP)</div>
                            <div class="cp-title">Flagship Capsule Sold Out</div>
                            <div class="cp-metric">₹480K Peak Rev • 31.5K Comm</div>
                        </div>
                        <div class="cp-desc">Flagship seasonal drop sold out in 48 hours with 4.2x peak Meta ROAS.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ DETAILED CAMPAIGN AUDIT & PERFORMANCE TABLES ═══════════════════════ -->
    <section class="case-section" id="campaign-audit" style="background: #090909; padding-top: 40px;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-table"></i> VERIFIED METRIC AUDIT</div>
                <h2 class="section-title">Baseline vs. <span>Post-Optimization Result</span></h2>
                <p class="section-desc">
                    Verified performance data before and after the minimalist storefront redesign, slide-out drawer cart, and server-side tracking implementation.
                </p>
            </div>

            <!-- Table 1: Technical & Business Metric Optimization -->
            <div class="table-card">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.3rem; margin: 0 0 20px; color: #ffffff; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-chart-line" style="color: #ff5722;"></i> Storefront Telemetry &amp; Growth Benchmarks
                </h3>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Growth &amp; Technical Benchmark</th>
                            <th>Legacy Store Performance</th>
                            <th>Optimized Drop Telemetry</th>
                            <th>Commercial Upside</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Direct Custom Orders &amp; Inquiries</strong></td>
                            <td>12 Monthly Queries</td>
                            <td><span class="table-pill green">18+ Inquiries / Month</span></td>
                            <td><span class="table-pill orange">↑ +50% Inbound Surge</span></td>
                        </tr>
                        <tr>
                            <td><strong>Mobile First Contentful Paint</strong></td>
                            <td>5.4s (Severe Bounce Risk)</td>
                            <td><span class="table-pill green">2.0s Record Load</span></td>
                            <td><span class="table-pill green">63% Latency Drop</span></td>
                        </tr>
                        <tr>
                            <td><strong>Handheld Cart Flow</strong></td>
                            <td>Clunky Multistep Navigation</td>
                            <td><span class="table-pill indigo">Instant AJAX Slide-Out Cart</span></td>
                            <td><span class="table-pill green">Seamless Checkout Routing</span></td>
                        </tr>
                        <tr>
                            <td><strong>Google Rich Results Architecture</strong></td>
                            <td>Unindexed Plain Markup</td>
                            <td><span class="table-pill green">JSON-LD Apparel &amp; Offer Schema</span></td>
                            <td><span class="table-pill orange">Enhanced Google SERP Placement</span></td>
                        </tr>
                        <tr>
                            <td><strong>Drop Day Conversion Rate</strong></td>
                            <td>1.0% Baseline Conversion</td>
                            <td><span class="table-pill orange">4.2x Drop-Day Conversion</span></td>
                            <td><span class="table-pill orange">↑ 320% Revenue Lift</span></td>
                        </tr>
                        <tr>
                            <td><strong>Repeat Streetwear Customer Rate</strong></td>
                            <td>16% Returning Shoppers</td>
                            <td><span class="table-pill green">45% Loyal Returning Buyers</span></td>
                            <td><span class="table-pill indigo">↑ 29% Retention Surge</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table 2: Multi-Channel Architecture Execution -->
            <div class="table-card">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.3rem; margin: 0 0 20px; color: #ffffff; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-network-wired" style="color: #818cf8;"></i> Streetwear E-Commerce &amp; Drop Funnel Architecture
                </h3>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Platform Component</th>
                            <th>Architecture Implemented</th>
                            <th>Conversion Mechanism</th>
                            <th>Measured Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong style="color: #818cf8;"><i class="fa-solid fa-images"></i> Editorial Lookbook Grid</strong></td>
                            <td>Asymmetrical masonry collection layout pairing styled models with garment tags</td>
                            <td>One-click garment detail preview without page reloads</td>
                            <td><span class="table-pill indigo">+50% Lookbook Queries</span></td>
                        </tr>
                        <tr>
                            <td><strong style="color: #ff7043;"><i class="fa-solid fa-cart-shopping"></i> Sub-Second Drawer Cart</strong></td>
                            <td>High-speed AJAX cart drawer with real-time sizing &amp; instant promo codes</td>
                            <td>Zero-friction slide-out checkout redirects</td>
                            <td><span class="table-pill green">4.2x Drop-Day Conversion</span></td>
                        </tr>
                        <tr>
                            <td><strong style="color: #10b981;"><i class="fa-brands fa-meta"></i> Meta Conversions API (CAPI)</strong></td>
                            <td>Direct server-side event pipeline bypassing browser ad-blockers and iOS restrictions</td>
                            <td>100% accurate purchase, add-to-cart, and view content attribution</td>
                            <td><span class="table-pill orange">4.2x Meta Ads ROAS</span></td>
                        </tr>
                        <tr>
                            <td><strong style="color: #3b82f6;"><i class="fa-solid fa-server"></i> Flash-Drop CDN Edge Caching</strong></td>
                            <td>Global Cloudflare CDN edge rules with lossless WebP compression and prefetching</td>
                            <td>Stateless session routing handling thousands of concurrent buyers</td>
                            <td><span class="table-pill green">2.0s Speed During Flash Drops</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ WHAT FUSION X DELIVERED ═══════════════════════ -->
    <section class="case-section" id="deliverables">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-screwdriver-wrench"></i> FULL-STACK DELIVERABLES</div>
                <h2 class="section-title">What Fusion X <span>Engineered</span></h2>
                <p class="section-desc">
                    An end-to-end e-commerce and creative ecosystem designed to elevate brand perception and convert hype into high-velocity sales.
                </p>
            </div>

            <div class="deliverables-grid">
                <!-- 1 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-layer-group"></i></div>
                    <h3 class="deliverable-title">Minimalist Lookbook Web Store</h3>
                    <p class="deliverable-desc">Built a custom high-performance web storefront (<a href="https://offhuman.com/" target="_blank" style="color: var(--brand-orange); text-decoration: none;">offhuman.com</a>) pairing brutalist monochrome negative space with crisp high-res garment photography.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">2.0s Mobile Speed</span>
                        <span class="deliv-pill">Editorial Lookbook</span>
                        <span class="deliv-pill">High-Fidelity Textiles</span>
                    </div>
                </div>

                <!-- 2 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-cart-arrow-down"></i></div>
                    <h3 class="deliverable-title">Sub-Second AJAX Drawer Cart</h3>
                    <p class="deliverable-desc">Constructed an instantaneous sliding bag interface allowing shoppers to toggle garment sizes, apply voucher codes on the fly, and proceed straight to payment without refresh interruptions.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">AJAX Cart Drawer</span>
                        <span class="deliv-pill">Instant Size Selection</span>
                        <span class="deliv-pill">Low Cart Abandonment</span>
                    </div>
                </div>

                <!-- 3 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-brands fa-meta"></i></div>
                    <h3 class="deliverable-title">Meta Conversions API (CAPI)</h3>
                    <p class="deliverable-desc">Integrated server-to-server tracking pipelines to ensure 100% accurate conversion telemetry on Meta Ads, bypassing browser tracking blockers and powering 4.2x ROAS campaigns.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">Server-Side CAPI</span>
                        <span class="deliv-pill">4.2x Meta ROAS</span>
                        <span class="deliv-pill">Dynamic Catalog Retargeting</span>
                    </div>
                </div>

                <!-- 4 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-brands fa-tiktok"></i></div>
                    <h3 class="deliverable-title">TikTok &amp; Reels Hype Creatives</h3>
                    <p class="deliverable-desc">Crafted fast-paced underground aesthetic video teasers and lifestyle lookbook reels tailored for Instagram and TikTok algorithms to generate organic pre-drop buzz.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">Viral Drop Teasers</span>
                        <span class="deliv-pill">Underground Aesthetics</span>
                        <span class="deliv-pill">Creator Seeding</span>
                    </div>
                </div>

                <!-- 5 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3 class="deliverable-title">Flash-Drop Server Resilience</h3>
                    <p class="deliverable-desc">Configured global edge caching, stateless session routing, and asynchronous inventory reservation to withstand intense traffic spikes during limited capsule releases.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">Edge CDN Caching</span>
                        <span class="deliv-pill">Zero Crash Drops</span>
                        <span class="deliv-pill">Concurrent Checkouts</span>
                    </div>
                </div>

                <!-- 6 -->
                <div class="deliverable-card">
                    <div class="deliverable-icon-box"><i class="fa-solid fa-tags"></i></div>
                    <h3 class="deliverable-title">Fashion Schema &amp; Rich Snippets</h3>
                    <p class="deliverable-desc">Implemented JSON-LD fashion product schema and Open Graph tags, ensuring high-res product cards and pricing rich snippets rank cleanly on Google Search.</p>
                    <div class="deliverable-tag-list">
                        <span class="deliv-pill">JSON-LD Schema</span>
                        <span class="deliv-pill">Google Rich Snippets</span>
                        <span class="deliv-pill">Instagram Shopping Sync</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FREQUENTLY ASKED QUESTIONS ═══════════════════════ -->
    <section class="case-section" style="padding-top: 20px;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-pill"><i class="fa-solid fa-circle-question"></i> STRATEGIC INSIGHTS</div>
                <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
                <p class="section-desc">
                    Insights into the architectural, creative, and performance choices behind Off Human Apparel's e-commerce scaling.
                </p>
            </div>

            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Why does an editorial lookbook outperform standard product grids for streetwear?</span>
                        <i class="fa-solid fa-chevron-down faq-chevron"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Modern fashion consumers look for a cohesive aesthetic subculture rather than detached merchandise. By arranging drops into art-directed lifestyle editorial narratives rather than standard e-commerce grids, visitors envision the complete silhouette. Combined with rapid slide-out bag checkout, this curated styling drove bigger average order values and elevated drop conversions by +42%.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>How was the storefront engineered to withstand intense traffic spikes during limited capsule releases?</span>
                        <i class="fa-solid fa-chevron-down faq-chevron"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Limited apparel drops provoke sudden floods of concurrent shoppers that can easily overwhelm conventional databases. We integrated edge-caching across Cloudflare's international CDN, decoupled session state, and utilized asynchronous stock holding. As a result, thousands of simultaneous buyers encounter sub-2.0s speeds without encountering checkout bottlenecks.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>What made server-side Meta Conversions API (CAPI) essential for scaling the ad campaigns?</span>
                        <i class="fa-solid fa-chevron-down faq-chevron"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Modern ad blockers and mobile operating system privacy protections routinely intercept over 30% of browser pixel events. By routing server-side CAPI events directly from our cloud backend into Meta's advertising engine, every add-to-cart, checkout initiation, and purchase was tracked with precision, fueling algorithmic audience optimization and preserving a lucrative 4.2x ROAS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ TESTIMONIAL ═══════════════════════ -->
    <section class="case-section" id="testimonial" style="background: #0b0b0b; padding-top: 20px;">
        <div class="section-wrap">
            <div class="testimonial-box">
                <div class="quote-icon-box">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                <div>
                    <p class="quote-text">
                        "The editorial web design completely transformed how our community perceives our drops. Having instant slide-out checkout and 2.0s load speeds led directly to a 50% jump in custom garment inquiries, while our limited releases consistently sell out in record time."
                    </p>
                    <div class="quote-author-info">
                        <div>
                            <div class="quote-author-name">Abishek</div>
                            <div class="quote-author-role">Founder, Off Human Apparel</div>
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
                    <h2 class="client-meta-title">Verified Partner: <span>Off Human Apparel</span></h2>
                    <p class="client-meta-desc">
                        A modern D2C streetwear brand crafting limited-edition artistic capsules, graphic hoodies, and high-concept urban apparel. Experience their drops online or explore their digital lookbook.
                    </p>
                    <ul class="client-details-list">
                        <li>
                            <i class="fa-solid fa-shirt"></i>
                            <div><strong>Brand Category:</strong> High-End Streetwear &amp; Urban Fashion Apparel</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-laptop-code"></i>
                            <div><strong>Platform Architecture:</strong> Minimalist Lookbook Grid, Sub-Second AJAX Drawer Cart, Meta CAPI</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-bolt"></i>
                            <div><strong>Performance Benchmarks:</strong> 4.2x Drop-Day Conversion, 2.0s Mobile Load Speed, 45% Repeat Buyers</div>
                        </li>
                        <li>
                            <i class="fa-solid fa-globe"></i>
                            <div><strong>Official Web Platform:</strong> <a href="https://offhuman.com/" target="_blank" style="color: var(--brand-orange); text-decoration: underline;">https://offhuman.com/</a></div>
                        </li>
                    </ul>
                    <div class="client-action-buttons">
                        <a href="https://offhuman.com/" target="_blank" rel="noopener noreferrer" class="btn-primary-orange">
                            <span>Visit Official Store</span> <i class="fa-solid fa-external-link-alt"></i>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-secondary-dark">
                            <i class="fa-solid fa-calendar-check"></i> Book Strategy Session
                        </a>
                    </div>
                </div>

                <div style="text-align: center; background: rgba(0,0,0,0.4); padding: 30px; border-radius: 20px; border: 1px solid rgba(255,87,34,0.25);">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/off-human/logo.jpg" alt="Off Human Apparel Logo" style="max-height: 80px; width: 80px; background: #fff; padding: 6px; border-radius: 50%; margin-bottom: 20px; object-fit: contain;">
                    <div style="font-family: 'Outfit', sans-serif; font-size: 1.3rem; font-weight: 800; color: #fff; margin-bottom: 8px;">
                        Ready to Scale Your D2C Brand?
                    </div>
                    <p style="font-size: 0.9rem; color: #94a3b8; margin-bottom: 20px;">
                        Let Fusion X engineer an undeniable brand aesthetic, high-converting drop architecture, and profitable paid media scale for your label.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-orange" style="width: 100%; box-sizing: border-box; justify-content: center;">
                        <span>Book Strategy Call</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
