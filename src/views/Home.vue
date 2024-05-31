<template>
    <div class="wrapper">

    <section class="banner">
        <div class="banner-img">
            <img src="../assets/Image/home/Banner/food01.svg" alt="food01" class="food01" draggable="false">
            <img src="../assets/Image/home/Banner/food02.svg" alt="food02" class="food02" draggable="false">
            <img src="../assets/Image/home/Banner/food03.svg" alt="food03" class="food03" draggable="false">
            <img src="../assets/Image/home/Banner/food04.svg" alt="food04" class="food04" draggable="false">
            <img src="../assets/Image/home/Banner/food05.svg" alt="food05" class="food05" draggable="false">
            <img src="../assets/Image/home/Banner/food06.svg" alt="food06" class="food06" draggable="false">
            <img src="../assets/Image/home/Banner/food07.svg" alt="food07" class="food07" draggable="false">
            <img src="../assets/Image/home/Banner/food08.svg" alt="food08" class="food08" draggable="false">
            <img src="../assets/Image/home/Banner/food09.svg" alt="food09" class="food09" draggable="false">
            <img src="../assets/Image/home/Banner/food10.svg" alt="food10" class="food10" draggable="false">
            <img src="../assets/Image/home/Banner/food11.svg" alt="food11" class="food11" draggable="false">
            <img src="../assets/Image/home/Banner/food12.svg" alt="food12" class="food12" draggable="false">
            <img src="../assets/Image/home/Banner/food13.svg" alt="food13" class="food13" draggable="false">
            <img src="../assets/Image/home/Banner/food14.svg" alt="food14" class="food14" draggable="false">
            <img src="../assets/Image/home/Banner/food15.svg" alt="food15" class="food15" draggable="false">
            <img src="../assets/Image/home/Banner/food16.svg" alt="food16" class="food16" draggable="false">
            <img src="../assets/Image/home/Banner/food17.svg" alt="food17" class="food17" draggable="false">
            <img src="../assets/Image/home/Banner/food18.svg" alt="food18" class="food18" draggable="false">
            <img src="../assets/Image/home/Banner/food19.svg" alt="food19" class="food19" draggable="false">
            <img src="../assets/Image/home/Banner/food20.svg" alt="food20" class="food20" draggable="false">
            <img src="../assets/Image/home/Banner/food01.svg" alt="food01" class="food21" draggable="false">
            <img src="../assets/Image/home/Banner/food02.svg" alt="food02" class="food22" draggable="false">
            <img src="../assets/Image/home/Banner/food03.svg" alt="food03" class="food23" draggable="false">
            <img src="../assets/Image/home/Banner/food04.svg" alt="food04" class="food24" draggable="false">
            <img src="../assets/Image/home/Banner/food05.svg" alt="food05" class="food25" draggable="false">
            <img src="../assets/Image/home/Banner/food06.svg" alt="food06" class="food26" draggable="false">
            <img src="../assets/Image/home/Banner/food07.svg" alt="food07" class="food27" draggable="false">
            <img src="../assets/Image/home/Banner/food08.svg" alt="food08" class="food28" draggable="false">
            <img src="../assets/Image/home/Banner/food09.svg" alt="food09" class="food29" draggable="false">
            <img src="../assets/Image/home/Banner/food10.svg" alt="food10" class="food30" draggable="false">
            <img src="../assets/Image/home/Banner/food11.svg" alt="food11" class="food31" draggable="false">
            <img src="../assets/Image/home/Banner/food12.svg" alt="food12" class="food32" draggable="false">
            <img src="../assets/Image/home/Banner/food13.svg" alt="food13" class="food33" draggable="false">
            <img src="../assets/Image/home/Banner/food14.svg" alt="food14" class="food34" draggable="false">
            <img src="../assets/Image/home/Banner/food15.svg" alt="food15" class="food35" draggable="false">
            <img src="../assets/Image/home/Banner/food16.svg" alt="food16" class="food36" draggable="false">
            <img src="../assets/Image/home/Banner/food17.svg" alt="food17" class="food37" draggable="false">
            <img src="../assets/Image/home/Banner/food18.svg" alt="food18" class="food38" draggable="false">
            <img src="../assets/Image/home/Banner/food19.svg" alt="food19" class="food39" draggable="false">
            <img src="../assets/Image/home/Banner/food20.svg" alt="food20" class="food40" draggable="false">
        </div>
        <div class="banner-txt">
            <h1>梨花韓食</h1>
            <h2>體驗正宗韓國美食文化的饗宴</h2>
        </div>
    </section>

    <section class="intro">
        <img src="../assets/Image/home/Intro/cloud.svg" alt="cloud1" class="home_cloud1" draggable="false">
        <img src="../assets/Image/home/Intro/cloud.svg" alt="cloud2" class="home_cloud2" draggable="false">
        <img src="../assets/Image/home/Intro/cloud.svg" alt="cloud3" class="home_cloud3" draggable="false">
        <img src="../assets/Image/home/Intro/flower.jpg" alt="flower" class="home_flower home_introImg" draggable="false">
        <img src="../assets/Image/home/Intro/lion.jpg" alt="lion" class="home_lion home_introImg" draggable="false">
        <img src="../assets/Image/home/Intro/path.jpg" alt="path" class="home_path home_introImg" draggable="false">
        <img src="../assets/Image/home/Intro/pot.jpg" alt="pot" class="home_pot home_introImg" draggable="false">
        <img src="../assets/Image/home/Intro/lamp.jpg" alt="lamp" class="home_lamp home_introImg" draggable="false">
        <img src="../assets/Image/home/Intro/drum.jpg" alt="drum" class="home_drum home_introImg" draggable="false">
        <img src="../assets/Image/home/Intro/statue.jpg" alt="statue" class="home_statue home_introImg" draggable="false">
    </section>

    </div>
