/* eslint-disable max-len */
/* eslint-disable import/extensions */
/* eslint-disable react/react-in-jsx-scope */
/* eslint-disable @typescript-eslint/no-unsafe-call */
/* eslint-disable @typescript-eslint/no-unsafe-member-access */
/* eslint-disable @typescript-eslint/no-unsafe-assignment */
import { gql } from '@apollo/client'
import Link from 'next/link'
import { getClient } from '@/src/lib/client.js'
import { FIND_CATEGORY, FIND_PRODUCT } from '@/src/shared/services/Product'

const client = getClient()

const About = async () => {
  const { data, errors } = await client.query({
    query: FIND_PRODUCT,
    variables: { id: '5' },
  })

  console.log(data)

  return (
    <main>
      <h1>Product fecthed on the server and cached:</h1>
      <h5>No need to refetch because it is not possible to use event handlers on the server side (click, etc)</h5>
      <p>Product with ID 5: {data.product.name}</p>
      <Link href="/">Go to Home page (Client)</Link>
    </main>
  )
}

export default About
