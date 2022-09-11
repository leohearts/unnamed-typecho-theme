<?php
/**
 * 自定义页面模板
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

<a class="friends mdui-ripple" href="https://blog.zeocax.com">
    <img src="https://s.gravatar.com/avatar/f52b015f36302810cdb7f09975c34761?s=80" alt="zeocax">
    <p>zeocax</p>
</a>
<a class="friends mdui-ripple" href="https://aza.moe/">
    <img src="https://s.gravatar.com/avatar/46b483928e584f6e725daf6e7e87a502?s=80" alt="小桂桂">
    <p>Hykilpikonna</p>
</a>
<a class="friends mdui-ripple" href="https://absolute-field.github.io/">
    <img src="https://absolute-field.github.io/favicon.ico" alt="absolute_field">
    <p>absolute_field</p>
</a>
<a class="friends mdui-ripple" href="https://nexmoe.com/">
    <img src="https://cdn.jsdelivr.net/gh/nexmoe/nexmoe.github.io@latest/images/avatar.png" alt="折影轻梦">
    <p>折影轻梦</p>
</a>
<a class="friends mdui-ripple" href="https://amagi.yukisaki.io/">
    <img src="https://amagi.yukisaki.io/wp-content/uploads/2020/02/IMG_3793.jpeg" alt="Amagiii">
    <p>Amagiii</p>
</a>
<a class="friends mdui-ripple" href="https://afkl-cuit.github.io">
    <img src="https://secure.gravatar.com/avatar/7e0f346c9d7025daf3b7ff7cf9044e4f?s=220&r=X&d=mm" alt="AFKL">
    <p>AFKL</p>
</a>
<a class="friends mdui-ripple" href="https://lingze.xyz/">
    <img src="https://lingze.xyz/img/avatar2.jpg" alt="Lingze">
    <p>Lingze</p>
</a>
<a class="friends mdui-ripple" href="https://morblog.cc/">
    <img src="https://i.loli.net/2020/12/18/DXnNKfHB8TaW6tZ.jpg" alt="Morouu">
    <p>Morouu</p>
</a>
<a class="friends mdui-ripple" href="https://nyac.at">
    <img src="https://s.gravatar.com/avatar/091b83bdf6f0bb2a6a125fd2497e7336?s=80&r=x" alt="凌莞 Clansty">
    <p>凌莞 Clansty</p>
</a>
<a class="friends mdui-ripple" href="https://men.ci">
    <img src="https://s.gravatar.com/avatar/098be10e0980598d81978267ac70c1fd?s=80" alt="menci">
    <p>Menci</p>
</a>
<a class="friends mdui-ripple" href="https://estela.moe">
    <img src="https://estela.moe/assets/images/head.jpg" alt="estela">
    <p>山前<del>小娘鱼</del></p>
</a>

                    </div>
            </div>
        </div>
    <?php endwhile; ?>

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
