<style>
    .org-page {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ---------- Heading row ---------- */

    .org-headrow {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .org-heading h1 {
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        color: var(--text-primary);
        margin-bottom: 4px;
    }

    .org-heading p {
        font-size: var(--text-sm);
        color: var(--text-secondary);
    }

    .og-status-dot {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 600;
        color: var(--teal-700);
    }

    .og-status-dot::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--teal-500);
    }

    /* ---------- Layout: main column + sidebar ---------- */

    .org-layout {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 18px;
        align-items: start;
    }

    /* ---------- Shared card / section styles ---------- */

    .og-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        padding: 15px 10px;
        padding-left: 0;
    }

    .og-section {
        padding: 5px 20px;
        padding-right: 15px;
        border-bottom: 1px solid var(--neutral-100);
        overflow-y: auto;
    }

    .og-section-1 {
        padding: 22px 26px;
        border-bottom: 1px solid var(--neutral-100);
    }

    .og-section::-webkit-scrollbar {
        width: 6px;
        padding-right: 10px;
    }

    /* track (background) */
    .og-section::-webkit-scrollbar-track {
        background: transparent;
        /* hides background */
    }

    /* thumb (the draggable wheel) */
    .og-section::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    /* hover effect */
    .scroll-boxog-section::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 0, 0, 0.5);
    }

    /* remove arrows (usually not shown in modern browsers anyway) */
    .og-section::-webkit-scrollbar-button {
        display: none;
    }

    .og-section:last-child {
        border-bottom: none;
    }

    .og-section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 18px;
    }

    .og-section-head-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .og-section-icon {
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

    .og-section-icon i {
        font-size: 16px;
    }

    .og-section-title {
        font-size: var(--text-base);
        font-weight: 600;
        color: var(--text-primary);
    }

    .og-section-sub {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 1px;
    }

    /* ---------- Identity block ---------- */

    .og-identity-row {
        display: flex;
        align-items: center;
        gap: 0px;
        margin-bottom: 20px;
    }

    .og-logo {
        width: 84px;
        height: 84px;
        border-radius: var(--radius-lg);
        background: var(--teal-500);
        color: var(--text-white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--font-heading);
        font-size: 30px;
        font-weight: 700;
        flex-shrink: 0;
        box-shadow: var(--shadow-md);
        background-size: cover;
        background-position: center;
    }

    .og-identity-name {
        font-family: var(--font-heading);
        font-size: var(--text-xl);
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1.25;
    }

    .og-identity-tagline {
        font-size: 13px;
        color: var(--text-secondary);
        margin-top: 4px;
        line-height: 1.4;
    }

    .og-about-text {
        font-size: 13.5px;
        color: var(--text-secondary);
        line-height: 1.65;
    }

    /* ---------- Info rows (contact details) ---------- */

    .og-info-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .og-info-row {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .og-info-icon {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        background: var(--teal-50);
        color: var(--teal-600);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 16px;
        margin-top: 1px;
    }

    .og-info-text-label {
        font-size: 11px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 2px;
    }

    .og-info-text-value {
        font-size: 13.5px;
        color: var(--text-primary);
        font-weight: 500;
        line-height: 1.45;
    }

    .og-info-text-value a {
        color: var(--text-primary);
        text-decoration: none;
    }

    .og-info-text-value a:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    /* ---------- Social links ---------- */

    .og-social-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .og-social-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 14px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        text-decoration: none;
        transition: border-color var(--transition), background var(--transition), transform var(--transition);
    }

    .og-social-link:hover {
        border-color: var(--teal-200);
        background: var(--teal-50);
        transform: translateX(2px);
    }

    .og-social-icon {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 17px;
    }

    .og-social-icon.fb {
        background: #EFF6FF;
        color: #2563EB;
    }

    .og-social-icon.ig {
        background: #FDF2F8;
        color: #DB2777;
    }

    .og-social-label {
        font-size: 11px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .og-social-handle {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--text-primary);
        margin-top: 1px;
    }

    .og-social-link i.og-link-arrow {
        margin-left: auto;
        font-size: 16px;
        color: var(--text-muted);
        flex-shrink: 0;
    }

    /* ---------- Institutions list (sidebar — unchanged) ---------- */

    .og-inst-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-height: 500px;

    }

    .og-inst-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        transition: border-color var(--transition), background var(--transition);
    }

    .og-inst-item:hover {
        border-color: var(--teal-200);
        background: var(--teal-50);
    }

    .og-inst-icon {
        width: 34px;
        height: 34px;
        border-radius: var(--radius-md);
        background: var(--violet-50);
        color: var(--violet-600);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 16px;
    }

    .og-inst-name {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .og-inst-meta {
        font-size: 11px;
        color: var(--text-muted);
    }

    .og-inst-add {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 10px 12px;
        border: 1.5px dashed var(--neutral-300);
        border-radius: var(--radius-md);
        color: var(--text-muted);
        font-size: 12.5px;
        font-weight: 500;
        cursor: pointer;
        transition: all var(--transition);
        background: none;
        width: 100%;
    }

    .og-inst-add:hover {
        border-color: var(--primary);
        color: var(--primary-dark);
        background: var(--teal-50);
    }

    .og-inst-add i {
        font-size: 15px;
    }

    /* ---------- Status / system info card (sidebar — unchanged) ---------- */

    .og-meta-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .og-meta-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 12.5px;
    }

    .og-meta-row-label {
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .og-meta-row-label i {
        font-size: 14px;
    }

    .og-meta-row-value {
        color: var(--text-primary);
        font-weight: 600;
    }

    /* ---------- Responsive ---------- */

    @media (max-width: 1080px) {
        .org-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .og-identity-row {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="org-page">
    <div class="org-layout">
        <div class="og-card">
            <div class="og-section">
                <div class="og-identity-row">
                    <img src="../assets/favicon.svg" width="50" height="50" alt="">
                    <div>
                        <div class="og-identity-name">Campus <span style="color: #14B8A6">Hub</span></div>
                        <div class="og-identity-tagline">Connecting student life across every campus.</div>
                    </div>
                </div>
                <div class="og-about-text">
                    CampusHub coordinates student clubs, events, workshops, competitions, sports activities, and student
                    communities across multiple educational institutions. We help students discover what's happening on
                    campus and help administrators run it all from one place.
                </div>
            </div>

            <!-- Section: Contact details -->
            <div class="og-section-1">
                <div class="og-section-head">
                    <div class="og-section-head-left">
                        <div class="og-section-icon"><i class="ti ti-address-book"></i></div>
                        <div>
                            <div class="og-section-title">Contact Details</div>
                            <div class="og-section-sub">How to reach the CampusHub head office.</div>
                        </div>
                    </div>
                </div>

                <div class="og-info-list">

                    <div class="og-info-row">
                        <div class="og-info-icon"><i class="ti ti-mail"></i></div>
                        <div>
                            <div class="og-info-text-label">Email</div>
                            <div class="og-info-text-value"><a href="mailto:hello@campushub.edu">hello@campushub.edu</a>
                            </div>
                        </div>
                    </div>

                    <div class="og-info-row">
                        <div class="og-info-icon"><i class="ti ti-phone"></i></div>
                        <div>
                            <div class="og-info-text-label">Phone</div>
                            <div class="og-info-text-value"><a href="tel:+94112345678">+94 11 234 5678</a></div>
                        </div>
                    </div>

                    <div class="og-info-row">
                        <div class="og-info-icon"><i class="ti ti-map-pin"></i></div>
                        <div>
                            <div class="og-info-text-label">Head Office Address</div>
                            <div class="og-info-text-value">42 Independence Avenue, Colombo 07, Sri Lanka</div>
                        </div>
                    </div>

                    <div class="og-info-row">
                        <div class="og-info-icon"><i class="ti ti-world"></i></div>
                        <div>
                            <div class="og-info-text-label">Website</div>
                            <div class="og-info-text-value"><a href="https://www.campushub.edu" target="_blank"
                                    rel="noopener">www.campushub.edu</a></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Section: Social media -->
            <div class="og-section-1">
                <div class="og-section-head">
                    <div class="og-section-head-left">
                        <div class="og-section-icon"><i class="ti ti-share"></i></div>
                        <div>
                            <div class="og-section-title">Social Media</div>
                            <div class="og-section-sub">Find CampusHub on social platforms.</div>
                        </div>
                    </div>
                </div>

                <div class="og-social-list">

                    <a class="og-social-link" href="https://facebook.com/campushub" target="_blank" rel="noopener">
                        <div class="og-social-icon fb"><i class="ti ti-brand-facebook"></i></div>
                        <div>
                            <div class="og-social-label">Facebook</div>
                            <div class="og-social-handle">@Campushub</div>
                        </div>
                        <i class="ti ti-external-link og-link-arrow"></i>
                    </a>

                    <a class="og-social-link" href="https://instagram.com/campushub" target="_blank" rel="noopener">
                        <div class="og-social-icon ig"><i class="ti ti-brand-instagram"></i></div>
                        <div>
                            <div class="og-social-label">Instagram</div>
                            <div class="og-social-handle">@campushub</div>
                        </div>
                        <i class="ti ti-external-link og-link-arrow"></i>
                    </a>

                </div>
            </div>

        </div>

        <!-- ============ SIDEBAR (unchanged) ============ -->
        <div style="display:flex; flex-direction:column; gap:16px;">

            <!-- Institutions card -->
            <div class="og-card">
                <div class="og-section">
                    <div class="og-section-head">
                        <div class="og-section-head-left">
                            <div class="og-section-icon" style="background:var(--violet-50); color:var(--violet-600);">
                                <i class="ti ti-school"></i>
                            </div>
                            <div>
                                <div class="og-section-title">Registered Institutions</div>
                                <div class="og-section-sub">4 institutions onboarded</div>
                            </div>
                        </div>
                    </div>

                    <div class="og-inst-list">
                        <?php
                        $q = "
                                SELECT 
                                    i.id,
                                    i.name,
                                    COUNT(s.id) AS student_count
                                FROM institution i
                                LEFT JOIN student s ON s.institution_id = i.id
                                GROUP BY i.id, i.name
                            ";

                        $rs = Database::search($q);

                        while ($row = $rs->fetch_assoc()) {
                            $name = $row['name'];
                            $count = $row['student_count'];
                            ?>
                            <div class="og-inst-item">
                                <div class="og-inst-icon">
                                    <i class="ti ti-building-bank"></i>
                                </div>
                                <div>
                                    <div class="og-inst-name">
                                        <?= htmlspecialchars($name) ?>
                                    </div>
                                    <div class="og-inst-meta">
                                        <?= $count ?> students
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>