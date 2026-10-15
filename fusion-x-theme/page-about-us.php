<?php
/**
 * Template Name: About Us
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        /* ═══════════════════════════════════════
           GLOBAL
        ═══════════════════════════════════════ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --orange: #ff5722;
            --orange2: #ff8a65;
            --dark: #080808;
            --dark2: #111111;
            --white: #ffffff;
            --grey: #888888;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: var(--dark);
            color: var(--white);
            overflow-x: hidden;
        }

        /* Three.js background canvas fills its parent */
        .bg-canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        /* Eyebrow labels */
        .eyebrow {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--orange);
            margin-bottom: 18px;
        }

        /* ═══════════════════════════════════════
           SCENE SYSTEM - every section is 100vh
        ═══════════════════════════════════════ */
        .scene {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Inner content always above canvas */
        .scene-content {
            position: relative;
            z-index: 2;
        }

        /* ═══════════════════════════════════════
           SCENE 1 · HERO
        ═══════════════════════════════════════ */
        #scene-hero { background: var(--dark); }

        .hero-wrap {
            text-align: center;
            padding: 100px 20px 0; /* Added padding-top to account for navbar */
            max-width: 1500px;
        }

        .hero-h1 {
            font-size: clamp(3.5rem, 9vw, 8rem);
            font-weight: 900;
            line-height: 0.95;
            letter-spacing: -4px;
            color: var(--white);
            margin-bottom: 32px;
            overflow: hidden;
        }

        .hero-h1 .word {
            display: inline-block;
            transform: translateY(115%);
            margin-right: 0.2em;
        }

        .hero-h1 .orange { color: var(--orange); }

        .hero-sub {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: #ccc;
            max-width: 580px;
            margin: 0 auto 50px;
            line-height: 1.8;
            opacity: 0;
            text-align: justify;
        }

        /* ═══════════════════════════════════════
           SCENE 2 · WHO WE ARE (light bg)
        ═══════════════════════════════════════ */
        #scene-who { background: #f8f9fa; color: var(--dark); height: auto; min-height: 100vh; padding: 120px 0; }

        .who-grid {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 80px;
            align-items: center;
            max-width: 1500px;
            width: 100%;
            padding: 0 5%;
        }

        .who-headline {
            font-size: clamp(2rem, 4vw, 3.8rem);
            font-weight: 900;
            line-height: 1.0;
            letter-spacing: -2px;
            color: var(--dark);
            margin-bottom: 24px;
        }

        .who-headline .orange { color: var(--orange); }

        .who-body {
            font-size: 1.05rem;
            color: #555;
            line-height: 1.85;
            text-align: justify;
        }

        .who-body strong { color: var(--dark); }

        /* ════════════════════════════════════════════════════════
           FUSION X NEURAL GROWTH ENGINE (HIGH SPEED & ATTRACTIVE)
           Replaces heavy 3D planetary spheres with 0-KB 120-FPS CSS/SVG Matrix
        ═════════════════════════════════════════════════════════ */
        .who-3d {
            width: 100%;
            height: 550px;
            border-radius: 28px;
            overflow: hidden;
            background: #080808 !important;
            border: 1px solid rgba(255, 87, 34, 0.25);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7), inset 0 0 40px rgba(255, 87, 34, 0.05);
            position: relative;
        }

        .growth-matrix-hud {
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 24px;
            box-sizing: border-box;
            user-select: none;
            overflow: hidden;
            background: radial-gradient(circle at 50% 50%, rgba(255, 87, 34, 0.12) 0%, rgba(8, 8, 8, 0.98) 70%);
        }

        .hud-bg-grid {
            position: absolute;
            inset: 0;
            background-size: 32px 32px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            pointer-events: none;
            z-index: 1;
        }

        .hud-ambient-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 280px;
            height: 280px;
            background: radial-gradient(circle, rgba(255, 87, 34, 0.22) 0%, transparent 70%);
            filter: blur(40px);
            pointer-events: none;
            z-index: 1;
        }

        /* Top HUD Bar */
        .hud-top-bar {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .hud-status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 5px 14px;
            backdrop-filter: blur(8px);
        }

        .hud-pulse-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 10px #10b981;
            animation: pulseGreenDot 2s infinite ease-in-out;
        }

        @keyframes pulseGreenDot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.85); }
        }

        .hud-status-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            color: #cbd5e1;
            letter-spacing: 1px;
        }

        .hud-chip-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 87, 34, 0.12);
            border: 1px solid rgba(255, 87, 34, 0.35);
            border-radius: 30px;
            padding: 5px 14px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.72rem;
            font-weight: 800;
            color: #ff7043;
            letter-spacing: 0.8px;
        }

        /* Circuit SVG */
        .hud-circuit-svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
        }

        .circuit-path {
            stroke: rgba(255, 87, 34, 0.28);
            stroke-width: 1.5;
            fill: none;
            stroke-dasharray: 4, 3;
            animation: circuitFlow 24s linear infinite;
            transition: stroke 0.3s ease, stroke-width 0.3s ease, filter 0.3s ease;
        }

        .circuit-path.active-circuit {
            stroke: #ff7043 !important;
            stroke-width: 2.5 !important;
            stroke-dasharray: none !important;
            filter: drop-shadow(0 0 8px #ff5722) drop-shadow(0 0 2px #fff);
        }

        @keyframes circuitFlow {
            from { stroke-dashoffset: 200; }
            to { stroke-dashoffset: 0; }
        }

        /* Pods Layer */
        .hud-pods-layer {
            position: absolute;
            inset: 0;
            z-index: 4;
            pointer-events: none;
        }

        .hud-pod-card {
            position: absolute;
            pointer-events: auto;
            background: rgba(18, 18, 18, 0.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 87, 34, 0.25);
            border-radius: 14px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.55);
            max-width: 175px;
        }

        .hud-pod-card:hover,
        .hud-pod-card.pod-active {
            transform: translateY(-2px) scale(1.03);
            border-color: #ff5722;
            background: rgba(28, 16, 12, 0.95);
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.38), 0 0 16px rgba(255, 87, 34, 0.22);
        }

        .pod-pin {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ff5722;
            box-shadow: 0 0 6px #ff5722;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            transition: all 0.25s ease;
        }

        .pod-pin.pin-right {
            right: -3px;
        }

        .pod-pin.pin-left {
            left: -3px;
        }

        .hud-pod-card:hover .pod-pin,
        .hud-pod-card.pod-active .pod-pin {
            background: #ffffff;
            box-shadow: 0 0 10px #ff5722, 0 0 4px #ffffff;
            transform: translateY(-50%) scale(1.4);
        }

        .pod-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(255, 87, 34, 0.14);
            border: 1px solid rgba(255, 87, 34, 0.35);
            color: #ff7043;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.88rem;
            flex-shrink: 0;
            transition: all 0.25s ease;
        }

        .pod-icon svg {
            width: 16px;
            height: 16px;
            display: block;
            fill: currentColor;
        }

        .hud-pod-card:hover .pod-icon,
        .hud-pod-card.pod-active .pod-icon {
            background: #ff5722;
            color: #ffffff;
            box-shadow: 0 0 14px #ff5722;
        }

        .pod-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .pod-name {
            font-family: 'Outfit', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pod-metric {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            color: #ff7043;
            letter-spacing: 0.5px;
        }

        /* Pod Positions (Desktop 540x550 Container) */
        .pod-top-left { top: 72px; left: 24px; }
        .pod-top-right { top: 72px; right: 24px; }
        .pod-mid-left { top: calc(50% - 24px); left: 16px; }
        .pod-mid-right { top: calc(50% - 24px); right: 16px; }
        .pod-bot-left { bottom: 95px; left: 24px; }
        .pod-bot-right { bottom: 95px; right: 24px; }

        /* Central Reactor Core */
        .hud-core-stage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 3;
            pointer-events: none;
        }

        .core-orbit-ring {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .ring-outer {
            width: 170px;
            height: 170px;
            border: 1px dashed rgba(255, 87, 34, 0.35);
            animation: spinRingClockwise 22s linear infinite;
        }

        .ring-mid {
            width: 130px;
            height: 130px;
            border: 1px solid rgba(255, 87, 34, 0.2);
            border-top-color: #ff5722;
            animation: spinRingCounter 14s linear infinite;
        }

        @keyframes spinRingClockwise {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes spinRingCounter {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }

        .core-center-reactor {
            width: 82px;
            height: 82px;
            border-radius: 50%;
            background: radial-gradient(circle, #25130d 0%, #110804 80%);
            border: 2px solid #ff5722;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 0 35px rgba(255, 87, 34, 0.45);
            transition: box-shadow 0.3s ease;
        }

        .core-logo-badge {
            width: 44px;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.8));
            position: relative;
            z-index: 2;
        }

        .core-energy-aura {
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 87, 34, 0.3) 0%, transparent 70%);
            animation: pulseCoreAura 3s ease-in-out infinite;
        }

        @keyframes pulseCoreAura {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.15); opacity: 0.9; }
        }

        .core-label-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(14, 14, 14, 0.92);
            border: 1px solid rgba(255, 87, 34, 0.45);
            border-radius: 30px;
            padding: 4px 12px;
            margin-top: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            white-space: nowrap;
        }

        .core-pulse-beacon {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ff5722;
            box-shadow: 0 0 8px #ff5722;
            animation: pulseGreenDot 1.8s infinite;
            flex-shrink: 0;
        }

        #hud-active-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.7rem;
            font-weight: 800;
            color: #ff7043;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            transition: color 0.25s ease;
        }

        /* Bottom Telemetry Bar */
        .hud-bottom-telemetry {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: rgba(18, 18, 18, 0.88);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 10px 16px;
            width: 100%;
            box-sizing: border-box;
        }

        .telemetry-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }

        .telemetry-val {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
        }

        .telemetry-lbl {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.62rem;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.8px;
        }

        .telemetry-divider {
            width: 1px;
            height: 24px;
            background: rgba(255, 255, 255, 0.1);
        }

        /* Mobile Adaptability */
        @media (max-width: 900px) {
            .who-3d {
                width: 100% !important;
                height: 520px !important;
                border-radius: 20px;
                margin: 0 auto;
                max-width: 100%;
            }
            .growth-matrix-hud {
                padding: 14px 12px;
                justify-content: space-between;
            }
            .hud-bg-grid {
                background-size: 24px 24px;
            }
            .hud-ambient-glow {
                width: 200px;
                height: 200px;
            }
            .hud-top-bar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 4px;
                width: 100%;
            }
            .hud-status-indicator {
                padding: 3px 8px;
                gap: 5px;
                white-space: nowrap;
                flex-shrink: 0;
            }
            .hud-status-label {
                font-size: 0.6rem;
                letter-spacing: 0.3px;
                white-space: nowrap;
            }
            .hud-chip-badge {
                padding: 3px 8px;
                font-size: 0.6rem;
                letter-spacing: 0.3px;
                white-space: nowrap;
                flex-shrink: 0;
            }

            /* Pods Layer */
            .hud-pods-layer {
                position: absolute;
                inset: 0;
                display: block;
            }
            .hud-pod-card {
                position: absolute;
                max-width: 124px;
                width: calc(50% - 30px);
                padding: 5px 7px;
                gap: 6px;
                border-radius: 10px;
            }
            .pod-icon {
                width: 24px;
                height: 24px;
                font-size: 0.7rem;
                border-radius: 6px;
                flex-shrink: 0;
            }
            .pod-icon svg {
                width: 12px;
                height: 12px;
            }
            .pod-info {
                min-width: 0;
                flex: 1;
                overflow: hidden;
            }
            .pod-name {
                font-size: 0.66rem;
                font-weight: 700;
                line-height: 1.15;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .pod-metric {
                font-size: 0.54rem;
                font-weight: 700;
                white-space: nowrap !important;
                overflow: hidden;
                text-overflow: ellipsis;
                letter-spacing: 0.2px;
            }

            /* Positions on mobile: 3 pods on left, 3 pods on right */
            .pod-top-left { top: 60px; left: 8px; }
            .pod-top-right { top: 60px; right: 8px; }
            .pod-mid-left { top: calc(50% - 20px); left: 6px; }
            .pod-mid-right { top: calc(50% - 20px); right: 6px; }
            .pod-bot-left { bottom: 72px; left: 8px; }
            .pod-bot-right { bottom: 72px; right: 8px; }

            /* Reactor Core Stays Visible and Proportioned */
            .hud-core-stage {
                display: flex !important;
                transform: translate(-50%, -50%);
            }
            .ring-outer {
                width: 112px;
                height: 112px;
            }
            .ring-mid {
                width: 84px;
                height: 84px;
            }
            .core-center-reactor {
                width: 56px;
                height: 56px;
                box-shadow: 0 0 24px rgba(255, 87, 34, 0.5);
            }
            .core-logo-badge {
                width: 30px;
            }
            .core-label-pill {
                padding: 3px 9px;
                margin-top: 8px;
                gap: 5px;
            }
            .core-pulse-beacon {
                width: 5px;
                height: 5px;
            }
            #hud-active-label {
                font-size: 0.58rem;
                letter-spacing: 0.8px;
                max-width: 112px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            /* Bottom Telemetry Bar */
            .hud-bottom-telemetry {
                padding: 7px 10px;
                border-radius: 12px;
            }
            .telemetry-val {
                font-size: 0.94rem;
            }
            .telemetry-lbl {
                font-size: 0.52rem;
                letter-spacing: 0.4px;
                white-space: nowrap;
            }
            .telemetry-divider {
                height: 18px;
            }

            .hud-circuit-svg {
                display: block !important;
            }
        }

        @media (max-width: 480px) {
            .ver-badge, .lag-badge {
                display: none !important;
            }
        }

        @media (max-width: 380px) {
            .who-3d {
                height: 480px !important;
            }
            .growth-matrix-hud {
                padding: 10px 8px;
            }
            .hud-top-bar {
                gap: 4px;
            }
            .hud-status-indicator {
                padding: 3px 6px;
                gap: 4px;
            }
            .hud-status-label {
                font-size: 0.56rem;
            }
            .hud-chip-badge {
                padding: 3px 6px;
                font-size: 0.56rem;
            }
            .hud-pod-card {
                max-width: 114px;
                width: calc(50% - 24px);
                padding: 4px 6px;
                gap: 5px;
            }
            .pod-icon {
                width: 22px;
                height: 22px;
                font-size: 0.65rem;
            }
            .pod-icon svg {
                width: 11px;
                height: 11px;
            }
            .pod-name {
                font-size: 0.62rem;
            }
            .pod-metric {
                font-size: 0.50rem;
                white-space: nowrap !important;
            }
            .pod-top-left { top: 52px; left: 5px; }
            .pod-top-right { top: 52px; right: 5px; }
            .pod-mid-left { top: calc(50% - 18px); left: 4px; }
            .pod-mid-right { top: calc(50% - 18px); right: 4px; }
            .pod-bot-left { bottom: 64px; left: 5px; }
            .pod-bot-right { bottom: 64px; right: 5px; }

            .ring-outer {
                width: 94px;
                height: 94px;
            }
            .ring-mid {
                width: 72px;
                height: 72px;
            }
            .core-center-reactor {
                width: 46px;
                height: 46px;
            }
            .core-logo-badge {
                width: 24px;
            }
            #hud-active-label {
                font-size: 0.52rem;
                max-width: 90px;
            }
            .telemetry-val {
                font-size: 0.82rem;
            }
            .telemetry-lbl {
                font-size: 0.46rem;
            }
        }


        /* ═══════════════════════════════════════
           SCENE 3 · PROCESS (pinned, 3 steps)
        ═══════════════════════════════════════ */
        #scene-process { background: var(--dark2); }

        .process-stage {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 80px 5%;
            z-index: 2;
            opacity: 0;
            transform: translateY(80px) scale(0.96);
        }

        .process-counter {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 6px;
            color: var(--orange);
            text-transform: uppercase;
            margin-bottom: 28px;
        }

        .process-icon-wrap {
            width: 100px;
            height: 100px;
            margin: 0 auto 32px;
            border-radius: 30px;
            background: rgba(255,87,34,0.1);
            border: 1px solid rgba(255,87,34,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--orange);
        }

        .process-h2 {
            font-size: clamp(2.2rem, 5vw, 4.5rem);
            font-weight: 900;
            letter-spacing: -3px;
            line-height: 1;
            color: var(--white);
            margin-bottom: 28px;
            max-width: 800px;
        }

        .process-h2 span { color: var(--orange); }

        .process-p {
            font-size: 1.1rem;
            color: #888;
            max-width: 620px;
            line-height: 1.75;
        }

        .process-bg-num {
            position: absolute;
            font-size: 28vw;
            font-weight: 900;
            color: rgba(255,255,255,0.015);
            letter-spacing: -10px;
            z-index: 1;
            pointer-events: none;
            user-select: none;
        }

        /* ═══════════════════════════════════════
           SCENE 4 · TEAM (dark, pinned, 5 spots)
        ═══════════════════════════════════════ */
        #scene-team { background: #050505; }

        .team-spotlight {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 5%;
            opacity: 0; visibility: hidden;
        }
        #tm1 {
            opacity: 1; visibility: visible;
        }

        .member-wrap {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 70px;
            align-items: center;
            max-width: 1400px;
            width: 100%;
        }

        /* Photo */
        .member-photo-block { position: relative; display: flex; justify-content: center; }

        .member-avatar {
            width: 260px;
            height: 260px;
            border-radius: 50%;
            border: 3px solid var(--orange);
            position: relative;
            z-index: 2;
            overflow: hidden;
            box-shadow: 0 0 60px rgba(255,87,34,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4.5rem;
            font-weight: 900;
            color: var(--white);
            background: linear-gradient(135deg, #1a1a1a 0%, #2a1210 100%);
            user-select: none;
        }

        /* Real image when provided */
        .member-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Pulse rings */
        .pulse-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255,87,34,0.3);
            animation: pulseRing 3s ease-out infinite;
        }
        .pulse-ring:nth-child(1) { inset: -16px; animation-delay: 0s; }
        .pulse-ring:nth-child(2) { inset: -32px; animation-delay: 0.7s; }
        .pulse-ring:nth-child(3) { inset: -50px; animation-delay: 1.4s; }

        @keyframes pulseRing {
            0%   { opacity: 0.8; transform: scale(1); }
            100% { opacity: 0;   transform: scale(1.1); }
        }

        /* Member text */
        .member-role {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--orange);
            margin-bottom: 12px;
        }

        .member-name {
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 900;
            letter-spacing: -1.5px;
            color: var(--white);
            line-height: 1;
            margin-bottom: 20px;
        }

        .member-desc {
            font-size: 1rem;
            color: #ccc;
            line-height: 1.8;
            margin-bottom: 24px;
            text-align: justify;
        }

        .member-desc strong { color: #ccc; }

        .member-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .mtag {
            background: rgba(255,87,34,0.12);
            color: var(--orange2);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 20px;
            border: 1px solid rgba(255,87,34,0.25);
        }

        .member-trained {
            font-size: 0.82rem;
            color: #ccc;
            border-top: 1px solid rgba(255,255,255,0.06);
            padding-top: 16px;
        }

        .member-trained strong { color: var(--orange); }

        /* Team progress indicator */
        .team-indicator {
            position: absolute;
            right: 48px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 14px;
            z-index: 10;
        }

        .t-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            transition: all 0.4s ease;
        }

        .t-dot.on {
            background: var(--orange);
            height: 28px;
            border-radius: 3px;
        }

        /* ═══════════════════════════════════════
           SCENE 5 · STATS
        ═══════════════════════════════════════ */
        #scene-stats {
            background: var(--orange);
            height: auto;
            padding: 100px 5%;
            min-height: unset;
        }

        .stats-row {
            max-width: 1500px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            text-align: center;
        }

        .stat-n {
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 900;
            line-height: 1;
            color: var(--white);
            margin-bottom: 10px;
        }

        .stat-l {
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.75);
        }

        /* ═══════════════════════════════════════
           SCENE 6 · CTA
        ═══════════════════════════════════════ */
        #scene-cta {
            background: var(--dark);
            height: auto;
            padding: 160px 5%;
            text-align: center;
        }

        .cta-h {
            font-size: clamp(2.5rem, 7vw, 6rem);
            font-weight: 900;
            letter-spacing: -3px;
            line-height: 0.95;
            color: var(--white);
            margin-bottom: 24px;
        }

        .cta-h span { color: var(--orange); }

        .cta-sub {
            font-size: 1.1rem;
            color: #ccc;
            max-width: 500px;
            margin: 0 auto 52px;
            line-height: 1.75;
            text-align: justify;
        }

        .cta-btn {
            display: inline-block;
            background: var(--orange);
            color: var(--white);
            font-size: 1rem;
            font-weight: 800;
            padding: 20px 56px;
            border-radius: 50px;
            text-decoration: none;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            box-shadow: 0 10px 50px rgba(255,87,34,0.4);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cta-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 70px rgba(255,87,34,0.6);
        }

        /* ═══════════════════════════════════════
           FOOTER
        ═══════════════════════════════════════ */
        footer {
            background: #020202;
            color: var(--white);
            text-align: center;
            padding: 60px 20px;
        }

        footer a {
            color: #ccc;
            text-decoration: none;
            margin: 0 12px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        footer a:hover { color: var(--orange); }

        /* ═══════════════════════════════════════
           RESPONSIVE
        ═══════════════════════════════════════ */
        @media (max-width: 900px) {
            .team-spotlight {
                align-items: flex-start;
                padding-top: 110px;
                padding-bottom: 40px;
                overflow-y: auto;
            }
            .who-grid { grid-template-columns: 1fr; gap: 40px; }
            .who-3d { width: 100%; height: 520px; }
            .member-wrap { grid-template-columns: 1fr; text-align: center; gap: 20px; }
            .member-avatar { width: 150px; height: 150px; font-size: 3rem; margin: 0 auto; }
            .pulse-ring { display: none; }
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .team-indicator { display: none; }
            .process-h2 { letter-spacing: -1px; }
        }

        @media (max-width: 560px) {
            .stats-row { grid-template-columns: 1fr; }
            .hero-h1 { letter-spacing: -2px; }
        }
    </style>

<!-- ════════════════════════════════════════════════════════
     SCENE 1 · HERO
     Primary KW: Best Digital Marketing Company in India
═════════════════════════════════════════════════════════ -->
<section id="scene-hero" class="scene" role="banner" aria-label="Fusion X - Best Digital Marketing Company in India">
    <canvas id="canvas-hero" class="bg-canvas"></canvas>

    <div class="scene-content hero-wrap">
        <span class="eyebrow">Chennai · India · Global</span>
        <h1 class="hero-h1" itemprop="headline">
            <span class="word">Best</span><span class="word">Digital</span><br>
            <span class="word">Marketing</span><span class="word orange">Company</span><br>
            <span class="word">in</span><span class="word orange">India</span>
        </h1>
        <p class="hero-sub" itemprop="description">
            Fusion X engineers brand dominance through EEAT-optimized SEO, AEO, GEO, paid media, and custom web development - taking brands from local visibility to global market leadership.
        </p>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     SCENE 2 · WHO WE ARE
     Secondary KW: digital growth partner, brand growth
═════════════════════════════════════════════════════════ -->
<section id="scene-who" class="scene" aria-label="About Fusion X - Best Digital Marketing Team in Chennai">
    <div class="scene-content who-grid">
        <div>
            <span class="eyebrow" style="color:#ff5722;">Who We Are</span>
            <h2 class="who-headline">
                India's Premier<br>
                <span class="orange">Digital Growth</span><br>
                Partner
            </h2>
            <p class="who-body">
                Fusion X is more than the <strong>best digital marketing company in Chennai</strong> - we are a full-stack brand growth engine. We partner with startups, SMEs, and international enterprises to engineer sustainable digital dominance.
                <br><br>
                Our approach combines <strong>Technical SEO</strong>, <strong>Answer Engine Optimization (AEO)</strong>, and <strong>Generative Engine Optimization (GEO)</strong> - ensuring your brand is visible in traditional search, AI answer systems like Google SGE, and ChatGPT. Every piece of content we create is EEAT-rich: demonstrating Experience, Expertise, Authoritativeness, and Trustworthiness.
            </p>
        </div>
        <div class="who-3d" aria-hidden="true">
<!-- ════════════════════════════════════════════════════════
                 FUSION X NEURAL GROWTH MATRIX (0 KB WebGL - 120 FPS Pure CSS & SVG)
                 Replaces heavy 3D planetary spheres with ultra-fast, attractive interactive growth cockpit
            ═════════════════════════════════════════════════════════ -->
            <div class="growth-matrix-hud" id="growth-engine-hud">
                
                <!-- Background Ambient Glow & Grid -->
                <div class="hud-bg-grid"></div>
                <div class="hud-ambient-glow"></div>

                <!-- Top Telemetry Status Bar -->
                <div class="hud-top-bar">
                    <div class="hud-status-indicator">
                        <span class="hud-pulse-dot"></span>
                        <span class="hud-status-label"><span class="ver-badge">v4.2 </span>FX ENGINE &bull; ONLINE</span>
                    </div>
                    <div class="hud-chip-badge">
                        <i class="fa-solid fa-bolt" style="color: #ff5722;"></i>
                        <span>100% SPEED<span class="lag-badge"> &bull; ZERO LAG</span></span>
                    </div>
                </div>

                <!-- Interactive SVG Neural Circuit Lines -->
                <svg class="hud-circuit-svg" id="hud-circuit-svg" viewBox="0 0 540 440" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="circuitGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#ff5722" stop-opacity="0.3"/>
                            <stop offset="50%" stop-color="#ff7043" stop-opacity="0.85"/>
                            <stop offset="100%" stop-color="#ff5722" stop-opacity="0.3"/>
                        </linearGradient>
                        <filter id="glowFilter" x="-30%" y="-30%" width="160%" height="160%">
                            <feGaussianBlur stdDeviation="2.5" result="blur"/>
                            <feComposite in="SourceGraphic" in2="blur" operator="over"/>
                        </filter>
                    </defs>

                    <!-- Groups dynamically routed by JavaScript -->
                    <g id="circuit-paths-group">
                        <path class="circuit-path" id="circuit-path-0" d="M 270 220 L 190 140 L 110 80" />
                        <path class="circuit-path" id="circuit-path-1" d="M 270 220 L 350 140 L 430 80" />
                        <path class="circuit-path" id="circuit-path-2" d="M 270 220 L 175 220 L 80 220" />
                        <path class="circuit-path" id="circuit-path-3" d="M 270 220 L 365 220 L 460 220" />
                        <path class="circuit-path" id="circuit-path-4" d="M 270 220 L 190 300 L 110 360" />
                        <path class="circuit-path" id="circuit-path-5" d="M 270 220 L 350 300 L 430 360" />
                    </g>
                    <g id="circuit-sparks-group">
                        <circle class="circuit-spark" id="circuit-spark-0" r="3" fill="#ff7043" filter="url(#glowFilter)"><animateMotion path="M 270 220 L 190 140 L 110 80" dur="2.4s" repeatCount="indefinite" /></circle>
                        <circle class="circuit-spark" id="circuit-spark-1" r="3" fill="#ff7043" filter="url(#glowFilter)"><animateMotion path="M 270 220 L 350 140 L 430 80" dur="2.1s" repeatCount="indefinite" /></circle>
                        <circle class="circuit-spark" id="circuit-spark-2" r="3" fill="#ff7043" filter="url(#glowFilter)"><animateMotion path="M 270 220 L 175 220 L 80 220" dur="1.8s" repeatCount="indefinite" /></circle>
                        <circle class="circuit-spark" id="circuit-spark-3" r="3" fill="#ff7043" filter="url(#glowFilter)"><animateMotion path="M 270 220 L 365 220 L 460 220" dur="2.6s" repeatCount="indefinite" /></circle>
                        <circle class="circuit-spark" id="circuit-spark-4" r="3" fill="#ff7043" filter="url(#glowFilter)"><animateMotion path="M 270 220 L 190 300 L 110 360" dur="2.2s" repeatCount="indefinite" /></circle>
                        <circle class="circuit-spark" id="circuit-spark-5" r="3" fill="#ff7043" filter="url(#glowFilter)"><animateMotion path="M 270 220 L 350 300 L 430 360" dur="2.5s" repeatCount="indefinite" /></circle>
                    </g>
                </svg>

                <!-- 6 Interactive Holographic Growth Pods -->
                <div class="hud-pods-layer">

                    <!-- Pod 0: Meta Ads AI -->
                    <div class="hud-pod-card pod-top-left" data-index="0" data-title="Meta Advantage+ Funnels" data-desc="Advantage+ Shopping campaigns with high-converting creative testing driving peak 4.8x ROAS.">
                        <div class="pod-icon">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor" aria-hidden="true">
                                <path d="M8.217 5.243C9.18 3.926 10.421 3 11.968 3 14.153 3 16 4.908 16 7.643c0 3.013-1.974 5.357-4.25 5.357-1.398 0-2.48-.65-3.37-1.84-.132.18-.27.35-.417.51C6.98 12.89 5.82 13.5 4.385 13.5 2.11 13.5 0 11.156 0 7.643 0 4.908 1.847 3 4.032 3c1.547 0 2.788.926 3.751 2.243.15-.205.305-.4.467-.58.157-.174.32-.34.488-.49.003-.003.007-.006.01-.01.003.004.006.007.01.01a6.38 6.38 0 0 1 .469.57zm.732 2.455a7.92 7.92 0 0 0-.949-1.34c-.73-.85-1.63-1.408-2.67-1.408-1.38 0-2.58 1.258-2.58 3.09 0 2.15 1.28 3.51 2.71 3.51 1.05 0 1.93-.578 2.65-1.448.33-.4.6-.87.839-1.402zm2.083-2.748c-1.04 0-1.94.558-2.67 1.408a7.92 7.92 0 0 0-.949 1.34 6.7 6.7 0 0 0 .839 1.402c.72.87 1.6 1.448 2.65 1.448 1.43 0 2.71-1.36 2.71-3.51 0-1.832-1.2-3.09-2.58-3.09z"/>
                            </svg>
                        </div>
                        <div class="pod-info">
                            <span class="pod-name">Meta Ads AI</span>
                            <span class="pod-metric">+4.8x ROAS</span>
                        </div>
                        <div class="pod-pin pin-right"></div>
                    </div>

                    <!-- Pod 1: Generative SEO (AEO & GEO) -->
                    <div class="hud-pod-card pod-top-right" data-index="1" data-title="AEO & GEO Generative SEO" data-desc="Dominating organic keyword silos & ranking in Google Gemini, ChatGPT, and SGE AI summaries.">
                        <div class="pod-pin pin-left"></div>
                        <div class="pod-icon">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true">
                                <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                <path d="M12 7l-.6 1.4L10 9l1.4.6.6 1.4.6-1.4L14 9l-1.4-.6z"/>
                            </svg>
                        </div>
                        <div class="pod-info">
                            <span class="pod-name">AEO &amp; GEO</span>
                            <span class="pod-metric">#1 SERP &bull; AI</span>
                        </div>
                    </div>

                    <!-- Pod 2: Web Architecture -->
                    <div class="hud-pod-card pod-mid-left" data-index="2" data-title="Next-Gen Web Architecture" data-desc="Custom-coded Shopify Liquid & React platforms with 1.2s mobile Core Web Vitals & high-CRO UX.">
                        <div class="pod-icon"><i class="fa-solid fa-code"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">Custom Web</span>
                            <span class="pod-metric">1.2s Fast CWV</span>
                        </div>
                        <div class="pod-pin pin-right"></div>
                    </div>

                    <!-- Pod 3: AI WhatsApp Bot -->
                    <div class="hud-pod-card pod-mid-right" data-index="3" data-title="Conversational AI Sales Bot" data-desc="24/7 intelligent WhatsApp API bot assisting customers, recommending products, and booking inquiries.">
                        <div class="pod-pin pin-left"></div>
                        <div class="pod-icon"><i class="fa-brands fa-whatsapp"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">WhatsApp AI</span>
                            <span class="pod-metric">900+ Calls/Mo</span>
                        </div>
                    </div>

                    <!-- Pod 4: Server-Side CAPI -->
                    <div class="hud-pod-card pod-bot-left" data-index="4" data-title="Attribution Telemetry & CAPI" data-desc="First-party Meta Conversions API & GA4 telemetry ensuring 100% signal preservation & ROAS accuracy.">
                        <div class="pod-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">Attribution</span>
                            <span class="pod-metric">100% CAPI</span>
                        </div>
                        <div class="pod-pin pin-right"></div>
                    </div>

                    <!-- Pod 5: Viral Video SEO -->
                    <div class="hud-pod-card pod-bot-right" data-index="5" data-title="Viral Video Production Studio" data-desc="End-to-end video scripting, multi-angle shoots, high-retention editing, and YouTube/Reels SEO.">
                        <div class="pod-pin pin-left"></div>
                        <div class="pod-icon"><i class="fa-solid fa-video"></i></div>
                        <div class="pod-info">
                            <span class="pod-name">Video Studio</span>
                            <span class="pod-metric">Viral Reach</span>
                        </div>
                    </div>

                </div>

                <!-- Central Kinetic Reactor Core -->
                <div class="hud-core-stage">
                    <div class="core-orbit-ring ring-outer"></div>
                    <div class="core-orbit-ring ring-mid"></div>
                    <div class="core-center-reactor">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo_transparent.png" alt="Fusion X Core" class="core-logo-badge">
                        <div class="core-energy-aura"></div>
                    </div>
                    <div class="core-label-pill">
                        <span class="core-pulse-beacon"></span>
                        <span id="hud-active-label">GROWTH REACTOR</span>
                    </div>
                </div>

                <!-- Bottom Real-Time Telemetry Bar -->
                <div class="hud-bottom-telemetry">
                    <div class="telemetry-item">
                        <span class="telemetry-val">50+</span>
                        <span class="telemetry-lbl">HAPPY CUSTOMERS</span>
                    </div>
                    <div class="telemetry-divider"></div>
                    <div class="telemetry-item">
                        <span class="telemetry-val">+470%</span>
                        <span class="telemetry-lbl">AVG TRAFFIC LIFT</span>
                    </div>
                    <div class="telemetry-divider"></div>
                    <div class="telemetry-item">
                        <span class="telemetry-val">4.8x</span>
                        <span class="telemetry-lbl">PEAK ROAS</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     SCENE 3 · OUR PROCESS (pinned - 3 steps)
     KW: competitor analysis, brand growth, SEO audit
═════════════════════════════════════════════════════════ -->
<section id="scene-process" class="scene" aria-label="Fusion X digital marketing process">
    <canvas id="canvas-process-bg" class="bg-canvas"></canvas>

    <!-- Step 1 -->
    <div class="process-stage" id="ps1" role="region" aria-label="Step 1: Deep Competitor Analysis">
        <div class="process-bg-num" aria-hidden="true">01</div>
        <div class="process-counter">Step 01 / 03</div>
        <div class="process-icon-wrap"><i class="fas fa-search" aria-hidden="true"></i></div>
        <h2 class="process-h2">Deep <span>Competitor</span> Analysis</h2>
        <p class="process-p">
            We reverse-engineer your top competitors - mapping what they did brilliantly, where they failed, and what organic and paid whitespace exists for your brand to own. We look at their SERP rankings, backlink profiles, content gaps, and ad strategies.
        </p>
    </div>

    <!-- Step 2 -->
    <div class="process-stage" id="ps2" role="region" aria-label="Step 2: Identify Gaps and Fix Mistakes">
        <div class="process-bg-num" aria-hidden="true">02</div>
        <div class="process-counter">Step 02 / 03</div>
        <div class="process-icon-wrap"><i class="fas fa-tools" aria-hidden="true"></i></div>
        <h2 class="process-h2">Identify &amp; <span>Fix</span> Every Gap</h2>
        <p class="process-p">
            We audit your entire digital presence - Core Web Vitals, EEAT signals, schema markup, content quality, page speed, UX, and conversion funnels. Every critical weakness is systematically corrected before we scale.
        </p>
    </div>

    <!-- Step 3 -->
    <div class="process-stage" id="ps3" role="region" aria-label="Step 3: Innovate and Scale Globally">
        <div class="process-bg-num" aria-hidden="true">03</div>
        <div class="process-counter">Step 03 / 03</div>
        <div class="process-icon-wrap"><i class="fas fa-rocket" aria-hidden="true"></i></div>
        <h2 class="process-h2">Innovate &amp; <span>Scale</span> Globally</h2>
        <p class="process-p">
            We inject original, data-driven strategies - AI-optimized content, GEO frameworks, and precision paid campaigns - to scale your brand from a local name to a globally recognized market leader.
        </p>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     SCENE 4 · TEAM (pinned - 5 spotlight members)
     KW: best SEO expert India, best web developer Chennai
═════════════════════════════════════════════════════════ -->
<section id="scene-team" class="scene" aria-label="Best digital marketing experts in India">
    <canvas id="canvas-team-bg" class="bg-canvas"></canvas>

    <!-- Member 1: Jaiharan K – CEO -->
    <div class="team-spotlight" id="tm1" role="region" itemscope itemtype="https://schema.org/Person">
        <div class="member-wrap">
            <div class="member-photo-block">
                <div class="member-avatar" aria-label="Jaiharan K - CEO" itemprop="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/jaiharan-k-ceo-best-digital-marketing-company-fusion-x.webp" alt="Jaiharan K - CEO of Fusion X Best Digital Marketing Company in Chennai" title="Jaiharan K - CEO &amp; Business Operations Leader"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
            </div>
            <div>
                <span class="member-role" itemprop="jobTitle">CEO &amp; Business Operations</span>
                <h2 class="member-name" itemprop="name">Jaiharan K</h2>
                <p class="member-desc" itemprop="description">
                    As CEO of the <strong>best digital marketing company in Chennai</strong>, Jaiharan K leads Fusion X's core operations, client strategy, and business growth. His leadership ensures every brand partnership delivers measurable global impact - from onboarding to scaling.
                </p>
                <div class="member-tags">
                    <span class="mtag">Brand Strategy</span>
                    <span class="mtag">Business Operations</span>
                    <span class="mtag">Client Management</span>
                    <span class="mtag">Agency Leadership</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Member 2: Kamalesh J – Digital Marketing Expert -->
    <div class="team-spotlight" id="tm2" role="region" itemscope itemtype="https://schema.org/Person">
        <div class="member-wrap">
            <div class="member-photo-block">
                <div class="member-avatar" aria-label="Kamalesh J - Digital Marketing Expert" itemprop="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
            </div>
            <div>
                <span class="member-role" itemprop="jobTitle">Best Digital Marketing Expert in India</span>
                <h2 class="member-name" itemprop="name">Kamalesh J</h2>
                <p class="member-desc" itemprop="description">
                    India's best digital marketing expert - trained at <strong>Digital Scholar</strong> under Karthik Maruthai (SEO), Sorav Jain (Social &amp; Growth), Rishi Jain (Meta Ads), and Eugene Samuel (Google Ads). Kamalesh architects multi-channel strategies that make brands globally visible and conversion-optimized.
                </p>
                <div class="member-tags">
                    <span class="mtag">Meta Ads</span>
                    <span class="mtag">Google Ads</span>
                    <span class="mtag">Social Media Marketing</span>
                    <span class="mtag">Lead Generation</span>
                    <span class="mtag">Personal Branding</span>
                </div>
                <div class="member-trained" itemprop="alumniOf">Trained at <strong>Digital Scholar</strong> - India's #1 Digital Marketing Institute</div>
            </div>
        </div>
    </div>

    <!-- Member 3: Kannan S – Web Developer -->
    <div class="team-spotlight" id="tm3" role="region" itemscope itemtype="https://schema.org/Person">
        <div class="member-wrap">
            <div class="member-photo-block">
                <div class="member-avatar" aria-label="Kannan S - Web Developer" itemprop="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kannan-s-web-developer.webp" alt="Kannan S"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
            </div>
            <div>
                <span class="member-role" itemprop="jobTitle">Best Website Developer in Chennai</span>
                <h2 class="member-name" itemprop="name">Kannan S</h2>
                <p class="member-desc" itemprop="description">
                    One of the <strong>best website developers in Chennai</strong>, Kannan builds lightning-fast, SEO-optimized, and fully custom-coded digital platforms. From Shopify stores to bespoke React applications - every site he engineers is built to rank high and convert visitors into loyal customers.
                </p>
                <div class="member-tags">
                    <span class="mtag">React Certified</span>
                    <span class="mtag">Shopify Expert</span>
                    <span class="mtag">WordPress Developer</span>
                    <span class="mtag">Custom Web Dev</span>
                    <span class="mtag">SEO Architecture</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Member 4: Saravana Sanjhay.M – SEO Expert -->
    <div class="team-spotlight" id="tm4" role="region" itemscope itemtype="https://schema.org/Person">
        <div class="member-wrap">
            <div class="member-photo-block">
                <div class="member-avatar" aria-label="Saravana Sanjhay M - SEO Expert" itemprop="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/saravana-sanjhay-m-seo-expert.webp" alt="Saravana Sanjhay M"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
            </div>
            <div>
                <span class="member-role" itemprop="jobTitle">Best SEO Expert in India</span>
                <h2 class="member-name" itemprop="name">Saravana Sanjhay.M</h2>
                <p class="member-desc" itemprop="description">
                    Among India's <strong>best SEO experts</strong> - a certified Angular developer who combines rare deep technical skill with advanced SEO strategy. Saravana engineers EEAT-optimized, AEO-ready, and GEO-structured content architectures that dominate SERPs and AI answer systems globally.
                </p>
                <div class="member-tags">
                    <span class="mtag">Angular Certified</span>
                    <span class="mtag">Technical SEO</span>
                    <span class="mtag">AEO &amp; GEO</span>
                    <span class="mtag">EEAT Strategy</span>
                    <span class="mtag">Shopify SEO</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Member 5: Jabakumar – Editor -->
    <div class="team-spotlight" id="tm5" role="region" itemscope itemtype="https://schema.org/Person">
        <div class="member-wrap">
            <div class="member-photo-block">
                <div class="member-avatar" aria-label="Jabakumar - Content Editor" itemprop="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/jabakumar-video-editor.webp" alt="Jabakumar"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring"></div>
            </div>
            <div>
                <span class="member-role" itemprop="jobTitle">Best Video Editor &amp; Content Producer</span>
                <h2 class="member-name" itemprop="name">Jabakumar</h2>
                <p class="member-desc" itemprop="description">
                    The creative engine behind Fusion X's visual storytelling. Jabakumar edits every video, reel, and visual asset to perfection - maximizing audience retention, engagement rates, and brand recall across all social media channels for every brand we serve.
                </p>
                <div class="member-tags">
                    <span class="mtag">Video Editing</span>
                    <span class="mtag">Reels &amp; Shorts</span>
                    <span class="mtag">Visual Branding</span>
                    <span class="mtag">Brand Storytelling</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress indicator -->
    <div class="team-indicator" aria-hidden="true">
        <div class="t-dot on" data-i="0"></div>
        <div class="t-dot" data-i="1"></div>
        <div class="t-dot" data-i="2"></div>
        <div class="t-dot" data-i="3"></div>
        <div class="t-dot" data-i="4"></div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     SCENE 5 · STATS
═════════════════════════════════════════════════════════ -->
<section id="scene-stats" aria-label="Fusion X results and achievements">
    <div class="stats-row">
        <div class="stat-item">
            <div class="stat-n" data-target="50" data-suffix="+">0</div>
            <div class="stat-l">Happy Customers</div>
        </div>
        <div class="stat-item">
            <div class="stat-n" data-target="5" data-suffix="">0</div>
            <div class="stat-l">In-House Specialists</div>
        </div>
        <div class="stat-item">
            <div class="stat-n" data-target="5" data-suffix="+">0</div>
            <div class="stat-l">Core Industries Served</div>
        </div>
        <div class="stat-item">
            <div class="stat-n" data-target="360" data-suffix="°">0</div>
            <div class="stat-l">Digital Coverage</div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     SCENE 6 · CTA
═════════════════════════════════════════════════════════ -->
<section id="scene-cta" aria-label="Contact Fusion X - Best Digital Marketing Company India" style="position: relative; overflow: hidden;">
    <canvas id="canvas-cta" class="bg-canvas"></canvas>
    <div style="position: relative; z-index: 2;">
    <span class="eyebrow">Ready to Dominate?</span>
    <h2 class="cta-h">Take Your Brand<br><span>Worldwide</span></h2>
    <p class="cta-sub">Whether you are a local Chennai startup or a global enterprise - Fusion X architects your digital dominance from day one.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn">Let's Connect →</a>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     FOOTER
═════════════════════════════════════════════════════════ -->

<?php
get_footer();
