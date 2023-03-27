// Before
funcName1 = function() {
    return "Hello World";
}

// After
funcName2 = () => {
    return "Hello World";
}

// If the only statement in the function is the return statement, then you don't need to write the return keyword and the curly brackets
funcName3 = () => "Hello World";

// Pass the arguments
funcName4 = (arg1) => "Hello " + arg1;

// If there is only one argument you can skip the parantesis as well
funcName5 = arg1 => "Hello" + arg1;