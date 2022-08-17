import '../../styles/globals.css'
import 'normalize.css/normalize.css'
import type { AppProps } from 'next/app'
import React from 'react'
import { ApolloProvider } from '@apollo/client'
import { Provider } from 'react-redux'
import apolloClient from '../config/apollo-client'
import store from '../redux/configureStore'

const MyApp = ({ Component, pageProps }: AppProps) => (
  <ApolloProvider client={apolloClient}>
    <Provider store={store}>
      {/* eslint-disable-next-line react/jsx-props-no-spreading */}
      <Component {...pageProps} />
    </Provider>
  </ApolloProvider>
)

export default React.memo(MyApp)
