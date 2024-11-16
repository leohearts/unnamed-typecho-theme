let delay = false;
let like_clicked_times = 0;
document.addEventListener('click', function(e) {
    likesStatHandler(e, 'likes');
}, true);

function doUpdate(type, cid) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/index.php/action/stat?do=' + type + '&cid=' + cid, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            const data = JSON.parse(xhr.responseText);
            const gets = document.querySelector('.get-' + type + '[data-cid="' + cid + '"]');
            if (gets) {
                gets.textContent = data.total;
            }
        } else {
            console.error('请求失败: ' + xhr.statusText);
        }
        delay = false;
    };
    xhr.send();
}

function likesStatHandler(event, type) {
    if (!event.target.classList.contains('set-' + type)) {
        return;
    }
    event.stopPropagation();
    if (delay) {
        event.preventDefault();
        return;
    }
    if (like_clicked_times > 5) {
        event.target.innerText = "不可以再点啦";
        event.target.style.position = "absolute";
        event.target.style.top =
            (Math.random() * window.innerHeight - 50) + 'px';
        event.target.style.left =
            (Math.random() * window.innerWidth - 50) + 'px';
    }
    delay = true;
    like_clicked_times += 1;
    const cid = event.target.dataset.cid;
    doUpdate(type, cid);
}