// it's used to define one-line if-else statements

let condition = true

condition ? itsWorking() : itDoesntWorking()
condition ? itsWorking() : itDoesntWorking()

function itsWorking(){
    console.log("It's Working YEEEYY")
    condition = false
}
function itDoesntWorking(){
    console.log("It's doesn't working :(")
}