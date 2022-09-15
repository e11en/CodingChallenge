#if defined(_WIN32) || defined(_WIN64)
    #include <windows.h>
#endif

#include <string.h>
#include <iostream>
#include <stdlib.h>

using namespace std;



int main(int argc, char** argv) {
    bool showHallo = true;
    for(int i=0; i<7; i++){
        if(showHallo)  {
            cout << "Hallo, kruitbosch!\n";
        } else {
            cout << "Doei, kruitbosch!\n";
        }
        showHallo = !showHallo;
    }


    return 0;
}

