open System

let lookForValue =
    let counter = 5
    let mutable words = true
    let mutable i = 0

    while i < counter do
        if words = true then
           printfn "\nHallo Kruitbosch!"
           words <- false
        else
          printfn "\nDoei Kruitbosch!"
          words <- true
        i <- i + 1