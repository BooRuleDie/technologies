// old way
const myArray = [1,2,3]

const item1 = myArray[0];
const item2 = myArray[1];
const item3 = myArray[2];

// new way
const [item4, item5, item6] = myArray;
console.log(item4, item5, item6, myArray);

// if you want to skip a particular item in the array you can skip it by avoiding the item name 
const [item7, , item8] = myArray;
console.log(item7, item8)

// old way to use a JSON in a function
json = {
    brand: 'Ford',
    model: 'Mustang',
    type: 'car',
    year: 2021, 
    color: 'red'
}

printSomeCoolStuff(json);

function printSomeCoolStuff(json) {
    console.log(`My car's brand is ${json.brand} and it's ${json.color}`);
}

// new way
printSomeCoolStuff2(json);

function printSomeCoolStuff2({brand, color}) { // order of the properties is not important
    console.log(`My car's brand is ${brand} and it's ${color}`);
}
// note that you can do the same thing even in nested javascript objects