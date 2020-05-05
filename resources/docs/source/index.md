---
title: API Reference

language_tabs:
- javascript
- bash

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

#PET OWNER


<!-- START_a07aeb2f5805408ae0ef50ce80039688 -->
## SIGN UP

> Example request:

```javascript
const url = new URL(
    "https://test.petsheba.com/api/petownersignup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "Shajedul",
    "last_name": "Islam",
    "email": "info@shajedulislam.dev",
    "mobile_number": "01628734916",
    "password": "12345678",
    "latitude": "33.147984",
    "longitude": "73.753670",
    "address": "15 A, Road-8, Banani, Dhaka, Bangladesh"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```bash
curl -X POST \
    "https://test.petsheba.com/api/petownersignup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"Shajedul","last_name":"Islam","email":"info@shajedulislam.dev","mobile_number":"01628734916","password":"12345678","latitude":"33.147984","longitude":"73.753670","address":"15 A, Road-8, Banani, Dhaka, Bangladesh"}'

```


> Example response (200):

```json
{
    "success": true,
    "message": "Account created"
}
```
> Example response (200):

```json
{
    "success": false,
    "message": "User exist"
}
```
> Example response (500):

```json
{
    "success": false,
    "message": "Something went wrong"
}
```
> Example response (400):

```json
{
    "success": false,
    "message": "Incomplete data in request body"
}
```

### HTTP Request
`POST api/petownersignup`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  required  | 
        `last_name` | string |  required  | 
        `email` | string |  required  | 
        `mobile_number` | string |  required  | 
        `password` | string |  required  | 
        `latitude` | string |  optional  | 
        `longitude` | string |  optional  | 
        `address` | string |  optional  | 
    
<!-- END_a07aeb2f5805408ae0ef50ce80039688 -->

<!-- START_22c47495d5d24e328956f32825f512ea -->
## SIGN IN

> Example request:

```javascript
const url = new URL(
    "https://test.petsheba.com/api/petownersignin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "info@shajedulislam.dev",
    "mobile_number": "01628734916",
    "password": "12345678"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```bash
curl -X POST \
    "https://test.petsheba.com/api/petownersignin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"info@shajedulislam.dev","mobile_number":"01628734916","password":"12345678"}'

```


> Example response (200):

```json
{
    "success": true,
    "user_id": "1234"
}
```
> Example response (401):

```json
{
    "success": false,
    "message": "Wrong password"
}
```
> Example response (404):

```json
{
    "success": false,
    "message": "User not found"
}
```

### HTTP Request
`POST api/petownersignin`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  optional  | it is optional only if you use mobile_number
        `mobile_number` | string |  optional  | it is optional only if you use email.
        `password` | string |  required  | 
    
<!-- END_22c47495d5d24e328956f32825f512ea -->

<!-- START_4c93baea7f9a515b580f960514830134 -->
## SET USER LOCATION

> Example request:

```javascript
const url = new URL(
    "https://test.petsheba.com/api/petownersetlocation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "Shajedul",
    "latitude": "23.12345",
    "longitude": "73.12345"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```bash
curl -X POST \
    "https://test.petsheba.com/api/petownersetlocation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"Shajedul","latitude":"23.12345","longitude":"73.12345"}'

```


> Example response (200):

```json
{
    "success": true,
    "message": "Location saved"
}
```
> Example response (500):

```json
{
    "success": false,
    "message": "Something went wrong"
}
```
> Example response (400):

```json
{
    "success": false,
    "message": "Incomplete data in request body"
}
```

### HTTP Request
`POST api/petownersetlocation`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | string |  required  | 
        `latitude` | string |  required  | 
        `longitude` | string |  required  | 
    
<!-- END_4c93baea7f9a515b580f960514830134 -->

#PET PROFILE


<!-- START_b945358e811a9fa0a9f6d65dfbf03ff2 -->
## CREATE PET PROFILE

> Example request:

```javascript
const url = new URL(
    "https://test.petsheba.com/api/createpetprofile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "12345",
    "pet_id": "12345",
    "type": "Cat",
    "name": "Dobby",
    "gender": "Male",
    "breed": "Asian",
    "birthday": "01-01-2020",
    "neutered_spayed": true,
    "notes": "Any notes can be written"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```bash
curl -X POST \
    "https://test.petsheba.com/api/createpetprofile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"12345","pet_id":"12345","type":"Cat","name":"Dobby","gender":"Male","breed":"Asian","birthday":"01-01-2020","neutered_spayed":true,"notes":"Any notes can be written"}'

```


> Example response (200):

```json
{
    "success": true,
    "message": "Profile created"
}
```
> Example response (500):

```json
{
    "success": false,
    "message": "Something went wrong"
}
```
> Example response (400):

```json
{
    "success": false,
    "message": "Incomplete data in request body"
}
```

### HTTP Request
`POST api/createpetprofile`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | string |  required  | 
        `pet_id` | string |  required  | 
        `type` | string |  required  | 
        `name` | string |  required  | 
        `gender` | string |  required  | 
        `breed` | string |  required  | 
        `birthday` | string |  required  | 
        `neutered_spayed` | boolean |  required  | 
        `notes` | string |  optional  | 
    
<!-- END_b945358e811a9fa0a9f6d65dfbf03ff2 -->

#PET SERVICE


<!-- START_91a71726dd2fc6515630297ad3df8f12 -->
## SIGN UP

> Example request:

```javascript
const url = new URL(
    "https://test.petsheba.com/api/petservicesignup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_type": "vet",
    "first_name": "Shajedul",
    "last_name": "Islam",
    "email": "info@shajedulislam.dev",
    "mobile_number": "01628734916",
    "password": "12345678",
    "registration_number": "123456",
    "nid_number": "199412345678",
    "latitude": "33.147984",
    "longitude": "73.753670",
    "address": "15 A, Road-8, Banani, Dhaka, Bangladesh"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```bash
curl -X POST \
    "https://test.petsheba.com/api/petservicesignup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"service_type":"vet","first_name":"Shajedul","last_name":"Islam","email":"info@shajedulislam.dev","mobile_number":"01628734916","password":"12345678","registration_number":"123456","nid_number":"199412345678","latitude":"33.147984","longitude":"73.753670","address":"15 A, Road-8, Banani, Dhaka, Bangladesh"}'

```


> Example response (200):

```json
{
    "success": true,
    "message": "Account created"
}
```
> Example response (200):

```json
{
    "success": false,
    "message": "User exist"
}
```
> Example response (500):

```json
{
    "success": false,
    "message": "Something went wrong"
}
```
> Example response (400):

```json
{
    "success": false,
    "message": "Incomplete data in request body"
}
```

### HTTP Request
`POST api/petservicesignup`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `service_type` | string |  required  | 
        `first_name` | string |  required  | 
        `last_name` | string |  required  | 
        `email` | string |  required  | 
        `mobile_number` | string |  required  | 
        `password` | string |  required  | 
        `registration_number` | string |  required  | 
        `nid_number` | string |  required  | 
        `latitude` | string |  optional  | 
        `longitude` | string |  optional  | 
        `address` | string |  optional  | 
    
<!-- END_91a71726dd2fc6515630297ad3df8f12 -->

<!-- START_910731cff1ffe0036ded5ce0d443f5c1 -->
## SIGN IN

> Example request:

```javascript
const url = new URL(
    "https://test.petsheba.com/api/petservicesignin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "info@shajedulislam.dev",
    "mobile_number": "01628734916",
    "password": "12345678"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```bash
curl -X POST \
    "https://test.petsheba.com/api/petservicesignin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"info@shajedulislam.dev","mobile_number":"01628734916","password":"12345678"}'

```


> Example response (200):

```json
{
    "success": true,
    "user_id": "1234",
    "service_type": "vet"
}
```
> Example response (401):

```json
{
    "success": false,
    "message": "Wrong password"
}
```
> Example response (200):

```json
{
    "success": false,
    "message": "User not found"
}
```

### HTTP Request
`POST api/petservicesignin`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  optional  | it is optional only if you use mobile_number
        `mobile_number` | string |  optional  | it is optional only if you use email.
        `password` | string |  required  | 
    
<!-- END_910731cff1ffe0036ded5ce0d443f5c1 -->

<!-- START_08f23099485dd96a1f163cfbe56e8269 -->
## SET USER LOCATION

> Example request:

```javascript
const url = new URL(
    "https://test.petsheba.com/api/petservicesetlocation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "Shajedul",
    "latitude": "23.12345",
    "longitude": "73.12345"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```bash
curl -X POST \
    "https://test.petsheba.com/api/petservicesetlocation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"Shajedul","latitude":"23.12345","longitude":"73.12345"}'

```


> Example response (200):

```json
{
    "success": true,
    "message": "Location saved"
}
```
> Example response (500):

```json
{
    "success": false,
    "message": "Something went wrong"
}
```
> Example response (400):

```json
{
    "success": false,
    "message": "Incomplete data in request body"
}
```

### HTTP Request
`POST api/petservicesetlocation`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | string |  required  | 
        `latitude` | string |  required  | 
        `longitude` | string |  required  | 
    
<!-- END_08f23099485dd96a1f163cfbe56e8269 -->


