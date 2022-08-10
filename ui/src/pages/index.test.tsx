import 'jsdom-global/register'
import React from 'react';
import { render } from '@testing-library/react';
import {screen, waitFor} from '@testing-library/dom'
import '@testing-library/jest-dom'
import Index from './index';
import { MockedProvider } from "@apollo/client/testing";
import { FIND_PRODUCT } from '../graphql/queries/Product';

const mocks = {
  success: {
    request: {
      query: FIND_PRODUCT,
      variables: {
        id: "api/products/1"
      }
    },
    result: {
      data: {
        product: { id: "api/products/1", name: "Product 1" }
      }
    }
  },
  error: {
    request: {
      query: FIND_PRODUCT,
      variables: {
        id: "api/products/1"
      }
    },
    error: new Error("Network Error")
  }
};

describe('just testing', () => {
  it('should sum', () => {
    const a = 1
    const b = 2
    expect(a + b).toBe(3)
  });

  // ! https://www.apollographql.com/docs/react/development-testing/testing/
  it('should be loading', async () => {
    const index = render(
      <MockedProvider mocks={[mocks.success]} addTypename={false}>
        <Index />
      </MockedProvider>
    )

    expect(await index.findByText('Loading...')).toBeInTheDocument();
  })

  it('should show the info', async () => {
    const index = render(
      <MockedProvider mocks={[mocks.success]} addTypename={false}>
        <Index />
      </MockedProvider>
    )

    await waitFor(() => {
      expect(index.getByText('Product name: Product 1')).toBeInTheDocument();
    })
  })

  it('should get an error', async () => {
    const index = render(
      <MockedProvider mocks={[mocks.error]} addTypename={false}>
        <Index />
      </MockedProvider>
    )

    await waitFor(() => {
      expect(index.getByTestId('error')).toHaveTextContent('Error')
    })
  })

})
