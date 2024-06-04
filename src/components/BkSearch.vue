<template>
  <div class="dropdown">
    <button
      class="btn btn-secondary dropdown-toggle"
      type="button"
      id="dropdownMenuButton1"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    >
      Dropdown button
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li>
        <a class="dropdown-item1" href="#">{{ page }}</a>
      </li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something e</a></li>
    </ul>
  </div>
</template>

<script>
export default {
  props: [],
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.dropdown {
  button {
    --bs-btn-bg: #c8ac96;
  }

  ul {
    li {
      border: 1px solid black;
    }

    .dropdown-item1 {
      height: 30px;
    }
  }
}
</style>
