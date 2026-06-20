<style>
    /* ── Toolbar ── */
    .toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
        gap: 12px;
        flex-wrap: wrap;
    }

    .toolbar-left {
        display: flex;
        align-items: center;
        gap: 10px;
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
        min-width: 240px;
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

    .filter-select {
        height: 38px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        padding: 0 36px 0 10px;
        /* 👈 key change */
        font-size: 13px;
        color: var(--neutral-600);
        background: white;
        outline: none;
        cursor: pointer;
        font-family: var(--font-body);
        transition: border-color var(--transition);

        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2364748B' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
    }

    .filter-select:focus {
        border-color: var(--primary);
    }

    /* ── Buttons ── */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: var(--radius-md);
        padding: 0 16px 0 13px;
        height: 38px;
        font-size: 13.5px;
        font-weight: 500;
        cursor: pointer;
        transition: background var(--transition);
        text-decoration: none;
        font-family: var(--font-body);
    }

    .btn-primary:hover {
        background: var(--primary-hover);
    }

    .btn-primary i {
        font-size: 16px;
    }

    .btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: white;
        color: var(--neutral-600);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        padding: 0 14px;
        height: 38px;
        font-size: 13px;
        cursor: pointer;
        transition: all var(--transition);
        font-family: var(--font-body);
    }

    .btn-outline:hover {
        background: var(--neutral-50);
        border-color: var(--neutral-300);
    }

    .btn-outline i {
        font-size: 16px;
    }

    /* ── Table Card ── */
    .table-card {
        background: white;
        border-radius: var(--radius-lg);
        border: 1px solid var(--neutral-200);
        box-shadow: var(--shadow-sm);
        overflow: visible !important;
    }

    .table-wrap {
        overflow-x: auto;
    }

    .students-table {
        width: 100%;
        border-collapse: collapse;
        overflow: visible !important;
    }

    .students-table thead tr {
        border-bottom: 1px solid var(--neutral-100);
    }

    .students-table th {
        font-size: 11.5px;
        font-weight: 500;
        color: var(--neutral-400);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 16px;
        text-align: left;
        white-space: nowrap;
        background: var(--neutral-50);
    }

    .students-table th.sortable {
        cursor: pointer;
        user-select: none;
    }

    .students-table th.sortable:hover {
        color: var(--neutral-600);
    }

    .students-table th .sort-icon {
        font-size: 13px;
        margin-left: 3px;
        vertical-align: -2px;
        color: var(--neutral-300);
    }

    .students-table td {
        padding: 13px 16px;
        font-size: 13.5px;
        color: var(--neutral-600);
        border-bottom: 1px solid var(--neutral-100);
        vertical-align: middle;
    }

    .students-table tr:last-child td {
        border-bottom: none;
    }

    .students-table tbody tr:hover td {
        background: var(--neutral-50);
    }

    /* ── Avatar Cell ── */
    .avatar-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .av {
        width: 40px;
        height: 40px;
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

    .student-name {
        font-weight: 500;
        color: var(--neutral-800);
        font-size: 13.5px;
    }

    .student-id {
        font-size: 11.5px;
        color: var(--neutral-400);
        margin-top: 1px;
    }

    /* ── Status Pills ── */
    .pill {
        display: inline-flex;
        align-items: center;
        font-size: 11.5px;
        padding: 5px 9px;
        border-radius: var(--radius-full);
        font-weight: 500;
    }

    .pill-active {
        background: var(--teal-100);
        color: var(--teal-700);
    }

    .pill-inactive {
        background: var(--neutral-100);
        color: var(--neutral-500);
    }

    .pill-suspended {
        background: #FEE2E2;
        color: #B91C1C;
    }

    /* ── Action Buttons ── */
    .row-actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

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
        text-decoration: none;
    }

    .icon-btn i {
        font-size: 15px;
        color: var(--neutral-500);
    }

    .icon-btn:hover {
        background: var(--neutral-50);
        border-color: var(--neutral-300);
    }

    .icon-btn.view:hover {
        background: var(--teal-50);
        border-color: var(--teal-100);
    }

    .icon-btn.view:hover i {
        color: var(--teal-600);
    }

    .icon-btn.danger:hover {
        background: #FEF2F2;
        border-color: #FECACA;
    }

    .icon-btn.danger:hover i {
        color: #EF4444;
    }

    /* ── Table Footer ── */
    .table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 18px;
        border-top: 1px solid var(--neutral-100);
        flex-wrap: wrap;
        gap: 10px;
    }

    .footer-info {
        font-size: 13px;
        color: var(--neutral-400);
    }

    .pagination {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .page-btn {
        min-width: 30px;
        height: 30px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--neutral-200);
        background: white;
        font-size: 12.5px;
        color: var(--neutral-600);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        padding: 0 8px;
        transition: all var(--transition);
        font-family: var(--font-body);
    }

    .page-btn:hover {
        background: var(--neutral-50);
    }

    .page-btn.active {
        background: var(--primary);
        border-color: var(--primary);
        color: white;
        font-weight: 500;
    }

    .page-btn i {
        font-size: 14px;
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

    .av-img {
        width: 40px;
        height: 40px;
        border-radius: 20%;
        object-fit: cover;
    }
</style>

<div id="students-page">

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="toolbar-left">

            <div class="search-box">
                <i class="ti ti-search" aria-hidden="true"></i>
                <input type="text" id="studentSearch" placeholder="Search by name or ID..." oninput="filterStudents()">
            </div>

            <select class="filter-select" id="courseFilter" onchange="filterStudents()">
                <option value="">All Institutes</option>
                <?php
                $q = "SELECT * FROM institution";
                $institutes_rs = Database::search($q);

                $institutes = [];

                while ($row = $institutes_rs->fetch_assoc()) {
                    $institutes[] = $row["name"];
                }

                foreach ($institutes as $i) {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>

        </div>

        <div style="display:flex; gap:8px;">
            <button class="btn-primary" onclick="exportCSV()">
                <i class="ti ti-download" aria-hidden="true"></i> Export
            </button>
            <!-- <a class="btn-primary" href="?page=add-student">
                <i class="ti ti-plus" aria-hidden="true"></i> Add Student
            </a> -->
        </div>
    </div>

    <!-- Table -->
    <div class="table-card">
        <div class="table-wrap">
            <table class="students-table">
                <thead>
                    <tr>
                        <th class="sortable" onclick="sortTable('name')">
                            Student <i class="ti ti-selector sort-icon" aria-hidden="true"></i>
                        </th>
                        <th class="sortable" onclick="sortTable('course')">
                            Institute <i class="ti ti-selector sort-icon" aria-hidden="true"></i>
                        </th>
                        <th>Faculty</th>
                        <th>Year</th>
                        <th>Phone</th>
                        <th style="width:110px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="studentsTableBody">
                    <!-- Rows injected by JS (replace with PHP loop in production) -->
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            <div class="footer-info" id="tableFooterInfo">Loading...</div>
            <div class="pagination" id="pagination"></div>
        </div>
    </div>

</div>

<div id="studentModal" class="modal-overlay" onclick="closeStudentModal(event)">
    <div class="modal-card" onclick="event.stopPropagation()">

        <div class="modal-header">
            <div class="modal-title">
                <h2>Student Profile</h2>
                <p id="modalStudentId">ID: --</p>
            </div>

            <button class="modal-close" onclick="closeStudentModal()">
                <i class="ti ti-x"></i>
            </button>
        </div>

        <div class="modal-body">

            <div class="profile-section">

                <div id="modalAvatar" class="modal-avatar">
                </div>

                <div class="profile-info">
                    <h3 id="modalName">--</h3>
                    <span id="modalStatus" class="pill">--</span>
                </div>
            </div>

            <div class="details-grid">

                <div class="detail-item">
                    <label>DOB</label>
                    <span id="modalDob">--</span>
                </div>

                <div class="detail-item">
                    <label>Gender</label>
                    <span id="modalGender">--</span>
                </div>

                <div class="detail-item">
                    <label>Institute</label>
                    <span id="modalInstitute">--</span>
                </div>

                <div class="detail-item">
                    <label>Faculty</label>
                    <span id="modalFaculty">--</span>
                </div>

                <div class="detail-item">
                    <label>Programme</label>
                    <span id="modalCourse">--</span>
                </div>

                <div class="detail-item">
                    <label>Year</label>
                    <span id="modalYear">--</span>
                </div>

                <div class="detail-item">
                    <label>Email</label>
                    <span id="modalEmail">--</span>
                </div>

                <div class="detail-item">
                    <label>Phone</label>
                    <span id="modalPhone">--</span>
                </div>

            </div>
        </div>

    </div>
</div>

<?php

$q = "SELECT s.*, 
             i.name AS institution_name, 
             g.name AS gender_name,  
             c.name AS course_name, 
             f.name AS faculty_name, 
             c.faculty_id, 
             y.name AS year_name 
      FROM student s 
      INNER JOIN institution i ON s.institution_id = i.id
      INNER JOIN gender g ON s.gender_id = g.id 
      INNER JOIN yearOfStudy y ON s.yearOfStudy_id = y.id
      INNER JOIN course c ON s.course_id = c.id 
      INNER JOIN faculty f ON c.faculty_id = f.id";

$student_rs = Database::search($q);

$students = [];

while ($row = $student_rs->fetch_assoc()) {
    $students[] = [
        "id" => $row["id"],
        "st_id" => $row["studentID"],
        "name" => $row["fname"] . " " . $row["lname"],
        "institute" => $row["institution_name"],
        "faculty" => $row["faculty_name"],
        "course" => $row["course_name"],
        "year" => $row["year_name"],
        "mobile" => $row["mobile"],
        "email" => $row["email"],
        "status" => $row["status"] ?? "Active",
        "dob" => $row["dob"],
        "gender" => $row["gender_name"],
        "pfp" => $row["pfp"]

    ];
}
?>

<script>

    const students = <?php echo json_encode($students); ?>;

    const ROWS_PER_PAGE = 10;
    let currentPage = 1;
    let filtered = [...students];
    let sortKey = null;
    let sortAsc = true;

    const avatarColors = ['av-teal', 'av-violet', 'av-amber', 'av-blue', 'av-rose'];
    function avColor(name) {
        let h = 0;
        for (let i = 0; i < name.length; i++) h = name.charCodeAt(i) + ((h << 5) - h);
        return avatarColors[Math.abs(h) % avatarColors.length];
    }

    function initials(name) {
        return name.split(' ').slice(0, 2).map(w => w[0]).join('').toUpperCase();
    }

    const statusClass = { Active: 'pill-active', Inactive: 'pill-suspended' };

    function renderTable() {
        const start = (currentPage - 1) * ROWS_PER_PAGE;
        const page = filtered.slice(start, start + ROWS_PER_PAGE);

        document.getElementById('studentsTableBody').innerHTML = page.map(s => `
        <tr>
            <td>
                <div class="avatar-cell">
                    ${s.pfp
                ? `<img class="av-img" src="../uploads/profiles/${s.pfp}" />`
                : `<div class="av ${avColor(s.name)}">${initials(s.name)}</div>`
            }
                    <div>
                        <div class="student-name">${s.name}</div>
                        <div class="student-id">${s.st_id}</div>
                    </div>
                </div>
            </td>
            <td>${s.institute}</td>
            <td>${s.faculty}</td>
            <td style="color:var(--neutral-500);">${s.year}</td>
            <td style="color:var(--neutral-500);">${s.mobile}</td>
            <td>
                <div class="row-actions">
                    <a class="icon-btn view" href="javascript:void(0)" onclick='openStudentModal("${s.id}")' title="View">
                        <i class="ti ti-eye"></i>
                    </a>
                    
                    <a class="icon-btn danger"
                    href="javascript:void(0)"
                    onclick="deleteStudent('${s.id}', '${s.name}')"
                    title="Delete">
                        <i class="ti ti-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </td>
        </tr>
    `).join('');

        const total = filtered.length;
        const end = Math.min(start + ROWS_PER_PAGE, total);
        document.getElementById('tableFooterInfo').textContent =
            total === 0 ? 'No students found' : `Showing ${start + 1}–${end} of ${total} student${total !== 1 ? 's' : ''}`;

        renderPagination(total);
    }

    function renderPagination(total) {
        const pages = Math.ceil(total / ROWS_PER_PAGE);
        const el = document.getElementById('pagination');
        if (pages <= 1) { el.innerHTML = ''; return; }

        let html = `<button class="page-btn" onclick="goPage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>
                    <i class="ti ti-chevron-left" aria-hidden="true"></i></button>`;
        for (let p = 1; p <= pages; p++) {
            html += `<button class="page-btn ${p === currentPage ? 'active' : ''}" onclick="goPage(${p})">${p}</button>`;
        }
        html += `<button class="page-btn" onclick="goPage(${currentPage + 1})" ${currentPage === pages ? 'disabled' : ''}>
                 <i class="ti ti-chevron-right" aria-hidden="true"></i></button>`;
        el.innerHTML = html;
    }

    function goPage(p) {
        const pages = Math.ceil(filtered.length / ROWS_PER_PAGE);
        if (p < 1 || p > pages) return;
        currentPage = p;
        renderTable();
    }

    function filterStudents() {
        const q = document.getElementById('studentSearch').value.toLowerCase();
        const st = document.getElementById('statusFilter').value;
        const co = document.getElementById('courseFilter').value;

        filtered = students.filter(s =>
            (s.name.toLowerCase().includes(q) || s.id.toLowerCase().includes(q)) &&
            (!st || s.status === st) &&
            (!co || s.institute === co)
        );
        currentPage = 1;
        renderTable();
    }

    function sortTable(key) {
        if (sortKey === key) sortAsc = !sortAsc;
        else { sortKey = key; sortAsc = true; }
        filtered.sort((a, b) => {
            const va = a[key].toLowerCase(), vb = b[key].toLowerCase();
            return sortAsc ? va.localeCompare(vb) : vb.localeCompare(va);
        });
        renderTable();
    }

    function toggleSelectAll(cb) {
        document.querySelectorAll('#studentsTableBody input[type=checkbox]')
            .forEach(c => c.checked = cb.checked);
    }

    function exportCSV() {
        const headers = ['ID', 'Name', 'Course', 'Year', 'Email', 'Phone', 'Status'];
        const rows = filtered.map(s =>
            [s.id, s.name, s.course, s.year, s.email, s.mobile, s.status].join(',')
        );
        const csv = [headers.join(','), ...rows].join('\n');
        const a = document.createElement('a');
        a.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
        a.download = 'students.csv';
        a.click();
    }

    function openStudentModal(id) {
        const s = students.find(stu => stu.id === id);
        if (!s) return;

        document.getElementById("modalStudentId").textContent = "ID: " + s.st_id;
        document.getElementById("modalName").textContent = s.name;

        document.getElementById("modalDob").textContent = s.dob;
        document.getElementById("modalGender").textContent = s.gender;
        document.getElementById("modalInstitute").textContent = s.institute;
        document.getElementById("modalFaculty").textContent = s.faculty;
        document.getElementById("modalCourse").textContent = s.course;
        document.getElementById("modalYear").textContent = s.year;
        document.getElementById("modalEmail").textContent = s.email;
        document.getElementById("modalPhone").textContent = s.mobile;

        const statusEl = document.getElementById("modalStatus");
        statusEl.className = "pill " + (s.status === "Active" ? "pill-active"
            : s.status === "Inactive" ? "pill-inactive"
                : "pill-suspended");
        statusEl.textContent = s.status;

        const avatar = document.getElementById("modalAvatar");
        const initials = s.name.split(" ").map(w => w[0]).slice(0, 2).join("").toUpperCase();

        const hasImage = s.pfp != null;

        if (hasImage) {
            avatar.innerHTML = `<img src="../uploads/profiles/${s.pfp}" />`;
        } else {
            avatar.textContent = initials;
        }

        document.getElementById("studentModal").style.display = "flex";
    }

    function closeStudentModal(e) {
        if (e && e.target !== e.currentTarget) return;
        document.getElementById("studentModal").style.display = "none";
    }

    function toggleDropdown(trigger) {
        document.querySelectorAll('.custom-dropdown').forEach(d => {
            if (d !== trigger.parentElement) d.classList.remove('open');
        });
        trigger.parentElement.classList.toggle('open');
    }

    function selectOption(item, value, id) {
        const dropdown = item.closest('.custom-dropdown');
        const trigger = dropdown.querySelector('.dropdown-trigger');

        trigger.textContent = value;

        dropdown.classList.remove('active', 'inactive');
        dropdown.classList.add(value.toLowerCase());

        dropdown.classList.remove('open');

        updateStatus(id, value);
    }

    function deleteStudent(id, name) {
        if (!confirm(`Delete ${name}?`)) return;

        fetch(`../process/studentDelete.php?id=${id}`)
            .then(res => res.text())
            .then(data => {

                const index = students.findIndex(s => s.id === id);
                if (index !== -1) students.splice(index, 1);

                filtered = [...students];
                renderTable();
            })
            .catch(err => {
                console.error(err);
                alert("Delete failed");
            });
    }

    renderTable();
</script>