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

const ApolloWrapper = ({ children }) => (
  <ApolloNextAppProvider
    makeClient={makeClient}
  >
    {children}
  </ApolloNextAppProvider>
)

export default ApolloWrapper
