// There are so many array functions in javascript one of the most useful one in React is map()
// It runs a function for each element of a particular array and return a new array as a result.

const myArray = [1,2,3,4,5]

const increasedBy10 = myArray.map( item => item + 10);
console.log(increasedBy10);
