<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | CampusHub</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="icon" href="assets/favicon.svg" type="image/svg+xml" />
  
  <style>
    .gallery-page {
      display: flex;
      flex-direction: column;
      gap: 50px;
      padding: 20px;
    }

    .gallery-heading h1 {
      font-family: var(--font-heading);
      font-size: var(--text-2xl);
      color: var(--text-primary);
      margin-bottom: 4px;
    }

    .gallery-heading p {
      font-size: var(--text-sm);
      color: var(--text-secondary);
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 18px;
    }

    .gallery-empty {
      font-size: 13px;
      color: var(--text-muted);
      text-align: center;
      padding: 50px 10px;
      border: 1.5px dashed var(--neutral-200);
      border-radius: var(--radius-lg);
      grid-column: 1 / -1;
    }

    .egc-card {
      background: var(--bg-white);
      border: 1px solid var(--neutral-200);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-sm);
      overflow: hidden;
      cursor: pointer;
      transition: transform var(--transition), box-shadow var(--transition);
    }

    .egc-card:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md, var(--shadow-sm));
    }

    .egc-banner {
      position: relative;
      aspect-ratio: 16 / 9;
      overflow: hidden;
      background: var(--neutral-100);
    }

    .egc-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.3s ease;
    }

    .egc-card:hover .egc-banner img {
      transform: scale(1.04);
    }

    .egc-photo-badge {
      position: absolute;
      bottom: 10px;
      right: 10px;
      display: flex;
      align-items: center;
      gap: 5px;
      background: rgba(15, 23, 42, 0.65);
      color: white;
      font-size: 11.5px;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: var(--radius-full);
    }

    .egc-photo-badge i {
      font-size: 13px;
    }

    .egc-body {
      padding: 14px 16px;
    }

    .egc-title {
      font-size: var(--text-base);
      font-weight: 600;
      color: var(--text-primary);
      line-height: 1.3;
      margin-bottom: 6px;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .egc-meta {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 12.5px;
      color: var(--text-muted);
    }

    .egc-meta i {
      font-size: 14px;
    }

    /* ─── Gallery Modal ─── */

    .gm-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.45);
      backdrop-filter: blur(3px);
      -webkit-backdrop-filter: blur(3px);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      opacity: 0;
      pointer-events: none;
      padding: 20px;
      transition: opacity var(--transition-s);
    }

    .gm-backdrop.open {
      opacity: 1;
      pointer-events: all;
    }

    .gm-box {
      position: relative;
      background: var(--bg-white);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-xl);
      width: 100%;
      max-width: 1000px;
      max-height: 85vh;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      transform: translateY(12px) scale(0.98);
      transition: transform var(--transition-s);
    }

    .gm-backdrop.open .gm-box {
      transform: translateY(0) scale(1);
    }

    .gm-close {
      position: absolute;
      top: 14px;
      right: 14px;
      width: 34px;
      height: 34px;
      border-radius: 50%;
      border: none;
      background: var(--neutral-100);
      color: var(--neutral-600);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 15px;
      z-index: 2;
      transition: background var(--transition);
    }

    .gm-close:hover {
      background: var(--neutral-200);
    }

    .gm-header {
      padding: 24px 56px 16px 28px;
      border-bottom: 1px solid var(--neutral-100);
      flex-shrink: 0;
    }

    .gm-title {
      font-family: var(--font-heading);
      font-size: var(--text-xl);
      color: var(--neutral-800);
      margin-bottom: 4px;
    }

    .gm-sub {
      font-size: var(--text-sm);
      color: var(--text-secondary);
      margin-bottom: 8px;
    }

    .gm-date-row {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 12.5px;
      color: var(--text-muted);
    }

    .gm-photos {
      flex: 1;
      overflow-y: auto;
      padding: 20px 28px 28px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
    }

    .gm-photos::-webkit-scrollbar {
      width: 5px;
    }

    .gm-photos::-webkit-scrollbar-thumb {
      background: var(--neutral-300);
      border-radius: 4px;
    }

    .gm-photos img {
      width: 100%;
      aspect-ratio: 4 / 3;
      object-fit: cover;
      border-radius: var(--radius-md);
      border: 1px solid var(--neutral-200);
      background: var(--neutral-100);
    }

    @media (max-width: 480px) {
      .gm-photos {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>

  <!-- ===================== HEADER ===================== -->
  <?php
  include "header.php";
  ?>
  <br><br><br><br>
  <div class="gallery-page">
    <div class="gallery-heading">
      <h1>Event Gallery</h1>
      <p>Browse photos from past and upcoming events.</p>
    </div>
    <?php
    // Fetch only events that have images (INNER JOIN filters the rest)
    $rs = Database::search("
    SELECT
        e.id          AS event_id,
        e.banner_img,
        e.title,
        e.date,
        i.name        AS institution_name,
        ei.path       AS photo_path
    FROM event e
    INNER JOIN institution i  ON e.institution_id = i.id
    INNER JOIN event_images ei ON ei.event_id = e.id
    ORDER BY e.id DESC, ei.id ASC
");

    // Group rows by event
    $events_map = [];
    while ($row = $rs->fetch_assoc()) {
      $eid = $row['event_id'];
      if (!isset($events_map[$eid])) {
        $events_map[$eid] = [
          'id'        => (int)$eid,
          'title'     => $row['title'],
          'date'      => $row['date'],
          'banner'    => $row['banner_img'],
          'institute' => $row['institution_name'],
          'photos'    => []
        ];
      }
    $events_map[$eid]['photos'][] = $row['photo_path'];
    }
    $gallery_events = array_values($events_map);
    ?>

    <div class="gallery-grid" id="gallery-grid">
      <?php if (empty($gallery_events)): ?>
        <div class="gallery-empty">No gallery photos available yet.</div>
      <?php else: ?>
        <?php foreach ($gallery_events as $ev): ?>
          <div class="egc-card" onclick="openGalleryModal(<?= $ev['id'] ?>)">
            <div class="egc-banner">
              <img src="uploads/events/<?= htmlspecialchars($ev['banner']) ?>"
                alt="<?= htmlspecialchars($ev['title']) ?>">
              <span class="egc-photo-badge">
                <i class="ti ti-photo"></i> <?= count($ev['photos']) ?>
              </span>
            </div>
            <div class="egc-body">
              <div class="egc-title"><?= htmlspecialchars($ev['title']) ?></div>
              <div class="egc-meta">
                <i class="ti ti-calendar"></i>
                <?= date('M j, Y', strtotime($ev['date'])) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <!-- Gallery Modal -->
  <div class="gm-backdrop" id="galleryModal" onclick="closeGalleryModalBackdrop(event)">
    <div class="gm-box" role="dialog" aria-modal="true" aria-labelledby="gmTitle">
      <button class="gm-close" onclick="closeGalleryModal()" aria-label="Close"><i class="ti ti-x"></i></button>

      <div class="gm-header">
        <h2 class="gm-title" id="gmTitle">Event title</h2>
        <div class="gm-sub" id="gmInstitute">Institute name</div>
        <div class="gm-date-row"><i class="ti ti-calendar"></i> <span id="gmDate">Date</span></div>
      </div>

      <div class="gm-photos" id="gmPhotos"></div>
    </div>
  </div>

  <!-- ===================== FOOTER ===================== -->
  <?php include "footer.php"; ?>


  <script src="js/main.js"></script>
  <script>
    var galleryData = <?= json_encode($gallery_events, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

    function openGalleryModal(eventId) {
      var ev = galleryData.find(function(e) {
        return e.id === eventId;
      });
      if (!ev) return;

      document.getElementById('gmTitle').textContent = ev.title;
      document.getElementById('gmInstitute').textContent = ev.institute;
      document.getElementById('gmDate').textContent = formatGalleryDate(ev.date);

      var wrap = document.getElementById('gmPhotos');
      wrap.innerHTML = '';
      ev.photos.forEach(function(src) {
        var img = document.createElement('img');
        img.src = src;
        img.alt = ev.title;
        wrap.appendChild(img);
      });

      document.getElementById('galleryModal').classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    function closeGalleryModal() {
      document.getElementById('galleryModal').classList.remove('open');
      document.body.style.overflow = '';
    }

    function closeGalleryModalBackdrop(e) {
      if (e.target === document.getElementById('galleryModal')) closeGalleryModal();
    }

    function formatGalleryDate(d) {
      var dt = new Date(d + 'T00:00:00');
      return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][dt.getMonth()] +
        ' ' + dt.getDate() + ', ' + dt.getFullYear();
    }

    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeGalleryModal();
    });
  </script>
</body>

</html>