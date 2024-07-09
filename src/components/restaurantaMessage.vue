<template>
    <!---評論區-->
   
    <div id="pop" :class="{ active: popup_open === true }">
        <div class="concent_one">
            <div class="starbars">
                <h4 class="starbar_store">整體評價</h4>
                <div id="stars" class="left">
                    <!--星級test-->
                    <img src="/src/assets/Image/restaurant/north/pentagram.png" alt="" v-if="rating >= 1"
                        @click="change_rating(0)" />
                    <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                        @click="change_rating(1)" />
                    <img src="/src/assets/Image/restaurant/north/pentagram.png" alt="" v-if="rating >= 2"
                        @click="change_rating(1)" />
                    <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                        @click="change_rating(2)" />
                    <img src="/src/assets/Image/restaurant/north/pentagram.png" alt="" v-if="rating >= 3"
                        @click="change_rating(2)" />
                    <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                        @click="change_rating(3)" />
                    <img src="/src/assets/Image/restaurant/north/pentagram.png" alt="" v-if="rating >= 4"
                        @click="change_rating(3)" />
                    <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                        @click="change_rating(4)" />
                    <img src="/src/assets/Image/restaurant/north/pentagram.png" alt="" v-if="rating >= 5"
                        @click="change_rating(4)" />
                    <img src="/src/assets/Image/restaurant/north/empty_pentagram.png" alt="" v-else
                        @click="change_rating(5)" />
                    <span v-text="rating_text[rating]"></span>
                </div>
                <div id="comment" class="left"></div>
            </div>

            <p class="masg">
                根據你的體驗，整體而言你會給該店家幾顆星？
            </p>
            <div class="line"></div>
            <h4 class="experience">體驗心得</h4>
            <h5 class="text_1">
                <textarea class="text_concent" name="text_concent" placeholder="大家都想聽聽你的感想，給還沒去過的人一個參考吧！"
                    v-model="content"></textarea>
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
                <input type="file" @change="fileChange($event, 1)" />
            </div>
            <div class="box2">
                <div class="add">+</div>
                <input type="file" @change="fileChange($event, 2)" />
            </div>
            <div class="box3">
                <div class="add">+</div>
                <input type="file" @change="fileChange($event, 3)" />
            </div>
            <div class="box4">
                <div class="add">+</div>
                <input type="file" @change="fileChange($event, 4)" />
            </div>
            <div class="box5">
                <div class="add">+</div>
                <input type="file" @change="fileChange($event, 5)" />
            </div>
            <div class="box6">
                <div class="add">+</div>
                <input type="file" @change="fileChange($event, 6)" />
            </div>
        </div>
        <div class="buttons">
            <button class="cancel" @click="popup_close">
                <h4>取消</h4>
            </button>
            <button class="sendout" @click="submitFile()">
                <h4>送出</h4>
            </button>
        </div>
    </div>


</template>

<script>
import axios from "axios";

