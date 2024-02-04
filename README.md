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

ER Diagram [here](https://lucid.app/lucidchart/a3f41b40-cbb6-478b-8caa-a59d15f78001/edit?viewport_loc=-817%2C52%2C2894%2C1304%2C0_0&invitationId=inv_527431f4-2190-4e14-9f08-17be1d5557a2)

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
