Addresses
=========

This is a tt_address fork which adds:

* BE module to easily manage your addresses based on Vidi. Vidi is only suggested in the dependencies. Consider installing it if you want to take advantage of the BE module.
* Remove the `pi1` which is of no use for us.
* Configure whether addresses are categorizable.

How to load this fork
=====================

To use the forked package in Composer, make sure to declare the git repository before the one of `composer.typo3.org` otherwise it will load the code from the original package.

```

    "repositories": [
        {
          "type": "git",
          "url": "https://github.com/Ecodev/tt_address.git"
        },
        {
          "type": "composer",
          "url": "http://composer.typo3.org/"
        }
    ],
    "require": {
        "ecodev/tt-address": "dev-master"
    },
```


