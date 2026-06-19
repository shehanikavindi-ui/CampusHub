<style>
    .addevt-page {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ---------- Heading row ---------- */

    .addevt-headrow {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .addevt-heading .ae-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12.5px;
        color: var(--text-muted);
        text-decoration: none;
        margin-bottom: 8px;
        transition: color var(--transition);
    }

    .addevt-heading .ae-back:hover {
        color: var(--primary-dark);
    }

    .addevt-heading .ae-back i {
        font-size: 15px;
    }

    .addevt-heading h1 {
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        color: var(--text-primary);
        margin-bottom: 4px;
    }

    .addevt-heading p {
        font-size: var(--text-sm);
        color: var(--text-secondary);
    }

    .ae-head-actions {
        display: flex;
        gap: 10px;
        flex-shrink: 0;
    }

    .ae-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-weight: 600;
        cursor: pointer;
        padding: 10px 18px;
        transition: background var(--transition), transform var(--transition), border-color var(--transition);
        white-space: nowrap;
        border: 1px solid transparent;
        font-family: var(--font-body);
    }

    .ae-btn i {
        font-size: 16px;
    }

    .ae-btn-ghost {
        background: var(--bg-white);
        border-color: var(--neutral-200);
        color: var(--text-secondary);
    }

    .ae-btn-ghost:hover {
        background: var(--bg-soft);
    }

    .ae-btn-primary {
        background: var(--primary);
        color: var(--text-white);
        box-shadow: var(--shadow-primary);
    }

    .ae-btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    /* ---------- Layout: form + preview ---------- */

    .addevt-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 18px;
        align-items: start;
    }

    /* ---------- Form card ---------- */

    .ae-form-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .ae-section {
        padding: 22px 26px;
        border-bottom: 1px solid var(--neutral-100);
    }

    .ae-section:last-child {
        border-bottom: none;
    }

    .ae-section-head {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
    }

    .ae-section-icon {
        width: 30px;
        height: 30px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        color: var(--teal-600);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ae-section-icon i {
        font-size: 16px;
    }

    .ae-section-title {
        font-size: var(--text-base);
        font-weight: 600;
        color: var(--text-primary);
    }

    .ae-section-sub {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 1px;
    }

    /* ---------- Form grid + fields ---------- */

    .ae-form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .ae-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .ae-field.full {
        grid-column: 1 / -1;
    }

    .ae-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .ae-label .ae-req {
        color: #DC2626;
        font-weight: 700;
    }

    .ae-label .ae-optional {
        font-size: 11px;
        font-weight: 400;
        color: var(--text-muted);
        text-transform: none;
    }

    .ae-hint {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 1px;
    }

    .ae-input,
    .ae-textarea,
    .ae-select {
        user-select: none;
        width: 100%;
        padding: 10px 13px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-family: var(--font-body);
        color: var(--text-primary);
        background: var(--bg-soft);
        transition: border-color var(--transition), background var(--transition), box-shadow var(--transition);
    }

    .ae-input::placeholder,
    .ae-textarea::placeholder {
        color: var(--text-muted);
    }

    .ae-input:focus,
    .ae-textarea:focus,
    .ae-select:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--bg-white);
        box-shadow: 0 0 0 3px var(--teal-50);
    }

    .ae-textarea {
        resize: vertical;
        min-height: 90px;
        line-height: 1.5;
    }

    .ae-select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%2364748B' stroke-width='1.6' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 13px center;
        padding-right: 34px;
    }

    .ae-input-icon-wrap {
        position: relative;
    }

    .ae-input-icon-wrap i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: var(--text-muted);
        pointer-events: none;
    }

    .ae-input-icon-wrap .ae-input {
        padding-left: 36px;
    }

    .ae-char-count {
        font-size: 11px;
        color: var(--text-muted);
        text-align: right;
        margin-top: -2px;
    }

    /* ---------- Status radio pills ---------- */

    .ae-status-group {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .ae-status-pill {
        position: relative;
    }

    .ae-status-pill input {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
        margin: 0;
    }

    .ae-status-pill label {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 9px 16px;
        border: 1.5px solid var(--neutral-200);
        border-radius: var(--radius-full);
        font-size: 13px;
        font-weight: 500;
        color: var(--text-secondary);
        background: var(--bg-soft);
        cursor: pointer;
        transition: all var(--transition);
    }

    .ae-status-pill label::before {
        content: '';
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--neutral-400);
        flex-shrink: 0;
    }

    .ae-status-pill input:checked+label {
        border-color: var(--primary);
        background: var(--teal-50);
        color: var(--teal-700);
    }

    .ae-status-pill input:checked+label::before {
        background: var(--teal-500);
    }

    .ae-status-pill.cancelled input:checked+label {
        border-color: #FCA5A5;
        background: #FEF2F2;
        color: #991B1B;
    }

    .ae-status-pill.cancelled input:checked+label::before {
        background: #DC2626;
    }

    .ae-status-pill.completed input:checked+label {
        border-color: var(--neutral-300);
        background: var(--neutral-100);
        color: var(--neutral-600);
    }

    .ae-status-pill.completed input:checked+label::before {
        background: var(--neutral-400);
    }

    /* ---------- Image upload ---------- */

    .ae-upload {
        border: 1.5px dashed var(--neutral-300);
        border-radius: var(--radius-lg);
        background: var(--bg-soft);
        padding: 28px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
        cursor: pointer;
        transition: border-color var(--transition), background var(--transition);
        position: relative;
    }

    .ae-upload:hover {
        border-color: var(--primary);
        background: var(--teal-50);
    }

    .ae-upload input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }

    .ae-upload-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--teal-100);
        color: var(--teal-700);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ae-upload-icon i {
        font-size: 20px;
    }

    .ae-upload-title {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
    }

    .ae-upload-sub {
        font-size: 11.5px;
        color: var(--text-muted);
    }

    .ae-upload-sub b {
        color: var(--primary-dark);
        font-weight: 600;
    }

    /* ---------- Capacity stepper ---------- */

    .ae-capacity-wrap {
        display: flex;
        align-items: center;
        gap: 0;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        background: var(--bg-soft);
        overflow: hidden;
        width: fit-content;
    }

    .ae-cap-btn {
        width: 36px;
        height: 40px;
        border: none;
        background: transparent;
        color: var(--text-secondary);
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background var(--transition);
    }

    .ae-cap-btn:hover {
        background: var(--neutral-100);
    }

    .ae-capacity-wrap input {
        width: 90px;
        height: 40px;
        text-align: center;
        border: none;
        border-left: 1px solid var(--neutral-200);
        border-right: 1px solid var(--neutral-200);
        background: var(--bg-white);
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--text-primary);
        font-family: var(--font-body);
    }

    .ae-capacity-wrap input:focus {
        outline: none;
    }

    /* ---------- Footer actions (sticky-ish bar) ---------- */

    .ae-form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 26px;
        background: var(--bg-soft);
        border-top: 1px solid var(--neutral-200);
    }

    .ae-footer-note {
        font-size: 12px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .ae-footer-note i {
        font-size: 15px;
        color: var(--text-muted);
    }

    .ae-footer-btns {
        display: flex;
        gap: 10px;
    }

    /* ---------- Live preview panel ---------- */

    .ae-preview-sticky {
        position: sticky;
        top: 0;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .ae-preview-label {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding-left: 2px;
    }

    /* Reuses the card visual language from the All Events page */

    .ae-preview-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .ae-preview-banner {
        height: 110px;
        background: linear-gradient(135deg, var(--teal-500), var(--teal-700));
        position: relative;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        padding: 12px 14px;
        background-size: cover;
        background-position: center;
    }

    .ae-preview-banner.has-image {
        background: var(--neutral-800);
    }

    .ae-preview-banner img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ae-preview-cat-tag {
        font-size: 11px;
        font-weight: 600;
        color: var(--text-white);
        background: rgba(255, 255, 255, 0.22);
        padding: 3px 9px;
        border-radius: var(--radius-full);
        letter-spacing: 0.3px;
        position: relative;
        z-index: 1;
    }

    .ae-preview-date-chip {
        background: var(--bg-white);
        border-radius: var(--radius-md);
        padding: 5px 9px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        line-height: 1.1;
        position: relative;
        z-index: 1;
    }

    .ae-preview-date-chip .ae-day {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        display: block;
    }

    .ae-preview-date-chip .ae-mon {
        font-size: 10px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .ae-preview-body {
        padding: 14px 16px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .ae-preview-title {
        font-size: var(--text-base);
        font-weight: 600;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .ae-preview-title.placeholder {
        color: var(--text-muted);
        font-weight: 500;
        font-style: italic;
    }

    .ae-preview-meta-row {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        color: var(--text-secondary);
    }

    .ae-preview-meta-row i {
        font-size: 14px;
        color: var(--text-muted);
        width: 14px;
        flex-shrink: 0;
    }

    .ae-preview-footer {
        margin-top: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 10px;
        border-top: 1px solid var(--neutral-100);
    }

    .ae-preview-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: var(--radius-full);
        background: var(--teal-50);
        color: var(--teal-700);
    }

    .ae-preview-status::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--teal-500);
    }

    .ae-preview-cap {
        font-size: 12px;
        color: var(--text-muted);
    }

    .ae-preview-cap b {
        color: var(--text-primary);
        font-weight: 600;
    }

    /* Tips box */

    .ae-tips {
        background: var(--violet-50);
        border: 1px solid var(--violet-100);
        border-radius: var(--radius-lg);
        padding: 16px 18px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .ae-tips-head {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--violet-700);
    }

    .ae-tips-head i {
        font-size: 16px;
    }

    .ae-tips ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .ae-tips li {
        font-size: 12px;
        color: var(--text-secondary);
        line-height: 1.4;
        display: flex;
        gap: 7px;
    }

    .ae-tips li::before {
        content: '';
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--violet-400);
        margin-top: 6px;
        flex-shrink: 0;
    }

    /* ---------- Responsive ---------- */

    @media (max-width: 1080px) {
        .addevt-layout {
            grid-template-columns: 1fr;
        }

        .ae-preview-sticky {
            position: static;
        }
    }

    @media (max-width: 640px) {
        .ae-form-grid {
            grid-template-columns: 1fr;
        }

        .ae-field.full {
            grid-column: auto;
        }

        .ae-form-footer {
            flex-direction: column;
            gap: 12px;
            align-items: stretch;
        }

        .ae-footer-btns {
            justify-content: stretch;
        }

        .ae-footer-btns .ae-btn {
            flex: 1;
            justify-content: center;
        }
    }

    .add-btn-container {
        display: flex;
        justify-content: flex-end;
        align-items: flex-start;
    }

    .image-title-section {
        display: flex;
        flex: 1;
        justify-content: space-between;
        flex-direction: row;
    }

    .cut-btn {
        border: none;
        height: 35px;
        width: 35px;
        font-size: 20px;
        border-radius: 8px;
        background-color: #FFE4E6;
        color: #9F1239;
    }
</style>

<div class="addevt-page">

    <!-- ===== Layout: form (left) + live preview (right) ===== -->
    <div class="addevt-layout">

        <!-- ============ FORM ============ -->
        <form class="ae-form-card" id="ae-event-form" method="POST" enctype="multipart/form-data">

            <!-- Section: Basic Info -->
            <div class="ae-section">
                <div class="ae-section-head">
                    <div class="ae-section-icon"><i class="ti ti-info-circle"></i></div>
                    <div>
                        <div class="ae-section-title">Basic Information</div>
                        <div class="ae-section-sub">What's the event called, and what should students know?</div>
                    </div>
                </div>

                <div class="ae-form-grid">

                    <div class="ae-field full">
                        <label class="ae-label" for="ae-title">Event Title <span class="ae-req">*</span></label>
                        <input class="ae-input" type="text" id="ae-title" name="title"
                            placeholder="e.g. Inter-Faculty Football Cup" maxlength="80" required>
                    </div>

                    <div class="ae-field full">
                        <label class="ae-label" for="ae-description">Description <span class="ae-req">*</span></label>
                        <textarea class="ae-textarea" id="ae-description" name="desc"
                            placeholder="Describe what the event is about, who it's for, and what students can expect..."
                            maxlength="600" required></textarea>
                        <div class="ae-char-count">0 / 600</div>
                    </div>

                    <div class="ae-field">
                        <label class="ae-label" for="ae-category">Category <span class="ae-req">*</span></label>
                        <select class="ae-select" id="ae-category" name="cat_id" required>
                            <option value="" disabled selected>Select a category</option>
                            <?php
                            $q = "SELECT * FROM category";
                            $categories_rs = Database::search($q);

                            while ($row = $categories_rs->fetch_assoc()) {
                                $id = $row["id"];
                                $name = $row["name"];

                                echo "<option value=\"$id\">$name</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="ae-field">
                        <label class="ae-label" for="ae-institute">Institute <span class="ae-req">*</span></label>
                        <select class="ae-select" id="ae-institute" name="ins_id" required>

                            <option value="" disabled selected>Select an institute</option>
                            <?php
                            $q = "SELECT * FROM institution";
                            $institutes_rs = Database::search($q);

                            while ($row = $institutes_rs->fetch_assoc()) {
                                $id = $row["id"];
                                $name = $row["name"];

                                echo "<option value=\"$id\">$name</option>";
                            }
                            ?>
                        </select>
                        <div class="ae-hint">The institute this event is organised under.</div>
                    </div>

                </div>
            </div>

            <!-- Section: Cover Image -->
            <div class="ae-section">
                <div class="ae-section-head">
                    <div class="ae-section-icon"><i class="ti ti-photo"></i></div>
                    <div class="image-title-section">
                        <div>
                            <div class="ae-section-title">Cover Image</div>
                            <div class="ae-section-sub">Shown on the event card and listing page.</div>
                        </div>
                        <button type="button" id="cut-button" class="cut-btn"><i class="ti ti-x"></i></button>
                    </div>
                </div>

                <label class="ae-upload">
                    <input type="file" id="ae-image" name="banner_img" accept="image/png, image/jpeg, image/webp">

                    <div class="ae-upload-icon"><i class="ti ti-cloud-upload"></i></div>

                    <div class="ae-upload-title" id="ae-image-name">
                        Click to upload, or drag an image here
                    </div>

                    <div class="ae-upload-sub">
                        PNG, JPG or WEBP · up to 5MB · <b>1200×600</b> recommended
                    </div>
                </label>
            </div>

            <!-- Section: Schedule -->
            <div class="ae-section">
                <div class="ae-section-head">
                    <div class="ae-section-icon"><i class="ti ti-calendar-time"></i></div>
                    <div>
                        <div class="ae-section-title">Date &amp; Time</div>
                        <div class="ae-section-sub">When is this event taking place?</div>
                    </div>
                </div>

                <div class="ae-form-grid">

                    <div class="ae-field full">
                        <label class="ae-label" for="ae-date">Event Date <span class="ae-req">*</span></label>
                        <div class="ae-input-icon-wrap">
                            <i class="ti ti-calendar"></i>
                            <input class="ae-input" type="date" id="ae-date" name="date" required>
                        </div>
                    </div>

                    <div class="ae-field">
                        <label class="ae-label" for="ae-start">Start Time <span class="ae-req">*</span></label>
                        <div class="ae-input-icon-wrap">
                            <i class="ti ti-clock"></i>
                            <input class="ae-input" type="time" id="ae-start" name="st_time" required>
                        </div>
                    </div>

                    <div class="ae-field">
                        <label class="ae-label" for="ae-end">End Time <span class="ae-req">*</span></label>
                        <div class="ae-input-icon-wrap">
                            <i class="ti ti-clock"></i>
                            <input class="ae-input" type="time" id="ae-end" name="end_time" required>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Section: Location & Capacity -->
            <div class="ae-section">
                <div class="ae-section-head">
                    <div class="ae-section-icon"><i class="ti ti-map-pin"></i></div>
                    <div>
                        <div class="ae-section-title">Location &amp; Capacity</div>
                        <div class="ae-section-sub">Where it's held, and how many can attend.</div>
                    </div>
                </div>

                <div class="ae-form-grid">

                    <div class="ae-field full">
                        <label class="ae-label" for="ae-location">Location <span class="ae-req">*</span></label>
                        <div class="ae-input-icon-wrap">
                            <i class="ti ti-map-pin"></i>
                            <input class="ae-input" type="text" id="ae-location" name="loc"
                                placeholder="e.g. Main Auditorium, Block C" required>
                        </div>
                    </div>

                    <div class="ae-field">
                        <label class="ae-label" for="ae-capacity">Capacity <span class="ae-req">*</span></label>
                        <div class="ae-capacity-wrap">
                            <button class="ae-cap-btn" type="button" id="ae-cap-minus" aria-label="Decrease capacity"><i
                                    class="ti ti-minus"></i></button>
                            <input type="number" id="ae-capacity" name="capacity" value="100" min="1" step="1" required>
                            <button class="ae-cap-btn" type="button" id="ae-cap-plus" aria-label="Increase capacity"><i
                                    class="ti ti-plus"></i></button>
                        </div>
                        <div class="ae-hint">Maximum number of students who can register.</div>
                    </div>

                </div>
            </div>

            <!-- Section: Status -->
            <div class="ae-section">
                <div class="ae-section-head">
                    <div class="ae-section-icon"><i class="ti ti-flag"></i></div>
                    <div>
                        <div class="ae-section-title">Status</div>
                        <div class="ae-section-sub">Controls where this event appears across the site.</div>
                    </div>
                </div>

                <div class="ae-status-group">
                    <div class="ae-status-pill">
                        <input type="radio" name="status" id="ae-status-upcoming" value=1 checked>
                        <label for="ae-status-upcoming">Upcoming</label>
                    </div>
                    <div class="ae-status-pill completed">
                        <input type="radio" name="status" id="ae-status-completed" value=2>
                        <label for="ae-status-completed">Completed</label>
                    </div>
                    <div class="ae-status-pill cancelled">
                        <input type="radio" name="status" id="ae-status-cancelled" value=3>
                        <label for="ae-status-cancelled">Cancelled</label>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="ae-form-footer">
                <div class="ae-footer-note"><i class="ti ti-bulb"></i> You can edit every detail later from the event's
                    page.</div>
                <div class="ae-footer-btns">
                    <button id="discardBtn" class="ae-btn ae-btn-ghost" type="reset">Discard</button>
                    <button class="ae-btn ae-btn-primary" type="submit"><i class="ti ti-check"></i> Publish
                        Event</button>
                </div>
            </div>

        </form>

        <div class="ae-preview-sticky">
            <div id="ae-error" style="color:red;margin:10px 0;"></div>
            <div class="add-btn-container">
                <button class="ae-btn ae-btn-primary" type="button"><i class="ti ti-check"></i>
                    Publish
                    Event</button>
            </div>
            <div>
                <div class="ae-preview-label">Card Preview</div>
            </div>

            <div class="ae-preview-card">
                <div class="ae-preview-banner" id="ae-preview-banner">
                    <span class="ae-preview-cat-tag" id="ae-preview-cat">Category</span>
                    <div class="ae-preview-date-chip">
                        <span class="ae-day" id="ae-preview-day">--</span>
                        <span class="ae-mon" id="ae-preview-mon">---</span>
                    </div>
                </div>
                <div class="ae-preview-body">
                    <div class="ae-preview-title placeholder" id="ae-preview-title">Untitled event</div>
                    <div class="ae-preview-meta-row"><i class="ti ti-clock"></i> <span id="ae-preview-time">Start
                            &ndash; End time</span></div>
                    <div class="ae-preview-meta-row"><i class="ti ti-map-pin"></i> <span
                            id="ae-preview-location">Location not set</span></div>
                    <div class="ae-preview-footer">
                        <span class="ae-preview-status">Upcoming</span>
                        <span class="ae-preview-cap"><b id="ae-preview-cap">100</b>&nbsp;capacity</span>
                    </div>
                </div>
            </div>

            <div class="ae-tips">
                <div class="ae-tips-head"><i class="ti ti-bulb"></i> Tips for a strong listing</div>
                <ul>
                    <li>Use a clear, specific title — "Inter-Faculty Football Cup" beats "Sports Event".</li>
                    <li>Landscape images (1200×600) crop best on both the listing and card view.</li>
                    <li>Mention any cost, dress code, or what to bring in the description.</li>
                </ul>
            </div>

        </div>

    </div>

</div>

<script>

    (function () {
        var hasImage = false;
        var titleInput = document.getElementById('ae-title');
        var descInput = document.getElementById('ae-description');
        var catSelect = document.getElementById('ae-category');
        var dateInput = document.getElementById('ae-date');
        var startInput = document.getElementById('ae-start');
        var endInput = document.getElementById('ae-end');
        var locationInput = document.getElementById('ae-location');
        var capacityInput = document.getElementById('ae-capacity');
        var imageInput = document.getElementById('ae-image');

        var prevTitle = document.getElementById('ae-preview-title');
        var prevCat = document.getElementById('ae-preview-cat');
        var prevDay = document.getElementById('ae-preview-day');
        var prevMon = document.getElementById('ae-preview-mon');
        var prevTime = document.getElementById('ae-preview-time');
        var prevLocation = document.getElementById('ae-preview-location');
        var prevCap = document.getElementById('ae-preview-cap');
        var prevBanner = document.getElementById('ae-preview-banner');

        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        var catColors = {
            academic: 'linear-gradient(135deg, var(--teal-500), var(--teal-700))',
            sports: 'linear-gradient(135deg, #F59E0B, #B45309)',
            culture: 'linear-gradient(135deg, var(--violet-500), var(--violet-700))',
            technology: 'linear-gradient(135deg, #2563EB, #1E3A8A)',
            social: 'linear-gradient(135deg, #EC4899, #9D174D)'
        };

        function formatTime(t) {
            if (!t) return null;
            var parts = t.split(':');
            var h = parseInt(parts[0], 10);
            var m = parts[1];
            var suffix = h >= 12 ? 'PM' : 'AM';
            var h12 = h % 12 === 0 ? 12 : h % 12;
            return h12 + ':' + m + ' ' + suffix;
        }

        function update() {
            prevTitle.textContent = titleInput.value.trim() || 'Untitled event';
            prevTitle.classList.toggle('placeholder', !titleInput.value.trim());

            var catVal = catSelect.value;

            if (catVal) {
                prevCat.textContent = catSelect.options[catSelect.selectedIndex].text;

                if (!hasImage) {
                    prevBanner.style.backgroundImage = '';
                    prevBanner.style.background = catColors[catVal] || catColors.academic;
                }
            } else {
                prevCat.textContent = 'Category';

                if (!hasImage) {
                    prevBanner.style.backgroundImage = '';
                    prevBanner.style.background = catColors.academic;
                }
            }

            if (dateInput.value) {
                var d = new Date(dateInput.value + 'T00:00:00');
                prevDay.textContent = String(d.getDate()).padStart(2, '0');
                prevMon.textContent = months[d.getMonth()];
            } else {
                prevDay.textContent = '--';
                prevMon.textContent = '---';
            }

            var startF = formatTime(startInput.value);
            var endF = formatTime(endInput.value);
            if (startF && endF) {
                prevTime.textContent = startF + ' \u2013 ' + endF;
            } else if (startF) {
                prevTime.textContent = startF + ' \u2013 End time';
            } else {
                prevTime.textContent = 'Start \u2013 End time';
            }

            prevLocation.textContent = locationInput.value.trim() || 'Location not set';
            prevCap.textContent = capacityInput.value || '0';
        }

        [titleInput, descInput, catSelect, dateInput, startInput, endInput, locationInput, capacityInput].forEach(function (el) {
            el.addEventListener('input', update);
            el.addEventListener('change', update);
        });

        update();

        /* Character counter for description */
        var charCount = document.querySelector('.ae-char-count');
        descInput.addEventListener('input', function () {
            charCount.textContent = descInput.value.length + ' / 600';
        });

        /* Capacity stepper buttons */
        document.getElementById('ae-cap-plus').addEventListener('click', function () {
            capacityInput.value = (parseInt(capacityInput.value || 0, 10) + 10);
            update();
        });
        document.getElementById('ae-cap-minus').addEventListener('click', function () {
            var next = parseInt(capacityInput.value || 0, 10) - 10;
            capacityInput.value = next < 1 ? 1 : next;
            update();
        });

        var fileNameLabel = document.getElementById('ae-image-name');

        imageInput.addEventListener('change', function () {
            var file = imageInput.files && imageInput.files[0];
            if (!file) return;

            fileNameLabel.textContent = file.name;

            var reader = new FileReader();
            reader.onload = function (e) {
                hasImage = true;
                prevBanner.style.backgroundImage = 'url(' + e.target.result + ')';
                prevBanner.style.backgroundSize = 'cover';
                prevBanner.style.backgroundPosition = 'center';
                prevBanner.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        });

        function clearImage() {
            console.log("event handler loaded");
            hasImage = false;

            imageInput.value = '';

            fileNameLabel.textContent = 'Click to upload, or drag an image here';

            prevBanner.style.backgroundImage = '';
            prevBanner.style.backgroundSize = '';
            prevBanner.style.backgroundPosition = '';

            prevBanner.classList.remove('has-image');

            update();
        }

        document.getElementById("ae-event-form").addEventListener("submit", function (e) {
            e.preventDefault();
            console.log("event handler loaded");
            var formData = new FormData(this);

            fetch("../process/eventCreate.php", {
                method: "POST",
                body: formData
            })
                .then(res => res.text())
                .then(data => {

                    if (data.trim() === "success") {
                        window.location.href = "?page=events";
                    } else {
                        document.getElementById("ae-error").textContent = data;
                    }

                })
                .catch(err => {
                    document.getElementById("ae-error").textContent = "Something went wrong!";
                });
        });

        document.getElementById('cut-button').addEventListener('click', clearImage);
        document.getElementById('discardBtn').addEventListener('click', clearImage);
    })();
</script>