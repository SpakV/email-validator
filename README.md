# Email Validator
PHP library to valid email

## Install (using Composer)
```
composer require spakv/email-validator
```

## Examples
```
\SPakV\EmailValidator::validate('example@google.com'); // full validation
\SPakV\EmailValidator::validateFormat('example@google.com'); // validate email format
\SPakV\EmailValidator::validateMx('example@google.com'); // validate mx record exisiting
