<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
    name: 'App'
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap');

    *::-webkit-scrollbar {
    width: 5px;
}

* {
    font-family: 'Roboto', sans-serif;
}

*::-webkit-scrollbar-track {
    background: white;
}

*::-webkit-scrollbar-thumb {
    background-color: #4070F4;
    border-radius: 20px;
    border: 1px solid #4070F4;
}
</style>
