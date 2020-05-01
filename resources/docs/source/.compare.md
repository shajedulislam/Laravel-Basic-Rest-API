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

#Pet Owner User


APIs for pet owner user signup and signin
<!-- START_a07aeb2f5805408ae0ef50ce80039688 -->
## Signup

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
## Signin

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

#Pet Service User


APIs for pet service user signup and signin
<!-- START_91a71726dd2fc6515630297ad3df8f12 -->
## Signup

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
## Signin

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


