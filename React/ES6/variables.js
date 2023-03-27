/* 
    With the ES6 there are three ways to define a variable: var, const, let


       * If you use var outside of any function or block, like loops or if-else blocks. It belongs to the global scope and can be accessed from anywhere.

       * If you use var inside a function, it belongs to the function and cannot be accessed from the global scope.

       * If you use var inside a block, it can still be accessed from the global scope.

       * It has a function scope, not a block scope, which means if you use the same variable name with var in a function, even though you're in a different block or nested blocks you're accessing the same variable. If this is not the behavior you want, you can try to use the const and let which have block scope instead of function scope.

       ---

       * let and const have block scope which means if you're in a different block, you're accessing a variable that belongs to that block, not the function, so as long as you change the block, you can define a new variable that can be accessed from that block only.

       * let is used to define values that can be changed in the future.

       * const is used to define a reference that cannot be changed in the future. For example, you can't change the values like 12, "myString", false but you can change the properties of objects and elements of an array, etc. because performing these operations uses the same reference everytime, it references the same object or array.

*/



function varFunction() {
    var x = 10;
    if (true) {
      var x = 20;
      console.log(x); // Output: 20 -> it didn't create a new variable because var has a function scope not a block scope
    }
    console.log(x); // Output: 20
  }
  
varFunction();
// console.log(x); // x is not defined

function letFunction() {
    let x = 10;
    let y = 12;
    if (true) {
        let x = 20;
        console.log(x)
        console.log(y);
    }
}

letFunction();