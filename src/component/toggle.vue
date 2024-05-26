<template>
    <div>
      <button @click="toggleClass">Toggle Class</button>
      <p :class="{ show: isShow }">點擊btn會切換p的class</p>
    </div>
</template>
  
<script>
  export default {
    data() {
      return {
        isShow: false
      };
    },
    methods: {
      toggleClass() {
        this.isShow = !this.isShow;
      }
    }
  };
</script>
  
<style scoped>

</style>
  