let delay = false;
document.addEventListener('click', function(e) {
    statHandler(e, 'likes');
}, true);

function statHandler(event, type) {
    if (!event.target.classList.contains('set-' + type)) {
        return;
    }
    event.stopPropagation();
    if (delay) {
        event.preventDefault();
        return;
    }
    delay = true;
    const cid = event.target.dataset.cid;
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