const feed = document.getElementById("comment-container");
let comment = "";
for (let i = 0; i < 2; i++) {
    comment+=`
     <div>
        <p class="other-comment">Yeah i dunno<img src="../assets/UI/unlike.png" name="unlike" alt="unlike">
        <img src="../assets/UI/like.png" name="like" alt="like"></p>
        
        
    </div>
    `;
    
}

document.getElementById("comment-container");
feed.innerHTML=comment;