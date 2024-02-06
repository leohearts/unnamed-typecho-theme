window.onload = ()=>{
    if (window.bypassFslightbox == true) {
        return;
    }
    try{
        for(ex of document.getElementsByClassName("postPost")[0].querySelectorAll("img")){
            var newImageItem = ex.cloneNode();
            var newItem = document.createElement('a');
            newItem.href = ex.src;
            newItem.setAttribute('data-fslightbox', 'gallery');
            newImageItem.loading = "lazy";
            newItem.append(newImageItem);
            ex.parentNode.replaceWith(newItem);
        }
        refreshFsLightbox()
        fsLightbox.props.type = 'image';
        refreshFsLightbox()
    } catch(e) {console.warn(e)}
}
