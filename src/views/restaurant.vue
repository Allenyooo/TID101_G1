<template>
    <div class="restaurant_wrapper">
        <!--店家測軸-->
        <div class="restaurant_sidebar">
            <img class="storeimg" src="../assets/Image/restaurant/north/logo.svg" alt="logo">
            <div class="column">
                <h2>高麗味</h2>
                <h6>고려미</h6>
            </div>
            <span class="restaurant_star">
                <div class="star">4.8</div>
                <img class="restaurant_starimg" src="../assets/Image/restaurant/star.png" alt="star">
            </span>
            <ul class="list">
                <li>- 前言</li>
                <li>- 店家資訊</li>
                <li>- 特色介紹</li>
                <li>- 評論區</li>
            </ul>
        </div>
        <div class="restaurant_content">
            <img class="Banner" src="../assets/Image/restaurant/north/storebanner.jpg" alt="banner">
            <img class="Banner430" src="../assets/Image/restaurant/north/storebannerRWD.jpg" alt="">
            <!--banner-->
            <div class="restaurant_breadcrumb">
                <!---麵包屑-->
                <ol class="breadcrumb">
                    <li class="crumb1">
                        <router-link to="/home">首頁</router-link>
                        <img src="/src/assets/Image/restaurant/north/left.png" alt="">
                    </li>
                    <li class="crumb2">
                        <router-link to="/map">商店列表</router-link>
                        <img src="/src/assets/Image/restaurant/north/left.png" alt="">
                    </li>
                    <li class="crumb3">
                        <a href="#">高麗味</a>
                    </li>
                </ol>
                <ol class="restaurant_btns">
                    <button>
                        <li class="collect">
                            <img src="../assets/Image/restaurant/north/collect.svg" alt="collect">
                        </li>
                    </button>

                    <button>
                        <li class="share"> <!--分享 連接fb訊息-->
                            <a href='javascript: void(window.open(&apos;https://lineit.line.me/share/ui?url=&apos; .concat(encodeURIComponent(location.href)) ));'
                                title='分享給 LINE 好友'>
                                <img alt='分享梨花殿給LINE好友 !' height='44' src='../assets/Image/restaurant/north/share.svg'
                                    width='44' />
                            </a>
                        </li>
                    </button>
                    <!--寫留言按鈕-->
                    <li class="message">
                        <button @click="pop()">
                            <div class="icon_bg" @click=" popup_open = true">
                                <img class="restaurantstarimg" src="../assets/Image/restaurant/north/message.svg"
                                    alt="message">
                            </div>
                        </button>
                    </li>
                </ol>
            </div>



            <header class="restaurant_header">
                <h2 class="restaurant_slogan">“ 品味正宗韓國美味！<br>來，一起享受美食之旅！”</h2>
                <h4>
                    歡迎光臨！高麗味是一家由韓國人親自經營的韓國餐廳，致力於將最正統的韓國風味從韓國帶到台灣。<br><br>我們的廚師們擁有精湛的手藝，將傳統的韓國料理製作得口感鮮美、味道道地。無論是韓式烤肉、泡菜、大醬湯還是韓式炸雞，每道菜都是我們對傳統飲食文化的真摯致敬。<br><br>無論您是想要品嚐道地的韓國美食，還是尋找一個溫馨舒適的用餐環境，我們都竭誠歡迎您的光臨。讓高麗味成為您感受韓國風情的第一選擇！
                </h4>
            </header>

            <!--店家資訊-->
            <section class="restaurant_section">
                <div class="restaurant_h3">
                    <h3>店 家 資 訊</h3>
                </div>
                <div class="restaurant_mapinfo">
                    <div class="restaurant_info">
                        <table class="info">
                            <tr>
                                <th>店名</th>
                                <td>高麗味 天母店</td>
                            </tr>
                            <tr>
                                <th>地址</th>
                                <td>111 台北市士林區忠誠路二段152號</td>
                            </tr>
                            <tr>
                                <th>聯絡電話</th>
                                <td>02-2873-6995</td>
                            </tr>
                            <tr>
                                <th>平均消費</th>
                                <td>NT$300</td>
                            </tr>
                            <tr>
                                <th>營業時間</th>
                                <td>11:30-14:00 / 17:00-22:00</td>
                            </tr>
                        </table>
                        <div class="restaurant_media">
                            <div class="restaurant_fb">
                                <img src="../assets/Image/restaurant/FB.png" alt="fb">
                                <h4>高麗味 • 韓之味小吃店</h4>
                            </div>
                            <div class="restaurant_ig">
                                <img src="../assets/Image/restaurant/ig.png" alt="ig">
                                <h4>@KoreawayBBQ</h4>
                            </div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <!---google map-->
                    <div class="map">
                        <iframe src="https://map.google.com?output=embed&q=高麗味" width="500px" height="300px"
                            frameborder="0" id="google_map">
                        </iframe>
                    </div>
                </div>
            </section>

            <main class="restaurant_mainContent">
                <div class="restaurant_content1">
                    <h4>
                        高麗味的生醃螃蟹，在醃製過程中以醬汁和<br>調味料醃製，保留了螃蟹原始鮮味，同時帶<br>來了濃郁的醬汁風味。我們以大蒜、辣椒醬<br>和其他調味料入味，口感香辣鮮美。作為小<br>菜（반찬）或配菜，搭配米飯和其他主食一<br>同享用，為餐桌增添了豐富的風味和營養。
                    </h4>
                    <img src="../assets/Image/restaurant/north/crab.png" alt="crab">
                </div>
                <div class="restaurant_content2">
                    <img src="../assets/Image/restaurant/north/chicken.png" alt="chicken">
                    <h4>
                        韓國炸雞，被譽為「黃金雞」，是韓國料理<br>中的經典美食。高麗味的炸雞，外皮酥脆、<br>內裡多汁，口感極佳。經過特殊調味和炸製<br>技術，使得炸雞的風味豐富多樣。我們特別<br>選用雞腿肉，肉質鮮嫩多汁，常搭配韓式泡<br>菜和啤酒，是韓國人非常喜愛的下酒菜。
                    </h4>
                </div>
                <div class="restaurant_content3">
                    <h4>
                        高麗味的牛肉湯，加入蔬菜和牛肉片，燉煮<br>成濃郁湯品。湯頭澄清鮮美，牛肉軟嫩入<br>味。搭配白飯和泡菜，營養豐富，口感溫<br>暖。不論是冬天進補，或是想要來一碗熱<br>湯，牛肉湯都是非常受歡迎的料理選項。
                    </h4>
                    <img src="../assets/Image/restaurant/north/soup.png" alt="soup">
                </div>
            </main>

            <!---評論區-->
            <section class="restaurant">
                <div class="restaurant_review">
                    <div class="restaurant_review_content">
                        <div class="restaurant_review_title">
                            <h3>評論區</h3>
                            <span>
                                <img class="restaurantstarimg" src="../assets/Image/restaurant/star.png" alt="star">
                                <h4 class="restaurant_rating">4.8</h4>
                                <h4 class="restaurant_review_num">(100+評論)</h4>
                            </span>
                        </div>

                        <button @click="pop()">
                            <div class="icon_bg" @click=" popup_open = true">
                                <img class="restaurantstarimg" src="../assets/Image/restaurant/north/message.svg"
                                    alt="message">
                            </div>
                        </button>
                        <button @click=" popup_open = true">
                        </button>
                        <div id="pop" :class="{ 'active': popup_open === true }">
                            <div class="concent_one">
                                <div class="starbars">
                                    <h4 class="starbar_store">整體評價</h4>
                                    <div id="stars" class="left">

                                        <!--星級test-->
                                        <img src="/src/assets/Image/restaurant/north/pentagram.png" alt=""
                                            v-if="rating >= 1" @click="change_rating(0)">
                                        <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                                            @click="change_rating(1)">
                                        <img src="/src/assets/Image/restaurant/north/pentagram.png" alt=""
                                            v-if="rating >= 2" @click="change_rating(1)">
                                        <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                                            @click="change_rating(2)">
                                        <img src="/src/assets/Image/restaurant/north/pentagram.png" alt=""
                                            v-if="rating >= 3" @click="change_rating(2)">
                                        <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                                            @click="change_rating(3)">
                                        <img src="/src/assets/Image/restaurant/north/pentagram.png" alt=""
                                            v-if="rating >= 4" @click="change_rating(3)">
                                        <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                                            @click="change_rating(4)">
                                        <img src="/src/assets/Image/restaurant/north/pentagram.png" alt=""
                                            v-if="rating >= 5" @click="change_rating(4)">
                                        <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                                            @click="change_rating(5)">
                                        <span v-text="rating_text[rating]"></span>
                                    </div>
                                    <div id="comment" class="left"></div>
                                </div>

                                <p class="masg">根據你的體驗，整體而言你會給該店家幾顆星？</p>
                                <div class="line"></div>
                                <h4 class="experience">體驗心得</h4>
                                <h5 class="text_1">
                                    <textarea class="text_concent" placeholder="大家都想聽聽你的感想，給還沒去過的人一個參考吧！"></textarea>
                                </h5>
                                <p class="text_words">字元數限制 0/100 字</p>
                            </div>
                            <div class="share">
                                <h4 class="share_photo">分享照片</h4>
                                <p class="share_six">(至多6張)</p>
                            </div>

                            <!--照片動態-->
                            <div class="concent_two">
                                <div class="box1">
                                    <div class="add">+</div>
                                    <input type="file" @change="fileChange($event, 1)">
                                </div>
                                <div class="box2">
                                    <div class="add">+</div>
                                    <input type="file" @change="fileChange($event, 2)">
                                </div>
                                <div class="box3">
                                    <div class="add">+</div>
                                    <input type="file" @change="fileChange($event, 3)">
                                </div>
                                <div class="box4">
                                    <div class="add">+</div>
                                    <input type="file" @change="fileChange($event, 4)">
                                </div>
                                <div class="box5">
                                    <div class="add">+</div>
                                    <input type="file" @change="fileChange($event, 5)">
                                </div>
                                <div class="box6">
                                    <div class="add">+</div>
                                    <input type="file" @change="fileChange($event, 6)">
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="cancel" @click=" popup_close()">
                                    <h4>取消</h4>
                                </button>
                                <button class="sendout" @click=" submit()">
                                    <h4>送出</h4>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!---評論卡片區，卡片1-->
                    <ul class="customer_review">
                        <li>
                            <div>
                                <span>
                                    <img class="user" src="../assets/Image/restaurant/north/user.png" alt="user">
                                    <h4 class="restaurant_username">來自火星的阿霈</h4>
                                </span>
                                <span>
                                    <img class="good" src="../assets/Image/restaurant/north/good.png" alt="good">
                                    <h5 class="number">250</h5>
                                </span>
                            </div>
                            <div class="star">
                                <span class="starbar">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starnull.png" alt="Starfull">
                                </span>
                                <span class="date">
                                    <h5>2024/05/12 13:14</h5>
                                </span>
                            </div>
                            <h4>上次聚餐同事一致好評!<br> 好想再二訪</h4>
                        </li>
                        <!---評論卡片2-->
                        <li>
                            <div>
                                <span>
                                    <img class="user" src="../assets/Image/restaurant/north/user.png" alt="user">
                                    <h4 class="restaurant_username">來自火星的阿霈</h4>
                                </span>
                                <span>
                                    <img class="good" src="../assets/Image/restaurant/north/good.png" alt="good">
                                    <h5 class="number">250</h5>
                                </span>
                            </div>
                            <div class="star">
                                <span class="starbar">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starnull.png" alt="Starfull">
                                </span>
                                <span class="date">
                                    <h5>2024/05/12 13:14</h5>
                                </span>
                            </div>
                            <h4>上次聚餐同事一致好評!<br> 好想再二訪</h4>
                        </li>
                        <!---評論卡片3-->
                        <li>
                            <div>
                                <span>
                                    <img class="user" src="../assets/Image/restaurant/north/user.png" alt="user">
                                    <h4 class="restaurant_username">來自火星的阿霈</h4>
                                </span>
                                <span>
                                    <img class="good" src="../assets/Image/restaurant/north/good.png" alt="good">
                                    <h5 class="number">250</h5>
                                </span>
                            </div>

                            <!---彈跳視窗-->
                            <div class="star">
                                <!-- <div id="stars" class="left">
                                    <img src="./pentagram.png" alt="">
                                    <img src="./pentagram.png" alt="">
                                    <img src="./pentagram.png" alt="">
                                    <img src="./pentagram.png" alt="">
                                    <img src="./pentagram.png" alt="">
                                </div> -->
                                <!-- <div id="comment" class="left">
                                </div> -->

                                <span class="starbar">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starfull.png" alt="Starfull">
                                    <img src="../assets/Image/restaurant/north/Starnull.png" alt="Starfull">
                                </span>
                                <span class="date">
                                    <h5>2024/05/12 13:14</h5>
                                </span>
                            </div>


                            <h4>上次聚餐同事一致好評!<br> 好想再二訪</h4>
                        </li>
                    </ul>

                    <!--彈跳視窗按鈕-->
                    <button class="readmord"> <!--btn btn-primary-->
                        <router-link to="/review">READ MORE</router-link>
                    </button>
                </div>
            </section>
        </div>
    </div>







