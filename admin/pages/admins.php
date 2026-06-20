<style>
    .holder {
        margin-top: -20px;
        display: flex;
        gap: 10px;
        justify-content: space-between;
    }

    .subHolder {
        display: flex;
        flex: 1;
        flex-direction: column;

    }

    /* ── Section label ── */
    .section-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--neutral-400);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
    }

    .section-label.with-margin-top {
        margin-top: 28px;
    }

    /* ── Toolbar ── */
    .toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
        gap: 12px;
        flex-wrap: wrap;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: white;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        padding: 0 12px;
        height: 38px;
        min-width: 260px;
        transition: border-color var(--transition);
    }

    .search-box:focus-within {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
    }

    .search-box i {
        font-size: 16px;
        color: var(--neutral-400);
        flex-shrink: 0;
    }

    .search-box input {
        border: none;
        outline: none;
        font-size: 13.5px;
        color: var(--neutral-800);
        width: 100%;
        background: transparent;
        font-family: var(--font-body);
    }

    .search-box input::placeholder {
        color: var(--neutral-400);
    }

    /* ── Table card ── */
    .table-card {
        background: white;
        border-radius: var(--radius-lg);
        border: 1px solid var(--neutral-200);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        margin-bottom: 28px;
    }

    .table-wrap {
        overflow-x: auto;
    }

    .admins-table {
        width: 100%;
        border-collapse: collapse;
    }

    .admins-table thead tr {
        border-bottom: 1px solid var(--neutral-100);
        background: var(--neutral-50);
    }

    .admins-table th {
        font-size: 11.5px;
        font-weight: 500;
        color: var(--neutral-400);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 16px;
        text-align: left;
        white-space: nowrap;
    }

    .admins-table td {
        padding: 13px 16px;
        font-size: 13.5px;
        color: var(--neutral-600);
        border-bottom: 1px solid var(--neutral-100);
        vertical-align: middle;
    }

    .admins-table tr:last-child td {
        border-bottom: none;
    }

    .admins-table tbody tr:hover td {
        background: var(--neutral-50);
    }

    /* ── Avatar cell ── */
    .av-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .av {
        width: 34px;
        height: 34px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .av-teal {
        background: var(--teal-100);
        color: var(--teal-700);
    }

    .av-violet {
        background: #EDE9FE;
        color: #6D28D9;
    }

    .av-amber {
        background: #FEF3C7;
        color: #92400E;
    }

    .av-blue {
        background: #DBEAFE;
        color: #1E40AF;
    }

    .av-rose {
        background: #FFE4E6;
        color: #9F1239;
    }

    .admin-name {
        font-weight: 500;
        color: var(--neutral-800);
        font-size: 13.5px;
    }

    /* ── Institution pill ── */
    .pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        padding: 3px 9px;
        border-radius: var(--radius-full);
        font-weight: 500;
        background: var(--neutral-100);
        color: var(--neutral-600);
    }

    .pill i {
        font-size: 12px;
    }

    /* ── Delete button ── */
    .icon-btn {
        width: 30px;
        height: 30px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--neutral-200);
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--transition);
    }

    .icon-btn:hover {
        background: #FEF2F2;
        border-color: #FECACA;
    }

    .icon-btn i {
        font-size: 15px;
        color: #EF4444;
    }

    /* ── Empty state ── */
    .empty-row td {
        text-align: center;
        padding: 40px 16px;
        color: var(--neutral-400);
        font-size: 13.5px;
    }

    /* ── Add admin form ── */
    .form-card {
        background: white;
        border-radius: var(--radius-lg);
        border: 1px solid var(--neutral-200);
        box-shadow: var(--shadow-sm);
        max-width: 480px;
        overflow: hidden;
    }

    .form-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid var(--neutral-100);
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
        padding: 20px;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 5px;
        margin-bottom: 16px;
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
    .field select {
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

    .field input:focus,
    .field select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
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
    .field.has-error select {
        border-color: #EF4444;
    }

    .field .err-text {
        font-size: 11.5px;
        color: #EF4444;
    }

    .field .hint {
        font-size: 11.5px;
        color: var(--neutral-400);
    }

    /* Inputs with leading icon */
    .icon-field {
        position: relative;
    }

    .icon-field i.field-icon {
        position: absolute;
        left: 11px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 15px;
        color: var(--neutral-400);
        pointer-events: none;
    }

    .icon-field input {
        padding-left: 33px;
    }

    /* Password show/hide toggle */
    .pw-toggle {
        position: absolute;
        right: 11px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: var(--neutral-400);
        display: flex;
        padding: 0;
    }

    .pw-toggle i {
        font-size: 16px;
    }

    .icon-field input[type="password"],
    .icon-field input[type="text"]#adminPassword {
        padding-right: 36px;
    }

    /* ── Form actions ── */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 20px;
        border-top: 1px solid var(--neutral-100);
        background: var(--neutral-50);
    }

    .btn-ghost {
        height: 38px;
        padding: 0 16px;
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
        background: var(--neutral-100);
    }

    .btn-submit {
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

    .btn-submit:hover {
        background: var(--primary-hover);
    }

    .btn-submit i {
        font-size: 16px;
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

<div class="holder" id="admins-page">


    <div style="flex: 2;margin-top: 20px;" class="subHolder">
        <div class="toolbar">
            <div class="search-box">
                <i class="ti ti-search" aria-hidden="true"></i>
                <input type="text" id="adminSearch" placeholder="Search admins..." oninput="filterAdmins()">
            </div>
        </div>

        <div class="table-card">
            <div class="table-wrap">
                <table class="admins-table">
                    <thead>
                        <tr>
                            <th>Admin</th>
                            <th>Email</th>
                            <th>Institution</th>
                            <th style="width:70px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="adminsTableBody">
                        <?php

                        $admins = [];

                        $q = "
                                SELECT 
                                    a.id,
                                    a.name,
                                    a.email,
                                    i.name AS institution_name
                                FROM admin a
                                JOIN institution i ON a.institution_id = i.id
                            ";

                        $admins_rs = Database::search($q);

                        while ($row = $admins_rs->fetch_assoc()) {
                            $admins[] = [
                                'id' => $row['id'],
                                'name' => $row['name'],
                                'email' => $row['email'],
                                'institution_name' => $row['institution_name']
                            ];
                        }
                        $avatarColors = ['av-teal', 'av-violet', 'av-amber', 'av-blue', 'av-rose'];

                        function admin_initials($name)
                        {
                            $parts = explode(' ', trim($name));
                            $first = $parts[0][0] ?? '';
                            $last = $parts[count($parts) - 1][0] ?? '';
                            return strtoupper($first . $last);
                        }

                        if (empty($admins)):
                            ?>
                            <tr class="empty-row">
                                <td colspan="4">No admins found.</td>
                            </tr>
                            <?php
                        else:
                            foreach ($admins as $i => $admin):
                                $colorClass = $avatarColors[$i % count($avatarColors)];
                                $initials = admin_initials($admin['name']);
                                ?>
                                <tr data-name="<?= htmlspecialchars(strtolower($admin['name'])) ?>"
                                    data-email="<?= htmlspecialchars(strtolower($admin['email'])) ?>">
                                    <td>
                                        <div class="av-cell">
                                            <div class="av <?= $colorClass ?>">
                                                <?= $initials ?>
                                            </div>
                                            <div class="admin-name">
                                                <?= htmlspecialchars($admin['name']) ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="color:var(--neutral-500);">
                                        <?= htmlspecialchars($admin['email']) ?>
                                    </td>
                                    <td>
                                        <span class="pill">
                                            <i class="ti ti-building" aria-hidden="true"></i>
                                            <?= htmlspecialchars($admin['institution_name']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="icon-btn" title="Delete" onclick="deleteAdmin(<?= $admin['id'] ?>)">
                                            <i class="ti ti-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="subHolder">
        <div class="section-label with-margin-top">Add a new admin</div>

        <form id="adminForm" onsubmit="createAdmin(event)">
            <div class="form-card">

                <div class="form-card-header">
                    <div class="form-card-icon">
                        <i class="ti ti-user-shield" aria-hidden="true"></i>
                    </div>
                    <div>
                        <div class="form-card-title">New admin account</div>
                        <div class="form-card-sub">Grant dashboard access to a staff member</div>
                    </div>
                </div>

                <div class="form-card-body">

                    <div class="field <?= isset($errors['name']) ? 'has-error' : '' ?>">
                        <label>Full name <span class="req">*</span></label>
                        <div class="icon-field">
                            <i class="ti ti-user field-icon" aria-hidden="true"></i>
                            <input required type="text" name="name" placeholder="e.g. Sanduni Perera"
                                value="<?= htmlspecialchars($name ?? '') ?>">
                        </div>
                        <?php if (isset($errors['name'])): ?>
                            <span class="err-text">
                                <?= $errors['name'] ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="field <?= isset($errors['email']) ? 'has-error' : '' ?>">
                        <label>Email address <span class="req">*</span></label>
                        <div class="icon-field">
                            <i class="ti ti-mail field-icon" aria-hidden="true"></i>
                            <input required type="email" name="email" placeholder="admin@campushub.ac"
                                value="<?= htmlspecialchars($email ?? '') ?>">
                        </div>
                        <?php if (isset($errors['email'])): ?>
                            <span class="err-text">
                                <?= $errors['email'] ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="field <?= isset($errors['password']) ? 'has-error' : '' ?>">
                        <label>Password <span class="req">*</span></label>
                        <div class="icon-field">
                            <i class="ti ti-lock field-icon" aria-hidden="true"></i>
                            <input required type="password" name="password" id="adminPassword"
                                placeholder="Enter a secure password">
                            <button type="button" class="pw-toggle" onclick="toggleAdminPw()"
                                aria-label="Show password">
                                <i class="ti ti-eye" id="adminPwIcon" aria-hidden="true"></i>
                            </button>
                        </div>
                        <?php if (isset($errors['password'])): ?>
                            <span class="err-text">
                                <?= $errors['password'] ?>
                            </span>
                        <?php else: ?>
                            <span class="hint">Minimum 8 characters</span>
                        <?php endif; ?>
                    </div>

                    <div class="field <?= isset($errors['institution_id']) ? 'has-error' : '' ?>">
                        <label>Institution <span class="req">*</span></label>
                        <select required name="institution_id">
                            <option value="">Select institution</option>
                            <?php
                            $q = "SELECT * FROM institution";
                            $institutes_rs = Database::search($q);
                            while ($row = $institutes_rs->fetch_assoc()) {
                                $sel = (isset($institution_id) && $institution_id == $row['id']) ? 'selected' : '';
                                echo "<option value=\"{$row['id']}\" $sel>{$row['name']}</option>";
                            }
                            ?>
                        </select>
                        <?php if (isset($errors['institution_id'])): ?>
                            <span class="err-text">
                                <?= $errors['institution_id'] ?>
                            </span>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="form-actions">
                    <button class="btn-ghost" type="reset">Clear</button>
                    <button class="btn-submit" type="submit">
                        <i class="ti ti-check" aria-hidden="true"></i> Create admin
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>

<script>
    function createAdmin(evt) {
        evt.preventDefault();

        const form = document.getElementById("adminForm");
        const formData = new FormData(form);

        fetch("../process/adminCreate.php", {
            method: "POST",
            body: formData
        })
            .then(res => res.text())
            .then(res => {
                if (res.trim() === "success") {
                    form.reset();
                    location.reload();
                } else {
                    alert(res);
                }
            })
            .catch(err => {
                console.error(err);
                alert("Something went wrong");
            });
    }
    function toggleAdminPw() {
        const input = document.getElementById('adminPassword');
        const icon = document.getElementById('adminPwIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'ti ti-eye-off';
        } else {
            input.type = 'password';
            icon.className = 'ti ti-eye';
        }
    }

    function filterAdmins() {
        const q = document.getElementById('adminSearch').value.toLowerCase();
        document.querySelectorAll('#adminsTableBody tr[data-name]').forEach(row => {
            const matches = row.dataset.name.includes(q) || row.dataset.email.includes(q);
            row.style.display = matches ? '' : 'none';
        });
    }

    function deleteAdmin(id) {
        if (!confirm('Delete this admin? This action cannot be undone.')) return;

        fetch(`../process/adminDelete.php?id=${id}`)
            .then(res => res.text())
            .then(res => {
                if (res.trim() === 'success') {
                    location.reload();
                } else {
                    alert(res);
                }
            })
            .catch(err => {
                console.error(err);
                alert('Something went wrong while deleting');
            });
    }
</script>