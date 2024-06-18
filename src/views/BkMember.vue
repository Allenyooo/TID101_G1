<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>
        <!-- <BS :dropdown="dropdown" :search="search" :newButton="newButton"></BS> -->

        <div class="Bksearchbody">
          <select @change="sIdchange($event.target.value)">
            <option
              v-for="s in searchdrop"
              :key="s.id"
              class="search"
              :value="s.id"
            >
              <h4>{{ s.name }}</h4>
            </option>
          </select>

          <div class="inputSearch">
            <input type="text" :placeholder="placeholder[sId].name" />
          </div>
          <div class="searchButton">
            <button><h5>搜尋</h5></button>
          </div>
          <div class="newButton">
            <button>
              <h5>匯出資料</h5>
            </button>
          </div>
        </div>

        <BDate></BDate>
        <BSort :sortDrop="sortDrop"></BSort>
        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :BCHref="BCHref"
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
// import BR from "/src/components/BkRevise.vue";

export default {
  components: { BH, BM, BS, BD, BDate, BSort },

  data() {
    return {
      page: 2,
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
      sortDrop: [
        { id: 1, name: "編號:由小到大" },
        { id: 2, name: "編號:由大到小" },
      ],

      searchdrop: [
        { id: 0, name: "會員編號" },
        { id: 1, name: "會員姓名" },
      ],
      sId: 0,

      placeholder: [
        { id: 1, name: "會員編號" },
        { id: 2, name: "會員姓名" },
      ],
      bd: [
        {
          id: 1,
          email: "123@gmail.com",
          name: "xxx",
          nickname: "xxx",
          phone: "0000-111-222",
          birthday: "2000-01-01",
          addDate: "2010-01-01",
          lastDate: "2010-02-02",
        },
        {
          id: 2,
          email: "123@gmail.com",
          name: "xxx",
          nickname: "xxx",
          phone: "0000-111-222",
          birthday: "2000-01-01",
          addDate: "2010-01-01",
          lastDate: "2010-02-02",
        },
        {
          id: 3,
          email: "123@gmail.com",
          name: "xxx",
          nickname: "xxx",
          phone: "0000-111-222",
          birthday: "2000-01-01",
          addDate: "2010-01-01",
          lastDate: "2010-02-02",
        },
      ],
      title: [
        { 會員編號: "管理員編號" },

        { 帳號: "信箱" },
        { 會員名稱: "會員名稱" },
        { 會員暱稱: "狀態" },
        { 手機號碼: "修改" },
        { 生日: "修改" },
        { 加入日期: "修改" },
        { 最後登入日期: "修改" },
        { 會員狀態: "修改" },
        { 詳細資料: "修改" },
      ],
      newButton: 1,
      search: "匯出資料",
      stateTd: 1,
      dataTd: 2,
      BCHref: 2,
    };
  },

  methods: {
    sIdchange(e) {
      console.log("Selected value:", e);
      this.sId = e;
    },
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

      .Bksearchbody {
        display: flex;
        margin-bottom: 12px;

        select {
          font-family: $fontFamily;
          background-color: $LightBrown;
          color: $White;

          .search {
            background-color: $White;
            color: $Black;
          }
        }

        .inputSearch {
          margin-left: 8px;
        }

        .searchButton {
          margin-left: 8px;
        }

        .newButton {
          margin-left: auto;
        }
      }
    }
  }
}
</style>
