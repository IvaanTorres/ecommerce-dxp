/* eslint-disable react-hooks/exhaustive-deps */
/* eslint-disable @typescript-eslint/no-unsafe-argument */
/* eslint-disable react/jsx-no-useless-fragment */
/* eslint-disable react/react-in-jsx-scope */

'use client'

import { useRouter } from 'next/navigation'
import { useEffect, useLayoutEffect, useTransition } from 'react'

const RefreshRouter = ({ children }) => {
  const router = useRouter()

  useEffect(() => {
    router.refresh()
  }, [router])

  return (
    <>
      {children}
    </>
  )
}

export default RefreshRouter
