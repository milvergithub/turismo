<style type="text/css">
    .carousel-fade .carousel-inner .item {
        opacity: 0;
        transition-property: opacity;
    }
    .carousel-fade .carousel-inner .active {
        opacity: 1;
    }
    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        left: 0;
        opacity: 0;
        z-index: 1;
    }
    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
    }
    .carousel-fade .carousel-control {
        z-index: 2;
    }
    @media all and (transform-3d),
    (-webkit-transform-3d) {
        .carousel-fade .carousel-inner > .item.next,
        .carousel-fade .carousel-inner > .item.active.right {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.prev,
        .carousel-fade .carousel-inner > .item.active.left {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.next.left,
        .carousel-fade .carousel-inner > .item.prev.right,
        .carousel-fade .carousel-inner > .item.active {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    .item:nth-child(1) {
        background: url(img/7.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(2) {
        background: url(img/2.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(3) {
        background: url(img/3.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(4) {
        background: url(img/4.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(5) {
        background: url(img/5.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(6) {
        background: url(img/6.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(7) {
        background: url(img/1.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(8) {
        background: url(img/8.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .item:nth-child(9) {
        background: url(img/9.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .carousel {
        z-index: -99;
    }
    .carousel .item {
        position: fixed;
        width: 100%;
        height: 100%;
    }
    .title {
        text-align: center;
        margin-top: 20px;
        padding: 10px;
        text-shadow: 2px 2px #000;
        color: #FFF;
    }
</style>