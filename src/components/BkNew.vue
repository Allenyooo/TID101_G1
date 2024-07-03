<template>
  <div v-if="revisePage == 1">
    <div class="reviseButton">
      <button class="btn btn-primary brevise" @click="showPopup = true">
        <h5>新增操作人員帳號</h5>
      </button>
    </div>

    <!-- 彈出視窗 -->
    <div v-if="showPopup" class="popup">
      <div class="popup-content">
        <!-- 右上角關閉按鈕 -->
        <button class="close-btn" @click="closePopup">&times;</button>
        <!-- 彈出視窗內容 -->

        <ul>
          <li>
            <h4>編號:</h4>
            <input type="text" class="idBg" :Value="(newId += 1)" readonly />
          </li>
          <li>
            <h4>姓名:</h4>
            <input type="text" v-model="name" />
          </li>
          <li>
            <h4>信箱:</h4>
            <input type="text" v-model="mail" />
          </li>
          <li>
            <h4>密碼:</h4>
            <input type="text" v-model="password" />
          </li>
          <li>
            <h4>權限:</h4>
            <input type="text" v-model="access" />
          </li>
        </ul>
        <!-- <div>{{ reviseBd.ID }}</div>
          <div>{{ reviseBd.NAME }}</div>
          <div>{{ reviseBd.MAIL }}</div>
          <div>{{ reviseBd.PASSWORD }}</div> -->
        <!-- 底部按鈕 -->
        <div class="buttons">
          <button class="btn btn-primary" @click="showConfirmationDialog">
            新增
          </button>
          <button class="btn btn-secondary" @click="cancelPopup">取消</button>
        </div>
      </div>
    </div>
  </div>

  <div v-if="revisePage == 3">
    <div class="reviseButton">
      <button class="btn btn-primary brevise" @click="showPopup = true">
        <h5>新增店家</h5>
      </button>
    </div>

    <!-- 彈出視窗 -->
    <div v-if="showPopup" class="popup">
      <div class="popup-content">
        <!-- 右上角關閉按鈕 -->
        <button class="close-btn" @click="closePopup">&times;</button>
        <!-- 彈出視窗內容 -->

        <ul>
          <li>
            <h4>編號:</h4>
            <input type="text" class="idBg" :Value="(newId += 1)" readonly />
          </li>
          <li>
            <h4>店家名稱:</h4>
            <input type="text" v-model="name" />
          </li>
          <li>
            <h4>地區:</h4>
            <input type="text" v-model="region" />
          </li>
        </ul>
        <!-- <div>{{ reviseBd.ID }}</div>
          <div>{{ reviseBd.NAME }}</div>
          <div>{{ reviseBd.MAIL }}</div>
          <div>{{ reviseBd.PASSWORD }}</div> -->
        <!-- 底部按鈕 -->
        <div class="buttons">
          <button class="btn btn-primary" @click="showConfirmationDialog">
            新增
          </button>
          <button class="btn btn-secondary" @click="cancelPopup">取消</button>
        </div>
      </div>
    </div>
  </div>

  <div v-if="revisePage == 6">
    <div class="reviseButton">
      <button class="btn btn-primary brevise" @click="showPopup = true">
        <h5>新增折價券</h5>
      </button>
    </div>

    <!-- 彈出視窗 -->
    <div v-if="showPopup" class="popup">
      <div class="popup-content">
        <!-- 右上角關閉按鈕 -->
        <button class="close-btn" @click="closePopup">&times;</button>
        <!-- 彈出視窗內容 -->

        <ul>
          <li>
            <h4>編號:</h4>
            <input type="text" class="idBg" :Value="(newId += 1)" readonly />
          </li>
          <li>
            <h4>名稱:</h4>
            <input type="text" v-model="name" />
          </li>
          <li>
            <h4>折抵金額:</h4>
            <input type="text" v-model="price" />
          </li>
          <li>
            <h4>序號:</h4>
            <input type="text" v-model="code" />
          </li>
          <li>
            <h4>開始日期:</h4>
            <input type="text" v-model="start" />
          </li>
          <li>
            <h4>結束日期:</h4>
            <input type="text" v-model="end" />
          </li>
        </ul>
        <!-- <div>{{ reviseBd.ID }}</div>
          <div>{{ reviseBd.NAME }}</div>
          <div>{{ reviseBd.MAIL }}</div>
          <div>{{ reviseBd.PASSWORD }}</div> -->
        <!-- 底部按鈕 -->
        <div class="buttons">
          <button class="btn btn-primary" @click="showConfirmationDialog">
            新增
          </button>
          <button class="btn btn-secondary" @click="cancelPopup">取消</button>
        </div>
      </div>
    </div>
  </div>

  <div v-if="revisePage == 7">
    <div class="reviseButton">
      <button class="btn btn-primary brevise" @click="showPopup = true">
        <h5>新增問答</h5>
      </button>
    </div>

    <!-- 彈出視窗 -->
    <div v-if="showPopup" class="popup">
      <div class="popup-content">
        <!-- 右上角關閉按鈕 -->
        <button class="close-btn" @click="closePopup">&times;</button>
        <!-- 彈出視窗內容 -->

        <ul>
          <li>
            <h4>編號:</h4>
            <input type="text" class="idBg" :Value="(newId += 1)" readonly />
          </li>
          <li>
            <h4>分類:</h4>
            <input type="text" v-model="type" />
          </li>
          <li>
            <h4>問題標題:</h4>
            <input type="text" v-model="question" />
          </li>
          <li>
            <h4>回答內容:</h4>
            <input type="text" v-model="answer" />
          </li>
        </ul>
        <!-- <div>{{ reviseBd.ID }}</div>
          <div>{{ reviseBd.NAME }}</div>
          <div>{{ reviseBd.MAIL }}</div>
          <div>{{ reviseBd.PASSWORD }}</div> -->
        <!-- 底部按鈕 -->
        <div class="buttons">
          <button class="btn btn-primary" @click="showConfirmationDialog">
            新增
          </button>
          <button class="btn btn-secondary" @click="cancelPopup">取消</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ---- -->
