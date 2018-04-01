// import something here
import {GRAPHQL_URL} from '../config/index'
import {ApolloClient} from 'apollo-client'
import {HttpLink} from 'apollo-link-http'
import {InMemoryCache} from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'

const httpLink = new HttpLink({
  // You should use an absolute URL here
  uri: GRAPHQL_URL
})

// Create the apollo client
const apolloClient = new ApolloClient({
  link: httpLink,
  cache: new InMemoryCache(),
  connectToDevTools: true
})

const apolloProvider = new VueApollo({
  defaultClient: apolloClient
})

// leave the export, even if you don't use it
export default ({app, router, Vue}) => {
  // Install the vue plugin
  Vue.use(VueApollo)
  app.provide = apolloProvider.provide()
}
