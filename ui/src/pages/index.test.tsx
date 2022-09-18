import React from 'react'
import { render } from '@testing-library/react'
import { screen, waitFor } from '@testing-library/dom'
import { MockedProvider } from '@apollo/client/testing'
import { Provider } from 'react-redux'
import Index from './index.page'
import { FIND_PRODUCT } from '../shared/services/Product'
import store from '../redux/configureStore'

const product = {
  success: {
    data: {
      product: { id: '1', name: 'Product 1' },
    },
  },
  error: {
    error: new Error('Error'),
  },
}
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

  // ? https://www.apollographql.com/docs/react/development-testing/testing/
  // ! Using SSR/SSG, the loading state is not shown in the DOM.
  it.skip('should be loading', async () => {
    render(
      <MockedProvider mocks={[mocks.success]} addTypename={false}>
        <Provider store={store}>
          <Index product={{}} />
        </Provider>
      </MockedProvider>,
    )
    expect(await screen.findByText('Loading...')).toBeInTheDocument()
  })

  it('should show the info', () => {
    render(
      <MockedProvider mocks={[mocks.success]} addTypename={false}>
        <Provider store={store}>
          <Index product={product.success} />
        </Provider>
      </MockedProvider>,
    )
    // expect(textfield.getByText((content) => content.includes('Product 1'))).toBeInTheDocument()
    expect(screen.getByTestId('productName')).toHaveTextContent('Product 1')
  })

  it('should get an error', async () => {
    render(
      <MockedProvider mocks={[mocks.error]} addTypename={false}>
        <Provider store={store}>
          <Index product={product.error} />
        </Provider>
      </MockedProvider>,
    )

    await waitFor(() => {
      expect(screen.getByTestId('error')).toHaveTextContent('Error')
    })
  })
})
