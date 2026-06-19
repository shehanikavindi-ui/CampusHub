<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile · CampusHub</title>

  <!-- Fonts used by --font-heading / --font-body in style.css -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">

  <style>
    /* ---------- 1. Profile card & banner ---------- */
    .profile-card {
      background: var(--bg-white);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      overflow: hidden;
      margin-bottom: 2rem;
    }

    .profile-banner {
      height: 140px;
      background: linear-gradient(135deg, var(--teal-500), var(--violet-500));
    }

    .profile-body {
      padding: 0 2rem 1.75rem;
    }

    /* ---------- 2. Avatar & top row ---------- */
    .profile-top {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 1rem;
    }

    .profile-avatar {
      width: 96px;
      height: 96px;
      border-radius: 50%;
      border: 4px solid var(--bg-white);
      box-shadow: var(--shadow-sm);
      object-fit: cover;
      background: var(--neutral-100);
      margin-top: -48px;
      /* pulls avatar up over the banner */
    }

    .profile-name {
      font-size: var(--text-2xl);
      margin-bottom: 0.2rem;
    }

    .profile-meta {
      font-size: var(--text-sm);
      color: var(--text-muted);
      margin-bottom: 0.9rem;
    }

    .profile-tags {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
    }

    .tag {
      font-size: var(--text-xs);
      font-weight: 600;
      letter-spacing: 0.03em;
      color: var(--primary-dark);
      background: var(--primary-light);
      padding: 0.3rem 0.8rem;
      border-radius: var(--radius-full);
    }

    .tag--violet {
      color: var(--secondary-dark);
      background: var(--secondary-light);
    }

    /* ---------- 3. Stats grid ---------- */
    .profile-stats {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .stat-card {
      background: var(--bg-soft);
      border-radius: var(--radius-lg);
      padding: 1.1rem 1rem;
      text-align: center;
    }

    .stat-value {
      display: block;
      font-family: var(--font-heading);
      font-size: var(--text-2xl);
      font-weight: 700;
      color: var(--text-primary);
    }

    .stat-label {
      display: block;
      font-size: var(--text-xs);
      color: var(--text-muted);
      margin-top: 0.2rem;
    }

    /* ---------- 4. Tabs ---------- */
    .profile-tabs {
      display: flex;
      border-bottom: 1px solid var(--neutral-200);
      margin-bottom: 1.5rem;
      overflow-x: auto;
    }

    .profile-tab {
      font-family: var(--font-body);
      font-size: var(--text-sm);
      font-weight: 600;
      color: var(--text-muted);
      background: none;
      border: none;
      padding: 0.7rem 0.25rem;
      margin-right: 1.5rem;
      border-bottom: 2px solid transparent;
      cursor: pointer;
      transition: var(--transition);
      white-space: nowrap;
    }

    .profile-tab:hover {
      color: var(--text-primary);
    }

    .profile-tab.active {
      color: var(--primary-dark);
      border-bottom-color: var(--primary);
    }

    /* ---------- 5. Section panels ---------- */
    .profile-section {
      margin-bottom: 1.75rem;
    }

    .profile-section-title {
      font-size: var(--text-lg);
      margin-bottom: 0.6rem;
    }

    .profile-bio {
      font-size: var(--text-sm);
      color: var(--text-secondary);
      line-height: 1.7;
      max-width: 640px;
    }

    .info-list {
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
    }

    .info-list li {
      display: flex;
      justify-content: space-between;
      font-size: var(--text-sm);
      padding-bottom: 0.6rem;
      border-bottom: 1px solid var(--neutral-100);
    }

    .info-label {
      color: var(--text-muted);
    }

    .info-value {
      color: var(--text-primary);
      font-weight: 500;
    }

    /* ---------- 6. Registered event rows ---------- */
    .event-row {
      display: flex;
      align-items: center;
      gap: 1rem;
      background: var(--bg-white);
      border: 1px solid var(--neutral-100);
      border-radius: var(--radius-lg);
      padding: 0.85rem 1rem;
      margin-bottom: 0.7rem;
    }

    .event-date-badge {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 52px;
      height: 52px;
      border-radius: var(--radius-md);
      background: var(--primary-light);
      flex-shrink: 0;
    }

    .event-day {
      font-size: var(--text-base);
      font-weight: 700;
      color: var(--primary-dark);
      line-height: 1;
    }

    .event-month {
      font-size: var(--text-xs);
      color: var(--primary-dark);
      text-transform: uppercase;
    }

    .event-info {
      flex: 1;
      min-width: 0;
    }

    .event-info h4 {
      font-size: var(--text-base);
      margin-bottom: 0.15rem;
    }

    .event-info p {
      font-size: var(--text-xs);
      color: var(--text-muted);
    }

    .status-pill {
      font-size: var(--text-xs);
      font-weight: 600;
      padding: 0.3rem 0.7rem;
      border-radius: var(--radius-full);
      white-space: nowrap;
    }

    .status-upcoming {
      background: var(--primary-light);
      color: var(--primary-dark);
    }

    .status-attended {
      background: var(--secondary-light);
      color: var(--secondary-dark);
    }

    .status-past {
      background: var(--neutral-100);
      color: var(--text-muted);
    }

    /* ---------- 7. Club membership cards ---------- */
    .club-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1rem;
    }

    .club-card {
      display: flex;
      align-items: center;
      gap: 0.85rem;
      background: var(--bg-white);
      border: 1px solid var(--neutral-100);
      border-radius: var(--radius-lg);
      padding: 1rem;
    }

    .club-logo {
      width: 44px;
      height: 44px;
      border-radius: var(--radius-md);
      background: var(--secondary-light);
      color: var(--secondary-dark);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-heading);
      font-weight: 700;
      font-size: var(--text-sm);
      flex-shrink: 0;
    }

    .club-info h4 {
      font-size: var(--text-sm);
      margin-bottom: 0.1rem;
    }

    .club-info p {
      font-size: var(--text-xs);
      color: var(--text-muted);
    }

    /* ---------- 8. Responsive ---------- */
    @media (max-width: 720px) {
      .profile-stats {
        grid-template-columns: repeat(2, 1fr);
      }

      .profile-body {
        padding: 0 1.25rem 1.5rem;
      }

      .profile-top {
        align-items: flex-start;
      }
    }
  </style>
