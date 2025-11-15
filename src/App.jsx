import React from "react";
//Hook - use Effect, useState, useRef, useContext
import { useState } from "react";
import PrimaryButton from "./components/PrimaryButton";
import PrimaryButton from "./components/MessageDisplay";

const App = () => {
  const [count, setCount] = useState(0);
  const [ MessageisVisible, setIsMessageVisible] = useState(true);

  const handleClick =() => {
    setCount((count) => count +1);
    setIsMessageVisible(false);

    setTimeout(()=> {
      setIsMessageVisible(true);
    }, 3000);
  }
  return (
    <div>
      <h1>Hello React {count}</h1>
      <PrimaryButton label="Click Me" onClick={() => setCount((count) => count +1)}/>
    <MessageDisplay
    message="HELLO"
    visible={isMessageVisible}
    />
    </div>
  );
};

export default App;
