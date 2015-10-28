# Silex Tiny Service Provider

A simple Silex Service Provider for [Tiny] 
by [Zack Kitzmiller](https://github.com/zackkitzmiller).

## Installation

Install via composer

    $ composer require jackdaw/silex-tiny:dev-master
    
This will install the package and all the dependencies.

First, you need to create a set for Tiny. You can do this using the command
line tools included in Tiny.

    $ ./vendor/zackkitzmiller/tiny/bin/genset 
    
    Generating TinyPHP Random Set...
    Set Generated
    Set: SJYaqGhd6mAe3NbWOB2KwfRtHslMFQkyXCu1gUI4cET97jZPp8nD5iVv0Loxzr 

Now you have random set of characters for Tiny. Time to register the service 
provider for Silex.

    <?php
    use Jackdaw\SilexTiny\TinyServiceProvider;
    // Create the Silex Application $app
    
    $app->register(new TinyServiceProvider(), array(
        'tiny.options' => array('set' => 'SJYaqGhd6mAe3NbWOB2KwfRtHslMFQkyXCu1gUI4cET97jZPp8nD5iVv0Loxzr')
    ));

Passing the random set to the service provider is mandatory.


## Usage

You can use the service like this

    echo $app['tiny']->to(5);
    // E
    
    echo $app['tiny']->from('E');
    // 5
    
    echo $app['tiny']->to(126);
    // XX
    
    echo $app['tiny']->from('XX');
    // 126
    
    echo $app['tiny']->to(999);
    // vk
    
    echo $app['tiny']->from('vk');
    // 999


### Tiny Trait

This package comes with an optional trait for using Tiny. 

    // In Application
    use \Jackdaw\SilexTiny\TinyTrait;

Now you can simply use Tiny like this

    echo $app->to(5);
    // E
    
    echo $app->from('E');
    // 5


### Twig Filter

A custom Twig filter is also included in the package. It's just a one
way transformation, at least at the moment.

   // In twig template
   {{ 5 | tiny }} // E


[Tiny]: https://github.com/zackkitzmiller/tiny-php/