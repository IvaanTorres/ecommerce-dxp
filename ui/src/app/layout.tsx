/* eslint-disable react/react-in-jsx-scope */
// import './globals.css'
import { Inter } from 'next/font/google'
import ApolloWrapper from '../lib/apollo-wrapper'
import AppWrapper from '../lib/app-wrapper'

const inter = Inter({ subsets: ['latin'] })

export const metadata = {
  title: 'Create Next App',
  description: 'Generated by create next app',
}

const RootLayout = ({
  children,
}: {
  children: React.ReactNode
}) => (
  <html lang="en">
    <body className={inter.className}>
      <ApolloWrapper>
        <AppWrapper>
          {children}
        </AppWrapper>
      </ApolloWrapper>
    </body>
  </html>
)

export default RootLayout