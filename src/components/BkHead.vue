<template>
  <div class="Bkhead">
    <div class="headLeft">
      <router-link to="/BkHome">
        <img src="/src/assets/Image/product/Logo.svg" alt="" />
      </router-link>
    </div>
    <div class="headRight">
      <p>User:</p>
      <p class="userName">Allen</p>
      <button>
        <router-link to="/BkLogin"><p class="logout">登出</p></router-link>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: [],

  data() {
    return {
      managerId: "",
      bd: [],
    };
  },
  methods: {
    getMemberId() {
      let cookie = document.cookie;
      let getId = cookie.match(/managerId=(\d+)/);
      let managerId = getId[1];
      // console.log(match)
      // console.log(memberId);
      this.managerId = managerId;
      console.log(this.managerId);
      // return memberId;
    },
  },

  mounted() {
    // this.getMemberId();
    // fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkHead.php`, {
    //   mode: "cors",
    //   method: "POST",
    //   headers: {
    //     "Content-Type": "application/json",
    //   },
    //   body: JSON.stringify({
    //     ID: this.managerId,
    //   }),
    // })
    //   .then((response) => {
    //     if (!response.ok) {
    //       throw new Error("Network response was not ok");
    //     }
    //     return response.json();
    //   })
    //   .then((data) => {
    //     console.log(data);
    //     this.bd = data;
    //   });
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
a {
  display: block;
  text-decoration: none;
}
.logout {
  color: black;
  font-size: 16px;
}

.Bkhead {
  height: 80px;
  background-color: $LightBrown;
  display: flex;
  align-items: center;

  .headLeft {
    margin-left: 44px;
  }

  .headRight {
    display: flex;
    margin-left: auto;

    p {
      font-size: 18px;
      font-weight: bold;
    }

    .logout {
      color: black;
      font-size: 16px;
    }
    .userName {
      margin-left: 8px;
    }

    button {
      margin-left: 20px;
      margin-right: 20px;
    }
  }
}
</style>
