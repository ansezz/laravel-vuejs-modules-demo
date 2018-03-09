<template>
    <div class="hellosimple">
        <h1>{{ msg }}</h1>
    </div>
</template>

<script>
  export default {
    name: 'simpleHelloWorld',
    props: {
      msg: String
    }
  }
</script>

<style scoped>
</style>