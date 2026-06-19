<style>
    .ann-page {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .ann-headrow {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
        background-color: white;
        padding: 10px 15px;
        border-radius: 10px;
    }

    .ann-heading h1 {
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        color: var(--text-primary);
        margin-bottom: 4px;
    }

    .ann-heading p {
        font-size: var(--text-sm);
        color: var(--text-secondary);
    }

    .am-btn {
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

    .am-btn i {
        font-size: 16px;
    }

    .am-btn-ghost {
        background: var(--bg-white);
        border-color: var(--neutral-200);
        color: var(--text-secondary);
    }

    .am-btn-ghost:hover {
        background: var(--bg-soft);
    }

    .am-btn-primary {
        background: var(--primary);
        color: var(--text-white);
    }

    .am-btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    /* ---------- Announcement grid ---------- */

    .ann-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .ann-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 18px 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        transition: box-shadow var(--transition), transform var(--transition);
    }

    .ann-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .ann-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ann-icon {
        width: 38px;
        height: 38px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        color: var(--teal-600);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ann-icon i {
        font-size: 18px;
    }

    .ann-title {
        font-size: var(--text-base);
        font-weight: 600;
        color: var(--text-primary);
        line-height: 1.35;
    }

    .ann-desc {
        font-size: 12.5px;
        color: var(--text-secondary);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .ann-tags {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: var(--radius-full);
    }

    .pill i {
        font-size: 12px;
    }

    .pill-cat {
        background: var(--teal-50);
        color: var(--teal-700);
    }

    .pill-inst {
        background: var(--violet-50);
        color: var(--violet-700);
    }

    .ann-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 10px;
        border-top: 1px solid var(--neutral-100);
        margin-top: auto;
    }

    .ann-meta {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--text-muted);
    }

    .ann-meta i {
        font-size: 14px;
    }

    .ann-actions {
        display: flex;
        gap: 6px;
    }

    .icon-btn {
        width: 30px;
        height: 30px;
        border-radius: var(--radius-md);
        border: 1px solid var(--neutral-200);
        background: var(--bg-white);
        color: var(--text-muted);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--transition);
        text-decoration: none;
    }

    .icon-btn i {
        font-size: 15px;
    }

    .icon-btn:hover {
        background: var(--primary-light);
        color: var(--primary-dark);
        border-color: var(--primary-light);
    }

    .icon-btn.danger:hover {
        background: #FEF2F2;
        color: #991B1B;
        border-color: #FECACA;
    }

    .am-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 24px;
        z-index: 1000;
        opacity: 0;
        transition: opacity var(--transition);
    }

    .am-overlay.show {
        display: flex;
        opacity: 1;
    }

    .am-modal {
        background: var(--bg-white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        width: 100%;
        max-width: 800px;
        max-height: 88vh;
        display: flex;
        flex-direction: column;
        transform: translateY(10px) scale(0.98);
        transition: transform var(--transition);
        overflow: hidden;
    }

    .am-overlay.show .am-modal {
        transform: translateY(0) scale(1);
    }

    .am-modal-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px;
        border-bottom: 1px solid var(--neutral-100);
        flex-shrink: 0;
    }

    .am-modal-head-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .am-modal-icon {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        color: var(--teal-600);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .am-modal-icon i {
        font-size: 18px;
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

    .am-modal-sub {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 1px;
    }

    .am-modal-close {
        width: 32px;
        height: 32px;
        border-radius: var(--radius-md);
        border: none;
        background: var(--bg-soft);
        color: var(--text-muted);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--transition);
        flex-shrink: 0;
    }

    .am-modal-close:hover {
        background: var(--neutral-200);
        color: var(--text-primary);
    }

    .am-modal-close i {
        font-size: 18px;
    }

    .am-modal-body {
        padding: 22px 24px;
        overflow-y: auto;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .am-modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 24px;
        border-top: 1px solid var(--neutral-100);
        flex-shrink: 0;
    }

    /* ---------- View modal content ---------- */

    .am-view-tags {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .am-view-block {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .am-view-label {
        font-size: 11px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .am-view-text {
        font-size: 13.5px;
        color: var(--text-secondary);
        line-height: 1.6;
        white-space: pre-wrap;
    }

    .am-view-title {
        font-size: var(--text-lg);
        font-weight: 600;
        color: var(--text-primary);
        line-height: 1.35;
    }

    .am-view-meta-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        color: var(--text-muted);
    }

    .am-view-meta-row i {
        font-size: 15px;
        color: var(--text-muted);
    }

    .am-view-divider {
        height: 1px;
        background: var(--neutral-100);
    }

    /* ---------- Edit modal: form fields ---------- */

    .am-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .am-field-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .am-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--text-primary);
    }

    .am-input,
    .am-textarea,
    .am-select {
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

    .am-input:focus,
    .am-textarea:focus,
    .am-select:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--bg-white);
        box-shadow: 0 0 0 3px var(--teal-50);
    }

    .am-textarea {
        resize: vertical;
        min-height: 100px;
        line-height: 1.5;
    }

    .am-select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%2364748B' stroke-width='1.6' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 13px center;
        padding-right: 34px;
    }

    /* ---------- Responsive ---------- */

    @media (max-width: 1080px) {
        .ann-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 680px) {
        .ann-grid {
            grid-template-columns: 1fr;
        }

        .am-field-row {
            grid-template-columns: 1fr;
        }

        .am-modal {
            max-width: 100%;
        }
    }

    .ann-search {
        position: relative;
        width: 50%;
    }

    .ann-search input {
        width: 100%;
        padding: 10px 14px 10px 38px;
        border: 1.5px solid var(--neutral-200);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-family: var(--font-body);
        color: var(--text-primary);
        background: var(--bg-soft);
        transition: border-color var(--transition), background var(--transition), box-shadow var(--transition);
    }

    .ann-search input::placeholder {
        color: var(--text-muted);
    }

    .ann-search input:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--bg-white);
        box-shadow: 0 0 0 3px var(--teal-50);
    }

    .ann-search i.ann-search-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 17px;
        color: var(--text-muted);
        pointer-events: none;
    }

    .ann-search-clear {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        width: 22px;
        height: 22px;
        border-radius: 50%;
        border: none;
        background: var(--neutral-200);
        color: var(--text-secondary);
        display: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 13px;
        padding: 0;
    }

    .ann-search input:not(:placeholder-shown)~.ann-search-clear {
        display: flex;
    }
