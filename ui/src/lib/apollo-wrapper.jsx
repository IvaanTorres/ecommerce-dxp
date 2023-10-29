'use client'

/* eslint-disable import/no-unresolved */

/* eslint-disable @typescript-eslint/no-unsafe-call */
/* eslint-disable @typescript-eslint/no-unsafe-return */
/* eslint-disable react/react-in-jsx-scope */
/* eslint-disable react/jsx-filename-extension */
import {
  ApolloClient,
  ApolloLink,
  ApolloProvider,
  HttpLink,
  InMemoryCache,
} from '@apollo/client'
import {
  NextSSRApolloClient,
  ApolloNextAppProvider,
  NextSSRInMemoryCache,
  SSRMultipartLink,
} from '@apollo/experimental-nextjs-app-support/ssr'
import env from '../shared/enums/config/environment'

function makeClient() {
  const httpLink = new HttpLink({
    uri: env.NEXT_PUBLIC_API_URL,
  })

  return new NextSSRApolloClient({
    cache: new NextSSRInMemoryCache(),
    link:
      typeof window === 'undefined'
        ? ApolloLink.from([
          new SSRMultipartLink({
            stripDefer: true,
          }),
          httpLink,
        ])
        : httpLink,
  })
}

// Create a graphql apollo client no ssr
const c = new ApolloClient({
  cache: new InMemoryCache(),
  link: new HttpLink({
    uri: env.NEXT_PUBLIC_API_URL,
  }),
})

const ApolloWrapper = ({ children }) => (
  <ApolloNextAppProvider
    makeClient={makeClient}
  >
    {children}
  </ApolloNextAppProvider>
)

const ApolloWrapper2 = ({ children }) => (
  <ApolloProvider client={c}>
    {children}
  </ApolloProvider>
)

export default ApolloWrapper
