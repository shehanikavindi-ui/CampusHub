document.addEventListener("DOMContentLoaded", () => {
  const navbar = document.querySelector(".navbar");
  const toggle = document.querySelector(".navbar__toggle");

  if (!navbar || !toggle) {
    return;
  }

  const closeMenu = () => {
    navbar.classList.remove("is-open");
    toggle.setAttribute("aria-expanded", "false");
    toggle.setAttribute("aria-label", "Open menu");
    toggle.textContent = "\u2630";
  };

  const openMenu = () => {
    navbar.classList.add("is-open");
    toggle.setAttribute("aria-expanded", "true");
    toggle.setAttribute("aria-label", "Close menu");
    toggle.textContent = "\u00d7";
  };

  toggle.setAttribute("aria-expanded", "false");

  toggle.addEventListener("click", () => {
    if (navbar.classList.contains("is-open")) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  navbar.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", closeMenu);
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 980) {
      closeMenu();
    }
  });
});

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

function registerEvent(eid) {
  var eventId = eid;

  var form = new FormData();
  form.append("ei", eventId);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        showToast("Registered!", "success");
        setTimeout(() => {
          window.location.reload();
        }, 1500);
      } else {
        showToast("Something went wrong. Please try again.");
      }
    }
  }
  request.open("POST", "/CampusHub/process/registerEvent.php", true);
  request.send(form);
}

function gotoLogin() {
  window.location = "auth/studentLogin.php";
}