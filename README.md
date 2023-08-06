<div align='center'>
    <h3 style="font-size:3rem">Memogram Information System</h3>
    <em>Developed by Haziq & Aqief</em>
</div>

## Setup & Installation

Clone or copy this repository.

Run `composer install` on terminal to download all packages.

Run `php spark shield:setup`

Create `.env` file and paste this code below:

```.env
#--------------------------------------------------------------------
# Example Environment Configuration file
#
# This file can be used as a starting point for your own
# custom .env files, and contains most of the possible settings
# available in a default install.
#
# By default, all of the settings are commented out. If you want
# to override the setting, you must un-comment it by removing the '#'
# at the beginning of the line.
#--------------------------------------------------------------------

#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

# CI_ENVIRONMENT = production
CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

# app.baseURL = ''
# If you have trouble with `.`, you could also use `_`.
# app_baseURL = ''
# app.forceGlobalSecureRequests = false
# app.CSPEnabled = false

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

# database.tests.hostname = localhost
# database.tests.database = ci4_test
# database.tests.username = root
# database.tests.password = root
# database.tests.DBDriver = MySQLi
# database.tests.DBPrefix =
# database.tests.port = 3306

#--------------------------------------------------------------------
# CONTENT SECURITY POLICY
#--------------------------------------------------------------------

# contentsecuritypolicy.reportOnly = false
# contentsecuritypolicy.defaultSrc = 'none'
# contentsecuritypolicy.scriptSrc = 'self'
# contentsecuritypolicy.styleSrc = 'self'
# contentsecuritypolicy.imageSrc = 'self'
# contentsecuritypolicy.baseURI = null
# contentsecuritypolicy.childSrc = null
# contentsecuritypolicy.connectSrc = 'self'
# contentsecuritypolicy.fontSrc = null
# contentsecuritypolicy.formAction = null
# contentsecuritypolicy.frameAncestors = null
# contentsecuritypolicy.frameSrc = null
# contentsecuritypolicy.mediaSrc = null
# contentsecuritypolicy.objectSrc = null
# contentsecuritypolicy.pluginTypes = null
# contentsecuritypolicy.reportURI = null
# contentsecuritypolicy.sandbox = false
# contentsecuritypolicy.upgradeInsecureRequests = false
# contentsecuritypolicy.styleNonceTag = '{csp-style-nonce}'
# contentsecuritypolicy.scriptNonceTag = '{csp-script-nonce}'
# contentsecuritypolicy.autoNonce = true

#--------------------------------------------------------------------
# COOKIE
#--------------------------------------------------------------------

# cookie.prefix = ''
# cookie.expires = 0
# cookie.path = '/'
# cookie.domain = ''
# cookie.secure = false
# cookie.httponly = false
# cookie.samesite = 'Lax'
# cookie.raw = false

#--------------------------------------------------------------------
# ENCRYPTION
#--------------------------------------------------------------------

# encryption.key =
# encryption.driver = OpenSSL
# encryption.blockSize = 16
# encryption.digest = SHA512

#--------------------------------------------------------------------
# HONEYPOT
#--------------------------------------------------------------------

# honeypot.hidden = 'true'
# honeypot.label = 'Fill This Field'
# honeypot.name = 'honeypot'
# honeypot.template = '<label>{label}</label><input type="text" name="{name}" value=""/>'
# honeypot.container = '<div style="display:none">{template}</div>'

#--------------------------------------------------------------------
# SECURITY
#--------------------------------------------------------------------

# security.csrfProtection = 'cookie'
# security.tokenRandomize = false
# security.tokenName = 'csrf_token_name'
# security.headerName = 'X-CSRF-TOKEN'
# security.cookieName = 'csrf_cookie_name'
# security.expires = 7200
# security.regenerate = true
# security.redirect = false
# security.samesite = 'Lax'

#--------------------------------------------------------------------
# SESSION
#--------------------------------------------------------------------

# session.driver = 'CodeIgniter\Session\Handlers\FileHandler'
# session.cookieName = 'ci_session'
# session.expiration = 7200
# session.savePath = null
# session.matchIP = false
# session.timeToUpdate = 300
# session.regenerateDestroy = false

#--------------------------------------------------------------------
# LOGGER
#--------------------------------------------------------------------

# logger.threshold = 4

#--------------------------------------------------------------------
# CURLRequest
#--------------------------------------------------------------------

# curlrequest.shareOptions = true
```

## Stacks

1. CodeIgniter 4
2. Semantic UI

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
