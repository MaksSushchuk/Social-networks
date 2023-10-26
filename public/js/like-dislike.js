let btnLike = document.querySelectorAll('.btn-like');
let btnDislike = document.querySelectorAll('.btn-dislike');
let xhttp = new XMLHttpRequest();
let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

btnLike.forEach((item,i) => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        const postId = this.getAttribute('data-post-id');

        xhttp.open("POST", "/user/like/" + postId, true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader('Content-Type', 'application/json');

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (item.classList.contains('green')) {
                    item.classList.remove('green');
                } else {
                    item.classList.add('green');
                }
            }
        };

        btnDislike[i].classList.remove('red');

        xhttp.send();
    });
});

btnDislike.forEach( (item, i) => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        const postId = this.getAttribute('data-post-id');

        xhttp.open("POST", "/user/dislike/" + postId, true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader('Content-Type', 'application/json');

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (item.classList.contains('red')) {
                    item.classList.remove('red');
                } else {
                    item.classList.add('red');
                }
            }
        };

        btnLike[i].classList.remove('green');
        xhttp.send();
    });
});
