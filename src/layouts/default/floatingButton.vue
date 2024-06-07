<template>
    <div class="floating-button-container">
      <button class="main-button" @click="toggleButtons">
        主按鈕
      </button>
      <div v-if="showButtons" class="additional-buttons">
        <button class="additional-button">按鈕 1</button>
        <button class="additional-button">按鈕 2</button>
        <button class="additional-button">按鈕 3</button>
      </div>
    </div>
</template>
  
<script>
  export default {
    data() {
      return {
        showButtons: false,
      };
    },
    methods: {
      toggleButtons() {
        this.showButtons = !this.showButtons;
      },
    },
  };
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.floating-button-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;

  .main-button {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 15px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s;

    &:hover {
      background-color: #0056b3;
    }
  }

  .additional-buttons {
    margin-top: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;

    .additional-button {
      background-color: #6c757d;
      border: none;
      color: white;
      padding: 10px;
      border-radius: 50%;
      cursor: pointer;
      margin: 5px 0;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s, transform 0.3s;

      &:hover {
        background-color: #5a6268;
      }
    }
  }
}


</style>