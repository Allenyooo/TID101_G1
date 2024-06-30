import { defineStore } from "pinia";

export const useOrderDetailStore = defineStore({
  id: "orderDetail2", // 可選，但建議提供唯一的 ID
  state: () => ({
    id: 0, // 範例狀態
    bd: [],
    bd2: [],
    member: [],
    orders: [],
    vou: [],
  }),
  actions: {
    // setorder(newValue) {
    //   this.order = newValue;
    // },

    // setMember(newValue) {
    //   this.member = newValue;
    // },

    setMember(mamberData) {
      this.member.push(mamberData);
    },
    clearmember() {
      this.member = [];
    },

    addOrder(orderData) {
      this.orders.push(orderData);
    },
    clearOrders() {
      this.orders = [];
    },

    setV(vouData) {
      this.vou.push(vouData);
    },
    clearV() {
      this.vou = [];
    },

    // addOrder(orderData) {
    //   this.order.push(orderData);
    // },
  },
});
