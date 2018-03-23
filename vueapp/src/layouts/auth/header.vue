<template>
  <q-layout-header>
    Header auth
  </q-layout-header>
</template>

<script>
import {openURL} from 'quasar'

export default {
  name: 'LayoutDefault',
  data () {
    return {
      leftDrawerOpen: this.$q.platform.is.desktop
    }
  },
  computed: {
    availableLang () {
      return this.$i18n.locale
    }
  },
  methods: {
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
