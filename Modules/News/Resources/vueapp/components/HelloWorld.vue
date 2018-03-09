<template>
    <div class="hellonews">
        <h1>{{ msg }}</h1>
    </div>
</template>

<script>
  export default {
    name: 'newsHelloWorld',
    props: {
      msg: String
    }
  }
</script>

<style scoped>
</style>