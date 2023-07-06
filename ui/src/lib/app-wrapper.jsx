/* eslint-disable react/react-in-jsx-scope */

'use client'

import { Provider } from 'react-redux'
import NextNProgress from 'nextjs-progressbar'
import store from '../redux/configureStore'

const AppWrapper = ({ children }) => (
  <Provider store={store}>
    <NextNProgress />
    {children}
  </Provider>
)

export default AppWrapper
