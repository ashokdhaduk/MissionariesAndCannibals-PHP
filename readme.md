## Missionaries and Cannibals Implementation in PHP.

In the missionaries and cannibals problem, three missionaries and three cannibals must cross a river using a boat which can carry at most two people, under the 
constraint that, for both banks, if there are missionaries present on the bank, they cannot be outnumbered by cannibals (if they were, the cannibals would eat 
the missionaries). The boat cannot cross the river by itself with no people on board. And, in some variations, one of the cannibals has only one arm and cannot row.
[wiki](https://en.wikipedia.org/wiki/Missionaries_and_cannibals_problem).

#### Output
```
> Initial State: [Left: 3 missionaries, 3 cannibals, boat - Right: 0 missionaries, 0 cannibals]  
> transfer 1 missionaries and 1 cannibals, right [ Left: 2 missionaries, 2 cannibals - Right: 1 missionaries, 1 cannibals, boat ]  
> transfer 1 missionaries and 0 cannibals, left  [ Left: 3 missionaries, 2 cannibals, boat - Right: 0 missionaries, 1 cannibals ]  
> transfer 0 missionaries and 2 cannibals, right [ Left: 3 missionaries, 0 cannibals - Right: 0 missionaries, 3 cannibals, boat ]  
> transfer 0 missionaries and 1 cannibals, left  [ Left: 3 missionaries, 1 cannibals, boat - Right: 0 missionaries, 2 cannibals ]  
> transfer 2 missionaries and 0 cannibals, right [ Left: 1 missionaries, 1 cannibals - Right: 2 missionaries, 2 cannibals, boat ]  
> transfer 1 missionaries and 1 cannibals, left  [ Left: 2 missionaries, 2 cannibals, boat - Right: 1 missionaries, 1 cannibals ]  
> transfer 2 missionaries and 0 cannibals, right [ Left: 0 missionaries, 2 cannibals - Right: 3 missionaries, 1 cannibals, boat ]  
> transfer 0 missionaries and 1 cannibals, left  [ Left: 0 missionaries, 3 cannibals, boat - Right: 3 missionaries, 0 cannibals ]  
> transfer 0 missionaries and 2 cannibals, right [ Left: 0 missionaries, 1 cannibals - Right: 3 missionaries, 2 cannibals, boat ]  
> transfer 1 missionaries and 0 cannibals, left  [ Left: 1 missionaries, 1 cannibals, boat - Right: 2 missionaries, 2 cannibals ]  
> transfer 1 missionaries and 1 cannibals, right [ Left: 0 missionaries, 0 cannibals - Right: 3 missionaries, 3 cannibals, boat ]  
```
