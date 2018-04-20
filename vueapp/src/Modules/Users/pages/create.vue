<template>
  <q-page padding class="justify-center">
    <q-card color="grey-2" class="text-dark relative-position">
      <q-card-main>
        <formUser :model="user" :gqQuery="gqQuery" :title="$t('users.addNewUser')"></formUser>
      </q-card-main>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
  import formUser from './form'
  import createUserQuery from './../queries/createUser'

  export default {
    name: 'create-user',
    data: function () {
      return {
        gqQuery: createUserQuery,
        loading: false,
        user: {
          login: '',
          email: '',
          name: '',
          display_name: '',
          url: 'http://',
          status: true
        }
      }
    },
    mounted () {
    },
    components: {
      formUser
    },
    methods: {}
  }
</script>