</template>




<script>
// const btn = document.querySelector('#share-btn');

// btn.addEventListener('click', async () => {
//     try {
//         if (!navigator.share) {
//             return;
//         }
//         await navigator.share({
//             title: '分享梨花殿',
//             text: 'Share Content',
//             url: 'https://www.apple.com/tw/macbook-air/specs/'
//         })
//     } catch (err) {
//         console.log(err.message);
//     }
// });

//星級評論
export default {
    data() {
        return {
            rating: 0,
            popup_open: false,
            rating_text: [
                '',
                '1級星',
                '2級星',
                '3級星',
                '4級星',
                '5級星'
            ],
            // photoArray: [],
        }
    },
    methods: {    // 照片新增
        change_rating(value) {
            this.rating = value
        },
        pop() {
            //alert()
        },
        popup_close() {
            this.popup_open = false
        },
        submit() {

            this.popup_close()

            // $.ajax({
            //     type: "method",
            //     url: "url",
            //     data: "data",
            //     dataType: "dataType",
            //     success: function (response) {

            //     }
            // });
        },
        fileChange(e, index) {
            let file = e.target.files[0];
            let readFile = new FileReader();
            readFile.readAsDataURL(file);

            readFile.addEventListener('load', () => {
                let image = document.createElement('img');
                image.src = readFile.result;
                image.style.width = '100%';
                image.style.height = '100%';

                let box = document.querySelector(`.box${index}`);
                box.innerHTML = '';
                box.appendChild(image);
            });
        }
    }
}

