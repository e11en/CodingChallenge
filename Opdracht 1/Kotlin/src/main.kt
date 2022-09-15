/**********************************************************************************
** F U N   F U N   C O D I N G   C H A L L E N G E   -   O P D R A C H T   O N E **
 *********************************************************************************/

fun main() {
    val helloKruitboschMessage = "Hallo Kruitbosch!";
    val lineBreakMessage = "\n";
    val doeiKruitboschMessage = "Doei Kruitbosch!";

    // Unnecessary variables which, I hope, add complexity :)
    var numberOfRuns = 0;
    val sevenRuns = 7;
    var even = true;

    while(numberOfRuns < sevenRuns) {
        // print to screen
        if(even) {
            print(helloKruitboschMessage);
        } else {
            print(doeiKruitboschMessage);
        }
        // Add line break
        print(lineBreakMessage);
        // fix some variable stuff
        even = !even;
        numberOfRuns += 1;
    }
}