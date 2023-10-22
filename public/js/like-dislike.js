let btnLike = document.querySelectorAll('.btn-like');
let btnDislike = document.querySelectorAll('.btn-dislike');

btnLike.forEach(function(likeButton) {
    likeButton.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        if (this.classList.contains('green')) {
            this.classList.remove('green');
        } else {
            this.classList.add('green');
        }

        // Знайдіть відповідний дизлайк і видаліть клас "red"
        const correspondingDislikeButton = document.querySelector('.btn-dislike[data-post-id="' + postId + '"]');
        if (correspondingDislikeButton && correspondingDislikeButton.classList.contains('red')) {
            correspondingDislikeButton.classList.remove('red');
        }
    });
});

btnDislike.forEach(function(dislikeButton) {
    dislikeButton.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        if (this.classList.contains('red')) {
            this.classList.remove('red');
        } else {
            this.classList.add('red');
        }

        // Знайдіть відповідний лайк і видаліть клас "green"
        const correspondingLikeButton = document.querySelector('.btn-like[data-post-id="' + postId + '"]');
        if (correspondingLikeButton && correspondingLikeButton.classList.contains('green')) {
            correspondingLikeButton.classList.remove('green');
        }
    });
});
