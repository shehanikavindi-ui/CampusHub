<style>
    .regs-page {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ---------- Heading row ---------- */

    .regs-headrow {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .regs-heading h1 {
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        color: var(--text-primary);
        margin-bottom: 4px;
    }

    .regs-heading p {
        font-size: var(--text-sm);
        color: var(--text-secondary);
    }

    .rg-btn {
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

    .rg-btn i {
        font-size: 16px;
    }

    .rg-btn-ghost {
        background: var(--bg-white);
        border-color: var(--neutral-200);
        color: var(--text-secondary);
    }

    .rg-btn-ghost:hover {
        background: var(--bg-soft);
    }

    .rg-btn-primary {
        background: var(--primary);
        color: var(--text-white);
        box-shadow: var(--shadow-primary);
    }

    .rg-btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    /* ---------- Summary strip ---------- */

    .regs-summary {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    .rg-sum-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .rg-sum-icon {
        width: 38px;
        height: 38px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .rg-sum-icon i {
        font-size: 18px;
    }

    .rg-sum-icon.teal {
        background: var(--teal-50);
    }

    .rg-sum-icon.teal i {
        color: var(--teal-600);
    }

    .rg-sum-icon.violet {
        background: var(--violet-50);
    }

    .rg-sum-icon.violet i {
        color: var(--violet-600);
    }

    .rg-sum-icon.amber {
        background: #FFFBEB;
    }

    .rg-sum-icon.amber i {
        color: #D97706;
    }

    .rg-sum-icon.red {
        background: #FEF2F2;
    }

    .rg-sum-icon.red i {
        color: #DC2626;
    }

    .rg-sum-value {
        font-size: var(--text-xl);
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1.1;
    }

    .rg-sum-label {
        font-size: 11.5px;
        color: var(--text-muted);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-top: 2px;
    }

    /* ---------- Unified search + filters toolbar ---------- */

    .regs-toolbar {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .rg-search-row {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        align-items: center;
    }

    .rg-search {
        position: relative;
        flex: 1;
        min-width: 260px;
    }

    .rg-search input {
        width: 100%;
        padding: 11px 14px 11px 38px;
        border: 1.5px solid var(--neutral-200);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-family: var(--font-body);
        color: var(--text-primary);
        background: var(--bg-soft);
        transition: border-color var(--transition), background var(--transition), box-shadow var(--transition);
    }

    .rg-search input:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--bg-white);
        box-shadow: 0 0 0 3px var(--teal-50);
    }

    .rg-search i.rg-search-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 17px;
        color: var(--text-muted);
    }

    .rg-search-clear {
        position: absolute;
        right: 10px;
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
    }

    .rg-search input:not(:placeholder-shown)~.rg-search-clear {
        display: flex;
    }

    .rg-search-hint {
        font-size: 11.5px;
        color: var(--text-muted);
        padding-left: 2px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .rg-search-hint i {
        font-size: 13px;
    }

    .rg-search-hint b {
        color: var(--teal-600);
        font-weight: 600;
    }

    .rg-filter-select {
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

    .rg-filter-select:focus {
        outline: none;
        border-color: var(--primary);
    }

    /* Active filter chips */

    .rg-active-chips {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .rg-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 500;
        color: var(--teal-700);
        background: var(--teal-50);
        border: 1px solid var(--teal-100);
        padding: 4px 6px 4px 10px;
        border-radius: var(--radius-full);
    }

    .rg-chip button {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: none;
        background: rgba(15, 118, 110, 0.12);
        color: var(--teal-700);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 10px;
    }

    /* ---------- Table card ---------- */

    .regs-table-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .rg-table-scroll {
        overflow-x: auto;
    }

    .rg-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 880px;
    }

    .rg-table th {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.4px;
        padding: 13px 16px;
        text-align: left;
        background: var(--bg-soft);
        border-bottom: 1px solid var(--neutral-200);
        white-space: nowrap;
    }

    .rg-table td {
        padding: 13px 16px;
        font-size: 13px;
        color: var(--text-secondary);
        border-bottom: 1px solid var(--neutral-100);
        vertical-align: middle;
    }

    .rg-table tr:last-child td {
        border-bottom: none;
    }

    .rg-table tbody tr:hover td {
        background: var(--bg-soft);
    }

    /* User cell */

    .rg-user-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .rg-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--text-white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12.5px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .rg-avatar.violet {
        background: var(--secondary);
    }

    .rg-avatar.amber {
        background: #D97706;
    }

    .rg-avatar.blue {
        background: #2563EB;
    }

    .rg-avatar.pink {
        background: #DB2777;
    }

    .rg-user-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .rg-user-email {
        font-size: 11.5px;
        color: var(--text-muted);
    }

    /* Event cell */

    .rg-event-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .rg-event-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .rg-event-dot.academic {
        background: var(--teal-500);
    }

    .rg-event-dot.sports {
        background: #F59E0B;
    }

    .rg-event-dot.culture {
        background: var(--violet-500);
    }

    .rg-event-dot.technology {
        background: #2563EB;
    }

    .rg-event-dot.social {
        background: #EC4899;
    }

    .rg-event-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .rg-event-date {
        font-size: 11.5px;
        color: var(--text-muted);
    }

    /* Pills: registration status */

    .rg-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: var(--radius-full);
    }

    .rg-pill::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .rg-pill.confirmed {
        background: var(--teal-50);
        color: var(--teal-700);
    }

    .rg-pill.confirmed::before {
        background: var(--teal-500);
    }

    .rg-pill.pending {
        background: #FFFBEB;
        color: #92400E;
    }

    .rg-pill.pending::before {
        background: #D97706;
    }

    .rg-pill.waitlisted {
        background: var(--violet-50);
        color: var(--violet-700);
    }

    .rg-pill.waitlisted::before {
        background: var(--violet-500);
    }

    .rg-pill.cancelled {
        background: #FEF2F2;
        color: #991B1B;
    }

    .rg-pill.cancelled::before {
        background: #DC2626;
    }

    /* Row actions */

    .rg-row-actions {
        display: flex;
        gap: 6px;
        justify-content: flex-end;
    }

    .rg-icon-btn {
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
    }

    .rg-icon-btn i {
        font-size: 15px;
    }

    .rg-icon-btn:hover {
        background: var(--primary-light);
        color: var(--primary-dark);
        border-color: var(--primary-light);
    }

    .rg-icon-btn.danger:hover {
        background: #FEF2F2;
        color: #991B1B;
        border-color: #FECACA;
    }

    /* Empty state */

    .rg-empty {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 60px 20px;
        text-align: center;
    }

    .rg-empty.show {
        display: flex;
    }

    .rg-empty-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--bg-soft);
        color: var(--text-muted);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .rg-empty-icon i {
        font-size: 24px;
    }

    .rg-empty-title {
        font-size: var(--text-base);
        font-weight: 600;
        color: var(--text-primary);
    }

    .rg-empty-sub {
        font-size: 12.5px;
        color: var(--text-muted);
        max-width: 320px;
    }

    /* ---------- Footer / pagination ---------- */

    .regs-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
        border-top: 1px solid var(--neutral-200);
        background: var(--bg-soft);
    }

    .rg-page-info {
        font-size: 12.5px;
        color: var(--text-muted);
    }

    .rg-page-info b {
        color: var(--text-secondary);
    }

    .rg-page-controls {
        display: flex;
        gap: 6px;
    }

    .rg-page-btn {
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

    .rg-page-btn:hover {
        background: var(--bg-soft);
    }

    .rg-page-btn.active {
        background: var(--primary);
        color: var(--text-white);
        border-color: var(--primary);
    }

    .rg-page-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    /* ---------- Responsive ---------- */

    @media (max-width: 1100px) {
        .regs-summary {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 720px) {
        .regs-summary {
            grid-template-columns: 1fr;
        }

        .rg-search-row {
            flex-direction: column;
            align-items: stretch;
        }

        .rg-search {
            min-width: 0;
        }
    }
</style>

<div class="regs-page">


    <!-- ===== Unified search + filters ===== -->
    <div class="regs-toolbar">
        <div class="rg-search-row">
            <div class="rg-search">
                <i class="ti ti-search rg-search-icon"></i>
                <input type="text" id="rg-search-input" placeholder="Search by student name, email, or event title..."
                    autocomplete="off">
                <button class="rg-search-clear" type="button" id="rg-search-clear" aria-label="Clear search"><i
                        class="ti ti-x"></i></button>
            </div>

            <button class="rg-btn rg-btn-primary" type="button" onclick="exportRegistrationsCSV()">
                <i class="ti ti-download"></i> Export
            </button>
        </div>

        <div class="rg-search-hint">
            <i class="ti ti-info-circle"></i>
            Searching across <b>both students and events</b> — try a name like "Senanayake" or an event like
            "Hackathon".
        </div>
    </div>

    <!-- ===== Table ===== -->
    <div class="regs-table-card">
        <div class="rg-table-scroll">
            <table class="rg-table" id="rg-table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Event</th>
                        <th>Location & Institute</th>
                        <th>Registered On</th>
                    </tr>
                </thead>
                <tbody id="rg-table-body">

                    <?php

                    $q = "
    SELECT
        r.*,
        s.fname,
        s.lname,
        s.email,
        e.title AS event_title,
        e.date AS event_date,
        e.location,
        i.name AS institution_name
    FROM registration r
    INNER JOIN student s ON r.student_id = s.id
    INNER JOIN event e ON r.event_id = e.id
    INNER JOIN institution i ON e.institution_id = i.id
    ORDER BY r.date DESC
";

                    $rs = Database::search($q);

                    while ($row = $rs->fetch_assoc()) {

                        $studentName = $row["fname"] . " " . $row["lname"];
                        $email = $row["email"];

                        $initials =
                            strtoupper(substr($row["fname"], 0, 1)) .
                            strtoupper(substr($row["lname"], 0, 1));

                        ?>

                        <tr data-student="<?= strtolower($studentName . ' ' . $email) ?>"
                            data-event="<?= strtolower($row['event_title']) ?>">

                            <td>
                                <div class="rg-user-cell">
                                    <div class="rg-avatar">
                                        <?= $initials ?>
                                    </div>

                                    <div>
                                        <div class="rg-user-name">
                                            <?= $studentName ?>
                                        </div>
                                        <div class="rg-user-email">
                                            <?= $email ?>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="rg-event-cell">
                                    <div>
                                        <div class="rg-event-name">
                                            <?= $row["event_title"] ?>
                                        </div>

                                        <div class="rg-event-date">
                                            <?= date("M d, Y", strtotime($row["event_date"])) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="rg-event-cell">
                                    <div>
                                        <div class="rg-event-name">
                                            <?= $row["location"] ?>
                                        </div>

                                        <div class="rg-event-date">
                                            <?= $row["institution_name"] ?>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <?= date("M d, Y", strtotime($row["date"])) ?>
                            </td>

                        </tr>

                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <!-- Empty state, shown via JS when search/filter yields nothing -->
        <div class="rg-empty" id="rg-empty">
            <div class="rg-empty-icon"><i class="ti ti-search-off"></i></div>
            <div class="rg-empty-title">No registrations found</div>
            <div class="rg-empty-sub">Try a different name, email, or event title — or clear your filters.</div>
        </div>

        <!-- ===== Pagination ===== -->
        <div class="regs-footer">
            <div class="rg-page-info">
                Showing <b id="rg-count-showing">0</b> </b> registrations
            </div>
        </div>
    </div>

</div>

<script>

    const ROWS_PER_PAGE = 10;
    let currentPage = 1;
    let allRows = Array.from(document.querySelectorAll("#rg-table-body tr"));
    let filteredRows = [...allRows];
    (function () {

        const searchInput = document.getElementById('rg-search-input');
        const clearBtn = document.getElementById('rg-search-clear');
        const rows = document.querySelectorAll('#rg-table-body tr');
        const emptyState = document.getElementById('rg-empty');
        const tableScroll = document.querySelector('.rg-table-scroll');
        const countShowing = document.getElementById('rg-count-showing');

        function applyFilters() {

            const query = searchInput.value.trim().toLowerCase();

            filteredRows = allRows.filter(row => {

                const studentText = (row.dataset.student || '').toLowerCase();
                const eventText = (row.dataset.event || '').toLowerCase();

                return !query ||
                    studentText.includes(query) ||
                    eventText.includes(query);
            });

            currentPage = 1;
            updatePagination();
        }

        searchInput.addEventListener('input', applyFilters);

        clearBtn.addEventListener('click', function () {
            searchInput.value = '';
            applyFilters();
            searchInput.focus();
        });

        applyFilters();

    })();

    function updatePagination() {

        const totalRows = filteredRows.length;
        const totalPages = Math.ceil(totalRows / ROWS_PER_PAGE);

        allRows.forEach(row => row.style.display = "none");

        const start = (currentPage - 1) * ROWS_PER_PAGE;
        const end = start + ROWS_PER_PAGE;

        filteredRows.slice(start, end).forEach(row => {
            row.style.display = "";
        });

        document.getElementById("rg-count-showing").textContent = totalRows;

        emptyState.classList.toggle('show', totalRows === 0);
        tableScroll.style.display = totalRows === 0 ? 'none' : '';

        renderPagination(totalPages);
    }

    function renderPagination(totalPages) {

        const container = document.querySelector(".rg-page-controls");

        if (totalPages <= 1) {
            container.innerHTML = "";
            return;
        }

        let html = `
        <button class="rg-page-btn"
            onclick="goPage(${currentPage - 1})"
            ${currentPage === 1 ? "disabled" : ""}>
            <i class="ti ti-chevron-left"></i>
        </button>
    `;

        for (let i = 1; i <= totalPages; i++) {
            html += `
            <button class="rg-page-btn ${i === currentPage ? "active" : ""}"
                onclick="goPage(${i})">
                ${i}
            </button>
        `;
        }

        html += `
        <button class="rg-page-btn"
            onclick="goPage(${currentPage + 1})"
            ${currentPage === totalPages ? "disabled" : ""}>
            <i class="ti ti-chevron-right"></i>
        </button>
    `;

        container.innerHTML = html;
    }

    function goPage(page) {

        const totalPages = Math.ceil(filteredRows.length / ROWS_PER_PAGE);

        if (page < 1 || page > totalPages) return;

        currentPage = page;
        updatePagination();
    }

    function exportRegistrationsCSV() {

        let csv = [];

        const rows = document.querySelectorAll("#rg-table tr");

        rows.forEach((row) => {

            if (row.style.display === "none") return;

            let cols = row.querySelectorAll("th, td");
            let rowData = [];

            cols.forEach((col) => {
                let text = col.innerText
                    .replace(/\n/g, " ")
                    .replace(/\s+/g, " ")
                    .trim()
                    .replace(/"/g, '""');

                rowData.push(`"${text}"`);
            });

            csv.push(rowData.join(","));
        });

        const csvContent = csv.join("\n");

        const blob = new Blob([csvContent], {
            type: "text/csv;charset=utf-8;"
        });

        const link = document.createElement("a");

        const url = URL.createObjectURL(blob);

        link.href = url;
        link.download = "registrations.csv";

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        URL.revokeObjectURL(url);
    }
</script>