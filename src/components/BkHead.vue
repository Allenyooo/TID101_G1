<template>
  <div class="Bkhead">
    <div class="headLeft">
      <a href="">
        <img src="/src/assets/Image/product/Logo.svg" alt="" />
      </a>
    </div>
    <div class="headRight">
      <p>User xxx</p>
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
    margin-left: 78vw;

    p {
      font-size: 24px;
      font-weight: bold;
    }

    button {
      margin-left: 20px;
    }
  }
}
</style>
