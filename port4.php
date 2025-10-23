<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Siddhartha Sharma | Database & Technology Associate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root{
      --bg:#0f0f15;
      --surface:#1a1a24;
      --glass:rgba(30,30,46,0.6);
      --primary:#00f5d4;
      --secondary:#fee440;
      --text:#e4e4e4;
      --muted:#9a9a9a;
    }
    *{box-sizing:border-box;margin:0;padding:0;font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif}
    body{background:var(--bg);color:var(--text);line-height:1.6}
    a{color:var(--primary);text-decoration:none}
    header{
      height:100vh;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      text-align:center;
      padding:2rem;
      background:radial-gradient(circle at top,var(--surface),var(--bg) 70%);
    }
    h1{font-size:clamp(2.5rem,6vw,4rem);letter-spacing:-1px}
    .tagline{font-size:1.2rem;margin:.5rem 0 2rem;color:var(--muted)}
    .btn{
      background:var(--primary);
      color:#000;
      padding:.7rem 1.6rem;
      border-radius:30px;
      font-weight:600;
      transition:.3s;
    }
    .btn:hover{filter:brightness(1.15)}
    section{padding:5rem 2rem;max-width:1100px;margin:auto}
    .grid{
      display:grid;
      gap:2rem;
      grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    }
    .card{
      background:var(--glass);
      backdrop-filter:blur(12px);
      border:1px solid rgba(255,255,255,.08);
      border-radius:16px;
      padding:2rem;
      transition:transform .3s,box-shadow .3s;
    }
    .card:hover{transform:translateY(-6px);box-shadow:0 12px 24px rgba(0,245,212,.1)}
    .pill{
      display:inline-block;
      background:rgba(0,245,212,.12);
      color:var(--primary);
      padding:.3rem .8rem;
      border-radius:20px;
      font-size:.75rem;
      margin:.2rem .2rem .5rem 0;
    }
    footer{text-align:center;padding:3rem 2rem;font-size:.8rem;color:var(--muted)}
    .reveal{opacity:0;transform:translateY(30px);transition:all .8s ease}
    .reveal.visible{opacity:1;transform:translateY(0)}
  </style>
</head>
<body>

<header>
  <h1>Siddhartha Sharma</h1>
  <div class="tagline">Database & Technology Associate | ETL · Cloud Warehousing · SQL Tuning</div>
  <a class="btn" href="#work">Explore Work</a>
</header>

<section id="work">
  <h2 style="margin-bottom:2.5rem;font-size:2.2rem">Key Data & Infrastructure Projects</h2>
  <div class="grid">
    <div class="card reveal">
      <h3><i class="fas fa-database"></i> Smart India Hackathon Data Lake</h3>
      <p>Ingested 3 M+ JSON logs into Azure Data Lake. PySpark ETL → Synapse SQL, cut query time 68 %.</p>
      <span class="pill">PySpark</span><span class="pill">Azure Data Lake</span><span class="pill">Synapse</span>
    </div>
    <div class="card reveal">
      <h3><i class="fas fa-chart-line"></i> AICTE SWAYAM Analytics</h3>
      <p>Designed 40-table star schema for 1.2 M course ratings. ADF pipelines for daily cube refresh.</p>
      <span class="pill">Star Schema</span><span class="pill">ADF</span><span class="pill">SQL</span>
    </div>
    <div class="card reveal">
      <h3><i class="fas fa-tachometer-alt"></i> PostgreSQL Performance Tuning</h3>
      <p>Composite indexes + partitioning on investor deals table; reduced API latency 54 %, saved 30 % DTU cost.</p>
      <span class="pill">PostgreSQL</span><span class="pill">Indexes</span><span class="pill">Partitioning</span>
    </div>
    <div class="card reveal">
      <h3><i class="fas fa-cloud"></i> Infrastructure as Code</h3>
      <p>ARM/Bicep templates to provision Azure SQL, Key Vault, VNET in 6 min. GitHub Actions CI-CD.</p>
      <span class="pill">Bicep</span><span class="pill">GitHub Actions</span><span class="pill">Key Vault</span>
    </div>
  </div>
</section>

<section id="skills">
  <h2 style="margin-bottom:1.5rem;font-size:2.2rem">Core Toolkit</h2>
  <div>
    <span class="pill">SQL (T-SQL, PL/pgSQL)</span><span class="pill">Python/PySpark</span>
    <span class="pill">Azure Data Factory</span><span class="pill">Synapse</span>
    <span class="pill">PostgreSQL</span><span class="pill">MySQL</span>
    <span class="pill">Redis</span><span class="pill">Power BI</span>
    <span class="pill">Docker</span><span class="pill">Terraform</span>
    <span class="pill">GitHub Actions</span>
  </div>
</section>

<section id="certs" style="margin-top:3rem">
  <h2 style="margin-bottom:1rem;font-size:2.2rem">Certifications</h2>
  <ul style="margin-left:1.2rem;color:var(--muted)">
    <li>Microsoft Certified: Azure Data Fundamentals (DP-900)</li>
    <li>Google Advanced Data Analytics Certificate</li>
  </ul>
</section>

<footer>
  &copy; <?= date('Y') ?> Siddhartha Sharma.
  <br><a href="mailto:216.siddhartha@gmail.com">216.siddhartha@gmail.com</a> | <a href="https://linkedin.com/in/siddhartha-sharma-73a26141" target="_blank">LinkedIn</a>
</footer>

<script>
  const obs=new IntersectionObserver(e=>e.forEach(r=>r.isIntersecting&&r.target.classList.add('visible')),{threshold:.2});
  document.querySelectorAll('.reveal').forEach(el=>obs.observe(el));
</script>

</body>
</html>