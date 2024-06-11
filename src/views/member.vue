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
                <div class="user_photo">
                    <img
                        src="/src/assets/Image/member/PencilSquare.svg"
                        alt="edit"
                    />
                    <button></button>
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
                        <img
                            src="/src/assets/Image/member/PencilSquare.svg"
                            alt="edit"
                        />
                        <button></button>
                    </div>
                    <input type="text" id="container_nickname" value="陳小明" disabled />
                </li>

                <li>
                    <div>
                        <label for="container_phone">電話號碼</label>
                        <img
                            src="/src/assets/Image/member/PencilSquare.svg"
                            alt="edit"
                        />
                        <button></button>
                    </div>
                    <input
                        type="tel"
                        id="container_phone"
                        value="0912-345-678"
                        pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
                        disabled
                    />
                </li>

                <li>
                    <label for="container_mail">電子信箱</label>
                    <input type="email" value="abc@email.com" disabled />
                </li>

                <li>
                    <div>
                        <label for="container_password">修改密碼</label>
                        <img
                            src="/src/assets/Image/member/PencilSquare.svg"
                            alt="edit"
                        />
                        <button @click="showModal = true; console.log('showModal:', showModal)"></button>
                    </div>
                    <div class="password-input">
                        <input type="password" id="container_password" value="**********" disabled />
                        <img src="../assets/Image/member/eye-closed.svg" alt="eye-closed" class="eye">
                        <button class="eye-toggle"></button>
                    </div>
                </li>

                <div class="modal" v-if="showModal" @click.self="showModal = false">
                    <PWChange />
                </div>

                <li>
                    <label for="container_birthday">生日日期</label>
                    <input
                        type="text"
                        id="container_birthday"
                        value="1994/12/31"
                        onfocus="(this.type='date')"
                        disabled
                    />
                </li>
            </ul>
        </section>

        <!--collect-->
        <section class="member_collection">
            <h4>我的收藏</h4>
            <div class="card_container">
                <router-link to="/restaurant">
                    <ShopCard class="card" />
                </router-link>
                
                <router-link to="/restaurant">
                    <ShopCard class="card" />
                </router-link>
                <router-link to="/restaurant">
                    <ShopCard class="card" />
                </router-link>
                <router-link to="/restaurant">
                    <ShopCard class="card" />
                </router-link>
                <router-link to="/restaurant">
                    <ShopCard class="card" />
                </router-link>
                <router-link to="/restaurant">
                    <ShopCard class="card" />
                </router-link>
            </div>
            
            
        </section>

        <!--voucher-->
        <section class="member_voucher">
            <h4>優惠券</h4>
            <div class="voucher_code">
                <input
                    type="text"
                    placeholder=" &#127991 輸入優惠碼"
                    class="voucher_number"
                />
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
                    <td>每序號僅限使用一次</td>
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
                    <td>每張僅限使用一次</td>
                </tr>
                <tr>
                    <td>
                        <router-link to="/receipt">ABRK3A3</router-link>
                    </td>
                    <td>2024/07/02</td>
                    <td>2025/07/02</td>
                    <td>每張僅限使用一次</td>
                </tr>
            </table>
        </section>

        <button class="return">返回首頁</button>
    </div>
</template>

<script>
//掛載shopCard
import PWChange from "../components/memberPWChange.vue"
import ShopCard from "../components/Shopcard.vue"

export default {
    data() {
        return { a: false, showModal: false };
    },
    components: { PWChange, ShopCard}
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.card {
    margin: 0 50%;
    text-decoration: none;
}

.member_wrapper {
    background-color: $OffWhite;

    //麵包屑
    .breadcrumb {
        width: fit-content;
        padding-top: 130px;
        margin-left: 5vw;

        .crumb1 {
            a {
                font-size: 16px;
                text-decoration: none;
                color: #000000;

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
    }

    .member_user {
        background-color: $White;
        border: 1px solid $Gold;
        border-radius: 20px;
        width: 83vw;
        margin: 0 auto 6vh;
        display: flex;
        justify-content: space-evenly;

        .user_name {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            .user_photo {
                border-radius: 50%;
                width: 200px;
                height: 200px;
                border: 1px solid $Black;
                background-color: $LightGray;
                position: relative;
                margin-bottom: 28px;
                img {
                    width: 50px;
                    height: 50px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    opacity: 0.1;
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
            }
        }

        .member_container {
            display: flex;
            flex-direction: column;
            text-align: left;
            justify-content: center;
            margin: 5vh 0 3vh;

            .member_labeltwo {
                font-weight: 800;
                font-size: 24px;
                color: #000;
                text-align: left;
                margin-bottom: 2vh;
            }

            li {
                display: flex;
                flex-direction: column;
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
                }
                .password-input{
                    position: relative;
                    width: 330px;
                    .eye{
                        width: 20px;
                        height: 20px;
                        position: absolute;
                        bottom: 0;
                        right: 4px;
                    }
                    .eye-toggle{
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

        h4 {
            width: 90%;
            font-weight: 800;
            font-size: 24px;
            color: $Black;
            margin: 5vh auto 2vh;
        }

        .card_container{
            width: 78%;
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto 3vh;
            cursor: pointer;

            a{
                text-decoration: none;
                margin: 2vh auto;
                li{
                    margin: 0;
                }
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

        h4 {
            width: 90%;
            font-weight: 800;
            font-size: 24px;
            color: $Black;
            margin: 5vh auto 2vh;
        }

        .voucher_code {
            font-size: 15px;
            width: 90%;
            margin: 0 auto 3vh;

            .voucher_number {
                padding-left: 10px;
                border-radius: 20px;
                width: 30%;
                height: 40px;
                background-color: transparent;
            }

            .voucher_sure {
                border-radius: 20px;
                height: 40px;
                width: 60px;
                background-color: transparent;
                margin-left: 20px;
            }
        }

        .voucher_data{
            width: 90%;
            margin: 0 auto 4vh;
            tr{
                height: 40px;
                th{
                    h5{
                        font-weight: 800;
                        color: $Black;
                    }
                }
                td{
                    color: $Black;
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

        h4 {
            width: 90%;
            font-weight: 800;
            font-size: 24px;
            color: $Black;
            margin: 5vh auto 2vh;
        }

        .ticket_data{
            width: 90%;
            margin: 0 auto 4vh;
            tr{
                height: 40px;
                th{
                    h5{
                        font-weight: 800;
                        color: $Black;
                    }
                }
                td{
                    color: $Black;
                    a{
                        color: $Black;
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
    }
}
</style>
