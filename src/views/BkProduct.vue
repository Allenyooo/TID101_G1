<template>
  <div class="BkBody">
    <BH :headname="head"></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>

        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :page="page"
          :bd2="bd2"
          :bd3="bd3"
          :picTd="picTd"
          :shopPic="pic"
          :pic="pic"
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
      page: 5,
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
        { id: 0, name: "店家編號" },
        { id: 1, name: "店家名稱" },
      ],
      sId: 0,

      placeholder: [
        { id: 1, name: "店家編號", search: "ID" },
        { id: 2, name: "店家名稱", search: "NAME" },
      ],

      input: "",
      // bd: [
      //   {
      //     id: 1,
      //     picture: "圖片",
      //     price: 100,
      //     discount: "90%",
      //     discountPrice: 90,
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //   },
      //   {
      //     id: 2,
      //     picture: "圖片",
      //     price: 300,
      //     discount: "90%",
      //     discountPrice: 270,
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //   },
      //   {
      //     id: 3,
      //     picture: "圖片",
      //     price: 500,
      //     discount: "90%",
      //     discountPrice: 450,
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //   },
      // ],
      bd: [],
      bd2: [],
      bd3: [],
      title: [
        { 商品編號: "管理員編號" },
        { 商品價格: "會員名稱" },
        { 折扣: "狀態" },
        { 折扣後價格: "修改" },
        { 折扣開始日期: "修改" },
        { 折扣結束日期: "修改" },
        { 商品圖片: "信箱" },
        { 狀態: "修改" },
        { 修改: "修改" },
      ],
      newButton: 1,

      stateTd: 1,
      dataTd: 1,

      sortid: 1,

      lastId: 0,

      picTd: 1,
      pic: [],

      head: "",
      managerId: 0,
    };
  },

  methods: {
    sIdchange(e) {
      console.log("Selected value:", e);
      this.sId = e;
    },

    // searchButton(id) {
    //   fetch(
    //     "http://localhost/vite/tid101_g1/public/php/Bk/BkProduct/productSearch.php",
    //     {
    //       mode: "cors",
    //       method: "PUT",
    //       headers: {
    //         "Content-Type": "application/json",
    //       },
    //       body: JSON.stringify({
    //         Search: this.placeholder[id].search,
    //         Input: this.input,
    //         // Start: this.startDate,
    //         // End: this.endDate,
    //       }),
    //     }
    //   )
    //     .then((response) => {
    //       if (!response.ok) {
    //         throw new Error("Network response was not ok");
    //       }
    //       return response.json();
    //     })
    //     .then((data) => {
    //       this.bd = data;

    //     });
    // },

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
    fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkProduct/productData.php`, {
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
        this.pic = data.data4;
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
    }
  }
}
</style>
