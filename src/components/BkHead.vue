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
    return {};
  },
  methods: {},
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
