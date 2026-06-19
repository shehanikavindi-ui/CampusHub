<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        vertical-align: middle;
        padding: 12px 10px;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th:nth-child(1),
    .data-table td:nth-child(1) {
        width: 45%;
    }

    .data-table th:nth-child(2),
    .data-table td:nth-child(2) {
        width: 15%;
    }

    .data-table th:nth-child(3),
    .data-table td:nth-child(3) {
        width: 20%;
    }

    .data-table th:nth-child(4),
    .data-table td:nth-child(4) {
        width: 20%;
    }

    .data-table th,
    .data-table td {
        vertical-align: middle;
        padding: 12px 10px;
        overflow: hidden;
        text-align: center;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .leftAligned {
        text-align: left;
    }

    #status-upcoming {
        align-items: center;
        font-size: 11.5px;
        padding: 5px 8px;
        border-radius: var(--radius-full);
        font-weight: 500;
        background: var(--teal-50);
        color: var(--teal-700);
        border: 1px solid var(--teal-500);
    }

    #status-cancelled {
        align-items: center;
        font-size: 11.5px;
        padding: 5px 8px;
        border-radius: var(--radius-full);
        font-weight: 500;
        background: #FEF2F2;
        color: #991B1B;
        border: 1px solid #991B1B;
    }

    #status-completed {
        align-items: center;
        font-size: 11.5px;
        padding: 5px 8px;
        border-radius: var(--radius-full);
        font-weight: 500;
        background: var(--violet-50);
        color: var(--violet-700);
        border: 1px solid var(--violet-500);
    }
</style>

<div class="stats-grid">

    <?php
    $students_rs = Database::search("SELECT COUNT(*) AS cnt FROM student");
    $students = $students_rs->fetch_assoc()['cnt'];

    $events_rs = Database::search("SELECT COUNT(*) AS cnt FROM event");
    $events = $events_rs->fetch_assoc()['cnt'];

    $registrations_rs = Database::search("SELECT COUNT(*) AS cnt FROM registration");
    $registrations = $registrations_rs->fetch_assoc()['cnt'];

    $announcements_rs = Database::search("SELECT COUNT(*) AS cnt FROM announcements");
    $announcements = $announcements_rs->fetch_assoc()['cnt'];
    ?>

    <div class="stat-card">
        <div class="stat-icon icon-teal"><i class="ti ti-users"></i></div>
        <div class="stat-label">Total Students</div>
        <div class="stat-value">
            <?= $students ?>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-violet"><i class="ti ti-calendar-event"></i></div>
        <div class="stat-label">Active Events</div>
        <div class="stat-value">
            <?= $events ?>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-amber"><i class="ti ti-clipboard-check"></i></div>
        <div class="stat-label">Registrations</div>
        <div class="stat-value">
            <?= $registrations ?>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-blue"><i class="ti ti-speakerphone"></i></div>
        <div class="stat-label">Announcements</div>
        <div class="stat-value">
            <?= $announcements ?>
        </div>
    </div>

</div>

<!-- Panels -->
<div class="panels">

    <!-- Upcoming Events -->
    <div class="panel">
        <div class="panel-header">
            <span class="panel-title">Upcoming Events</span>
            <a class="panel-action" href="?page=events">View all →</a>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Registrations</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = "
                        SELECT 
                            e.*,
                            s.name AS status,
                            COUNT(r.id) AS registration_count
                        FROM event e
                        JOIN status s ON e.status = s.id
                        LEFT JOIN registration r ON e.id = r.event_id
                        WHERE e.date >= CURDATE()
                        GROUP BY e.id
                        ORDER BY e.date ASC
                        LIMIT 10
                    ";

                $events_rs = Database::search($q);

                while ($row = $events_rs->fetch_assoc()) {

                    $title = $row["title"];
                    $status = $row["status"];
                    $date = $row["date"];
                    $location = $row["location"];
                    $count = $row["registration_count"];

                    $statusClass = strtolower($status);

                    echo "
                            <tr>
                                <td style='color:var(--neutral-800); font-weight:500; text-align: left;'>$title</td>
                                <td style='text-align: left;'>$location</td>
                                <td>$date</td>
                                <td>$count</td>
                                <td>
                                <span id='status-$statusClass'>$status</span>
                                </td>
                            </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Recent Activity -->
    <div class="panel">
        <div class="panel-header">
            <span class="panel-title">Recent Activity</span>
            <a class="panel-action" href="#">See all</a>
        </div>

        <div class="activity-item">
            <div class="act-icon icon-teal">
                <i class="ti ti-user-plus" style="font-size:15px; color:var(--teal-600)"></i>
            </div>
            <div>
                <div class="act-title">New student registered</div>
                <div class="act-time">2 minutes ago</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="act-icon icon-violet">
                <i class="ti ti-calendar-plus" style="font-size:15px; color:#7C3AED"></i>
            </div>
            <div>
                <div class="act-title">Event "Coding Hackathon" published</div>
                <div class="act-time">18 minutes ago</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="act-icon icon-amber">
                <i class="ti ti-speakerphone" style="font-size:15px; color:#D97706"></i>
            </div>
            <div>
                <div class="act-title">New announcement posted</div>
                <div class="act-time">1 hour ago</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="act-icon icon-blue">
                <i class="ti ti-photo-up" style="font-size:15px; color:#2563EB"></i>
            </div>
            <div>
                <div class="act-title">12 photos uploaded to Media Library</div>
                <div class="act-time">3 hours ago</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="act-icon" style="background:#FEE2E2;">
                <i class="ti ti-clipboard-x" style="font-size:15px; color:#B91C1C"></i>
            </div>
            <div>
                <div class="act-title">Registration closed: Leadership Summit</div>
                <div class="act-time">Yesterday</div>
            </div>
        </div>

    </div>

</div>