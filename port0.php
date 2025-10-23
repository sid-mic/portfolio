<?php
/**
 * Single-page portfolio for Siddhartha Sharma
 * Light theme, responsive, minimal dependencies (Bootstrap CDN + Google Fonts).
 *
 * Save as index.php. Put resume at assets/Siddhartha_Sharma_Resume.pdf
 * Ensure folder messages/ exists and is writable (for contact logs).
 */

/* --------------------- Profile / Data --------------------- */
$profile = [
    'name' => 'Siddhartha Sharma',
    'title' => 'Software Developer | Technology & Database Associate',
    'email' => '216.siddhartha@gmail.com',
    'phone' => '+91-7409369696',
    'location' => 'New Delhi, India',
    'linkedin' => '#', // add your LinkedIn URL
    'resume_path' => 'assets/Siddhartha_Sharma_Resume.pdf',
    'summary' => "Software Developer with experience building large-scale portals (Smart India Hackathon), cloud-hosted Laravel apps, and developer tooling for education/assessment platforms. Skilled in PHP, Laravel, SQL and cloud hosting (Azure/AWS)."
];

$projects = [
    [
        'title' => 'Smart India Hackathon Portal',
        'url' => 'https://sih.gov.in',
        'desc' => 'Developed and maintained the world’s biggest hackathon portal — registration, team formation, submissions, and evaluation workflows for 3+ lakh participants.',
        'tech' => 'Laravel, PHP, MySQL, Azure, Bootstrap',
        'img' => 'assets/sih-screenshot.png'
    ],
    [
        'title' => 'Ministry of Education Investors Network',
        'url' => 'https://moeinvest.mic.gov.in',
        'desc' => 'A Laravel-based platform to connect investors with education startups; deployed on Azure with CI/CD.',
        'tech' => 'Laravel, Azure, Docker, MySQL',
        'img' => 'assets/moeinvest.png'
    ],
    [
        'title' => 'Kavach Cyber Security Hackathon Portal',
        'url' => 'https://kavach.mic.gov.in',
        'desc' => 'End-to-end hackathon portal focused on cybersecurity challenges and secure submissions.',
        'tech' => 'Laravel, PHP, SQL',
        'img' => 'assets/kavach.png'
    ],
    [
        'title' => 'IDE Bootcamp',
        'url' => 'https://bootcamp.mic.gov.in',
        'desc' => 'Bootcamp platform development — participant onboarding, batch management, and evaluation.',
        'tech' => 'PHP, Laravel, Bootstrap',
        'img' => 'assets/bootcamp.png'
    ],
    [
        'title' => 'NCIIPC-AICTE Pentathon',
        'url' => 'https://mic.gov.in/pentathon2024',
        'desc' => 'Site design and implementation for a national pentathlon event supporting registration and result workflows.',
        'tech' => 'Laravel, HTML/CSS, JS',
        'img' => 'assets/pentathon.png'
    ],
];

$skills = [
    'Languages' => ['PHP' => 95, 'SQL' => 92, 'HTML/CSS/JS' => 90],
    'Frameworks' => ['Laravel' => 92, 'React' => 70, 'Node.js' => 65, 'Angular' => 60],
    'Cloud & Tools' => ['Azure' => 85, 'AWS' => 60, 'Docker' => 70, 'Git' => 90],
    'OS' => ['Linux' => 85, 'Windows' => 90, 'Mac' => 60]
];

