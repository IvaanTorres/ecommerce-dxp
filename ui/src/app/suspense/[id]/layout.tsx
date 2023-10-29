/* eslint-disable react/react-in-jsx-scope */
/* eslint-disable import/extensions */
import { Inter } from 'next/font/google'
import ApolloWrapper from '@/src/lib/apollo-wrapper'
import RefreshRouter from '@/src/lib/refresh-router'

const inter = Inter({ subsets: ['latin'] })

export const dynamic = 'force-dynamic'

const SuspenseLayout = ({ children }: any) => (
  <html lang="en">
    <body className={inter.className}>
      <ApolloWrapper>
        {children}
      </ApolloWrapper>
    </body>
  </html>
  // <RefreshRouter>
  //   <ApolloWrapper>
  //     {children}
  //   </ApolloWrapper>
  // </RefreshRouter>
)

export default SuspenseLayout
