setting up sumak.me
===================

for getting a valid copy of sumak.me, you have to:

#1 clone the repository

master branch should be stable at the moment:
```
git clone https://github.com/sumakcoop/sumak.me.git
```

#2 retrieve symfony binaries

Sumak repository comes with no binaries at all, so you should get the bin/console from a symphony repository.

As for example, the [Symfony demo applciation](https://github.com/symfony/demo)

**copy it's bin folder and paste it in sumak.me.**


# composer install

You need composer installed and at least PHP 7.2 also.

execute:
```
php composer install
```

# yarn install

To get the assets compiled you also need Yarn, [here is an official guide about installing it](https://classic.yarnpkg.com/en/docs/install/#debian-stable).

then, execute:
```
yarn install
```

# yarn encore dev

Finally you need to execute:
```
yarn encore dev
```

so then you get the folder /public/build populated.


# test

you can execute PHP locally to confirm:
```
php -S 127.0.0.1:8000 -t public

```
and navigate to:
```
http://127.0.0.1:8000/
```