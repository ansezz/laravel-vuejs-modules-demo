<template>
    <q-layout-header>
        <q-toolbar
                color="primary"
                :glossy="$q.theme === 'mat'"
                :inverted="$q.theme === 'ios'"
        >
            <q-btn
                    flat
                    dense
                    round
                    @click="toggleLeftDrawer"
                    aria-label="Menu"
            >
                <q-icon name="menu"/>
            </q-btn>

            <q-toolbar-title>
                Quasar App Admin {{$t('message')}}
                <div slot="subtitle">Running on Quasar v{{ $q.version }}</div>
            </q-toolbar-title>
        </q-toolbar>
    </q-layout-header>
</template>

<script>
  import {openURL} from 'quasar'
  import {mapActions, mapState} from 'vuex'

  export default {
    name: 'LayoutDefault',
    data () {
      return {}
    },
    computed: {
      availableLang () {
        return this.$i18n.locale
      },
      ...mapState(['leftDrawerOpen'])
    },
    methods: {
      ...mapActions(['toggleLeftDrawer']),
      openURL,
      change () {
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
