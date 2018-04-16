<template>
  <q-page class="flex flex-center">
    <h1>Index</h1>
    <q-list
      no-border
      link
      inset-delimiter
    >
      <q-item>
        <router-link to="/admin">admin</router-link>
      </q-item>
      <q-item>
        <router-link to="/user">User</router-link>
      </q-item>
      <q-item>
        <q-btn color="primary" size="xs" label="Extra Small Button"/>
      </q-item>
      <q-btn color="primary" size="sm" label="Small Button"/>
      <q-item>
        <q-btn color="primary" size="md" label="Medium Button"/>
      </q-item>
      <q-btn color="primary" size="lg" label="Large Button"/>
      <q-item>
        <q-btn color="primary" size="xl" label="Extra Large Button"/>
      </q-item>
    </q-list>
  </q-page>
</template>

<style>
</style>

<script>
  import {mapActions} from 'vuex'

  export default {
    name: 'PageIndex',
    mounted () {
      this.setLogged()
    },
    methods: {
      ...mapActions(['setLogged'])
    }
  }
</script>
