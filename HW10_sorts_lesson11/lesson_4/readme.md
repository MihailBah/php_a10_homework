# PHP LESSONS

## Lesson catch a snake tail.

Practice.

To run practice use
```
php run.php
```
And you will see next message
```
":-(() FAILED! Snake bit you."
```
To complete practice realize function 'getSnakeTail' at task.php.
You have array $bag where the most af values are null but at the end of array there is a snake hiding somewhere.

```
array(13) {
  [0]=>
  NULL
  [1]=>
  NULL
  [2]=>
  NULL
  [3]=>
  NULL
  [4]=>
  NULL
  [5]=>
  NULL
  [6]=>
  string(4) "tail"
  [7]=>
  string(4) "body"
  [8]=>
  string(4) "body"
  [9]=>
  string(4) "body"
  [10]=>
  string(4) "body"
  [11]=>
  string(4) "body"
  [12]=>
  string(4) "head"
}

```
The end of array is a snake head, but you have to return a key of tail.
Of course you will need a loop, so increment $itNum value after each iteration.
Use Convergence and round(ceil or floor) php functions.
And you will see next success message like:
```
":-)) SUCCESSFUL! You caught snake tail. Used = 17 iterations."
```

The snake is very agile, so you need to keep within 20 iterations. If you need more see:
```
:-(() FAILED! Snake bit you. Used = 22 iterations. Snake is faster than you.
```