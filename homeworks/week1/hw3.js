function reverse(str) {
    var word = ''
    for(var i=str.length-1; i>=0; i--){
    word += str[i]
    }
    return word
}

console.log(reverse('cat'))
console.log(reverse('1,2,3,4,5,6,7,8,9'))