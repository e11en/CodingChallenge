x = 7

if(x > 0)
then
    for y=x ,1,-1
    do
        if(y % 2 ~= 0)
        then 
        do
        print("Hallo Kruitbosch!");
        end
        else
        do
        print("Doei Kruitbosch!");
        end
    end
end
else
    do
        print("Gebruik minimaal 1 in plaats van..", x);
    end
end