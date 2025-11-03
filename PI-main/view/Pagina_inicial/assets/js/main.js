const likeBtn = document.getElementById('action-like');

likeBtn.addEventListener('click', function() {
    const videoId = this.dataset.videoId;

    fetch('curtir.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id_video=' + videoId
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            document.getElementById('likes-count-' + videoId).textContent = data.total_likes;
            this.textContent = data.curtido ? '💔 Descurtir' : '❤️ Curtir';
        } else {
            alert(data.message);
        }
    });
});
