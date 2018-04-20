<template>
  <div class="form-errors">
    <transition
      enter-active-class="animated bounceInLeft"
      leave-active-class="animated bounceOutRight"
    >
      <q-alert
        v-if="errors.length > 0"
        color="negative"
        icon="warning"
      >
        <ul v-for="(items, key) in errors" :key="key">
          <template v-if="items.validation">
            <li v-for="(item, key2) in items.validation" :key="key2">
                    <span v-for="(msg, key3) in item" :key="key3">
                        {{msg}}
                    </span>
            </li>
          </template>
        </ul>
      </q-alert>
    </transition>
  </div>
</template>

<script>
  export default {
    name: 'formErrors',
    props: ['errors']
  }
</script>

<style scoped>

</style>
