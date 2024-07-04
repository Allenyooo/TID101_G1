<template>
  <div class="BkBody">
    <BH :headname="head"></BH>
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
          <!-- <div class="searchButton"></div> -->
          <div class="newButton">
            <!-- <button>
              <h5>匯出資料</h5>
            </button> -->
          </div>
        </div>

        <div class="BkDatebody">
          <div class="BkDate">
            <input
              type="date"
              name=""
              id=""
              placeholder="請輸入日期"
              v-model="startDate"
            />
            ~
            <input
              type="date"
              name=""
              id=""
              placeholder="請輸入日期"
              v-model="endDate"
            />
          </div>
          <button @click="searchButton(sId)">搜尋</button>
        </div>

        <BSort :sortDrop="sortDrop" @sortEvent="sortByID"></BSort>
        <!-- <button @click="sortByID">排序</button> -->
        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :page="page"
          :BCHref="BCHref"
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
        { id: 1, name: "會員編號", search: "ID" },
        { id: 2, name: "會員姓名", search: "NAME" },
      ],
      input: "",
      // bd: [
      //   {
      //     id: 1,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     nickname: "xxx",
      //     phone: "0000-111-222",
      //     birthday: "2000-01-01",
      //     addDate: "2010-01-01",
      //     lastDate: "2010-02-02",
      //   },
      //   {
      //     id: 2,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     nickname: "xxx",
      //     phone: "0000-111-222",
      //     birthday: "2000-01-01",
      //     addDate: "2010-01-01",
      //     lastDate: "2010-02-02",
      //   },
      //   {
      //     id: 3,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     nickname: "xxx",
      //     phone: "0000-111-222",
      //     birthday: "2000-01-01",
      //     addDate: "2010-01-01",
      //     lastDate: "2010-02-02",
      //   },
      // ],
      bd: [],
      bd2: [],
      bd3: [],
      orderbd: [],
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

      stateTd: 1,
      dataTd: 2,
      BCHref: 2,

      startDate: "",
      endDate: "",

      sortid: 1,
      lastId: 0,

      head: "",
      managerId: 0,
    };
  },

  methods: {
    sIdchange(e) {
      console.log("Selected value:", e);
      this.sId = e;
    },

    searchButton(id) {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkSearch.php`, {
        mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          Search: this.placeholder[id].search,
          Input: this.input,
          Start: this.startDate,
          End: this.endDate,
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

    // sortChange(id) {
    //   this.sortid = id;
    //   this.sortByID(this.sortid);
    // },

    sortByID(id) {
      this.sortid = id;

      if (this.sortid == 1) {
        this.bd.sort((a, b) => {
          return a.ID - b.ID;
        }); // 按照 ID 属性升序排列
      } else if (this.sortid == 2) {
        this.bd.sort((a, b) => {
          return b.ID - a.ID;
        }); // 按照 ID 属性升序排列
      }
    },

    checkManagerIdCookie() {
      // 檢查managerId是否存在於Cookies中的函數
      const cookies = document.cookie.split(";");
      const managerIdCookie = cookies.find((cookie) =>
        cookie.trim().startsWith("managerId=")
      );

      if (!managerIdCookie) {
        // 如果managerId cookie不存在，則重定向到登入頁面
        this.$router.push("/BkLogin"); // 將'/login'替換為你實際的登入路徑
      } else {
        this.getMemberId();
      }
    },

    getMemberId() {
      let cookie = document.cookie;
      let getId = cookie.match(/managerId=(\d+)/);
      let managerId = getId[1];
      // console.log(match)
      // console.log(memberId);
      this.managerId = managerId;
      console.log(this.managerId);
      this.headname();
      console.log(this.head);
      // return memberId;
    },

    headname() {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkHead.php`, {
        mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          ID: this.managerId,
        }),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          console.log(data);
          this.head = data[0].NAME;
        });
    },
  },

  mounted() {
    this.checkManagerIdCookie();
    // this.fetchData();
    fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkData.php`, {
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
        this.bd3 = data.data3;
        this.orderbd = data.data4;
        this.lastId = data.data[data.data3.length - 1].ID;
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

      .BkDatebody {
        display: flex;

        .BkDate {
          margin-bottom: 12px;

          input {
            height: 32px;
          }
          button {
            height: 32px;
            margin-left: 8px;
          }
        }

        button {
          height: 32px;
          margin-left: 12px;
        }
      }
    }
  }
}
</style>
