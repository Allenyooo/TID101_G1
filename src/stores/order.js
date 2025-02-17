import { defineStore } from "pinia";

export const useOrderStore = defineStore({
  id: "orderDetail", // 可選，但建議提供唯一的 ID
  state: () => ({
    id: 0, // 範例狀態
    bd: [],
    bd2: [],

    member: [],
    orders: [],
    orderid: [],
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

    setorder(orderidData) {
      this.orderid.push(orderidData);
    },
    clearorderid() {
      this.orderid = [];
    },

    addOrder(orderData) {
      this.orders.push(orderData);
    },
    clearOrders() {
      this.orders = [];
    },

    // addOrder(orderData) {
    //   this.order.push(orderData);
    // },
  },
});
