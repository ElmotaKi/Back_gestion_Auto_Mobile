import React from 'react';
import Login from './components/Auth/Login';
import Acceuil from './components/Acceuil/Acceuil';
import Societe from './components/Societe/Societe'

import { BrowserRouter as Router, Route, Routes } from 'react-router-dom'; // Update import

function App() {
  return (
    // <Router>
    //   <Routes>
    //     <Route exact path="/" element={<Login />} />
    //     <Route path="/dashboard" element={<Acceuil />} />
    //   </Routes>
    // </Router>
    <Societe/>
  );

}


export default App;
