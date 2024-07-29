/*
friendsData = [
    {
        "name": "zeocax",
        "image": "http://qwq",
        "href": "qwq"
    }
]
*/
window.onload = (() => {
    let friendsRoot = document.getElementsByClassName("friends-grid")[0];
    friendsData.forEach(e => {
        let friendEntry = document.createElement("a");
        friendEntry.classList = "friends mdui-ripple";
        friendEntry.href = e.href;
        let friendImage = document.createElement("img");
        friendImage.src = e.image;
        friendImage.alt = e.name;
        let friendName = document.createElement("p");
        friendName.innerText = e.name;
        if (e.style != undefined) {
            if ("fontFamily" in e.style) {
                let x = document.createElement("link");
                x.rel = "stylesheet";
                x.href = "https://fonts.googleapis.com/css?family=" + e.style.fontFamily;
                document.head.appendChild(x);
            }
            for (entry in e.style) {
                friendName.style[entry] = e.style[entry];
            }
        }
        if (e.broken == true) {
            friendEntry.classList.add("broken");
        }
        friendEntry.appendChild(friendImage);
        friendEntry.appendChild(friendName);
        friendsRoot.appendChild(friendEntry);
    })
})