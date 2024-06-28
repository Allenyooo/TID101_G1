<template>
  <!-- <a href="/src/views/BkMemberDetail.vue" v-if="BCH == 2"><p>查看2</p></a> -->
  <router-link to="/BkOrderDetail" v-if="BCH == 1" @click="checkClick(checkId)">
    <p>查看</p></router-link
  >
  <router-link to="/BkMemberDetail" v-if="BCH == 2" @click="checkClick(checkId)"
    ><p>查看</p></router-link
  >
  <!-- <img src="/src/stores/order.js" alt=""> -->
</template>

<script>
import { useOrderStore } from "/src/stores/order";

export default {
  props: ["BCH", "checkId"],

  methods: {
    checkClick(value) {
      const store = useOrderStore();
      store.setValue(value);
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
