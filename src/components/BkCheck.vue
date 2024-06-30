<template>
  <!-- <a href="/src/views/BkMemberDetail.vue" v-if="BCH == 2"><p>查看2</p></a> -->
  <router-link
    to="/BkOrderDetail"
    v-if="BCH == 1"
    @click="checkClickOrder(checkId)"
  >
    <p>查看</p></router-link
  >
  <router-link to="/BkMemberDetail" v-if="BCH == 2" @click="checkClick(checkId)"
    ><p>查看</p></router-link
  >
  <!-- <img src="/src/stores/order.js" alt=""> -->
</template>

<script>
import { useOrderStore } from "/src/stores/order";
import { useOrderDetailStore } from "/src/stores/orderDetail";

export default {
  props: ["BCH", "checkId"],

  data() {
    return {
      bd: [],
      bd2: [],
      bd3: [],
      bd4: [],
      bd5: [],
      bd6: [],
    };
  },

  methods: {
    checkClick(value) {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkMember/memberDetail.php`, {
        mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          orderDetailid: value,
        }),
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
          this.bd6 = data.data3;

          const store = useOrderStore();

          // store.clearmember();
          // store.clearOrders();

          // store.setValue({ bd: this.bd.ID, bd2: this.bd2 });
          this.bd.forEach((item) => {
            store.setMember({
              // 根據實際對象的屬性調整參數
              ID: item.ID,
              NAME: item.NAME,
              MAIL: item.MAIL,
              NICKNAME: item.NICKNAME,
              PHONE: item.PHONE,
              BIRTHDAY: item.BIRTHDAY,
              JOINDATE: item.JOINDATE,
              LASTLOGIN: item.LASTLOGIN,
            });
          });

          this.bd6.forEach((item) => {
            store.setorder({
              // 根據實際對象的屬性調整參數
              ID: item.ID,
            });
          });
          // checkId.forEach((item) => {
          //   store.setorder({

          //     ID: item.ID,
          //   });
          // });

          // 將 bd2 中的每個對象傳遞給 store.setValue()
          this.bd2.forEach((item) => {
            store.addOrder({
              ID: item.ID,
              ORDERDATE: item.ORDERDATE,
              TOTAL: item.TOTAL,
            });
          });
        });
    },

    checkClickOrder(value) {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkOrder/orderDetail.php`, {
        mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          orderDetailid: value,
        }),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          this.bd3 = data.data;
          this.bd4 = data.data2;
          this.bd5 = data.data3;

          const store = useOrderDetailStore();

          // store.clearmember();
          // store.clearOrders();

          // store.setValue({ bd: this.bd.ID, bd2: this.bd2 });
          this.bd3.forEach((item) => {
            store.setMember({
              // 根據實際對象的屬性調整參數
              ID: item.ID,
              NAME: item.NAME,
              MAIL: item.MAIL,
              ORDERDATE: item.ORDERDATE,
              TOTAL: item.TOTAL,
              PAYMENT: item.PAYMENT,
            });
          });

          this.bd5.forEach((item) => {
            store.setV({
              // 根據實際對象的屬性調整參數
              ID: item.ID,
              PRICE: item.PRICE,
            });
          });

          // 將 bd2 中的每個對象傳遞給 store.setValue()
          this.bd4.forEach((item) => {
            store.addOrder({
              NAME: item.NAME,
              QUANTITY: item.QUANTITY,
              PRICE: item.PRICE,
              PERCENT: item.PERCENT,
              DP: item.DP,
            });
          });
        });
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
