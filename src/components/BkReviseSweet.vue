<template>
  <button @click="showConfirmationDialog"></button>
</template>

<script>
import Swal from "sweetalert2";

export default {
  data() {},
  methods: {
    showConfirmationDialog() {
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("Saved!", "", "success");
          // 在这里添加保存操作的逻辑
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
          // 在这里添加不保存操作的逻辑
        }
      });
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

//   .bRevise {
//     background-image: url("/src/assets/Image/product/revise.svg");
//     height: 36px;
//     width: 36px;
//     border: none;

//     --bs-btn-bg: none;
//     --bs-btn-border-radius: none;
//   }
</style>
