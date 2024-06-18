<template>
  <div class="BkBody">
    <div class="BkLogin">
      <h3>後台登入</h3>

      <div class="BkLogin_account">
        <label for="Bklogin_acc">後台帳號</label>
        <input
          type="text"
          id="Bklogin_acc"
          v-model.trim="bkAccount"
          placeholder="example@account.com"
        />
        <p v-if="errors.account" class="error">{{ errors.account }}</p>
      </div>

      <div class="Bklogin_password">
        <label for="login_pw">後台密碼</label>
        <input
          type="password"
          id="Bklogin_pw"
          v-model.trim="bkPassword"
          placeholder="* * * * * * * * *"
        />
        <p v-if="errors.password" class="error">{{ errors.password }}</p>
      </div>

      <div class="Bklogin_in">
        <button :disabled="!isValid" @click="login">
          <h3>登入</h3>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: { BH, BM, BS, BD, BDate, BSort, BRS },

  data() {
    return {
      bkAccount: "",
      bkPassword: "",
      errors: {
        account: "",
        password: "",
      },
    };
  },

  methods: {
    login() {
      console.log("Login button clicked!");
      const trimmedAccount = this.bkAccount.trim();
      const trimmedPassword = this.bkPassword.trim();
      if (trimmedAccount === "" || trimmedPassword === "") {
        if (trimmedAccount === "") {
          this.errors.account = "請輸入帳號";
        }
        if (trimmedPassword === "") {
          this.errors.password = "請輸入密碼";
        }
        console.log("Error messages set:", this.errors);
      } else {
        // Assume the account and password are valid, log in the user
        this.$router.push("/BkHome");
        this.errors.account = "";
        this.errors.password = "";
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.BkBody {
  background-color: $OffWhite;

  .BkLogin {
    width: 500px;
    height: 800px;
    border: 1px solid $Black;
    background-color: $OffWhite;

    h3 {
      text-align: center;
    }

    .BkLogin_account {
      label {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 8px;
        font-weight: bold;
      }

      input {
        width: 330px;
        height: 38px;
        background-color: $White;
        border: none;
        border-bottom: 1px solid $Black;
      }
    }

    .Bklogin_password {
      label {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 8px;
        font-weight: bold;
      }

      input {
        width: 330px;
        height: 38px;
        background-color: $White;
        border: none;
        border-bottom: 1px solid $Black;
      }
    }

    .Bklogin_in {
      background-image: $White;
      border: 1px solid $Gold;
      border-radius: 15px;
      margin: 16px auto 32px;

      button {
        background-color: transparent;
        border: none;
        text-decoration: none;
        text-align: center;
        line-height: 52px;
        user-select: none;
        cursor: pointer;
        h3 {
          width: 165px;
          height: 52px;
          color: $DarkBrown;
          font-weight: 600;
          font-size: 24px;
        }
      }
    }
  }
}
</style>
