<?php
/**
 * 友链
 *
 * @package custom
 */

$this->need('header.php'); ?>

<div class="main">
    <?php while ($this->next()) : ?>
        <div class="postPost">
            <div class="postText">
                <h1 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    <div class="entryText">
                        <?php $this->content(''); ?>
                        <div class="friends-grid">
                        </div>

                    </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php $this->need('comments.php'); ?>
</div>

<style>
.friends-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(23em, 1fr));
}
.friends {
    display: flex;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.07),0 1px 5px 0 rgba(0,0,0,.1);
    margin: 10px 20px 10px 0px;
    transition: all 0.3s;
}
.friends:hover{
    box-shadow: 0px 2px 10px 0px gray;
    transition: all 0.3s;
}
.friends img {
    height: 100px;
    width: 100px;
}
.friends p {
    color: gray;
    font-size: 30px;
    margin: 0 auto;
    align-self: center;
}
.friends p:hover {
    color: #ff4e6a;
    transition: all .35s;
}
</style>
<script>
/*
friendsData = [
    {
        "name": "zeocax",
        "image": "http://qwq",
        "href": "qwq"
    }
]
*/
window.onload = (()=>{
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
        friendEntry.appendChild(friendImage);
        friendEntry.appendChild(friendName);
        friendsRoot.appendChild(friendEntry);
    })
})
</script>

<?php $this->need("footer.php"); ?>
