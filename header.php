<!DOCTYPE html>
<html lang="zh-cn">
<?php $this->header(); ?>
<meta http-equiv="content-type" content="text/html; charset=UTF8" />

<meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=5.0, minimum-scale=0.86">

<head>
    <title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;1,200;1,300&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;1,200;1,300&display=swap">
    </noscript>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap">
    </noscript>
    <link rel="preload" href="<?php $this->options->themeUrl('css/prism.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/prism.css'); ?>">
    </noscript>
    <!-- require APlayer -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css"></noscript>
    <script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js" defer></script>
    <!-- require MetingJS -->
    <script src="https://cdn.jsdelivr.net/npm/meting@2/dist/Meting.min.js" defer></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('css/main.css'); ?>" />
    <script src="<?php $this->options->themeUrl('js/prism.js'); ?>" async></script>
    <?php if ($this->is('post')) : ?>
        <script src="<?php $this->options->themeUrl('js/post.js'); ?>" async></script>
        <script src="<?php $this->options->themeUrl('js/fslightbox.js'); ?>" async defer></script>
    <?php endif; ?>
</head>

<body>
<!--     blurhash -->
    <script>const digit="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz#$%*+,-.:;=?@[]^_{|}~",decode83=(e,o,r)=>{let n=0;for(;o<r;)n*=83,n+=digit.indexOf(e[o++]);return n},pow=Math.pow,PI=Math.PI,PI2=2*PI,d=3294.6,e=269.025,sRGBToLinear=o=>o>10.31475?pow(o/e+.052132,2.4):o/d,linearTosRGB=o=>~~(o>1227e-8?e*pow(o,.416666)-13.025:o*d+1),signSqr=e=>(e<0?-1:1)*e*e,fastCos=e=>{for(e+=PI/2;e>PI;)e-=PI2;const o=1.27323954*e-.405284735*signSqr(e);return.225*(signSqr(o)-o)+o};function decodeBlurHash(e,o,r,n){const s=decode83(e,0,1),i=s%9+1,t=1+~~(s/9),d=i*t,a=(decode83(e,1,2)+1)/13446*(1|n),f=new Float64Array(3*d);let c=decode83(e,2,6);f[0]=sRGBToLinear(c>>16),f[1]=sRGBToLinear(c>>8&255),f[2]=sRGBToLinear(255&c);let l=0,B=0,I=0,P=0,g=0,G=0,R=0,T=0,p=0,q=0,w=0,S=0,u=0;for(l=1;l<d;l++)c=decode83(e,4+2*l,6+2*l),f[3*l]=signSqr(~~(c/361)-9)*a,f[3*l+1]=signSqr(~~(c/19)%19-9)*a,f[3*l+2]=signSqr(c%19-9)*a;const C=4*o,L=new Uint8ClampedArray(C*r);for(P=0;P<r;P++)for(S=PI*P/r,I=0;I<o;I++){for(g=0,G=0,R=0,u=PI*I/o,B=0;B<t;B++)for(p=fastCos(S*B),l=0;l<i;l++)T=fastCos(u*l)*p,q=3*(l+B*i),g+=f[q]*T,G+=f[q+1]*T,R+=f[q+2]*T;w=4*I+P*C,L[w]=linearTosRGB(g),L[w+1]=linearTosRGB(G),L[w+2]=linearTosRGB(R),L[w+3]=255}return L}</script>
    <script>
    function wrapImage(el, wrapper) {
        el.parentNode.insertBefore(wrapper, el);
        wrapper.appendChild(el);
    }
    function displayBlurhash(node){
        if (node.tagName != "IMG" || node.parentNode.className == "imgParent" || !node.getAttribute("blurhash")) {return}
        node.style.opacity = 0
        node.style.transition = "0.5s linear"
        node.addEventListener("load", (e)=>{e.target.style.opacity = 1})
        decodedDataArray = decodeBlurHash(node.getAttribute("blurhash"), 64, 64);
        const canvas = document.createElement('canvas');
        canvas.height=64;canvas.width=64;
        const ctx = canvas.getContext('2d');
        ctx.putImageData(new ImageData(decodedDataArray, 64, 64),0 ,0)
        wrapImage(node, document.createElement("div"))
        node.parentNode.classList.add("imgParent")
        node.parentNode.style.backgroundImage = "url(" + canvas.toDataURL() + ")";
    }
    const targetNode = document.body;
    const config = {subtree: true, childList: true};
    const callback = function(mutationsList, observer) {
        for(const mutation of mutationsList) {
            for (const node of mutation.addedNodes) {
                try{
                    displayBlurhash(node)
                }catch(e){console.warn(e)}
            }
        }
    };
    const observer = new MutationObserver(callback);
    observer.observe(targetNode, config);
    </script>
    <div class="headbar">
        <div class="descriptions">
            <h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
            <p><?php $this->options->description() ?></p>
        </div>
        <div class="navigations">
            <?php $this->widget('Widget_Contents_Page_List')
                ->parse('<a href="{permalink}">{title}</a>'); ?>
        </div>
    </div>
