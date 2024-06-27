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
            <input
              type="text"
              :placeholder="placeholder[sId].name"
              v-model="input"
            />
          </div>
          <div class="searchButton">
            <button @click="searchButton(sId)"><h5>搜尋</h5></button>
          </div>
          <div class="newButton">
            <button>
              <h5>新增問答</h5>
            </button>
          </div>
        </div>

        <BSort :sortDrop="sortDrop" @sortEvent="sortByID"></BSort>
        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :page="page"
          :bd2="bd2"
          :bd3="bd3"
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
      page: 7,
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
        { id: 0, name: "問題編號" },
        { id: 1, name: "問題標題" },
      ],
      sId: 0,

      placeholder: [
        { id: 1, name: "問題編號", search: "ID" },
        { id: 2, name: "問題標題", search: "QUESTION" },
      ],
      input: "",
      // bd: [
      //   {
      //     id: 1,
      //     type: "帳號問題",
      //     question: "無法登入",
      //     answer: " xxxxx",
      //   },
      //   {
      //     id: 2,
      //     type: "帳號問題",
      //     question: "無法登入",
      //     answer: " xxxxx",
      //   },
      //   {
      //     id: 3,
      //     type: "帳號問題",
      //     question: "無法登入",
      //     answer: " xxxxx",
      //   },
      // ],
      bd: [],
      bd2: [],
      bd3: [],
      title: [
        { 問題編號: "管理員編號" },
        { 分類: "信箱" },
        { 問題標題: "會員名稱" },
        { 回答內容: "會員名稱" },
        { 狀態: "修改" },
        { 修改: "修改" },
      ],
      newButton: 1,

      stateTd: 1,
      dataTd: 1,

      sortid: 1,

      lastId: 0,
    };
  },

  methods: {
    sIdchange(e) {
      console.log("Selected value:", e);
      this.sId = e;
    },

    searchButton(id) {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkFaq/faqSearch.php`, {
        mode: "cors",
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          Search: this.placeholder[id].search,
          Input: this.input,
          // Start: this.startDate,
          // End: this.endDate,
        }),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          this.bd = data;

          // this.bd2 = data.data2;
          // this.price = data[0].PRICE;
          // this.discount = data[0].PERCENT;
        });

      this.input = "";
    },

    sortByID(id) {
      this.sortid = id;

      if (this.sortid == 1) {
        this.bd.sort((a, b) => {
          console.log("排序1");
          return a.ID - b.ID;
        }); // 按照 ID 属性升序排列
      } else if (this.sortid == 2) {
        this.bd.sort((a, b) => {
          console.log("排序2");
          return b.ID - a.ID;
        }); // 按照 ID 属性升序排列
      }
    },
  },

  mounted() {
    // this.fetchData();
    fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkFaq/faqData.php`, {
      mode: "cors",
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        this.bd = data.data;
        this.bd2 = data.data2;
        this.bd3 = data.data3;
        this.lastId = data.data[data.data2.length - 1].ID;
        // this.bd2 = data.data2;
        // this.price = data[0].PRICE;
        // this.discount = data[0].PERCENT;
      });
    // .catch((error) => {
    //   console.error("Error fetching data:", error);
    // });
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
        font-size: 26px;
        font-weight: bold;
        margin-top: 12px;
      }

      .Bkline {
        height: 1px;

        background-color: $Black;
        margin-bottom: 12px;
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
