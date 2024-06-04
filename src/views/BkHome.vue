<template>
  <BH></BH>
  <div class="BkM">
    <BM :manage="manage" :page="page"></BM>
    <div class="BkContent">
      <p>{{ manage[page - 1].manageName }}</p>
      <div></div>
      <BS></BS>
      <BD :bd="bd"></BD>
    </div>
  </div>
</template>

<script>
import BH from "/src/components/BkHead.vue";
import BM from "/src/components/BkManage.vue";
import BS from "/src/components/BkSearch.vue";
import BD from "/src/components/BkData.vue";

export default {
  components: { BH, BM, BS, BD },

  data() {
    return {
      page: 1,
      manage: [
        {
          index: 1,
          manageName: "權限管理",
          border: 1,
        },
        {
          index: 2,
          manageName: "會員資料管理",
          border: 2,
        },
        {
          index: 3,
          manageName: "店家資訊管理",
          border: 2,
        },
        {
          index: 4,
          manageName: "訂單管理",
          border: 2,
        },
        {
          index: 5,
          manageName: "商品管理",
          border: 2,
        },
        {
          index: 6,
          manageName: "折價券管理",
          border: 2,
        },
        {
          index: 7,
          manageName: "FAQ管理",
          border: 2,
        },
      ],
      bd: [
        {
          i1: 1,
          i2: 2,
          i3: 3,
          i4: 4,
        },
        {
          i1: 5,
          i2: 6,
          i3: 7,
          i4: 8,
        },
        {
          i1: 9,
          i2: 10,
          i3: 11,
          i4: 12,
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.BkM {
  display: flex;

  .BkContent {
    p {
      font-size: 28px;
      font-weight: bold;
    }

    div {
      height: 1px;
      width: 1172px;
      background-color: $Black;
    }
  }
}
</style>
