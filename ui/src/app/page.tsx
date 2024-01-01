/* eslint-disable @typescript-eslint/restrict-template-expressions */
/* eslint-disable no-console */
/* eslint-disable @typescript-eslint/no-floating-promises */

/* eslint-disable @typescript-eslint/no-explicit-any */

/* eslint-disable @typescript-eslint/no-unsafe-return */
/* eslint-disable max-len */
/* eslint-disable @typescript-eslint/no-shadow */
/* eslint-disable react/button-has-type */

/* eslint-disable implicit-arrow-linebreak */
/* eslint-disable @typescript-eslint/no-unsafe-member-access */
/* eslint-disable @typescript-eslint/no-unsafe-call */
/* eslint-disable @typescript-eslint/no-unsafe-assignment */
/* eslint-disable react/react-in-jsx-scope */

'use client'

import { useMutation, useSuspenseQuery } from '@apollo/client'
import Link from 'next/link'
import { useDispatch, useSelector } from 'react-redux'
import { useRouter } from 'next/navigation'
import { Suspense, useEffect, useState } from 'react'
import { uniqueId } from 'lodash'
import { FIND_PRODUCT, UPDATE_PRODUCT } from '../shared/services/Product'
import { RootState } from '../redux/configureStore'
import { increment } from '../redux/reducers/counter'
import { generateRandomId } from '../shared/utils/generateRandomNumber'

export const dynamic = 'force-dynamic'

const Home = () => {
  const router = useRouter()
  const [id, setId] = useState<any>(5)

  // useEffect(() => {
  //   setId(generateRandomId)
  // }, [])

  const { data: product, error, refetch, client } = useSuspenseQuery<any>(FIND_PRODUCT, {
    variables: { id },
  })

  const generateRandomString = (length: number) => {
    let result = ''
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
    const charactersLength = characters.length

    for (let i = 0; i < length; i += 1) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength))
    }

    return result
  }

  const [updateProduct] = useMutation(UPDATE_PRODUCT, {
    variables: {
      id,
      name: generateRandomString(10),
    },
  })

  return (
    <main>
      <h1>Product fetched on the client and cached:</h1>

      <hr />

      <p>Apollo Client:</p>
      <p>Product with ID {product?.product.id}: {product?.product.name}</p>

      <button onClick={async () => {
        await updateProduct()
      }}
      >Update product name
      </button>

      <hr />
      {/* <Link
        href={`/ssr/${id}`}
      >Go to server component using revalidation inside the fetch call
      </Link>
      <hr />
      <Link
        href={`/ssr-segment/${id}`}
      >Go to server component using segment to revalidate 0
      </Link>
      <hr /> */}

      <Link href={`/suspense/${id}`}>Go to client component with suspense query</Link>
    </main>
  )
}

export default Home