</script>


<style lang="scss" scoped>
@import url(/src/sass/style.scss);

@mixin breakpoint($point) {
    @media screen and (max-width: $point) {
        @content;
    }
}

* {
    text-decoration: none;
    list-style: none;
}

#share-btn {
    //測試按鈕
    width: 90px;
    height: 30px;
    margin-left: 20px;
    border-radius: 50px;
    color: #FFF;
    background-color: #7A625B;
}

.restaurant_wrapper {
    overflow: hidden;
    width: 100vw;
    background-color: #F6F1ED;
    display: flex;

    @include breakpoint(430px) {
        display: block;
        position: relative;
        width: 100vw;
    }


    // @include breakpoint(1280px) {

    // }

    // @include breakpoint(1024px) {

    // }

    @include breakpoint(820px) {}

    // @include breakpoint(430px) {

    // }

    // @include breakpoint(375px) {

    // }
}

button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    margin-bottom: 28px;
    padding-left: 1px;
}

.restaurant_sidebar {
    background-color: #fff;
    width: 17vw;

    @include breakpoint(430px) {
        background-color: #f6f1ed;
        position: absolute;
        z-index: 1;
    }



    .storeimg {
        padding-top: 212px;
        width: 80px;
        height: 80px;
        margin: 0 auto;
        display: block;

        @include breakpoint(430px) {
            display: none;
        }
    }

    .column {
        display: flex;
        width: fit-content;
        margin: 0 auto;

        @include breakpoint(430px) {
            position: absolute;
            top: 31vw;
            left: 35vw;
            width: 43vw;
            display: flex;
            flex-direction: column;
        }

        h2 {
            -webkit-writing-mode: vertical-lr;
            writing-mode: vertical-lr;
            margin-top: 16px;

            @include breakpoint(1280px) {
                margin-left: 2vw;
            }

            @include breakpoint(820px) {
                font-size: 34px;
            }

            @include breakpoint(430px) {
                -webkit-writing-mode: unset;
                writing-mode: unset;
                font-weight: 800;
            }
        }

        h6 {
            -webkit-writing-mode: vertical-lr;
            writing-mode: vertical-lr;
            margin-top: 16px;
            margin-left: 8px;

            @include breakpoint(430px) {
                -webkit-writing-mode: unset;
                writing-mode: unset;
                font-weight: 800;
                margin-left: 9vw;
            }
        }
    }

    .restaurant_star {
        background-color: #7A625B;
        display: flex;
        width: 83px;
        height: 30px;
        border-radius: 50px;
        margin: 0 auto;
        margin-top: 26px;

        @include breakpoint(430px) {
            position: absolute;
            top: 48vw;
            left: 39vw;
        }


        .star {
            font-size: 20px;
            color: #DBCEC6;
            margin: 5px 41px 5px 12px;

            @include breakpoint(1024px) {
                padding-left: 8px;
            }
        }

        .restaurant_starimg {
            width: 20px;
            height: 20px;
            margin: 5px 12px 5px -35px;
        }
    }

    .list {
        width: 93px;
        height: 168px;
        margin: 0 auto;
        margin-top: 26px;

        @include breakpoint(1280px) {
            width: 76px;
        }

        @include breakpoint(430px) {
            display: none;
        }

        li {
            margin-top: 16px;
        }
    }
}

