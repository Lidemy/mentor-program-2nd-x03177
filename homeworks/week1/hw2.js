function capitalize(str) {
  var caps = str[0].toUpperCase() + str.slice(1);
  return caps ;
}
console.log(capitalize('banana'))
console.log(capitalize('cookie'))
console.log(capitalize('<><cookie'))