<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <title>Dirga | Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --red: #e03030;
            --black: #0a0a0a;
            --dark: #111111;
            --surface: #161616;
            --border: rgba(255,255,255,0.08);
            --text: #f0f0f0;
            --muted: #666;
            --muted2: #999;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--black);
            color: var(--text);
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        nav {
            position: fixed;
            top: 0; width: 100%;
            z-index: 100;
            padding: 24px 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10,10,10,0.88);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .logo {
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            color: #fff;
            text-decoration: none;
            z-index: 102;
            position: relative;
        }
        .logo span { color: var(--red); }
        .nav-links { display: flex; gap: 36px; list-style: none; }
        .nav-links a {
            font-size: 0.82rem;
            font-weight: 400;
            color: var(--muted2);
            text-decoration: none;
            transition: color 0.25s;
        }
        .nav-links a:hover { color: #fff; }

        .hamburger {
            display: none;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            width: 36px; height: 36px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            z-index: 102;
            position: relative;
        }
        .hamburger span {
            display: block;
            height: 1.5px;
            background: #fff;
            border-radius: 2px;
            transition: transform 0.3s ease, opacity 0.3s ease, width 0.3s ease;
            transform-origin: center;
        }
        .hamburger span:nth-child(2) { width: 70%; margin-left: auto; }
        .hamburger.open span:nth-child(1) { transform: translateY(6.5px) rotate(45deg); }
        .hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .hamburger.open span:nth-child(3) { transform: translateY(-6.5px) rotate(-45deg); }

        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 101;
            background: rgba(10,10,10,0.97);
            backdrop-filter: blur(16px);
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            opacity: 0;
            transform: translateY(-12px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }
        .mobile-menu.open { opacity: 1; transform: translateY(0); pointer-events: all; }
        .mobile-menu a {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--muted2);
            text-decoration: none;
            letter-spacing: 0.04em;
            padding: 12px 0;
            transition: color 0.2s;
        }
        .mobile-menu a:hover { color: #fff; }
        .mobile-menu .mobile-divider { width: 32px; height: 1px; background: var(--border); margin: 6px 0; }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
            padding: 100px 64px 80px;
            position: relative;
            overflow: hidden;
        }
        #heroBg {
            position: absolute;
            inset: 0;
            width: 100%; height: 100%;
            z-index: 0;
            opacity: 0.55;
        }
        .hero-content, .hero-photo-wrap { position: relative; z-index: 2; }
        .hero-content { max-width: 520px; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(224,48,48,0.08);
            border: 1px solid rgba(224,48,48,0.2);
            color: var(--red);
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            padding: 6px 14px;
            border-radius: 100px;
            margin-bottom: 32px;
            animation: fadeUp 0.6s 0.1s both;
        }
        .hero-badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--red);
            animation: blink 2s infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.2; }
        }
        .hero-title {
            font-size: clamp(2.6rem, 5.5vw, 4.4rem);
            font-weight: 700;
            line-height: 1.1;
            color: #fff;
            margin-bottom: 22px;
            animation: fadeUp 0.6s 0.25s both;
        }
        .hero-title span { color: var(--red); }
        .hero-desc {
            font-size: 0.97rem;
            font-weight: 300;
            color: var(--muted2);
            line-height: 1.9;
            margin-bottom: 40px;
            animation: fadeUp 0.6s 0.4s both;
        }
        .hero-actions {
            display: flex;
            gap: 12px;
            animation: fadeUp 0.6s 0.55s both;
        }

        /* ── BUTTONS ── */
        .btn {
            display: inline-block;
            padding: 12px 28px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.82rem;
            font-weight: 500;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.25s;
            border: none;
            cursor: pointer;
            letter-spacing: 0.02em;
        }
        .btn-primary { background: var(--red); color: #fff; }
        .btn-primary:hover {
            background: #c52525;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(224,48,48,0.25);
        }
        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
        }
        .btn-outline:hover {
            border-color: rgba(255,255,255,0.22);
            background: rgba(255,255,255,0.04);
            transform: translateY(-2px);
        }

        /* ── HERO PHOTO ── */
        .hero-photo-wrap { flex-shrink: 0; animation: fadeUp 0.7s 0.4s both; }
        .hero-photo-frame {
            position: relative;
            width: 320px; height: 390px;
            cursor: pointer;
        }
        .hero-photo-frame::before {
            content: '';
            position: absolute;
            top: 14px; right: -14px;
            width: 100%; height: 100%;
            border: 1.5px solid rgba(224,48,48,0.28);
            border-radius: 16px;
            z-index: 0;
            transition: top 0.4s ease, right 0.4s ease, border-color 0.4s ease;
        }
        .hero-photo-frame:hover::before { top: 20px; right: -20px; border-color: rgba(224,48,48,0.6); }
        .hero-photo-frame::after {
            content: '';
            position: absolute;
            bottom: -50px; left: -50px;
            width: 280px; height: 280px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(224,48,48,0.09) 0%, transparent 70%);
            z-index: 0;
            pointer-events: none;
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        .hero-photo-frame:hover::after { opacity: 2; transform: scale(1.3); }
        .hero-photo-frame img {
            position: relative; z-index: 1;
            width: 100%; height: 100%;
            object-fit: cover;
            border-radius: 16px;
            display: block;
            filter: grayscale(8%);
            transition: transform 0.5s ease, filter 0.4s ease, box-shadow 0.4s ease;
        }
        .hero-photo-frame:hover img {
            transform: scale(1.03);
            filter: grayscale(0%);
            box-shadow: 0 20px 60px rgba(224,48,48,0.2), 0 8px 24px rgba(0,0,0,0.4);
        }

        /* ── DIVIDER ── */
        .divider { height: 1px; background: var(--border); margin: 0 64px; }

        /* ── SECTION BASE ── */
        section { padding: 96px 64px; }
        .section-eyebrow {
            font-size: 0.7rem;
            font-weight: 500;
            color: var(--red);
            letter-spacing: 0.16em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .section-title {
            font-size: 2.1rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 52px;
            line-height: 1.2;
        }

        /* ── PROJECTS ── */
        .projects-bg { background: var(--black); }
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .project-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            transition: border-color 0.3s, transform 0.3s;
        }
        .project-card:hover { border-color: rgba(255,255,255,0.15); transform: translateY(-4px); }
        .project-card-img img {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            display: block;
            filter: grayscale(30%) brightness(0.7);
            transition: transform 0.5s, filter 0.4s;
        }
        .project-card:hover .project-card-img img { transform: scale(1.05); filter: grayscale(0%) brightness(0.85); }
        .project-card-body { padding: 22px; }
        .project-card-title { font-size: 0.98rem; font-weight: 600; color: #fff; margin-bottom: 8px; }
        .project-card-desc { font-size: 0.8rem; font-weight: 300; color: var(--muted2); line-height: 1.7; margin-bottom: 18px; }
        .project-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border);
            padding-top: 14px;
        }
        .project-stack { display: flex; gap: 6px; }
        .project-stack span {
            font-size: 0.67rem;
            font-weight: 500;
            color: var(--red);
            background: rgba(255,255,255,0.04);
            padding: 3px 8px;
            border-radius: 4px;
        }
        .project-link-btn {
            font-size: 0.74rem;
            font-weight: 500;
            color: var(--red);
            text-decoration: none;
            transition: letter-spacing 0.2s;
        }
        .project-link-btn:hover { letter-spacing: 0.04em; }

        /* ── SKILLS ── */
        .skills-bg { background: var(--dark); }

        .skills-tabs {
            display: inline-flex;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 36px;
            gap: 4px;
        }
        .skills-tab-btn {
            padding: 8px 22px;
            min-width: 110px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--muted2);
            background: transparent;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            transition: background 0.25s, color 0.25s;
            letter-spacing: 0.02em;
        }
        .skills-tab-btn.active { background: var(--red); color: #fff; }
        .skills-tab-btn:not(.active):hover { color: #fff; }

        .skills-panel {
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.35s ease, transform 0.35s ease;
        }
        .skills-panel.active { display: grid; }
        .skills-panel.visible { opacity: 1; transform: translateY(0); }
        #panel-hard { grid-template-columns: repeat(5, 1fr); gap: 16px; }
        #panel-soft { grid-template-columns: repeat(4, 1fr); gap: 16px; }

        .skill-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 14px;
            transition: border-color 0.3s, transform 0.3s;
        }
        .skill-card:hover { border-color: rgba(224,48,48,0.28); transform: translateY(-4px); }

        .skill-icon {
            width: 42px; height: 42px;
            border-radius: 10px;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            transition: background 0.3s, border-color 0.3s;
        }
        .skill-card:hover .skill-icon { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.15); }
        .skill-icon svg { width: 22px; height: 22px; }
        .skill-icon.stroke svg {
            fill: none;
            stroke: var(--red);
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .skill-card-text { display: flex; flex-direction: column; gap: 3px; }
        .skill-name { font-size: 1rem; font-weight: 600; color: #fff; }
        .skill-label { font-size: 0.68rem; font-weight: 400; color: var(--muted); }

        /* ── EXPERIENCE ── */
        .experience-bg { background: var(--black); }
        .exp-tabs {
            display: inline-flex;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 36px;
            gap: 4px;
        }
        .exp-tab-btn {
            padding: 8px 22px;
            min-width: 110px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--muted2);
            background: transparent;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            transition: background 0.25s, color 0.25s;
            letter-spacing: 0.02em;
        }
        .exp-tab-btn.active { background: var(--red); color: #fff; }
        .exp-tab-btn:not(.active):hover { color: #fff; }

        .exp-panel {
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.35s ease, transform 0.35s ease;
            flex-direction: column;
            gap: 16px;
        }
        .exp-panel.active { display: flex; }
        .exp-panel.visible { opacity: 1; transform: translateY(0); }

        .exp-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 28px 32px;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 4px 24px;
            align-items: start;
            transition: border-color 0.3s, transform 0.3s;
            position: relative;
            overflow: hidden;
        }
        .exp-card::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 3px;
            background: var(--red);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .exp-card:hover { border-color: rgba(255,255,255,0.13); transform: translateX(4px); }
        .exp-card:hover::before { opacity: 1; }
        .exp-role { font-size: 1rem; font-weight: 600; color: #fff; margin-bottom: 4px; }
        .exp-org { font-size: 0.82rem; font-weight: 400; color: var(--red); margin-bottom: 10px; }
        .exp-desc { font-size: 0.82rem; font-weight: 300; color: var(--muted2); line-height: 1.75; grid-column: 1; }
        .exp-view-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 14px;
            font-size: 0.72rem;
            font-weight: 500;
            color: var(--muted2);
            text-decoration: none;
            border: 1px solid var(--border);
            padding: 5px 12px;
            border-radius: 6px;
            transition: color 0.2s, border-color 0.2s;
        }
        .exp-view-btn:hover { color: #fff; border-color: rgba(255,255,255,0.25); }
        .exp-view-btn svg { width: 13px; height: 13px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .exp-period {
            font-size: 0.72rem;
            font-weight: 500;
            color: var(--muted);
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            padding: 4px 12px;
            border-radius: 99px;
            white-space: nowrap;
            height: fit-content;
        }

        /* ── CONTACT ── */
        .contact-bg { background: var(--black); text-align: center; }
        .contact-inner { max-width: 480px; margin: 0 auto; }
        .contact-inner .section-eyebrow { text-align: center; }
        .contact-inner .section-title { margin-bottom: 14px; }
        .contact-sub { font-size: 0.88rem; font-weight: 300; color: var(--muted2); line-height: 1.85; margin-bottom: 36px; }
        .contact-btns { display: flex; justify-content: center; gap: 12px; }

        /* ── FOOTER ── */
        footer {
            padding: 26px 64px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .footer-logo { font-size: 0.92rem; font-weight: 600; color: #fff; }
        .footer-logo span { color: var(--red); }
        footer p { font-size: 0.73rem; font-weight: 300; color: var(--muted); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(22px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .reveal { opacity: 0; transform: translateY(26px); transition: opacity 0.7s ease, transform 0.7s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-d1 { transition-delay: 0.08s; }
        .reveal-d2 { transition-delay: 0.16s; }
        .reveal-d3 { transition-delay: 0.24s; }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .hero { flex-direction: column; padding: 120px 40px 80px; gap: 48px; }
            .hero-content { max-width: 100%; text-align: center; }
            .hero-badge { margin: 0 auto 32px; }
            .hero-actions { justify-content: center; }
            .hero-photo-frame { width: 240px; height: 290px; margin: 0 auto; }
            .hero-photo-frame::before { display: none; }
            #panel-hard { grid-template-columns: repeat(3, 1fr); }
            #panel-soft { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            nav { padding: 18px 24px; }
            .nav-links { display: none; }
            .hamburger { display: flex; }
            .mobile-menu { display: flex; }
            section { padding: 72px 24px; }
            .divider { margin: 0 24px; }
            .hero { padding: 110px 24px 72px; }
            .projects-grid { grid-template-columns: 1fr; }
            #panel-hard { grid-template-columns: repeat(2, 1fr); }
            #panel-soft { grid-template-columns: repeat(2, 1fr); }
            .skills-tabs { justify-content: center; }
            .exp-card { grid-template-columns: 1fr; }
            .exp-period { width: fit-content; margin-top: 4px; }
            footer { flex-direction: column; gap: 10px; text-align: center; padding: 24px; }
        }
        @media (max-width: 400px) {
            #panel-hard, #panel-soft { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav>
    <a href="#" class="logo">dir<span>.</span>ga</a>
    <ul class="nav-links">
        <li><a href="#projects">Projects</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
    <a href="#projects">Projects</a>
    <div class="mobile-divider"></div>
    <a href="#skills">Skills</a>
    <div class="mobile-divider"></div>
    <a href="#experience">Experience</a>
    <div class="mobile-divider"></div>
    <a href="#contact">Contact</a>
</div>

<!-- HERO -->
<section class="hero">
    <canvas id="heroBg"></canvas>
    <div class="hero-content">
        <div class="hero-badge">
            <span class="hero-badge-dot"></span>
            Available for Intern / Freelance
        </div>
        <h1 class="hero-title">Hi, I'm <span>Dirga</span><br>Undergraduate Student</h1>
        <p class="hero-desc">Mahasiswa semester 6 Sistem Informasi Universitas Hasanuddin dengan minat kuat pada perkembangan teknologi dan sistem informasi, serta memiliki kemampuan komunikasi dan kerja tim yang baik melalui pengalaman kerja dan organisasi.</p>
        <div class="hero-actions">
            <a href="#projects" class="btn btn-primary">View Projects</a>
            <a href="#contact" class="btn btn-outline">Get In Touch</a>
        </div>
    </div>
    <div class="hero-photo-wrap">
        <div class="hero-photo-frame">
            <<img src="{{ asset('fotodirga.jpg') }}" alt="Foto Dirga">
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- PROJECTS -->
<section id="projects" class="projects-bg">
    <div class="reveal">
        <p class="section-eyebrow">Study</p>
        <h2 class="section-title">Projects</h2>
    </div>
    <div class="projects-grid">
        <div class="project-card reveal reveal-d1">
            <div class="project-card-img">
                <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=700&auto=format&fit=crop&q=80" alt="Portfolio Website">
            </div>
            <div class="project-card-body">
                <h4 class="project-card-title">Portfolio Website</h4>
                <p class="project-card-desc">Mengembangkan website portofolio pribadi sebagai media untuk menampilkan profil, keahlian, dan proyek secara profesional dan interaktif.</p>
                <div class="project-card-footer">
                    <div class="project-stack">
                        <span>Laravel</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-card reveal reveal-d2">
            <div class="project-card-img">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=700&auto=format&fit=crop&q=80" alt="Hotel Management System">
            </div>
            <div class="project-card-body">
                <h4 class="project-card-title">Hotel Management System</h4>
                <p class="project-card-desc">Mengembangkan website manajemen hotel yang memfasilitasi pengelolaan data kamar, reservasi, dan pengguna secara terintegrasi.</p>
                <div class="project-card-footer">
                    <div class="project-stack">
                        <span>React</span>
                        <span>MySQL</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-card reveal reveal-d3">
            <div class="project-card-img">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=700&auto=format&fit=crop&q=80" alt="Hospital Management System">
            </div>
            <div class="project-card-body">
                <h4 class="project-card-title">Hospital Management System</h4>
                <p class="project-card-desc">Mengembangkan website SIMRS sederhana yang mendukung pengelolaan data pasien, rekam medis, dan administrasi layanan secara terstruktur dan efisien.</p>
                <div class="project-card-footer">
                    <div class="project-stack">
                        <span>Laravel</span>
                        <span>MySQL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- SKILLS -->
<section id="skills" class="skills-bg">
    <div class="reveal">
        <p class="section-eyebrow">Expertise</p>
        <h2 class="section-title" style="margin-bottom: 20px;">Skills</h2>
        <div class="skills-tabs">
            <button class="skills-tab-btn active" data-tab="hard">Hard Skills</button>
            <button class="skills-tab-btn" data-tab="soft">Soft Skills</button>
        </div>
    </div>

    <!-- HARD SKILLS -->
    <div class="skills-panel active" id="panel-hard">
        <div class="skill-card">
            <div class="skill-icon">
                <svg viewBox="0 0 50 52" xmlns="http://www.w3.org/2000/svg">
                    <path d="M49.626 11.564a.809.809 0 01.028.209v10.972a.8.8 0 01-.402.694l-9.209 5.302-.032.018v10.509a.8.8 0 01-.4.694L20.42 51.543a.729.729 0 01-.134.057.678.678 0 01-.128.02.68.68 0 01-.2-.02.6.6 0 01-.143-.057L.5 40.963a.8.8 0 01-.4-.694V6.334a.61.61 0 01.029-.209.757.757 0 01.029-.209.765.765 0 01.057-.124l.038-.076a.8.8 0 01.204-.209L10.35.278a.8.8 0 01.8 0l9.385 5.4a.8.8 0 01.402.694v10.509l8.006-4.608a.8.8 0 01.8 0l9.385 5.4c.055.03.104.07.147.114z" fill="#FF2D20"/>
                    <path fill="#fff" d="M9.93 10.668L.49 5.334 9.93.001l9.439 5.333z"/>
                    <path fill="#fff" opacity=".4" d="M9.93 10.668V21.335L.49 16V5.334z"/>
                    <path fill="#fff" opacity=".7" d="M9.93 10.668l9.439-5.334V16L9.93 21.335z"/>
                </svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">Laravel</span>
                <span class="skill-label">Intermediate</span>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="11.975" r="2.225" fill="#61DAFB"/>
                    <g stroke="#61DAFB" stroke-width="1" fill="none">
                        <ellipse rx="11" ry="4.2" cx="12" cy="11.975"/>
                        <ellipse rx="11" ry="4.2" cx="12" cy="11.975" transform="rotate(60 12 11.975)"/>
                        <ellipse rx="11" ry="4.2" cx="12" cy="11.975" transform="rotate(120 12 11.975)"/>
                    </g>
                </svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">React</span>
                <span class="skill-label">Intermediate</span>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.405 5.501c-.115 0-.193.014-.274.033v.013h.014c.054.104.146.19.256.243l.19.09c.022.15.022.298-.015.45-.18.084-.24.037-.15.026l.15-.017a.462.462 0 00-.029-.196" fill="#00758F"/>
                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4.5 14.5c-.55 0-1-.45-1-1V9.5c0-.55.45-1 1-1s1 .45 1 1V15c0 .55-.45 1-1 1zM12 16.5c-.55 0-1-.45-1-1v-8c0-.55.45-1 1-1s1 .45 1 1v8c0 .55-.45 1-1 1zM7.5 16.5c-.55 0-1-.45-1-1V9.5c0-.55.45-1 1-1s1 .45 1 1V15c0 .55-.45 1-1 1z" fill="#00758F"/>
                    <path d="M7.5 7.5C6.12 7.5 5 8.62 5 10v5a2.5 2.5 0 005 0v-5c0-1.38-1.12-2.5-2.5-2.5zm0 1a1.5 1.5 0 011.5 1.5v5a1.5 1.5 0 01-3 0v-5a1.5 1.5 0 011.5-1.5zM12 7.5c-1.38 0-2.5 1.12-2.5 2.5v5a2.5 2.5 0 005 0v-5c0-1.38-1.12-2.5-2.5-2.5zm0 1a1.5 1.5 0 011.5 1.5v5a1.5 1.5 0 01-3 0v-5A1.5 1.5 0 0112 8.5zM16.5 7.5c-1.38 0-2.5 1.12-2.5 2.5v5a2.5 2.5 0 005 0v-5c0-1.38-1.12-2.5-2.5-2.5zm0 1a1.5 1.5 0 011.5 1.5v5a1.5 1.5 0 01-3 0v-5a1.5 1.5 0 011.5-1.5z" fill="#F29111"/>
                </svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">MySQL</span>
                <span class="skill-label">Intermediate</span>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6C9.6 6 8.1 7.2 7.5 9.6c.9-1.2 1.95-1.65 3.15-1.35.685.17 1.174.664 1.716 1.21C13.248 10.38 14.16 11.4 16.5 11.4c2.4 0 3.9-1.2 4.5-3.6-.9 1.2-1.95 1.65-3.15 1.35-.685-.17-1.174-.664-1.716-1.21C15.252 7.02 14.34 6 12 6zM7.5 11.4C5.1 11.4 3.6 12.6 3 15c.9-1.2 1.95-1.65 3.15-1.35.685.17 1.174.664 1.716 1.21C8.748 15.78 9.66 16.8 12 16.8c2.4 0 3.9-1.2 4.5-3.6-.9 1.2-1.95 1.65-3.15 1.35-.685-.17-1.174-.664-1.716-1.21C10.752 12.42 9.84 11.4 7.5 11.4z" fill="#38BDF8"/>
                </svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">Tailwind</span>
                <span class="skill-label">Intermediate</span>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" rx="3" fill="#F7DF1E"/>
                    <path d="M7.5 17.5c.4.7 1 1.1 1.9 1.1 1 0 1.6-.5 1.6-1.2 0-.8-.6-1.1-1.7-1.6l-.6-.2c-1.7-.7-2.8-1.6-2.8-3.4 0-1.7 1.3-3 3.3-3 1.4 0 2.4.5 3.2 1.8l-1.7 1.1c-.4-.7-.8-1-1.4-1-.7 0-1.1.4-1.1 1 0 .7.4 1 1.5 1.4l.6.3c2 .9 3.1 1.7 3.1 3.6 0 2-1.6 3.2-3.7 3.2-2.1 0-3.4-1-4-2.4l1.8-1.1zM15.5 17.2c.3.6.6.9 1.2.9s1-.3 1-1.5v-8.1h2.2v8.2c0 2.4-1.4 3.5-3.4 3.5-1.8 0-2.9-1-3.4-2.1l2.4-1z" fill="#000"/>
                </svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">JavaScript</span>
                <span class="skill-label">Intermediate</span>
            </div>
        </div>
    </div>

    <!-- SOFT SKILLS -->
    <div class="skills-panel" id="panel-soft">
        <div class="skill-card">
            <div class="skill-icon stroke">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">Problem Solving</span>
                <span class="skill-label">Strong</span>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon stroke">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">Teamwork</span>
                <span class="skill-label">Strong</span>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon stroke">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">Communication</span>
                <span class="skill-label">Strong</span>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon stroke">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div class="skill-card-text">
                <span class="skill-name">Time Management</span>
                <span class="skill-label">Strong</span>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- EXPERIENCE -->
<section id="experience" class="experience-bg">
    <div class="reveal">
        <p class="section-eyebrow">Background</p>
        <h2 class="section-title" style="margin-bottom: 20px;">Experience</h2>
        <div class="exp-tabs">
            <button class="exp-tab-btn active" data-exptab="work">Work</button>
            <button class="exp-tab-btn" data-exptab="org">Organization</button>
        </div>
    </div>

    <!-- WORK -->
    <div class="exp-panel active reveal" id="exp-work">
        <div class="exp-card">
            <div>
                <p class="exp-role">Freelance Crew</p>
                <p class="exp-org">MSHC Multi Brand Store</p>
                <p class="exp-desc">Menjalankan operasional harian toko pakaian, mulai dari penataan dan display produk, pengelolaan stok, melayani pelanggan dengan ramah, hingga memastikan area toko tetap rapi dan nyaman untuk mendukung pengalaman belanja yang optimal.</p>
            </div>
            <span class="exp-period">Feb 2026 – Now</span>
        </div>
        <div class="exp-card">
            <div>
                <p class="exp-role">Part Time Crew Golqi Chicken Tamalate</p>
                <p class="exp-org">PT Golqi Sukses Mulia</p>
                <p class="exp-desc">Berpengalaman menangani operasional outlet, melayani pelanggan dengan ramah, mengelola pesanan dan pembayaran, serta bekerja dalam tim untuk menjaga kelancaran pelayanan terutama saat jam ramai.</p>
            </div>
            <span class="exp-period">Sep 2024 – Feb 2025</span>
        </div>
    </div>

    <!-- ORGANIZATION -->
    <div class="exp-panel reveal" id="exp-org">
        <div class="exp-card">
            <div>
                <p class="exp-role">Anggota Bidang Pengaderan</p>
                <p class="exp-org">BE Himatika FMIPA Unhas</p>
                <p class="exp-desc">Aktif dalam kegiatan pengaderan dan pembinaan anggota baru, berkontribusi dalam merancang program pengembangan organisasi, serta membantu koordinasi kegiatan internal himpunan.</p>
                <a href="https://www.instagram.com/himatikafmipaunhas?igsh=Y215bDV4d2MweG9p" target="_blank" class="exp-view-btn">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"/>
                    </svg>
                    View Instagram
                </a>
            </div>
            <span class="exp-period">2025 – Now</span>
        </div>
        <div class="exp-card">
            <div>
                <p class="exp-role">Ketua Panitia Mathematics, Actuarial, Information Systems Competition &amp; Summit (MATICS)</p>
                <p class="exp-org">Himatika FMIPA Unhas</p>
                <p class="exp-desc">Memimpin kepanitiaan Mathematics, Actuarial, Information Systems Competition & Summit (MATICS), mengkoordinasikan seluruh divisi, mengelola anggaran, serta memastikan kelancaran pelaksanaan kompetisi dari tahap persiapan hingga selesai.</p>
                <a href="https://www.instagram.com/matics_unhas?igsh=cWVtZ3F0b2cwMnU3" target="_blank" class="exp-view-btn">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"/>
                    </svg>
                    View Instagram
                </a>
            </div>
            <span class="exp-period">Aug 2025 – Feb 2026</span>
        </div>
        <div class="exp-card">
            <div>
                <p class="exp-role">Ketua Panitia Proyek Edukasi Masyarakat Inklusif I (PREMI I) 2025</p>
                <p class="exp-org">Himatika FMIPA Unhas</p>
                <p class="exp-desc">Memimpin kepanitiaan Proyek Edukasi Masyarakat Inklusif I, bertanggung jawab atas koordinasi tim, pelaksanaan program edukasi masyarakat, serta memastikan seluruh kegiatan berjalan sesuai tujuan dan jadwal yang ditetapkan.</p>
                <a href="https://www.instagram.com/premihimatika?igsh=YXpuejdrbDk2bGd0" target="_blank" class="exp-view-btn">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"/>
                    </svg>
                    View Instagram
                </a>
            </div>
            <span class="exp-period">Feb 2025 – Mar 2025</span>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- CONTACT -->
<section id="contact" class="contact-bg reveal">
    <div class="contact-inner">
        <p class="section-eyebrow">Get In Touch</p>
        <h2 class="section-title">Let's work<br>together</h2>
        <p class="contact-sub">Open for freelance projects and collaborations. If you have a project in mind or just want to say hello, feel free to reach out.</p>
        <div class="contact-btns">
            <a href="https://mail.google.com/mail/?view=cm&to=akunnyadirga@gmail.com" target="_blank" class="btn btn-primary">Send Email</a>
            <a href="https://drive.google.com/file/d/1b1d0ZdRshakUYIR_IjQ9q27mms_9BPdm/view?usp=sharing" target="_blank" class="btn btn-outline">Download CV</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <span class="footer-logo">dir<span>.</span>ga</span>
    <p>© 2026 Dirga. All rights reserved.</p>
    <p>Built with Laravel &amp; Tailwind</p>
</footer>

<script>
    window.onbeforeunload = () => window.scrollTo(0, 0);
    // ── FUTURISTIC BACKGROUND CANVAS ──
    (function() {
        const canvas = document.getElementById('heroBg');
        const ctx = canvas.getContext('2d');
        let W, H, dots, mouse = { x: -999, y: -999 };
        const RED = '224,48,48';

        function resize() {
            W = canvas.width = canvas.offsetWidth;
            H = canvas.height = canvas.offsetHeight;
            initDots();
        }

        function initDots() {
            const cols = Math.floor(W / 80);
            const rows = Math.floor(H / 80);
            dots = [];
            for (let r = 0; r <= rows; r++) {
                for (let c = 0; c <= cols; c++) {
                    dots.push({
                        x: c * (W / cols), y: r * (H / rows),
                        ox: c * (W / cols), oy: r * (H / rows),
                        vx: 0, vy: 0,
                        size: Math.random() * 1.2 + 0.4,
                        pulse: Math.random() * Math.PI * 2
                    });
                }
            }
        }

        function drawGrid() {
            ctx.clearRect(0, 0, W, H);
            const perRow = Math.floor(W / 80) + 1;
            dots.forEach((d, i) => {
                if ((i + 1) % perRow !== 0 && dots[i + 1]) {
                    const n = dots[i + 1];
                    const dist = Math.hypot(mouse.x - d.x, mouse.y - d.y);
                    const alpha = dist < 140 ? 0.04 + (1 - dist / 140) * 0.1 : 0.04;
                    ctx.strokeStyle = `rgba(255,255,255,${alpha})`;
                    ctx.lineWidth = 0.5;
                    ctx.beginPath(); ctx.moveTo(d.x, d.y); ctx.lineTo(n.x, n.y); ctx.stroke();
                }
                if (dots[i + perRow]) {
                    const n = dots[i + perRow];
                    const dist = Math.hypot(mouse.x - d.x, mouse.y - d.y);
                    const alpha = dist < 140 ? 0.04 + (1 - dist / 140) * 0.1 : 0.04;
                    ctx.strokeStyle = `rgba(255,255,255,${alpha})`;
                    ctx.lineWidth = 0.5;
                    ctx.beginPath(); ctx.moveTo(d.x, d.y); ctx.lineTo(n.x, n.y); ctx.stroke();
                }
            });
            dots.forEach(d => {
                d.pulse += 0.018;
                const dist = Math.hypot(mouse.x - d.ox, mouse.y - d.oy);
                const influence = Math.max(0, 1 - dist / 160);
                d.vx += (mouse.x - d.ox) * influence * 0.0006;
                d.vy += (mouse.y - d.oy) * influence * 0.0006;
                d.vx += (d.ox - d.x) * 0.06;
                d.vy += (d.oy - d.y) * 0.06;
                d.vx *= 0.78; d.vy *= 0.78;
                d.x += d.vx; d.y += d.vy;
                const r = d.size + Math.sin(d.pulse) * 0.4 + influence * 2;
                if (influence > 0.1) {
                    ctx.beginPath();
                    ctx.arc(d.x, d.y, r + 5, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(${RED},0.15)`;
                    ctx.fill();
                }
                ctx.beginPath();
                ctx.arc(d.x, d.y, r, 0, Math.PI * 2);
                ctx.fillStyle = influence > 0.1 ? `rgba(${RED},0.7)` : 'rgba(255,255,255,0.25)';
                ctx.fill();
            });
        }

        function loop() { drawGrid(); requestAnimationFrame(loop); }

        const hero = document.querySelector('.hero');
        hero.addEventListener('mousemove', e => {
            const rect = canvas.getBoundingClientRect();
            mouse.x = e.clientX - rect.left;
            mouse.y = e.clientY - rect.top;
        });
        hero.addEventListener('mouseleave', () => { mouse.x = -999; mouse.y = -999; });
        window.addEventListener('resize', resize);
        resize();
        loop();
    })();

    // ── HAMBURGER MENU ──
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('open');
        mobileMenu.classList.toggle('open');
        document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
    });
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('open');
            mobileMenu.classList.remove('open');
            document.body.style.overflow = '';
        });
    });

    // ── CUSTOM SMOOTH SCROLL ──
    function easeOutQuart(t) { return 1 - Math.pow(1 - t, 4); }
    function smoothNavTo(targetEl, duration) {
        duration = duration || 600;
        const start = window.scrollY;
        const offset = targetEl.getBoundingClientRect().top + window.scrollY - 80;
        const distance = offset - start;
        let startTime = null;
        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            const elapsed = timestamp - startTime;
            const progress = Math.min(elapsed / duration, 1);
            window.scrollTo(0, start + distance * easeOutQuart(progress));
            if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }
    function replayHeroAnimation() {
        document.querySelectorAll('.hero-badge, .hero-title, .hero-desc, .hero-actions, .hero-photo-wrap').forEach(el => {
            el.style.animation = 'none';
            el.offsetHeight;
            el.style.animation = '';
        });
    }
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (!href) return;
            if (href === '#') {
                e.preventDefault();
                smoothNavTo(document.body, 600);
                setTimeout(replayHeroAnimation, 350);
                return;
            }
            const target = document.querySelector(href);
            if (!target) return;
            e.preventDefault();
            smoothNavTo(target, 600);
        });
    });

    // ── REVEAL ON SCROLL ──
    const revealEls = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(el => revealObserver.observe(el));

    // ── SKILLS TAB TOGGLE ──
    function animatePanel(panel) {
        requestAnimationFrame(() => {
            requestAnimationFrame(() => panel.classList.add('visible'));
        });
    }
    document.querySelectorAll('.skills-tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.skills-tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            document.querySelectorAll('.skills-panel').forEach(p => p.classList.remove('active', 'visible'));
            const activePanel = document.getElementById('panel-' + this.dataset.tab);
            activePanel.classList.add('active');
            animatePanel(activePanel);
        });
    });
    const skillsSection = document.getElementById('skills');
    let skillsTriggered = false;
    const skillObserver = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !skillsTriggered) {
            skillsTriggered = true;
            animatePanel(document.querySelector('.skills-panel.active'));
            skillObserver.unobserve(skillsSection);
        }
    }, { threshold: 0.15 });
    skillObserver.observe(skillsSection);

    // ── EXPERIENCE TAB TOGGLE ──
    function showExpPanel(panelId) {
        document.querySelectorAll('.exp-panel').forEach(p => p.classList.remove('active', 'visible'));
        const panel = document.getElementById('exp-' + panelId);
        panel.classList.add('active');
        requestAnimationFrame(() => {
            requestAnimationFrame(() => panel.classList.add('visible'));
        });
    }
    document.querySelectorAll('.exp-tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.exp-tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            showExpPanel(this.dataset.exptab);
        });
    });
    const expSection = document.getElementById('experience');
    let expTriggered = false;
    const expObserver = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !expTriggered) {
            expTriggered = true;
            document.querySelector('.exp-panel.active').classList.add('visible');
            expObserver.unobserve(expSection);
        }
    }, { threshold: 0.1 });
    expObserver.observe(expSection);
</script>
</body>
</html>