.restaurant_content {
    top: 0;
    left: 17vw;
    width: 83vw;
    object-fit: cover;
    overflow: hidden;
    background-color: #F6F1ED;

    @include breakpoint(430px) {
        width: 100vw;
    }

    .Banner {
        opacity: 50%;
        width: 82vw;

        @include breakpoint(430px) {
            display: none;
        }
    }

    .Banner430 {
        display: none;

        @include breakpoint(430px) {
            display: block;
            object-fit: contain;
            width: 100vw;
            background-color: #000;
            opacity: .5;
            position: relative;
            margin-top: 21vw;
        }
    }

    .restaurant_breadcrumb {
        height: 88px;
        width: 82vw;
        color: #333333;
        display: flex;
        justify-content: space-between;

        @include breakpoint(1024px) {
            width: 67vw;
        }

        @include breakpoint(820px) {
            width: 66vw;
        }

        @include breakpoint(430px) {
            width: 100vw;
        }

        .breadcrumb {
            margin: 20px 20px 0 20px;
            width: 206px;
            height: 23px;

            @include breakpoint(430px) {
                width: fit-content;
            }


            .crumb1 {
                position: absolute;

                a {
                    margin-right: 12px;
                    color: #333333;

                    &:hover {
                        color: #999999;
                    }
                }
            }

            .crumb2 {
                margin-left: 60px;
                margin-right: 20px;

                a {
                    color: #333333;

                    &:hover {
                        color: #999999;
                    }
                }

                img {
                    margin-left: 12px;
                }
            }

            .crumb3 {
                margin-left: 158px;
                margin-top: -18px;

                a {
                    color: #333333;

                    &:hover {
                        color: #999999;
                    }
                }
            }
        }

        .restaurant_btns {
            display: flex;
            margin-top: 22px;
            margin-right: 30px;

            @include breakpoint(1350px) {
                margin-right: 1vw;
            }

            @include breakpoint(1024px) {
                width: 20px;
                height: 20px;
            }

            @include breakpoint(430px) {
                width: fit-content;
            }

            .collect {
                width: 44px;
                height: 44px;
                background-color: #C8AC96;
                border-radius: 50px;
                margin-right: 8px;

                &:hover {
                    transform: translateY(-5px);
                    filter: drop-shadow(3px 3px 2px rgba(97, 97, 97, 0.7));
                }

                @include breakpoint(1024px) {

                    margin-right: 8px;
                }

                @include breakpoint(820px) {
                    width: 40px;
                    height: 40px;
                    margin-right: 0px;
                }

                @include breakpoint(430px) {
                    width: 30px;
                    height: 30px;
                    margin: 0px 8px 2px 8px;
                    position: relative;
                }

                img {
                    width: 13px;
                    height: 16px;
                    margin: 14px 12px 12px 12px;

                    @include breakpoint(430px) {
                        margin: 0;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                }
            }

            .share {
                width: 44px;
                height: 44px;
                background-color: #C8AC96;
                border-radius: 50px;
                margin-right: 8px;

                &:hover {
                    transform: translateY(-5px);
                    filter: drop-shadow(3px 5px 2px rgba(97, 97, 97, 0.7));
                }

                @include breakpoint(1024px) {
                    margin-right: 8px;
                }

                @include breakpoint(820px) {
                    width: 40px;
                    height: 40px;
                    margin-right: 0px;
                }

                @include breakpoint(430px) {
                    width: 28px;
                    height: 28px;
                    position: relative;
                    margin-left: -1vw;
                }

                a {}

                img {
                    width: 23px;
                    height: 18.57px;
                    margin: 10px 10px 10px 10px;

                    @include breakpoint(430px) {
                        margin: 0;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                }
            }

            .message {
                width: 44px;
                height: 44px;
                background-color: #C8AC96;
                border-radius: 50px;
                // margin-right: 8px;

                &:hover {
                    transform: translateY(-5px);
                    filter: drop-shadow(3px 5px 2px rgba(97, 97, 97, 0.7));
                }

                @include breakpoint(820px) {
                    width: 40px;
                    height: 40px;
                }

                @include breakpoint(430px) {
                    width: 28px;
                    height: 28px;
                    position: relative;

                }

                img {
                    width: 23px;
                    height: 22.98px;
                    margin: 9.73px 10px 11.29px 11px;

                    @include breakpoint(820px) {
                        width: 20px;
                        height: 20px;
                    }

                    @include breakpoint(430px) {
                        margin: 0;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                }
            }
        }
    }

    .restaurant_header {
        display: flex;
        width: 78vw;
        margin: 0 auto;
        // text-align: center;
        justify-content: center;

        @include breakpoint(820px) {
            // width: 90px;
        }

        @include breakpoint(430px) {
            flex-direction: column;
        }

        .restaurant_slogan {
            line-height: 150%;
            color: #7A625B;
            margin-top: 5%;
            margin-left: 6.5%;

            @include breakpoint(1280px) {
                margin-left: 2vw;
            }

            @include breakpoint(1024px) {
                margin-left: 23px;
                width: 52vw;
                margin-top: 17%;
            }

            @include breakpoint(820px) {
                font-size: 30px;
                margin-left: 10px;
                width: 73vw;
                margin-top: 21%;
            }

            @include breakpoint(430px) {
                font-size: 30px;
                margin-left: 0vw;
                width: 81vw;
                margin-top: 2vw;
            }

            @include breakpoint(390px) {

                width: 89vw;
            }
        }

        h4 {
            line-height: 150%;
            margin-left: 9%;
            width: 478px;

            @include breakpoint(1280px) {
                margin-left: 2vw;
            }

            @include breakpoint(1024px) {
                width: 423px;
                margin-left: 20px;
                // font-size: 18px;
            }

            @include breakpoint(820px) {
                font-size: 17px;
                width: 459px;
            }

            @include breakpoint(430px) {
                font-size: 16px;
                width: 74vw;
                margin-top: 3vw;
                margin-bottom: 4vw;
            }
        }
    }
}


.restaurant_section {
    background-color: #F6F1ED;
    width: 70vw;
    padding-bottom: 46px;
    border-bottom: 2px solid #CB4847;
    margin: 0 auto;

    @include breakpoint(1280px) {
        width: 68vw;
    }

    @include breakpoint(1024px) {
        width: 68vw;
        padding-bottom: 8vw;
    }


    @include breakpoint(430px) {
        width: 86vw;
    }

    @include breakpoint(390px) {
        width: 86vw;
        padding-bottom: 0vw;
    }

    .restaurant_h3 {
        h3 {
            color: #CB4847;
            font-weight: bold;
            padding-bottom: 10px;
            margin-bottom: 16px;
            width: 70vw;
            border-bottom: 2px solid #CB4847;

            @include breakpoint(820px) {
                font-size: 26px;
            }

            @include breakpoint(430px) {
                font-size: 23px;
                width: 86vw;
            }
        }
    }

    .restaurant_mapinfo {
        display: flex;
        justify-content: center;
        gap: 3vw;
        width: 69vw;

        @include breakpoint(1440px) {
            gap: 0vw;
        }

        @include breakpoint(1280px) {
            width: 71vw;
        }

        @include breakpoint(1100px) {
            margin-left: -3vw;
            gap: 0vw;
            width: 80vw;
        }

        @include breakpoint(1024px) {
            width: 94vw;
            flex-direction: column;
        }

        @include breakpoint(820px) {
            margin-left: 0vw;
            margin-bottom: 5vw;
        }

        @include breakpoint(390px) {
            margin-left: 0vw;
            margin-bottom: 1vw;
        }

        .restaurant_info {
            .info {
                width: 540px;
                padding-left: 0;

                @include breakpoint(1350px) {
                    width: 40vw;
                }

                @include breakpoint(1280px) {
                    width: 39vw;
                    margin-left: 2vw;
                }

                @include breakpoint(1100px) {
                    width: 50vw;
                }

                @include breakpoint(1024px) {
                    width: 662px;
                }

                @include breakpoint(820px) {
                    width: 60vw;
                }

                @include breakpoint(430px) {
                    width: 86vw;
                }


                tr {
                    @include breakpoint(1280px) {
                        margin-left: 10px;

                    }

                    @include breakpoint(1100px) {
                        margin-left: 12px;

                    }

                    th {
                        font-weight: bold;
                        font-size: 20px;
                        color: #333333;
                        padding-top: 16px;
                        padding-bottom: 8px;
                        border-bottom: 1px solid #333333;
                        text-align: left;
                        width: 160px;

                        @include breakpoint(1280px) {
                            width: 10vw;
                        }

                        @include breakpoint(1100px) {
                            margin-left: 145px;
                            width: 10vw;
                        }

                        @include breakpoint(1024px) {
                            width: 150px;
                        }

                        @include breakpoint(820px) {
                            font-size: 18px;
                        }

                        @include breakpoint(820px) {
                            font-size: 17px;
                            width: 93px;
                        }

                        @include breakpoint(390px) {
                            font-size: 17px;
                            width: 76px;
                        }

                    }

                    td {
                        font-size: 20px;
                        padding-right: 70px;
                        border-bottom: 1px solid #333333;

                        @include breakpoint(1280px) {
                            padding-right: 50px;
                        }

                        @include breakpoint(1024px) {
                            padding: 0 0 0 0;
                            margin-left: 0;
                        }

                        @include breakpoint(820px) {
                            font-size: 18px;
                        }

                        @include breakpoint(390px) {
                            font-size: 17px;
                        }
                    }
                }
            }

            .restaurant_media {
                margin-top: 25.5px;
                display: flex;
                margin-left: -80px;

                @include breakpoint(430px) {
                    display: block;
                }

                .restaurant_fb {
                    display: flex;

                    img {
                        margin-right: 12px;
                        flex-direction: row-reverse;

                        @include breakpoint(390px) {
                            width: 26px;
                        }
                    }

                    h4 {
                        display: block;

                        @include breakpoint(1280px) {
                            // font-size: 18px;
                            width: 17vw;
                        }

                        @include breakpoint(1024px) {
                            font-size: 18px;
                            width: 24vw;
                        }

                        @include breakpoint(820px) {
                            font-size: 18px;
                            width: 24vw;
                        }

                        @include breakpoint(788px) {
                            font-size: 18px;
                            width: 68vw;
                        }

                        @include breakpoint(753px) {
                            font-size: 18px;
                            width: 68vw;
                        }

                        @include breakpoint(430px) {
                            font-size: 18px;
                            width: 45vw;
                        }

                        @include breakpoint(390px) {
                            font-size: 17px;
                            width: 49vw;
                        }

                    }
                }

                .restaurant_ig {
                    display: flex;

                    @include breakpoint(1280px) {
                        padding-left: 0px;
                    }

                    @include breakpoint(430px) {
                        margin: 4vw 0 4vw 7vw;
                    }

                    img {
                        margin-right: 12px;
                        display: flex;
                        margin-left: 76px;
                        display: inline;

                        @include breakpoint(1280px) {
                            margin-left: 1vw;

                        }

                        @include breakpoint(1200px) {
                            margin-left: 28px;
                            // padding-bottom: 5px;
                        }

                        @include breakpoint(1024px) {
                            margin-left: 48px;
                            // padding-bottom: 5px;
                        }

                        @include breakpoint(390px) {
                            width: 26px;
                        }


                    }

                    h4 {
                        @include breakpoint(430px) {
                            font-size: 18px;
                        }

                        @include breakpoint(390px) {
                            font-size: 17px;
                        }
                    }
                }

                .line {
                    width: 1096 vw;
                    border-bottom: 2px solid #CB4847;

                    @include breakpoint(1024px) {
                        width: 68vw;
                        margin-left: -53vw;
                        // padding-bottom: 5px;
                    }

                    @include breakpoint(790px) {
                        width: 68vw;
                        margin-left: -61vw;
                        // padding-bottom: 5px;
                    }

                    @include breakpoint(820px) {
                        margin-bottom: -2vw;
                        margin-left: -56vw;
                    }
                }
            }

        }

        .map {
            padding-left: 60px;
            height: 248px;

            @include breakpoint(1440px) {
                padding-left: 0px;
            }

            @include breakpoint(1024px) {
                width: 83vw;
                margin-right: 2vw;
                margin-top: 3vw;
                margin-left: 12vw;
                padding-bottom: 4vw;
            }

            @include breakpoint(820px) {
                margin-left: 6vw;
                padding-left: 0vw;
            }

            #google_map {
                width: 500px;
                height: 300px;

                @include breakpoint(1024px) {
                    width: 600px;
                    margin-left: -6vw;
                }
            }

            @include breakpoint(820px) {
                width: 87vw;
                margin-right: 0vw;
                margin-top: 10vw;
                margin-left: 9vw;
                padding-bottom: 8vw;

                #google_map {
                    width: 500px;
                    height: 300px;
                    margin-left: -7vw;
                    margin-top: -4vw;
                }

            }

            @include breakpoint(430px) {
                width: 80vw;
                margin-right: 0vw;
                margin-top: 4vw;
                margin-left: 4vw;
                padding-bottom: 11vw;

                #google_map {
                    width: 400px;
                    height: 300px;
                }
            }

            @include breakpoint(390px) {


                #google_map {
                    width: 350px;
                    height: 250px;
                }
            }


        }

        img {
            display: block;
            text-align: right;
            margin-left: 78px;
        }
    }

    // .restaurant_btns {
    //     display: flex;

    //     .collect {
    //         background-color: #C8AC96;
    //         width: 40px;
    //         height: 40px;

    //         img {
    //             width: 23px;
    //             height: 23px;
    //         }
    //     }

    //     .share {
    //         img {
    //             width: 23px;
    //             height: 23px;
    //         }
    //     }

    //     .message {
    //         img {
    //             width: 23px;
    //             height: 23px;
    //         }
    //     }
    // }

}

