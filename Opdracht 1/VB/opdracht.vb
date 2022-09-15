Module Program
    Sub Main(args As String())
        Dim words As Boolean = true
	Dim amount As Integer = 5
	Dim index As Integer = 0
	While index < amount
    		If words = true Then
            		Console.WriteLine("Hallo Kruitbosch!")
			words = false
        	Else
            		Console.WriteLine("Doei Kruitbosch!")
			words = true
        	End If
    		index += 1
	End While
    End Sub
End Module