import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import "./index.css";

const BookList = () => {
    return (
        <div className="booklist">
            <Book />
            <Book />
            <Book />
            <Book />
            <Book />
            <Book />
            <Book />
            <Book />
            <Book />
        </div>
    );
};

const Book = () => {
    return (
        <div className="book">
            <img
                src="https://picsum.photos/200/300"
                alt="random image from lorem image"
            />
            <h2>Lorem ipsum dolor</h2>
            <p
                style={{
                    opacity: "50%",
                    overflow: "hidden",
                    textOverflow: "ellipsis",
                }}
            >
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Inventore, dolorum?
            </p>
        </div>
    );
};

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<BookList />);
