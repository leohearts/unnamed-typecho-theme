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
    like_clicked_times += 1;
    const cid = event.target.dataset.cid;
    if (like_clicked_times > 5) {
        const gets = document.querySelector('.get-' + type + '[data-cid="' + cid + '"]');
        gets.innerText = "不可以再点啦";
        const sets = document.querySelector('.set-' + type + '[data-cid="' + cid + '"]');
        sets.style.position = "absolute";
        sets.style.top =
            (Math.random() * (window.innerHeight - 50)) + 'px';
        sets.style.left =
            (Math.random() * (window.innerWidth - 50)) + 'px';
        sets.style.zIndex = 114514;
        return;
    }
    delay = true;
    doUpdate(type, cid);
}