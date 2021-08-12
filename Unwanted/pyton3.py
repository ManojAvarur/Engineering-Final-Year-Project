
# -------------- Maximum and minimum
print("\n \t Maximum and minimum")
from random import shuffle
arr = list( range(1 , 101) )
shuffle( arr )
# print( arr )
min = arr[0]
max = arr[0]
for i in arr:
    if i < min:
        min = i
    
    if i > max:
        max = i


print(f"Min = {min} and Max = {max}")


# ------------ Missing Number
print("\n \t Missing Number")
int_arr = [ i for i in range( 1, 101 ) if i != 20  ]
sum_arr = sum( int_arr )
n = len( int_arr )
total = ( n + 1) * ( n + 2 ) / 2
print( total - sum_arr )

# --------------- Anagram
print("\n \t Anagram")
string = "binary"
anagram = "brainya"
no_space = anagram.split()
no_space = "".join( no_space )

if len( string ) != len( no_space ):
    print("Not an anagram")
else:
    string = list( string )
    no_space = [ char for char in string ] # Same as above
    string.sort()
    no_space.sort()
    if string == no_space:
        print("Anagram")
    else:
        print("Not an anagram")

# -------------------------  calculate the number of vowels and consonants in a string
print("\n \t calculate the number of vowels and consonants in a string")
string = "Someting which is said by the interviewer"
vovels_count = 0
consonants_count = 0

for i in string:
    if i in ['a', 'e', 'i', 'o', 'u']:
        vovels_count += 1
        print(i)
    else:
        consonants_count += 1

print(f"Count of Vovles = {vovels_count} and consonants count is = {consonants_count}")



# -------------  Count of characters
print("\n \t Count of characters")
string = "Hello World"
temp = []
for i in range( len( string) ):
    if string[i] not in temp:
        temp.append( string[i] )
        count = 1
        for j in range( len( string ) ):
            if string[i] == string[j] and i != j:
                count += 1
        
        print(f"Count of the character {string[i]} = {count}")


# ----------- Pallindrome
print("\n \t Pallindrome")
string = "wow"

print( string == string[ len(string)::-1 ])

# ------------ Revese a string
print("\n \t Revese a string")
tes = "Hello World"

for i in range( len( tes ) - 1, -1, -1):
    print(tes[i], end='')

