<template>
  <q-layout-drawer
    v-model="leftDrawerOpen"
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
        <router-link to="/simple">Simple</router-link>
      </q-item>
      <q-item>
        <router-link to="/newsletter">NewsLetter</router-link>
      </q-item>
      <q-item>
        <router-link to="/test">Test</router-link>
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
