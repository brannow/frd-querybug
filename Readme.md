# TYPO3 Extension ``frd_QueryBug`` 

> Proof of Concept for an Query Bug

## Bug

get Extbase Object from an Query Request creates a Join Query without Distinct or GroupBy

### Result 

We get multiple results of the same Objects

## Usage


### 1) Installation

#### Installation using Composer

The recommended way to install the extension is by using (Composer)
add in your Composer: 
```
"repositories": [
    ...
    {"type": "vcs", "url": "git@github.com:brannow/frd_querybug.git"}
  ]
```

```
"require": {
    "frd/frd-querybug": "dev-master"
  },
```

 ...or just clone this source code into your Typo3conf/ext folder

### 2) Manual

1) After installation, a entry in your module menu, under WEB, appears.
2) Click on it (Query Bug Test).
3) Select in your pageTree a Storage Location for the test Records.
4) First usage, click on create to create some sample Records
5) see the magic

## Magic

The Actual magic happens in QueryTestController::indexAction and CityRepository::findByStore