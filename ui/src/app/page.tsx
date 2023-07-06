'use client'

/* eslint-disable @typescript-eslint/no-unsafe-return */
/* eslint-disable max-len */
/* eslint-disable @typescript-eslint/no-shadow */
/* eslint-disable react/button-has-type */

/* eslint-disable implicit-arrow-linebreak */
/* eslint-disable @typescript-eslint/no-unsafe-member-access */
/* eslint-disable @typescript-eslint/no-unsafe-call */
/* eslint-disable @typescript-eslint/no-unsafe-assignment */
/* eslint-disable react/react-in-jsx-scope */

import { gql, useQuery, useSuspenseQuery } from '@apollo/client'
import Image from 'next/image'
import Link from 'next/link'
import { useDispatch, useSelector } from 'react-redux'
import { FIND_CATEGORY, FIND_PRODUCT, GET_CATEGORIES, GET_PRODUCTS } from '../shared/services/Product'
import { RootState } from '../redux/configureStore'
import { increment } from '../redux/reducers/counter'

const Home = () => {
  const counter = useSelector((state: RootState) => state.counter)
  const dispatch = useDispatch()

  // Random number to 150
  const id = Math.floor(Math.random() * 150)

  const { data: product, error, refetch } = useSuspenseQuery<any>(FIND_PRODUCT, {
    variables: { id: '3' },
    // fetchPolicy: 'cache-only',
  })

  return (
    <main>
      <h1>Product fetched on the client and cached:</h1>

      <hr />

      <p>Apollo Client:</p>
      <p>Product with ID 3: {product?.product.name}
        <button onClick={() => refetch({
          id: id.toString(),
        })}
        >Refetch this query (Get product with random ID)
        </button>
      </p>

      <hr />
      <p>
        Counters:
      </p>
      {counter.counters.map((counter) => (
        <p key={counter.id}>
          {counter.id} - {counter.name}: {counter.value} <button onClick={() => dispatch(increment())}>Show</button>
        </p>
      ))}
      <p>{counter.name}</p>
      <Link href="/about">Go to About page (SSR)</Link>
    </main>
  )
}

export default Home
