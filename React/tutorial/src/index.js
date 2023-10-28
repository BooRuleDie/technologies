import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import "./index.css";

const book_db = [
    {
        title: "some title",
        author: "some author",
        src: "https://picsum.photos/200/300",
    },
];
// destructuring
const { title, author, src } = book_db[0];

const BookList = () => {
    return (
        <div className="booklist">
            <Book title={title} author={author} src={src} />
            <Book title={title} author={author} src={src} />
            <Book title={title} author={author} src={src}>
                <hr style={{margin: "1rem 0"}}/>
                <p>
                    Thanks to{" "}
                    <span style={{ fontWeight: "bold" }}>children</span> prop, I
                    can create this special paragraph.
                </p>
            </Book>
            <Book title={title} author={author} src={src} />
            <Book title={title} author={author} src={src} />
            <Book title={title} author={author} src={src} />
            <Book title={title} author={author} src={src} />
            <Book title={title} author={author} src={src} />
            <Book title={title} author={author} src={src} />
        </div>
    );
};

// destructing in the parameter section
// children is a special prop that you can use when you want to add JSX to a particular component and don't want to affect other components (name must be 'children')
const Book = ({ title, author, src, children }) => {
    return (
        <div className="book">
            <img src={src} alt="random image from lorem image" />
            <h2>{title}</h2>
            <p
                // inline css
                style={{
                    opacity: "50%",
                    overflow: "hidden",
                    textOverflow: "ellipsis",
                }}
            >
                {author}
            </p>
            {/* using children prop */}
            <div>{children}</div>
        </div>
    );
};

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<BookList />);
