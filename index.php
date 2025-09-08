<?php
.features{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;margin-top:18px}
.muted{color:var(--muted);font-size:14px}
footer{margin:60px 0 40px;text-align:center;color:var(--muted)}
</style>
</head>
<body>
<header>
<div class="container" style="display:flex;align-items:center;justify-content:space-between">
<div style="display:flex;gap:12px;align-items:center">
<div style="width:44px;height:44px;background:var(--accent);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700">MC</div>
<div>
<div style="font-weight:700">MyCalendly</div>
<div class="muted" style="font-size:12px">Simple scheduling for everyone</div>
</div>
</div>
<nav>
<?php if(is_logged_in()): ?>
<a href="dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
<?php else: ?>
<a href="login.php">Login</a>
<a href="signup.php">Sign up</a>
<?php endif; ?>
</nav>
</div>
</header>
 
 
<div class="container">
<div class="hero card">
<div style="flex:1">
<h1>Schedule meetings without the back-and-forth</h1>
<p class="lead">Create a personalized booking link, set availability, and let others book time with you — fast and simple.</p>
<div style="display:flex;gap:10px">
<a href="signup.php" class="cta">Get started — it's free</a>
<a href="#book" style="padding:10px 14px;border-radius:10px;border:1px solid rgba(17,24,39,0.06);text-decoration:none">How it works</a>
</div>
</div>
<div style="width:360px">
<div style="background:linear-gradient(180deg,#fff,#f8fafc);padding:12px;border-radius:10px">
<strong>Quick demo</strong>
<div style="margin-top:10px" class="muted">Click below to try booking a demo meeting with the sample user.</div>
<div style="margin-top:12px">
<button class="cta" onclick="window.location.href='schedule.php?user=1'">Book a Meeting</button>
</div>
</div>
</div>
</div>
 
 
<div id="book" class="card" style="margin-top:18px">
<h2 style="margin-top:0">Features</h2>
<div class="features">
<div>
<h3 style="margin:0 0 6px">Set availability</h3>
<div class="muted">Choose which days and times you're available, and set slot length.</div>
</div>
<div>
<h3 style="margin:0 0 6px">Easy booking</h3>
<div class="muted">Visitors pick an open slot and instantly book. You get confirmations.</div>
</div>
<div>
<h3 style="margin:0 0 6px">Manage meetings</h3>
<div class="muted">View upcoming meetings, cancel, or reschedule from your dashboard.</div>
</div>
</div>
</div>
 
 
<footer>
Built for learning — customize it however you like.
</footer>
</div>
 
 
</body>
</html>
