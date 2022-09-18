/* eslint-disable @typescript-eslint/dot-notation */
import 'normalize.css/normalize.css'
import type { AppProps } from 'next/app'
import React from 'react'
import { ApolloProvider } from '@apollo/client'
import { Provider } from 'react-redux'
import NextNProgress from 'nextjs-progressbar'
import { useApollo } from '../config/apollo-client'
import store from '../redux/configureStore'

const MyApp = ({ Component, pageProps }: AppProps) => {
  const client = useApollo(pageProps)

  return (
    <ApolloProvider client={client}>
      <Provider store={store}>
        <NextNProgress />
        {/* eslint-disable-next-line react/jsx-props-no-spreading */}
        <Component {...pageProps} />
      </Provider>
    </ApolloProvider>
  )
}

export default React.memo(MyApp)
