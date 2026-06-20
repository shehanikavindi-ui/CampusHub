<?php
session_start();
include "../connection.php";

if (!isset($_SESSION['a'])) {
    header("Location: /CampusHub/auth/adminLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusHub Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="../css/adminStyle.css">

    <link rel="icon" href="../assets/favicon.svg" type="image/svg+xml" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: var(--neutral-100);
            display: flex;
            height: 100vh;
            overflow: hidden;
            font-size: 14px;
            color: var(--text-primary);
        }

        /* ─── SIDEBAR ─── */

        .sidebar {
            width: 260px;
            background: var(--neutral-800);
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--neutral-600);
            border-radius: 4px;
        }

        /* Logo */

        .logo {
            padding: 22px 20px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            flex-shrink: 0;
        }

        .logo-inner {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .nav-logo-icon {
            font-size: 1.6rem;
            color: var(--teal-400);
            line-height: 1.2;
            display: inline-block;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 600;
            color: white;
            letter-spacing: -0.3px;
        }

        .logo-sub {
            font-size: 11px;
            color: var(--neutral-400);
            margin-top: 1px;
        }

        /* Nav */

        .nav {
            padding: 12px 0 20px;
            flex: 1;
        }

        .nav-section {
            margin-bottom: 2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 18px;
            color: var(--neutral-300);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 400;
            transition: all var(--transition);
            cursor: pointer;
            border-left: 3px solid transparent;
            user-select: none;
        }

        .nav-link i {
            font-size: 17px;
            flex-shrink: 0;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.06);
            color: white;
            border-left-color: var(--primary);
        }

        .nav-link.active {
            background: rgba(20, 184, 166, 0.15);
            color: var(--teal-400);
            border-left-color: var(--primary);
            font-weight: 500;
        }

        .nav-link .chevron {
            margin-left: auto;
            font-size: 14px;
            transition: transform 0.2s var(--ease);
        }

        .nav-link.open .chevron {
            transform: rotate(180deg);
        }

        /* Sub-links */

        .sub-links {
            background: rgba(0, 0, 0, 0.15);
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.25s ease;
        }

        .sub-links.open {
            max-height: 200px;
        }

        .sub-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 7px 18px 7px 44px;
            color: var(--neutral-400);
            text-decoration: none;
            font-size: 12.5px;
            transition: all var(--transition);
            border-left: 3px solid transparent;
        }

        .sub-link::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--neutral-500);
            flex-shrink: 0;
            transition: background var(--transition);
        }

        .sub-link:hover {
            color: var(--teal-400);
            background: rgba(255, 255, 255, 0.04);
            border-left-color: var(--primary);
        }

        .sub-link:hover::before {
            background: var(--teal-400);
        }

        .nav-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.07);
            margin: 8px 16px;
        }

        .logout-link {
            background-color: transparent;
            border: none;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            color: var(--neutral-400);
            text-decoration: none;
            font-size: 13.5px;
            transition: all var(--transition);
            border-left: 3px solid transparent;
        }

        .logout-link i {
            font-size: 17px;
        }

        .logout-link:hover {
            color: #F87171;
            background: rgba(248, 113, 113, 0.08);
            border-left-color: #F87171;
        }


        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            min-width: 0;
        }

        .header {
            background: white;
            border-bottom: 1px solid var(--neutral-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            flex-shrink: 0;
        }

        .header-left .breadcrumb {
            font-size: 12px;
            color: var(--neutral-400);
        }

        .header-left .page-title {
            margin-top: 5px;
            font-size: 18px;
            font-weight: 600;
            color: var(--neutral-800);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .notif-btn {
            width: 36px;
            height: 40px;
            border-top-right-radius: var(--radius-md);
            border-bottom-right-radius: var(--radius-md);
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border: 1px solid var(--neutral-200);
            background: var(--neutral-50);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            transition: all var(--transition);
            text-decoration: none;
        }

        .notif-btn:hover {
            background: var(--neutral-100);
            border-color: var(--neutral-300);
        }

        .notif-btn i {
            font-size: 18px;
            color: var(--neutral-500);
        }

        .notif-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 7px;
            height: 7px;
            background: var(--primary);
            border-radius: 50%;
            border: 2px solid white;
        }

        .admin-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--neutral-50);
            border: 1px solid var(--neutral-200);
            border-top-left-radius: var(--radius-md);
            border-bottom-left-radius: var(--radius-md);
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            padding: 5px 10px 5px 6px;
            cursor: pointer;
            height: 40px;
            transition: all var(--transition);
        }

        .admin-chip:hover {
            background: var(--neutral-100);
        }

        .avatar {
            width: 28px;
            height: 28px;
            border-radius: var(--radius-sm);
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            color: white;
        }

        .admin-name {
            font-size: 13px;
            font-weight: 500;
            color: var(--neutral-700);
        }

        /* Content Area */

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 24px 28px;
        }

        .content::-webkit-scrollbar {
            width: 5px;
        }

        .content::-webkit-scrollbar-thumb {
            background: var(--neutral-300);
            border-radius: 4px;
        }

        /* Content Card */

        .content-card {
            background: white;
            border-radius: var(--radius-xl);
            border: 1px solid var(--neutral-200);
            padding: 28px 30px;
            min-height: 500px;
            box-shadow: var(--shadow-sm);
        }

        .content-card h1 {
            font-family: var(--font-heading);
            font-size: var(--text-2xl);
            color: var(--neutral-800);
            margin-bottom: 8px;
        }

        .content-card p {
            color: var(--neutral-500);
            font-size: var(--text-sm);
        }

        /* ─── DASHBOARD STATS ─── */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-lg);
            border: 1px solid var(--neutral-200);
            padding: 16px 18px;
            box-shadow: var(--shadow-sm);
        }

        .stat-label {
            font-size: 11.5px;
            color: var(--neutral-400);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 600;
            color: var(--neutral-800);
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-badge {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            font-size: 11.5px;
            padding: 2px 7px;
            border-radius: var(--radius-full);
            font-weight: 500;
        }

        .badge-up {
            background: var(--teal-100);
            color: var(--teal-700);
        }

        .badge-down {
            background: #FEE2E2;
            color: #B91C1C;
        }

        .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            float: right;
            margin: -2px 0 0 8px;
        }

        .icon-teal {
            background: var(--teal-50);
        }

        .icon-teal i {
            color: var(--teal-600);
            font-size: 18px;
        }

        .icon-violet {
            background: #F5F3FF;
        }

        .icon-violet i {
            color: #7C3AED;
            font-size: 18px;
        }

        .icon-amber {
            background: #FFFBEB;
        }

        .icon-amber i {
            color: #D97706;
            font-size: 18px;
        }

        .icon-blue {
            background: #EFF6FF;
        }

        .icon-blue i {
            color: #2563EB;
            font-size: 18px;
        }

        /* ─── PANELS ─── */

        .panels {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 14px;
        }

        .panel {
            background: white;
            border-radius: var(--radius-lg);
            border: 1px solid var(--neutral-200);
            padding: 18px 20px;
            box-shadow: var(--shadow-sm);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .panel-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--neutral-800);
        }

        .panel-action {
            font-size: 12px;
            color: var(--teal-600);
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: color var(--transition);
        }

        .panel-action:hover {
            color: var(--teal-700);
        }

        /* Table */

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            font-size: 11.5px;
            font-weight: 500;
            color: var(--neutral-400);
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 0 12px 10px 0;
            text-align: left;
            border-bottom: 1px solid var(--neutral-100);
        }

        .data-table td {
            padding: 10px 12px 10px 0;
            font-size: 13px;
            color: var(--neutral-600);
            border-bottom: 1px solid var(--neutral-100);
            vertical-align: middle;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table tr:hover td {
            background: var(--neutral-50);
        }

        /* Activity Feed */

        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid var(--neutral-100);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .act-icon {
            width: 30px;
            height: 30px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .act-title {
            font-size: 13px;
            color: var(--neutral-700);
            font-weight: 500;
            line-height: 1.3;
        }

        .act-time {
            font-size: 11.5px;
            color: var(--neutral-400);
            margin-top: 2px;
        }

        /* ─── LOGOUT MODAL ─── */

        .l-modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity var(--transition-s);
        }

        .l-modal-backdrop.open {
            opacity: 1;
            pointer-events: all;
        }

        .l-modal-box {
            background: white;
            border-radius: var(--radius-xl);
            border: 1px solid var(--neutral-200);
            box-shadow: var(--shadow-xl);
            padding: 32px 28px 28px;
            width: 100%;
            max-width: 380px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transform: translateY(12px) scale(0.98);
            transition: transform var(--transition-s);
        }

        .l-modal-backdrop.open .modal-box {
            transform: translateY(0) scale(1);
        }

        .l-modal-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: var(--radius-lg);
            background: #FEF2F2;
            border: 1px solid #FECACA;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .l-modal-icon-wrap i {
            font-size: 24px;
            color: #DC2626;
        }

        .l-modal-title {
            font-family: var(--font-heading);
            font-size: var(--text-xl);
            color: var(--neutral-800);
            margin-bottom: 8px;
        }

        .l-modal-body {
            font-size: var(--text-sm);
            color: var(--neutral-500);
            line-height: 1.6;
            max-width: 300px;
            margin-bottom: 24px;
        }

        .l-modal-actions {
            display: flex;
            gap: 10px;
            width: 100%;
        }

        .btn-cancel {
            flex: 1;
            padding: 9px 16px;
            border-radius: var(--radius-md);
            border: 1px solid var(--neutral-200);
            background: white;
            color: var(--neutral-600);
            font-size: var(--text-sm);
            font-weight: 500;
            font-family: var(--font-body);
            cursor: pointer;
            transition: all var(--transition);
        }

        .btn-cancel:hover {
            background: var(--neutral-100);
            border-color: var(--neutral-300);
            color: var(--neutral-700);
        }

        .btn-logout {
            flex: 1;
            padding: 9px 16px;
            border-radius: var(--radius-md);
            background: #DC2626;
            color: white;
            font-size: var(--text-sm);
            font-weight: 500;
            font-family: var(--font-body);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all var(--transition);
        }

        .btn-logout:hover {
            background: #B91C1C;
        }

        .btn-logout i {
            font-size: 15px;
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <div class="logo-inner">
                <div class="logo-icon">
                    <span class="nav-logo-icon">&#x2B22;</span>
                </div>
                <div>
                    <div class="logo-text">CampusHub</div>
                    <div class="logo-sub">Admin Portal</div>
                </div>
            </div>
        </div>

        <nav class="nav">

            <?php
            $page = '';
            ?>

            <div class="nav-section">
                <a class="nav-link <?= ($page === 'dashboard') ? 'active' : '' ?>" href="?page=dashboard">
                    <i class="ti ti-layout-dashboard"></i> Dashboard
                </a>
            </div>

            <!-- Event Management -->
            <div class="nav-section">
                <div class="nav-link <?= in_array($page, ['events', 'add-event']) ? 'open' : '' ?>"
                    onclick="toggleSub('events-sub', this)">
                    <i class="ti ti-calendar-event"></i> Event Management
                    <i class="ti ti-chevron-down chevron"></i>
                </div>
                <div class="sub-links <?= in_array($page, ['events', 'add-event']) ? 'open' : '' ?>" id="events-sub">
                    <a class="sub-link" href="?page=events">All Events</a>
                    <a class="sub-link" href="?page=add-event">Add an Event</a>
                    <a class="sub-link" href="?page=event-media">Event Gallery</a>
                </div>
            </div>
            <div class="nav-section">
                <a class="nav-link <?= ($page === 'students') ? 'active' : '' ?>" href="?page=students">
                    <i class="ti ti-users"></i> Students
                </a>
            </div>

            <div class="nav-section">
                <a class="nav-link <?= ($page === 'registrations') ? 'active' : '' ?>" href="?page=registrations">
                    <i class="ti ti-clipboard-list"></i> Registrations
                </a>
            </div>

            <div class="nav-section">
                <div class="nav-link <?= in_array($page, ['announcements', 'add-announcement']) ? 'open' : '' ?>"
                    onclick="toggleSub('announce-sub', this)">
                    <i class="ti ti-speakerphone"></i> Announcements
                    <i class="ti ti-chevron-down chevron"></i>
                </div>
                <div class="sub-links <?= in_array($page, ['announcements', 'add-announcement']) ? 'open' : '' ?>"
                    id="announce-sub">
                    <a class="sub-link" href="?page=announcements">All Announcements</a>
                    <a class="sub-link" href="?page=add-announcement">Add an Announcement</a>
                </div>
            </div>

            <div class="nav-section">
                <a class="nav-link <?= ($page === 'forms') ? 'active' : '' ?>" href="?page=forms">
                    <i class="ti ti-forms"></i> Forms
                </a>
            </div>

            <div class="nav-section">
                <a class="nav-link <?= ($page === 'organizational-info') ? 'active' : '' ?>"
                    href="?page=organizational-info">
                    <i class="ti ti-building"></i> Organisation Info
                </a>
            </div>

            <div class="nav-divider"></div>

            <div class="nav-section">
                <a class="nav-link <?= ($page === 'admins') ? 'active' : '' ?>" href="?page=admins">
                    <i class="ti ti-shield-lock"></i> Admins
                </a>
            </div>

            <div class="nav-section">
                <button class="logout-link" onclick="openLogoutModal();">
                    <i class="ti ti-logout"></i> Logout
                </button>
            </div>

        </nav>

    </aside>

    <div class="main">

        <?php
        $page = $_GET['page'] ?? 'dashboard';

        $allowed_pages = [
            'dashboard',
            'students',
            'add-student',
            'events',
            'add-event',
            'event-media',
            'registrations',
            'announcements',
            'add-announcement',
            'forms',
            'admins',
            'organizational-info'
        ];

        if (!in_array($page, $allowed_pages)) {
            $page = 'not-found';
        }

        $page_path = "pages/$page.php";
        ?>

        <?php if ($page !== 'not-found'): ?>
            <header class="header">
                <div class="header-left">
                    <div class="breadcrumb">CampusHub Admin</div>
                    <div class="page-title">
                        <?= ucfirst(str_replace('-', ' ', $page)) ?>
                    </div>
                </div>

                <div class="header-right">

                    <div class="admin-chip">
                        <div class="avatar"><i class="ti ti-user"></i></div>
                        <span class="admin-name"><?php echo $_SESSION['a']['name']; ?></span>
                    </div>
                    <a class="notif-btn" href="#" title="Log out" onclick="openLogoutModal(); return false;">
                        <i class="ti ti-logout"></i>
                    </a>
                </div>
            </header>
        <?php endif; ?>

        <main class="content">

            <div class="content-placeholder">
                <?php
                if (file_exists($page_path)) {
                    include $page_path;
                } else {
                    echo "<h2>Page not found</h2>";
                }
                ?>
            </div>

        </main>

    </div>

    <!-- Logout Confirmation Modal -->
    <div class="l-modal-backdrop" id="logoutModal" onclick="closeLogoutModal(event)">
        <div class="l-modal-box" role="dialog" aria-modal="true" aria-labelledby="logoutModalTitle">
            <div class="l-modal-icon-wrap">
                <i class="ti ti-logout"></i>
            </div>
            <h2 class="l-modal-title" id="logoutModalTitle">Log out?</h2>
            <p class="l-modal-body">
                You're about to log out of the admin portal. Any unsaved changes will be lost.
                Are you sure you want to continue?
            </p>
            <div class="l-modal-actions">
                <button class="btn-cancel" onclick="closeLModal()">Stay logged in</button>
                <a href="../process/adminLogout.php" class="btn-logout">
                    <i class="ti ti-logout"></i> Log me out
                </a>
            </div>
        </div>
    </div>

    <script>
        function toggleSub(id, el) {
            const sub = document.getElementById(id);
            const isOpen = sub.classList.contains('open');
            sub.classList.toggle('open', !isOpen);
            el.classList.toggle('open', !isOpen);
        }

        function openLogoutModal() {
            document.getElementById('logoutModal').classList.add('open');
        }

        function closeLModal() {
            document.getElementById('logoutModal').classList.remove('open');
        }

        function closeLogoutModal(e) {
            // close only when clicking the backdrop itself, not the box inside
            if (e.target === document.getElementById('logoutModal')) closeLModal();
        }

        // close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeLModal();
        });


    </script>

</body>

</html>