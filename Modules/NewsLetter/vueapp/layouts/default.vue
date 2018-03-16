<template>
    <main>
        <header>
            <h5>Header NewsLetter</h5>
            <router-link to="/newsletter/conatct">Conatct</router-link>
        </header>
        <router-view/>
        <footer>
            Footer NewsLetter
        </footer>
    </main>
</template>

<script>
  export default {
    name: 'LayoutDefault-newsletter',
    data () {
      return {}
    },
    methods: {}
  }
</script>

<style>
</style>
