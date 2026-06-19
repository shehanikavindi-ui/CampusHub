<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile | CampusHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(20, 184, 166, 0.12), transparent 24rem),
                linear-gradient(180deg, #FFFFFF 0%, var(--bg-soft) 34rem);
            color: var(--text-primary);
            font-family: var(--font-body);
        }


        .profile-page {
            min-height: 100vh;
        }

        .profile-topbar {
            position: sticky;
            top: 0;
            z-index: 20;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem var(--container-px);
            border-bottom: 1px solid var(--neutral-200);
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(16px);
        }

        .profile-brand {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            color: var(--primary-dark);
            font-weight: 800;
            text-decoration: none;
        }

        .profile-brand-mark {
            display: grid;
            width: 38px;
            height: 38px;
            overflow: hidden;
            border-radius: var(--radius-md);
            background: var(--teal-50);
            place-items: center;
        }

        .profile-brand-mark img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .profile-nav a,
        .profile-logout {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.55rem 0.75rem;
            border: 1px solid transparent;
            border-radius: var(--radius-md);
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
            font: inherit;
            font-size: var(--text-sm);
            font-weight: 700;
            text-decoration: none;
            transition: background var(--transition), color var(--transition), border-color var(--transition);
        }

        .profile-nav a:hover {
            background: var(--teal-50);
            color: var(--primary-dark);
        }

        .profile-logout {
            border-color: var(--neutral-200);
            background: var(--bg-white);
            color: #B91C1C;
        }

        .profile-logout:hover {
            border-color: #FECACA;
            background: #FEF2F2;
        }

        .profile-main {
            width: min(100%, 1240px);
            margin: 0 auto;
            padding: 1.5rem var(--container-px) 3rem;
        }

        .profile-hero {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 1rem;
            align-items: end;
            margin-bottom: 1rem;
        }

        .profile-kicker {
            display: inline-flex;
            margin-bottom: 0.55rem;
            padding: 0.3rem 0.68rem;
            border: 1px solid rgba(20, 184, 166, 0.18);
            border-radius: var(--radius-full);
            background: var(--bg-white);
            color: var(--primary-dark);
            font-size: var(--text-xs);
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .profile-title {
            margin: 0;
            color: var(--text-primary);
            font-family: var(--font-heading);
            font-size: clamp(1.9rem, 4vw, 2.7rem);
            font-weight: 600;
            letter-spacing: -0.035em;
            line-height: 1.05;
        }

        .profile-subtitle {
            max-width: 680px;
            margin: 0.55rem 0 0;
            color: var(--text-secondary);
            font-size: var(--text-sm);
        }

        .profile-actions {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .profile-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            min-height: 42px;
            padding: 0.72rem 1rem;
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-lg);
            background: var(--bg-white);
            color: var(--text-secondary);
            cursor: pointer;
            font: inherit;
            font-size: var(--text-sm);
            font-weight: 800;
            text-decoration: none;
            transition: background var(--transition), border-color var(--transition), color var(--transition), transform var(--transition);
        }

        .profile-btn:hover {
            transform: translateY(-1px);
        }

        .profile-btn-primary {
            border-color: transparent;
            background: var(--primary);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(20, 184, 166, 0.18);
        }

        .profile-btn-primary:hover {
            background: var(--primary-hover);
        }

        .profile-btn-secondary:hover {
            border-color: var(--teal-200);
            background: var(--teal-50);
            color: var(--primary-dark);
        }

        .profile-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 360px;
            gap: 1rem;
            align-items: start;
        }

        .profile-card {
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-2xl);
            background: rgba(255, 255, 255, 0.94);
            box-shadow: var(--shadow-sm);
        }

        .profile-card-main {
            overflow: hidden;
        }

        .profile-card-main::before {
            display: block;
            height: 5px;
            background: linear-gradient(90deg, var(--teal-500), var(--violet-500), #F59E0B);
            content: "";
        }

        .profile-card-inner {
            padding: 1.25rem;
        }

        .profile-summary {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
            padding-bottom: 1.15rem;
            border-bottom: 1px solid var(--neutral-100);
        }

        .profile-avatar {
            display: grid;
            width: 82px;
            height: 82px;
            flex: 0 0 auto;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal-100), var(--violet-100));
            color: var(--primary-dark);
            place-items: center;
            font-size: 2rem;
        }

        .profile-img {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 82px;
            height: 82px;
            flex: 0 0 auto;
            border-radius: 50%;
            overflow: hidden;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /*  */
        .profile-pic-wrap {
            position: relative;
            width: 82px;
            height: 82px;
            flex: 0 0 auto;
            border-radius: 50%;
            cursor: pointer;
        }

        .profile-pic-wrap .profile-avatar,
        .profile-pic-wrap .profile-img {
            width: 100%;
            height: 100%;
        }

        .profile-pic-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.45);
            opacity: 0;
            transition: opacity var(--transition);
        }

        .profile-pic-wrap:hover .profile-pic-overlay {
            opacity: 1;
        }

        .profile-pic-overlay i {
            color: #FFFFFF;
            font-size: 1.1rem;
        }

        .pic-modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 50;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
        }

        .pic-modal-backdrop.is-open {
            display: flex;
        }

        .pic-modal {
            width: min(100%, 360px);
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-2xl);
            background: var(--bg-white);
            box-shadow: var(--shadow-sm);
            padding: 1.25rem;
            text-align: center;
        }

        .pic-modal h3 {
            margin: 0 0 1rem;
            font-size: var(--text-lg);
            font-weight: 800;
            color: var(--text-primary);
        }

        .pic-modal-preview {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 140px;
            height: 140px;
            margin: 0 auto 1.1rem;
            border-radius: 50%;
            overflow: hidden;
            background: linear-gradient(135deg, var(--teal-100), var(--violet-100));
        }

        .pic-modal-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pic-modal-preview i {
            font-size: 3rem;
            color: var(--primary-dark);
        }

        .pic-modal-file-input {
            display: none;
        }

        .pic-modal-change-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            width: 100%;
            min-height: 42px;
            margin-bottom: 1rem;
            border: 1.5px dashed var(--neutral-200);
            border-radius: var(--radius-lg);
            background: var(--bg-soft);
            color: var(--text-secondary);
            cursor: pointer;
            font: inherit;
            font-size: var(--text-sm);
            font-weight: 700;
        }

        .pic-modal-change-btn:hover {
            border-color: var(--primary);
            color: var(--primary-dark);
        }

        .pic-modal-actions {
            display: flex;
            gap: 0.65rem;
        }

        .pic-modal-actions .profile-btn {
            flex: 1;
        }
        /*  */

        .profile-summary h2 {
            margin: 0;
            color: var(--text-primary);
            font-family: var(--font-body);
            font-size: var(--text-2xl);
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .profile-summary p {
            margin: 0.25rem 0 0;
            color: var(--text-secondary);
            font-size: var(--text-sm);
        }

        .profile-status {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            margin-top: 0.55rem;
            padding: 0.32rem 0.55rem;
            border-radius: var(--radius-full);
            background: var(--teal-50);
            color: var(--primary-dark);
            font-size: var(--text-xs);
            font-weight: 800;
        }

        .profile-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.9rem;
        }

        .profile-field {
            min-width: 0;
        }

        .profile-field-full {
            grid-column: 1 / -1;
        }

        .profile-field label {
            display: block;
            margin-bottom: 0.38rem;
            color: var(--text-primary);
            font-size: var(--text-sm);
            font-weight: 700;
        }

        .profile-field input,
        .profile-field select,
        .profile-field textarea {
            width: 100%;
            min-height: 44px;
            padding: 0.72rem 0.85rem;
            border: 1.5px solid var(--neutral-200);
            border-radius: var(--radius-lg);
            background: var(--bg-white);
            color: var(--text-primary);
            font: inherit;
            font-size: var(--text-sm);
            outline: none;
            transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
        }

        .profile-field textarea {
            min-height: 92px;
            resize: vertical;
        }

        .profile-field input[readonly],
        .profile-field textarea[readonly],
        .profile-field select:disabled {
            background: var(--bg-soft);
            color: var(--text-secondary);
            cursor: default;
        }

        .profile-field input:not([readonly]):focus,
        .profile-field textarea:not([readonly]):focus,
        .profile-field select:not(:disabled):focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.13);
            background: #FFFFFF;
        }

        .profile-form-note {
            display: none;
            grid-column: 1 / -1;
            margin: 0;
            padding: 0.75rem 0.85rem;
            border: 1px solid var(--teal-100);
            border-radius: var(--radius-lg);
            background: var(--teal-50);
            color: var(--primary-dark);
            font-size: var(--text-sm);
            font-weight: 600;
        }

        .is-editing .profile-form-note {
            display: block;
        }

        .profile-save-row {
            display: none;
            grid-column: 1 / -1;
            gap: 0.65rem;
            justify-content: flex-end;
            margin-top: 0.25rem;
        }

        .is-editing .profile-save-row {
            display: flex;
        }

        .profile-side-stack {
            display: grid;
            gap: 1rem;
        }

        .profile-section {
            padding: 1rem;
        }

        .profile-section-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 0.9rem;
        }

        .profile-section-title {
            margin: 0;
            color: var(--text-primary);
            font-family: var(--font-body);
            font-size: var(--text-lg);
            font-weight: 800;
            letter-spacing: -0.01em;
        }

        .profile-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 30px;
            height: 30px;
            padding-inline: 0.5rem;
            border-radius: var(--radius-full);
            background: var(--teal-50);
            color: var(--primary-dark);
            font-size: var(--text-xs);
            font-weight: 900;
        }

        .joined-list {
            display: grid;
            gap: 0.7rem;
        }

        .joined-item {
            display: grid;
            grid-template-columns: 42px 1fr;
            gap: 0.7rem;
            align-items: center;
            padding: 0.75rem;
            border: 1px solid var(--neutral-100);
            border-radius: var(--radius-lg);
            background: var(--bg-white);
        }

        .joined-icon {
            display: grid;
            width: 42px;
            height: 42px;
            border-radius: var(--radius-md);
            background: var(--teal-50);
            color: var(--primary-dark);
            place-items: center;
        }

        .joined-icon--blue {
            background: var(--violet-50);
            color: var(--secondary-dark);
        }

        .joined-icon--amber {
            background: #FEF3C7;
            color: #92400E;
        }

        .joined-item h3 {
            margin: 0;
            color: var(--text-primary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 800;
        }

        .joined-item p {
            margin: 0.12rem 0 0;
            color: var(--text-secondary);
            font-size: var(--text-xs);
        }

        .logout-panel {
            padding: 1rem;
            border-color: #FECACA;
            background: #FFFBFB;
        }

        .logout-panel p {
            margin: 0.35rem 0 0.9rem;
            color: var(--text-secondary);
            font-size: var(--text-sm);
        }

        .logout-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            width: 100%;
            min-height: 42px;
            border: 1px solid #FECACA;
            border-radius: var(--radius-lg);
            background: #FFFFFF;
            color: #B91C1C;
            font: inherit;
            font-weight: 800;
            text-decoration: none;
            transition: background var(--transition), transform var(--transition);
        }

        .logout-btn:hover {
            background: #FEF2F2;
            transform: translateY(-1px);
        }

        @media (max-width: 980px) {
            .profile-hero,
            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-actions {
                justify-content: flex-start;
            }
        }

        @media (max-width: 720px) {
            .profile-topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile-nav {
                justify-content: flex-start;
                width: 100%;
            }

            .profile-summary {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile-form {
                grid-template-columns: 1fr;
            }

            .profile-save-row {
                justify-content: stretch;
            }

            .profile-save-row .profile-btn {
                flex: 1;
            }
        }

        @media (max-width: 480px) {
            .profile-main {
                padding-inline: 1rem;
            }

            .profile-nav,
            .profile-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .profile-nav a,
            .profile-logout,
            .profile-actions .profile-btn {
                justify-content: center;
                width: 100%;
            }
        }
    </style>
</head>


<body>
    
    <div class="profile-page"><br><br>
        
        <?php
        include "header.php";
        ?>

        <main class="profile-main">

            <!-- toast -->
            <div class="toast-msg" id="toast-msg" >
                <i id="toast-icon" class="bi bi-x-circle-fill"></i>
                <span id="toast-text" class="toast-text"></span>
            </div>

            <section class="profile-layout mt-4">
                <article class="profile-card profile-card-main" id="profileCard">
                    <div class="profile-card-inner">
    

                    <?php
                    $q = "SELECT s.*, i.name AS institution_name, g.name AS gender_name,  c.name AS course_name, f.name AS faculty_name, 
                        c.faculty_id, y.name AS year_name FROM student s INNER JOIN institution i ON s.institution_id = i.id
                        INNER JOIN gender g ON s.gender_id = g.id INNER JOIN yearOfStudy y ON s.yearOfStudy_id = y.id
                        INNER JOIN course c ON s.course_id = c.id INNER JOIN faculty f ON c.faculty_id = f.id 
                        WHERE s.id = '".$_SESSION['u']['id']."' ";
                    $student_rs = Database::search($q);
                    $student_data = $student_rs->fetch_assoc();

                    $years_rs = Database::search("SELECT id, name FROM yearOfStudy ORDER BY id");

                    

                    ?>
                        
                        <div class="profile-summary">

                            <div class="profile-pic-wrap" id="profilePicTrigger">
                                <?php if ($student_data['pfp'] == null): ?>
                                    <div class="profile-avatar" aria-hidden="true">
                                        <i class="bi bi-person"></i>
                                    </div>
                                <?php else: ?>
                                    <div class="profile-img" aria-hidden="true">
                                        <img src="uploads/profiles/<?php echo htmlspecialchars($student_data['pfp']); ?>" />
                                    </div>
                                <?php endif; ?>

                                <div class="profile-pic-overlay">
                                    <i class="bi bi-pencil-fill"></i>
                                </div>
                            </div>
                            

                            <div>
                                <h2><?php echo $student_data['fname'] . ' ' . $student_data['lname']; ?></h2>
                                <p><?php echo $student_data['course_name']; ?> · <?php echo $student_data['institution_name']; ?></p>
                                <span class="profile-status"><i class="bi bi-patch-check"></i> Verified student</span>
                            </div>

                            <div class="profile-actions ms-5">
                                <button type="button" class="profile-btn profile-btn-secondary" id="cancelEditBtn" hidden>
                                    <i class="bi bi-x-lg"></i> Cancel
                                </button>
                                <button type="button" class="profile-btn profile-btn-primary" id="editProfileBtn">
                                    <i class="bi bi-pencil-square"></i> Update details
                                </button>
                            </div>
                        </div>

                        <form class="profile-form" id="profileForm">
                            <p class="profile-form-note"><i class="bi bi-info-circle"></i> Editing enabled. Update the fields and save your changes.</p>

                            <div class="profile-field">
                                <label for="firstName">First name</label>
                                <input type="text" id="firstName" name="firstName" value="<?php echo $student_data['fname']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="lastName">Last name</label>
                                <input type="text" id="lastName" name="lastName" value="<?php echo $student_data['lname']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="email">Email address</label>
                                <input type="email" id="email" name="email" value="<?php echo $student_data['email']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="phone">Phone number</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo $student_data['mobile']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="studentId">Student ID</label>
                                <input type="text" id="studentId" name="studentId" value="<?php echo $student_data['studentID']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="dob">Date of birth</label>
                                <input type="date" id="dob" name="dob" value="<?php echo $student_data['dob']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="institution">Institution</label>
                                <input type="text" id="institution" name="institution" value="<?php echo $student_data['institution_name']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="faculty">Faculty</label>
                                <input type="text" id="faculty" name="faculty" value="<?php echo $student_data['faculty_name']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="programme">Programme / course</label>
                                <input type="text" id="programme" name="programme" value="<?php echo $student_data['course_name']; ?>" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="year">Year of study</label>
                                <select id="year" name="year" disabled>
                                    <?php while ($row = $years_rs->fetch_assoc()): ?>
                                        <option value="<?php echo $row['id']; ?>"
                                            <?php echo ($row['id'] == $student_data['yearOfStudy_id']) ? 'selected' : ''; ?>>
                                            <?php echo $row['name']; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>


                            <div class="profile-save-row">
                                <button type="button" class="profile-btn profile-btn-secondary" id="resetBtn">
                                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                                </button>
                                <button type="submit" class="profile-btn profile-btn-primary">
                                    <i class="bi bi-check2-circle"></i> Save changes
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </article>

                <aside class="profile-side-stack">

                    <article class="profile-card profile-section">
                        <div class="profile-section-head">
                            <h2 class="profile-section-title">Joined events</h2>
                            <span class="profile-count">4</span>
                        </div>

                        <div class="joined-list">
                            <div class="joined-item">
                                <span class="joined-icon"><i class="bi bi-trophy"></i></span>
                                <div>
                                    <h3>Inter-Campus Football Finals</h3>
                                    <p>17 Jun 2026 · Confirmed</p>
                                </div>
                            </div>
                            <div class="joined-item">
                                <span class="joined-icon joined-icon--blue"><i class="bi bi-laptop"></i></span>
                                <div>
                                    <h3>Web Development Workshop</h3>
                                    <p>19 Jun 2026 · Pending</p>
                                </div>
                            </div>
                            <div class="joined-item">
                                <span class="joined-icon joined-icon--amber"><i class="bi bi-briefcase"></i></span>
                                <div>
                                    <h3>CV and Interview Clinic</h3>
                                    <p>27 Jun 2026 · Confirmed</p>
                                </div>
                            </div>
                            <div class="joined-item">
                                <span class="joined-icon"><i class="bi bi-people"></i></span>
                                <div>
                                    <h3>Debate Society Open Night</h3>
                                    <p>30 Jun 2026 · Registered</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="profile-card logout-panel">
                        <h2 class="profile-section-title">End session</h2>
                        <p>Log out when you are finished using CampusHub on this device.</p>
                        <a href="auth/studentLogin.php" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i> Log out
                        </a>
                    </article>
                </aside>
            </section>
        </main>
    </div>

    <div class="pic-modal-backdrop" id="picModalBackdrop">
        <div class="pic-modal">
            <h3>Update profile picture</h3>

            <div class="pic-modal-preview" id="picModalPreview">
                <?php if ($student_data['pfp']): ?>
                    <img src="uploads/profiles/<?php echo htmlspecialchars($student_data['pfp']); ?>" id="picModalImg" />
                <?php else: ?>
                    <i class="bi bi-person" id="picModalIcon"></i>
                <?php endif; ?>
            </div>

            <label class="pic-modal-change-btn">
                <i class="bi bi-upload"></i> Change profile picture
                <input type="file" accept="image/*" class="pic-modal-file-input" id="picModalFileInput">
            </label>

            <div class="pic-modal-actions">
                <button type="button" class="profile-btn profile-btn-secondary" id="picModalCancelBtn">Cancel</button>
                <button type="button" class="profile-btn profile-btn-primary" id="picModalSaveBtn">Save</button>
            </div>
        </div>
    </div>

    <script src="js/student-profile.js"></script>
    <script>
        const picTrigger = document.getElementById("profilePicTrigger");
        const picModalBackdrop = document.getElementById("picModalBackdrop");
        const picModalCancelBtn = document.getElementById("picModalCancelBtn");
        const picModalSaveBtn = document.getElementById("picModalSaveBtn");
        const picModalFileInput = document.getElementById("picModalFileInput");
        const picModalPreview = document.getElementById("picModalPreview");

        let selectedFile = null;

        picTrigger.addEventListener("click", () => {
            picModalBackdrop.classList.add("is-open");
        });

        picModalCancelBtn.addEventListener("click", closePicModal);

        picModalBackdrop.addEventListener("click", (e) => {
            if (e.target === picModalBackdrop) closePicModal();
        });

        function closePicModal() {
            picModalBackdrop.classList.remove("is-open");
            selectedFile = null;
            picModalFileInput.value = "";
        }

        picModalFileInput.addEventListener("change", () => {
            const file = picModalFileInput.files[0];
            if (!file) return;
            selectedFile = file;

            const reader = new FileReader();
            reader.onload = (e) => {
                picModalPreview.innerHTML = `<img src="${e.target.result}" id="picModalImg">`;
            };
            reader.readAsDataURL(file);
        });

        picModalSaveBtn.addEventListener("click", () => {
            if (!selectedFile) {
                closePicModal();
                return;
            }

            saveProfilePfp();
        });

        const profileCard = document.getElementById("profileCard");
        const profileForm = document.getElementById("profileForm");
        const editBtn = document.getElementById("editProfileBtn");
        const cancelBtn = document.getElementById("cancelEditBtn");
        const resetBtn = document.getElementById("resetBtn");
        const fields = profileForm.querySelectorAll("input, textarea, select");
        const originalValues = new Map();

        fields.forEach((field) => {
            originalValues.set(field, field.value);
        });

        function setEditing(enabled) {
            profileCard.classList.toggle("is-editing", enabled);
            cancelBtn.hidden = !enabled;

            fields.forEach((field) => {
                if (
                    field.id === "email" ||
                    field.id === "studentId" ||
                    field.id === "institution" ||
                    field.id === "faculty" ||
                    field.id === "programme"
                ) {
                    return;
                }
                if (field.tagName === "SELECT") {
                    field.disabled = !enabled;
                } else {
                    field.readOnly = !enabled;
                }
            });

            editBtn.innerHTML = enabled
                ? '<i class="bi bi-pencil-square"></i> Editing enabled'
                : '<i class="bi bi-pencil-square"></i> Update details';
            editBtn.disabled = enabled;

            if (enabled) {
                document.getElementById("firstName").focus();
            }
        }

        function resetValues() {
            fields.forEach((field) => {
                field.value = originalValues.get(field);
            });
        }

        editBtn.addEventListener("click", () => setEditing(true));

        cancelBtn.addEventListener("click", () => {
            resetValues();
            setEditing(false);
        });

        resetBtn.addEventListener("click", resetValues);

        profileForm.addEventListener("submit", (event) => {
            event.preventDefault();
            fields.forEach((field) => {
                originalValues.set(field, field.value);
            });
            setEditing(false);
            saveChanges();
        });
    </script>
    
    
</body>
</html>
