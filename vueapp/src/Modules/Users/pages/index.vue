<template>
  <section>
    <h1>{{$t('users.users')}}
      <small>
        <router-link
          tag="q-btn"
          :to="{name:'users.create'}"
          color="primary"
        >
          {{$t('users.addNew')}}
        </router-link>
      </small>
      <q-btn :loading="$apollo.loading" @click="refreshData()" label="Refresh">
        <q-spinner-mat slot="loading"/>
      </q-btn>
    </h1>
    <q-card color="grey-2" class="text-dark relative-position">
      <q-card-title>
        List
      </q-card-title>
      <q-card-main>
        <transition
          appear
          enter="fadeIn"
          leave="fadeOut"
        >
          <div v-show="users">
            <ul>
              <li v-for="item in users" :key="item.id">
                <i>[{{item.login}}] </i> | <strong> {{item.name}} </strong>|
                <small>{{item.email}}</small>
              </li>
            </ul>
          </div>
        </transition>
      </q-card-main>

      <!--
        Place QInnerLoading as the last child element.
        This is important for it to be displayed on top of the other content.
      -->
      <q-inner-loading :visible="$apollo.loading">
        <q-spinner-mat size="50px" color="primary"></q-spinner-mat>
      </q-inner-loading>
    </q-card>
  </section>
</template>

<style>
</style>

<script>
  import indexQuery from './../queries/index'

  export default {
    name: 'PageIndex-user',
    data () {
      return {
        users: null
      }
    },
    methods: {
      refreshData () {
        // this.users = null
        this.$apollo.queries.users.refetch()
      }
    },
    apollo: {
      $client: 'auth',
      users: {
        query: indexQuery
      }
    }
  }
</script>
