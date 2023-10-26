let buttonShowComment = document.querySelectorAll('.show-comments-button');
let commentsContainer = document.querySelectorAll('.comments');


buttonShowComment.forEach((item,i) =>{

    item.addEventListener('click',(e) =>{
        if (commentsContainer[i].style.display === 'none' || commentsContainer[i].style.display === '') {
            commentsContainer[i].style.display = 'block';
            item.textContent = 'Приховати коментарі';
        } else {
            commentsContainer[i].style.display = 'none';
            item.textContent = 'Показати коментарі';
    
    }
    })
    
})
