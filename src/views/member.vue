<template>
    <div class="member_wrapper">
        <!--麵包屑-->
        <ol class="breadcrumb">
            <li class="crumb1">
                <router-link to="/home">首頁</router-link>
                <img src="/src/assets/Image/restaurant/north/left.png" alt="" />
            </li>
            <li class="crumb2">
                <a href="#">會員首頁</a>
            </li>
        </ol>

        <!--user photo-->
        <h2 class="member_title">會員資料</h2>

        <section class="member_user">
            <div class="user_name">

                <!-- 新增大頭貼 -->
                <div class="user_photo">
                    <div class="box1">
                        <img ref="preview" :src="imageSrc" alt="" />
                        <img src="../assets/Image/member/lets-icons_img-box.svg" alt="">
                        <input type="file" @change="fileChange" id="user___input" accept="image/*" />
                    </div>
                </div>
                <h2>陳小明</h2>
            </div>

            <ul class="member_container">
                <h4 class="member_labeltwo">會員資訊</h4>

                <li>
                    <label for="container_name">會員姓名</label>
                    <input type="text" id="container_name" value="陳小明" disabled />
                </li>

                <li>
                    <div>
                        <label for="container_nickname">會員暱稱</label>
                        <button @click="shownickname = true">
                            <img src="/src/assets/Image/member/PencilSquare.svg" alt="edit" />
                        </button>
                    </div>
                    <input type="text" id="container_nickname" :value="nickname" disabled />
                </li>

                <!--修改暱稱彈窗-->
                <div class="modal" v-if="shownickname" @click.self="shownickname = false">
                    <div class="pop_container">
                        <h4>會員暱稱修改</h4>
                        <label for="newNickname">新的暱稱</label>
                        <input type="text" id="newNickname" v-model="newNickname" placeholder="請輸入新的暱稱" />
                        <button class="modal__confirm" @click="updateNickname">確認</button>
                        <!-- <button class="modal__cancel" @click="shownickname = false">取消</button> -->
                    </div>
                </div>

                <!-- 成功彈窗 -->
                <div class="modal" v-if="nicknameSuccess">
                    <div class="pop_container">
                        <h4>成功訊息</h4>
                        <p>成功修改暱稱為：{{ newNickname }}</p>
                        <button class="modal__confirm" @click="closeNicknameSuccessModal">確認</button>
                        <button class="modal__cancel" @click="cancelUpdate">取消</button>
                    </div>
                </div>

                <li>
                    <div>
                        <label for="container_phone">電話號碼</label>
                        <button @click="showniPhone = true">
                            <img src="/src/assets/Image/member/PencilSquare.svg" alt="edit" />
                        </button>
                    </div>
                    <input type="tel" id="container_phone" value="0912-345-678" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
                        disabled />
                </li>

                <!--修改電話號碼彈窗-->
                <div class="modal" v-if="showniPhone" @click.self="showniPhone = false">
                    <div class="pop_container">
                        <h4>會員電話號碼修改</h4>
                        <label for="newPhone">新的電話號碼</label>
                        <input type="text" id="newPhone" v-model="newiPhone" placeholder="0 9 * * - * * * - * * *" />
                        <button class="modal__confirm" @click="updatePhone">確認</button>
                        <!-- <button class="modal__cancel" @click="showniPhone = false">取消</button>             -->
                    </div>
                </div>

                <!-- 成功彈窗 -->
                <div class="modal" v-if="showniPhoneSuccess">
                    <div class="pop_container">
                        <h4>成功訊息</h4>
                        <p>成功修改電話號碼為：{{ newiPhone }}</p>
                        <button class="modal__confirm" @click="closeSuccessModal">確認</button>
                    </div>
                </div>

                <!--Error-->
                <div class="modal" v-if="phoneError">
                    <div class="pop_container">
                        <h4>錯誤訊息</h4>
                        <img src="../assets/Image/member/error.svg" alt="">
                        <p>{{ phoneError }}</p>
                        <button class="modal__confirm" @click="closePhoneErrorModal">確認</button>
                    </div>
                </div>

                <li>
                    <label for="container_email">電子信箱</label>
                    <input type="text" id="container_email" value="abc@email.com" onfocus="(this.type='date')"
                        disabled />
                </li>


                <li>
                    <div>
                        <label for="container_password">修改密碼</label>
                        <img src="/src/assets/Image/member/PencilSquare.svg" alt="edit" />
                        <button @click="showModal = true; console.log('showModal:', showModal)"></button>
                    </div>

                    <!--開眼閉眼功能-->
                    <div class="password-input">

                        <input type="password" id="container_password" value="********" disabled v-if="eyeClose" />

                        <input type="text" name="password" id="container_password" v-model="password" readonly v-else />

                        <img src="../assets/Image/member/eye-closed.svg" alt="eyeClosed" class="eye" v-if="eyeClose" />

                        <img src="../assets/Image/member/eye.svg" alt="eyeOpen" class="eye" v-else>


                        <button class="eye-toggle" @click="eyeClose = !eyeClose">
                        </button>
                    </div>
                </li>

                <!-- 修改密碼star -->
                <div class="modal" v-if="showModal" @click.self="showModal = false">
                    <div class="pop_container">
                        <h4>修改密碼</h4>
                        <label for="old_PW">輸入舊密碼</label>

                        <div class="password-input">
                            <input :type="eyeCloseOld ? 'password' : 'text'" id="old_PW" v-model="oldPassword"
                                placeholder="請注意字母大小寫" />
                            <img v-if="!eyeCloseOld" src="../assets/Image/member/eye.svg" alt="eye" class="eye"
                                @click="toggleEye('old')">
                            <img v-else src="../assets/Image/member/eye-closed.svg" alt="eyeclosed" class="eye"
                                @click="toggleEye('old')">
                            <button class="eye-toggle" @click="eyeCloseOld = !eyeCloseOld"></button>
                        </div>

                        <label for="new_PW">輸入新密碼</label>
                        <div class="password-input">
                            <input :type="eyeCloseNew ? 'password' : 'text'" id="new_PW" v-model="newPassword"
                                placeholder="至少8個字元，英文數字不限" />
                            <img v-if="!eyeCloseNew" src="../assets/Image/member/eye.svg" alt="eye" class="eye"
                                @click="toggleEye('new')">
                            <img v-else src="../assets/Image/member/eye-closed.svg" alt="eyeclosed" class="eye"
                                @click="toggleEye('new')">
                            <button class="eye-toggle" @click="eyeCloseNew = !eyeCloseNew"></button>
                        </div>

                        <label for="repeat_PW">重新輸入新密碼</label>
                        <div class="password-input">
                            <input :type="eyeCloseConfirm ? 'password' : 'text'" id="repeat_PW"
                                v-model="confirmPassword" placeholder="請再次輸入相同的密碼" />
                            <img v-if="!eyeCloseConfirm" src="../assets/Image/member/eye.svg" alt="eye" class="eye"
                                @click="toggleEye('confirm')">
                            <img v-else src="../assets/Image/member/eye-closed.svg" alt="eyeclosed" class="eye"
                                @click="toggleEye('confirm')">
                            <button class="eye-toggle" @click="eyeCloseConfirm = !eyeCloseConfirm"></button>
                        </div>
                        <button class="modal__confirm" @click="validatePassword">確認</button>
                        <!-- <button class="modal__cancel" @click="closeModal">取消</button> -->
                    </div>
                </div>
                <!-- 修改密碼end -->

                <!-- Error Modal -->
                <div class="modal" v-if="passwordError">
                    <div class="pop_container">
                        <h4>錯誤訊息</h4>
                        <img src="../assets/Image/member/error.svg" alt="">
                        <p>{{ passwordError }}</p>
                        <button class="modal__confirm" @click="closeErrorModal">確認</button>
                    </div>
                </div>
                <!-- Error Modal End -->

                <!-- Success Modal -->
                <div class="modal" v-if="passwordSuccess">
                    <div class="pop_container">
                        <h4>成功訊息</h4>
                        <img src="../assets/Image/member/error.svg" alt="">
                        <p>修改密碼成功</p>
                        <button class="modal__confirm" @click="closeSuccessModal">確認</button>
                    </div>
                </div>
                <!-- Success Modal End -->

                <li>
                    <label for="container_birthday">生日日期</label>
                    <input type="text" id="container_birthday" value="1994/12/31" onfocus="(this.type='date')"
                        disabled />
                </li>
            </ul>
        </section>

        <!--collect-->
        <section class="member_collection">
            <h4>我的收藏</h4>
            <ul class="card_container">
                <ShopCard class="card" />
                <ShopCard class="card" />
                <ShopCard class="card" />
                <ShopCard class="card" />
                <ShopCard class="card" />
                <ShopCard class="card" />
            </ul>
        </section>

        <!--voucher-->
        <section class="member_voucher">
            <h4>優惠券</h4>
            <div class="voucher_code">
                <input type="text" placeholder=" &#127991 輸入優惠碼" class="voucher_number" />
                <input type="submit" value="確認" class="voucher_sure">
            </div>

            <table class="voucher_data">
                <tr>
                    <th>
                        <h5>優惠序號</h5>
                    </th>
                    <th>
                        <h5>有效日期</h5>
                    </th>
                    <th>
                        <h5>備註</h5>
                    </th>
                </tr>
                <tr>
                    <td>Q7R89A1</td>
                    <td>2025/06/11</td>
                    <td>僅限使用一次</td>
                </tr>
            </table>
        </section>

        <!--my ticket-->
        <section class="member_ticket">
            <h4>我的訂單</h4>

            <table class="ticket_data">
                <tr>
                    <th>
                        <h5>訂單序號</h5>
                    </th>
                    <th>
                        <h5>訂單成立日期</h5>
                    </th>
                    <th>
                        <h5>有效日期</h5>
                    </th>
                    <th>
                        <h5>備註</h5>
                    </th>
                </tr>
                <tr>
                    <td>
                        <router-link to="/receipt">K9RL9A1</router-link>
                    </td>
                    <td>2024/06/11</td>
                    <td>2025/06/11</td>
                    <td>僅限使用一次</td>
                </tr>
                <tr>
                    <td>
                        <router-link to="/receipt">ABRK3A3</router-link>
                    </td>
                    <td>2024/07/02</td>
                    <td>2025/07/02</td>
                    <td>僅限使用一次</td>
                </tr>
            </table>
        </section>

        <button class="return">返回首頁</button>
    </div>
