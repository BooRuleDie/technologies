import Navbar from "./components/Navbar";
import CartContainer from "./components/CartContainer";
import { useEffect } from "react";
import { useSelector, useDispatch } from "react-redux";
import { calculateTotals } from "../src/features/cart/cartSlice";
import Modal from "./components/Modal";

function App() {
    const cartState = useSelector((store) => store.cart);
    const modalState = useSelector((store) => store.modal);
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(calculateTotals());
    }, [cartState.cartItems]);

    return (
        <main>
            {modalState.isOpen && <Modal />}
            <Navbar />
            <CartContainer />
        </main>
    );
}
export default App;
