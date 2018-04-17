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
  import profile from 'modules/Users/queries/profile.js'
  import {mapActions} from 'vuex'

  export default {
    name: 'LayoutDefault',
    components: {
      AppHeader,
      AppDrawer
    },
    data () {
      return {}
    },
    apollo: {
      $client: 'auth',
      profile: {
        query: profile,
        update (data) {
          this.setLogged(true)
          this.setUser(data.profile)
          this.$router.replace('/admin/users')
          return data.profile
        }
      }
    },
    computed: {},
    methods: {
      ...mapActions('users', [
        'setLogged', 'setUser'
      ])
    }
  }
</script>

<style>
</style>