</template>

<script>

//掛載shopCard
import ShopCard from "../components/Shopcard.vue";

export default {
    name: "Member",
    components: {
        ShopCard
    },
    data() {
        return {
            shownickname: false, //修改暱稱closePhoneErrorModal
            nickname: '陳小明',
            newNickname: '',
            nicknameSuccess: false,

            showniPhone: false,
            newiPhone: '',
            phoneError: '',
            showniPhoneSuccess: false,

            showModal: false,
            eyeClose: true,
            password: '12345678',
            eyeCloseOld: true,
            eyeCloseNew: true,
            eyeCloseConfirm: true,
            oldPassword: '',
            newPassword: '',
            confirmPassword: '',
            passwordError: null,
            passwordSuccess: false,

            imageSrc: '',
        };
    },
    methods: {
        closeModal() { //修改完畢關閉彈窗
            this.showModal = false;
        },
        closeErrorModal() {
            this.passwordError = null;
        },
        closeSuccessModal() {
            this.passwordSuccess = false;
            // this.iPhoneSuccessModal = false;  //修改電話成功後彈窗按下確定後關閉彈窗，不能被關閉(問老師)
        },

        closeNicknameSuccessModal() {
            this.nicknameSuccess = false; //修改會員暱稱成功v-if(nicknameSuccess)  = false;
            this.shownickname = false;
        },
        closeiPhoneSuccessModal() { //修改電話號碼
            this.showniPhoneSuccess = false;
            this.showniPhone = false; 
        },
        closePhoneErrorModal() {
            this.showniPhone = false;
            this.phoneError = '';
        },
        closeSuccessModal(){
            this.showniPhoneSuccess = false;
        },
        submitPhone() {
            if (this.newPhone === '') {
                this.phoneError = '您尚未输入信息';

            } else {
                this.updatePhone().then(() => {
                    this.showniPhoneSuccess = true;
                }).catch(() => {
                    // this.showniPhoneError = true;
                    this.phoneError = '電話號碼格式不正確';
                });
            }
        },
        //修改密碼眼睛各別控制
        toggleEye(type) {
            if (type === 'old') {
                this.eyeCloseOld = !this.eyeCloseOld;
            } else if (type === 'new') {
                this.eyeCloseNew = !this.eyeCloseNew;
            } else if (type === 'confirm') {
                this.eyeCloseConfirm = !this.eyeCloseConfirm;
            }
        },
        updateNickname() {
            if (this.newNickname.trim() === '') {
                alert("請輸入新的暱稱");
                return;
            }
            this.nickname = this.newNickname;
            this.nicknameSuccess = true;
            // this.shownickname = false; // 關閉修改暱稱彈窗 
        },
        cancelUpdate() {
            this.shownickname = false; // 取消修改，關閉修改暱稱彈窗
        },
        
        updatePhone() {
            const phonePattern = /^[0-9]{4}-[0-9]{3}-[0-9]{3}$/;
            if (phonePattern.test(this.newiPhone)) {
                this.showniPhoneSuccess = true;
                this.showniPhone = false;
                this.phoneError = '';
            } else {
                this.phoneError = '電話號碼格式不正確。'; 
                
            }
        },
        //照片類型
        fileChange(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                this.checkImageSize(file);
            } else {
                alert("不支援該圖片類型，請重新選擇");
            }
        },
        //照片大小限制00px內
        checkImageSize(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const image = new Image();
                image.onload = () => {
                    if (image.width <= 300 && image.height <= 300) {
                        this.imageSrc = e.target.result;
                    } else {
                        // 超出尺寸限制，跳出錯誤訊息
                        alert("該圖片尺寸超出限制，請選擇小於或等於300px長寬的圖片。");
                    }
                };
                image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        validatePassword() {
            if (this.newPassword !== this.confirmPassword) {
                this.passwordError = "新密碼和確認密碼不符合";
                return;
            }
            this.passwordSuccess = true;
            this.showModal = false;
        },
        validatePhone() {
            const phonePattern = /^[0-9]{4}-[0-9]{3}-[0-9]{3}$/;
            if (!this.newiPhone) {
                this.phoneError = '請輸入電話號碼';
            } else if (!phonePattern.test(this.newiPhone)) {
                this.phoneError = '格式錯誤';
            } else {
                this.showniPhoneSuccess = true;
                this.showniPhone = false;
                this.phoneError = '';
            }
        },
        closePhoneErrorModal() {
            this.phoneError = '';
            this.showniPhone = false;
        },
        closeiPhoneSuccessModal() {
            this.showniPhoneSuccess = false;
            this.showniPhone = false;

            // 未輸入訊息時候設定
            if (this.newPassword === '' || this.confirmPassword === '') {
                this.passwordError = "您尚未輸入訊息";
                return;
            }
            if (this.newPassword !== this.confirmPassword) {
                this.passwordError = "新密碼和確認密碼不相符";
                return;
            }
            this.passwordSuccess = true;
            this.showModal = false;
        },
        updateNickname() {
            if (this.newNickname.trim() === '') {
                alert("請輸入新的暱稱");
                return;
            }
            this.nickname = this.newNickname;
            this.nicknameSuccess = true;
        }
    }
}
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.card_container {
    display: grid;
    grid-template-rows: auto;
    grid-template-columns: 1fr 1fr;
    gap: 20px 40px;
    overflow: hidden;
    width: 70%;
    margin: auto;

    @include breakpoint(1280px) {
        display: grid;
        grid-template-rows: auto;
        grid-template-columns: 1fr 1fr;
        gap: 24px 24px;
        overflow: hidden;
        margin-left: 6vw;
        width: 71vw;
    }

    @include breakpoint(820px) {
        display: block;
        margin-left: 7vw;
    }

    @include breakpoint(430px) {
        height: 186vh;
        width: 80vw;
        margin-left: 0vw;
    }

    @include breakpoint(390px) {
        height: 226vh;
        margin-left: 0vw;
    }

}

