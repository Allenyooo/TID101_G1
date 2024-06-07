<script>
export default {
    props: {
        can_hover: {
            default: true,
        },
    },

    data() {
        return {
            hovered: false,
        };
    },

    methods: {
        cardOpen() {
            this.hovered = !this.hovered;
        },
    },
};
</script>

<template>
    <!-- <li :class="{ map_open : hovered }" @mouseover="cardOpen" @mouseleave="cardOpen"> -->
    <li @mouseenter="$emit('mouseenter')" @mouseleave="$emit('mouseleave')">
        <div class="test"></div>
        <div class="normal">
            <img src="/src/assets/Image/map/koreawaybgi.png" alt="" />
            <div class="shopinfo">
                <h3>高麗味</h3>
                <div class="content">
                    <div class="address">
                        <img
                            src="/src/assets/Image/map/addressLogo.png"
                            alt=""
                        />
                        <h5>台北市，天母區</h5>
                    </div>
                    <div class="star">
                        <img src="/src/assets/Image/map/star.png" alt="" />
                        <h5>4.8</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="opened">
            <div class="card_header"></div>
            <div class="card_main">
                <div class="maininfo">
                    <img
                        src="/src/assets/Image/map/koreawaybgi.png"
                        class="shopImg"
                    />
                    <div class="maincontent">
                        <div class="name_collect">
                            <h2>高麗味</h2>
                            <div class="collect"></div>
                        </div>
                        <div class="star_price">
                            <div class="score">
                                <h4>4.8</h4>
                                <img
                                    src="/src/assets/Image/map/star.png"
                                    class="scorestar"
                                />
                            </div>
                            <h4>( 100則評論 )</h4>
                            <h4>．均消 $300</h4>
                        </div>
                        <div class="opentime">
                            <img src="/src/assets/Image/map/clock.png" alt="" />
                            <h4>營業時間 : 11:00 - 21:00</h4>
                        </div>
                        <div class="shop_address">
                            <img
                                src="/src/assets/Image/map/addressLogo.png"
                                alt=""
                            />
                            <h4>台北市士林區忠誠路二段152號</h4>
                        </div>
                    </div>
                </div>
                <div class="bestreview">
                    <div>
                        <h4>最佳<br />評論</h4>
                        <div class="reviewcontent">
                            <h4>上次聚餐同事一致好評!好想再二訪</h4>
                            <h5>來自火星的阿霈 於 2024/03/12 的評論</h5>
                        </div>
                    </div>
                    <img src="/src/assets/Image/map/koreawaybgi.png" alt="" />
                </div>
            </div>
        </div>
    </li>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

li {
    // background-color: $OffWhite;
    transition: 0.1s;
    transform-origin: center;
    outline: 2px solid blue;
    &:hover .opened {
        transition: 0.1s;
        width: 720px;
        height: 364px;
        z-index: 16;
        transform-origin: top center;
        opacity: 1;
    }
    &:hover .normal {
        transition: 0.1s;
        width: 0px;
        height: 0px;
        z-index: 0;
        transform-origin: top center;
        opacity: 0;
    }
    // &:hover {
    //     transition: 0.2s;
    //     width: 720px;
    //     height: 364px;
    // }
    // &:hover .normal {
    //     transition: 0.2s;
    //     display: none;
    // }
    // &:hover .opened {
    //     transition: 0.2s;
    //     display: block;
    // }
}

.normal {
    // outline: 1px red solid;
    width: 460px;
    height: 202px;
    border-radius: 15px;
    overflow: hidden;
    transition: 0.2s;
    margin: 24px auto;
    transform-origin: top center;

    img {
        width: 100%;
        height: 132px;
        object-fit: cover;
        display: block;
    }
    .shopinfo {
        width: 100%;
        height: 100%;
        background-color: $OffWhite;
        padding-left: 32px;
        padding-top: 4px;
        & h3 {
            margin-bottom: 4px;
            font-weight: bold;
        }
        .content {
            display: flex;
            align-items: center;
            & img {
                width: 16px;
                height: 16px;
                margin-right: 5px;
            }
            .address {
                display: flex;
                align-items: center;
                margin-right: 32px;
            }
            .star {
                display: flex;
                align-items: center;
            }
        }
    }
}

.opened {
    // outline: 1px red solid;
    // width: 720px;
    // height: 364px;
    border-radius: 15px;
    background-color: $OffWhite;
    overflow: hidden;
    // display: none;

    width: 0;
    height: 0;
    z-index: 0;
    transform-origin: top center;
    opacity: 0;

    .card_header {
        width: 100%;
        height: 32px;
        background-color: $Red;
    }
    .card_main {
        margin: 20px 28px;
    }
}

.maininfo {
    display: flex;
    .shopImg {
        display: block;
        width: 244px;
        height: 186px;
        object-fit: cover;
        border-radius: 15px;
        margin-right: 28px;
    }
}
.maincontent {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin-bottom: 20px;

    .name_collect {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .star_price {
        display: flex;
        flex-direction: row;
        margin-bottom: 16px;
        // align-items: left;
        .score {
            width: 84px;
            height: 32px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            background-color: #dbcec6;
            border-radius: 16px;
            // outline: 1px solid green;
            margin-right: 4px;
            h4 {
                display: inline-block;
                width: 30px;
                height: 30px;
            }

            .scorestar {
                display: block;
                width: 16px;
                height: 16px;
            }
        }
        & > h4:nth-child(2) {
            color: #999999;
        }
    }
    .opentime {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        img {
            width: 16px;
            height: 16px;
            margin-right: 8px;
        }
    }
    .shop_address {
        display: flex;
        align-items: center;
        img {
            width: 16px;
            height: 16px;
            margin-right: 8px;
        }
    }
}
.bestreview {
    display: flex;
    align-items: center;
    justify-content: space-around;
    background-color: #dbcec6;
    width: 670px;
    height: 88px;
    border-radius: 15px;
    & > div {
        display: flex;
        align-items: center;
        justify-content: space-around;

        & > h4 {
            width: 80px;
            height: 64px;
            text-align: center;
            background-color: #fff4eb;
            display: inline-block;
            font-weight: bold;
            border-radius: 20px;
            margin-right: 16px;
        }
        .reviewcontent {
            h4 {
                font-weight: bold;
            }
            h5 {
                color: #898888;
            }
        }
    }
    img {
        display: block;
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 15px;
    }
}
</style>
