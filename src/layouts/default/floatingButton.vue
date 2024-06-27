<template>
    <div
        class="floating-button-container"
        @mouseenter="showButtons = true"
        @mouseleave="showButtons = false"
    >
        <div v-if="showButtons" class="additional-buttons">
            <button class="additional-button">
                <a href="https://www.facebook.com/">
                    <img src="/src/assets/Image/food/Facebook.png" alt="" />
                </a>
            </button>
            <button class="additional-button">
                <a href="https://www.instagram.com/">
                    <img src="/src/assets/Image/food/Instagram.png" alt="" />
                </a>
            </button>
            <button class="additional-button" @click="showFAQ = true">
                <img
                    src="/src/assets/Image/food/QuestionCircleFill.png"
                    alt=""
                />
            </button>
        </div>
        <button class="main-button">
            <!-- <img src="/src/assets/Image/food/FloatingButton.png" alt="" /> -->
        </button>
    </div>
    <button class="back-to-top-button" @click="scrollToTop">
        <!-- <img src="/src/assets/Image/food/BackToTop.png" alt="" /> -->
    </button>

    <!-- FAQ Dialog -->
    <div v-if="showFAQ" class="faq-dialog">
        <div class="faq-dialog-content">
            <button @click="showFAQ = false">
                <img src="/src/assets/Image/food/floating_cross.png" alt="" />
            </button>
            <div class="chatBox-icon">
                <img
                    src="/src/assets/Image/food/chatBox_icon.png"
                    alt=""
                    @click="resetFAQs"
                />
                <!-- <p class="top-part">
                    梨花殿非常高興聆聽您的意見，如果想詢問任何事宜，歡迎點擊以下資訊：
                </p> -->
            </div>
            <ul>
                <li v-for="(faq, index) in faqs" :key="index">
                    <strong @click="toggleAnswer(index)">
                        Q：{{ faq.question }}
                    </strong>
                    <p v-if="faq.showAnswer">A：{{ faq.answer }}</p>
                </li>
                <!-- FAQ關鍵字搜尋區塊 -->
                <div>
                    <input
                        type="text"
                        v-model="searchKeyword"
                        placeholder="輸入關鍵字查詢"
                    />
                    <button @click="searchFAQs">搜尋</button>
                    <!-- <button @click="resetFAQs">返回</button> -->
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            showButtons: false,
            showFAQ: false,
            faqs: [],
            searchKeyword: "",
        };
    },
    mounted() {
        this.fetchFAQs();
    },
    methods: {
        fetchFAQs() {
            axios
                .get(
                    //"http://localhost/tid101_g1/public/php/chatBot/selectFAQs.php"

                    `${import.meta.env.VITE_PHP_PATH}chatBot/selectFAQs.php`
                )
                .then((response) => {
                    this.faqs = response.data.map((faq) => ({
                        question: faq.QUESTION,
                        answer: faq.ANSWER,
                        showAnswer: false,
                    }));
                })
                .catch((error) => console.error("Error fetching FAQs:", error));
        },
        searchFAQs() {
            axios
                .get(
                    //"http://localhost/tid101_g1/public/php/chatBot/keyWordSearch.php",
                    `${import.meta.env.VITE_PHP_PATH}chatBot/selectFAQs.php`,

                    {
                        params: {
                            keyword: this.searchKeyword,
                        },
                    }
                )
                .then((response) => {
                    this.faqs = response.data.map((faq) => ({
                        question: faq.QUESTION,
                        answer: faq.ANSWER,
                        showAnswer: false,
                    }));
                })
                .catch((error) =>
                    console.error("Error searching FAQs:", error)
                );
        },
        resetFAQs() {
            this.searchKeyword = "";
            this.fetchFAQs();
        },
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
        toggleAnswer(index) {
            this.faqs.forEach((faq, i) => {
                if (i !== index) {
                    faq.showAnswer = false;
                }
            });
            this.faqs[index].showAnswer = !this.faqs[index].showAnswer;
        },
    },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
@mixin breakpoint($point) {
    @media screen and (max-width: $point) {
        @content;
    }
}
.floating-button-container {
    position: fixed;
    bottom: 144px;
    right: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 100;
    @include breakpoint(680px) {
        bottom: 110px;
    }
    .main-button {
        margin-top: 5px;
        width: 60px;
        height: 60px;
        background-image: url(/src/assets/Image/food/FloatingButton.png);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-color: $OffWhite;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s;
        @include breakpoint(680px) {
            width: 60px;
            height: 60px;
        }
        &:hover {
            transform: translateY(-2px);
        }
    }

    .additional-buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
        animation: fadeIn 0.3s ease-in-out;

        .additional-button {
            background-color: $OffWhite;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            margin: 5px 0;
            width: 60px;
            height: 60px;
            display: flex;
            @include breakpoint(680px) {
                width: 60px;
                height: 60px;
                padding: 0;
            }
            transition: background-color 0.3s, transform 0.3s;
            img {
                max-width: 100%;
                max-height: 100%;
            }
            &:hover {
                transform: translateY(-2px);
            }
        }
    }
}

.back-to-top-button {
    z-index: 100;
    position: fixed;
    bottom: 76px;
    right: 20px;
    width: 60px;
    height: 60px;
    border: none;
    color: $Gold;
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
    margin-top: 10px;
    background-image: url(/src/assets/Image/food/BackToTop.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    &:hover {
        transform: translateY(-2px);
    }
    @include breakpoint(680px) {
        width: 60px;
        height: 60px;
        bottom: 45px;
    }
}

.faq-dialog {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 200;

    .faq-dialog-content {
        width: 390px;
        background: $LightBrown;
        padding: 20px;
        border-radius: 40px;
        text-align: left;
        button {
            background-color: transparent;
            border: none;
            float: right;
            cursor: pointer;
            width: 50px;
            height: 50px;
            display: flex;
        }
        .chatBox-icon {
            display: flex;
            img {
                cursor: pointer;
            }
            .top-part {
                color: #000;
                margin: 10px 0;
                //background-color: $White;
                padding: 5px;
                border-radius: 12px;
            }
        }

        ul {
            list-style-type: none;
            padding: 0;

            li {
                margin-bottom: 10px;
                background-color: $White;
                padding: 5px;
                border-radius: 12px;

                strong {
                    cursor: pointer;
                    color: #000;
                }

                p {
                    cursor: pointer;
                    color: #000;
                    margin: 0;
                }
            }
            div {
                display: flex;
                input {
                    height: 30px;
                    border-radius: 12px;
                    border: none;
                    padding-left: 8px;
                }
                // ::placeholder {
                //     text-align: center;
                // }
                button {
                    width: 50px;
                    height: 30px;
                    text-align: center;
                    line-height: 30px;
                }
            }
        }
    }
}
</style>
