# Mage2 Module Shch CustomerLog

    ``shch/module-customerlog``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Technical Interview Test

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Shch`
 - Enable the module by running `php bin/magento module:enable Shch_CustomerLog`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require shch/module-customerlog`
 - enable the module by running `php bin/magento module:enable Shch_CustomerLog`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Track Customer Connexions (customer/customer_log/track_customer_connexions)


## Specifications

 - Plugin
	- afterAuthenticate - Magento\Customer\Model\AccountManagement > Shch\CustomerLog\Plugin\Magento\Customer\Model\AccountManagement


## Attributes



