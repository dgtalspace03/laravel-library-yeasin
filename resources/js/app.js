//
// resources/js/app.js
import "./bootstrap";
const hash = location.hash;
if (hash) {
    const t = document.querySelector('[data-bs-target="' + hash + '"]');
    if (t) bootstrap.Tab.getOrCreateInstance(t).show();
}
document
    .querySelectorAll('#adminTabs [data-bs-toggle="tab"]')
    .forEach(function (btn) {
        btn.addEventListener("shown.bs.tab", function (e) {
            history.replaceState(null, "", e.target.dataset.bsTarget);
        });
    });

let book_filter = document.getElementById("homeFilters");
if (book_filter) {
    let filters = book_filter.querySelectorAll("button");
    Array.from(filters).forEach((filter) => {
        filter.addEventListener("click", () => {
            const url = new URL(window.location.href);
            let category = filter.dataset.category;
            if (category === "All") {
                url.searchParams.delete("category");
            } else {
                url.searchParams.set("category", category);
            }

            url.hash = "catalog";
            window.location.href = url;
        });
    });
}

const borrow_filter = document.getElementById("borrow_filter");
if(borrow_filter){
    borrow_filter.addEventListener("change", (e) => {
    let val= e.target.value;
    const url= new URL(window.location.href);
    if(val=='All'){
        url.searchParams.delete('filter');
    }else{
        url.searchParams.set('filter',val);
    }
    url.hash = "catalog";
    window.location.href=url;

});
}