</style>

<div class="ann-page">

    <div class="ann-headrow">
        <div class="ann-search">
            <i class="ti ti-search ann-search-icon"></i>
            <input type="text" id="annSearchInput" placeholder="Search announcements by title or description..."
                autocomplete="off">
            <button class="ann-search-clear" type="button" id="annSearchClear" aria-label="Clear search"><i
                    class="ti ti-x"></i></button>
        </div>
        <button class="am-btn am-btn-primary" type="button" onclick="location.href='?page=add-announcement'">
            <i class="ti ti-plus"></i> New Announcement
        </button>
    </div>

    <div class="ann-grid" id="annGrid">
        <?php
        $q = "
                SELECT 
                    a.*,
                    i.name AS institution_name,
                    c.name AS category_name
                FROM announcements a
                JOIN institution i ON a.institution_id = i.id
                JOIN category c ON a.category_id = c.id
                ORDER BY a.date DESC
            ";

        $events_rs = Database::search($q);

        while ($row = $events_rs->fetch_assoc()) {

            $id = $row["id"];
            $title = $row["title"];
            $description = $row["description"];
            $date = $row["date"];
            $institution = $row["institution_name"];
            $category = $row["category_name"];
            $institution_id = $row["institution_id"];
            $category_id = $row["category_id"];
            ?>

            <div class="ann-card">
                <div class="ann-top">
                    <div class="ann-icon">
                        <i class="ti ti-speakerphone" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="ann-title"><?= htmlspecialchars($title) ?></div>
                <div class="ann-desc"><?= htmlspecialchars($description) ?></div>

                <div class="ann-tags">
                    <span class="pill pill-cat"><i class="ti ti-tag"
                            aria-hidden="true"></i><?= htmlspecialchars($category) ?></span>
                    <span class="pill pill-inst"><i class="ti ti-building"
                            aria-hidden="true"></i><?= htmlspecialchars($institution) ?></span>
                </div>

                <div class="ann-footer">
                    <div class="ann-meta">
                        <i class="ti ti-calendar" aria-hidden="true"></i><?= htmlspecialchars($date) ?>
                    </div>
                    <div class="ann-actions">
                        <button type="button" class="icon-btn edit" title="Edit" onclick="openEditModal(this)"
                            data-id="<?= (int) $id ?>" data-title="<?= htmlspecialchars($title, ENT_QUOTES) ?>"
                            data-description="<?= htmlspecialchars($description, ENT_QUOTES) ?>"
                            data-date="<?= htmlspecialchars($date, ENT_QUOTES) ?>"
                            data-category-id="<?= (int) $category_id ?>" data-institution-id="<?= (int) $institution_id ?>">
                            <i class="ti ti-edit" aria-hidden="true"></i>
                        </button>
                        <button class="icon-btn danger" title="Delete" onclick="deleteEvent(<?= (int) $id ?>)">
                            <i class="ti ti-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>

    </div>

</div>
<div class="am-overlay" id="amEditOverlay" onclick="closeOnBackdrop(event, 'amEditOverlay')">
    <div class="am-modal" role="dialog" aria-modal="true" aria-labelledby="amEditModalTitle">
        <div class="am-modal-head">
            <div class="am-modal-head-left">
                <div class="am-modal-icon edit-icon"><i class="ti ti-edit"></i></div>
                <div>
                    <div class="am-modal-title" id="amEditModalTitle">Edit Announcement</div>
                    <div class="am-modal-sub">Changes only save once you confirm below.</div>
                </div>
            </div>
            <button class="am-modal-close" type="button" onclick="closeModal('amEditOverlay')" aria-label="Close">
                <i class="ti ti-x"></i>
            </button>
        </div>

        <form class="am-modal-body" id="amEditForm" onsubmit="return handleUpdateSubmit(event)">
            <input type="hidden" id="amEditId" name="id">

            <div class="am-field">
                <label class="am-label" for="amEditTitle">Title</label>
                <input class="am-input" type="text" id="amEditTitle" name="title" maxlength="120" required>
            </div>

            <div class="am-field">
                <label class="am-label" for="amEditDescription">Description</label>
                <textarea class="am-textarea" id="amEditDescription" name="description" maxlength="600"
                    required></textarea>
            </div>

            <div class="am-field-row">
                <div class="am-field">
                    <label class="am-label" for="amEditCategory">Category</label>
                    <select class="am-select" id="amEditCategory" name="category_id" required>
                        <?php
                        $q = "SELECT * FROM category";
                        $categories_rs = Database::search($q);
                        while ($row = $categories_rs->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="am-field">
                    <label class="am-label" for="amEditInstitution">Institution</label>
                    <select class="am-select" id="amEditInstitution" name="institution_id" required>
                        <?php
                        $q = "SELECT * FROM institution";
                        $institutes_rs = Database::search($q);
                        while ($row = $institutes_rs->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>

        <div class="am-modal-footer">
            <button class="am-btn am-btn-ghost" type="button" onclick="closeModal('amEditOverlay')">Cancel</button>
            <button class="am-btn am-btn-primary" type="submit" form="amEditForm"><i class="ti ti-check"></i>
                Update</button>
        </div>
    </div>
</div>

<script>


    function openModal(overlayId) {
        var overlay = document.getElementById(overlayId);
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(overlayId) {
        var overlay = document.getElementById(overlayId);
        overlay.classList.remove('show');
        document.body.style.overflow = '';
    }

    function closeOnBackdrop(evt, overlayId) {
        if (evt.target.id === overlayId) {
            closeModal(overlayId);
        }
    }

    document.addEventListener('keydown', function (evt) {
        if (evt.key === 'Escape') {
            closeModal('amEditOverlay');
        }
    });

    function openEditModal(btn) {
        var d = btn.dataset;

        document.getElementById('amEditId').value = d.id;
        document.getElementById('amEditTitle').value = d.title;
        document.getElementById('amEditDescription').value = d.description;

        if (d.categoryId) {
            document.getElementById('amEditCategory').value = d.categoryId;
        }
        if (d.institutionId) {
            document.getElementById('amEditInstitution').value = d.institutionId;
        }

        openModal('amEditOverlay');
    }

    function handleUpdateSubmit(evt) {
        evt.preventDefault();

        var formData = new FormData(document.getElementById('amEditForm'));

        fetch('../process/announcementUpdate.php', {
            method: 'POST',
            body: formData
        })
            .then(res => res.text())
            .then(res => {
                if (res.trim() === 'success') {
                    closeModal('amEditOverlay');
                    location.reload();
                } else {
                    alert('Update failed: ' + res);
                }
            })
            .catch(err => {
                console.error(err);
                alert('Something went wrong while updating');
            });

        return false;
    }


    function deleteEvent(id) {
        console.log('deleting');

        if (!confirm("Delete this announcement?")) return;

        fetch(`../process/announcementDelete.php?id=${id}`)
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

</script>