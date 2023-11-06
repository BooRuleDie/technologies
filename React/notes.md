# Notes

* create-react-app command: `npx create-react-app@latest app-name-here`
* **Prop Drilling**: It's used to define passing props to the Child-Components. It can only be done downward, not the other way around, which means you can only pass the prop from a Parent-Component to Child-Component and not vice versa.
* `React.StrictMode` wrapper in the index.js doesn't affect the production, and it can be removed in the development since it might cause some problems because it renders the React component twice.
* Be careful when writing CSS as `App.js` can override the CSS which is imported from `index.css`
* **Vite** command: `npm create vite@latest app-name-here -- --template react`
    * Output:       
        ```bash
        cd app-name-here
        npm install
        npm run dev
        ```
* In **Vite** you have to name your extensions as `jsx` *(if you're using the react template)*
* The first rendering of the root Component is also called **mounting**.
* Re-renders happens when **props** or **states** change. In order to reflect these changes the component is updated.
* General Rules of Hooks:
    * starts with `use-`
    * only can be invoked within a component
    * can't be invoked conditionally *(don't use if statements to invoke a Hook)*
    * `set-` functions don't update the `state` immediately !!!  
* Normally, React re-renders when there is a change in state or prop; however, in this case, there'd be just one re-render since React is smart enough to group all these state updates and perform only one re-render, which is called **auto-batching**
    * React Code:
        ```js
            <button
                    className="btn"
                    onClick={() => {
                        setName("John");
                        setAge(24);
                        setHobby("Gym");
                        // Normally react re-renders when there is a change in state or prop however in thise case there'd be just one re-render since React is smart enough to group all these state updates and perform only one re-render which is called auto-batching - React v18
                    }}
                >
        ```
* If you need to get the latest value of a state value immediately after a set function then you can specify an anonymous function to set function instead of specify the value that will be assigned for the state variable just like that:
    * Example Code
    ```js
        setCounter((prevState) => {
                console.log(prevState + 1);
                return prevState + 1;
            });
    ```