</head>

<body>

  <main class="section section--soft">
    <div class="container" style="max-width: 760px;">

      <!-- ============ PROFILE CARD ============ -->
      <section class="profile-card">
        <div class="profile-banner"></div>
        <div class="profile-body">
          <div class="profile-top">
            <img class="profile-avatar"
              src="https://ui-avatars.com/api/?name=Aisha+Perera&background=0F766E&color=fff&size=192"
              alt="Aisha Perera">
            <button class="btn btn-outline-primary btn-sm">Edit profile</button>
          </div>

          <h2 class="profile-name">Aisha Perera</h2>
          <p class="profile-meta">BSc Computer Science · University of Colombo · ID CH-20458</p>

          <div class="profile-tags">
            <span class="tag">Robotics Club</span>
            <span class="tag tag--violet">Debate Society</span>
            <span class="tag">Volunteer</span>
          </div>
        </div>
      </section>

      <!-- ============ STATS ============ -->
      <div class="profile-stats">
        <div class="stat-card"><span class="stat-value">3</span><span class="stat-label">Clubs joined</span></div>
        <div class="stat-card"><span class="stat-value">12</span><span class="stat-label">Events attended</span></div>
        <div class="stat-card"><span class="stat-value">86%</span><span class="stat-label">Attendance</span></div>
        <div class="stat-card"><span class="stat-value">240</span><span class="stat-label">Activity points</span></div>
      </div>

      <!-- ============ TABS ============ -->
      <div class="profile-tabs">
        <button class="profile-tab active" data-tab="overview">Overview</button>
        <button class="profile-tab" data-tab="events">My events</button>
        <button class="profile-tab" data-tab="clubs">My clubs</button>
      </div>

      <!-- ============ OVERVIEW PANEL ============ -->
      <div class="profile-panel" data-panel="overview">
        <div class="profile-section">
          <h3 class="profile-section-title">About</h3>
          <p class="profile-bio">
            Final-year Computer Science student with a focus on embedded systems and robotics.
            Active member of three campus societies and a regular volunteer at inter-university
            outreach events.
          </p>
        </div>

        <div class="profile-section">
          <h3 class="profile-section-title">Contact</h3>
          <ul class="info-list">
            <li><span class="info-label">Email</span><span class="info-value">aisha.perera@uoc.lk</span></li>
            <li><span class="info-label">Phone</span><span class="info-value">+94 71 234 5678</span></li>
            <li><span class="info-label">Institution</span><span class="info-value">University of Colombo</span></li>
          </ul>
        </div>
      </div>

      <!-- ============ EVENTS PANEL ============ -->
      <div class="profile-panel" data-panel="events" style="display:none;">
        <div class="profile-section">
          <div class="event-row">
            <div class="event-date-badge"><span class="event-day">14</span><span class="event-month">Jul</span></div>
            <div class="event-info">
              <h4>Inter-Varsity Robotics Meet</h4>
              <p>Faculty of Engineering · 9:00 AM</p>
            </div>
            <span class="status-pill status-upcoming">Registered</span>
          </div>

          <div class="event-row">
            <div class="event-date-badge"><span class="event-day">02</span><span class="event-month">Jun</span></div>
            <div class="event-info">
              <h4>Annual Debate Finals</h4>
              <p>Main Auditorium · 4:00 PM</p>
            </div>
            <span class="status-pill status-attended">Attended</span>
          </div>

          <div class="event-row">
            <div class="event-date-badge"><span class="event-day">19</span><span class="event-month">Apr</span></div>
            <div class="event-info">
              <h4>Volunteer Orientation Day</h4>
              <p>Student Centre · 10:00 AM</p>
            </div>
            <span class="status-pill status-past">Past</span>
          </div>
        </div>
      </div>

      <!-- ============ CLUBS PANEL ============ -->
      <div class="profile-panel" data-panel="clubs" style="display:none;">
        <div class="profile-section">
          <div class="club-grid">
            <div class="club-card">
              <div class="club-logo">RC</div>
              <div class="club-info">
                <h4>Robotics Club</h4>
                <p>Member</p>
              </div>
            </div>
            <div class="club-card">
              <div class="club-logo">DS</div>
              <div class="club-info">
                <h4>Debate Society</h4>
                <p>Vice President</p>
              </div>
            </div>
            <div class="club-card">
              <div class="club-logo">VC</div>
              <div class="club-info">
                <h4>Volunteer Circle</h4>
                <p>Member</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script>
    // Simple tab switching — shows/hides panels matching data-tab / data-panel
    document.querySelectorAll(".profile-tab").forEach(function(tab) {
      tab.addEventListener("click", function() {
        document.querySelectorAll(".profile-tab").forEach(function(t) {
          t.classList.remove("active");
        });
        tab.classList.add("active");

        var target = tab.getAttribute("data-tab");
        document.querySelectorAll(".profile-panel").forEach(function(panel) {
          panel.style.display = (panel.getAttribute("data-panel") === target) ? "" : "none";
        });
      });
    });
  </script>

</body>

</html>