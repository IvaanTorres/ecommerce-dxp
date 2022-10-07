# Shared files / configuration

This directory contains all shared files and shared configuration which is used in the whole app.

## Enums
This directory contains any config or data that can be accesed by objects.

Examples:
* ENV variables
* Design system (spacings, colors, font families, etc)

## Hooks
Folder that holds any configured React hooks logic that will be used in the app.

## Interfaces
This directory holds all the global interfaces in order to keep a tracking of all types of the whole application.

However, any interface which is used specifically for one component, will be set up inside the component folder itself.

## Services
This folder contains any service that is used in the application.

The services are GraphQL queries that get/update data in the server (api/).

## Utils
The utils folder is used to hold any function or piece of logic that can be reused in many components or TypeScript files.

Each file may contain 1 Unit test in order to verify that the functionallity is working as expected.

## Constants
The constants directory contains any other shared config that the app could use.