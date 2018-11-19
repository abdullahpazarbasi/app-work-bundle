# AppWork UI Kit Symfony Bundle (app-work-bundle)

AppWork UI Kit Symfony Bundle helps you integrate [Appwork Bootstrap 4 Template + UI Kit](https://wrapbootstrap.com/theme/appwork-bootstrap-4-template-ui-kit-WB0C668T3) in your [Symfony](http://symfony.com) project.

Installation
------------

First you need to add `abdullahpazarbasi/app-work-bundle` to `composer.json`:

```json
{
   "require": {
        "abdullahpazarbasi/app-work-bundle": "dev-master"
    }
}
```

You also have to add `AppWork UI Kit Symfony Bundle` to your `AppKernel.php`:

```php
// app/AppKernel.php:

//...
class AppKernel extends Kernel
{
    //...
    public function registerBundles()
    {
        $bundles = [
            ...
            new AppWorkBundle\AppWorkBundle(),
        ];
        //...
        return $bundles;
    }
    //...
}
```

And, after `composer install`, you have to copy appwork `dist` directory content into `web/bundles/appwork` directory of the symfony project.

License
-------

- The bundle is licensed under the [MIT License](http://opensource.org/licenses/MIT)