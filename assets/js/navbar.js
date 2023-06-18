const tabs = document.getElementsByClassName("nav-hover");
Array.from(tabs).forEach(element => {
    if (element.getAttribute("href").startsWith(window.location.pathname)) {
        element.classList.remove("nav-hover");
        element.classList.add("current-nav-tab");
        return;
    }
});