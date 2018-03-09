<template>
    <div class="hellonewsletter">
        <h1>{{ msg }}</h1>
    </div>
</template>

<script>
  export default {
    name: 'newsletterHelloWorld',
    props: {
      msg: String
    }
  }
</script>

<style scoped>
</style>