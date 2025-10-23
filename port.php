<?php
/* ----------------------------------------------------------
 * Siddhartha Sharma – Developer Portfolio (PHP + HTML)
 * One-file, zero-dependency, attractive & responsive
 *---------------------------------------------------------- */
$projects = [
    [
        "title" => "Smart India Hackathon Portal",
        "stack" => "Laravel · Azure · MySQL · Redis",
        "link"  => "https://sih.gov.in",
        "desc"  => "3 lakh+ student registrations, real-time team formation, leaderboard, 99.97 % uptime.",
        "img"   => "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=60"
    ],
    [
        "title" => "MoE Investors Network",
        "stack" => "Laravel · PostgreSQL · Azure",
        "link"  => "http://moeinvest.mic.gov.in",
        "desc"  => "Investor-startup matchmaking, secure deal rooms, admin dashboards.",
        "img"   => "https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=800&q=60"
    ],
    [
        "title" => "Kavach Cyber-Security Hackathon",
        "stack" => "React · Node · MongoDB · Docker",
        "link"  => "http://kavach.mic.gov.in",
        "desc"  => "CTF-style challenges, containerised grading engine, live leaderboard.",
        "img"   => "https://images.unsplash.com/photo-1563206767-5b18f218e8de?auto=format&fit=crop&w=800&q=60"
    ]
];

$skills = ["PHP","Laravel","JavaScript","React","Node","SQL","Redis","Azure","AWS","Docker","CI/CD"];
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>Siddhartha Sharma – Full-Stack Developer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- AOS (Animate-on-Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        html{scroll-behavior:smooth;}
        .gradient-text{background:linear-gradient(90deg,#38bdf8,#818cf8);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
        .card-hover{transition:transform .3s ease,box-shadow .3s ease;}
        .card-hover:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(0,0,0,.15);}
    </style>
</head>
<body class="bg-slate-900 text-slate-100">

<!-- ---------- HERO ---------- -->
<section class="min-h-screen flex items-center justify-center px-6">
    <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
        <img src="https://i.pravatar.cc/150?u=siddhartha" alt="Siddhartha" class="w-32 h-32 rounded-full mx-auto mb-6 border-4 border-slate-700">
        <h1 class="text-5xl md:text-7xl font-extrabold gradient-text mb-4">Siddhartha Sharma</h1>
        <p class="text-xl md:text-2xl text-slate-300 mb-6">Full-Stack Developer | Hackathon Portal Builder | Laravel & React lover</p>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <a href="#projects" class="px-5 py-2 rounded-full bg-indigo-500 hover:bg-indigo-600 transition">Projects</a>
            <a href="https://linkedin.com/in/siddhartha-sharma-73a26141" target="_blank" class="px-5 py-2 rounded-full bg-slate-800 hover:bg-slate-700 transition"><i class="fab fa-linkedin"></i> LinkedIn</a>
            <a href="mailto:216.siddhartha@gmail.com" class="px-5 py-2 rounded-full bg-slate-800 hover:bg-slate-700 transition"><i class="fas fa-envelope"></i> Mail</a>
            <a href="./Siddhartha_Sharma_Resume.pdf" download class="px-5 py-2 rounded-full bg-slate-800 hover:bg-slate-700 transition"><i class="fas fa-download"></i> Résumé</a>
        </div>
    </div>
</section>

<!-- ---------- PROJECTS ---------- -->
<section id="projects" class="py-20 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">Featured Projects</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($projects as $p): ?>
            <div class="bg-slate-800 rounded-xl overflow-hidden card-hover" data-aos="fade-up">
                <img src="<?= $p['img'] ?>" alt="<?= $p['title'] ?>" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2"><?= $p['title'] ?></h3>
                    <p class="text-sm text-indigo-400 mb-2"><?= $p['stack'] ?></p>
                    <p class="text-slate-300 mb-4"><?= $p['desc'] ?></p>
                    <a href="<?= $p['link'] ?>" target="_blank" class="inline-flex items-center gap-2 text-indigo-400 hover:text-indigo-300">
                        Visit <i class="fas fa-external-link-alt text-xs"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ---------- SKILLS ---------- -->
<section class="py-20 px-6 bg-slate-800/50">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-8" data-aos="fade-up">Skill Stack</h2>
        <div class="flex flex-wrap justify-center gap-3">
            <?php foreach($skills as $s): ?>
            <span class="px-4 py-2 bg-slate-700 rounded-full text-sm"><?= $s ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ---------- ABOUT ---------- -->
<section class="py-20 px-6">
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-6">About Me</h2>
        <p class="text-slate-300 leading-relaxed">
            Delhi-based full-stack developer with 5+ years of building high-traffic portals for the Ministry of Education, Innovation Cell.
            I specialise in Laravel, React, and cloud-native architectures that scale to 3 lakh+ concurrent users.
            When not coding, you’ll find me mentoring hackathon teams or optimising Azure bills.
        </p>
    </div>
</section>

<!-- ---------- CONTACT ---------- -->
<section class="py-20 px-6 bg-indigo-500/10">
    <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-4">Let’s Connect</h2>
        <p class="mb-6">Got a project, hackathon idea, or just want to talk tech? Drop a message.</p>
        <a href="mailto:216.siddhartha@gmail.com" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-indigo-500 hover:bg-indigo-600 transition">
            <i class="fas fa-paper-plane"></i> Say Hello
        </a>
    </div>
</section>

<!-- ---------- FOOTER ---------- -->
<footer class="py-6 text-center text-slate-400 text-sm">
    © <?= date('Y') ?> Siddhartha Sharma. Built with PHP, HTML & Tailwind CSS.
</footer>

<script>AOS.init({once:true});</script>
</body>
</html>