<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Siddhartha Sharma | Dev</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    :root{
      --bg:#0a0a0a;
      --accent:#00ffaa;
      --accent2:#7700ff;
      --text:#e0e0e0;
      --card:#111111;
    }
    *{box-sizing:border-box;margin:0;padding:0;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}
    body{background:var(--bg);color:var(--text);line-height:1.6}
    a{color:var(--accent);text-decoration:none}
    header{
      height:100vh;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      text-align:center;
      background:radial-gradient(circle at 50% 50%,rgba(119,0,255,.15),transparent 60%);
    }
    h1{font-size:clamp(2.5rem,6vw,4rem);letter-spacing:-2px}
    .tagline{font-size:1.2rem;margin:.5rem 0 1.5rem;color:#aaa}
    .btn{
      border:2px solid var(--accent);
      padding:.6rem 1.4rem;
      border-radius:4px;
      transition:.3s;
    }
    .btn:hover{background:var(--accent);color:var(--bg)}
    section{padding:4rem 1rem;max-width:1000px;margin:auto}
    .grid{
      display:grid;
      gap:2rem;
      grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    }
    .card{
      background:var(--card);
      border:1px solid #222;
      border-radius:8px;
      padding:1.5rem;
      position:relative;
      overflow:hidden;
      transition:transform .3s;
    }
    .card:hover{transform:translateY(-5px)}
    .card::before{
      content:'';
      position:absolute;
      top:0;left:0;width:3px;height:100%;
      background:linear-gradient(var(--accent),var(--accent2));
    }
    .pill{
      display:inline-block;
      background:#181818;
      border:1px solid #333;
      padding:.2rem .6rem;
      border-radius:20px;
      font-size:.75rem;
      margin:.2rem .2rem 0 0;
    }
    footer{text-align:center;padding:2rem 1rem;font-size:.8rem;color:#555}
    .reveal{
      opacity:0;
      transform:translateY(30px);
      transition:all .8s ease;
    }
    .reveal.visible{opacity:1;transform:translateY(0)}
  </style>
</head>
<body>

<header>
  <h1>Siddhartha Sharma</h1>
  <div class="tagline">Full-Stack Builder • Hackathon Enthusiast • Laravel & React</div>
  <div>
    <a class="btn" href="#projects">Projects</a>
    <a class="btn" href="mailto:216.siddhartha@gmail.com">Contact</a>
  </div>
</header>

<section id="projects">
  <h2 style="margin-bottom:2rem;font-size:2rem">Projects</h2>
  <div class="grid">
    <div class="card reveal">
      <h3>Smart India Hackathon Portal</h3>
      <p>3 lakh+ registrations, real-time team formation, 99.97 % uptime. Laravel + Azure + Redis.</p>
      <a href="https://sih.gov.in" target="_blank">Live →</a>
    </div>
    <div class="card reveal">
      <h3>MoE Investors Network</h3>
      <p>Investor-startup matchmaking, secure deal rooms, admin dashboards.</p>
      <a href="http://moeinvest.mic.gov.in" target="_blank">Live →</a>
    </div>
    <div class="card reveal">
      <h3>Kavach Cyber Hackathon</h3>
      <p>CTF challenges, containerised grading, live leaderboard. React + Node + Docker.</p>
      <a href="http://kavach.mic.gov.in" target="_blank">Live →</a>
    </div>
  </div>
</section>

<section id="skills">
  <h2 style="margin-bottom:1.5rem;font-size:2rem">Skills</h2>
  <div>
    <span class="pill">PHP</span><span class="pill">Laravel</span><span class="pill">React</span>
    <span class="pill">Node</span><span class="pill">MySQL</span><span class="pill">Redis</span>
    <span class="pill">Azure</span><span class="pill">AWS</span><span class="pill">Docker</span>
    <span class="pill">CI/CD</span>
  </div>
</section>

<section id="about" style="margin-top:2rem">
  <h2 style="margin-bottom:1rem;font-size:2rem">About</h2>
  <p>Delhi-based developer scaling education-tech portals to 300 k+ users. Love clean code, hackathons, and optimising cloud bills.</p>
</section>

<footer>
  &copy; <?= date('Y') ?> Siddhartha Sharma. Built with vanilla HTML & CSS.
</footer>

<script>
  // simple reveal on scroll
  const observer=new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting)entry.target.classList.add('visible');
    });
  },{threshold:.2});
  document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));
</script>

</body>
</html>