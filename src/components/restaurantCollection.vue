<template>
    <!--收藏按鈕-->
    <ol class="restaurant_btns">
        <li>
            <button @click="handleCollect" :class="[
                'collect',
                {
                    collected: isCollected,
                    'prompt-active': showPrompt,
                },
            ]">
                <img class="collect_img" src="../assets/Image/restaurant/north/collect.svg" alt="collect" />
            </button>
        </li>
    </ol>

    <!-- 提示框 -->
    <div v-if="showPrompt" class="collect-prompt">
        <p class="collect-prompt_p">請先登入會員</p>
        <button class="collect-prompt_button" @click="redirectToLogin">
            確認
        </button>
        <button class="collect-prompt_button" @click="browseAsGuest">
            以訪客身分瀏覽
        </button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            isMember: false,
            isCollected: false,
            showPrompt: false,
            storeId: 1,
            memberId: "",
        };
    },

    methods: {
        getMemberIdFromCookie() {
            const cookieValue = document.cookie
                .split("; ")
                .find((row) => row.startsWith("memberId="));
            console.log(cookieValue);
            return cookieValue ? cookieValue.split("=")[1] : null;
        },

        handleCollect() {
            const memberId = this.getMemberIdFromCookie();
            if (memberId) {
                const storeId = 1;
                if (this.isCollected) {
                    this.cancelCollectStore(storeId, memberId);
                } else {
                    this.collectStore(storeId, memberId);
                }
                this.isCollected = !this.isCollected;
            } else {
                this.showPrompt = true;
            }
        },
        collectStore(storeId, memberId) {
            const data = {
                storeId,
                memberId,
            };
            axios
                .post(
                    `${import.meta.env.VITE_PHP_PATH}restaurant/collection.php`,
                    data
                )
                .then((response) => {
                    console.log(response.data);
                    // Handle success response
                })
                .catch((error) => {
                    console.error("Error collecting store:", error);
                    // Handle error response
                    let errorMessage = "提交失敗，請稍後再試";
                    if (error.response) {
                        errorMessage = error.response.data.message || errorMessage;
                    }
                    alert(errorMessage);
                });
        },
        collectStore(storeId, memberId) {
            const data = {
                storeId,
                memberId,
            };
            axios
                .post(
                    `${import.meta.env.VITE_PHP_PATH}restaurant/collection.php`,
                    data
                )
                .then((response) => {
                    console.log(response.data);
                    // Handle success response
                })
                .catch((error) => {
                    console.error("Error collecting store:", error);
                    // Handle error response
                    let errorMessage = "提交失敗，請稍後再試";
                    if (error.response) {
                        errorMessage = error.response.data.message || errorMessage;
                    }
                    alert(errorMessage);
                });
        },
        redirectToLogin() {
            this.$router.push({ path: "/login" });
        },
        browseAsGuest() {
            this.showPrompt = false;
        },
        closePrompt() {
            this.showPrompt = false;
        },
    },
};
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

.restaurant_wrapper {
    overflow: hidden;
    width: 100vw;
    background-color: #f6f1ed;
    display: flex;

    @include breakpoint(430px) {
        display: block;
        position: relative;
        width: 100vw;
    }
}

button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    margin-bottom: 28px;
    padding-left: 1px;

    @include breakpoint(430px) {
        margin-bottom: 4px;
        padding-left: 1px;
    }

    @include breakpoint(390px) {
        margin-bottom: 0px;
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
        margin-top: 14px;
    }

    @include breakpoint(390px) {
        margin-top: 10px;
    }

    .collect {
        width: 46px;
        height: 46px;
        background-color: #c8ac96;
        border-radius: 50px;
        margin-right: 12px;

        &:hover {
            transform: translateY(-5px);
            filter: drop-shadow(3px 3px 2px rgba(97, 97, 97, 0.7));
        }

        //收藏後按鈕變色
        &.collected {
            background-color: #cb4847;
        }

        // 提示框彈出時按鈕變色
        &.prompt-active {
            background-color: #cb4847;
        }

        .restaurant_btns .collect_img {
            width: 44px;
            height: 44px;
        }

        .restaurant_btns .collect {
            background: none;
            border: none;
            cursor: pointer;
        }

        @include breakpoint(1024px) {
            // margin-right: 22px;
            padding-left: 7px;
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
    }

    img {
        width: 13px;
        height: 16px;
        margin: 14px 6px 12px 12px;

        @include breakpoint(820px) {
            margin-left: 6px;
            // padding-left: 14px;
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

.collect-prompt {
    position: fixed;
    top: 50%;
    left: 55%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 50;
    width: 17vw;
    border-radius: 3px;

    @include breakpoint(1024px) {
        width: 23vw;
    }

    @include breakpoint(820px) {
        width: 25vw;
    }
}

.collect-prompt_p {
    // margin-bottom: 20px;
    font-size: 16px;
    text-align: center;
}

.collect-prompt_button {
    background-color: #f6f1ed;
    padding: 6px 15px;
    cursor: pointer;
    margin: 1vw 1vw 0vw 1.5vw;
    color: #7a625b;
    border: 1px solid #f6f1ed;
    width: 11vw;

    @include breakpoint(1024px) {
        width: 16vw;
    }

    @include breakpoint(820px) {
        width: 18vw;
    }
}

.restaurant_info {
    .info {
        width: 540px;
        padding-left: 0;

        @include breakpoint(1350px) {
            width: 40vw;
        }

        @include breakpoint(1280px) {
            width: 38vw;
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

                @include breakpoint(1314px) {
                    width: 8vw;
                }

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
}
</style>
