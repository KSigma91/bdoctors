<template>
    <div>
      <v-braintree
        :authorization="authorization"
        locale="it_IT"
        @success="onSuccess"
        @error="onError"
        @load="onLoad"
      ></v-braintree>
      <div>
        <p v-if="error" class="text-red-500 mb-4">
          {{ error }}
        </p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "PaymentComponent",
    props: {
      authorization: {
        required: true,
        type: String
      }
    },
    data () {
      return {
        error: ''
      }
    },
    methods: {
      onLoad () {
        this.$emit('loading')
      },
      onSuccess (payload) {
        const token = payload.nonce
        this.$emit('onSuccess', token)
      },
      onError (error) {
        const message = error.message
        if (message === 'No payment method is available.') {
          this.error = 'Seleziona un metodo di Pagamento'
        } else {
          this.error = message
        }
        this.$emit('onError', message)
      }
    }
  }
  </script>
  
  <style>
  </style>