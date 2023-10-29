/* eslint-disable react/destructuring-assignment */
/* eslint-disable import/extensions */
/* eslint-disable @typescript-eslint/await-thenable */
/* eslint-disable react/react-in-jsx-scope */
/* eslint-disable @typescript-eslint/no-unsafe-member-access */
/* eslint-disable @typescript-eslint/no-unsafe-assignment */
/* eslint-disable @typescript-eslint/no-unsafe-call */

'use client'

import { useSuspenseQuery } from '@apollo/experimental-nextjs-app-support/ssr'
// import { useSuspenseQuery } from '@apollo/client'
import { FIND_PRODUCT } from '@/src/shared/services/Product'

const SuspendedChild = (props: any) => {
  const { data } = useSuspenseQuery<any>(FIND_PRODUCT, {
    variables: { id: props.id },
  })

  return (
    <div>
      <p>Product Name: {data.product.name}</p>
      <p>Brand: {data.product.brand.name}</p>
    </div>
  )
}

export default SuspendedChild
