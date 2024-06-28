import { defineStore } from "pinia";

export const useOrderStore = defineStore({
  id: "product", // 可選，但建議提供唯一的 ID
  state: () => ({
    value: 0, // 範例狀態
  }),
  actions: {
    setValue(newValue) {
      this.value = newValue;
    },

    async fetchDataAndUpdate() {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkOrder/orderDetail.php`, {
        mode: "cors",
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
    },
  },
});
