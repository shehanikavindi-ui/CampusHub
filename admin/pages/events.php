<!-- ============================================================
     ADMIN — ALL EVENTS PAGE
     CampusHub Admin Dashboard
     Uses only the :root tokens already defined in the global
     stylesheet (root.css). No classes from the dashboard's
     existing component styles (.stat-card, .panel, .data-table
     etc.) are reused — everything below is page-scoped under
     the `.events-*` / `.evt-*` namespace to avoid collisions.
============================================================ -->

<style>
    /* ============================================================
   ALL EVENTS — PAGE STYLES
   Built only from :root custom properties.
============================================================ */

    .events-page {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ---------- Page heading row ---------- */

    .events-headrow {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    .evt-btn-container {
        display: flex;
        align-items: start;
        justify-content: flex-end;
    }

    .evt-btn-primary {
        align-items: center;
        gap: 12px;
        background: var(--primary);
        color: var(--text-white);
        border: none;
        width: 130px;
        height: 35px;
        border-radius: var(--radius-md);
        font-size: 14px;
        font-weight: 550;
        cursor: pointer;
        box-shadow: var(--shadow-primary);
        transition: background var(--transition), transform var(--transition);
        white-space: nowrap;
    }

    .evt-btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    .evt-btn-primary i {
        margin-right: 5px;
        font-size: 14px;
    }

    .events-summary {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    .evt-sum-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .evt-sum-icon {
        width: 38px;
        height: 38px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .evt-sum-icon i {
        font-size: 18px;
    }

    .evt-sum-icon.teal {
        background: var(--teal-50);
    }

    .evt-sum-icon.teal i {
        color: var(--teal-600);
    }

    .evt-sum-icon.violet {
        background: var(--violet-50);
    }

    .evt-sum-icon.violet i {
        color: var(--violet-600);
    }

    .evt-sum-icon.amber {
        background: #FFFBEB;
    }

    .evt-sum-icon.amber i {
        color: #D97706;
    }

    .evt-sum-icon.red {
        background: #FEF2F2;
    }

    .evt-sum-icon.red i {
        color: #DC2626;
    }

    .evt-sum-value {
        font-size: var(--text-xl);
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1.1;
    }

    .evt-sum-label {
        font-size: 11.5px;
        color: var(--text-muted);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-top: 2px;
    }

    /* ---------- Toolbar: search + filters ---------- */

    .events-toolbar {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .evt-search {
        position: relative;
        flex: 1;
        min-width: 220px;
    }

    .evt-search input {
        width: 100%;
        padding: 9px 14px 9px 36px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-family: var(--font-body);
        color: var(--text-primary);
        background: var(--bg-soft);
        transition: border-color var(--transition), background var(--transition);
    }

    .evt-search input:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--bg-white);
    }

    .evt-search i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: var(--text-muted);
    }

    .evt-filter-select {
        padding: 9px 32px 9px 14px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-family: var(--font-body);
        color: var(--text-secondary);
        background: var(--bg-soft);
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%2364748B' stroke-width='1.6' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        transition: border-color var(--transition);
    }

    .evt-filter-select:focus {
        outline: none;
        border-color: var(--primary);
    }

    .evt-view-toggle {
        display: flex;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        overflow: hidden;
        flex-shrink: 0;
    }

    .evt-view-btn {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--bg-soft);
        border: none;
        cursor: pointer;
        color: var(--text-muted);
        transition: all var(--transition);
    }

    .evt-view-btn+.evt-view-btn {
        border-left: 1px solid var(--neutral-200);
    }

    .evt-view-btn.active {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .evt-view-btn i {
        font-size: 17px;
    }

    /* ---------- Events grid (card view) ---------- */

    .events-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .evt-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: box-shadow var(--transition), transform var(--transition);
    }

    .evt-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .evt-card-banner {
        height: 96px;
        position: relative;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        padding: 12px 14px;
    }

    .evt-card-banner.cat-academic {
        background: linear-gradient(135deg, var(--teal-500), var(--teal-700));
    }

    .evt-card-banner.cat-sports {
        background: linear-gradient(135deg, #F59E0B, #B45309);
    }

    .evt-card-banner.cat-culture {
        background: linear-gradient(135deg, var(--violet-500), var(--violet-700));
    }

    .evt-card-banner.cat-tech {
        background: linear-gradient(135deg, #2563EB, #1E3A8A);
    }

    .evt-card-banner.cat-social {
        background: linear-gradient(135deg, #EC4899, #9D174D);
    }

    .evt-cat-tag {
        font-size: 11px;
        font-weight: 600;
        color: var(--text-white);
        background: rgba(255, 255, 255, 0.22);
        padding: 3px 9px;
        border-radius: var(--radius-full);
        letter-spacing: 0.3px;
    }

    .evt-card-date-chip {
        background: var(--bg-white);
        border-radius: var(--radius-md);
        padding: 5px 9px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        line-height: 1.1;
    }

    .evt-card-date-chip .evt-day {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        display: block;
    }

    .evt-card-date-chip .evt-mon {
        font-size: 10px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .evt-card-body {
        padding: 14px 16px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    .evt-card-title {
        font-size: var(--text-base);
        font-weight: 600;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .evt-card-meta {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .evt-meta-row {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        color: var(--text-secondary);
    }

    .evt-meta-row i {
        font-size: 14px;
        color: var(--text-muted);
        width: 14px;
        flex-shrink: 0;
    }

    .evt-card-footer {
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 10px;
        border-top: 1px solid var(--neutral-100);
    }

    .evt-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: var(--radius-full);
    }

    .evt-status::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .evt-status.open {
        background: var(--teal-50);
        color: var(--teal-700);
    }

    .evt-status.open::before {
        background: var(--teal-500);
    }

    .evt-status.filling {
        background: #FFFBEB;
        color: #92400E;
    }

    .evt-status.filling::before {
        background: #D97706;
    }

    .evt-status.full {
        background: #FEF2F2;
        color: #991B1B;
    }

    .evt-status.full::before {
        background: #DC2626;
    }

    .evt-status.draft {
        background: var(--neutral-100);
        color: var(--neutral-500);
    }

    .evt-status.draft::before {
        background: var(--neutral-400);
    }

    .evt-status.closed {
        background: var(--neutral-100);
        color: var(--neutral-500);
    }

    .evt-status.closed::before {
        background: var(--neutral-400);
    }

    .evt-reg-count {
        font-size: 12px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .evt-reg-count b {
        color: var(--text-primary);
        font-weight: 600;
    }

    .evt-card-actions {
        display: flex;
        gap: 6px;
        padding: 0 16px 14px;
    }

    .evt-icon-btn {
        flex: 1;
        height: 32px;
        border-radius: var(--radius-md);
        border: 1px solid var(--neutral-200);
        background: var(--bg-soft);
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all var(--transition);
    }

    .evt-icon-btn i {
        font-size: 14px;
    }

    .evt-icon-btn:hover {
        background: var(--primary-light);
        color: var(--primary-dark);
        border-color: var(--primary-light);
    }

    .evt-icon-btn.danger:hover {
        background: #FEF2F2;
        color: #991B1B;
        border-color: #FECACA;
    }

    /* ---------- Pagination ---------- */

    .events-pagination {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 6px;
    }

    .evt-page-info {
        font-size: 12.5px;
        color: var(--text-muted);
    }

    .evt-page-info b {
        color: var(--text-secondary);
    }

    .evt-page-controls {
        display: flex;
        gap: 6px;
    }

    .evt-page-btn {
        min-width: 32px;
        height: 32px;
        padding: 0 8px;
        border-radius: var(--radius-md);
        border: 1px solid var(--neutral-200);
        background: var(--bg-white);
        color: var(--text-secondary);
        font-size: 12.5px;
        font-weight: 500;
        cursor: pointer;
        transition: all var(--transition);
    }

    .evt-page-btn:hover {
        background: var(--bg-soft);
    }

    .evt-page-btn.active {
        background: var(--primary);
        color: var(--text-white);
        border-color: var(--primary);
    }

    .evt-page-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    /* ---------- Responsive ---------- */

    @media (max-width: 1100px) {
        .events-summary {
            grid-template-columns: repeat(2, 1fr);
        }

        .events-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 720px) {
        .events-summary {
            grid-template-columns: 1fr;
        }

        .events-grid {
            grid-template-columns: 1fr;
        }

        .events-toolbar {
            flex-direction: column;
            align-items: stretch;
        }

        .evt-search {
            min-width: 0;
        }
    }

    /* ───────────────────────── Modal Overlay ───────────────────────── */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.55);
        backdrop-filter: blur(6px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
    }

    /* ───────────────────────── Modal Card ───────────────────────── */
    .modal-card {
        width: 100%;
        max-width: 620px;
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        animation: pop 220ms var(--ease);
        padding-bottom: 10px;
    }

    @keyframes pop {
        from {
            transform: scale(0.96);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* ───────────────────────── Header ───────────────────────── */
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 20px;
        border-bottom: 1px solid var(--neutral-100);
        background: var(--bg-soft);
    }

    .modal-title h2 {
        font-size: 16px;
        color: var(--text-primary);
        margin: 0;
    }

    .modal-title p {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 2px;
    }

    .modal-close {
        width: 34px;
        height: 34px;
        border-radius: var(--radius-md);
        border: 1px solid var(--neutral-200);
        background: white;
        cursor: pointer;
    }

    /* ───────────────────────── Body ───────────────────────── */
    .modal-body {
        padding: 20px;
    }

    .profile-section {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    /* Avatar */
    .modal-avatar {
        width: 60px;
        height: 60px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: var(--primary-dark);
        background: var(--teal-100);
        font-size: 16px;
        overflow: hidden;
    }

    .modal-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Profile Info */
    .profile-info h3 {
        margin: 0;
        font-size: 16px;
        margin-bottom: 5px;
        color: var(--text-primary);
    }

    /* ───────────────────────── Details Grid ───────────────────────── */
    .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .detail-item {
        padding: 10px 12px;
        border: 1px solid var(--neutral-100);
        border-radius: var(--radius-md);
        background: var(--bg-soft);
    }

    .detail-item label {
        font-size: 11px;
        color: var(--text-muted);
        display: block;
        margin-bottom: 4px;
    }

    .detail-item span {
        font-size: 13px;
        color: var(--text-secondary);
    }

    /* ───────────────────────── Footer ───────────────────────── */
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 20px;
        border-top: 1px solid var(--neutral-100);
        background: var(--bg-soft);
    }

    .event-modal {
        max-width: 750px;
        padding-bottom: 0;
    }

    /* BIG TOP BANNER */
    .event-banner {
        width: 100%;
        height: 220px;
        background: #e5e7eb;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    /* dark overlay */
    .event-banner-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top,
                rgba(0, 0, 0, 0.65),
                rgba(0, 0, 0, 0.1));
        color: white;
        padding: 18px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        gap: 6px;
    }

    .event-banner-overlay h2 {
        margin: 0;
        font-size: 20px;
    }

    .event-date {
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 6px;
        opacity: 0.9;
    }
</style>

<div class="events-page">



    <!-- ===== Toolbar ===== -->
    <div class="events-toolbar">
        <div class="evt-search">
            <i class="ti ti-search"></i>
            <input type="text" placeholder="Search events by name or organiser...">
        </div>

        <select class="evt-filter-select">
            <option>All Categories</option>
            <option>Academic</option>
            <option>Sports</option>
            <option>Culture</option>
            <option>Technology</option>
            <option>Social</option>
        </select>

        <select class="evt-filter-select">
            <option>All Statuses</option>
            <option>Open</option>
            <option>Filling</option>
            <option>Full</option>
            <option>Draft</option>
            <option>Closed</option>
        </select>

        <select class="evt-filter-select">
            <option>Sort: Date (Soonest)</option>
            <option>Sort: Date (Latest)</option>
            <option>Sort: Most Registrations</option>
            <option>Sort: Name (A–Z)</option>
        </select>


        <button class="evt-btn-primary" type="button" onclick="window.location.href='?page=add-event'">
            <i class="ti ti-plus"></i>
            New Event
        </button>

    </div>

    <div class="events-grid">
        <?php
        $q = "
                SELECT 
                    e.*,
                    i.name AS institution_name,
                    c.name AS category_name,
                    s.name AS status_name,
                    COUNT(r.student_id) AS reg_count
                FROM event e
                JOIN institution i ON e.institution_id = i.id
                JOIN category c ON e.category_id = c.id
                JOIN status s ON e.status = s.id
                LEFT JOIN registration r ON r.event_id = e.id
                GROUP BY e.id
            ";

        $events_rs = Database::search($q);

        while ($row = $events_rs->fetch_assoc()) {

            $id = $row["id"];
            $title = $row["title"];
            $img = $row["banner_img"];
            $date = $row["date"];
            $start = $row["start_time"];
            $end = $row["end_time"];
            $location = $row["location"];
            $regCount = $row["reg_count"];
            $institution = $row["institution_name"];
            $category = $row["category_name"];
            $status = $row["status_name"];
            ?>

            <div class="evt-card">
                <div class="evt-card-banner cat-academic"
                    style="<?= $img ? "background-image:url('../uploads/events/$img'); background-size:cover; background-position:center;" : "" ?>">

                    <span class="evt-cat-tag"><?= $category ?></span>

                    <div class="evt-card-date-chip">
                        <span class="evt-day"><?= date("d", strtotime($date)) ?></span>
                        <span class="evt-mon"><?= date("M", strtotime($date)) ?></span>
                    </div>
                </div>

                <div class="evt-card-body">
                    <div class="evt-card-title"><?= $title ?></div>

                    <div class="evt-card-meta">
                        <div class="evt-meta-row">
                            <i class="ti ti-clock"></i>
                            <?= date("g:i A", strtotime($start)) ?> – <?= date("g:i A", strtotime($end)) ?>
                        </div>

                        <div class="evt-meta-row">
                            <i class="ti ti-map-pin"></i>
                            <?= $location ?>
                        </div>

                        <div class="evt-meta-row">
                            <i class="ti ti-user"></i>
                            <?= $institution ?>
                        </div>
                    </div>

                    <div class="evt-card-footer">
                        <span class="evt-status open"><?= $status ?></span>
                        <span class="evt-reg-count"><b>
                                <?= $regCount ?>
                            </b>&nbsp;registered</span>
                    </div>
                </div>

                <div class="evt-card-actions">
                    <button class="evt-icon-btn" type="button" onclick='openEventModal(
                        <?= json_encode($id) ?>,
                        <?= json_encode($title) ?>,
                        <?= json_encode($status) ?>,
                        <?= json_encode($category) ?>,
                        <?= json_encode($institution) ?>,
                        <?= json_encode($start) ?>,
                        <?= json_encode($end) ?>,
                        <?= json_encode($location) ?>,
                        <?= json_encode($regCount) ?>,
                        <?= json_encode($img) ?>,
                        <?= json_encode($date) ?>
                    )'>
                        <i class="ti ti-eye"></i> View
                    </button>
                    <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                    <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
                </div>
            </div>

            <?php
        }
        ?>
    </div>

    <!-- ===== Pagination =====
    <div class="events-pagination">
        <div class="evt-page-info">Showing <b>1–9</b> of <b>34</b> events</div>
        <div class="evt-page-controls">
            <button class="evt-page-btn" disabled><i class="ti ti-chevron-left"></i></button>
            <button class="evt-page-btn active">1</button>
            <button class="evt-page-btn">2</button>
            <button class="evt-page-btn">3</button>
            <button class="evt-page-btn">4</button>
            <button class="evt-page-btn"><i class="ti ti-chevron-right"></i></button>
        </div>
    </div> -->
    <div id="eventModal" class="modal-overlay" onclick="closeEventModal(event)">
        <div class="modal-card event-modal" onclick="event.stopPropagation()">

            <!-- BIG BANNER -->
            <div id="eventModalBanner" class="event-banner">
                <div class="event-banner-overlay">
                    <h2 id="eventModalTitle">--</h2>
                    <span id="eventModalStatus" class="pill">--</span>

                    <div class="event-date">
                        <i class="ti ti-calendar"></i>
                        <span id="eventModalDate">--</span>
                    </div>
                </div>
            </div>

            <div class="modal-body">

                <div class="details-grid">

                    <div class="detail-item">
                        <label>Category</label>
                        <span id="eventModalCategory">--</span>
                    </div>

                    <div class="detail-item">
                        <label>Institution</label>
                        <span id="eventModalInstitution">--</span>
                    </div>

                    <div class="detail-item">
                        <label>Time</label>
                        <span id="eventModalTime">--</span>
                    </div>

                    <div class="detail-item">
                        <label>Location</label>
                        <span id="eventModalLocation">--</span>
                    </div>

                    <div class="detail-item">
                        <label>Registrations</label>
                        <span id="eventModalRegs">--</span>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<script>
    function openEventModal(id, title, status, category, institution, start, end, location, regCount, img, date) {

        document.getElementById("eventModalTitle").textContent = title;
        document.getElementById("eventModalStatus").textContent = status;
        document.getElementById("eventModalCategory").textContent = category;
        document.getElementById("eventModalInstitution").textContent = institution;
        document.getElementById("eventModalLocation").textContent = location;
        document.getElementById("eventModalRegs").textContent = regCount + " registered";

        // time display (you only have ONE field in modal)
        document.getElementById("eventModalTime").textContent =
            `${start} - ${end}`;

        // date (fix safe parsing)
        const dateObj = new Date(date);
        document.getElementById("eventModalDate").textContent =
            isNaN(dateObj) ? date : dateObj.toDateString();

        const banner = document.getElementById("eventModalBanner");

        if (img) {
            banner.style.background = `url('../uploads/events/${img}') center/cover no-repeat`;
        } else {
            banner.style.background = "#eee";
        }

        document.getElementById("eventModal").style.display = "flex";
    }

    function closeEventModal(e) {
        if (e && e.target !== e.currentTarget) return;
        document.getElementById("eventModal").style.display = "none";
    }
</script>