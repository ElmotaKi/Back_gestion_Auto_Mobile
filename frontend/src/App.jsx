import React from 'react';
import Login from './components/Auth/Login';
import Acceuil from './components/Acceuil/Acceuil';
import Societe from './components/Societe/Societe'

//import { BrowserRouter as Router, Route, Routes } from 'react-router-dom'; // Update import
//import SocietePost from './components/Societe/SocietePost';
//import { BrowserRouter as Router, Route,Switch } from 'react-router-dom';
//import Societedelete from './components/Societe/Societedelete';
import Societeput from './components/Societe/Societeput';
//import Commercialget from './components/Commercial/Commercialget';
//import Commercialpost from './components/Commercial/Commercialpost';
function App() {
  return (
    // <Router>
    //   <Routes>
    //     <Route exact path="/" element={<Login />} />
    //     <Route path="/dashboard" element={<Acceuil />} />
    //   </Routes>
    // </Router>
    
     //<SocietePost/>
    // <Societedelete/>
    <Societeput/> 
  
     //<Commercialpost/>
  );

}


export default App;
