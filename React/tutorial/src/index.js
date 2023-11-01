import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import { book_db } from "./book_db";
import Book from "./Book";
import EventTestComponent from "./EventTestComponent";

const BookList = () => {
    // const challenge1 = (given_id) => {
    //     return book_db.filter((book) => {
    //         return book.id === given_id;
    //     })[0];
    // };

    return (
        <div className="booklist">
            {/* <EventTestComponent /> */}
            {/* instead of specifying all properties of the object one by one just like that: {book_db.map(({ id, title, author, src, children }) => { 
                
            we can use the ... syntax as it's shown below*/}
            {book_db.map((book) => {
                return (
                    <Book
                        {...book}
                        key={book.id}
                        // challenge1={challenge1}
                        id={book.id}
                    />
                );
            })}
        </div>
    );
};

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<BookList />);
