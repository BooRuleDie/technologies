// spread operator allows us to copy all or part of an existing array or object
const myArray = [1,2,3,4,5]
const myArray2 = [6,7,8,9,10]

// joins two arrays
const comArray = [...myArray2, ...myArray ]
console.log(comArray)

// take a part of myArray2
const [six, seven, ...rest] = myArray2
console.log(six, seven, rest)

// we can use the spread operator on objects too
const json1 = {
    brand: 'Ford',
    model: 'Mustang',
    color: 'red'
}

const json2 = {
    type: 'car',
    year: 2021, 
    color: 'yellow'
}

// joins two objects completely
const comJSON = {...json1, ...json2}
console.log(comJSON)

// Note that properties that don't match were combined and matched one(color) was overriden by the last JSON object