.restaurant_mainContent {
    width: 82vw;
    background-color: #F6F1ED;
    padding-top: 38px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;

    @include breakpoint(390px) {
        margin-left: 2vw;
    }


    .restaurant_content1 {
        display: flex;

        @include breakpoint(430px) {
            flex-direction: column-reverse;
            margin-left: 20vw;
        }

        h4 {
            color: #333333;
            font-size: 24px;
            line-height: 150%;

            @include breakpoint(1425px) {
                font-size: 20px;
                margin-top: 2vw;
            }

            @include breakpoint(1024px) {
                font-size: 20px;
                margin-top: 2vw;
            }

            @include breakpoint(820px) {
                font-size: 17px;
                width: 40vw;
            }

            @include breakpoint(749px) {
                font-size: 17px;
                width: 45vw;
            }

            @include breakpoint(430px) {
                font-size: 17px;
                width: 76vw;
            }

            @include breakpoint(390px) {
                width: 83vw;
            }
        }

        img {
            padding-left: 32px;

            @include breakpoint(1024px) {
                padding-left: 5px;
                width: 32vw;
            }

            // @include breakpoint(1106px) {
            //     width: 33vw;
            //     padding-left: 32px;
            // }

            @include breakpoint(820px) {
                width: 34vw;
                height: 23vw;
            }

            @include breakpoint(430px) {
                width: 57vw;
                height: 38vw;
                margin-left: 8vw;
            }
        }
    }

    .restaurant_content2 {
        display: flex;

        @include breakpoint(430px) {
            flex-direction: column;
        }

        h4 {
            margin-top: 40px;
            margin-left: 42px;

            @include breakpoint(1024px) {
                margin-left: 5px;
                margin-top: 6vw;
            }

            @include breakpoint(820px) {
                margin-left: 2vw;
                font-size: 17px;
            }

            @include breakpoint(430px) {
                margin-left: 11.3vw;
                font-size: 16px;
            }

            @include breakpoint(390px) {
                margin-left: 3.3vw;
            }
        }

        img {
            margin-left: -25px;
            margin-top: 40px;

            @include breakpoint(1024px) {
                padding-left: 5px;
                width: 32vw;
            }

            @include breakpoint(820px) {
                width: 34vw;
                height: 23vw;
                margin-left: 11px;
            }

            @include breakpoint(430px) {
                width: 57vw;
                height: 38vw;
                margin-left: 20vw;
            }

            @include breakpoint(390px) {
                height: 35vw;
            }
        }
    }

    .restaurant_content3 {
        display: flex;
        padding-bottom: 61px;

        @include breakpoint(430px) {
            flex-direction: column-reverse;
        }

        h4 {
            margin-top: 40px;

            @include breakpoint(1024px) {
                margin-top: 80px;
            }

            @include breakpoint(820px) {
                margin-top: 8vw;
                font-size: 17px;
            }

            @include breakpoint(430px) {
                margin-left: 11.3vw;
                font-size: 16px;
            }

            @include breakpoint(390px) {
                margin-left: 3.3vw;
            }
        }

        img {
            margin-left: 52px;
            margin-top: 40px;

            @include breakpoint(1024px) {
                margin-left: 5px;
                padding-left: 5px;
                width: 32vw;
            }

            @include breakpoint(820px) {
                width: 34vw;
                height: 23vw;
            }

            @include breakpoint(430px) {
                width: 57vw;
                height: 38vw;
                margin-left: 18vw;
            }
        }
    }
}

