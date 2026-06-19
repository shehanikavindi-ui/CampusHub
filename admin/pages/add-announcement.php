<style>
    /* ── Top bar ── */
    .top-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--neutral-500);
        font-size: 13.5px;
        text-decoration: none;
        border: 1px solid var(--neutral-200);
        background: white;
        border-radius: var(--radius-md);
        padding: 0 14px;
        height: 36px;
        transition: all var(--transition);
        font-family: var(--font-body);
    }

    .back-btn:hover {
        background: var(--neutral-50);
        color: var(--neutral-700);
    }

    .back-btn i {
        font-size: 15px;
    }

    /* ── Two-column layout ── */
    .add-ann-layout {
        display: grid;
        grid-template-columns: 1fr 260px;
        gap: 16px;
        align-items: start;
    }

    @media (max-width: 900px) {
        .add-ann-layout {
            grid-template-columns: 1fr;
        }
    }

    /* ── Card ── */
    .form-card {
        background: white;
        border-radius: var(--radius-lg);
        border: 1px solid var(--neutral-200);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .form-card-header {
        padding: 18px 22px;
        border-bottom: 2px solid var(--neutral-100);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-card-icon {
        width: 32px;
        height: 32px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .form-card-icon i {
        font-size: 17px;
        color: var(--teal-600);
    }

    .form-card-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--neutral-800);
    }

    .form-card-sub {
        font-size: 12px;
        color: var(--neutral-400);
        margin-top: 1px;
    }

    .form-card-body {
        padding: 22px;
    }

    /* ── Field ── */
    .field {
        display: flex;
        flex-direction: column;
        gap: 5px;
        margin-bottom: 18px;
    }

    .field:last-child {
        margin-bottom: 0;
    }

    .field label {
        font-size: 12.5px;
        font-weight: 500;
        color: var(--neutral-600);
    }

    .field label .req {
        color: #EF4444;
        margin-left: 2px;
    }

    .field input,
    .field select,
    .field textarea {
        height: 38px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        padding: 0 12px;
        font-size: 13.5px;
        color: var(--neutral-800);
        background: white;
        outline: none;
        font-family: var(--font-body);
        transition: border-color var(--transition), box-shadow var(--transition);
        width: 100%;
    }

    .field textarea {
        height: 140px;
        padding: 10px 12px;
        resize: vertical;
        line-height: 1.5;
    }

    .field input:focus,
    .field select:focus,
    .field textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
    }

    .field input::placeholder,
    .field textarea::placeholder {
        color: var(--neutral-400);
    }

    .field select {
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394A3B8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        padding-right: 32px;
        cursor: pointer;
    }

    .field.has-error input,
    .field.has-error select,
    .field.has-error textarea {
        border-color: #EF4444;
    }

    .field .err-text {
        font-size: 11.5px;
        color: #EF4444;
    }

    /* ── Char counter ── */
    .char-count {
        font-size: 11.5px;
        color: var(--neutral-400);
        text-align: right;
    }

    .char-count.warn {
        color: #D97706;
    }

    .char-count.over {
        color: #EF4444;
    }

    /* ── Two column row ── */
    .two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    @media (max-width: 560px) {
        .two-col {
            grid-template-columns: 1fr;
        }
    }

    /* ── Form actions ── */
    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        padding: 0px 22px 16px 0px;
        /* border-top: 2px solid var(--neutral-200); */
    }

    .btn-ghost {
        height: 38px;
        padding: 0 18px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        background: white;
        font-size: 13.5px;
        color: var(--neutral-600);
        cursor: pointer;
        font-family: var(--font-body);
        transition: all var(--transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-ghost:hover {
        background: var(--neutral-50);
        color: var(--neutral-800);
    }

    .btn-submit {
        height: 38px;
        padding: 0 20px;
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

    .btn-submit:hover {
        background: var(--primary-hover);
    }

    .btn-submit i {
        font-size: 16px;
    }

    /* ── Side cards ── */
    .side-card {
        background: white;
        border-radius: var(--radius-lg);
        border: 1px solid var(--neutral-200);
        padding: 18px;
        box-shadow: var(--shadow-sm);
    }

    .side-card+.side-card {
        margin-top: 12px;
    }

    .side-title {
        font-size: 13px;
        font-weight: 600;
        color: var(--neutral-800);
        margin-bottom: 14px;
    }

    /* ── Preview card ── */
    .preview-icon {
        width: 44px;
        height: 44px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }

    .preview-icon i {
        font-size: 22px;
        color: var(--teal-600);
    }

    .preview-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--neutral-800);
        line-height: 1.35;
        margin-bottom: 6px;
        word-break: break-word;
    }

    .preview-desc {
        font-size: 12.5px;
        color: var(--neutral-500);
        line-height: 1.5;
        margin-bottom: 12px;
        word-break: break-word;
    }

    .preview-tags {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .pill {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        padding: 3px 9px;
        border-radius: var(--radius-full);
        font-weight: 500;
    }

    .pill-cat {
        background: var(--secondary-light);
        color: var(--secondary-dark);
    }

    .pill-inst {
        background: var(--neutral-100);
        color: var(--neutral-600);
    }

    /* ── Tips ── */
    .tip-item {
        display: flex;
        gap: 9px;
        align-items: flex-start;
        font-size: 12.5px;
        color: var(--neutral-500);
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .tip-item:last-child {
        margin-bottom: 0;
    }

    .tip-item i {
        font-size: 15px;
        color: var(--primary);
        margin-top: 1px;
        flex-shrink: 0;
    }

    /* ── Success banner ── */
    .success-banner {
        background: var(--teal-50);
        border: 1px solid var(--teal-200);
        border-radius: var(--radius-md);
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
        color: var(--teal-700);
        font-size: 13.5px;
        font-weight: 500;
    }

    .success-banner i {
        font-size: 18px;
    }
</style>

<div id="add-announcement-page">

    <!-- Back button -->
    <div class="top-bar">
        <a class="back-btn" href="?page=announcements">
            <i class="ti ti-arrow-left" aria-hidden="true"></i> Back to announcements
        </a>
    </div>

    <form id="announcementForm" method="POST">

        <div class="add-ann-layout">

            <!-- ── Left: Main Form ── -->
            <div>
                <div class="form-card">

                    <div class="form-card-header">
                        <div class="form-card-icon">
                            <i class="ti ti-speakerphone" aria-hidden="true"></i>
                        </div>
                        <div>
                            <div class="form-card-title">Announcement details</div>
                            <div class="form-card-sub">Write a clear, concise update for students</div>
                        </div>
                    </div>

                    <div class="form-card-body">

                        <div class="field <?= isset($errors['title']) ? 'has-error' : '' ?>">
                            <label>Title <span class="req">*</span></label>
                            <input required type="text" name="title" id="titleInput"
                                placeholder="e.g. Mid-semester exam schedule released" maxlength="120"
                                value="<?= htmlspecialchars($title ?? '') ?>" oninput="updatePreview()">
                            <?php if (isset($errors['title'])): ?>
                                <span class="err-text">
                                    <?= $errors['title'] ?>
                                </span>
                            <?php else: ?>
                                <div class="char-count" id="titleCount">0 / 120</div>
                            <?php endif; ?>
                        </div>

                        <div class="field <?= isset($errors['description']) ? 'has-error' : '' ?>">
                            <label>Description <span class="req">*</span></label>
                            <textarea required name="description" id="descInput"
                                placeholder="Write the full announcement details here..." maxlength="600"
                                oninput="updatePreview()"><?= htmlspecialchars($description ?? '') ?></textarea>
                            <?php if (isset($errors['description'])): ?>
                                <span class="err-text">
                                    <?= $errors['description'] ?>
                                </span>
                            <?php else: ?>
                                <div class="char-count" id="descCount">0 / 600</div>
                            <?php endif; ?>
                        </div>

                        <div class="two-col">

                            <div class="field <?= isset($errors['category_id']) ? 'has-error' : '' ?>">
                                <label>Category <span class="req">*</span></label>
                                <select required name="category_id" id="catSelect" onchange="updatePreview()">
                                    <option value="">Select category</option>
                                    <?php
                                    $q = "SELECT * FROM category";
                                    $categories_rs = Database::search($q);
                                    while ($row = $categories_rs->fetch_assoc()) {
                                        $sel = (isset($category_id) && $category_id == $row['id']) ? 'selected' : '';
                                        echo "<option value=\"{$row['id']}\" data-name=\"{$row['name']}\" $sel>{$row['name']}</option>";
                                    }
                                    ?>
                                </select>
                                <?php if (isset($errors['category_id'])): ?>
                                    <span class="err-text">
                                        <?= $errors['category_id'] ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="field <?= isset($errors['institute_id']) ? 'has-error' : '' ?>">
                                <label>Institution <span class="req">*</span></label>
                                <select required name="institute_id" id="instSelect" onchange="updatePreview()">
                                    <option value="">Select institution</option>
                                    <?php
                                    $q = "SELECT * FROM institution";
                                    $institutes_rs = Database::search($q);
                                    while ($row = $institutes_rs->fetch_assoc()) {
                                        $sel = (isset($institute_id) && $institute_id == $row['id']) ? 'selected' : '';
                                        echo "<option value=\"{$row['id']}\" data-name=\"{$row['name']}\" $sel>{$row['name']}</option>";
                                    }
                                    ?>
                                </select>
                                <?php if (isset($errors['institute_id'])): ?>
                                    <span class="err-text">
                                        <?= $errors['institute_id'] ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div><!-- /card-body -->

                    <div class="form-actions">
                        <a class="btn-ghost" href="?page=announcements">Cancel</a>
                        <button class="btn-submit" type="submit">
                            <i class="ti ti-check" aria-hidden="true"></i> Publish announcement
                        </button>
                    </div>

                </div><!-- /form-card -->
            </div>

            <!-- ── Right: Sidebar ── -->
            <div>

                <!-- Live preview -->
                <div class="side-card">
                    <div class="side-title">Live preview</div>
                    <div class="preview-icon"><i class="ti ti-speakerphone" aria-hidden="true"></i></div>
                    <div class="preview-title" id="prevTitle">Untitled announcement</div>
                    <div class="preview-desc" id="prevDesc">Your description will appear here as you type.</div>
                    <div class="preview-tags" id="prevTags"></div>
                </div>

                <!-- Tips -->
                <div class="side-card">
                    <div class="side-title">Tips</div>
                    <div class="tip-item">
                        <i class="ti ti-bulb" aria-hidden="true"></i>
                        Keep titles under 80 characters so they don't get cut off in card view.
                    </div>
                    <div class="tip-item">
                        <i class="ti ti-target-arrow" aria-hidden="true"></i>
                        Choosing the right institution makes sure only relevant students see it.
                    </div>
                    <div class="tip-item">
                        <i class="ti ti-alert-triangle" aria-hidden="true"></i>
                        Use "Urgent" sparingly — it triggers a highlighted badge.
                    </div>
                </div>

            </div><!-- /sidebar -->

        </div><!-- /layout -->

    </form>

</div><!-- /#add-announcement-page -->

<script>
    document.getElementById("announcementForm").addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        const res = await fetch("../process/announcementCreate.php", {
            method: "POST",
            body: formData
        });

        const text = await res.text();

        if (text.trim() === "success") {
            window.location.href = "?page=announcements";
        } else {
            alert("Failed to publish announcement");
        }
    });

    function updatePreview() {
        const titleEl = document.getElementById('titleInput');
        const descEl = document.getElementById('descInput');
        const catEl = document.getElementById('catSelect');
        const instEl = document.getElementById('instSelect');

        const title = titleEl.value.trim();
        const desc = descEl.value.trim();

        document.getElementById('prevTitle').textContent = title || 'Untitled announcement';
        document.getElementById('prevDesc').textContent = desc || 'Your description will appear here as you type.';

        const titleCountEl = document.getElementById('titleCount');
        if (titleCountEl) titleCountEl.textContent = `${titleEl.value.length} / 120`;

        const descCountEl = document.getElementById('descCount');
        if (descCountEl) {
            const len = descEl.value.length;
            descCountEl.textContent = `${len} / 600`;
            descCountEl.classList.toggle('warn', len > 500 && len <= 600);
            descCountEl.classList.toggle('over', len > 600);
        }

        const catName = catEl.options[catEl.selectedIndex]?.dataset.name || '';
        const instName = instEl.options[instEl.selectedIndex]?.dataset.name || '';

        let tags = '';
        if (catName) tags += `<span class="pill pill-cat"><i class="ti ti-tag" aria-hidden="true"></i>${catName}</span>`;
        if (instName) tags += `<span class="pill pill-inst"><i class="ti ti-building" aria-hidden="true"></i>${instName}</span>`;
        document.getElementById('prevTags').innerHTML = tags;
    }

    document.addEventListener('DOMContentLoaded', updatePreview);
</script>