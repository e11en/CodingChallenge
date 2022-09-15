fn main() {
    let counter = 5;
    let mut words = true;
    let mut i = 0;

    while i < counter {
        if words == true {
            println!("Hallo Kruitbosch!");
	    words = false;
        } else {
            println!("Doei Kruitbosch!");
            words = true;
        }

        i += 1;
    }
}