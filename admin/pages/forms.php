<style>
    .toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
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
        min-width: 280px;
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

    /* ── Card grid ── */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    @media (max-width: 900px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    .form-card {
        background: white;
        border-radius: var(--radius-lg);
        border: 1px solid var(--neutral-200);
        box-shadow: var(--shadow-sm);
        padding: 16px 18px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        transition: box-shadow var(--transition), border-color var(--transition);
    }

    .form-card:hover {
        border-color: var(--neutral-300);
        box-shadow: var(--shadow-md);
    }

    .fc-top {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .fc-avatar {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 600;
        flex-shrink: 0;
        object-fit: cover;
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

    .fc-name {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--neutral-800);
    }

    .fc-date {
        font-size: 11.5px;
        color: var(--neutral-400);
    }

    .fc-subject {
        font-size: 14px;
        font-weight: 600;
        color: var(--neutral-800);
        line-height: 1.35;
    }

    .fc-body {
        font-size: 12.5px;
        color: var(--neutral-500);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .fc-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-top: 10px;
        border-top: 1px solid var(--neutral-100);
    }

    .status-pill {
        font-size: 11px;
        font-weight: 500;
        padding: 3px 9px;
        border-radius: var(--radius-full);
        background: #FEF3C7;
        color: #92400E;
    }

    .view-btn {
        text-decoration: none;
        height: 30px;
        padding: 0 12px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-sm);
        background: white;
        font-size: 12.5px;
        color: var(--neutral-600);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-family: var(--font-body);
        transition: all var(--transition);
    }

    .view-btn:hover {
        background: var(--teal-50);
        border-color: var(--teal-100);
        color: var(--teal-700);
    }

    .view-btn i {
        font-size: 14px;
    }

    /* ── Modal Overlay (static, one per card) ── */
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

    .modal-overlay:target {
        display: flex;
    }

    .modal-card {
        width: 100%;
        max-width: 520px;
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        animation: pop 220ms var(--ease);
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

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 18px 20px;
        border-bottom: 1px solid var(--neutral-100);
        background: var(--bg-soft);
    }

    .modal-title-row {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modal-icon {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .modal-icon i {
        font-size: 18px;
        color: var(--teal-600);
    }

    .modal-title h2 {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-primary);
    }

    .modal-sub {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 2px;
    }

    .modal-close {
        width: 32px;
        height: 32px;
        border-radius: var(--radius-md);
        border: 1px solid var(--neutral-200);
        background: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        text-decoration: none;
        transition: all var(--transition);
    }

    .modal-close:hover {
        background: var(--neutral-100);
        border-color: var(--neutral-300);
    }

    .modal-close i {
        font-size: 16px;
        color: var(--text-secondary);
    }

    .modal-body {
        padding: 20px;
        max-height: 60vh;
        overflow-y: auto;
    }

    .modal-body::-webkit-scrollbar {
        width: 5px;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background: var(--neutral-300);
        border-radius: 4px;
    }

    /* ── Student info block ── */
    .student-block {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px;
        background: var(--bg-soft);
        border: 1px solid var(--neutral-100);
        border-radius: var(--radius-md);
        margin-bottom: 16px;
    }

    .student-avatar {
        width: 55px;
        height: 55px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 600;
        flex-shrink: 0;
        object-fit: cover;
    }

    .student-name {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-primary);
    }

    .student-contact {
        font-size: 12px;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 3px;
    }

    .student-contact i {
        font-size: 13px;
    }

    .subject-line {
        font-size: 15.5px;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .body-text {
        font-size: 13.5px;
        color: var(--text-secondary);
        line-height: 1.7;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 20px;
        border-top: 1px solid var(--neutral-100);
        background: var(--bg-soft);
    }

    .btn-ghost {
        height: 36px;
        padding: 0 16px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        background: white;
        font-size: 13px;
        color: var(--text-secondary);
        cursor: pointer;
        font-family: var(--font-body);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all var(--transition);
    }

    .btn-ghost:hover {
        background: var(--neutral-100);
    }

    .btn-primary {
        height: 36px;
        padding: 0 16px;
        border: none;
        border-radius: var(--radius-md);
        background: var(--primary);
        color: white;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        font-family: var(--font-body);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: background var(--transition);
    }

    .btn-primary:hover {
        background: var(--primary-hover);
    }

    .btn-primary i {
        font-size: 15px;
    }
</style>

<?php

$forms = [];

$q = "
    SELECT
        f.id,
        f.subject,
        f.body,
        s.fname,
        s.lname,
        s.email,
        s.mobile,
        s.pfp
    FROM form f
    INNER JOIN student s ON f.student_id = s.id
    ORDER BY f.id DESC
";

$forms_rs = Database::search($q);

while ($row = $forms_rs->fetch_assoc()) {

    $forms[] = [
        'id' => $row['id'],
        'subject' => $row['subject'],
        'body' => $row['body'],
        'student' => [
            'pfp' => $row['pfp'],
            'name' => $row['fname'] . " " . $row['lname'],
            'email' => $row['email'],
            'phone' => $row['mobile'],
        ],
    ];
}

function initials_from_name($name)
{
    $parts = explode(' ', trim($name));
    $first = $parts[0][0] ?? '';
    $last = $parts[count($parts) - 1][0] ?? '';
    return strtoupper($first . $last);
}

$avatarColors = ['av-teal', 'av-violet', 'av-amber', 'av-blue', 'av-rose'];
?>

<div id="forms-page">

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="search-box">
            <i class="ti ti-search" aria-hidden="true"></i>
            <input type="text" id="formSearch" placeholder="Search by subject or student name..."
                oninput="filterForms()">
        </div>
    </div>

    <!-- Card grid -->
    <div class="form-grid" id="formGrid">
        <?php foreach ($forms as $i => $form): ?>
            <?php
            $colorClass = $avatarColors[$i % count($avatarColors)];
            $initials = initials_from_name($form['student']['name']);
            ?>
            <div class="form-card" data-subject="<?= htmlspecialchars(strtolower($form['subject'])) ?>"
                data-name="<?= htmlspecialchars(strtolower($form['student']['name'])) ?>">

                <div class="fc-top">

                    <?php if (!empty($form['student']['pfp'])): ?>
                        <img class="fc-avatar" src="../uploads/profiles/<?= htmlspecialchars($form['student']['pfp']) ?>"
                            alt="<?= htmlspecialchars($form['student']['name']) ?>">
                    <?php else: ?>
                        <div class="fc-avatar <?= $colorClass ?>">
                            <?= $initials ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <div class="fc-name">
                            <?= htmlspecialchars($form['student']['name']) ?>
                        </div>
                    </div>

                </div>

                <div class="fc-subject">
                    <?= htmlspecialchars($form['subject']) ?>
                </div>
                <div class="fc-body">
                    <?= htmlspecialchars($form['body']) ?>
                </div>

                <div class="fc-footer">
                    <a class="view-btn" href="#form-modal-<?= $form['id'] ?>">
                        <i class="ti ti-eye" aria-hidden="true"></i> View
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php foreach ($forms as $i => $form): ?>
    <?php
    $colorClass = $avatarColors[$i % count($avatarColors)];
    $initials = initials_from_name($form['student']['name']);
    ?>
    <div class="modal-overlay" id="form-modal-<?= $form['id'] ?>">
        <div class="modal-card">

            <div class="modal-header">
                <div class="modal-title-row">
                    <div class="modal-icon"><i class="ti ti-mail" aria-hidden="true"></i></div>
                    <div class="modal-title">
                        <h2>Inquiry details</h2>
                    </div>
                </div>
                <a class="modal-close" href="#" aria-label="Close">
                    <i class="ti ti-x" aria-hidden="true"></i>
                </a>
            </div>

            <div class="modal-body">

                <div class="student-block">

                    <?php if (!empty($form['student']['pfp'])): ?>
                        <img class="student-avatar" src="../uploads/profiles/<?= htmlspecialchars($form['student']['pfp']) ?>"
                            alt="<?= htmlspecialchars($form['student']['name']) ?>">
                    <?php else: ?>
                        <div class="student-avatar <?= $colorClass ?>">
                            <?= $initials ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <div class="student-name">
                            <?= htmlspecialchars($form['student']['name']) ?>
                        </div>

                        <div class="student-contact">
                            <i class="ti ti-mail" aria-hidden="true"></i>
                            <?= htmlspecialchars($form['student']['email']) ?>
                        </div>

                        <div class="student-contact">
                            <i class="ti ti-phone" aria-hidden="true"></i>
                            <?= htmlspecialchars($form['student']['phone']) ?>
                        </div>
                    </div>

                </div>

                <div class="subject-line">
                    <?= htmlspecialchars($form['subject']) ?>
                </div>
                <div class="body-text">
                    <?= htmlspecialchars($form['body']) ?>
                </div>

            </div>

            <div class="modal-footer">
                <a class="btn-ghost" href="#">Close</a>
                <a class="btn-primary"
                    href="mailto:<?= htmlspecialchars($form['student']['email']) ?>?subject=Re: <?= urlencode($form['subject']) ?>">
                    <i class="ti ti-mail" aria-hidden="true"></i> Reply via email
                </a>
            </div>

        </div>
    </div>
<?php endforeach; ?>

<script>
    function filterForms() {
        const q = document.getElementById('formSearch').value.toLowerCase();
        document.querySelectorAll('.form-card').forEach(card => {
            const matches = card.dataset.subject.includes(q) || card.dataset.name.includes(q);
            card.style.display = matches ? '' : 'none';
        });
    }
</script>