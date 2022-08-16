import '../../styles/globals.css'
import 'normalize.css/normalize.css'
import type { AppProps } from 'next/app'
import React from 'react'
import { ApolloProvider } from '@apollo/client'
import apolloClient from "../config/apollo-client"
import { Provider } from 'react-redux'
import store from '../redux/configureStore'

function MyApp({ Component, pageProps }: AppProps) {
  return (
    <ApolloProvider client={apolloClient}>
      <Provider store={store}>
        <Component {...pageProps} />
      </Provider>
    </ApolloProvider>
  )
}

export default React.memo(MyApp)