/* --------------------- Contact Form Handling --------------------- */
$contact_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    // Basic sanitization
    $name = trim(filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
    $message = trim(filter_var($_POST['message'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $subject = 'Portfolio Contact: ' . ($name ?: 'Visitor');

    // Validation
    $errors = [];
    if (!$name) $errors[] = "Please enter your name.";
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Please enter a valid email.";
    if (!$message || strlen($message) < 10) $errors[] = "Please enter a message (10+ characters).";

    if (empty($errors)) {
        $log_dir = __DIR__ . '/messages';
        if (!is_dir($log_dir)) @mkdir($log_dir, 0755, true);
        $log_file = $log_dir . '/contacts.log';
        $entry = "[" . date('Y-m-d H:i:s') . "] Name: $name | Email: $email | IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . PHP_EOL .
                 "Message: " . $message . PHP_EOL . str_repeat('-', 80) . PHP_EOL;
        // Try to send email if mail() available
        $to = $profile['email'];
        $email_headers = "From: $name <$email>\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";
        $mail_sent = false;
        if (function_exists('mail')) {
            @set_time_limit(10);
            $mail_sent = @mail($to, $subject, $entry, $email_headers);
        }
        // Always append to log (fallback)
        @file_put_contents($log_file, $entry, FILE_APPEND | LOCK_EX);

        $contact_msg = $mail_sent ? "Thank you! Your message has been sent." : "Thank you! Your message was saved locally. I will respond via email soon.";
    } else {
        $contact_msg = implode(' ', $errors);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title><?= htmlspecialchars($profile['name']) ?> — Portfolio</title>
    <meta name="description" content="<?= htmlspecialchars($profile['summary']) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
            --bg:#f8fafc;
            --card:#ffffff;
            --muted:#6b7280;
            --accent:#2563eb; /* blue */
            --glass: rgba(16,24,40,0.03);
            --radius: 14px;
            font-family: 'Inter',system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial;
        }
        body{ background: var(--bg); color: #0f172a; -webkit-font-smoothing:antialiased; }
        .navbar{ background: transparent; }
        .hero{
            background: linear-gradient(180deg, rgba(255,255,255,0.8), rgba(248,250,252,0.9));
            border-radius: var(--radius);
            box-shadow: 0 6px 18px rgba(15,23,42,0.06);
            padding: 28px;
        }
        .card-soft{ background: var(--card); border: 1px solid rgba(15,23,42,0.04); border-radius:12px; padding:18px; }
        .skill-bar{ height:10px; border-radius:999px; background: rgba(2,6,23,0.06); overflow:hidden; }
        .skill-fill{ height:100%; border-radius:999px; background: linear-gradient(90deg,var(--accent), #0ea5e9); width:0; transition:width 900ms ease; }
        .project-img{ max-height:140px; object-fit:cover; border-radius:8px; }
        footer{ color:var(--muted); padding:28px 0; }
        .nav-link{ color: #0f172a; }
        .small-muted{ color: var(--muted); font-size:0.92rem }
        @media (min-width: 992px) {
            .hero { display:flex; gap:22px; align-items:center; }
        }
        /* subtle container width */
        .container-narrow{ max-width: 1100px; margin: 0 auto; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top py-3 bg-transparent">
    <div class="container container-narrow">
        <a class="navbar-brand fw-bold" href="#home"><?= htmlspecialchars($profile['name']) ?></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item ms-2">
                    <a class="btn btn-outline-primary btn-sm" href="<?= htmlspecialchars($profile['resume_path']) ?>" target="_blank" rel="noopener">Download Resume</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container container-narrow py-5" id="home">
    <section class="hero mb-5 p-3">
        <div class="flex-grow-1">
            <h1 class="mb-1 fw-bold"><?= htmlspecialchars($profile['name']) ?></h1>
            <div class="small-muted mb-3"><?= htmlspecialchars($profile['title']) ?> — <span class="text-muted"><?= htmlspecialchars($profile['location']) ?></span></div>
            <p class="mb-3"><?= htmlspecialchars($profile['summary']) ?></p>
            <div class="d-flex gap-2 flex-wrap">
                <a class="btn btn-primary btn-sm" href="#projects">View Projects</a>
                <a class="btn btn-outline-secondary btn-sm" href="<?= htmlspecialchars($profile['resume_path']) ?>" target="_blank" rel="noopener">Resume (PDF)</a>
                <a class="btn btn-light btn-sm" href="mailto:<?= htmlspecialchars($profile['email']) ?>">Email</a>
                <button class="btn btn-link btn-sm" id="copyEmailBtn" title="Copy email"><?= htmlspecialchars($profile['email']) ?></button>
            </div>
        </div>
        <div class="text-end d-none d-lg-block" style="min-width:240px">
            <div class="card-soft">
                <h6 class="mb-2">Contact</h6>
                <div class="small-muted">Email</div>
                <div class="fw-semibold mb-2"><?= htmlspecialchars($profile['email']) ?></div>
                <div class="small-muted">Phone</div>
                <div class="fw-semibold"><?= htmlspecialchars($profile['phone']) ?></div>
                <div class="mt-3">
                    <a class="small-muted" href="<?= htmlspecialchars($profile['linkedin']) ?>" target="_blank">LinkedIn →</a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="mb-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">About</h3>
                <p>Experienced in building large-scale education/assessment portals and hackathon platforms with focus on reliability, scalability and evaluation workflows. I like to build maintainable backend systems and optimize database performance for large user volumes.</p>

                <h5 class="mt-4">Experience</h5>
                <div class="mt-2">
                    <div class="card-soft mb-2">
                        <strong>Software Developer</strong> — Ministry of Education, Innovation Cell <span class="small-muted">Apr 2023 – Present</span>
                        <div class="small-muted mt-1">Worked on Smart India Hackathon portal, MOE Investors network, IDE Bootcamp, Kavach hackathon portal, NCIIPC-AICTE Pentathon.</div>
                    </div>
                    <div class="card-soft mb-2">
                        <strong>IT Consultant</strong> — AICTE <span class="small-muted">Aug 2020 – Apr 2023</span>
                        <div class="small-muted mt-1">SWAYAM translation portal, NPTEL/SWAYAM management and translations across 12 languages.</div>
                    </div>
                    <div class="card-soft mb-2">
                        <strong>Assistant IT Manager</strong> — Rigil Techno India Ltd. <span class="small-muted">Aug 2018 – Aug 2020</span>
                        <div class="small-muted mt-1">Infrastructure management, backup strategies and procurement.</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h6 class="mb-2">Education</h6>
                <div class="card-soft">
                    <strong>M.Tech, Computer Science</strong><br>
                    UPTU, Hindustan Institute of Technology Management — <span class="small-muted">Jun 2018</span>
                    <div class="small-muted mt-2">Thesis: Improving Energy Efficiency of Ethereum Mining</div>
                    <hr>
                    <strong>B.Tech, Information Technology</strong><br>
                    AKTU, Noida Institute of Engineering and Technology — <span class="small-muted">Jun 2014</span>
                    <div class="small-muted mt-2">Project: Gesture Based Android Music Player</div>
                </div>
                <div class="mt-3 small-muted">Certifications:</div>
                <ul class="small-muted">
                    <li>Google Advanced Data Analytics (Coursera)</li>
                    <li>Dot Net Developer Certification</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="projects" class="mb-5">
        <h3 class="mb-3">Selected Projects</h3>
        <div class="row gy-4">
            <?php foreach ($projects as $p): ?>
                <div class="col-md-6">
                    <div class="card-soft h-100 d-flex flex-column">
                        <div class="d-flex gap-3">
                            <div style="flex:0 0 38%;">
                                <?php if (file_exists(__DIR__ . '/' . $p['img'])): ?>
                                    <img src="<?= htmlspecialchars($p['img']) ?>" alt="<?= htmlspecialchars($p['title']) ?> screenshot" class="project-img w-100">
                                <?php else: ?>
                                    <div style="height:120px; border-radius:8px; background:var(--glass); display:flex;align-items:center;justify-content:center;" class="text-muted small">Image not provided</div>
                                <?php endif; ?>
                            </div>
                            <div style="flex:1">
                                <h5 class="mb-1"><a href="<?= htmlspecialchars($p['url']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($p['title']) ?></a></h5>
                                <div class="small-muted mb-2"><?= htmlspecialchars($p['tech']) ?></div>
                                <p class="mb-2" style="font-size:0.95rem; color: #111827"><?= htmlspecialchars($p['desc']) ?></p>
                                <div class="mt-auto">
                                    <a class="btn btn-sm btn-outline-primary" href="<?= htmlspecialchars($p['url']) ?>" target="_blank" rel="noopener">Visit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="skills" class="mb-5">
        <h3 class="mb-3">Skills</h3>
        <div class="row">
            <?php foreach ($skills as $group => $items): ?>
                <div class="col-md-6 mb-3">
                    <div class="card-soft">
                        <h6 class="mb-3"><?= htmlspecialchars($group) ?></h6>
                        <?php foreach ($items as $name => $perc): ?>
                            <div class="mb-2">
                                <div class="d-flex justify-content-between">
                                    <div><?= htmlspecialchars($name) ?></div>
                                    <div class="small-muted"><?= intval($perc) ?>%</div>
                                </div>
                                <div class="skill-bar mt-1" aria-hidden="true">
                                    <div class="skill-fill" data-fill="<?= intval($perc) ?>"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="contact" class="mb-5">
        <h3 class="mb-3">Contact</h3>
        <div class="row">
            <div class="col-lg-7">
                <div class="card-soft">
                    <?php if ($contact_msg): ?>
                        <div class="alert <?= (strpos($contact_msg,'Thank you') === 0) ? 'alert-success' : 'alert-danger' ?>"><?= htmlspecialchars($contact_msg) ?></div>
                    <?php endif; ?>
                    <form method="post" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button name="contact_submit" class="btn btn-primary">Send message</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card-soft">
                    <h6>Quick</h6>
                    <p class="small-muted mb-2">Prefer email? Reach out directly at</p>
                    <div class="fw-semibold mb-3"><?= htmlspecialchars($profile['email']) ?></div>
                    <p class="small-muted mb-0">Or download my resume:</p>
                    <a class="btn btn-outline-primary btn-sm mt-2" href="<?= htmlspecialchars($profile['resume_path']) ?>" target="_blank">Resume (PDF)</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="small-muted">© <?= date('Y') ?> <?= htmlspecialchars($profile['name']) ?> — Built with PHP & Bootstrap</div>
    </footer>
</main>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Smooth scrolling for in-page nav
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', function(e){
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({behavior:'smooth', block:'start'});
            }
        });
    });

    // Animate skill bars on scroll
    function animateSkills(){
        document.querySelectorAll('.skill-fill').forEach(function(el){
            const fill = el.getAttribute('data-fill') || 0;
            el.style.width = fill + '%';
        });
    }
    // Run on load and on intersection
    window.addEventListener('load', animateSkills);
    // copy email button
    document.getElementById('copyEmailBtn').addEventListener('click', function(){
        navigator.clipboard?.writeText('<?= htmlspecialchars($profile['email']) ?>').then(()=>{
            this.textContent = 'Copied ✓';
            setTimeout(()=> this.textContent = '<?= htmlspecialchars($profile['email']) ?>', 1800);
        }, ()=> {
            this.textContent = 'Copy failed';
        });
    });
</script>
</body>
</html>
