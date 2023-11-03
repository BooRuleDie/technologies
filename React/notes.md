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
    * set functions don't update the state immediately