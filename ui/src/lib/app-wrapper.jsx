/* eslint-disable react/react-in-jsx-scope */

'use client'

import { Provider } from 'react-redux'
import store from '../redux/configureStore'

const AppWrapper = ({ children }) => (
  <Provider store={store}>
    {children}
  </Provider>
  // children
)

export default AppWrapper