.card {
    width: 100%;

    @include breakpoint(430px) {
        background-color: #fff;
    }

    :deep(.normal) {
        width: 100%;
        pointer-events: none;

        @include breakpoint(1280px) {
            width: 100%;
            pointer-events: none;
        }

        @include breakpoint(820px) {
            height: 100%;
            pointer-events: none;
        }

        .shopinfo {
            @include breakpoint(698px) {
                padding-left: 32px;
            }

            @include breakpoint(430px) {
                margin-left: 0px;
                padding-left: 0;
                padding-top: 0;
                background-color: #fff;
                margin-left: 10px;
            }

            h3 {
                @include breakpoint(820px) {
                    margin-bottom: 16px;
                    margin-top: 16px;
                }

                @include breakpoint(430px) {
                    margin-top: 14px;
                    font-size: 16px;

                }
            }
        }

        .content {
            .address {
                @include breakpoint(1024px) {
                    margin-right: 0;
                }

                h5 {
                    width: 23vw;
                    font-size: 14px;

                    @include breakpoint(1024px) {
                        font-size: 14px;
                        width: 20vw;
                    }

                    @include breakpoint(820px) {
                        font-size: 14px;
                        width: 42vw;
                    }

                    @include breakpoint(498px) {
                        font-size: 16px;
                        width: 27vw;
                    }

                    @include breakpoint(420px) {
                        font-size: 16px;
                        width: 27vw;
                    }

                    @include breakpoint(390px) {
                        width: 29vw;
                    }
                }
            }

            .star {
                @include breakpoint(430px) {
                    margin-left: 22vw;

                }

                h5 {
                    font-size: 14px;
                }
            }
        }
    }
    :deep(h3) {  //card
        font-size: 24px; 
        margin-top: 5px;
    }

    @include breakpoint(1024px) {
        font-size: 22px;
    }

    @include breakpoint(820px) {
        font-size: 20px;
        margin-top: 5%;
        height: 45vh;
        width: 60vw;
    }

    @include breakpoint(700px) {
        height: 28vh;
    }

    @include breakpoint(430px) {
        height: 43vh;
        width: 73vw;
    }

    @include breakpoint(390px) {
        height: 52vh;
        margin-left: 1vw;
        width: 75vw;
    }
}

