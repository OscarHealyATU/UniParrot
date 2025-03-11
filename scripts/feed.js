const feed = document.getElementById("feed-container-main");
let content = "";
for (let i = 0; i < 20; i++) {
    content+= `
    <article>
         <img src="profile_000${i}.png" alt="profile_000${i}" srcset="assets/profile/noProfile.png">
            <div>
                <h3>Post Title</h3>
                <strong>username</strong>
                <p>Post body</p>
            </div>
    </article>
        `;
}
// content feed
feed.innerHTML=content;
