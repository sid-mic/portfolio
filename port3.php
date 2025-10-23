<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Siddhartha Sharma | Database & Technology Associate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    :root{
      --bg:#0b0c10;
      --primary:#00d4ff;
      --secondary:#66fcf1;
      --accent:#45a29e;
      --text:#c5c6c7;
      --card:#1f2833;
    }
    *{box-sizing:border-box;margin:0;padding:0;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}
    body{background:var(--bg);color:var(--text)}
    header{
      height:100vh;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      text-align:center;
      background:radial-gradient(circle at 50% 50%,rgba(0,212,255,.12),transparent 70%);
    }
    h1{font-size:clamp(2.2rem,5vw,3.5rem)}
    .tagline{font-size:1.1rem;margin:.5rem 0 1.5rem;color:var(--accent)}
    .btn{
      border:2px solid var(--primary);
      padding:.6rem 1.4rem;
      border-radius:4px;
      transition:.3s;
    }
    .btn:hover{background:var(--primary);color:var(--bg)}
    section{padding:4rem 1rem;max-width:1000px;margin:auto}
    .grid{
      display:grid;
      gap:2rem;
      grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    }
    .card{
      background:var(--card);
      border-left:4px solid var(--primary);
      border-radius:6px;
      padding:1.5rem;
      transition:transform .3s;
    }
    .card:hover{transform:translateY(-4px)}
    .pill{
      display:inline-block;
      background:#141921;
      border:1px solid var(--accent);
      padding:.2rem .7rem;
      border-radius:20px;
      font-size:.75rem;
      margin:.2rem;
    }
    footer{text-align:center;padding:2rem 1rem;font-size:.8rem;color:var(--accent)}
    .reveal{
      opacity:0;
      transform:translateY(25px);
      transition:all .7s ease;
    }
    .reveal.visible{opacity:1;transform:translateY(0)}
  </style>
</head>
<body>

<header>
  <h1>Siddhartha Sharma</h1>
  <div class="tagline">Database & Technology Associate • ETL • Cloud Warehousing • SQL Tuning</div>
  <a class="btn" href="#work">Key Projects</a>
</header>

<section id="work">
  <h2 style="margin-bottom:2rem;font-size:2rem">Data & Infrastructure Work</h2>
  <div class="grid">
    <div class="card reveal">
      <h3>Smart India Hackathon – Data Lake</h3>
          <p>Migrated 3 M+ applicant JSON dumps to Azure Data Lake. Built PySpark ETL → Synapse SQL pool. Reduced query time 68 %.</p>
          <span class="pill">PySpark</span><span class="pill">Azure Data Lake</span><span class="pill">Synapse</span>
    </div>
    <div class="card reveal">
      <h3>AICTE SWAYAM Analytics</h3>
          <p>Designed 40-table star schema for 1.2 M course ratings. Automated daily cube refresh via ADF & stored procs.</p>
          <span class="pill">Star Schema</span><span class="pill">ADF</span><span class="pill">SQL</span>
    </div>
    <div class="card reveal">
      <h3>MoE Investors Network – DB Optimisation</h3>
          <p>Added composite indexes & partition scheme on PostgreSQL deal table; cut API latency 54 %, saved 30 % DTU cost.</p>
          <span class="pill">PostgreSQL</span><span class="pill">Indexes</span><span class="pill">Partitioning</span>
    </div>
    <div class="card reveal">
      <h3>Infrastructure as Code</h3>
          <p>ARM & Bicep templates to spin up Azure SQL, Key Vault, VNET in 6 min. Integrated with GitHub Actions for CI-CD.</p>
          <span class="pill">Bicep</span><span class="pill">GitHub Actions</span><span class="pill">Key Vault</span>
    </div>
  </div>
</section>

<section id="skills">
  <h2 style="margin-bottom:1.5rem;font-size:2rem">Core Toolkit</h2>
  <div>
    <span class="pill">SQL (T-SQL, PL/pgSQL)</span><span class="pill">Python/PySpark</span>
    <span class="pill">Azure Data Factory</span><span class="pill">Synapse</span>
    <span class="pill">PostgreSQL</span><span class="pill">MySQL</span>
    <span class="pill">Redis</span><span class="pill">Power BI</span>
    <span class="pill">Docker</span><span class="pill">Bicep/Terraform</span>
    <span class="pill">GitHub Actions</span>
  </div>
</section>

<section id="certs" style="margin-top:2rem">
  <h2 style="margin-bottom:1rem;font-size:2rem">Certifications</h2>
  <ul style="margin-left:1.2rem">
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