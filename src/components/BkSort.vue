<template>
  <div class="BkSort">
    <div>
      <button class="Bkd" @click="dD">管理員編號</button>
      <ul :class="{ sDrop: this.sDown == true }">
        <li v-for="i in dropdown">
          <a href="">{{ i }}</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ["dropdown"],

  data() {
    return {
      sDown: false,
    };
  },
  methods: {
    dD() {
      if (this.sDown == false) {
        return (this.sDown = true);
      } else if (this.sDown == true) {
        return (this.sDown = false);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.BkSort {
  height: 32px;
  font-family: $fontFamily;
  margin-bottom: 12px;

  div {
    position: relative;
    width: 130px;

    .sDrop {
      display: block;
    }

    .Bkd {
      height: 32px;
      width: 126px;
      background-color: $LightBrown;
      color: $White;
      text-align: left;
    }

    .Bkd::before {
      content: "";
      display: block;
      position: absolute;
      height: 23px;
      width: 23px;
      top: 16%;
      right: 6%;
      background-image: url("/src/assets/Image/BK/sort.svg");
    }

    ul {
      display: none;
      position: absolute;

      li {
        background-color: antiquewhite;
        width: 126px;
        height: 40px;
        border: 1px solid black;
      }
    }
  }
}
</style>
