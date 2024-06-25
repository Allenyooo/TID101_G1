<template>
  <div>
    <div class="reviseButton">
      <button
        class="btn btn-primary brevise"
        @click="showPopup = true"
      ></button>
    </div>

    <!-- 彈出視窗 -->
    <div v-if="showPopup" class="popup">
      <div class="popup-content">
        <!-- 右上角關閉按鈕 -->
        <button class="close-btn" @click="closePopup">&times;</button>
        <!-- 彈出視窗內容 -->

        <ul>
          <li v-for="(i, index) in reviseBd">
            <h4>{{ index }}:</h4>
            <input
              type="text"
              v-model="reviseBd[index]"
              :readonly="index == '編號'"
              :class="{ idBg: index == '編號' }"
            />
          </li>
        </ul>
        <!-- <div>{{ reviseBd.ID }}</div>
        <div>{{ reviseBd.NAME }}</div>
        <div>{{ reviseBd.MAIL }}</div>
        <div>{{ reviseBd.PASSWORD }}</div> -->
        <!-- 底部按鈕 -->
        <div class="buttons">
          <button class="btn btn-primary" @click="showConfirmationDialog">
            儲存
          </button>
          <button class="btn btn-secondary" @click="cancelPopup">刪除</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ---- -->
</template>

<script>
import Swal from "sweetalert2";

export default {
  props: ["reviseId", "revisePage", "reviseBd"],

  data() {
    return {
      bd: [],
      Id: 0,
      // inputValue: this.reviseBd.ID,
      showPopup: false,
    };
  },

  methods: {
    showConfirmationDialog() {
      Swal.fire({
        title: "確定要儲存變更嗎?",
        // text: "儲存後將修改資料!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "儲存",
        cancelButtonText: "取消",
      }).then((result) => {
        if (result.isConfirmed) {
          if (this.revisePage == 1) {
            Swal.fire({
              title: "修改成功",
              icon: "success",
            });
            this.saveChanges();
            this.closePopup();
          }
        } else {
          console.log("取消了操作");
          this.closePopup();
        }
      });
    },

    deleteButton() {
      Swal.fire({
        title: "確定要刪除資料嗎?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "刪除",
        cancelButtonText: "取消",
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "刪除成功",
            icon: "success",
          });
          this.saveChangeDelete();
        }
      });
    },

    closePopup() {
      this.showPopup = false;
    },
    cancelPopup() {
      this.showPopup = false;
      this.deleteButton();
    },

    // saveChanges() {

    //   this.showPopup = false;

    //   console.log(this.reviseBd);
    //   this.showConfirmationDialog();
    // },

    saveChanges() {
      fetch(
        "http://localhost/tid101_g1/public/php/Bk/BkAccess/accessRevise.php",
        {
          // mode: "cors",
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            // Search: this.placeholder[id].search,
            // Input: this.input,
            reviseBd: this.reviseBd,
            // Start: this.startDate,
            // End: this.endDate,
          }),
        }
      );
    },

    saveChangeDelete() {
      fetch(
        "http://localhost/tid101_g1/public/php/Bk/BkAccess/accessDelete.php",
        {
          // mode: "cors",
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            // Search: this.placeholder[id].search,
            // Input: this.input,
            deleteId: this.reviseId,
            // Start: this.startDate,
            // End: this.endDate,
          }),
        }
      );
    },
  },

  computed: {
    revisedId() {
      return this.reviseBd.ID;
    },
    // getPropertyByIndex() {
    //   let aa = 0;

    //   let an = this.riviseNames[aa];
    //   i += 1;
    //   console.log(an);
    //   return an;
    // },
  },

  mounted() {
    // this.bd = this.reviseBd;
    // this.Id = this.reviseId;
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.reviseButton {
  button {
    background-image: url("/src/assets/Image/BK/revise.svg");
    width: 32px;
    height: 31px;
    background-size: 60%;
    background-repeat: no-repeat;
    background-position: center center;
  }
}

.idBg {
  background-color: #e6e6e6;
}

.popup {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* 半透明黑色背景 */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 100;
}

.popup-content {
  background-color: $OffWhite;
  padding: 20px;
  padding-top: 46px;
  padding-right: 40px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative;

  ul {
    li {
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;

      h4 {
        height: 30px;
        text-align: left;
        background-color: $DarkBrown;
        color: $White;
        padding: 0 12px;
        padding-left: 6px;
      }

      input {
        // margin-left: 16px;
      }
    }
  }
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  background: none;
  border: none;
  font-size: 24px;
  cursor: pointer;
  color: #888;
}

.buttons {
  margin-top: 20px;
}

.btn {
  margin: 0 5px;
  padding: 8px 16px;
  cursor: pointer;
  border-radius: 4px;
}

.btn-primary {
  background-color: #007bff;
}

.btn-secondary {
  background-color: #6c757d;
}

.brevise {
  background-color: white;
}

// ----------------

.bRevise {
  background-image: url("/src/assets/Image/product/revise.svg");
  height: 36px;
  width: 36px;
  border: none;

  --bs-btn-bg: none;
  --bs-btn-border-radius: none;
}

.modal-dialog {
  .modal-content {
    width: auto;
    background-color: $OffWhite;
    padding: 32px;

    .modal-header {
      margin-left: auto;

      p {
        // width: 260px;
      }

      button {
        margin-bottom: 12px;
      }
    }

    .modal-body {
      margin-right: 20px;

      ul {
        li {
          display: flex;
          margin-bottom: 8px;
          border: 1px solid $DarkBrown;

          h4 {
            width: 120px;
            background-color: $White;
          }

          .reviseTitle {
            background-color: $DarkBrown;
            color: $White;
          }
        }
      }
    }

    .modal-footer {
      .btn-secondary {
        --bs-btn-bg: #0d6efd;
        --bs-btn-hover-bg: #2852ab;
      }

      .btn-primary {
        --bs-btn-bg: red;
        --bs-btn-hover-bg: #cb4847;
      }
    }
  }
}

.modal-dialog-centered {
  margin: auto;
}

.btn-danger {
  margin-right: 20px;
}

.modal-footer {
}
</style>
