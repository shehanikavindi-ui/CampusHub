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

    <!-- Announcements -->
    <div class="panel">
        <div class="panel-header">
            <span class="panel-title">Announcements</span>
            <a class="panel-action" href="?page=announcements">See all →</a>
        </div>

        <?php
        $ann_q = "SELECT a.*, c.name AS category_name, c.color AS category_color, 
                        i.name AS institution_name
                FROM announcements a
                LEFT JOIN category c ON a.category_id = c.id
                LEFT JOIN institution i ON a.institution_id = i.id
                ORDER BY a.date DESC
                LIMIT 3";

        $ann_rs = Database::search($ann_q);

        if ($ann_rs->num_rows == 0) {
            echo "<p style='font-size:var(--text-sm); color:var(--text-muted); 
                padding: 12px 0;'>No announcements yet.</p>";
        }

        while ($ann = $ann_rs->fetch_assoc()) {
            $title    = htmlspecialchars($ann['title']);
            $cat      = htmlspecialchars($ann['category_name']);
            $inst     = htmlspecialchars($ann['institution_name']);
            $date     = date("M d, Y", strtotime($ann['date']));
            $color    = htmlspecialchars($ann['category_color'] ?? '#14B8A6');

            echo "
            <div class='activity-item' style='align-items:flex-start; padding: 12px 0; 
                border-bottom: 1px solid var(--neutral-100);'>
                <div class='act-icon' style='background: {$color}18; flex-shrink:0; margin-top:2px;'>
                    <i class='ti ti-speakerphone' style='font-size:15px; color:{$color}'></i>
                </div>
                <div style='flex:1; min-width:0;'>
                    <div style='display:flex; align-items:center; gap:6px; flex-wrap:wrap; margin-bottom:3px;'>
                        <span class='act-title' style='font-weight:600; 
                            color:var(--text-primary);'>$title</span>
                        <span style='font-size:10.5px; font-weight:600; padding:2px 7px;
                            border-radius:var(--radius-full); background:{$color}18; 
                            color:{$color};'>$cat</span>
                    </div>
                    <div style='display:flex; gap:10px; font-size:11px; color:var(--text-muted);'>
                        <span><i class='ti ti-building' style='font-size:11px;'></i> $inst</span>
                        <span><i class='ti ti-calendar' style='font-size:11px;'></i> $date</span>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
    </div>

    

</div>
<!-- Second Row Panels -->
    <div class="panels"  style="grid-template-columns: 1fr 1fr; margin-top: 1rem;">

        <!-- Recently Joined Students -->
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Recently Joined Students</span>
                <a class="panel-action" href="?page=students">See all →</a>
            </div>

            <?php
            $students_q = "SELECT s.*, i.name AS institution_name
                       FROM student s
                       LEFT JOIN institution i ON s.institution_id = i.id
                       ORDER BY s.id DESC
                       LIMIT 5";

            $students_rs = Database::search($students_q);

            if ($students_rs->num_rows == 0) {
                echo "<p style='font-size:var(--text-sm); color:var(--text-muted); 
                  padding:12px 0;'>No students registered yet.</p>";
            }

            while ($stu = $students_rs->fetch_assoc()) {
                $fname   = htmlspecialchars($stu['fname']);
                $lname   = htmlspecialchars($stu['lname']);
                $inst    = htmlspecialchars($stu['institution_name'] ?? 'N/A');
                $sid     = htmlspecialchars($stu['studentID']);
                $initials = strtoupper(substr($fname, 0, 1) . substr($lname, 0, 1));

                $avatar = $stu['pfp']
                    ? "<img src='../uploads/profiles/{$stu['pfp']}' 
                        style='width:36px; height:36px; border-radius:50%; 
                               object-fit:cover; display:block;'>"
                    : "<div style='width:36px; height:36px; border-radius:50%;
                               background:var(--teal-100); color:var(--teal-700);
                               display:flex; align-items:center; justify-content:center;
                               font-size:13px; font-weight:700;'>$initials</div>";

                echo "
            <div class='activity-item' style='align-items:center; padding:10px 0;
                 border-bottom:1px solid var(--neutral-100);'>
                <div style='flex-shrink:0;'>$avatar</div>
                <div style='flex:1; min-width:0;'>
                    <div style='font-size:var(--text-sm); font-weight:600;
                                color:var(--text-primary); margin-bottom:2px;'>
                        $fname $lname
                    </div>
                    <div style='font-size:11.5px; color:var(--text-muted); 
                                display:flex; gap:8px;'>
                        <span><i class='ti ti-building' style='font-size:11px;'></i> 
                              $inst</span>
                        <span><i class='ti ti-id' style='font-size:11px;'></i> 
                              $sid</span>
                    </div>
                </div>
                <span style='font-size:11px; font-weight:600; padding:3px 9px;
                             border-radius:var(--radius-full); background:var(--teal-50);
                             color:var(--teal-700); border:1px solid var(--teal-200);
                             white-space:nowrap;'>New</span>
            </div>
            ";
            }
            ?>
        </div>

        <!-- Registration Leaderboard -->
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Registration Leaderboard</span>
                <a class="panel-action" href="?page=registrations">See all →</a>
            </div>

            <?php
            $leader_q = "SELECT e.title, e.capacity, 
                            c.name AS category_name, c.color AS category_color,
                            COUNT(r.id) AS reg_count
                     FROM event e
                     LEFT JOIN registration r ON e.id = r.event_id
                     LEFT JOIN category c ON e.category_id = c.id
                     GROUP BY e.id
                     ORDER BY reg_count DESC
                     LIMIT 5";

            $leader_rs = Database::search($leader_q);

            if ($leader_rs->num_rows == 0) {
                echo "<p style='font-size:var(--text-sm); color:var(--text-muted); 
                  padding:12px 0;'>No registrations yet.</p>";
            }

            $rank = 1;
            while ($row = $leader_rs->fetch_assoc()) {
                $title    = htmlspecialchars($row['title']);
                $cat      = htmlspecialchars($row['category_name']);
                $color    = htmlspecialchars($row['category_color'] ?? '#14B8A6');
                $count    = (int)$row['reg_count'];
                $capacity = (int)$row['capacity'];
                $pct      = $capacity > 0 ? min(100, round(($count / $capacity) * 100)) : 0;

                $rankColor = match ($rank) {
                    1 => '#F59E0B',
                    2 => '#94A3B8',
                    3 => '#B45309',
                    default => 'var(--neutral-400)'
                };

                echo "
            <div style='padding:10px 0; border-bottom:1px solid var(--neutral-100);'>
                <div style='display:flex; align-items:center; gap:10px; margin-bottom:7px;'>
                    <span style='font-size:13px; font-weight:700; color:$rankColor;
                                 width:20px; text-align:center; flex-shrink:0;'>
                        #$rank
                    </span>
                    <div style='flex:1; min-width:0;'>
                        <div style='font-size:var(--text-sm); font-weight:600;
                                    color:var(--text-primary); white-space:nowrap;
                                    overflow:hidden; text-overflow:ellipsis;'>
                            $title
                        </div>
                        <span style='font-size:10.5px; font-weight:600; padding:1px 6px;
                                     border-radius:var(--radius-full); 
                                     background:{$color}18; color:{$color};'>
                            $cat
                        </span>
                    </div>
                    <span style='font-size:12px; font-weight:700; 
                                 color:var(--text-primary); flex-shrink:0;'>
                        $count / $capacity
                    </span>
                </div>
                <div style='margin-left:30px; height:5px; background:var(--neutral-100);
                            border-radius:var(--radius-full); overflow:hidden;'>
                    <div style='height:100%; width:{$pct}%; 
                                background:linear-gradient(90deg, var(--teal-400), var(--teal-600));
                                border-radius:var(--radius-full);
                                transition: width 1s ease;'>
                    </div>
                </div>
            </div>
            ";
                $rank++;
            }
            ?>
        </div>

    </div>