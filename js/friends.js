/*
friendsData = [
    {
        "name": "zeocax",
        "image": "http://qwq",
        "href": "qwq",
        "description": "一只爱折腾的绯鞠，是非常高产又有爱的博主",
        "style": {
            "fontFamily": "Borel"
        },
        "join": "2024年的秋天"

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
        let friendData = document.createElement("div");
        friendData.className = "friendData";

        let friendJoin = document.createElement("span");
        friendJoin.className = "friendJoin";
        friendJoin.innerText = e.join || "";
        friendData.appendChild(friendJoin);

        let friendName = document.createElement("p");
        friendName.className = "friendName";
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
        friendData.appendChild(friendName);

        let friendDesc = document.createElement("span");
        friendDesc.className = "friendDesc";
        friendDesc.innerText = e.description || "";
        friendData.appendChild(friendDesc);

        if (e.broken == true) {
            friendEntry.classList.add("broken");
        }
        friendEntry.appendChild(friendImage);

        friendEntry.appendChild(friendData);
        friendsRoot.appendChild(friendEntry);
    })
})
