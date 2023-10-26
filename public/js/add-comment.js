let commentForms = document.querySelectorAll('.user-comment');

commentForms.forEach((item, i) => {
    let commentForm = item.querySelector('#comment-form'); 
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    commentForm.addEventListener('submit', function (e) {
        e.preventDefault();

        let postId = item.getAttribute('data-post-id'); // Отримуємо postId з .user-comment
        let text = commentForm.querySelector('#comment-text').value;

        let xhttp = new XMLHttpRequest();

        xhttp.open("POST", "/user/comment/" + postId, true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader('Content-Type', 'application/json');

        xhttp.onreadystatechange = function () {
            if (xhttp.status === 200 && xhttp.readyState === 4) {
                // Опрацьовуйте відповідь від сервера
            }
        }

        let data = {
            postId: postId,
            text: text,
        };
        console.log(data);
        xhttp.send(JSON.stringify(data));
    });
});