.member_wrapper {
    background-color: $OffWhite;

    //麵包屑
    .breadcrumb {
        width: fit-content;
        padding-top: 130px;
        margin-left: 5vw;

        @include breakpoint(430px) {
            margin-left: 12vw;
        }

        .crumb1 {
            a {
                font-size: 16px;
                text-decoration: none;
                color: #000000;

                @include breakpoint(430px) {
                    font-size: 14px;
                }

                &:hover {
                    color: #999999;
                }
            }

            img {
                padding-left: 1vw;
                padding-right: 1vw;
            }
        }

        .crumb2 {
            a {
                font-size: 16px;
                text-decoration: none;
                color: #000000;

                @include breakpoint(430px) {
                    font-size: 14px;
                }

                &:hover {
                    color: #999999;
                }
            }
        }
    }

    //user photo
    .member_title {
        margin: 0 auto;
        font-size: 36px;
        display: block;
        width: fit-content;
        margin: 2vh auto 3vh;

        @include breakpoint(430px) {
            font-size: 28px;
            margin: 6vh auto 3vh;
        }
    }

    .member_user {
        background-color: $White;
        border: 1px solid $Gold;
        border-radius: 20px;
        width: 83vw;
        margin: 0 auto 6vh;
        display: flex;
        justify-content: space-evenly;

        @include breakpoint(820px) {
            width: 75vw;
            justify-content: center;
        }

        @include breakpoint(430px) {
            display: block;
            width: 94vw;
            border: none;
            background-color: #F6F1ED;
            margin: 0 auto 0vh;
            margin-left: 7vw;
        }

        @include breakpoint(390px) {
            margin: 0 auto 0vh;
        }

        .user_name {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            @include breakpoint(430px) {
                flex-direction: row;
                justify-content: left;
                margin-left: 8vw;
            }

            .user_photo {
                border-radius: 50%;
                width: 200px;
                height: 200px;
                border: 1px solid $Black;
                background-color: $LightGray;
                position: relative;
                margin-bottom: 28px;

                @include breakpoint(430px) {
                    margin-top: 8vw;
                    width: 100px;
                    height: 100px;
                }

                img {
                    // background-image: url(../assets/Image/member/lets-icons_img-box.svg);
                    height: auto;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    z-index: 1;
                }

                & input {
                    margin: 39px 48px;
                    padding: 90px 20px;
                    width: 80px;
                    height: 200px;
                    border-radius: 100%;
                    font-size: 11px;


                    @include breakpoint(430px) {
                        margin: 12px 0px;
                        width: 89px;
                        height: 200px;
                        font-size: 12px;
                    }


                }

                button {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 200px;
                    height: 200px;
                    border-radius: 50%;
                    cursor: pointer;
                    border: none;
                    background-color: transparent;
                }
            }

            h2 {
                font-size: 28px;
                color: $Black;

                @include breakpoint(430px) {
                    font-size: 24px;
                    margin-left: 4vw;
                }
            }
        }

        .member_container {
            display: flex;
            flex-direction: column;
            text-align: left;
            justify-content: center;
            margin: 5vh 0 3vh;

            @include breakpoint(820px) {
                margin: 5vh 1.5vh 3vh;
            }

            @include breakpoint(430px) {
                margin: 5vh 3vh 5vh;
            }

            @include breakpoint(390px) {
                margin: 2vh 3vh 0vh;
            }

            .member_labeltwo {
                font-weight: 800;
                font-size: 24px;
                color: #000;
                text-align: left;
                margin-bottom: 2vh;

                @include breakpoint(430px) {
                    font-size: 16px;
                }

                @include breakpoint(390px) {
                    margin-left: 5vw;
                }
            }

            li {
                display: flex;
                flex-direction: column;

                @include breakpoint(390px){
                    margin-left: 5vw;
                }

                label {
                    font-size: 16px;
                    margin-bottom: 2vh;

                }

                div {
                    position: relative;
                    width: 90px;

                    label {
                        font-size: 16px;
                    }

                    img {
                        width: 16px;
                        height: 16px;
                        margin-left: 8px;
                        position: absolute;
                        top: 0;
                        right: 0;
                    }

                    button {
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 16px;
                        height: 16px;
                        cursor: pointer;
                        border: none;
                        background-color: transparent;
                    }
                }

                input {
                    margin-bottom: 3vh;
                    font-size: 16px;
                    width: 330px;
                    border: none;
                    border-bottom: 1px solid $Black;
                    background-color: transparent;

                    @include breakpoint(820px) {
                        width: 32vw;
                    }

                    @include breakpoint(430px) {
                        width: 78vw;
                    }
                }


                .password-input {
                    position: relative;
                    width: 330px;

                    input {
                        outline: none;
                    }

                    .eye {
                        //img
                        width: 20px;
                        height: 20px;
                        position: absolute;
                        bottom: 0;
                        right: 4px;
                        position: absolute;

                        @include breakpoint(820px) {
                            right: 10vw;
                        }

                        @include breakpoint(430px) {
                            right: 0vw;
                            width: 14px;
                            height: 14px;
                        }

                        @include breakpoint(390px) {
                            left: 68vw;
                        }
                    }

                    .eye-toggle {
                        //button
                        width: 20px;
                        height: 20px;
                        position: absolute;
                        bottom: 0;
                        right: 4px;
                        border: none;
                        background-color: transparent;
                    }

                }
            }

            //修改密碼彈窗star
            .modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;

                .pop_container {
                    width: 50vw;
                    background-color: $White;
                    border: 1px solid $Gold;
                    border-radius: 20px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;

                    h4 {
                        width: 70%;
                        font-size: 20px;
                        font-weight: bold;
                        margin: 3vh 0;
                    }

                    p {
                        font-size: 18px;
                        padding-bottom: 14px;
                    }

                    label {
                        width: 70%;
                        margin-bottom: 1vh;
                        font-weight: normal;
                        font-size: 16px;
                    }

                    .password-input {
                        width: 70%;
                        margin-bottom: 1vh;
                        position: relative;

                        input {
                            width: 100%;
                            height: 30px;
                            border: none;
                            border-bottom: 1px solid black;
                            margin-bottom: 2vh;
                        }

                        .eye {
                            width: 20px;
                            position: absolute;
                            top: 30%;
                            right: 0;
                            transform: translateY(-70%);
                            margin-right: 10px;

                            @include breakpoint(390px) {
                                right: 12vw;
                            }
                        }

                        .eye-toggle {
                            width: 20px;
                            height: 20px;
                            border: none;
                            background-color: transparent;
                            position: absolute;
                            top: 30%;
                            right: 0;
                            transform: translateY(-70%);
                            margin-right: 10px;
                            cursor: pointer;
                        }
                    }

                    #newNickname {
                        width: 70%;
                        height: 30px;
                        border: none;
                        border-bottom: 1px solid black;
                        margin-bottom: 2vh;
                    }

                    .modal__confirm {
                        font-size: 16px;
                        width: 20%;
                        height: 40px;
                        color: $Gold;
                        border: 4px solid $Gold;
                        border-radius: 15px;
                        background-color: $White;
                        margin: 2vh;
                        cursor: pointer;

                    }

                    .modal__cancel {
                        font-size: 16px;
                        width: 20%;
                        height: 40px;
                        color: $Gold;
                        border: 4px solid $Gold;
                        border-radius: 15px;
                        background-color: $White;
                        margin: 2vh;
                        cursor: pointer;

                    }

                    #newPhone {
                        width: 70%;
                        height: 30px;
                        border: none;
                        border-bottom: 1px solid black;
                        margin-bottom: 2vh;
                    }

                }

            }

            .close {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        }
    }

    //collect
    .member_collection {
        background-color: $White;
        border: 1px solid $Gold;
        border-radius: 20px;
        width: 83vw;
        margin: 0 auto 6vh;
        height: 56vw;
        cursor: pointer;

        @include breakpoint(1280px) {
            height: 62vw;
        }

        @include breakpoint(1024px) {
            height: 75vw;
        }

        @include breakpoint(820px) {
            height: 196vw;
            width: 75vw;
        }

        @include breakpoint(698px) {
            height: 228vw;
        }

        @include breakpoint(430px) {
            height: 105vw;
            border: none;
            background-color: #F6F1ED;
        }


        h4 {
            width: 90%;
            font-weight: 800;
            font-size: 24px;
            color: $Black;
            margin: 5vh auto 2vh;


            @include breakpoint(430px) {
                font-size: 16px;
                width: 100%;
                margin: 0vh auto 2vh;
            }

            @include breakpoint(390px) {
                margin: 0 auto;
            }
        }
    }

    //voucher
    .member_voucher {
        background-color: $White;
        border: 1px solid $Gold;
        border-radius: 20px;
        width: 83vw;
        margin: 0 auto 6vh;

        @include breakpoint(820px) {
            width: 75vw;
        }

        @include breakpoint(430px) {
            margin-top: 123vw;
            width: 80vw;
            background-color: #F6F1ED;
            border-radius: 0px;
        }

        @include breakpoint(390px) {
            margin-top: 141vw;
            margin: 132vh 8vh 4vh;
        }


        h4 {
            width: 90%;
            font-weight: 800;
            font-size: 24px;
            color: $Black;
            margin: 5vh auto 2vh;

            @include breakpoint(430px) {
                font-size: 16px;
                margin: 2vh 3vh 2vh;
            }
        }

        .voucher_code {
            font-size: 15px;
            width: 90%;
            margin: 0 auto 3vh;

            @include breakpoint(430px) {
                margin: 0 1vw;
            }

            .voucher_number {
                padding-left: 10px;
                border-radius: 20px;
                width: 50%;
                height: 40px;
                background-color: transparent;

                @include breakpoint(1280px) {
                    width: 64%;
                }

                @include breakpoint(700px) {
                    width: 83%;
                }

                @include breakpoint(820px) {
                    width: 84%;
                }

                @include breakpoint(430px) {
                    width: 244px;
                    height: 32px;
                    font-size: 14px;
                    margin-left: 10px;
                    margin-bottom: 4vw;
                }

                @include breakpoint(390px) {
                    width: 214px;
                }
            }

            .voucher_sure {
                border-radius: 20px;
                height: 40px;
                width: 60px;
                background-color: transparent;
                margin-left: 20px;

                @include breakpoint(430px) {
                    width: 48px;
                    height: 32px;
                    font-size: 14px;
                    margin-left: 6px;
                }
            }
        }

        .voucher_data {
            width: 90%;
            margin: 0 auto 4vh;

            @include breakpoint(430px) {
                // margin: 20px 15px;
            }

            tr {
                height: 40px;

                @include breakpoint(430px) {
                    font-size: 14px;
                }

                th {
                    h5 {
                        font-weight: 800;
                        color: $Black;

                        @include breakpoint(430px) {
                            font-size: 14px;
                            // text-align: center;
                        }
                    }
                }

                td {
                    color: $Black;

                    @include breakpoint(430px) {
                        // text-align: center;
                    }
                }
            }
        }
    }


    //my ticket
    .member_ticket {
        background-color: $White;
        border: 1px solid $Gold;
        border-radius: 20px;
        width: 83vw;
        margin: 0 auto 4vh;

        @include breakpoint(1280px) {
            // height: 22vh;
        }

        @include breakpoint(820px) {
            width: 76vw;
        }

        @include breakpoint(430px) {
            width: 82vw;
            background-color: #F6F1ED;
            border-radius: 0px;
            font-size: 16px;
            height: 47vw;
        }

        @include breakpoint(390px) {
            width: 80vw;
            height: 50vw;
        }

        h4 {
            width: 90%;
            font-weight: 800;
            font-size: 24px;
            color: $Black;
            margin: 5vh auto 2vh;

            @include breakpoint(430px) {
                margin: 2vh auto 2vh;
                font-size: 16px;
            }
        }

        .ticket_data {
            width: 90%;
            margin: 0 auto 4vh;

            @include breakpoint(820px) {
                // margin-left: 4vw;
                // padding-left: 2vw;
            }

            @include breakpoint(430px) {
                // width: 100%;
                // margin: 1vh -1vh 1vh;
            }

            tr {
                height: 40px;

                @include breakpoint(430px) {
                    text-align: center;
                }

                th {
                    h5 {
                        font-weight: 800;
                        color: $Black;

                        @include breakpoint(1280px) {
                            width: 8vw;
                            height: 4vh;
                        }

                        @include breakpoint(1024px) {
                            width: 10vw;
                            padding-bottom: 2vw;
                        }

                        @include breakpoint(698px) {
                            width: 18vw;
                        }

                        @include breakpoint(820px) {
                            width: 12vw;
                        }

                        @include breakpoint(796px) {
                            padding-bottom: 2vw;
                            padding-left: 4vw;
                        }

                        @include breakpoint(430px) {
                            width: 20vw;
                            font-size: 14px;
                            text-align: center;
                        }
                    }
                }

                td {
                    color: $Black;
                    // padding-top: 0vw;
                    // padding-bottom: 1vw;
                    // padding-left: 2.4vw;
                    // margin-left: 3.2vw;


                    @include breakpoint(820px) {
                        padding-bottom: 2vw;
                        // padding-top: 
                    }

                    @include breakpoint(796px) {
                        padding-bottom: 2vw;
                        padding-left: 4vw;
                    }

                    @include breakpoint(430px) {
                        font-size: 14px;
                        text-align: center;
                        padding-left: 0vw;
                    }

                    @include breakpoint(390px) {
                        padding-left: 0vw;
                    }

                    a {
                        color: $Black;
                        // padding-left: 1vw;
                        // margin-right: 4vw;

                        @include breakpoint(820px) {
                            margin-left: 1vw;
                        }

                        @include breakpoint(430px) {
                            margin-left: 4vw;
                        }
                    }
                }
            }
        }
    }

    .return {
        display: block;
        width: 203px;
        height: 64px;
        background-color: $White;
        border-radius: 20px;
        font-size: 20px;
        color: $Gold;
        border: 4px solid $Gold;
        margin: 0 auto;
        text-align: center;
        margin-bottom: 4vh;

        @include breakpoint(430px) {
            font-size: 16px;
            width: 132px;
            height: 42px;
        }
    }
}
</style>
