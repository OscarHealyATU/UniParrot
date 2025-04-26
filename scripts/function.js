const postPrompt = document.getElementById("postPrompt");
if (postPrompt) {

    const offset = postPrompt.offsetTop;
    window.addEventListener("scroll", () => {
        if (window.scrollY >= offset) {
            // alert("ha");
            postPrompt.classList.add("postPrompt");
        } else {
            postPrompt.classList.remove("postPrompt");
        }
    });
}

function expandMakePost() {
    let aside = document.getElementById("make-post-container");
    aside.classList.toggle("hide");
    aside.classList.toggle("flex-column");

}
document.getElementById("theme-toggle").addEventListener("click", function () {
    document.documentElement.classList.toggle("Atu-theme");
});