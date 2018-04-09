<template>
    <q-layout-drawer
            :value="leftDrawerOpen"
            :content-class="$q.theme === 'mat' ? 'bg-grey-2' : null"
    >
        <q-list
                no-border
                link
                inset-delimiter
        >
            <q-item>
                <router-link to="/">Home</router-link>
            </q-item>
            <q-item>
                <router-link :to="{name:'users.index'}">User</router-link>
            </q-item>
            <q-item>
                <router-link :to="{name:'auth.login'}">Login</router-link>
            </q-item>
            <q-item>
                <router-link to="/not-found">404</router-link>
            </q-item>
            <q-item @click.native="change()">
                <q-item-side icon="rss feed"/>
                <q-item-main label="Language" :sublabel="availableLang"/>
            </q-item>
        </q-list>
    </q-layout-drawer>
</template>

<script>
  import {openURL} from 'quasar'
  import {mapState} from 'vuex'

  export default {
    name: 'LayoutDefault',
    data () {
      return {}
    },
    computed: {
      ...mapState(['leftDrawerOpen']),
      availableLang () {
        return this.$i18n.locale
      }
    },
    methods: {
      openURL,
      change () {
        console.log(this.$i18n.locale)
        if (this.$i18n.locale === 'en') {
          this.$i18n.locale = 'fr'
        } else {
          this.$i18n.locale = 'en'
        }
      }
    }
  }
</script>

<style>
</style>
