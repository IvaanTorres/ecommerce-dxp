/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable max-len */
/* eslint-disable @typescript-eslint/no-unsafe-member-access */
/* eslint-disable import/extensions */
/* eslint-disable @typescript-eslint/no-floating-promises */
/* eslint-disable @typescript-eslint/no-unsafe-assignment */
/* eslint-disable react/button-has-type */
/* eslint-disable react/react-in-jsx-scope */

// 'use client'

import { Suspense } from 'react'
import lazy from 'next/dynamic'
import Link from 'next/link'
// import SuspendedChild from '@/src/components/atoms/SuspendedChild/SuspendedChild'

/* eslint-disable @typescript-eslint/no-unsafe-call */
export const dynamic = 'force-dynamic'

const SuspendedChild = lazy(() => import('@/src/components/atoms/SuspendedChild/SuspendedChild'), {
  loading: () => <p>Loading...</p>,
})

const SuspensePage = ({ params }: any) => (
  <div>
    <p>Test</p>
    <SuspendedChild id={params.id} />
    <Link href="/">
      <p>Back</p>
    </Link>
  </div>
)

export default SuspensePage
