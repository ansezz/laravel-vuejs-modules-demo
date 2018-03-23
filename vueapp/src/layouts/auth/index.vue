<template>
  <q-layout view="lHh Lpr lFf">
    <app-header></app-header>
    <q-page-container>
      <router-view/>
    </q-page-container>
    <app-footer></app-footer>
  </q-layout>
</template>

<script>
import AppHeader from './header'
import AppFooter from './footer'

export default {
  name: 'LayoutDefault',
  components: {
    AppHeader,
    AppFooter
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
