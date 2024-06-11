<template>
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
            <p></p>
            <button
              type="button"
              class="btn-close rClose"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <ul>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <h4>1</h4>
              </li>
              <li>
                <h4 class="reviseTitle">編號:</h4>
                <h4>1</h4>
              </li>

              <li>
                <h4 class="reviseTitle">編號:</h4>
                <h4>1</h4>
              </li>

              <li>
                <h4 class="reviseTitle">編號:</h4>
                <h4>1</h4>
              </li>
            </ul>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              存檔
            </button>
            <button type="button" class="btn btn-primary">刪除</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {},
  methods: {},
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

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
      p {
        // width: 260px;
      }

      button {
        margin-left: 210px;
        margin-bottom: 12px;
      }
    }

    .modal-body {
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
  }
}

.modal-dialog-centered {
  margin: auto;
}
</style>
