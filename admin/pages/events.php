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
</style>

<div class="events-page">

    <div class="events-headrow">
        <div class="evt-sum-card">
            <div class="evt-sum-icon teal"><i class="ti ti-calendar-event"></i></div>
            <div>
                <div class="evt-sum-value">34</div>
                <div class="evt-sum-label">Total Events</div>
            </div>
        </div>
        <div class="evt-sum-card">
            <div class="evt-sum-icon violet"><i class="ti ti-calendar-stats"></i></div>
            <div>
                <div class="evt-sum-value">19</div>
                <div class="evt-sum-label">Open Now</div>
            </div>
        </div>
        <div class="evt-sum-card">
            <div class="evt-sum-icon amber"><i class="ti ti-clock-hour-4"></i></div>
            <div>
                <div class="evt-sum-value">7</div>
                <div class="evt-sum-label">Filling Fast</div>
            </div>
        </div>
        <div class="evt-sum-card">
            <div class="evt-sum-icon red"><i class="ti ti-lock"></i></div>
            <div>
                <div class="evt-sum-value">5</div>
                <div class="evt-sum-label">Full / Closed</div>
            </div>
        </div>

    </div>

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


        <button class="evt-btn-primary" type="button" onclick="window.location.href='/campusHub/?page=add-event'">
            <i class="ti ti-plus"></i>
            New Event
        </button>

    </div>

    <div class="events-grid">

        <!-- 1 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-academic">
                <span class="evt-cat-tag">Academic</span>
                <div class="evt-card-date-chip"><span class="evt-day">22</span><span class="evt-mon">Jun</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Orientation Day 2026</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 9:00 AM – 1:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Main Auditorium</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Student Affairs Office</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status open">Open</span>
                    <span class="evt-reg-count"><b>145</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 2 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-tech">
                <span class="evt-cat-tag">Technology</span>
                <div class="evt-card-date-chip"><span class="evt-day">28</span><span class="evt-mon">Jun</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Coding Hackathon</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 8:00 AM – 8:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Innovation Lab, Block C</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Computing Society</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status open">Open</span>
                    <span class="evt-reg-count"><b>88</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 3 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-sports">
                <span class="evt-cat-tag">Sports</span>
                <div class="evt-card-date-chip"><span class="evt-day">05</span><span class="evt-mon">Jul</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Sports Carnival</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 7:30 AM – 4:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> University Grounds</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Sports Council</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status filling">Filling</span>
                    <span class="evt-reg-count"><b>210</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 4 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-culture">
                <span class="evt-cat-tag">Culture</span>
                <div class="evt-card-date-chip"><span class="evt-day">12</span><span class="evt-mon">Jul</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Art Workshop</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 2:00 PM – 5:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Fine Arts Studio</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Creative Arts Club</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status open">Open</span>
                    <span class="evt-reg-count"><b>40</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 5 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-academic">
                <span class="evt-cat-tag">Academic</span>
                <div class="evt-card-date-chip"><span class="evt-day">19</span><span class="evt-mon">Jul</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Leadership Summit</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 9:00 AM – 3:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Conference Hall A</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Student Council</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status full">Full</span>
                    <span class="evt-reg-count"><b>300</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 6 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-social">
                <span class="evt-cat-tag">Social</span>
                <div class="evt-card-date-chip"><span class="evt-day">26</span><span class="evt-mon">Jul</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Freshers' Welcome Night</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 6:00 PM – 10:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Campus Pavilion</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Student Affairs Office</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status draft">Draft</span>
                    <span class="evt-reg-count"><b>0</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 7 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-tech">
                <span class="evt-cat-tag">Technology</span>
                <div class="evt-card-date-chip"><span class="evt-day">02</span><span class="evt-mon">Aug</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Robotics Showcase</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 10:00 AM – 2:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Engineering Block, Lab 3</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Robotics Society</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status open">Open</span>
                    <span class="evt-reg-count"><b>56</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 8 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-sports">
                <span class="evt-cat-tag">Sports</span>
                <div class="evt-card-date-chip"><span class="evt-day">09</span><span class="evt-mon">Aug</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Inter-Faculty Football Cup</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 3:00 PM – 6:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Main Sports Ground</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Sports Council</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status filling">Filling</span>
                    <span class="evt-reg-count"><b>132</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

        <!-- 9 -->
        <div class="evt-card">
            <div class="evt-card-banner cat-culture">
                <span class="evt-cat-tag">Culture</span>
                <div class="evt-card-date-chip"><span class="evt-day">14</span><span class="evt-mon">May</span></div>
            </div>
            <div class="evt-card-body">
                <div class="evt-card-title">Photography Exhibition</div>
                <div class="evt-card-meta">
                    <div class="evt-meta-row"><i class="ti ti-clock"></i> 10:00 AM – 6:00 PM</div>
                    <div class="evt-meta-row"><i class="ti ti-map-pin"></i> Library Gallery Wing</div>
                    <div class="evt-meta-row"><i class="ti ti-user"></i> Photography Club</div>
                </div>
                <div class="evt-card-footer">
                    <span class="evt-status closed">Closed</span>
                    <span class="evt-reg-count"><b>97</b>&nbsp;registered</span>
                </div>
            </div>
            <div class="evt-card-actions">
                <button class="evt-icon-btn" type="button"><i class="ti ti-eye"></i> View</button>
                <button class="evt-icon-btn" type="button"><i class="ti ti-edit"></i> Edit</button>
                <button class="evt-icon-btn danger" type="button"><i class="ti ti-trash"></i></button>
            </div>
        </div>

    </div>

    <!-- ===== Pagination ===== -->
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
    </div>

</div>