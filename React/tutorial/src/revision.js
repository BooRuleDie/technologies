const array = [1, 2, 3];
const array_new = [...array, 4, 5, 6];

console.log(array);
console.log(array_new);

const obj = {
    a: 1,
    b: 2,
    c: 3,
};
const new_obj = {
    ...obj,
    d: 4,
    e: 5,
    f: 6,
};
console.log(obj);
console.log(new_obj);

// it copies the previous object, doesn't refer it
// ---

// onClick parts of the test and test2 Components are identical, both of them doesn't call the function but refers to the function that will be called when the event fires. The second one is little bit tricky since it's using an anonymous function but actually it doesn the same thing as well. It doesn't call it but defines it using JSX expressions.
// and as you can see in both approaches you have access to event so you can access particular event properties or methods:
// 1. e.preventDefaul()
// 2. e.target.name
// 3. e.target.value ...
// const test = () => {
//     const handleClick = (e) => {
//         console.log("printed hulolo");
//     };
//     return <div onClick={handleClick}>Hulolo</div>;
// };

// const test2 = () => {
//     return (
//         <div
//             onClick={(e) => {
//                 console.log("printed hulolo again");
//             }}
//         >
//             Hulolo
//         </div>
//     );
// };

const book_db = [
    {
        id: 1,
        title: "some title",
        author: "some author",
        src: "https://picsum.photos/200/300",
    },
    {
        id: 2,
        title: "some title 1",
        author: "some author 1",
        src: "https://picsum.photos/200/301",
    },
    {
        id: 3,
        title: "some title 2",
        author: "some author 2",
        src: "https://picsum.photos/200/302",
    },
    {
        id: 4,
        title: "some title 3",
        author: "some author 3",
        src: "https://picsum.photos/200/303",
    },
];

const challenge1 = (given_id) => {
    return book_db.filter(book => {
        return book.id === given_id
    })[0]
}

console.log(challenge1(3));
