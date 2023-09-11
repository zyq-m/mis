<div align='center'>
    <h3 style="font-size:3rem">Memogram Information System</h3>
    <em>Developed by Haziq</em>
</div>

## Setup & Installation

Clone or copy this repository.

Run `composer install` on terminal to download all packages.

Run `php spark shield:setup`

Create `.env` file and change this code below:

```properties
CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = mis
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306

```

## Stacks

1. CodeIgniter 4
2. Bootstrap

## Pages & Links

Pages located [at](app/Views/)

1. Login `/`
2. Register `/register`
3. Urine Test `/urine_test`
4. Image Repository `/image_repo`

> [`Views/layout`](app/Views/layout/default.php) where we setup layout template.

## Database & ER Diagram

Database will be upload soon.

ER Diagram [here](https://lucid.app/lucidchart/a21aa534-b6c0-4b84-a343-b19050e88d2a/edit?viewport_loc=-13%2C-210%2C1664%2C831%2C0_0&invitationId=inv_8bbfed06-f13c-4310-82b9-fbe06f3a9284)

## System Flow

### User level

1. Admin
2. Super admin
3. Patient

### Patient

Patient will be registered by admin. Patient can log into using email and myKad(password)

## New Features

- return zip file contains memogram image based on patient
- auto register patient account during patient registration process
