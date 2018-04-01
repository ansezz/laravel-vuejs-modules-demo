<template>
    <section>
        <h1>{{$t('user.users')}}
            <small>
                <router-link
                        tag="q-btn"
                        :to="{name:'user.create'}"
                        color="primary"
                >
                    {{$t('user.addNew')}}
                </router-link>
            </small>
        </h1>
        <h2>LIST</h2>
        <ul>
            <li v-for="item in user" :key="item.id">
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
        user: ''
      }
    },
    apollo: {
      // Simple query that will update the 'hello' vue property
      user: {
        query: indexQuery
      }
    }
  }
</script>
