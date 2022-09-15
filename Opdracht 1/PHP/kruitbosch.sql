DECLARE @Counter INT 
DECLARE @X INT 
SET @Counter=0
SET @X=7
WHILE (@Counter >= 0 AND @Counter < @X)
BEGIN
	IF @Counter % 2 != 1
	BEGIN
	PRINT 'Hallo Kruitbosch'
    END
	ELSE
	PRINT 'Doei Kruitbosch'
    SET @Counter  = @Counter  + 1
END