import '../../styles/globals.css'
import 'normalize.css/normalize.css'
import type { AppProps } from 'next/app'
import React from 'react'
import { ApolloProvider } from '@apollo/client'
import apolloClient from "../config/apollo-client"

function MyApp({ Component, pageProps }: AppProps) {
  return (
    <ApolloProvider client={apolloClient}>
      <Component {...pageProps} />
    </ApolloProvider>
  )
}

export default React.memo(MyApp)