export default {

    props: {
        popup_open: {
            type: Boolean,
            default: false,
        },
    },

    data() {
        return {
            rating: 0,
            // popup_open: false,
            rating_text: ["", "1級星", "2級星", "3級星", "4級星", "5級星"],
            isMember: false,
            isCollected: false,
            showPrompt: false,
            content: "",
            files: [],
            imageData: [],
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

        change_rating(value) {
            this.rating = value;
        },
        popup_close() {
            this.$emit('close-popup');
        },

        fileChange(e, index) {
            let file = e.target.files[0];
            let readFile = new FileReader();
            readFile.readAsDataURL(file);

            readFile.addEventListener("load", () => {
                let image = document.createElement("img");
                image.src = readFile.result;
                image.style.width = "100%";
                image.style.height = "100%";

                let box = document.querySelector(`.box${index}`);
                box.innerHTML = "";
                box.appendChild(image);

                this.imageData[index - 1] = readFile.result;
                this.files[index - 1] = file;
            });
        },
        submitFile() {
				const memberId = this.getMemberIdFromCookie(); // Get member ID from cookie
				const storeId = 1; // Default store ID
				const rating = this.rating;
				const content = this.content; // Get the review content from the data object

				// 檢查必要的字段是否存在且不為空
				if (!memberId) {
					alert("未能獲取會員ID，請重新登錄");
					return;
				}
				if (rating === 0) {
					alert("請給予星級評分");
					return;
				}
				if (!content.trim()) {
					alert("評論內容不能為空");
					return;
				}

				if (this.files.length === 0) {
					const reviewData = {
						storeId,
						memberId,
						rating,
						content,
						imageData: [], // or null, depending on your requirements
					};

					axios
						.post(
							`${
								import.meta.env.VITE_PHP_PATH
							}restaurant/review.php`,
							reviewData
						)
						.then((response) => {
							console.log(response.data);
							alert("評論已送出"); // Display the message returned by PHP
							this.content = "";
							this.rating = 0;
							this.files = []; // Clear the file input
						})
						.catch((error) => {
							console.error("Error submitting review:", error);
							let errorMessage = "提交失敗，請稍後再試";
							if (error.response) {
								errorMessage =
									error.response.data.message || errorMessage;
							}
							alert(errorMessage);
						});

					this.popup_close(); // close the popup after submitting the form
					return;
				}

				const filePromises = this.files.map((file) => {
					return new Promise((resolve, reject) => {
						const reader = new FileReader();
						reader.onload = () => {
							const base64String = reader.result;
							resolve(base64String);
						};
						reader.onerror = () => {
							reject(reader.error);
						};
						reader.readAsDataURL(file);
					});
				});

				// Wait for all files to be converted to base64
				Promise.all(filePromises).then((base64Files) => {
					const imageData = base64Files.filter(
						(file) => file !== null && file !== undefined
					);
					const reviewData = {
						storeId,
						memberId,
						rating,
						content,
						imageData,
					};

					axios
						.post(
							`${
								import.meta.env.VITE_PHP_PATH
							}restaurant/review.php`,
							reviewData
						)
						.then((response) => {
							console.log(response.data);
							alert("評論已送出"); // Display the message returned by PHP
							this.content = "";
							this.rating = 0;
							this.files = []; // Clear the file input
						})
						.catch((error) => {
							console.error("Error submitting review:", error);
							let errorMessage = "提交失敗，請稍後再試";
							if (error.response) {
								errorMessage =
									error.response.data.message || errorMessage;
							}
							alert(errorMessage);
						});

					this.popup_close(); // close the popup after submitting the form
				});
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

#pop {
    background-color: #f6f1ed;
    margin: 0 auto;
    border: none;
    border-radius: 12px;
    filter: drop-shadow(0 0 7px rgba(207, 81, 61, 0.4));
    // z-index: 10;
    // position: fixed;
    // top: 20vh;
    // left: 40vw;
    width: 412px;
    height: 625px;
    opacity: 0;
    pointer-events: none;
    // opacity: 1;
    // pointer-events: auto;
    transition: opacity 0.4s;
    text-align: center;

    &.active {
        width: 412px;
        height: 625px;
        opacity: 1;
        pointer-events: auto;
        text-align: center;
        top: 10%;
        left: 41%;

        @include breakpoint(390px) {
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
                margin-top: 16px;
                font-weight: 800;
                color: #7a625b;
            }

            #stars {
                margin-top: 16px;

                img {
                    width: 24px;
                    margin-left: 5px;
                }

                span {
                    font-size: 16px;
                    color: #7a625b;
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
            color: #7a625b;
            margin-left: 28px;
        }

        .experience {
            width: 100px;
            font-weight: 800;
            color: #7a625b;
            margin-left: 20px;
            margin-top: 28px;
        }

        .text_1 {
            margin-top: 8px;

            .text_concent {
                width: 350px;
                height: 108px;
                font-size: 14px;
                border-radius: 9px;
                color: #c3a988;
                padding: 9px 0 0 10px;

                @include breakpoint(390px) {
                    width: 329px;
                }
            }

            &::placeholder {
                color: #c3a988;
                font-size: 12px;
            }
        }
    }

    .text_words {
        color: #7a625b;
        text-align: right;
        margin-right: 28px;
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
        border: 1px solid #dbcec6;
        background-color: #dbcec6;
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
    margin: 0 auto;
    // margin-left: 7vw;
    margin-top: 2.5vw;

    // @include breakpoint(820px) {
    //     margin-left: 13vw;
    //     margin-top: 1.5vw;
    // }

    // @include breakpoint(390px) {
    //     margin-left: 22vw;
    //     margin-top: 4.5vw;
    // }

    .cancel {
        width: 100px;
        height: 40px;
        font-size: 32px;
        font-weight: bold;
        background-color: #c8ac96;
        color: #fff;
        border-radius: 9px;
    }

    .sendout {
        width: 100px;
        height: 40px;
        font-weight: bold;
        background-color: #cb4847;
        color: #fff;
        border-radius: 9px;
        margin-left: 24px;
    }

    .share{
        width: 100px;
        font-weight: 800;
        color: #7a625b;
        margin-left: 20px;
        margin-top: 28px;
    }
}
</style>
