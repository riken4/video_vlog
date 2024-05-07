// JavaScript code for handling like and dislike actions
document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to like buttons
    document.querySelectorAll('.like-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            handleLikeDislike(this.dataset.videoId, 'like');
        });
    });

    // Add event listener to dislike buttons
    document.querySelectorAll('.dislike-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            handleLikeDislike(this.dataset.videoId, 'dislike');
        });
    });
});

function handleLikeDislike(videoId, action) {
    // Send AJAX request to handle like/dislike action
    // Here you can use XMLHttpRequest or fetch API to send the request to your server-side script
    // For simplicity, let's assume you have a PHP script to handle like/dislike actions named handle_like_dislike.php
    fetch('handle_like_dislike.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            videoId: videoId,
            action: action
        })
    })
    .then(response => response.json())
    .then(data => {
        // Update like and dislike counts on the UI
        const likeCountElem = document.querySelector(`[data-video-id="${videoId}"] .like-count`);
        const dislikeCountElem = document.querySelector(`[data-video-id="${videoId}"] .dislike-count`);
        likeCountElem.textContent = data.likes;
        dislikeCountElem.textContent = data.dislikes;
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
