<?php
/**
 * Template Name: The Energy Bags Case Study
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
            font-family: 'Space Grotesk', sans-serif;
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
            background: linear-gradient(135deg, #ff7043 0%, #ff5722 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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

        /* ── HERO SECTION ── */
        .case-hero {
            padding: 140px 24px 70px;
            position: relative;
            z-index: 2;
            background: radial-gradient(circle at 75% 20%, rgba(255, 87, 34, 0.15) 0%, rgba(8, 8, 8, 0) 65%);
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
            background: linear-gradient(135deg, #ff5722 0%, #ff7043 100%);
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 1.2px;
            padding: 6px 14px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
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

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.3rem, 4.4vw, 3.8rem);
            font-weight: 900;
            line-height: 1.12;
            color: #ffffff;
            margin: 0 0 20px;
            letter-spacing: -0.5px;
        }

        .hero-title .highlight {
            color: var(--brand-orange);
            background: linear-gradient(135deg, #ff7043 0%, #ff5722 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.05rem;
            color: #cbd5e1;
            line-height: 1.7;
            margin-bottom: 34px;
            max-width: 620px;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        /* ── 3D INTERACTIVE BAG STAGE ── */
        .stage-3d-wrapper {
            position: relative;
            width: 100%;
            height: 460px;
            border-radius: 24px;
            background: radial-gradient(circle at 50% 45%, rgba(255, 87, 34, 0.14) 0%, rgba(12, 10, 8, 0.96) 70%);
            border: 1px solid var(--border-glow);
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
        }

        #three-bag-container {
            width: 100%;
            height: 100%;
            cursor: grab;
        }

        #three-bag-container:active {
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
            background: #ffffff;
            padding: 2px 6px;
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
            box-shadow: 0 10px 30px rgba(255, 87, 34, 0.15);
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

        /* ── SHOPIFY 3-WAY ARCHITECTURE BENCHMARK ── */
        .arch-benchmark-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 36px;
        }

        .arch-card {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 20px;
            padding: 30px;
            position: relative;
            transition: all 0.3s ease;
        }

        .arch-card.highlight-card {
            background: linear-gradient(145deg, #161616 0%, #1c1410 100%);
            border: 2px solid var(--brand-orange);
            box-shadow: 0 16px 40px rgba(255, 87, 34, 0.18);
        }

        .arch-badge {
            display: inline-block;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 16px;
        }

        .arch-badge.vanilla {
            background: rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
        }

        .arch-badge.bespoke {
            background: rgba(255, 179, 0, 0.15);
            color: #ffb300;
            border: 1px solid rgba(255, 179, 0, 0.3);
        }

        .arch-badge.hybrid {
            background: var(--brand-orange);
            color: #ffffff;
            box-shadow: 0 4px 14px var(--brand-orange-glow);
        }

        .arch-card h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.45rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 10px;
        }

        .arch-card p {
            font-size: 0.92rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .arch-pills-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .arch-pill-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: #cbd5e1;
        }

        .arch-pill-item i {
            color: var(--brand-orange-light);
            font-size: 0.8rem;
        }

        /* ── PRODUCT CATEGORIES TRIPTYCH ── */
        .category-triptych {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 36px;
        }

        .category-box {
            background: #111111;
            border: 1px solid var(--border-dark);
            border-radius: 22px;
            padding: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .category-box:hover {
            border-color: var(--brand-orange);
            transform: translateY(-4px);
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.6);
        }

        .category-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-orange-light);
            font-size: 1.4rem;
            margin-bottom: 20px;
        }

        .category-box h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 8px;
        }

        .category-box p {
            font-size: 0.92rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0 0 16px;
        }

        .cat-tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .cat-tag {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-dark);
            color: #e2e8f0;
            font-size: 0.74rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        /* ── INTERACTIVE VERIFIED ELEVATION GRAPH ── */
        .graph-card {
            background: #101010;
            border: 1px solid var(--border-glow);
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.75);
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
            fill: url(#energyAreaGrad);
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
            background: #1c1c1c;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.15);
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

        /* ── VISUAL PROOF GALLERY ── */
        .gallery-container {
            background: #101010;
            border: 1px solid var(--border-dark);
            border-radius: 28px;
            padding: 32px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);
        }

        .gallery-tabs-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 24px;
            padding-bottom: 18px;
            border-bottom: 1px solid var(--border-dark);
        }

        .gallery-tab-btn {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-dark);
            color: #cbd5e1;
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            gap: 8px;
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
            padding: 10px;
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

        /* Lightbox */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
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
            box-shadow: 0 0 50px rgba(255, 87, 34, 0.4);
        }

        .lightbox-close {
            position: absolute;
            top: 25px;
            right: 35px;
            font-size: 2.4rem;
            color: #ffffff;
            cursor: pointer;
            transition: color 0.2s;
        }

        .lightbox-close:hover {
            color: var(--brand-orange);
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
            .arch-benchmark-grid {
                grid-template-columns: 1fr;
            }
            .category-triptych {
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
            .gallery-container {
                padding: 20px 14px;
                border-radius: 20px;
            }
            .gallery-tabs-nav {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                flex-wrap: nowrap;
                padding-bottom: 12px;
                box-sizing: border-box;
            }
            .gallery-tab-btn {
                white-space: nowrap;
                padding: 8px 14px;
                font-size: 0.8rem;
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

<!-- ═══════════════════════ CASE STUDY HERO ═══════════════════════ -->
    <header class="case-hero">
        <div class="hero-container">
            <div class="hero-left">
                <div class="breadcrumb-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">Portfolio</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                    <span>The Energy Bags</span>
                </div>

                <div class="hero-badge-wrap">
                    <span class="flagship-badge"><i class="fa-solid fa-bag-shopping"></i> D2C E-COMMERCE SCALE</span>
                    <span class="origin-pill"><i class="fa-solid fa-layer-group"></i> All Bag Categories: Kids, Office & Ladies</span>
                    <span class="origin-pill"><i class="fa-brands fa-shopify"></i> Hybrid Custom Shopify Architecture</span>
                </div>

                <h1 class="hero-title">
                    The Energy Bags: <span class="highlight">398K Google Impressions & 4.2x Meta ROAS</span>
                </h1>

                <p class="hero-subtitle">
                    How Fusion X scaled <strong>The Energy Bags</strong> into an omnichannel direct-to-consumer powerhouse: hybrid Shopify theme engineering, studio & model product photoshoots, high-converting Facebook/Instagram paid ad funnels, and AEO/GEO citational blogs ranking on Google Gemini and ChatGPT.
                </p>

                <div class="hero-cta-group">
                    <a href="#interactive-graph" class="btn-orange"><i class="fa-solid fa-chart-line"></i> View Verified Growth Data</a>
                    <a href="#proof-gallery" class="btn-outline"><i class="fa-solid fa-images"></i> Visual Proof Gallery</a>
                    <a href="https://theenergybags.com/" target="_blank" rel="noopener noreferrer" class="btn-outline"><i class="fa-solid fa-arrow-up-right-from-square"></i> Visit theenergybags.com</a>
                </div>
            </div>

            <!-- 3D Interactive Travel & Backpack Showcase Stage -->
            <div class="hero-right">
                <div class="stage-3d-wrapper">
                    <div id="three-bag-container"></div>
                    <div class="stage-hint-pill">
                        <i class="fa-solid fa-arrows-rotate"></i>
                        <span>Drag 3D Bag</span>
                    </div>
                    <div class="stage-badge-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/energy-bags/logo.png" alt="The Energy Bags Logo" class="stage-logo-thumb">
                        <div class="stage-badge-text">
                            <h4 class="stage-badge-title">The Energy Bags</h4>
                            <p class="stage-badge-sub">Bags That Match Your Energy &bull; Verified Partner</p>
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
                <div class="stat-number orange-glow">398K</div>
                <div class="stat-label">Google Search Impressions</div>
                <div class="stat-subnote">Official Search Console Telemetry</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">5.19K</div>
                <div class="stat-label">Organic Search Clicks</div>
                <div class="stat-subnote">Zero to Scale in 6 Months</div>
            </div>
            <div class="stat-card">
                <div class="stat-number orange-glow">5.1</div>
                <div class="stat-label">Average SERP Rank</div>
                <div class="stat-subnote">Page 1 National Category Ranking</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">4.2x</div>
                <div class="stat-label">Meta Paid Ads ROAS</div>
                <div class="stat-subnote">68.5K Reach & 214+ Monthly Orders</div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ SHOPIFY 3-WAY ARCHITECTURE BENCHMARK ═══════════════════════ -->
    <section class="case-section" id="architecture-philosophy" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-brands fa-shopify"></i> ENGINEERING SPECTRUM</span>
                <h2 class="section-title">The Fusion X <span class="text-orange">Shopify Architecture</span> Spectrum</h2>
                <p class="section-desc">
                    Every e-commerce brand requires a tailored software foundation. From no-code catalogs to deep custom code, Fusion X selects the precise technological tier that delivers maximum conversion velocity and ROAS.
                </p>
            </div>

            <div class="arch-benchmark-grid">
                <!-- Bhawani Corner -->
                <div class="arch-card">
                    <span class="arch-badge vanilla">Tier 1 &bull; Vanilla Shopify</span>
                    <h3>Bhawani Corner Glassware</h3>
                    <p>
                        Zero custom code overhead. Leveraged pure native Shopify architecture with deep structured product schema, lightning server response, and off-page GEO authority for 5,000+ glassware SKUs.
                    </p>
                    <div class="arch-pills-list">
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> Pure Vanilla No-Code Setup</div>
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> 5,000+ Physical Catalog SKUs</div>
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> 900+ Monthly Inquiries</div>
                    </div>
                </div>

                <!-- The Energy Bags (Highlighted) -->
                <div class="arch-card highlight-card">
                    <span class="arch-badge hybrid">Tier 2 &bull; Hybrid Custom (This Brand)</span>
                    <h3>The Energy Bags</h3>
                    <p>
                        The ultimate high-converting sweet spot. Custom Liquid sections for flash sales and collections blended with robust Shopify apps, dynamic catalog feeds, and mobile speed optimizations.
                    </p>
                    <div class="arch-pills-list">
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> Mixed Custom Liquid + App Suite</div>
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> Flash Sale &amp; Color Swatch Funnels</div>
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> 398K GSC Reach &amp; 4.2x Meta ROAS</div>
                    </div>
                </div>

                <!-- Nilaro Coffee -->
                <div class="arch-card">
                    <span class="arch-badge bespoke">Tier 3 &bull; Fully Bespoke Coded</span>
                    <h3>Nilaro Filter Coffee</h3>
                    <p>
                        100% custom-coded liquid and JavaScript architecture. Bespoke interactive roasting physics, origin storytelling timelines, and proprietary WhatsApp AI commerce concierge integrations.
                    </p>
                    <div class="arch-pills-list">
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> 100% Custom Coded in Shopify</div>
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> Interactive Grinder Physics</div>
                        <div class="arch-pill-item"><i class="fa-solid fa-circle-check"></i> Top 8 SERP Rank From Zero</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ BAGS PORTFOLIO TRIPTYCH ═══════════════════════ -->
    <section class="case-section" id="product-spectrum">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-tags"></i> PRODUCT TAXONOMY</span>
                <h2 class="section-title">All Categories of Bags: <span class="text-orange">Kids, Office & Ladies</span></h2>
                <p class="section-desc">
                    Energy Bags covers every modern lifestyle carrying requirement. Fusion X crafted dedicated visual funnels, photoshoot assets, and ranking blogs for each distinct demographic.
                </p>
            </div>

            <div class="category-triptych">
                <!-- Category 1: School & Kids -->
                <div class="category-box">
                    <div class="category-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                    <h4>Kids & School Bags</h4>
                    <p>
                        Engineered for heavy textbooks, ergonomic spine balance, and all-weather durability. Supported by our viral E-E-A-T article <em>"Best School Bag Company"</em> ranking nationally.
                    </p>
                    <div class="cat-tag-list">
                        <span class="cat-tag">Spine Ergonomics</span>
                        <span class="cat-tag">Waterproof Fabric</span>
                        <span class="cat-tag">AEO Ranked Article</span>
                    </div>
                </div>

                <!-- Category 2: Office & Laptop -->
                <div class="category-box">
                    <div class="category-icon"><i class="fa-solid fa-laptop"></i></div>
                    <h4>Office & Laptop Bags</h4>
                    <p>
                        High-utility executive backpacks and sleeves featuring padded tech sleeves, TSA-friendly compartments, and minimalist corporate styling for working professionals.
                    </p>
                    <div class="cat-tag-list">
                        <span class="cat-tag">Shockproof Pockets</span>
                        <span class="cat-tag">Executive Aesthetic</span>
                        <span class="cat-tag">High Direct Intent</span>
                    </div>
                </div>

                <!-- Category 3: Ladies & Fashion -->
                <div class="category-box">
                    <div class="category-icon"><i class="fa-solid fa-heart"></i></div>
                    <h4>Energy's LadyBee</h4>
                    <p>
                        Fashion-forward handbags, cross-body bags, and tote collections (such as the LadyBee Bella). Captured with custom model lifestyle shoots and scaled with 45% flash sale funnels.
                    </p>
                    <div class="cat-tag-list">
                        <span class="cat-tag">Model Photoshoots</span>
                        <span class="cat-tag">LadyBee Bella (Rs. 665)</span>
                        <span class="cat-tag">Meta Carousel Ads</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ VERIFIED PERFORMANCE GRAPH ═══════════════════════ -->
    <section class="case-section" id="interactive-graph" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-chart-line"></i> VERIFIED CAMPAIGN AUDIT</span>
                <h2 class="section-title">6-Month Multi-Channel <span class="text-orange">Scale Telemetry</span></h2>
                <p class="section-desc">
                    Verified performance data across Google Search Console and Shopify analytics. Tracking Energy Bags from the baseline audit in December 2025 to 398K Google impressions and +315% revenue growth.
                </p>
            </div>

            <div class="graph-card">
                <div class="graph-toolbar">
                    <div class="metric-toggle-pills">
                        <button class="metric-tab-btn active" data-metric="sessions">
                            <i class="fa-solid fa-arrow-trend-up"></i> E-Commerce Sessions
                        </button>
                        <button class="metric-tab-btn" data-metric="revenue">
                            <i class="fa-solid fa-indian-rupee-sign"></i> Sales Revenue (₹)
                        </button>
                        <button class="metric-tab-btn" data-metric="reach">
                            <i class="fa-solid fa-bullhorn"></i> Social Media Reach
                        </button>
                    </div>
                    <div class="graph-badge-status">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Source: Verified GSC & Shopify Campaign Audit</span>
                    </div>
                </div>

                <div class="chart-svg-container" id="chart-container">
                    <svg id="elevation-svg" viewBox="0 0 1000 360" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="energyAreaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
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
                            <div class="cp-date">Month 1 (Dec 2025)</div>
                            <h4 class="cp-title">Baseline Audit</h4>
                            <div class="cp-metric">380 Sessions &bull; ₹24K Rev</div>
                            <div class="cp-desc">Full audit of Shopify theme, code bloat removal, catalog structuring, and audience persona setup.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="1">
                        <div>
                            <div class="cp-date">Month 2 (Jan 2026)</div>
                            <h4 class="cp-title">Shopify Speed & Theme</h4>
                            <div class="cp-metric">+63% Traffic &bull; ₹58K Rev</div>
                            <div class="cp-desc">Mobile speed optimization, custom Liquid product modules, and A/B testing travel bag video hooks.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="2">
                        <div>
                            <div class="cp-date">Month 3 (Feb 2026)</div>
                            <h4 class="cp-title">SEO Launch & Viral Reels</h4>
                            <div class="cp-metric">1,140 Sessions &bull; ₹1.1L Rev</div>
                            <div class="cp-desc">Product schema, E-E-A-T blogs ("Best School Bag Company"), and high-retention commercial Reels launched.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="3">
                        <div>
                            <div class="cp-date">Month 4 (Mar 2026)</div>
                            <h4 class="cp-title">Dynamic Catalog Ads</h4>
                            <div class="cp-metric">1,820 Sessions &bull; 148 Orders</div>
                            <div class="cp-desc">Instagram dynamic catalog ads and LadyBee collection promotions targeting pan-India bag shoppers.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card" data-index="4">
                        <div>
                            <div class="cp-date">Month 5 (Apr 2026)</div>
                            <h4 class="cp-title">Warm Retargeting Flows</h4>
                            <div class="cp-metric">2,340 Sessions &bull; ₹2.35L Rev</div>
                            <div class="cp-desc">Klaviyo abandoned cart recovery flows and retargeting video viewers with flash sale discounts.</div>
                        </div>
                    </div>
                    <div class="checkpoint-card active" data-index="5">
                        <div>
                            <div class="cp-date">Month 6 (May 2026)</div>
                            <h4 class="cp-title">Peak Milestone Scale</h4>
                            <div class="cp-metric">398K GSC Imp &bull; 4.2x ROAS</div>
                            <div class="cp-desc">Peak scale: 2,804 sessions (+163%), ₹2.89L revenue (+315%), 5.1 avg rank, and 68.5K social reach.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ DELIVERABLES SECTION ═══════════════════════ -->
    <section class="case-section" id="deliverables">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-code"></i> SCOPE OF WORK</span>
                <h2 class="section-title">What Fusion X <span class="text-orange">Engineered</span></h2>
                <p class="section-desc">
                    An integrated direct-to-consumer growth suite combining high-performance e-commerce software, professional photoshoots, content creation, and search algorithm domination.
                </p>
            </div>

            <div class="deliverables-grid">
                <!-- 1 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-brands fa-shopify"></i></div>
                        <h3 class="deliverable-title">Hybrid Shopify Storefront</h3>
                        <p class="deliverable-desc">
                            Engineered a custom Liquid theme layer on Shopify (<a href="https://theenergybags.com/" target="_blank" style="color: var(--brand-orange-light); text-decoration: none;">theenergybags.com</a>) with color swatches, flash sale banners, and sub-second mobile page loads.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Custom Liquid</span>
                        <span class="d-tag">Mobile Speed 95+</span>
                        <span class="d-tag">Catalog Taxonomy</span>
                    </div>
                </div>

                <!-- 2 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-camera"></i></div>
                        <h3 class="deliverable-title">Studio & Model Photoshoots</h3>
                        <p class="deliverable-desc">
                            Directed and executed professional studio and on-model photography for the LadyBee handbag collection, executive laptop bags, and school backpacks to maximize product page conversions.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">Model Shoots</span>
                        <span class="d-tag">Studio Lighting</span>
                        <span class="d-tag">High-Res Assets</span>
                    </div>
                </div>

                <!-- 3 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-bullhorn"></i></div>
                        <h3 class="deliverable-title">Meta Ads Funnels (4.2x ROAS)</h3>
                        <p class="deliverable-desc">
                            Ran strategic Facebook and Instagram paid ad campaigns using Advantage+ catalog carousels, video Reels angles, and retargeting matrices generating 214+ monthly orders and $312+ revenue.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">4.2x Meta ROAS</span>
                        <span class="d-tag">Catalog Carousels</span>
                        <span class="d-tag">Advantage+ ASC</span>
                    </div>
                </div>

                <!-- 4 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-pen-nib"></i></div>
                        <h3 class="deliverable-title">E-E-A-T, AEO & GEO Blogs</h3>
                        <p class="deliverable-desc">
                            Authored topical authority articles such as <em>"Best School Bag Company"</em>, structured with schema markups so AI engines like Google Gemini and ChatGPT cite Energy Bags for commercial queries.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">AEO / GEO Engine</span>
                        <span class="d-tag">Gemini Citations</span>
                        <span class="d-tag">School Bag Authority</span>
                    </div>
                </div>

                <!-- 5 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-chart-pie"></i></div>
                        <h3 class="deliverable-title">SEO Dominance (398K GSC)</h3>
                        <p class="deliverable-desc">
                            Comprehensive on-page and technical SEO execution: metadata optimization, XML sitemaps, canonical tags, and keyword clustering elevating the domain from zero to 398K impressions and a 5.1 average SERP rank.
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">398K Impressions</span>
                        <span class="d-tag">5.19K Clicks</span>
                        <span class="d-tag">Top First Page</span>
                    </div>
                </div>

                <!-- 6 -->
                <div class="deliverable-card">
                    <div>
                        <div class="deliverable-icon-wrap"><i class="fa-solid fa-cart-shopping"></i></div>
                        <h3 class="deliverable-title">Conversion Rate Optimization</h3>
                        <p class="deliverable-desc">
                            Deployed flash sale urgency banners, multi-variant color selectors, sticky Add-to-Cart bars, and automated cart abandonment email flows that tripled revenue velocity (+315%).
                        </p>
                    </div>
                    <div class="deliverable-tag-list">
                        <span class="d-tag">+315% Revenue</span>
                        <span class="d-tag">Flash Sale Funnels</span>
                        <span class="d-tag">Klaviyo Retention</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ VISUAL PROOF GALLERY ═══════════════════════ -->
    <section class="case-section" id="proof-gallery" style="background: #090909;">
        <div class="section-container">
            <div class="section-header">
                <span class="section-tag"><i class="fa-solid fa-camera"></i> VERIFIED DELIVERABLES</span>
                <h2 class="section-title">Visual Proof &amp; <span class="text-orange">Asset Showcase</span></h2>
                <p class="section-desc">
                    Explore live verified screenshots of the Shopify storefront, LadyBee collection, product page with photoshoot assets, ranking E-E-A-T blog, and official brand identity.
                </p>
            </div>

            <div class="gallery-container">
                <div class="gallery-tabs-nav">
                    <button class="gallery-tab-btn active" data-target="view-banner">
                        <i class="fa-solid fa-desktop"></i> Home Banner & Flash Sale
                    </button>
                    <button class="gallery-tab-btn" data-target="view-collection">
                        <i class="fa-solid fa-layer-group"></i> LadyBee Collection
                    </button>
                    <button class="gallery-tab-btn" data-target="view-product">
                        <i class="fa-solid fa-bag-shopping"></i> Product Page & Photoshoot
                    </button>
                    <button class="gallery-tab-btn" data-target="view-blog">
                        <i class="fa-solid fa-newspaper"></i> AEO Ranking Blog
                    </button>
                    <button class="gallery-tab-btn" data-target="view-logo">
                        <i class="fa-solid fa-fingerprint"></i> Brand Identity
                    </button>
                </div>

                <!-- Tab 1: Home Banner -->
                <div class="gallery-view active" id="view-banner">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/energy-bags/home-banner.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/energy-bags/home-banner.png" alt="The Energy Bags Storefront Hero Banner">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>High-Converting E-Commerce Storefront</h4>
                            <p>"Bags That Match Your Energy" &mdash; custom LadyBee collection hero banner, 45% flash sale urgency banner, and model lifestyle asset.</p>
                        </div>
                        <a href="https://theenergybags.com/" target="_blank" rel="noopener noreferrer" class="btn-orange" style="padding: 10px 20px; font-size: 0.85rem;">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Visit Live Store
                        </a>
                    </div>
                </div>

                <!-- Tab 2: Collection Page -->
                <div class="gallery-view" id="view-collection">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/energy-bags/collection-page.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/energy-bags/collection-page.png" alt="Energy's LadyBee Collection Grid">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>Energy's Ladybee Collection Page</h4>
                            <p>Seamless catalog taxonomy featuring 24 curated products, sorting filters, sale badges, and instant cart funnels.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Product Page -->
                <div class="gallery-view" id="view-product">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/energy-bags/product-page.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/energy-bags/product-page.png" alt="Energy's LadyBee Bella Product Page">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>Optimized Product Page &amp; Photoshoot Assets</h4>
                            <p>Featuring Energy's LadyBee Bella (Rs. 665.00), dynamic multi-color selector swatches, model shoot gallery, and stock urgency telemetry.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 4: Blog Page -->
                <div class="gallery-view" id="view-blog">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/energy-bags/blog-page.png')">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/energy-bags/blog-page.png" alt="Best School Bag Company E-E-A-T Blog">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>AEO, GEO &amp; E-E-A-T Ranking Blog: "Best School Bag Company"</h4>
                            <p>Comprehensive article engineered for search dominance. Ranked on Google and cited by Google Gemini and ChatGPT for high-intent school bag queries.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 5: Brand Identity -->
                <div class="gallery-view" id="view-logo">
                    <div class="gallery-img-wrap" onclick="openLightbox('brands/energy-bags/logo.png')" style="background: #111111; padding: 40px;">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/energy-bags/logo.png" alt="The Energy Bags Official Logo" style="max-height: 280px;">
                    </div>
                    <div class="gallery-caption-bar">
                        <div class="gallery-caption-text">
                            <h4>The Energy Bags Official Emblem</h4>
                            <p>Distinctive soaring wings motif with clean white typography set against the signature vibrant orange brand canvas.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client Info & Action Banner -->
            <div class="client-info-banner">
                <div class="client-info-left">
                    <span class="section-tag"><i class="fa-solid fa-award"></i> D2C SCALE SUCCESS</span>
                    <h3>Scale Your Lifestyle Brand with Fusion X</h3>
                    <p>
                        The Energy Bags demonstrates how uniting custom Shopify architecture, high-end creative shoots, and algorithm-driven paid &amp; organic marketing creates an unbeatable e-commerce machine.
                    </p>
                    <div class="client-meta-list">
                        <div class="meta-row">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span><strong>Brand:</strong> The Energy Bags</span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-solid fa-globe"></i>
                            <span><strong>Online Store:</strong> <a href="https://theenergybags.com/" target="_blank" rel="noopener noreferrer" style="color: var(--brand-orange-light); text-decoration: none;">https://theenergybags.com/</a></span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-solid fa-cubes"></i>
                            <span><strong>Product Range:</strong> Kids & School Bags, Office & Laptop Bags, Ladies Handbags (LadyBee)</span>
                        </div>
                        <div class="meta-row">
                            <i class="fa-brands fa-shopify"></i>
                            <span><strong>Platform:</strong> Shopify Hybrid Custom Liquid Architecture</span>
                        </div>
                    </div>
                </div>
                <div class="client-action-buttons">
                    <a href="https://theenergybags.com/" target="_blank" rel="noopener noreferrer" class="btn-orange" style="justify-content: center;">
                        <i class="fa-solid fa-bag-shopping"></i> Visit The Energy Bags Store
                    </a>
                    <a href="https://www.instagram.com/energybags.in/" target="_blank" rel="noopener noreferrer" class="btn-outline" style="justify-content: center;">
                        <i class="fa-brands fa-instagram"></i> Follow @energybags.in
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-outline" style="justify-content: center;">
                        <i class="fa-solid fa-comments"></i> Partner With Fusion X
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
