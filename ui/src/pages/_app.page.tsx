import React from 'react'
import type { AppProps } from 'next/app'
import { Provider } from 'react-redux'
import { ApolloProvider } from '@apollo/client'
import NextNProgress from 'nextjs-progressbar'
import { useApollo } from '../config/apollo-client'
import store from '../redux/configureStore'
// Global CSS
import 'normalize.css/normalize.css'

const MyApp = ({ Component, pageProps }: AppProps) => {
  const client = useApollo(pageProps)

  return (
    <ApolloProvider client={client}>
      <Provider store={store}>
        <NextNProgress />
        <Component {...pageProps} />
      </Provider>
    </ApolloProvider>
  )
}

export default React.memo(MyApp)
