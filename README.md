Addresses
=========

This is a tt_address fork which adds:
  
* Vidi BE module
* Remove the `pi1` which is of no use for us 


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
        "friendsoftypo3/tt-address": "dev-master"
    },
```


