import 'jsdom-global/register'
import React from 'react'
import { render } from '@testing-library/react'
import { screen, waitFor } from '@testing-library/dom'
import '@testing-library/jest-dom'
import { MockedProvider } from '@apollo/client/testing'
import { Provider } from 'react-redux'
import Index from './index'
import { FIND_PRODUCT } from '../enums/graphql/queries/Product'
import store from '../redux/configureStore'

const productId = 'api/products/1'
const mocks = {
  success: {
    request: {
      query: FIND_PRODUCT,
      variables: {
        id: productId,
      },
    },
    result: {
      data: {
        product: { id: productId, name: 'Product 1' },
      },
    },
  },
  error: {
    request: {
      query: FIND_PRODUCT,
      variables: {
        id: productId,
      },
    },
    error: new Error('Network Error'),
  },
}

describe('just testing', () => {
  it('should sum', () => {
    const a = 1
    const b = 2
    expect(a + b).toBe(3)
  })

  // ! https://www.apollographql.com/docs/react/development-testing/testing/
  it('should be loading', async () => {
    const view = render(
      <MockedProvider mocks={[mocks.success]} addTypename={false}>
        <Provider store={store}>
          <Index />
        </Provider>
      </MockedProvider>,
    )
    expect(await screen.findByText('Loading...')).toBeInTheDocument()
  })

  it('should show the info', async () => {
    const view = render(
      <MockedProvider mocks={[mocks.success]} addTypename={false}>
        <Provider store={store}>
          <Index />
        </Provider>
      </MockedProvider>,
    )

    await waitFor(() => {
      expect(screen.getByText('Product name: Product 1')).toBeInTheDocument()
    })
  })

  it('should get an error', async () => {
    const view = render(
      <MockedProvider mocks={[mocks.error]} addTypename={false}>
        <Provider store={store}>
          <Index />
        </Provider>
      </MockedProvider>,
    )

    await waitFor(() => {
      expect(screen.getByTestId('error')).toHaveTextContent('Error')
    })
  })
})
