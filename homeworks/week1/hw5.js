function join(str, concatStr) {
    var number1 = str[0]
    for(var i=1; i<=str.length-1; i++){
        number1 += concatStr + str[i]
    }
    return number1
}
console.log(join([1, 2, 3], ''))
console.log(join(["a", "b", "c"], "!"))
console.log(join(["a", 1, "b", 2, "c", 3], ','))

function repeat(str, times) {
    var number2 = ''
    for(var i=0; i<times; i++){
        number2 += str
    }
    return number2
}
console.log(repeat('v', 2))