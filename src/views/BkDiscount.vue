<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>
        <BS :dropdown="dropdown" :search="search" :newButton="newButton"></BS>

        <BSort :dropdown="dropdown"></BSort>

        <button
          class="discountButton1"
          v-for="i in dButton"
          :class="{ dBOn: buttonState == i.id }"
          @click="(buttonState = i.id), (bdState = i.id)"
        >
          {{ i.text }}
        </button>

        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          v-if="bdState == 1"
        ></BD>

        <BD
          :bd="bd2"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          v-if="bdState == 2"
        ></BD>
      </div>
    </div>

    <!-- <BR></BR> -->
  </div>
</template>

<script>
import BH from "/src/components/BkHead.vue";
import BM from "/src/components/BkManage.vue";
import BS from "/src/components/BkSearch.vue";
import BD from "/src/components/BkData.vue";
import BDate from "/src/components/BkDate.vue";
import BSort from "/src/components/BkSort.vue";

export default {
  components: { BH, BM, BS, BD, BDate, BSort },

  data() {
    return {
      page: 6,
      manage: [
        {
          index: 1,
          manageName: "權限管理",
          src: "/BkAccess",
          border: 1,
        },
        {
          index: 2,
          manageName: "會員資料管理",
          src: "/BkMember",
          border: 2,
        },
        {
          index: 3,
          manageName: "店家資訊管理",
          src: "/BkShop",
          border: 2,
        },
        {
          index: 4,
          manageName: "訂單管理",
          src: "/BkOrder",
          border: 2,
        },
        {
          index: 5,
          manageName: "商品管理",
          src: "/BkProduct",
          border: 2,
        },
        {
          index: 6,
          manageName: "折價券管理",
          src: "/BkDiscount",
          border: 2,
        },
        {
          index: 7,
          manageName: "FAQ管理",
          src: "/BkFaq",
          border: 2,
        },
      ],
      dropdown: [
        {
          id: "管理員編號",
        },
        {
          name: "姓名",
        },
      ],
      bd: [
        {
          id: 1,
          name: "100折價券",
          discountPrice: 100,
          number: " 123abc",
          start: "2024-06-01",
          end: "2025-06-01",
          use: 100,
        },
        {
          id: 2,
          name: "300折價券",
          discountPrice: 300,
          number: " 123abc",
          start: "2024-06-01",
          end: "2025-06-01",
          use: 100,
        },
        {
          id: 3,
          name: "500折價券",
          discountPrice: 500,
          number: " 123abc",
          start: "2024-06-01",
          end: "2025-06-01",
          use: 100,
        },
      ],

      bd2: [
        {
          id: 4,
          name: "30折價券",
          discountPrice: 30,
          number: " 123abc",
          start: "2024-06-01",
          end: "2025-06-01",
          use: 100,
        },
        {
          id: 5,
          name: "150折價券",
          discountPrice: 150,
          number: " 123abc",
          start: "2024-06-01",
          end: "2025-06-01",
          use: 100,
        },
        {
          id: 6,
          name: "600折價券",
          discountPrice: 600,
          number: " 123abc",
          start: "2024-06-01",
          end: "2025-06-01",
          use: 100,
        },
      ],
      title: [
        { 折價券編號: "管理員編號" },
        { 折價券名稱: "信箱" },
        { 折抵金額: "會員名稱" },
        { 折價券序號: "狀態" },
        { 開始日期: "修改" },
        { 結束日期: "修改" },
        { 使用次數: "修改" },
        { 狀態: "修改" },
        { 修改: "修改" },
      ],
      newButton: 1,
      search: "新增折價券",
      stateTd: 1,
      dataTd: 1,
      buttonState: 1,
      dButton: [
        {
          id: 1,
          text: "啟用",
        },
        {
          id: 2,
          text: "下架",
        },
      ],

      bdState: 1,
    };
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.BkBody {
  background-color: $OffWhite;

  .BkM {
    display: flex;
    height: 100vh;

    .BkContent {
      width: 80vw;

      p {
        font-size: 28px;
        font-weight: bold;
        margin-top: 16px;
      }

      .Bkline {
        height: 1px;

        background-color: $Black;
        margin-bottom: 24px;
      }

      .discountButton1 {
        font-size: 16px;
        width: 60px;
        height: 32px;
        border: none;
        border-top: 1px solid #c4c4c4;
        border-left: 1px solid #c4c4c4;
        border-right: 1px solid #c4c4c4;

        color: $DarkBrown;
        margin-right: 12px;
      }

      .discountButton2 {
        font-size: 16px;
        width: 60px;
        height: 32px;
        border: none;
        border-top: 1px solid #c4c4c4;
        border-left: 1px solid #c4c4c4;
        border-right: 1px solid #c4c4c4;
      }

      .dBOn {
        background-color: $DarkBrown;
        color: $White;
      }
    }
  }
}
</style>
