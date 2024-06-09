<template>
    <!-- 視差滾動第一個 -->
    <div class="food_selector_text">
        <div class="food_1st_scroll">
            <p class="left_text">從食材到餐盤</p>
            <div class="food_and_time">
                <h1 class="inRed">食</h1>
                <img src="/src/assets/Image/food/food_spotlight.png" alt="" />
                <h1 class="inBlue">時</h1>
            </div>
            <p class="right_text">的美味歷程</p>
        </div>
        <div class="scroll_down">
            <h2>往下滑動</h2>
            <img
                src="/src/assets/Image/food/keyboard_double_arrow_down.png"
                alt=""
            />
        </div>
    </div>
    <!-- 視差滾動主欄位 -->
    <section class="horizontal">
        <div class="pin-wrap">
            <div class="animation-wrap to-right">
                <div class="item">
                    <img
                        src="/src/assets/Image/food/horizontal_main.png"
                        alt=""
                    />
                </div>
                <div class="item">
                    <img
                        src="/src/assets/Image/food/horizontal_meat.png"
                        alt=""
                    />
                </div>
                <div class="item">
                    <img
                        src="/src/assets/Image/food/horizontal_seafood.png"
                        alt=""
                    />
                </div>
                <div class="item">
                    <img
                        src="/src/assets/Image/food/horizontal_sidedish.png"
                        alt=""
                    />
                </div>
                <div class="item">
                    <img
                        src="/src/assets/Image/food/horizontal_soup.png"
                        alt=""
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { onMounted } from "vue";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export default {
    name: "Register",
    setup() {
        onMounted(() => {
            const horizontalSections = gsap.utils.toArray("section.horizontal");

            horizontalSections.forEach((sec, i) => {
                const pinWrap = sec.querySelector(".pin-wrap");
                const animationWrap = pinWrap.querySelector(".animation-wrap");

                const getToValue = () =>
                    -(animationWrap.scrollWidth - window.innerWidth);

                gsap.fromTo(
                    animationWrap,
                    {
                        x: () =>
                            animationWrap.classList.contains("to-right")
                                ? 0
                                : getToValue(),
                    },
                    {
                        x: () =>
                            animationWrap.classList.contains("to-right")
                                ? getToValue()
                                : 0,
                        ease: "none",
                        scrollTrigger: {
                            trigger: sec,
                            start: "top top",
                            end: () =>
                                "+=" +
                                (animationWrap.scrollWidth - window.innerWidth),
                            pin: pinWrap,
                            invalidateOnRefresh: true,
                            scrub: true,
                        },
                    }
                );
            });
        });
    },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.food_selector_text {
    width: 444px;
    height: 704px;
    display: flex;
    background-image: url(/src/assets/Image/food/time_and_food.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    flex-direction: column;
    text-align: center;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    .food_1st_scroll {
        display: flex;
        align-items: center;
        justify-content: center;
        p {
            writing-mode: vertical-rl; /* 文字垂直從右到左 */
            text-orientation: upright;
            font-size: 48px;
            color: $LightBrown;
        }
        .left_text {
            margin-bottom: 160px;
        }
        .right_text {
            margin-top: 200px;
        }
        .food_and_time {
            h1 {
                font-size: $bigTitle;
                background: $RevGoldGrad;
                background-clip: text;
                -webkit-text-stroke: 8px transparent;
            }
            .inRed {
                color: $Red;
            }
            .inBlue {
                color: $Blue;
            }
            img {
            }
        }
        p {
        }
    }
    .scroll_down {
        margin-top: 50px;
        animation: jump 0.8s infinite;
        @keyframes jump {
            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(7px);
            }
            60% {
                transform: translateY(1px);
            }
        }
        h2 {
            color: $Gold;
        }

        img {
            margin-top: 5px;
            width: 64px;
            height: 56px;
        }
    }
}

//------------------------------------

section {
    &.horizontal {
        overflow-x: hidden;

        .pin-wrap,
        .animation-wrap {
            display: flex;
            position: relative;
            z-index: 1;
            // height: 100vh;
        }
        .item {
            position: relative;
            padding: 110px 36px; //不可以刪掉
            // flex: 0 0 500px;
            height: calc(100vh - 300px); //暫時不可以刪掉
            display: flex;
            align-items: center;
            // line-height: 1.7;
            // user-select: none;
            // border-right: 1px solid rgba(0, 0, 0, 0.06);
            background-color: transparent;
            //以下開始新增樣式
            width: 444px;
            height: 704px;
            &:before {
                position: absolute;
                // font-size: 100px;
                // opacity: 0.13;
                font-weight: bold;
                z-index: -1;
                transform: translate(-30px, -50px);
                // line-height: 1;
            }
            img {
            }
        }
        .animation-wrap {
            &.to-right {
                // counter-reset: item;
                // float: left;

                .item:before {
                    // counter-increment: item;
                    // content: counter(item);
                }
            }

            &.to-left {
                counter-reset: item 11;
                float: right;

                .item:before {
                    counter-increment: item -1;
                    content: counter(item);
                }
            }

            .item:nth-child(2n + 2) {
                align-items: flex-start;
            }

            .item:nth-child(4n + 4) {
                align-items: flex-end;
            }
        }
    }
}
</style>
