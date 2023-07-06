/* eslint-disable react/react-in-jsx-scope */
/* eslint-disable import/extensions */
import ApolloWrapper from '@/src/lib/apollo-wrapper'

const AboutLayout = ({ children }: any) => (
  <div>
    <ApolloWrapper>{children}</ApolloWrapper>
  </div>
)

export default AboutLayout
