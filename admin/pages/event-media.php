<style>
    /* ===========  Toast box =================== */
    .toast-msg {
        position: fixed;
        top: 2vh;
        right: 1.5rem;
        background-color: #DC2626;
        padding: 0.75rem 1.2rem;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: var(--text-xs);
        font-family: var(--font-body);
        letter-spacing: 0.05em;
        z-index: 9999;
        opacity: 0;
        transform: translateY(-8px);
        transition: opacity var(--transition), transform var(--transition);
        pointer-events: none;
        box-shadow: var(--shadow-lg);
    }

    .toast-text {
        color: var(--text-white);
    }

    .toast-msg.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .toast-msg i {
        color: var(--text-white);
        font-size: var(--text-base);
    }

    .eventmedia-page {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .eventmedia-headrow {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .eventmedia-heading h1 {
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        color: var(--text-primary);
        margin-bottom: 4px;
    }

    .eventmedia-heading p {
        font-size: var(--text-sm);
        color: var(--text-secondary);
    }

    .em-layout {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 18px;
        align-items: start;
    }

    .em-form-card {
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .em-section {
        padding: 22px 26px;
        border-bottom: 1px solid var(--neutral-100);
    }

    .em-section:last-child {
        border-bottom: none;
    }

    .em-section-head {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
    }

    .em-section-icon {
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

    .em-section-icon i {
        font-size: 16px;
    }

    .em-section-title {
        font-size: var(--text-base);
        font-weight: 600;
        color: var(--text-primary);
    }

    .em-section-sub {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 1px;
    }

    .em-form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .em-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .em-field.full {
        grid-column: 1 / -1;
    }

    .em-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .em-req {
        color: #DC2626;
        font-weight: 700;
    }

    .em-hint {
        font-size: 11.5px;
        color: var(--text-muted);
        margin-top: 1px;
    }

    .em-select {
        user-select: none;
        width: 100%;
        padding: 10px 13px;
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-family: var(--font-body);
        color: var(--text-primary);
        background: var(--bg-soft);
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%2364748B' stroke-width='1.6' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 13px center;
        padding-right: 34px;
        transition: border-color var(--transition), background var(--transition), box-shadow var(--transition);
    }

    .em-select:focus {
        outline: none;
        border-color: var(--primary);
        background-color: var(--bg-white);
        box-shadow: 0 0 0 3px var(--teal-50);
    }

    .em-upload {
        border: 1.5px dashed var(--neutral-300);
        border-radius: var(--radius-lg);
        background: var(--bg-soft);
        padding: 32px 20px;
        min-height: 190px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
        cursor: pointer;
        transition: border-color var(--transition), background var(--transition);
        position: relative;
    }

    .em-upload:hover {
        border-color: var(--primary);
        background: var(--teal-50);
    }

    .em-upload input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }

    .em-upload-icon {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: var(--teal-100);
        color: var(--teal-700);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .em-upload-icon i {
        font-size: 22px;
    }

    .em-upload-title {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
    }

    .em-upload-sub {
        font-size: 11.5px;
        color: var(--text-muted);
    }

    .em-upload-sub b {
        color: var(--primary-dark);
        font-weight: 600;
    }


    .em-preview-panel {
        position: sticky;
        top: 0;
        background: var(--bg-white);
        border: 1px solid var(--neutral-200);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        padding: 18px 18px 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        max-height: calc(100vh - 40px);
        overflow-y: auto;
    }

    .em-preview-label {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .em-preview-empty {
        font-size: 12.5px;
        color: var(--text-muted);
        text-align: center;
        padding: 30px 10px;
        border: 1.5px dashed var(--neutral-200);
        border-radius: var(--radius-lg);
    }

    .em-preview-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .em-preview-item {
        position: relative;
        aspect-ratio: 1 / 1;
        border-radius: var(--radius-md);
        overflow: hidden;
        border: 1px solid var(--neutral-200);
        background: var(--neutral-100);
    }

    .em-preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .em-preview-remove {
        position: absolute;
        top: 4px;
        right: 4px;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.65);
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 13px;
        transition: background 0.15s;
    }

    .em-preview-remove:hover {
        background: #DC2626;
    }

    .em-upload-error {
        font-size: 12px;
        color: #B91C1C;
        min-height: 16px;
    }

    .em-preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
        gap: 10px;
    }

    .em-preview-item {
        position: relative;
        aspect-ratio: 1 / 1;
        border-radius: var(--radius-md);
        overflow: hidden;
        border: 1px solid var(--neutral-200);
        background: var(--neutral-100);
    }

    .em-preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .em-preview-remove {
        position: absolute;
        top: 4px;
        right: 4px;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.65);
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 13px;
        transition: background 0.15s;
    }

    .em-preview-remove:hover {
        background: #DC2626;
    }

    .em-upload-error {
        font-size: 12px;
        color: #B91C1C;
        min-height: 16px;
    }

    .em-form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 18px 26px;
        background: var(--bg-soft);
        border-top: 1px solid var(--neutral-200);
    }

    .em-footer-note {
        font-size: 12px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .em-footer-note i {
        font-size: 15px;
        color: var(--text-muted);
    }

    .em-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
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

    .em-btn i {
        font-size: 16px;
    }

    .em-btn-primary {
        background: var(--primary);
        color: var(--text-white);
        box-shadow: var(--shadow-primary);
    }

    .em-btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    @media (max-width: 760px) {
        .em-layout {
            grid-template-columns: 1fr;
        }

        .em-form-grid {
            grid-template-columns: 1fr;
        }

        .em-field.full {
            grid-column: auto;
        }

        .em-form-footer {
            flex-direction: column;
            align-items: stretch;
        }

        .em-btn {
            width: 100%;
        }
    }

    @media (max-width: 900px) {
        .em-layout {
            grid-template-columns: 1fr;
        }

        .em-preview-panel {
            position: static;
            max-height: none;
        }
    }
</style>

<div class="eventmedia-page">
    <div class="eventmedia-headrow">
        <div class="eventmedia-heading">
            <p>Upload images and connect them to the right event.</p>
        </div>
    </div>

    <!-- toast -->
    <div class="toast-msg" id="toast-msg">
        <i id="toast-icon" class="bi bi-x-circle-fill"></i>
        <span id="toast-text" class="toast-text"></span>
    </div>

    <div class="em-layout">
        <form class="em-form-card" id="event-media-form" method="POST" enctype="multipart/form-data">
            <div class="em-section">
                <div class="em-section-head">
                    <div class="em-section-icon"><i class="ti ti-calendar-event"></i></div>
                    <div>
                        <div class="em-section-title">Select Event</div>
                        <div class="em-section-sub">Choose the event this media belongs to.</div>
                    </div>
                </div>

                <div class="em-form-grid">
                    <div class="em-field full">
                        <label class="em-label" for="em-event">Event <span class="em-req">*</span></label>
                        <select class="em-select" id="em-event" name="event_id" required>
                            <option value="" disabled selected>Select an event</option>
                            <?php
                            $q = "SELECT event.*, institution.name AS institution_name
                                FROM event
                                INNER JOIN institution
                                ON event.institution_id = institution.id
                                ORDER BY event.id DESC";

                            $events_rs = Database::search($q);
                            $events_num = $events_rs->num_rows;

                            for ($e = 0; $e < $events_num; $e++) {
                                $events_data = $events_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $events_data['id']; ?>">
                                    <?php echo $events_data['title']; ?> | <?php echo $events_data['institution_name']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <div class="em-hint">Media will be saved under this event gallery.</div>
                    </div>
                </div>
            </div>

            <div class="em-section">
                <div class="em-section-head">
                    <div class="em-section-icon"><i class="ti ti-photo-plus"></i></div>
                    <div>
                        <div class="em-section-title">Image Upload</div>
                        <div class="em-section-sub">Add media images for the selected event.</div>
                    </div>
                </div>

                <label class="em-upload">
                    <input type="file" id="em-image" name="media_img[]" accept="image/png, image/jpeg, image/webp" multiple>

                    <div class="em-upload-icon"><i class="ti ti-cloud-upload"></i></div>

                    <div class="em-upload-title" id="em-image-name">
                        Click to upload, or drag images here
                    </div>

                    <div class="em-upload-sub">
                        PNG, JPG or WEBP &middot; up to 10MB each &middot; up to <b>10 photos</b>
                    </div>
                </label>

                <div class="em-upload-error" id="em-upload-error"></div>
            </div>

            <div class="em-form-footer">
                <div class="em-footer-note"><i class="ti ti-info-circle"></i> Select an event before uploading media.</div>
                <button class="em-btn em-btn-primary" type="submit">
                    <i class="ti ti-upload"></i> Upload Media
                </button>
            </div>
        </form>

        <aside class="em-preview-panel">
            <div class="em-preview-label">Selected Photos</div>
            <div class="em-preview-empty" id="em-preview-empty">No photos selected yet.</div>
            <div class="em-preview-grid" id="em-preview-grid"></div>
        </aside>

        </form>
    </div>
</div>

<script>
    function showToast(msg, type = 'error') {
        const t = document.getElementById('toast-msg');
        const text = document.getElementById('toast-text');
        const icon = document.getElementById('toast-icon');

        text.textContent = msg;

        if (type === 'success') {
            t.style.backgroundColor = '#15803D';
            t.style.boxShadow = '0 8px 24px rgba(21,128,61,0.28)';
            icon.className = 'bi bi-check-circle-fill';
        } else if (type === 'warning') {
            t.style.backgroundColor = '#D97706';
            t.style.boxShadow = '0 8px 24px rgba(217,119,6,0.28)';
            icon.className = 'bi bi-exclamation-triangle-fill';
        } else {
            t.style.backgroundColor = '#DC2626';
            t.style.boxShadow = '0 8px 24px rgba(220,38,38,0.28)';
            icon.className = 'bi bi-x-circle-fill';
        }

        t.classList.add('show');
        setTimeout(() => t.classList.remove('show'), 3000);
    }

    (function() {
        var imageInput = document.getElementById('em-image');
        var fileNameLabel = document.getElementById('em-image-name');
        var previewGrid = document.getElementById('em-preview-grid');
        var emptyState = document.getElementById('em-preview-empty');
        var form = document.getElementById('event-media-form');


        var MAX_FILES = 10;
        var MAX_SIZE = 10 * 1024 * 1024; // 5MB
        var selectedFiles = [];


        function syncInput() {
            var dt = new DataTransfer();
            selectedFiles.forEach(function(file) {
                dt.items.add(file);
            });
            imageInput.files = dt.files;
        }

        function renderPreviews() {
            previewGrid.innerHTML = '';

            selectedFiles.forEach(function(file, index) {
                var item = document.createElement('div');
                item.className = 'em-preview-item';

                var img = document.createElement('img');
                img.alt = file.name;

                var reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);

                var removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'em-preview-remove';
                removeBtn.innerHTML = '<i class="ti ti-x"></i>';
                removeBtn.addEventListener('click', function() {
                    selectedFiles.splice(index, 1);
                    syncInput();
                    renderPreviews();
                });

                item.appendChild(img);
                item.appendChild(removeBtn);
                previewGrid.appendChild(item);
            });

            var hasFiles = selectedFiles.length > 0;
            emptyState.style.display = hasFiles ? 'none' : 'block';
            previewGrid.style.display = hasFiles ? 'grid' : 'none';

            fileNameLabel.textContent = hasFiles ?
                selectedFiles.length + ' of ' + MAX_FILES + ' photos selected' :
                'Click to upload, or drag images here';
        }

        imageInput.addEventListener('change', function() {
            var incoming = Array.from(imageInput.files || []);

            incoming.forEach(function(file) {
                if (selectedFiles.length >= MAX_FILES) {
                    showToast('You can upload up to ' + MAX_FILES + ' photos.', 'error');
                    return;
                }
                if (file.size > MAX_SIZE) {
                    showToast('"' + file.name + '" is over 10MB and was skipped.', 'error');
                    return;
                }
                var dupe = selectedFiles.some(function(f) {
                    return f.name === file.name && f.size === file.size;
                });
                if (!dupe) selectedFiles.push(file);
            });

            syncInput();
            renderPreviews();
        });

        function uploadEventMedia(form, formData) {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText.trim();
                    if (response === "success") {
                        selectedFiles = [];
                        syncInput();
                        renderPreviews();
                        showToast("Photos uploaded successfully!", "success");
                    } else {
                        showToast(response, "error");
                    }
                }
            };

            xhr.open("POST", "../process/eventMediaUpload.php", true);
            xhr.send(formData);
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            if (selectedFiles.length === 0) {
                showToast('Please select at least one photo to upload.', 'error');
                return;
            }

            var request = new FormData(form);
            uploadEventMedia(form, request);
        });

        renderPreviews();
    })();
</script>