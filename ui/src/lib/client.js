/* eslint-disable import/no-unresolved */
import { ApolloClient, HttpLink, InMemoryCache } from '@apollo/client'
import { registerApolloClient } from '@apollo/experimental-nextjs-app-support/rsc'

//* This client is used for server-side rendering
export const { getClient } = registerApolloClient(() => new ApolloClient({
  cache: new InMemoryCache(),
  link: new HttpLink({
    // Since we're using SSR, we need to provide the full URL (localhost can't be resolved)
    uri: 'http://127.0.0.1:8000/graphql',
  }),
}))
