

function expandMakePost(){
    let aside = document.getElementById("make-post-container"); 
    aside.classList.toggle("hide");
    aside.classList.toggle("flex-column");
    
}
document.getElementById("theme-toggle").addEventListener("click", function () {
    document.documentElement.classList.toggle("Atu-theme");
});