.restaurant {
    background-color: #F6F1ED;
    width: 82.75vw;
    padding-bottom: 40px;

    @include breakpoint(820px) {
        padding-bottom: 0vw;
    }

    .restaurant_review {
        width: 78vw;
        height: 425px;
        background-color: #fff;
        padding-left: 20px;
        margin: 0 auto;

        @include breakpoint(820px) {
            height: 74vh;
            width: 71vw;
        }

        @include breakpoint(430px) {
            width: 78vw;
            margin-left: 10vw;
            height: 197vw;
        }

        .restaurant_review_content {
            display: flex;
            justify-content: space-between;
            padding-top: 8px;
            width: 76.5vw;

            .restaurant_review_title {
                display: flex;
                width: 535px;
                line-height: 50px;
                font-weight: bold;
                border-bottom: 2px solid #CB4847;

                @include breakpoint(820px) {
                    margin-left: 1vw;
                    width: 56vw;
                }

                @include breakpoint(430px) {
                    width: 61vw;
                }

                h3 {
                    margin-top: 8px;
                    width: 535px;
                    height: 50px;
                    color: #CB4847;

                    @include breakpoint(820px) {
                        font-size: 26px;
                        width: 32vw;
                    }

                    @include breakpoint(430px) {
                        font-size: 23px;
                    }

                    @include breakpoint(390px) {
                        font-size: 21px;
                    }
                }

                span {
                    display: flex;
                    align-items: center;

                    .restaurantstarimg {
                        width: 20px;
                        height: 20px;
                    }

                    .restaurant_rating {
                        color: #7A625B;
                        font-size: 20px;
                        font-weight: bold;
                        margin-left: 8px;

                        @include breakpoint(390px) {
                            font-size: 18px;
                        }
                    }

                    .restaurant_review_num {
                        color: #999999;
                        font-size: 20px;
                        font-weight: bold;
                        width: 107px;
                        margin-left: 8px;

                        @include breakpoint(430px) {
                            font-size: 18px;
                        }

                        @include breakpoint(390px) {
                            font-size: 16px;
                        }
                    }
                }
            }

            .icon_bg {
                margin-top: 16px;
                width: 44px;
                height: 44px;
                background-color: #C8AC96;
                border-radius: 50%;
                margin-left: 35vw;

                @include breakpoint(1280px) {
                    margin-left: 30vw;
                }

                @include breakpoint(1024px) {
                    margin-left: 18vw;
                }

                @include breakpoint(820px) {
                    margin-left: -7vw;
                }

                @include breakpoint(430px) {
                    width: 30px;
                    height: 30px;
                    margin-left: 2vw;
                }

                @include breakpoint(390px) {
                    width: 28px;
                    height: 28px;
                    margin-left: -4vw;
                }

                img {
                    margin: 10.76px 11.49px 11.96px 11px;


                    @include breakpoint(820px) {
                        width: 28px;
                        height: 28px;
                        margin: 7px 0px 7px 2px;
                    }

                    @include breakpoint(430px) {
                        width: 20px;
                        height: 20px;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50% -50%);
                    }

                    @include breakpoint(390px) {
                        width: 18px;
                        height: 18px;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50% -50%);
                    }
                }
            }
        }

        .customer_review {
            display: flex;
            width: 75vw;
            height: 220px;
            justify-content: space-between;
            margin-top: 20px;

            @include breakpoint(1024px) {
                display: flex;
                height: 220px;
                width: 75vw;
                // justify-content: space-between;
                // margin-top: 20px;
            }

            @include breakpoint(820px) {
                display: block;
                height: 25vh;
                width: 48vw;
                margin-left: 9vw;
            }

            @include breakpoint(430px) {
                height: 60%;
            }

            @include breakpoint(390px) {
                height: 72%;
            }

            li {
                width: 24vw;
                height: 220px;
                border-radius: 5px;
                background-color: #F6F1ED;
                border-radius: 5px;
                filter: drop-shadow(0 0 7px rgba(207, 81, 61, 0.4));

                @include breakpoint(820px) {
                    margin: auto;
                    width: 48vw;
                    height: 18vh;
                    margin-bottom: 3vw;
                }

                // @include breakpoint(820px) {
                //     margin-left: 15vw;
                //     width: 40vw;
                //     height: 24vh;
                // }

                @include breakpoint(430px) {
                    width: 72vw;
                    margin-left: -11vw;
                    margin-bottom: 6vw;
                    height: 47vw;
                }

                div {
                    display: flex;

                    @include breakpoint(820px) {
                        margin-left: 3vw;
                    }

                    span {
                        margin-top: 20px;

                        .user {
                            width: 36px;
                            height: 36px;
                            // padding-left: 30px;
                            margin-left: 1.7vw;

                            @include breakpoint(1280px) {
                                padding-left: 6px;
                            }

                            @include breakpoint(1024px) {
                                padding-left: 8px;
                                padding-top: 8px;
                            }

                            @include breakpoint(820px) {
                                // padding-left: 2.5vw;
                            }

                        }

                        .restaurant_username {
                            padding-left: 16px;
                            font-size: 20px;
                            font-weight: bold;
                            color: #7A625B;
                            margin: 0 auto;

                            @include breakpoint(1024px) {
                                padding-left: 9px;
                                font-size: 18px;
                                width: 140px;
                                padding-top: 12px;
                            }

                        }
                    }

                    span {
                        display: flex;
                        padding-left: 0px;

                        @include breakpoint(1024px) {
                            padding-left: 0px;
                        }

                        .good {
                            margin-top: 7px;
                            margin-left: 52px;
                            width: 16px;
                            height: 16px;

                            @include breakpoint(1024px) {
                                margin-left: 0px;
                                margin-top: 16px;
                            }

                            @include breakpoint(820px) {
                                // padding-left: 110px;
                                // margin-left: 113vw;
                            }
                        }

                        .number {
                            width: 28px;
                            height: 24px;
                            text-align: center;
                            margin: 0 auto;
                            color: #CB4847;
                            margin-left: 4px;
                            padding-top: 5px;

                            @include breakpoint(1024px) {
                                margin-top: 7px;
                            }

                            @include breakpoint(820px) {
                                padding-left: 0vw;
                            }
                        }
                    }
                }

                .star {
                    display: flex;
                    padding-left: 26px;

                    @include breakpoint(1024px) {
                        padding-left: 2px;
                    }

                    @include breakpoint(820px) {
                        padding-left: 2vw;
                    }

                    .starbar {
                        display: flex;

                        @include breakpoint(1024px) {
                            padding-left: 2px;
                        }

                        img {
                            width: 24px;
                            height: 24px;
                            padding-left: 4px;

                            @include breakpoint(1024px) {
                                width: 18px;
                                height: 18px;
                            }

                            @include breakpoint(820px) {}
                        }
                    }

                    .date {
                        margin-left: 28px;

                        h5 {
                            padding-right: 15px;
                            font-size: 16px;

                            @include breakpoint(1280px) {
                                margin-left: -1.9vw;
                                font-size: 13.7px;
                            }

                            @include breakpoint(820px) {
                                padding-left: 10vw;
                                margin-left: -0.5vw;
                                width: -1px;
                                font-size: 15px;
                            }

                            @include breakpoint(430px) {
                                padding-left: 8vw;
                            }

                            @include breakpoint(390px) {
                                padding-left: 2vw;
                                margin-left: -6.2vw;
                            }
                        }
                    }
                }

                h4 {
                    margin-top: 12px;
                    padding-left: 30px;

                    @include breakpoint(1024px) {
                        margin-left: 18px;
                        font-size: 18px;
                        padding-left: 2px;
                    }

                    @include breakpoint(820px) {
                        margin-left: 5vw;
                    }
                }
            }
        }
    }
}

