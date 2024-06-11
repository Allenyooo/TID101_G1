<template>
  <!-- <a href="/src/views/BkMemberDetail.vue" v-if="BCH == 2"><p>查看2</p></a> -->
  <router-link to="/BkOrderDetail" v-if="BCH == 1"> <p>查看</p></router-link>
  <router-link to="/BkMemberDetail" v-if="BCH == 2"><p>查看</p></router-link>
</template>

<script>
export default {
  props: ["BCH"],

  data() {
    return {
      i: 6,
      hover: false,
    };
  },

  methods: {
    // hovertd() {
    //   this.hover = true;
    // },
    tValue(t) {
      for (let v in t) {
        return v;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

a {
  font-family: $fontFamily;
  text-decoration: none;
  display: block;
  color: $Black;
  height: 36px;

  p {
    font-size: 16px;
    line-height: 36px;
  }
}
</style>
