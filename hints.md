# Useful resources to develop assigned issues

## Contribution guide file

See the [contributing file](CONTRIBUTING.md) before start please.

## Composer package

Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and 
it will manage (install/update) them for you.

More resources at: [https://getcomposer.org/](https://getcomposer.org/).

### Create a composer.json file

To create a composer package the first step is to add in the root of the project a composer.json file.

### Package name

Package *name* is the name the package will be available and generally speaking should be used as name space root in 
association with the *autoload* section.

Composer discourage the usage of package names that do not reflect the root name of the namespace to load.

E.G.

```json
{
  "name": "acme/foobar",
  "autoload": {
    "psr-4": {
      "Acme\\Foobar\\": "src/"
    }
  }
}
```

Means: *"Load the content of the directory src under the namespace Acme/Foobar"*.

After this the package will be available on packages repository where it is registered on (like 
[packagist](https://packagist.org)), with is name.

E.G.

```bash
composer require acme/foobar
```

### Submit a php package to packagist.org

[packagist.org](https://packagist.org) is the main Composer repository. It aggregates public PHP packages installable 
with Composer.

First step is to signup on packagist, you can use your github account to signup.

Then follow instruction to submit a new package.

Some verification step will be required.

Note: in this track we are not dealing with private repository.

After a package has been correctly submitted it will be possible to download it via composer install.

From the root of the project, where the composer.json file is:

```bash
composer install
```

This will trigger the installation of the package in the project.

Note: packagist does not automatically update the repository code unless you configure it to do so.

### Development dependencies 

Composer offer a section called *require-dev* all of these dependencies grouped under require-dev, will be not installed
unless the flag --require-dev is specified in install command.

```bash
# will install base dependencies
composer install --no-dev
```

```bash
# will also install dev dependencies
composer install 
```

Note: Exclude development dependencies is useful when in production environment to avoid **security** problems and 
shorten the application perimeter.

#### Avoid to download unwanted resources

Composer does not offer a way to ignore resources as readme files, test runner descriptors or tests out of the box.

It can be done in conjunction with the *.gitattributes* file.

##### Create a .gitignore file

First create a .gitignore file in the root of the project:

```gitignore
# Exclude vendor dir
/vendor

# Exclude composer lock (it is a library! no way we will cause vendor lock-in to users)
composer.lock

# Exclude phpunit (no dist version, host version, if any)
phpunit.xml
```

##### Create a .gitattributes file

Create a .gitattributes file in the root of the project:

```gitexclude
# Exclude build/test files from archive
/readme.md
/.gitattributes   export-ignore
/.gitignore       export-ignore
/phpunit.xml      export-ignore
/phpunit.xml.dist export-ignore
/tests            export-ignore


# Configure diff output for .php and .phar files.
*.php diff=php
*.phar -diff
```

## phpunit test suite

PHPUnit is a programmer-oriented testing framework for PHP.

It is an instance of the xUnit architecture for unit testing frameworks.

More resources at: [https://phpunit.de/](https://phpunit.de/).

### Create a phpunit.xml.dist file

phpunit.xml.dist file is the descriptor file that is loaded to initialize a phpunit test session.

E.G.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit colors="true" bootstrap="vendor/autoload.php">
    <testsuites>
        <testsuite name="all">
            <directory suffix="Test.php">tests/</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

This basic file tells the phpunit test runner to:
- use as bootstrap the autoload.php file that has been generated after a composer install in the directory *vendor*
- to create a test suite named *all*
- to execute all the files that ends with the suffix *Test.php* in the *tests* directory

### Launch phpunit test suite

```bash
# from the root of the project where the phpunit.xml.dist file is contained
phpunit -c .
```





