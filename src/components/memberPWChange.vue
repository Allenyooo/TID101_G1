<template>
    <div class="pop_container">
        <h4>修改密碼</h4>

        <label for="old_PW">輸入舊密碼</label>
        <div class="password-input">
            <input type="password" id="old_PW" placeholder="* * * * * * * * * *" />
            <img
                src="../assets/Image/member/eye-closed.svg"
                alt="eye-closed"
                class="eye"
            />
            <button class="eye-toggle"></button>
        </div>

        <label for="new_PW">輸入新密碼</label>
        <div class="password-input">
            <input type="password" id="new_PW" placeholder="* * * * * * * * * *" />
            <img
                src="../assets/Image/member/eye-closed.svg"
                alt="eye-closed"
                class="eye"
            />
            <button class="eye-toggle"></button>
        </div>

        <label for="repeat_PW">重新輸入新密碼</label>
        <div class="password-input">
            <input type="password" id="repeat_PW" placeholder="* * * * * * * * * *" />
            <img
                src="../assets/Image/member/eye-closed.svg"
                alt="eye-closed"
                class="eye"
            />
            <button class="eye-toggle"></button>
        </div>

        <button class="confirm">確認</button>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

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
    .confirm {
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
}
</style>
