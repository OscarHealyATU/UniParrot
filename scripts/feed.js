for (let i = 0; i < 20; i++) {
    document.writeln(`
    <article>
         <img src="profile_000${i}.png" alt="profile_000${i}" srcset="assets/profile/profile_000${i}.png" onerror="noProfile(this)">
            <div>
                <h3>Post Title</h3>
                <strong>username</strong>
                <p>Post body</p>
            </div>
    </article>
        `);
    
}
function noProfile(image) {
    image.onerror = null;
    image.src = 'assets/profile/noProfile.png'; 
}