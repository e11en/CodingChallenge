import numpy as np
from random import randrange
import random
import pandas as pd
size = 20
grid = []

for y in range(size):
   grid = grid + [[]]
   for x in range(size):
      grid[y] = grid[y] + [0]
CountOfMines = 100
for _ in range(CountOfMines):
    updated = False
    while not updated:
        i = random.randrange(size)
        j = random.randrange(size)
        if grid[i][j] == 0:
            grid[i][j] = 1
            updated = True

# See PyCharm help at https://www.jetbrains.com/help/pycharm/
grid2=[]
for y in range(size):
   grid2 = grid2 + [[]]
   for x in range(size):
      grid2[y] = grid2[y] + [0]


for i in range(size):
    for j in range(size):
        if grid[i][j] == True:
            grid2[i][j] =  'Bom'
        else:
            grid2[i][j] = 0
            if j-1 > -1:
                if grid[i][j-1] == True:
                    grid2[i][j] = grid2[i][j] + 1
            if j + 1 <size:
                if grid[i][j+1] == True:
                    grid2[i][j] = grid2[i][j] + 1
            if i + 1 < size:
                if grid[i+1][j] == True:
                    grid2[i][j] = grid2[i][j] + 1
            if i - 1 > -1:
                if grid[i-1][j] == True:
                    grid2[i][j] = grid2[i][j] + 1
            if j - 1 > -1 and i-1 >-1 :
                if grid[i-1][j-1] == True:
                    grid2[i][j] = grid2[i][j] + 1
            if j - 1 > -1 and i+1 < size:
                if grid[i+1][j-1] == True:
                    grid2[i][j] = grid2[i][j] + 1
            if j + 1 < size and i - 1 > -1:
                if grid[i-1][j+1] == True:
                    grid2[i][j] = grid2[i][j] + 1
            if j + 1 < size and i + 1 < size:
                if grid[i+1][j+1] == True:
                    grid2[i][j] = grid2[i][j] + 1

DF = pd.DataFrame(grid2)