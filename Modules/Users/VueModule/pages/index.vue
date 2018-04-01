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
        </h1>
        <h2>LIST</h2>
        <ul>
            <li v-for="item in users" :key="item.id">
                <strong>{{item.name}} </strong>|
                <small>{{item.email}}</small>
            </li>
        </ul>
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
        // Initialize your apollo data
        users: {}
      }
    },
    apollo: {
      // Simple query that will update the 'hello' vue property
      users: {
        query: indexQuery
      }
    }
  }
</script>
