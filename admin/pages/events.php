<style>
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

    .events-toolbar {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 14px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .evt-search {
        position: relative;
        flex: 1;
        max-width: 50%;
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

    .evt-status.Upcoming {
        background: var(--teal-50);
        color: var(--teal-700);
    }

    .evt-status.Upcoming::before {
        background: var(--teal-500);
    }

    .evt-status.Completed {
        background: #FFFBEB;
        color: #92400E;
    }

    .evt-status.Completed::before {
        background: #D97706;
    }

    .evt-status.Cancelled {
        background: #FEF2F2;
        color: #991B1B;
    }

    .evt-status.Cancelled::before {
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
    }

    .modal-title h2 {
        font-size: 16px;
        color: var(--text-primary);
        margin: 0;
        font-weight: 600;
    }

    .modal-title h2 span {
        color: var(--primary-dark);
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
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all var(--transition);
    }

    .modal-close:hover {
        background: var(--neutral-100);
        border-color: var(--neutral-300);
    }

    .modal-close i {
        font-size: 17px;
        color: var(--text-secondary);
    }

    /* ───────────────────────── Body ───────────────────────── */
    .modal-body {
        padding: 20px;
        max-height: 65vh;
        overflow-y: auto;
    }

    .modal-body::-webkit-scrollbar {
        width: 5px;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background: var(--neutral-300);
        border-radius: 4px;
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
        flex-shrink: 0;
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

    /* ───────────────────────── Form Field Grid (used in edit/add modals) ───────────────────────── */
    .field-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .field-full {
        grid-column: 1 / -1;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .field label {
        font-size: 12px;
        font-weight: 500;
        color: var(--text-secondary);
    }

    .field input[type="text"],
    .field input[type="date"],
    .field input[type="time"],
    .field input[type="number"],
    .field input[type="email"],
    .field select {
        height: 38px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        padding: 0 12px;
        font-size: 13.5px;
        color: var(--text-primary);
        background: var(--bg-white);
        outline: none;
        font-family: var(--font-body);
        transition: border-color var(--transition), box-shadow var(--transition);
        width: 100%;
    }

    .field input:focus,
    .field select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
    }

    .field input::placeholder {
        color: var(--text-muted);
    }

    /* Custom select chevron (since native arrows look inconsistent) */
    .field select {
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394A3B8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        padding-right: 32px;
        cursor: pointer;
    }

    /* Inputs with a leading icon (date, time, location, etc.) */
    .icon-field {
        position: relative;
    }

    .icon-field i {
        position: absolute;
        left: 11px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 15px;
        color: var(--text-muted);
        pointer-events: none;
    }

    .icon-field input {
        padding-left: 33px !important;
    }

    /* ───────────────────────── Image Upload Zone (with preview) ───────────────────────── */
    .upload-zone {
        border: 1.5px dashed var(--neutral-300);
        border-radius: var(--radius-md);
        padding: 14px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        transition: all var(--transition);
        background: var(--bg-soft);
    }

    .upload-zone:hover {
        border-color: var(--primary);
        background: var(--teal-50);
    }

    .upload-zone.has-image {
        border-style: solid;
        border-color: var(--neutral-200);
    }

    .upload-preview {
        width: 54px;
        height: 54px;
        border-radius: var(--radius-md);
        background: var(--neutral-200);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        overflow: hidden;
    }

    .upload-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .upload-preview i {
        font-size: 22px;
        color: var(--text-muted);
    }

    .upload-text p {
        font-size: 13px;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .upload-text span {
        font-size: 11.5px;
        color: var(--text-muted);
    }

    /* ───────────────────────── Details Grid (read-only profile modal) ───────────────────────── */
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

    /* ───────────────────────── Inline error box ───────────────────────── */
    .err-box {
        margin: 0 20px 14px;
        font-size: 12.5px;
        color: #B91C1C;
        background: #FEF2F2;
        border: 1px solid #FECACA;
        border-radius: var(--radius-md);
        padding: 8px 12px;
        display: none;
        align-items: center;
        gap: 6px;
    }

    .err-box.show {
        display: flex;
    }

    .err-box i {
        font-size: 15px;
        flex-shrink: 0;
    }

    /* ───────────────────────── Footer ───────────────────────── */
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 20px;
        border-top: 1px solid var(--neutral-100);
    }

    .btn-ghost {
        height: 38px;
        padding: 0 16px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        background: white;
        font-size: 13.5px;
        color: var(--text-secondary);
        cursor: pointer;
        font-family: var(--font-body);
        transition: all var(--transition);
    }

    .btn-ghost:hover {
        background: var(--neutral-100);
    }

    .evt-btn-primary {
        height: 38px;
        padding: 0 18px;
        border: none;
        border-radius: var(--radius-md);
        background: var(--primary);
        color: white;
        font-size: 13.5px;
        font-weight: 500;
        cursor: pointer;
        font-family: var(--font-body);
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: background var(--transition);
    }

    .evt-btn-primary:hover {
        background: var(--primary-hover);
    }

    .evt-btn-primary i {
        font-size: 16px;
    }

    /* ───────────────────────── Event-specific modal ───────────────────────── */
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

    .am-modal-icon {
        width: 40px;
        height: 40px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        color: var(--teal-600);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .am-modal-head-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .am-modal-icon.edit-icon {
        background: var(--teal-50);
        color: var(--teal-600);
    }

    .am-modal-title {
        font-size: var(--text-lg);
        font-weight: 600;
        color: var(--text-primary);
    }

    .am-modal-title span {
        color: #0D9488;
        font-weight: 700;
    }

    .am-modal-sub {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 1px;
    }
</style>

<div class="events-page">



    <!-- ===== Toolbar ===== -->
    <div class="events-toolbar">
        <div class="evt-search">
            <i class="ti ti-search"></i>
            <input id="eventSearch" type="text" placeholder="Search events by name or organiser...">
        </div>


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
                ORDER BY e.date DESC
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

            <div class="evt-card" data-title="<?= strtolower($title) ?>" data-institution="<?= strtolower($institution) ?>"
                data-location="<?= strtolower($location) ?>">
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
                        <span class="evt-status <?= $status ?>"><?= $status ?></span>
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
                    <button class="evt-icon-btn" type="button" onclick='openEditModal(
                        <?= json_encode($id) ?>,
                        <?= json_encode($title) ?>,
                        <?= json_encode($date) ?>,
                        <?= json_encode($start) ?>,
                        <?= json_encode($end) ?>,
                        <?= json_encode($location) ?>,
                        <?= json_encode($row["category_id"]) ?>,
                        <?= json_encode($row["institution_id"]) ?>,
                        <?= json_encode($row["status"]) ?>
                    )'>
                        <i class="ti ti-edit"></i> Edit
                    </button>
                    <button class="evt-icon-btn danger" type="button" onclick="deleteEvent(<?= $id ?>)">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>
            </div>

            <?php
        }
        ?>
    </div>

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

    <div id="eventEditModal" class="modal-overlay" onclick="closeEditModal(event)">
        <div class="modal-card event-modal" onclick="event.stopPropagation()">

            <form id="eventEditForm" onsubmit="updateEvent(event)">

                <div class="modal-header">
                    <div class="am-modal-head-left">
                        <div class="am-modal-icon edit-icon"><i class="ti ti-edit"></i></div>
                        <div>
                            <div class="am-modal-title" id="amEditModalTitle">Edit Event: <span class="am-modal-title"
                                    id="title"></span></div>
                            <div class="am-modal-sub">Changes only save once you confirm below.</div>
                        </div>
                    </div>
                    <button type="button" class="modal-close" onclick="closeEditModal()" aria-label="Close">
                        <i class="ti ti-x" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="modal-body">

                    <input type="hidden" id="edit_id" name="id" required>

                    <div class="field-grid">

                        <div class="field field-full">
                            <label>Title</label>
                            <input required id="edit_title" name="title" type="text"
                                placeholder="e.g. Coding Hackathon">
                        </div>

                        <div class="field">
                            <label>Date</label>
                            <div class="icon-field">
                                <i class="ti ti-calendar" aria-hidden="true"></i>
                                <input required id="edit_date" name="date" type="date">
                            </div>
                        </div>

                        <div class="field">
                            <label>Location</label>
                            <div class="icon-field">
                                <i class="ti ti-map-pin" aria-hidden="true"></i>
                                <input required id="edit_location" name="location" type="text"
                                    placeholder="e.g. Main Auditorium">
                            </div>
                        </div>

                        <div class="field">
                            <label>Start time</label>
                            <div class="icon-field">
                                <i class="ti ti-clock" aria-hidden="true"></i>
                                <input required id="edit_start" name="start_time" type="time">
                            </div>
                        </div>

                        <div class="field">
                            <label>End time</label>
                            <div class="icon-field">
                                <i class="ti ti-clock" aria-hidden="true"></i>
                                <input required id="edit_end" name="end_time" type="time">
                            </div>
                        </div>

                        <div class="field">
                            <label>Category</label>
                            <select id="edit_category" name="category_id" required>
                                <?php
                                $q = "SELECT * FROM category";
                                $categories_rs = Database::search($q);
                                while ($row = $categories_rs->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="field">
                            <label>Institution</label>
                            <select id="edit_institution" name="institution_id" required>
                                <?php
                                $q = "SELECT * FROM institution";
                                $institutes_rs = Database::search($q);
                                while ($row = $institutes_rs->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="field">
                            <label>Status</label>
                            <select id="edit_status" name="status_id" required>
                                <?php
                                $q = "SELECT * FROM status";
                                $status_rs = Database::search($q);
                                while ($row = $status_rs->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="field field-full">
                            <label>Banner image</label>
                            <div class="upload-zone" id="uploadZone"
                                onclick="document.getElementById('edit_image').click()">

                                <div class="upload-preview" id="uploadPreview">
                                    <i class="ti ti-photo" aria-hidden="true"></i>
                                </div>

                                <div class="upload-text">
                                    <p id="uploadFileName">Choose a banner image</p>
                                    <span>JPG or PNG, recommended 1200×400px</span>
                                </div>

                                <input id="edit_image" type="file" name="image" accept="image/*" style="display:none"
                                    onchange="previewBannerImage(this)">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="err-box" id="edit_error">
                    <i class="ti ti-alert-circle" aria-hidden="true"></i>
                    <span id="edit_error_text"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-ghost" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="evt-btn-primary">
                        Update event
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<script>
    const searchInput = document.getElementById("eventSearch");
    const cards = document.querySelectorAll(".evt-card");

    searchInput.addEventListener("input", function () {
        const q = this.value.toLowerCase().trim();

        cards.forEach(card => {
            const title = card.dataset.title;
            const institution = card.dataset.institution;
            const location = card.dataset.location;

            const match =
                title.includes(q) ||
                institution.includes(q) ||
                location.includes(q);

            card.style.display = match ? "block" : "none";
        });
    });

    function openEventModal(id, title, status, category, institution, start, end, location, regCount, img, date) {

        document.getElementById("eventModalTitle").textContent = title;
        document.getElementById("eventModalStatus").textContent = status;
        document.getElementById("eventModalCategory").textContent = category;
        document.getElementById("eventModalInstitution").textContent = institution;
        document.getElementById("eventModalLocation").textContent = location;
        document.getElementById("eventModalRegs").textContent = regCount + " registered";

        document.getElementById("eventModalTime").textContent =
            `${start} - ${end}`;

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

    function openEditModal(id, title, date, start, end, location, categoryId, institutionId, status) {

        document.getElementById("edit_id").value = id;
        document.getElementById("title").textContent = title;
        document.getElementById("edit_title").value = title;
        document.getElementById("edit_date").value = date;
        document.getElementById("edit_start").value = start;
        document.getElementById("edit_end").value = end;
        document.getElementById("edit_location").value = location;

        document.getElementById("edit_category").value = categoryId;
        document.getElementById("edit_institution").value = institutionId;
        document.getElementById("edit_status").value = status;

        document.getElementById("eventEditModal").style.display = "flex";
    }

    function previewBannerImage(input) {
        if (!input.files || !input.files[0]) return;
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('uploadPreview').innerHTML = `<img src="${e.target.result}" alt="Banner preview">`;
            document.getElementById('uploadFileName').textContent = file.name;
            document.getElementById('uploadZone').classList.add('has-image');
        };
        reader.readAsDataURL(file);
    }

    function showEditError(message) {
        const box = document.getElementById('edit_error');
        document.getElementById('edit_error_text').textContent = message;
        box.classList.add('show');
    }

    function hideEditError() {
        document.getElementById('edit_error').classList.remove('show');
    }

    function resetUploadZone() {
        document.getElementById('uploadPreview').innerHTML = '<i class="ti ti-photo" aria-hidden="true"></i>';
        document.getElementById('uploadFileName').textContent = 'Choose a banner image';
        document.getElementById('uploadZone').classList.remove('has-image');
        document.getElementById('edit_image').value = '';
    }

    function closeEditModal(event) {
        if (event && event.target !== event.currentTarget) return;
        document.getElementById('eventEditModal').style.display = 'none';
        hideEditError();
        resetUploadZone();
    }

    function deleteEvent(id) {
        console.log('deleting');

        if (!confirm("Delete this event?")) return;

        fetch(`../process/eventDelete.php?id=${id}`)
            .then(res => res.text())
            .then(res => {

                if (res.trim() === "success") {
                    location.reload();
                } else {
                    alert(res);
                }

            })
            .catch(err => {
                console.error(err);
                alert("Something went wrong while deleting");
            });
    }

    function updateEvent(e) {
        e.preventDefault();

        const formData = new FormData();

        formData.append("id", document.getElementById("edit_id").value);
        formData.append("title", document.getElementById("edit_title").value);
        formData.append("date", document.getElementById("edit_date").value);
        formData.append("start", document.getElementById("edit_start").value);
        formData.append("end", document.getElementById("edit_end").value);
        formData.append("location", document.getElementById("edit_location").value);
        formData.append("category", document.getElementById("edit_category").value);
        formData.append("institution", document.getElementById("edit_institution").value);
        formData.append("status", document.getElementById("edit_status").value);

        const file = document.getElementById("edit_image").files[0];
        if (file) formData.append("image", file);

        fetch("../process/eventUpdate.php", {
            method: "POST",
            body: formData
        })
            .then(res => res.text())
            .then(res => {
                if (res.trim() === "success") {
                    location.reload();
                } else {
                    showEditError(res); // better than innerText bug
                }
            })
            .catch(err => {
                showEditError("Update failed");
                console.error(err);
            });
    }
</script>