import { ApolloClient, HttpLink, InMemoryCache } from "@apollo/client";
import { fetch } from "cross-fetch";

const client = new ApolloClient({
    ssrMode: true,
    link: new HttpLink({
        uri: "https://localhost:8000/api/graphql",
        fetch,
    }),
    cache: new InMemoryCache(),
});

export default client;
