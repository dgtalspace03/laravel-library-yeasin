//
// resources/js/app.js
import './bootstrap';
const hash = location.hash;
if (hash) {
    const t = document.querySelector('[data-bs-target="' + hash + '"]');
    if (t) bootstrap.Tab.getOrCreateInstance(t).show();
}
document.querySelectorAll('#adminTabs [data-bs-toggle="tab"]').forEach(function (btn) {
    btn.addEventListener('shown.bs.tab', function (e) {
        history.replaceState(null, '', e.target.dataset.bsTarget);
    });
});
