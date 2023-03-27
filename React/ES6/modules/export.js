// There are two type of exports in ES6: Default export and named export
/*
    You can define only one defualt export in a javascript file and you can rename it when you import what's exported.

    You can define named exports as many as you want but you can't rename them when you're importing them.
*/

// in-line export
export const myArray = [1,2,3,4,5,6,7,8,9,10]
export const myArray2 = myArray.map( item => item + 10)

// all at once
const myArray3 = [...myArray]
const myArray4 = [...myArray2]

export {myArray3, myArray4}

// default export
const myArray5 = ["I'm the only item in that array"]
export default myArray5