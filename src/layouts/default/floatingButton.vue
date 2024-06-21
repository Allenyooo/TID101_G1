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
            <div class="chatBox-icon">
                <img src="/src/assets/Image/food/chatBox_icon.png" alt="" />
                <p class="top-part">
                    梨花殿非常高興聆聽您的意見，如果想詢問任何事宜，歡迎點擊以下資訊：
                </p>
            </div>
            <ul>
                <li v-for="(faq, index) in faqs" :key="index">
                    <strong @click="toggleAnswer(index)"
                        >Q：{{ faq.question }}</strong
                    >
                    <p v-if="faq.showAnswer">A：{{ faq.answer }}</p>
                </li>
            </ul>
            <button @click="showFAQ = false">關閉</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            showButtons: false,
            showFAQ: false,
            faqs: [
                {
                    question: "一定要登入才能使用網站嗎？",
                    answer: "不用，您可以先閱覽梨花殿大多數的內容，如果想要購買梨饗券、撰寫店家評論，才需要註冊會員。",
                    showAnswer: false,
                },
                {
                    question: "加入梨花殿會員有哪些優勢？",
                    answer: "加入梨花殿會員，可以在我們精選合作的店家留下您用餐後的感想，會員也可以購買梨饗券在我們合作的店家中使用。",
                    showAnswer: false,
                },
                {
                    question: "梨花殿只有韓式餐廳嗎？",
                    answer: "是的，我們希望推廣正統的韓式美食，讓台灣的饕客也可以體驗道地、美味的韓國傳統食物。",
                    showAnswer: false,
                },
                {
                    question: "梨饗券有使用期限嗎？",
                    answer: "梨饗券的使用期限為一年，從下單、結帳的時間開始計算。一年以內都可以在我們合作的店家中使用。",
                    showAnswer: false,
                },
                {
                    question: "梨饗券有限定店家嗎？",
                    answer: "有的，合作店家可以點擊「全台推薦」中查閱。",
                    showAnswer: false,
                },
                {
                    question: "購買梨饗券需要運費嗎？",
                    answer: "不需要。梨饗券為電子票券，待結帳完成後，我們會提供一組QR Code，在餐廳用完餐，出示QR Code結帳就可以直接扣抵當天用餐金額。",
                    showAnswer: false,
                },
                {
                    question: "梨饗券有哪些優惠？",
                    answer: "梨饗券是以市價9折優惠販售，舉例來說：購買面額$500元的梨饗券，售價只需要$450元即可，以此類推。",
                    showAnswer: false,
                },
                {
                    question: "梨饗券可以使用現金購買嗎？",
                    answer: "很抱歉，我們目前只有信用卡、LINE Pay購買方式，暫時還沒有現金購買的服務。",
                    showAnswer: false,
                },
                {
                    question: "梨饗券可以退貨嗎？",
                    answer: "很抱歉，我們暫時沒有提供退貨的服務。",
                    showAnswer: false,
                },
            ],
        };
    },
    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
        toggleAnswer(index) {
            // 先將所有問題的 showAnswer 設為 false
            this.faqs.forEach((faq, i) => {
                if (i !== index) {
                    faq.showAnswer = false;
                }
            });
            // 切換當前問題的 showAnswer 狀態
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
        bottom: 80px;
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
            width: 30px;
            height: 30px;
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
                width: 30px;
                height: 30px;
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
        width: 30px;
        height: 30px;
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
        border-radius: 8px;
        text-align: left;
        .chatBox-icon {
            display: flex;
            img {
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
                    display: block;
                    margin: 5px 0;
                    cursor: pointer;
                    color: #000;
                    &:hover {
                        text-decoration: underline;
                    }
                }

                p {
                    margin: 0;
                    padding-left: 10px;
                    color: #666;
                }
            }
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background-color: $DarkBrown;
            color: white;
            border-radius: 5px;
            justify-items: center;
            cursor: pointer;
            &:hover {
                background-color: $LightBrown;
            }
        }
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(0px);
    }
    to {
        opacity: 1;
        transform: translateY(1px);
    }
}
</style>