</template>

<script>
import { Value } from "sass";
import Swal from "sweetalert2";

export default {
  props: ["reviseId", "revisePage", "reviseBd", "newId"],

  data() {
    return {
      bd: [],
      Id: 0,
      // inputValue: this.reviseBd.ID,
      showPopup: false,
      name: "",
      mail: "",
      password: "",
      access: "",
      region: "",
      price: "",
      code: "",
      start: "",
      end: "",
      type: "",
      question: "",
      answer: "",
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
            this.newChange();
            this.closePopup();
          }
          if (this.revisePage == 3) {
            Swal.fire({
              title: "修改成功",
              icon: "success",
            });
            this.newChange2();
            this.closePopup();
          }
          if (this.revisePage == 6) {
            Swal.fire({
              title: "修改成功",
              icon: "success",
            });
            this.newChange3();
            this.closePopup();
          }
          if (this.revisePage == 7) {
            Swal.fire({
              title: "修改成功",
              icon: "success",
            });
            this.newChange4();
            this.closePopup();
          }
        } else {
          console.log("取消了操作");
          this.closePopup();
        }
      });
    },

    deleteButton() {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });
      swalWithBootstrapButtons
        .fire({
          title: "確定要刪除資料嗎?",
          // text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "刪除",
          cancelButtonText: "取消",
          reverseButtons: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
              title: "刪除成功",
              // text: "Your file has been deleted.",
              icon: "success",
            });
          }
        });
    },

    closePopup() {
      this.showPopup = false;
    },
    cancelPopup() {
      this.showPopup = false;
      //   this.deleteButton();
    },

    // saveChanges() {

    //   this.showPopup = false;

    //   console.log(this.reviseBd);
    //   this.showConfirmationDialog();
    // },
    // 1
    newChange() {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkAccess/accessNew.php`, {
        // mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          // newId: this.newId + 1,
          newName: this.name,
          newMail: this.mail,
          newPassword: this.password,
          newAccess: this.access,
        }),
      });
    },

    newChange2() {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkShop/shopNew.php`, {
        // mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          newId: (this.newId += 1),
          newName: this.name,
          newRegion: this.region,
        }),
      });
    },

    newChange3() {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkDiscount/discountNew.php`, {
        // mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          newId: (this.newId += 1),
          newName: this.name,
          newPrice: this.price,
          newCode: this.code,
          newStart: this.start,
          newEnd: this.end,
        }),
      });
    },

    newChange4() {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkFaq/faqNew.php`, {
        // mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          // newId: this.newId + 1,
          newType: this.type,
          newQuestion: this.question,
          newAnswer: this.answer,
        }),
      });
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
    // background-image: url("/src/assets/Image/BK/revise.svg");
    // width: 32px;

    color: black;
    // padding: auto;

    h5 {
    }
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
      // display: flex;
      justify-content: space-between;
      margin-bottom: 6px;

      h4 {
        height: 30px;
        text-align: left;
        // background-color: $DarkBrown;
        color: $DarkBrown;
        padding: 0 12px;
        padding-left: 0px;
        font-weight: bold;
      }

      input {
        // margin-left: 16px;
      }
    }

    .idBg {
      background-color: #e6e6e6;
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
  margin: 0 5px;
  padding: 8px 16px;
  cursor: pointer;
  border-radius: 4px;
}

.buttons {
  margin-top: 20px;
}

.btn {
  margin: 0 5px;
  padding: 1px 6px;
  cursor: pointer;
  border-radius: 0;

  background-color: $White;

  &:hover {
    background-color: $Gold;
    color: $White;
  }
}

.btn-primary {
  background-color: #007bff;
  margin: 0 5px;
  padding: 8px 16px;
  cursor: pointer;
  border-radius: 4px;

  &:hover {
    background-color: #2852ab;
    color: $White;
  }
}

.btn-secondary {
  background-color: rgb(132, 132, 132);
  margin: 0 5px;
  padding: 8px 16px;
  cursor: pointer;
  border-radius: 4px;

  &:hover {
    background-color: rgb(221, 51, 51);
    color: $White;
  }
}

.brevise {
  background-color: white;
  margin: 0 5px;
  padding: 1px 6px;
  cursor: pointer;
  border-radius: 0;
  border: 1.5px solid black;
  background-color: $White;

  &:hover {
    background-color: $Gold;
    color: $White;
  }
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
