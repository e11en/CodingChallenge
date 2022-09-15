#if defined(_WIN32) || defined(_WIN64)
    #include <windows.h>
#endif

#include <string.h>
#include <iostream>
#include <stdlib.h>
#include <conio.h>

using namespace std;

/*************************************************************************
**      RULES                                                           **
**************************************************************************
    
    >> ALIVE AND < 2 NEIGHBOURS     => KILL     (underpopulation)
    
    >> ALIVE AND 2 OR 3 NEIGHBOURS  => STAY     (live to next gen)
    
    >> ALIVE AND > 3 NEIGHBOURS     => KILL     (overpopulation)
    
    >> DEAD  AND 3 NEIGHBOURS       => ALIVE    (reproduction)

*************************************************************************/


/*************************************************************************
**      CONSTANTS                                                       **
*************************************************************************/

const int WIDTH = 10;
const int HEIGHT = 10;
const double ONE_SECOND = 1000000;

int cells[HEIGHT][WIDTH];
int neighbours[HEIGHT][WIDTH];
bool showNeighbours = false;

void setOscillatorPattern() {
    cells[3][3] = 1;
    cells[3][4] = 1;
    cells[3][5] = 1;
}

void init() {
    //set stuff to zero
    for(int row=0; row<HEIGHT; row++) {
        for(int column=0; column<WIDTH; column++) {
            cells[row][column] = 0;
        }
    }

    setOscillatorPattern();
}

int getSurroundingNeighbours(int row, int column) {
    int neighboursCount = 0;
// 1,5 
//2,5 
//3,5
    // ignore left
    if(column == 0) {
        neighboursCount += cells[row][(column + 1)];
    }
    // ignore right
    else if(column == (WIDTH -1))
    {
        neighboursCount += cells[row][(column - 1)];
    // check both
    } else {
        neighboursCount += cells[row][(column + 1)]; // 1, 6 =0 || 2, 6 = 0 || 3, 6 = 0
        neighboursCount += cells[row][(column - 1)]; // 1, 4 =0 || 2, 4 = 0 || 3, 4 = 1
    }

    return neighboursCount;
}

void updateCells() {
    int neighboursCount = 0;
    for(int row=0; row<HEIGHT; row++) {
        for(int column=0; column<WIDTH; column++) {
            neighboursCount = 0;

            // ignore above neighbours
            if(row == 0) {
                neighboursCount += getSurroundingNeighbours(row, column);
                neighboursCount += getSurroundingNeighbours((row + 1), column);
                neighboursCount += cells[row + 1][column];
            }
            // ignore below // 
            else if(row == (WIDTH - 1)) {
                neighboursCount += getSurroundingNeighbours(row, column);
                neighboursCount += getSurroundingNeighbours((row - 1), column);
                neighboursCount += cells[row - 1][column];
            }
            // check all -- row 2, column 5 goes wrong
            else {
                neighboursCount += getSurroundingNeighbours((row - 1), column); // 1, 5 -> 0
                neighboursCount += getSurroundingNeighbours(row, column); //2, 5 -> 0
                neighboursCount += getSurroundingNeighbours((row + 1), column); // 3, 5 -> 1
                neighboursCount += cells[row - 1][column]; // 1, 5 -> 0
                neighboursCount += cells[row + 1][column]; // 3, 5 -> 1
            }

            neighbours[row][column] = neighboursCount;
            if(cells[row][column] == 1) {
                if(neighboursCount < 2 || neighboursCount > 3)
                {
                    cells[row][column] = 0;
                }
                //else -> neighbours is 2 or 3 so STAY ALIVE
            } else if(neighboursCount == 3) {
                cells[row][column] = 1;
            }
        }
        showNeighbours = true;
    }
}

void clearScreen() {
     //std::system("clear");
     cout << string( 5, '\n' );
     //if (system("CLS")) system("clear");
     //clrscr();
    //  cout << "\033[2J\033[1;1H";
}

void loop() {
    bool hasCells = true;
    int runTimes = 0;

    while(hasCells) {
        clearScreen();
        string row;

        for(int w=0; w<WIDTH; w++) {
            for(int h=0; h<HEIGHT; h++) {
                string cell;
                if(showNeighbours)
                {
                    cell = to_string(neighbours[w][h]);
                }else
                if(cells[w][h] == 1) {
                    cell = " O ";
                } else {
                    cell = " . ";
                }
                row = row + cell;
            }
            row += "\n";
        }

        cout << "\n\n" << row << "\n\n";
        cout.flush();
        updateCells();
        Sleep(1000);
        runTimes++;

        if(runTimes > 1) {
            hasCells = false;
        }
    }
}



int main(int argc, char** argv) {

    init();
    loop();


    return 0;
}

