<template>
  <div>
    <div class="a">
      <!-- 點擊這裡彈出視窗的按鈕 -->
      <button class="btn btn-primary" @click="showPopup = true">
        點我彈出視窗
      </button>
    </div>

    <!-- 彈出視窗 -->
    <div v-if="showPopup" class="popup">
      <div class="popup-content">
        <!-- 右上角關閉按鈕 -->
        <button class="close-btn" @click="closePopup">&times;</button>
        <!-- 彈出視窗內容 -->
        <h2>這裡是彈出視窗</h2>
        <div>{{ reviseBd.ID }}</div>
        <div>{{ reviseBd.NAME }}</div>
        <div>{{ reviseBd.MAIL }}</div>
        <div>{{ reviseBd.PASSWORD }}</div>
        <!-- 底部按鈕 -->
        <div class="buttons">
          <button class="btn btn-primary" @click="saveChanges">儲存</button>
          <button class="btn btn-secondary" @click="cancelPopup">取消</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ---- -->
  <div>{{ reviseBd.ID }}</div>
  <div>{{ reviseBd.NAME }}</div>
  <div>{{ reviseBd.MAIL }}</div>
  <div>{{ reviseBd.PASSWORD }}</div>
  <div class="BkRevise">
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary bRevise"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
    ></button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-dialog-centered">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
            <!-- <p></p> -->
            <button
              type="button"
              class="btn-close rClose"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!------------------BkAccesd------------------------->
          <div class="modal-body" v-if="revisePage == 1">
            <ul>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" v-model="inputValue" />
                {{ revisedId }}
              </li>
              <li>
                <h4 class="reviseTitle">姓名:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">信箱:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">密碼:</h4>
                <input type="text" />
              </li>
            </ul>
          </div>
          <!--------------------BkMember----------------------->
          <!-- <div class="modal-body" v-if="revisePage == 2">
            <ul>
              <li>
                <h4 class="reviseTitle">編號:{{ reviseId }}</h4>
                <input type="text" />
              </li>
              <li>
                <h4 class="reviseTitle">編號:{{ reviseId }}</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">編號:{{ reviseId }}</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">編號:{{ reviseId }}</h4>
                <input type="text" />
              </li>
            </ul>
          </div> -->
          <!-------------------BkShop------------------------>
          <div class="modal-body" v-if="revisePage == 3">
            <ul>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" />
              </li>
              <li>
                <h4 class="reviseTitle">名稱:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">地區:</h4>
                <input type="text" />
              </li>
            </ul>
          </div>
          <!--------------------BkOrder----------------------->
          <!-- <div class="modal-body" v-if="revisePage == 1">
            <ul>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" />
              </li>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" />
              </li>
            </ul>
          </div> -->
          <!--------------------BkProduct----------------------->
          <div class="modal-body" v-if="revisePage == 5">
            <ul>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" />
              </li>
              <li>
                <h4 class="reviseTitle">價格:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">折扣(%):</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">折扣後價格:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">折扣開始日期:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">折扣結束日期:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">商品圖片:</h4>
                <input type="file" />
              </li>
            </ul>
          </div>
          <!-------------------BkDiscount------------------------>
          <div class="modal-body" v-if="revisePage == 6">
            <ul>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <input type="text" />
              </li>
              <li>
                <h4 class="reviseTitle">名稱:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">折價券序號:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">開始日期 :</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">結束日期 :</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">使用次數 :</h4>
                <input type="text" />
              </li>
            </ul>
          </div>
          <!--------------------BkFaq----------------------->
          <div class="modal-body" v-if="revisePage == 7">
            <ul>
              <li>
                <h4 class="reviseTitle">分類:</h4>
                <!-- <input type="text" /> -->
                <select name="" id="">
                  <option value="">分類1</option>
                  <option value="">分類2</option>
                  <option value="">分類3</option>
                  <option value="">分類4</option>
                </select>
              </li>
              <li>
                <h4 class="reviseTitle">問答題目:</h4>
                <input type="text" />
              </li>

              <li>
                <h4 class="reviseTitle">回答內容:</h4>
                <input type="text" />
              </li>
            </ul>
          </div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              @click="showConfirmationDialog"
            >
              存檔
            </button>
            <button type="button" class="btn btn-primary" @click="deleteButton">
              刪除
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
  props: ["reviseId", "revisePage", "reviseBd"],

  data() {
    return {
      bd: [],
      Id: 0,
      inputValue: this.reviseBd.ID,
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
          Swal.fire({
            title: "修改成功",
            // text: "Your file has been deleted.",
            icon: "success",
          });
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
    },
    saveChanges() {
      // 執行儲存動作
      this.showPopup = false;
      // 可以在這裡執行其他相關的保存操作
    },
  },

  computed: {
    revisedId() {
      return this.reviseBd.ID;
    },
  },

  mounted() {
    // this.bd = this.reviseBd;
    // this.Id = this.reviseId;
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

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
}

.popup-content {
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative; /* 讓 close-btn 以絕對位置依據彈窗進行定位 */
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