.readmord {
    width: 144px;
    height: 52PX;
    background-color: #CB4847;
    border-radius: 15px;
    margin: 16px auto;
    display: block;
    border: none;

    @include breakpoint(1024px) {
        margin: 16px 0 16px 330px;
    }

    @include breakpoint(820px) {
        margin-left: 26vw;
        margin-top: 48vw;
    }

    @include breakpoint(430px) {
        margin-left: 21vw;
        margin-top: 30vw;
    }

    @include breakpoint(390px) {
        margin-left: 16vw;
        margin-top: 16vw;
    }


    a {
        font-size: 20px;
        color: #fff;

        @include breakpoint(430px) {
            font-size: 16px;
        }
    }
}

#pop {
    background-color: #F6F1ED;
    margin: 0 auto;
    border: none;
    border-radius: 12px;
    filter: drop-shadow(0 0 7px rgba(207, 81, 61, 0.4));
    z-index: 10;
    position: fixed;
    top: -50px;
    left: 450px;
    opacity: 0;
    pointer-events: none;
    transition: opacity .4s;
    text-align: center;

    &.active {
        width: 412px;
        height: 588px;
        opacity: 1;
        pointer-events: auto;
        text-align: center;
        top: 14px;
        left: 513px;

        @include breakpoint(1024px) {
            top: 332px;
            left: 403px;
        }

        @include breakpoint(820px) {
            top: 213px;
            left: 280px;
        }

        @include breakpoint(390px) {
            top: 253px;
            left: 18px;
            width: 93vw;
        }
    }

    .concent_one {

        .starbars {
            display: flex;
            margin-top: 26px;

            .starbar_store {
                margin-left: 28px;
                margin-right: 16px;
                font-weight: 800;
                color: #7A625B;
            }

            #stars {
                img {
                    width: 24px;
                    margin-left: 5px;
                }

                span {
                    font-size: 16px;
                    color: #7A625B;
                    margin-left: 10px;
                }
            }
        }

        .line {
            border: 1px solid red;
            width: 356px;
            border: 1px dashed #333333;
            margin: 20px auto 0;

            @include breakpoint(1024px) {
                width: 34vw;
                margin-left: 3vw;
                margin-bottom: -2vw;
            }

            @include breakpoint(820px) {
                width: 68vw;
                margin-left: -55vw;
                margin-bottom: -1vw;
                margin-left: 5vw;
                width: 40vw;
            }

            @include breakpoint(390px) {
                margin-bottom: -1vw;
                margin-left: 6vw;
                width: 76vw;
            }

        }

        .masg {
            width: 252px;
            margin-top: 8px;
            color: #7A625B;
            margin-left: 28px;
        }

        .experience {
            width: 100px;
            font-weight: 800;
            color: #7A625B;
            margin-left: 20px;
            margin-top: 28px;
        }

        .text_1 {
            margin-top: 8px;

            .text_concent {
                width: 356px;
                height: 108px;
                font-size: 14px;
                border-radius: 9px;
                color: #C3A988;
                padding: 9px 0 0 10px;

                @include breakpoint(390px) {
                    width: 329px;
                }

                &::placeholder {
                    color: #C3A988;
                    font-size: 12px;
                }
            }
        }

        .text_words {
            color: #7A625B;
            text-align: right;
            margin-right: 28px;
        }
    }

    .share {
        display: flex;

        &_photo {
            width: fit-content;
            font-weight: 800;
            color: #7A625B;
            margin-left: 30px;
        }

        &_six {
            margin-top: 5px;
            color: #7A625B;
            margin-left: 12px;
        }
    }

    .concent_two {
        width: 264px;
        height: 168px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: auto;
        margin-top: 16px;
        padding-bottom: 40px;

        .box1,
        .box2,
        .box3,
        .box4,
        .box5,
        .box6 {
            border: 1px solid #DBCEC6;
            background-color: #DBCEC6;
            width: 80px;
            height: 80px;
            text-align: center;
            border-radius: 6px;
            position: relative;
            margin-bottom: 12px;

            .add {
                font: bold 15px Tahoma;
                color: #999999;
                position: absolute;
                transform: translate(-50%, -50%);
                margin-left: 39px;
                margin-top: 37px;
            }

            & img {
                width: 124px;
                height: 124px;
            }

            input[type="file"] {
                width: 80px;
                height: 80px;
                opacity: 0;
            }
        }
    }

    .buttons {
        display: flex;
        text-align: center;
        width: 200px;
        justify-content: space-between;
        align-items: center;
        margin: auto;
        margin-left: 8vw;
        margin-top: 1.5vw;

        @include breakpoint(820px) {
            margin-left: 13vw;
            margin-top: 1.5vw;
        }

        @include breakpoint(390px) {
            margin-left: 22vw;
            margin-top: 4.5vw;
        }

        .cancel {
            width: 100px;
            height: 40px;
            font-size: 32px;
            font-weight: bold;
            background-color: #C8AC96;
            color: #fff;
            border-radius: 9px;
        }

        .sendout {
            width: 100px;
            height: 40px;
            font-weight: bold;
            background-color: #CB4847;
            color: #fff;
            border-radius: 9px;
            margin-left: 24px;
        }
    }
}

.test {

    // display: flex;
    .test1 {
        display: flex;
        margin-left: 81px;
        padding-right: 1px;
        margin-top: 16px;
    }

    .test2 {
        margin-top: 14px;
        margin-left: 80px;
    }

    img {
        max-width: 124px;
        max-height: 124px;
        margin-left: 30px;
        border-radius: 9px;
    }

    input[type=file] {
        padding: 10px;
        background-color: #F6F1ED;
        border-radius: 9px;
        padding-left: 34px;
    }
}
</style>
