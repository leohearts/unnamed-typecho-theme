window.onload = ()=>{
    try{
        [].forEach.call(document.getElementsByClassName("postPost")[0].querySelectorAll("img"), e => {
            var newImageItem = e.cloneNode();
            var newItem = document.createElement('a');
            newItem.href = e.src;
            newItem.setAttribute('data-fslightbox', 'gallery');
            newImageItem.loading = "lazy";
            newItem.append(newImageItem);
            e.parentNode.replaceWith(newItem);
        })
    }
}
