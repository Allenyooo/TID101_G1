<template>
    <div class="enter_body">
        <section :class="['enter_cut1', { 'hide-scroll': isScrolled }]">
            
            <div class="enter_cut1_open">
                <div class="cut1_door">
                    <img
                        src="../assets/Image/enter/palace_door_L.png"
                        class="cut1_door_L"
                    />
                    <img
                        src="../assets/Image/enter/palace_door_R.png"
                        class="cut1_door_R"
                    />
                </div>
            </div>
        </section>
        <section class="enter_emperor">
            <img
                src="../assets/Image/enter/emperor_stand_whole.png"
                alt="come on"
                class="standup"
            />
            <img
                src="../assets/Image/enter/long_hand.png"
                alt="touch"
                class="hand"
            />
            <div class="enter_table">
                <div class="enter_highlight">
                    <img
                        src="../assets/Image/enter/highlight_1.png"
                        alt="bling bling"
                        class="hl_1"
                    />
                    <img
                        src="../assets/Image/enter/highlight_2.png"
                        alt="bling bling"
                        class="hl_2"
                    />
                    <img
                        src="../assets/Image/enter/highlight_3.png"
                        alt="bling bling"
                        class="hl_3"
                    />
                    <img
                        src="../assets/Image/enter/highlight_4.png"
                        alt="bling bling"
                        class="hl_4"
                    />
                    <img
                        src="../assets/Image/enter/highlight_5.png"
                        alt="bling bling"
                        class="hl_5"
                    />
                    <img
                        src="../assets/Image/enter/highlight_6.png"
                        alt="bling bling"
                        class="hl_6"
                    />
                    <img
                        src="../assets/Image/enter/highlight_7.png"
                        alt="bling bling"
                        class="hl_7"
                    />
                </div>
            </div>
            <div class="enter_water">
                <div class="water1"></div>
                <div class="water2"></div>
                <div class="water3"></div>
                <div class="water4"></div>
                <div class="water5"></div>
                <div class="water6"></div>
                <div class="water7"></div>
                <div class="water8"></div>
                <div class="water9"></div>
                <div class="water10"></div>
            </div>
        </section>
    </div>
    <swiper
        :direction="'vertical'"
        :slidesPerView="1"
        :spaceBetween="30"
        :mousewheel="true"
        :pagination="{
        clickable: true,
        }"
        :modules="modules"
        class="mySwiper"
    >
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut1.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut2.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut3.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut4.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut5.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut6.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut7.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut8.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut9.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut10.png" alt=""></swiper-slide>
        <!-- <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut11.png" alt=""></swiper-slide> -->
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut12.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide"><img src="../assets/Image/enter/cut13.png" alt=""></swiper-slide>
        <swiper-slide class="swiper-slide" @touchstart="startTimer" @touchend="startTimer" @mouseenter="startTimer" @mouseout="startTimer"><img src="../assets/Image/enter/cut15.png" alt=""></swiper-slide>
    </swiper>
</template>

<script>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
// import './style.css';
import { Mousewheel, Pagination } from 'swiper/modules';

gsap.registerPlugin(ScrollTrigger);