</template>



<script>

</script>



<style lang="scss" scoped>
    @import "/src/sass/style.scss";

    .wrapper{
        max-width: 100vw;
        overflow: hidden;
    }

    .banner{
        width: 100vw;
        height: 829px;
        overflow: hidden;
        background-color: $Blue;
        &-img{
            width: 2950px;
            height: 3050px;
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-template-rows: repeat(9, 1fr);
            gap: 100px 50px;
            box-sizing: border-box;
            margin-top: 100px;
            margin-left: 50px;
        img{
            width: 100%;
            height: 100%;
            object-position: center center;
        }
        .food01{
            grid-area: food01;
            grid-column: 1/2;
            grid-row: 1/2;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food02{
            grid-area: food02;
            grid-column: 3/4;
            grid-row: 1/2;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food03{
            grid-area: food03;
            grid-column: 5/6;
            grid-row: 1/2;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food04{
            grid-area: food04;
            grid-column: 7/8;
            grid-row: 1/2;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food05{
            grid-area: food05;
            grid-column: 9/10;
            grid-row: 1/2;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food06{
            grid-area: food06;
            grid-column: 2/3;
            grid-row: 2/3;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food07{
            grid-area: food07;
            grid-column: 4/5;
            grid-row: 2/3;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food08{
            grid-area: food08;
            grid-column: 6/7;
            grid-row: 2/3;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food09{
            grid-area: food09;
            grid-column: 8/9;
            grid-row: 2/3;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food10{
            grid-area: food10;
            grid-column: 10/11;
            grid-row: 2/3;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food11{
            grid-area: food11;
            grid-column: 1/2;
            grid-row: 3/4;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food12{
            grid-area: food12;
            grid-column: 3/4;
            grid-row: 3/4;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food13{
            grid-area: food13;
            grid-column: 5/6;
            grid-row: 3/4;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food14{
            grid-area: food14;
            grid-column: 7/8;
            grid-row: 3/4;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food15{
            grid-area: food15;
            grid-column: 9/10;
            grid-row: 3/4;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food16{
            grid-area: food16;
            grid-column: 2/3;
            grid-row: 4/5;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food17{
            grid-area: food17;
            grid-column: 4/5;
            grid-row: 4/5;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food18{
            grid-area: food18;
            grid-column: 6/7;
            grid-row: 4/5;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food19{
            grid-area: food19;
            grid-column: 8/9;
            grid-row: 4/5;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food20{
            grid-area: food20;
            grid-column: 10/11;
            grid-row: 4/5;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food21{
            grid-area: food21;
            grid-column: 1/2;
            grid-row: 5/6;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food22{
            grid-area: food22;
            grid-column: 3/4;
            grid-row: 5/6;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food23{
            grid-area: food23;
            grid-column: 5/6;
            grid-row: 5/6;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food24{
            grid-area: food24;
            grid-column: 7/8;
            grid-row: 5/6;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food25{
            grid-area: food25;
            grid-column: 9/10;
            grid-row: 5/6;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food26{
            grid-area: food26;
            grid-column: 2/3;
            grid-row: 6/7;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food27{
            grid-area: food27;
            grid-column: 4/5;
            grid-row: 6/7;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food28{
            grid-area: food28;
            grid-column: 6/7;
            grid-row: 6/7;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food29{
            grid-area: food29;
            grid-column: 8/9;
            grid-row: 6/7;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food30{
            grid-area: food30;
            grid-column: 10/11;
            grid-row: 6/7;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food31{
            grid-area: food31;
            grid-column: 1/2;
            grid-row: 7/8;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food32{
            grid-area: food32;
            grid-column: 3/4;
            grid-row: 7/8;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food33{
            grid-area: food33;
            grid-column: 5/6;
            grid-row: 7/8;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food34{
            grid-area: food34;
            grid-column: 7/8;
            grid-row: 7/8;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food35{
            grid-area: food35;
            grid-column: 9/10;
            grid-row: 7/8;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food36{
            grid-area: food36;
            grid-column: 2/3;
            grid-row: 8/9;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food37{
            grid-area: food37;
            grid-column: 4/5;
            grid-row: 8/9;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food38{
            grid-area: food38;
            grid-column: 6/7;
            grid-row: 8/9;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food39{
            grid-area: food39;
            grid-column: 8/9;
            grid-row: 8/9;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        .food40{
            grid-area: food40;
            grid-column: 10/11;
            grid-row: 8/9;
            transition: all 0.3s;
            &:hover{
                filter: drop-shadow(0 0 30px $Gold);
            }
        }
        }
        .banner-txt{
            width: 512px;
            height: 312px;
            position: absolute;
            z-index: 1;
            top: 368px;
            left: 98px;
            h1{
                font-size: $bigTitle;
                background: $GreenGrad;
                background-clip: text;
                -webkit-text-stroke: 8px transparent;
            }
            h1::after {
                content: '梨花韓食';
                position: absolute;
                top: 0;
                left: 0;
                background: $GoldGrad;
                background-clip: text;
                -webkit-text-fill-color: transparent;
                -webkit-text-stroke: 0px transparent;
            }
            h2{
                margin-top: 128px;
                background: $Blue;
                background-clip: text;
                -webkit-text-stroke: 4px transparent;
            }
            h2::after {
                content: '體驗正宗韓國美食文化的饗宴';
                position: absolute;
                top: 269px;
                left: 0;
                background: $GoldGrad;
                background-clip: text;
                -webkit-text-fill-color: transparent;
                -webkit-text-stroke: 0px transparent;
            }
        }
    }

    .intro{
        position: relative;
        width: 100vw;
        // height: 300%;
        .home_cloud1{
            width: 266px;
            height: 93px;
        }
        .home_cloud2{
            width: 235px;
            height: 82px;
        }
        .home_cloud3{
            width: 204px;
            height: 71px;
        }
        .home_introImg{
            width: 244px;
            height: 160px;
            border-radius: 10px;
            filter: grayscale(1);
        }
    }
</style>
