### 1) Use this template to make a PUBLIC repository for our own map:
##### Don't forget to include ALL the branches, NOT only MASTER
https://github.com/thecodingmachine/workadventure-map-starter-kit

### 2) Adapt the map.tmj and the other rooms related to your need with Tiled tool:
```bash
sudo snap install tiled
```

### 3) Once satisfied with the maps made and when deployed, visit your Pages and copy the end of the link:
#### Example :
```bash
# https://play.workadventu.re/_/<INSTANCE>/<URL PAGES>/map/map.tmj
# Change the instance to global, end result:
/_/global/ilotiv.github.io/map/map.tmj
```

### 4) Copy this link to your Work Adventure .env:
```bash
# workadventure/.env
50 START_ROOM_URL=/_/fw1lso7hll6/ilotiv.github.io/map/map.tmj
```
