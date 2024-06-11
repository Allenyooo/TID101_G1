<template>
  <div class="Bkhead">
    <div class="headLeft">
      <router-link to="/BkHome">
        <img src="/src/assets/Image/product/Logo.svg" alt="" />
      </router-link>
    </div>
    <div class="headRight">
      <p>User:</p>
      <p class="userName">xxx</p>
      <button>登出</button>
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
      font-size: 24px;
      font-weight: bold;
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
