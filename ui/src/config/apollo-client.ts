import { ApolloClient, HttpLink, InMemoryCache } from "@apollo/client";

const client = new ApolloClient({
    link: new HttpLink({
        uri: "https://localhost:8000/api/graphql",
    }),
    cache: new InMemoryCache(),
});

export default client;