export default {
    mounted() {
        const gsapAnimations = () => {
            let cut1 = gsap.timeline({
                scrollTrigger: {
                    trigger: ".enter_cut1",
                    start: "top top",
                    end: "65%",
                    pin: true,
                    // markers: true,
                    scrub: 1,
                },
            });

            cut1.to(".cut1_door_L", {
                // x: -45,
                x: "-99%",
                duration: 1,
            })

                .to(
                    ".cut1_door_R",
                    {
                        // x: 45,
                        x: "98%",
                        duration: 1,
                    },0)

                .to(
                    ".enter_cut1_open",
                    {
                        scale: 3,
                        duration: 1.5,
                        // transformOrigin: "center 68%",
                        transformOrigin: "center 72%",
                    },2)

                .to(
                    ".enter_cut1_open",
                    {
                        scale: 10,
                        duration: 1.5,
                        // transformOrigin: "center 68%",   
                        transformOrigin: "center 72%",
                    },3)

                .to(
                    ".enter_cut1_open",
                    {
                        scale: 20,
                        duration: 1.5,
                        // transformOrigin: "center 68%",
                        transformOrigin: "center 72%",
                    },4)

                .to(
                    ".enter_cut1_open",
                    {
                        autoAlpha: 0,
                        ease: "none",
                        duration: 0.000001,
                    },5)

                .to(
                    ".enter_cut1",
                    {
                        autoAlpha: 0,
                        ease: "none",
                        duration: 0.000001,
                    },5);

            let cut2 = gsap.timeline({
                scrollTrigger: {
                    trigger: ".enter_emperor",
                    start: "top",
                    end: "bottom 60%",
                    pin: true,
                    // markers: true,
                    scrub: 1,
                },
            });

            cut2.from(".enter_emperor", {
                scale: 1.01,
                y: "-100vh",
                // ease: "none",
                // duration: 65,
                duration: 35,
                ease: "power2.in",
            })
                .to(".enter_emperor", {
                    scale: 35,
                    transformOrigin: "49.6% 12.1%",
                    // ease: "none",
                    // duration: 35,
                    duration: 15,
                    ease: "power2.in",
                    // ease: "sine.out",
                    // ease: "power1.in",
                })

                .to(".hl_1, .hl_2, .hl_3, .hl_4, .hl_5, .hl_6, .hl_7", {
                    opacity: 1,
                    ease: "none",
                    duration: 6,
                })

                .to(".hl_1", {
                    ease: "none",
                    x: 2.5,
                    y: "0.2px",
                    rotate: "-10",
                })

                .to(
                    ".hl_2",
                    {
                        ease: "none",
                        x: 1.5,
                        y: "0.1px",
                    },
                    "<+=0"
                )

                .to(
                    ".hl_3",
                    {
                        ease: "none",
                        x: 0.5,
                        y: "-0.1px",
                        scaleX: -0.2,
                    },
                    "<+=0"
                )

                .to(
                    ".hl_4",
                    {
                        ease: "none",
                        x: 0.5,
                        y: "0.2px",
                        rotate: "-10",
                    },
                    "<+=0"
                )

                .to(
                    ".hl_5",
                    {
                        ease: "none",
                        x: 2.5,
                        y: "0.2px",
                        rotate: "-10",
                    },
                    "<+=0"
                )

                .to(
                    ".hl_6",
                    {
                        ease: "none",
                        x: 1,
                        y: "0.2px",
                        rotateZ: "-10",
                        scaleX: -0.2,
                    },
                    "<+=0"
                )

                .to(
                    ".hl_7",
                    {
                        ease: "none",
                        x: 2,
                        y: "0.2px",
                        rotate: "-10",
                        scaleX: -0.2,
                    },
                    "<+=0"
                )

                .to(".hl_1 ", {
                    ease: "none",
                    x: 4.8,
                    y: "-0.1px",
                    rotate: "-20",
                })

                .to(
                    ".hl_2",
                    {
                        ease: "none",
                        x: 4,
                        y: "-0.5px",
                        scale: 0.1,
                        // rotate: "-0.3"
                    },
                    "<+=0"
                )

                .to(
                    ".hl_3",
                    {
                        ease: "none",
                        x: 1,
                        y: "-0.1px",
                        scaleX: -0.5,
                    },
                    "<+=0"
                )

                .to(
                    ".hl_4",
                    {
                        ease: "none",
                        x: 1.5,
                        y: "-0.2px",
                        rotate: "-10",
                        scale: 0.1,
                    },
                    "<+=0"
                )

                .to(
                    ".hl_5",
                    {
                        ease: "none",
                        x: 5.8,
                        y: "-0.1px",
                        rotate: "-20",
                    },
                    "<+=0"
                )

                .to(
                    ".hl_6",
                    {
                        ease: "none",
                        x: 2.5,
                        // y: "-0.1px",
                        // rotateZ: "-90"
                        scaleX: -1,
                    },
                    "<+=0"
                )

                .to(
                    ".hl_7",
                    {
                        ease: "none",
                        x: 4,
                        y: "-0.2px",
                        rotate: "-10",
                        scaleX: -1,
                    },
                    "<+=0"
                )

                .to(".hl_1, .hl_2, .hl_3, .hl_4, .hl_5, .hl_6, .hl_7", {
                    opacity: 0,
                    ease: "none",
                })

                .to(".enter_emperor", {
                    scale: 10,
                    y: "200",
                    // transformOrigin: "49.6% 12%",
                    duration: 8,
                    // ease: "power2.in",
                    // opacity: 0
                })

                .to(
                    ".standup",
                    {
                        duration: 1.5,
                        ease: "power2.in",
                        opacity: 1,
                    },
                    "<+=1"
                )

                .to(
                    ".hand",
                    {
                        duration: 10,
                        ease: "power2.in",
                        opacity: 1,
                        y: -62,
                        x: -10,
                        scale: 0.8,
                    },
                    "<+=1"
                )

                .to(".hand", {
                    duration: 10,
                    ease: "power2.in",
                    opacity: 1,
                    y: -70,
                    x: -20,
                    scale: 0.6,
                })

                .to(
                    ".standup",
                    {
                        duration: 3,
                        ease: "power2.in",
                        scale: 1.5,
                    },
                    "<+=3"
                )

                .to(
                    ".enter_water",
                    {
                        duration: 3,
                        // ease: "power2.in",
                        opacity: 1,
                    },
                    "<+=4"
                )

                .to(".enter_emperor", {
                    onComplete: () => {
                        window.location.href = import.meta.env.BASE_URL + "home";
                        // this.$router.push('/home');
                    },
                },"<+=1");
        }
        
        if (window.innerWidth >= 820) {
            window.addEventListener('scroll', this.handleScroll);
            gsapAnimations();
        }
    },
    data(){
        return{
            isScrolled: false,
            modules: [Mousewheel, Pagination],
            timer: null,
        }
    },
    beforeDestroy() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    components: {
      Swiper,
      SwiperSlide,
    },
    methods: {
        handleScroll() {
            this.isScrolled = window.scrollY > 0;
        },
        startTimer() {
            this.timer = setTimeout(this.home, 10);
        },
        home() {
            this.$router.push("/home");
        }

    },
    beforeDestroy() {
        if (this.timer) {
            clearTimeout(this.timer);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.enter_body {
    max-width: 100vw;
    height: 100vh;
    position: relative;
    @include breakpoint(820px){
        display: none;
    }
    
    .enter_cut1 {
        // width: 98vw;
        // height: 100vh;
        width: 100%;
        // height: 110%;
        height: 100%;
        background-image: url(../assets/Image/enter/cut1_bg.png);
        // background: #ECE6D9;
        background-repeat: no-repeat;
        // background-size: contain;
        background-size: cover;
        // padding-top: 1%;
        overflow: hidden;
        position: relative;
        z-index: 49;

        & ::before{
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid $Black;
            width: 50px;
            height: 90px;
            border-radius: 90px;
            background-color: rgba($color: $Black, $alpha: 0.6);
            animation: scrolldown 4.8s 2s linear infinite;
            opacity: 0;
            @include breakpoint(820px){
                display: none;
            }
        }

        @keyframes scrolldown {
            0%{
                opacity: 0;
            }

            10%{
                opacity: 1;
            }

            45%{
                opacity: 1;
            }

            55%{
                opacity: 0;
            }

            100%{
                opacity: 0;
            }
        }

        & ::after{
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            width: 10px;
            height: 10px;
            background-color: #fff;
            animation: scrollDown 4.8s 2s linear infinite;
            opacity: 0;
            @include breakpoint(820px){
                display: none;
            }
        }

        @keyframes scrollDown {
            0%{
                top: 46%;
                opacity: 1;
            }

            12%{
                top: 50%;
                opacity: 0;
            }

            20%{
                top: 46%;
                opacity: 0;
            }

            25%{
                top: 46%;
                opacity: 1;
            }

            37%{
                top: 50%;
                opacity: 0;
            }

            100%{
                top: 46%;
                opacity: 0;
            }
        }


        &.hide-scroll {
            & ::before, & ::after {
                display: none;
            }
        }

        .enter_cut1_open {
            // width: 95vw;
            // height: 95vh;
            width: 95%;
            height: 95%;
            background-image: url(../assets/Image/enter/palace_open.png);
            background-repeat: no-repeat;
            background-size: contain;
            // background-position: center top;
            background-position: center 70%;
            margin: 0 auto;
            z-index: 50;
            // opacity: 0;
            position: relative;
            // @include breakpoint(820px){
            //     background-image: url(../assets/Image/enter/palace_whole.png);
            // }
            .cut1_door {
                // padding: 33.24% 0 0 0.42%;
                // padding: 32.05% 0 0 0.4%;
                // padding: 32.60% 0 0 0.4%;
                // padding: 63.2vh 0 0 0.6vh;
                padding: 62vh 0 0 0.8vh;
                display: flex;
                justify-content: center;
                @include breakpoint(1920px){
                    padding: 62.1vh 0 0 0.8vh;
                }
                @include breakpoint(1440px){
                    // padding: 63.2vh 0 0 0.6vh;
                    // padding: 63.5vh 0 0 0.6vh;
                }
                @include breakpoint(820px){
                    // padding: 64.3vh 0 0 0.4vh;
                    padding: 63vh 0 0 0.6vh;
                }
                img {
                    // width: 3.52%;
                    width: 3.5%;
                    @include breakpoint(820px){
                        display: none;
                    }
                }
            }
        }
    }
}

.enter_emperor {
    width: 100%;
    height: 280vh;
    background-image: url(../assets/Image/enter/palace_inside_whole2.png);
    background-repeat: no-repeat;
    background-size: contain;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 30;
    .standup {
        width: 7.6%;
        position: absolute;
        top: 10%;
        left: 45.9%;
        z-index: 40;
        opacity: 0;
    }
    .hand {
        // width: 2%;
        width: 5%;
        position: absolute;
        top: 14.5%;
        // left: 50%;
        left: 48.8%;
        z-index: 45;
        opacity: 0;
        @include breakpoint(1920px){
            top: 13.5%;
            left: 48.5%;
        }
        @include breakpoint(1440px){
            top: 14.5%;
            left: 48.8%;
        }
        @include breakpoint(1440px){
            top: 15%;
        }

    }
    .enter_table {
        // width: 7.666%;
        // height: 10%;
        // background-image: url(../assets/Image/enter/emperor.png);
        background-repeat: no-repeat;
        background-size: contain;
        position: absolute;
        // top: 9.85%;
        // left: 45.8%;
        background-image: url(../assets/Image/enter/emperor2.png);
        width: 13.6%;
        height: 10%;
        top: 9.258%;
        left: 42.9%;
        z-index: 35;
        // overflow: hidden;
        .enter_highlight {
            position: relative;
            // border: 1px solid red;
            width: 15%;
            height: 4%;
            margin: 29% auto;

            @include breakpoint(1024px){
                margin: 28.6% auto;
            }

            img {
                position: absolute;
                width: 5%;
                opacity: 0;
                &:nth-child(1) {
                    top: 40%;
                    left: 5%;
                    // left: 7%;
                }
                &:nth-child(2) {
                    top: 40%;
                    left: 26%;
                    // left: 27%;
                }
                &:nth-child(3) {
                    top: 59%;
                    left: 41%;
                    // width: 4%;
                    // left: 42%;
                }
                &:nth-child(4) {
                    // top: 66%;
                    top: 64%;
                    left: 49%;
                    width: 4%;
                }
                &:nth-child(5) {
                    top: 32%;
                    left: 43%;
                }
                &:nth-child(6) {
                    width: 4%;
                    top: 50%;
                    // left: 57%;
                    left: 58%;
                }
                &:nth-child(7) {
                    width: 4%;
                    top: 50%;
                    left: 69%;
                }
            }
        }
    }
    .enter_water {
        // position: absolute;
        position: relative;
        width: 10vw;
        height: 10vh;
        margin: 13.8% 44%;
        z-index: 40;
        opacity: 0;
        .water1 {
            animation: wateranimate 10s 9s ease-out infinite;
        }
        .water2 {
            animation: wateranimate 10s 8s ease-out infinite;
        }
        .water3 {
            animation: wateranimate 10s 7s ease-out infinite;
        }
        .water4 {
            animation: wateranimate 10s 6s ease-out infinite;
        }
        .water5 {
            animation: wateranimate 10s 5s ease-out infinite;
        }
        .water6 {
            animation: wateranimate 10s 4s ease-out infinite;
        }
        .water7 {
            animation: wateranimate 10s 3s ease-out infinite;
        }
        .water8 {
            animation: wateranimate 10s 2s ease-out infinite;
        }
        .water9 {
            animation: wateranimate 10s 1s ease-out infinite;
        }
        .water10 {
            animation: wateranimate 10s 0s ease-out infinite;
        }
        .water1,
        .water2,
        .water3,
        .water4,
        .water5,
        .water6,
        .water7,
        .water8,
        .water9,
        .water10 {
            padding: 20%;
            position: absolute;
            left: 30%;
            top: 30%;
            box-shadow: 0 0 120px 30px #073763 inset;
            border-radius: 100%;
            z-index: 1;
            opacity: 0;
        }
    }
}

@keyframes wateranimate {
    0% {
        transform: scale(0);
        opacity: 1;
    }

    5% {
        transform: scale(0.001);
        opacity: 0.95;
    }

    100% {
        transform: scale(5);
        opacity: 0;
    }
}

.mySwiper{
    display: none;
    max-width: 100vw;
    height: 100vh;
    @include breakpoint(820px){
        display: block;
    }

    .swiper-slide{
        // width: 10%;
        // height: 100%;
        img{
            width: 100%;
        }
    }
}

::v-deep .swiper-vertical > .swiper-pagination-bullets, 
::v-deep .swiper-pagination-vertical.swiper-pagination-bullets{
    display: none;
}

</style>
