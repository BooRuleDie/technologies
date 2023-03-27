// What's ES6 and why should I learn it ?
// ES stands for ECMAScript and it's created to standardize javascript. ES6 is the 6th version. It's important to know ES6 because React use ES6.

// ES6 Classes, Capital class names are generic conventions for classes.
class Fruit {
    constructor(name, color, price) {
        this.name = name;
        this.color = color;
        this.price = price;
    }

    // defining a Fruit method
    whoami() {
        return `Name: ${this.name} | Color: ${this.color} | Price: ${this.price} - `
    }
}

// create Fruit object
const fruit1 = new Fruit("Apple", "Red", 1.99);
console.log(fruit1); // Output -> Fruit { name: 'Apple', color: 'Red', price: 1.99 }
console.log(fruit1.whoami());

// Inheritance
class DryFruits extends Fruit {
    constructor(name, color, price, isDry) {
        super(name, color, price);
        this.isDry = isDry;
    }

    isFruitDry() {
        return this.isDry;
    }
}

// Creating child object
const dryFruit1 = new DryFruits("cashews", "orange", 99.99, true)
console.log(dryFruit1.whoami()) // inherited from the parent class
console.log(dryFruit1.isFruitDry()) // new method that is special to child class

