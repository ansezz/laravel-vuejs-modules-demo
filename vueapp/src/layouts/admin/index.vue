<template>
  <q-layout view="lHh Lpr lFf">
    <app-header></app-header>
    <app-drawer></app-drawer>
    <q-page-container>
      <router-view/>
    </q-page-container>
  </q-layout>
</template>

<script>
import AppHeader from './header'
import AppDrawer from './drawer'

export default {
  name: 'LayoutDefault',
  components: {
    AppHeader,
    AppDrawer
  },
  data () {
    return {}
  },
  computed: {},
  methods: {}
}
</script>

<style>
</style>
