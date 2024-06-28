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
          <h4>登入</h4>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  // components: { BH, BM, BS, BD, BDate, BSort, BRS },

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
  computed: {
    isValid() {
      return this.account !== "" && this.password !== "";
    },
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
        // this.$router.push("/BkHome");
        // this.errors.account = "";
        // this.errors.password = "";
        this.makeLoginRequest();
      }
    },
    async makeLoginRequest() {
        try {
            const response = await fetch(
                `${import.meta.env.VITE_PHP_PATH}Bk/BkLogin.php`, 
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        account: this.bkAccount,
                        password: this.bkPassword,
                    }),
                }
            );

            console.log("Response status:", response.status);

            const data = await response.json();
            console.log("Response data:", data);
            this.handleLoginResponse(data);

        } catch (error) {
            console.error("Error logging in:", error);
            console.error("Error message:", error.message);
            if (error.response) {
                console.error("Error response:", error.response);
            }
            if (error.request) {
                console.error("Error request:", error.request);
            }
            this.errors.account = "An unknown error occurred";
        }
    },

    handleLoginResponse(data) {
        if (data.success) {
            const managerId = data.managerId;
            this.storeToken(managerId);
            // this.navigateToMemberRoute();
            this.$router.push("/BkHome");
        } else {
            this.errors.account = "帳號或密碼不正確";
        }
    },
    storeToken(managerId) {
        // this.setCookie("token", token);
        this.setCookie("managerId", managerId);
        // sessionStorage.setItem("token", token);
        sessionStorage.setItem("managerId", managerId);

        if (this.remember) {
            this.setCookie("BkAccount", this.BkAccount, 30);
            this.setCookie("BkPassword", this.BkAccount, 30);
            this.remember = true;
        } else {
            this.removeCookie("BkAccount");
            this.removeCookie("BkAccount");
        }
    },
    setCookie(name, value, days = null) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = `; expires=${date.toUTCString()}`;
        }
        document.cookie = `${name}=${value}; path=/${expires}`;
    },
    removeCookie(name) {
        document.cookie = `${name}=; path=/; max-age=0`;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.BkBody {
  background-color: $OffWhite;
  height: calc(100vh - 81px);
  padding-top: 60px;

  .BkLogin {
    width: 480px;
    height: 35vw;
    border: 1px solid $DarkBrown;
    background-color: $WarmNude;
    margin: 0 auto;

    h3 {
      text-align: center;
      margin-top: 30px;
    }

    .BkLogin_account {
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      width: 330px;
      margin-top: 50px;

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
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      width: 330px;
      margin-bottom: 80px;

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
      border: 3px solid $Gold;
      border-radius: 15px;
      margin: 16px auto 32px;
      width: 327px;
      &:hover {
        background-color: $Gold;
        color: $White;
      }

      button {
        background-color: transparent;
        border: none;
        text-decoration: none;
        text-align: center;
        line-height: 42px;
        user-select: none;
        cursor: pointer;
        width: 321px;
        background-color: $White;
        border-radius: 15px;
        &:hover {
          background-color: $Gold;
          color: $White;
        }

        h4 {
          width: 314px;
          height: 42px;
          line-height: 42px;
          color: $DarkBrown;
          font-weight: 600;
          font-size: 24px;
          margin: 0 auto;
          &:hover {
            background-color: $Gold;
            color: $White;
          }
        }
      }
    }
  }
}
</style>
